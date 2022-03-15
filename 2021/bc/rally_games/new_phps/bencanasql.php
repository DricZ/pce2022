<?php
    require_once 'connect.php';
    if (isset($_POST)) {
        $bencana = $_POST['bencana'];
        $area = $_POST['area'];
        $keterangan = $_POST['keterangan'];
        $pulau;
        $level;
        $sql = "SELECT id FROM new_pulau WHERE area =?;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$area]);
        $stmtrow = $stmt->fetch();
        if($bencana=="tsunami"){
            $result="tsunami";
            $level=3;
        }
        else if($bencana=="gempa_bumi") {
            $level=1;
        }
        else if($bencana=="angin_puting_beliung"){
            $level=2;
        }



        // for ($i=0; $i < count($pulau); $i++) { 
            // $sql = "SELECT * FROM new_pulau WHERE path =?;";
            // $stmt = $pdo->prepare($sql);
            // $stmt->execute(['path674']);
            // $stmtrow = $stmt->fetch();
    
            // $sql_jembatan = "SELECT * FROM new_jembatan WHERE id_pulau1 =? or id_pulau2=?;";
            // $stmt_jembatan = $pdo->prepare($sql_jembatan);
            // $stmt_jembatan->execute([$stmtrow['id'],$stmtrow['id']]);
            // $stmt_jembatanrow = array();
            // while($row = $stmt_jembatan->fetch()) {
            //     array_push($stmt_jembatanrow, $row);
            // }
            // for ($i=0; $i < sizeof($stmt_jembatanrow); $i++) { 
                
            //     for ($j=0; $j < $level-1; $j++) { 
            //         if ($stmt_jembatanrow[$i]['proteksi'] - 1 < 0) {
            //             $stmt_jembatanrow[$i]['id_tipe'] -= 1;
            //             if ($stmt_jembatanrow[$i]['id_tipe'] < 0 ) {
            //                 $stmt_jembatanrow[$i]['id_tipe'] = 0;
            //                 $stmt_jembatanrow[$i]['id_team'] = 0;
            //             }
            //         } else {
            //             $stmt_jembatanrow[$i]['proteksi'] -= 1;
            //         }
            //     }
    
            //     //update
            //     $update = "UPDATE new_jembatan SET id_tipe = ?,proteksi =?,id_team=? WHERE id=?;";
            //     $stmtupdate = $pdo->prepare($update);
            //     $stmtupdate->execute([$stmt_jembatanrow[$i]['id_tipe'],$stmt_jembatanrow[$i]['proteksi'],$stmt_jembatanrow[$i]['id_team'],$stmt_jembatanrow[$i]['id']]);   
            //}
            
        // }
       
        header("Location: ../bencana.php?stat=1");
        exit();
    } else {
        header("Location: ../bencana.php?stat=2");
        exit();
    }
    
?>