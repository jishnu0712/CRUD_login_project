<?php $err_msg = null; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Welcome</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script defer src="login_page_validation.js"></script>
</head>

<body>
  <main class="h-screen">
    <?php require "navbar.php" ?>

    <!-- login-box -->
    <div class="login-container">
      <div class="login-box border d-flex flex-column px-4 py-3 flex-grow shadow rounded ">
        <h2 class="my-2">Login</h2>
        <form id="form" action="" method="post">
          <div class="d-flex flex-column">
            <form class="form-group my-2">
              <input id="email" type="email" autocomplete="off" class="form-control py-2 px-4" name="email" placeholder="Enter email">
              <?php isset($errors['email_error']) ? 'Email input is incorrect' : ''; ?>
            </form>
            <div class="form-group my-2">
              <input id="pwd" type="password" class="form-control py-2 px-4" name="password" placeholder="Enter Password">
            </div>
            
            <p id="error"><?php echo $err_msg? $err_msg : ""?></p>

            <div class="login-buttons my-2">
              <input type="submit" class="btn btn-success mx-2 " value="Login" name="login">
              <a href="./register.php">
                <div class="btn btn-warning mx-2 ">Register</div>
              </a>
            </div>
          </div>

        </form>
      </div>
    </div>
  </main>
  <?php
  require "connection.php";

  if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $pass = md5($_POST["password"]);

    if (strlen($pass > 0)) {
      //valid password
      $query = "SELECT * FROM employee WHERE email='$email' AND password='$pass'";

      require "run_query.php";
      $res = get_number_of_rows($conn, $query);
    
      if ($res == 1) {
        session_start();
        $_SESSION['username'] = $email;

        header("Location: display.php");
      } 
      else {
        $err_msg = "Error invalid email/password";
      }
    } 
    else {
      $err_msg = "Please enter the password";
    }
  }
  ?>
</body>

</html>