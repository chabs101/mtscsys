<?php
	session_start();

	if(!isset($_SESSION['fullname'])) {
		header('Location:../controller/api/session-destroy.php');
	}

?>