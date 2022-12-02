<?php

session_start(); // Start the session.

unset($_SESSION['err']); // Clear the variables.

// If the user is already logged in, don't show the register page.
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
  header('Location: index.php');
  exit;
}
// Include config file
require_once 'config.php';

// Define variables and initialize with empty values
$username = $userpassword = $cpassword = '';

// Processing form data when form is submitted
$username = trim($_POST['username']);
$userpassword = trim($_POST['password']);
$cpassword = trim($_POST['cpassword']);

// Process the form data
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if($userpassword === $cpassword){ //if passwords match
        
        $hashedPassword = password_hash($userpassword, PASSWORD_DEFAULT); //hash the password
        
        // Prepare an insert statement
        $sql = 'INSERT INTO users (username, password) VALUES (?, ?)';
    
        if($stmt = mysqli_prepare($conn, $sql)){ // if statement is prepared
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
        
        // Set parameters
        $param_username = $username;
        $param_password = $hashedPassword;
    
        if(mysqli_stmt_execute($stmt)){ //if statement is executed
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;

            header('Location: login.php'); // Redirect to the login page.
            
        } else { //if statement is not executed
            $error = 'Something went wrong. Please try again later.'; //error message
            $_SESSION['err'] = $error;
            header('Location: register.php'); // Redirect to the register page.
        }
        }
    } else { //if passwords don't match
        $error = 'The passwords you entered did not match.'; //error message
        $_SESSION['err'] = $error;
        header('Location: register.php'); // Redirect to the register page.
    }
}
?>