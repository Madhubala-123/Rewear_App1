<?php

$request = [
    "title" => "Export Request",
    "location" => "Mumbai Port",
    "materials" => "Winter Wear • Woolen Clothes • Bulk Shirts",
    "weight" => "180KG",
    "boxes" => "24 Boxes",
    "status" => "Ready For Shipment",
    "company" => "Global Textile Export",
    "time" => "04:30 PM"
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Export Request Details</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#001b3a;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:12px;
}

.container{
    width:100%;
    max-width:1200px;
    background:linear-gradient(135deg,#0d2245,#14345a);
    border-radius:28px;
    padding:20px;
    color:white;
}

.top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:18px;
}

.logo{
    font-size:58px;
    font-weight:bold;
}

.logo span{
    color:#4fdcff;
}

.status-box{
    background:rgba(255,255,255,0.05);
    padding:16px 24px;
    border-radius:20px;
    text-align:center;
}

.status-box h3{
    font-size:18px;
    margin-bottom:6px;
}

.status-box p{
    font-size:20px;
    color:#4fdcff;
    font-weight:bold;
}

.main{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:18px;
}

.left,
.right{
    background:rgba(255,255,255,0.05);
    border-radius:24px;
    padding:20px;
}

.title{
    font-size:34px;
    margin-bottom:20px;
    font-weight:bold;
}

.info{
    font-size:18px;
    margin-bottom:18px;
    line-height:1.5;
}

.info span{
    color:#4fdcff;
    font-weight:bold;
}

.material-box{
    background:#2a476b;
    padding:16px;
    border-radius:16px;
    margin-top:15px;
    font-size:18px;
    line-height:1.5;
}

.map{
    width:100%;
    height:100%;
    min-height:420px;
    border-radius:20px;
    display:flex;
    justify-content:center;
    align-items:center;
    background:rgba(255,255,255,0.03);
    color:#4fdcff;
    font-size:42px;
    font-weight:bold;
    text-align:center;
    padding:20px;
}

.buttons{
    display:flex;
    gap:15px;
    margin-top:22px;
}

.btn{
    flex:1;
    padding:16px;
    border:none;
    border-radius:14px;
    background:linear-gradient(to right,#67d8ef,#26c7e5);
    color:black;
    font-size:20px;
    font-weight:bold;
    cursor:pointer;
}

.back{
    text-align:center;
    margin-top:18px;
}

.back a{
    color:#4fdcff;
    text-decoration:none;
    font-size:20px;
    font-weight:bold;
}

@media(max-width:900px){

    .main{
        grid-template-columns:1fr;
    }

    .map{
        min-height:250px;
    }

    .logo{
        font-size:44px;
    }

}

</style>
</head>

<body>

<div class="container">

    <div class="top">

        <div class="logo">
            Re<span>Wear</span>
        </div>

        <div class="status-box">
            <h3>Export Status</h3>
            <p>READY</p>
        </div>

    </div>

    <div class="main">

        <div class="left">

            <div class="title">
                <?php echo $request['title']; ?>
            </div>

            <div class="info">
                📍 <span>Location:</span>
                <?php echo $request['location']; ?>
            </div>

            <div class="info">
                🏭 <span>Company:</span>
                <?php echo $request['company']; ?>
            </div>

            <div class="info">
                ⚖️ <span>Total Weight:</span>
                <?php echo $request['weight']; ?>
            </div>

            <div class="info">
                📦 <span>Total Boxes:</span>
                <?php echo $request['boxes']; ?>
            </div>

            <div class="info">
                🕓 <span>Pickup Time:</span>
                <?php echo $request['time']; ?>
            </div>

            <div class="material-box">
                <?php echo $request['materials']; ?>
            </div>

            <div class="buttons">

                <button class="btn">
                    Start Export
                </button>

                <button class="btn">
                    Mark Completed
                </button>

            </div>

        </div>

        <div class="right">

            <div class="map">
                Export Route Map
            </div>

        </div>

    </div>

    <div class="back">
        <a href="vendor_dashboard.php">
            ← Back To Dashboard
        </a>
    </div>

</div>

</body>
</html>