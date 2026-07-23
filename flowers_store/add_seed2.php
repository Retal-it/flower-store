<?php
include 'connection.php'; 
include 'includes/header.php'; 

if(isset($_POST['add'])) {
    $name = $_POST['seed_name']; 
    $price = $_POST['price']; 
    $category_id = 2; 
    $image = $_FILES['seed_image']['name']; 
    $target = "uploaded_img/".basename($image); 

    $sql = "INSERT INTO products (name, price, image, category_id) VALUES ('$name', '$price', '$image', '$category_id')";

    if (mysqli_query($conn, $sql)) {
        if (move_uploaded_file($_FILES['seed_image']['tmp_name'], $target)) {
            echo "<script>alert('تم إضافة البذور بنجاح!');</script>";
        }
    }
}
?>

<div class="container" style="margin-top:50px; margin-bottom:50px;">
    <h2>Add New Seeds</h2>
    <form action="add_seed.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Seed Name : </label>
            <input type="text" name="seed_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Price : </label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Seed Image : </label>
            <input type="file" name="seed_image" class="form-control" required>
        </div>
        <button type="submit" name="add" class="btn btn-success">Save Seed</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>