<?php
    include 'connect.php';

    header("Content-Type: application/json");

    if ($_POST['cari'] == 1) {
        $pendaftarsql = "SELECT * FROM `pengunjung_pameran` WHERE 1";
        $pendaftarstmt = $pdo->prepare($pendaftarsql);
        $pendaftarstmt->execute();
    } else {
        $pendaftarsql = "SELECT * FROM `pengunjung_pameran` 
        WHERE nama LIKE ? OR email LIKE ? OR no_hp LIKE ? OR instansi LIKE ?";
        $pendaftarstmt = $pdo->prepare($pendaftarsql);
        $pendaftarstmt->execute(['%' . $_POST['cari'] . '%', '%' . $_POST['cari'] . '%', '%' . $_POST['cari'] . '%', '%' . $_POST['cari'] . '%']);
    }
    
    $result = array();
    while($row = $pendaftarstmt->fetch()){
        array_push($result, $row);
    }
    echo json_encode($result);
?>