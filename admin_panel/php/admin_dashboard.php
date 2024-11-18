<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../assets/dashboard.css">
<?php 
	include '../templates/connect_db.php';
	session_start();
	if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Admin') {
	    header("Location: ../../login_signup/login.php");
	    exit();
	}
	$admin_name = $_SESSION['userName'];

	try {
	    $stmt_users = $pdo->query("SELECT COUNT(id) FROM user_info WHERE user_type = 'Normal'");
	    $total_users = $stmt_users->fetchColumn();

	    $stmt_therapists = $pdo->query("SELECT COUNT(id) FROM user_info WHERE user_type = 'Therapist'");
	    $total_therapists = $stmt_therapists->fetchColumn();

	    $stmt_admins = $pdo->query("SELECT COUNT(id) FROM user_info WHERE user_type = 'Admin'");
	    $total_admins = $stmt_admins->fetchColumn();

	    $stmt_appointments = $pdo->query("SELECT COUNT(appointment_id) From appointments WHERE appointment_date = CURDATE()");
	    $todays_appointments = $stmt_appointments->fetchColumn();
	} catch (PDOException $e) {
	    echo "Error: " . $e->getMessage();
	}
?>
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

	<div class="w3-teal">
	    <div class="top-bar">
	        <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
	        <header class="header">
	            <div class="header-content">
	                <h2>Welcome, <?php echo $admin_name; ?></h2>
	            </div>
	        </header>
	    </div>
	</div>

	<div id="main">
	    <nav class="breadcrumb">
	        <a href="admin_dashboard.php">Home</a> /
	        <a href="../../home/home.php" target="_blank">Go to Website</a> /
	    </nav>

	    <h1>Dashboard</h1>

	    <main class="dashboard">
	        <div class="card-container">
	            <div class="card">
	                <h3>Users</h3>
	                <p id="user-count"></p>
	            </div>
	            <div class="card">
	                <h3>Therapists</h3>
	                <p id="therapist-count"></p>
	            </div>
	            <div class="card">
	                <h3>Admins</h3>
	                <p id="admin-count"></p>
	            </div>
	            <div class="card">
	                <h3>Today's Appointments</h3>
	                <p id="appointments-count"></p>
	            </div>
	        </div>
	    </main>
	</div>

	<script>
	    document.getElementById('user-count').innerText = <?php echo $total_users; ?>;
	    document.getElementById('therapist-count').innerText = <?php echo $total_therapists; ?>;
	    document.getElementById('admin-count').innerText = <?php echo $total_admins; ?>;
	    document.getElementById('appointments-count').innerText = <?php echo $todays_appointments; ?>;

	    function w3_open() {
	        document.getElementById("main").style.marginLeft = "15%";
	        document.getElementById("mySidebar").style.width = "15%";
	        document.getElementById("mySidebar").style.display = "block";
	        document.getElementById("openNav").style.display = 'none';
	    }
	    function w3_close() {
	        document.getElementById("main").style.marginLeft = "0";
	        document.getElementById("mySidebar").style.display = "none";
	        document.getElementById("openNav").style.display = "inline-block";
	    }
	</script>
</body>
</html>
