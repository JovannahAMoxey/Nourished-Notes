<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

if (!isset($_SESSION['customer_id'])) {
    $_SESSION['login_message'] = 'Important Reminder';
    header('Location: login.php');
    exit;
}

$page_title = "Checkout Receipt";
$welcome_text = "Checkout Receipt";
$base_path = "../";

require_once __DIR__ . '/../scripts/connect_to_database.php';

$cart = $_SESSION['cart'] ?? [];
$receipt_items = [];
$grand_total = 0.00;
$checkout_error = '';

if (empty($cart)) {
    $checkout_error = 'Your shopping cart is empty.';
} else {
    try {
        $product_ids = array_keys($cart);
        $placeholders = implode(',', array_fill(0, count($product_ids), '?'));

        $sql = "SELECT product_id, product_name, product_description, unit_price, inventory_quantity, image_path
                FROM my_products
                WHERE product_id IN ($placeholders)
                ORDER BY product_name";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($product_ids);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $products_by_id = [];
        foreach ($products as $product) {
            $products_by_id[(int)$product['product_id']] = $product;
        }

        foreach ($cart as $product_id => $quantity) {
            $product_id = (int)$product_id;
            $quantity = (int)$quantity;

            if (!isset($products_by_id[$product_id])) {
                throw new Exception('A product in your cart could not be found.');
            }

            $product = $products_by_id[$product_id];
            $inventory_quantity = (int)$product['inventory_quantity'];

            if ($quantity > $inventory_quantity) {
                throw new Exception('Not enough stock is available for ' . $product['product_name'] . '.');
            }
        }

        foreach ($cart as $product_id => $quantity) {
            $product_id = (int)$product_id;
            $quantity = (int)$quantity;
            $product = $products_by_id[$product_id];

            $unit_price = (float)$product['unit_price'];
            $subtotal = $quantity * $unit_price;
            $grand_total += $subtotal;

            $receipt_items[] = [
                'product_name' => $product['product_name'],
                'product_description' => $product['product_description'],
                'unit_price' => $unit_price,
                'quantity' => $quantity,
                'subtotal' => $subtotal,
                'image_path' => $product['image_path']
            ];

            $new_inventory = (int)$product['inventory_quantity'] - $quantity;

            $update_stmt = $pdo->prepare("
                UPDATE my_products
                SET inventory_quantity = ?
                WHERE product_id = ?
            ");
            $update_stmt->execute([$new_inventory, $product_id]);
        }

        unset($_SESSION['cart'], $_SESSION['selected_product_id']);

    } catch (Throwable $e) {
        $checkout_error = $e->getMessage();
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
    <h2 class="nn-page-title w3-center">Checkout Receipt</h2>
    <p class="nn-page-subtitle w3-center">Thank you for shopping with Nourished Notes.</p>

    <?php if ($checkout_error !== ''): ?>
        <div class="w3-panel w3-pale-red w3-border w3-round">
            <p><?= htmlspecialchars($checkout_error) ?></p>
        </div>
        <p>
            <a href="shopping_cart.php" class="w3-button nn-soft-button">Return to Shopping Cart</a>
        </p>

    <?php elseif (!empty($receipt_items)): ?>
        <div class="w3-panel w3-pale-green w3-border w3-round">
            <p>Your order has been successfully processed.</p>
        </div>

        <?php foreach ($receipt_items as $item): ?>
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
                            <strong>Quantity Purchased:</strong>
                            <?= (int)$item['quantity'] ?>
                        </p>
                        <p class="nn-product-text">
                            <strong>Item Total:</strong>
                            $<?= number_format((float)$item['subtotal'], 2) ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="w3-panel w3-padding nn-shell">
            <h3>Grand Total Paid: $<?= number_format($grand_total, 2) ?></h3>
            <a href="product_catalog.php" class="w3-button nn-soft-button">Continue Shopping</a>
        </div>

    <?php else: ?>
        <p>Your shopping cart is empty.</p>
        <p>
            <a href="product_catalog.php" class="w3-button nn-soft-button">Return to Catalog</a>
        </p>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../common/footer.php'; ?>

</body>
</html>