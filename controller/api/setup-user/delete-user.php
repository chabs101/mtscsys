<?php
require_once('../../DBConn.php');

$db = new DBconn();

if(isset($_GET['id'])){

	$db->softDelete("dt_user","user_id",$_GET['id']);
	echo json_encode(["success"=>true]);

}



?>