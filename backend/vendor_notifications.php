<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Vendor Notifications - ReWear</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{

height:100vh;

padding:12px;

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

position:absolute;

width:100%;
height:100%;

background-image:
radial-gradient(white 1px, transparent 1px);

background-size:140px 140px;

opacity:0.10;

z-index:-1;
}

/* CONTAINER */

.container{

width:100%;
max-width:1080px;

padding:22px;

border-radius:26px;

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

.logo{

font-size:52px;
font-weight:800;
}

.logo span{

color:#56dfff;
}

.status{

background:
rgba(255,255,255,0.06);

padding:14px 22px;

border-radius:18px;

text-align:center;
}

.status h3{

font-size:15px;
margin-bottom:4px;
}

.status p{

font-size:15px;
font-weight:700;

color:#56dfff;
}

/* TITLE */

.title{

font-size:32px;
font-weight:700;

margin-bottom:18px;
}

/* NOTIFICATION CARD */

.notification{

background:
rgba(255,255,255,0.06);

padding:16px 18px;

border-radius:18px;

margin-bottom:12px;

display:flex;
justify-content:space-between;
align-items:center;

gap:14px;
}

.left{

display:flex;
gap:14px;
align-items:flex-start;
}

.icon{

font-size:24px;
}

.content h3{

font-size:17px;
margin-bottom:4px;
}

.content p{

font-size:13px;

color:#d1d5db;

line-height:1.5;
}

.time{

font-size:13px;

color:#56dfff;

white-space:nowrap;
}

/* BUTTONS */

.buttons{

margin-top:18px;

display:flex;
justify-content:center;
gap:16px;
}

.btn{

padding:13px 26px;

border-radius:14px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

color:#001219;

font-size:15px;
font-weight:700;

text-decoration:none;

transition:0.3s;
}

.btn:hover{

transform:scale(1.03);
}

/* BACK */

.back{

margin-top:16px;
text-align:center;
}

.back a{

color:#56dfff;

text-decoration:none;

font-size:14px;
}

/* MOBILE */

@media(max-width:700px){

body{
overflow:auto;
height:auto;
}

.top{

flex-direction:column;
gap:14px;
}

.notification{

flex-direction:column;
align-items:flex-start;
}

.buttons{

flex-direction:column;
align-items:center;
}

.logo{

font-size:44px;
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

<h3>Vendor</h3>

<p>4 New Alerts</p>

</div>

</div>

<!-- TITLE -->

<div class="title">

Notifications

</div>

<!-- NOTIFICATION 1 -->

<div class="notification">

<div class="left">

<div class="icon">📦</div>

<div class="content">

<h3>New Export Request</h3>

<p>
Global Textile Export requested 180KG winter clothes shipment.
</p>

</div>

</div>

<div class="time">

2 mins ago

</div>

</div>

<!-- NOTIFICATION 2 -->

<div class="notification">

<div class="left">

<div class="icon">💰</div>

<div class="content">

<h3>Payment Received</h3>

<p>
₹14,000 credited to your vendor wallet.
</p>

</div>

</div>

<div class="time">

10 mins ago

</div>

</div>

<!-- NOTIFICATION 3 -->

<div class="notification">

<div class="left">

<div class="icon">🚚</div>

<div class="content">

<h3>Pickup Completed</h3>

<p>
Pickup Agent Arun completed cloth collection.
</p>

</div>

</div>

<div class="time">

25 mins ago

</div>

</div>

<!-- NOTIFICATION 4 -->

<div class="notification">

<div class="left">

<div class="icon">♻️</div>

<div class="content">

<h3>Recycling Approved</h3>

<p>
EcoRecycle approved your textile recycling shipment.
</p>

</div>

</div>

<div class="time">

1 hour ago

</div>

</div>

<!-- BUTTONS -->

<div class="buttons">

<a href="vendor_dashboard.php" class="btn">

Dashboard

</a>

<a href="vendor_profile.php" class="btn">

View Profile

</a>

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