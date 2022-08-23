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
    <div id="modal"></div>
    <table class='table'>
      <thead>
        <tr>
          <th scope='col'></th>
          <th scope='col'>Name</th>
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
            <td><img src="images/<?php echo $result['picture']; ?>" alt="Avatar" style="border-radius: 50%; width: 60px; height:60px;"></td>
            <td><?php echo $result['name']; ?></td>
            <td><?php echo $result['gender']; ?></td>
            <td><?php echo $result['email']; ?></td>
            <td><?php echo $result['address']; ?></td>
            <td><?php echo $result['phone']; ?></td>
            <td><?php echo $result['highest_education']; ?></td>
            <td><?php echo $result['languages_known']; ?></td>
            <td><?php echo $result['cmp_name']; ?></td>

            <?php $id = $result['id']; ?>
            <td>
              <button class="btn btn-link">
                <a href="form_edit.php?user_id=<?php echo $id; ?>">Edit</a>
              </button>

              <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                Delete
              </button> -->

              <!-- Modal -->
              <!-- <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete ?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure you want to delete?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <a href="delete_action.php?user_id=<?php echo $id; ?>"> <button type="button" class="btn btn-danger">Delete</button></a>

                    </div>
                  </div>
                </div>
              </div> -->

              <a href="delete_action.php?user_id=<?php echo $id; ?>"> Delete</a>

            </td>
          </tr>
          <!-- while ends -->
        <?php } ?>
      </tbody>
    </table>
    </div>
  <?php

  } else {
    echo "No data found";
  }

  ?>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>