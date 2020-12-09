<?php
session_start();
require_once('../DBConn.php');

$db = new DBconn();

if(isset($_GET['search'])) {
	$search = $_GET['search'];

		$db->select("seed_collection AS sc LEFT JOIN seed_record AS sr ON sr.seed_collection_id = sc.seed_collection_id","sc.*,seed_record_id, species_code ,store_code ,cost_code ,geo_n_soil ,bulk ,tree ,dbh ,total_height ,form ,remarks ,fumigation_method ,collector ,collector_no ,collection_date ,project ,identified_by ,seed_condition ,storage ,quantity,g_method, g_from, g_to, g_viab","sc.isdeleted=0 AND sr.seed_collection_id=$search");
		$seedRecordandCollection = $db->result();

		if(count($seedRecordandCollection) == 0) {
			$arr['success'] = false;
			$arr['message'] = "Insert data first in seed record.";
			echo json_encode([$arr]);
			return;
		}

		$arr['success'] = true;
		$arr['message'] = "has a record.";
		echo json_encode([$arr]);
		return;


}

?>