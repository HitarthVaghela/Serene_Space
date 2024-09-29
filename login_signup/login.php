<?php
session_start();
include '../admin_panel/templates/connect_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    try {
        $stmt = $pdo->prepare("SELECT user_id, user_type, fullname, password FROM user_info WHERE email = ?");
        $stmt->execute([$email]); 
        $user = $stmt->fetch(); 

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_type'] = $user['user_type'];
                $_SESSION['userName'] = $user['fullname'];

                if ($user['user_type'] === 'Admin') {
                    header("Location: /Serene_Space/admin_panel/php/admin_dashboard.php");
                } elseif ($user['user_type'] === 'Normal') {
                    header("Location: /Serene_Space/home/home.html");
                } elseif ($user['user_type'] === 'Therapist') {
                    header("Location: /Serene_Space/therapist_panel/therapist_login.php");
                }
                exit();
            } else {
                echo "Invalid credentials.";
            }
        } else {
            header("Location: signup.html");
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
