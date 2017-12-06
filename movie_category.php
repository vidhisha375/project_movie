<?php
include_once 'db_connect.php';

try {
    if(!$user->is_loggedin())
    {
     $user->redirect('index.php');
    }
    $user_id = $_SESSION['user_session'];
    $stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
    $stmt->execute(array(":user_id"=>$user_id));
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

<html>
<head>
	<title>category</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/category.css">
</head>
<body id="main">
	<div class="header1">
		<div class="bolly">
			<label>
				<a href="http://practice2:8080/bollywood.php"> BOLLYWOOD</a>
			</label>
		</div>
	</div>
	<div class="header2">
		<div class="holly">
			<label>
				<a href="http://practice2:8080/hollywood.php"> HOLLYWOOD</a>
			</label>
		</div>
	</div>
</body>
</html>



