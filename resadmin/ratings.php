<?php require_once 'connection.php';
if (isset($_POST['submit'])) {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $veg_ratings = $_POST['vag-ratings'];
    $non_veg_ratings = $_POST['non-vag-ratings'];
    $roti_ratings = $_POST['roti-ratings'];
    $rice_ratings = $_POST['rice-ratings'];
    $overall_ratings = $_POST['overall-ratings'];
    $sql = "INSERT INTO user_ratings(user_first_name,user_last_name,Veg,Nonveg,Rice,Roti,Overall) VALUES(:fname,:lname,:veg,:nonveg,:rice,:roti,:overall)";
    $statement = $config->prepare($sql);
    $statement->bindParam(':fname', $firstname);
    $statement->bindParam(':lname', $lastname);
    $statement->bindParam(':veg', $veg_ratings);
    $statement->bindParam(':nonveg', $non_veg_ratings);
    $statement->bindParam(':rice', $rice_ratings);
    $statement->bindParam(':roti', $roti_ratings);
    $statement->bindParam(':overall', $overall_ratings);
    $statement->execute();
    $statement->closeCursor();
    if ($statement->rowCount() > 0) {
        header('location:../resboard.php?Thank-message');
    } else {
        header('location:../resboard.php?Error-insert');
    }
} else {
    header('location:../resboard.php?Ratings-fail');
} ?>5