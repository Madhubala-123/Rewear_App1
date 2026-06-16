<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Vendor Profile - ReWear</title>

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
align-items:flex-start;

padding:18px;

background:
radial-gradient(circle at center,
#073b5a 0%,
#02142b 65%);

color:white;

overflow:auto;

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
max-width:1250px;

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

margin-bottom:20px;
}

.logo{

font-size:52px;
font-weight:800;
}

.logo span{

color:#56dfff;
}

.status-box{

background:
rgba(255,255,255,0.05);

padding:16px 22px;

border-radius:20px;

text-align:center;
}

.status-box h3{

font-size:16px;
margin-bottom:6px;
}

.status-box p{

font-size:15px;
font-weight:700;
color:#56dfff;
}

/* GRID */

.grid{

display:grid;
grid-template-columns:1fr 1fr;

gap:20px;
}

/* LEFT */

.left{

background:
rgba(255,255,255,0.05);

padding:22px;

border-radius:24px;
}

.left h1{

font-size:30px;
margin-bottom:20px;
}

.info{

font-size:16px;
line-height:2;
}

.info span{

color:#56dfff;
font-weight:700;
}

/* RIGHT */

.right{

background:
rgba(255,255,255,0.05);

padding:22px;

border-radius:24px;
}

.right h2{

font-size:26px;
margin-bottom:20px;
}

.card{

background:
rgba(255,255,255,0.06);

padding:14px;

border-radius:18px;

margin-bottom:16px;

font-size:15px;
line-height:1.8;
}

.card span{

color:#56dfff;
font-weight:700;
}

/* BUTTONS */

.buttons{

margin-top:24px;

display:flex;
gap:16px;
}

.btn{

flex:1;

padding:14px;

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

transition:0.3s;
}

.btn:hover{

transform:scale(1.02);
}

.back{

margin-top:20px;
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
align-items:flex-start;
}
}

@media(max-width:700px){

.top{

flex-direction:column;
gap:18px;
}

.logo{

font-size:42px;
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

<h3>Vendor Status</h3>

<p>ACTIVE</p>

</div>

</div>

<!-- GRID -->

<div class="grid">

<!-- LEFT -->

<div class="left">

<h1>Vendor Profile</h1>

<div class="info">

🏢 <span>Company Name:</span> GreenTex Industries <br><br>

📍 <span>Warehouse:</span> Chennai, Tamil Nadu <br><br>

📧 <span>Email:</span> greentex@gmail.com <br><br>

📞 <span>Phone:</span> +91 9876543210 <br><br>

🪪 <span>GST Number:</span> GSTIN45873219 <br><br>

📦 <span>Total Shipments:</span> 182 <br><br>

♻️ <span>Total Recycled:</span> 2.4 Tons <br><br>

🌍 <span>Export Countries:</span> UAE, Singapore, Malaysia

</div>

<div class="buttons">

<a href="edit_vendor_profile.php" class="btn">

Edit Profile

</a>

<a href="vendor_dashboard.php" class="btn">

Dashboard

</a>

</div>

</div>

<!-- RIGHT -->

<div class="right">

<h2>Business Information</h2>

<div class="card">

<span>Business Type:</span><br>
Textile Export & Recycling

</div>

<div class="card">

<span>Warehouse Capacity:</span><br>
12 Tons Storage

</div>

<div class="card">

<span>Pickup Partnerships:</span><br>
28 Active Pickup Agents

</div>

<div class="card">

<span>Monthly Revenue:</span><br>
₹4.8 Lakhs Average

</div>

<div class="card">

<span>AI Sustainability Score:</span><br>
92% Eco Efficient

</div>

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