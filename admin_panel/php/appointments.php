<?php
    include '../templates/connect_db.php'; 
    include '../templates/sidebar_breadcrumb.php'; 
    try {
        
        $stmt = $pdo->query("
            SELECT 
                a.appointment_id, 
                a.appointment_date,
                a.appointment_slot, 
                a.status, 
                ui.fullname AS patient_name, 
                ti.fullname AS therapist_name
            FROM appointment a
            JOIN user_info ui ON a.patient_id = ui.user_id
            LEFT JOIN user_info ti ON a.therapist_id = ti.user_id
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
    <link rel="stylesheet" href="../assets/sidebar.css">
    <link rel="stylesheet" href="../assets/header.css">
    <link rel="stylesheet" href="../assets/appointments.css">

</head>
<body>

<h1>Appointments List</h1>
<nav class="breadcrumb">
    <a href="admin_dashboard.php">Home</a> /
    <a href="appointments.php">Appointment List</a> /

<table>
    <thead>
        <tr>
            <th>Appointment ID</th>
            <th>Patient Name</th>
            <th>Therapist Name</th>
            <th>Date</th>
            <th>Time slot</th>
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
            <td><?= $appointment['appointment_slot'] ?></td>
            <td><?= $appointment['status'] ?></td>
            <td><a href="edit_appointment.php?id=<?= $appointment['appointment_id'] ?>" class="edit-btn">Edit</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>