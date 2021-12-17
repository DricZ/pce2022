<?php
    include 'connect.php';

    header("Content-Type: application/json");

    $pendaftarsql = "SELECT * FROM `webinar` ORDER BY CASE WHEN confirmed_by = '' THEN 0 ELSE 1 END, id DESC";
    $pendaftarstmt = $pdo->prepare($pendaftarsql);
    $pendaftarstmt->execute();

    $result = array();
    while($row = $pendaftarstmt->fetch()){
        array_push($result, $row);
    }
    echo json_encode($result);
?>