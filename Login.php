<?php
session_start();

session_unset();

session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Foodies Login By Pratik More | Full Stack Developer</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <link rel="shortcut icon" href="img/logo.png" alt="Pratik More | Full Stack Web Developer Logo" />
    <meta charset="UTF-8">

    <meta name="description"
        content="Pratik More | Full Stack Web Developer, personal project. Create a restaurent site with an admin pannel for your restaurant, visit pratikmore.com for more projects.">

    <meta name="keywords"
        content="hire web developer, Pratik More | Full Stack Web Developer, Pratik More, Restaurant Project By Pratik More,  web developer portfolio, Full Stack Web Developer, web-developer-in-canada, pratik more, professional website developer, Pratik More Portfolio, pratikmore.com, create a portfolio, create e-commerce or store website">

    <meta name="author" content="Pratik More | Full Stack Web Developer">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo.png" />
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap');

body, html {
    height: 100%;
    overflow: hidden;
}
input[type=text]
{
    width: 100%;
    border-radius: 10px;
    font-size: 20px;
    border:1px solid #000;
    
}
input[type=password]
{
    width: 100%;
    border-radius: 10px;
    font-size: 20px;
    border:1px solid #000;
    
}
input[type=submit]
{
    
    font-size: 18px;
    color: #fff;
    font-family: 'Ubuntu', sans-serif;
    background-color: blue;
    border-radius: 10px;
}
#AdminContainer
{
    
    border-radius:10px;
    display: flex;
    flex-direction: row-reverse;
    
}
.Patua_font{
    color: #3094FE; 
    text-shadow: black; 
    font-family: 'Patua One', cursive;
    text-align: center;
    padding: 10px;
}
.LoginContainers{
    display: flex;
    flex-direction: row;
    background-image: url("img/mainbg2.jpg");
    background-size: cover;
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    padding: 100px;
    -ms-flex-align: center;
    flex-wrap: wrap;
    justify-content: center;
    
}
.new-design{
    padding: 50px;
    background-color: #fff;
    width: 50%;
    display: flex;
    justify-content: center;
    border-radius: 10px;
    
    flex-wrap: wrap;
    

}
#staffContainer
{
    border-radius:10px;
    display: flex;
    flex-direction: row;
    
}
#AdminandStaff
{
   
    display: flex;
    flex-direction: row;
    height:100%;

}
    </style>
</head>

<body>

    <div class="LoginContainers" >
        <div class="new-design">
        <h1 class="Patua_font"><img src="img/logo.png" height="100px" width="100px">&nbsp;Foodies</h1>
        <div id="AdminContainer">
            <div class="container">
                <div class="continer">
                    <form action="resadmin/L-Process.php" method="post">
                        <h3 class="Patua_font">Admin Login</h3>
                        <label for="admin_UName">UserName</label>
                        <input type="text" name="admin_uname" id="UName" class="form-control"></br>
                        <label for="pass">Password</label>
                        <input type="password" name="admin_pass" id="pass" class="form-control"></br>
                        <input type="submit" name="admin_submit" value="submit" class="form-control btn-primary btn btn-primary">
                    </form><br>
                    <?php
                $fullUrl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if(strpos($fullUrl,"admin_un-authorize-user")==true) {
                    echo "<div class='alert alert-primary' role='alert'>
                                Unauthorize Admin Access
                            </div>";
                }
                if(strpos($fullUrl,"admin_username-empty")==true) {
                    echo "<div class='alert alert-primary' role='alert'>
                                Admin Username is empty
                            </div>";
                }
                if(strpos($fullUrl,"admin_password-empty")==true) {
                    echo "<div class='alert alert-primary' role='alert'>
                                Admin Password is empty
                            </div>";
                }

                if(strpos($fullUrl,"admin_invalid_password")==true) {
                    echo "<div class='alert alert-primary' role='alert'>
                                Invalid Admin Password
                            </div>";
                }
                ?>

                </div>
            </div>
            <div id= "staffContainer">
                <div class="continer">
                    <form action="resadmin/L-Process-Staff.php" method="post">
                        <h3 class="Patua_font">Staff Login</h3>
                        <label for="staff_UName">UserName</label>
                        <input type="text" name="staff_uname" id="UName" class="form-control"></br>
                        <label for="pass">Password</label>
                        <input type="password" name="staff_pass" id="pass" class="form-control"></br>
                        <input type="submit" name="staff_submit" value="submit" class="form-control btn-primary btn btn-primary">
                    </form><br>
                    <?php
                $fullUrl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if(strpos($fullUrl,"un-authorize-admin-Access")==true) {
                    echo "<div class='alert alert-primary' role='alert'>
                                Unauthorize Staff user
                            </div>";
                }
                if(strpos($fullUrl,"staff-username-empty")==true) {
                    echo "<div class='alert alert-primary' role='alert'>
                                Staff Username is empty
                            </div>";
                }
                if(strpos($fullUrl,"staff-password-empty")==true) {
                    echo "<div class='alert alert-primary' role='alert'>
                                Staff Password is empty
                            </div>";
                }

                if(strpos($fullUrl,"staff_invalid_password")==true) {
                    echo "<div class='alert alert-primary' role='alert'>
                                Invalid Staff Password
                            </div>";
                }
                ?>

                </div>
            </div>
        </div>
        </div>
    </div>

</body>

</html>