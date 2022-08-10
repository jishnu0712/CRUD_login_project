<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>New Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
  <script defer src="./register_page_validation.js"></script>
</head>

<body>
  <div class="container" style="padding: 0 100px;">
    <h2>Registration</h2>
    <div id="error"></div>
    <form id="form" action="register_action.php" method="post" enctype="multipart/form-data">
      <div class="form-group my-4">
        <label for="username">Username</label>
        <input type="text" id="username" required name="username" class="form-control" placeholder="Enter Username" />
      </div>

      <div class="form-group my-4">
        <label for="email">Email</label>
        <input type="email" id="email" required name="email" class="form-control" placeholder="Enter Email" />
      </div>

      <div class="form-group my-4">
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Phone" />
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
        <input type="text" id="address" name="address" class="form-control" placeholder="Enter address" />
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

      <!-- documents -->
      <!-- <div class="form-group my-4">
        <label for="file">Supporting Documents</label>
        <input id="file" type="file" class="form-control" name="files[]" multiple />
      </div> -->

      <div class="buttons my-4">
        <button type="submit" class="btn btn-primary">Sign up</button>

        <a href="./index.php">
          <div class="btn btn-warning ">Login Page</div>
        </a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>