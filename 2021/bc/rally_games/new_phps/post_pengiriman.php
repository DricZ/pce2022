<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' 
    && isset($_POST['id_jembatan']) && isset($_SESSION['username'])){
        $sql_team = "SELECT * FROM team WHERE username = ?;";
        $stmt_team = $pdo->prepare($sql_team);
        $stmt_team->execute([$_SESSION['username']]);
        $row_team = $stmt_team->fetch();
        $id_team = $row_team['id'];
        
        $updateidTeamsql = "UPDATE `new_jembatan` SET `id_team` = ?,`id_tipe` = ? WHERE 'id_team' = ?";
        $updateidTeamstmt = $pdo->prepare($updateInventorysql);
        $updateidTeamstmt->execute([$id_team, $_POST['id_tipe'], $id_team]);

        $sql_korek = "UPDATE team_resources SET count =
            (SELECT count-? FROM team_resources 
            WHERE id_resource=13)
            WHERE id_resource = 13 AND id_team =?;";
            $stmt_korek = $pdo->prepare($sql_korek);
            $stmt_korek->execute([$korek,$id_team]);
        
        echo json_encode($result);
    }
    
    else {
        header("HTTP/1.1 400 Bad Request");
        $error = array(
            'error' => 'Method not Allowed'
        );
        echo json_encode($error);
    }
    
?>