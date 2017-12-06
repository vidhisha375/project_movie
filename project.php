<?php
	session_start();
	$_SESSION['login_user']= $username;  // Initializing Session with value of PHP Variable
	echo $_SESSION['login_user'];
?>