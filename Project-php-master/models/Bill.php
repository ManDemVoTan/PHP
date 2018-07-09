<?php 

include_once('Model.php');
class Bill extends Model
{	
	public $table = "hoa_don";
	public $primary_key = "ma_hoa_don";

	public function insert($bill){
		$field = "";
		$values = "";

		foreach ($bill as $key => $value) {
			$field.=$key.',';
			$values .="'".$value."',";
		}
		$field = trim($field,',');
		$values = trim($values,',');

		
		$query = "INSERT INTO hoa_don (".$field.") VALUES (".$values.")";
		
		return $this->conn-> query($query);
	}



	public function insert1($billdetail){


		$field = "";
		$values = "";

		foreach ($billdetail as $key => $value) {
			$field.=$key.',';
			$values .="'".$value."',";
		}
		$field = trim($field,',');
		$values = trim($values,',');

		
		$query = "INSERT INTO chi_tiet_hoa_don (".$field.") VALUES (".$values.")";
		// echo "$query";
		// die;
		return $this->conn-> query($query);
	}
	public function getBill(){

		$bill = array();

		$query = "SELECT * FROM  hoa_don ";

		$result = $this->conn->query($query);

		

		while ($row = $result->fetch_assoc()) {
			$bill[] = $row;

		}
		return $bill;
	}
	function getId()
		{
			$query = "SELECT MAX(ma_hoa_don) as max FROM hoa_don ";
			$this->setQuery($query);
			$this->addTabel();
			
			return $this->getArrayTable();
			
		}
	public function getBillDetail(){

		$billdetail = array();

		$query = "SELECT * FROM  chi_tiet_hoa_don ";

		$result = $this->conn->query($query);

		while ($row = $result->fetch_assoc()) {
			$billdetail[] = $row;

		}
		return $billdetail;
	}
	public function getBillByDate($date){

		$bill = array();
		if($date!=null){
			$query = "SELECT * FROM  hoa_don where ngay_ban like '%".$date."%'";
		}else{
			$query = "SELECT * FROM  hoa_don";
		}
		

		$result = $this->conn->query($query);
		while ($row = $result->fetch_assoc()) {
			$billByDate[] = $row;

		}
		return $billByDate;
	}

}
?>