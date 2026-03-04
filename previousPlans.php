<?php
$conn = new mysqli("127.0.0.1","root","","travel",3307);

if($conn->connect_error){
    die("Database Connection Failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM trip_plans ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
<title>Previous Trip Plans</title>

<style>
body{
    margin:0;
    font-family: Arial;
    background: linear-gradient(to right,#1e3c72,#2a5298);
    padding:40px;
    color:white;
}
.card{
    background:white;
    color:black;
    padding:20px;
    margin-bottom:25px;
    border-radius:15px;
}
h2{
    text-align:center;
}
.back-btn{
    display:inline-block;
    padding:10px 20px;
    background:#ff9800;
    color:white;
    text-decoration:none;
    border-radius:6px;
}
</style>
</head>

<body>

<h2>All Previous Trip Plans</h2>

<a class="back-btn" href="mainPage.html">⬅ Back to Home</a>
<br><br>

<?php

if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){

        echo "<div class='card'>";
        echo "<h3>".$row['name']." (".$row['start_city']." → ".$row['destination'].")</h3>";
        echo "<p><b>Email:</b> ".$row['email']."</p>";
        echo "<p><b>Budget:</b> ₹".$row['budget']."</p>";
        echo "<p><b>Days:</b> ".$row['days']."</p>";
        echo "<p><b>Total Cost:</b> ₹".$row['total_cost']."</p>";
        echo "<hr>";
        echo $row['plan_details'];
        echo "<p style='color:gray;font-size:13px;'>Saved on: ".$row['created_at']."</p>";
        echo "</div>";
    }

}else{
    echo "<h3>No Trip Plans Found</h3>";
}

$conn->close();
?>

</body>
</html>