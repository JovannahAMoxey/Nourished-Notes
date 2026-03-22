<?php
declare(strict_types=1);

$business_email = "u24@mail.cs-smu.ca";
$feedback_file = __DIR__ . "/../data/feedback.txt";

function clean_input(string $value): string
{
    return trim($value);
}

function show_error(string $message): void
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Feedback Error</title>
      <style>
        body {
          font-family: Arial, sans-serif;
          background: #fff8f8;
          padding: 40px;
        }
        .box {
          max-width: 700px;
          margin: auto;
          background: white;
          padding: 24px;
          border-radius: 12px;
          box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        a {
          color: #c85a95;
          font-weight: bold;
          text-decoration: none;
        }
      </style>
    </head>
    <body>
      <div class="box">
        <h2>There was a problem with your submission</h2>
        <p><?= htmlspecialchars($message) ?></p>
        <p><a href="../pages/feedback_form.php">Return to Feedback Form</a></p>
      </div>
    </body>
    </html>
    <?php
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    show_error("Invalid form submission.");
}

$salutation = clean_input($_POST['salutation'] ?? '');
$first_name = clean_input($_POST['first_name'] ?? '');
$last_name = clean_input($_POST['last_name'] ?? '');
$email = clean_input($_POST['email'] ?? '');
$phone = clean_input($_POST['phone'] ?? '');
$subject = clean_input($_POST['subject'] ?? '');
$comments = clean_input($_POST['comments'] ?? '');
$follow_up = isset($_POST['follow_up']) ? 'Yes' : 'No';

$name_pattern = "/^[A-Za-zÀ-ÿ' -]{2,30}$/";
$phone_pattern = "/^\+?[0-9()\-\s]{7,20}$/";

if ($salutation === '') {
    show_error("Please choose a salutation.");
}

if (!preg_match($name_pattern, $first_name)) {
    show_error("Please enter a valid first name.");
}

if (!preg_match($name_pattern, $last_name)) {
    show_error("Please enter a valid last name.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    show_error("Please enter a valid email address.");
}

if ($phone !== '' && !preg_match($phone_pattern, $phone)) {
    show_error("Please enter a valid telephone number.");
}

if ($subject === '') {
    show_error("Please enter a subject.");
}

if ($comments === '') {
    show_error("Please enter your comments.");
}

$user_subject = "Thank you for your feedback";
$user_message =
    "Dear $salutation $last_name,\n\n" .
    "Thank you for contacting Nourished Notes.\n" .
    "We received your feedback successfully.\n\n" .
    "Subject: $subject\n" .
    "Comments: $comments\n" .
    "Follow-up requested: $follow_up\n\n" .
    "Warm regards,\n" .
    "Nourished Notes";

$business_subject = "New Feedback Submission: $subject";
$business_message =
    "A new feedback submission has been received.\n\n" .
    "Salutation: $salutation\n" .
    "First Name: $first_name\n" .
    "Last Name: $last_name\n" .
    "Email: $email\n" .
    "Phone: " . ($phone !== '' ? $phone : 'Not provided') . "\n" .
    "Subject: $subject\n" .
    "Comments: $comments\n" .
    "Follow-up requested: $follow_up\n";

$user_headers = "From: $business_email\r\n";
$business_headers = "From: $business_email\r\nReply-To: $email\r\n";

$user_mail_sent = @mail($email, $user_subject, $user_message, $user_headers);
$business_mail_sent = @mail($business_email, $business_subject, $business_message, $business_headers);

$record = "----------------------------------------\n";
$record .= "Date: " . date("Y-m-d H:i:s") . "\n";
$record .= "Salutation: $salutation\n";
$record .= "First Name: $first_name\n";
$record .= "Last Name: $last_name\n";
$record .= "Email: $email\n";
$record .= "Phone: " . ($phone !== '' ? $phone : 'Not provided') . "\n";
$record .= "Subject: $subject\n";
$record .= "Comments: $comments\n";
$record .= "Follow-up requested: $follow_up\n";

file_put_contents($feedback_file, $record, FILE_APPEND | LOCK_EX);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Feedback Submitted</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #fffafc;
      padding: 40px;
    }
    .box {
      max-width: 700px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 14px;
      box-shadow: 0 3px 14px rgba(0,0,0,0.08);
      text-align: center;
    }
    a {
      color: #c85a95;
      font-weight: bold;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="box">
    <h2>Thank you for your feedback!</h2>
    <p>Your feedback has been submitted successfully.</p>
    <p>A confirmation email has been sent to <strong><?= htmlspecialchars($email) ?></strong>.</p>

    <?php if (!$user_mail_sent || !$business_mail_sent): ?>
      <p><em>Your feedback was saved, but email delivery may depend on the server configuration.</em></p>
    <?php endif; ?>

    <p><a href="../my_business.php">Return to Home Page</a></p>
  </div>
</body>
</html>