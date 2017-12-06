<?php
include_once 'db_connect.php';

try {
    if(!$user->is_loggedin()){
         $user->redirect('index.php');
    }
    $user_id = $_SESSION['user_session'];
    $stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
    $stmt->execute(array(":user_id"=>$user_id));
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

    $x = $_GET["a_id"];
    echo "Bio-Data changes saved successfully!!!";
    
     $a_name = isset($_POST['a_name'])? $_POST['a_name'] : NULL;
     $nick_name = isset($_POST['nick_name'])? $_POST['nick_name'] : NULL;
     $birth_place = isset($_POST['birth_place'])? $_POST['birth_place'] : NULL;
     $zodiac = isset($_POST['zodiac'])? $_POST['zodiac'] : NULL;
     $debut = isset($_POST['debut'])? $_POST['debut'] : NULL;
     $salary = isset($_POST['salary'])? $_POST['salary'] : NULL;
     $marital_status = isset($_POST['marital_status'])? $_POST['marital_status'] : NULL;

     $bac=  "UPDATE `actor_info_table` SET a_name='$a_name', nick_name= '$nick_name', birth_place='$birth_place' , zodiac='$zodiac' , debut='$debut' , salary='$salary' , marital_status='$marital_status' where a_id=$x ;";
  
     if($DB_con->query($bac) === TRUE){
        echo "<br>Record Inserted";
      }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?> 