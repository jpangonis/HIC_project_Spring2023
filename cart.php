<?php
// checking form data if users added product to cart
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // setting $_POST variables and casting to integers
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    // prepared SQL statement to check if product is available in database
    $stmt = $pdo->prepare('SELECT * FROM merch WHERE itemID = ?');
    $stmt->execute([$_POST['product_id']]);
    // fetch from database and store as array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // make sure product exits in the array (array is not empty)
    if ($product && $quantity > 0) {
        // if exists, create and update $_SESSION variable for the shopping cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // product exists in cart, update the quanity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                // product is not in cart, add it
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            // there are no products in cart, add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    // prevent form resubmission...
    header('location: index.php?page=cart');
    exit;
}

// remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}

// update product quantities in cart if the user clicks the update
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // loop through the post data to update quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;
}

// send the user to the place order page if they click the Place Order button and cart is not empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: index.php?page=placeorder');
    exit;
}

// check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// if cart contains products
if ($products_in_cart) {
    // products are in cart, so select from database
    // products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM merch WHERE itemID IN (' . $array_to_question_marks . ')');
    // only need the array keys which are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // fetch the products from the database and return the result as an array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // calculate the subtotal
    foreach ($products as $product) {
        $subtotal += (float)$product['itemPrice'] * (int)$products_in_cart[$product['itemID']];
    }
}

?>


<?=template_header('Cart')?>

<div class="cart content-wrapper">
    <h1>Shopping Cart</h1>
    <form action="index.php?page=cart" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="img">
                        <a href="index.php?page=product&id=<?=$product['itemID']?>">
                            <img src="imgs/<?=$product['itemImg']?>" width="50" height="50" alt="<?=$product['itemName']?>">
                        </a>
                    </td>
                    <td>
                        <a href="index.php?page=product&id=<?=$product['itemID']?>"><?=$product['itemName']?></a>
                        <br>
                        <a href="index.php?page=cart&remove=<?=$product['itemID']?>" class="remove">Remove</a>
                    </td>
                    <td class="price">&dollar;<?=$product['itemPrice']?></td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['itemID']?>" value="<?=$products_in_cart[$product['itemID']]?>" min="1" max="<?=$product['itemQuantity']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price">&dollar;<?=$product['itemPrice'] * $products_in_cart[$product['itemID']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">&dollar;<?=$subtotal?></span>
        </div>
        <div class="buttons">
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Place Order" name="placeorder">
        </div>
    </form>
</div>

<?=template_footer()?>