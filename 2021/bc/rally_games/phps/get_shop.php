<?php
require_once 'connect.php';
header("Content-Type: application/json");
// nama, image, stok, harga
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SESSION['kota'])) {
    $sql = "SELECT b.resource_name as nama, a.price as harga, a.stock as stok, b.image as image, x.money as uang FROM city_resource a JOIN resource b ON
     a.id_resource = b.id JOIN city d ON a.id_city = d.id JOIN team x ON x.location_now_id_city = a.id_city WHERE d.city_name = ? AND x.username = ? AND b.resource_name NOT LIKE 'Bom%' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_SESSION['kota'], $_SESSION['username']]);
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