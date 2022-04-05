<?php
    include 'connect.php';

    header("Content-Type: application/json");

    if (isset($_SESSION['username'])) {
        $getIDTeamsql = "SELECT * FROM team WHERE username = ?";
        $getIDTeamstmt = $pdo->prepare($getIDTeamsql);
        $getIDTeamstmt->execute([$_SESSION['username']]);
        $getIDTeamrow = $getIDTeamstmt->fetch();

        $sql = "SELECT nama,count,gambar,target FROM team_resources tr JOIN new_skill ns 
        ON tr.id_resource = ns.id
        WHERE id_team =? AND tr.count != 0;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$getIDTeamrow['id']]);

        $result = array();
        while ($row = $stmt->fetch()) {
            array_push($result, $row);
        }
        echo json_encode($result);
    }
?>