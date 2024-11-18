<?php

    include '../templates/connect_db.php' ;
    session_start();
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Admin') {
        header("Location: ../../login_signup/login.php.html");
        exit();
    }
    $admin_name = $_SESSION['userName'];
try {
    // SQL query to get the the Name , ID, Email, Speciality of the therapists.
    $stmt = $pdo->query("SELECT ui.id, ui.fullname, ui.email, ti.speciality 
        FROM user_info ui 
        JOIN therapist_info ti ON ui.id = ti.therapist_id 
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
    <title>Therapist List</title>
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="..\assets\appointment.css">
</head>
<body>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
    <a href="admin_dashboard.php" class="w3-bar-item w3-button">Dashboard</a>
    <a href="users.php" class="w3-bar-item w3-button">Users</a>
    <a href="therapist.php" class="w3-bar-item w3-button">Therapist</a>
    <a href="appointments.php" class="w3-bar-item w3-button">User Appointments</a>
    <a href="logout.php" class="w3-bar-item w3-button logout-btn">Logout</a>
</div>

<div id="main">
    <div class="w3-teal">
        <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
        <div class="w3-container">
            <header class="header">
                <div class="header-content">
                    <h2>Welcome, <?php echo $admin_name; ?></h2>
                </div>
            </header>
        </div>
    </div>

    <nav class="breadcrumb">
    <a href="admin_dashboard.php">Home</a> /
    <a href="therapist.php">Therapist List</a> /
</nav>
<h1>Therapist List</h1>

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
            <!-- foreach loop to print the ID,Name,Email,Speciality of the Therapists in table -->

            <?php foreach ($therapists as $therapist): ?>
            <tr>
                <td><?= $therapist['id'] ?></td>
                <td><?= $therapist['fullname'] ?></td>
                <td><?= htmlspecialchars($therapist['email']) ?></td>
                <td><?= $therapist['speciality'] ?></td>

                <!-- Edit details of therapist -->
                <td><a href="edit_user.php?id=<?php echo $therapist['id']; ?>" class="edit-btn">Edit</a></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No therapists found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<script>
function w3_open() {
    document.getElementById("main").style.marginLeft = "15%";
    document.getElementById("mySidebar").style.width = "15%";
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
    document.getElementById("main").style.marginLeft = "0%";
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("openNav").style.display = "inline-block";
}
</script>

</body>
</html>