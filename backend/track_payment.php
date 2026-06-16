<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Track Payment - ReWear</title>

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

padding:22px;

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

margin-bottom:22px;
}

.logo{

font-size:58px;
font-weight:800;
}

.logo span{

color:#56dfff;
}

.status-box{

background:
rgba(255,255,255,0.05);

padding:18px 24px;

border-radius:20px;

text-align:center;
}

.status-box h3{

font-size:17px;
margin-bottom:8px;
}

.status-box p{

font-size:16px;
font-weight:700;
color:#56dfff;
}

/* GRID */

.grid{

display:grid;
grid-template-columns:1.1fr 1fr;

gap:22px;
}

/* LEFT */

.left{

background:
rgba(255,255,255,0.05);

padding:28px;

border-radius:24px;
}

.left h1{

font-size:32px;
margin-bottom:24px;
}

.info{

font-size:17px;
line-height:2.2;
margin-bottom:24px;
}

.info span{

color:#56dfff;
font-weight:700;
}

.payment-box{

background:
rgba(255,255,255,0.06);

padding:18px;

border-radius:16px;

margin-bottom:24px;

line-height:2;
font-size:16px;
}

.payment-box span{

color:#56dfff;
font-weight:700;
}

/* TIMELINE */

.timeline{

margin-top:20px;
}

.step{

display:flex;
align-items:center;

margin-bottom:22px;
}

.circle{

width:22px;
height:22px;

border-radius:50%;

margin-right:16px;

background:#56dfff;

box-shadow:0 0 12px #56dfff;
}

.text h3{

font-size:17px;
margin-bottom:4px;
}

.text p{

font-size:14px;
opacity:0.8;
}

/* RIGHT */

.right{

background:
rgba(255,255,255,0.05);

border-radius:24px;

display:flex;
justify-content:center;
align-items:center;

font-size:42px;
font-weight:800;

color:#56dfff;

padding:20px;

text-align:center;
}

/* BUTTONS */

.buttons{

margin-top:26px;

display:flex;
gap:18px;
}

.btn{

flex:1;

padding:16px;

border:none;

border-radius:14px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

color:#001219;

font-size:16px;
font-weight:700;

cursor:pointer;

text-decoration:none;

text-align:center;
}

.back{

margin-top:26px;
text-align:center;
}

.back a{

color:#56dfff;

text-decoration:none;

font-size:16px;
font-weight:600;
}

/* MOBILE */

@media(max-width:1000px){

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

font-size:46px;
}

.buttons{

flex-direction:column;
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

<div class="status-box">

<h3>Payment Status</h3>

<p>PROCESSING</p>

</div>

</div>

<!-- GRID -->

<div class="grid">

<!-- LEFT -->

<div class="left">

<h1>Track Payment</h1>

<div class="info">

💰 <span>Amount:</span> ₹9,500 <br>

📦 <span>Shipment:</span> Textile Recycling <br>

📍 <span>Location:</span> Chennai <br>

🏢 <span>Company:</span> EcoRecycle Pvt Ltd <br>

🕒 <span>Date:</span> 29 May 2026

</div>

<div class="payment-box">

<span>Payment Method:</span> Bank Transfer <br>

<span>Transaction ID:</span> TXN87456321 <br>

<span>Expected Credit:</span> Within 24 Hours

</div>

<!-- TIMELINE -->

<div class="timeline">

<div class="step">

<div class="circle"></div>

<div class="text">

<h3>Payment Requested</h3>

<p>Vendor initiated payment request</p>

</div>

</div>

<div class="step">

<div class="circle"></div>

<div class="text">

<h3>Verification Completed</h3>

<p>Shipment verified successfully</p>

</div>

</div>

<div class="step">

<div class="circle"></div>

<div class="text">

<h3>Payment Processing</h3>

<p>Bank processing transaction</p>

</div>

</div>

</div>

<!-- BUTTONS -->

<div class="buttons">

<a href="payment_success.php" class="btn">

Mark Received

</a>

<a href="invoice.php" class="btn">

View Invoice

</a>

</div>

</div>

<!-- RIGHT -->

<div class="right">

Payment Tracking Panel

</div>

</div>

<!-- BACK -->

<div class="back">

<a href="vendor_payments.php">

← Back To Payments

</a>

</div>

</div>

</body>

</html>