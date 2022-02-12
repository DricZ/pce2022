<?php
    include 'connect.php';

    header("Content-Type: application/json");

    if (isset($_SESSION['usernameAdmin'])) {
        $sql = "SELECT a.team_name, a.money, a.point FROM team a ORDER BY a.point DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $result = array();
        while ($row = $stmt->fetch()) {
            array_push($result, $row);
        }
        echo json_encode($result);
    }
