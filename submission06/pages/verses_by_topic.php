<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$page_title = "Verses by Topic";
$welcome_text = "Verses by Topic";
$base_path = "../";
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
        <h2 class="nn-page-title w3-center">Verses by Topic</h2>
        <p class="nn-page-subtitle w3-center">
            Explore encouraging Scriptures organized by topic to help guide your study, prayer, and reflection in different seasons of life.
        </p>

        <div class="nn-product-card">
            <h3 class="nn-product-title">Peace</h3>
            <p class="nn-product-text">
                Find Scriptures that point your heart toward God’s peace in the middle of stress, uncertainty, and waiting.
            </p>
        </div>

        <div class="nn-product-card">
            <h3 class="nn-product-title">Faith</h3>
            <p class="nn-product-text">
                Reflect on verses that strengthen trust in God, encourage perseverance, and remind you to walk by faith.
            </p>
        </div>

        <div class="nn-product-card">
            <h3 class="nn-product-title">Strength</h3>
            <p class="nn-product-text">
                Discover passages that remind you where true strength comes from and encourage you to lean on God in every season.
            </p>
        </div>

        <div class="nn-product-card">
            <h3 class="nn-product-title">Hope</h3>
            <p class="nn-product-text">
                Read verses that bring comfort, lift your spirit, and point you back to the hope found in God’s promises.
            </p>
        </div>

        <div class="nn-product-card">
            <h3 class="nn-product-title">Wisdom</h3>
            <p class="nn-product-text">
                Spend time with Scriptures that offer guidance, understanding, and direction for daily life and decision-making.
            </p>
        </div>

        <div class="nn-product-card">
            <h3 class="nn-product-title">Prayer</h3>
            <p class="nn-product-text">
                Explore verses that encourage honest prayer, deeper dependence on God, and confidence in bringing every need before Him.
            </p>
        </div>
    </div>

    <?php include __DIR__ . '/../common/footer.php'; ?>

</body>
</html>