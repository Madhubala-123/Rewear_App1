<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Customer Register - ReWear</title>

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
linear-gradient(
rgba(0,0,0,0.72),
rgba(0,0,0,0.82)),

url('https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=1974&auto=format&fit=crop');

background-size:cover;
background-position:center;

animation:bgZoom 18s ease-in-out infinite;

color:white;
}

/* BACKGROUND ANIMATION */

@keyframes bgZoom{

0%{
background-size:100%;
}

50%{
background-size:110%;
}

100%{
background-size:100%;
}
}

/* REGISTER BOX */

.register-box{

width:430px;

padding:42px 35px;

border-radius:32px;

background:
rgba(255,255,255,0.08);

backdrop-filter:blur(18px);

border:
1px solid rgba(255,255,255,0.08);

box-shadow:
0 20px 45px rgba(0,0,0,0.45);

text-align:center;
}

/* LOGO */

h1{

font-size:62px;

font-weight:800;
}

h1 span{

color:#67e8f9;
}

/* SUBTITLE */

.subtitle{

margin-top:10px;

color:#e2e8f0;

letter-spacing:3px;

font-size:14px;
}

/* INPUT BOX */

.input-box{

margin-top:35px;
}

/* INPUT */

input{

width:100%;

padding:17px 18px;

margin-bottom:18px;

border:none;

outline:none;

border-radius:16px;

background:
rgba(255,255,255,0.08);

border:
1px solid rgba(255,255,255,0.06);

color:white;

font-size:15px;
}

input::placeholder{

color:#cbd5e1;
}

/* REGISTER BUTTON */

.register-btn{

width:100%;

padding:16px;

border:none;

border-radius:18px;

background:
linear-gradient(to right,#67e8f9,#22d3ee);

color:#001219;

font-size:17px;

font-weight:700;

cursor:pointer;

transition:0.4s;

margin-top:8px;
}

.register-btn:hover{

transform:translateY(-3px);

box-shadow:
0 15px 30px rgba(34,211,238,0.3);
}

/* LOGIN */

.login{

margin-top:24px;

color:#e2e8f0;

font-size:15px;
}

.login a{

color:#67e8f9;

text-decoration:none;

font-weight:600;
}

.login a:hover{

text-decoration:underline;
}

/* BACK */

.back{

margin-top:20px;
}

.back a{

color:#94a3b8;

text-decoration:none;

font-size:14px;
}

.back a:hover{

color:white;
}

</style>

</head>

<body>

<!-- REGISTER BOX -->

<div class="register-box">

<!-- LOGO -->

<h1>
Re<span>Wear</span>
</h1>

<!-- SUBTITLE -->

<p class="subtitle">
CUSTOMER REGISTRATION
</p>

<!-- FORM -->

<div class="input-box">

<!-- FULL NAME -->

<input type="text"
placeholder="Enter Full Name">

<!-- EMAIL -->

<input type="email"
placeholder="Enter Email Address">

<!-- PASSWORD -->

<input type="password"
placeholder="Create Password">

<!-- ADDRESS -->

<input type="text"
placeholder="Enter Address">

<!-- BUTTON -->

<button class="register-btn"
onclick="showSuccess()">

Create Account

</button>

</div>

<!-- LOGIN -->

<div class="login">

Already registered?

<a href="customer_login.php">

Login Here

</a>

</div>

<!-- BACK -->

<div class="back">

<a href="select_role.php">

← Back to Role Selection

</a>

</div>

</div>

<!-- SCRIPT -->

<script>

function showSuccess(){

alert("Account Created Successfully!");

window.location.href = "customer_login.php";

}

</script>

</body>

</html>