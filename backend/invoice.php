<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Invoice - ReWear</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#021b3a;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
    color:white;
}

.container{
    width:100%;
    max-width:950px;
    background:linear-gradient(135deg,#102d55,#143b5f);
    border-radius:28px;
    padding:30px;
    border:1px solid rgba(255,255,255,0.08);
}

.top-bar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.logo{
    font-size:68px;
    font-weight:700;
    line-height:1;
}

.logo span{
    color:#4ddcff;
}

.invoice-status{
    background:rgba(255,255,255,0.06);
    padding:20px 28px;
    border-radius:20px;
    text-align:center;
}

.invoice-status h3{
    font-size:20px;
    margin-bottom:8px;
}

.invoice-status p{
    color:#4ddcff;
    font-size:32px;
    font-weight:700;
}

.invoice-box{
    background:rgba(255,255,255,0.05);
    border-radius:24px;
    padding:28px;
}

.invoice-title{
    font-size:42px;
    font-weight:700;
    margin-bottom:25px;
}

.grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
    margin-bottom:25px;
}

.info-card{
    background:rgba(255,255,255,0.05);
    border-radius:18px;
    padding:18px;
}

.info-card h4{
    color:#4ddcff;
    margin-bottom:12px;
    font-size:20px;
}

.info-card p{
    font-size:16px;
    margin-bottom:8px;
    line-height:1.6;
}

.highlight{
    color:#4ddcff;
    font-weight:600;
}

.amount-box{
    background:rgba(255,255,255,0.06);
    border-radius:20px;
    padding:20px;
    margin-top:10px;
}

.amount-row{
    display:flex;
    justify-content:space-between;
    margin-bottom:12px;
    font-size:18px;
}

.total{
    border-top:1px solid rgba(255,255,255,0.1);
    padding-top:15px;
    font-size:24px;
    font-weight:700;
}

.button-group{
    display:flex;
    gap:18px;
    margin-top:30px;
}

.btn{
    flex:1;
    height:58px;
    border:none;
    border-radius:16px;
    background:#39d5f3;
    color:black;
    font-size:20px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

.btn:hover{
    transform:scale(1.02);
}

.back{
    margin-top:22px;
    text-align:center;
}

.back a{
    text-decoration:none;
    color:#4ddcff;
    font-size:18px;
    font-weight:500;
}

@media(max-width:768px){

    .logo{
        font-size:48px;
    }

    .grid{
        grid-template-columns:1fr;
    }

    .button-group{
        flex-direction:column;
    }

    .invoice-title{
        font-size:32px;
    }

}

</style>
</head>

<body>

<div class="container">

    <div class="top-bar">

        <div class="logo">
            Re<span>Wear</span>
        </div>

        <div class="invoice-status">
            <h3>Payment Status</h3>
            <p>PAID</p>
        </div>

    </div>

    <div class="invoice-box">

        <div class="invoice-title">
            Invoice Details
        </div>

        <div class="grid">

            <div class="info-card">
                <h4>Vendor Information</h4>

                <p><span class="highlight">Company:</span> GreenTex Industries</p>

                <p><span class="highlight">Invoice ID:</span> INV-REW-2045</p>

                <p><span class="highlight">Date:</span> 28 May 2026</p>

                <p><span class="highlight">Location:</span> Chennai</p>
            </div>

            <div class="info-card">
                <h4>Shipment Details</h4>

                <p><span class="highlight">Shipment:</span> Winter Wear Export</p>

                <p><span class="highlight">Weight:</span> 240KG</p>

                <p><span class="highlight">Destination:</span> Mumbai Port</p>

                <p><span class="highlight">Export Type:</span> International</p>
            </div>

        </div>

        <div class="amount-box">

            <div class="amount-row">
                <span>Shipment Amount</span>
                <span>₹12,000</span>
            </div>

            <div class="amount-row">
                <span>GST (18%)</span>
                <span>₹2,160</span>
            </div>

            <div class="amount-row">
                <span>Platform Fee</span>
                <span>₹840</span>
            </div>

            <div class="amount-row total">
                <span>Total Paid</span>
                <span>₹15,000</span>
            </div>

        </div>

        <div class="button-group">

            <button class="btn">
                Download Invoice
            </button>

            <button class="btn">
                Print Invoice
            </button>

        </div>

        <div class="back">
            <a href="vendor_payments.php">
                ← Back To Payments
            </a>
        </div>

    </div>

</div>

</body>
</html>