<?php
require_once "constants.php";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$pdo = new PDO(DATABASEDNS, DATABASE_USERNAME, DATABASE_PASSWORD, $options);


