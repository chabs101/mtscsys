<?php
session_start();
require_once('../../DBConn.php');

$db = new DBconn();

$arr = [];

$bcryptresult = "";
if(isset($_POST['password'])) {
	$bcryptresult =  Bcrypt($_POST['password'])->hash();
}

if(trim($_POST['user_id']) == "") {
	$check = $db->select("dt_user","*","isdeleted=0 AND username='".$_POST['username']."' ");
	$check = $db->result();
	
	if(count($check) > 0) {
		$arr['success'] = false;
		$arr['message'] = $_POST['username']." is Already Exist.";
		echo json_encode([$arr]);
		return;
	}

	$target_dir = "../../../storage/img/user_images/";
	$image_url = "";
	if($_FILES['image_url']['name'] !="") {
		$imgname = $_FILES['image_url']['name'];
		$imgpath = pathinfo($imgname);
		
		$default_img_name = "mtscsys_".date('Y-m-d')."_".$_POST['username'];
		$ext = $imgpath['extension'];
		$temp_name = $_FILES['image_url']['tmp_name'];
		$path_imgname_ext = $target_dir.$default_img_name.'.'.$ext;
		
		move_uploaded_file($temp_name, $path_imgname_ext);
		$image_url = trim($_FILES['image_url']['name'])!="" ? ($default_img_name.".".$ext) : "";
		// if(!file_exists($path_imgname_ext)) {
		// }
	}

	$result = $db->rawQuery("INSERT INTO dt_user (first_name, last_name, gender, image_url, username, role_id, password, created_at)
									VALUES (
									'".($_POST['first_name'] ?? "")."',	
									'".($_POST['last_name'] ?? "")."',	
									'".($_POST['gender'] ?? "")."',	
									'".($image_url)."',
									'".($_POST['username'] ?? "")."',	
									'".($_POST['role_id'] ?? "")."',	
									'".$bcryptresult."',
									NOW()) ");
	$getNameBeforeUpd = $db->select("dt_user","*","isdeleted=0 AND username='".$_POST['username']."' ");
	$getNameBeforeUpd = $db->result();

	// $db->saveUserLog("Successfully Inserted user_id ".$getNameBeforeUpd[0]['user_id'],$db->user()['id']);

}else {
	$updatePassQ =  trim($_POST['password'])!="" ? "password='".$bcryptresult."'," : "";
	$getNameBeforeUpd = $db->select("dt_user","*","isdeleted=0 AND user_id='".$_POST['user_id']."' ");
	$getNameBeforeUpd = $db->result();

	if((count($getNameBeforeUpd) > 0)) {
		if($getNameBeforeUpd[0]['username'] != $_POST['username']) {

			$check = $db->select("dt_user","*","isdeleted=0 AND username='".$_POST['username']."'");
			$check = $db->result();
			
			if(count($check) > 0) {
				$arr['success'] = false;
				$arr['message'] = $_POST['username']." is Already Taken.";
				echo json_encode([$arr]);
				return;
			}

		}
	}


	$target_dir = "../../../storage/img/user_images/";
	$image_url = "";
	if($_FILES['image_url']['name'] !="") {
		$imgname = $_FILES['image_url']['name'];
		$imgpath = pathinfo($imgname);
		
		$default_img_name = "mtscsys_".date('Y-m-d')."_".$_POST['username'];
		$ext = $imgpath['extension'];
		$temp_name = $_FILES['image_url']['tmp_name'];
		$path_imgname_ext = $target_dir.$default_img_name.'.'.$ext;
		
		move_uploaded_file($temp_name, $path_imgname_ext);
		$image_url = trim($_FILES['image_url']['name'])!="" ? "image_url='".($default_img_name.".".$ext)."'," : "";
		// if(!file_exists($path_imgname_ext)) {
		// }
	}

	$result = $db->rawQuery("UPDATE dt_user SET 
									first_name='".($_POST['first_name'] ?? "")."',	
									last_name='".($_POST['last_name'] ?? "")."',	
									gender='".($_POST['gender'] ?? "")."',	
									$image_url
									username='".($_POST['username'] ?? "")."',	
									role_id='".($_POST['role_id'] ?? "")."',	
									$updatePassQ
									updated_at=NOW()											
									WHERE user_id='".$_POST['user_id']."' ");

	// $db->saveUserLog("Successfully Change user_id ".$getNameBeforeUpd[0]['user_id'],$db->user()['id']);

}
	$arr['success'] = true;
	$arr['message'] = "Submit Successfully.";


	echo json_encode([$arr]);



?>