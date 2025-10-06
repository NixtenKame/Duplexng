<?php
$host = 'localhost';
$db   = 'postgres';
$user = 'gamete';
$pass = 'gamete_db';
$port = '5432';
$schema = 'public';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    // Ensure schema is set
    $pdo->exec("SET search_path TO $schema");
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
