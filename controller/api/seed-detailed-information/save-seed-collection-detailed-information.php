<?php
// include '../../Http/cors.php';
require_once('../../DBConn.php');

$db = new DBconn();

$arr = [];

// 	echo json_encode([$_POST]);
// return;
if(trim($_POST['detailed_info_id']) == "") {
	if(isset($_POST['owner'])) {
		
	$result = $db->rawQuery("INSERT INTO seed_detailed_information (seed_collection_id, owner, contact_no, date_assess, soil_type, access_road, total_area, year_establish, assoc_agri, spacing, remarks, created_at)
									VALUES (
									'".($_POST['seed_collection_id'] ?? "")."',	
									'".($_POST['owner'] ?? "")."',	
									'".($_POST['contact_no'] ?? "")."',	
									'".($_POST['date_assess'] ?? 0)."',	
									'".($_POST['soil_type'] ?? 0)."',
									'".($_POST['access_road'] ?? "")."',
									'".($_POST['total_area'] ?? "")."',
									'".($_POST['year_establish'] ?? "")."',
									'".($_POST['assoc_agri'] ?? "")."',
									'".($_POST['spacing'] ?? "")."',
									'".($_POST['remarks'] ?? "")."',
									NOW()) ");
	}
}else {
	$result = $db->rawQuery("UPDATE seed_detailed_information SET 
									seed_collection_id='".($_POST['seed_collection_id'] ?? "")."',	
									owner='".($_POST['owner'] ?? "")."',	
									contact_no='".($_POST['contact_no'] ?? "")."',	
									date_assess='".($_POST['date_assess'] ?? 0)."',	
									soil_type='".($_POST['soil_type'] ?? 0)."',
									access_road='".($_POST['access_road'] ?? "")."',
									total_area='".($_POST['total_area'] ?? "")."',
									year_establish='".($_POST['year_establish'] ?? "")."',
									assoc_agri='".($_POST['assoc_agri'] ?? "")."',
									spacing='".($_POST['spacing'] ?? "")."',
									remarks='".($_POST['remarks'] ?? "")."',
									updated_at=NOW()											
									WHERE detailed_info_id='".$_POST['detailed_info_id']."' ");

}
	$arr['success'] = true;
	$arr['message'] = "Submit Successfully.";

// }else {

// 	$arr['success'] = false;
// 	$arr['message'] = "Something went Wrong.";

// }


	echo json_encode([$arr]);



?>