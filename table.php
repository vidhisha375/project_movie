
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=root123", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("show tables");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $arr = array();
    // print_r($result);
    foreach ($result as $key => $value) {
        //print_r($value);
        //echo($value);
        echo($value['Tables_in_root123']) . "<br>";
        //print_r(($value['Tables_in_root123']) . "<br>");

        // foreach ($value as $k => $val) {
        //     $arr[] = $val;
        // }
// print_r($arr);
}

}

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

$conn = null;
?> 