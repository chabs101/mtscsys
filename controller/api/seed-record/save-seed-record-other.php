<?php
// include '../../Http/cors.php';
require_once('../../DBConn.php');

$db = new DBconn();
$dbDelete = new DBconn();

$arr = [];

// 	echo json_encode([$_POST]);
// return;
if(isset($_POST['consignee_date']) || isset($_POST['tree_no']) || isset($_POST['consignee']) || isset($_POST['released']) || isset($_POST['balance']) ) {

	if(isset($_POST['tobeDelete_id'])) {
		for($i=0; $i<count($_POST['tobeDelete_id']); $i++) {
			$dbDelete->softDelete("seed_record_other","seed_record_other_id",$_POST['tobeDelete_id'][$i]);
		}
	}

	for($i=0; $i<count($_POST['seed_record_other_id']); $i++) {
		// echo $_POST['seed_record_other_id'][$i] . "<br>";
		if(trim($_POST['seed_record_other_id'][$i]) == "") {
			$result = $db->rawQuery("INSERT INTO seed_record_other (seed_record_id, tree_no, barcode, collection, mc, purity, viab, seed_count, seed_weight, room, cont_no, bag_no, consignee_date, consignee, released, balance, created_at)
											VALUES (
											'".$_POST['seed_record_id'][$i]."',	
											'".($_POST['tree_no'][$i] ?? "")."',	
											'".($_POST['barcode'][$i] ?? "")."',	
											'".($_POST['collection'][$i] ?? "")."',	
											'".($_POST['mc'][$i] ?? "")."',	
											'".($_POST['purity'][$i] ?? "")."',	
											'".($_POST['viab'][$i] ?? "")."',	
											'".($_POST['seed_count'][$i] ?? "")."',	
											'".($_POST['seed_weight'][$i] ?? "")."',	
											'".($_POST['room'][$i] ?? "")."',	
											'".($_POST['cont_no'][$i] ?? "")."',	
											'".($_POST['bag_no'][$i] ?? "")."',	
											'".(!empty($_POST['consignee_date'][$i]) ? $_POST['consignee_date'][$i] : "00-00-0000")."',	
											'".($_POST['consignee'][$i] ?? "")."',	
											'".($_POST['released'][$i] ?? "")."',	
											'".($_POST['balance'][$i] ?? "")."',
											NOW()) ");
		}else {
			$result = $db->rawQuery("UPDATE seed_record_other SET 
											seed_record_id='".$_POST['seed_record_id'][$i]."',	
											tree_no='".($_POST['tree_no'][$i] ?? "")."',
											barcode='".($_POST['barcode'][$i] ?? "")."',	
											collection='".($_POST['collection'][$i] ?? "")."',	
											mc='".($_POST['mc'][$i] ?? "")."',	
											purity='".($_POST['purity'][$i] ?? "")."',	
											viab='".($_POST['viab'][$i] ?? "")."',	
											seed_count='".($_POST['seed_count'][$i] ?? 0)."',	
											seed_weight='".($_POST['seed_weight'][$i] ?? 0)."',	
											room='".($_POST['room'][$i] ?? "")."',	
											cont_no='".($_POST['cont_no'][$i] ?? 0)."',	
											bag_no='".($_POST['bag_no'][$i] ?? 0)."',		
											consignee_date='".(!empty($_POST['consignee_date'][$i]) ? $_POST['consignee_date'][$i] : "00-00-0000")."',	
											consignee='".($_POST['consignee'][$i] ?? "")."',	
											released='".($_POST['released'][$i] ?? "")."',	
											balance='".($_POST['balance'][$i] ?? "")."',
											updated_at=NOW()											
											WHERE seed_record_other_id='".$_POST['seed_record_other_id'][$i]."' ");

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