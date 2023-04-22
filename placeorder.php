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

<?=template_header('Cart')?>

<div class="cart content-wrapper">
    <h1>Shopping Cart</h1>
    <form action="index.php?page=cart" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="10" style="text-align:center; font-size: 22px; font-family: Garamond; font-variant: small-caps; padding-top: 200px; padding-bottom: 100px; ">YOUR ORDER HAS BEEN PLACED<br><br><br><br> thank you for ordering with us! we'll contact you via email with your order details.</td>
                </tr>
               
            </tbody>
        </table>
        
        
    </form>
</div>

<?=template_footer()?>