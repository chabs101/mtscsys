<?php
	class Bcrypt {
		public $input  = null;
		public $options = [
				'cost' => 11
				];

		function __construct($input = null,$options = []) {
			$this->input = $input;
			$this->options = $options;
		}

		public function hash() {
			$hash = password_hash($this->input, PASSWORD_BCRYPT, $this->options);
			return $hash;
		}

		public function verify($input, $hash) {
			return password_verify($input, $hash);
		}

	}

	function Bcrypt($asd) {
		return new Bcrypt($asd);
	}



	// $x =  Bcrypt("admin")->hash();
	// echo $x . '<br>';
	// $v = new Bcrypt();
	// $hash = '$2y$10$.jDZuZp7HkWdHX7I/b2XLegGzllUTHbryBDCxUEHshMq2CW3nhQ5.';
	// echo $v->verify("admin",$hash);


?>