<?php 

	include_once('Model.php');
	class User extends Model{

		public $table = "nhan_vien";
		public $primary_key = "ma_nv";

		public function login($email,$password){
			
			$password = md5($password);
			$query = "SELECT * FROM  nhan_vien WHERE email='".$email."' and password= '".$password."' ";
			
			$result = $this->conn->query($query);
			$row = $result->fetch_assoc();
			
			return ($row != null);
	}
	// public function register($email,$password){
			
	// 		$password = md5($password);
	// 		$query = "SELECT * FROM  nhan_vien WHERE email='".$email."' and password= '".$password."' ";
			
	// 		$result = $this->conn->query($query);
	// 		$row = $result->fetch_assoc();
			
	// 		return ($row != null);
	// }

}

		
 ?>