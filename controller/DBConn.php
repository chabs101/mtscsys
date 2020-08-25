<?php
require 'Bcrypt.php';

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
		
		if (!$this->conn)
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
	} 

	function authenticate($username, $password, $remember_me = false) {
		$result = mysqli_query($this->conn,"SELECT * FROM dt_user WHERE username='".$username."' AND isdeleted=0 ");
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
									"role" 		=> $row['isAdmin']
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
									"role" 		=> $result[0]['isAdmin']
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
	function rawQuery($query) {
		$result = mysqli_query($this->conn,$query );

		if ($result == TRUE) {
		    return true;
		} 

		if(!$this->result) {
			printf("Error: %s\n",mysqli_error($this->conn));
		}

	}

	function softDelete($table,$column,$id) {
		mysqli_query($this->conn,"UPDATE $table SET isdeleted='1' WHERE $column='".$id."'");


	}

	function permaDelete($table,$column,$id) {
		mysqli_query($this->conn,"DELETE FROM $table WHERE $column='".$id."' ");
	}

}

?>