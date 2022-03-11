<?php
    include 'connect.php';

    header("Content-Type: application/json");

    if (isset($_SESSION['username'])) {
        $getIDTeamsql = "SELECT * FROM team WHERE username = ?";
        $getIDTeamstmt = $pdo->prepare($getIDTeamsql);
        $getIDTeamstmt->execute([$_SESSION['username']]);
        $getIDTeamrow = $getIDTeamstmt->fetch();

        $sql = "SELECT resource_name, count, image FROM team_resources a JOIN resource b ON a.id_resource = b.id WHERE id_team = ? AND count != 0 AND a.id_resource<18 ORDER BY id_resource";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$getIDTeamrow['id']]);

        $result = array();
        while ($row = $stmt->fetch()) {
            array_push($result, $row);
        }
        echo json_encode($result);
    }
?>