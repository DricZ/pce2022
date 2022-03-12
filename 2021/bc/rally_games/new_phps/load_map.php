<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SESSION['username'])) {
        $pulau_hancur = array();
        $jembatan_hancur = array();
        $pulau_ban = array();

        // HANCURKAN PULAU
        $sql = "SELECT * FROM new_pulau WHERE nama = 'hancur'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch()) {
            array_push($pulau_hancur, $row);
        }

        // HANCURKAN JEMBATAN
        for ($i=0; $i < sizeof($pulau_hancur); $i++) { 
            $sql_bridge = "SELECT * FROM new_jembatan WHERE id_pulau1 = ? OR id_pulau2 = ?";
            $stmt_bridge = $pdo->prepare($sql_bridge);
            $stmt_bridge->execute([$pulau_hancur[$i]["id"], $pulau_hancur[$i]["id"]]);
            while($row = $stmt_bridge->fetch()) {
                array_push($jembatan_hancur, $row);
            }
        }

        // BAN PULAU
        $sql_tbl = "SELECT * FROM new_pulau WHERE kepemilikan != 0";
        $stmt_tbl = $pdo->prepare($sql_tbl);
        $stmt_tbl->execute();
        while($row = $stmt_tbl->fetch()) {
            array_push($pulau_ban, $row);
        }

        echo json_encode([$pulau_hancur, $jembatan_hancur, $pulau_ban]);
    } else {
        header("HTTP/1.1 400 Bad Request");
        $error = array(
            'error' => 'Method not Allowed'
        );
        echo json_encode($error);
    }
?>