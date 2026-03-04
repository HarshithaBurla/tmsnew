<?php

header("Content-Type: application/json");

// Database connection
$con = mysqli_connect("localhost","root","","travel");

if(!$con){
    echo json_encode(["status"=>"error","message"=>"Database connection failed"]);
    exit;
}

// Check if POST data exists
if(
    !isset($_POST['name']) ||
    !isset($_POST['email']) ||
    !isset($_POST['start']) ||
    !isset($_POST['destination']) ||
    !isset($_POST['budget']) ||
    !isset($_POST['days'])
){
    echo json_encode(["status"=>"error","message"=>"Missing form data"]);
    exit;
}

// Sanitize inputs
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$start = trim($_POST['start']);
$destination = trim($_POST['destination']);
$budget = intval($_POST['budget']);
$days = intval($_POST['days']);

// Prepare statement
$stmt = $con->prepare("INSERT INTO trip_plans 
(name,email,start_city,destination,budget,days) 
VALUES (?,?,?,?,?,?)");

if(!$stmt){
    echo json_encode(["status"=>"error","message"=>"Prepare failed"]);
    exit;
}

$stmt->bind_param("ssssii",$name,$email,$start,$destination,$budget,$days);

if($stmt->execute()){
    echo json_encode(["status"=>"success"]);
} else {
    echo json_encode(["status"=>"error","message"=>"Insert failed"]);
}

$stmt->close();
$con->close();

?>