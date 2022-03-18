<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' 
    && isset($_SESSION['username']) 
    && isset($_POST['id_tipe']) 
    && isset($_POST['id_jembatan'])){
        $result = 0;

        // AMBIL ID TEAM
        $sql_team = "SELECT * FROM team WHERE username = ?;";
        $stmt_team = $pdo->prepare($sql_team);
        $stmt_team->execute([$_SESSION['username']]);
        $row_team = $stmt_team->fetch();
        $id_team = $row_team['id'];

        // AMBIL BARANG DI INVENTORY
        $sql_inventory = "SELECT * FROM team_resources WHERE id_team = ?;";
        $stmt_inventory = $pdo->prepare($sql_inventory);
        $stmt_inventory->execute([$id_team]);
        $row_inventory = array();
        while($row = $stmt_inventory->fetch()) {
            array_push($row_inventory,$row);
        }

        // SET BAHAN YG DIPERLUKAN
        $pekerja = 0; $besi = 0; $kayu = 0;
        $semen = 0; $pasir = 0; $baja = 0;
        $harga = 0;
        if ($_POST['id_tipe']== '1') {
            $pekerja = 1; $kayu = 3;
            $harga = 5000;
        } elseif ($_POST['id_tipe']== '2') {
            $pekerja = 2; $besi = 2; $kayu = 1;
            $semen = 1; $pasir = 1;
            $harga = 10750;
        } elseif ($_POST['id_tipe']== '3') {
            $pekerja = 2; $besi = 3; $kayu = 2;
            $semen = 3; $pasir = 2;
            $harga = 18000;
        }
        
        $cek = 0;
        for ($i=0; $i < sizeof($row_inventory); $i++) { 
            if ($row_inventory[$i]['id_resource'] == 1 
            and $row_inventory[$i]['count'] >= $kayu) {
                $cek ++;
            }
            if ($row_inventory[$i]['id_resource'] == 2 
            and $row_inventory[$i]['count'] >= $besi) {
                $cek ++;
            }
            if ($row_inventory[$i]['id_resource'] == 3 
            and $row_inventory[$i]['count'] >= $semen) {
                $cek ++;
            }
            if ($row_inventory[$i]['id_resource'] == 4 
            and $row_inventory[$i]['count'] >= $pasir) {
                $cek ++;
            }
            if ($row_inventory[$i]['id_resource'] == 5 
            and $row_inventory[$i]['count'] >= $pekerja) {
                $cek ++;
            }
        }

        if ($cek == 5 and $row_team['money']>= $harga) {
            //mengurangi bahan
            $sql_kayu = "UPDATE team_resources AS a
            INNER JOIN team_resources AS b ON a.id = b.id
            SET a.count = b.count- ?
            WHERE a.id_resource = 1 AND a.id_team = ? 
            AND b.id_resource = 1 AND b.id_team = ?";
            
            $stmt_kayu = $pdo->prepare($sql_kayu);
            $stmt_kayu->execute([$kayu, $id_team, $id_team]);

            $sql_baja = "UPDATE team_resources AS a
            INNER JOIN team_resources AS b ON a.id = b.id
            SET a.count = b.count-?
            WHERE a.id_resource = 2 AND a.id_team = ? 
            AND b.id_resource = 2 AND b.id_team = ?";
            $stmt_baja = $pdo->prepare($sql_baja);
            $stmt_baja->execute([$baja, $id_team, $id_team]);

            $sql_semen = "UPDATE team_resources AS a
            INNER JOIN team_resources AS b ON a.id = b.id
            SET a.count = b.count-?
            WHERE a.id_resource = 3 AND a.id_team = ? 
            AND b.id_resource = 3 AND b.id_team = ?";
            $stmt_semen = $pdo->prepare($sql_semen);
            $stmt_semen->execute([$semen, $id_team, $id_team]);

            $sql_pasir = "UPDATE team_resources AS a
            INNER JOIN team_resources AS b ON a.id = b.id
            SET a.count = b.count-?
            WHERE a.id_resource = 4 AND a.id_team = ? 
            AND b.id_resource = 4 AND b.id_team = ?";
            $stmt_pasir = $pdo->prepare($sql_pasir);
            $stmt_pasir->execute([$pasir, $id_team, $id_team]);

            $sql_pekerja = "UPDATE team_resources AS a
            INNER JOIN team_resources AS b ON a.id = b.id
            SET a.count = b.count-?
            WHERE a.id_resource = 5 AND a.id_team = ? 
            AND b.id_resource = 5 AND b.id_team = ?";
            $stmt_pekerja = $pdo->prepare($sql_pekerja);
            $stmt_pekerja->execute([$pekerja, $id_team, $id_team]);
            
            //kurang uang
            $sql_money = "UPDATE team AS a
            INNER JOIN team AS b ON a.id = b.id
            SET a.money = b.money-?
            WHERE a.username = ? AND b.username = ?";
            $stmt_money = $pdo->prepare($sql_money);
            $stmt_money->execute([$harga, $_SESSION['username'], $_SESSION['username']]);

            $updateidpoinksql = "UPDATE team AS a
            INNER JOIN team AS b ON a.id = b.id
            SET a.point = b.point+?
            WHERE a.id = ? AND b.id = ?";
            $updateidpoinkstmt = $pdo->prepare($updateidpoinksql);

            define('TIMEZONE', 'Asia/Jakarta');
            date_default_timezone_set(TIMEZONE);
            $timestamp = date("d-m-Y H:i:s");

            //ambil nama jembatan 
            $sqlnama = "SELECT * FROM new_tipe_jembatan WHERE id = ?;";
            $stmtnama = $pdo->prepare($sqlnama);
            $stmtnama->execute([$_POST['id_tipe']]);
            $rownama = $stmtnama->fetch();
            $nama = $rownama['nama'];
            
            if ($_POST['id_tipe'] == 1){
                $updateidpoinkstmt->execute([10, $row_team['id'], $row_team['id']]);
                $sqlhistory ="INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL,?,10,?,?)";
                $stmthistory = $pdo->prepare($sqlhistory);
                $stmthistory->execute([$id_team, $timestamp,$nama]);
            }
            else if ($_POST['id_tipe'] == 2){
                $updateidpoinkstmt->execute([30, $row_team['id'], $row_team['id']]);
                $sqlhistory ="INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL,?,30,?,?)";
                $stmthistory = $pdo->prepare($sqlhistory);
                $stmthistory->execute([$id_team, $timestamp,$nama]);
            }
            else{
                $updateidpoinkstmt->execute([50, $row_team['id'], $row_team['id']]);
                $sqlhistory ="INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL,?,50,?,?)";
                $stmthistory = $pdo->prepare($sqlhistory);
                $stmthistory->execute([$id_team, $timestamp,$nama]);
            }

            // UPDATE JEMBATAN
            $updateidTeamsql = "UPDATE new_jembatan SET id_team = ?, id_tipe = ? WHERE nama = ?";
            $updateidTeamstmt = $pdo->prepare($updateidTeamsql);
            $updateidTeamstmt->execute([$row_team['id'], $_POST['id_tipe'], $_POST['id_jembatan']]);  

            
        } else {
            if ($cek < 5 and $row_team['money'] < $harga) {
                $result = 1;
            } else if ($row_team['money'] < $harga) {
                $result = 2;
            } else  {
                $result = 3;
            }
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