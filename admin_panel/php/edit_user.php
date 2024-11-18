<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Admin') {
    header("Location: ../../login_signup/login.php.html");
    exit();
}

include '../templates/connect_db.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get the user details from the user ID.
    $stmt = $pdo->prepare("SELECT id, fullname, email, user_type FROM user_info WHERE id = ?");
    $stmt->execute([$id]);
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
       $update_stmt = $pdo->prepare("UPDATE user_info SET fullname = ?, email = ?, user_type = ? WHERE id = ?");
        if ($update_stmt->execute([$fullname, $email, $user_type, $id])) {
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
    <link rel="stylesheet" href="../assets/edit_usr.css">
</head>
<body>

<a href="appointments.php">Go back</a>

<nav class="breadcrumb">
    <a href="admin_dashboard.php">Home</a> / <a href="users.php">Users List</a> / <span>Edit User</span>
</nav>

<main class="dashboard">
    <h1>Edit User</h1>
    
    <form method="post">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($user['fullname']); ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        
        <label for="user_type">User Type:</label>
        <select id="user_type" name="user_type" required>
            <option value="Normal" <?php echo $user['user_type'] === 'Normal' ? 'selected' : ''; ?>>Normal</option>
            <option value="Therapist" <?php echo $user['user_type'] === 'Therapist' ? 'selected' : ''; ?>>Therapist</option>
        </select>

        <button type="submit">Update User</button>
    </form>
    
</main>

</body>
</html>