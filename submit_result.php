<?php
header('Content-Type: text/plain; charset=utf-8');

// Database config - update with your values
$host = 'localhost';
$db   = 'licentasondaj';
$user = 'hjakshdjkha1123';
$pass = 'vahGk2YWrL617ovbsix1';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo "Database connection failed.";
    exit;
}

// Check POST data
if (!isset($_POST['result'])) {
    http_response_code(400);
    echo "Missing 'result' parameter.";
    exit;
}

$jsonContent = $_POST['result'];

// Validate JSON (optional but recommended)
if (json_decode($jsonContent) === null && json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo "Invalid JSON data.";
    exit;
}

// Generate unique code: random number + timestamp
$code = mt_rand(100000, 999999) . time();

try {
    $stmt = $pdo->prepare("INSERT INTO results (code, content) VALUES (:code, :content)");
    $stmt->execute([
        ':code' => $code,
        ':content' => $jsonContent
    ]);

    // Return the code as plain text
    echo $code;
} catch (PDOException $e) {
    http_response_code(500);
    echo "Database insert failed.";
    exit;
}
