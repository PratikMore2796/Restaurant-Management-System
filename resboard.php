<?php
include 'resadmin/Auth.php';
include 'resadmin/admin_fun.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ResBoard</title>
    <link rel="shortcut icon" href="img/logo.png"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/resboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="shortcut icon" href="img/logo.png"/>
</head>
<body>
<?php get_sumof_Vegfood();
get_sumof_Non_Vegfood();
get_sumof_rice();
get_sumof_roti();
get_sumof_overall();
$sum_veg = $_SESSION['sum_veg'];
$sum_nonveg = $_SESSION['sum_non_veg'];
$sum_rice = $_SESSION['sum_rice'];
$sum_roti = $_SESSION['sum_roti'];
$sum_overall = $_SESSION['sum_overall'] ;
get_user_vegfood();
get_user_non_vegfood();
$sum_non_veg_order =$_SESSION['sum_non_veg_sabji_qua'];
$sum_veg_order =$_SESSION['sum_veg_sabji_qua'];
get_sumof_spf();
$spf = $_SESSION['spf'];?>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#28104E; ">
        <img src="img/logo.png" height="50" width="40">
        <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" style=" background-color: #FFFFFF" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active" >
                    <a class="nav-link" style="color: #FFFFFF"><?php if($_SESSION['username'] == "admin")
                        {
                            echo "Admin";

                        }
                        else
                        {
                            echo "Staff";
                        }
                        ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="resboard.php" ><div class="navbuttons">Home</div></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="CreateOrder.php"><div class="navbuttons">Create New Order</div></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Managetables.php" ><div class="navbuttons">Manage Tables</div></a>
                </li>
                <li><?php
                if($_SESSION['username'] == "admin")
                {
                    echo "
                    <a class='nav-link' href='add_users.php'><div class='navbuttons'>Manage users</div></a>";
                }
                else
                {
                    echo "";
                }
                ?></li>
                <li>
                    <?php
                    if($_SESSION['username'] == "admin")
                    {
                        echo "
                    <a class='nav-link' href='add_special_food.php'><div class='navbuttons'>Add Menu Item</div></a>";
                    }
                    else
                    {
                        echo "";
                    }
                    ?>
                </li>
                <li>
                    <a class="nav-link" href="Logout.php">
                        <div class="navbuttons">Logout</div>
                    </a>
                </li>

            </ul>
        </div>
    </nav>
</div>
        </div>
        <div class="col" >
            <div class="row">
                <div class="container-fluid">
                    <div class="row" style="padding: 10px"><h1>Dashboard</h1><h6 style="font-size: small">Control Panel</h6></div>
                    <div class="row">
                        <table class="table" style="width: 100%;">
                        <thead style="background-color: #28104E; color: white">
                        <th>PIE Chart</th>
                        <th>Bar Chart</th>
                        </thead>
                        <tr>
                            <td ><script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                <div id="donutchart" style="height: 500px;width: 100%;"></div></td>
                            <td ><script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                <div id="top_x_div" style="height: 500px;width: 100%"></div></td>
                        </tr>
                        </table>
                    </div>
                <div class="row" >
        <div class="col">
                <h5 style="text-align: center; padding: 10px">Provide A Survey</h5>
                <form action="resadmin/ratings.php" method="post">
                    <label for="FirstName">First Name</label>
                    <input type="text" name="fname" class="form-control"><br>
                    <label for="LastName">Last Name</label>
                    <input type="text" name="lname" class="form-control"><br>
                    <table class="table" >
                        <thead style="background-color: #28104E; color: white">
                        <th>Food</th>
                        <th>Rating</th>
                        </thead>
                        <tbody >
                        <tr>
                            <td><label for="veg-ratings"> Vegetarian Sabji </label></td>
                            <td>
                                <select name="vag-ratings">
                                    <option value="1">&#9733;</option>
                                    <option value="2">&#9733;&#9733;</option>
                                    <option value="3">&#9733;&#9733;&#9733;</option>
                                    <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                                    <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                                </select>
                        </tr>
                        <tr>
                            <td><label for="non-veg-ratings"> Non-Vegetarian Sabji </label></td>
                            <td >
                                <select name="non-vag-ratings">
                                    <option value="1">&#9733;</option>
                                    <option value="2">&#9733;&#9733;</option>
                                    <option value="3">&#9733;&#9733;&#9733;</option>
                                    <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                                    <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                                </select>
                        </tr>
                        <tr>
                            <td>
                                <label for="roti" id="roti"> Roti </label></td>
                            <td>
                                <select name="roti-ratings">
                                    <option value="1">&#9733;</option>
                                    <option value="2">&#9733;&#9733;</option>
                                    <option value="3">&#9733;&#9733;&#9733;</option>
                                    <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                                    <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                                </select></td>
                        </tr>
                        <tr><td><label for="rice-ratings"> Rice </label>
                            </td>
                            <td>
                                <select name="rice-ratings">
                                    <option value="1">&#9733;</option>
                                    <option value="2">&#9733;&#9733;</option>
                                    <option value="3">&#9733;&#9733;&#9733;</option>
                                    <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                                    <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                                </select>
                            </td>
                        </tr>
                        <tr><td><label for="overall-ratings"> Overall Ratings </label></td>
                            <td>
                                <select name="overall-ratings">
                                    <option value="1">&#9733;</option>
                                    <option value="2">&#9733;&#9733;</option>
                                    <option value="3">&#9733;&#9733;&#9733;</option>
                                    <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                                    <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                                </select></td>
                        </tr>
                        </tbody>
                    </table>
                    <input type="submit" name="submit" class="btn btn-primary"><br><br>
                </form>
                <?php
                $fullUrl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if(strpos($fullUrl,"Thank-message")==true) {
                    echo "<div class='alert alert-primary' role='alert'>
                                Thank You For your Ratings and Precious Time
                            </div>";
                }
                if(strpos($fullUrl,"Error-insert")==true) {
                    echo "<div class='alert alert-primary' role='alert'>
                                !!Data Not Inserted Please try Again
                            </div>";
                }if(strpos($fullUrl,"Ratings-fail")==true) {
                    echo "<div class='alert alert-primary' role='alert'>
                                !!Connection Error!!
                            </div>";
                }?>

            </div>

                </div>

            </div>
        </div>

            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Veg', 'Non-Veg',{role: 'style'}],
            ['Veg',<?php echo $sum_veg_order;?>,'#9754CB'],
            ['Non-Veg', <?php echo $sum_non_veg_order;?>,'#9754CB'],
            ['Special-Food',<?php echo $spf;?>,'#9754CB']
        ]);
        var options = {
            title: 'My Daily Activities',
            pieHole: 0.4,
        };
        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }
</script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Food', 'Ratings By People',{role:'style'}],
            ["Veg", <?php echo $sum_veg;?>,'#9754CB'],
            ["Non-Veg", <?php echo $sum_nonveg;?>,'#9754CB'],
            ["Rice", <?php echo $sum_rice;?>,'#9754CB'],
            ["Roti", <?php echo $sum_roti;?>,'opacity:0.2'],
            ['Overall', <?php echo $sum_overall;?>,'color:#9754CB']
        ]);

        var options = {
            width: 500,
            legend: { position: 'center' },
            chart: {
                title: 'Most Liked Food',
                subtitle: 'popularity by Stars',
            },
            axes: {
                x: {
                    0: { side: 'top', label: 'Food Liked by Many People'} // Top x-axis.
                }
            },
            bar: { groupWidth: "40%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
    };
</script>
</body>
</html>
