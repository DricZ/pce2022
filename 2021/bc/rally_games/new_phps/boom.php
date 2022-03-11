<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // ambil id team
        $sql_team = "SELECT * FROM team WHERE username = ?;";
        $stmt_team = $pdo->prepare($sql_team);
        $stmt_team->execute([$_SESSION['username']]);
        $row_team = $stmt_team->fetch();
        $id_team = $row_team['id'];
        // ambil barang dari inventory
        $sql_inventory = "SELECT * FROM team_resources WHERE id_team = ?;";
        $stmt_inventory = $pdo->prepare($sql_inventory);
        $stmt_inventory->execute([$id_team]);
        $row_inventory = array();
        while($row = $stmt_inventory->fetch()) {
            array_push($row_inventory,$row);
        }
        
        $korek;
        $hcl;
        $belerang;
        $styrofoam;
        $blackpowder;
        $harga;
        $idboom;
        if ($_POST['item']== 'Bom Lvl 1'){
            $korek =2;
            $hcl =1;
            $belerang =1 ;
            $styrofoam =1;
            $blackpowder =1;
            $harga =6000;
            $idboom = 7;
        }
        elseif ($_POST['item']== 'Bom Lvl 2'){
            $blackpowder =1;
            $belerang =1 ;
            $hcl = 2;
            $styrofoam =2 ;
            $korek = 3;
            $harga = 10000;
            $idboom = 8;
        }
        elseif ($_POST['item']== 'Bom Lvl 3'){
            $blackpowder =2;
            $belerang =2 ;
            $hcl =3;
            $styrofoam =3 ;
            $korek = 4;
            $harga = 14250;
            $idboom = 9;
        }
        elseif ($_POST['item']== 'Bom Lvl 4'){
            $blackpowder =2;
            $belerang =3 ;
            $hcl = 3;
            $styrofoam =4 ;
            $korek = 4;
            $harga = 16750;
            $idboom = 10;
        }
        elseif ($_POST['item']== 'Bom Lvl 5'){
            $blackpowder =3;
            $belerang =4 ;
            $hcl = 4;
            $styrofoam =4 ;
            $korek = 5;
            $harga = 18500;
            $idboom = 11;
        }
        elseif ($_POST['item']== 'Bom Lvl 6'){
            $blackpowder =3;
            $belerang =5 ;
            $hcl = 6;
            $styrofoam =3 ;
            $korek = 6;
            $harga = 22250;
            $idboom = 12;
        }
        $cek =0;
        for ($i=0; $i < sizeof($row_inventory); $i++) { 
            if($row_inventory[$i]['id_resource'] == 13 
            and $row_inventory[$i]['count'] >= $korek ){
                $cek ++;
            }
            if($row_inventory[$i]['id_resource'] == 14 
            and $row_inventory[$i]['count'] >= $hcl ){
                $cek ++;
            }
            if($row_inventory[$i]['id_resource'] == 15 
            and $row_inventory[$i]['count'] >= $belerang ){
                $cek ++;
            }
            if($row_inventory[$i]['id_resource'] == 16 
            and $row_inventory[$i]['count'] >= $styrofoam ){
                $cek ++;
            }
            if($row_inventory[$i]['id_resource'] == 17 
            and $row_inventory[$i]['count'] >= $blackpowder ){
                $cek ++;
            }
        }
        if ($cek == 5 and $row_team['money']>= $harga) {
            $sql_cekbom = "SELECT * FROM team_resources WHERE id_team = ? and id_resource= ?;";
            $stmt_cekbom = $pdo->prepare($sql_cekbom);
            $stmt_cekbom->execute([$id_team,$idboom]);  
            
            if ($stmt_cekbom->rowCount() == 0) {
                $sql = "INSERT INTO `team_resources`( `id_resource`, `count`, `id_team`) VALUES (?,1,?);";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$idboom,$id_team]);
                $result = "masuk if";
            } else {
                $sql = "UPDATE team_resources SET count =
                (SELECT count+1 FROM team_resources 
                WHERE id_resource=? And id_team = ?)
                WHERE id_resource = ? AND id_team =?;";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$idboom,$id_team,$idboom,$id_team]);
                $result = "masuk else";
            } 
            //mengurangi bahan
            $sql_korek = "UPDATE team_resources SET count =
            (SELECT count-? FROM team_resources 
            WHERE id_resource=13 And id_team =?)
            WHERE id_resource = 13 AND id_team =?;";
            $stmt_korek = $pdo->prepare($sql_korek);
            $stmt_korek->execute([$korek,$id_team,$id_team]);

            $sql_hcl = "UPDATE team_resources SET count =
            (SELECT count-? FROM team_resources 
            WHERE id_resource=14 AND id_team =?)
            WHERE id_resource = 14 AND id_team =?;";
            $stmt_hcl = $pdo->prepare($sql_hcl);
            $stmt_hcl->execute([$hcl,$id_team,$id_team]);

            $sql_belerang = "UPDATE team_resources SET count =
            (SELECT count-? FROM team_resources 
            WHERE id_resource=15 AND id_team=?)
            WHERE id_resource = 15 AND id_team =?;";
            $stmt_belerang = $pdo->prepare($sql_belerang);
            $stmt_belerang->execute([$belerang,$id_team,$id_team]);

            $sql_styrofoam = "UPDATE team_resources SET count =
            (SELECT count-? FROM team_resources 
            WHERE id_resource=16 AND id_team =?)
            WHERE id_resource = 16 AND id_team =?;";
            $stmt_styrofoam = $pdo->prepare($sql_styrofoam);
            $stmt_styrofoam->execute([$styrofoam,$id_team,$id_team]);

            $sql_black_powder = "UPDATE team_resources SET count =
            (SELECT count-? FROM team_resources 
            WHERE id_resource=17 AND id_team =?)
            WHERE id_resource = 17 AND id_team =?;";
            $stmt_black_powder = $pdo->prepare($sql_black_powder);
            $stmt_black_powder->execute([$blackpowder,$id_team,$id_team]);
            //kurang uang
            $sql_money = "UPDATE team SET money=
            (SELECT money-? FROM team WHERE id=?) WHERE id = ?;";
            $stmt_money = $pdo->prepare($sql_money);
            $stmt_money->execute([$harga,$id_team,$id_team]);
           
        }
        else {
            if($cek < 5 and $row_team['money'] <$harga){
                $result = 1;
            }
            else if($row_team['money'] <$harga) {
                $result = 2;
            }
            else  {
                $result = 3;
            }

        }
  //update bom dalam team_reso7rce
        echo json_encode($result);
    } else {
        header("HTTP/1.1 400 Bad Request");
        $error = array(
            'error' => 'Method not Allowed'
        );
        echo json_encode($error);
    }
?>