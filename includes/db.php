<?php
$envFile = '/run/secrets/db.env';
if (file_exists($envFile)) {
    $vars = parse_ini_file($envFile);
    $host = getenv('DB_HOST') ?: 'postgres';
    $port = getenv('DB_PORT') ?: '5432';
    $dbname = $vars['POSTGRES_DB'];
    $user = $vars['POSTGRES_USER'];
    $password = $vars['POSTGRES_PASSWORD'];

    $conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
} else {
    http_response_code(500);
    exit('Database configuration missing');
}
?>
