<?php
require "connection.php";
require "validation.php";

$login_err = false;
$pass_invalid = false;
$email_invalid = false;

if (isset($_POST["login"])) {

  $email = $_POST["email"];
  $email_invalid = check_email($email);
  
  if (strlen($_POST["password"] > 2)) {
    $pass = md5($_POST["password"]);
    //valid password
    $query = "SELECT * FROM employee WHERE email='$email' AND password='$pass'";

    require "run_query.php";
    $res = get_number_of_rows($conn, $query);

    if ($res == 1) {
      session_start();
      $_SESSION['username'] = $email;

      header("Location: display.php");
    } else {
      $login_err = true;
    }
  } else {
    
    $pass_invalid = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Welcome</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- <script defer src="login_page_validation.js"></script> -->
</head>

<body>
  <main class="h-screen d-flex flex-column">
    <?php require "navbar.php" ?>

    <!-- login-box -->
    <div class="login-container flex-fill">
      <div class="login-box border d-flex flex-column px-4 py-3 shadow rounded ">
        <h2 class="my-2">Login</h2>
        <form id="form" action="" method="post">
          <div class="d-flex flex-column">
            <form class="form-group my-2">
              <input id="email" autocomplete="off" class="form-control py-2 px-4" name="email" placeholder="Enter email">
              
              <?php if ($email_invalid && $email_invalid == true) { ?>
                <small class="errorText text-danger"> Invalid Email! </small>
                <?php } ?>
                
            </form>
            <div class="form-group my-2">
              <input id="pwd" type="password" class="form-control py-2 px-4" name="password" placeholder="Enter Password">
            </div>

            <?php if ($login_err && $login_err == true) { ?>
              <small class="errorText text-danger">username or password invalid</small>
            <?php } ?>

            <?php if ($pass_invalid && $pass_invalid == true) { ?>
              <small class="errorText text-danger">Password should be greater than 3 digits</small>
            <?php } ?>

            <div class="login-buttons my-2">
              <input type="submit" class="btn  btn-success mx-2 " value="Login" name="login">
              <a href="./register.php">
                <div class="btn  btn-warning mx-2 ">Register</div>
              </a>
            </div>
          </div>

        </form>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#0099ff" fill-opacity=".7" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>

    </div>

  </main>

</body>

</html>