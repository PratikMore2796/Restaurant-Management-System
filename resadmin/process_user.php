<?php if (isset($_POST['submit'])) {
    require_once 'connection.php';
    $user_name = $_POST['user_name'];
    $pwd = $_POST['pwd'];
    if (empty($user_name)) {
        header("location:../add_users.php?username_empty");
    } elseif (empty($pwd)) {
        header("location:../add_users.php?password_empty");
    } else {
        $sql = "INSERT INTO res_staff(staff_username,staff_pass)VALUES (:username,:pass)";
        $stmt = $config->prepare($sql);
        $stmt->bindParam(':username', $user_name);
        $stmt->bindParam('pass', $pwd);
        $stmt->execute();
        $stmt->closeCursor();
        header("location:../add_users.php?useradded");
    }
}
