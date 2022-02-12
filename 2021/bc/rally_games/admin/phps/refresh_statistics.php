<?php
    include 'connect.php';

    header("Content-Type: application/json");

    if (isset($_SESSION['usernameAdmin'])) {
        $sql = "SELECT b.team_name, a.point_value, a.added_on, a.keterangan FROM history_point a JOIN team b ON a.id_team = b.id ORDER BY a.id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $result = array();
        while ($row = $stmt->fetch()) {
            array_push($result, $row);
        }
        echo json_encode($result);
    }
?>