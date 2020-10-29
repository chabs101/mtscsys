<?php
require_once('../../DBConn.php');

$db = new DBconn();

$search = "";
$result = [];
if(isset($_GET['search'])) {
	$search = "AND seed_record_id=".$_GET['search'];

	$db->select("seed_record_other","*","isdeleted=0 $search");
	$result = $db->result();
}


echo json_encode($result);
?>