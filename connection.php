<?php
    //set connection variables
   $servername = "localhost";
   $username = "root";
   $password = "";
   $database = "testcreate";
   
    //connect DBMS
    $conn = mysqli_connect($servername, $username, $password, $database);
    //check connection
    if(!$conn) {
        die("failed to connect :" . mysqli_connect_error());
    }
    else {
        // echo "connected successfully";
    }
?>