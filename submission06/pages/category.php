<?php
declare(strict_types=1);

session_start();

$page_title = "Category Products";
$welcome_text = "Our Products";
$base_path = "../";

require_once __DIR__ . '/../scripts/connect_to_database.php';

$category_id = isset($_GET['category_id']) ? (int) $_GET['category_id'] : 0;

$category_sql = "SELECT category_name FROM my_categories WHERE category_id = :category_id";
$category_stmt = $pdo->prepare($category_sql);
$category_stmt->execute(['category_id' => $category_id]);
$category_row = $category_stmt->fetch(PDO::FETCH_ASSOC);

$category_name = $category_row['category_name'] ?? 'Category Products';

$sql = "SELECT
            p.product_id,
            p.product_name,
            p.product_description,
            p.unit_price,
            p.inventory_quantity,
            p.image_path
        FROM my_products p
        WHERE p.category_id = :category_id
        ORDER BY p.product_name";

$stmt = $pdo->prepare($sql);
$stmt->execute(['category_id' => $category_id]);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

        <div style="position: relative; margin-bottom: 10px;">
            <h2 class="nn-page-title w3-center" style="margin: 0;">
                <?= htmlspecialchars($category_name) ?>
            </h2>

            <div style="position: absolute; top: 8px; right: 0;">
                <a href="product_catalog.php" class="w3-button nn-soft-button">
                    Return to Catalog
                </a>
            </div>
        </div>

        <p class="nn-page-subtitle w3-center">Browse items in this collection.</p>

        <?php if (count($products) > 0): ?>
            <?php foreach ($products as $product): ?>
                <div class="nn-product-card">
                    <div class="w3-row-padding">

                        <div class="w3-third">
                            <img src="../<?= htmlspecialchars($product['image_path']) ?>"
                                alt="<?= htmlspecialchars($product['product_name']) ?>" class="nn-product-image">
                        </div>

                        <div class="w3-twothird">
                            <h3 class="nn-product-title"><?= htmlspecialchars($product['product_name']) ?></h3>

                            <p class="nn-product-text">
                                <?= htmlspecialchars($product['product_description']) ?>
                            </p>

                            <p class="nn-product-text">
                                <span class="nn-price">Price:</span>
                                $<?= number_format((float) $product['unit_price'], 2) ?>
                            </p>

                            <p class="nn-product-text">
                                <span class="nn-stock">Quantity in Stock:</span>
                                <?= htmlspecialchars((string) $product['inventory_quantity']) ?>
                            </p>

                            <form method="post" action="../scripts/add_to_cart.php" style="display:inline;">
                                <input type="hidden" name="product_id" value="<?= (int) $product['product_id'] ?>">
                                <button type="submit" class="w3-button nn-soft-button">
                                    Buy this item
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No products were found in this category.</p>
    <?php endif; ?>
    </div>

    <?php include __DIR__ . '/../common/footer.php'; ?>

</body>

</html>