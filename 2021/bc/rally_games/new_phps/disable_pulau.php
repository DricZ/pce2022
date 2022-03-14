<?php
    require_once 'connect.php';
    header("Content-Type: application/json");

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['skill'])) {
        $result = array();

        if ($_POST['skill'] == 'Boom Mega Boom' || $_POST['skill'] == 'Meteor') {
            $sql_pulau = "SELECT path AS _path FROM new_pulau WHERE tipe = 'kecil'";
            $stmt_pulau = $pdo->prepare($sql_pulau);
            $stmt_pulau->execute();    
            while($row = $stmt_pulau->fetch()) {
                array_push($result, $row);
            }
        } else if ($_POST['skill'] == "pulau" && isset($_POST['pulau'])) {
            $sql_pulau = "SELECT id, path as _path FROM new_pulau WHERE path = ?";
            $stmt_pulau = $pdo->prepare($sql_pulau);
            $stmt_pulau->execute([$_POST['pulau']]);
            $row_pulau = $stmt_pulau->fetch();
            $id_pulau = $row_pulau['id'];
            array_push($result, $row_pulau);

            $sql_jembatan = "SELECT nama AS _path FROM new_jembatan WHERE id_pulau1 = ? OR id_pulau2 = ?";
            $stmt_jembatan = $pdo->prepare($sql_jembatan);
            $stmt_jembatan->execute([$id_pulau, $id_pulau]);
            while($row = $stmt_jembatan->fetch()) {
                array_push($result, $row);
            }
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