<?php
require_once '../resadmin/connection.php';
$flag = true;
if ($_POST['admin_submit']) {
    $username = $_POST['admin_uname'];
    $pass = $_POST['admin_pass'];

    if (empty(trim($username))) {
        header("location:../Login.php?admin_username-empty");
        $flag = false;
        exit();
    }
    if (empty(trim($pass))) {
        header("location:../Login.php?admin_password-empty");
        $flag = false;
        exit();
    }
    if ($flag === true) {
        $sql = "SELECT res_username FROM res_login WHERE res_username = :username";
        $stmt = $config->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $sql = "SELECT res_pass FROM res_login WHERE res_pass = :pass";
            $stmt = $config->prepare($sql);
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                session_start();
                $_SESSION['username'] = $username;
                header('location:../resboard.php');
            } else {
                header("location:../Login.php?admin_invalid_password");
            }
        } else {
            header("location:../Login.php?admin_un-authorize-user");
        }
    } else {
        header("location:../Login.php?admin_un-authorize-user");
    }
}
