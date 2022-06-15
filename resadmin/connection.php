<?php
$conn = 'localhost';
$username = 'root';
$pass = '';
try {
    $config = new PDO($conn, $username, $pass);
    $config->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "!!Opps Something went Wrong, Please try again later" . $e->getMessage();
}
