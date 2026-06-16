<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Wallet - ReWear</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{

background:
radial-gradient(circle at center,
#05233d 0%,
#021225 70%);

min-height:100vh;

display:flex;
justify-content:center;
align-items:center;

padding:16px;

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
radial-gradient(rgba(255,255,255,0.8) 1px, transparent 1px);

background-size:150px 150px;

opacity:0.06;
}

/* MAIN */

.wallet-container{

position:relative;
z-index:5;

width:100%;
max-width:980px;

padding:16px;

background:
linear-gradient(135deg,
rgba(15,35,60,0.96),
rgba(11,28,48,0.96));

border-radius:26px;

border:1px solid rgba(255,255,255,0.05);

box-shadow:
0 10px 35px rgba(0,0,0,0.35);

color:white;

overflow:hidden;
}

/* HEADER */

.topbar{

display:flex;
justify-content:space-between;
align-items:center;

margin-bottom:14px;
}

.logo{

font-size:54px;
font-weight:800;
}

.logo span{

color:#58ddff;
}

.profile{

display:flex;
align-items:center;
gap:10px;
}

.avatar{

width:48px;
height:48px;

border-radius:50%;

background:#58ddff;

display:flex;
justify-content:center;
align-items:center;

font-size:22px;
font-weight:700;

color:black;
}

.name{

font-size:18px;
font-weight:600;
}

/* BALANCE */

.balance-card{

background:rgba(255,255,255,0.05);

border-radius:22px;

padding:20px;

margin-bottom:14px;
}

.balance-title{

font-size:18px;
color:#dbeafe;

margin-bottom:6px;
}

.balance-amount{

font-size:48px;
font-weight:800;

color:#58ddff;
}

/* GRID */

.grid{

display:grid;
grid-template-columns:1fr 1fr;

gap:14px;
}

/* CARD */

.card{

background:rgba(255,255,255,0.05);

border-radius:22px;

padding:18px;
}

.card-title{

font-size:20px;
font-weight:700;

margin-bottom:12px;
}

/* PAYMENTS */

.payment-item{

display:flex;
justify-content:space-between;
align-items:center;

padding:12px 0;

border-bottom:1px solid rgba(255,255,255,0.06);
}

.pickup{

font-size:16px;
font-weight:600;
}

.date{

font-size:12px;
color:#cbd5e1;

margin-top:3px;
}

.amount{

font-size:22px;
font-weight:700;

color:#58ddff;
}

/* STATS */

.stat{

display:flex;
justify-content:space-between;
align-items:center;

padding:16px 0;

border-bottom:1px solid rgba(255,255,255,0.06);
}

.stat-name{

font-size:18px;
}

.stat-value{

font-size:22px;
font-weight:700;

color:#58ddff;
}

/* BUTTON */

.back-btn{

width:100%;

height:52px;

margin-top:14px;

border:none;
border-radius:16px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

font-size:17px;
font-weight:700;

cursor:pointer;

transition:0.3s;
}

.back-btn:hover{

transform:scale(1.01);
}

/* MOBILE */

@media(max-width:850px){

body{

padding:12px;
overflow:auto;
}

.wallet-container{

max-width:100%;
}

.grid{

grid-template-columns:1fr;
}

.logo{

font-size:42px;
}

.balance-amount{

font-size:42px;
}

.card-title{

font-size:18px;
}

.stat-name{

font-size:16px;
}

.stat-value{

font-size:20px;
}

.amount{

font-size:20px;
}

}

</style>

</head>

<body>

<div class="wallet-container">

<!-- HEADER -->

<div class="topbar">

<div class="logo">
Re<span>Wear</span>
</div>

<div class="profile">

<div class="avatar">
M
</div>

<div class="name">
Madhu
</div>

</div>

</div>

<!-- BALANCE -->

<div class="balance-card">

<div class="balance-title">
Total Wallet Balance
</div>

<div class="balance-amount">
₹2,450
</div>

</div>

<!-- GRID -->

<div class="grid">

<!-- RECENT PAYMENTS -->

<div class="card">

<div class="card-title">
Recent Payments
</div>

<div class="payment-item">

<div>

<div class="pickup">
Pickup #RW2026052701
</div>

<div class="date">
27 May 2026
</div>

</div>

<div class="amount">
₹400
</div>

</div>

<div class="payment-item">

<div>

<div class="pickup">
Pickup #RW2026052702
</div>

<div class="date">
24 May 2026
</div>

</div>

<div class="amount">
₹650
</div>

</div>

<div class="payment-item">

<div>

<div class="pickup">
Pickup #RW2026052703
</div>

<div class="date">
20 May 2026
</div>

</div>

<div class="amount">
₹300
</div>

</div>

</div>

<!-- STATS -->

<div class="card">

<div class="card-title">
Rewards & Stats
</div>

<div class="stat">

<div class="stat-name">
Completed Pickups
</div>

<div class="stat-value">
12
</div>

</div>

<div class="stat">

<div class="stat-name">
Reward Points
</div>

<div class="stat-value">
850
</div>

</div>

<div class="stat">

<div class="stat-name">
Clothes Recycled
</div>

<div class="stat-value">
96 KG
</div>

</div>

</div>

</div>

<!-- BUTTON -->

<button class="back-btn"
onclick="window.location.href='vendor_dashboard.php'">

← Back To Dashboard

</button>

</div>

</body>
</html>