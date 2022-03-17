<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' 
    && isset($_SESSION['username']) && isset($_POST['id_tipe']) 
    && isset($_POST['id_jembatan'])){
        $result = 0;

        // AMBIL ID TEAM
        $sql_team = "SELECT * FROM team WHERE username = ?;";
        $stmt_team = $pdo->prepare($sql_team);
        $stmt_team->execute([$_SESSION['username']]);
        $row_team = $stmt_team->fetch();
        $id_team = $row_team['id'];

        $sql_jembatan = "SELECT * FROM new_jembatan WHERE nama = ?;";
        $stmt_jembatan = $pdo->prepare($sql_jembatan);
        $stmt_jembatan->execute([$_POST['id_jembatan']]);
        $row_jembatan = $stmt_jembatan->fetch();
        $id_tipe = $row_jembatan['id_tipe'];

        $harga = 0;

        if ($id_tipe== '1') {
            $harga = 8500;
        } else if ($id_tipe== '2') {
            $harga = 15250;
        } else if ($id_tipe== '3') {
            $harga = 23500;
        }
        
        if ($row_team['money']>= $harga) {
            //kurang uang
            $sql_money = "UPDATE team SET money =
            (SELECT money-? FROM team 
            WHERE username = ?) 
            WHERE username = ?";
            $stmt_money = $pdo->prepare($sql_money);
            $stmt_money->execute([$harga, $_SESSION['username'], $_SESSION['username']]);

            $updateidpoinksql = "UPDATE team SET point = (SELECT point + ? FROM team WHERE id = ?) WHERE id = ?";
            $updateidpoinkstmt = $pdo->prepare($updateidpoinksql);

            if ($id_tipe == '1'){
                $updateidpoinkstmt->execute([20, $row_team['id'], $row_team['id']]);
            }
            else if ($id_tipe == '2'){
                $updateidpoinkstmt->execute([40, $row_team['id'], $row_team['id']]);
            }
            else{
                $updateidpoinkstmt->execute([60, $row_team['id'], $row_team['id']]);
            }

            // UPDATE JEMBATAN
            $updateidTeamsql = "UPDATE new_jembatan SET proteksi = 1 WHERE nama = ?";
            $updateidTeamstmt = $pdo->prepare($updateidTeamsql);
            $updateidTeamstmt->execute([$_POST['id_jembatan']]);  
            
        } else {
            if ($row_team['money'] < $harga) {
                $result = 1;
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