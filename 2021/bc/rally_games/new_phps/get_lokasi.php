<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SESSION['username'])) {
        $sql = "SELECT p.path as id_pulau_ku, t.username as username
        FROM team t 
        JOIN new_pulau p ON t.location_now_id_city = p.id
        WHERE username = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_SESSION['username']]);
        $result = array();
        while($row = $stmt->fetch()) {
            array_push($result, $row);
        }
        echo json_encode($result);
    } else {
        header("HTTP/1.1 400 Bad Request");
        $error = array(
            'error' => 'Method not Allowed'
        );
        echo json_encode($error);
    }
?>