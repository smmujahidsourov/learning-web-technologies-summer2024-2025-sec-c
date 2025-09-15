<?php
    require_once('db.php');

    function login($user) {
        $con = getConnection();
        $sql = "SELECT id, password, user_type FROM user WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $user['userid']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($con);
    
        if ($row) {
            if (password_verify($user['password'], $row['password'])) {
                return true;
            }
        }
    
        return false;
    }


    function addUser($user) {
        $con = getConnection();
        $sql = "INSERT INTO user (id, name, password, user_type) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $user['userid'], $user['name'], $user['password'], $user['usertype']);
        $success = mysqli_stmt_execute($stmt);
        
        mysqli_close($con);
        
        return $success;
    }

    function getAllUser() {
        $con = getConnection();
        $sql = "SELECT * FROM user";
        $result = mysqli_query($con, $sql);
        $users = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }

        mysqli_close($con);
        return $users;
    }

    function getUserById($id) {
        $con = getConnection();
        $sql = "SELECT * FROM user WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        mysqli_close($con);
        return $user;
    }
    
    function updateUser($user) {
        $con = getConnection();
        $sql = "UPDATE user SET name = ?, password = ?, user_type = ? WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $user['name'], $user['password'], $user['user_type'], $user['id']);
        $success = mysqli_stmt_execute($stmt);

        mysqli_close($con);
        return $success;
    }

    function deleteUser($id) {
        $con = getConnection();
        $sql = "DELETE FROM user WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $id);
        $success = mysqli_stmt_execute($stmt);

        mysqli_close($con);
        return $success;
    }
?>