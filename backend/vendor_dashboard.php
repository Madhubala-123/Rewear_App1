<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Vendor Dashboard - ReWear</title>

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

/* STARS */

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

/* MAIN */

.dashboard{

position:relative;
z-index:5;

width:100%;
max-width:1450px;

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
line-height:1;
}

.logo span{

color:#56dfff;
}

/* PROFILE */

.profile{

background:
rgba(255,255,255,0.05);

padding:16px 20px;

border-radius:18px;

text-align:center;
}

.profile h3{

font-size:16px;
margin-bottom:4px;
}

.profile p{

color:#56dfff;
font-size:16px;
font-weight:700;
}

/* STATS */

.stats{

display:grid;
grid-template-columns:repeat(4,1fr);

gap:16px;

margin-bottom:20px;
}

.card{

background:
rgba(255,255,255,0.05);

padding:24px 16px;

border-radius:22px;

text-align:center;
}

.card h1{

font-size:40px;
color:#56dfff;
}

.card p{

margin-top:8px;
font-size:15px;
}

/* SECTION */

.section-title{

font-size:24px;
font-weight:700;

margin-bottom:16px;
}

/* REQUESTS */

.requests{

display:grid;
grid-template-columns:repeat(3,1fr);

gap:18px;
}

.request-card{

background:
rgba(255,255,255,0.05);

padding:22px;

border-radius:22px;
}

.request-card h2{

font-size:18px;
margin-bottom:10px;
}

.location{

margin-bottom:14px;

font-size:14px;
color:#dbeafe;
}

.clothes{

margin-bottom:18px;

font-size:14px;
line-height:1.5;
}

/* BUTTON */

.action-btn{

display:block;

width:100%;

padding:13px;

border:none;

border-radius:14px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

color:#001219;

font-size:15px;

font-weight:700;

cursor:pointer;

text-decoration:none;

text-align:center;

transition:0.3s;
}

.action-btn:hover{

transform:scale(1.02);
}

/* BUTTON SECTIONS */

.button-section{

margin-top:24px;

display:flex;
justify-content:center;
gap:18px;

flex-wrap:wrap;
}

.main-btn{

padding:14px 34px;

border-radius:16px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

color:#001219;

font-size:16px;
font-weight:700;

text-decoration:none;

transition:0.3s;
}

.main-btn:hover{

transform:scale(1.03);
}

/* BACK */

.back{

margin-top:20px;
text-align:center;
}

.back a{

color:#56dfff;

text-decoration:none;

font-size:14px;
}

/* MOBILE */

@media(max-width:1200px){

.requests{

grid-template-columns:1fr;
}

.stats{

grid-template-columns:repeat(2,1fr);
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

.stats{

grid-template-columns:1fr;
}

.button-section{

flex-direction:column;
align-items:center;
}

body{

overflow:auto;
}
}

</style>

</head>

<body>

<div class="dashboard">

<!-- TOP -->

<div class="top">

<div class="logo">
Re<span>Wear</span>
</div>

<div class="profile">

<h3>Vendor</h3>

<p>GreenTex Industries</p>

</div>

</div>

<!-- STATS -->

<div class="stats">

<div class="card">

<h1>520KG</h1>

<p>Total Stock</p>

</div>

<div class="card">

<h1>18</h1>

<p>Pending Orders</p>

</div>

<div class="card">

<h1>42</h1>

<p>Completed Exports</p>

</div>

<div class="card">

<h1>₹48K</h1>

<p>Total Earnings</p>

</div>

</div>

<!-- TITLE -->

<div class="section-title">

Clothes Requests

</div>

<!-- REQUESTS -->

<div class="requests">

<!-- CARD 1 -->

<div class="request-card">

<h2>Thrift Store Order</h2>

<div class="location">
📍 Bangalore
</div>

<div class="clothes">

Jeans • Hoodies • Jackets • Cotton Wear

</div>

<a class="action-btn"
href="vendor_stock.php">

View Details →

</a>

</div>

<!-- CARD 2 -->

<div class="request-card">

<h2>Export Request</h2>

<div class="location">
📍 Mumbai Port
</div>

<div class="clothes">

Winter Wear • Woolen Clothes • Bulk Shirts

</div>

<a class="action-btn"
href="export_request_details.php">

View Details →

</a>

</div>

<!-- CARD 3 -->

<div class="request-card">

<h2>Recycling Industry</h2>

<div class="location">
📍 Chennai
</div>

<div class="clothes">

Damaged Clothes • Cotton Waste • Textile Scrap

</div>

<a class="action-btn"
href="vendor_orders.php">

View Details →

</a>

</div>

</div>

<!-- BUTTONS -->

<div class="button-section">

<a class="main-btn"
href="vendor_payments.php">

💰 View Payments

</a>

<a class="main-btn"
href="vendor_profile.php">

👤 View Profile

</a>

<a class="main-btn"
href="vendor_notifications.php">

🔔 Notifications

</a>

</div>

<!-- BACK -->

<div class="back">

<a href="select_role.php">

← Back To Role Selection

</a>

</div>

</div>

</body>

</html>