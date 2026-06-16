<?php

$amount = isset($_GET['amount'])
? $_GET['amount']
: '400';

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Payment Success - ReWear</title>

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
#02142b 65%);

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

opacity:0.10;
}

/* BOX */

.payment-box{

position:relative;
z-index:5;

width:100%;
max-width:430px;

padding:18px;

border-radius:22px;

background:
rgba(255,255,255,0.05);

backdrop-filter:blur(14px);

border:
1px solid rgba(255,255,255,0.08);

box-shadow:
0 10px 30px rgba(0,0,0,0.35);

color:white;

text-align:center;
}

/* LOGO */

.logo{

font-size:42px;
font-weight:800;

margin-bottom:4px;
}

.logo span{

color:#67e8f9;
}

/* ICON */

.success-icon{

width:68px;
height:68px;

margin:10px auto;

border-radius:50%;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

display:flex;
justify-content:center;
align-items:center;

font-size:30px;
font-weight:700;

color:black;
}

/* TITLE */

.title{

font-size:28px;
font-weight:700;

margin-bottom:6px;
}

/* SUBTITLE */

.subtitle{

font-size:13px;

line-height:1.5;

color:#cbd5e1;

margin-bottom:14px;
}

/* CARDS */

.payment-card{

background:
rgba(255,255,255,0.05);

border-radius:16px;

padding:14px;

margin-bottom:10px;

text-align:left;
}

.label{

font-size:12px;

color:#cbd5e1;

margin-bottom:4px;
}

.value{

font-size:17px;
font-weight:700;
}

.amount{

font-size:30px;
font-weight:800;

color:#67e8f9;
}

/* BUTTON */

.next-btn{

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

margin-top:2px;
}

/* BACK */

.back{

margin-top:10px;
}

.back a{

color:#67e8f9;

text-decoration:none;

font-size:13px;
}

/* MOBILE */

@media(max-width:500px){

.payment-box{

width:95%;
padding:16px;
}

.logo{

font-size:36px;
}

.title{

font-size:24px;
}

.amount{

font-size:26px;
}

}

</style>

</head>

<body>

<div class="payment-box">

<div class="logo">
Re<span>Wear</span>
</div>

<div class="success-icon">
✓
</div>

<div class="title">
Payment Sent
</div>

<div class="subtitle">

Your payment has been credited successfully.

</div>

<div class="payment-card">

<div class="label">
Amount Credited
</div>

<div class="amount">
₹<?php echo $amount; ?>
</div>

</div>

<div class="payment-card">

<div class="label">
Transaction ID
</div>

<div class="value">
RWUPI20260527001
</div>

</div>

<div class="payment-card">

<div class="label">
Payment Status
</div>

<div class="value">
✅ Successfully Credited
</div>

</div>

<button class="next-btn"
onclick="window.location.href='my_pickups.php'">

View My Pickups →

</button>

<div class="back">

<a href="customer_dashboard.php">

← Back To Dashboard

</a>

</div>

</div>

</body>

</html>