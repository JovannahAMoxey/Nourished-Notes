<?php
declare(strict_types=1);

session_start();

if (!isset($_SESSION['customer_id'])) {
    $_SESSION['login_message'] = 'Important Reminder';
    header('Location: ../pages/login.php');
    exit;
}

require_once __DIR__ . '/connect_to_database.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$product_id = isset($_POST['product_id']) ? (int) $_POST['product_id'] : 0;
$action = $_POST['action'] ?? '';
$quantity_raw = trim((string)($_POST['quantity'] ?? ''));

if ($product_id <= 0) {
    $_SESSION['cart_error'] = 'Invalid product selected.';
    header('Location: ../pages/shopping_cart.php');
    exit;
}

if ($action === 'add') {
    if ($quantity_raw === '') {
        $_SESSION['cart_error'] = 'Please enter a quantity.';
        header('Location: ../pages/shopping_cart.php');
        exit;
    }

    if (!ctype_digit($quantity_raw)) {
        $_SESSION['cart_error'] = 'Quantity must be a whole number 1 or greater.';
        header('Location: ../pages/shopping_cart.php');
        exit;
    }

    $quantity = (int)$quantity_raw;

    if ($quantity <= 0) {
        $_SESSION['cart_error'] = 'Quantity must be 1 or greater.';
        header('Location: ../pages/shopping_cart.php');
        exit;
    }

    $stmt = $pdo->prepare("
        SELECT inventory_quantity
        FROM my_products
        WHERE product_id = ?
    ");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        $_SESSION['cart_error'] = 'That product could not be found.';
        header('Location: ../pages/shopping_cart.php');
        exit;
    }

    $inventory_quantity = (int)$product['inventory_quantity'];

    if ($quantity > $inventory_quantity) {
        $_SESSION['cart_error'] = 'Requested quantity is greater than the quantity in stock.';
        header('Location: ../pages/shopping_cart.php');
        exit;
    }

    $_SESSION['cart'][$product_id] = $quantity;
    $_SESSION['selected_product_id'] = $product_id;

    header('Location: ../pages/shopping_cart.php');
    exit;
}

$_SESSION['cart_error'] = 'Invalid shopping cart action.';
header('Location: ../pages/shopping_cart.php');
exit;