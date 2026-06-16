<?php
$stock = [
    [
        "type" => "Jeans",
        "kg" => "120KG",
        "items" => "240 Items",
        "status" => "Ready For Export"
    ],
    [
        "type" => "Hoodies",
        "kg" => "90KG",
        "items" => "150 Items",
        "status" => "In Warehouse"
    ],
    [
        "type" => "Cotton Clothes",
        "kg" => "180KG",
        "items" => "320 Items",
        "status" => "Ready For Recycling"
    ],
    [
        "type" => "Winter Wear",
        "kg" => "130KG",
        "items" => "210 Items",
        "status" => "Processing"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Vendor Stock - ReWear</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#001b3a;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:8px;
    overflow:auto;
}

.container{
    width:100%;
    max-width:1450px;
    background:linear-gradient(135deg,#0d2245,#14345a);
    border-radius:28px;
    padding:12px;
    color:white;
}

.top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:12px;
}

.logo{
    font-size:52px;
    font-weight:bold;
}

.logo span{
    color:#4fdcff;
}

.profile{
    background:rgba(255,255,255,0.05);
    padding:10px 18px;
    border-radius:18px;
    text-align:center;
}

.profile h3{
    font-size:14px;
    margin-bottom:4px;
}

.profile p{
    font-size:16px;
    color:#4fdcff;
    font-weight:bold;
}

.summary{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:10px;
    margin-bottom:12px;
}

.summary-card{
    background:rgba(255,255,255,0.05);
    border-radius:18px;
    padding:14px;
    text-align:center;
}

.summary-card h1{
    color:#4fdcff;
    font-size:30px;
    margin-bottom:5px;
}

.summary-card p{
    font-size:15px;
}

.title{
    font-size:24px;
    font-weight:bold;
    margin-bottom:10px;
}

.stock-grid{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:10px;
}

.stock-card{
    background:rgba(255,255,255,0.05);
    border-radius:18px;
    padding:12px;
}

.stock-card h2{
    font-size:20px;
    margin-bottom:8px;
}

.details{
    font-size:14px;
    margin-bottom:5px;
    color:#e2ecff;
}

.details span{
    color:#4fdcff;
    font-weight:bold;
}

.status{
    background:#29486c;
    padding:7px;
    border-radius:10px;
    margin-top:8px;
    font-size:14px;
}

.status span{
    color:#4fdcff;
    font-weight:bold;
}

.btn{
    width:100%;
    padding:9px;
    margin-top:8px;
    border:none;
    border-radius:10px;
    background:linear-gradient(to right,#67d8ef,#26c7e5);
    color:black;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
}

.back{
    text-align:center;
    margin-top:10px;
    padding-bottom:8px;
}

.back a{
    color:#4fdcff;
    text-decoration:none;
    font-size:16px;
    font-weight:bold;
}

@media(max-width:1000px){

    .summary{
        grid-template-columns:repeat(2,1fr);
    }

    .stock-grid{
        grid-template-columns:1fr;
    }
}

@media(max-width:650px){

    .summary{
        grid-template-columns:1fr;
    }

    .top{
        flex-direction:column;
        gap:10px;
    }

    .logo{
        font-size:40px;
    }

    .title{
        font-size:20px;
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

        <div class="profile">
            <h3>Vendor</h3>
            <p>GreenTex Industries</p>
        </div>

    </div>

    <div class="summary">

        <div class="summary-card">
            <h1>520KG</h1>
            <p>Total Stock</p>
        </div>

        <div class="summary-card">
            <h1>920</h1>
            <p>Total Items</p>
        </div>

        <div class="summary-card">
            <h1>18</h1>
            <p>Pending Exports</p>
        </div>

        <div class="summary-card">
            <h1>₹48K</h1>
            <p>Total Earnings</p>
        </div>

    </div>

    <div class="title">
        Available Stock
    </div>

    <div class="stock-grid">

        <?php foreach($stock as $item){ ?>

        <div class="stock-card">

            <h2><?php echo $item['type']; ?></h2>

            <div class="details">
                Total Weight:
                <span><?php echo $item['kg']; ?></span>
            </div>

            <div class="details">
                Available Quantity:
                <span><?php echo $item['items']; ?></span>
            </div>

            <div class="status">
                Status:
                <span><?php echo $item['status']; ?></span>
            </div>

            <button class="btn">
                Export Stock →
            </button>

        </div>

        <?php } ?>

    </div>

    <div class="back">
        <a href="vendor_dashboard.php">
            ← Back To Dashboard
        </a>
    </div>

</div>

</body>
</html>