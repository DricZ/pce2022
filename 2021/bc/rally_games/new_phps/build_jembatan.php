<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' 
    && isset($_POST['id_jembatan'])){
        $sql = "SELECT j.nama as nama_jembatan, t.username as username, j.id_tipe AS tipe_jembatan, t.team_name AS nama_tim, j.id_team
        FROM new_jembatan j 
        JOIN team t ON j.id_team = t.id 
        JOIN new_tipe_jembatan tj ON j.id_tipe = tj.id
        WHERE j.nama = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST["id_jembatan"]]);
        $result = array();
        while($row = $stmt->fetch()) {
            array_push($result, $row);
        }
        echo json_encode($result);
    }
    
    else {
        header("HTTP/1.1 400 Bad Request");
        $error = array(
            'error' => 'Method not Allowed'
        );
        echo json_encode($error);
    }
    
?>