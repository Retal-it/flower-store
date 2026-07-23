<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
$total = 0;
foreach ($cart as $product) {
    $quantity = $product['quantity'] ?? 1;
    $total += $product['price'] * $quantity;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloom Flower Shop - Payment</title>

    <style>
        body{
            margin:0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #fff9fb;
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
            padding: 20px;
            box-sizing: border-box;
        }

        .payment-box{
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 10px 25px rgba(212, 106, 146, 0.2);
            padding: 25px;
            border: 2px solid #f7c6d9;
        }

        .title{
            text-align:center;
            font-size:22px;
            color:#000;
            margin-bottom:20px;
            font-weight:bold;
        }

        label{
            font-size:13px;
            color:#444;
            margin-top:10px;
            display:block;
            font-weight: 500;
        }

        input, select{
            width:100%;
            padding:10px;
            margin-top:5px;
            border-radius:10px;
            border:1px solid #f2b6cc;
            outline:none;
            box-sizing: border-box;
            font-size: 14px;
        }

        input:focus, select:focus{
            border-color:#d46a92;
            box-shadow: 0 0 5px rgba(212, 106, 146, 0.3);
        }

        .row{
            display:flex;
            gap:10px;
        }

        .row > div{
            flex: 1;
        }

        .btn{
            width:100%;
            margin-top:20px;
            padding:12px;
            background:#edc3d3;
            color:#000;
            border:none;
            border-radius:12px;
            font-size:15px;
            cursor:pointer;
            transition: all 0.3s ease;
            font-weight: bold;
        }

        .btn:hover{
            background:#d8b1c1;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(237, 195, 211, 0.4);
        }

        .note{
            font-size:11px;
            text-align:center;
            margin-top:15px;
            color:#888;
        }

        .order-summary{
            background: #fff5f8;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #f7c6d9;
        }

        .order-summary h3{
            margin: 0 0 10px 0;
            color: #000;
            font-size: 14px;
        }

        .order-empty{
            text-align:center;
            font-size:13px;
            color:#888;
            padding:15px;
            background:#fff;
            border-radius:10px;
            border:1px dashed #f2b6cc;
        }

        .order-list{
            list-style: none;
            margin: 0;
            padding: 0;
            color: #555;
            font-size: 14px;
        }

        .order-list li{
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #f7c6d9;
        }

        .order-total{
            margin-top: 12px;
            text-align: right;
            font-weight: bold;
            color: #000;
        }

        .card-fields{
            display: none;
        }

        .card-fields.show{
            display: block;
        }

        .secure-badge{
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            margin-top: 10px;
            color: #28a745;
            font-size: 12px;
        }

        @media (max-width: 520px) {
            body {
                padding: 12px;
            }

            .payment-box {
                padding: 20px;
            }

            .row {
                flex-direction: column;
            }

            .row > div {
                width: 100%;
            }

            label,
            input,
            select,
            .btn {
                font-size: 14px;
            }
        }

    </style>
</head>

<body>

<div class="payment-box">

    <div class="title">Checkout Payment</div>

    <div class="order-summary">
        <h3>Order Summary</h3>
        <?php if (count($cart) > 0): ?>
            <ul class="order-list">
                <?php foreach ($cart as $product): ?>
                    <?php $quantity = $product['quantity'] ?? 1; ?>
                    <li>
                        <span><?php echo htmlspecialchars($product['name']); ?> × <?php echo $quantity; ?></span>
                        <span><?php echo ($product['price'] * $quantity); ?> SAR</span>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="order-total">Total: <?php echo $total; ?> SAR</div>
        <?php else: ?>
            <div class="order-empty">
                 Your cart is currently empty
            </div>
        <?php endif; ?>
    </div>

    <form action="success.php" method="POST">

        <label>Full Name</label>
        <input type="text" name="fullname" required>

        <label>Phone Number</label>
        <input type="tel" name="phone" required placeholder="05xxxxxxxx">

        <label>Address</label>
        <input type="text" name="address" required>

        <label>Payment Method</label>
        <select name="payment_method" id="paymentMethod" required>
            <option value="">Select payment method</option>
            <option value="card">Credit Card</option>
            <option value="mada">Mada</option>
            <option value="cash">Cash on Delivery</option>
        </select>

        <div class="card-fields" id="cardFields">
            <label>Card Number</label>
            <input type="text" id="cardNumber" name="card_number" maxlength="19" inputmode="numeric" pattern="[0-9 ]*" placeholder="1234 5678 9012 3456" autocomplete="cc-number">

            <div class="row">
                <div>
                    <label>Expiry Date</label>
                    <input type="text" id="expiry" name="expiry" maxlength="5" inputmode="numeric" placeholder="MM/YY" autocomplete="cc-exp">
                </div>

                <div>
                    <label>CVV</label>
                    <input type="password" id="cvv" name="cvv" maxlength="4" inputmode="numeric" placeholder="123" autocomplete="cc-csc">
                </div>
            </div>
        </div>

        <?php if (count($cart) > 0): ?>
            <button class="btn" type="submit">Confirm Payment</button>
        <?php else: ?>
            <button class="btn" type="button" disabled style="opacity: 0.6; cursor: not-allowed;">Confirm Payment</button>
        <?php endif; ?>

        <div class="secure-badge">
            🔒 Secure & Encrypted Payment
        </div>

        <div class="note">Bloom Flower Shop - Delivering happiness to your door</div>

    </form>

</div>

<script>
    const paymentMethod = document.getElementById('paymentMethod');
    const cardFields = document.getElementById('cardFields');
    const cardNumber = document.getElementById('cardNumber');
    const expiry = document.getElementById('expiry');
    const cvv = document.getElementById('cvv');

    function updateCardRequirements(showCard) {
        cardNumber.required = showCard;
        expiry.required = showCard;
        cvv.required = showCard;
    }

    paymentMethod.addEventListener('change', function() {
        if (this.value === 'card' || this.value === 'mada') {
            cardFields.classList.add('show');
            updateCardRequirements(true);
        } else {
            cardFields.classList.remove('show');
            updateCardRequirements(false);
        }
    });

    cardNumber.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\s/g, '').replace(/\D/g, '');
        e.target.value = value.match(/.{1,4}/g)?.join(' ') || value;
    });

    expiry.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length >= 3) {
            value = value.slice(0, 2) + '/' + value.slice(2, 4);
        }
        e.target.value = value;
    });

    updateCardRequirements(false);
</script>

</body>
</html>


