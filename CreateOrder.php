<?php
require_once('resadmin/Auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Order</title>
    <link rel="shortcut icon" href="img/logo.png"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
</head>
<body>
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

            <!-- Page Content Holder -->
        <div class="col-md-6" style="background-color: #FFFFFF">
            <div class="row" style="padding: 10px;">
                <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                    <i class="glyphicon glyphicon-align-left"></i>
                    <span>&#9776;</span>
                </button>
            </div>
            <div class="row" style="padding: 10px"><?php
                $fullUrl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if(strpos($fullUrl,"Fname_empty")==true) {
                    echo "<div class='alert alert-primary' role='alert'>
                   !!!Please Enter First Name
                </div>";
                }
                if(strpos($fullUrl,"Lname_empty")==true) {
                    echo "<div class='alert alert-primary' role='alert'>
                    !!!Please Enter Last Name
                </div>";
                }
                if(strpos($fullUrl,"mobilenumber_empty")==true) {
                    echo "<div class='alert alert-primary' role='alert'>
                    !!!Please Enter Mobile Number
                </div>";
                }
                if(strpos($fullUrl,"Data_inserted")==true) {
                    echo "<div class='alert alert-primary' role='alert'>
                    Data Inserted Successfully
                </div>";
                }
                if(strpos($fullUrl,"Data_not_inserted")==true) {
                    echo "<div class='alert alert-primary' role='alert'>
                    !!!Opps Something went Wrong please insert again Data not Inserted
                </div>";
                }

                ?></div>
            <div class="row" style="padding: 10px;font-size: 24px; ">Create Order</div>
            <div class="row-md-5">
                <form action="resadmin/Process-Order.php" method="post" style="padding: 20px">
                    <label for="First Name">First Name</label>
                    <input type="text" name="fname" class="form-control" id="fname" required>
                    <label for="Last Name">Last Name</label>
                    <input type="text" name="lname" class="form-control" id="lname" required>
                    <label for="Mobile">Mobile Number</label>
                    <input type="text" name="mob" class="form-control" id="mob" required>
                    <h3 style="padding: 5px">Select Food</h3>
                    <label for="Food" id="veg"> Choose Vegetarian Sabji </label>
                    <select id="veg-food" name="veg-food" class="form-control">
                        <option value="aloomatar">Aloo Matar</option>
                        <option value="aloogobi">Aloo Gobi</option>
                        <option value="chanamasala">Chana Masala</option>
                        <option value="mixvegetables">Mix Vegetables</option>
                        <option value="matarpaneer">Matar Paneer</option>
                        <option value="paneertikka">Paneer Tikka</option>
                        <option value="paneertikkamasala">Paneer Tikka Masala</option>
                        <option value="none">none</option>
                    </select>
                    <label for="veg-food-qua" id="veg-food-qua" >Quantity </label>
                    <select id="veg-food-quantity" name="veg-food-quantity" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="none">none</option>
                    </select>
                    <label for="Food" id="veg"> Choose Non-Vegetarian Sabji </label>
                    <select id="non-veg-food" name="non-veg-food" class="form-control">
                        <option value="butterchicken">Butter Chicken</option>
                        <option value="Beef sizzler">Beef Sizlar</option>
                        <option value="chickentikka">Chicken Tikka</option>
                        <option value="chickentikkamasala">Chicken Tikka Masala</option>
                        <option value="chickenshawerma">Chicken Shawarma</option>
                        <option value="chickenvindloo">Chicken Vindloo</option>
                        <option value="none">none</option>
                    </select>
                    <label for="non-veg-food-qua" id="non-veg-food-qua">Quantity </label>
                    <select id="non-veg-food-quantity" name="non-veg-food-quantity" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="none">none</option>
                    </select>
                    <label for="rice" id="type-rice"> Choose Type of Rice </label>
                    <select id="rice" name="rice" class="form-control">
                        <option value="plainrice">Plain Rice</option>
                        <option value="basmati">Basmati Rice</option>
                        <option value="chickenbiryani">Chicken-Biryani</option>
                        <option value="matonbiryani">Maton-Biryani</option>
                        <option value="jirarice">Jira Rice</option>
                        <option value="none">none</option>
                    </select>
                    <label for="rice-qua" id="type-rice-qua"> Rice Quantity </label>
                    <select id="rice-quantity" name="rice-quantity" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="none">none</option>
                    </select>
                    <label for="roti" id="type-roti"> Choose Type of Roti </label>
                    <select id="roti" name="roti" class="form-control">
                        <option value="plainroti">Plain Roti</option>
                        <option value="rumalroti">Rumal Roti</option>
                        <option value="parathas">Parathas</option>
                        <option value="butterroti">Butter Roti</option>
                        <option value="oilroti">Oil Roti</option>
                        <option value="none">none</option>
                    </select>
                    <label for="roti-qua" id="type-roti-qua"> Roti Quantity </label>
                    <select id="roti-quantity" name="roti-quantity" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="none">none</option>
                    </select>
                    <label for="special-food" id="sf"> Special Food Menu </label>
                    <select id="roti-quantity" name="sf" class="form-control">
                       <option value="none">none</option>
                        <?php require_once ('resadmin/admin_fun.php');
                            foreach ( get_special_food()as $rows){
                                echo "<option value='".$rows['special_food_name']."'>".$rows['special_food_name']."</option>";}?>
                    </select>
                    <label for="sf-qua" id="s-f-qua"> Special Food Quantity </label>
                    <select id="sf-quantity" name="sf-quantity" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="none">none</option>
                    </select><br>
                    Do you want book the table in advance?<br>
                    <input type="radio" name="advanced-booking" value="YES">
                    <label for="yes">YES</label>
                    <input type="radio" name="advanced-booking" value="NO">
                    <label for="no">NO</label><br>
                      echo "<input type='date' name='date' class='form-control'>
                    <input type='time' name='time' class='form-control' value='hr:mm:ss'>
                    <br>
                    <input type="submit" name="submit" value="Save" class="btn btn-primary">
                    <button type="button" onclick="managetable()" class="btn btn-primary">Book Table</button>
                </form>

            </div>
        </div>
        <div class="col-md-3" style="background-color: #FFFFFF">
        </div>
    </div>
</div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
<script>
    function managetable(){
    window.location.href = "Managetables.php";
    }
</script>
</body>
</html>