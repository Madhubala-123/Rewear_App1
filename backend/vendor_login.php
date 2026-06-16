<?php

$demoOtp = rand(1000,9999);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Vendor Login - ReWear</title>

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

background-size:160px 160px;

opacity:0.12;
}

/* GLOW */

.glow{

position:absolute;

width:420px;
height:420px;

background:
radial-gradient(circle,
rgba(34,211,238,0.14),
transparent 70%);

z-index:1;
}

/* LOGIN BOX */

.login-box{

position:relative;
z-index:5;

width:500px;

padding:34px 34px;

border-radius:26px;

background:
rgba(255,255,255,0.05);

backdrop-filter:blur(12px);

border:
1px solid rgba(255,255,255,0.08);

box-shadow:
0 15px 35px rgba(0,0,0,0.35);

text-align:center;
}

/* LOGO */

h1{

font-size:74px;
font-weight:800;

line-height:1;
}

h1 span{

color:#56dfff;
}

/* SUBTITLE */

.subtitle{

margin-top:18px;

color:#dbeafe;

letter-spacing:5px;

font-size:15px;
}

/* INPUT AREA */

.input-box{

margin-top:28px;
}

/* INPUTS */

input{

width:100%;

padding:16px 18px;

margin-bottom:16px;

border:none;
outline:none;

border-radius:14px;

background:
rgba(255,255,255,0.06);

border:
1px solid rgba(255,255,255,0.05);

color:white;

font-size:15px;
}

input::placeholder{

color:#cbd5e1;
}

/* OTP ROW */

.otp-row{

display:flex;
gap:12px;
}

/* OTP BUTTON */

.otp-btn{

width:145px;

border:none;

border-radius:14px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

color:#001219;

font-size:16px;
font-weight:700;

cursor:pointer;

transition:0.3s;
}

.otp-btn:hover{

transform:scale(1.03);
}

/* DEMO OTP */

.demo{

margin-top:-2px;

margin-bottom:18px;

color:#bbf7d0;

font-size:14px;
}

/* LOGIN BUTTON */

.login-btn{

width:100%;

padding:16px;

border:none;

border-radius:16px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

color:#001219;

font-size:18px;

font-weight:700;

cursor:pointer;

transition:0.3s;
}

.login-btn:hover{

transform:scale(1.02);
}

/* REGISTER */

.register{

margin-top:22px;

font-size:15px;
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

font-size:14px;
}

/* MOBILE */

@media(max-width:600px){

.login-box{

width:92%;
padding:28px 22px;
}

h1{

font-size:56px;
}

.subtitle{

font-size:13px;
letter-spacing:3px;
}

.otp-row{

flex-direction:column;
}

.otp-btn{

width:100%;
height:54px;
}
}

</style>

</head>

<body>

<div class="glow"></div>

<div class="login-box">

<h1>
Re<span>Wear</span>
</h1>

<p class="subtitle">
VENDOR LOGIN
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
onclick="window.location.href='vendor_dashboard.php'">

Login

</button>

</div>

<div class="register">

First time vendor?

<a href="vendor_register.php">

Register Here

</a>

</div>

<div class="back">

<a href="select_role.php">

← Back To Role Selection

</a>

</div>

</div>

</body>

</html>