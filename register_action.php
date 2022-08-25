<?php
session_start();
require 'connection.php';
require 'validation.php';


$flag = 0;
// validation 
if (strlen($_REQUEST['username']) < 2) {
  $_SESSION['username_error'] = true;
  $flag = 1;
}

if (!check_email($_REQUEST["email"])) { //invalid

  $_SESSION['email_error'] = true;
  $flag = 1;
}

if (!check_phone($_REQUEST["phone"])) {

  $_SESSION['phone_error'] = true;
  $flag = 1;
}

if (!check_password($_REQUEST["password"])) {
  $_SESSION['password_error'] = true;
  $flag = 1;
}
if($_REQUEST["cnf_password"] !== $_REQUEST["password"]) {
  $_SESSION['cnf_password_error'] = true;
  $flag = 1;
}

if (empty($_REQUEST["gender"])) {
  $_SESSION['gender_error'] = true;
  $flag = 1;
}
//if failed start session
if ($flag == 1) {
  $_SESSION['error'] = true;
  $_SESSION['values'] = $_REQUEST;
  header("location:register.php");
  exit();
}

//get data from fields
$name = test_input($_REQUEST['username']); //test input from validation
$email = test_input($_REQUEST['email']);

//image 
$filename = $_FILES['picture']['name']; // save the file as same as from the client
$tmpname = $_FILES['picture']['tmp_name']; // denotes the path to move to destination
$folder = "images/" . $filename;
move_uploaded_file($tmpname, $folder);

$phone = test_input($_REQUEST["phone"]); //test_input from validation.php
$password = md5(test_input($_REQUEST["password"]));
$address = test_input($_REQUEST["address"]);
//make a string from checkboxes
// $languages_known = implode(", ", $_REQUEST["languages"]);

$gender =  $_REQUEST["gender"];


$cmp_id = $_REQUEST["company"];
$highest_education = test_input($_REQUEST["highest_education"]);
$role_id = $_REQUEST["role_id"];


$flag = 0;

//insertion query
//add company name
$sql = "INSERT INTO `employee` (`name`, `email`, `phone`, `password`, `picture`, `address`, `gender`, `languages_known`, `highest_education`, `role_id`, `cmp_id`) VALUES ('$name','$email','$phone','$password','$filename','$address','$gender','$languages_known','$highest_education', '$role_id','$cmp_id')";

$data = mysqli_query($conn, $sql);  // $conn from connection.php

if ($data) {
  //INSERT the emp_id into master table
  //get last inserted id 
  $last_id = mysqli_insert_id($conn);

  //query to insert
  $sql = "INSERT INTO `master` (`id`, `cmp_id`, `emp_id`) VALUES (NULL, '$cmp_id', '$last_id')";
  $insert = mysqli_query($conn, $sql);

  if ($insert) {
    $_SESSION['registered'] = true;
    header("location:register.php");
  }
} else {
  //register failed  
  $_SESSION['register_failed'] = true;
  header("location:register.php");
  //added
  exit();

}
