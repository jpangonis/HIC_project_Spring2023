<?php
// Check if id is in URL
if (isset($_GET['id'])) {
    // Prepare statement prevents injection
    $stmt = $pdo->prepare('SELECT * FROM merch WHERE itemID = ?');
    $stmt->execute([$_GET['id']]);
    // retrieve item
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    //error handling
    if (!$product) {
        exit('Product does not exist!');
    }
} else {
    exit('Product does not exist!');
}
?>

<?=template_header('Product')?>

<div class="product content-wrapper">
    <img src="imgs/<?=$product['itemImg']?>" width="500" height="500" alt="<?=$product['itemName']?>">
    <div>
        <h1 class="name"><?=$product['itemName']?></h1>
        <span class="price">
            &dollar;<?=$product['itemPrice']?>
        </span>
        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['itemQuantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['itemID']?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div class="description">
            <?=$product['itemDesc']?>
        </div>
    </div>
</div>

<?=template_footer()?>