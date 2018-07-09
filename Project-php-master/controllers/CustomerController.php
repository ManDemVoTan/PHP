<?php 
		include_once('models/Customer.php');
		include_once('models/Invoice.php');
		class customerController{
			public $customer_model;
			public $invoice_model;
			public function __construct(){
				$this->customer_model = new Customer();
				$this->invoice_model = new Invoice();
				
			}
			public function list1(){

				$data = $this->customer_model->getAll();
				include_once('views/banhang/hoadon.php');
			}
			public function detail(){

			
			$customer_model = new customer();
			if(isset($_GET['ma_kh'])){

				$ma_kh =$_GET['ma_kh'];
				$customer = $customer_model->find($ma_kh);
				$customer['status'] = ($customer['status'] == 1)?'Active' : 'Deactive';
				include_once('views/customer/detail.php');

			}
		}
			public function add(){
				include_once('views/customer/add.php');
			}
			public function order(){ //đặt hàng

				if(isset($_POST['submit'])){
					$email = $_POST['email'];
					$customer = $this->customer_model->findEmail($email);
					$result = $customer->fetch_assoc();
					if($result == null){
						header('location: ?mod=customer&act=Fromregister');
					}else{
						$_SESSION['customer'] = $result;

						$customer = $result;
						$_SESSION['customer']=$customer;
						include_once('views/banhang/hoadon.php');
					}
				}

			}
			public function register(){

					include_once('views/customer/register.php');
			}
			public function Fromregister(){ //trả về form đăng ký khách hàng mới

					include_once('views/customer/register.php');
			}
			
			public function store(){
				$data=array();
				$data['ten_kh'] = $_POST['name'];
				$data['email'] = $_POST['email'];
				$data['so_dien_thoai'] = $_POST['so_dien_thoai'];
				$data['created_at'] =date('Y-m-d H:i:s');
				$data['password'] =md5($_POST['password']);
				$status = $this->customer_model->insert($data);
				header('Location: ?mod=BanHang&act=cart');
			}



			public function edit(){
				if(isset($_GET['ma_kh'])){
					$ma_kh = $_GET['ma_kh'];
						$data =$this->customer_model->find($ma_kh);
						
						include_once('views/customer/edit.php');
				}
			}

			public function update(){ //sửa thông tin khách hàng
				$data= array();
				$ma_kh = $_POST['ma_kh'];
				if (isset($_POST['submit'])) {
					$data['ten_nv'] = $_POST['name'];
					$data['email'] = $_POST['email'];
					$data['so_dien_thoai'] = $_POST['mobile'];

					if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] <= 0){
						if($_FILES['avatar']['error']>0){

							echo "Anh khong hop le ";
						}else{

							move_uploaded_file($_FILES['avatar']['tmp_name'],"Upload/customer/".$_FILES['avatar']['name']);
							$link = $_FILES['avatar']['name'];
						}

						$data['avatar'] = $link;

						$status = $this->customer_model->insert($data);
							

						}
						setcookie('update', 'Success!', time()+3);
				}
				$this->customer_model->update($data,$ma_kh);
				header('location: ?mod=customers');
				
			}
			
			public function delete(){ //xóa khách hàng

				if(isset($_GET['ma_kh']));
				$ma_kh=$_GET['ma_kh'];
				$customer_model = new customer();
				$customer_model->destroy($ma_kh);
				setcookie('delete', 'Success!', time()+3);

				header('location: ?mod=customers&act=list');	
				
			}
			public function error(){

				echo "Customer - Error";
			}
	}
 ?>