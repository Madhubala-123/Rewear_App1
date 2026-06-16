<?php

session_start();

$lang = $_SESSION['lang'] ?? 'en';

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Select Role - ReWear</title>

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

width:550px;
height:550px;

background:
radial-gradient(circle,
rgba(34,211,238,0.18),
transparent 70%);

z-index:1;
}

/* MAIN CONTAINER */

.container{

position:relative;
z-index:5;

width:100%;
max-width:1180px;

text-align:center;
}

/* LOGO */

.logo{

font-size:72px;
font-weight:800;

margin-bottom:10px;

text-shadow:
0 0 20px rgba(255,255,255,0.15);
}

.logo span{

color:#56dfff;
}

/* SUBTITLE */

.subtitle{

font-size:18px;

letter-spacing:5px;

color:#f8fafc;

margin-bottom:40px;
}

/* CARDS */

.cards{

display:flex;
justify-content:center;
gap:22px;

flex-wrap:wrap;
}

/* CARD */

.card{

width:320px;

padding:35px 24px;

border-radius:28px;

background:
rgba(255,255,255,0.05);

backdrop-filter:blur(12px);

border:
1px solid rgba(255,255,255,0.08);

transition:0.3s;

cursor:pointer;

box-shadow:
0 10px 25px rgba(0,0,0,0.35);
}

.card:hover{

transform:
translateY(-8px);

background:
rgba(86,223,255,0.10);

box-shadow:
0 15px 30px rgba(34,211,238,0.18);
}

/* ICON */

.icon{

font-size:62px;
}

/* TITLE */

.title{

margin-top:18px;

font-size:30px;
font-weight:700;
}

/* DESCRIPTION */

.desc{

margin-top:14px;

font-size:15px;

line-height:1.8;

color:#dbeafe;
}

/* FOOTER */

.footer{

margin-top:38px;

font-size:12px;

letter-spacing:4px;

color:#cbd5e1;
}

/* MOBILE */

@media(max-width:1100px){

body{
overflow-y:auto;
padding:40px 20px;
}

.cards{
flex-direction:column;
align-items:center;
}

.card{
width:100%;
max-width:360px;
}

.logo{
font-size:58px;
}

.subtitle{
font-size:16px;
}

}

</style>

</head>

<body>

<div class="glow"></div>

<div class="container">

<!-- LOGO -->

<div class="logo">
Re<span>Wear</span>
</div>

<!-- SUBTITLE -->

<div class="subtitle">

<?php

if($lang=="te"){

echo "మీ పాత్రను ఎంచుకోండి";

}
else if($lang=="kn"){

echo "ನಿಮ್ಮ ಪಾತ್ರವನ್ನು ಆಯ್ಕೆಮಾಡಿ";

}
else if($lang=="ta"){

echo "உங்கள் பாத்திரத்தை தேர்ந்தெடுக்கவும்";

}
else if($lang=="hi"){

echo "अपनी भूमिका चुनें";

}
else{

echo "SELECT YOUR ROLE";

}

?>

</div>

<!-- ROLE CARDS -->

<div class="cards">

<!-- CUSTOMER -->

<div class="card"
onclick="window.location.href='customer_login.php'">

<div class="icon">👤</div>

<div class="title">

<?php

if($lang=="te"){

echo "కస్టమర్";

}
else if($lang=="kn"){

echo "ಗ್ರಾಹಕ";

}
else if($lang=="ta"){

echo "வாடிக்கையாளர்";

}
else if($lang=="hi"){

echo "ग्राहक";

}
else{

echo "Customer";

}

?>

</div>

<div class="desc">

<?php

if($lang=="te"){

echo "పాత బట్టలు అమ్మి వెంటనే డబ్బు పొందండి.";

}
else if($lang=="kn"){

echo "ಹಳೆಯ ಬಟ್ಟೆಗಳನ್ನು ನೀಡಿ ತಕ್ಷಣ ಹಣ ಪಡೆಯಿರಿ.";

}
else if($lang=="ta"){

echo "பழைய துணிகளை கொடுத்து உடனடி பணம் பெறுங்கள்.";

}
else if($lang=="hi"){

echo "पुराने कपड़े बेचकर तुरंत पैसे प्राप्त करें।";

}
else{

echo "Sell your old clothes and receive instant cash with doorstep pickup.";

}

?>

</div>

</div>

<!-- PICKUP AGENT -->

<div class="card"
onclick="window.location.href='pickup_agent_login.php'">

<div class="icon">🚚</div>

<div class="title">

<?php

if($lang=="te"){

echo "పికప్ ఏజెంట్";

}
else if($lang=="kn"){

echo "ಪಿಕಪ್ ಏಜೆಂಟ್";

}
else if($lang=="ta"){

echo "பிக்கப் ஏஜென்ட்";

}
else if($lang=="hi"){

echo "पिकअप एजेंट";

}
else{

echo "Pickup Agent";

}

?>

</div>

<div class="desc">

<?php

if($lang=="te"){

echo "పికప్ అభ్యర్థనలను నిర్వహించి బట్టలను సేకరించండి.";

}
else if($lang=="kn"){

echo "ಪಿಕಪ್ ವಿನಂತಿಗಳನ್ನು ನಿರ್ವಹಿಸಿ ಬಟ್ಟೆಗಳನ್ನು ಸಂಗ್ರಹಿಸಿ.";

}
else if($lang=="ta"){

echo "பிக்கப் கோரிக்கைகளை நிர்வகித்து துணிகளை சேகரிக்கவும்.";

}
else if($lang=="hi"){

echo "पिकअप अनुरोधों को संभालें और कपड़े इकट्ठा करें।";

}
else{

echo "Manage pickup requests and collect clothes from customers.";

}

?>

</div>

</div>

<!-- VENDOR -->

<div class="card"
onclick="window.location.href='vendor_login.php'">

<div class="icon">🏭</div>

<div class="title">

<?php

if($lang=="te"){

echo "వెండర్";

}
else if($lang=="kn"){

echo "ವೆಂಡರ್";

}
else if($lang=="ta"){

echo "விற்பனையாளர்";

}
else if($lang=="hi"){

echo "विक्रेता";

}
else{

echo "Vendor";

}

?>

</div>

<div class="desc">

<?php

if($lang=="te"){

echo "బట్టల స్టాక్ నిర్వహించి పరిశ్రమలకు పంపండి.";

}
else if($lang=="kn"){

echo "ಬಟ್ಟೆಗಳ ಸಂಗ್ರಹವನ್ನು ನಿರ್ವಹಿಸಿ ಕೈಗಾರಿಕೆಗಳಿಗೆ ಕಳುಹಿಸಿ.";

}
else if($lang=="ta"){

echo "துணி சேமிப்பை நிர்வகித்து தொழிற்சாலைகளுக்கு அனுப்பவும்.";

}
else if($lang=="hi"){

echo "कपड़ों का स्टॉक संभालें और उद्योगों को भेजें।";

}
else{

echo "Handle clothing stock and send recyclable clothes to industries.";

}

?>

</div>

</div>

</div>

<!-- FOOTER -->

<div class="footer">

<?php

if($lang=="te"){

echo "స్మార్ట్ & గ్రీన్ భవిష్యత్తు నిర్మాణం";

}
else if($lang=="kn"){

echo "ಸ್ಮಾರ್ಟ್ ಮತ್ತು ಹಸಿರು ಭವಿಷ್ಯ ನಿರ್ಮಾಣ";

}
else if($lang=="ta"){

echo "சிறந்த மற்றும் பசுமையான எதிர்காலம்";

}
else if($lang=="hi"){

echo "स्मार्ट और हरित भविष्य का निर्माण";

}
else{

echo "BUILDING A SMARTER & GREENER FUTURE";

}

?>

</div>

</div>

</body>

</html>