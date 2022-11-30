<?php
    // connection variables
   $servername = "localhost";
   $username = "root";
   $password = "";
   $database = "employee_mgmt";
   
    //connect DBMS
    try{
        $conn = mysqli_connect($servername, $username, $password, $database);
        if(!$conn){
            throw new Exception(mysqli_connect_error());
        }
    }
    //check connection
    catch(Exception $e){
        die("failed to connect :" . $e);
    }
?>