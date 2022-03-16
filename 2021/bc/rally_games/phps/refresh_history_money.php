<?php
    include 'connect.php';

    header("Content-Type: application/json");

    if (isset($_SESSION['username'])) {
        $sql = "SELECT money_value, added_on, keterangan FROM team c JOIN history_add_money x ON x.username = c.username WHERE c.username = ? ORDER BY added_on DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_SESSION['username']]);

        $result = array();
        while ($row = $stmt->fetch()) {
            array_push($result, $row);
        }
        echo json_encode($result);
    }
?>