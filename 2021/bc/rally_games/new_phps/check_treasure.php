<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    if ($_SERVER['REQUEST_METHOD'] == 'POST' 
    && isset($_POST['pulau_harta'])
    && isset($_POST['pengecekkan'])
    && isset($_SESSION['username'])) {
        $result = "tdk_ada";

        // AMBIL ID TEAM
        $sql_team = "SELECT * FROM team WHERE username = ?;";
        $stmt_team = $pdo->prepare($sql_team);
        $stmt_team->execute([$_SESSION['username']]);
        $row_team = $stmt_team->fetch();
        $id_team = $row_team['id'];

        // AMBIL ID TREASURE
        $sql = "SELECT * FROM `new_pulau` WHERE path = ? 
        AND treasure != '0'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['pulau_harta']]);
        $row = $stmt->fetch();
        $treasure = $row['treasure'];

        // CEK APAKAH TREASURE MASIH ADA
        if ($stmt->rowCount() != 0) {
            $result = "ada";
        }

        // PINDAH HARTA DARI PULAU KE INVENTORI
        if ($_POST['pengecekkan'] == 'harta' && $result == 'ada') {
            // HILANGKAN HARTA DARI PULAU
            $sql_pulau = "UPDATE `new_pulau` SET `treasure` = 0 
            WHERE path = ?";
            $stmt_pulau = $pdo->prepare($sql_pulau);
            $stmt_pulau->execute([$_POST['pulau_harta']]);

            // MASUKKAN CLUE HARTA KE INVENTORI
            $sql_cek = "SELECT * FROM team_resources WHERE id_team = ? 
            AND id_resource = ?";
            $stmt_cek = $pdo->prepare($sql_cek);
            $stmt_cek->execute([$id_team, $treasure]);
            if ($stmt_cek->rowCount() == 0) {
                $sql_inventori = "INSERT INTO `team_resources`( `id_resource`, `count`, `id_team`) VALUES (?,1,?)";
                $stmt_inventori = $pdo->prepare($sql_inventori);
                $stmt_inventori->execute([$treasure, $id_team]);
            } else {
                $sql_inventori = "UPDATE team_resources 
                SET count = (SELECT count+1 FROM team_resources 
                            WHERE id_resource = ? AND id_team = ?)
                            WHERE id_resource = ? AND id_team = ?";
                $stmt_inventori = $pdo->prepare($sql_inventori);
                $stmt_inventori->execute([$treasure, $treasure, $id_team]);
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