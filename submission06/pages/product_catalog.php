<?php
declare(strict_types=1);

$page_title = "Product Catalog";
$welcome_text = "Product Catalog";
$base_path = "../";

require_once __DIR__ . '/../scripts/connect_to_database.php';

$sql = "SELECT category_id, category_name FROM my_categories ORDER BY category_name";
$stmt = $pdo->query($sql);
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . "/../common/head.php"; ?>
</head>

<body class="w3-content w3-padding" style="max-width:1100px;">

    <?php include __DIR__ . "/../common/banner.php"; ?>
    <?php include __DIR__ . "/../common/navbar.php"; ?>

    <div class="w3-container nn-shell w3-margin-top">
        <h2 class="w3-center nn-page-title">Product Categories</h2>
        <p class="nn-page-subtitle">Browse our Nourished Notes collection by category.</p>

        <div class="w3-container w3-margin-top">
            <?php if (count($categories) > 0): ?>
                <ul class="w3-ul nn-category-list">
                    <?php foreach ($categories as $category): ?>
                        <li>
                            <a href="category.php?category_id=<?= urlencode((string)$category['category_id']) ?>">
                                <?= htmlspecialchars($category['category_name']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No product categories found.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php include __DIR__ . "/../common/footer.php"; ?>

</body>

</html>