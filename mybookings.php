<?php
$con = mysqli_connect("localhost:3307", "root", "", "travel");

if(!$con){
    die("Database Connection Failed");
}

$result = mysqli_query($con, "SELECT * FROM booking ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Bookings</title>
    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg,#dbeafe,#f0f9ff);
        }

        h1{
            text-align:center;
            margin-top:40px;
            color:#0d3b66;
        }

        table{
            width:95%;
            margin:40px auto;
            border-collapse:collapse;
            background:white;
            box-shadow:0 15px 40px rgba(0,0,0,0.2);
            border-radius:10px;
            overflow:hidden;
        }

        th, td{
            padding:12px;
            text-align:center;
        }

        th{
            background:#0d3b66;
            color:white;
        }

        tr:nth-child(even){
            background:#f2f2f2;
        }

        tr:hover{
            background:#e6f2ff;
        }

        .back-btn{
            display:block;
            width:200px;
            margin:20px auto 50px auto;
            text-align:center;
            padding:10px;
            background:#ffd166;
            color:#0d3b66;
            text-decoration:none;
            border-radius:25px;
            font-weight:bold;
        }

        .back-btn:hover{
            background:#ffb703;
        }
    </style>
</head>
<body>

<h1>My Previous Bookings</h1>

<table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>City</th>
        <th>Phone</th>
        <th>Start</th>
        <th>Destination</th>
    </tr>

<?php
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['ffirst']."</td>
                <td>".$row['flast']."</td>
                <td>".$row['femail']."</td>
                <td>".$row['city']."</td>
                <td>".$row['fphone']."</td>
                <td>".$row['fstart']."</td>
                <td>".$row['fdesti']."</td>
              </tr>";
    }
}else{
    echo "<tr><td colspan='8'>No bookings found</td></tr>";
}

mysqli_close($con);
?>

</table>

<a href="mainPage.html" class="back-btn">Back to Home</a>

</body>
</html>