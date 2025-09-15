<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once '../model/db.php';
require_once '../model/userModel.php';

$conn = getConnection();

$errormsg = "";
$dashboard = "";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];

if ($user['user_type'] === 'admin') {
    $dashboard = 'admin_dashboard.php';
} else {
    $dashboard = 'user_dashboard.php';
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $current_password = trim($_POST['current_password']);
    $new_password = trim($_POST['new_password']);
    $retype_new_password = trim($_POST['retype_new_password']);
    $userid = $user['id'];

    $stmt = mysqli_prepare($con, "SELECT password FROM user WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "s", $userid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if ($row) {
        $db_password = $row['password'];

        if (!password_verify($current_password, $db_password)) {
            $errormsg = "Current password is incorrect.";
        } elseif ($new_password !== $retype_new_password) {
            $errormsg = "New passwords do not match.";
        } elseif (strlen($new_password) < 6) {
            $errormsg = "New password must be at least 6 characters long.";
        } else {
            $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
            
            $updated_user = [
                'id' => $userid,
                'name' => $user['name'],
                'password' => $hashed_new_password,
                'user_type' => $user['user_type']
            ];

            if (updateUser($updated_user)) {
                $errormsg = "Password changed successfully.";
            } else {
                $errormsg = "Error updating password.";
            }
        }
    } else {
        $errormsg = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <form method="post" action="" enctype="multipart/form-data">
        <fieldset>
            <legend>Change Password</legend>
            <table>
                <tr>
                    <td>Current Password:</td>
                    <td><input type="password" name="current_password" value=""/></td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td><input type="password" name="new_password" value=""/></td>
                </tr>
                <tr>
                    <td>Retype New Password:</td>
                    <td><input type="password" name="retype_new_password" value=""/></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Change"/>
                        <a href="<?= htmlspecialchars($dashboard); ?>">Home</a>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
    <p style="color: red;"><?= htmlspecialchars($errormsg); ?></p>
</body>
</html>