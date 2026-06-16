<?php
session_start();

if(isset($_GET['lang'])){

$_SESSION['lang'] = $_GET['lang'];

header("Location: select_role.php");

exit();

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Language Selection</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{

background:#020b1c;

height:100vh;

overflow:hidden;

display:flex;
justify-content:center;
align-items:center;

position:relative;
}

/* GLOW */

body::before{

content:"";

position:absolute;

width:420px;
height:420px;

background:
radial-gradient(circle,#00d9ff33 0%,transparent 70%);
}

/* STARS */

.star{

position:absolute;

width:4px;
height:4px;

background:white;

border-radius:50%;

opacity:0.7;
}

/* MAIN */

.container{

width:100%;
max-width:360px;

padding:15px;

z-index:10;
}

/* LOGO BOX */

.logo-box{

width:75px;
height:75px;

margin:auto;

border-radius:22px;

background:
linear-gradient(135deg,#2f6bff,#54d4ff);

display:flex;
justify-content:center;
align-items:center;

font-size:34px;

box-shadow:
0 0 30px #00d9ff88;
}

/* LOGO */

.logo{

text-align:center;

font-size:58px;
font-weight:800;

margin-top:18px;

color:white;
}

.logo span{

color:#4fd8ff;
}

/* SUBTITLE */

.subtitle{

text-align:center;

color:#a5b3c7;

font-size:14px;

margin-top:8px;
margin-bottom:24px;
}

/* LANGUAGE OPTION */

.lang-option{

width:100%;
height:62px;

border-radius:18px;

background:#07142e;

border:2px solid #182646;

margin-bottom:14px;

display:flex;
align-items:center;

padding-left:22px;

color:white;

font-size:18px;

cursor:pointer;

transition:0.3s;
}

.lang-option.active{

border:2px solid #4fd8ff;

box-shadow:
0 0 18px #4fd8ff66;
}

.lang-option:hover{

transform:scale(1.02);
}

/* BUTTON */

.continue-btn{

width:100%;
height:60px;

border:none;

border-radius:18px;

background:#56dfff;

color:#00111f;

font-size:19px;
font-weight:700;

cursor:pointer;

margin-top:10px;

box-shadow:
0 0 20px #00d9ff88;
}

.continue-btn:hover{

transform:scale(1.02);
}

</style>

</head>

<body>

<!-- STARS -->

<div class="star" style="top:12%;left:15%;"></div>
<div class="star" style="top:25%;right:16%;"></div>
<div class="star" style="bottom:20%;left:18%;"></div>
<div class="star" style="bottom:15%;right:10%;"></div>

<!-- MAIN -->

<div class="container">

<div class="logo-box">

👕

</div>

<div class="logo">

Re<span>Wear</span>

</div>

<div class="subtitle">

Select your language to continue

</div>

<!-- TAMIL -->

<div class="lang-option active"
data-lang="ta"
onclick="selectLang(this)">

Tamil ✓

</div>

<!-- TELUGU -->

<div class="lang-option"
data-lang="te"
onclick="selectLang(this)">

Telugu

</div>

<!-- HINDI -->

<div class="lang-option"
data-lang="hi"
onclick="selectLang(this)">

Hindi

</div>

<!-- KANNADA -->

<div class="lang-option"
data-lang="kn"
onclick="selectLang(this)">

Kannada

</div>

<!-- ENGLISH -->

<div class="lang-option"
data-lang="en"
onclick="selectLang(this)">

English

</div>

<!-- BUTTON -->

<button class="continue-btn"
onclick="goNext()">

Continue →

</button>

</div>

<script>

let selectedLanguage = "ta";

function selectLang(element){

let options =
document.querySelectorAll(".lang-option");

options.forEach(option => {

option.classList.remove("active");

option.innerHTML =
option.innerHTML.replace(" ✓","");

});

element.classList.add("active");

if(!element.innerHTML.includes("✓")){

element.innerHTML += " ✓";

}

selectedLanguage =
element.getAttribute("data-lang");
}

function goNext(){

window.location.href =
"language.php?lang=" + selectedLanguage;
}

</script>

</body>

</html>