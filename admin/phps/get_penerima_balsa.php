<?php
    include 'connect.php';

    // header("Content-Type: application/json");

    if (isset($_POST['id'])) {
        $sql = "SELECT * FROM penerima_balsa WHERE id_team = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['id']]);
        $row = $stmt->fetch();

        echo json_encode($row);
    } else {
        exit();
    }
?>