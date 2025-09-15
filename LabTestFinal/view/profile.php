<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location: login.php?error=unauthorized');
    exit();
}

$user = $_SESSION['user'];

$id = htmlspecialchars($user['id']);
$name = htmlspecialchars($user['name']);
$user_type = htmlspecialchars($user['user_type']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <style>
  table, td,tr {
      border: 1px solid black;
      border-collapse: collapse;
    }
    
  </style>
</head>
<body>
  <div class="container">
      <table>
        <tr>
          <td colspan="2">Profile</td>
        </tr>
        <tr>
          <td width="30%">ID</td>
          <td><?php echo $id; ?></td>
        </tr>
        <tr>
          <td>NAME</td>
          <td><?php echo $name; ?></td>
        </tr>
        <tr>
          <td>USER TYPE</td>
          <td><?php echo $user_type; ?></td>
        </tr>
        <tr>
          <td colspan="2" style="text-align: right;">
            <a href="user_dashboard.php" class="home-link">Go Home</a>
          </td>
        </tr>
      </table>
    
    
  </div>
</body>
</html>