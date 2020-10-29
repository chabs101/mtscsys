<?php
require_once('../../DBConn.php');

$db = new DBconn();

$search = "";
$result = [];
if(isset($_GET['search'])) {
	$search = "AND sc.prefix_id='".$_GET['search']."' OR sc.seedlot_no='".$_GET['search']."' OR sc.botanical_name='".$_GET['search']."'";

	$db->select("seed_collection AS sc LEFT JOIN seed_record AS sr ON sr.seed_collection_id = sc.seed_collection_id","sc.*,seed_record_id, species_code ,store_code ,cost_code ,geo_n_soil ,bulk ,tree ,dbh ,total_height ,form ,remarks ,fumigation_method ,collector ,collector_no ,collection_date ,project ,identified_by ,seed_condition ,storage ,quantity,g_method,g_from,g_to,g_viab","sc.isdeleted=0 $search");
	$result = $db->result();
}


echo json_encode($result);
?>