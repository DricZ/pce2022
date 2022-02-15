<?php
    include 'connect.php';

    header("Content-Type: application/json");

    if (isset($_SESSION['username'])) {
        $sql = "SELECT name 
        FROM building_type b 
        JOIN  team_constructed_building a ON a.id_building_type = b.id 
        JOIN team c ON a.id_team = c.id 
        WHERE c.username = ? and b.id_building = 1
        LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_SESSION['username']]);

        $result = array();
        while ($row = $stmt->fetch()) {
            array_push($result, $row);
        }
        echo json_encode($result);
    }
?>