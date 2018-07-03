<?php
$con=mysqli_connect('localhost', 'root', '', 'users_db');
$json=json_decode(file_get_contents("php://input"));
if($json){
	$name=$json->name;
	$location=$json->location;
	$result=mysqli_query($con, "insert into `users_tb`(`name`, `location`) values('.$name.','.$location.')");
	echo 'success';	
}


$res=mysqli_query($con, "select * from `users_tb` ");
$op=array();
while($row=mysqli_fetch_array($res)){
	$op[]=$row;
}
echo json_encode($op);
?>