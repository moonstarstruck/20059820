<?php
  session_start(); // Start the session.
  $_SESSION = array(); // Clear the variables.

  session_destroy(); // Destroy the session itself.
  header("Location: login.php"); // Redirect to the login page.
  exit; // Quit the script.

?>
