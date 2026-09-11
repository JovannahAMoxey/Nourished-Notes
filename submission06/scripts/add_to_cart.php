<?php
declare(strict_types=1);

session_start();

if (!isset($_SESSION['customer_id'])) {
    $_SESSION['login_message'] = 'Important Reminder';
    header('Location: ../pages/login.php');
    exit;
}

$product_id = isset($_POST['product_id']) ? (int) $_POST['product_id'] : 0;

if ($product_id > 0) {
    $_SESSION['selected_product_id'] = $product_id;
}

header('Location: ../pages/shopping_cart.php');
exit;