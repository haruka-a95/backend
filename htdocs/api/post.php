<?php
header('Content-Type: application/json');

//PDO設定
require_once(__DIR__ . '/../backend/config.php');

// エラー表示（開発中のみ有効に）
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// POSTデータの受け取り
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

//validation
$errors = [];

if ($name === '') {
    $errors[] = '名前は必須です。';
}
if ($comment === '') {
    $errors[] = 'コメントは必須です。';
}

if (!empty($errors)) {
    echo json_encode([
        'success' => false,
        'errors' => $errors
    ]);
    exit;
}

// DB登録

$pdo = getPDO();

$stmt = $pdo->prepare('INSERT INTO posts (name, comment, created_at) VALUES (?, ?, NOW())');
$stmt->execute([$name, $comment]);

echo json_encode(['success' => true]);