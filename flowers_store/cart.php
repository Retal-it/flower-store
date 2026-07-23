<?php
session_start();
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($_GET['action'] == 'increase') {
        $_SESSION['cart'][$id]['quantity'] += 1;
    } elseif ($_GET['action'] == 'decrease' && $_SESSION['cart'][$id]['quantity'] > 1) {
        $_SESSION['cart'][$id]['quantity'] -= 1;
    }
    header("Location: cart.php");
    exit();
}

if(isset($_GET['clear'])){
    unset($_SESSION['cart']);
    header("Location: cart.php");
    exit();
}
include 'connection.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
    $product = mysqli_fetch_assoc($query);

    if($product){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }
        $alreadyAdded = false;

        foreach($_SESSION['cart'] as $item){
            if($item['id'] == $product['id']){
                $alreadyAdded = true;
                break;
            }
        }

        if (!$alreadyAdded) {
            $product['quantity'] = 1; 
            $_SESSION['cart'][$product['id']] = $product;
        }
    }

    header("Location: cart.php");
    exit();
}

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = [];
}

$total = 0;
foreach ($cart as $product) {
    $quantity = $product['quantity'] ?? 1;
    $total += $product['price'] * $quantity;
}

if (isset($_POST['remove'])) {
    $productId = $_POST['remove'];

    unset($_SESSION['cart'][$productId]);

    header("Location: cart.php");
    exit();
}

?>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


<div class="top-navbar">


  <div class="nav-left">
    <a href="login.php">
        <i class="fa-regular fa-user"></i>
</a>
<details class="cart-menu">
        <summary>☰</summary>
        <div class="cart-menu-links">
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
        </div>
    </details>


</div>

    <div class="nav-center">
        <img src="images/bloomore-logo.jpg" alt="logo">
    </div>

<div class="nav-right" style="display: flex !important; align-items: center !important; justify-content: flex-end !important; gap: 20px !important;">

    <i class="fa-solid fa-magnifying-glass search-btn" style="cursor: pointer !important; font-size: 22px !important; color: #555555 !important; display: inline-flex !important; align-items: center !important; margin: 0 !important;"></i>

    <a href="cart.php" style="display: inline-flex !important; align-items: center !important; color: #555555 !important; text-decoration: none !important; font-size: 22px !important; position: relative !important; margin: 0 !important;">
        <i class="fa-solid fa-cart-shopping"></i>
        <?php if(count($cart) > 0): ?>
            <span class="cart-count" style="position: absolute !important; top: -7px !important; right: -9px !important; background: #555555; color: #fff; font-size: 11px; font-weight: bold; border-radius: 50%; padding: 2px 5px; line-height: 1;">
                <?php echo count($cart); ?>
            </span>
        <?php endif; ?>
    </a>

</div>


</div>


<?php if(count($cart) > 0): ?>


<div class="cart-page">


<div class="cart-container">
<div class="cart-container" style="padding: 40px 5%; background-color: #fffafb;">
    <h2 style="text-align: center; color: #555; margin-bottom: 30px;">Selected Products</h2>
    <div class="cart-table-wrapper">
    <table style="width: 100%; border-collapse: collapse; background: white;">
        <thead style="background-color: #edc3d3; color: #000;">
            <tr>
                <th style="padding: 20px;">Product</th>
                <th style="padding: 20px;">Price</th>
                <th style="padding: 20px;">quantity</th>
                <th style="padding: 20px;">Total</th>
                <th style="padding: 20px;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cart as $id => $product): ?>
            <tr style="border-bottom: 1px solid #ffeef0; text-align: center;">
                <td style="padding: 15px;">
                    <img src="images/<?php echo $product['image']; ?>" width="60" style="border-radius: 10px; vertical-align: middle; margin-right: 10px;">
                    <?php echo $product['name']; ?>
                </td>
                <td style="padding: 15px;"><?php echo $product['price']; ?> SAR</td>
                <td style="padding: 15px;">
                    <div style="display: flex; align-items: center; justify-content: center; gap: 12px;">
                        <a href="cart.php?action=decrease&id=<?php echo $id; ?>" style="background: #edc3d3; color: white; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none; font-weight: bold;">-</a>
                        <?php $quantity = $product['quantity'] ?? 1; ?>
                        <span style="font-size: 18px; font-weight: bold; min-width: 20px;"><?php echo $quantity ; ?></span>
                        
                        <a href="cart.php?action=increase&id=<?php echo $id; ?>" style="background: #edc3d3; color: white; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none; font-weight: bold;">+</a>
                    </div>
                </td>
                <td style="padding: 15px; font-weight: bold; color: #000;">
                    <?php echo ($product['price'] * $quantity); ?> SAR
                </td>
                <td style="padding: 15px;">
                    <form method="POST" action="cart.php">
                        <input type="hidden" name="remove" value="<?php echo $id; ?>">
                        <button type="submit" style="background: none; border: none; color: #000; cursor: pointer; text-decoration: underline;">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            </div>

 <div style="text-align: center; margin-top: 30px; display: flex; flex-wrap: wrap; justify-content: center; gap: 15px; align-items: center;">
    <a href="index.php" 
    style="
    background: #edc3d3;
    color: #000;
    padding: 14px 30px;
    border-radius: 12px;
    text-decoration: none;
    font-size: 18px;
    font-weight: bold;
    transition: 0.3s;
    box-shadow: 0 5px 12px rgba(237, 195, 211, 0.4);
    ">
    Continue Shopping
    </a>

    <a href="payment.php" 
    style="
    background: #edc3d3;
    color: #000;
    padding: 14px 30px;
    border-radius: 12px;
    text-decoration: none;
    font-size: 18px;
    font-weight: bold;
    transition: 0.3s;
    box-shadow: 0 5px 12px rgba(237, 195, 211, 0.4);
    ">
    Proceed to Payment
    </a>
 </div>



</div>

<?php else: ?>

<div class="empty-cart">
    <img src="images/empty-cart.jpg" class="empty-cart-img">

    <h2>Your cart is empty </h2>

  <a href="index.php" class="shop-btn" style="background-color: #edc3d3; color: white; border: none; padding: 12px 25px; border-radius: 25px; text-decoration: none; font-weight: bold; display: inline-block;">
    Back to Store
  </a>


</div>

</div>

<?php endif; ?>


<script>
function toggleMenu() {
    var menu = document.getElementById("navLinks");

    if (menu.style.display === "block") {
        menu.style.display = "none";
    } else {
        menu.style.display = "block";
    }
}
</script>

<div class="search-overlay">
    <div class="search-box">
        
        <div class="close-search">
            <i class="fa-solid fa-xmark" style="color: #555555 !important;"></i>
        </div>
        <form action="search.php" method="GET" class="overlay-search-form" autocomplete="off">

            <input type="text" name="search" id="search-input" placeholder="What are you looking for?" onkeyup ="filterSuggestions(this.value)">
             <div id="live-search-results"></div>
            <button type="submit">
                <i class="fa-solid fa-magnifying-glass" style="color: #555555 !important;"></i>
            </button>
        </form>

    </div>
</div>

   
<script>
function showLiveResults(str) {
    let resBox = document.getElementById("live-search-results");
    if (str.trim().length == 0) {
        resBox.innerHTML = "";
        return;
    }
    
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            resBox.innerHTML = this.responseText;
        }
    };
   
    xmlhttp.open("GET", "search.php?search=" + encodeURIComponent(str) + "&ajax=1", true);
    xmlhttp.send();
}
</script>



<style>
#live-search-results a {
    display: block !important;
    padding: 10px !important;
    text-align: center;
    text-decoration: none;
    color: #333;
    border-bottom: 1px solid #eee;
}
</style>

<script>
document.querySelector('.search-btn').onclick = function(){
    document.querySelector('.search-overlay').classList.add('active');
};

document.querySelector('.close-search').onclick = function(){
    document.querySelector('.search-overlay').classList.remove('active');
};
</script>



