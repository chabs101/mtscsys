<?php
// include '../../Http/cors.php';
require_once('../../DBConn.php');

$db = new DBconn();
$dbDelete = new DBconn();

$arr = [];

// 	echo json_encode([$_POST]);
// return;
if(isset($_POST['consignee_date']) || isset($_POST['file_no']) || isset($_POST['consignee']) || isset($_POST['amount_sent']) || isset($_POST['amount_left']) ) {

	if(isset($_POST['tobeDelete_id'])) {
		for($i=0; $i<count($_POST['tobeDelete_id']); $i++) {
			$dbDelete->softDelete("seed_record_consignee","seed_consignee_id",$_POST['tobeDelete_id'][$i]);
		}
	}

	for($i=0; $i<count($_POST['seed_consignee_id']); $i++) {
		// echo $_POST['seed_consignee_id'][$i] . "<br>";
		if(trim($_POST['seed_consignee_id'][$i]) == "") {
			$result = $db->rawQuery("INSERT INTO seed_record_consignee (seed_record_id, file_no, consignee_date, consignee, amount_sent, amount_left, created_at)
											VALUES (
											'".$_POST['seed_record_id'][$i]."',	
											'".($_POST['file_no'][$i] ?? "")."',	
											'".(!empty($_POST['consignee_date'][$i]) ? $_POST['consignee_date'][$i] : "00-00-0000")."',	
											'".($_POST['consignee'][$i] ?? "")."',	
											'".($_POST['amount_sent'][$i] ?? "")."',	
											'".($_POST['amount_left'][$i] ?? "")."',
											NOW()) ");
		}else {
			$result = $db->rawQuery("UPDATE seed_record_consignee SET 
											seed_record_id='".$_POST['seed_record_id'][$i]."',	
											file_no='".($_POST['file_no'][$i] ?? "")."',	
											consignee_date='".(!empty($_POST['consignee_date'][$i]) ? $_POST['consignee_date'][$i] : "00-00-0000")."',	
											consignee='".($_POST['consignee'][$i] ?? "")."',	
											amount_sent='".($_POST['amount_sent'][$i] ?? "")."',	
											amount_left='".($_POST['amount_left'][$i] ?? "")."',
											updated_at=NOW()											
											WHERE seed_consignee_id='".$_POST['seed_consignee_id'][$i]."' ");

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