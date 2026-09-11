<?php
declare(strict_types=1);

session_start();

$page_title = "CARP Method";
$welcome_text = "CARP Bible Study Method";
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
    <h2 class="nn-page-title w3-center">CARP Method for Bible Study</h2>

    <p class="nn-product-text">
        The <strong>CARP method</strong> is a simple Bible study approach that helps you look closely at Scripture
        and identify key truths as you read. CARP stands for <strong>Command, Application, Rhema, and Promise</strong>.
        As you study a passage, you should look for each of these and reflect on how God may be speaking through His Word.
    </p>

    <h3>Command</h3>
    <p class="nn-product-text">
        Look for any instruction or command God is giving in the passage. Ask yourself if there is something
        God is telling you to do, a behavior to follow, or a warning to take seriously.
    </p>

    <h3>Application</h3>
    <p class="nn-product-text">
        Think about how the passage applies to your life personally. Ask how you can live it out,
        what changes you should make, and how the Scripture should affect your choices and attitude.
    </p>

    <h3>Rhema</h3>
    <p class="nn-product-text">
        <strong>Rhema</strong> is the revealed Word of God — the specific truth or insight that stands out
        to you as you study. It is the part of the Scripture the Holy Spirit highlights in a personal way.
    </p>

    <h3>Promise</h3>
    <p class="nn-product-text">
        Look for promises from God in the passage. Ask whether there is a truth you can hold onto,
        reassurance you can receive, or encouragement that strengthens your faith.
    </p>
</div>

<?php include __DIR__ . '/../common/footer.php'; ?>

</body>
</html>