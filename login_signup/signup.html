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
    <link rel="stylesheet" href="signup.css">

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
    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $verify_query = mysqli_query($conn, "SELECT * FROM user_info WHERE email = '$email'");
        $check = mysqli_fetch_assoc($verify_query);
        
        if ($check) {
            echo "<div class='message'>
                    <p>User already exists!</p>
                  </div> <br>";
        } else {
            $query = "INSERT INTO `user_info` (`fullname`, `email`, `password`) VALUES ('$fullname', '$email', '$password')";
            mysqli_query($conn, $query);

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
                $verificationLink = "http://localhost/Serene_Space/verify_process.php?token=" . $token;

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
                echo 'Verification email has been sent. Please check your inbox.';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    } else {
    ?>
    <div class="left-side">
        <h1>Welcome to Serene Space!</h1>
        <p>You don’t have to take the first step towards your mental well-being alone. Create an account and start your mental health journey with us today.</p>
    </div>
    <div class="right-side">

        <div class="title">
            <h2>Sign up</h2>
        </div>

        <div class="logo"></div>
    
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

        <div class="already-account">
            <p>Already have an account? <a href="#">Sign in here</a>.</p>
        </div>

        <br>

        <div class="form">
            <form>
                <input type="text" placeholder="Full Name" required>
                <input type="email" placeholder="Email Address" required>
                <input type="password" placeholder="Password (min 8 characters)" required>
                <input type="password" placeholder="Confirm Password" required>
                <label>
                    <input type="checkbox" required> I am above 18 years of age
                </label>
                <label>
                    <input type="checkbox" required> I accept Serene Space's <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>
                </label>
                <button type="submit">Create Account</button>
            </form>
        </div>
        
    </div>
    <?php } ?>
</div>

</body>
</html>
