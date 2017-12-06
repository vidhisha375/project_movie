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
   
    $var = "SELECT * FROM actor_info_table where a_id=$x";
    $result = $DB_con->query($var);

    while($row = $result->fetch()){
    $id = $row['a_id'];
    /*$a= $row["a_name"];*/
	$b= $row["nick_name"];
	$c= $row["birth_place"];
	$d= $row["zodiac"];
	$e= $row["debut"];
	$f= $row["salary"];
	$g= $row["marital_status"];
    }
}
catch(PDOException $e){
    "<br>" . $e->getMessage(); 
}
$conn = null;
?>

<html>
    <head>
    <title>Edit Actor Information</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body id="body-color">
     <div id="Sign-Up">
    <fieldset style="width:30%"><legend>Edit <?php
     $retval = $DB_con->query("SELECT  a_id, a_name FROM actor where a_id=$x");
         while($row = $retval->fetch(PDO::FETCH_ASSOC)) {
            $a= $row["a_name"];
        } 
        echo $a ."'s";
         ?> Information</legend>
    <table border="0">
    <tr>
    <form method="POST" action="/save_bio_data.php?a_id=<?php echo $x; ?>">
    	<div id=myform>
    <div>

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
