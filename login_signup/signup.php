<?php
include '../admin_panel/templates/connect_db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password !== $confirmPassword) {
        echo "<div class='message'><p>Passwords do not match!</p></div><br>";
        header("Location: signup.html");
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='message'><p>Invalid email format!</p></div><br>";
        header("Location: signup.html");
        exit();
    }

    try {
        $stmt = $pdo->prepare("SELECT * FROM user_info WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            echo "<div class='message'><p>User already exists!</p></div><br>";
            header("Location: sign_in.html");
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            $insert_stmt = $pdo->prepare("INSERT INTO user_info (fullname, email, password) VALUES (?, ?, ?)");
            $insert_stmt->execute([$fullname, $email, $hashedPassword]);

            header("Location: \Serene_Space\home\home.html");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
