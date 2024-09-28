<?php
    include 'Serene_Space/admin_panel/templates/connect_db.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        $email = $_POST['Email'];
        $password = $_POST['Password'];

        try {

            $stmt = $pdo->prepare("SELECT user_id, user_type, fullname FROM user_info WHERE email = ? AND password = ?");
            $stmt->execute([$email, $password]); 
            $user = $stmt->fetch(); 

            if ($user) {

                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_type'] = $user['user_type'];
                $_SESSION['username'] = $user['fullname'];

                if ($user['user_type'] === 'Admin') {
                    header("Location: /Serene Space/admin_panel/php/admin_dashboard.php");
                } elseif ($user['user_type'] === 'Normal') {
                    header("Location: home/home.html);
                } elseif ($user['user_type'] === 'Therapist') {
                    header("Location: home/home.html");
                } else {
                    echo "Invalid user type.";
                }
                exit();
            } else {

                echo "Invalid credentials.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>
