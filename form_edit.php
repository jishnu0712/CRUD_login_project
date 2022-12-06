<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<h1>You need to login to continue</h1>";
    exit();
}

require "connection.php";

$sql = "SELECT * FROM `employee` WHERE `id` =" . $_REQUEST['user_id'];

require "run_query.php";
$result = get_assoc_arr($conn, $sql);

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
    <div class="register-box container shadow px-5 py-4 my-4" >
        <h1>Update Details</h1>
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <?php
                                if( isset($result['picture']) && !empty($result['picture']) ) { ?>
                                    <img class="rounded-circle mt-5" width="150px" src="images/<?php echo $result['picture']?>">
                                <?php } else {?>
                                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                <?php } ?>
                            
                            <span class="font-weight-bold"><?php echo $username ?></span><span class="text-black-50"><?php echo $email ?></span>
                        </div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile Settings</h4>
                            </div>
                            <form action="update_action.php?user_id=<?php echo $_REQUEST['user_id'] ?>" method="post">
                                <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="Name" name="username" value="<?php echo $username?>"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label  class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" name="phone" value="<?php echo $phone ?>"></div>
                                    <div class="col-md-12"><label  class="labels">Address</label><input type="text" class="form-control" name="address" placeholder="enter address" value="<?php echo $address ?>"></div>
                                    <div class="col-md-12"><label  class="labels">Email ID</label><input type="text" class="form-control" name="email" placeholder="enter email id" value="<?php echo $email ?>"></div>
                                    <div class="col-md-12">
                                        <!-- <label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value=""> -->
                                        <label class="labels">Highest Education</label>
                                        <select id="highest_education" name="highest_education" class="form-select" aria-label="Default select example">
                                            <option selected value="<?php echo $highest_education ?>"><?php echo $highest_education ?></option>
                                            <option value="M.Tech">M.Tech</option>
                                            <option value="M.Sc">M. Sc</option>
                                            <option value="B. Tech">B. Tech</option>
                                            <option value="B. sc">B. sc</option>
                                            <option value="MCA">MCA</option>
                                            <option value="BCA">BCA</option>
                                        </select>

                                    </div>
                                </div>
                            
                                <input class="btn btn-primary profile-button" type="submit"/>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                            <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                            <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </form> -->
    </div>
</body>

</html>