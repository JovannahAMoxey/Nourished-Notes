<?php
include __DIR__ . "/../scripts/get_daily_quote_mongo.php";

$welcome_text = $welcome_text ?? "Welcome!";
$base_path = $base_path ?? "";

// Call the function to actually get the quote
$quote = getDailyQuoteFromMongo();

$quote_text = "Today's " . $quote['adjective'] . " quote, from " .
              $quote['author'] . ": " . $quote['quote'];
?>

<div class="nn-header">
  <div class="nn-header-left">
    <img src="<?php echo $base_path; ?>images/logo.png" alt="Nourished Notes logo" class="nn-logo">
  </div>

  <div class="nn-header-right">
    <h2><?php echo htmlspecialchars($welcome_text); ?></h2>

    <p id="server-date" class="w3-small w3-margin-bottom">Loading date...</p>
    <p id="server-time" class="w3-small w3-margin-top">Loading time...</p>

    <a href="<?php echo $base_path; ?>pages/sorry.php"
       class="w3-button w3-padding-0"
       title="Coming later">Log in</a>

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