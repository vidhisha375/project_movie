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
    
    $a_name=isset($_POST['a_name'])? $_POST['a_name'] : NULL;
    $gender=isset($_POST['gender'])? $_POST['gender'] : NULL;
    $category=isset($_POST['category'])? $_POST['category'] : NULL;
    $DOB=isset($_POST['DOB'])? $_POST['DOB'] : NULL;
    $rank=isset($_POST['rank'])? $_POST['rank'] : NULL;

    $sql = "INSERT INTO actor (a_name,gender,category,DOB,rank)VALUES('$a_name','$gender','$category','$DOB','$rank');";
    echo $sql;
    if($conn->query($sql) === TRUE)
{
    echo "<br>Record Inserted";
}
    $var="select * from actor";
    echo $var;
    $result = $conn->query($var);
    if ($result ->num_rows() > 0) {
    while($row = $result->fetch_assoc()) {
         $a_name = $row["a_name"];
         $gender = $row["gender"];
         $category = $row["category"];
         $DOB = $row["DOB"];
        }
    }   
    }
    catch(PDOException $e)
    {echo $sql . "<br>" . $e->getMessage(); }
    $conn = null;
?>

<html>
<head>
<title>Actor list</title>
<!--<script src="js/jquery-3.2.1.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <!--<link rel="stylesheet" type="text/css" href="css/vv.css">-->
<!--<script src="js/form2.js"></script>-->
</head>
<body id="body-color">
 <div id="Sign-Up">
<fieldset style="width:30%"><legend>Actor Form</legend>
<table border="0">
<tr>
<form method="POST" action="<!-- actor.php -->">
	<div id=myform>
<div>
<!-- <div id="a_id"> 
<label>Name: </label>
<br/>
<input type="text" id="a_id" placeholder="a_id"/><br/>
<br/>
</div> -->

<div id="a_name"> 
<label>Actor's Name: </label>
<br/>
<input type="text" id="a_name" name="a_name" placeholder="Actor's Name"/><br/>
<br/>
</div>

<div id="gender"> 
<label>Gender: </label>
<br/>
<input type="text" id="gender" name="gender" placeholder="gender"/><br/>
<br/>
</div>

<div id="category"> 
<label>Category: </label>
<br/>
<input type="text" id="category" name="category" placeholder="category"/><br/>
<br/>
</div>

<div id="DOB"> 
<label>DOB: </label>
<br/>
<input type="date" id="DOB" name="DOB" placeholder="yyyy-mm-dd"/><br/>
<br/>
</div>

<div id="rank"> 
<label>rank </label>
<br/>
<input type="text" id="rank" name="rank" placeholder="rank"/><br/>
<br/>
</div>


<div id="submit">
<tr>
<td><input id="button" type="submit" name="submit" value="Submit"></td>
</tr>
</div>

</div>
</div>
</form>
</tr>
</table>
</fieldset>
</div>
</body>
</html>

