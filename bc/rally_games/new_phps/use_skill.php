<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    if ($_SERVER['REQUEST_METHOD'] == 'POST' 
    and isset($_POST['skill'])) {
        $result='kosong';

        // AMBIL ID TEAM
        $sql_team = "SELECT * FROM team WHERE username = ?";
        $stmt_team = $pdo->prepare($sql_team);
        $stmt_team->execute([$_SESSION['username']]);
        $row_team = $stmt_team->fetch();
        $id_team = $row_team['id'];
        
        //AMBIL ID PULAU
        if (isset($_POST['pulau'])) {
            $sql_pulau = "SELECT * FROM new_pulau WHERE path = ?";
            $stmt_pulau = $pdo->prepare($sql_pulau);
            $stmt_pulau->execute([$_POST['pulau']]);
            $row_pulau = $stmt_pulau->fetch();
            $id_pulau = $row_pulau['id'];
        }
    
        if ($_POST['skill'] == 'Inventory Ganda') {
            // update 2 kali bahan
            // UPDATE team_resources AS a
            // INNER JOIN team_resources AS b ON a.id = b.id
            // SET a.count = b.count*2
            // WHERE a.id_resource = 1 AND a.id = ? AND b.id_resource = 1 AND b.id = ?
            $sql_kayu = "UPDATE team_resources AS a
            INNER JOIN team_resources AS b ON a.id = b.id
            SET a.count = b.count*2
            WHERE a.id_resource = 1 AND a.id_team = ? AND b.id_resource = 1 AND b.id_team = ?;";
            $stmt_kayu = $pdo->prepare($sql_kayu);
            $stmt_kayu->execute([$id_team, $id_team]);

            $sql_baja = "UPDATE team_resources AS a
            INNER JOIN team_resources AS b ON a.id = b.id
            SET a.count = b.count*2
            WHERE a.id_resource = 2 AND a.id_team = ?  AND b.id_resource = 2 AND b.id_team = ? ";
            $stmt_baja = $pdo->prepare($sql_baja);
            $stmt_baja->execute([$id_team, $id_team]);

            $sql_semen = "UPDATE team_resources AS a
            INNER JOIN team_resources AS b ON a.id = b.id
            SET a.count = b.count*2
            WHERE a.id_resource = 3 AND a.id_team = ?  AND b.id_resource = 3 AND b.id_team = ?;";
            $stmt_semen = $pdo->prepare($sql_semen);
            $stmt_semen->execute([$id_team, $id_team]);

            $sql_pasir = "UPDATE team_resources AS a
            INNER JOIN team_resources AS b ON a.id = b.id
            SET a.count = b.count*2
            WHERE a.id_resource = 4 AND a.id_team = ? AND b.id_resource = 4 AND b.id_team = ?;";
            $stmt_pasir = $pdo->prepare($sql_pasir);
            $stmt_pasir->execute([$id_team, $id_team]);
            // UPDATE team_resources AS a
            // INNER JOIN team_resources AS b ON a.id = b.id
            // SET a.count = b.count-1
            // WHERE a.id_resource = 24 AND a.id = ? AND b.id_resource = 24 AND b.id = ?
            $sql_inventory = "UPDATE team_resources AS a
            INNER JOIN team_resources AS b ON a.id = b.id
            SET a.count = b.count-1
            WHERE a.id_resource = 24 AND a.id_team = ? AND b.id_resource = 24 AND b.id_team = ?;";
            $stmt_inventory = $pdo->prepare($sql_inventory);
            $stmt_inventory->execute([$id_team, $id_team]);
            
        } else if ($_POST['skill'] == 'Boom Mega Boom') {
            // id_team = 0 
            // UPDATE new_jembatan AS a
            // INNER JOIN new_jembatan AS b ON a.id = b.id
            // SET a.id_team = 0
            // WHERE a.id_pulau1 = ? or a.id_pulau2 = ?  AND b.id_pulau1 = ? or a.id_pulau2 = ?
            $sql_idteam = "UPDATE new_jembatan AS a
            INNER JOIN new_jembatan AS b ON a.id = b.id
            SET a.id_team = 0
            WHERE a.id_pulau1 = ? or a.id_pulau2 = ?  AND b.id_pulau1 = ? or a.id_pulau2 = ?";
            $stmt_idteam = $pdo->prepare($sql_idteam);
            $stmt_idteam->execute([$id_pulau, $id_pulau,$id_pulau, $id_pulau]);

            // id tipe = 0
            $sql_idtipe = "UPDATE new_jembatan AS a
            INNER JOIN new_jembatan AS b ON a.id = b.id
            SET a.id_tipe = 0
            WHERE a.id_pulau1 = ? or a.id_pulau2 = ?  AND b.id_pulau1 = ? or a.id_pulau2 = ?";
            $stmt_idtipe = $pdo->prepare($sql_idtipe);
            $stmt_idtipe->execute([$id_pulau, $id_pulau,$id_pulau, $id_pulau]);

            $sql_inventory = "UPDATE team_resources AS a
            INNER JOIN team_resources AS b ON a.id = b.id
            SET a.count = b.count-1
            WHERE a.id_resource = 25 AND a.id_team = ? AND b.id_resource = 25 AND b.id_team = ?";
            $stmt_inventory = $pdo->prepare($sql_inventory);
            $stmt_inventory->execute([$id_team, $id_team]);
        } else if ($_POST['skill'] == 'TBL TBL TBL') {
            // isi id team ke kepemilikan
            // UPDATE new_pulau AS a
            // INNER JOIN new_pulau AS b ON a.id = b.id
            // SET a.kepemilikan = ?
            // WHERE a.id = ? AND  b.id = ?
            $sql_input_id = "UPDATE new_pulau AS a
            INNER JOIN new_pulau AS b ON a.id = b.id
            SET a.kepemilikan = ?
            WHERE a.id = ? AND  b.id = ?;";
            $stmt_input_id = $pdo->prepare($sql_input_id);
            $stmt_input__id->execute([$id_team,$id_pulau,$id_pulau]);
        } else if ($_POST['skill'] =='Meteor') {
            // update name hancur
            $sql_meteor = "UPDATE new_pulau AS a
            INNER JOIN new_pulau AS b ON a.id = b.id
            SET a.nama = 'hancur'
            WHERE a.id = ? AND  b.id = ?;";
            $stmt_meteor = $pdo->prepare($sql_meteor);
            $stmt_meteor->execute([$id_pulau,$id_pulau]);
        } else if ($_POST['skill'] == 'X2 Social Credits') {
            // updata earning team
            // UPDATE team AS a
            // INNER JOIN team AS b ON a.id = b.id
            // SET a.x2_earning = 1 
            // WHERE a.username = ? AND  b.username = ?
            $sql_earnings = "UPDATE team AS a
            INNER JOIN team AS b ON a.id = b.id
            SET a.x2_earning = 1 
            WHERE a.username = ? AND  b.username = ?";
            $stmt_earnings = $pdo->prepare($sql_earnings);
            $stmt_earnings->execute([$_SESSION['username'],$_SESSION['username']]);
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