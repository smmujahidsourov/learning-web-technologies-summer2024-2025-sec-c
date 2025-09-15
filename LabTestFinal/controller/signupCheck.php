<?php
    session_start();
    require_once('../model/userModel.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userid = trim($_POST['userid']);
        $name = trim($_POST['name']);
        $password = trim($_POST['password']);
        $confirmPassword = trim($_POST['confirmpassword']);
        $usertype = trim($_POST['usertype']);

        if (empty($userid) || empty($name) || empty($password) || empty($confirmPassword) || empty($usertype)) {
            header('location: ../view/signup.php?error=empty_fields');
            exit();
        }

        if ($password !== $confirmPassword) {
            header('location: ../view/signup.php?error=passwords_do_not_match');
            exit();
        }

     
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $user = [
            'userid' => $userid,
            'name' => $name,
            'password' => $hashedPassword,
            'usertype' => $usertype
        ];
        

        $status = addUser($user);
        
        if ($status) {
           header('location: ../view/login.php?success=registration_successful');
           exit();
        } else {
            header('location: ../view/signup.php?error=registration_failed');
            exit();
        }
    } else {
        header('location: ../view/signup.php');
        exit();
    }
?>