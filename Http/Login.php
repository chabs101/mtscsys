<?php
include './cors.php';

$arr = [];
if(isset($_POST['input_email']) && isset($_POST['input_password'])){

	if($_POST['input_email'] === "email" && $_POST['input_password'] === "password") {
		$arr['success'] = true;
	}

}else {
	$arr['success'] = false;
}

	echo json_encode([$arr]);

?>