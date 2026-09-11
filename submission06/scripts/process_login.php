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

function redirect_back_with_login_errors(array $errors, array $login_data): void
{
    $_SESSION['login_errors'] = $errors;
    $_SESSION['login_data'] = $login_data;
    header('Location: ../pages/login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../pages/login.php');
    exit;
}

$username = clean_input($_POST['login_name'] ?? '');
$password = (string)($_POST['login_password'] ?? '');

$login_data = [
    'login_name' => $username
];

$errors = [];

if ($username === '') {
    $errors['login_name'] = 'Please enter your username.';
}

if ($password === '') {
    $errors['login_password'] = 'Please enter your password.';
}

if (!empty($errors)) {
    redirect_back_with_login_errors($errors, $login_data);
}

try {
    $stmt = $pdo->prepare("
        SELECT customer_id, salutation, first_name, last_name, username, password_hash
        FROM my_customers
        WHERE username = ?
    ");
    $stmt->execute([$username]);
    $customer = $stmt->fetch();

    if (!$customer) {
        $errors['login_name'] = 'That username was not found.';
        redirect_back_with_login_errors($errors, $login_data);
    }

    if (!password_verify($password, $customer['password_hash'])) {
        $errors['login_password'] = 'Incorrect password.';
        redirect_back_with_login_errors($errors, $login_data);
    }

    $_SESSION['customer_id'] = (int)$customer['customer_id'];
    $_SESSION['customer_salutation'] = $customer['salutation'];
    $_SESSION['customer_first_name'] = $customer['first_name'];
    $_SESSION['customer_last_name'] = $customer['last_name'];
    $_SESSION['customer_username'] = $customer['username'];

    header('Location: ../my_business.php');
    exit;

} catch (PDOException $e) {
    $errors['general'] = 'Login failed. Please try again.';
    redirect_back_with_login_errors($errors, $login_data);
}