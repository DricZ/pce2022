<?php
    require_once 'connect.php';
    header("Content-Type: application/json");
    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['skill'])) {
    $sql_pilih_pulau = "SELECT * FROM new_pulau WHERE tipe<>'kecil';";
    $stmt_pilih_pulau = $pdo->prepare($sql_pilih_pulau);
    $stmt_pilih_pulau->execute();
    $result = array();
    while($row = $stmt_pilih_pulau->fetch()) {
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