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
        //ambil barang dari inventory
        $sql_inventory = "SELECT * FROM team_resource WHERE id_team = ?;";
        $stmt_inventory = $pdo->prepare($sql_inventory);
        $stmt_inventory->execute([$id_team]);
        $row_inventory = array();
        while($row = $stmt_inventory->fetch()) {
            array_push($row_inventory,$row);
        }
        $cek =0;
        for ($i=0; $i < sizeof($row_inventory); $i++) { 
            if($row_inventory[$i]['id_resource'] == 13 
            and $row_inventory[$i]['count'] >= 2 ){
                $cek ++;
            }
            if($row_inventory[$i]['id_resource'] == 14 
            and $row_inventory[$i]['count'] >= 1 ){
                $cek ++;
            }
            if($row_inventory[$i]['id_resource'] == 15 
            and $row_inventory[$i]['count'] >= 1 ){
                $cek ++;
            }
            if($row_inventory[$i]['id_resource'] == 16 
            and $row_inventory[$i]['count'] >= 1 ){
                $cek ++;
            }
            if($row_inventory[$i]['id_resource'] == 17 
            and $row_inventory[$i]['count'] >= 1 ){
                $cek ++;
            }
        }
        if ($cek == 5 and $_POST['cash']>= 6000) {
            $sql = "UPDATE team_resources SET count =
            (SELECT count+1 FROM team_resources 
            WHERE id_resource=?)
            WHERE id_resource = ? AND id_team =?;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_resource,$id_resource,$id_team]);
            //mengurangi bahan
            $sql_korek = "UPDATE team_resources SET count =
            (SELECT count-2 FROM team_resources 
            WHERE id_resource=13)
            WHERE id_resource = 13 AND id_team =?;";
            $stmt_korek = $pdo->prepare($sql_korek);
            $stmt_korek->execute([$id_team]);

            $sql_hcl = "UPDATE team_resources SET count =
            (SELECT count-1 FROM team_resources 
            WHERE id_resource=14)
            WHERE id_resource = 14 AND id_team =?;";
            $stmt_hcl = $pdo->prepare($sql_hcl);
            $stmt_hcl->execute([$id_team]);

            $sql_belerang = "UPDATE team_resources SET count =
            (SELECT count-1 FROM team_resources 
            WHERE id_resource=15)
            WHERE id_resource = 15 AND id_team =?;";
            $stmt_belerang = $pdo->prepare($sql_belerang);
            $stmt_belerang->execute([$id_team]);

            $sql_styrofoam = "UPDATE team_resources SET count =
            (SELECT count-1 FROM team_resources 
            WHERE id_resource=16)
            WHERE id_resource = 16 AND id_team =?;";
            $stmt_styrofoam = $pdo->prepare($sql_styrofoam);
            $stmt_styrofoam->execute([$id_team]);

            $sql_black_powder = "UPDATE team_resources SET count =
            (SELECT count-1 FROM team_resources 
            WHERE id_resource=17)
            WHERE id_resource = 17 AND id_team =?;";
            $stmt_black_powder = $pdo->prepare($sql_black_powder);
            $stmt_black_powder->execute([$id_team]);
            //kurang uang
            $sql_money = "UPDATE team SET money=
            (SELECT money-6000 FROM team WHERE id=?) WHERE id = ?;";
            $stmt_money = $pdo->prepare($sql_money);
            $stmt_money->execute([$id_team,$id_team]);

        }
  //update bom dalam team_reso7rce
     
       
        echo json_encode("berhasil");

        
    } else {
        header("HTTP/1.1 400 Bad Request");
        $error = array(
            'error' => 'Method not Allowed'
        );
        echo json_encode($error);
    }
    // 
        // $sql_resource = "SELECT * FROM resource WHERE resource_name = ?;";
        // $stmt_resource = $pdo->prepare($sql_resource);
        // $stmt_resource->execute([$_POST['item']]);
        // $row_resource = $stmt_resource->fetch();
        // $id_resource = $row_resource['id'];
?>