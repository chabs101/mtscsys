<?php
session_start();
require_once('../../DBConn.php');

$db = new DBconn();
$getid = new DBconn();

$arr = [];
if(isset($_POST['new_password']) && isset($_SESSION['user']) ) {

	$getid->select("dt_user","password","user_id='".$_SESSION['user']['id']."'");

	$result = $getid->result();
	$decrypt = new Bcrypt();
	if($decrypt->verify($_POST['old_password'],$result[0]['password'])) {
		
		$bcryptresult =  Bcrypt($_POST['new_password'])->hash();
		$result = $db->rawQuery("UPDATE dt_user SET 
								password='".$bcryptresult."'
								WHERE user_id='".$_SESSION['user']['id']."' ");

		$arr['success'] = true;
		$arr['message'] = "Password change successfully.";
	}else {
		$arr['success'] = false;
		$arr['message'] = "Old Password not Match.";
	}
}else {

	$arr['success'] = false;

}


	echo json_encode([$arr]);



?>