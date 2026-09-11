<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['customer_id'])) {
    unset(
        $_SESSION['customer_id'],
        $_SESSION['customer_salutation'],
        $_SESSION['customer_first_name'],
        $_SESSION['customer_last_name'],
        $_SESSION['customer_username']
    );

    $_SESSION['logout_message'] = 'You have been logged out successfully.';
} else {
    $_SESSION['logout_message'] = 'You are not currently logged in.';
}

header('Location: ../pages/login.php');
exit;