<?php
include("configure.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>

    <div class="container">
        <?php
        if (isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Check if user already exists
            $verify_query = mysqli_prepare($conn, "SELECT * FROM user_info WHERE email = ?");
            mysqli_stmt_bind_param($verify_query, 's', $email);
            mysqli_stmt_execute($verify_query);
            $result = mysqli_stmt_get_result($verify_query);
            $check = mysqli_fetch_assoc($result);

            if ($check) {
                echo "<script>alert('User already exists!');</script>";
            } else {
                $query = "INSERT INTO `user_info` (`fullname`, `email`, `password`) VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, 'sss', $fullname, $email, $hashed_password);
                mysqli_stmt_execute($stmt);

                $_SESSION['email'] = $email;

                require 'PHPMailer/Exception.php';
                require 'PHPMailer/PHPMailer.php';
                require 'PHPMailer/SMTP.php';

                $mail = new PHPMailer\PHPMailer\PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'serenespace01@gmail.com';
                    $mail->Password   = 'yqsd gcga rddg oyqe';
                    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    $mail->setFrom('serenespace01@gmail.com', 'Serene Space');
                    $mail->addAddress($email);

                    $mail->isHTML(true);
                    $mail->Subject = 'Verify Your Email Address';

                    $token = bin2hex(random_bytes(16));
                    $verificationLink = "http://localhost/SSclone/Serene_Space/login_signup/verify_process.php?token=" . $token;

                    $token_created_at = date('Y-m-d H:i:s');
                    $stmt = mysqli_prepare($conn, "UPDATE user_info SET token = ?, token_created_at = ? WHERE email = ?");
                    mysqli_stmt_bind_param($stmt, 'sss', $token, $token_created_at, $email);
                    mysqli_stmt_execute($stmt);

                    $mail->Body = "
                    <h2>Thank you for registering!</h2>
                    <p>Please click the link below to verify your email address:</p>
                    <a href='{$verificationLink}'>Verify Email</a>
                ";

                    $mail->AltBody = "Please visit this link to verify your email: {$verificationLink}";

                    $mail->send();
                    echo "<script>alert('Verification email has been sent. Please check your inbox.');</script>";
                } catch (Exception $e) {
                    echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
                }
            }
        }
        ?>

        <div class="left-side">
            <h1>Welcome to Serene Space!</h1>
            <p>You don’t have to take the first step towards your mental well-being alone. Create an account and start your mental health journey with us today.</p>
        </div>
        <div class="right-side">
            <div class="title">
                <h2>Sign up</h2>
            </div>

            <div class="sin-opt">
                <a href="">
                    <i class="fa-brands fa-google" style="color: #B197FC;"></i>
                    Sign in with Google
                </a>
                <a href="">
                    <i class="fa-solid fa-phone" style="color: #B197FC;"></i>
                    Sign in with mobile number
                </a>
            </div>

            <br>

            <div class="form">
                <form method="post" onsubmit="return validateForm()" action="signup.php">
                    <input type="text" placeholder="Full Name" name="fullname" required>
                    <input type="email" placeholder="Email Address" name="email" required>
                    <input type="password" 
                        placeholder="Password (min 8 characters)" 
                        id="password" 
                        name="password" 
                        required 
                        minlength="8" 
                        pattern="^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).*$" 
                        title="Password must be at least 8 characters long, contain at least one letter, one number, and one special character">
                    <input type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" required>
                    <label>
                        <input type="checkbox" required> I am above 18 years of age
                    </label>
                    <label>
                        <input type="checkbox" required> I accept Serene Space's <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>
                    </label>
                    <a href="login.php">Already have an account? Login here</a>
                    <button type="submit" name="submit" id="button">Create Account</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>