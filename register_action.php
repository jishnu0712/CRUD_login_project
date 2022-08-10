<?php
require 'connection.php';
require 'validation.php';

$name = test_input($_REQUEST['username']); //test input from validation
$email = test_input($_REQUEST['email']);

//image 
$filename = $_FILES['picture']['name']; // save the file as same as from the client
$tmpname = $_FILES['picture']['tmp_name']; // denotes the path to move to destination
$folder = "images/" . $filename;
// echo $folder;
move_uploaded_file($tmpname, $folder);
 
$phone = test_input($_REQUEST["phone"]); //testinput from validation.php
$password = md5(test_input($_REQUEST["password"]));
$address = test_input($_REQUEST["address"]);
//make a string from checkboxes
$languages_known = implode(", ", $_REQUEST["languages"]);
$languages_known = test_input($languages_known);

$gender =  test_input($_REQUEST["gender"]);
$highest_education = test_input($_REQUEST["highest_education"]);

//documents
// if (!empty(array_filter($_FILES['files']['name']))) {

//     // Loop through each file in files[] array
//     foreach ($_FILES['files']['tmp_name'] as $key => $value) {

//         $file_tmpname = $_FILES['files']['tmp_name'][$key];
//         $file_name = $_FILES['files']['name'][$key];
//         $file_size = $_FILES['files']['size'][$key];
//         $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

//         // Set upload file path
//         $filepath = $upload_dir . $file_name;
//     }
// }

$sql = "INSERT INTO `users`(`id`, `name`, `picture`, `email`, `phone`, `password`, `address`, `gender`, `known_languages`, `highest_education` , `documents`) VALUES ('','$name','$filename','$email','$phone','$password','$address','$gender','$languages_known','$highest_education', '$doc_name')";

$data = mysqli_query($cosnn, $sql);  // $conn from connection.php

if ($data) {
?>
    <script>
            alert('Registration successful');
            window.location.href = "index.php";
      </script>
   <?php
} else {
    //login failed   
    ?>
      <script>
            alert('Registration Failed');
            window.location.href = "register.php";
      </script>
    <?php
}?>
