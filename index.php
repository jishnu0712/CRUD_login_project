<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Welcome</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
  <!-- <script defer src="login_page_validation.js"></script> -->
</head>

<body>
  <div class="container" style="padding: 0 100px;">
    <h2>Login</h2>
    <div id="error"></div>
    <form id="form" action="" method="post">
      <div>
        <form class="form-group my-4">
          <label for="email">Email</label>
          <input id="email"  type="email" class="form-control" name="email" placeholder="Enter email">
        </form>
        <div class="form-group">
          <label for="password">Password</label>
          <input id="pwd"  type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="buttons my-4">
          <input type="submit" class="btn btn-primary" value="Login" name="login">
          <!-- <button type="submit" class="btn btn-primary" name="login">Login</button> -->
          <a href="./register.php">
            <div class="btn btn-warning">Register</div>
          </a>
        </div>
      </div>

    </form>
  </div>

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> -->
</body>
<?php
require "connection.php";
if(isset($_POST["login"])){
  $email=$_POST["email"];
  $pass=md5($_POST["password"]);
  if(strlen($pass<=0)){
    echo "Please set the password";
  }
  else{
    $query="SELECT * FROM users WHERE email='$email' AND password='$pass'";
    
    $data = mysqli_query($conn, $query);
    $res = mysqli_num_rows($data);

    if($res) {
      header("Location: display.php");
    }
    else{
      echo "Email not exists";
    }
  }
}
?>
</html>