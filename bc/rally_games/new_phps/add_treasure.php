<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pulau']) 
    && isset($_POST['harta']) && isset($_POST['time'])){
        $sql_time = "SELECT * FROM new_timing WHERE nama = 'treasure'";
        $stmt_time = $pdo->prepare($sql_time);
        $stmt_time->execute();
        $row_time = $stmt_time->fetch();

        $result = "kosong";

        if ($row_time['jam'] == $_POST['time']) {
            for ($i=0; $i < sizeof($_POST['pulau']); $i++) { 
                $sql = "UPDATE new_pulau SET treasure = ? WHERE path = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_POST["harta"][$i], $_POST["pulau"][$i]]);
            }

            $result = "masuk";

            $sql_change = "UPDATE new_timing SET jam = ? WHERE nama = 'treasure'";
            $stmt_change = $pdo->prepare($sql_change);
            $stmt_change->execute([$_POST['time']+1]);
        }
        
        echo json_encode([$_POST["pulau"], $_POST["harta"], $_POST["time"], $result]);
    } else {
        header("HTTP/1.1 400 Bad Request");
        $error = array(
            'error' => 'Method not Allowed'
        );
        echo json_encode($error);
    }
    
?>