<?php
declare(strict_types=1);

date_default_timezone_set('America/Halifax');

header('Content-Type: application/json');

echo json_encode([
    'date' => date('l, F j, Y'),
    'time' => date('g:i A')
]);