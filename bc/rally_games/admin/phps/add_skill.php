<?php
require "connect.php";

if (isset($_POST)) {
    $username = $_POST['team'];
    $skill = $_POST['skill'];
    $keterangan = $_POST['keterangan'];

    $sql = "SELECT * from team_resources tr JOIN new_skill ns ON tr.id_resource=ns.id JOIN team t on tr.id_team =t.id WHERE ns.nama = ? AND t.username= ?;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$skill,$username]);
    $stmtrow = $stmt->fetch();

    $sql_id = "SELECT * from new_skill where nama=?;";
    $stmt_id = $pdo->prepare($sql_id);
    $stmt_id->execute([$skill]);
    $stmtrow_id = $stmt_id->fetch();
    
    $sql_username = "SELECT * from team where username=?;";
    $stmt_username = $pdo->prepare($sql_username);
    $stmt_username->execute([$username]);
    $stmtrow_username = $stmt_username->fetch();

    if ($stmt->rowCount() == 0) {
        if ($skill=='Boom Mega Boom' or $skill = 'Meteor') {
            $addskillsql = "INSERT INTO `team_resources`(`id`, `id_resource`, `count`, `id_team`) VALUES (NULL,?,?,?);";
            $addskillstmt = $pdo->prepare($addskillsql);
            $addskillstmt->execute([$stmtrow_id['id'],2,$stmtrow_username['id']]);
        }
        elseif ($skill ='Divide Et Impera') {
            $addskillsql = "INSERT INTO `team_resources`(`id`, `id_resource`, `count`, `id_team`) VALUES (NULL,?,?,?);";
            $addskillstmt = $pdo->prepare($addskillsql);
            $addskillstmt->execute([$stmtrow_id['id'],3,$stmtrow_username['id']]);
        }
        else{
            $addskillsql = "INSERT INTO `team_resources`(`id`, `id_resource`, `count`, `id_team`) VALUES (NULL,?,?,?);";
            $addskillstmt = $pdo->prepare($addskillsql);
            $addskillstmt->execute([$stmtrow_id['id'],1,$stmtrow_username['id']]);
        }
    }
    else{
        if ($stmtrow_id['id']==29 or $stmtrow_id['id']==25) {
            $addskillsql = "UPDATE team_resources SET count=(SELECT count+2 FROM team_resources tr JOIN team t ON tr.id_team = t.id JOIN new_skill ns ON tr.id_resource = ns.id WHERE
            ns.nama=? and t.username =?) where id_team=? and id_resource=?;";
            $addskillstmt = $pdo->prepare($addskillsql);
            $addskillstmt->execute([$skill, $username,$stmtrow_username['id'],$stmtrow_id['id']]);
        }
        elseif ($stmtrow_id['id']==26) {
            $addskillsql = "UPDATE team_resources SET count=(SELECT count+3 FROM team_resources tr JOIN team t ON tr.id_team = t.id JOIN new_skill ns ON tr.id_resource = ns.id WHERE
            ns.nama=? and t.username =?) where id_team = ? and id_resource=?;";
            $addskillstmt = $pdo->prepare($addskillsql);
            $addskillstmt->execute([$skill, $username,$stmtrow_username['id'],$stmtrow_id['id']]);
        }
        else{
            $addskillsql = "UPDATE team_resources SET count=(SELECT count+1 FROM team_resources tr JOIN team t ON tr.id_team = t.id JOIN new_skill ns ON tr.id_resource = ns.id WHERE
            ns.nama=? and t.username =?) where id_team = ? and id_resource=?;";
            $addskillstmt = $pdo->prepare($addskillsql);
            $addskillstmt->execute([$skill, $username,$stmtrow_username['id'],$stmtrow_id['id']]);
        }
        
    }
    
    define('TIMEZONE', 'Asia/Jakarta');
    date_default_timezone_set(TIMEZONE);
    $timestamp = date("d-m-Y H:i:s");

    $historysql = "INSERT INTO `history_add_skill`(`id`, `username`, `nama_skill`, `added_on`, `added_by`, `keterangan`) VALUES (NULL, ? , ?, ?, ?, ?)";
    $historystmt = $pdo->prepare($historysql);
    $historystmt->execute([$username, $skill, $timestamp, $_SESSION['namaAdmin'], $keterangan]);

    header("Location: ../addskill.php?stat=1");
    exit();
} else {
    header("Location: ../addskill.php?stat=2");
    exit();
}
?>