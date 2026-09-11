<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/connect_to_database.php';

function clean_input(?string $value): string
{
    return trim((string)$value);
}

function redirect_back_with_errors(array $errors, array $form_data): void
{
    $_SESSION['form_errors'] = $errors;
    $_SESSION['form_data'] = $form_data;
    header('Location: ../pages/register.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../pages/register.php');
    exit;
}

$salutation = clean_input($_POST['salutation'] ?? '');
$first_name = clean_input($_POST['first_name'] ?? '');
$middle_initial = clean_input($_POST['middle_initial'] ?? '');
$last_name = clean_input($_POST['last_name'] ?? '');
$gender = clean_input($_POST['gender'] ?? '');
$email = clean_input($_POST['email_address'] ?? '');
$phone = clean_input($_POST['phone_number'] ?? '');
$street_address = clean_input($_POST['street_address'] ?? '');
$city = clean_input($_POST['city'] ?? '');
$region = clean_input($_POST['region'] ?? '');
$postal_code = clean_input($_POST['postal_code'] ?? '');
$username = clean_input($_POST['login_name'] ?? '');
$password = clean_input($_POST['login_password'] ?? '');

$form_data = [
    'salutation' => $salutation,
    'first_name' => $first_name,
    'middle_initial' => $middle_initial,
    'last_name' => $last_name,
    'gender' => $gender,
    'email_address' => $email,
    'phone_number' => $phone,
    'street_address' => $street_address,
    'city' => $city,
    'region' => $region,
    'postal_code' => $postal_code,
    'login_name' => $username
];

$errors = [];

if ($salutation === '') {
    $errors['salutation'] = 'Please choose a salutation.';
}

if (!preg_match("/^[A-Za-zÀ-ÿ' -]{2,30}$/", $first_name)) {
    $errors['first_name'] = 'Please enter a valid first name.';
}

if ($middle_initial !== '' && !preg_match("/^[A-Za-z]$/", $middle_initial)) {
    $errors['middle_initial'] = 'Please enter one valid middle initial.';
}

if (!preg_match("/^[A-Za-zÀ-ÿ' -]{2,30}$/", $last_name)) {
    $errors['last_name'] = 'Please enter a valid last name.';
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email_address'] = 'Please enter a valid email address.';
}

if ($phone !== '' && !preg_match("/^\+?[0-9()\-\s]{7,20}$/", $phone)) {
    $errors['phone_number'] = 'Please enter a valid phone number.';
}

if ($street_address === '') {
    $errors['street_address'] = 'Please enter your street address.';
}

if (!preg_match("/^[A-Za-zÀ-ÿ' -]{2,50}$/", $city)) {
    $errors['city'] = 'Please enter a valid city.';
}

if (!preg_match("/^[A-Za-zÀ-ÿ' -]{2,50}$/", $region)) {
    $errors['region'] = 'Please enter a valid region.';
}

if (!preg_match("/^[A-Za-z0-9 -]{3,10}$/", $postal_code)) {
    $errors['postal_code'] = 'Please enter a valid postal code.';
}

if (!preg_match("/^[A-Za-z0-9_.-]{4,20}$/", $username)) {
    $errors['login_name'] = 'Please enter a valid username.';
}

if (strlen($password) < 6) {
    $errors['login_password'] = 'Password must be at least 6 characters long.';
}

if (!empty($errors)) {
    redirect_back_with_errors($errors, $form_data);
}

try {
    $stmt = $pdo->prepare("SELECT customer_id FROM my_customers WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->fetch()) {
        $errors['email_address'] = 'That email address is already registered.';
    }

    $stmt = $pdo->prepare("SELECT customer_id FROM my_customers WHERE username = ?");
    $stmt->execute([$username]);

    if ($stmt->fetch()) {
        $errors['login_name'] = 'That username already exists.';
    }

    if (!empty($errors)) {
        redirect_back_with_errors($errors, $form_data);
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("
        INSERT INTO my_customers (
            salutation,
            first_name,
            middle_initial,
            last_name,
            gender,
            email,
            phone,
            street_address,
            city,
            region,
            postal_code,
            username,
            password_hash
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $salutation,
        $first_name,
        $middle_initial !== '' ? $middle_initial : null,
        $last_name,
        $gender !== '' ? $gender : null,
        $email,
        $phone !== '' ? $phone : null,
        $street_address,
        $city,
        $region,
        $postal_code,
        $username,
        $password_hash
    ]);

    $customer_id = (int)$pdo->lastInsertId();

    $_SESSION['customer_id'] = $customer_id;
    $_SESSION['customer_first_name'] = $first_name;
    $_SESSION['customer_last_name'] = $last_name;
    $_SESSION['customer_username'] = $username;
    $_SESSION['customer_salutation'] = $salutation;

    header('Location: ../my_business.php');
    exit;

} catch (PDOException $e) {
    $errors['general'] = 'Registration failed. Please try again.';
    redirect_back_with_errors($errors, $form_data);
}