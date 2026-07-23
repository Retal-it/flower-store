<?php
include 'connection.php'; 

$search = $_GET['search'] ?? '';

$sql = "SELECT * FROM products WHERE 1";

if(!empty($search)){
    $sql .= " AND name LIKE '%$search%'";
}

$res = mysqli_query($conn, $sql);


if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   
   $delete_query = mysqli_query($conn, "DELETE FROM products WHERE id = $delete_id");
   if($delete_query){
      header('location:shop.php'); // إعادة تحميل الصفحة بعد الحذف
   } else {
      echo "Error: Could not delete product.";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Our Shop - Flower Store</title>
   <style>
      body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f4; padding: 20px; }
      .container { max-width: 1200px; margin: auto; }
      .product-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
      .product-card { background: #fff; padding: 15px; border-radius: 10px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
      .product-card img { max-width: 100%; height: 200px; border-radius: 8px; object-fit: cover; }
      .product-card h3 { color: #2c3e50; margin: 10px 0; }
      .price { color: #353434; font-weight: bold; font-size: 1.2rem; margin-bottom: 10px; }
      .btn { display: inline-block; background: #edc3d3; color: #fff; padding: 8px 15px; text-decoration: none; border-radius: 5px; margin: 5px; }
      .delete-btn { background: #e74c3c; } /* لون أحمر للحذف */
      .delete-btn:hover { background: #c0392b; }
   </style>
</head>
<body>

<div class="container">
   <h1 style="text-align: center; color: #2c3e50;">Manage Store Products</h1>
   
   <div style="text-align: center; margin-bottom: 30px;">
      <a href="add_seed.php" class="btn">+ Add New Seed</a>
   </div>

   <div class="product-grid">
      <?php
    $select_products = mysqli_query($conn, "SELECT * FROM products");

if(mysqli_num_rows($select_products) > 0){
while($fetch_product = mysqli_fetch_assoc($select_products)){

      ?>
    <div class="product-card" style="background: #fff; border-radius: 20px; padding: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); border: 1px solid #f9f9f9;">
    
    <img src="images/<?php echo $fetch_product['image']; ?>" alt="" style="width: 100%; height: 180px; object-fit: contain; border-radius: 15px; margin-bottom: 15px;">

    <h3 style="color: #555; font-size: 1.2rem; margin-bottom: 5px;"><?php echo $fetch_product['name']; ?></h3>
    <div class="price" style="color: #414241; font-weight: bold; font-size: 1.1rem; margin-bottom: 15px;">
        <?php echo $fetch_product['price']; ?> SAR
    </div>

    <div style="display: flex; flex-direction: column; gap: 10px;">
        
        <a href="update_product.php?update=<?php echo $fetch_product['id']; ?>" class="btn" style="background-color: #f8c0c8; color: white; border: none; padding: 10px; border-radius: 25px; text-decoration: none; font-weight: bold; transition: 0.3s;">
            تعديل
        </a>
        
        <a href="shop.php?delete=<?php echo $fetch_product['id']; ?>" 
           class="btn delete-btn" 
           style="background-color: #eee; color: #777; border: none; padding: 10px; border-radius: 25px; text-decoration: none; font-size: 0.9rem;"
           onclick="return confirm('هل تريد حذف هذا المنتج؟');">
            حذف
        </a>
           
    </div>
    </div>
      <?php
            }
         } else {
            echo "<p style='text-align:center;'>No products found.</p>";
         }
      ?>
   </div>
</div>

</body>
</html>