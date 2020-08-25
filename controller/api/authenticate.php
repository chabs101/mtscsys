<?php
session_start();
include '../../Http/cors.php';
require_once('../DBConn.php');

$db = new DBconn();

$arr = [];

if(isset($_POST['input_username']) && isset($_POST['input_password'])){
	$remember_me = $_POST['remember_me'] ?? false; 

	if($db->authenticate($_POST['input_username'],$_POST['input_password'],$remember_me)) {
		// echo $db->checkRememberToken();
		// return;
		$arr['success'] = true;
	}

}else{
	$arr['success'] = false;
}


	echo json_encode([$arr]);

?>