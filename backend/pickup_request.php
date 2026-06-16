<?php

session_start();

$lang = $_SESSION['lang'] ?? 'en';

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pickup Request - ReWear</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{

background:
linear-gradient(135deg,#021224,#052b47);

min-height:100vh;

padding:18px;

color:white;
}

/* MAIN */

.container{

width:100%;
max-width:1400px;

margin:auto;

display:flex;

gap:18px;

align-items:flex-start;
}

/* LEFT PANEL */

.left-panel{

flex:1;

background:
rgba(255,255,255,0.04);

padding:22px;

border-radius:24px;

border:
1px solid rgba(255,255,255,0.08);
}

/* RIGHT PANEL */

.right-panel{

width:290px;

background:
rgba(255,255,255,0.04);

padding:16px;

border-radius:22px;

border:
1px solid rgba(255,255,255,0.08);

height:fit-content;
}

/* TITLE */

.title{

font-size:34px;

font-weight:800;

margin-bottom:20px;
}

.title span{

color:#56dfff;
}

/* GRID */

.grid{

display:grid;

grid-template-columns:
1fr 1fr;

gap:16px;
}

/* INPUT */

.input-box{

margin-bottom:14px;
}

label{

display:block;

margin-bottom:8px;

font-size:15px;

font-weight:600;
}

input,
select,
textarea{

width:100%;

padding:15px;

border:none;

outline:none;

border-radius:16px;

background:#24425c;

color:white;

font-size:14px;
}

textarea{

height:95px;

resize:none;
}

/* FULL */

.full{

grid-column:1 / 3;
}

/* UPLOAD */

.upload-box{

margin-top:15px;

padding:18px;

border-radius:18px;

border:2px dashed rgba(255,255,255,0.15);

background:
rgba(255,255,255,0.03);
}

.upload-title{

font-size:20px;

font-weight:700;

margin-bottom:15px;

text-align:center;
}

/* PREVIEW */

.preview-container{

display:flex;

flex-wrap:wrap;

gap:8px;

margin-top:14px;
}

.preview-container img{

width:75px;
height:75px;

object-fit:cover;

border-radius:12px;

border:
2px solid rgba(255,255,255,0.1);
}

/* BUTTON */

.submit-btn{

width:100%;

height:54px;

border:none;

border-radius:16px;

background:#56dfff;

color:#00111f;

font-size:17px;

font-weight:700;

cursor:pointer;

margin-top:18px;
}

/* AI BOX */

.ai-box{

padding:16px;

border-radius:18px;

background:
rgba(255,255,255,0.05);

border:
1px solid rgba(255,255,255,0.08);
}

/* AI TITLE */

.ai-title{

font-size:18px;

font-weight:700;

margin-bottom:12px;
}

/* AI RESULT */

.ai-result{

font-size:15px;

font-weight:600;

color:#56dfff;

margin-bottom:14px;

line-height:1.5;
}

/* STATUS */

.status-box{

display:flex;

flex-direction:column;

gap:12px;
}

.status-item{

padding:13px 14px;

border-radius:14px;

font-size:14px;

font-weight:600;

opacity:0.20;

transition:0.3s;
}

/* ACTIVE */

.status-item.active{

opacity:1;

transform:scale(1.02);
}

/* COLORS */

.reusable{

background:#063b16;

color:#77ff9f;
}

.recyclable{

background:#4a3f00;

color:#fff56d;
}

.damaged{

background:#5a1111;

color:#ff8f8f;
}

/* MOBILE */

@media(max-width:1100px){

.container{

flex-direction:column;
}

.right-panel{

width:100%;
}

.grid{

grid-template-columns:1fr;
}

.full{

grid-column:auto;
}

}

</style>

</head>

<body>

<div class="container">

<!-- LEFT PANEL -->

<div class="left-panel">

<div class="title">
Re<span>Wear</span> Pickup
</div>

<div class="grid">

<div class="input-box">

<label>Customer Name</label>

<input type="text"
placeholder="Enter your name">

</div>

<div class="input-box">

<label>Phone Number</label>

<input type="text"
placeholder="Enter phone number">

</div>

<div class="input-box">

<label>Pickup Date</label>

<input type="date">

</div>

<div class="input-box">

<label>Pickup Time</label>

<select>

<option>09:00 AM</option>
<option>10:30 AM</option>
<option>12:00 PM</option>
<option>03:00 PM</option>

</select>

</div>

<div class="input-box full">

<label>Clothes Type</label>

<select>

<option>Select Clothes Type</option>

<option>Shirts</option>
<option>Jeans</option>
<option>Hoodies</option>
<option>Sarees</option>
<option>Kids Wear</option>

</select>

</div>

<div class="input-box full">

<label>Other Clothes Details</label>

<textarea
placeholder="Example: cotton shirts, damaged jeans"></textarea>

</div>

<div class="input-box full">

<label>Pickup Address</label>

<textarea
placeholder="Enter full pickup address"></textarea>

</div>

</div>

<!-- UPLOAD -->

<div class="upload-box">

<div class="upload-title">
📸 Upload Clothes Photos
</div>

<input
type="file"
id="clothImages"
multiple
accept="image/*"
onchange="analyzeCloth()">

<div class="preview-container"
id="previewContainer">

</div>

</div>

<button class="submit-btn"
onclick="submitPickup()">

Schedule Pickup →

</button>

</div>

<!-- RIGHT PANEL -->

<div class="right-panel">

<div class="ai-box">

<div class="ai-title">
👕 AI Cloth Analysis
</div>

<div class="ai-result"
id="aiResult">

Upload cloth image for AI analysis

</div>

<div class="status-box">

<div class="status-item reusable"
id="reuseBox">

✅ Reusable Cloth

</div>

<div class="status-item recyclable"
id="recycleBox">

♻️ Recyclable Cloth

</div>

<div class="status-item damaged"
id="damageBox">

❌ Damaged Cloth

</div>

</div>

</div>

</div>

</div>

<script>

function analyzeCloth(){

let files =
document.getElementById("clothImages").files;

let result =
document.getElementById("aiResult");

let preview =
document.getElementById("previewContainer");

let reuseBox =
document.getElementById("reuseBox");

let recycleBox =
document.getElementById("recycleBox");

let damageBox =
document.getElementById("damageBox");

/* CLEAR */

preview.innerHTML = "";

reuseBox.classList.remove("active");
recycleBox.classList.remove("active");
damageBox.classList.remove("active");

if(files.length == 0){

result.innerHTML =
"Upload cloth image";

return;
}

/* IMAGE PREVIEW */

for(let i=0; i<files.length; i++){

let reader =
new FileReader();

reader.onload = function(e){

let img =
document.createElement("img");

img.src = e.target.result;

preview.appendChild(img);

}

reader.readAsDataURL(files[i]);

}

/* RANDOM AI RESULT */

let random =
Math.floor(Math.random() * 3);

if(random == 0){

result.innerHTML =
"This cloth is reusable and can be used again.";

reuseBox.classList.add("active");

}
else if(random == 1){

result.innerHTML =
"This cloth can be recycled into new materials.";

recycleBox.classList.add("active");

}
else{

result.innerHTML =
"This cloth is too damaged and cannot be reused.";

damageBox.classList.add("active");

}

}
function submitPickup(){

alert("Pickup Scheduled Successfully!");

window.location.href =
"pickup_success.php";

}

</script>

</body>
</html>