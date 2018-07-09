 <?php 

	include_once 'models/Category.php';
	include_once 'models/Product.php';

	class CategoryController
	{
		public $category_model;
		public $product;

		function __construct()
		{
			$this->category_model=new Category();
		}

		public function list1()
		{
			$data = $this->category_model->getAll();
			include_once 'views/category/list.php';
		}

		public function detail(){ //show thông tin theo id
			if (isset($_GET['id'])) {
				$id = $_GET['id'];

				$data = $this->category_model->products($id);

				include_once("views/category/listProduct.php");
			}
		}

		public function add()
		{
			include_once 'views/category/add.php';
		}

		public function store()
		{
			if (isset($_POST['submit'])) { //kiểm tra đã đc submit chưa
				$data = array(
					'name' => $_POST['name'],
					'description' => $_POST['description'],
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
				);
				
				$result = $this->category_model->insert($data);

				if ($result) {
					setcookie('add', 'Success!', time()+3);
				} else {
					setcookie('add','Failed', time()+3);
				}
				} else {
				setcookie('add','Failed', time()+3);
			}
			header('Location: ?mod=categories');
		}

		public function edit() //sửa theo id
		{
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$category = $this->category_model->find($id);
				include_once 'views/category/edit.php';					
			}
		}

		public function update()
		{	

			$data= array();

			$id = $_POST['id'];
				
				if (isset($_POST['submit'])) {	

				$data['name'] = $_POST['name'];
				$data['description'] = $_POST['description'];
				$data['updated_at'] = date('Y-m-d H:i:s');
			
			$result = $this->category_model->update($data, $id);

			if ($result) {
				setcookie('update', 'Success!', time()+3);
			} else {
				setcookie('update', 'Failed!', time()+3);
			}
		}
			
			header('Location: ?mod=categories');
		
	}


		public function delete()
		{
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$result = $this->category_model->destroy($id);
				if ($result) {
					setcookie('delete', 'Success!', time()+3);
				} else {
					setcookie('delete', 'Failed!', time()+3);
				}
				
			} else {
				setcookie('delete', 'Failed!', time()+3);
			}
			header('Location: ?mod=categories');
		}
	}
	?>