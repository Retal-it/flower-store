<?php
include 'connection.php'; 

if(isset($_POST['add'])){
    $name = mysqli_real_escape_string($conn, $_POST['seed_name']);
    $price = $_POST['price']; 
    $image = $_FILES['seed_image']['name'];
    $image_tmp_name = $_FILES['seed_image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;

    $insert_query = mysqli_query($conn, "INSERT INTO products (name, price, image, category_id) 
                                         VALUES ('$name', '$price', '$image', 2)");

    if($insert_query){
        move_uploaded_file($image_tmp_name, $image_folder);
        echo "<div style='background-color: #d4edda; color: #3f3f3f; padding: 15px; border-radius: 5px; text-align: center; margin: 10px;'>
                <strong>Success!</strong> New seed added successfully.
              </div>";
    } else {
        echo "<div style='background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; text-align: center; margin: 10px;'>
                <strong>Error:</strong> " . mysqli_error($conn) . "
              </div>";
    }
}
?>


        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Seed</title>
    <style>
   /* 1. Hide the default file input button */
   input[type="file"] {
       display: none;
   }

   /* 2. Style the custom upload label to match the form design */
   .custom-file-upload {
       display: block;
       width: 100%; 
       padding: 12px;
       margin: 10px 0;
       background-color: #5d5e5d; 
       color: white;
       text-align: center;
       border-radius: 5px;
       cursor: pointer;
       font-size: 16px;
       font-weight: bold;
       transition: background 0.3s ease;
       border: 1px solid #4c4e4d;
   }

   /* 3. Hover effect for the upload button */
   .custom-file-upload:hover {
       background-color: #4c4c4c;
       box-shadow: 0 4px 8px rgba(0,0,0,0.1);
   }

   /* Additional styling for form input fields */
   .box {
       width: 100%;
       padding: 12px;
       margin: 10px 0;
       border: 1px solid #ccc;
       border-radius: 5px;
   }
</style>
</head>
<body>
    <h2>Add New Seed to Store</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Seed Name:</label><br>
        <input type="text" name="seed_name" required><br><br>

        <label>Plant Type:</label><br>
        <input type="text" name="plant_type"><br><br>

        <label>Price:</label><br>
        <input type="number" name="price"><br><br>
        <div class="input-group">
   <label for="seed_image" class="custom-file-upload">
      <i class="fas fa-cloud-upload-alt"></i> Choose Image
   <label for="seed_image" class="custom-file-upload">
    Choose Seed Image
</label>

<input id="seed_image" type="file" name="seed_image" accept="image/*" required /> required />
</div>

        <button type="submit" name="add" class="btn">Save Seed</button>
    </form>
   
          
</body>
</html>