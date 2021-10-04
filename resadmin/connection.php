<?php
$conn= 'mysql:host=pratikmore.info;dbname=PSRestaurant';
$username='uday9726';
$pass = 'Pratikinfo@2796';
try {
    $config = new PDO($conn,$username,$pass);
    $config->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
Catch(Exception $e){
echo "!!Opps Something went Wrong, Please try again later".$e->getMessage();
}