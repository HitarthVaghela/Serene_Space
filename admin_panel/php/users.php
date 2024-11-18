s<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users List</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="..\assets\appointment.css">
</head>
    
<?php
include '../templates/connect_db.php';
 include '../templates/connect_db.php' ;
    session_start();
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Admin') {
        header("Location: ../../login_signup/login.php.html");
        exit();
    }
    $admin_name = $_SESSION['userName'];

$records_per_page = 10;

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $current_page = (int)$_GET['page'];
} else {
    $current_page = 1;
}

$start_from = ($current_page - 1) * $records_per_page;

try {
    $total_users_query = $pdo->query("SELECT COUNT(*) FROM user_info WHERE user_type = 'Normal'");
    $total_users = $total_users_query->fetchColumn();

    $stmt = $pdo->prepare("
        SELECT u.id, u.fullname, u.email, 
               a.status, a.appointment_date, a.therapist_id 
        FROM user_info u 
        LEFT JOIN appointments a ON u.id = a.patient_id 
        WHERE u.user_type = 'Normal' 
        LIMIT :start, :limit");
        
    $stmt->bindParam(':start', $start_from, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $records_per_page, PDO::PARAM_INT);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

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
    <a href="users.php">User List</a> /
</nav>
<h1>Users List</h1>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Appointment Status</th>
                    <th>Appointment Details</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo htmlspecialchars($user['fullname']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['status']); ?></td>
                        <td>
                            <?php if ($user['status'] === 'Scheduled'): ?>
                                Date: <?php echo htmlspecialchars($user['appointment_date']); ?><br>
                                Therapist ID: <?php echo htmlspecialchars($user['therapist_id']); ?>
                            <?php else: ?>
                                <?php echo htmlspecialchars($user['status']); ?>
                            <?php endif; ?>
                        </td>
                        <td><a href="edit_user.php?id=<?php echo $user['id']; ?>" class="edit-btn">Edit</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="pagination">
        <?php
        $total_pages = ceil($total_users / $records_per_page);

        if ($current_page > 1) {
            echo '<a href="users.php?page=' . ($current_page - 1) . '">« Prev</a>';
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $current_page) {
                echo '<a href="users.php?page=' . $i . '" class="active">' . $i . '</a>';
            } else {
                echo '<a href="users.php?page=' . $i . '">' . $i . '</a>';
            }
        }

        if ($current_page < $total_pages) {
            echo '<a href="users.php?page=' . ($current_page + 1) . '">Next »</a>';
        }
        ?>
    </div>
</main>
<script>
function w3_open() {
    document.getElementById("main").style.marginLeft = "15%";
    document.getElementById("mySidebar").style.width = "15%";
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
