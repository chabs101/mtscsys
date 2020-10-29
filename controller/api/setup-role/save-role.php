<?php
require_once('../../DBConn.php');
session_start();
$db = new DBconn();

$arr = [];

if(trim($_POST['role_id']) == "") {
	if(isset($_POST['role_name'])) {
		try{
			$check = $db->select("user_role","*","isdeleted=0 AND role_name='".$_POST['role_name']."'");
			$check = $db->result();
			
			if(count($check) > 0) {
				$arr['success'] = false;
				$arr['message'] = $_POST['role_name']." is Already Added.";
				echo json_encode([$arr]);
				return;
			}

			$db->beginTransaction();
			$db->rawQuery("INSERT INTO user_role (role_name, user_id, created_at)
											VALUES (
											'".($_POST['role_name'] ?? "")."',	
											'".$db->user()['id']."',
											NOW()) ");

			$db->rawQuery("INSERT INTO user_log (description, user_id, created_at)
											VALUES (
											'".($_POST['role_name'] ? 'Successfully Inserted role '.$_POST['role_name'] : "")."',	
											'".$db->user()['id']."',
											NOW()) ");

				$db->saveUserLog("Successfully Inserted role ".$_POST['role_name']);


			$db->commitTransaction();

			echo json_encode([[
				'success' => true,
				'message' => "Submit Successfully"
			]]);
			return;
		}catch(Exception $e){			
			echo json_encode([
				'success' => false,
				'message' => $e
			]);
			$db->rollbackTransaction();

		}	


	}
}else {

		try{
			$check = $db->select("user_role","*","isdeleted=0 AND role_name='".$_POST['role_name']."'");
			$check = $db->result();
			
			if(count($check) > 0) {
				$arr['success'] = false;
				$arr['message'] = $_POST['role_name']." is Already Added.";
				echo json_encode([$arr]);
				return;
			}

			$db->beginTransaction();

				$getNameBeforeUpd = $db->select("user_role","*","isdeleted=0 AND role_id='".$_POST['role_id']."'");
				$getNameBeforeUpd = $db->result();
			
				$result = $db->rawQuery("UPDATE user_role SET 
												role_name='".($_POST['role_name'] ?? "")."',	
												user_id='".($_POST['user_id'] ?? "")."',	
												updated_at=NOW()											
												WHERE role_id='".$_POST['role_id']."' ");
	

				$db->saveUserLog("Successfully Change role ".$getNameBeforeUpd[0]['role_name']." into ".$_POST['role_name']);
			$db->commitTransaction();

			echo json_encode([[
				'success' => true,
				'message' => "Submit Successfully"
			]]);
			return;
		}catch(Exception $e){			
			echo json_encode([
				'success' => false,
				'message' => $e
			]);
			$db->rollbackTransaction();

		}

}


?>