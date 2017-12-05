<?php
include 'db_connect.php';


if($_SERVER['REQUEST_METHOD']){
    $x = $_POST['x'];
    echo $value1;
    $y = $_POST['y'];
    echo $value2;
}

/*$row1 = $DB_con->query('select id.m_id from movie inner join id on id.a_id= movie.m_id where id.a_id= " . echo $a . "')->fetchAll(PDO::FETCH_ASSOC);
$row2 = $DB_con->query('select id.m_id from movie inner join id on id.a_id= movie.m_id where id.a_id= " . echo $b . "')->fetchAll(PDO::FETCH_ASSOC);

print_r($row1);
print_r($row2);

foreach ($row1 as $k => $v)
{foreach($v as $k1 => $v1)
    $r1[] = $v1;}
foreach ($row2 as $k => $v)
{foreach($v as $a1 => $b1)
    $r2[] = $b1;}

   $result = array_intersect($r1, $r2);
   $result = implode(",",$result);
   print_r($result); echo '<br/>';*/

$row = $DB_con->query("SELECT m_id from (SELECT m_id, group_concat(a_id ) as aid FROM id WHERE a_id IN ( 1, 6 ) GROUP BY m_id) as tab1 where aid like '%1%' and aid like '%6%'")->fetchAll(PDO::FETCH_ASSOC);

foreach ($row as $k => $v){
  foreach ($v as $k1 => $v1){
    $result = $v1;
    print_r($result);
   
$row1 = $DB_con->query("select m_name from movie where m_id IN (".$result.")")->fetchAll(PDO::FETCH_ASSOC);
   
foreach ($row1 as $k => $v){
  foreach($v as $k1 => $v1){
   $res=$v1;
   print_r($res); echo '<br/>';}} }}
?>