<?php 
    require "connection.php";
    if(!isset($_REQUEST) && empty($_REQUEST)){
        echo "Value unavaliable";
        die;
    }
    $id = $_REQUEST['user_id'];
    $username =  $_REQUEST['username'];
    $email =  $_REQUEST['email'];
    $phone =  $_REQUEST['phone'];
    $address =  $_REQUEST['address'];
    $highest_education = $_REQUEST['highest_education'];

    $sql = "UPDATE `employee` SET `name` = '$username', `email` = '$email', `phone` = '$phone', `address` = '$address', `highest_education` = '$highest_education' WHERE `employee`.`id` = '$id'";
    
    $query = mysqli_query($conn, $sql);
    
    if($query) {
        header("Location: display.php");
    }
    else {
        print_r($query);
        echo "<h1>Failed to update</h1>";
    }
?>