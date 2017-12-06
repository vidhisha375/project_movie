<?php
	include 'db_connect.php';

	$x = $_GET["a_id"];
	$result = $DB_con->query("SELECT * FROM actor where a_id=$x");
	
	while($row = $result->fetch()){
			$a= $row["a_id"];
		}
	
	$row1 = $DB_con->query("select m_name from movie where movie.m_id IN (select id.m_id from movie inner join id on id.a_id= movie.m_id where id.a_id=$a)")->fetchAll(PDO::FETCH_ASSOC);
	
	foreach ($row1 as $k => $v){
		foreach($v as $k1 => $v1)
			$r1 = $v1;
		print_r($r1);
		echo "<br>";
	}
?>