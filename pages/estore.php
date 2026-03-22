<?php
$page_title = "Nourished Notes - E-Store";
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

  <h3>Welcome to the Nourished Notes E-Store</h3>

  <p>
    This is the space where Nourished Notes will continue growing into a gentle shop for
    faith-centered resources, including devotionals, printable study tools, journals, and
    stationery-inspired items.
  </p>

  <p>
    While the full store is still being developed, this page gives a preview of the features
    that will eventually help visitors browse, explore, and purchase meaningful resources.
  </p>

  <div class="w3-container w3-padding-16 nn-product-box w3-margin-top">
    <div class="nn-banner">Explore the E-Store</div>

    <div class="w3-padding">
      <p>
        <strong>Product Catalog:</strong>
        Browse the collection of Nourished Notes resources
        <a title="Not yet active" href="<?php echo $base_path; ?>pages/sorry.php">here</a>.
      </p>

      <p>
        <strong>Login:</strong>
        Returning visitors will be able to sign in and continue shopping
        <a title="Not yet active" href="<?php echo $base_path; ?>pages/sorry.php">here</a>.
      </p>

      <p>
        <strong>Register:</strong>
        New visitors will be able to create an account
        <a title="Not yet active" href="<?php echo $base_path; ?>pages/sorry.php">here</a>.
      </p>
    </div>
  </div>

  <div class="w3-container w3-padding-16 nn-product-box w3-margin-top">
    <div class="nn-banner">Coming Soon</div>

    <div class="w3-padding">
      <p>
        Future versions of the E-Store will include a fuller product catalog, account features,
        shopping cart tools, and a simulated checkout experience.
      </p>
    </div>
  </div>

  <div class="w3-panel w3-pale-green w3-leftbar w3-border-green w3-margin-top">
    <p style="margin:0;">
      <strong>Note:</strong> Checkout and account features are currently placeholders while the e-store system is being built.
    </p>
  </div>

  <?php include __DIR__ . "/../common/footer.php"; ?>

</body>
</html>