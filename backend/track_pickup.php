<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Track Pickup - ReWear</title>

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

overflow:hidden;

padding:12px;

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

background-size:140px 140px;

opacity:0.08;
}

/* MAIN BOX */

.container{

position:relative;
z-index:5;

width:100%;
max-width:920px;

background:
rgba(255,255,255,0.05);

backdrop-filter:blur(12px);

border:
1px solid rgba(255,255,255,0.08);

border-radius:24px;

padding:18px;

color:white;

box-shadow:
0 8px 28px rgba(0,0,0,0.35);
}

/* LOGO */

.logo{

font-size:40px;
font-weight:800;

margin-bottom:4px;
}

.logo span{

color:#57dfff;
}

/* SUBTEXT */

.sub{

font-size:13px;

line-height:1.5;

color:#dbeafe;

margin-bottom:14px;
}

/* FLEX */

.main-flex{

display:flex;
gap:14px;

margin-bottom:14px;
}

/* LEFT */

.left{

flex:1;
}

/* RIGHT */

.right{

width:300px;

display:flex;
flex-direction:column;

gap:14px;
}

/* BOX */

.box{

background:
rgba(255,255,255,0.05);

border-radius:18px;

padding:16px;
}

/* STATUS */

.status-title{

font-size:17px;
font-weight:700;

margin-bottom:12px;
}

.step{

display:flex;
align-items:center;

margin-bottom:10px;
}

.circle{

width:14px;
height:14px;

border-radius:50%;

margin-right:10px;
}

.active{

background:#57dfff;

box-shadow:
0 0 8px #57dfff;
}

.pending{

background:#475569;
}

.step-text{

font-size:14px;
}

/* DETAILS */

.detail{

margin-bottom:11px;

font-size:14px;
line-height:1.5;
}

.detail strong{

color:#57dfff;
}

/* ARRIVAL */

.arrival{

text-align:center;
}

.arrival-title{

font-size:13px;

color:#cbd5e1;

margin-bottom:5px;
}

.arrival-time{

font-size:30px;
font-weight:800;

color:#57dfff;
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

transition:0.3s;
}

.next-btn:hover{

transform:scale(1.01);
}

/* BACK */

.back-btn{

display:block;

text-align:center;

margin-top:10px;

font-size:13px;

color:#57dfff;

text-decoration:none;
}

/* MOBILE */

@media(max-width:850px){

body{

overflow:auto;
height:auto;
}

.container{

max-width:95%;
}

.main-flex{

flex-direction:column;
}

.right{

width:100%;
}

}

</style>

</head>

<body>

<div class="container">

<div class="logo">
Re<span>Wear</span>
</div>

<p class="sub">

Your pickup partner is on the way to collect your reusable clothes safely and quickly.

</p>

<div class="main-flex">

<!-- LEFT SIDE -->

<div class="left">

<div class="box">

<div class="status-title">
📍 Pickup Status
</div>

<div class="step">
<div class="circle active"></div>
<div class="step-text">Pickup Request Confirmed</div>
</div>

<div class="step">
<div class="circle active"></div>
<div class="step-text">Pickup Boy Assigned</div>
</div>

<div class="step">
<div class="circle active"></div>
<div class="step-text">On The Way</div>
</div>

<div class="step">
<div class="circle pending"></div>
<div class="step-text">Reached Location</div>
</div>

<div class="step">
<div class="circle pending"></div>
<div class="step-text">Clothes Collected</div>
</div>

<div class="step">
<div class="circle pending"></div>
<div class="step-text">Payment Sent</div>
</div>

</div>

</div>

<!-- RIGHT SIDE -->

<div class="right">

<div class="box">

<div class="detail">
<strong>Pickup Partner :</strong>
Arjun Kumar
</div>

<div class="detail">
<strong>Vehicle :</strong>
Honda Activa
</div>

<div class="detail">
<strong>Phone :</strong>
+91 9876543210
</div>

<div class="detail">
<strong>Rating :</strong>
⭐ 4.9
</div>

<div class="detail">
<strong>Completed Pickups :</strong>
524
</div>

</div>

<div class="box arrival">

<div class="arrival-title">
Estimated Arrival Time
</div>

<div class="arrival-time">
12 mins
</div>

</div>

</div>

</div>

<button class="next-btn"
onclick="window.location.href='payment_success.php'">

Continue →

</button>

<a href="customer_dashboard.php"
class="back-btn">

← Back To Dashboard

</a>

</div>

</body>

</html>