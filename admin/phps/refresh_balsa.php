<?php
    include 'connect.php';

    header("Content-Type: application/json");

    $pendaftarsql = "SELECT * FROM pendaftar WHERE (pilihan_lomba_1 IN ('bc-sma', 'bc-univ') OR pilihan_lomba_2 IN ('bc-sma', 'bc-univ') OR pilihan_lomba_3 IN ('bc-sma', 'bc-univ')) ORDER BY status DESC";
    $pendaftarstmt = $pdo->prepare($pendaftarsql);
    $pendaftarstmt->execute();

    $result = array();
    while($row = $pendaftarstmt->fetch()){
        array_push($result, $row);
    }
    echo json_encode($result);
?>