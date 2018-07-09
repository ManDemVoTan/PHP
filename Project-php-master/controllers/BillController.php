<?php 
	
	include_once('models/Bill.php');

	class billController{

		public $bill_model;
		public function __construct(){
			$this->bill_model = new Bill();
			
		}
		public function store(){

			$bill=array();
			
			$bill['ma_kh'] =$_SESSION['customer']['ma_kh'];
			$bill['tong_tien'] =$_SESSION['total'];
			$bill['ngay_ban'] =date('Y-m-d H:i:s');
			$status1 = $this->bill_model->insert($bill); //gọi đến từ cái inset1 của model 
			// $sta = $this->bill_model->insert($bill);
           	foreach ($_SESSION['cart'] as $key => $product ){	
			$billdetail=array();
			$billdetail['ma_san_pham']=  $key ;
			// $billdetail['ma_hoa_don']=$_SESSION['bill']['ma_hoa_don'] ;
			$billdetail['so_luong']= $product['qty'];
			$billdetail['gia_ban']= number_format($product['price']);
			// print_r($product['price']);
			$billdetail['thanh_tien']= number_format($product['price']*$product['qty']) ;
			// print_r($billdetail['thanh_tien']);
			$status2 = $this->bill_model->insert1($billdetail);

		// }
		// 	$name ='Phương';
  //   		$msg="Cảm Ơn Quý Khách Đã Mua Hàng Tại Cửa Hàng Chúng Tôi";
  //   		$email=$_SESSION['customer']['ma_kh']['email'];
  //   		$this->send_email($email,$name,$msg,"php09");

    		// <h2>Xin Chao".$name." </h2> 
    		// <p>Email nay duoc gui cho ban tu <font color=\"red\">Zent Group</p>

			session_unset($_SESSION['cart']);
			header('location: ?mod=BanHang&act=list');
	}
}

				
		
	
		public function listBill(){ //lấy ra thông tin trong bảng hóa đơn ra ngoài

			$bill = $this->bill_model->getBill();
			include_once('views/banhang/listBill.php');
		}
		public function listBillDetail(){
			$billdetail = $this->bill_model->getBillDetail();
			include_once('views/banhang/listBullDetail.php');
		}
		public function listBillByDate($date){ //lấy ra thông tin trong bảng hóa đơn ra ngoài

			$billByDate = $this->bill_model->getBillByDate($date);
			include_once('views/report/reportByDate.php');
		}


	}
 ?>