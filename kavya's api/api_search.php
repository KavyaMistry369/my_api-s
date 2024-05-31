<?php

header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: GET");

include("config.php");

// $data = json_decode(file_get_contents("php://input"),true);

$search_value = isset($_GET['search'])? $_GET['search']:die();


// $stud_search = $data['search'];

$sql = "SELECT*FROM students WHERE name LIKE '%{$search_value}%'";
$result = mysqli_query($conn,$sql) or die("Query Failed");

if(mysqli_num_rows($result)>0){
 $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
 echo json_encode($output);    
}
else{
  echo json_encode(array("message"=>"error no record found",'status'=>false));
}

