<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: payment.php');
    exit;
}

$fullname = trim($_POST['fullname'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$address = trim($_POST['address'] ?? '');
$payment_method = trim($_POST['payment_method'] ?? '');

$cart = $_SESSION['cart'] ?? [];
$total = 0;
foreach ($cart as $product) {
    $quantity = $product['quantity'] ?? 1;
    $total += $product['price'] * $quantity;
}

// مسح السلة بعد إتمام الطلب
unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #fff8fb;
            font-family: Arial, sans-serif;
        }

        .box {
            background: white;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            color: #d46a92;
            margin-bottom: 15px;
        }

        p {
            color: #555;
            line-height: 1.6;
            margin: 10px 0;
        }

        .details {
            background: #fff5f8;
            border-radius: 14px;
            padding: 18px;
            margin-top: 18px;
            text-align: left;
            border: 1px solid #f7c6d9;
        }

        .details div {
            margin-bottom: 8px;
            font-size: 14px;
            color: #444;
        }

        a {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 25px;
            background: #edc3d3;
            color: white;
            text-decoration: none;
            border-radius: 10px;
        }

        a:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

<div class="box">
    <h1>Payment Successful</h1>
    <p>Thank you, <strong><?php echo htmlspecialchars($fullname); ?></strong>. Your order has been received successfully.</p>
    <p>Your order will be prepared and shipped to the following address:</p>

    <div class="details">
        <div><strong>Name:</strong> <?php echo htmlspecialchars($fullname); ?></div>
        <div><strong>Phone:</strong> <?php echo htmlspecialchars($phone); ?></div>
        <div><strong>Address:</strong> <?php echo htmlspecialchars($address); ?></div>
        <div><strong>Payment Method:</strong> <?php echo htmlspecialchars(ucfirst($payment_method)); ?></div>
        <div><strong>Total Amount:</strong> <?php echo $total; ?> SAR</div>
    </div>

    <p>Thank you for shopping with Bloomora 🌸</p>
    <a href="index.php">Back to Home</a>
</div>

</body>
</html>
