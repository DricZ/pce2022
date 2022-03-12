<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    if ($_SERVER['REQUEST_METHOD'] == 'POST' 
    && isset($_SESSION['username']) 
    && isset($_POST['pulau_tujuan'])
    && isset($_POST['pulau_skrg'])) {
        $result = ["tiket"];

        // LIST JEMBATAN YG TERHUBUNG KE PULAU SAAT INI
        $sql = "SELECT p.path AS pulau1, p2.path AS pulau2, 
        tj.nama AS tipe, tj.gambar AS gambar_jembatan
        FROM new_jembatan j
        JOIN team t ON j.id_team = t.id
        JOIN new_pulau p ON p.id = j.id_pulau1
        JOIN new_pulau p2 ON p2.id = j.id_pulau2
        JOIN new_tipe_jembatan tj ON tj.id = j.id_tipe
        WHERE t.id_lokasi = j.id_pulau1 
        OR t.id_lokasi = j.id_pulau2;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $arr_jembatan = array();
        while($row = $stmt->fetch()) {
            array_push($arr_jembatan, $row);
        }
        // contoh hasil $arr_jembatan:
        // 0: {pulau1: 'path1246', pulau2: 'path674', tipe: 'kayu', gambar_jembatan: 'jembatan kayu tampak atas-01.png'}
        // 1: {pulau1: 'path1246', pulau2: 'path686', tipe: 'kayu', gambar_jembatan: 'jembatan kayu tampak atas-01.png'}
        // 2: {pulau1: 'path1246', pulau2: 'path678', tipe: 'kayu', gambar_jembatan: 'jembatan kayu tampak atas-01.png')
    
        $pulau_ditemukan = false;
        for ($i=0; $i < sizeof($arr_jembatan); $i++) { 
            if ($_POST['pulau_tujuan'] == $arr_jembatan[$i]['pulau1'] ||
                $_POST['pulau_tujuan'] == $arr_jembatan[$i]['pulau2']) { // JIKA DARI LIST ADA PULAU TUJUAN
                $result = ["jembatan", $arr_jembatan[$i]['tipe'], $arr_jembatan[$i]['gambar_jembatan']];
                $pulau_ditemukan = true;
                break;
            }
        }

        if ($pulau_ditemukan == false) { // JIKA PULAU TUJUAN TDK TERHUBUNG JEMBATAN
            // CEK INVENTORI
            $sql_inventory = "SELECT * 
            FROM `team_resources` tr
            JOIN team t ON tr.id_team = t.id
            WHERE tr.id_resource = 6 AND username = ?;";
            $stmt_inventory = $pdo->prepare($sql_inventory);
            $stmt_inventory->execute([$_SESSION['username']]);
            $row_inventory = $stmt_inventory->fetch();
            if ($row_inventory['count'] > 0) { // JIKA PUNYA TIKET PESAWAT
                $result = ["tiket"];
            }
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