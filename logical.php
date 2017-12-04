<?php

include('db_connect.php');
/*$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "root123";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	echo "Connected successfully";
}
*/

/*$sql="Create database aa4";
if($conn->query($sql)==TRUE){
	echo "<br>Database Created Successfully";
}
else{
	   echo "Error creating database: " . $conn->error;
}
*/

/*$use="use aa4";
if($conn->query($use)==TRUE)
{
	echo "Use Database";
}*/
$number=isset($_POST['number'])? $_POST['number'] : NULL;
$m = 0;
$w = 0;
$z = 0;
$diff = 0;
$data = 0;
 $diff = 0;

for($arr=0;$arr<$number;$arr++)
{
	$n[$arr]=$arr+1;
}

for($i=1;$i<$number; $i++)
{
	if($number % $i==0)
	{$w++;}
}
echo $w;
for($c=0;$c<$number;$c++)
{
	for($d=$c+1;$d<$number;$d++)
	{
		if($n[$c] + $n[$d] == $number)
			{$z++;}
		else
		{
                if($n[$c]+$n[$d]<$number){
				$x=$n[$c]+$n[$d];
				recursive($x, $number, $m, $x, $n);

		}}
	
	
}}

	function recursive($data, $number, $m, $x, $n)
			{
				
				$diff=$number - $data;
				for($r=0;$r<$number;$r++)
				{
					if($n[$r]<$diff) 
					{
                     $x=$x+$n[$r];
                     recursive($x, $number, $m, $x, $n);
                    }
                }
                $m++;
                 echo $m;
		    }	

 echo $z;
?>
             
						
                     	
                     	
