<?php 
    require "connection.php";

    $id = $_REQUEST['user_id'];
    $username =  $_REQUEST['username'];
    $email =  $_REQUEST['email'];
    $phone =  $_REQUEST['phone'];
    $address =  $_REQUEST['address'];
    $highest_education = $_REQUEST['highest_education'];

    // echo $phone . $address . $highest_education;
    $sql = "UPDATE `users` SET `name` = '$username', `email` = '$email', `phone` = '$phone', `address` = '$address', `highest_education` = '$highest_education' WHERE `users`.`id` = '$id'";
    
    $query = mysqli_query($conn, $sql);
    
    if($query) {
        echo "<h1>Successfully updated</h1>";
        header("Location: display.php");
    }
    else {
        print_r($query);
        echo "<h1>Failed to update</h1>";
    }
?>