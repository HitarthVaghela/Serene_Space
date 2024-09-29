<?php
    include '../templates/connect_db.php';
    session_start();

    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        echo "Invalid appointment ID.";
        exit();
    }

    $appointment_id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("
            SELECT 
                a.appointment_id, 
                a.appointment_date, 
                a.status, 
                a.therapist_id, 
                ui.fullname AS patient_name
            FROM appointment a
            JOIN user_info ui ON a.patient_id = ui.user_id
            WHERE a.appointment_id = ?
        ");
        $stmt->execute([$appointment_id]);
        $appointment = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$appointment) {
            echo "Appointment not found.";
            exit();
        }

        $therapists = $pdo->query("SELECT user_id, fullname FROM user_info WHERE user_type = 'Therapist'")->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $appointment_date = $_POST['appointment_date'];
        $status = $_POST['status'];
        $therapist_id = $_POST['therapist_id'];

        try {
            $update_stmt = $pdo->prepare("
                UPDATE appointment 
                SET appointment_date = ?, status = ?, therapist_id = ? 
                WHERE appointment_id = ?
            ");
            $update_stmt->execute([$appointment_date, $status, $therapist_id, $appointment_id]);

            echo "Appointment updated successfully.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment</title>
    <link rel="stylesheet" href="../assets/dashboard.css">

</head>
<body>
<a href="appointments.php">Go back</a>
<h2>Edit Appointment</h2>

<form method="post" action="">
    <label for="appointment_date">Appointment Date:</label>
    <input type="date" name="appointment_date" value="<?= $appointment['appointment_date'] ?>" required>

    <label for="status">Status:</label>
    <select name="status">
        <option value="Scheduled" <?= $appointment['status'] == 'Scheduled' ? 'selected' : '' ?>>Scheduled</option>
        <option value="Completed" <?= $appointment['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
        <option value="Cancelled" <?= $appointment['status'] == 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
    </select>

    <label for="therapist_id">Assign Therapist:</label>
    <select name="therapist_id">
        <?php foreach ($therapists as $therapist): ?>
            <option value="<?= $therapist['user_id'] ?>" <?= $appointment['therapist_id'] == $therapist['user_id'] ? 'selected' : '' ?>>
                <?= $therapist['fullname'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Update Appointment</button>
</form>

</body>
</html>