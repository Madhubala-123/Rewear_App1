<?php

$amount = isset($_GET['amount'])
? $_GET['amount']
: '0';

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Pickup Success - ReWear</title>

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

display:flex;
justify-content:center;
align-items:center;

padding:10px;

overflow:hidden;

background:
radial-gradient(circle at center,
#073b5a 0%,
#02142b 70%);

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

background-size:150px 150px;

opacity:0.08;
}

/* MAIN BOX */

.success-container{

position:relative;
z-index:5;

width:100%;
max-width:420px;

background:
rgba(255,255,255,0.05);

backdrop-filter:blur(14px);

border:
1px solid rgba(255,255,255,0.08);

border-radius:22px;

padding:18px;

color:white;

box-shadow:
0 8px 28px rgba(0,0,0,0.35);
}

/* LOGO */

.logo{

text-align:center;

font-size:38px;
font-weight:800;

line-height:1;

margin-bottom:6px;
}

.logo span{

color:#53d8f8;
}

/* ICON */

.success-icon{

width:62px;
height:62px;

background:#53d8f8;

border-radius:50%;

display:flex;
justify-content:center;
align-items:center;

margin:10px auto;

font-size:28px;
font-weight:bold;

color:black;
}

/* TITLE */

.success-title{

text-align:center;

font-size:22px;
font-weight:700;

margin-bottom:6px;
}

/* SUBTITLE */

.success-subtitle{

text-align:center;

font-size:12px;

line-height:1.5;

color:#dbeafe;

margin-bottom:16px;
}

/* INFO BOX */

.info-box{

background:
rgba(255,255,255,0.05);

border-radius:15px;

padding:14px;

margin-bottom:12px;
}

.info-title{

font-size:11px;

color:#cbd5e1;

margin-bottom:5px;
}

/* PICKUP ID */

.pickup-id{

font-size:20px;
font-weight:700;
}

/* AMOUNT */

.amount{

font-size:30px;
font-weight:700;

color:#53d8f8;
}

/* STATUS */

.status{

font-size:14px;
font-weight:500;
}

/* BUTTON */

.track-btn{

width:100%;

height:48px;

border:none;
border-radius:14px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

color:black;

font-size:15px;
font-weight:700;

cursor:pointer;

margin-top:4px;

transition:0.3s;
}

.track-btn:hover{

transform:scale(1.02);
}

/* BACK BUTTON */

.back-btn{

display:block;

text-align:center;

margin-top:12px;

text-decoration:none;

font-size:13px;
font-weight:500;

color:#67e8f9;
}

/* MOBILE */

@media(max-width:500px){

.success-container{

width:96%;

padding:16px;
}

.logo{

font-size:34px;
}

.success-title{

font-size:20px;
}

.amount{

font-size:26px;
}

.pickup-id{

font-size:17px;
}

}

</style>

</head>

<body>

<div class="success-container">

<div class="logo">
Re<span>Wear</span>
</div>

<div class="success-icon">
✓
</div>

<div class="success-title">
Pickup Confirmed
</div>

<div class="success-subtitle">

Your clothes pickup request has been successfully scheduled.

Our pickup partner will arrive soon.

</div>

<div class="info-box">

<div class="info-title">
Pickup ID
</div>

<div class="pickup-id">
RW20260526001
</div>

</div>

<div class="info-box">

<div class="info-title">
AI Estimated Earnings
</div>

<div class="amount">
₹<?php echo $amount; ?>
</div>

</div>

<div class="info-box">

<div class="info-title">
Pickup Status
</div>

<div class="status">
🚚 Pickup Boy Will Arrive Soon
</div>

</div>

<button class="track-btn"
onclick="window.location.href='track_pickup.php'">

Track Pickup

</button>

<a href="customer_dashboard.php"
class="back-btn">

← Back To Dashboard

</a>

</div>

</body>

</html>