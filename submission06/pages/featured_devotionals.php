<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$page_title = "Featured Devotionals";
$welcome_text = "Featured Devotionals";
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
        <h2 class="nn-page-title w3-center">Featured Devotionals</h2>
        <p class="nn-page-subtitle w3-center">
            Explore a collection of devotionals designed to encourage reflection, prayer, and spiritual growth.
        </p>

        <div class="nn-product-card">
            <h3 class="nn-product-title">Morning Mercy</h3>
            <p class="nn-product-text">
                Begin your day with reminders of God’s compassion, faithfulness, and steady presence.
                This devotional focuses on starting each morning with hope, gratitude, and trust in the Lord.
            </p>
        </div>

        <div class="nn-product-card">
            <h3 class="nn-product-title">Peace in the Waiting</h3>
            <p class="nn-product-text">
                For seasons of uncertainty and delay, this devotional offers Scripture-based encouragement
                for trusting God while waiting on His timing and direction.
            </p>
        </div>

        <div class="nn-product-card">
            <h3 class="nn-product-title">Walking in Wisdom</h3>
            <p class="nn-product-text">
                This devotional highlights biblical wisdom for everyday life, helping readers make thoughtful,
                God-honoring decisions in their relationships, studies, work, and personal growth.
            </p>
        </div>

        <div class="nn-product-card">
            <h3 class="nn-product-title">Strength for the Weary</h3>
            <p class="nn-product-text">
                When life feels overwhelming, this devotional points readers back to God’s strength,
                comfort, and sustaining grace through carefully chosen passages and reflections.
            </p>
        </div>

        <div class="nn-product-card">
            <h3 class="nn-product-title">Rooted in Promise</h3>
            <p class="nn-product-text">
                Centered on the promises of God, this devotional encourages believers to stand firm in faith
                and remember the truth of God’s Word in every season.
            </p>
        </div>
    </div>

    <?php include __DIR__ . '/../common/footer.php'; ?>

</body>
</html>