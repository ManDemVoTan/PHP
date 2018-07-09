<?php 
include_once('Model.php');
	class Category extends Model{
		public $table = "categories";
		public $primary_key = "id";

		public function products($category_id){ //hàm chạy category_id giống nhau

			$data = array();

			$query = "SELECT * FROM san_pham WHERE category_id = ".$category_id; // show từng sản phầm có category_id giống nhau....
			$result = $this->conn->query($query);
				while ($row = $result->fetch_assoc()) //đọc theo dòng
				 {
					$data[] = $row;	
				}
		

			return $data;
		}
	}
 ?>