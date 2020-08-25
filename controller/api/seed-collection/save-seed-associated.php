<?php
// include '../../Http/cors.php';
require_once('../../DBConn.php');

$db = new DBconn();
$dbDelete = new DBconn();

$arr = [];

// 	echo json_encode([$_POST]);
// return;
if(isset($_POST['assoc_inc']) || isset($_POST['freq']) || isset($_POST['ht_m']) || isset($_POST['comments']) ) {

	if(isset($_POST['tobeDelete_id'])) {
		for($i=0; $i<count($_POST['tobeDelete_id']); $i++) {
			$dbDelete->softDelete("seed_collection_prov","seed_prov_id",$_POST['tobeDelete_id'][$i]);
		}
	}

	for($i=0; $i<count($_POST['seed_prov_id']); $i++) {
		// echo $_POST['seed_prov_id'][$i] . "<br>";
		if(trim($_POST['seed_prov_id'][$i]) == "") {
			$result = $db->rawQuery("INSERT INTO seed_collection_prov (seed_collection_id, assoc_inc, freq, ht_m, comments, created_at)
											VALUES (
											'".$_POST['seed_collection_id'][$i]."',	
											'".($_POST['assoc_inc'][$i] ?? "")."',	
											'".($_POST['freq'][$i] ?? "")."',	
											'".($_POST['ht_m'][$i] ?? "")."',	
											'".($_POST['comments'][$i] ?? "")."',
											NOW()) ");
		}else {
			$result = $db->rawQuery("UPDATE seed_collection_prov SET 
											seed_collection_id='".$_POST['seed_collection_id'][$i]."',	
											assoc_inc='".($_POST['assoc_inc'][$i] ?? "")."',	
											freq='".($_POST['freq'][$i] ?? "")."',	
											ht_m='".($_POST['ht_m'][$i] ?? "")."',	
											comments='".($_POST['comments'][$i] ?? "")."',
											updated_at=NOW()											
											WHERE seed_prov_id='".$_POST['seed_prov_id'][$i]."' ");

		}
	}

	$arr['success'] = true;
	$arr['message'] = "Submit Successfully.";

}else {

	$arr['success'] = false;
	$arr['message'] = "Something went Wrong.";

}


	echo json_encode([$arr]);



?>