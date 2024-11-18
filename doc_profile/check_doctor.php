<?php
session_start();
include 'configure.php';

date_default_timezone_set('Asia/Kolkata');

$doctor_id = $_GET['doctor_id'] ?? null;
if (!$doctor_id) {
    echo "Invalid doctor ID.";
    exit();
}

// Fetch doctor details
try {
    $stmt = $pdo->prepare("SELECT therapist_id, speciality, bio FROM therapist_info WHERE therapist_id = ?");
    $stmt->execute([$doctor_id]);
    $doctor = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$doctor) {
        echo "Doctor not found.";
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}

?>