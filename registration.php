<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	echo "Connected successfully";
}


// $sql="Create database vidhi123";
// if($conn->query($sql)==TRUE){
// 	echo "<br>Database Created Successfully";
// }
// 	 else{  echo "Error creating database: " . $conn->error;
// }


$use="use vidhi123";
if($conn->query($use)==TRUE)
{
	echo "Use Database";
}
$name=isset($_POST['name'])? $_POST['name'] : NULL;
$email=isset($_POST['email'])? $_POST['email'] : NULL;
$user=isset($_POST['user'])? $_POST['user'] : NULL;
$pass=isset($_POST['pass'])? $_POST['pass'] : NULL;
$cpass=isset($_POST['cpass'])? $_POST['cpass'] : NULL;



$bac= "INSERT INTO emp1 (name,email,user,pass,cpass)VALUES('$name','$email','$user','$pass','$cpass');";

/*
echo $bac;*/
if($conn->query($bac) === TRUE)
{
	echo "<br>Record Inserted";
}

$var="select * from emp1";


 $result = $conn->query($var);

print_r($result);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 $name = $row["name"];
		 $email = $row["email"];
		 $user = $row["user"];
		 $pass = $row["pass"];
		 $cpass = $row["cpass"];

			/*echo "<table border=1><tr>name</tr><tr>email</tr><td>" . $row["name"] . "</td><td>" . $row["email"] .  "</td></table>";*/
		}
	}   

     

/*
$table="Create table emp1( 
userID int(9) NOT NULL auto_increment,
name VARCHAR(50) NOT NULL,
email VARCHAR(40) NOT NULL,
user VARCHAR(40) NOT NULL,
pass VARCHAR(40) NOT NULL,
cpass VARCHAR(40) NOT NULL,
PRIMARY KEY(userID));";
if($conn->query($table)==TRUE){
	echo "<br>Table Created Successfully";
}
else{
	   echo "Error creating Table: " . $conn->error;
}*/


// echo $_POST['name'];



// $delete="Delete from emp;";
// if($conn->query($delete)==TRUE)
// {
// 	echo "<br>Deleted";
// }

// $insert="Insert into emp values(2,'vidhi2','dfs2','dfsfds2','sdfg2');";
// if($conn->query($insert)==TRUE)
// {
// 	echo "<br>Record Inserted";
// }

// $update="update emp set name='vidhisha' where userID=2";
// if($conn->query($update)==TRUE)
// {
// 	echo "<br>Record Updated";
// }

?>



 

