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

/* BACKGROUND */

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

/* MAIN CONTAINER */

.container{

width:100%;
max-width:1500px;

padding:18px;

border-radius:28px;

background:
rgba(255,255,255,0.05);

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

font-size:62px;
font-weight:800;
line-height:1;
}

.logo span{

color:#56dfff;
}

/* STATUS */

.status{

background:
rgba(255,255,255,0.06);

padding:18px 24px;

border-radius:18px;

text-align:center;
}

.status h3{

font-size:18px;
margin-bottom:6px;
}

.status p{

font-size:18px;
font-weight:700;

color:#56dfff;
}

/* GRID */

.grid{

display:grid;
grid-template-columns:1fr 1fr;

gap:16px;
}

/* LEFT CARD */

.left-card{

background:
rgba(255,255,255,0.05);

padding:24px;

border-radius:24px;
}

.left-card h1{

font-size:34px;

margin-bottom:24px;
}

.info{

font-size:18px;

line-height:2.4;
}

.info span{

color:#56dfff;

font-weight:700;
}

/* CLOTHES */

.clothes-box{

margin-top:18px;

background:
rgba(255,255,255,0.06);

padding:16px;

border-radius:18px;

font-size:17px;
}

/* BUTTONS */

.buttons{

margin-top:22px;

display:flex;
gap:16px;
}

.btn{

flex:1;

padding:15px;

border:none;

border-radius:16px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

color:#001219;

font-size:18px;
font-weight:700;

cursor:pointer;

text-decoration:none;

text-align:center;

transition:0.3s;
}

.btn:hover{

transform:scale(1.02);
}

/* MAP CARD */

.map-card{

background:
rgba(255,255,255,0.05);

padding:20px;

border-radius:24px;
}

.map-title{

font-size:30px;
font-weight:700;

margin-bottom:18px;

text-align:center;

color:#56dfff;
}

/* MAP */

.map-box{

height:420px;

border-radius:20px;

overflow:hidden;

background:
rgba(255,255,255,0.05);
}

.map-box iframe{

width:100%;
height:100%;

border:none;
}

/* BACK */

.back{

margin-top:18px;

text-align:center;
}

.back a{

color:#56dfff;

font-size:16px;

text-decoration:none;

font-weight:600;
}

/* MOBILE */

@media(max-width:1100px){

.grid{

grid-template-columns:1fr;
}

body{

overflow:auto;
}
}

@media(max-width:700px){

.top{

flex-direction:column;
gap:18px;
}

.logo{

font-size:48px;
}

.buttons{

flex-direction:column;
}

.map-box{

height:320px;
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

<!-- GRID -->

<div class="grid">

<!-- LEFT SIDE -->

<div class="left-card">

<h1>Madhu Priya</h1>

<div class="info">

📍 <span>Address:</span> Velachery, Chennai <br>

📞 <span>Phone:</span> +91 9876543210 <br>

🕒 <span>Pickup Time:</span> 10:30 AM <br>

🧺 <span>Clothes Count:</span> 12 Items

</div>

<div class="clothes-box">

3 Shirts • 2 Jeans • Winter Wear • Sarees • Hoodies

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

<!-- RIGHT SIDE -->

<div class="map-card">

<div class="map-title">

Customer Location Map

</div>

<div class="map-box">

<iframe
src="https://maps.google.com/maps?q=Velachery,Chennai&t=&z=13&ie=UTF8&iwloc=&output=embed"
allowfullscreen=""
loading="lazy">
</iframe>

</div>

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