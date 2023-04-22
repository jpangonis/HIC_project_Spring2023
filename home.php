<?php
//retrieving the 4 most recently added products from the merch_inventory database

$stmt = $pdo->prepare('SELECT * FROM merch ORDER BY date_added DESC LIMIT 3');
$stmt->execute();
$recently_added_products = $stmt->fetchALL(PDO::FETCH_ASSOC);
?>

<?=template_header('Home')?>
<div id="title"> Alliance Gaming Merch </div>

<div class="recentlyadded content-wrapper">

    <div class="label">featured products</div>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['itemID']?>" class="product">
            <img src="imgs/<?=$product['itemImg']?>" width="300" height="300" alt="<?=$product['itemName']?>">
            <span class="name"><?=$product['itemName']?></span>
            <span class="price">
                &dollar;<?=$product['itemPrice']?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>