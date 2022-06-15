<?php require_once 'Auth.php';
require_once 'connection.php';
if (isset($_POST['submit'])) {
    $tblid = $_POST['tableid'];
    $tblstatus = $_POST['tblstatus'];
    $sql = "UPDATE  res_tbl SET tbl_status = :changestatus WHERE tbl_id = :tableid";
    $stmt = $config->prepare($sql);
    $stmt->bindParam(':changestatus', $tblstatus);
    $stmt->bindParam(':tableid', $tblid);
    $stmt->execute();
    echo '<script>alert("Order Booked successfully");</script>';
    header('location:../Managetables.php');
} else {
    echo "Not entered";
}
