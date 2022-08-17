<?php
require "connection.php";
session_start();
if (!isset($_SESSION['username'])) {
  echo "<h1>You need to login to continue</h1>";
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
</head>


<body>
  <?php
  require "navbar.php";
  echo '<div class="container py-4 ">';
  $email = $_SESSION['username'];

  echo "<h2>Welcome " . $email . "</h2>";

  // 1.get role_id
  $sql_get_role = "SELECT * FROM `employee` WHERE `email` LIKE '$email'";
  $data = mysqli_query($conn, $sql_get_role);
  $result = mysqli_fetch_assoc($data);

  $role_id = $result['role_id'];
  $cmp_id = $result['cmp_id'];
  $sql = "";
  //if role_id == 1 => superuser table: query = SELECT *
  if ($role_id == 1) {
    $sql = "SELECT id,picture, name, gender, email, employee.address, employee.phone, highest_education, languages_known, company.cmp_name FROM employee LEFT JOIN company ON employee.cmp_id = company.cmp_id;";
  }

  //if role_id == 2 => get users with same company name, table: q = SELECT * WHERE company = 
  if ($role_id == 2) {
    $sql = "SELECT id,picture, name, gender, email, employee.address, employee.phone, highest_education, languages_known, company.cmp_name FROM employee LEFT JOIN company ON employee.cmp_id = company.cmp_id WHERE employee.cmp_id = '$cmp_id'";
  }

  //if role_id == 3 can only edit own details
  if ($role_id == 3) {
    $sql = "SELECT id,picture, name, gender, email, employee.address, employee.phone, highest_education, languages_known, company.cmp_name FROM employee LEFT JOIN company ON employee.cmp_id = company.cmp_id WHERE email LIKE '$email'";
  }

  // require "run_query.php";
  $data = mysqli_query($conn, $sql);
  $row = mysqli_num_rows($data); //number of rows

  if ($row > 0) {
    // table header
  ?>
    <table class='table'>
      <thead>
        <tr>
          <th scope='col'></th>
          <th scope='col'>Username</th>
          <th scope='col'>Gender</th>
          <th scope='col'>Email</th>
          <th scope='col'>Address</th>
          <th scope='col'>Phone</th>
          <th scope='col'>Highest Education</th>
          <th scope='col'>Known Languages</th>
          <th scope='col'>Organization</th>
          <th scope='col'>Action</th>
        </tr>
      </thead>
      <tbody>

        <?php
        while ($result = mysqli_fetch_assoc($data)) {
        ?>
          <tr>
            <td><img src="images/<?php echo $result['picture']; ?>" alt="Avatar" 
            style="border-radius: 50%; width: 60px; height:60px;"></td>
            <td><?php echo $result['name']; ?></td>
            <td><?php echo $result['gender']; ?></td>
            <td><?php echo $result['email']; ?></td>
            <td><?php echo $result['address']; ?></td>
            <td><?php echo $result['phone']; ?></td>
            <td><?php echo $result['highest_education']; ?></td>
            <td><?php echo $result['languages_known']; ?></td>
            <td><?php echo $result['cmp_name']; ?></td>
           
            <td><a href="form_edit.php?user_id=<?php echo $result['id'] ?>">Edit</a>
            
              <a href="delete_action.php?user_id=<?php echo $result['id'] ?>">Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    </div>
  <?php

  } else {
    echo "No data found";
  }

  ?>
  
</body>

</html>