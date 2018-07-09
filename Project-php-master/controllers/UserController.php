<?php 
		include_once('models/User.php');
		class UserController{
			public $user_model;
			public function __construct(){
				$this->user_model = new User();
				
			}
			public function list1(){

				$data = $this->user_model->getAll();
				include_once('views/user/list.php');
				 //include_once('views/banhang/listBill.php');
			}
			public function detail(){

			
			$user_model = new User();
			if(isset($_GET['ma_nv'])){

				$ma_nv =$_GET['ma_nv'];
				$user = $user_model->find($ma_nv);
				$user['status'] = ($user['status'] == 1)?'Active' : 'Deactive';
				include_once('views/user/detail.php');

			}
		}
			public function add(){
				include_once('views/user/add.php');
			}
			public function store(){
				$data=array();
				$data['ten_nv'] = $_POST['ten_nv'];
				$data['email'] = $_POST['email'];
				$data['so_dien_thoai'] = $_POST['so_dien_thoai'];
				$data['created_at'] =date('Y-m-d H:i:s');
				$data['password'] =md5($_POST['password']);
				$data['status'] = 1;

				if($_FILES['avatar']['error']>0){

					echo "Anh khong hop le ";
				}else{

					move_uploaded_file($_FILES['avatar']['tmp_name'],"Upload/user/".$_FILES['avatar']['name']);
					$link = $_FILES['avatar']['name'];
				}

				$data['avatar'] = $link;

				$status = $this->user_model->insert($data);
					setcookie('add', 'Success!', time()+3);
				header('location: ?mod=users');
				
			}

			public function edit(){
				if(isset($_GET['ma_nv'])){
					$ma_nv = $_GET['ma_nv'];
						$data =$this->user_model->find($ma_nv);
						
						include_once('views/user/edit.php');
				}
			}

			public function update(){
				$data= array();
				$ma_nv = $_POST['ma_nv'];
				if (isset($_POST['submit'])) {
					$data['ten_nv'] = $_POST['name'];
					$data['email'] = $_POST['email'];
					$data['so_dien_thoai'] = $_POST['mobile'];

					if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] <= 0){
						if($_FILES['avatar']['error']>0){

							echo "Anh khong hop le ";
						}else{

							move_uploaded_file($_FILES['avatar']['tmp_name'],"Upload/user/".$_FILES['avatar']['name']);
							$link = $_FILES['avatar']['name'];
						}

						$data['avatar'] = $link;

						$status = $this->user_model->insert($data);
							

						}
						setcookie('update', 'Success!', time()+3);
				}
				$this->user_model->update($data,$ma_nv);
				header('location: ?mod=users');
				
			}
			
			public function delete(){

				if(isset($_GET['ma_nv']));
				$ma_nv=$_GET['ma_nv'];
				$user_model = new User();
				$user_model->destroy($ma_nv);
				setcookie('delete', 'Success!', time()+3);

				header('location: ?mod=users&act=list');	
				
			}
			public function error(){

				include_once("views/404.php");
			}
			public function login(){
				if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
					 
					header('location: ?mod=index');
				}


				if (isset($_POST['login'])) {

					$email = $_POST['email'];
					$password = $_POST['password'];
					$user_model = new User();
					$row = $this->user_model->login($email,$password);
					if ($row==1) {
						$_SESSION['login'] = true;
						// header('location: index.php');
						header('location: index.php');
					}else{
						$_SESSION['login'] = false;
						header('location: ?mod=users&act=formlogin');
					}
				}
			}

			public function formLogin(){
				include_once('views/user/login.php');
			}
			
			public function logout(){	

				if(isset($_GET['ma_sp'])){
					$code = $_GET['ma_sp'];
					if (isset($_SESSION['cart'][$code])) {

						unset($_SESSION['cart'][$code]);
					}
				}

				header("Location: ?mod=users&act=formlogin");
			}

			// public function register(){
			// 	if (isset($_SESSION['submit']) && $_SESSION['submit'] == true) {
					 
			// 		header('location: index.php');
			// 	}


			// 	if (isset($_POST['submit'])) {

			// 		$email = $_POST['email'];
			// 		$password = $_POST['password'];
			// 		$user_model = new User();
			// 		$row = $this->user_model->login($email,$password);
			// 		if ($row==1) {
			// 			$_SESSION['login'] = true;
			// 			header('location: index.php');
			// 			//header('location: ?mod=users&act=list');
			// 		}else{
			// 			$_SESSION['login'] = false;
			// 		}
			// 	}
			// }

			// public function formRegister(){
			// 	include_once('views/user/login.php');
			// }
	}
 ?>