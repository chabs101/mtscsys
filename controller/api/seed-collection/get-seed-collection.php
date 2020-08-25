<?php
require_once('../../DBConn.php');

// THIS PAGINATION WORKS ON DESC
$db = new DBconn();
$search = "";
$limit = "";
$nextPage = "";
$prevPage = "";
$orderBy = "";
$result = [];

if(isset($_GET['search'])) {
	$search = "AND match(species_name, botanical_name, location, seedlot_no, region, prefix_id)  against('".$_GET['search']."') ";
	if($_GET['search']=="all") {
		$search = "";
	}
	
	if(isset($_GET['nextPage']) && !empty($_GET['nextPage'])) {
		$nextPage = "AND seed_collection_id < ".$_GET['nextPage']." "; //get last id of current page
	}

	if(isset($_GET['prevPage']) && !empty($_GET['prevPage'])) {
		$nextPage = " AND seed_collection_id <=".$_GET['nextPage']." "; //get first id of previous page
		$prevPage = "AND seed_collection_id > ".$_GET['prevPage']." "; //get last id of previous page
	}

	if(isset($_GET['limit'])) {
		$limit = $_GET['limit'] == "All" ? "" : " LIMIT ".$_GET['limit']." ";
	}
	// echo json_encode($limit);
	// return;
	$orderBy = "ORDER BY seed_collection_id DESC";		
	$db->select("seed_collection FORCE INDEX (PRIMARY)","*","isdeleted=0 $search $prevPage $nextPage $orderBy $limit");
	$result = $db->result();
}


echo json_encode($result);
?>