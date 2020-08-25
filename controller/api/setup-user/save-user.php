<?php
// include '../../Http/cors.php';
require_once('../../DBConn.php');

$db = new DBconn();

$arr = [];

$bcryptresult = "";
if(isset($_POST['password'])) {
	$bcryptresult =  Bcrypt($_POST['password'])->hash();
}

if(trim($_POST['user_id']) == "") {
	$result = $db->rawQuery("INSERT INTO dt_user (first_name, last_name, gender, username, password, created_at)
									VALUES (
									'".($_POST['first_name'] ?? "")."',	
									'".($_POST['last_name'] ?? "")."',	
									'".($_POST['gender'] ?? "")."',	
									'".($_POST['username'] ?? "")."',	
									'".$bcryptresult."',
									NOW()) ");
}else {
	$updatePassQ =  "password='".$bcryptresult."',";
	$check = $db->select("dt_user","*","isdeleted=0 AND username='".$_POST['username']."'");
	$check = $db->result();
	
	if(count($check) > 0) {
		$arr['success'] = false;
		$arr['message'] = "Username is already Taken.";
		echo json_encode([$arr]);
		return;
	}

	$result = $db->rawQuery("UPDATE dt_user SET 
									first_name='".($_POST['first_name'] ?? "")."',	
									last_name='".($_POST['last_name'] ?? "")."',	
									gender='".($_POST['gender'] ?? "")."',	
									username='".($_POST['username'] ?? "")."',	
									$updatePassQ
									updated_at=NOW()											
									WHERE user_id='".$_POST['user_id']."' ");

}
	$arr['success'] = true;
	$arr['message'] = "Submit Successfully.";


	echo json_encode([$arr]);



?>