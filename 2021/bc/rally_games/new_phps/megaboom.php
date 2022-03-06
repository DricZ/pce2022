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
    
    
    //hapus semua jembatan di suatu pulau
    // id_team = 0 
    $sql_idteam = "UPDATE new_jembatan SET id_team = 0 WHERE id_pulau1=? OR id_pulau2=?;";
    $stmt_idteam = $pdo->prepare($sql_idteam);
    $stmt_idteam->execute([$_POST['id_pulau'],$_POST['id_pulau']]);

    //id tipe =0
    $sql_idteam = "UPDATE new_jembatan SET id_tipe = 0 WHERE id_pulau1=? OR id_pulau2=?;";
    $stmt_idteam = $pdo->prepare($sql_idteam);
    $stmt_idteam->execute([$_POST['id_pulau'],$_POST['id_pulau']]);
} else {
    header("HTTP/1.1 400 Bad Request");
    $error = array(
        'error' => 'Method not Allowed'
    );
    echo json_encode($error);
}

?>