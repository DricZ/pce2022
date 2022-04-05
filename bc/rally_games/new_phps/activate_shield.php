<?php
// ubah nama pulau jadi shield
// jembatan sekitarnya jadi tipe 4
?>

<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pulau'])) {
        $result = "kosong";

        // AMBIL ID TEAM
        $sql_team = "SELECT * FROM team WHERE username = ?";
        $stmt_team = $pdo->prepare($sql_team);
        $stmt_team->execute([$_SESSION['username']]);
        $row_team = $stmt_team->fetch();
        $id_team = $row_team['id'];

        if ($row_team['money'] >= 50000) {
            $sql_money = "UPDATE team AS a
            INNER JOIN team AS b ON a.id = b.id
            SET a.money = b.money-50000
            WHERE a.id = ? AND b.id = ?";
            $stmt_money = $pdo->prepare($sql_money);
            $stmt_money->execute([$id_team, $id_team]);
    
            // AMBIL ID PULAU
            $sql_pulau = "SELECT * FROM new_pulau WHERE path = ?";
            $stmt_pulau = $pdo->prepare($sql_pulau);
            $stmt_pulau->execute([$_POST["pulau"]]);
            $row_pulau = $stmt_pulau->fetch();
            $id_pulau = $row_pulau['id'];
    
            // UPDATE NAMA PULAU JADI SHIELD
            $sql_shield = "UPDATE `new_pulau` SET nama='shield' WHERE id = ?";
            $stmt_shield = $pdo->prepare($sql_shield);
            $stmt_shield->execute([$id_pulau]);
    
            // LIST JEMBATAN YG ADA
            $sql_jembatan = "SELECT * FROM new_jembatan 
            WHERE id_pulau1 = ? OR id_pulau2 = ?";
            $stmt_jembatan = $pdo->prepare($sql_jembatan);
            $stmt_jembatan->execute([$id_pulau, $id_pulau]);
            $arr_jembatan = array();
            while($row = $stmt_jembatan->fetch()) {
                array_push($arr_jembatan, $row);
            }
    
            // UPDATE JEMBATAN JADI TIPE 4
            for ($i=0; $i < sizeof($arr_jembatan); $i++) { 
                $sql_upgrade = "UPDATE `new_jembatan` SET id_tipe=4 WHERE id = ?";
                $stmt_upgrade = $pdo->prepare($sql_upgrade);
                $stmt_upgrade->execute([$arr_jembatan[$i]['id']]);
            }        

            $result = "berhasil";
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