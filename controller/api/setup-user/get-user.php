<?php
require_once('../../DBConn.php');

$db = new DBconn();

$search = "";
$result = [];
if(isset($_GET['search'])) {
	$search = "AND (username='".$_GET['search']."' OR first_name='".$_GET['search']."' OR last_name='".$_GET['search']."') ";
	if($_GET['search']=="all") {
		$search = "";
	}
	$db->select("dt_user","*","isdeleted=0 AND isAdmin=0 $search");
	$result = $db->result();
}


echo json_encode($result);
?>