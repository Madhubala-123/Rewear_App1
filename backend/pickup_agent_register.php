<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pickup Agent Register - ReWear</title>

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

opacity:0.12;
}

/* REGISTER BOX */

.register-box{

width:520px;

padding:22px 26px;

border-radius:26px;

background:
rgba(255,255,255,0.05);

backdrop-filter:blur(12px);

border:
1px solid rgba(255,255,255,0.08);

box-shadow:
0 10px 30px rgba(0,0,0,0.35);

text-align:center;

z-index:5;
}

/* LOGO */

.logo{

font-size:72px;
font-weight:800;

line-height:1;
}

.logo span{

color:#56dfff;
}

/* SUBTITLE */

.subtitle{

margin-top:10px;
margin-bottom:18px;

font-size:12px;

letter-spacing:5px;

color:#dbeafe;
}

/* INPUTS */

input{

width:100%;

padding:12px 14px;

margin-bottom:10px;

border:none;
outline:none;

border-radius:14px;

background:
rgba(255,255,255,0.06);

border:
1px solid rgba(255,255,255,0.05);

color:white;

font-size:14px;
}

input::placeholder{

color:#cbd5e1;
}

/* BUTTON */

.register-btn{

width:100%;

padding:13px;

margin-top:6px;

border:none;

border-radius:15px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

color:#001219;

font-size:16px;

font-weight:700;

cursor:pointer;

transition:0.3s;
}

.register-btn:hover{

transform:scale(1.02);
}

/* BACK */

.back{

margin-top:12px;
}

.back a{

color:#94a3b8;

text-decoration:none;

font-size:13px;
}

/* MOBILE */

@media(max-width:600px){

.register-box{

width:92%;
padding:20px;
}

.logo{

font-size:52px;
}

}

</style>

</head>

<body>

<div class="register-box">

<div class="logo">
Re<span>Wear</span>
</div>

<div class="subtitle">
PICKUP AGENT REGISTER
</div>

<input type="text"
placeholder="Enter Full Name">

<input type="text"
placeholder="Enter Phone Number">

<input type="text"
placeholder="Enter Vehicle Number">

<input type="text"
placeholder="Enter Aadhaar Number">

<input type="text"
placeholder="Enter City">

<input type="password"
placeholder="Create Password">

<button class="register-btn"
onclick="window.location.href='pickup_agent_login.php'">

Register

</button>

<div class="back">

<a href="pickup_agent_login.php">

← Back To Login

</a>

</div>

</div>

</body>

</html>