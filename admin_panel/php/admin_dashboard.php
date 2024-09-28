<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link rel="stylesheet" href="../assets/admin_dashboard.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

	<script>
		function toggleSidebar() {
		    var sidebar = document.getElementById('sidebar');
		    sidebar.classList.toggle('collapsed');
		}
	</script>
</head>
<?php
include '../templates/connect_db.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'Admin') {
    header("Location: /Serene_Space/login_signup/sign_in.html");
    exit();
}

$admin_name = $_SESSION['username'];

try {
    $stmt_users = $pdo->query("SELECT COUNT(user_id) FROM user_info WHERE user_type = 'Normal'");
    $total_users = $stmt_users->fetchColumn();

    $stmt_therapists = $pdo->query("SELECT COUNT(user_id) FROM user_info WHERE user_type = 'Therapist'");
    $total_therapists = $stmt_therapists->fetchColumn();

    $stmt_admins = $pdo->query("SELECT COUNT(user_id) FROM user_info WHERE user_type = 'Admin'");
    $total_admins = $stmt_admins->fetchColumn();
	
    $today = date('Y-m-d');
    $stmt_appointments = $pdo->prepare("SELECT COUNT(*) FROM appointments WHERE appointment_date = ?");
    $stmt_appointments->execute([$today]);
    $todays_appointments = $stmt_appointments->fetchColumn();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<body>

<header class="header">
    <div class="header-content">
    	<h1>Welcome <?php echo $admin_name; ?></h1>
        <a href="../../home/home.html" target="_blank">Go to Website</a>
        <nav class="breadcrumb">
            <a href="admin_dashboard.php">Home</a>/<a href="admin_dashboard.php">Dashboard</a>
        </nav>
    </div>
</header>

<div class="sidebar_container">
	<aside class="sidebar" id="sidebar">
		<button class="toggle-btn" onclick="toggleSidebar()">☰</button>
		<ul>
		    <li><a href="admin_dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
		    <li><a href="users.php"><i class="fas fa-users"></i><span>Users</span></a></li>
		    <li><a href="therapist.php"><i class="fas fa-user-md"></i><span>Therapist</span></a></li>
		    <li><a href="admin.php"><i class="fas fa-user-shield"></i><span>Admin</span></a></li>
		    <li><a href="user_appointments.php"><i class="fas fa-calendar-check"></i><span>User Appointments</span></a></li>
		    <li><a href="therapist_schedule.php"><i class="fas fa-calendar-alt"></i><span>Therapist Schedule</span></a></li>
		    <li><a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
			</ul>

	</aside>
	<main class="dashboard">
		<h1> Dashboard </h1>
		<div class="card-container">
			<div class="card">
				<h3>Users</h3>
				<p id="user-count"> <?php echo $total_users; ?></p>
			</div>
			<div class="card">
				<h3>Therapists</h3>
				<p id="therapist-count"><?php echo $total_therapists; ?></p>
			</div>
			<div class="card">
				<h3>Admins</h3>
				<p id="admin-count"><?php echo $total_admins; ?></p>
			</div>
			<div class="card">
				<h3>Today's Appointments</h3>
				<p id="appointments-count">0</p>
			</div>
		</div>
	</main>
</div>
</body>
</html>

<script>
document.getElementById('user-count').innerText = <?php echo $total_users; ?>;
document.getElementById('therapist-count').innerText = <?php echo $total_therapists; ?>;
document.getElementById('admin-count').innerText = <?php echo $total_admins; ?>;
document.getElementById('appointments-count').innerText = <?php echo $todays_appointments; ?>;
</script>
