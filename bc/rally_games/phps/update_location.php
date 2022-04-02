<?php
require "connect.php";

if (isset($_GET['stat'])) {
    $updateLocationsql = "UPDATE `team` SET `location_now_id_city` = ? WHERE username = ?";
    $updateLocationstmt = $pdo->prepare($updateLocationsql);
    $updateLocationstmt->execute([$_GET['stat'], $_SESSION['username']]);

    header("Location: ../map.php?stat=2");
    exit();
} else if (isset($_GET['data'])) {
    $getIDTeamsql = "SELECT * FROM team WHERE username = ?";
    $getIDTeamstmt = $pdo->prepare($getIDTeamsql);
    $getIDTeamstmt->execute([$_SESSION['username']]);
    $getIDTeamrow = $getIDTeamstmt->fetch();

    $cekTiketsql = "SELECT * FROM team_resources WHERE id_resource = 6 AND id_team = ?";
    $cekTiketstmt = $pdo->prepare($cekTiketsql);
    $cekTiketstmt->execute([$getIDTeamrow['id']]);
    $cekTiketrow = $cekTiketstmt->fetch();

    //CEK BONUS BALI TOURISM PARADISE
    $bonusBalisql = "SELECT * FROM `team_constructed_landmark` WHERE id_landmark = 3 AND id_team = ?";
    $bonusBalistmt = $pdo->prepare($bonusBalisql);
    $bonusBalistmt->execute([$getIDTeamrow['id']]);
    if ($bonusBalistmt->rowCount() == 0) {
        if ($cekTiketstmt->rowCount() == 0 || $cekTiketrow['count'] == 0) {
            echo "false";
            exit();
        }
    }

    $getIDCitysql = "SELECT * FROM city WHERE city_name = ?";
    $getIDCitystmt = $pdo->prepare($getIDCitysql);
    $getIDCitystmt->execute([$_GET['data']]);
    $getIDCityrow = $getIDCitystmt->fetch();

    define('TIMEZONE', 'Asia/Jakarta');
    date_default_timezone_set(TIMEZONE);
    $timestamp = date("d-m-Y H:i:s");

    $updateLocationsql = "UPDATE `team` SET `location_now_id_city` = ?, `cooldown` = ? WHERE username = ?";
    $updateLocationstmt = $pdo->prepare($updateLocationsql);
    $updateLocationstmt->execute([$getIDCityrow['id'], $timestamp, $_SESSION['username']]);

    if ($bonusBalistmt->rowCount() != 0) {
        $addMoneysql = "UPDATE `team` SET `money` = `money` + 2000 WHERE username = ?";
        $addMoneystmt = $pdo->prepare($addMoneysql);
        $addMoneystmt->execute([$_SESSION['username']]);

        $historysql = "INSERT INTO `history_add_money`(`id`, `username`, `money_value`, `added_on`, `added_by`, `keterangan`) VALUES (NULL, ?, ?, ?, ?, ?)";
        $historystmt = $pdo->prepare($historysql);
        $historystmt->execute([$_SESSION['username'], 2000, $timestamp, 'System', 'Tourism Paradise Bonus']);
    } else {
        $updateTiketsql = "UPDATE `team_resources` SET `count` = `count` - 1 WHERE id_resource = 6 AND id_team = ?";
        $updateTiketstmt = $pdo->prepare($updateTiketsql);
        $updateTiketstmt->execute([$getIDTeamrow['id']]);
    }
    
    echo "true";
} else {
    header("Location: ../map.php?stat=1");
    exit();
}
?>