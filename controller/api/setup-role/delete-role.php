<?php
require_once('../../DBConn.php');
session_start();
$db = new DBconn();

if(isset($_GET['id'])){

	$db->softDelete("user_role","role_id",$_GET['id']);
	$db->saveUserLog("Successfully Deleted role_id ".$_GET['id']);
	echo json_encode(["success"=>true]);

}



?>