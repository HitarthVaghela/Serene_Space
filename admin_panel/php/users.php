<?php

include 'connect_db.php' ;

try {
    $stmt = $pdo->query("SELECT user_id, fullname, email FROM user_info WHERE user_type = 'Normal' ");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="../assets/admin_dashboard.css">
</head>
<body>

<h1>Users List</h1>

<table>
    <thead>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>User Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['user_id'] ?></td>
                <td><?= $user['fullname'] ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td>
                    <a href="edit_user.php?user_id=<?= urlencode($user['user_id']) ?>">Edit</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No users found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>