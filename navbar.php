<?php
$flag = false;
if (isset($_SESSION['username'])) {
  // enable flag
  $flag = true;
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-padding">
  <a class="navbar-brand" href="http://localhost/login_project/">Employee+</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse nav-list" id="navbarNav">
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/login_project/">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo $flag ?  "" : "disabled" ?>" href="logout_action.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>