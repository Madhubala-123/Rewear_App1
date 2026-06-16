<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Vendor Payments - ReWear</title>

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

.logo{

font-size:58px;
font-weight:800;
}

.logo span{

color:#56dfff;
}

.profile{

background:
rgba(255,255,255,0.05);

padding:16px 20px;

border-radius:18px;

text-align:center;
}

.profile h3{

font-size:16px;
margin-bottom:5px;
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

margin-bottom:22px;
}

.card{

background:
rgba(255,255,255,0.05);

padding:24px 16px;

border-radius:22px;

text-align:center;
}

.card h1{

font-size:38px;
color:#56dfff;
}

.card p{

margin-top:8px;
font-size:15px;
}

/* TITLE */

.section-title{

font-size:26px;
font-weight:700;

margin-bottom:16px;
}

/* PAYMENTS */

.payments{

display:grid;
grid-template-columns:repeat(2,1fr);

gap:18px;
}

.payment-card{

background:
rgba(255,255,255,0.05);

padding:22px;

border-radius:22px;
}

.payment-card h2{

font-size:20px;
margin-bottom:14px;
}

.info{

font-size:15px;
line-height:1.8;

margin-bottom:18px;
}

.info span{

color:#56dfff;
font-weight:700;
}

.status{

background:
rgba(255,255,255,0.06);

padding:12px 16px;

border-radius:14px;

margin-bottom:18px;

font-size:15px;
}

.btn{

display:block;

width:100%;

padding:14px;

border:none;

border-radius:14px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

color:#001219;

font-size:15px;
font-weight:700;

cursor:pointer;

text-align:center;

text-decoration:none;
}

.back{

margin-top:20px;
text-align:center;
}

.back a{

color:#56dfff;

text-decoration:none;

font-size:15px;
font-weight:600;
}

/* MOBILE */

@media(max-width:1100px){

.payments{

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

font-size:46px;
}

.stats{

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

<div class="profile">

<h3>Vendor</h3>

<p>GreenTex Industries</p>

</div>

</div>

<!-- STATS -->

<div class="stats">

<div class="card">

<h1>₹48K</h1>

<p>Total Earnings</p>

</div>

<div class="card">

<h1>₹12K</h1>

<p>Pending Payments</p>

</div>

<div class="card">

<h1>32</h1>

<p>Transactions</p>

</div>

<div class="card">

<h1>18</h1>

<p>Completed Payments</p>

</div>

</div>

<!-- TITLE -->

<div class="section-title">

Payment Transactions

</div>

<!-- PAYMENTS -->

<div class="payments">

<!-- CARD 1 -->

<div class="payment-card">

<h2>Global Textile Export</h2>

<div class="info">

💰 <span>Amount:</span> ₹14,000 <br>

📦 <span>Shipment:</span> Winter Wear Export <br>

📍 <span>Location:</span> Mumbai Port <br>

🕒 <span>Date:</span> 28 May 2026

</div>

<div class="status">

Status: Payment Received

</div>

<a href="invoice.php" class="btn">

View Invoice →

</a>

</div>

<!-- CARD 2 -->

<div class="payment-card">

<h2>EcoRecycle Pvt Ltd</h2>

<div class="info">

💰 <span>Amount:</span> ₹9,500 <br>

📦 <span>Shipment:</span> Textile Recycling <br>

📍 <span>Location:</span> Chennai <br>

🕒 <span>Date:</span> 26 May 2026

</div>

<div class="status">

Status: Pending Payment

</div>

<a href="payment_success.php" class="btn">

Track Payment →

</a>

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