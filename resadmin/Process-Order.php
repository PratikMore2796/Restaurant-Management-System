<?php
try {
    require_once '../resadmin/connection.php';
    if ($_POST['submit']) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mob = $_POST['mob'];
        if (empty(trim($fname))) {
            header('location:../CreateOrder.php?Fname_empty');
        }
        if (empty(trim($lname))) {
            header('location:../CreateOrder.php?Lname_empty');
        }
        if (empty(trim($mob))) {
            header('location:../CreateOrder.php?mobilenumber_empty');
        }
        $adv_booking = $_POST['advanced-booking'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        if ($adv_booking === "YES") {
            $query = "UPDATE res_tbl SET tbl_status='Booked',res_date='$date',res_timing='$time' ORDER BY tbl_id LIMIT 1 ";
            $statement = $config->prepare($query);
            $statement->execute();
            header('location:../CreateOrder.php?Data_inserted');
        } else {
            $vegfood = $_POST['veg-food'];
            $vegqua = $_POST['veg-food-quantity'];
            $nonvegfood = $_POST['non-veg-food'];
            $nonvegqua = $_POST['non-veg-food-quantity'];
            $rice = $_POST['rice'];
            $ricequa = $_POST['rice-quantity'];
            $roti = $_POST['roti'];
            $rotiqua = $_POST['roti-quantity'];
            $special_food = $_POST['sf'];
            $special_food_qua = $_POST['sf-quantity'];
            $sql = "INSERT INTO user_tbl(user_fname,user_lname,user_mob,veg_sabji,veg_sabji_qua,non_veg_sabji,non_veg_sabji_qua,rice, rice_qua,roti,roti_qua,special_food,special_food_qua)
VALUES (:userfname,:userlname,:usermob,:vegsabji,:vegsabjiqua,:nonvegsabji,:nonvegsabjiqua,:rice,:ricequa,:roti,:rotiqua,:sf,:sfq)";
            $stmt = $config->prepare($sql);
            $stmt->bindParam(':userfname', $fname);
            $stmt->bindParam(':userlname', $lname);
            $stmt->bindParam(':usermob', $mob);
            $stmt->bindParam(':vegsabji', $vegfood);
            $stmt->bindParam(':vegsabjiqua', $vegqua);
            $stmt->bindParam(':nonvegsabji', $nonvegfood);
            $stmt->bindParam(':nonvegsabjiqua', $nonvegqua);
            $stmt->bindParam(':rice', $rice);
            $stmt->bindParam(':ricequa', $ricequa);
            $stmt->bindParam(':roti', $roti);
            $stmt->bindParam(':rotiqua', $rotiqua);
            $stmt->bindParam(':sf', $special_food);
            $stmt->bindParam(':sfq', $special_food_qua);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                header('location:../CreateOrder.php?Data_inserted');
            } else {
                header('location:../CreateOrder.php?Data_not_inserted');
            }
        }
    }
} catch (Exception $e) {
    echo "!!Oops Something went wrong Please Try Again" . $e->getMessage();
}
