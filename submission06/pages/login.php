<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$page_title = "Log In";
$welcome_text = "Welcome Back";
$base_path = "../";

$login_data = $_SESSION['login_data'] ?? [];
$login_errors = $_SESSION['login_errors'] ?? [];
$logout_message = $_SESSION['logout_message'] ?? '';
$login_message = $_SESSION['login_message'] ?? '';

unset($_SESSION['login_errors'], $_SESSION['logout_message'], $_SESSION['login_message']);

function old_login(string $key, array $login_data): string
{
  return htmlspecialchars($login_data[$key] ?? '');
}

function login_error_text(string $key, array $login_errors): string
{
  return isset($login_errors[$key])
    ? '<p class="w3-text-red w3-small">' . htmlspecialchars($login_errors[$key]) . '</p>'
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
    <div class="w3-card-4 w3-white w3-round-large w3-padding-large" style="max-width:700px; margin:auto;">
      <h2>Customer Log In</h2>
      <p>Please enter your username and password.</p>

      <?php if ($login_message === 'Important Reminder'): ?>
        <div style="background:#fff8d6; border:1px solid #e0c97f; border-radius:12px; padding:16px; margin:16px 0;">
          <h3 style="margin:0 0 8px 0; color:#7a5c00;">Important Reminder</h3>
          <p style="margin:0; color:#333;">
            Purchasing items from our on-line e-store requires logging in.
            And if you have not yet registered with Nourished Notes, before attempting to log in you must
            <a href="register.php">register here</a>.
          </p>
        </div>
      <?php endif; ?>

      <?php if (isset($login_errors['general'])): ?>
        <p class="w3-text-red w3-small">
          <?php echo htmlspecialchars($login_errors['general']); ?>
        </p>
      <?php endif; ?>

      <?php if ($logout_message !== ''): ?>
        <p class="w3-text-green w3-small">
          <?php echo htmlspecialchars($logout_message); ?>
        </p>
      <?php endif; ?>

      <form action="<?php echo $base_path; ?>scripts/process_login.php" method="post" novalidate>

        <p>
          <label for="login_name"><strong>Username *</strong></label>
          <input class="w3-input w3-border" type="text" name="login_name" id="login_name"
            value="<?php echo old_login('login_name', $login_data); ?>" placeholder="Enter your username" required>
          <?php echo login_error_text('login_name', $login_errors); ?>
        </p>

        <p>
          <label for="login_password"><strong>Password *</strong></label>
          <input class="w3-input w3-border" type="password" name="login_password" id="login_password"
            placeholder="Enter your password" required>
          <?php echo login_error_text('login_password', $login_errors); ?>
        </p>

        <p>
          <button class="w3-button w3-round-large" type="submit" style="background-color:#d88bb3; color:white;">
            Log In
          </button>
        </p>

      </form>
    </div>
  </div>

</body>

</html>