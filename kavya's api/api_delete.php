<?php

header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: DELETE");

include("config.php");

$data = json_decode(file_get_contents("php://input"),true);

$stud_id = $data['sid'];

$sql = "DELETE FROM students WHERE id={$stud_id}";

if(mysqli_query($conn,$sql)){
 echo json_encode(array("message"=>"Delete Record SuccessFully"));    
}
else{
  echo json_encode(array("message"=>"error no record found",'status'=>false));
}

