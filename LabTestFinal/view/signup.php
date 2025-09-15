<?php
    $error = $_GET['error'] ?? '';
    $errormsg = '';
    if ($error === 'empty_fields') {
        $errormsg = 'Please fill in all fields.';
    } elseif ($error === 'passwords_do_not_match') {
        $errormsg = 'Passwords do not match.';
    } elseif ($error === 'registration_failed') {
        $errormsg = 'Registration failed. User ID might already exist.';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <form method="post" action="../controller/signupCheck.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Registration</legend>
            <table>
                <tr>
                    <td>User ID:</td>
                    <td><input type="text" name="userid" value=""/></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" value=""/></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirmpassword" value=""/></td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" value=""/></td>
                </tr>
                <tr>
                    <td>User Type:</td>
                    <td>
                        <input type="radio" name="usertype" value="admin"/> Admin
                        <input type="radio" name="usertype" value="user"/> User
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Submit"/>
                        <a href='login.php'>Login</a>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
    <p style="color: red;"><?= htmlspecialchars($errormsg); ?></p>
</body>
</html>