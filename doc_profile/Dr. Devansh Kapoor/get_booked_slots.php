<?php
include '../configure.php';

header('Content-Type: application/json');
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $date = $_GET['selected_date'] ?? null;
    $doctor_id = $_GET['doctor_id'] ?? null;
} else {
    echo json_encode(['error' => 'User ID not set in session']);
    exit();
}

if (!$doctor_id || !$date) {
    echo json_encode(['error' => 'Missing doctor ID or date']);
    exit();
}

try {
    $stmt = $pdo->prepare("SELECT appointment_time FROM appointments WHERE therapist_id = ? AND appointment_date = ?");
    error_log("Executing query with Doctor ID: $doctor_id, Date: $date");
    $stmt->execute([$doctor_id, $date]);
    $bookedSlots = $stmt->fetchAll(PDO::FETCH_COLUMN);

    if (!$bookedSlots) {
        error_log("No slots found for Doctor ID: $doctor_id, Date: $date");
    }

    echo json_encode($bookedSlots);
} catch (PDOException $e) {
    error_log("Database Error: " . $e->getMessage());
    echo json_encode(['error' => 'Database error']);
    exit();
}
?>
