<?php
require "connection.php";

$id = $_REQUEST["user_id"];

$sql_master_delete = "DELETE FROM `master` WHERE `master`.`emp_id` = '$id'";

if (mysqli_query($conn, $sql_master_delete)) {

    $sql = "DELETE FROM `employee` WHERE `employee`.`id` = '$id'";
    if (mysqli_query($conn, $sql)) {
        //success
        header("Location: display.php");
    }
} else {
    echo "Deletion Failed";
}
