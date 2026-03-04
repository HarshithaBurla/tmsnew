<?php
$con = mysqli_connect('localhost:3307','root','','travel');

if(!$con){
    die("Database Connection Failed");
}

if(isset($_POST['submit'])){

$firstname   = $_POST['ffirst'];
$lastname    = $_POST['flast'];
$email       = $_POST['femail'];
$city        = $_POST['city'];
$phone       = $_POST['fphone'];
$start       = $_POST['fstart'];
$destination = $_POST['fdesti'];

$stmt = $con->prepare("INSERT INTO booking 
(ffirst, flast, femail, city, fphone, fstart, fdesti) 
VALUES (?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssssss", 
$firstname, $lastname, $email, $city, $phone, $start, $destination);

if($stmt->execute()){
    echo "<script>alert('Booking Successful!'); window.location='booking.html';</script>";
}else{
    echo "Error: " . $stmt->error;
}

$stmt->close();
$con->close();
}
?>