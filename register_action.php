<?php
require 'connection.php';
require 'validation.php';

//get data from fields
$name = test_input($_REQUEST['username']); //test input from validation
$email = test_input($_REQUEST['email']);

//image 
$filename = $_FILES['picture']['name']; // save the file as same as from the client
$tmpname = $_FILES['picture']['tmp_name']; // denotes the path to move to destination
$folder = "images/" . $filename;
move_uploaded_file($tmpname, $folder);

$phone = test_input($_REQUEST["phone"]); //testinput from validation.php
$password = md5(test_input($_REQUEST["password"]));
$address = test_input($_REQUEST["address"]);
//make a string from checkboxes
$languages_known = implode(", ", $_REQUEST["languages"]);
$languages_known = test_input($languages_known);

$gender =  test_input($_REQUEST["gender"]);
$highest_education = test_input($_REQUEST["highest_education"]);

//insertion query
$sql = "INSERT INTO `employee` (`name`, `email`, `phone`, `password`, `picture`, `address`, `gender`, `languages_known`, `highest_education`) VALUES ('$name','$email','$phone','$password','$filename','$address','$gender','$languages_known','$highest_education')";

$data = mysqli_query($conn, $sql);  // $conn from connection.php

if ($data) {
  //INSERT the emp_id into master table
  //get last inserted id 
  $last_id = mysqli_insert_id($conn);

  //query to insert
  $sql = "INSERT INTO `master` (`id`, `cmp_id`, `emp_id`) VALUES (NULL, '2', '$last_id')";
  $insert = mysqli_query($conn, $sql);
  
  if ($insert) {
  ?>

    <script>
      alert('Registration successful');
      window.location.href = "index.php";
    </script>
  
  <?php
  }
} else {
  //login failed   
  ?>
  <script>
    alert('Registration Failed');
    window.location.href = "register.php";
  </script>
<?php
} ?>