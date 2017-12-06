<?php
include_once 'db_connect.php';
try{
        if(!$user->is_loggedin()){
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
        	$b= $row["nick_name"];
        	$c= $row["birth_place"];
        	$d= $row["zodiac"];
        	$e= $row["debut"];
        	$f= $row["salary"];
        	$g= $row["marital_status"];
        }
          
        $retval = $DB_con->query("SELECT  a_id, a_name FROM actor where a_id=$x");
       
        while($row = $retval->fetch(PDO::FETCH_ASSOC)) {
                $a= $row["a_name"];
        }
       
    }
catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage(); 
}
    
$conn = null	
?> 

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/actor_info.css">
    </head>
    <body>
        <table>
            <tr> BIO-DATA </tr>
            <tr><td>Actor's Name</td><td><?php echo $a;?></td></tr>
            <tr><td>Birth Place</td><td><?php echo $b;?></td></tr>
            <tr><td>Zodiac</td><td><?php echo $c;?></td></tr>
            <tr><td>Debut</td><td><?php echo $d;?></td></tr>
            <tr><td>Salary</td><td><?php echo $e;?></td></tr>
            <tr><td>Marital Status</td><td><?php echo $f;?></td></tr>
        </table>
        </body>
</html>
            
    
            
