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

        if ($_POST['transportasi'] == 'tiket') {
            // KURANGI TIKET PESAWAT DI INVENTORI
            $sql_inventory = "UPDATE team_resources tr
            SET tr.count = (SELECT tr.count-1
                        FROM team_resources tr
                        WHERE tr.id_resource = 6
                        AND tr.id_team = 1)
            WHERE tr.id_resource = 6
            AND tr.id_team = ?";
            $stmt_inventory = $pdo->prepare($sql_inventory);
            $stmt_inventory->execute([$id_team]);
        }

        // PINDAH LOKASI TEAM SEKARANG
        $sql_pindah = "UPDATE team t
        SET t.location_now_id_city = (SELECT p.id
                                     FROM new_pulau p
                                     WHERE p.path = ?)
        WHERE t.username = ?";
        $stmt_pindah = $pdo->prepare($sql_pindah);
        $stmt_pindah->execute([$_POST['pulau_tujuan'], $_SESSION['username']]);

        echo json_encode($_POST['pulau_tujuan']);
    } else {
        header("HTTP/1.1 400 Bad Request");
        $error = array(
            'error' => 'Method not Allowed'
        );
        echo json_encode($error);
    }
?>