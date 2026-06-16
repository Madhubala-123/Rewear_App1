<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Vendor Register - ReWear</title>

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

position:relative;
z-index:5;

width:470px;

padding:22px 22px;

border-radius:24px;

background:
rgba(255,255,255,0.05);

backdrop-filter:blur(12px);

border:
1px solid rgba(255,255,255,0.08);

box-shadow:
0 12px 30px rgba(0,0,0,0.35);

text-align:center;
}

/* LOGO */

h1{

font-size:56px;
font-weight:800;

line-height:1;
}

h1 span{

color:#56dfff;
}

/* SUBTITLE */

.subtitle{

margin-top:10px;

color:#dbeafe;

letter-spacing:3px;

font-size:13px;

margin-bottom:18px;
}

/* INPUTS */

input{

width:100%;

padding:12px 14px;

margin-bottom:11px;

border:none;
outline:none;

border-radius:12px;

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

margin-top:4px;

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

.register-btn:hover{

transform:scale(1.02);
}

/* LOGIN */

.login{

margin-top:14px;

font-size:13px;
}

.login a{

color:#56dfff;

text-decoration:none;

font-weight:600;
}

/* BACK */

.back{

margin-top:10px;
}

.back a{

color:#94a3b8;

text-decoration:none;

font-size:12px;
}

/* MOBILE */

@media(max-width:600px){

.register-box{

width:92%;
padding:20px 18px;
}

h1{

font-size:46px;
}

body{

overflow:auto;
padding:16px 0;
}
}

</style>

<script>

function registerVendor(){

let company =
document.getElementById("company").value.trim();

let owner =
document.getElementById("owner").value.trim();

let phone =
document.getElementById("phone").value.trim();

let email =
document.getElementById("email").value.trim();

let warehouse =
document.getElementById("warehouse").value.trim();

let password =
document.getElementById("password").value.trim();

/* CHECK EMPTY FIELDS */

if(
company === "" ||
owner === "" ||
phone === "" ||
email === "" ||
warehouse === "" ||
password === ""
){

alert("Please fill all details");

return;
}

/* SUCCESS */

alert("Vendor Registered Successfully");

window.location.href =
"vendor_login.php";

}

</script>

</head>

<body>

<div class="register-box">

<h1>
Re<span>Wear</span>
</h1>

<p class="subtitle">
VENDOR REGISTER
</p>

<input type="text"
id="company"
placeholder="Enter Company Name">

<input type="text"
id="owner"
placeholder="Enter Owner Name">

<input type="text"
id="phone"
placeholder="Enter Phone Number">

<input type="email"
id="email"
placeholder="Enter Email Address">

<input type="text"
id="warehouse"
placeholder="Enter Warehouse Location">

<input type="password"
id="password"
placeholder="Create Password">

<button class="register-btn"
type="button"
onclick="registerVendor()">

Register

</button>

<div class="login">

Already registered?

<a href="vendor_login.php">

Login Here

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