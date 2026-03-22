<?php
$page_title = "Nourished Notes - Site Map";
$welcome_text = "Welcome!";
$base_path = "../";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include __DIR__ . "/../common/head.php"; ?>
</head>

<body class="w3-content w3-padding" style="max-width:1100px">

  <?php include __DIR__ . "/../common/banner.php"; ?>
  <?php include __DIR__ . "/../common/navbar.php"; ?>

  <h3>Explore Nourished Notes</h3>

  <p>
    This site map is here to help you easily explore the different parts of Nourished Notes,
    from study resources and devotionals to community pages and future e-store features.
  </p>

  <div class="w3-row-padding w3-margin-top">

    <div class="w3-half">
      <div class="w3-container w3-padding-16 nn-product-box">
        <div class="nn-banner">Main Pages</div>

        <div class="w3-padding">
          <p><a href="<?php echo $base_path; ?>my_business.php">Home</a></p>
          <p><a href="<?php echo $base_path; ?>pages/sitemap.php">Site Map</a></p>
        </div>
      </div>

      <div class="w3-container w3-padding-16 nn-product-box w3-margin-top">
        <div class="nn-banner">E-Store</div>

        <div class="w3-padding">
          <p><a href="<?php echo $base_path; ?>pages/estore.php">Shop</a></p>
          <p><a title="Not yet active" href="<?php echo $base_path; ?>pages/sorry.php">Product Catalog</a></p>
          <p><a title="Not yet active" href="<?php echo $base_path; ?>pages/sorry.php">Register</a></p>
          <p><a title="Not yet active" href="<?php echo $base_path; ?>pages/sorry.php">Login</a></p>
          <p><a title="Not yet active" href="<?php echo $base_path; ?>pages/sorry.php">Shopping Cart</a></p>
          <p><a title="Not yet active" href="<?php echo $base_path; ?>pages/sorry.php">Checkout</a></p>
          <p><a title="Not yet active" href="<?php echo $base_path; ?>pages/sorry.php">Logout</a></p>
        </div>
      </div>

      <div class="w3-container w3-padding-16 nn-product-box w3-margin-top">
        <div class="nn-banner">Study</div>

        <div class="w3-padding">
          <p><a href="<?php echo $base_path; ?>pages/guides.php">Study Plans</a></p>
          <p><a title="Not yet active" href="<?php echo $base_path; ?>pages/sorry.php">SOAP Method</a></p>
          <p><a title="Not yet active" href="<?php echo $base_path; ?>pages/sorry.php">Verses by Topic</a></p>
          <p><a title="Not yet active" href="<?php echo $base_path; ?>pages/sorry.php">Journaling Prompts</a></p>
          <p><a title="Not yet active" href="<?php echo $base_path; ?>pages/sorry.php">Prayer List</a></p>
        </div>
      </div>
    </div>

    <div class="w3-half">
      <div class="w3-container w3-padding-16 nn-product-box">
        <div class="nn-banner">Devotionals</div>

        <div class="w3-padding">
          <p><a href="<?php echo $base_path; ?>pages/recipes_featured.php">Featured Devotionals</a></p>
          <p><a href="<?php echo $base_path; ?>pages/recipes_new.php">New Devotionals</a></p>
          <p><a href="<?php echo $base_path; ?>pages/recipes_archived.php">Devotional Archive</a></p>
        </div>
      </div>

      <div class="w3-container w3-padding-16 nn-product-box w3-margin-top">
        <div class="nn-banner">About</div>

        <div class="w3-padding">
          <p><a href="<?php echo $base_path; ?>pages/vision.php">Vision &amp; Mission</a></p>
          <p><a href="<?php echo $base_path; ?>pages/locations.php">Community</a></p>
          <p><a title="Not yet active" href="<?php echo $base_path; ?>pages/sorry.php">Contact</a></p>
          <p><a href="<?php echo $base_path; ?>pages/feedback_form.php">Feedback Form</a></p>
        </div>
      </div>

      <div class="w3-panel w3-pale-green w3-leftbar w3-border-green w3-margin-top">
        <p style="margin:0;">
          <strong>Note:</strong> Some links currently lead to placeholder pages while future features are being developed.
        </p>
      </div>
    </div>

  </div>

  <?php include __DIR__ . "/../common/footer.php"; ?>

</body>
</html>