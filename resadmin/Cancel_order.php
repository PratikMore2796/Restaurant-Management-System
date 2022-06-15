<?php require_once 'Auth.php';
require_once 'connection.php';
if (isset($_POST['submit'])) {
    $tblid = $_POST['tableid'];
    $userid = $_POST['userid'];
    $tablenumber = $_POST['tableno'];
    $btiming = $_POST['b-timing'];
    $empty = "Empty";
    $sql = "UPDATE  res_tbl SET tbl_status = 'Empty' WHERE tbl_id = :tblid";
    $stmt = $config->prepare($sql);
    $stmt->bindParam(':tblid', $tblid);
    $stmt->execute();
    $sql2 = "DELETE FROM user_tbl WHERE user_id = $userid";
    $stmt2 = $config->prepare($sql2);
    $stmt2->execute();
    echo '<script>alert("Order cancel successfully");</script>';
    header('location:../Managetables.php');
} else {
    echo "Not entered";
}
