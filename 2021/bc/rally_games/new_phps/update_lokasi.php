<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    if ($_SERVER['REQUEST_METHOD'] == 'POST' 
    && isset($_SESSION['username']) 
    && isset($_POST['pulau_tujuan'])) {
        // AMBIL ID TEAM
        $sql_team = "SELECT * FROM team WHERE username = ?;";
        $stmt_team = $pdo->prepare($sql_team);
        $stmt_team->execute([$_SESSION['username']]);
        $row_team = $stmt_team->fetch();
        $id_team = $row_team['id'];

        // CEK TIKET
        $sql_tiket = "SELECT * FROM team_resources 
        WHERE id_team = ? AND id_resource = 6";
        $stmt_tiket = $pdo->prepare($sql_tiket);
        $stmt_tiket->execute([$id_team]);
        $row_tiket = $stmt_tiket->fetch();

        if ($row_tiket['count'] == 0) {
            echo json_encode("kurang");
        } else {
            if ($_POST['transportasi'] == 'tiket') {
                // KURANGI TIKET PESAWAT DI INVENTORI
                $sql_inventory = "UPDATE team_resources AS a
                INNER JOIN team_resources AS b ON a.id = b.id
                SET a.count = b.count-1
                WHERE a.id_resource = 6 AND a.id_team = ? 
                AND b.id_resource = 6 AND b.id_team = ?";
                $stmt_inventory = $pdo->prepare($sql_inventory);
                $stmt_inventory->execute([$id_team, $id_team]);
            }
    
            // PINDAH LOKASI TEAM SEKARANG
            $sql_pulau = "SELECT * FROM new_pulau WHERE path = ?";
            $stmt_pulau = $pdo->prepare($sql_pulau);
            $stmt_pulau->execute([$_POST['pulau_tujuan']]); 
            $row_pulau = $stmt_pulau->fetch();

            $sql_pindah = "UPDATE team SET id_lokasi = ? WHERE username = ?";
            $stmt_pindah = $pdo->prepare($sql_pindah);
            $stmt_pindah->execute([$row_pulau['id'], $_SESSION['username']]);

            echo json_encode($_POST['pulau_tujuan']);
        }
    } else {
        header("HTTP/1.1 400 Bad Request");
        $error = array(
            'error' => 'Method not Allowed'
        );
        echo json_encode($error);
    }
?>