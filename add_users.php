<?php
require_once('resadmin/Auth.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Users</title>
    <link rel="shortcut icon" href="img/logo.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="img/logo.png" />
    <link rel="stylesheet" type="text/css" href="css/navbar.css" ></head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header"> 
                <a class="nav-link" style="color: #FFFFFF">
                <img src="img/logo.png" height="50" width="40">
                <?php if($_SESSION['username'] == "admin")  
                {                    
                    echo "Admin"; 
                }
                else 
                {
                    echo "Staff";         
                } 
                ?>
                </a>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <div class='col'><a href="resboard.php" style="text-decoration: none">
                            <div class="navbuttons">Home</div>
                        </a></div>
                </li>
                <li class="active">
                    <div class='col'><a href="CreateOrder.php" style="text-decoration: none">
                            <div class="navbuttons">Create New Order</div>
                        </a></div>
                </li>
                <li>
                    <div class='col'><a href="Managetables.php" style="text-decoration: none">
                            <div class="navbuttons">Manage Tables</div>
                        </a></div>
                </li>
                <li> <?php                
                if($_SESSION['username'] == "admin")    
                            {    
                    echo "<div class='col'><a href='add_users.php' style='text-decoration: none'><div class='navbuttons'>Manage users</div></a></div>";                }                else                {                    echo "";                }                ?>
                    <?php                
                    if($_SESSION['username'] == "admin")    
                                {           
        echo " <div class='col'><a href='add_special_food.php' style='text-decoration: none'><div class='navbuttons'>Add Menu Item</div></a></div>                    ";                }                else                {                    echo "";                }                ?>
                </li>
                <li>
                    <div class='col'><a href="Logout.php" style="text-decoration: none">
                            <div class="navbuttons">Logout</div>
                        </a></div>
                </li>
            </ul>
        </nav>
        <div class="container-fluid" style="padding: 10px">
            <div class="col" style="background-color: #FFFFFF">
                <div class="row" style="padding: 10px;"></div>
                <div class="row" style="padding: 10px"><button type="button" id="sidebarCollapse"
                        class="btn btn-info navbar-btn"> <i class="glyphicon glyphicon-align-left"></i>
                        <span>&#9776;</span> </button></div>
                <div class="row" style="padding: 10px;font-size: 24px; margin-top: 20px">Manage<h6
                        style="font-size: small">Users</h6>
                </div>
                <div class="row">
                    <div class="container"
                        style="background-color: white;                         text-align: center;                         font-size: large;                         width: 40%">
                        Add Staff</div>
                </div>
                <div class="row" style="padding: 20px; width: 100%">
                    <div class="container"
                        style="background-color: white;                         text-align: left;                         font-size: large; padding-bottom: 10px;">
                        <form action="resadmin/process_user.php" method="post"> <label for="Name"
                                style="padding-top: 10px">User Name</label> <input type="text" class="form-control"
                                name="user_name" id="user_name"> <label for="Name" style="padding-top: 10px">User
                                Password</label> <input type="password" class="form-control" name="pwd" id="pwd"><br>
                            <input type="submit" name="submit" value="SaveUser" class="btn btn-success"><br><br> </form>
                        <?php $fullUrl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";                    if(strpos($fullUrl,"username_empty")==true) {                        echo "<div class='alert alert-primary' role='alert'>                        !!!Please Enter User Name                    </div>";                    }                    if(strpos($fullUrl,"password_empty")==true) {                        echo "<div class='alert alert-primary' role='alert'>                        !!!Please Enter Password                    </div>";                    }                    if(strpos($fullUrl,"useradded")==true) {                        echo "<div class='alert alert-primary' role='alert'>                        User Added                    </div>";                    }?>
                    </div>
                    <div class="row" style="padding: 20px; width: 100%"></div>
                    <div class="row" style="padding: 20px; width: 100%"></div>
                    <div class="row" style="padding: 20px; width: 100%"></div>
                    <div class="row" style="padding: 20px; width: 100%"></div>
                </div>
            </div>
            <div class="col" style="background-color: #FFFFFF"> </div>
            <div class="col" style="background-color:#FFFFFF"> </div>
        </div>
    </div>
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