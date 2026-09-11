<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$page_title = "Study Plans";
$welcome_text = "Study Plans";
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
        <h2 class="nn-page-title w3-center">Study Plans</h2>
        <p class="nn-page-subtitle w3-center">
            Explore thoughtful Bible study plans designed to help you stay rooted in God’s Word,
            grow in understanding, and build a consistent time of reflection and prayer.
        </p>

        <div class="nn-product-card">
            <h3 class="nn-product-title">Genesis to Exodus Study Plan</h3>
            <p class="nn-product-text">
                Follow the early foundations of Scripture through creation, covenant, deliverance,
                and God’s faithfulness to His people. This plan encourages deeper reflection on
                God’s power, promises, and purpose.
            </p>
        </div>

        <div class="nn-product-card">
            <h3 class="nn-product-title">Psalms for Prayer and Reflection</h3>
            <p class="nn-product-text">
                Spend time in selected Psalms that encourage honesty, worship, surrender, and trust.
                This plan is ideal for seasons when you want to draw near to God through prayer and meditation.
            </p>
        </div>

        <div class="nn-product-card">
            <h3 class="nn-product-title">The Gospels Journey</h3>
            <p class="nn-product-text">
                Walk through the life, teachings, and ministry of Jesus with a structured reading plan
                through the Gospels. This study helps readers focus on Christ’s example, compassion,
                truth, and invitation to discipleship.
            </p>
        </div>

        <div class="nn-product-card">
            <h3 class="nn-product-title">Women of the Bible</h3>
            <p class="nn-product-text">
                Learn from the stories of women throughout Scripture and reflect on their faith,
                courage, obedience, and dependence on God. This plan highlights valuable lessons
                for daily life and spiritual growth.
            </p>
        </div>

        <div class="nn-product-card">
            <h3 class="nn-product-title">Promises of God Study Plan</h3>
            <p class="nn-product-text">
                Focus on key Scriptures that reveal God’s promises, faithfulness, and care.
                This study plan is meant to strengthen faith, bring encouragement, and remind
                readers of the hope found in His Word.
            </p>
        </div>
    </div>

    <?php include __DIR__ . '/../common/footer.php'; ?>

</body>
</html>