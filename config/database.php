<?php
// Database configuration
function getDatabaseConnection() {
    $database_url = $_ENV['DATABASE_URL'] ?? getenv('DATABASE_URL');
    if (!$database_url) {
        die('Database URL not found in environment variables');
    }
    
    // Parse the DATABASE_URL
    $db_info = parse_url($database_url);
    
    $host = $db_info['host'];
    $port = $db_info['port'];
    $dbname = ltrim($db_info['path'], '/');
    $user = $db_info['user'];
    $password = $db_info['pass'];
    
    try {
        $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }
}

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>