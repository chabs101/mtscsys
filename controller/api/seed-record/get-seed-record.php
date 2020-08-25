<?php
// require_once('../../DBConn.php');

// $db = new DBconn();

// $search = "";
// $result = [];
// if(isset($_GET['search'])) {
// 	$search = "AND match(species_name, botanical_name, location, seedlot_no, region)  against('".$_GET['search']."') ";
// 	if($_GET['search']=="all") {
// 		$search = "";
// 	}
// 	$db->select("seed_collection","*","isdeleted=0 $search");
// 	$result = $db->result();
// }


// echo json_encode($result);
?>