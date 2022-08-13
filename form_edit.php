<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<h1>You need to login to continue</h1>";
    exit();
}

require "connection.php";
require "run_query.php";

$sql = "SELECT * FROM `employee` WHERE `id` =" . $_REQUEST['user_id'];

$result = get_number_of_rows($conn, $sql); //from run query

$username =  $result['name'];
$email =  $result['email'];
$phone =  $result['phone'];
$address =  $result['address'];
$gender =  $result['gender'];
$highest_education = $result['highest_education'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Edit</title>
</head>

<body>
    <?php require "navbar.php" ?>
    <div class="container" style="padding: 0 100px;">
        <h1>Edit</h1>
        <form action="update_action.php?user_id=<?php echo $_REQUEST['user_id'] ?>" method="post">
            <div class="form-group my-4">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo $username ?>" class="form-control" placeholder="Enter Username" />
            </div>

            <div class="form-group my-4">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $email ?>" class="form-control" placeholder="Enter Email" />
            </div>

            <div class="form-group my-4">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" value="<?php echo $phone ?>" class="form-control" placeholder="Enter Phone" />
            </div>

            <div class="form-group my-4">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="<?php echo $address ?>" class="form-control" placeholder="Enter address" />
            </div>

            <!-- gender -->
            <div>
                <h6>Gender:</h6>
                <input type="radio" checked name="gender" id="gender_radio" />
                <label for="gender_radio"><?php echo $gender; ?></label>
            </div>



            <!-- highest education -->
            <h6>Highest Education</h6>
            <select id="highest_education" name="highest_education" class="form-select" aria-label="Default select example">
                <option selected value="<?php echo $highest_education ?>"><?php echo $highest_education ?></option>
                <option value="M.Tech">M.Tech</option>
                <option value="M.Sc">M. Sc</option>
                <option value="B. Tech">B. Tech</option>
                <option value="B. sc">B. sc</option>
                <option value="MCA">MCA</option>
                <option value="BCA">BCA</option>
            </select>

            <button type="submit" class="btn btn-primary">Update</button>
    </div>
</body>

</html>