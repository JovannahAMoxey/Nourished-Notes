<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . "/../scripts/get_daily_quote_mongo.php";

$base_path = $base_path ?? "";

// Personalized welcome message
if (isset($_SESSION['customer_first_name'])) {
    $welcome_text = "Welcome, " . $_SESSION['customer_first_name'] . "!";
} else {
    $welcome_text = $welcome_text ?? "Welcome!";
}

// Call the function to actually get the quote
$quote = getDailyQuoteFromMongo();

$quote_text = "Today's " . $quote['adjective'] . " quote, from " .
              $quote['author'] . ": " . $quote['quote'];

// Decide whether button says Log in or Log out
if (isset($_SESSION['customer_id'])) {
    $account_link = $base_path . "scripts/process_logout.php";
    $account_text = "Log out";
} else {
    $account_link = $base_path . "pages/login.php";
    $account_text = "Log in";
}
?>

<div class="nn-header">
  <div class="nn-header-left">
    <img src="<?php echo $base_path; ?>images/logo.png" alt="Nourished Notes logo" class="nn-logo">
  </div>

  <div class="nn-header-right">
    <h2><?php echo htmlspecialchars($welcome_text); ?></h2>

    <p id="server-date" class="w3-small w3-margin-bottom">Loading date...</p>
    <p id="server-time" class="w3-small w3-margin-top">Loading time...</p>

    <a href="<?php echo htmlspecialchars($account_link); ?>"
       class="w3-button w3-padding-0">
       <?php echo htmlspecialchars($account_text); ?>
    </a>

    <p class="w3-margin-top nn-quote-box">
      <?php echo htmlspecialchars($quote_text); ?>
    </p>
  </div>
</div>

<script>
function updateDateTime() {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "<?php echo $base_path; ?>scripts/get_datetime.php", true);

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const data = JSON.parse(xhr.responseText);
      document.getElementById("server-date").textContent = "Date: " + data.date;
      document.getElementById("server-time").textContent = "Time: " + data.time;
    }
  };

  xhr.send();
}

updateDateTime();
setInterval(updateDateTime, 60000);
</script>