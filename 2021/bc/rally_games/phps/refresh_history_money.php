<?php
    include 'connect.php';

    header("Content-Type: application/json");

    if (isset($_SESSION['username'])) {
        $sql = "SELECT a.username, money_value, added_on, added_by, keterangan, team_name FROM history_add_money a JOIN team b ON a.username = b.username WHERE a.username = ? ORDER BY a.id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_SESSION['username']]);

        $result = array();
        while ($row = $stmt->fetch()) {
            array_push($result, $row);
        }
        echo json_encode($result);
    }
?>