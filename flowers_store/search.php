<?php
require("connection.php");

$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? '';

$sql = "
SELECT p.*, c.name AS category_name
FROM products p
LEFT JOIN categories c ON p.category_id = c.id
WHERE 1
";

if(!empty($search)){
    $sql .= " AND p.name LIKE '%$search%'";
}

if(!empty($category)){
    $sql .= " AND p.category_id = '$category'";
}

$res = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Search Flowers</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #fff7f8;
    margin: 0;
    padding: 30px;
}

h2 {
    text-align: center;
    color: #333;
}

form {
    text-align: center;
    margin-bottom: 30px;
}

input, select, button {
    padding: 8px;
    margin: 5px;
}

.product {
    background: white;
    width: 250px;
    display: inline-block;
    margin: 15px;
    padding: 15px;
    text-align: center;
    border-radius: 12px;
    box-shadow: 0 0 10px #ddd;
    vertical-align: top;
}

.product img {
    width: 150px;
    height: 150px;
    object-fit: cover;
}
.cart-btn{
    display:inline-block;
    margin-top:10px;
    padding:10px 20px;
    background:#edc3d3;
    color:#5c3b46;
    text-decoration:none;
    border-radius:8px;
}

.cart-btn:hover{
    background: #dba7db;
}
   
</style>
</head>
<body>

<h2>Search results for "<?php echo htmlspecialchars($search); ?>"</h2>

<hr>

<?php
if($res && mysqli_num_rows($res) > 0){
    while($r = mysqli_fetch_assoc($res)){
        echo "<div class='product'>";
        echo "<img src='images/".$r['image']."' width='120'>";
        echo "<h3>".$r['name']."</h3>";
        echo "<p>".$r['description']."</p>";
        echo "<p>Price: ".$r['price']." SAR</p>";
        echo "<p>Type: ".$r['category_name']."</p>";
        echo "<a href='cart.php?id=".$r['id']."' class='cart-btn'>Add to Cart</a>";
        echo "<hr>";
        echo "</div>";
    }
}else{
    echo "<p>No results found</p>";
}
?>

</body>
</html>