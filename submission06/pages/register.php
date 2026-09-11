<?php
declare(strict_types=1);

session_start();

$page_title = "Register";
$welcome_text = "Create Your Account";
$base_path = "../";

$form_data = $_SESSION['form_data'] ?? [];
$form_errors = $_SESSION['form_errors'] ?? [];

unset($_SESSION['form_data'], $_SESSION['form_errors']);

function old(string $key, array $form_data): string
{
    return htmlspecialchars($form_data[$key] ?? '');
}

function error_text(string $key, array $form_errors): string
{
    return isset($form_errors[$key])
        ? '<p class="w3-text-red w3-small">' . htmlspecialchars($form_errors[$key]) . '</p>'
        : '';
}
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
      <h2>Customer Registration</h2>
      <p>Please fill out the form below to create your account.</p>
     
      <?php if (isset($form_errors['general'])): ?>
  <p class="w3-text-red"><?php echo htmlspecialchars($form_errors['general']); ?></p>
<?php endif; ?>

      <form action="<?php echo $base_path; ?>scripts/process_registration.php" method="post" novalidate>

        <p>
          <label for="salutation"><strong>Salutation *</strong></label>
          <select class="w3-select w3-border" name="salutation" id="salutation" required>
            <option value="">Choose a salutation</option>
            <option value="Ms." <?php echo (old('salutation', $form_data) === 'Ms.') ? 'selected' : ''; ?>>Ms.</option>
            <option value="Mr." <?php echo (old('salutation', $form_data) === 'Mr.') ? 'selected' : ''; ?>>Mr.</option>
            <option value="Mrs." <?php echo (old('salutation', $form_data) === 'Mrs.') ? 'selected' : ''; ?>>Mrs.</option>
            <option value="Dr." <?php echo (old('salutation', $form_data) === 'Dr.') ? 'selected' : ''; ?>>Dr.</option>
            <option value="Mx." <?php echo (old('salutation', $form_data) === 'Mx.') ? 'selected' : ''; ?>>Mx.</option>
          </select>
          <?php echo error_text('salutation', $form_errors); ?>
        </p>

        <p>
          <label for="first_name"><strong>First Name *</strong></label>
          <input
            class="w3-input w3-border"
            type="text"
            name="first_name"
            id="first_name"
            value="<?php echo old('first_name', $form_data); ?>"
            placeholder="Enter your first name"
            required
            pattern="^[A-Za-zÀ-ÿ' -]{2,30}$"
            title="Please enter a valid first name."
          >
          <?php echo error_text('first_name', $form_errors); ?>
        </p>

        <p>
          <label for="middle_initial"><strong>Middle Initial</strong></label>
          <input
            class="w3-input w3-border"
            type="text"
            name="middle_initial"
            id="middle_initial"
            value="<?php echo old('middle_initial', $form_data); ?>"
            placeholder="Optional"
            pattern="^[A-Za-z]?$"
            title="Please enter one letter only."
            maxlength="1"
          >
          <?php echo error_text('middle_initial', $form_errors); ?>
        </p>

        <p>
          <label for="last_name"><strong>Last Name *</strong></label>
          <input
            class="w3-input w3-border"
            type="text"
            name="last_name"
            id="last_name"
            value="<?php echo old('last_name', $form_data); ?>"
            placeholder="Enter your last name"
            required
            pattern="^[A-Za-zÀ-ÿ' -]{2,30}$"
            title="Please enter a valid last name."
          >
          <?php echo error_text('last_name', $form_errors); ?>
        </p>

        <p>
          <label for="gender"><strong>Gender</strong></label>
          <select class="w3-select w3-border" name="gender" id="gender">
            <option value="">Choose an option</option>
            <option value="Female" <?php echo (old('gender', $form_data) === 'Female') ? 'selected' : ''; ?>>Female</option>
            <option value="Male" <?php echo (old('gender', $form_data) === 'Male') ? 'selected' : ''; ?>>Male</option>
            <option value="Non-binary" <?php echo (old('gender', $form_data) === 'Non-binary') ? 'selected' : ''; ?>>Non-binary</option>
            <option value="Prefer not to say" <?php echo (old('gender', $form_data) === 'Prefer not to say') ? 'selected' : ''; ?>>Prefer not to say</option>
          </select>
          <?php echo error_text('gender', $form_errors); ?>
        </p>

        <p>
          <label for="email_address"><strong>Email Address *</strong></label>
          <input
            class="w3-input w3-border"
            type="text"
            name="email_address"
            id="email_address"
            value="<?php echo old('email_address', $form_data); ?>"
            placeholder="example@email.com"
            required
            pattern="^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
            title="Please enter a valid email address."
          >
          <?php echo error_text('email_address', $form_errors); ?>
        </p>

        <p>
          <label for="phone_number"><strong>Phone Number</strong></label>
          <input
            class="w3-input w3-border"
            type="text"
            name="phone_number"
            id="phone_number"
            value="<?php echo old('phone_number', $form_data); ?>"
            placeholder="e.g. 782-774-6884"
            pattern="^\+?[0-9()\-\s]{7,20}$"
            title="Please enter a valid phone number."
          >
          <?php echo error_text('phone_number', $form_errors); ?>
        </p>

        <p>
          <label for="street_address"><strong>Street Address *</strong></label>
          <input
            class="w3-input w3-border"
            type="text"
            name="street_address"
            id="street_address"
            value="<?php echo old('street_address', $form_data); ?>"
            placeholder="Enter your street address"
            required
          >
          <?php echo error_text('street_address', $form_errors); ?>
        </p>

        <p>
          <label for="city"><strong>City *</strong></label>
          <input
            class="w3-input w3-border"
            type="text"
            name="city"
            id="city"
            value="<?php echo old('city', $form_data); ?>"
            placeholder="Enter your city"
            required
            pattern="^[A-Za-zÀ-ÿ' -]{2,50}$"
            title="Please enter a valid city."
          >
          <?php echo error_text('city', $form_errors); ?>
        </p>

        <p>
          <label for="region"><strong>Region *</strong></label>
          <input
            class="w3-input w3-border"
            type="text"
            name="region"
            id="region"
            value="<?php echo old('region', $form_data); ?>"
            placeholder="Province / State / Region"
            required
            pattern="^[A-Za-zÀ-ÿ' -]{2,50}$"
            title="Please enter a valid region."
          >
          <?php echo error_text('region', $form_errors); ?>
        </p>

        <p>
          <label for="postal_code"><strong>Postal Code *</strong></label>
          <input
            class="w3-input w3-border"
            type="text"
            name="postal_code"
            id="postal_code"
            value="<?php echo old('postal_code', $form_data); ?>"
            placeholder="e.g. B3H 3C3"
            required
            pattern="^[A-Za-z0-9 -]{3,10}$"
            title="Please enter a valid postal code."
          >
          <?php echo error_text('postal_code', $form_errors); ?>
        </p>

        <p>
          <label for="login_name"><strong>Username *</strong></label>
          <input
            class="w3-input w3-border"
            type="text"
            name="login_name"
            id="login_name"
            value="<?php echo old('login_name', $form_data); ?>"
            placeholder="Choose a username"
            required
            pattern="^[A-Za-z0-9_.-]{4,20}$"
            title="Username must be 4 to 20 characters and can contain letters, numbers, underscores, dots, and hyphens."
          >
          <?php echo error_text('login_name', $form_errors); ?>
        </p>

        <p>
          <label for="login_password"><strong>Password *</strong></label>
          <input
            class="w3-input w3-border"
            type="password"
            name="login_password"
            id="login_password"
            placeholder="Choose a password"
            required
            pattern="^.{6,50}$"
            title="Password must be at least 6 characters long."
          >
          <?php echo error_text('login_password', $form_errors); ?>
        </p>

        <p>
          <button class="w3-button w3-round-large" type="submit" style="background-color:#d88bb3; color:white;">
            Register
          </button>
        </p>

      </form>
    </div>
  </div>

</body>
</html>