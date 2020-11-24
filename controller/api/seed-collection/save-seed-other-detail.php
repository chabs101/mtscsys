<?php
// include '../../Http/cors.php';
require_once('../../DBConn.php');

$db = new DBconn();
$dbDelete = new DBconn();

$arr = [];

// 	echo json_encode([$_POST]);
// return;
if( isset($_POST['tree_no']) || isset($_POST['seed_weight']) || isset($_POST['viab_percent']) ) {

	if(isset($_POST['tobeDelete_id'])) {
		for($i=0; $i<count($_POST['tobeDelete_id']); $i++) {
			$dbDelete->softDelete("seed_collection_other","seed_collection_other_id",$_POST['tobeDelete_id'][$i]);
		}
	}

	for($i=0; $i<count($_POST['seed_collection_other_id']); $i++) {
		if(trim($_POST['seed_collection_other_id'][$i]) == "") {
			if( isset($_POST['seed_collection_id'][$i]) ) {

			$result = $db->rawQuery("INSERT INTO seed_collection_other (seed_collection_id, tree_no, total, age_, dbh, form_, den, branch, width_, mh_, th_, description, seed_weight, viab_percent, created_at)
											VALUES (
											'".$_POST['seed_collection_id'][$i]."',
											'".(!empty($_POST['tree_no'][$i]) ? $_POST['tree_no'][$i] : 0)."',
											'".(!empty($_POST['total'][$i]) ? $_POST['total'][$i] : 0)."',
											'".(!empty($_POST['age_'][$i]) ? $_POST['age_'][$i] : 0)."',
											'".(!empty($_POST['dbh'][$i]) ? $_POST['dbh'][$i] : 0)."',
											'".(!empty($_POST['form_'][$i]) ? $_POST['form_'][$i] : 0)."',
											'".(!empty($_POST['den'][$i]) ? $_POST['den'][$i] : 0)."',
											'".(!empty($_POST['branch'][$i]) ? $_POST['branch'][$i] : 0)."',
											'".(!empty($_POST['width_'][$i]) ? $_POST['width_'][$i] : 0)."',
											'".(!empty($_POST['mh_'][$i]) ? $_POST['mh_'][$i] : 0)."',
											'".(!empty($_POST['th_'][$i]) ? $_POST['th_'][$i] : 0)."',
											'".($_POST['description'][$i] ?? "")."',
											'".(!empty($_POST['seed_weight'][$i]) ? $_POST['seed_weight'][$i] : 0)."',
											'".(!empty($_POST['viab_percent'][$i]) ? $_POST['viab_percent'][$i] : 0)."',
											NOW()) ");
			
			}
		}else {
			$result = $db->rawQuery("UPDATE seed_collection_other SET 	
											seed_collection_id='".$_POST['seed_collection_id'][$i]."',
											tree_no='".(!empty($_POST['tree_no'][$i]) ? $_POST['tree_no'][$i] : 0)."',
											total='".(!empty($_POST['total'][$i]) ? $_POST['total'][$i] : 0)."',
											age_='".(!empty($_POST['age_'][$i]) ? $_POST['age_'][$i] : 0)."',
											dbh='".(!empty($_POST['dbh'][$i]) ? $_POST['dbh'][$i] : 0)."',
											form_='".(!empty($_POST['form_'][$i]) ? $_POST['form_'][$i] : 0)."',
											den='".(!empty($_POST['den'][$i]) ? $_POST['den'][$i] : 0)."',
											branch='".(!empty($_POST['branch'][$i]) ? $_POST['branch'][$i] : 0)."',
											width_='".(!empty($_POST['width_'][$i]) ? $_POST['width_'][$i] : 0)."',
											mh_='".(!empty($_POST['mh_'][$i]) ? $_POST['mh_'][$i] : 0)."',
											th_='".(!empty($_POST['th_'][$i]) ? $_POST['th_'][$i] : 0)."',
											description='".($_POST['description'][$i] ?? "")."',
											seed_weight='".(!empty($_POST['seed_weight'][$i]) ? $_POST['seed_weight'][$i] : 0)."',
											viab_percent='".(!empty($_POST['viab_percent'][$i]) ? $_POST['viab_percent'][$i] : 0)."',
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