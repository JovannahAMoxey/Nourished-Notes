<?php
declare(strict_types=1);

$page_title = "Feedback Form";
$welcome_text = "We'd Love Your Feedback";
$base_path = "../";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include __DIR__ . "/../common/head.php"; ?>
</head>
<body class="w3-content w3-padding" style="max-width:1100px;">

  <?php include __DIR__ . "/../common/banner.php"; ?>
  <?php include __DIR__ . "/../common/navbar.php"; ?>

  <div class="w3-container w3-padding-32">
    <div class="w3-card-4 w3-white w3-round-large w3-padding-large">
      <h2>Feedback Form</h2>
      <p>Please tell us about your experience with Nourished Notes.</p>

      <form action="<?php echo $base_path; ?>scripts/process_feedback.php" method="post">

        <p>
          <label for="salutation"><strong>Salutation *</strong></label>
          <select class="w3-select w3-border" name="salutation" id="salutation" required>
            <option value="">Choose a salutation</option>
            <option value="Ms.">Ms.</option>
            <option value="Mr.">Mr.</option>
            <option value="Mrs.">Mrs.</option>
            <option value="Dr.">Dr.</option>
            <option value="Mx.">Mx.</option>
          </select>
        </p>

        <p>
          <label for="first_name"><strong>First Name *</strong></label>
          <input
            class="w3-input w3-border"
            type="text"
            name="first_name"
            id="first_name"
            required
            pattern="^[A-Za-zÀ-ÿ' -]{2,30}$"
            title="Please enter a valid first name."
          >
        </p>

        <p>
          <label for="last_name"><strong>Last Name *</strong></label>
          <input
            class="w3-input w3-border"
            type="text"
            name="last_name"
            id="last_name"
            required
            pattern="^[A-Za-zÀ-ÿ' -]{2,30}$"
            title="Please enter a valid last name."
          >
        </p>

        <p>
          <label for="email"><strong>Email Address *</strong></label>
          <input
            class="w3-input w3-border"
            type="text"
            name="email"
            id="email"
            required
            pattern="^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
            title="Please enter a valid email address."
          >
        </p>

        <p>
          <label for="phone"><strong>Telephone Number</strong></label>
          <input
            class="w3-input w3-border"
            type="text"
            name="phone"
            id="phone"
            pattern="^\+?[0-9()\-\s]{7,20}$"
            title="Please enter a valid phone number."
          >
        </p>

        <p>
          <label for="subject"><strong>Subject *</strong></label>
          <input
            class="w3-input w3-border"
            type="text"
            name="subject"
            id="subject"
            required
          >
        </p>

        <p>
          <label for="comments"><strong>Comments *</strong></label>
          <textarea
            class="w3-input w3-border"
            name="comments"
            id="comments"
            rows="6"
            required
          ></textarea>
        </p>

        <p>
          <input class="w3-check" type="checkbox" name="follow_up" id="follow_up" value="Yes">
          <label for="follow_up">I would like a follow-up response.</label>
        </p>

        <p>
          <button class="w3-button w3-round-large" type="submit" style="background-color:#d88bb3; color:white;">
            Submit Feedback
          </button>
        </p>

      </form>
    </div>
  </div>

</body>
</html>