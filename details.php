<?php
include 'config.php';
include 'func.php';
$itemid=isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']): 0 ;
$stmt = $con->prepare("SELECT * From items  WHERE ItemID = '$itemid'");
$stmt->execute();
$row = $stmt->fetch();
if($stmt->rowCount() > 0){
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
    </div>
</main>
</body>
</html>
<?php
}
?>
<h1 style="margin-left: 400px">comments  :</h1>
<?php
include 'config2.php';
$comment =$_GET['id'];
$query ="SELECT * from comment WHERE post_id ='$comment' ORDER BY id asc ";
$result =mysqli_query($db,$query);
$com=
$x=mysqli_num_rows($result);
if ($x==0){
    echo '<br>
<div style="margin-left: 380px">there is not any comment here</div>';
}
while($res=mysqli_fetch_array($result)){
    ?>
    <span style="margin-left: 300px;color: crimson;font-size: large"><?php echo $res['id'] ?> ) </span><span style="width: fit-content;height: fit-content;border-radius: 20px;color: crimson;font-size: large"><?php echo $res['body'] ?></span><br>
<?php
}
?>
<?php
include 'config2.php';
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_GET['id'])){
    $comment=$_GET['id'];
    $body=$_POST['body'];
    mysqli_query($db,"INSERT INTO comment (body,post_id) VALUES ('$body','$comment')");
    echo'<div style="text-align: center;font-size: large;color: #aaaaaa ;background-color: chocolate">Thank you your comment submitted now get back</div>';
}
?>
<br>
<br>
<div style="margin-left: 500px">
    <form method="POST" action="details.php?id=<?php echo $_GET['id']?>">
        <label>Your comment type here </label>
        <textarea name="body"  placeholder="your comment"></textarea>
        <br>
        <br>
        <button>Send your feedback</button>
    </form>
</div>
<br>
<a style="margin-left: 500px" href="index.php">Get back</a>
