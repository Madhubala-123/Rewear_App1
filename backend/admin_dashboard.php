<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard - ReWear</title>

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

padding:14px;

display:flex;
justify-content:center;
align-items:center;

background:
radial-gradient(circle at center,
#073b5a 0%,
#02142b 65%);

overflow:hidden;

color:white;

position:relative;
}

/* BACKGROUND */

body::before{

content:"";

position:absolute;

width:100%;
height:100%;

background-image:
radial-gradient(white 1px, transparent 1px);

background-size:140px 140px;

opacity:0.10;

z-index:-1;
}

/* MAIN */

.dashboard{

position:relative;
z-index:5;

width:100%;
max-width:1450px;

padding:22px;

border-radius:28px;

background:
rgba(255,255,255,0.05);

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

/* ADMIN */

.admin-box{

background:
rgba(255,255,255,0.06);

padding:16px 22px;

border-radius:18px;

text-align:center;
}

.admin-box h3{

font-size:16px;
margin-bottom:4px;
}

.admin-box p{

font-size:16px;
font-weight:700;

color:#56dfff;
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
rgba(255,255,255,0.06);

padding:22px 16px;

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

font-size:24px;
font-weight:700;

margin-bottom:16px;
}

/* ACTIVITIES */

.activities{

display:grid;
grid-template-columns:1fr 1fr 1fr;

gap:18px;
}

.activity-card{

background:
rgba(255,255,255,0.06);

padding:22px;

border-radius:22px;
}

.activity-card h2{

font-size:19px;
margin-bottom:12px;
}

.activity{

background:
rgba(255,255,255,0.05);

padding:14px;

border-radius:14px;

margin-bottom:12px;

font-size:14px;
line-height:1.6;
}

/* BUTTON SECTION */

.button-section{

margin-top:22px;

display:flex;
justify-content:center;
gap:18px;

flex-wrap:wrap;
}

/* BUTTON */

.main-btn{

padding:14px 30px;

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

margin-top:18px;
text-align:center;
}

.back a{

color:#56dfff;

text-decoration:none;

font-size:14px;
}

/* MOBILE */

@media(max-width:1200px){

.activities{

grid-template-columns:1fr;
}

.stats{

grid-template-columns:repeat(2,1fr);
}
}

@media(max-width:700px){

body{

overflow:auto;
}

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

<div class="admin-box">

<h3>System Admin</h3>

<p>ONLINE</p>

</div>

</div>

<!-- STATS -->

<div class="stats">

<div class="card">

<h1>1.2K</h1>

<p>Total Users</p>

</div>

<div class="card">

<h1>420</h1>

<p>Total Pickups</p>

</div>

<div class="card">

<h1>82</h1>

<p>Vendors</p>

</div>

<div class="card">

<h1>₹2.8L</h1>

<p>Total Revenue</p>

</div>

</div>

<!-- TITLE -->

<div class="section-title">

System Monitoring

</div>

<!-- ACTIVITIES -->

<div class="activities">

<!-- CARD 1 -->

<div class="activity-card">

<h2>Recent Pickups</h2>

<div class="activity">
🚚 Pickup Agent Arun completed 18 cloth pickups today.
</div>

<div class="activity">
📦 240KG clothes collected from Chennai zone.
</div>

<div class="activity">
♻️ Recycling shipment dispatched successfully.
</div>

</div>

<!-- CARD 2 -->

<div class="activity-card">

<h2>AI Analytics</h2>

<div class="activity">
🤖 AI detected 92% recyclable clothing quality.
</div>

<div class="activity">
📊 Export demand increased by 18% this month.
</div>

<div class="activity">
🌍 UAE & Singapore are top export destinations.
</div>

</div>

<!-- CARD 3 -->

<div class="activity-card">

<h2>Pending Requests</h2>

<div class="activity">
🕒 14 pickup requests waiting for assignment.
</div>

<div class="activity">
💰 8 vendor payments pending approval.
</div>

<div class="activity">
📋 5 new vendor registrations pending review.
</div>

</div>

</div>

<!-- BUTTONS -->

<div class="button-section">

<a href="admin_users.php" class="main-btn">

👥 Manage Users

</a>

<a href="admin_pickups.php" class="main-btn">

🚚 Pickup Reports

</a>

<a href="admin_reports.php" class="main-btn">

📊 View Reports

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