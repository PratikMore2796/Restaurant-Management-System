<?php
require_once ('../resadmin/connection.php');
$flag = true;
if($_POST['submit'])
{
    $username = $_POST['uname'];
    $pass = $_POST['pass'];
    if(empty(trim($username)))
    {
        header("location:../Login.php?username-empty");
        $flag = false;
        exit();
    }
    if(empty(trim($pass)))
    {
        header("location:../Login.php?password-empty");
        $flag = false;
        exit();
    }
    if($flag===true)
    {
        $sql = "SELECT res_username FROM res_login WHERE res_username = :username";
        $stmt= $config->prepare($sql);
        $stmt->bindParam(':username',$username);
        $stmt->execute();
        if($stmt->rowCount()>0)
        {
            $sql = "SELECT res_pass FROM res_login WHERE res_pass = :pass";
            $stmt = $config->prepare($sql);
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();
            if ($stmt->rowCount() > 0)
            {
                session_start();
                $_SESSION['username'] = $username;
                header('location:../resboard.php');
            }
            else
                {
                    header("location:../Login.php?invalid_password");
                }

        }
         else
             {
                 header("location:../Login.php?un-authorize-user");
             }
    }
        else
        {
            header("location:../Login.php?un-authorize-user");
        }

}
?>