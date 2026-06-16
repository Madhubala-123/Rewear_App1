<?php

$name = $_GET['name'] ?? 'Customer';
$address = $_GET['address'] ?? 'Chennai';
$phone = $_GET['phone'] ?? '9876543210';
$time = $_GET['time'] ?? '10:30 AM';
$clothes = $_GET['clothes'] ?? 'Clothes';

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pickup Details - ReWear</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{

min-height:100vh;

padding:14px;

display:flex;
justify-content:center;
align-items:center;

background:
radial-gradient(circle at center,
#073b5a 0%,
#02142b 65%);

overflow:hidden;

color:white;

position:relative;
}

/* STARS */

body::before{

content:"";

position:fixed;

top:0;
left:0;

width:100%;
height:100%;

background-image:
radial-gradient(white 1px, transparent 1px);

background-size:140px 140px;

opacity:0.10;

pointer-events:none;

z-index:-1;
}

/* MAIN */

.container{

width:100%;
max-width:1600px;

padding:20px;

border-radius:28px;

background:
rgba(255,255,255,0.04);

backdrop-filter:blur(14px);

border:
1px solid rgba(255,255,255,0.08);

box-shadow:
0 15px 35px rgba(0,0,0,0.35);
}

/* TOP */

.top{

display:flex;
justify-content:space-between;
align-items:center;

margin-bottom:18px;
}

/* LOGO */

.logo{

font-size:58px;
font-weight:800;
}

.logo span{

color:#56dfff;
}

/* STATUS */

.status{

background:
rgba(255,255,255,0.05);

padding:16px 22px;

border-radius:18px;

text-align:center;
}

.status h3{

font-size:16px;
margin-bottom:6px;
}

.status p{

font-size:16px;
font-weight:700;

color:#56dfff;
}

/* CONTENT */

.content{

display:grid;
grid-template-columns:1fr 1fr;

gap:20px;
}

/* LEFT */

.left-box{

background:
rgba(255,255,255,0.05);

padding:26px;

border-radius:24px;
}

.left-box h1{

font-size:34px;

margin-bottom:24px;
}

.info{

margin-bottom:22px;

font-size:16px;

line-height:1.8;
}

.info span{

color:#56dfff;

font-weight:700;
}

/* CLOTHES */

.clothes{

background:
rgba(255,255,255,0.07);

padding:18px;

border-radius:18px;

margin-bottom:22px;

font-size:16px;

line-height:1.6;
}

/* BUTTONS */

.buttons{

display:flex;
gap:16px;
}

.btn{

flex:1;

padding:15px;

border-radius:16px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

color:#001219;

font-size:16px;
font-weight:700;

text-decoration:none;

text-align:center;

transition:0.3s;
}

.btn:hover{

transform:scale(1.02);
}

/* MAP */

.map-box{

background:
rgba(255,255,255,0.05);

padding:20px;

border-radius:24px;
}

.map-title{

font-size:26px;
font-weight:700;

text-align:center;

margin-bottom:16px;

color:#56dfff;
}

.map{

width:100%;
height:450px;

border:none;

border-radius:22px;

overflow:hidden;
}

/* BACK */

.back{

margin-top:18px;

text-align:center;
}

.back a{

color:#56dfff;

text-decoration:none;

font-size:14px;
}

/* MOBILE */

@media(max-width:1200px){

.content{

grid-template-columns:1fr;
}

body{

overflow:auto;
}
}

@media(max-width:700px){

.logo{

font-size:44px;
}

.left-box h1{

font-size:28px;
}

.buttons{

flex-direction:column;
}

.map{

height:320px;
}

.top{

flex-direction:column;
gap:18px;
}
}

</style>

</head>

<body>

<div class="container">

<!-- TOP -->

<div class="top">

<div class="logo">

Re<span>Wear</span>

</div>

<div class="status">

<h3>Pickup Status</h3>

<p>ON THE WAY</p>

</div>

</div>

<!-- CONTENT -->

<div class="content">

<!-- LEFT -->

<div class="left-box">

<h1>

<?php echo $name; ?>

</h1>

<div class="info">

📍 <span>Address:</span>
<?php echo $address; ?>

</div>

<div class="info">

📞 <span>Phone:</span>
+91 <?php echo $phone; ?>

</div>

<div class="info">

🕒 <span>Pickup Time:</span>
<?php echo $time; ?>

</div>

<div class="info">

🧺 <span>Clothes Count:</span>
12 Items

</div>

<div class="clothes">

<?php echo $clothes; ?>

</div>

<div class="buttons">

<a href="#" class="btn">

Start Pickup

</a>

<a href="pickup_completed.php" class="btn">

Mark Completed

</a>

</div>

</div>

<!-- RIGHT -->

<div class="map-box">

<div class="map-title">

Customer Location Map

</div>

<iframe
class="map"
src="https://maps.google.com/maps?q=<?php echo urlencode($address); ?>&t=&z=13&ie=UTF8&iwloc=&output=embed">
</iframe>

</div>

</div>

<!-- BACK -->

<div class="back">

<a href="pickup_agent_dashboard.php">

← Back To Dashboard

</a>

</div>

</div>

</body>

</html>