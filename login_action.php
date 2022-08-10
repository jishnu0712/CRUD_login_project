<?php
require "connection.php";

$email = $_REQUEST["email"];
$pwd = md5($_REQUEST['password']);

$sql = "SELECT * FROM `users` WHERE `email` = '$email' AND password = '$pwd'";

$query = mysqli_query($conn, $sql); // conn from connection
$res = mysqli_num_rows($query);

print_r($res);

if ($res == 1) {
      ?>
      <script>
            alert('Login successful');
            window.location.href = "display.php";
      </script>
      <?php
} else {
      ?>
      <script>
            alert('Login Failed');
            window.location.href = "index.php";
      </script>
      <?php
}
?>
