<?php
include '../configure.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    echo "User ID not set in session.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appointment_date = $_POST['appointmentDate'];
    $appointment_time = $_POST['appointmentTime'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $doctor_id = $_GET['doctor_id'];

    if (empty($appointment_date) || empty($appointment_time) || empty($fullname) || empty($email)) {
        echo "All fields are required.";
    } else {
        try {
            // Log parameters for debugging
            error_log("User ID: $user_id, Doctor ID: $doctor_id, Date: $appointment_date, Time: $appointment_time");

            $insert_stmt = $pdo->prepare("INSERT INTO appointments (patient_id, therapist_id, appointment_date, appointment_time, status) VALUES (?, ?, ?, ?, 'Scheduled')");
            $insert_stmt->execute([$user_id, $doctor_id, $appointment_date, $appointment_time]);
            
            if (sendConfirmationEmail($email, $appointment_date, $appointment_time, 'scheduled')) {
                echo "<script>
                        alert('Appointment booked successfully for $appointment_date at $appointment_time. A confirmation email has been sent.');
                        window.location.href = '../../Psy_main/Psy-main.php';
                      </script>";
            } else {
                echo "Appointment booked, but email could not be sent.";
            }
        } catch (PDOException $e) {
            error_log("SQL Error: " . $e->getMessage());
            echo "Error: " . $e->getMessage();
        }
    }
}

function sendConfirmationEmail($email, $date, $time, $type)
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'serenespace01@gmail.com';
        $mail->Password = 'yqsd gcga rddg oyqe';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('serenespace01@gmail.com', 'Serene Space');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = ($type === 'scheduled') ? 'Appointment Confirmation' : 'Appointment Updated';
        $mail->Body = "<h2>Thank You!</h2>
            <p>Your appointment has been successfully {$type}.</p>
            <p><strong>Appointment Details:</strong></p>
            <ul>
                <li><strong>Date:</strong> {$date}</li>
                <li><strong>Time:</strong> {$time}</li>
            </ul>
            <p>Best regards,<br>Serene Space Website</p>";
        $mail->AltBody = "Your appointment is {$type}.\n\nDetails:\nDate: {$date}\nTime: {$time}";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}
?>