<?php
// ! start Session
session_start();
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

<body style="height: auto;">
  <div class="container d-flex justify-content-center align-self-center" style="height: 100vh;">
    <div class="row text-center w-100">
      <div class="col align-self-center">
        <span class="mb-3 badge bg-primary" style="font-size: 20px;">
          <i class="fa fa-key" aria-hidden="true"></i>
        </span>




<!-- // ! Cause There is Sensiitvite data we Use POST METHOD for this form -->
<!-- // ! we put action into another file php for good organization for code -->
<!-- // ! we used htmlspecialchars for avoid hackers use XSS / injecting codes -->
<!-- // ! Full Details and referance : https://www.w3schools.com/php/php_form_validation.asp -->
<!-- // ! if you use $_SERVER['PHP_SELF'] then action should be here or function should be here cause he submit on this file Not in another file -->
        <form action="<?php echo htmlspecialchars("./LoginScript.php") ?>" method="POST">
          <div class="mb-3">

            <label for="email" class="form-label">Email</label>

            <!-- // * Email Input -->

            <input type="text" class="form-control

             // ! if session error is set add is-invalid class to make it red input
             <?php if (!empty($_SESSION['passwordError'])) echo 'is-invalid'; ?>" 

             // ! name we use in forms to get value in php (name which we waitting for it)
             name="email"
             
             placeholder="E-Mail"

              // ! if user input email before and there is error return him same data from session
             value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email']; ?>"
            >

            <!-- // * Div which show Error Message from Session -->
            <?php if (!empty($_SESSION['emailError'])) echo '<div class="invalid-feedback">' . $_SESSION['emailError'] . '</div>'; ?>

          </div>



          <div class="mb-3">
            <label for="password" class="form-label">password</label>

            <!-- // * Password Input -->
            <input type="password" class="form-control
            
            // ! if session error is set add is-invalid class to make it red input
             <?php if (!empty($_SESSION['passwordError'])) echo 'is-invalid'; ?>"
            
            // ! name we use in forms to get value in php (name which we waitting for it)
            name="password"

            placeholder="password"

            // ! if user input password before and there is error return him same data from session just for test in real world we don't do that for password

            value="<?php if (isset($_SESSION['password'])) echo $_SESSION['password']; ?>"
            >

            <!-- // * Div which show Error Message from Session -->
            <?php if (!empty($_SESSION['passwordError'])) echo '<div class="invalid-feedback">' . $_SESSION['passwordError'] . '</div>';?>
          </div>




          <button type="submit" class="btn w-100 btn-primary">Login</button>
        </form>








      </div>
    </div>
  </div>
  <script src="./assets/jquery.min.js"></script>
  <script src="./assets/bootstrap.bundle.min.js"></script>
</body>

</html>