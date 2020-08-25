<?php
// include '../../Http/cors.php';
require_once('../../DBConn.php');

$db = new DBconn();
$dbDelete = new DBconn();

$arr = [];

// 	echo json_encode([$_POST]);
// return;
if(isset($_POST['method']) || isset($_POST['seed_from']) || isset($_POST['seed_to']) || isset($_POST['viab']) ) {

	if(isset($_POST['tobeDelete_id'])) {
		for($i=0; $i<count($_POST['tobeDelete_id']); $i++) {
			$dbDelete->softDelete("seed_record_germination","seed_germination_id",$_POST['tobeDelete_id'][$i]);
		}
	}

	for($i=0; $i<count($_POST['seed_germination_id']); $i++) {
		// echo $_POST['seed_germination_id'][$i] . "<br>";
		if(trim($_POST['seed_germination_id'][$i]) == "") {
			$result = $db->rawQuery("INSERT INTO seed_record_germination (seed_record_id, method, seed_from, seed_to, viab, created_at)
											VALUES (
											'".$_POST['seed_record_id'][$i]."',	
											'".($_POST['method'][$i] ?? "")."',	
											'".($_POST['seed_from'][$i] ?? "")."',	
											'".($_POST['seed_to'][$i] ?? "")."',	
											'".($_POST['viab'][$i] ?? "")."',
											NOW()) ");
		}else {
			$result = $db->rawQuery("UPDATE seed_record_germination SET 
											seed_record_id='".$_POST['seed_record_id'][$i]."',	
											method='".($_POST['method'][$i] ?? "")."',	
											seed_from='".($_POST['seed_from'][$i] ?? "")."',	
											seed_to='".($_POST['seed_to'][$i] ?? "")."',	
											viab='".($_POST['viab'][$i] ?? "")."',
											updated_at=NOW()											
											WHERE seed_germination_id='".$_POST['seed_germination_id'][$i]."' ");

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