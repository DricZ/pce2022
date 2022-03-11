<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    if ($_SERVER['REQUEST_METHOD'] == 'POST'
    && isset($_POST['pulau_tujuan'])) {
        $sql_lokasi = "SELECT * FROM new_pulau WHERE path = ?";
        $stmt_lokasi = $pdo->prepare($sql_lokasi);
        $stmt_lokasi->execute([$_POST['pulau_tujuan']]);
        $row_pulau = $stmt_lokasi->fetch();
        $id_pulau = $row_pulau['id'];

        $sql = "SELECT team_name FROM team WHERE id_lokasi = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_pulau]);
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