<?php
require "connect.php";

define('TIMEZONE', 'Asia/Jakarta');
date_default_timezone_set(TIMEZONE);
$timestamp = date("d-m-Y H:i:s");

if (isset($_GET['id'])) {
    if ($_GET['id'] == 1) {
        //BANJARMASIN
        //KAYU
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price + (0.4 * r.normal_price), akses = 1
            WHERE c.id_city = 5 AND c.id_resource = 1
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //PEKERJA
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price + (0.15 * r.normal_price), akses = 1
            WHERE c.id_city = 5 AND c.id_resource = 5
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //BALI
        //KAYU, SEMEN, BAJA, PASIR
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price - (0.1 * r.normal_price), akses = 1
            WHERE c.id_city = 3 AND c.id_resource IN (1, 2, 3, 4)
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //PEKERJA
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price + (0.1 * r.normal_price), akses = 1
            WHERE c.id_city = 3 AND c.id_resource = 5
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //JOGJA
        //BAHAN BANGUNAN
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price + (0.15 * r.normal_price), akses = 1
            WHERE c.id_city = 2 AND c.id_resource IN (1, 2, 3, 4)
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } else if ($_GET['id'] == 2) {
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price + (0.2 * r.normal_price), akses = 1
            WHERE c.id_resource != 6
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } else if ($_GET['id'] == 3) {
        //JAKARTA
        //SELURUHNYA TIDAK BISA DIAKSES
        $sql = '
            UPDATE city_resource 
            SET akses = 0
            WHERE id_city = 1 AND id_resource IN (1, 2, 3, 4, 5)
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //BALI
        //PEKERJA
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price + (0.3 * r.normal_price), akses = 1
            WHERE c.id_city = 3 AND c.id_resource = 5
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    
        //SEMEN
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price + (0.1 * r.normal_price), akses = 1
            WHERE c.id_city = 3 AND c.id_resource = 3
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //PASIR
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price + (0.15 * r.normal_price), akses = 1
            WHERE c.id_city = 3 AND c.id_resource = 4
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //JAYAPURA
        //BAHAN BANGUNAN
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price - (0.05 * r.normal_price), akses = 1
            WHERE c.id_city = 6 AND c.id_resource IN (1, 2, 3, 4)
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //LAMPUNG
        //BAHAN BANGUNAN
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price + (0.1 * r.normal_price), akses = 1
            WHERE c.id_city = 4 AND c.id_resource IN (1, 2, 3, 4)
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } else if ($_GET['id'] == 4) {
        //SEMEN & PASIR LAMPUNG
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price - (0.4 * r.normal_price), akses = 1
            WHERE c.id_city = 4 AND c.id_resource IN (3, 4)
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //KAYU LAMPUNG
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price + (0.35 * r.normal_price), akses = 1
            WHERE c.id_city = 4 AND c.id_resource = 1
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //KAYU BANJARMASIN
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price - (0.2 * r.normal_price), akses = 1
            WHERE c.id_city = 5 AND c.id_resource = 1
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //PEKERJA BANJARMASIN
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price - (0.3 * r.normal_price), akses = 1
            WHERE c.id_city = 5 AND c.id_resource = 5
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //BAJA BANJARMASIN
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price + (0.2 * r.normal_price), akses = 1
            WHERE c.id_city = 5 AND c.id_resource = 2
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } else if ($_GET['id'] == 5) {
        //JAKARTA DAN JOGJA
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price + (0.2 * r.normal_price), akses = 1
            WHERE c.id_city IN (1, 2) AND c.id_resource IN (1, 2, 3, 4)
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //KOTA LAIN
        //BAHAN BANGUNAN
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price - (0.1 * r.normal_price), akses = 1
            WHERE c.id_city NOT IN (1, 2) AND c.id_resource IN (1,2,3,4)
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //PEKERJA
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price - (0.2 * r.normal_price), akses = 1
            WHERE c.id_city NOT IN (1, 2) AND c.id_resource = 5
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } else if ($_GET['id'] == 6) {
        //LAMPUNG
        //PEKERJA
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price + (0.1 * r.normal_price), akses = 1
            WHERE c.id_city = 4 AND c.id_resource = 5
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //BAJA
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price + (0.25 * r.normal_price), akses = 1
            WHERE c.id_city = 4 AND c.id_resource = 2
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //JAKARTA
        //PEKERJA
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price - (0.2 * r.normal_price), akses = 1
            WHERE c.id_city = 1 AND c.id_resource = 5
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //KAYU, BAJA, PASIR
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price - (0.1 * r.normal_price), akses = 1
            WHERE c.id_city = 1 AND c.id_resource IN (1, 2, 4)
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //JAYAPURA
        //KAYU, BAJA, PASIR
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price + (0.05 * r.normal_price), akses = 1
            WHERE c.id_city = 6 AND c.id_resource IN (1, 2, 3, 4)
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } else if ($_GET['id'] == 7) {
        //YOGYA
        //SEMEN
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price - (0.2 * r.normal_price), akses = 1
            WHERE c.id_city = 2 AND c.id_resource = 3
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //PEKERJA
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price - (0.15 * r.normal_price), akses = 1
            WHERE c.id_city = 2 AND c.id_resource = 5
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //KAYU
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price - (0.3 * r.normal_price), akses = 1
            WHERE c.id_city = 2 AND c.id_resource = 1
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //BALI
        //SEMEN, BAJA, PASIR
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price + (0.15 * r.normal_price), akses = 1
            WHERE c.id_city = 3 AND c.id_resource IN (2, 3, 4)
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //PEKERJA
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price - (0.2 * r.normal_price), akses = 1
            WHERE c.id_city = 3 AND c.id_resource = 5
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        //BANJARMASIN
        //PEKERJA
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price + (0.15 * r.normal_price), akses = 1
            WHERE c.id_city = 5 AND c.id_resource = 5
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //KAYU
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price - (0.1 * r.normal_price), akses = 1
            WHERE c.id_city = 5 AND c.id_resource = 1
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //BAJA
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price - (0.2 * r.normal_price), akses = 1
            WHERE c.id_city = 5 AND c.id_resource = 2
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } else if ($_GET['id'] == 8) {
        //PEKERJA
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price - (0.25 * r.normal_price), akses = 1
            WHERE  c.id_resource = 5
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //BAHAN BANGUNAN
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price - (0.3 * r.normal_price), akses = 1
            WHERE c.id_resource NOT IN (5, 6)
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } else if ($_GET['id'] == 9) {
        //CEK BONUS BANJARMASIN
        $bonusBanjarmasinsql = "SELECT * FROM `team_constructed_landmark` WHERE id_landmark = 5";
        $bonusBanjarmasinstmt = $pdo->prepare($bonusBanjarmasinsql);
        $bonusBanjarmasinstmt->execute();
        if ($bonusBanjarmasinstmt->rowCount() != 0) {
            while ($bonusBanjarmasin = $bonusBanjarmasinstmt->fetch()) {
                $giveKayusql = "UPDATE `team_resources` SET count = count + 2 WHERE id_resource = 1 AND id_team = ?";
                $giveKayustmt = $pdo->prepare($giveKayusql);
                $giveKayustmt->execute([$bonusBanjarmasin['id_team']]);
            }
        }
    } else if ($_GET['id'] == 10) {
        //CEK BONUS JAYAPURA
        $bonusJayapurasql = "SELECT * FROM `team_constructed_landmark` WHERE id_landmark = 6";
        $bonusJayapurastmt = $pdo->prepare($bonusJayapurasql);
        $bonusJayapurastmt->execute();
        if ($bonusJayapurastmt->rowCount() != 0) {
            while ($bonusJayapura = $bonusJayapurastmt->fetch()) {
                //CARI ID TEAM YANG BELI
                $getIDTeamsql = "SELECT * FROM team WHERE id = ?";
                $getIDTeamstmt = $pdo->prepare($getIDTeamsql);
                $getIDTeamstmt->execute([$bonusJayapura['id_team']]);
                $getIDTeamrow = $getIDTeamstmt->fetch();

                $bonus = intval($getIDTeamrow['point'] * 0.15);

                $bonusPointsql = "UPDATE `team` SET point = point + ? WHERE id = ?";
                $bonusPointstmt = $pdo->prepare($bonusPointsql);
                $bonusPointstmt->execute([$bonus, $bonusJayapura['id_team']]);

                //INSERT TO HISTORY_POINT
                $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, ?, ?, 'Bonus Jembatan Hotel Kamp')";
                $insertHistorystmt = $pdo->prepare($insertHistory);
                $insertHistorystmt->execute([$bonusJayapura['id_team'], $bonus, $timestamp]);
            }
        }
    } else if ($_GET['id'] == 11) {
        //CEK BONUS JAKARTA
        $bonusJakartasql = "SELECT * FROM `team_constructed_landmark` WHERE id_landmark = 1";
        $bonusJakartastmt = $pdo->prepare($bonusJakartasql);
        $bonusJakartastmt->execute();
        if ($bonusJakartastmt->rowCount() != 0) {
            while ($bonusJakarta = $bonusJakartastmt->fetch()) {
                $bonusPointsql = "UPDATE `team` SET point = point + 2000 WHERE id = ?";
                $bonusPointstmt = $pdo->prepare($bonusPointsql);
                $bonusPointstmt->execute([$bonusJakarta['id_team']]);

                //INSERT TO HISTORY_POINT
                $insertHistory = "INSERT INTO `history_point`(`id`, `id_team`, `point_value`, `added_on`, `keterangan`) VALUES (NULL, ?, 2000, ?, 'Bonus Monumen Nasional')";
                $insertHistorystmt = $pdo->prepare($insertHistory);
                $insertHistorystmt->execute([$bonusJakarta['id_team'], $timestamp]);
            }
        }
    } else if ($_GET['id'] == 12) {
        //NORMALISASI
        $sql = '
            UPDATE city_resource c
            JOIN resource r 
            ON c.id_resource = r.id
            SET price = r.normal_price, akses = 1
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }

    header("Location: ../trigger_info.php?stat=1");
    exit();
} else {
    header("Location: ../trigger_info.php?stat=2");
    exit();
}
?>