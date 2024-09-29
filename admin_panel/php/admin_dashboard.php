<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link rel="stylesheet" href="../assets/dashboard.css">
	<link rel="stylesheet" href="../assets/sidebar.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<?php 
	include '../templates/connect_db.php' ;
	include '../templates/sidebar_breadcrumb.php';
    
	try {
	    $stmt_users = $pdo->query("SELECT COUNT(user_id) FROM user_info WHERE user_type = 'Normal'");
	    $total_users = $stmt_users->fetchColumn();

	    $stmt_therapists = $pdo->query("SELECT COUNT(user_id) FROM user_info WHERE user_type = 'Therapist'");
	    $total_therapists = $stmt_therapists->fetchColumn();

	    $stmt_admins = $pdo->query("SELECT COUNT(user_id) FROM user_info WHERE user_type = 'Admin'");
	    $total_admins = $stmt_admins->fetchColumn();
	} catch (PDOException $e) {
	    echo "Error: " . $e->getMessage();
	}
?>

<body>

	<nav class="breadcrumb">
    <a href="admin_dashboard.php">Home</a> /
    <a href="users.php">Users List</a> /
    <a href="../../home/home.html" target="_blank">Go to Website</a>
</nav>

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
