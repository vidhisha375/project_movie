<?php
include_once 'db_connect.php';

try {
     $rec_limit = 10;
     $sql1 = "SELECT count(a_id) FROM actor "; 
     $retval = $DB_con->query($sql1);

     if(! $retval ) {
            die('Could not get data: ' . mysql_error());
     }

     $row = $retval->fetch(PDO::FETCH_NUM);
     $rec_count = $row[0];
     
     $mod = $rec_count % $rec_limit;
     $max = $rec_count / $rec_limit;
     
     if ($mod == 0) {
      $max_pages = $max;
     }
     else {
      $max_pages = $max + 1;
     }
     
     if( isset($_GET{'page'} ) ) {
        $page = $_GET{'page'};
        $offset = $rec_limit * $page ;
     }else {
        $page = 0;
        $offset = 0;
     }
     
     $left_rec = $rec_count - ($page * $rec_limit);

     $sql = "SELECT a_id, a_name ". "FROM actor ". "LIMIT $offset, $rec_limit";
        
     $retval = $DB_con->query($sql);
     
     if(! $retval ) {
        die('Could not get data: ' . mysql_error());
     }
             
     echo "<table border='1'><tr><th>a_name</th></tr>";
    
     while($row = $retval->fetch(PDO::FETCH_ASSOC)) {
     echo "<tr><td><a href='/select_movie.php?a_id=". $row["a_id"] ."'>".$row["a_name"]."</a></td>
     <td>"."</tr>";
     }
     
     echo "</table>";
    }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?> 

<html>
    <head>
         <link rel="stylesheet" type="text/css" href="css/actor_list.css">
    </head>
    <body>
        <form method="POST" action="query.php">
     
        <div class="pagination">
        <a href="#">&laquo;</a>
        
        <?php  
        for($i=1 ; $i<=$max_pages ; $i++) {
        ?>
        <a href='actor_list.php?page=<?php echo ($i-1) ?>'><?php echo $i ?></a>
        
        <?php 
        }
        ?> 
        
        <a href="#">&raquo;</a>
        <label id="lab"> Submit to get movie list. <div id="box-1"></div></label>
        <input type="button" id="submit" value="Submit" />
        
        </div>
        
        </form>
    </body>
</html>


      
