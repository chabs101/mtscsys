<?php
require_once('../../DBConn.php');

$db = new DBconn();

$search = "";
$result = [];
if(isset($_GET['search'])) {
	$search = "AND sc.prefix_id='".$_GET['search']."' OR sc.seedlot_no='".$_GET['search']."' OR sc.botanical_name='".$_GET['search']."'";

	$db->select("seed_collection AS sc LEFT JOIN seed_detailed_information AS sdi ON sdi.seed_collection_id = sc.seed_collection_id LEFT JOIN seed_record AS sr ON sc.seed_collection_id = sr.seed_collection_id LEFT JOIN tree_assessment AS ta ON ta.seed_collection_id = sc.seed_collection_id","sc.*,detailed_info_id,owner,soil_type, date_assess,contact_no, access_road, total_area, year_establish, assoc_agri,sdi.remarks,spacing,method,topography","sc.isdeleted=0 $search");
	$result = $db->result();
}


echo json_encode($result);
?>