<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Recycling Industry Details</title>

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

display:flex;
justify-content:center;
align-items:center;

padding:14px;

background:
radial-gradient(circle at center,
#073b5a 0%,
#02142b 65%);

color:white;

overflow:hidden;

position:relative;
}

body::before{

content:"";

position:absolute;

width:100%;
height:100%;

background-image:
radial-gradient(white 1px, transparent 1px);

background-size:140px 140px;

opacity:0.12;
}

.container{

position:relative;
z-index:5;

width:100%;
max-width:1350px;

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

.top{

display:flex;
justify-content:space-between;
align-items:center;

margin-bottom:18px;
}

.logo{

font-size:58px;
font-weight:800;
}

.logo span{

color:#56dfff;
}

.status{

background:
rgba(255,255,255,0.05);

padding:16px 20px;

border-radius:18px;

text-align:center;
}

.status h3{

font-size:16px;
margin-bottom:5px;
}

.status p{

font-size:18px;
font-weight:700;

color:#56dfff;
}

.main{

display:grid;
grid-template-columns:1fr 1fr;

gap:18px;
}

.left,
.right{

background:
rgba(255,255,255,0.05);

border-radius:24px;

padding:22px;
}

.left h1{

font-size:36px;
margin-bottom:20px;
}

.info{

font-size:18px;
margin-bottom:18px;
line-height:1.6;
}

.info span{

color:#56dfff;
font-weight:700;
}

.materials{

background:
rgba(255,255,255,0.06);

padding:16px;

border-radius:16px;

font-size:17px;

line-height:1.6;

margin-top:10px;
}

.map{

height:100%;

min-height:420px;

display:flex;
justify-content:center;
align-items:center;

font-size:42px;
font-weight:700;

color:#56dfff;

text-align:center;
}

.buttons{

display:flex;
gap:14px;

margin-top:22px;
}

.btn{

flex:1;

padding:15px;

border:none;

border-radius:14px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

color:#001219;

font-size:16px;
font-weight:700;

cursor:pointer;
}

.back{

margin-top:18px;
text-align:center;
}

.back a{

color:#56dfff;

text-decoration:none;

font-size:15px;
font-weight:600;
}

@media(max-width:950px){

.main{

grid-template-columns:1fr;
}

body{

overflow:auto;
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

<h3>Recycling Status</h3>

<p>PROCESSING</p>

</div>

</div>

<!-- MAIN -->

<div class="main">

<!-- LEFT -->

<div class="left">

<h1>Recycling Industry</h1>

<div class="info">
📍 <span>Location:</span> Chennai
</div>

<div class="info">
🏭 <span>Industry:</span> EcoRecycle Pvt Ltd
</div>

<div class="info">
⚖️ <span>Total Weight:</span> 240KG
</div>

<div class="info">
📦 <span>Total Bags:</span> 32 Bags
</div>

<div class="info">
🕒 <span>Pickup Time:</span> 05:00 PM
</div>

<div class="materials">

Damaged Clothes • Cotton Waste • Textile Scrap

</div>

<div class="buttons">

<button class="btn">
Start Recycling
</button>

<button class="btn">
Mark Completed
</button>

</div>

</div>

<!-- RIGHT -->

<div class="right">

<div class="map">

Recycling Route Map

</div>

</div>

</div>

<!-- BACK -->

<div class="back">

<a href="vendor_dashboard.php">

← Back To Dashboard

</a>

</div>

</div>

</body>

</html>