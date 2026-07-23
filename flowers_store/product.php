<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "flowers_store";

$conn = new mysqli($host, $user, $pass, $db);

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            text-align: center;
            padding: 20px;
        }

        .product-detail {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            width: 80%;
            max-width: 800px;
            margin: 0 auto;
        }

        .product-detail img {
            width: 100%;
            height: auto;
            max-width: 500px;
            object-fit: contain;
            border-radius: 10px;
        }

        .product-detail h3 {
            font-size: 28px;
            margin-top: 20px;
        }

        .product-detail p {
            font-size: 18px;
        }

        .back-btn {
            background: #edc3d3;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }

        .back-btn:hover {
            background: #998395;
        }
    </style>
</head>
<body>

<div class="product-detail">
    <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
    <h3><?php echo $product['name']; ?></h3>
    <p><?php echo $product['description']; ?></p>
    <p>Price: <?php echo $product['price']; ?> SAR</p>
    <a href="index.php" class="back-btn">Back to Store</a>
</div>

</body>
</html>

<?php $conn->close(); ?>