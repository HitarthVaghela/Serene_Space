<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Admin') {
    header("Location: ../../login_signup/sign_in.html");
    exit();
}

include '../templates/connect_db.php'; 

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT user_id, fullname, email, user_type FROM user_info WHERE user_id = :user_id LIMIT 1");
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found.";
        exit();
    }
} else {
    echo "Invalid user ID.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];

    if (!empty($fullname) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $update_stmt = $pdo->prepare("UPDATE user_info SET fullname = :fullname, email = :email, user_type = :user_type WHERE user_id = :user_id");
        $update_stmt->bindParam(':fullname', $fullname);
        $update_stmt->bindParam(':email', $email);
        $update_stmt->bindParam(':user_type', $user_type);
        $update_stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        if ($update_stmt->execute()) {
            echo "User updated successfully.";
        } else {
            echo "Error updating user.";
        }
    } else {
        echo "Please fill in all fields correctly.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../assets/user.css">
</head>
<body>

<header class="header">
    <div class="header-content">
        <h1>Welcome <?php echo $_SESSION['userName']; ?></h1>
    </div>
</header>

<nav class="breadcrumb">
    <a href="admin_dashboard.php">Home</a> / <a href="users.php">Users List</a> / <span>Edit User</span>
</nav>

<main class="dashboard">
    <h1>Edit User</h1>
    
    <form method="post" action="">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($user['fullname']); ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        
        <label for="user_type">User Type:</label>
        <select id="user_type" name="user_type" required>
            <option value="Normal" <?php echo $user['user_type'] === 'Normal' ? 'selected' : ''; ?>>Normal</option>
            <option value="Admin" <?php echo $user['user_type'] === 'Admin' ? 'selected' : ''; ?>>Admin</option>
            <option value="Therapist" <?php echo $user['user_type'] === 'Therapist' ? 'selected' : ''; ?>>Therapist</option>
        </select>

        <button type="submit">Update User</button>
    </form>
    
</main>

</body>
</html>