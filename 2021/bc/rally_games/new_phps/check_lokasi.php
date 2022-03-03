<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    if ($_SERVER['REQUEST_METHOD'] == 'POST' 
    && isset($_SESSION['username']) 
    && isset($_POST['pulau_tujuan'])
    && isset($_POST['pulau_skrg'])) {
        $result = "kosong";

        // LIST JEMBATAN YG TERHUBUNG KE PULAU SAAT INI
        $sql = "SELECT p.path AS pulau1, p2.path AS pulau2, 
        tj.nama AS tipe, tj.gambar AS gambar_jembatan
        FROM new_jembatan j
        JOIN team t ON j.id_team = t.id
        JOIN new_pulau p ON p.id = j.id_pulau1
        JOIN new_pulau p2 ON p2.id = j.id_pulau2
        JOIN new_tipe_jembatan tj ON tj.id = j.id_tipe
        WHERE t.location_now_id_city = j.id_pulau1 
        OR t.location_now_id_city = j.id_pulau2;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();

        // JIKA DARI LIST ADA PULAU TUJUAN
        if ($_POST['pulau_tujuan'] == $row['pulau1'] ||
        $_POST['pulau_tujuan'] == $row['pulau2']) {
            $result = ["jembatan", $row['tipe'], $row['gambar_jembatan']];
        } else {
            // cek inventori
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