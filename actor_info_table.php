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

         $a_name = isset($_POST['a_name'])? $_POST['a_name'] : NULL;
         $nick_name = isset($_POST['nick_name'])? $_POST['nick_name'] : NULL;
         $birth_place = isset($_POST['birth_place'])? $_POST['birth_place'] : NULL;
         $zodiac = isset($_POST['zodiac'])? $_POST['zodiac'] : NULL;
         $debut = isset($_POST['debut'])? $_POST['debut'] : NULL;
         $salary = isset($_POST['salary'])? $_POST['salary'] : NULL;
         $marital_status = isset($_POST['marital_status'])? $_POST['marital_status'] : NULL;


         $bac=  "INSERT INTO `actor_info_table` (`a_name`, `nick_name`, `birth_place`, `zodiac`, `debut`, `salary`, `marital_status`) VALUES ('$a_name', '$nick_name' , '$birth_place' , '$zodiac' , '$debut' , '$salary' , '$marital_status');";
         echo $bac;
       
        if($DB_con->query($bac) === TRUE) {
         echo "<br>Record Inserted";
        }

        $var="select * from actor_info_table";
        echo $var;

        $result = $DB_con->query($var);

        while($row = $result->fetch()) {
         $a_name = $row["a_name"];
         $nick_name = $row["nick_name"];
         $birth_place = $row["birth_place"];
         $zodiac = $row["zodiac"];
         $debut = $row["debut"];
         $salary = $row["salary"];
         $marital_status = $row["marital_status"];
         }
    }
    
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }

$DB_con = null;
?> 
    
<html>
    <head>
        <title>Actor Information</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body id="body-color">
     <div id="Sign-Up">
        <fieldset style="width:30%"><legend>Actor Information</legend>
        <table border="0">
        <tr>
        <form method="POST" action="actor_info_table.php">
            <div id=myform>
             <div>
             <div id="a_name"> 
             <label>actor_name </label>
             <br/>
             <input type="text" id="a_name" name="a_name" placeholder="actor_name"/><br/>
             <br/>
             </div>
             <div>
            
            <div id="nick_name"> 
                <label>nick_name </label>
                <br/>
                <input type="text" id="nick_name" name="nick_name" placeholder="nick_name"/><br/>
                <br/>
            </div>

            <div id="birth_place"> 
                <label>birth_place </label>
                <br/>
                <input type="text" id="birth_place" name="birth_place" placeholder="birth_place"/><br/>
                <br/>
            </div>

            <div id="zodiac"> 
                <label>zodiac </label>
                <br/>
                <input type="text" id="zodiac" name="zodiac" placeholder="zodiac"/><br/>
                <br/>
            </div>

            <div id="debut"> 
                <label>debut </label>
                <br/>
                <input type="text" id="debut" name="debut" placeholder="debut"/><br/>
                <br/>
            </div>

            <div id="salary"> 
                <label>salary </label>
                <br/>
                <input type="text" id="salary" name="salary" placeholder="salary"/><br/>
                <br/>
            </div>

            <div id="marital_status"> 
                <label>marital_status</label>
                <br/>
                <input type="text" id="marital_status" name="marital_status" placeholder="marital_status"/><br/>
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





     





