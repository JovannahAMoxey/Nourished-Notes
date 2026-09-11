<?php

echo "PHP version: " . PHP_VERSION . "<br>";
echo "php.ini: " . (php_ini_loaded_file() ?: "NONE") . "<br>";

echo "MongoDB extension: ";
echo extension_loaded("mongodb") ? "YES" : "NO";

echo "<br>Manager class: ";
echo class_exists("MongoDB\\Driver\\Manager") ? "YES" : "NO";