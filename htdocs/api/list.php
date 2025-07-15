<?php
header('Content-Type: application/json');

require_once(__DIR__ . '/../backend/config.php');

try {
    $pdo = getPDO();
    $stmt = $pdo->query('SELECT name, comment, created_at FROM posts ORDER BY created_at DESC');
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'success' => true,
        'comments' => $comments
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => '失敗'
    ]);
}