<?php
include_once('infop.php');

$result = null;

if(isset($_POST['goa'])) $que="SELECT * FROM information WHERE pname='Goa'";
if(isset($_POST['kerala'])) $que="SELECT * FROM information WHERE pname='Kerala'";
if(isset($_POST['mysore'])) $que="SELECT * FROM information WHERE pname='Mysore'";
if(isset($_POST['ladakh'])) $que="SELECT * FROM information WHERE pname='Ladakh'";
if(isset($_POST['agra'])) $que="SELECT * FROM information WHERE pname='Taj Mahal'";
if(isset($_POST['india_gate'])) $que="SELECT * FROM information WHERE pname='India Gate'";
if(isset($_POST['hampi'])) $que="SELECT * FROM information WHERE pname='Hampi'";
if(isset($_POST['rajasthan'])) $que="SELECT * FROM information WHERE pname='Rajasthan'";
if(isset($_POST['manali'])) $que="SELECT * FROM information WHERE pname='Manali'";
if(isset($_POST['srinagar'])) $que="SELECT * FROM information WHERE pname='Srinagar'";
if(isset($_POST['amritsar'])) $que="SELECT * FROM information WHERE pname='Amritsar'";
if(isset($_POST['jogfalls'])) $que="SELECT * FROM information WHERE pname='Jog Falls'";

if(isset($_POST['search_p'])) {
    $search = $_POST['search_p'];
    $que="SELECT * FROM information WHERE pname='$search'";
}

if(isset($que)){
    $result = mysqli_query($db, $que);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Place Information</title>

<style>

/* ===== BODY ===== */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #141e30, #243b55);
    color: white;
}

/* ===== NAVBAR ===== */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 40px;
    background: rgba(0,0,0,0.6);
}

.navbar ul {
    list-style: none;
    display: flex;
    gap: 25px;
    margin: 0;
}

.navbar a {
    color: white;
    text-decoration: none;
}

.navbar a:hover {
    color: #ffd700;
}

/* ===== HEADER ===== */
.header-title {
    text-align: center;
    margin: 30px 0;
    font-size: 36px;
}

/* ===== MAIN CONTAINER ===== */
.container {
    width: 85%;
    margin: auto;
}

/* ===== MAIN INFO CARD ===== */
.description-container {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    background: rgba(255,255,255,0.1);
    padding: 25px;
    border-radius: 15px;
    backdrop-filter: blur(10px);
}

/* LEFT IMAGE */
.main-image img {
    width: 350px;
    border-radius: 10px;
}

/* RIGHT CONTENT */
.description {
    flex: 1;
}

.description h1 {
    margin-top: 0;
}

.package {
    color: #ffd700;
    font-weight: bold;
    margin-top: 15px;
}

/* BOOK BUTTON */
.book-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 25px;
    background: #ffd700;
    color: black;
    text-decoration: none;
    border-radius: 25px;
    transition: 0.3s;
}

.book-btn:hover {
    background: white;
}

/* ===== IMAGE GALLERY ===== */
.image-container {
    margin-top: 40px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.image-container img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 10px;
    transition: 0.3s;
}

.image-container img:hover {
    transform: scale(1.05);
}

</style>
</head>

<body>

<header class="navbar">
    <a href="mainPage.html">
        <img src="earth-globe.png" alt="Logo" style="width:36px;height:36px">
    </a>

    <ul>
        <li><a href="mainPage.html">Home</a></li>
        <li><a href="destination.html">Destination</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="feedback.html">Feedback</a></li>
        <li><a href="index.html">Logout</a></li>
    </ul>
</header>

<h1 class="header-title">Place Information</h1>

<div class="container">

<?php
if($result && mysqli_num_rows($result) > 0){
while($rows = mysqli_fetch_assoc($result)){
?>

<div class="description-container">

    <div class="main-image">
        <img src="<?php echo $rows['pi_main']; ?>">
    </div>

    <div class="description">
        <h1><?php echo $rows['pname']; ?></h1>
        <p style="text-align: justify;">
            <?php echo $rows['pdescription']; ?>
        </p>
        

        <a href="booking.html" class="book-btn">Book Tour</a>
    </div>

</div>

<div class="image-container">
    <img src="<?php echo $rows['pi1']; ?>">
    <img src="<?php echo $rows['pi2']; ?>">
    <img src="<?php echo $rows['pi3']; ?>">
</div>

<?php
}
}else{
    echo "<h2 style='text-align:center;'>No information found.</h2>";
}
?>

</div>

</body>
</html>