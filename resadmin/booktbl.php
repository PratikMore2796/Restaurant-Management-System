<?php require_once 'Auth.php';
require_once 'connection.php';
if (isset($_POST['submit'])) {
    $tblid = $_POST['tableid'];
    $userid = $_POST['userid'];
    $tablenumber = $_POST['tableno'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $booked = "Preparing";
    $sql = "UPDATE  res_tbl SET user_id = :userid ,tbl_status = :booked, res_date = :d_ate,res_timing = :t_ime  WHERE tbl_id = :tableid";
    $stmt = $config->prepare($sql);
    $stmt->bindParam(':userid', $userid);
    $stmt->bindParam(':booked', $booked);
    $stmt->bindParam(':d_ate', $date);
    $stmt->bindParam(':t_ime', $time);
    $stmt->bindParam(':tableid', $tblid);
    $stmt->execute();
    echo '<script>alert("Order Booked successfully");</script>';
    header('location:../Managetables.php');
} else {
    echo "Not entered";
}
