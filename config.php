<?php

// Set the variables for connection
define('DB_SERVER', 'localhost'); // DB host
define('DB_USERNAME', 'root'); // DB Username
define('DB_PASSWORD', ''); // DB Password
define('DB_NAME', 'sdgweb_db'); // DB_Name

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

?>

