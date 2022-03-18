<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' 
    && isset($_SESSION['username']) 
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

        // AMBIL ATRIBUT PROTEKSI NEW JEMBATAN
        $sql_jembatan = "SELECT * FROM new_jembatan WHERE nama = ?;";
        $stmt_jembatan = $pdo->prepare($sql_jembatan);
        $stmt_jembatan->execute([$_POST['id_jembatan']]);
        $row_jembatan = $stmt_jembatan->fetch();
        $proteksi = $row_jembatan['proteksi'];
        $id_tipe = $row_jembatan['id_tipe'];
       
        $cek = 0;

        for ($i=0; $i < sizeof($row_inventory); $i++) {

            if ($id_tipe== '1' and ($row_inventory[$i]['id_resource'] == 7 or $row_inventory[$i]['id_resource'] == 8) 
            and $row_inventory[$i]['count'] >= 1) {
                if ($proteksi == 1) {
                    $sql_bom2 = "UPDATE team_resources AS a
                    INNER JOIN team_resources AS b ON a.id = b.id
                    SET a.count = b.count-1
                    WHERE a.id_resource = 8 AND b.id_team = ?";

                    // $sql_bom2 = "UPDATE team_resources SET count =
                    // (SELECT count-1 FROM team_resources 
                    // WHERE id_resource = 8 AND id_team = ?)
                    // WHERE id_resource = 8 AND id_team = ?";

                    $stmt_bom2 = $pdo->prepare($sql_bom2);
                    $stmt_bom2->execute([$id_team]);

                    $cek++;
                }
                else {
                    $sql_bom1 = "UPDATE team_resources AS a
                    INNER JOIN team_resources AS b ON a.id = b.id
                    SET a.count = b.count-1
                    WHERE a.id_resource = 7 AND b.id_team = ?";

                    // $sql_bom1 = "UPDATE team_resources SET count =
                    // (SELECT count-1 FROM team_resources 
                    // WHERE id_resource = 7 AND id_team = ?)
                    // WHERE id_resource = 7 AND id_team = ?";

                    $stmt_bom1 = $pdo->prepare($sql_bom1);
                    $stmt_bom1->execute([$id_team]);    

                    $cek++;

                }
            } 
            
            else if ($id_tipe== '2' and ($row_inventory[$i]['id_resource'] == 9 or $row_inventory[$i]['id_resource'] == 10) 
            and $row_inventory[$i]['count'] >= 1) {
                if ($proteksi == 1) {
                    $sql_bom4 = "UPDATE team_resources AS a
                    INNER JOIN team_resources AS b ON a.id = b.id
                    SET a.count = b.count-1
                    WHERE a.id_resource = 10 AND b.id_team = ?";

                    // $sql_bom4 = "UPDATE team_resources SET count =
                    // (SELECT count-1 FROM team_resources 
                    // WHERE id_resource = 10 AND id_team = ?)
                    // WHERE id_resource = 10 AND id_team = ?";
                    $stmt_bom4 = $pdo->prepare($sql_bom4);
                    $stmt_bom4->execute([$id_team]);

                    $cek++;

                    }
                else {
                    $sql_bom3 = "UPDATE team_resources AS a
                    INNER JOIN team_resources AS b ON a.id = b.id
                    SET a.count = b.count-1
                    WHERE a.id_resource = 9 AND b.id_team = ?";

                    // $sql_bom3 = "UPDATE team_resources SET count =
                    // (SELECT count-1 FROM team_resources 
                    // WHERE id_resource = 9 AND id_team = ?)
                    // WHERE id_resource = 9 AND id_team = ?";
                    $stmt_bom3 = $pdo->prepare($sql_bom3);
                    $stmt_bom3->execute([$id_team]);

                    $cek++;

                }
            } 
            
            else if ($id_tipe== '3' and ($row_inventory[$i]['id_resource'] == 11 or $row_inventory[$i]['id_resource'] == 12) 
            and $row_inventory[$i]['count'] >= 1) {
                if ($proteksi == 1) {
                    $sql_bom6 = "UPDATE team_resources AS a
                    INNER JOIN team_resources AS b ON a.id = b.id
                    SET a.count = b.count-1
                    WHERE a.id_resource = 12 AND b.id_team = ?";

                    // $sql_bom6 = "UPDATE team_resources SET count =
                    // (SELECT count-1 FROM team_resources 
                    // WHERE id_resource = 12 AND id_team = ?)
                    // WHERE id_resource = 12 AND id_team = ?";

                    $stmt_bom6 = $pdo->prepare($sql_bom6);
                    $stmt_bom6->execute([$id_team]);

                    $cek++;

                }
                else {
                    $sql_bom1 = "UPDATE team_resources AS a
                    INNER JOIN team_resources AS b ON a.id = b.id
                    SET a.count = b.count-1
                    WHERE a.id_resource = 11 AND b.id_team = ?";

                    // $sql_bom5 = "UPDATE team_resources SET count =
                    // (SELECT count-1 FROM team_resources 
                    // WHERE id_resource = 11 AND id_team = ?)
                    // WHERE id_resource = 11 AND id_team = ?";
                    // $stmt_bom5 = $pdo->prepare($sql_bom5);
                    $stmt_bom5->execute([$id_team]);    
                    
                    $cek++;

                }
            }
        }

        if ($cek == 1) {
            // UPDATE JEMBATAN
            $updateidTeamsql = "UPDATE new_jembatan SET id_team = 0, id_tipe = 0, proteksi = 0 WHERE nama = ?";
            $updateidTeamstmt = $pdo->prepare($updateidTeamsql);
            $updateidTeamstmt->execute([$_POST['id_jembatan']]);  
        } else {
            $result = 1;
        }

        echo json_encode($cek);
    }

    else {
        header("HTTP/1.1 400 Bad Request");
        $error = array(
            'error' => 'Method not Allowed'
        );
        echo json_encode($error);
    }
    
?>