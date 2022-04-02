<?php
    include 'connect.php';

    header("Content-Type: application/json");

    define('TIMEZONE', 'Asia/Jakarta');
    date_default_timezone_set(TIMEZONE);
    $timestamp = date("d-m-Y H:i:s");

    $sqlTeam = "SELECT * FROM team WHERE username = ?";
    $stmtTeam = $pdo->prepare($sqlTeam);
    $stmtTeam->execute([$_SESSION['username']]);
    $rowTeam = $stmtTeam->fetch();

    if ($_POST['hidpost'] < $rowTeam['status']) {
        echo "false";
        exit();
    } else {
        if (isset($_POST['answer'])) {
            $answer = json_decode($_POST['answer']);

            if ($answer->bet <= $rowTeam['money']) {
                $countTrue = 0;
                foreach ($answer->answer as $value) {
                    if ($value == 'true') {
                        $countTrue++;
                    }
                }

                $sqlBet = "UPDATE `team` SET money = money - ? WHERE username = ?";
                $stmtBet = $pdo->prepare($sqlBet);
                $stmtBet->execute([$answer->bet, $_SESSION['username']]);

                $historysql = "INSERT INTO `history_add_money`(`id`, `username`, `money_value`, `added_on`, `added_by`, `keterangan`) VALUES (NULL, ?, ?, ?, ?, ?)";
                $historystmt = $pdo->prepare($historysql);

                if ($countTrue == 5) {
                    $giveMoneysql = "UPDATE `team` SET money = money + 3 * ? WHERE username = ?";
                    $historystmt->execute([$_SESSION['username'], 3 * $answer->bet, $timestamp, 'System', 'Hidden Post Award']);
                }
                if ($countTrue == 4) {
                    $giveMoneysql = "UPDATE `team` SET money = money + 2 * ? WHERE username = ?";
                    $historystmt->execute([$_SESSION['username'], 2 * $answer->bet, $timestamp, 'System', 'Hidden Post Award']);
                }
                if ($countTrue == 3) {
                    $giveMoneysql = "UPDATE `team` SET money = money + 1.25 * ? WHERE username = ?";
                    $historystmt->execute([$_SESSION['username'], 1.25 * $answer->bet, $timestamp, 'System', 'Hidden Post Award']);
                }
                if ($countTrue == 2) {
                    $giveMoneysql = "UPDATE `team` SET money = money + 0.5 * ? WHERE username = ?";
                    $historystmt->execute([$_SESSION['username'], 0.5 * $answer->bet, $timestamp, 'System', 'Hidden Post Award']);
                }

                if ($countTrue != 0 && $countTrue != 1) {
                    $giveMoneystmt = $pdo->prepare($giveMoneysql);
                    $giveMoneystmt->execute([$answer->bet, $_SESSION['username']]);
                }

                $updateStatussql = "UPDATE `team` SET status = status + 1 WHERE username = ?";
                $updateStatusstmt = $pdo->prepare($updateStatussql);
                $updateStatusstmt->execute([$_SESSION['username']]);

                echo json_encode($_POST['answer']);
            } else {
                echo "false";
                exit();
            }
        } else {
            echo "false";
            exit();
        }
    }
?>