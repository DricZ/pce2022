<?php
    $host = '127.0.0.1';
    $db = 'pcepetra_pce2021';
    $user = 'pcepetraac11';
    $pass = '3AZdwqazba!M';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset;";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw \PDOException($e->getMessage(), $e->getCode());
    }

    session_start();
?>