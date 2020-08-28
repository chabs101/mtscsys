<?php
// include '../../Http/cors.php';
require_once('../../DBConn.php');

$db = new DBconn();

$arr = [];

// 	echo json_encode([$_POST]);
// return;
if(trim($_POST['seed_record_id']) == "") {
	if(isset($_POST['species_code'])) {
		
	$result = $db->rawQuery("INSERT INTO seed_record (seed_collection_id, species_code, store_code, cost_code, geo_n_soil, bulk, tree, dbh, total_height, form, remarks, fumigation_method, collector, collector_no, collection_date, project, identified_by, seed_condition, storage, quantity, created_at)
									VALUES (
									'".($_POST['seed_collection_id'] ?? "")."',	
									'".($_POST['species_code'] ?? "")."',	
									'".(!empty($_POST['store_code']) ? $_POST['store_code'] : "")."',	
									'".(!empty($_POST['cost_code']) ? $_POST['cost_code'] : "")."',	
									'".($_POST['geo_n_soil'] ?? 0)."',
									'".($_POST['bulk'] ?? "")."',
									'".($_POST['tree'] ?? "")."',
									'".($_POST['dbh'] ?? "")."',
									'".(!empty($_POST['total_height']) ? $_POST['total_height'] : 0)."',
									'".($_POST['form'] ?? "")."',
									'".($_POST['remarks'] ?? "")."',
									'".($_POST['fumigation_method'] ?? "")."',
									'".($_POST['collector'] ?? "")."',
									'".($_POST['collector_no'] ?? "")."',
									'".($_POST['collection_date'] ?? "")."',
									'".($_POST['project'] ?? "")."',
									'".($_POST['identified_by'] ?? "")."',
									'".($_POST['seed_condition'] ?? "")."',
									'".($_POST['storage'] ?? "")."',
									'".($_POST['quantity'] ?? "")."',
									NOW()) ");
	}
}else {
	$result = $db->rawQuery("UPDATE seed_record SET 
									seed_collection_id='".($_POST['seed_collection_id'] ?? "")."',	
									species_code='".($_POST['species_code'] ?? "yawa")."',	
									store_code='".(!empty($_POST['store_code']) ? $_POST['store_code'] : "")."',	
									cost_code='".(!empty($_POST['cost_code']) ? $_POST['cost_code'] : "")."',	
									geo_n_soil='".($_POST['geo_n_soil'] ?? 0)."',
									bulk='".($_POST['bulk'] ?? "")."',
									tree='".($_POST['tree'] ?? "")."',
									dbh='".($_POST['dbh'] ?? "")."',
									total_height='".(!empty($_POST['total_height']) ? $_POST['total_height'] : 0)."',
									form='".($_POST['form'] ?? "")."',
									remarks='".($_POST['remarks'] ?? "")."',
									fumigation_method='".($_POST['fumigation_method'] ?? "")."',
									collector='".($_POST['collector'] ?? "")."',
									collector_no='".($_POST['collector_no'] ?? "")."',
									collection_date='".($_POST['collection_date'] ?? "")."',
									project='".($_POST['project'] ?? "")."',
									identified_by='".($_POST['identified_by'] ?? "")."',
									seed_condition='".($_POST['seed_condition'] ?? "")."',
									storage='".($_POST['storage'] ?? "")."',
									quantity='".($_POST['quantity'] ?? "")."',
									updated_at=NOW()											
									WHERE seed_record_id='".$_POST['seed_record_id']."' ");

}
	$arr['success'] = true;
	$arr['message'] = "Submit Successfully.";

// }else {

// 	$arr['success'] = false;
// 	$arr['message'] = "Something went Wrong.";

// }


	echo json_encode([$arr]);



?>