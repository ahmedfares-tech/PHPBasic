<?php
// ! start session
session_start();

// ? Define Session Errors and make them empty
$_SESSION['emailError'] = $_SESSION['passwordError'] = "";
// ? Define Variables
$email = $password = "";


// Validate Form Method is Post 
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  // ! in form we use htmlspecialchars text will be in special form for this i copied function from w3scools to use it and named it read_input
  // ! it's like encryption and decryption for data but with easy method :)
  // ? cause Method is POST we use $_POST to get data
  // * After get data pass it to read_input function to return real text
  $email = read_input($_POST['email']);
  $password = read_input($_POST['password']);


  //* Save User inputs in session cause if there is error return them to him or use it in profile.php file as we want
  $_SESSION['email'] = $email;
  $_SESSION['password'] = $password;

  // * validate if $email not empty text
  if (empty($email)) {
    // ! if empty edit $_SESSION['emailError'] with custom Message 
    $_SESSION['emailError'] = "Enter Vaild Email";
  }
 
  // * if not empty then we Check if it's real email with function filter_var
  // !           ($value we want to validate , $filter we want to use below refrence for them , $options if you want to handle data or nested validate with it)
  // * filter_var($value,                      $filter,                                         $options); 
  // ? REF: https://www.php.net/manual/en/filter.filters.validate.php and you can search 
 
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 
    // ! if not valid email then edit session to add error
    $_SESSION['emailError'] = "Enter Vaild Email Format";
 
  }
 
 
  // * validate if $password not empty text
  if (empty($password)) {
  
    // ! if empty edit $_SESSION['passwordError'] with custom Message 
    $_SESSION['passwordError'] = "Enter Vaild Password";
 
  } 

  // ! another validate if password length is less than 6 letters 
  // ? cause it's string we use strlen($password) to count.
  // ? in array we use count($array)
  else if (strlen($password) < 6) {
  
    // ! if password less than 6 letters then edit session to add error
    $_SESSION['passwordError'] = "Min password length : 6";
  
  }


  // ! Check if there is any error
  if (!empty($_SESSION['emailError']) || !empty($_SESSION['passwordError'])) {
    // ! if there is error then use header() to redirect back to login page
    header("Location: http://localhost/forms/");
  }
  
  else {
  
    // ! if there is no error then add to session variable that he is logged in
    $_SESSION['loggedIn'] = true;
  
    // ! redirect forward to profile
    header("Location: http://localhost/forms/profile.php");
  
  }



} else {
  // ! if method not POST then return error message 
  // ! or you can redirect back with error in session like above
  echo 'Wrong Method';
}

// * Function from w3scools that handle htmlspecialchars
function read_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
