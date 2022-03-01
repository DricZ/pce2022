<?php
require_once 'connect.php';
header("Content-Type: application/json");
// nama, image, stok, harga
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM new_jembatan j 
    JOIN team t ON j.id_team = t.id 
    JOIN new_tipe_jembatan tj ON tj.id_tipe_j = j.id_tipe_j
    WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_SESSION['username']]);
    $result = array();
    while($row = $stmt->fetch()) {
        array_push($result, $row);
    }
    echo json_encode($result);
} else {
    header("HTTP/1.1 400 Bad Request");
    $error = array(
        'error' => 'Method not Allowed'
    );
    echo json_encode($error);
}