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
          <input id="email" type="email" class="form-control" name="email" placeholder="Enter email">
          <!-- <div id="email_error"><?php isset($errors['email_error']) ? 'Email input is incorrect' : ''; ?></div> -->
        </form>
        <div class="form-group">
          <label for="password">Password</label>
          <input id="pwd" type="password" class="form-control" name="password" placeholder="Password">
        </div>

        <div class="buttons my-4">
          <input type="submit" class="btn btn-primary" value="Login" name="login">
          <a href="./register.php">
            <div class="btn btn-warning">Register</div>
          </a>
        </div>
      </div>

    </form>
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