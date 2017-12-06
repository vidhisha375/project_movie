<?php
  include 'db_connect.php';

  $retval = $DB_con->query("SELECT a_id, a_name FROM actor");
  $retval1 = $DB_con->query("SELECT a_id, a_name FROM actor");
?>

<html>
    <body>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
          <form method="POST" action="query.php">
          <select name= "list1" id="actor1">
            <?php 
            while($row = $retval->fetch(PDO::FETCH_ASSOC)){
            ?>
            <option name="<?php echo $row["a_id"]; ?>" value="<?php echo $row["a_id"]; ?>" ><?php echo $row["a_name"]; ?></option>
            <?php 
            } 
            ?>
          </select>
          
          <select name="list2" id="actor2">
            <?php
             while($row = $retval1->fetch(PDO::FETCH_ASSOC)){
            ?>
            <option name="<?php echo $row["a_id"]; ?>" value="<?php echo $row["a_id"]; ?>" ><?php echo $row["a_name"]; ?></option>
            <?php
            }
            ?> 
          </select>

          <div id="submit">
            <tr><td><input id="button" type="submit" name="submit" value="Submit"></td></tr>
          </div>
          </form>
    </body>
</html>



          





            

