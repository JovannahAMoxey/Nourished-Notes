<?php
$page_title = "Nourished Notes - Home";
$welcome_text = "Welcome!";
$base_path = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include __DIR__ . "/common/head.php"; ?>
</head>

<body class="w3-content w3-padding" style="max-width:1100px">

  <?php include __DIR__ . "/common/banner.php"; ?>

  <!-- Menu bar -->
  <?php include __DIR__ . "/common/navbar.php"; ?>

  <!-- Main content -->
  <h3>You've come to Nourished Notes!</h3>

  <p>
    Nourished Notes offers mindfulness tools that support reflection, gratitude, and intentional living.
    Our collection includes journals, Bibles, and stationery designed to help you build consistent routines
    for study, prayer, planning, and personal growth.
  </p>

  <p>
    Founded in 2026, <strong>Nourished Notes</strong> is a quiet space for studying the Word through journaling,
    devotionals, and intentional reflection.
  </p>

  <p>
    With gentle structure and stationery-inspired tools, Nourished Notes supports spiritual growth
    in a way that fits naturally into everyday life.
  </p>

  <p>
    This website is being developed in stages.  the e-store features will be added so
    visitors can browse a product catalog and complete a simulated purchase.
  </p>

  <div class="w3-container w3-padding-16 nn-product-box w3-margin-top">
    <div class="nn-banner">Featured Products</div>

    <div class="carousel-container">
      <?php include __DIR__ . "/resources/images_and_labels.html"; ?>
    </div>
  </div>

  <!-- Footer -->
  <?php include __DIR__ . "/common/footer.php"; ?>

</body>
</html>