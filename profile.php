<?php
// ! start session
session_start();
// ! if there is request to logout 
// ! we use $_GET because this is non senstivate data 
if (isset($_GET['logout'])) {
  // ! if logout = true delete session
  session_destroy();
  // ! then redirect to login screen
  header("Location: http://localhost/forms");
}
// ! check if he loggedIn or no
if (!isset($_SESSION['loggedIn'])) {
// ! if not then redirect back to login 
  header('Location:' . "http://localhost/forms");
} else {
  // ! double check for loggedIn in session
  if (!$_SESSION['loggedIn']) {
    // ! if false then redirect back to login screen
    header('Location:' . "http://localhost/forms");
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forms</title>
  <link rel="stylesheet" href="./assets/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body class="bg-primary" style="height: auto;">
  <div class="container d-flex justify-content-center align-self-center" style="height: 100vh;">
    <div class="row text-center w-100">
      <div class="col align-self-center">
        <div class="card badge bg-secondary w-100">
          <div class="card-body">
            <!-- // ! use email which we stored in session for welcome page -->
            <p class="card-text">Welcome Back <?php echo $_SESSION['email']; ?>!</p>
            <!-- // ! first method logout with another php file -->
            <a href="logout.php" class="btn btn-danger" href="#" role="button">Logout By another php file</a>
            <!-- // ! second method logout with same file and using above $_GET -->
            <a href="?logout=1" class="btn btn-danger" href="#" role="button">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a href="localhost/forms" id="" hidden></a>
  <script src="./assets/jquery.min.js"></script>
  <script src="./assets/bootstrap.bundle.min.js"></script>
</body>

</html>