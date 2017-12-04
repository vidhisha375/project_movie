
<?php

// Initialize the session

session_start();

 echo "welllcm";

// If session variable is not set it will redirect to login page

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){

  header("location: login1.php");

  exit;

}

?>