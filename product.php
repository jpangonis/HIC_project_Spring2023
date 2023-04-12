<?php
// Check if id is in URL
if (isset($_GET['id'])) {
    // Prepare statement prevents injection
    $stmt = $pdo->prepare('SELECT * FROM merch WHERE item_id = ?');
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
    <img src="imgs/<?=$product['item_img']?>" width="500" height="500" alt="<?=$product['item_name']?>">
    <div>
        <h1 class="name"><?=$product['item_name']?></h1>
        <span class="price">
            &dollar;<?=$product['item_price']?>
        </span>
        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['item_quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['item_id']?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div class="description">
            <?=$product['item_descr']?>
        </div>
    </div>
</div>

<?=template_footer()?>