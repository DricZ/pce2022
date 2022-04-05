<?php
    include 'connect.php';

    header("Content-Type: application/json");

    if (isset($_SESSION['usernameAdmin'])) {
        $sql = "SELECT a.username, nama_skill, added_on, added_by, keterangan, team_name FROM history_add_skill a JOIN team b ON a.username = b.username WHERE added_by != 'System' ORDER BY a.id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $result = array();
        while ($row = $stmt->fetch()) {
            array_push($result, $row);
        }
        echo json_encode($result);
    }
?>