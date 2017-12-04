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

    $x = $_GET["a_id"]; 
    echo $x;
    $var = "SELECT * FROM actor_info_table where a_id=$x";
    $result = $DB_con->query($var);

    while($row = $result->fetch()){
    $id = $row['a_id'];
    $a= $row["a_name"];
	$b= $row["nick_name"];
	$c= $row["birth_place"];
	$d= $row["zodiac"];
	$e= $row["debut"];
	$f= $row["salary"];
	$g= $row["marital_status"];
    }

    //  $sql = "SELECT a_id FROM actor_info_table";
    // $result = $DB_con->query($sql);
    
    // while($row = $result->fetch( PDO::FETCH_ASSOC ))
    //  {
    //     echo $row["a_id"];}
    
    /*if($result->fetch()!='null'){
    while($row = $result->fetch()){
    $a= $row["a_name"];
	$b= $row["nick_name"];
	$c= $row["birth_place"];
	$d= $row["zodiac"];
	$e= $row["debut"];
	$f= $row["salary"];
	$g= $row["marital_status"];
    }}
    else
    	{$a="";  $b="";    $c="";    $d="";    $e="";    $f="";}*/
}
catch(PDOException $e)
    { "<br>" . $e->getMessage(); }
    $conn = null;

?>

<html>
<head>
<title>Edit Actor Information</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body id="body-color">
 <div id="Sign-Up">
<fieldset style="width:30%"><legend>Edit Actor Information</legend>
<table border="0">
<tr>
<form method="POST" action="/edit_actor_info1.php?a_id=<?php echo $x; ?>">
	<div id=myform>
<div>
<div id="a_name"> 
<label>actor_name </label>
<br/>
<input type="text" id="a_name" name="a_name" value="<?php echo $a; ?>" ><br/>
	
<br/>
</div>


<div id="nick_name"> 
<label>nick_name </label>
<br/>
  <input type="text" id="nick_name" name="nick_name" value="<?php echo $b; ?>"><br/>
<br/>
</div>


<div id="birth_place"> 
<label>birth_place </label>
<br/>
<input type="text" id="birth_place" name="birth_place" value="<?php echo $c; ?>"><br/>
<br/>
</div>

<div id="zodiac"> 
<label>zodiac </label>
<br/>
<input type="text" id="zodiac" name="zodiac" value="<?php echo $c; ?>"><br/>
<br/>
</div>

<div id="debut"> 
<label>debut </label>
<br/>
<input type="text" id="debut" name="debut" value="<?php echo $d; ?>"><br/>
<br/>
</div>

<div id="salary"> 
<label>salary </label>
<br/>
<input type="text" id="salary" name="salary" value="<?php echo $e; ?>"><br/>
<br/>
</div>

<div id="marital_status"> 
<label>marital_status</label>
<br/>
<input type="text" id="marital_status" name="marital_status" value="<?php echo $f; ?>"><br/>
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
