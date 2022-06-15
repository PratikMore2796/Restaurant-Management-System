<?php
require_once('../resadmin/Auth.php');require_once ('../resadmin/connection.php');require_once ('../resadmin/admin_fun.php');?><?php $tbl1 = "1";$tbl2 = "2";$tbl3 = "3";$tbl4 = "4";$tbl5 = "5";$tbl6 = "6";$tbl7 = "7";$tbl8 = "8";$tbl9 = "9";$tbl10 = "10";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Tables</title>
    <link rel="shortcut icon" href="../img/logo.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/navbar.css">
    <link rel="shortcut icon" href="../img/logo.png" />
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header"> <a class="nav-link" style="color: #FFFFFF"><img src="../img/logo.png"
                        height="50"
                        width="40"><?php if($_SESSION['username'] == "admin")                {                    echo "Admin";                }                else                {                    echo "Staff";                }                ?></a>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <div class='col'><a href="../resboard.php" style="text-decoration: none">
                            <div class="navbuttons">Home</div>
                        </a></div>
                </li>
                <li class="active">
                    <div class='col'><a href="../CreateOrder.php" style="text-decoration: none">
                            <div class="navbuttons">Create New Order</div>
                        </a></div>
                </li>
                <li>
                    <div class='col'><a href="../Managetables.php" style="text-decoration: none">
                            <div class="navbuttons">Manage Tables</div>
                        </a></div>
                </li>
                <li> <?php                if($_SESSION['username'] == "admin")                {                    echo "<div class='col'><a href='../add_users.php' style='text-decoration: none'><div class='navbuttons'>Manage users</div></a></div>";                }                else                {                    echo "";                }                ?>
                    <?php                if($_SESSION['username'] == "admin")                {                    echo "                        <div class='col'><a href='../add_special_food.php' style='text-decoration: none'><div class='navbuttons'>Add Menu Item</div></a></div>                    ";                }                else                {                    echo "";                }                ?>
                </li>
                <li>
                    <div class='col'><a href="../Logout.php" style="text-decoration: none">
                            <div class="navbuttons">Logout</div>
                        </a></div>
                </li>
            </ul>
        </nav>
        <div class="container-fluid" style="padding: 10px">
            <div class="row">
                <div class="col">
                    <div class="row" style="padding: 10px;"></div>
                    <div class="row" style="padding: 10px"><button type="button" id="sidebarCollapse"
                            class="btn btn-info navbar-btn"> <i class="glyphicon glyphicon-align-left"></i>
                            <span>&#9776;</span> </button></div>
                    <div class="row" style="padding: 10px;font-size: 24px; margin-top: 20px">Pay Bill</div>
                    <div class="row" style="padding-left: 5px"> <?php get_user_details();?> <div
                            class="table-responsive-xl">
                            <table class="table table-striped table-bordered  table-condensed table-light">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Customer Details</th>
                                        <th>Food</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Customer ID :<?php echo $_SESSION['user_id']?></td>
                                        <td>Veg Sabji : <?php echo $_SESSION['veg_sabji']?></td>
                                        <td><?php echo $_SESSION['veg_sabji_qua']?></td>
                                        <td>$<?php                                    if($_SESSION['veg_sabji'] == "aloomatar") {$veg_sabji = 10;echo $veg_sabji;}                                    elseif($_SESSION['veg_sabji'] == "aloogobi") {$veg_sabji = 8;echo $veg_sabji;}                                    elseif($_SESSION['veg_sabji'] == "chanamasala") {$veg_sabji = 9;echo $veg_sabji;}                                    elseif($_SESSION['veg_sabji'] == "mixvegetables") {$veg_sabji = 11;echo $veg_sabji;}                                    elseif($_SESSION['veg_sabji'] == "matarpaneer") {$veg_sabji = 12;echo $veg_sabji;}                                    elseif($_SESSION['veg_sabji'] == "paneertikka") {$veg_sabji = 10;echo $veg_sabji;}                                    elseif($_SESSION['veg_sabji'] == "paneertikkamasala") {$veg_sabji = 8;echo $veg_sabji;}                                    else {$veg_sabji = 0;echo $veg_sabji;}                                    ?>
                                        </td>
                                        <td>$<?php $total_veg_sabji= $_SESSION['veg_sabji_qua'];if($total_veg_sabji == "none") {$total_v_s = 0; echo $total_v_s;}                                        else{                                            $total_v_s = $total_veg_sabji*$veg_sabji;                                            echo $total_v_s;                                        }?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Customer Name : <?php echo $_SESSION['user_name']?></td>
                                        <td>Non Veg Sabji : <?php echo $_SESSION['non_veg_sabji']?></td>
                                        <td><?php echo $_SESSION['non_veg_sabji_qua']?></td>
                                        <td>$<?php                                    if($_SESSION['non_veg_sabji'] == "butterchicken") {$non_veg_sabji = 10;echo $non_veg_sabji;}                                    elseif($_SESSION['non_veg_sabji'] == "Beef sizzler") {$non_veg_sabji = 8;echo $non_veg_sabji;}                                    elseif($_SESSION['non_veg_sabji'] == "chickentikka") {$non_veg_sabji = 9;echo $non_veg_sabji;}                                    elseif($_SESSION['non_veg_sabji'] == "chickentikkamasala") {$non_veg_sabji = 11;echo $non_veg_sabji;}                                    elseif($_SESSION['non_veg_sabji'] == "chickenshawerma") {$non_veg_sabji = 12;echo $non_veg_sabji;}                                    elseif($_SESSION['non_veg_sabji'] == "chickenvindloo") {$non_veg_sabji = 10;echo $non_veg_sabji;}                                    else {$non_veg_sabji = 0;echo $non_veg_sabji;}                                    ?>
                                        </td>
                                        <td>$<?php $total_non_veg_sabji= $_SESSION['non_veg_sabji_qua'];                                if($total_non_veg_sabji == "none") {$total_non_vs = 0; echo $total_non_vs;}                                    else{                                        $total_non_vs =  $total_non_veg_sabji*$non_veg_sabji;                                        echo $total_non_vs;                                    }?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Customer Mobile Number : <?php echo $_SESSION['user_mob'] ?></td>
                                        <td>Rice : <?php echo $_SESSION['rice']?></td>
                                        <td><?php echo $_SESSION['rice_qua']?></td>
                                        <td>$<?php                                    if($_SESSION['rice'] == "plainrice") {$rice = 5;echo $rice;}                                    elseif($_SESSION['rice'] == "basmati") {$rice = 10;echo $rice;}                                    elseif($_SESSION['rice'] == "chickenbiryani") {$rice = 15;echo $rice;}                                    elseif($_SESSION['rice'] == "matonbiryani") {$rice = 15;echo $rice;}                                    elseif($_SESSION['rice'] == "jirarice") {$rice = 8;echo $rice;}                                    else {$rice = 0;echo $rice;}                                    ?>
                                        </td>
                                        <td>$<?php $total_rice= $_SESSION['rice_qua'];                                    if($total_rice == "none") {$grand_total_rice=0;echo $grand_total_rice;}                                    else{                                        $grand_total_rice =  $total_rice*$rice;                                        echo $grand_total_rice;                                    }?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Roti : <?php echo $_SESSION['roti']?></td>
                                        <td><?php echo $_SESSION['roti_qua']?></td>
                                        <td>$<?php                                    if($_SESSION['roti'] == "plainroti") {$roti = 2;echo $roti;}                                    elseif($_SESSION['roti'] == "rumalroti") {$roti = 4;echo $roti;}                                    elseif($_SESSION['roti'] == "parathas") {$roti = 5;echo $roti;}                                    elseif($_SESSION['roti'] == "butterroti") {$roti = 6;echo $roti;}                                    elseif($_SESSION['roti'] == "oilroti") {$roti = 3;echo $roti;}                                    else {$roti = 0;echo $roti;}                                    ?>
                                        </td>
                                        <td>$<?php $total_roti= $_SESSION['roti_qua'];                                    if($total_roti == "none") {$grand_total_roti=0;echo $grand_total_roti;}                                    else{                                        $grand_total_roti =  $total_roti*$roti;                                        echo $grand_total_roti;                                    }?>
                                        </td>
                                    </tr>
                                    <tr style="background-color: #1e1f23; color: #FFFFFF;font-weight: bold">
                                        <td>Total:
                                            $<?php $total = $total_v_s + $total_non_vs + $grand_total_rice + $grand_total_roti;                                    echo $total;?>
                                        </td>
                                        <td>Tax:15% </td>
                                        <td>$<?php $percentage = get_percentage($total,15); echo $percentage?></td>
                                        <td>Total </td>
                                        <td> <?php $tax_Plus_Total = $total + $percentage; echo $tax_Plus_Total;?> </td>
                                    </tr>
                                    <tr>
                                        <td><button name="tip" onclick="addtip()" class="btn btn-primary">Tip</button>
                                        </td>
                                        <td id="tip"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <button onclick="window.print()" style=" width: 100px" class="btn btn-primary">Print
                        </button> </div>
                </div>
                <div class="row" style="padding-top: 20px"> </div>
            </div>
            <div class="col">
                <div class="row" style="padding: 10px;"></div>
                <div class="row" style="padding: 10px"></div>
                <div class="row" style="padding: 10px;font-size: 24px; margin-top: 20px"></div>
                <div class="row" style="padding: 10px;font-size: 24px; margin-top: 20px"></div>
                <div class="row"> </div>
            </div>
            <div class="col">
                <div class="row" style="padding: 10px;"></div>
                <div class="row" style="padding: 10px"></div>
                <div class="row" style="padding: 10px;font-size: 24px; margin-top: 20px"></div>
                <div class="row" style="padding: 10px;font-size: 24px; margin-top: 20px"></div>
                <div class="row"> </div>
                <div class="row" style="padding-top: 20px"> </div>
            </div>
        </div>
    </div><!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script><!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>
    <script>
    function addtip() {
        var totalbill = <?php echo $tax_Plus_Total?>;
        var person = prompt("Please enter your Tip", 0);
        var tip = parseInt(person);
        var billamount = Number(totalbill) + Number(tip);
        return document.getElementById("tip").innerHTML = "Total+Tip = $" + billamount;
    }
    </script>
</body>

</html>