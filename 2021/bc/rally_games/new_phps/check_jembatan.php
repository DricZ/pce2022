<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['username']) && isset($_POST['pulau'])) {
        // ngambil jembatan di pulau yg di post
        // ngambil jembatan di pulau yg di post yg id teamnya sesuai id tipe beton ke atas
        // jika length sama munculkan modal untuk buat shield pulau

        $result = "kosong";

        // AMBIL ID TEAM
        $sql_team = "SELECT * FROM team WHERE username = ?";
        $stmt_team = $pdo->prepare($sql_team);
        $stmt_team->execute([$_SESSION['username']]);
        $row_team = $stmt_team->fetch();
        $id_team = $row_team['id'];

        // AMBIL ID PULAU
        $sql_pulau = "SELECT * FROM new_pulau WHERE path = ?";
        $stmt_pulau = $pdo->prepare($sql_pulau);
        $stmt_pulau->execute([$_POST["pulau"]]);
        $row_pulau = $stmt_pulau->fetch();
        $id_pulau = $row_pulau['id'];

        // LIST JEMBATAN YG ADA
        $sql_jembatan = "SELECT * FROM new_jembatan 
        WHERE id_pulau1 = ? OR id_pulau2 = ?";
        $stmt_jembatan = $pdo->prepare($sql_jembatan);
        $stmt_jembatan->execute([$id_pulau, $id_pulau]);
        $arr_jembatan = array();
        while($row = $stmt_jembatan->fetch()) {
            array_push($arr_jembatan, $row);
        }

        // LIST JEMBATAN YG KITA PUNYA
        $sql_kita = "SELECT * FROM new_jembatan
        WHERE (id_pulau1 = ? OR id_pulau2 = ?) AND id_team = ? AND id_tipe = 3";
        $stmt_kita = $pdo->prepare($sql_kita);
        $stmt_kita->execute([$id_pulau, $id_pulau, $id_team]);
        $arr_kita = array();
        while($row = $stmt_kita->fetch()) {
            array_push($arr_kita, $row);
        }

        if (sizeof($arr_jembatan) == sizeof($arr_kita)) {
            $result = "tampilkan";
        }

        echo json_encode([$result, sizeof($arr_jembatan), sizeof($arr_kita)]);
    } else {
        header("HTTP/1.1 400 Bad Request");
        $error = array(
            'error' => 'Method not Allowed'
        );
        echo json_encode($error);
    }
    
?>