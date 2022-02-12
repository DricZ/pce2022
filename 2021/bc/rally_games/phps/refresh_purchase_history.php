<?php
    include 'connect.php';

    header("Content-Type: application/json");

    if (isset($_SESSION['username'])) {
        $getIDTeamsql = "SELECT * FROM team WHERE username = ?";
        $getIDTeamstmt = $pdo->prepare($getIDTeamsql);
        $getIDTeamstmt->execute([$_SESSION['username']]);
        $getIDTeamrow = $getIDTeamstmt->fetch();

        $sql = "SELECT a.id, b.resource_name, a.count, c.city_name, a.price, b.image FROM team_history_bought_resources a JOIN resource b ON a.id_resource = b.id JOIN city c ON a.id_city = c.id WHERE id_team = ? ORDER BY a.id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$getIDTeamrow['id']]);

        $result = array();
        while ($row = $stmt->fetch()) {
            array_push($result, $row);
        }
        echo json_encode($result);
    }
?>