<?php

$host = "localhost";
$dbname = "u24";
$user = "u24";
$pass = "NourishedApp26!";

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "MySQL connection successful!";
} catch (PDOException $e) {
    echo "MySQL connection failed: " . $e->getMessage();
}