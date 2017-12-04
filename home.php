<?php
include_once 'db_connect.php';
if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css"  />
<title>welcome - <?php print($userRow['user_email']); ?></title>
</head>

<body>

<div class="header">
 <div class="left">
     <label><a href="http://practice:8080/category.php">Welcome to movies site!!</a></label>
    </div>
    <div class="right">
     <label><a href="logout.php?logout=true">
     	<i class="glyphicon glyphicon-log-out"></i> logout</a></label>
    </div>
</div>
<div class="content">
welcome : <?php print($userRow['user_name']); ?>
 	 </div>
 	 <!-- <label>To get complete list of actors, click on!!-<a href="http://practice:8080/actor_table.php">ACTOR LIST</a></label> -->
     <?php
 	 $role = $_SESSION['role'];
 	 if($role == 1)
 	 { 
 	 	?>
 	 	<label>To get complete list of actors, click on!!-<a href="http://practice:8080/actor_table.php">ACTOR LIST</a></label>
 	 	
 	 	<?php 
 	 } 
 	  
 	 	 	 if($role == 2)
 	 { ?>
 	 	<label>To get complete list of actors, click on!!-<a href="http://practice:8080/actor_table1.php">ACTOR LIST</a></label>
 	 <?php } ?>
</body>
</html>