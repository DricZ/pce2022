<?php
    require "connect.php";

    if (isset($_POST['id']) && isset($_SESSION['namaAdmin'])) {
        $updatestatussql = "UPDATE pendaftar SET status = ?, confirmed_by = ? WHERE id = ?";
        $updatestatusstmt = $pdo->prepare($updatestatussql);
        $updatestatusstmt->execute([1, $_SESSION['namaAdmin'], $_POST['id']]);

        echo "true";
    } else {
        exit();
    }
?>