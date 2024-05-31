<?php

header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: PUT,PATCH");

include("config.php");

$data = json_decode(file_get_contents("php://input"),true);

$stud_id=$data['sid'];
$stud_name = $data['sname'];
$stud_age = $data['sage'];

$sql = "UPDATE students SET name='{$stud_name}',age='{$stud_age}' WHERE id='{$stud_id}'";

if(mysqli_query($conn,$sql)){
   echo json_encode(array("message"=>"Update SuccessFully")); 
}
else{
  echo json_encode(array("message"=>"error",'status'=>false));
}
