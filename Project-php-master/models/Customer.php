<?php 
	include_once('Model.php');

	class Customer extends Model{

		public $table = "khach_hang";
		public $primary_key = "ma_kh";

		public function findEmail($email){ // thanh toán tìm theo email
			
			
			$query = "SELECT * FROM  khach_hang WHERE email='".$email."' ";
			
			
			$result = $this->conn->query($query);
			
			return $result;
		}
	}


 ?>