<?php
require_once('../../DBConn.php');

$db = new DBconn();

$search = "";
$result = [];
if(isset($_GET['search'])) {
	$search = "AND sc.prefix_id='".$_GET['search']."' OR sc.seedlot_no='".$_GET['search']."' OR sc.botanical_name='".$_GET['search']."'";

	$db->select("seed_collection AS sc LEFT JOIN tree_assessment AS ta ON ta.seed_collection_id = sc.seed_collection_id LEFT JOIN seed_record AS sr ON sc.seed_collection_id = sr.seed_collection_id ","sc.*,tree_assessment_id,method, topography, stem_diamenter, tree_code, stem_straight, forking, circularity, tree_health, branch_angle, branch_thickness, branch_pruning, ta.remarks,total_height,cy","sc.isdeleted=0 $search");
	$result = $db->result();
}


echo json_encode($result);
?>