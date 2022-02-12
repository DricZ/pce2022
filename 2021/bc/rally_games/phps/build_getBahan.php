<?php
require_once 'connect.php';
header("Content-Type: application/json");
// jumlah bahan2 yang dipunya
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idkel'])) {
    $idkel = $_POST['idkel'];

    //KAYU
    $cekResourcesql = "SELECT * FROM team_resources WHERE id_resource = 1 AND id_team = ?";
    $cekResourcestmt = $pdo->prepare($cekResourcesql);
    $cekResourcestmt->execute([$idkel]);

    if ($cekResourcestmt->rowCount() == 0) {
        $kayu = 0;
    } 
    else {
        $jumlah = $cekResourcestmt->fetch();
        $kayu = $jumlah['count'];
    }

    //BAJA
    $cekResourcesql = "SELECT * FROM team_resources WHERE id_resource = 2 AND id_team = ?";
    $cekResourcestmt = $pdo->prepare($cekResourcesql);
    $cekResourcestmt->execute([$idkel]);

    if ($cekResourcestmt->rowCount() == 0) {
        $baja = 0;
    } 
    else {
        $jumlah = $cekResourcestmt->fetch();
        $baja = $jumlah['count'];
    }

    //SEMEN
    $cekResourcesql = "SELECT * FROM team_resources WHERE id_resource = 3 AND id_team = ?";
    $cekResourcestmt = $pdo->prepare($cekResourcesql);
    $cekResourcestmt->execute([$idkel]);

    if ($cekResourcestmt->rowCount() == 0) {
        $semen = 0;
    } 
    else {
        $jumlah = $cekResourcestmt->fetch();
        $semen = $jumlah['count'];
    }

    //PASIR
    $cekResourcesql = "SELECT * FROM team_resources WHERE id_resource = 4 AND id_team = ?";
    $cekResourcestmt = $pdo->prepare($cekResourcesql);
    $cekResourcestmt->execute([$idkel]);

    if ($cekResourcestmt->rowCount() == 0) {
        $pasir = 0;
    } 
    else {
        $jumlah = $cekResourcestmt->fetch();
        $pasir = $jumlah['count'];
    }

    //PEKERJA
    $cekResourcesql = "SELECT * FROM team_resources WHERE id_resource = 5 AND id_team = ?";
    $cekResourcestmt = $pdo->prepare($cekResourcesql);
    $cekResourcestmt->execute([$idkel]);

    if ($cekResourcestmt->rowCount() == 0) {
        $pekerja = 0;
    } 
    else {
        $jumlah = $cekResourcestmt->fetch();
        $pekerja = $jumlah['count'];
    }
    
    if ($cekResourcestmt){
        $result = array();
        $result['kayu'] = $kayu;
        $result['semen'] = $semen;
        $result['baja'] = $baja;
        $result['pasir'] = $pasir;
        $result['pekerja'] = $pekerja;

        echo json_encode($result);
    }
    else {
        $error = array(
            'error' => 'Method not Allowed'
        );
    
        echo json_encode($error);
    }
} else {
    header("HTTP/1.1 400 Bad Request");
    $error = array(
        'error' => 'Method not Allowed'
    );

    echo json_encode($error);
}