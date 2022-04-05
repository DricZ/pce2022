<?php
    include 'connect.php';

    header("Content-Type: application/json");

    if (isset($_SESSION['username'])) {
        $getIDTeamsql = "SELECT * FROM team WHERE username = ?";
        $getIDTeamstmt = $pdo->prepare($getIDTeamsql);
        $getIDTeamstmt->execute([$_SESSION['username']]);
        $getIDTeamrow = $getIDTeamstmt->fetch();

        $sql = "SELECT a.id, b.team_name, c.name as landmark, d.city_name, a.time FROM team_constructed_landmark a JOIN team b ON a.id_team = b.id JOIN landmark c ON a.id_landmark = c.id JOIN city d ON c.id_city = d.id WHERE a.id_landmark IN (1, 6) ORDER BY a.id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $result = array();
        while ($row = $stmt->fetch()) {
            array_push($result, $row);
        }
        echo json_encode($result);
    }
?>