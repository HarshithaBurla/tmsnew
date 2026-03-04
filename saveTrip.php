<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("127.0.0.1","root","","travel",3307);

if($conn->connect_error){
    die("DB Connection Failed: " . $conn->connect_error);
}

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$start = $_POST['start'] ?? '';
$destination = $_POST['destination'] ?? '';
$budget = $_POST['budget'] ?? 0;
$days = $_POST['days'] ?? 0;
$totalCost = $_POST['totalCost'] ?? 0;
$planDetails = $_POST['planDetails'] ?? '';

$sql = "INSERT INTO trip_plans 
(name,email,start_city,destination,budget,days,total_cost,plan_details) 
VALUES (?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);

if(!$stmt){
    die("Prepare Failed: " . $conn->error);
}

$stmt->bind_param("ssssiiis",
    $name,
    $email,
    $start,
    $destination,
    $budget,
    $days,
    $totalCost,
    $planDetails
);

if($stmt->execute()){
    echo "success";
}else{
    echo "Execute Failed: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>