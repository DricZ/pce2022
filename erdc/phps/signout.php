<?php 
	session_start();
	session_destroy();
	header("Location: ../info_checking.php?status=1");
?>