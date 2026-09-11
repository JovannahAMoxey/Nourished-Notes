<?php
declare(strict_types=1);

session_start();

if (!isset($_SESSION['customer_id'])) {
    $_SESSION['login_message'] = 'Important Reminder';
    header('Location: login.php');
    exit;
}

$page_title = "Shopping Cart";
$welcome_text = "Shopping Cart";
$base_path = "../";

require_once __DIR__ . '/../scripts/connect_to_database.php';

$cart = $_SESSION['cart'] ?? [];
$selected_product_id = $_SESSION['selected_product_id'] ?? 0;
$cart_error = $_SESSION['cart_error'] ?? '';

unset($_SESSION['cart_error']);

$display_products = [];
$grand_total = 0.00;

/* Show all products currently in cart */
if (!empty($cart)) {
    $product_ids = array_keys($cart);
    $placeholders = implode(',', array_fill(0, count($product_ids), '?'));

    $sql = "SELECT product_id, product_name, product_description, unit_price, inventory_quantity, image_path
            FROM my_products
            WHERE product_id IN ($placeholders)
            ORDER BY product_name";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($product_ids);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $product) {
        $product_id = (int)$product['product_id'];
        $quantity = (int)$cart[$product_id];
        $subtotal = $quantity * (float)$product['unit_price'];

        $product['quantity'] = $quantity;
        $product['subtotal'] = $subtotal;
        $product['in_cart'] = true;

        $display_products[$product_id] = $product;
        $grand_total += $subtotal;
    }
}

/* Also show selected product if it is not already in cart */
if ($selected_product_id > 0 && !isset($display_products[$selected_product_id])) {
    $stmt = $pdo->prepare("
        SELECT product_id, product_name, product_description, unit_price, inventory_quantity, image_path
        FROM my_products
        WHERE product_id = ?
    ");
    $stmt->execute([$selected_product_id]);
    $selected_product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($selected_product) {
        $selected_product['quantity'] = 1;
        $selected_product['subtotal'] = (float)$selected_product['unit_price'];
        $selected_product['in_cart'] = false;

        $display_products[$selected_product_id] = $selected_product;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/../common/head.php'; ?>
</head>

<body class="w3-content w3-padding" style="max-width:1100px;">

<?php include __DIR__ . '/../common/banner.php'; ?>
<?php include __DIR__ . '/../common/navbar.php'; ?>

<div class="w3-container nn-shell w3-margin-top">
    <h2 class="nn-page-title w3-center">Shopping Cart</h2>
    <p class="nn-page-subtitle w3-center">Review the items you’ve selected for purchase.</p>

    <?php if ($cart_error !== ''): ?>
        <div class="w3-panel w3-pale-red w3-border w3-round">
            <p><?= htmlspecialchars($cart_error) ?></p>
        </div>
    <?php endif; ?>

    <?php if (count($display_products) > 0): ?>
        <?php foreach ($display_products as $item): ?>
            <div class="nn-product-card">
                <div class="w3-row-padding">

                    <div class="w3-third">
                        <img src="../<?= htmlspecialchars($item['image_path']) ?>"
                             alt="<?= htmlspecialchars($item['product_name']) ?>"
                             class="nn-product-image">
                    </div>

                    <div class="w3-twothird">
                        <h3 class="nn-product-title"><?= htmlspecialchars($item['product_name']) ?></h3>

                        <p class="nn-product-text"><?= htmlspecialchars($item['product_description']) ?></p>

                        <p class="nn-product-text">
                            <strong>Price:</strong>
                            $<?= number_format((float)$item['unit_price'], 2) ?>
                        </p>

                        <p class="nn-product-text">
                            <strong>Quantity in Stock:</strong>
                            <?= (int)$item['inventory_quantity'] ?>
                        </p>

                        <?php if ($item['in_cart']): ?>
                            <label for="quantity_<?= (int)$item['product_id'] ?>"><strong>Quantity Desired</strong></label>
                            <input
                                class="w3-input w3-border"
                                type="number"
                                id="quantity_<?= (int)$item['product_id'] ?>"
                                value="<?= (int)$item['quantity'] ?>"
                                style="max-width:140px;"
                                readonly
                            >

                            <p class="nn-product-text w3-margin-top">
                                <strong>Total Cost:</strong>
                                $<?= number_format((float)$item['subtotal'], 2) ?>
                            </p>

                            <div class="w3-margin-top">
                                <form method="post" action="../scripts/remove_from_cart.php" style="display:inline;">
                                    <input type="hidden" name="product_id" value="<?= (int)$item['product_id'] ?>">
                                    <button type="submit" class="w3-button nn-soft-button">
                                        Delete from Cart
                                    </button>
                                </form>

                                <a href="product_catalog.php" class="w3-button nn-soft-button">
                                    Return to Catalog
                                </a>
                            </div>
                        <?php else: ?>
                            <form method="post" action="../scripts/shoppingCartProcess.php" class="w3-margin-top">
                                <input type="hidden" name="product_id" value="<?= (int)$item['product_id'] ?>">
                                <input type="hidden" name="action" value="add">

                                <label for="quantity_<?= (int)$item['product_id'] ?>"><strong>Quantity Desired</strong></label>
                                <input
                                    class="w3-input w3-border"
                                    type="number"
                                    id="quantity_<?= (int)$item['product_id'] ?>"
                                    name="quantity"
                                    min="1"
                                    step="1"
                                    value="<?= (int)$item['quantity'] ?>"
                                    style="max-width:140px;"
                                >

                                <p class="nn-product-text w3-margin-top">
                                    <strong>Total Cost:</strong>
                                    $<?= number_format((float)$item['subtotal'], 2) ?>
                                </p>

                                <div class="w3-margin-top">
                                    <button type="submit" class="w3-button nn-soft-button">
                                        Add to Cart
                                    </button>
                                    

                                    <a href="product_catalog.php" class="w3-button nn-soft-button">
                                        Return to Catalog
                                    </a>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>

        <div class="w3-panel w3-padding nn-shell">
            <h3>Grand Total: $<?= number_format($grand_total, 2) ?></h3>
            <a href="checkout.php" class="w3-button nn-soft-button">Proceed to Checkout</a>
        </div>
    <?php else: ?>
        <p>Your shopping cart is empty.</p>
        <p>
            <a href="product_catalog.php" class="w3-button nn-soft-button">
                Return to Catalog
            </a>
        </p>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../common/footer.php'; ?>

</body>
</html>