<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Customer Dashboard - ReWear</title>

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

overflow:hidden;

display:flex;
justify-content:center;
align-items:center;

padding:10px;

background:
radial-gradient(circle at center,
#073b5a 0%,
#02142b 70%);

position:relative;

color:white;
}

/* STARS */

body::before{

content:"";

position:absolute;

width:100%;
height:100%;

background-image:
radial-gradient(rgba(255,255,255,0.8) 1px, transparent 1px);

background-size:140px 140px;

opacity:0.06;
}

/* MAIN */

.dashboard{

position:relative;
z-index:5;

width:100%;
max-width:1180px;

padding:18px;

border-radius:24px;

background:
linear-gradient(135deg,
rgba(16,38,64,0.95),
rgba(10,28,50,0.95));

border:
1px solid rgba(255,255,255,0.05);

box-shadow:
0 10px 35px rgba(0,0,0,0.35);
}

/* TOPBAR */

.topbar{

display:flex;
justify-content:space-between;
align-items:center;

margin-bottom:14px;
}

/* LOGO */

.logo{

font-size:44px;
font-weight:800;
}

.logo span{

color:#56dfff;
}

/* PROFILE */

.profile{

display:flex;
align-items:center;
gap:10px;
}

.avatar{

width:46px;
height:46px;

border-radius:50%;

background:#56dfff;

display:flex;
justify-content:center;
align-items:center;

font-size:18px;
font-weight:700;

color:#001219;
}

.username{

font-size:18px;
font-weight:600;
}

/* WELCOME */

.welcome-box{

padding:18px;

border-radius:20px;

background:
rgba(255,255,255,0.04);

margin-bottom:14px;
}

.welcome-title{

font-size:34px;
font-weight:800;

margin-bottom:14px;
}

.welcome-title span{

color:#56dfff;
}

/* STATUS */

.pickup-status{

padding:18px;

border-radius:18px;

background:
rgba(255,255,255,0.04);

display:flex;
justify-content:space-between;
align-items:center;
}

.pickup-left h3{

font-size:18px;
margin-bottom:5px;
}

.pickup-left p{

font-size:13px;
color:#dbeafe;
}

.earnings{

text-align:right;
}

.earnings h2{

font-size:38px;
font-weight:800;

color:#56dfff;
}

.earnings p{

font-size:13px;
color:#dbeafe;
}

/* GRID */

.card-grid{

display:grid;
grid-template-columns:repeat(4,1fr);

gap:14px;

margin-bottom:14px;
}

/* CARD */

.card{

padding:18px;

border-radius:20px;

background:
rgba(255,255,255,0.04);

cursor:pointer;

transition:0.3s;
}

.card:hover{

transform:translateY(-3px);

background:
rgba(255,255,255,0.06);
}

.card-icon{

font-size:30px;

margin-bottom:12px;
}

.card h2{

font-size:18px;
margin-bottom:8px;
}

.card p{

font-size:13px;
line-height:1.5;

color:#dbeafe;
}

/* BOTTOM */

.bottom-box{

padding:20px;

border-radius:20px;

background:
rgba(255,255,255,0.04);

display:flex;
justify-content:space-between;
align-items:center;
}

.bottom-left h2{

font-size:26px;
margin-bottom:6px;
}

.bottom-left p{

font-size:13px;
color:#dbeafe;
}

/* BUTTON */

.book-btn{

padding:14px 28px;

border:none;

border-radius:14px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

font-size:15px;
font-weight:700;

color:#001219;

cursor:pointer;
}

/* MOBILE */

@media(max-width:1000px){

body{

height:auto;
overflow:auto;
padding:14px;
}

.card-grid{

grid-template-columns:repeat(2,1fr);
}

}

@media(max-width:650px){

.card-grid{

grid-template-columns:1fr;
}

.topbar{

flex-direction:column;
gap:12px;
}

.pickup-status{

flex-direction:column;
align-items:flex-start;
gap:12px;
}

.bottom-box{

flex-direction:column;
align-items:flex-start;
gap:14px;
}

.book-btn{

width:100%;
}

}

</style>

</head>

<body>

<div class="dashboard">

<!-- TOPBAR -->

<div class="topbar">

<div class="logo">
Re<span>Wear</span>
</div>

<div class="profile">

<div class="avatar">
M
</div>

<div class="username">
Madhu
</div>

</div>

</div>

<!-- WELCOME -->

<div class="welcome-box">

<div class="welcome-title">

Welcome Back,
<span>Madhu 👋</span>

</div>

<div class="pickup-status">

<div class="pickup-left">

<h3>
🛵 Pickup Boy On The Way
</h3>

<p>
Your pickup rider is arriving to collect old clothes.
</p>

</div>

<div class="earnings">

<h2>
₹1,240
</h2>

<p>
Total Earnings
</p>

</div>

</div>

</div>

<!-- CARDS -->

<div class="card-grid">

<div class="card"
onclick="window.location.href='pickup_request.php'">

<div class="card-icon">
📦
</div>

<h2>
Schedule Pickup
</h2>

<p>
Book pickup and earn instant cash.
</p>

</div>

<div class="card"
onclick="window.location.href='track_pickup.php'">

<div class="card-icon">
🛵
</div>

<h2>
Track Pickup
</h2>

<p>
Track rider and live updates.
</p>

</div>

<div class="card"
onclick="window.location.href='my_pickups.php'">

<div class="card-icon">
📜
</div>

<h2>
History
</h2>

<p>
View previous pickups and payments.
</p>

</div>

<div class="card"
onclick="window.location.href='wallet.php'">

<div class="card-icon">
💰
</div>

<h2>
Wallet
</h2>

<p>
Check earnings and rewards.
</p>

</div>

</div>

<!-- BOTTOM -->

<div class="bottom-box">

<div class="bottom-left">

<h2>
♻ Save Earth With ReWear
</h2>

<p>
Recycle clothes and build a greener future.
</p>

</div>

<button class="book-btn"
onclick="window.location.href='pickup_request.php'">

Book Pickup

</button>

</div>

</div>

</body>
</html>