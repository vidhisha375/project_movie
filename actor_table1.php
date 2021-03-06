
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

         $sql = "SELECT a_id, a_name, gender, category, DOB, rank ". 
            "FROM actor ".
            "LIMIT $offset, $rec_limit";
            
         $retval = $DB_con->query($sql);
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
         
         echo "<table border='1'><tr><th>a_id</th><th>a_name</th><th>gender</th><th> category</th><th> DOB</th> <th> rank</th></tr>";

       while($row = $retval->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
        <td>".$row["a_id"]."</td>
        <td>".$row["a_name"]."</td> 
        <td>".$row["gender"]."</td>
        <td>".$row["category"]."</td>
        <td>".$row["DOB"]."</td>
        <td>".$row["rank"]."</td>
        <td>"."</tr>";
    }
    echo "</table>";
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?> 

<html>
<head>
<style>
.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
</head>
<body>

<div class="pagination">
  <a href="#">&laquo;</a>
  <?php  
  for($i=1 ; $i<=$max_pages ; $i++) 
  {
  ?>
    <a href='actor_table1.php?page=<?php echo ($i-1) ?>'><?php echo $i ?></a>
  
   <?php } ?> 
<a href="#">&raquo;</a>
</div>
</body>
</html>


