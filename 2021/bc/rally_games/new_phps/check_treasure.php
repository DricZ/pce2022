<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    if ($_SERVER['REQUEST_METHOD'] == 'POST' 
    && isset($_POST['pulau_harta'])) {
        $result = "tdk_ada";

        // CEK APAKAH TREASURE MASIH ADA
        $sql = "SELECT * FROM `new_pulau` 
        WHERE path = ? 
        AND treasure != '0'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['pulau_harta']]);

        // JIKA TREASURE MASIH ADA
        if ($stmt->rowCount() != 0) {
            $result = "ada";
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