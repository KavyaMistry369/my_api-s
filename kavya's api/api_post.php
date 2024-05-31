<?php

header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: POST");

include("config.php");

$data = json_decode(file_get_contents("php://input"),true);

$stud_name = $data['sname'];
$stud_age = $data['sage'];

$sql = "INSERT INTO students(name,age) VALUES ('{$stud_name}','{$stud_age}')";

if(mysqli_query($conn,$sql)){
   echo json_encode(array("message"=>"SuccessFully Added")); 
}
else{
  echo json_encode(array("message"=>"error",'status'=>false));
}



