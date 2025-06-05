<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['phone_number'])) {
        $phone = trim($_POST['phone_number']);

        // Basic validation: only digits, starts with 0 or +255
        if (preg_match('/^(0|\+255)[0-9]{9}$/', $phone)) {
            require_once '../includes/db_config.php';

            try {
                $stmt = $pdo->prepare("INSERT INTO subscribers (phone_number) VALUES (:phone)");
                $stmt->bindParam(':phone', $phone);
                $stmt->execute();

                echo json_encode(['status' => 'success', 'message' => 'Successfully subscribed.']);
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    echo json_encode(['status' => 'exists', 'message' => 'Number already subscribed.']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Subscription failed.']);
                }
            }
        } else {
            echo json_encode(['status' => 'invalid', 'message' => 'Invalid phone number format.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Phone number is required.']);
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
