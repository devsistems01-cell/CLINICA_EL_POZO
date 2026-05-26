<?php

$dsn = 'mysql:host=127.0.0.1;dbname=clinica_el_pozo;charset=utf8mb4';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, 'root', '', $options);
} catch (PDOException $e) {
    http_response_code(500);
    echo '<h1>Error de conexión a la base de datos</h1>';
    echo '<p>' . htmlspecialchars($e->getMessage()) . '</p>';
    exit;
}
