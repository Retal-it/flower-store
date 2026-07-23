<?php 
include 'connection.php'; 
include 'includes/header.php'; 

if(isset($_POST['save_seedling'])) {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $category_id = 1; 

    $image = $_FILES['image']['name'];
    $target = "images/".basename($image);

    $sql = "INSERT INTO products (name, description, price, image, category_id) 
            VALUES ('$name', '$desc', '$price', '$image', '$category_id')";
    
    if (mysqli_query($conn, $sql)) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "<script>alert('تم إضافة الشتلة بنجاح!');</script>";
        }
    }
}
?>

<div class="container" style="margin-top:50px; margin-bottom:50px;">
    <h2>Add New Seeding</h2>
    <form action="add_seedling.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Seeding Name : </label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description : </label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Price : </label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Seeding Image :</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <button type="submit" name="save_seedling" class="btn btn-success">Add Seeding</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>