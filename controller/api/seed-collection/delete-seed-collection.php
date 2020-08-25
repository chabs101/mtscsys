<?php
require_once('../../DBConn.php');

$db = new DBconn();

if(isset($_GET['id'])){

	$db->softDelete("seed_collection","seed_collection_id",$_GET['id']);
	echo json_encode(["success"=>true]);

}



?>