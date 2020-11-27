<?php
require 'Bcrypt.php';
require 'Helper.php';
date_default_timezone_set('Asia/Manila');

class DBConn {
	private $type 	= 'localhost';
	private $user 	= 'root';
	private $pass 	= '';
	private $dbname = 'mtscdb';
	public $conn 	= '';
	private $result = '';

	public function __construct() {
		$this->db();
	}

	function db() {
		$this->conn = mysqli_connect($this->type,$this->user,$this->pass,$this->dbname);
		$now = new DateTime();
		$mins = $now->getOffset() / 60;
		$sgn = ($mins < 0 ? -1 : 1);
		$mins = abs($mins);
		$hrs = floor($mins/60);
		$mins-= $hrs * 60;
		$offset = sprintf('%+d:%02d',$hrs*$sgn, $mins);
		$this->conn->query("SET time_zone='$offset' ");

		if (!$this->conn)
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
	} 

	function authenticate($username, $password, $remember_me = false) {
		$result = mysqli_query($this->conn,"SELECT du.*,role_name FROM dt_user du LEFT JOIN user_role ur ON ur.role_id = du.role_id WHERE username='".$username."' AND du.isdeleted=0 ");
		if( $result->num_rows > 0 ) {
			$row = mysqli_fetch_assoc($result);
			$decrypt = new Bcrypt();
			if($decrypt->verify($password,$row['password'])) {

				$_SESSION['fullname'] = $row['first_name'] .' '. $row['last_name'];
				$_SESSION['first_name'] = $row['first_name'];
				$_SESSION['user'] = [
									"id" 		=> $row['user_id'],
									"first_name"=> $row['first_name'],
									"fullname" 	=> $row['first_name'] .' '. $row['last_name'],
									"image_url" => $row['image_url'],
									"role" 		=> $row['role_id']
									];

				if($remember_me) {
					$this->rememberMe($row['user_id']);
				}

				return true;

			}
		}
			return false;
		
	}

	function rememberMe($id) {
		$tokenGen = random_bytes(16);
		$insertTokenDB = hash('sha256',$tokenGen);
		$result = $this->rawQuery("UPDATE dt_user SET remember_me='".$insertTokenDB."' WHERE user_id=$id");
	    if($result) {
			
			$genToken = base64_encode($tokenGen);

			setcookie(
				'userRememberToken',
				$genToken,
				time() + 3600,
				'/'
			);

		} 
		// echo json_encode($result);
		return;
	}

	function checkRememberToken() {
		if(!empty($_COOKIE['userRememberToken'])) {
			$token = hash('sha256',base64_decode($_COOKIE['userRememberToken']));
			$this->select('dt_user','*',"isdeleted=0 AND remember_me='".$token."'");
			$result = $this->result();

			if(count($result)) {
				$_SESSION['fullname'] = $result[0]['first_name'] .' '. $result[0]['last_name'];
				$_SESSION['first_name'] = $result[0]['first_name'];
				$_SESSION['user'] = [
									"id" 		=> $result[0]['user_id'],
									"first_name"=> $result[0]['first_name'],
									"fullname" 	=> $result[0]['first_name'] .' '. $result[0]['last_name'],
									"image_url" => $result[0]['image_url'],
									"role" 		=> $result[0]['role_id']

									];
				$this->rememberMe($result[0]['user_id']);
			// echo hash_equals("4227c63eded0ac62a86cd88d2542fecf2c033d5cf81538989a783ba0d3a14cc6",$token) ? "asdssasdsa": "asdsa";
			}
			// echo json_encode(count($result));
			return true;
		}
		// setcookie('userRememberToken','');
		return false;
	}

	function destroyRememberToken() {
		if(isset($_SESSION['user'])) {
			$id = $_SESSION['user']['id'];
			$result = $this->rawQuery("UPDATE dt_user SET remember_me=null WHERE user_id=$id");
		    if($result) {
		    	setcookie('userRememberToken','');
		    }
		}
	}

	function select($table,$column="*", $where = "") {
		$query = "SELECT $column FROM $table";
		$query .= trim($where)=="" ? "" : " WHERE $where";

		$this->result = mysqli_query($this->conn,$query );

		if(!$this->result) {
			printf("Error: %s\n",mysqli_error($this->conn));
		}
	}

	function result() { 
		$resultset = [];
			while($row = mysqli_fetch_array($this->result,MYSQLI_ASSOC)) {
				$resultset[] = $row;
			}
		return $resultset;

	}

	function row() { 
		$row = mysqli_num_rows($this->result);
		return $row;

	}

	function beginTransaction() {
		$this->conn->begin_transaction();
	}

	function commitTransaction() {
		$this->conn->commit();
	}

	function rollbackTransaction() {
		$this->conn->rollback();
	}

	function rawQuery($query) {
		$result = $this->conn->query($query);

		if ($result == TRUE) {
		    return true;
		} 

		if(!$this->result) {
			printf("Error: %s\n",mysqli_error($this->conn));
			$this->rollbackTransaction();
		}

	}

	function softDelete($table,$column,$id) {
		mysqli_query($this->conn,"UPDATE $table SET isdeleted='1' WHERE $column='".$id."'");


	}

	function permaDelete($table,$column,$id) {
		mysqli_query($this->conn,"DELETE FROM $table WHERE $column='".$id."' ");
	}

	function saveUserLog($descparam,$id = null) {
			$this->rawQuery("INSERT INTO user_log (description, user_id,id, created_at)
											VALUES (
											'".$descparam."',	
											'".$this->user()['id']."',
											'".$id."',
											NOW()) ");
	}

	function user() {
		return $_SESSION['user'];
	}
}

?>