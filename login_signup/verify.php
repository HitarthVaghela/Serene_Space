<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

include 'configure.php';
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email']; // Retrieve the email from the session

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'serenespace01@gmail.com';
        $mail->Password   = 'yqsd gcga rddg oyqe';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipient Settings
        $mail->setFrom('serenespace01@gmail.com', 'Serene Space');
        $mail->addAddress($email); // Use the email from the session

        // Email content settings
        $mail->isHTML(true);
        $mail->Subject = 'Verify Your Email Address';

        // Generate a unique verification token
        $token = bin2hex(random_bytes(16));
        $verificationLink = "http://localhost/Serene_Space/verify_process.php?token=" . $token;

        // Insert the token and token_created_at timestamp into the database
        $token_created_at = date('Y-m-d H:i:s');
        $stmt = $pdo->prepare('UPDATE users SET token = ?, token_created_at = ? WHERE email = ?');
        $stmt->execute([$token, $token_created_at, $email]);

        // Email body
        $mail->Body    = "
            <h2>Thank you for registering!</h2>
            <p>Please click the link below to verify your email address:</p>
            <a href='{$verificationLink}'>Verify Email</a>
        ";

        $mail->AltBody = "Please visit this link to verify your email: {$verificationLink}";

        // Send the email
        $mail->send();
        echo 'Verification email has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo 'No email provided!';
}
?>