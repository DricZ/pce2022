<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pulau']) 
     && isset($_POST['time'])){
        $sql_time = "SELECT * FROM new_timing WHERE nama = 'bencana'";
        $stmt_time = $pdo->prepare($sql_time);
        $stmt_time->execute();
        $row_time = $stmt_time->fetch();

        $result =array();

        if ($row_time['jam'] == $_POST['time']) {
            for ($i=0; $i < sizeof($_POST['pulau']); $i++) { 
                $sql = "SELECT * FROM new_pulau WHERE path =?;";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_POST["pulau"][$i]]);
                $row_pulau = array();
                while($row = $stmt->fetch()) {
                    array_push($row_pulau, $row);
                }
                for ($j=0; $j < sizeof($row_pulau); $j++) { 
                    $sql_jembatan = "SELECT DISTINCT(id),id_tipe,proteksi FROM new_jembatan WHERE id_pulau1 =? or id_pulau2=?;";
                    $stmt_jembatan = $pdo->prepare($sql_jembatan);
                    $stmt_jembatan->execute([$row_pulau[$j]['id'],$row_pulau[$j]['id']]);
                    $stmt_jembatanrow = array();
                    while($row = $stmt_jembatan->fetch()) {
                        array_push($stmt_jembatanrow, $row);
                       
                    }
                    for ($k=0; $k < sizeof($result); $k++) { 
                        if (!in_array($stmt_jembatanrow, $result[$k])) {
                            array_push($result, $stmt_jembatanrow) ;
                        }
                    }
                    
                    // for ($k=0; $k < $level-1; $k++) { 
                    //     if ($stmt_jembatanrow[$i]['proteksi'] - 1 < 0) {
                    //         $stmt_jembatanrow[$i]['id_tipe'] -= 1;
                    //         if ($stmt_jembatanrow[$i]['id_tipe'] < 0 ) {
                    //             $stmt_jembatanrow[$i]['id_tipe'] = 0;
                    //             $stmt_jembatanrow[$i]['id_team'] = 0;
                    //         }
                    //     } else {
                    //         $stmt_jembatanrow[$i]['proteksi'] -= 1;
                    //     }
                    
                    //     //update
                    //     $update = "UPDATE new_jembatan SET id_tipe = ?,proteksi =?,id_team=? WHERE id=?;";
                    //     $stmtupdate = $pdo->prepare($update);
                    //     $stmtupdate->execute([$stmt_jembatanrow[$i]['id_tipe'],$stmt_jembatanrow[$i]['proteksi'],$stmt_jembatanrow[$i]['id_team'],$stmt_jembatanrow[$i]['id']]);  
                    // } 
                }
            }

            

            $sql_change = "UPDATE new_timing SET jam = ? WHERE nama = 'treasure'";
            $stmt_change = $pdo->prepare($sql_change);
            $stmt_change->execute([$_POST['time']+1]);
        }
        
        echo json_encode([$result]);
    } else {
        header("HTTP/1.1 400 Bad Request");
        $error = array(
            'error' => 'Method not Allowed'
        );
        echo json_encode($error);
    }
    
?>