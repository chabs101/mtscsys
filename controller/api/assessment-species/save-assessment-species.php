<?php
// include '../../Http/cors.php';
require_once('../../DBConn.php');

$db = new DBconn();

$arr = [];

// 	echo json_encode([$_POST]);
// return;
if(trim($_POST['tree_assessment_id']) == "") {
	if(isset($_POST['tree_code'])) {
		
	$result = $db->rawQuery("INSERT INTO tree_assessment (seed_collection_id, tree_code, method, topography, stem_diamenter, stem_straight, forking, circularity, tree_health, branch_angle, branch_thickness, branch_pruning, cy, remarks, created_at)
									VALUES (
									'".($_POST['seed_collection_id'] ?? "")."',	
									'".($_POST['tree_code'] ?? "")."',	
									'".($_POST['method'] ?? "")."',	
									'".($_POST['topography'] ?? 0)."',	
									'".($_POST['stem_diamenter'] ?? 0)."',
									'".($_POST['stem_straight'] ?? "")."',
									'".($_POST['forking'] ?? "")."',
									'".($_POST['circularity'] ?? "")."',
									'".($_POST['tree_health'] ?? "")."',
									'".($_POST['branch_angle'] ?? "")."',
									'".($_POST['branch_thickness'] ?? "")."',
									'".($_POST['branch_pruning'] ?? "")."',
									'".($_POST['cy'] ?? "")."',
									'".($_POST['remarks'] ?? "")."',
									NOW()) ");
	}
}else {
	$result = $db->rawQuery("UPDATE tree_assessment SET 
									seed_collection_id='".($_POST['seed_collection_id'] ?? "")."',	
									tree_code='".($_POST['tree_code'] ?? "")."',	
									method='".($_POST['method'] ?? "")."',	
									topography='".($_POST['topography'] ?? 0)."',	
									stem_diamenter='".($_POST['stem_diamenter'] ?? 0)."',
									stem_straight='".($_POST['stem_straight'] ?? "")."',
									forking='".($_POST['forking'] ?? "")."',
									circularity='".($_POST['circularity'] ?? "")."',
									tree_health='".($_POST['tree_health'] ?? "")."',
									branch_angle='".($_POST['branch_angle'] ?? "")."',
									branch_thickness='".($_POST['branch_thickness'] ?? "")."',
									branch_pruning='".($_POST['branch_pruning'] ?? "")."',
									remarks='".($_POST['remarks'] ?? "")."',
									cy='".($_POST['cy'] ?? "")."',
									updated_at=NOW()											
									WHERE tree_assessment_id='".$_POST['tree_assessment_id']."' ");

}
	$arr['success'] = true;
	$arr['message'] = "Submit Successfully.";

// }else {

// 	$arr['success'] = false;
// 	$arr['message'] = "Something went Wrong.";

// }


	echo json_encode([$arr]);



?>