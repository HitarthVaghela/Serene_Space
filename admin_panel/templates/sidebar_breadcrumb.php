<?php
    session_start();
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Admin') {
        header("Location: ../../login_signup/sign_in.html");
        exit();
    }
    $admin_name = $_SESSION['userName'];
?>
<header class="header">
    <div class="header-content">
        <h2>Welcome <?php echo $admin_name; ?></h2>
    </div>
</header>

<div class="sidebar_container">
    <aside class="sidebar" id="sidebar">
        <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
        <ul>
            <li><a href="admin_dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li><a href="users.php"><i class="fas fa-users"></i><span>Users</span></a></li>
            <li><a href="therapist.php"><i class="fas fa-user-md"></i><span>Therapist</span></a></li>
            <!-- <li><a href="admin.php"><i class="fas fa-user-shield"></i><span>Admin</span></a></li> -->
            <li><a href="appointments.php"><i class="fas fa-calendar-check"></i><span>User Appointments</span></a></li>
            <!-- <li><a href="therapist_schedule.php"><i class="fas fa-calendar-alt"></i><span>Therapist Schedule</span></a></li> -->
            <li><a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
        </ul>
    </aside>
</div>

<script>
    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('collapsed');
    }
</script>