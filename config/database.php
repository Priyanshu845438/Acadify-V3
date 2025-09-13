<?php
// Database configuration
function getDatabaseConnection() {
    // Check if we're in Replit environment (has DATABASE_URL environment variable)
    $database_url = $_ENV['DATABASE_URL'] ?? getenv('DATABASE_URL');
    
    if ($database_url) {
        // Replit PostgreSQL configuration
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
    } else {
        // Hostinger MySQL configuration
        $host = 'localhost';
        $dbname = 'u361343093_acadify_db';
        $username = 'u361343093_acadify_db';
        $password = 'LoveDay@1103!!!!!';
        $port = '3306'; // MySQL port instead of PostgreSQL (5432)
        
        try {
            // Use MySQL PDO connection for Hostinger
            $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }
}

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>