<?php
// include '../../Http/cors.php';
require_once('../../DBConn.php');

$db = new DBconn();
$dbDelete = new DBconn();

$arr = [];

// 	echo json_encode([$_POST]);
// return;
if(isset($_POST['seed_collection_other_id']) ) {

	for($i=0; $i<count($_POST['seed_collection_other_id']); $i++) {
		// if(trim($_POST['seed_collection_other_id'][$i]) == "") {
			$getTreeNo = $db->select("seed_collection_other","*","isdeleted=0 AND seed_collection_other_id='".$_POST['seed_collection_other_id'][$i]."' ");
			$getTreeNo = $db->result();

			$barcode = $_POST['seed_collection_other_id'][$i]."-".$getTreeNo[0]['tree_no'];

			$result = $db->rawQuery("UPDATE seed_collection_other SET 
											seed_collection_other_id='".$_POST['seed_collection_other_id'][$i]."',	
											barcode='".($barcode ?? "")."',	
											collection='".($_POST['collection'][$i] ?? "")."',	
											mc='".($_POST['mc'][$i] ?? "")."',	
											purity='".($_POST['purity'][$i] ?? "")."',	
											viab='".($_POST['viab'][$i] ?? "")."',	
											seed_count='".($_POST['seed_count'][$i] ?? 0)."',	
											room='".($_POST['room'][$i] ?? "")."',	
											cont_no='".($_POST['cont_no'][$i] ?? 0)."',	
											bag_no='".($_POST['bag_no'][$i] ?? 0)."',		
											consignee_date='".(!empty($_POST['consignee_date'][$i]) ? $_POST['consignee_date'][$i] : "00-00-0000")."',	
											consignee='".($_POST['consignee'][$i] ?? "")."',	
											released='".($_POST['released'][$i] ?? "")."',	
											balance='".($_POST['balance'][$i] ?? "")."',
											updated_at=NOW()											
											WHERE seed_collection_other_id='".$_POST['seed_collection_other_id'][$i]."' ");

		// }
	}

	$arr['success'] = true;
	$arr['message'] = "Submit Successfully.";

}else {

	$arr['success'] = false;
	$arr['message'] = "Something went Wrong.";

}


	echo json_encode([$arr]);



?>