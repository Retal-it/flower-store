<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "flowers_store";


$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $product_result = $conn->query($sql);
    $product = $product_result->fetch_assoc();

    $cart_item = [
        'id' => $product['id'],
        'name' => $product['name'],
        'price' => $product['price'],
        'image' => $product['image'],
        'quantity' => 1 

    ];

    // إضافة المنتج إلى السلة في الجلسة
    $_SESSION['cart'][$product_id] = $cart_item;
}
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/footer.php'; ?>
<?php include 'includes/menu.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
   

<div class="hero-banner">
    <img src="images/banner.jpg" alt="Banner">
</div>
    <link rel="stylesheet" href="assets/css/style.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bloomora </title>
</head>
<body>



<div class="container">

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "
        <div class='card'>
            <img src='images/".$row['image']."' alt='".$row['name']."'>
            <h3>".$row['name']."</h3>
            <p class='description'>".substr($row['description'], 0, 100)."...</p>
            <p class='price'>".$row['price']." SAR</p>
            <form action='' method='POST'>
                <input type='hidden' name='product_id' value='".$row['id']."'>
                <div class='card-actions'>
                    <button type='submit' name='add_to_cart' class='add-btn'>Add to Cart</button>
                    <a href='product.php?id=".$row['id']."' class='details-btn'>Details</a>
                </div>
            </form>
        </div>
        ";
    }
} else {
    echo "<p>No products found</p>";
}
?>

</div>

</body>
</html>

<?php $conn->close(); ?>