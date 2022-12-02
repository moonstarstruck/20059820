<?php

session_start(); // Start the session.

unset($_SESSION['err']); // Clear the variables.

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
  header('Location: index.php');
  exit;
}

// Include config file
require_once 'config.php';

// Define variables and initialize with empty values
$username = $userpassword = '';
$username_err = $password_err = '';

// Processing form data when form is submitted
$username = trim($_POST['username']);
$userpassword = trim($_POST['password']);


// Process the form data
if($_SERVER['REQUEST_METHOD'] == "POST"){
  // Validate credentials
  $sql = 'SELECT id, username, password FROM users WHERE username = ?';

// Prepare a select statement
  if($stmt = mysqli_prepare(
    $conn,
    $sql
  )){ //if statement is prepared
    mysqli_stmt_bind_param($stmt, "s", $param_username);

    // Set parameters
    $param_username = $username;

    if(mysqli_stmt_execute($stmt)){ //if statement is executed
      mysqli_stmt_store_result($stmt);

      if(mysqli_stmt_num_rows($stmt) == 1){ //if there is a result
        mysqli_stmt_bind_result($stmt, $id, $name, $pass);
        mysqli_stmt_fetch($stmt);
        
        // Check if password is correct
        echo '<script>console.log("'.$userpassword.' | '.$userHashedPassword.' | '.$pass.'")</script>';

        if(password_verify($userpassword, $pass)){ //if password is correct
          session_start(); // Start the session.

          $_SESSION['logged_in'] = true; 
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $userpassword;

          header('Location: index.php'); // Redirect to the home page.

        } else { //if password is incorrect
          $error = 'The password you entered was not valid.';
          $_SESSION['err'] = $error;
          header('Location: login.php'); // Redirect to the login page.
        }
      } else { //if there is no result
          $error = 'The username you entered was not found.';
          $_SESSION['err'] = $error;
          header('Location: login.php'); // Redirect to the login page.
      }
    }
  }
  }
?>

