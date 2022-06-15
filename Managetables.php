<?php
require_once('resadmin/Auth.php');
require_once ('resadmin/connection.php');
require_once ('resadmin/admin_fun.php');
?>
<?php $tbl1 = "1";
$tbl2 = "2";
$tbl3 = "3";
$tbl4 = "4";
$tbl5 = "5";
$tbl6 = "6";
$tbl7 = "7";
$tbl8 = "8";
$tbl9 = "9";
$tbl10 = "10";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Tables</title>
    <link rel="shortcut icon" href="img/logo.png"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="shortcut icon" href="img/logo.png"/>
</head>
<body>
   
<!-- 1st Table Content Start Here-->
<div id="tbl1_booked" class="w3-modal">
    <!-- Modal content -->
    <div class="w3-modal-content">
        <div class="w3-container">
        <span onclick="document.getElementById('tbl1_booked').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <p>This Table is already Booked Do you want to cancle the Order </p>
        <p><button onclick="cancle_order_tbl1()" class="btn btn-primary">Cancle Now</button></p>
        <p><button onclick="paybill()" style="padding: 20px; " class="btn btn-primary">Pay My Bill</button></p>
        <p><button onclick="splitbill()" style="padding: 20px; " class="btn btn-primary">Split My Bill </button></p>
        </div>
    </div>
</div>
<div id="tbl1_ready" class="w3-modal">
    <!-- Modal content -->
    <div class="w3-modal-content">
        <div class="w3-container">
            <span onclick="document.getElementById('tbl1_ready').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <p>This Table is ready Do you want to cancle the Order </p>
        <p><button onclick="cancle_order_tbl1()" class="btn btn-primary">Cancle Now</button></p>
        <p><button onclick="changeStatus_order_tbl1()" class="btn btn-primary">Change Status</button></p>
        </div>
    </div>
</div>
<div id="tbl1_preparing" class="w3-modal">

    <!-- Modal content -->
    <div class="w3-modal-content">
        <div class="w3-container">
            <span onclick="document.getElementById('tbl1_preparing').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <p>This Table is empty Do you want to Book the Order </p>
        <p><button onclick="cancle_order_tbl1()" class="btn btn-primary">Cancle Now</button></p>
        <p><button onclick="changeStatus_order_tbl1()" class="btn btn-primary">Change Status</button></p>
        </div>
    </div>
</div>
<div id="tbl1_empty" class="w3-modal">
    <!-- Modal content -->
    <div class="w3-modal-content">
        <div class="w3-container">
            <span onclick="document.getElementById('tbl1_empty').style.display=''" class="w3-button w3-display-topright">&times;</span>
            <p>This Table is empty Do you want to Book the Order </p>
        <p><button onclick="update_order_tbl1()" class="btn btn-primary">Book Order</button></p>
        <p><button onclick="changeStatus_order_tbl1()" class="btn btn-primary">Change Status</button></p>
        </div>
    </div>
</div>
<!-- 1st Table Content Ends   Here-->

<!-- 2st Table Content Start Here-->
<div id="tbl2_booked" class="w3-modal">
    <!-- Modal content -->
    <div class="w3-modal-content">
        <div class="w3-container">
            <span onclick="document.getElementById('tbl2_booked').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <p>This Table is already Booked Do you want to cancle the Order </p>
        <p><button onclick="cancle_order_tbl2()" class="btn btn-primary">Cancle Now</button></p>
        <p><button onclick="paybill()" style="padding: 20px;" class="btn btn-primary">Pay My Bill</button></p>
        <p><button onclick="splitbill()" style="padding: 20px; " class="btn btn-primary">Split My Bill </button></p>
        </div>
    </div>
</div>
<div id="tbl2_ready" class="w3-modal">
    <!-- Modal content -->
    <div class="w3-modal-content">
        <div class="w3-container">
            <span onclick="document.getElementById('tbl2_ready').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <p>This Table is ready Do you want to cancle the Order </p>
        <p><button onclick="cancle_order_tbl2()" class="btn btn-primary">Cancle Now</button></p>
        <p><button onclick="changeStatus_order_tbl2()" class="btn btn-primary">Change Status</button></p>
        </div>
    </div>
</div>
<div id="tbl2_preparing" class="w3-modal">

    <!-- Modal content -->
    <div class="w3-modal-content">
        <div class="w3-container">
            <span onclick="document.getElementById('tbl2_preparing').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <p>This Table is empty Do you want to Book the Order </p>
        <p><button onclick="cancle_order_tbl2()" class="btn btn-primary">Cancle Now</button></p>
        <p><button onclick="changeStatus_order_tbl2()" class="btn btn-primary">Change Status</button></p>
        </div>
    </div>
</div>
<div id="tbl2_empty" class="w3-modal">
    <!-- Modal content -->
    <div class="w3-modal-content">
        <div class="w3-container">
            <span onclick="document.getElementById('tbl2_empty').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <p>This Table is empty Do you want to Book the Order </p>
        <p><button onclick="update_order_tbl2()" class="btn btn-primary">Book Order</button></p>
        <p><button onclick="changeStatus_order_tbl2()" class="btn btn-primary">Change Status</button></p>
        </div>
    </div>
</div>
<!-- 2st Table Content Ends   Here-->

<!-- 10th Table Content Ends   Here-->

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a class="nav-link" style="color: #FFFFFF"><img src="img/logo.png" height="50" width="40"><?php if($_SESSION['username'] == "admin")
                    {
                        echo "Admin";

                    }
                    else
                    {
                        echo "Staff";
                    }
                    ?></a>
            </div>

            <ul class="list-unstyled components">
                <li >
                    <div class='col'><a href="resboard.php" style="text-decoration: none"><div class="navbuttons">Home</div></a></div>
                </li>
                <li class="active">
                    <div class='col'><a href="CreateOrder.php" style="text-decoration: none">
                            <div class="navbuttons">Create New Order</div>
                        </a></div>
                </li>
                <li>
                    <div class='col'><a href="Managetables.php" style="text-decoration: none"><div class="navbuttons">Manage Tables</div></a></div>
                </li>
                <li>
                    <?php
                    if($_SESSION['username'] == "admin")
                    {
                        echo "<div class='col'><a href='add_users.php' style='text-decoration: none'><div class='navbuttons'>Manage users</div></a></div>";
                    }
                    else
                    {
                        echo "";
                    }
                    ?>
                    <?php
                    if($_SESSION['username'] == "admin")
                    {
                        echo "
                        <div class='col'><a href='add_special_food.php' style='text-decoration: none'><div class='navbuttons'>Add Menu Item</div></a></div>
                    ";
                    }
                    else
                    {
                        echo "";
                    }
                    ?>
                </li>
                <li>
                    <div class='col'><a href="Logout.php" style="text-decoration: none">
                            <div class="navbuttons">Logout</div>
                        </a></div>
                </li>
            </ul>

        </nav>
        <div class="container-fluid" style="padding: 10px">
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                <i class="glyphicon glyphicon-align-left"></i>
                <span>&#9776;</span>
            </button>
        <div class="col">
            <div class="row" style="padding: 10px;font-size: 24px; ">Manage Tables</div>
            <div class="row">
            <?php get_table_details($tbl1);?>
                <?php if($_SESSION['tbl_status'] == "Booked")
                    {
                        get_booked_tbl1($_SESSION['tbl_number'],$_SESSION['res_timing'],$_SESSION['res_date'],$_SESSION['tbl_status']);
                    }
                    elseif($_SESSION['tbl_status'] == "Ready")
                    {
                        get_ready_tbl1($_SESSION['tbl_number'],$_SESSION['res_timing'],$_SESSION['res_date'],$_SESSION['tbl_status']);
                    }
                    elseif($_SESSION['tbl_status'] == "Preparing")
                    {
                        get_prepared_tbl1($_SESSION['tbl_number'],$_SESSION['res_timing'],$_SESSION['res_date'],$_SESSION['tbl_status']);
                    }
                    else
                        {
                            get_empty_tbl1($_SESSION['tbl_number'],$_SESSION['res_timing'],$_SESSION['res_date'],$_SESSION['tbl_status']);
                        } ?>
                <?php get_table_details($tbl2);?>
                <?php if($_SESSION['tbl_status'] == "Booked")
                {
                    get_booked_tbl2($_SESSION['tbl_number'],$_SESSION['res_timing'],$_SESSION['res_date'],$_SESSION['tbl_status']);
                }
                elseif($_SESSION['tbl_status'] == "Ready")
                {
                    get_ready_tbl2($_SESSION['tbl_number'],$_SESSION['res_timing'],$_SESSION['res_date'],$_SESSION['tbl_status']);
                }
                elseif($_SESSION['tbl_status'] == "Preparing")
                {
                    get_prepared_tbl2($_SESSION['tbl_number'],$_SESSION['res_timing'],$_SESSION['res_date'],$_SESSION['tbl_status']);
                }
                else
                {get_empty_tbl2($_SESSION['tbl_number'],$_SESSION['res_timing'],$_SESSION['res_date'],$_SESSION['tbl_status']);
                } ?>

                
            </div>
        </div>
    </div>
</div>
<script src="js/table_functions.js"></script>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/table_functions.js"></script>
   
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
<script>
    function on() {
        document.getElementById("payment_option").style.display = "block";
    }

    function off() {
        document.getElementById("payment_option").style.display = "none";
    }
    
</script>

</body>
</html>
