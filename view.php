<?php
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "dblogin";

try
{
     $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
     $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     echo $e->getMessage();
}

/*if(!empty($_GET['id'])){
   
    $x= $_GET['id'];*/
    //Get image data from database
    $result = $DB_con->query("SELECT * FROM images ");
    echo "hellooo";
  echo $result;


    /*if($result->num_rows() > 0){*/
        $imgData = $result->fetch(PDO::FETCH_ASSOC);
                //Render image
        header("Content-type: image/jpg"); 
        echo "Hellooo";
        echo $imgData['image']; 
  /*  /*}else{*/
        echo 'Image not found...';
    /*}*/
/*}*/
?>