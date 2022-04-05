<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $sql = "SELECT j.nama as nama_jembatan, t.username as username, 
        j.id_tipe AS tipe_jembatan FROM new_jembatan j 
        JOIN team t ON j.id_team = t.id 
        JOIN new_tipe_jembatan tj ON j.id_tipe = tj.id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
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
    
?>