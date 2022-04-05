<?php
require_once 'connect.php';

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['username']) && isset($_POST['item']) && isset($_POST['stok']) && isset($_POST['qty']) && isset($_POST['total']) && isset($_POST['cash'])) {

    $result = array(
        "status" => 1,
        "error" => ""
    );

    //DECLARE VAR DARI CLIENT DAN SESSION
    $kota = $_SESSION['kota'];
    $username = $_SESSION['username'];
    $item = $_POST['item'];
    $newStock = $_POST['stok'];
    $qty = $_POST['qty'];
    $total = $_POST['total'];
    $cash = $_POST['cash'];

    //CARI ID TEAM YANG BELI
    $getIDTeamsql = "SELECT * FROM team WHERE username = ?";
    $getIDTeamstmt = $pdo->prepare($getIDTeamsql);
    $getIDTeamstmt->execute([$_SESSION['username']]);
    $getIDTeamrow = $getIDTeamstmt->fetch();

    //CEK DULU HTML-NYA VALID TIDAK
    //CEK ITEM-NYA VALID TIDAK
    $sql= "SELECT id FROM resource WHERE resource_name = ?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$item]);

    //JIKA TIDAK ADA ITEM DENGAN NAMA TERSEBUT
    if($stmt->rowCount()==0){
        //MASUK FUNGSI ERROR AJAX
        $result['status'] = 0;
        $result['error'] = 'Invalid';
    }
    else {
        //ADA ITEM DENGAN NAMA TSB, AMBIL ID ITEM-NYA
        $idItem = $stmt->fetch();
        //AMBIL DATA STOK AWAL, HARGA ITEM, ID KOTA DARI DB
        $sql= "SELECT a.stock AS stock, a.price AS price, a.id_city AS id_kota FROM city_resource a JOIN city b ON a.id_city = b.id WHERE b.city_name = ? AND a.id_resource = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$kota, $idItem['id']]);
        $rowCityStock=$stmt->fetch();

        if($item != 'Tiket Terbang') { //JIKA BUKAN TIKET TERBANG
            //JIKA JUMLAH STOK + QTY TIDAK SESUAI DENGAN JML STOK AWAL DI DB ATAU TOTAL PEMBELIAN TIDAK SESUAI
            if($newStock+$qty != $rowCityStock['stock'] || $rowCityStock['price'] * $qty != $total) {
                $result['status'] = 0;
                $result['error'] = 'Invalid';
            }
        }
        else { //JIKA TIKET TERBANG
            //JIKA TOTAL PEMBELIAN TIDAK SESUAI
            if($rowCityStock['price'] * $qty != $total) {
                $result['status'] = 0;
                $result['error'] = 'Invalid';
            }
        }

        if($getIDTeamrow['money']<$total && $result['status']==1){
            $result['status'] = 0;
            $result['error'] = 'Uang tidak cukup';
        }

        if($result['status']==0){
            //MASUK FUNGSI ERROR AJAX
            header("HTTP/1.1 400 Bad Request");
        }
        else {
            //MULAI PROSES PEMBELIAN :
            
            if($item != 'Tiket Terbang') {
                //UPDATE STOCK BAHAN DI KOTA
                $sql = "UPDATE city_resource JOIN resource ON city_resource.id_resource=resource.id JOIN city ON city_resource.id_city = city.id SET stock = ? WHERE city.city_name = ? AND resource.resource_name = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$newStock, $kota, $item]);
            }

            //NAMBAH BAHAN YANG DIBELI KE INVENTORY TEAM
            $cekResourcesql = "SELECT * FROM team_resources WHERE id_resource = ? AND id_team = ?";
            $cekResourcestmt = $pdo->prepare($cekResourcesql);
            $cekResourcestmt->execute([$idItem['id'], $getIDTeamrow['id']]);

            if ($cekResourcestmt->rowCount() == 0) {
                $updateInventorysql = "INSERT INTO `team_resources` (`id`, `id_resource`, `count`, `id_team`) VALUES (NULL, ?, ?, ?)";
                $updateInventorystmt = $pdo->prepare($updateInventorysql);
                $updateInventorystmt->execute([$idItem['id'], $qty, $getIDTeamrow['id']]);
            } else {
                $updateInventorysql = "UPDATE `team_resources` SET `id_resource` = ?,`count` = `count` + ?,`id_team` = ? WHERE id_resource = ? AND id_team = ?";
                $updateInventorystmt = $pdo->prepare($updateInventorysql);
                $updateInventorystmt->execute([$idItem['id'], $qty, $getIDTeamrow['id'], $idItem['id'], $getIDTeamrow['id']]);
            }

            //NULIS HISTORY BELI TEAM 
            define('TIMEZONE', 'Asia/Jakarta');
            date_default_timezone_set(TIMEZONE);
            $timestamp = date("d-m-Y H:i:s");

            $sqlHistory = "INSERT INTO `team_history_bought_resources` (`id`, `id_resource`, `count`, `id_team`, `time`, `id_city`, `price`) VALUES (default, ?, ?, ?, ?, ?, ?)";
            $stmtHistory = $pdo->prepare($sqlHistory);
            $stmtHistory->execute([$idItem['id'], $qty, $getIDTeamrow['id'], $timestamp, $rowCityStock['id_kota'], $total]);

            //UPDATE UANGNYA TEAM (PEMBAYARAN)
            $updateTeamMoneysql = "UPDATE `team` SET `money` = `money` - ? WHERE username = ?";
            $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
            $updateTeamMoneystmt->execute([$_POST['total'], $_SESSION['username']]);
            
        }
    }
    echo json_encode($result);
} else {
    header("HTTP/1.1 400 Bad Request");
}