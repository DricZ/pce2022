<?php
require_once 'phps/connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$_SESSION['page'] = 'home';

require_once 'phps/include.php';

    echo $_SESSION['username'];
?>