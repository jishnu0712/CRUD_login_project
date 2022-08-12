<?php
require "connection.php";
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>New Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
  <style></style>
</head>

<body>
  <div class="container">
    <?php
    echo "<h2>Welcome ". $_SESSION['username'] . "</h2>";

    $sql = "SELECT * FROM `employee`";

    require "run_query.php";
    $row = get_number_of_rows($conn, $sql); //number of rows

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
            <th scope='col'>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          while ($result = mysqli_fetch_assoc($data)) {
          ?>
            <tr>
              <td><img src="images/<?php echo $result['picture']; ?>" alt="Avatar" style="border-radius: 50%; width: 60px;"></td>
              <td><?php echo $result['name']; ?></td>
              <td><?php echo $result['gender']; ?></td>
              <td><?php echo $result['email']; ?></td>
              <td><?php echo $result['address']; ?></td>
              <td><?php echo $result['phone']; ?></td>
              <td><?php echo $result['highest_education']; ?></td>
              <td><?php echo $result['languages_known']; ?></td>
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