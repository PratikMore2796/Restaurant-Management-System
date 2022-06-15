<?php
include 'connection.php';
global $config;
function get_user_vegfood(){
    global $config;
    $sql = "SELECT SUM(veg_sabji_qua) FROM user_tbl";
    $statement = $config->prepare($sql);
    $statement->execute();
    $row = $statement->fetchColumn();
    $statement->closeCursor();
    $_SESSION['sum_veg_sabji_qua'] = $row;
    return $_SESSION['sum_veg_sabji_qua'];
}
function get_special_food(){
    global $config;

        $sql = "SELECT * FROM special_menu";
        $statement = $config->prepare($sql);
        $statement->execute();
        $row = $statement->fetchAll();
        $statement->closeCursor();
        return $row;

}
function get_sumof_spf(){
    global $config;
    $sql = "SELECT SUM(special_food_qua) FROM user_tbl";
    $statement = $config->prepare($sql);
    $statement->execute();
    $row = $statement->fetchColumn();
    $statement->closeCursor();
    $_SESSION['spf'] = $row;
    return $_SESSION['spf'];
}
function get_user_non_vegfood(){
    global $config;
    $sql = "SELECT SUM(non_veg_sabji_qua) FROM user_tbl";
    $statement = $config->prepare($sql);
    $statement->execute();
    $row = $statement->fetchColumn();
    $statement->closeCursor();
    $_SESSION['sum_non_veg_sabji_qua'] = $row;
    return $_SESSION['sum_non_veg_sabji_qua'];
}
function get_sumof_Vegfood(){
    global $config;
$sql = "SELECT SUM(Veg) FROM user_ratings";
$statement = $config->prepare($sql);
$statement->execute();
$row = $statement->fetchColumn();
$statement->closeCursor();
    $_SESSION['sum_veg'] = $row;
return $_SESSION['sum_veg'];
}
function get_sumof_Non_Vegfood(){
    global $config;
$sql = "SELECT SUM(Nonveg) FROM user_ratings";
$statement = $config->prepare($sql);
$statement->execute();
$row = $statement->fetchColumn();
$statement->closeCursor();
    $_SESSION['sum_non_veg'] = $row;
return $_SESSION['sum_non_veg'];
}function get_sumof_rice(){
    global $config;
$sql = "SELECT SUM(Rice) FROM user_ratings";
$statement = $config->prepare($sql);
$statement->execute();
$row = $statement->fetchColumn();
$statement->closeCursor();
    $_SESSION['sum_rice'] = $row;
return $_SESSION['sum_rice'];
}function get_sumof_roti(){
    global $config;
$sql = "SELECT SUM(Roti) FROM user_ratings";
$statement = $config->prepare($sql);
$statement->execute();
$row = $statement->fetchColumn();
$statement->closeCursor();
    $_SESSION['sum_roti'] = $row;
return $_SESSION['sum_roti'];
}function get_sumof_overall(){
    global $config;
$sql = "SELECT SUM(Overall) FROM user_ratings";
$statement = $config->prepare($sql);
$statement->execute();
$row = $statement->fetchColumn();
$statement->closeCursor();
    $_SESSION['sum_overall'] = $row;
return $_SESSION['sum_overall'];
}
function get_percentage($number,$percent)
{
    return($percent/100)*$number;
}
function split_bill($amount)
{
    return $amount/2;
}
function get_table_details($table)
{
    global $config;
    $sql = "SELECT tbl_id,user_id, tbl_number, res_date,res_timing, tbl_status FROM res_tbl Where tbl_id = :tblid";
    $stmt = $config->prepare($sql);
    $stmt->bindParam(':tblid',$table);
    $stmt -> execute();
    $row = $stmt->fetch();
    $_SESSION['tbl_id']= $row['tbl_id'];
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['tbl_number'] = $row['tbl_number'];
    $_SESSION['res_date'] = $row['res_date'];
    $_SESSION['res_timing'] = $row['res_timing'];
    $_SESSION['tbl_status'] = $row['tbl_status'];
    $stmt->closeCursor();
    return $_SESSION['tbl_id'] && $_SESSION['user_id']&&$_SESSION['res_timing']&&$_SESSION['res_date'] && $_SESSION['tbl_number'] && $_SESSION['res_date']&&$_SESSION['res_timing'] && $_SESSION['tbl_status'];
}

function get_userid_details()
{
    global $config;
    $sql = "SELECT user_id FROM user_tbl ORDER BY user_id DESC LIMIT 1";
    $stmt = $config->prepare($sql);
    $stmt -> execute();
    $row = $stmt->fetch();
    $_SESSION['user_id'] = $row['user_id'];
    $stmt->closeCursor();
    return $_SESSION['user_id'];
}
function get_user_details()
{
    global $config;
    $sql = "SELECT * FROM user_tbl ORDER BY user_id DESC LIMIT 1";
    $stmt = $config->prepare($sql);
    $stmt -> execute();
    $row = $stmt->fetch();
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['user_fname'] = $row['user_fname'];
    $_SESSION['user_lname'] = $row['user_lname'];
    $_SESSION['user_name'] = $_SESSION['user_fname']. $_SESSION['user_lname'];
    $_SESSION['user_mob'] = $row['user_mob'];
    $_SESSION['veg_sabji'] = $row['veg_sabji'];
    $_SESSION['veg_sabji_qua'] = $row['veg_sabji_qua'];
    $_SESSION['non_veg_sabji'] = $row['non_veg_sabji'];
    $_SESSION['non_veg_sabji_qua'] = $row['non_veg_sabji_qua'];
    $_SESSION['rice'] = $row['rice'];
    $_SESSION['rice_qua'] = $row['rice_qua'];
    $_SESSION['roti'] = $row['roti'];
    $_SESSION['roti_qua'] = $row['roti_qua'];
    $stmt->closeCursor();
    return $_SESSION['user_id'] && $_SESSION['user_name'] && $_SESSION['user_mob'] && $_SESSION['veg_sabji'] && $_SESSION['veg_sabji_qua'] && $_SESSION['non_veg_sabji'] && $_SESSION['non_veg_sabji_qua'] && $_SESSION['rice'] && $_SESSION['rice_qua'] && $_SESSION['roti'] && $_SESSION['roti_qua'];
}
function get_2user_details()
{
    global $config;
    $sql = "SELECT * FROM user_tbl ORDER BY user_id LIMIT 2";
    $stmt = $config->prepare($sql);
    $stmt -> execute();
    $row = $stmt->fetchAll();
    $_SESSION['user_id'] = $row[0]['user_id'];
    $_SESSION['user_fname'] = $row[0]['user_fname'];
    $_SESSION['user_lname'] = $row[0]['user_lname'];
    $_SESSION['user_name'] = $_SESSION['user_fname']. $_SESSION['user_lname'];
    $_SESSION['user_mob'] = $row[0]['user_mob'];
    $_SESSION['veg_sabji'] = $row[0]['veg_sabji'];
    $_SESSION['veg_sabji_qua'] = $row[0]['veg_sabji_qua'];
    $_SESSION['non_veg_sabji'] = $row[0]['non_veg_sabji'];
    $_SESSION['non_veg_sabji_qua'] = $row[0]['non_veg_sabji_qua'];
    $_SESSION['rice'] = $row[0]['rice'];
    $_SESSION['rice_qua'] = $row[0]['rice_qua'];
    $_SESSION['roti'] = $row[0]['roti'];
    $_SESSION['roti_qua'] = $row[0]['roti_qua'];
    $_SESSION['user2_id'] = $row[1]['user_id'];
    $_SESSION['user2_fname'] = $row[1]['user_fname'];
    $_SESSION['user2_lname'] = $row[1]['user_lname'];
    $_SESSION['username2'] = $_SESSION['user2_fname']. $_SESSION['user2_lname'];
    $_SESSION['user2_mob'] = $row[1]['user_mob'];
    $_SESSION['veg2_sabji'] = $row[1]['veg_sabji'];
    $_SESSION['veg2_sabji_qua'] = $row[1]['veg_sabji_qua'];
    $_SESSION['non2_veg_sabji'] = $row[1]['non_veg_sabji'];
    $_SESSION['non2_veg_sabji_qua'] = $row[1]['non_veg_sabji_qua'];
    $_SESSION['rice2'] = $row[1]['rice'];
    $_SESSION['rice2_qua'] = $row[1]['rice_qua'];
    $_SESSION['roti2'] = $row[1]['roti'];
    $_SESSION['roti2_qua'] = $row[1]['roti_qua'];
    $stmt->closeCursor();
    return $_SESSION['user_id']
        && $_SESSION['user2_id'] &&
        $_SESSION['user_name']
        && $_SESSION['username2'] &&
        $_SESSION['user_mob']
        && $_SESSION['user2_mob'] &&
        $_SESSION['veg_sabji']
        && $_SESSION['veg2_sabji'] &&
        $_SESSION['veg_sabji_qua']
        && $_SESSION['veg2_sabji_qua'] &&
        $_SESSION['non_veg_sabji']
        && $_SESSION['non2_veg_sabji'] &&
        $_SESSION['non_veg_sabji_qua']
        && $_SESSION['non2_veg_sabji_qua'] &&
        $_SESSION['rice']
        && $_SESSION['rice2'] &&
        $_SESSION['rice_qua']
        && $_SESSION['rice2_qua'] &&
        $_SESSION['roti']
        && $_SESSION['roti2'] &&
        $_SESSION['roti_qua']&&$_SESSION['roti2_qua'];
}


//Table1 function booking and events starts here
function get_booked_tbl1($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl1_bookedf' onclick='tbl1_booked()'
                     style='background-color: red;
                         text-align: center;
                         width: 40%; cursor: pointer'><h2>Table 001</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_ready_tbl1($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl1_ready_function' onclick='tbl1_ready()'
                     style='background-color: grey;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 001</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_prepared_tbl1($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl1_preparing_function' onclick='tbl1_preparing()'
                     style='background-color: green;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 001</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}

function get_empty_tbl1($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl1_empty_function' onclick='tbl1_empty()'
                     style='background-color: #FFFFFF;
                         text-align: center;
                         border: 2px #000000 solid;
                         width: 40%;cursor: pointer'><h2>Table 001</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
//Table1 booking and events Close here

//Table2 function booking and events starts here
function get_booked_tbl2($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl2_booked_function'onclick='tbl2_booked()'
                     style='background-color: red;
                         text-align: center;
                         width: 40%; cursor: pointer'><h2>Table 002</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_ready_tbl2($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl2_ready_function' onclick='tbl2_ready()'
                     style='background-color: grey;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 002</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_prepared_tbl2($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl2_preparing_function' onclick='tbl2_preparing'
                     style='background-color: green;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 002</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}

function get_empty_tbl2($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl2_empty_function' onclick='tbl2_empty()'
                     style='background-color: #FFFFFF;
                         text-align: center;
                         border: 2px #000000 solid;
                         width: 40%;cursor: pointer'><h2>Table 002</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
//Table2 booking and events Close here
//Table3 function booking and events starts here
function get_booked_tbl3($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl3_booked_function' onclick='tbl3_booked()'
                     style='background-color: red;
                         text-align: center;
                         width: 40%; cursor: pointer'><h2>Table 003</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_ready_tbl3($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl3_ready_function' onclick='tbl3_ready()'
                     style='background-color: grey;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 003</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_prepared_tbl3($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl3_preparing_function'onclick='tbl3_preparing()' 
                     style='background-color: green;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 003</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}

function get_empty_tbl3($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl3_emptyf'
                     style='background-color: #FFFFFF;onclick='tbl3_empty()'
                         text-align: center;
                         border: 2px #000000 solid;
                         width: 40%;cursor: pointer'><h2>Table 003</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
//Table3 booking and events Close here
//Table4 function booking and events starts here
function get_booked_tbl4($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl4_bookedf'onclick='function tbl4_booked()'
                     style='background-color: red;
                         text-align: center;
                         width: 40%; cursor: pointer'><h2>Table 004</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_ready_tbl4($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl4_readyf'onclick='tbl4_ready()'
                     style='background-color: grey;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 004</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_prepared_tbl4($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl4_preparingf'onclick='tbl4_preparing()'
                     style='background-color: green;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 004</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}

function get_empty_tbl4($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl4_emptyf'onclick='tbl4_empty()'
                     style='background-color: #FFFFFF;
                         text-align: center;
                         border: 2px #000000 solid;
                         width: 40%;cursor: pointer'><h2>Table 004</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
//Table4 booking and events Close here
//Table5 function booking and events starts here
function get_booked_tbl5($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl5_bookedf'onclick='tbl5_booked()
                     style='background-color: red;
                         text-align: center;
                         width: 40%; cursor: pointer'><h2>Table 005</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_ready_tbl5($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl5_readyf'onclick='tbl5_ready()'
                     style='background-color: grey;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 005</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_prepared_tbl5($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl5_preparingf'onclick='tbl5_preparing()'
                     style='background-color: green;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 005</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}

function get_empty_tbl5($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl5_emptyf'onclick='tbl5_empty()'
                     style='background-color: #FFFFFF;
                         text-align: center;
                         border: 2px #000000 solid;
                         width: 40%;cursor: pointer'><h2>Table 005</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
//Table5 booking and events Close here

//Table6 function booking and events starts here
function get_booked_tbl6($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl6_bookedf'onclick='tbl6_booked()'
                     style='background-color: red;
                         text-align: center;
                         width: 40%; cursor: pointer'><h2>Table 006</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_ready_tbl6($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl6_readyf'onclick='tbl6_ready()'
                     style='background-color: grey;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 006</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_prepared_tbl6($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl6_preparingf'onclick='tbl6_preparing()'
                     style='background-color: green;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 006</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}

function get_empty_tbl6($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl6_emptyf'onclick='tbl6_empty()'
                     style='background-color: #FFFFFF;
                         text-align: center;
                         border: 2px #000000 solid;
                         width: 40%;cursor: pointer'><h2>Table 006</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
//Table6 booking and events Close here
//Table7 function booking and events starts here
function get_booked_tbl7($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl7_bookedf'onclick='tbl7_booked()'
                     style='background-color: red;
                         text-align: center;
                         width: 40%; cursor: pointer'><h2>Table 007</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_ready_tbl7($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl7_readyf'onclick='tbl7_ready()'
                     style='background-color: grey;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 007</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_prepared_tbl7($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl7_preparingf'onclick='tbl7_preparing()'
                     style='background-color: green;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 007</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}

function get_empty_tbl7($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl7_emptyf'onclick='tbl7_empty()'
                     style='background-color: #FFFFFF;
                         text-align: center;
                         border: 2px #000000 solid;
                         width: 40%;cursor: pointer'><h2>Table 007</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
//Table7 booking and events Close here
//Table8 function booking and events starts here
function get_booked_tbl8($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl8_bookedf'onclick='tbl8_booked()'
                     style='background-color: red;
                         text-align: center;
                         width: 40%; cursor: pointer'><h2>Table 008</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_ready_tbl8($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl8_readyf'onclick='tbl8_ready()'
                     style='background-color: grey;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 008</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_prepared_tbl8($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl8_preparingf'onclick='tbl8_preparing()'
                     style='background-color: green;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 008</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}

function get_empty_tbl8($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl8_emptyf'onclick='tbl8_empty()'
                     style='background-color: #FFFFFF;
                         text-align: center;
                         border: 2px #000000 solid;
                         width: 40%;cursor: pointer'><h2>Table 008</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
//Table8 booking and events Close here
//Table9 function booking and events starts here
function get_booked_tbl9($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl9_bookedf'onclick='tbl9_booked()'
                     style='background-color: red;
                         text-align: center;
                         width: 40%; cursor: pointer'><h2>Table 009</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_ready_tbl9($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl9_readyf'onclick='tbl9_ready()'
                     style='background-color: grey;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 009</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_prepared_tbl9($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl9_preparingf'onclick='tbl9_preparing()'
                     style='background-color: green;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 009</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}

function get_empty_tbl9($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl9_emptyf'onclick='tbl9_empty()'
                     style='background-color: #FFFFFF;
                         text-align: center;
                         border: 2px #000000 solid;
                         width: 40%;cursor: pointer'><h2>Table 009</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
//Table9 booking and events Close here
//Table10 function booking and events starts here
function get_booked_tbl10($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl10_bookedf'onclick='tbl10_booked()'
                     style='background-color: red;
                         text-align: center;
                         width: 40%; cursor: pointer'><h2>Table 0010</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_ready_tbl10($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl10_readyf'onclick='tbl10_ready()'
                     style='background-color: grey;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 0010</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
function get_prepared_tbl10($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl10_preparingf'onclick='tbl10_preparing()'
                     style='background-color: green;
                         text-align: center;
                         width: 40%;cursor: pointer'><h2>Table 0010</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}

function get_empty_tbl10($tbl_number, $res_date,$res_timing, $tbl_status)
{
    echo "<div class='container' id='tbl10_emptyf'onclick='tbl10_empty()'
                     style='background-color: #FFFFFF;
                         text-align: center;
                         border: 2px #000000 solid;
                         width: 40%;cursor: pointer'><h2>Table 0010</h2>
                    <h3> ".$tbl_number."</h3><br>"
        .$res_date."<br>"
        .$res_timing
        .$tbl_status."
            </div>";
}
//Table10 booking and events Close here

?>