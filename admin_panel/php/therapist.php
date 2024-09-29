<?php

    include '../templates/connect_db.php' ;
    include '../templates/sidebar_breadcrumb.php';

try {
    $stmt = $pdo->query("SELECT ui.user_id, ui.fullname, ui.email, ti.speciality 
        FROM user_info ui 
        JOIN therapist_info ti ON ui.user_id = ti.therapist_id 
        WHERE ui.user_type = 'Therapist'");
    $therapists = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="../assets/user.css">
    <link rel="stylesheet" href="../assets/sidebar.css">
</head>
<body>

<h1>Users List</h1>

<table>
    <thead>
        <tr>
            <th>Therapist ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Speciality</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($therapists)): ?>
            <?php foreach ($therapists as $therapist): ?>
            <tr>
                <td><?= $therapist['user_id'] ?></td>
                <td><?= $therapist['fullname'] ?></td>
                <td><?= htmlspecialchars($therapist['email']) ?></td>
                <td><?= $therapist['speciality'] ?></td>
                <td><a href="edit_user.php?id=<?php echo $therapist['user_id']; ?>" class="edit-btn">Edit</a></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No therapists found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
