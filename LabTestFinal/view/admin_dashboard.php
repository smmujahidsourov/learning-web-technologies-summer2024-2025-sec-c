<?php
    session_start();
    
    if (!isset($_SESSION['status']) || !$_SESSION['status'] || $_SESSION['user']['user_type'] !== 'admin') {
        header('location: login.php?error=unauthorized');
        exit();
    }
    
    $user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($user['name']); ?>!</h1>
   

    <ul>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="changepassword.php">Change Password</a></li>
        <li><a href="viewuser.php">View Users</a></li>
         <li><a href="../controller/logout.php">Logout</a></li>
    </ul>

    <br>
</body>
</html>