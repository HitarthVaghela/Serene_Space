<?php
include '../templates/connect_db.php';
session_start();

date_default_timezone_set('Asia/Kolkata');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid appointment ID.";
    exit();
}

$appointment_id = $_GET['id'];

try {
    // SQL to retrieve the patient appointment details
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

    // Error message if no appointment is found
    if (!$appointment) {
        echo "Appointment not found.";
        exit();
    }

    // SQL Query to get all the therapists.
    $therapists = $pdo->query("SELECT user_id, fullname FROM user_info WHERE user_type = 'Therapist'")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Update the appointment of a user starts here.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointment_date = $_POST['appointment_date'];
    $appointment_slot = $_POST['appointment_slot'];
    $status = $_POST['status'];
    $therapist_id = $_POST['therapist_id'];

    // SQL query to check if the therapist is booked with the given date and time.
    //
    $check_stmt = $pdo->prepare("
        SELECT COUNT(*) FROM appointment 
        WHERE therapist_id = ? AND appointment_date = ? AND appointment_slot = ?
    ");
    $check_stmt->execute([$therapist_id, $appointment_date, $appointment_slot]);
    $existing_appointments = $check_stmt->fetchColumn();

    // If the therapist is booked display a message
    if ($existing_appointments > 0) {
        echo "<div class='message'><p>Therapist is already booked at this time.</p></div>";

        // If therapist is available proceed with the rescheduling of the appointments.
    } else {
        try {
            // SQL update query to reschedule the appointment of the patient.
            $update_stmt = $pdo->prepare("
                UPDATE appointment 
                SET appointment_date = ?, status = ?, therapist_id = ?, appointment_slot = ? 
                WHERE appointment_id = ?
            ");
            $update_stmt->execute([$appointment_date, $status, $therapist_id, $appointment_slot, $appointment_id]);

            // Display message if the updation is successful.
            echo "Appointment updated successfully.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

<!-- HTML FORM TO ACCEPT THE REQUIRED DETAILS FOR RESCHEDULING APPOINTMENTS -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment</title>
    <link rel="stylesheet" href="../assets/dashboard.css">
</head>
<body>

<!-- Backlink to go back to the Appointments page-->
<a href="appointments.php">Go back</a>

<h2>Edit Appointment</h2>

<!-- Form to collect appointment details-->
<form method="post">

    <!-- Input appointment date -->
    <label for="appointment_date">Appointment Date:</label>

    <input type="date" name="appointment_date" id="appointment_date" value="<?= $appointment['appointment_date'] ?>" required min="<?= date('Y-m-d') ?>"> <!-- Disable all the dates before today-->
    <br><br>

    <!-- Select the appointment slots-->
    <label for="appointment_slot">Appointment Slot:</label>
    <select name="appointment_slot" id="appointment_slot" required>
        <?php
        // The timeslots for the appointment meeting
        $time_slots = ['10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30'];

        // Fetch the current time 
        $current_time = date("H:i");

        // Only show options after the current time
        foreach ($time_slots as $slot) {
            // Convert both current time and time slot to DateTime objects
            $current_time_obj = DateTime::createFromFormat('H:i', $current_time);
            $slot_time_obj = DateTime::createFromFormat('H:i', $slot);

            // Calculate the time difference in total minutes
            $time_diff = ($slot_time_obj->getTimestamp() - $current_time_obj->getTimestamp()) / 60;

            // Check if the slot is at least 30 minutes after the current time
            if ($time_diff >= 30) {
                echo '<option value="' . $slot . '">' . $slot . '</option>';
            }
        }
        ?>
    </select>
    <br><br>

    <!-- -->

    <label for="status">Status:</label>
    <select name="status" id="status">
        <option value="Scheduled" <?= $appointment['status'] == 'Scheduled' ? 'selected' : '' ?>>Scheduled</option>
        <option value="Cancelled" <?= $appointment['status'] == 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
    </select>
    <br><br>

    <!-- -->
    <label for="therapist_id">Assign Therapist:</label>
    <select name="therapist_id" id="therapist_id">
        <?php foreach ($therapists as $therapist): ?>
            <option value="<?= $therapist['user_id'] ?>" <?= $appointment['therapist_id'] == $therapist['user_id'] ? 'selected' : '' ?>>
                <?= $therapist['fullname'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <!-- -->
    <button type="submit">Update Appointment</button>
</form>

</body>
</html>
