<?php
//retrieving the 4 most recently added products from the merch_inventory database

$stmt = $pdo->prepare('SELECT * FROM merch ORDER BY date_added DESC LIMIT 3');
$stmt->execute();
$recently_added_products = $stmt->fetchALL(PDO::FETCH_ASSOC);
?>

<?=template_header('Home')?>

<div class="featured">
    <h2>Alliance Gaming Merch</h2>
    <p>Represent Your Gaming Community</p>
</div>
<div class="recentlyadded content-wrapper">
    <h2>Featured Prodcuts</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['item_id']?>" class="product">
            <img src="imgs/<?=$product['item_img']?>" width="200" height="200" alt="<?=$product['item_name']?>">
            <span class="name"><?=$product['item_name']?></span>
            <span class="price">
                &dollar;<?=$product['item_price']?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>