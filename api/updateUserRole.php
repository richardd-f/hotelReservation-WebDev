<?php
header('Content-Type: application/json');

require_once '../function/loginRegister.php';

kickIfNotAdmin();

try {
    $json_data = file_get_contents('php://input');

    $data = json_decode($json_data, true);

    if (!isset($data['userId']) || !isset($data['isAdmin'])) {
        throw new Exception('Invalid input data.');
    }

    $userId = (int)$data['userId'];
    // The isAdmin value from javascript (true/false) will be converted to 1 or 0.
    $isAdmin = $data['isAdmin'] ? 1 : 0; 

    if ($userId <= 0) {
        throw new Exception('Invalid User ID.');
    }

    $conn = createDB();
    $stmt = $conn->prepare("UPDATE users SET isAdmin = ? WHERE user_id = ?");
    $stmt->bind_param("ii", $isAdmin, $userId);
    
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        echo json_encode(['success' => true]);
    } else {
        throw new Exception($stmt->error);
    }

} catch (Exception $e) {
    http_response_code(500); // 500 means internal server error, if use "echo" the response code is 200
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}

exit();
?>
