<?php
// include '../../Http/cors.php';
require_once('../../DBConn.php');

$db = new DBconn();
$dbDelete = new DBconn();

$arr = [];

// 	echo json_encode([$_POST]);
// return;
if( isset($_POST['colln_no'])|| isset($_POST['bot_code'])|| isset($_POST['film_no'])|| isset($_POST['ht_m'])|| isset($_POST['age'])|| isset($_POST['dbh'])|| isset($_POST['form'])|| isset($_POST['den'])|| isset($_POST['bm'])|| isset($_POST['wdt'])|| isset($_POST['ht_p']) ) {

	if(isset($_POST['tobeDelete_id'])) {
		for($i=0; $i<count($_POST['tobeDelete_id']); $i++) {
			$dbDelete->softDelete("seed_collection_other","seed_collection_other_id",$_POST['tobeDelete_id'][$i]);
		}
	}

	for($i=0; $i<count($_POST['seed_collection_other_id']); $i++) {
		if(trim($_POST['seed_collection_other_id'][$i]) == "") {
			if( isset($_POST['seed_collection_id'][$i]) ) {

			$result = $db->rawQuery("INSERT INTO seed_collection_other (seed_collection_id, colln_no, bot_code, film_no, ht_m, age, dbh, form, den, bm, wdt, ht_p, created_at)
											VALUES (
											'".$_POST['seed_collection_id'][$i]."',
											'".(!empty($_POST['colln_no'][$i]) ? $_POST['colln_no'][$i] : 0)."',
											'".(!empty($_POST['bot_code'][$i]) ? $_POST['bot_code'][$i] : 0)."',
											'".(!empty($_POST['film_no'][$i]) ? $_POST['film_no'][$i] : 0)."',
											'".($_POST['ht_m'][$i] ?? "")."',
											'".(!empty($_POST['age'][$i]) ? $_POST['age'][$i] : 0)."',
											'".($_POST['dbh'][$i] ?? "")."',
											'".($_POST['form'][$i] ?? "")."',
											'".($_POST['den'][$i] ?? "")."',
											'".($_POST['bm'][$i] ?? "")."',
											'".($_POST['wdt'][$i] ?? "")."',
											'".($_POST['ht_p'][$i] ?? "")."',
											NOW()) ");
			
			}
		}else {
			$result = $db->rawQuery("UPDATE seed_collection_other SET 	
											seed_collection_id='".$_POST['seed_collection_id'][$i]."',
											colln_no='".(!empty($_POST['colln_no'][$i]) ? $_POST['colln_no'][$i] : 0)."',
											bot_code='".(!empty($_POST['bot_code'][$i]) ? $_POST['bot_code'][$i] : 0)."',
											film_no='".(!empty($_POST['film_no'][$i]) ? $_POST['film_no'][$i] : 0)."',
											ht_m='".($_POST['ht_m'][$i] ?? "")."',
											age='".(!empty($_POST['age'][$i]) ? $_POST['age'][$i] : 0)."',
											dbh='".($_POST['dbh'][$i] ?? "")."',
											form='".($_POST['form'][$i] ?? "")."',
											den='".($_POST['den'][$i] ?? "")."',
											bm='".($_POST['bm'][$i] ?? "")."',
											wdt='".($_POST['wdt'][$i] ?? "")."',
											ht_p='".($_POST['ht_p'][$i] ?? "")."',
											updated_at=NOW()											
											WHERE seed_collection_other_id='".$_POST['seed_collection_other_id'][$i]."' ");

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