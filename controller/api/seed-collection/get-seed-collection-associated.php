<?php
require_once('../../DBConn.php');

$db = new DBconn();

$search = "";
$result = [];
if(isset($_GET['search'])) {
	$search = "AND seed_collection_id=".$_GET['search'];

	$db->select("seed_collection_prov","*","isdeleted=0 $search");
	$result = $db->result();
}


echo json_encode($result);
?>