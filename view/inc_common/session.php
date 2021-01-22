<?php
	require_once('../controller/DBConn.php');
	session_start();

	if(!isset($_SESSION[$_ENV["database_name"].'-fullname'])) {
		header('Location:../controller/api/session-destroy.php');
	}

?>