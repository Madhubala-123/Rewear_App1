<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Pickups - ReWear</title>

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
radial-gradient(white 1px, transparent 1px);

background-size:140px 140px;

opacity:0.08;
}

/* MAIN CONTAINER */

.container{

position:relative;
z-index:2;

width:92%;
max-width:1100px;

background:rgba(255,255,255,0.05);

backdrop-filter:blur(14px);

border:1px solid rgba(255,255,255,0.08);

border-radius:28px;

padding:28px;
}

/* HEADER */

.header{

display:flex;
justify-content:space-between;
align-items:center;

margin-bottom:24px;
}

.logo{

font-size:54px;
font-weight:800;
}

.logo span{
color:#67e8f9;
}

.total-box{

background:rgba(255,255,255,0.06);

padding:16px 24px;

border-radius:18px;

text-align:center;
}

.total-box h3{

font-size:14px;
font-weight:500;

color:#cbd5e1;
}

.total-box h1{

font-size:34px;
color:#67e8f9;
}

/* PICKUPS GRID */

.pickups{

display:grid;
grid-template-columns:repeat(3,1fr);
gap:20px;
}

/* CARD */

.card{

background:rgba(255,255,255,0.05);

border-radius:22px;

padding:22px;

transition:0.3s;
}

.card:hover{

transform:translateY(-4px);
}

.pickup-id{

font-size:15px;
color:#67e8f9;

margin-bottom:12px;
}

.status{

display:inline-block;

padding:6px 14px;

border-radius:30px;

font-size:13px;
font-weight:600;

margin-bottom:16px;
}

.completed{
background:#14532d;
color:#bbf7d0;
}

.processing{
background:#78350f;
color:#fde68a;
}

.card h2{

font-size:32px;
margin-bottom:10px;

color:#67e8f9;
}

.card p{

font-size:14px;
line-height:1.7;

color:#dbeafe;
}

/* BUTTON */

.view-btn{

margin-top:18px;

width:100%;

height:48px;

border:none;
border-radius:14px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

font-size:15px;
font-weight:700;

cursor:pointer;

color:black;
}

/* BACK */

.back{

text-align:center;
margin-top:20px;
}

.back a{

color:#67e8f9;
text-decoration:none;
font-size:14px;
}

/* MOBILE */

@media(max-width:900px){

.pickups{

grid-template-columns:1fr;
}

.container{

width:94%;
padding:22px;
}

.header{

flex-direction:column;
gap:14px;
}

.logo{

font-size:42px;
}
}

</style>

</head>

<body>

<div class="container">

<div class="header">

<div class="logo">
Re<span>Wear</span>
</div>

<div class="total-box">

<h3>Total Earnings</h3>

<h1>₹2,450</h1>

</div>

</div>

<div class="pickups">

<!-- CARD 1 -->

<div class="card">

<div class="pickup-id">
Pickup ID : RW2026052701
</div>

<div class="status completed">
Completed
</div>

<h2>₹400</h2>

<p>
3 Shirts • 2 Jeans • 1 Hoodie
</p>

<button class="view-btn">

View Details →

</button>

</div>

<!-- CARD 2 -->

<div class="card">

<div class="pickup-id">
Pickup ID : RW2026052702
</div>

<div class="status completed">
Completed
</div>

<h2>₹650</h2>

<p>
Winter Clothes • Jackets • Cotton Wear
</p>

<button class="view-btn">

View Details →

</button>

</div>

<!-- CARD 3 -->

<div class="card">

<div class="pickup-id">
Pickup ID : RW2026052703
</div>

<div class="status processing">
Processing
</div>

<h2>₹300</h2>

<p>
Pickup verification under process
</p>

<button class="view-btn">

Track Pickup →

</button>

</div>

</div>

<div class="back">

<a href="customer_dashboard.php">

← Back To Dashboard

</a>

</div>

</div>

</body>
</html>