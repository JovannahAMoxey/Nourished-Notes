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
    We carry a curated collection of truly unique products for study, reflection, and inspiration. For your shopping and
    browsing convenience, please choose one of the following links.
  </p>

  <div class="w3-container w3-padding-16 nn-product-box w3-margin-top">
    <div class="nn-banner">Explore the E-Store</div>

    <div class="w3-padding">
      <p>
        <strong>Product Catalog:</strong>
        Browse the collection of Nourished Notes resources
        <a href="<?php echo $base_path; ?>pages/product_catalog.php">here</a>.
      </p>

      <p>
        <strong>Login:</strong>
        Returning visitors will be able to sign in and continue shopping
        <a href="<?php echo $base_path; ?>pages/login.php">here</a>.
      </p>

      <p>
        <strong>Register:</strong>
        New visitors will be able to create an account
        <a href="<?php echo $base_path; ?>pages/register.php">here</a>.
      </p>
    </div>
  </div>



  <?php include __DIR__ . "/../common/footer.php"; ?>

</body>

</html>