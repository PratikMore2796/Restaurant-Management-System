<?php

session_start();
if (empty($_SESSION['username'])) {
    header('location:../Login.php');
    exit();
}
