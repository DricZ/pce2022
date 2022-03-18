<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    if ($_SERVER['REQUEST_METHOD'] == 'POST' 
    && isset($_SESSION['username']) 
    && isset($_POST['pulau_tujuan'])
    && isset($_POST['pulau_skrg'])) {
        echo json_encode($result);
         // AMBIL ID TEAM
         $sql_team = "SELECT * FROM team WHERE username = ?";
         $stmt_team = $pdo->prepare($sql_team);
         $stmt_team->execute([$_SESSION['username']]);
         $row_team = $stmt_team->fetch();
         $id_team = $row_team['id'];
 
         // AMBIL ID PULAU SEKARANG
         $sql_pulau = "SELECT * FROM new_pulau WHERE path = ?";
         $stmt_pulau = $pdo->prepare($sql_pulau);
         $stmt_pulau->execute([$_POST["pulau_skrg"]]);
         $row_pulau = $stmt_pulau->fetch();
         $id_pulau = $row_pulau['id'];
 
         // AMBIL ID PULAU TUJUAN
         $sql_tujuan = "SELECT * FROM new_pulau WHERE path = ?";
         $stmt_tujuan = $pdo->prepare($sql_tujuan);
         $stmt_tujuan->execute([$_POST["pulau_tujuan"]]);
         $row_tujuan = $stmt_tujuan->fetch();
         $id_tujuan = $row_tujuan['id'];
 
         // LIST JEMBATAN YG TERHUBUNG KE PULAU SAAT INI
         $sql_jembatan = "SELECT nj.id_pulau1, nj.id_pulau2, nt.nama AS tipe, nj.id as id_cek FROM new_jembatan nj
         JOIN new_tipe_jembatan nt ON nj.id_tipe = nt.id
         WHERE (id_pulau1 = ? OR id_pulau2 = ?) AND id_team = ?";
         $stmt_jembatan = $pdo->prepare($sql_jembatan);
         $stmt_jembatan->execute([$id_pulau, $id_pulau, $id_team]);
         $arr_jembatan = array();
         while($row = $stmt_jembatan->fetch()) {
             array_push($arr_jembatan, $row);
         }
         //jembatan yang ada di pulau sekarang
         $sql = "SELECT id FROM `new_jembatan` where id_pulau1 = ? or id_pulau2=?;
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_pulau,$id_pulau]);
        $result = array();
        while($row = $stmt->fetch()) {
            array_push($result, $row);
        }
        $cek = true;
        for ($i=0; $i < sizeof($arr_jembatan); $i++) { 
            for ($j=0; $j < sizeof($result); $j++) { 
                if($result[$j]['id'] == $arr_jembatan[$i]['id_cek']){
                    $cek = true;
                }
                else{
                    $cek = false;
                    break;
                }
            }
        }
    } 
    
    else {
        header("HTTP/1.1 400 Bad Request");
        $error = array(
            'error' => 'Method not Allowed'
        );
        echo json_encode($error);
    }
    
?>