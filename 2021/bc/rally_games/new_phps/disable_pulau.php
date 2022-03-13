<?php
    require_once 'connect.php';
    header("Content-Type: application/json");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $result = array();

        if (isset($_POST['skill'])) {
            if ($_POST['skill'] == 'Boom Mega Boom' || $_POST['skill'] == 'Meteor') {
                $sql_pulau = "SELECT path AS _path FROM new_pulau WHERE tipe != 'kecil'";
                $stmt_pulau = $pdo->prepare($sql_pulau);
                $stmt_pulau->execute();    
                while($row = $stmt_pulau->fetch()) {
                    array_push($result, $row);
                }
            }
        } else if (isset($_POST['pulau'])) {
            
        }

        $sql_jembatan = "SELECT nama AS _path FROM new_jembatan";
        $stmt_jembatan = $pdo->prepare($sql_jembatan);
        $stmt_jembatan->execute();
        while($row = $stmt_jembatan->fetch()) {
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