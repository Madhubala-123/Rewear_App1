<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ReWear</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    width:100%;
    min-height:100vh;
    overflow:hidden;
    background:#020b1c;
    display:flex;
    justify-content:center;
    align-items:center;
    position:relative;
    padding:20px;
}

/* BACKGROUND GLOW */

body::before{
    content:"";
    position:absolute;
    width:500px;
    height:500px;
    background:radial-gradient(circle,#00d9ff55 0%,transparent 70%);
    z-index:0;
}

/* STARS */

.star{
    position:absolute;
    width:4px;
    height:4px;
    background:white;
    border-radius:50%;
    opacity:0.7;
    animation:blink 2s infinite alternate;
}

@keyframes blink{
    from{
        opacity:0.2;
    }
    to{
        opacity:1;
    }
}

/* MAIN CONTAINER */

.container{
    width:100%;
    max-width:420px;
    text-align:center;
    z-index:10;
    padding:10px 20px;
}

/* LOGO BOX */

.logo-box{
    width:90px;
    height:90px;
    margin:auto;
    border-radius:25px;
    background:linear-gradient(135deg,#2f6bff,#54d4ff);
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:42px;
    color:white;
    box-shadow:0 0 35px #00d9ff88;
}

/* LOGO */

.logo{
    font-size:72px;
    font-weight:800;
    margin-top:25px;
    color:white;
}

.logo span{
    color:#4fd8ff;
}

/* SUBTEXT */

.subtext{
    color:#9eaec7;
    font-size:16px;
    margin-top:18px;
    line-height:1.7;
}

/* PLATFORM TEXT */

.platform{
    margin-top:45px;
    color:white;
    letter-spacing:6px;
    font-size:15px;
    line-height:1.7;
}

/* LOADING BAR */

.loading{
    width:78%;
    height:6px;
    background:#24384d;
    margin:35px auto;
    border-radius:20px;
    overflow:hidden;
}

.loading-fill{
    width:70%;
    height:100%;
    background:#4fd8ff;
    border-radius:20px;
    box-shadow:0 0 15px #4fd8ff;
}

/* GREENER TEXT */

.green{
    color:#b9d6b0;
    letter-spacing:5px;
    font-size:15px;
    line-height:1.7;
}

/* FUTURE */

.future{
    color:#7e8ca3;
    margin-top:30px;
    margin-bottom:30px;
    letter-spacing:5px;
    font-size:14px;
    line-height:1.8;
}

/* BUTTON */

.start-btn{
    width:260px;
    height:65px;
    border:none;
    border-radius:50px;
    background:#56dfff;
    color:#00111f;
    font-size:20px;
    font-weight:700;
    cursor:pointer;
    box-shadow:0 0 25px #00d9ff88;
    transition:0.3s;
}

.start-btn:hover{
    transform:scale(1.04);
}

/* MOBILE */

@media(max-width:480px){

    .logo{
        font-size:62px;
    }

    .platform{
        font-size:13px;
    }

    .green{
        font-size:13px;
    }

    .future{
        font-size:12px;
    }

    .start-btn{
        width:230px;
        height:60px;
        font-size:18px;
    }

}

</style>
</head>

<body>

<!-- STARS -->

<div class="star" style="top:10%;left:15%;"></div>
<div class="star" style="top:20%;right:18%;"></div>
<div class="star" style="top:75%;left:20%;"></div>
<div class="star" style="bottom:18%;right:12%;"></div>
<div class="star" style="bottom:28%;left:10%;"></div>

<!-- MAIN -->

<div class="container">

    <div class="logo-box">
        👕
    </div>

    <div class="logo">
        Re<span>Wear</span>
    </div>

    <div class="subtext">
        Your Old Clothes.<br>
        Your New Cash.
    </div>

    <div class="platform">
        AI POWERED SUSTAINABLE<br>
        FASHION PLATFORM
    </div>

    <div class="loading">
        <div class="loading-fill"></div>
    </div>

    <div class="green">
        ♻ BUILDING A GREENER<br>
        TOMORROW
    </div>

    <div class="future">
        ENTERING SUSTAINABLE FUTURE...
    </div>

    <button class="start-btn" onclick="goToLanguage()">
        Get Started →
    </button>

</div>

<script>

function goToLanguage(){

    window.location.href = "language.php";

}

</script>

</body>
</html>