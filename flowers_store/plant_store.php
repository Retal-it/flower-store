
<?php 
include ('includes/menu.php');
include ('includes/header.php');
?>

<div class="product-container">
    <div class="product-card">
        <img src="assets/Gardenia_jasminoides.jpg" alt="Plant">
        <h3>Gardenia jasminoides</h3>
        <p class="price">45 SAR</p>
        <a href ="cart.php?id=1" class ="add-btn">
            Add to Cart 
</a>
    </div>

    <div class="product-card">
        <img src="assets/Rosa_miniature.jpg" alt="Plant"> <h3>Rosa miniature</h3>
        <p class="price">25 SAR </p>
         <a href ="cart.php?id=2" class ="add-btn">
            Add to Cart 
</a>

    </div>
</div>


<?php 
include ('includes/footer.php');
?>