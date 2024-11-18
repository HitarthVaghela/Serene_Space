<?php
$host = 'localhost';
$db   = 'serene_space';
$user = 'root';
$pass = "";
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $stmt = $pdo->prepare('SELECT * FROM user_info WHERE token = ?');
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        $token_created_at = strtotime($user['token_created_at']);
        date_default_timezone_set('Asia/Kolkata');
        $current_time = time();
        $expiration_time = 24 * 60 * 60;

        if ($current_time - $token_created_at < $expiration_time) {
            $stmt = $pdo->prepare('UPDATE user_info SET is_verified = 1, token = NULL, token_created_at = NULL WHERE token = ?');
            $stmt->execute([$token]);

            echo 'Email verified successfully! You can now <a href="login.php">login here</a>.';
        } else {
            echo 'Token has expired.';
        }
    } else {
        echo 'Invalid or expired token.';
    }
} else {
    echo 'No token provided!';
}
?>