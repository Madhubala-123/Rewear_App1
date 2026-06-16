<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pickup Completed - ReWear</title>

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

padding:16px;

background:
radial-gradient(circle at center,
#073b5a 0%,
#02142b 65%);

overflow:auto;

color:white;

position:relative;
}

/* STARS */

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

/* CONTAINER */

.container{

width:100%;
max-width:680px;

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

/* LOGO */

.logo{

font-size:48px;
font-weight:800;

margin-bottom:10px;
}

.logo span{

color:#56dfff;
}

/* SUBTITLE */

.subtitle{

font-size:15px;

letter-spacing:5px;

color:#d1d5db;

margin-bottom:18px;
}

/* SUCCESS CARD */

.success-card{

background:
rgba(255,255,255,0.06);

padding:24px 22px;

border-radius:24px;

text-align:center;

margin-bottom:16px;
}

.icon{

font-size:54px;

margin-bottom:10px;
}

.success-card h1{

font-size:32px;

line-height:1.3;

margin-bottom:10px;
}

.success-card p{

font-size:15px;

line-height:1.6;

color:#d1d5db;
}

/* AMOUNT */

.amount-box{

background:
rgba(255,255,255,0.06);

padding:16px;

border-radius:22px;

display:flex;
justify-content:space-between;
align-items:center;

margin-bottom:16px;
}

.amount-box h3{

font-size:20px;
}

.amount{

font-size:30px;
font-weight:800;

color:#56dfff;
}

/* BUTTONS */

.buttons{

display:flex;
gap:14px;

margin-top:10px;
}

.btn{

flex:1;

padding:13px;

border-radius:14px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

color:#001219;

font-size:15px;
font-weight:700;

text-decoration:none;

text-align:center;

transition:0.3s;
}

.btn:hover{

transform:scale(1.02);
}

/* MOBILE */

@media(max-width:700px){

.buttons{

flex-direction:column;
}

.logo{

font-size:42px;
}

.success-card h1{

font-size:26px;
}

.amount{

font-size:24px;
}
}

</style>

</head>

<body>

<div class="container">

<!-- LOGO -->

<div class="logo">

Re<span>Wear</span>

</div>

<!-- SUBTITLE -->

<div class="subtitle">

PICKUP COMPLETED

</div>

<!-- SUCCESS -->

<div class="success-card">

<div class="icon">
🎉
</div>

<h1>

Pickup Completed Successfully

</h1>

<p>

Reusable clothes have been collected successfully.
Payment has been processed instantly to customer wallet.

</p>

</div>

<!-- AMOUNT -->

<div class="amount-box">

<h3>Total Earnings</h3>

<div class="amount">

₹1,240

</div>

</div>

<!-- BUTTONS -->

<div class="buttons">

<a href="pickup_agent_dashboard.php" class="btn">

Back To Dashboard

</a>

<a href="wallet.php" class="btn">

Open Wallet

</a>

</div>

</div>

</body>

</html>