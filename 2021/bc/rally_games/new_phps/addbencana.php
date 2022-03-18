<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pulau']) 
     && isset($_POST['time'])){
        $sql_time = "SELECT * FROM new_timing WHERE nama = 'bencana'";
        $stmt_time = $pdo->prepare($sql_time);
        $stmt_time->execute();
        $row_time = $stmt_time->fetch();
        $level;
        $var="";
        $result =array();
        if($_POST['time']==0){
            $level=3;
        }
        else if($_POST['time']==1){
            $level=2;
        }
        else if($_POST['time']==2){
            $level=1;
        }
        if ($row_time['jam'] == $_POST['time']) {
            for ($i=0; $i < sizeof($_POST['pulau']); $i++) { 
                $sql = "SELECT * FROM new_pulau WHERE path =?;";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_POST["pulau"][$i]]);
                $row_pulau = array();
                while($row = $stmt->fetch()) {
                    array_push($row_pulau, $row);
                }
                $stmt_jembatanrow;
                for ($j=0; $j < sizeof($row_pulau); $j++) { 
                    $sql_jembatan = "SELECT id,id_tipe,proteksi,id_team FROM new_jembatan WHERE (id_pulau1 =? or id_pulau2=?) AND id_team != 0;";
                    $stmt_jembatan = $pdo->prepare($sql_jembatan);
                    $stmt_jembatan->execute([$row_pulau[$j]['id'],$row_pulau[$j]['id']]);
                    // $stmt_jembatanrow = $stmt_jembatan->fetch();
                    $stmt_jembatanrow = array();
                    while($row = $stmt_jembatan->fetch()) {
                        if (!in_array($row,$result)) {
                            array_push($result, $row);
                        }
                    }     
                }
                
                
                
                // for ($k=0; $k <sizeof($result) ; $k++) { 
                //     if ($level==1) {
                //         if ($result[$k]['id_tipe']==1 and $result[$k]['proteksi']==1 ) {
                //             // $result[$k]['proteksi']=0;
                //             $replacements2 = array($result[$k]['proteksi'] => 0);
                //             $result =array_replace($result[$k],$replacements2);
                //         }
                //     }
                    
                // }
                
                //update
                
                // $update = "UPDATE new_jembatan SET id_tipe = ?,proteksi =?,id_team=? WHERE id=?;";
                // $stmtupdate = $pdo->prepare($update);
                // $stmtupdate->execute([$stmt_jembatanrow[$i]['id_tipe'],$stmt_jembatanrow[$i]['proteksi'],$stmt_jembatanrow[$i]['id_team'],$stmt_jembatanrow[$i]['id']]);   
            }
            for ($i=0; $i <sizeof($result) ; $i++) { 
                if ($level==1) {
                    if ($result[$i]['id_tipe']==1 and $result[$i]['proteksi']==0) {
                        $update_tipe = "UPDATE `new_jembatan` SET `id_tipe` =0, `proteksi` =0, `id_team`=0 WHERE `id`=?;";
                        $update_tipe_stmt = $pdo->prepare($update_tipe);
                        $update_tipe_stmt->execute([$result[$i]['id']]);
                    }
                    elseif ($result[$i]['id_tipe']==1 and $result[$i]['proteksi']==1) {
                        $update_tipe = "UPDATE `new_jembatan` SET `id_tipe` = 1,`proteksi` =0,`id_team`=? WHERE `id`=?;";
                        $update_tipe_stmt = $pdo->prepare($update_tipe);
                        $update_tipe_stmt->execute([$result[$i]['id_team'],$result[$i]['id']]);
                    }
                    elseif ($result[$i]['id_tipe']==2 and $result[$i]['proteksi']==0) {
                        $update_tipe = "UPDATE `new_jembatan` SET `id_tipe` = 1,`proteksi` =1,`id_team`=? WHERE `id`=?;";
                        $update_tipe_stmt = $pdo->prepare($update_tipe);
                        $update_tipe_stmt->execute([$result[$i]['id_team'],$result[$i]['id']]);
                    }
                    elseif ($result[$i]['id_tipe']==2 and $result[$i]['proteksi']==1) {
                        $update_tipe = "UPDATE `new_jembatan` SET `id_tipe` = 2,`proteksi` =0,`id_team`=? WHERE `id`=?;";
                        $update_tipe_stmt = $pdo->prepare($update_tipe);
                        $update_tipe_stmt->execute([$result[$i]['id_team'],$result[$i]['id']]);
                    }
                    elseif ($result[$i]['id_tipe']==3 and $result[$i]['proteksi']==0) {
                        $update_tipe = "UPDATE `new_jembatan` SET `id_tipe` = 2,`proteksi` =1,`id_team`=? WHERE `id`=?;";
                        $update_tipe_stmt = $pdo->prepare($update_tipe);
                        $update_tipe_stmt->execute([$result[$i]['id_team'],$result[$i]['id']]);
                    }
                    elseif ($result[$i]['id_tipe']==3 and $result[$i]['proteksi']==1) {
                        $update_tipe = "UPDATE `new_jembatan` SET `id_tipe` = 3,`proteksi` =0,`id_team`=? WHERE `id`=?;";
                        $update_tipe_stmt = $pdo->prepare($update_tipe);
                        $update_tipe_stmt->execute([$result[$i]['id_team'],$result[$i]['id']]);
                    }
                }
                elseif ($level==2) {
                    if ($result[$i]['id_tipe']==1 and $result[$i]['proteksi']==0) {
                        $update_tipe = "UPDATE `new_jembatan` SET `id_tipe` =0,`proteksi` =0,`id_team`=0 WHERE `id`=?;";
                        $update_tipe_stmt = $pdo->prepare($update_tipe);
                        $update_tipe_stmt->execute([$result[$i]['id']]);
                    }
                    elseif ($result[$i]['id_tipe']==1 and $result[$i]['proteksi']==1) {
                        $update_tipe = "UPDATE `new_jembatan` SET `id_tipe` = 0,`proteksi` =0,`id_team`=0 WHERE `id`=?;";
                        $update_tipe_stmt = $pdo->prepare($update_tipe);
                        $update_tipe_stmt->execute([$result[$i]['id']]);
                    }
                    elseif ($result[$i]['id_tipe']==2 and $result[$i]['proteksi']==0) {
                        $update_tipe = "UPDATE `new_jembatan` SET `id_tipe` = 1,`proteksi` =0,`id_team`=? WHERE `id`=?;";
                        $update_tipe_stmt = $pdo->prepare($update_tipe);
                        $update_tipe_stmt->execute([$result[$i]['id_team'],$result[$i]['id']]);
                    }
                    elseif ($result[$i]['id_tipe']==2 and $result[$i]['proteksi']==1) {
                        $update_tipe = "UPDATE `new_jembatan` SET `id_tipe` = 1,`proteksi` =1,`id_team`=? WHERE `id`=?;";
                        $update_tipe_stmt = $pdo->prepare($update_tipe);
                        $update_tipe_stmt->execute([$result[$i]['id_team'],$result[$i]['id']]);
                    }
                    elseif ($result[$i]['id_tipe']==3 and $result[$i]['proteksi']==0) {
                        $update_tipe = "UPDATE `new_jembatan` SET `id_tipe` = 2,`proteksi` =0,`id_team`=? WHERE `id`=?;";
                        $update_tipe_stmt = $pdo->prepare($update_tipe);
                        $update_tipe_stmt->execute([$result[$i]['id_team'],$result[$i]['id']]);
                    }
                    elseif ($result[$i]['id_tipe']==3 and $result[$i]['proteksi']==1) {
                        $update_tipe = "UPDATE `new_jembatan` SET `id_tipe` = 2,`proteksi` =1,`id_team`=? WHERE `id`=?;";
                        $update_tipe_stmt = $pdo->prepare($update_tipe);
                        $update_tipe_stmt->execute([$result[$i]['id_team'],$result[$i]['id']]);
                    }
                }
                elseif ($level==3) {
                    if ($result[$i]['id_tipe']==1 and $result[$i]['proteksi']==0) {
                        $update_tipe = "UPDATE `new_jembatan` SET `id_tipe` =0,`proteksi`=0,`id_team`= 0 WHERE `id`=?;";
                        $update_tipe_stmt = $pdo->prepare($update_tipe);
                        $update_tipe_stmt->execute([$result[$i]['id']]);
                    }
                    elseif ($result[$i]['id_tipe']==1 and $result[$i]['proteksi']==1) {
                        $update_tipe = "UPDATE `new_jembatan` SET `id_tipe` = 0,`proteksi` =0,`id_team`=0 WHERE `id`=?;";
                        $update_tipe_stmt = $pdo->prepare($update_tipe);
                        $update_tipe_stmt->execute([$result[$i]['id']]);
                    }
                    elseif ($result[$i]['id_tipe']==2 and $result[$i]['proteksi']==0) {
                        $update_tipe = "UPDATE `new_jembatan` SET `id_tipe` = 0,`proteksi` =0,`id_team`=0 WHERE `id`=?;";
                        $update_tipe_stmt = $pdo->prepare($update_tipe);
                        $update_tipe_stmt->execute([$result[$i]['id']]);
                    }
                    elseif ($result[$i]['id_tipe']==2 and $result[$i]['proteksi']==1) {
                        $update_tipe = "UPDATE `new_jembatan` SET `id_tipe` = 1,`proteksi` =0,`id_team`=? WHERE `id`=?;";
                        $update_tipe_stmt = $pdo->prepare($update_tipe);
                        $update_tipe_stmt->execute([$result[$i]['id_team'],$result[$i]['id']]);
                    }
                    elseif ($result[$i]['id_tipe']==3 and $result[$i]['proteksi']==0) {
                        $update_tipe = "UPDATE `new_jembatan` SET `id_tipe` = 1,`proteksi` =1,`id_team`=? WHERE `id`=?;";
                        $update_tipe_stmt = $pdo->prepare($update_tipe);
                        $update_tipe_stmt->execute([$result[$i]['id_team'],$result[$i]['id']]);
                    }
                    elseif ($result[$i]['id_tipe']==3 and $result[$i]['proteksi']==1) {
                        $update_tipe = "UPDATE `new_jembatan` SET `id_tipe` = 2,`proteksi` =0,`id_team`=? WHERE `id`=?;";
                        $update_tipe_stmt = $pdo->prepare($update_tipe);
                        $update_tipe_stmt->execute([$result[$i]['id_team'],$result[$i]['id']]);
                    }
                }
            }

            $count = $_POST['time']+1 ; 
            $sql_change = "UPDATE `new_timing` SET `jam` = ? WHERE `nama` = 'bencana'";
            $stmt_change = $pdo->prepare($sql_change);
            $stmt_change->execute([$count]);
            $var = "hancur";
        }
        echo json_encode($var);
    } else {
        header("HTTP/1.1 400 Bad Request");
        $error = array(
            'error' => 'Method not Allowed'
        );
        echo json_encode($error);
    }
    
?>