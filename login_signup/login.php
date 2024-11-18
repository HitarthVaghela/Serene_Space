<?php
    include ("configure.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&display=swap"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
</head>
<body>

<div class="container">
    <?php
        if(isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Fetch user data by email
            $result = mysqli_query($conn, "SELECT * FROM user_info WHERE email='$email'");
            $row = mysqli_fetch_assoc($result);

            if ($row) {
                // Check if the email is verified
                if ($row['is_verified'] == 0) {
                    echo "<script>alert('Your email is not verified. Please check your inbox to verify your email address.');</script>";
                } else {
                    // Verify the hashed password
                    if (password_verify($password, $row['password'])) {
                        $_SESSION['email'] = $email;
                        $_SESSION['loggedin'] = true;
                        
                        // Store user information in the session
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['user_type'] = $row['user_type'];
                        $_SESSION['userName'] = $row['fullname'];

        
                        // Redirect the user based on their user type
                        if ($row['user_type'] === 'Admin') {
                            header("Location: ../admin_panel/php/admin_dashboard.php");
                        } elseif ($row['user_type'] === 'Normal') {
                            header("Location: ../home/home.php");
                        } elseif ($row['user_type'] === 'Therapist') {
                            header("Location: ../therapist_panel/therapist_login.php");
                        }
                    } else {
                        echo "<script>alert('Invalid credentials. Please try again.');</script>";
                    }
                }
            } else {
                echo "<script>alert('Email not found. Please sign up.');</script>";
            }
        }
    ?>
    
    <div class="left-side">
        <h1>Welcome to Serene Space!</h1>
        <p>You don’t have to take the first step towards your mental well-being alone. Create an account and start your mental health journey with us today.</p>
    </div>
    <div class="right-side">
        <div class="title">
            <h2>Login</h2>
        </div>

        <div class="sin-opt">
            <a href="">
                <i class="fa-brands fa-google" style="color: #B197FC;"></i> Sign in with Google
            </a>
            <a href="">
                <i class="fa-solid fa-phone" style="color: #B197FC;"></i> Sign in with mobile number
            </a>
        </div>

        <br>

        <div class="form">
            <form method="post">
                <input type="email" placeholder="Email Address" name="email" required>
                <input type="password" placeholder="Password (min 8 characters)" name="password" required>
                <label>
                    <input type="checkbox" required> I am above 18 years of age
                </label>
                <label>
                    <input type="checkbox" required> I accept Serene Space's <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>
                </label>
                <a href="signup.php">Don't have an account yet? Create here</a>
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
