<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Welcome</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <script defer src="login_page_validation.js"></script>
</head>

<body>
  <?php require "navbar.php" ?>
  <div class="h-screen flex login-box">

    <!-- login-box -->
    <div class="border d-flex flex-column px-4 py-3 flex-grow shadow rounded ">
      <h2 class="my-2">Login</h2>
      <div id="error"></div>
      <form id="form" action="" method="post">
        <div class="d-flex flex-column">
          <form class="form-group my-2">
            <!-- <label for="email">Email</label> -->
            <input id="email" type="email" class="form-control py-2 px-4" name="email" placeholder="Enter email">
            <!-- <div id="email_error"><?php isset($errors['email_error']) ? 'Email input is incorrect' : ''; ?></div> -->
          </form>
          <div class="form-group my-2">
            <!-- <label for="password">Password</label> -->
            <input id="pwd" type="password" class="form-control py-2 px-4" name="password" placeholder="Enter Password">
          </div>

          <div class="buttons my-2">
            <input type="submit" class="btn btn-primary mx-4 " value="Login" name="login">
            <a href="./register.php">
              <div class="btn btn-warning">Register</div>
            </a>
          </div>
        </div>

      </form>
    </div>
  </div>
  <?php
  require "connection.php";

  if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $pass = md5($_POST["password"]);

    if (strlen($pass > 0)) {
      $query = "SELECT * FROM employee WHERE email='$email' AND password='$pass'";

      require "run_query.php";
      $res = get_number_of_rows($conn, $query);

      if ($res) {
        session_start();
        $_SESSION['username'] = $email;

        header("Location: display.php");
      } else {
        echo "Email not exists";
      }
    } else {
      echo "Please set the password";
    }
  }
  ?>
</body>

</html>