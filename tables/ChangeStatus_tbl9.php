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
                    <div class="row" style="padding: 10px;font-size: 24px; margin-top: 20px">Change Status Table Number
                        009</div>
                    <div class="row" style="padding-left: 10px"> <?php get_table_details($tbl9);?> <form
                            action="../resadmin/changeStatus.php" method="post" style="padding: 10px"> <label
                                for="tableid">Table ID:</label> <input type="text" class="form-control" name="tableid"
                                value="<?php echo $_SESSION['tbl_id'];?>" id="tblid"> <label for="tableid">User
                                ID:</label> <input type="text" class="form-control" name="userid"
                                value="<?php get_userid_details($tbl1); echo $_SESSION['user_id'];?>" id="tblid"> <label
                                for="tableno">Table Number:</label> <input type="text" class="form-control"
                                name="tableno" value="<?php echo $_SESSION['tbl_number'];?>" id="tblid"> <label
                                for="btiming">Booked Date:</label> <input type="text" name="b-timing"
                                value="<?php echo $_SESSION['res_date'];?>" id="tblid" class="form-control"> <label
                                for="btiming">Booked Timing:</label> <input type="text" name="b-timing"
                                value="<?php echo $_SESSION['res_timing'];?>" id="tblid" class="form-control">
                            <br><label for="btiming">Current Table Status:</label> <input type="text"
                                class="form-control" value="<?php echo $_SESSION['tbl_status'];?>" id="tblstatus">
                            <br><label for="change_status">Change Status To:</label> <select id="table_status"
                                name="tblstatus" class="form-control">
                                <option value="Ready">Ready</option>
                                <option value="Empty">Empty</option>
                                <option value="Preparing">Preparing</option>
                                <option value="Booked">Booked</option>
                            </select><br> <input type="submit" name="submit" value="Book Now" class="btn btn-primary">
                        </form>
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
</body>

</html>