<?php
include '../templates/connect_db.php'; 
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Admin') {
    header("Location: ../../login_signup/login.php.html");
    exit();
}
$admin_name = $_SESSION['userName'];

try {
    $stmt = $pdo->query("
        SELECT 
            a.appointment_id, 
            a.appointment_date,
            a.appointment_time, 
            a.status, 
            ui.fullname AS patient_name, 
            ti.fullname AS therapist_name
        From appointments a
        JOIN user_info ui ON a.patient_id = ui.id        
        LEFT JOIN user_info ti ON a.therapist_id = ti.id        
        ORDER BY a.appointment_date DESC
    ");
    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments List</title>
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
    <a href="appointments.php">Appointments List</a> /
</nav>


    <h1>Appointments List</h1>
    <table>
        <thead>
            <tr>
                <th>Appointment ID</th>
                <th>Patient Name</th>
                <th>Therapist Name</th>
                <th>Date</th>
                <th>Time Slot</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointments as $appointment): ?>
            <tr>
                <td><?= $appointment['appointment_id'] ?></td>
                <td><?= htmlspecialchars($appointment['patient_name']) ?></td>
                <td><?= htmlspecialchars($appointment['therapist_name']) ?></td>
                <td><?= $appointment['appointment_date'] ?></td>
                <td><?= $appointment['appointment_time'] ?></td>
                <td><?= $appointment['status'] ?></td>
                <td><a href="edit_appointment.php?id=<?= $appointment['appointment_id'] ?>" class="edit-btn">Edit</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
function w3_open() {
    document.getElementById("main").style.marginLeft = "25%";
    document.getElementById("mySidebar").style.width = "25%";
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
