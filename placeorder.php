<?php
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
if ($products_in_cart) {
    foreach ($products_in_cart as $k => $v) {
        $stmt = $pdo->prepare('UPDATE merch SET itemQuantity = itemQuantity - ? WHERE itemID = ?');
        $stmt->execute([ $v, $k ]);
    }
    // remove items from cart as no longer needed
    unset($_SESSION['cart']);
} else {
    exit('There are no items in cart!');
}
?>

<?=template_header('Place Order')?>

<div class="placeorder content-wrapper">
    <h1>Your Order Has Been Placed</h1>
    <p>Thank you for ordering with us! We'll contact you by email with your order details.</p>
</div>

<?=template_footer()?>