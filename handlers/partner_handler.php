<?php
require_once '../config/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

try {
    // Get form data
    $company_name = $_POST['company_name'] ?? '';
    $contact_person = $_POST['contact_person'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $business_type = $_POST['business_type'] ?? '';
    $message = $_POST['message'] ?? '';
    
    // Validation
    if (empty($company_name) || empty($contact_person) || empty($email)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Please fill in all required fields']);
        exit;
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Please enter a valid email address']);
        exit;
    }
    
    // Save to database
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("
        INSERT INTO partner_entries (company_name, contact_person, email, phone, business_type, message) 
        VALUES (?, ?, ?, ?, ?, ?)
    ");
    
    $stmt->execute([$company_name, $contact_person, $email, $phone, $business_type, $message]);
    
    echo json_encode([
        'success' => true, 
        'message' => 'Thank you for your partnership inquiry! We will review your application and get back to you soon.'
    ]);
    
} catch (PDOException $e) {
    error_log("Database error in partner_handler.php: " . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'success' => false, 
        'message' => 'Sorry, there was an error processing your request. Please try again later.'
    ]);
} catch (Exception $e) {
    error_log("General error in partner_handler.php: " . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'success' => false, 
        'message' => 'Sorry, there was an error processing your request. Please try again later.'
    ]);
}
?>