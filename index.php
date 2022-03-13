<?php
include 'config2.php';
$query = "SELECT * FROM items";
$result = mysqli_query($db,$query);
while ($row=mysqli_fetch_array($result)){
    ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>shop</title>
</head>
<body>
<main>
    <div class="basket">
        <div class="basket-labels">
            <ul>
                <li class="item item-heading">Item</li>
                <li class="price">Price</li>
                <li class="subtotal">shipping</li>
            </ul>
        </div>
        <div class="basket-product">
            <div class="item">
                <div class="product-image">

                </div>
                <div class="product-details">
                    <h1><strong>Name : </strong> <?php echo $row['name']?></h1>
                    <p><strong>Description :</strong><?php echo $row['description']?></p>
                    <p><strong>Available :</strong><?php echo $row['available']?></p>
                </div>
            </div>
            <div class="price"><?php echo $row['price']?></div>

            <div ><?php echo $row['shipping']?></div>

        </div>
        <a href="details.php?id=<?php echo $row['ItemID']?>">Details product</a>
    </div>
</main>
</body>
</html>

<?php
}
?>
