<?php
require_once '../resadmin/connection.php';
$flag = true;
if ($_POST['staff_submit']) {
    $username = $_POST['staff_uname'];
    $pass = $_POST['staff_pass'];
    if (empty(trim($username))) {
        header("location:../Login.php?staff-username-empty");
        $flag = false;
        exit();
    }
    if (empty(trim($pass))) {
        header("location:../Login.php?staff-password-empty");
        $flag = false;
        exit();
    }
    if ($flag === true) {
        $sql = "SELECT staff_username FROM res_staff WHERE staff_username = :username";
        $stmt = $config->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $sql = "SELECT staff_pass FROM res_staff WHERE staff_pass = :pass";
            $stmt = $config->prepare($sql);
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                session_start();
                $_SESSION['username'] = $username;
                header('location:../resboard.php');
            } else {
                header("location:../Login.php?staff_invalid_password");
            }
        } else {
            header("location:../Login.php?un-authorize-admin-Access");
        }
    } else {
        header("location:../Login.php?un-authorize-user");
    }
}
