<?php
    session_start();
    require_once('../model/userModel.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userid = trim($_POST['userid']);
        $password = trim($_POST['password']);

        if (empty($userid) || empty($password)) {
            header('location: ../view/login.php?error=empty_fields');
            exit();
        }

        $user = [
            'userid' => $userid,
            'password' => $password
        ];

        $status = login($user);

        if ($status) {
            $userData = getUserById($userid);

            $_SESSION['status'] = true;
            $_SESSION['user'] = $userData;
            setcookie('status', true, time() + 3000, '/');

            if ($userData['user_type'] == 'admin') {
                header('location: ../view/admin_dashboard.php');
                exit();
            } else {
                header('location: ../view/user_dashboard.php');
                exit();
            }
        } else {
            header('location: ../view/login.php?error=invalid_user');
            exit();
        }
    } else {
        header('location: ../view/login.php');
        exit();
    }
?>