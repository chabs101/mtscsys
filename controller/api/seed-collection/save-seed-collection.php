<?php
// include '../../Http/cors.php';
require_once('../../DBConn.php');

$db = new DBconn();

$arr = [];

// 	echo json_encode([$_POST]);
// return;
if(trim($_POST['seed_collection_id']) == "") {
	if(isset($_POST['species_name'])) {
		
	$result = $db->rawQuery("INSERT INTO seed_collection (species_name, botanical_name, location, lat, longi, alt, seedlot_no, region, provenance_name_db, ph_climatic_type, map_name, habitat, veg_struct, sp_freq, slope, seed_crop, bud, flower, soil_struct, ph, geo_alluv, predation_status, root_sucker, coppice, team, description, seed_weight, viab, collect_as_bulk, individuals, seed_date,  created_at)
									VALUES (
									'".($_POST['species_name'] ?? "")."',	
									'".($_POST['botanical_name'] ?? "")."',	
									'".($_POST['location'] ?? "")."',	
									'".($_POST['lat'] ?? 0)."',	
									'".($_POST['longi'] ?? 0)."',
									'".($_POST['alt'] ?? "")."',
									'".($_POST['seedlot_no'] ?? "")."',
									'".($_POST['region'] ?? "")."',
									'".($_POST['provenance_name_db'] ?? "")."',
									'".($_POST['ph_climatic_type'] ?? "")."',
									'".($_POST['map_name'] ?? "")."',
									'".($_POST['habitat'] ?? "")."',
									'".($_POST['veg_struct'] ?? "")."',
									'".($_POST['sp_freq'] ?? "")."',
									'".($_POST['slope'] ?? "")."',
									'".($_POST['seed_crop'] ?? "")."',
									'".($_POST['bud'] ?? "")."',
									'".($_POST['flower'] ?? "")."',
									'".($_POST['soil_struct'] ?? "")."',
									'".($_POST['ph'] ?? "")."',
									'".($_POST['geo_alluv'] ?? "")."',
									'".($_POST['predation_status'] ?? "")."',
									'".($_POST['root_sucker'] ?? "")."',
									'".($_POST['coppice'] ?? "")."',
									'".($_POST['team'] ?? "")."',
									'".($_POST['description'] ?? "")."',
									'".(!empty($_POST['seed_weight']) ? $_POST['seed_weight'] :  0)."',
									'".($_POST['viab'] ?? "")."',
									'".($_POST['collect_as_bulk'] ?? "")."',
									'".(!empty($_POST['individuals']) ? $_POST['individuals'] : 0)."',
									'".($_POST['seed_date'] ?? "")."',
									NOW()) ");

	$db->select("seed_collection","*","species_name='".$_POST['species_name']."' AND 
		botanical_name='".$_POST['botanical_name']."' AND 
		seedlot_no='".$_POST['seedlot_no']."' AND
		region='".$_POST['region']."' ");
	$result = $db->result();

	$prefixid = str_pad($result[0]['seed_collection_id'],5,'0',STR_PAD_LEFT);
		$db->rawQuery("UPDATE seed_collection SET
			prefix_id='".$prefixid."'
			WHERE seed_collection_id='".$result[0]['seed_collection_id']."' ");

	}
}else {
	$prefixid = str_pad($_POST['seed_collection_id'],5,'0',STR_PAD_LEFT);

	$result = $db->rawQuery("UPDATE seed_collection SET 
									species_name='".($_POST['species_name'] ?? "")."',	
									botanical_name='".($_POST['botanical_name'] ?? "")."',	
									prefix_id='".$prefixid."',										
									location='".($_POST['location'] ?? "")."',	
									lat='".($_POST['lat'] ?? 0)."',	
									longi='".($_POST['longi'] ?? 0)."',
									alt='".($_POST['alt'] ?? "")."',
									seedlot_no='".($_POST['seedlot_no'] ?? "")."',
									region='".($_POST['region'] ?? "")."',
									provenance_name_db='".($_POST['provenance_name_db'] ?? "")."',
									ph_climatic_type='".($_POST['ph_climatic_type'] ?? "")."',
									map_name='".($_POST['map_name'] ?? "")."',
									habitat='".($_POST['habitat'] ?? "")."',
									veg_struct='".($_POST['veg_struct'] ?? "")."',
									sp_freq='".($_POST['sp_freq'] ?? "")."',
									slope='".($_POST['slope'] ?? "")."',
									seed_crop='".($_POST['seed_crop'] ?? "")."',
									bud='".($_POST['bud'] ?? "")."',
									flower='".($_POST['flower'] ?? "")."',
									soil_struct='".($_POST['soil_struct'] ?? "")."',
									ph='".($_POST['ph'] ?? "")."',
									geo_alluv='".($_POST['geo_alluv'] ?? "")."',
									predation_status='".($_POST['predation_status'] ?? "")."',
									root_sucker='".($_POST['root_sucker'] ?? "")."',
									coppice='".($_POST['coppice'] ?? "")."',
									team='".($_POST['team'] ?? "")."',
									seed_date='".($_POST['seed_date'] ?? "")."',
									description='".($_POST['description'] ?? "")."',
									seed_weight='".(!empty($_POST['seed_weight']) ? $_POST['seed_weight'] :  0)."',
									viab='".($_POST['viab'] ?? "")."',
									collect_as_bulk='".($_POST['collect_as_bulk'] ?? "")."',
									individuals='".(!empty($_POST['individuals']) ? $_POST['individuals'] : 0)."',
									updated_at=NOW()											
									WHERE seed_collection_id='".$_POST['seed_collection_id']."' ");

}
	$arr['success'] = true;
	$arr['message'] = "Submit Successfully.";

// }else {

// 	$arr['success'] = false;
// 	$arr['message'] = "Something went Wrong.";

// }


	echo json_encode([$arr]);



?>