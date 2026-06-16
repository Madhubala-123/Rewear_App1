<?php

$demoOtp = rand(1000,9999);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Customer Login - ReWear</title>

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

background:
radial-gradient(circle at center,
#073b5a 0%,
#02142b 65%);

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

opacity:0.15;
}

/* CENTER GLOW */

.glow{

position:absolute;

width:500px;
height:500px;

background:
radial-gradient(circle,
rgba(34,211,238,0.15),
transparent 70%);

z-index:1;
}

/* LOGIN BOX */

.login-box{

position:relative;
z-index:5;

width:390px;

padding:38px 30px;

border-radius:28px;

background:
rgba(255,255,255,0.05);

backdrop-filter:blur(14px);

border:
1px solid rgba(255,255,255,0.08);

box-shadow:
0 15px 35px rgba(0,0,0,0.35);

text-align:center;
}

/* LOGO */

h1{

font-size:58px;
font-weight:800;
}

h1 span{

color:#56dfff;
}

/* SUBTITLE */

.subtitle{

margin-top:8px;

color:#dbeafe;

letter-spacing:3px;

font-size:13px;
}

/* INPUT AREA */

.input-box{

margin-top:28px;
}

/* INPUTS */

input{

width:100%;

padding:15px 16px;

margin-bottom:16px;

border:none;
outline:none;

border-radius:14px;

background:
rgba(255,255,255,0.06);

border:
1px solid rgba(255,255,255,0.06);

color:white;

font-size:14px;
}

input::placeholder{

color:#cbd5e1;
}

/* OTP ROW */

.otp-row{

display:flex;
gap:10px;
}

/* OTP BUTTON */

.otp-btn{

width:130px;

border:none;

border-radius:14px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

color:#001219;

font-weight:700;

cursor:pointer;

transition:0.3s;
}

.otp-btn:hover{

transform:scale(1.03);
}

/* DEMO OTP */

.demo{

margin-top:-3px;

margin-bottom:16px;

color:#bbf7d0;

font-size:13px;
}

/* LOGIN BUTTON */

.login-btn{

width:100%;

padding:15px;

border:none;

border-radius:16px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

color:#001219;

font-size:16px;

font-weight:700;

cursor:pointer;

transition:0.3s;
}

.login-btn:hover{

transform:scale(1.02);
}

/* REGISTER */

.register{

margin-top:20px;

font-size:14px;
}

.register a{

color:#56dfff;

text-decoration:none;

font-weight:600;
}

/* BACK */

.back{

margin-top:18px;
}

.back a{

color:#94a3b8;

text-decoration:none;

font-size:13px;
}

/* MOBILE */

@media(max-width:500px){

.login-box{

width:90%;
padding:30px 22px;
}

h1{

font-size:48px;
}
}

</style>

</head>

<body>

<!-- GLOW -->

<div class="glow"></div>

<!-- LOGIN BOX -->

<div class="login-box">

<h1>
Re<span>Wear</span>
</h1>

<p class="subtitle">
CUSTOMER LOGIN
</p>

<div class="input-box">

<div class="otp-row">

<input type="text"
placeholder="Enter Phone Number">

<button class="otp-btn">

Send OTP

</button>

</div>

<input type="text"
placeholder="Enter OTP">

<div class="demo">

Demo OTP: <?php echo $demoOtp; ?>

</div>

<button class="login-btn"
onclick="window.location.href='customer_dashboard.php'">

Login

</button>

</div>

<div class="register">

First time user?

<a href="customer_register.php">

Register Here

</a>

</div>

<div class="back">

<a href="select_role.php">

← Back to Role Selection

</a>

</div>

</div>

</body>

</html>