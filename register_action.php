<?php
require 'connection.php';

$name = $_REQUEST['username'];
$email = $_REQUEST['email'];
$phone = $_REQUEST["phone"];
$password = md5($_REQUEST["password"]);
$address = $_REQUEST["address"];
//make a string from checkboxes
$languages_known = implode(", ", $_REQUEST["languages"]);

$gender =  $_REQUEST["gender"];
$highest_education = $_REQUEST["highest_education"];

$sql = "INSERT INTO `users`(`id`, `name`, `email`, `phone`, `password`, `address`, `gender`, `known_languages`, `highest_education`) VALUES ('','$name','$email','$phone','$password','$address','$gender','$languages_known','$highest_education')";

$data = mysqli_query($conn, $sql);  // $conn from connection.php


if ($data) {
    header('Location:index.php');
} else {
    //login failed   
    header('Location: register.php');
}
