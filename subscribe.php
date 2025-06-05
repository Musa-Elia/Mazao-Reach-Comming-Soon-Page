<?php
header('Content-Type: application/json');

// DB config
$host = 'localhost';
$dbname = 'mazao_reach';
$username = 'root';
$password = '';  // default XAMPP password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed.']);
    exit;
}

if (!isset($_POST['phone'])) {
    echo json_encode(['status' => 'error', 'message' => 'Phone number is required.']);
    exit;
}

$phone = trim($_POST['phone']);

// Validate phone number format: must start with 255 and have 12 digits total
if (!preg_match('/^255\d{9}$/', $phone)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid phone number format.']);
    exit;
}

// Check if phone already exists
try {
    $stmt = $pdo->prepare("SELECT id FROM subscribers WHERE phone = ?");
    $stmt->execute([$phone]);
    if ($stmt->rowCount() > 0) {
        echo json_encode(['status' => 'exists', 'message' => 'Phone number already subscribed.']);
        exit;
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error.']);
    exit;
}

// Insert phone
try {
    $stmt = $pdo->prepare("INSERT INTO subscribers (phone) VALUES (?)");
    $stmt->execute([$phone]);

    echo json_encode(['status' => 'success', 'message' => 'Thank you for subscribing!']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to subscribe. Please try again later.']);
}
