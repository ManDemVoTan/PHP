<?php 
		include_once('models/Product.php');
		class productController{
			public $product_model;
			public function __construct(){
				$this->product_model = new Product();
				
			}
			public function list1(){

				$data = $this->product_model->getAll();
				include_once('views/product/list.php');
			}
			public function detail(){
			$product_model = new product();
			if(isset($_GET['ma_sp'])){

				$ma_sp =$_GET['ma_sp'];
				$product = $product_model->find($ma_sp);
				include_once('views/product/list.php');

			}
		}
			// 	public function detail(){ //show thông tin theo id
			// if (isset($_GET['id'])) {
			// 	$id = $_GET['id'];

			// 	$data = $this->product_model->products($id);

			// 	include_once("views/product/listProduct.php");
			// }
		
			// }
			public function add(){
				include_once('views/product/add.php');
			}
			public function store(){
				
				$data=array();
				$data['name'] = $_POST['name'];
				$data['quantity'] = $_POST['quantity'];
				$data['price'] = $_POST['price'];
				$data['created_at'] =date('Y-m-d H:i:s');
				$data['updated_at'] =date('Y-m-d H:i:s');
				$data['description'] = $_POST['description'];
				header('location: ?mod=products&act=list');

				if($_FILES['avatar']['error']>0){

					echo "Anh khong hop le ";
				}else{

					move_uploaded_file($_FILES['avatar']['tmp_name'],"Upload/product/".$_FILES['avatar']['name']);
					$link = $_FILES['avatar']['name'];
				}

				$data['avatar'] = $link;

				$status = $this->product_model->insert($data);
				setcookie('add', 'Success!', time()+3);
				header('location: ?mod=products');
				
			}

			public function edit(){
				if(isset($_GET['ma_sp'])){
					$ma_sp = $_GET['ma_sp'];
						$data =$this->product_model->find($ma_sp);
						include_once('views/product/edit.php');
				}
			}

			public function update(){
				$data= array();
				$ma_sp = $_POST['ma_sp'];
				if (isset($_POST['submit'])) {
					$data['name'] = $_POST['name'];
					$data['quantity'] = $_POST['quantity'];
					$data['price'] = $_POST['price'];
					$data['created_at'] =date('Y-m-d H:i:s');
					$data['updated_at'] =date('Y-m-d H:i:s');
					$data['description'] = $_POST['description'];

					if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] <= 0){

						
						if($_FILES['avatar']['error']>0){

								echo "Anh khong hop le ";
						}else{

								move_uploaded_file($_FILES['avatar']['tmp_name'],"Upload/product/".$_FILES['avatar']['name']);
								$link = $_FILES['avatar']['name'];
						}

							$data['avatar'] = $link;

					}
				}

				$this->product_model->update($data,$ma_sp);
				setcookie('update', 'Success!', time()+3);
				header('location: ?mod=products');
					
			}
			
			public function delete(){

				if(isset($_GET['ma_sp']));
				$ma_sp=$_GET['ma_sp'];
				$product_model = new product();
				$product_model->destroy($ma_sp);
				setcookie('delete', 'Success!', time()+3);

				header('location: ?mod=products&act=list');	
				
			}
			public function error(){

				echo "product - Error";
			}
		}
 ?>