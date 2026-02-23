<?php

$con = mysqli_connect('localhost:3307','root','','travel');

if(isset($_POST['submit'])){

$firstname = $_POST['ffirst'];
$lastname = $_POST['flast'];
$email = $_POST['femail'];
$city = $_POST['city'];
$phone = $_POST['fphone'];
$destination = $_POST['fdesti'];

$stmt = $con->prepare("INSERT INTO booking (ffirst, flast, femail, city, fphone, fdesti) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $firstname, $lastname, $email, $city, $phone, $destination);
$stmt->execute();

echo "<script>alert('Booking Successful!'); window.location='booking.html';</script>";

}
?>