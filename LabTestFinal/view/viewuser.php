
<?php
    session_start();
    require_once('../model/userModel.php');
    if(!isset($_COOKIE['status'])){
        header('location: login.php?error=badrequest');
    }
    $users = getAllUser();
    //print_r($users);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of User</title>
</head>
<style>
    table, td,tr {
      border: 1px solid black;
      border-collapse: collapse;
    }
   </style>
<body>
        <table border="1">
            <tr>
                <td>ID</td>
                <td>NAME</td>
                <td>User Type</td>
               
            </tr>
        <?php  foreach($users as $u){ ?>
            <tr>
                <td><?php echo $u['id']; ?> </td>
                <td><?=$u['name'] ?> </td>
                <td><?=$u['user_type'] ?></td>
            </tr>

        <?php } ?>
        <tr> <td colspan="3" style="text-align:right"><a href='admin_dashboard.php'>Go HOME</a></td>
        </table>
</body>
</html>