<?php
    require "connection.php";

    $id = $_REQUEST["user_id"];

    $sql = "DELETE FROM `users` WHERE `users`.`id` = '$id'";

    if(mysqli_query($conn,$sql)) {
        //success
        header("Location: display.php");
    }
    else{
        echo "Deletion Failed";
    }
?>