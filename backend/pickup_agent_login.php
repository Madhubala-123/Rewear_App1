<?php

$demoOtp = rand(1000,9999);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pickup Agent Login - ReWear</title>

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

padding:20px;

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

/* GLOW */

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

width:100%;
max-width:540px;

padding:38px 32px;

border-radius:30px;

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

.logo{

font-size:72px;
font-weight:800;
}

.logo span{

color:#56dfff;
}

/* SUBTITLE */

.subtitle{

margin-top:8px;

font-size:15px;

letter-spacing:5px;

color:#dbeafe;
}

/* INPUT AREA */

.input-box{

margin-top:30px;
}

/* INPUT */

input{

width:100%;

padding:16px;

margin-bottom:16px;

border:none;
outline:none;

border-radius:16px;

background:
rgba(255,255,255,0.06);

border:
1px solid rgba(255,255,255,0.06);

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

width:150px;

border:none;

border-radius:16px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

color:#001219;

font-size:15px;

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

margin-bottom:18px;

color:#bbf7d0;

font-size:14px;
}

/* LOGIN BUTTON */

.login-btn{

width:100%;

padding:16px;

border:none;

border-radius:18px;

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

padding:30px 22px;
}

.logo{

font-size:56px;
}

.otp-row{

flex-direction:column;
}

.otp-btn{

width:100%;
padding:15px;
}

}

</style>

</head>

<body>

<div class="glow"></div>

<div class="login-box">

<div class="logo">
Re<span>Wear</span>
</div>

<p class="subtitle">
PICKUP AGENT LOGIN
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
onclick="window.location.href='pickup_agent_dashboard.php'">

Login

</button>

</div>

<!-- REGISTER -->

<div class="register">

First time agent?

<a href="pickup_agent_register.php">

Register Here

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