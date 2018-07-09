<?php 

	include_once('Connection.php');
	class Model{
		public $conn;
		public $table;
		public $primary_key;
		public function __construct(){
			$connection =  new Connection();
			$this->conn = $connection->conn;
		}
	
		public function getAll(){ // lấy tất cả cở sở dữ liệu

			$data = array();

			$query = "SELECT * FROM ".$this->table; 

			$result = $this->conn->query($query);

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
				
			}




			return $data;
		}
		public function find($id){ //lấy theo id
			$query= 'SELECT * FROM '.$this->table." WHERE ".$this->primary_key.'=' .$id;
			$result= $this->conn-> query($query);

			
			return $result->fetch_assoc(); // fetch_assoc  dùng để fetch dữ liệu từ câu query. và dạng trả về la tên fild -> giá trị

		}
		public function insert($data){ //insert 1 data mình khởi tạo ở controler


		$field = "";
		$values = "";

		foreach ($data as $key => $value) {
			$field.=$key.',';
			$values .="'".$value."',";
		}
		$field = trim($field,',');
		$values = trim($values,',');
		
	
			$query = "INSERT INTO ".$this->table."(".$field.") VALUES (".$values.")";
			
			
			return $this->conn-> query($query);
		}

		public function destroy($id){ 
			//xóa theo id

			$query = " DELETE FROM " .$this->table. " WHERE " .$this->primary_key."=".$id;
			return $this->conn->query($query);
		}

		public function update($data,$id){

		$arr ="";
		foreach ($data as $key => $value) {
			
			$arr .= $key.' = '."'".$value."',";
		}
		$arr = trim($arr,',');
		
		$query ="UPDATE ".$this->table." SET ".$arr." WHERE ".$this->primary_key."=".$id; //update theo khóa chính
		
		return $this->conn->query($query);
		
		}
	}

 ?>