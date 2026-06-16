<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Vendor Profile - ReWear</title>

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

padding:18px;

display:flex;
justify-content:center;
align-items:flex-start;

background:
radial-gradient(circle at center,
#073b5a 0%,
#02142b 65%);

overflow:auto;

color:white;

position:relative;
}

/* BACKGROUND */

body::before{

content:"";

position:fixed;

top:0;
left:0;

width:100%;
height:100%;

background-image:
radial-gradient(white 1px, transparent 1px);

background-size:140px 140px;

opacity:0.10;

pointer-events:none;

z-index:-1;
}

/* CONTAINER */

.container{

width:100%;
max-width:900px;

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

margin-bottom:22px;
}

.logo{

font-size:52px;
font-weight:800;
}

.logo span{

color:#56dfff;
}

.status{

background:
rgba(255,255,255,0.06);

padding:14px 20px;

border-radius:18px;

text-align:center;
}

.status h3{

font-size:15px;
margin-bottom:5px;
}

.status p{

font-size:15px;
font-weight:700;

color:#56dfff;
}

/* FORM */

.form-box{

background:
rgba(255,255,255,0.05);

padding:24px;

border-radius:24px;
}

.form-box h1{

font-size:34px;
margin-bottom:24px;
}

/* INPUTS */

.input-group{

margin-bottom:18px;
}

.input-group label{

display:block;

margin-bottom:8px;

font-size:15px;
font-weight:600;

color:#56dfff;
}

.input-group input,
.input-group textarea{

width:100%;

padding:14px 16px;

border:none;

outline:none;

border-radius:14px;

background:
rgba(255,255,255,0.12);

color:white;

font-size:15px;
}

.input-group textarea{

height:90px;

resize:none;
}

.input-group input:focus,
.input-group textarea:focus{

border:1px solid #56dfff;

box-shadow:
0 0 10px rgba(86,223,255,0.35);
}

/* BUTTONS */

.buttons{

margin-top:26px;

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

transition:0.3s;
}

.btn:hover{

transform:scale(1.02);
}

/* BACK */

.back{

margin-top:20px;

text-align:center;
}

.back a{

color:#56dfff;

text-decoration:none;

font-size:15px;
font-weight:600;
}

/* MOBILE */

@media(max-width:800px){

.top{

flex-direction:column;
gap:16px;
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

<div class="status">

<h3>Vendor Status</h3>

<p>EDIT MODE</p>

</div>

</div>

<!-- FORM -->

<div class="form-box">

<h1>Edit Vendor Profile</h1>

<form>

<div class="input-group">

<label>Company Name</label>

<input type="text"
value="GreenTex Industries">

</div>

<div class="input-group">

<label>Warehouse Location</label>

<input type="text"
value="Chennai, Tamil Nadu">

</div>

<div class="input-group">

<label>Email Address</label>

<input type="email"
value="greentex@gmail.com">

</div>

<div class="input-group">

<label>Phone Number</label>

<input type="text"
value="+91 9876543210">

</div>

<div class="input-group">

<label>GST Number</label>

<input type="text"
value="GSTIN45873219">

</div>

<div class="input-group">

<label>Export Countries</label>

<input type="text"
value="UAE, Singapore, Malaysia">

</div>

<div class="input-group">

<label>Business Description</label>

<textarea>Leading textile export and recycling company focused on sustainable clothing management.</textarea>

</div>

<div class="buttons">

<button type="submit" class="btn">

Save Changes

</button>

<button
type="button"
class="btn"
onclick="window.location.href='vendor_profile.php'">

Cancel

</button>

</div>

</form>

</div>

<div class="back">

<a href="vendor_profile.php">

← Back To Profile

</a>

</div>

</div>

</body>

</html>