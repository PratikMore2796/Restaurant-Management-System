<?php require_once('resadmin/Auth.php');require_once('resadmin/admin_fun.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ResBoard</title>
    <link rel="shortcut icon" href="img/logo.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="shortcut icon" href="img/logo.png" />
    <link rel="stylesheet" type="text/css" href="css/navbar.css" </head>
    <?php get_sumof_Vegfood();get_sumof_Non_Vegfood();get_sumof_rice();get_sumof_roti();get_sumof_overall();?>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header"> <a class="nav-link" style="color: #FFFFFF"><img src="img/logo.png" height="50"
                        width="40"><?php if($_SESSION['username'] == "admin")                {                    echo "Admin";                }                else                {                    echo "Staff";                }                ?></a>
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
                <li> <?php                if($_SESSION['username'] == "admin")                {                    echo "<div class='col'><a href='add_users.php' style='text-decoration: none'><div class='navbuttons'>Manage users</div></a></div>";                }                else                {                    echo "";                }                ?>
                    <?php                if($_SESSION['username'] == "admin")                {                    echo "                        <div class='col'><a href='add_special_food.php' style='text-decoration: none'><div class='navbuttons'>Add Menu Item</div></a></div>                    ";                }                else                {                    echo "";                }                ?>
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
                <div class="row">
                    <div class="container"> <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="glyphicon glyphicon-align-left"></i> <span>&#9776;</span> </button>
                        <h5 style="text-align: center; padding: 10px">Add Menu Item of the Day</h5>
                        <form action="resadmin/add_special_item.php" method="post"> <label for="SpecialItemName">Special
                                Item Name</label> <input type="text" name="sin" class="form-control" required><br>
                            <label for="SpecialItemCategory">Special Item Category</label> <select name="sic" id="sic"
                                class="form-control">
                                <option value="veg">Veg</option>
                                <option value="nonveg">NonVeg</option>
                            </select><br> <input type="submit" name="submit" class="btn btn-primary"><br><br> </form>
                        <?php                $fullUrl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";                if(strpos($fullUrl,"data=success")==true) {                    echo "<div class='alert alert-primary' role='alert'>                                !! Data Inserted Successfully !!                            </div>";                }                if(strpos($fullUrl,"data=unsuccess")==true) {                    echo "<div class='alert alert-primary' role='alert'>                                !!Data Not Inserted Please try Again                            </div>";                }if(strpos($fullUrl,"duplicate-entry")==true) {                    echo "<div class='alert alert-primary' role='alert'>                                !!This item already exists!!                            </div>";                }                ?>
                    </div>
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