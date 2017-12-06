<?php
    include 'db_connect.php';

    $x = $_POST['list1'];
    echo $x;
    $y = $_POST['list2'];
    echo $y;

    /*$row = $DB_con->query("SELECT m_id from (SELECT m_id, group_concat(a_id ) as aid FROM id WHERE a_id IN ( 1, 6 ) GROUP BY m_id) as tab1 where aid like '%1%' and aid like '%6%'")->fetchAll(PDO::FETCH_ASSOC);*/
    $row = $DB_con->query("SELECT m_id from (SELECT m_id, group_concat(a_id ) as aid FROM id WHERE a_id IN (  " . echo $x . ",  " . echo $y . ") GROUP BY m_id) as tab1 where aid like '%" . echo $x . "%' and aid like '%" . echo $y . "%'")->fetchAll(PDO::FETCH_ASSOC);

    foreach ($row as $k => $v){
        foreach ($v as $k1 => $v1){
          $result = $v1;
          print_r($result);
     
          $row1 = $DB_con->query("select m_name from movie where m_id IN (".$result.")")->fetchAll(PDO::FETCH_ASSOC);
     
          foreach ($row1 as $k => $v){
            foreach($v as $k1 => $v1){
                $res=$v1;
                print_r($res); echo '<br/>';
              }
            }
        }
      }
?>