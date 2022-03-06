<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // nama_jembatan = id path, di test_map.php
        $sql_team = "SELECT * FROM team WHERE username = ?;";
        $stmt_team = $pdo->prepare($sql_team);
        $stmt_team->execute([$_SESSION['username']]);
        $row_team = $stmt_team->fetch();
        $id_team = $row_team['id'];
        
        //update 2 kali bahan 
        
            $sql_kayu = "UPDATE team_resources SET count =
            (SELECT count*2 FROM team_resources 
            WHERE id_resource=1)
            WHERE id_resource =1 AND id_team =?;";
            $stmt_kayu = $pdo->prepare($sql_kayu);
            $stmt_kayu->execute([$id_team]);

            $sql_baja = "UPDATE team_resources SET count =
            (SELECT count*2 FROM team_resources 
            WHERE id_resource=2)
            WHERE id_resource =2 AND id_team =?;";
            $stmt_baja = $pdo->prepare($sql_baja);
            $stmt_baja->execute([$id_team]);

            $sql_semen = "UPDATE team_resources SET count =
            (SELECT count*2 FROM team_resources 
            WHERE id_resource=3)
            WHERE id_resource =3 AND id_team =?;";
            $stmt_semen = $pdo->prepare($sql_semen);
            $stmt_semen->execute([$id_team]);

            $sql_pasir = "UPDATE team_resources SET count =
            (SELECT count*2 FROM team_resources 
            WHERE id_resource=4)
            WHERE id_resource =4 AND id_team =?;";
            $stmt_pasir = $pdo->prepare($sql_pasir);
            $stmt_pasir->execute([$id_team]);
    } else {
        header("HTTP/1.1 400 Bad Request");
        $error = array(
            'error' => 'Method not Allowed'
        );
        echo json_encode($error);
    }

?>