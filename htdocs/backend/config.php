<?php

function getPDO() {
    $host = 'php8-1-mysql';
    $port = 3306;
    $db   = 'php_db';
    $user = 'root';
    $pass = 'root';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
    return new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
}

// const DB_HOST = 'php8-1-mysql';
// const DB_PORT = 3306;
// const DB_DATABASE = 'php_db';
// const DB_USERNAME = 'root';
// const DB_PASSWORD = 'root';
// const DB_CHARSET = 'utf8mb4';

// function getPDO() {
//     $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_DATABASE . ';charset=' . DB_CHARSET;

//     try {
//         return new PDO($dsn, DB_USERNAME, DB_PASSWORD, [
//             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//         ]);
//     } catch (PDOException $e) {

//         http_response_code(500);
//         echo json_encode([
//             'success' => false,
//             'message' => 'DB接続失敗: ' . $e->getMessage()
//         ]);
//         exit;
//     }
// }
