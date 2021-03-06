<?php require_once 'connection.php';
require_once 'Auth.php';
if (isset($_POST['submit'])) {
    $sfn = $_POST['sin'];
    $sfc = $_POST['sic'];
    if ($sfn == "") {
        header('location:../add_special_food.php?name=empty');
    }
    $query = "SELECT * FROM special_menu WHERE special_food_name = :sfn";
    $statement = $config->prepare($query);
    $statement->bindParam(':sfn', $sfn);
    $statement->execute();
    if ($statement->rowCount() > 0) {
        header('location:../add_special_food.php?duplicate-entry');
    } else {
        $sql = "INSERT INTO special_menu(special_food_name,special_food_category)VALUES (:sfn,:sfc)";
        $stmt = $config->prepare($sql);
        $stmt->bindParam(':sfn', $sfn);
        $stmt->bindParam(':sfc', $sfc);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            header('location:../add_special_food.php?data=success');
        } else {
            header('location:../add_special_food.php?data=unsuccess');
        }
    }
}
