<?php require "navbar.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>New Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="px-4 py-3">
    <div class="register-box container  shadow px-5 py-4">
      <h2>Registration</h2>

      <form id="form" action="register_action.php" method="post" enctype="multipart/form-data">
        <div class="form-group my-4">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" class="form-control" autocomplete="off" placeholder="Enter Username" />
        </div>

        <div class="form-group my-4">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email" />
        </div>

        <div class="form-group my-4">
          <label for="phone">Phone</label>
          <input type="text" id="phone" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone" />
        </div>

        <div class="form-group my-4">
          <label for="password">Password</label>
          <input id="password" type="password" class="form-control" name="password" placeholder="Password" />
        </div>
        <!-- profile picture -->
        <div class="form-group my-4">
          <label for="picture">Picture</label>
          <input id="picture" type="file" class="form-control" accept="image/*" name="picture" />
        </div>

        <div class="form-group my-4">
          <label for="address">Address</label>
          <input type="text" id="address" name="address" class="form-control" autocomplete="off" placeholder="Enter address" />
        </div>

        <!-- gender -->
        <div class="my-4">
          <h6>Gender:</h6>
          <input type="radio" name="gender" id="male_checkbox" value="male" />
          <label for="male">Male</label>

          <input type="radio" name="gender" id="female_checkbox" value="female" />
          <label for="female">female</label>

          <input type="radio" name="gender" id="other_checkbox" value="other" />
          <label for="other">other</label>
        </div>
        <!-- Languages -->
        <h6>Languages Known</h6>

        <div class="check-list my-4">
          <input type="checkbox" id="English" name="languages[]" value="English">
          <label for="male">English</label><br>
          <input type="checkbox" id="Japanese" name="languages[]" value="Japanese">
          <label for="female">Japanese</label><br>
          <input type="checkbox" id="Chinese" name="languages[]" value="Chinese">
          <label for="other">Chinese</label><br>
        </div>
        <!-- company -->
        <!-- fetch from company table -->
        <?php
        require "connection.php";

        $sql = "SELECT * FROM `company`";

        $data = mysqli_query($conn, $sql);

        ?>
        <h6>Company</h6>
        <select id="company" name="company" class="form-select" aria-label="Default select example">
          <?php while ($result = mysqli_fetch_assoc($data)) { ?>
            <option value="<?php echo $result['cmp_id']; ?>"><?php echo $result['cmp_name']; ?></option>
          <?php } ?>
        </select>
        <!-- highest education -->
        <div class="my-4">
          <h6>Highest Education:</h6>
          <select id="highest_education" name="highest_education" class="form-select" aria-label="Default select example">
            <option selected>M.Tech</option>
            <option value="M.Sc">M. Sc</option>
            <option value="B. Tech">B. Tech</option>
            <option value="B. sc">B. sc</option>
            <option value="MCA">MCA</option>
            <option value="BCA">BCA</option>
          </select>
        </div>

        <!-- role_id -->
        <div class="my-4">
          <h6>Select Role:</h6>
          <select id="role_id" name="role_id" class="form-select" aria-label="Default select example">
            <option selected value="3">Employee</option>
            <option value="2">Company</option>
            <option value="1">Super Admin</option>
          </select>
        </div>

        <p id="error" class="text-danger font-weight-bold"></p>
        <!-- submit buttons -->
        <div class="buttons my-4">
          <button type="submit" class="btn btn-primary">Sign up</button>

          <a href="./index.php">
            <div class="btn btn-warning ">Login Page</div>
          </a>
        </div>
      </form>
    </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="register_page_validation.js"></script>
</body>

</html>