<?php
require_once 'connect.php';

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idkota']) && isset($_SESSION['username']) && isset($_POST['building'])) {

    $result = array(
        "status" => 1,
        "error" => ""
    );

    //DECLARE VAR DARI CLIENT DAN SESSION
    $building = $_POST['building'];
    $kota = $_POST['idkota'];
    $username = $_SESSION['username'];

    //CARI ID TEAM YANG BELI
    $getIDTeamsql = "SELECT * FROM team WHERE username = ?";
    $getIDTeamstmt = $pdo->prepare($getIDTeamsql);
    $getIDTeamstmt->execute([$_SESSION['username']]);
    $getIDTeamrow = $getIDTeamstmt->fetch();

    //CEK BONUS LAMPUNG MENGURANGI 1 PEKERJA DI BANGUNAN DENGAN PEKERJA >= 2
    $bonusLampungsql = "SELECT * FROM `team_constructed_landmark` WHERE id_landmark = 4 AND id_team = ? ORDER BY id";
    $bonusLampungstmt = $pdo->prepare($bonusLampungsql);
    $bonusLampungstmt->execute([$getIDTeamrow['id']]);

    $getKota = "SELECT * FROM city WHERE id = ?";
    $getKotastmt = $pdo->prepare($getKota);
    $getKotastmt->execute([$kota]);
    $getKotarow = $getKotastmt->fetch();

    $namaKota = $getKotarow['city_name'];
    $kayu = 0;
    $baja = 0;
    $semen = 0;
    $pasir = 0;
    $pekerja = 0;
    $building_type = 0;

    if($building == 'Jembatan Kayu') {
        $kayu = 4;
        $pekerja = 1;
        $building_type = 1;
    }
    else if($building == 'Jembatan Baja') {
        $baja = 3;
        $semen = 1;
        $pekerja = 2;
        $building_type = 2;
    }
    else if($building == 'Jembatan Beton') {
        $baja = 1;
        $semen = 3;
        $pasir = 1;
        $pekerja = 2;
        $building_type = 3;
    }
    else if($building == 'Rumah Sakit') {
        $baja = 1;
        $pasir = 2;
        $semen = 1;
        $pekerja = 2;
        $building_type = 4;
    }
    else if($building == 'Mall') {
        $semen = 1;
        $baja = 2;
        $pasir = 1;
        $pekerja = 2;
        $building_type = 5;
    }
    else if($building == 'Taman') {
        $kayu = 2;
        $pasir = 2;
        $pekerja = 1;
        $building_type = 6;
    }
    else if($building == 'Perumahan') {
        $kayu = 2;
        $semen = 1;
        $pasir = 1;
        $pekerja = 1;
        $building_type = 7;
    }
    else if($building == 'Apartemen') {
        $kayu = 1;
        $baja = 1;
        $semen = 2;
        $pasir = 2;
        $pekerja = 2;
        $building_type = 8;
    }
    else if($building == 'Hotel') {
        $kayu = 1;
        $baja = 2;
        $semen = 1;
        $pasir = 1;
        $pekerja = 2;
        $building_type = 9;
    }

    //BONUS EFEK LAMPUNG
    if ($bonusLampungstmt->rowCount() == 1) {
        if ($pekerja != 1) {
            $pekerja--;
        }
    }

    //BONUS EFEK JOGJA
    if (isset($_POST['dikurangi'])) {
        $dikurangi = $_POST['dikurangi'];
        if ($dikurangi == 'kayu') {
            $kayu--;
        }
        else if ($dikurangi == 'baja') {
            $baja--;
        }
        else if ($dikurangi == 'semen') {
            $semen--;
        }
        else if ($dikurangi == 'pasir') {
            $pasir--;
        }
        else if ($dikurangi == 'pekerja') {
            $pekerja--;
        }
    }

    //NGURANGI BAHAN YANG DIBELI KE INVENTORY TEAM
    //KAYU
    $updateInventorysql = "UPDATE `team_resources` SET `count` = `count` - ? WHERE id_resource = 1 AND id_team = ?";
    $updateInventorystmt = $pdo->prepare($updateInventorysql);
    $updateInventorystmt->execute([$kayu, $getIDTeamrow['id']]);

    //BAJA
    $updateInventorysql = "UPDATE `team_resources` SET `count` = `count` - ? WHERE id_resource = 2 AND id_team = ?";
    $updateInventorystmt = $pdo->prepare($updateInventorysql);
    $updateInventorystmt->execute([$baja, $getIDTeamrow['id']]);

    //SEMEN
    $updateInventorysql = "UPDATE `team_resources` SET `count` = `count` - ? WHERE id_resource = 3 AND id_team = ?";
    $updateInventorystmt = $pdo->prepare($updateInventorysql);
    $updateInventorystmt->execute([$semen, $getIDTeamrow['id']]);

    //PASIR
    $updateInventorysql = "UPDATE `team_resources` SET `count` = `count` - ? WHERE id_resource = 4 AND id_team = ?";
    $updateInventorystmt = $pdo->prepare($updateInventorysql);
    $updateInventorystmt->execute([$pasir, $getIDTeamrow['id']]);

    //PEKERJA
    $updateInventorysql = "UPDATE `team_resources` SET `count` = `count` - ? WHERE id_resource = 5 AND id_team = ?";
    $updateInventorystmt = $pdo->prepare($updateInventorysql);
    $updateInventorystmt->execute([$pekerja, $getIDTeamrow['id']]);

    define('TIMEZONE', 'Asia/Jakarta');
    date_default_timezone_set(TIMEZONE);
    $timestamp = date("d-m-Y H:i:s");

    //BONUS POIN MBANGUN JEMBATAN (SATU2 DI SATU KOTA)
    if ($building == 'Jembatan Kayu') {
        //175
        $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 175 WHERE id = ?";
        $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
        $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);
        
        //INSERT TO HISTORY_POINT
        $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 175, ?, 'Jembatan Kayu ".$namaKota."')";
        $insertHistorystmt = $pdo->prepare($insertHistory);
        $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
    }
    else if ($building == 'Jembatan Baja') {
        //325
        $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 325 WHERE id = ?";
        $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
        $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);
        
        //INSERT TO HISTORY_POINT
        $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 325, ?, 'Jembatan Baja ".$namaKota."')";
        $insertHistorystmt = $pdo->prepare($insertHistory);
        $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
    }
    else if ($building == 'Jembatan Beton') {
        //350
        $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 350 WHERE id = ?";
        $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
        $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);

        //INSERT TO HISTORY_POINT
        $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 350, ?, 'Jembatan Beton ".$namaKota."')";
        $insertHistorystmt = $pdo->prepare($insertHistory);
        $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
    }

    //BONUS POIN MBANGUN PUBLIC PLACES (SATU2 DI SATU KOTA)
    else if ($building == 'Rumah Sakit') {
        //350
        $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 350 WHERE id = ?";
        $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
        $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);
        
        //INSERT TO HISTORY_POINT
        $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 350, ?, 'Rumah Sakit ".$namaKota."')";
        $insertHistorystmt = $pdo->prepare($insertHistory);
        $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
    }
    else if ($building == 'Mall') {
        //325
        $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 325 WHERE id = ?";
        $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
        $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);
        
        //INSERT TO HISTORY_POINT
        $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 325, ?, 'Mall ".$namaKota."')";
        $insertHistorystmt = $pdo->prepare($insertHistory);
        $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
    }
    else if ($building == 'Taman') {
        //200
        $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 200 WHERE id = ?";
        $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
        $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);
        
        //INSERT TO HISTORY_POINT
        $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 200, ?, 'Taman ".$namaKota."')";
        $insertHistorystmt = $pdo->prepare($insertHistory);
        $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
    }

    //BONUS POIN MBANGUN RESIDENCE (SATU2 DI SATU KOTA)
    else if ($building == 'Perumahan') {
        //200
        $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 200 WHERE id = ?";
        $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
        $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);
        
        //INSERT TO HISTORY_POINT
        $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 200, ?, 'Perumahan ".$namaKota."')";
        $insertHistorystmt = $pdo->prepare($insertHistory);
        $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
    } 
    else if ($building == 'Apartemen') {
        //400
        $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 400 WHERE id = ?";
        $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
        $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);
        
        //INSERT TO HISTORY_POINT
        $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 400, ?, 'Apartemen ".$namaKota."')";
        $insertHistorystmt = $pdo->prepare($insertHistory);
        $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
    }
    else if ($building == 'Hotel') {
        //350
        $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 350 WHERE id = ?";
        $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
        $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);

        //INSERT TO HISTORY_POINT
        $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 350, ?, 'Hotel ".$namaKota."')";
        $insertHistorystmt = $pdo->prepare($insertHistory);
        $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
    }
    

    //NULIS HISTORY CONSTRUCTED BUILDING TYPE
    $sqlHistory = "INSERT INTO `team_constructed_building`(`id`, `id_building_type`, `id_city`, `id_team`, `time`) VALUES (NULL, ?, ?, ?, ?)";
    $stmtHistory = $pdo->prepare($sqlHistory);
    $stmtHistory->execute([$building_type, $kota, $getIDTeamrow['id'], $timestamp]);


    //BONUS POIN MBANGUN TIAP BANGUNAN DI SUATU KOTA & SELURUH KOTA
    if ($building == 'Jembatan Kayu' || $building == 'Jembatan Baja' || $building == 'Jembatan Beton') {
        //DI SUATU KOTA 
        $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE a.id = ? AND c.id_city = ? AND d.name IN ('Jembatan Kayu', 'Jembatan Baja', 'Jembatan Beton') GROUP BY d.name";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$getIDTeamrow['id'], $kota]);
        if ($stmt->rowCount() == 3) {
            $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 275 WHERE id = ?";
            $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
            $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);

            //INSERT TO HISTORY_POINT
            $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 275, ?, 'Jembatan Complete ".$namaKota."')";
            $insertHistorystmt = $pdo->prepare($insertHistory);
            $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
        }

        //DI SELURUH KOTA
        $sql2 = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE a.id = ? AND d.name IN ('Jembatan Kayu', 'Jembatan Baja', 'Jembatan Beton')";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute([$getIDTeamrow['id']]);
        if ($stmt2->rowCount() == 18) {
            $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 200 WHERE id = ?";
            $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
            $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);

            //INSERT TO HISTORY_POINT
            $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 200, ?, 'Jembatan Complete Seluruh Kota')";
            $insertHistorystmt = $pdo->prepare($insertHistory);
            $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
        }
    }
    else if ($building == 'Rumah Sakit' || $building == 'Mall' || $building == 'Taman') {
        //DI SUATU KOTA
        $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE a.id = ? AND c.id_city = ? AND d.name IN ('Rumah Sakit', 'Mall', 'Taman')GROUP BY d.name";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$getIDTeamrow['id'], $kota]);
        if ($stmt->rowCount() == 3) {
            $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 375 WHERE id = ?";
            $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
            $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);

            //INSERT TO HISTORY_POINT
            $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 375, ?, 'Public Places Complete ".$namaKota."')";
            $insertHistorystmt = $pdo->prepare($insertHistory);
            $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
        }

        //DI SELURUH KOTA
        $sql2 = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE a.id = ? AND d.name IN ('Rumah Sakit', 'Mall', 'Taman')";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute([$getIDTeamrow['id']]);
        if ($stmt2->rowCount() == 18) {
            $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 275 WHERE id = ?";
            $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
            $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);

            //INSERT TO HISTORY_POINT
            $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 275, ?, 'Public Places Complete Seluruh Kota')";
            $insertHistorystmt = $pdo->prepare($insertHistory);
            $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
        }
    }
    else if ($building == 'Perumahan' || $building == 'Apartemen' || $building == 'Hotel') {
        //DI SUATU KOTA
        $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE a.id = ? AND c.id_city = ? AND d.name IN ('Perumahan', 'Apartemen', 'Hotel') GROUP BY d.name";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$getIDTeamrow['id'], $kota]);
        if ($stmt->rowCount() == 3) {
            $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 450 WHERE id = ?";
            $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
            $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);

            //INSERT TO HISTORY_POINT
            $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 450, ?, 'Residence Complete ".$namaKota."')";
            $insertHistorystmt = $pdo->prepare($insertHistory);
            $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
        }

        //DI SELURUH KOTA
        $sql2 = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE a.id = ? AND d.name IN ('Perumahan', 'Apartemen', 'Hotel')";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute([$getIDTeamrow['id']]);
        if ($stmt2->rowCount() == 18) {
            $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 350 WHERE id = ?";
            $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
            $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);

            //INSERT TO HISTORY_POINT
            $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 350, ?, 'Residence Complete Seluruh Kota')";
            $insertHistorystmt = $pdo->prepare($insertHistory);
            $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
        }
    }

    //BONUS POIN MBANGUN JEMBATAN SATU2 DI SELURUH KOTA
    if ($building == 'Jembatan Kayu') {
        $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE a.id = ? AND d.name = 'Jembatan Kayu' ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$getIDTeamrow['id']]);
        if ($stmt->rowCount() == 6) {
            $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 200 WHERE id = ?";
            $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
            $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);

            //INSERT TO HISTORY_POINT
            $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 200, ?, 'Jembatan Kayu Seluruh Kota')";
            $insertHistorystmt = $pdo->prepare($insertHistory);
            $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
        }
    }

    else if ($building == 'Jembatan Baja') {
        $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE a.id = ? AND d.name = 'Jembatan Baja' ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$getIDTeamrow['id']]);
        if ($stmt->rowCount() == 6) {
            $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 400 WHERE id = ?";
            $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
            $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);

            //INSERT TO HISTORY_POINT
            $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 400, ?, 'Jembatan Baja Seluruh Kota')";
            $insertHistorystmt = $pdo->prepare($insertHistory);
            $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
        }
    }

    else if ($building == 'Jembatan Beton') {
        $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE a.id = ?  AND d.name = 'Jembatan Beton' ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$getIDTeamrow['id']]);
        if ($stmt->rowCount() == 6) {
            $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 600 WHERE id = ?";
            $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
            $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);

            //INSERT TO HISTORY_POINT
            $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 600, ?, 'Jembatan Beton Seluruh Kota')";
            $insertHistorystmt = $pdo->prepare($insertHistory);
            $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
        }
    }

    //BONUS POIN JIKA MEMBANGUN SEMUA BANGUNAN DI KOTA TERSEBUT 
    $sql = "SELECT * FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id  = c.id_building_type WHERE a.id = ? AND c.id_city = ? GROUP BY d.name";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$getIDTeamrow['id'], $kota]);
    if ($stmt->rowCount() == 9) {
        $updateTeamMoneysql = "UPDATE `team` SET `point` = `point` + 600 WHERE id = ?";
        $updateTeamMoneystmt = $pdo->prepare($updateTeamMoneysql);
        $updateTeamMoneystmt->execute([$getIDTeamrow['id']]);

        //INSERT TO HISTORY_POINT
        $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 600, ?, 'All Complete ".$namaKota."')";
        $insertHistorystmt = $pdo->prepare($insertHistory);
        $insertHistorystmt->execute([$getIDTeamrow['id'], $timestamp]);
    }

    $jogjaDibangun = false;
    $lampungDibangun = false;

    //CHECKING LANDMARK
    for ($i = 0; $i < 3; $i++) {
        //BUILD LANDMARK --> MINIMAL DI 2 SEKTOR SUDAH BANGUN SEMUA BANGUNAN
        if ($i == 0) {
            $sql2Sector = "SELECT DISTINCT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name IN ('Jembatan Kayu', 'Jembatan Baja', 'Jembatan Beton', 'Rumah Sakit', 'Mall', 'Taman') GROUP BY d.name";
        } else if ($i == 1) {
            $sql2Sector = "SELECT DISTINCT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name IN ('Jembatan Kayu', 'Jembatan Baja', 'Jembatan Beton', 'Perumahan', 'Apartemen', 'Hotel') GROUP BY d.name";
        } else {
            $sql2Sector = "SELECT DISTINCT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name IN ('Rumah Sakit', 'Mall', 'Taman', 'Perumahan', 'Apartemen', 'Hotel') GROUP BY d.name";
        }

        $check9Buildingssql = "SELECT DISTINCT * FROM team_constructed_building WHERE id_city = ? AND id_team = ?";
        $check9Buildingsstmt = $pdo->prepare($check9Buildingssql);
        $check9Buildingsstmt->execute([$getIDTeamrow['location_now_id_city'], $getIDTeamrow['id']]);

        $stmt2Sector = $pdo->prepare($sql2Sector);
        $stmt2Sector->execute([$_SESSION['username'], $getIDTeamrow['location_now_id_city']]);
        if ($stmt2Sector->rowCount() == 6 && $check9Buildingsstmt->rowCount() != 9) {
            // CHECKING APAKAH SUDAH PUNYA LANDMARK DI LOKASI SAAT INI
            $getLandmarksql = "SELECT b.id FROM team a JOIN landmark b ON a.location_now_id_city = b.id_city WHERE a.username = ?";
            $getLandmarkstmt = $pdo->prepare($getLandmarksql);
            $getLandmarkstmt->execute([$_SESSION['username']]);
            $getLandmark = $getLandmarkstmt->fetch();

            $sqlLandmarkCheck = "SELECT * FROM team_constructed_landmark WHERE id_landmark = ? AND id_team = ?";
            $stmtLandmarkCheck = $pdo->prepare($sqlLandmarkCheck);
            $stmtLandmarkCheck->execute([$getLandmark['id'], $getIDTeamrow['id']]);
            if ($stmtLandmarkCheck->rowCount() == 0) {
                $timestampNew = date("m-d-Y H:i:s");
                if ($getLandmark['id'] != 1 && $getLandmark['id'] != 6) {
                    //KALAU TIDAK PUNYA MAKA DAPAT LANDMARK
                    $insertTeamLandmarksql = "INSERT INTO `team_constructed_landmark`(`id`, `id_landmark`, `id_team`, `time`) VALUES (NULL, ?, ?, ?)";
                    $insertTeamLandmarkstmt = $pdo->prepare($insertTeamLandmarksql);
                    $insertTeamLandmarkstmt->execute([$getLandmark['id'], $getIDTeamrow['id'], $timestampNew]);

                    //KALAU YANG DIBANGUN LANDMARK JOGJA -BOROBUDUR- / LAMPUNG
                    if ($getLandmark['id'] == '2' || $getLandmark['id'] == 2) {
                        $jogjaDibangun = true;
                    }
                    else if ($getLandmark['id'] == '4'  || $getLandmark['id'] == 4) {
                        $lampungDibangun = true;
                    }
                } else {
                    //JAKARTA DAN JAYAPURA
                    $timeArray = array(
                        '03-27-2021 13:15:00',
                        '03-27-2021 13:35:00',
                        '03-27-2021 13:55:00',
                        '03-27-2021 14:15:00',
                        '03-27-2021 14:35:00',
                        '03-27-2021 14:55:00',
                        '03-27-2021 15:15:00',
                        '03-27-2021 15:35:00',
                        '03-27-2021 15:55:00',
                        '03-27-2021 16:15:00'
                    );

                    for ($i = 0; $i < 8; $i++) {
                        if ($timestampNew >= $timeArray[$i] && $timestampNew < $timeArray[$i + 1]) {
                            $cekJakartaJayapurasql = "SELECT * FROM team_constructed_landmark WHERE id_landmark = ? AND time >= ? AND time < ?";
                            $cekJakartaJayapurastmt = $pdo->prepare($cekJakartaJayapurasql);
                            if ($getLandmark['id'] == 1) {
                                //CEK JAKARTA
                                $cekJakartaJayapurastmt->execute([1, $timeArray[$i], $timeArray[$i + 1]]);
                            } else if ($getLandmark['id'] == 6) {
                                //CEK JAYAPURA
                                $cekJakartaJayapurastmt->execute([6, $timeArray[$i], $timeArray[$i + 1]]);
                            }
                            if ($cekJakartaJayapurastmt->rowCount() < 1) {
                                //KALAU TIDAK PUNYA MAKA DAPAT LANDMARK
                                $insertTeamLandmarksql = "INSERT INTO `team_constructed_landmark`(`id`, `id_landmark`, `id_team`, `time`) VALUES (NULL, ?, ?, ?)";
                                $insertTeamLandmarkstmt = $pdo->prepare($insertTeamLandmarksql);
                                $insertTeamLandmarkstmt->execute([$getLandmark['id'], $getIDTeamrow['id'], $timestampNew]);
                            }
                        }
                    }
                }
            }
        }
    }

    if ($jogjaDibangun == true) {
        $result['jogja'] = 'ada';
    }
    else if ($lampungDibangun == true) {
        $result['lampung'] = 'ada';
    } 

    if ($stmtHistory && $stmt) {
        $result['building'] = $building;
    }
    else {
        header("HTTP/1.1 400 Bad Request");
        $result['status'] = 0;
        $result['error'] = 'Invalid';
    }

    echo json_encode($result);
} else {
    header("HTTP/1.1 400 Bad Request");
}
?>