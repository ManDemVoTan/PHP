<?php 
	session_start();
	//session_destroy();
		$mod = "index";
		$act = "list";
		if (isset($_GET['mod'])) {
			$mod = $_GET['mod'];
			if(isset($_GET['act'])){
				$act = $_GET['act'];
			}
			if(isset($_POST['date'])){
				$date = $_POST['date'];
			}else{
				$date = "";
							}
		}
			switch ($mod){
				case 'index':{
					// header('location: ?mod=users&act=formlogin');
					include('views/home.php');
				}	
					break;
				case 'users':{		
					include('controllers/UserController.php');		
					$controller = new UserController();

					switch ($act){
						case 'list':{
							$controller->list1();
							break;
						}
						case 'add':
							$controller->add();
							break;
						case 'store':
							$controller->store();
							break;
						case 'update':
							$controller->update();
							break;
						case 'edit':
							$controller->edit();
							break;
						case 'delete':
							$controller->delete();
							break;
						case 'detail':
							$controller->detail();
							break;
						case 'login':
							$controller->login();
							break;
						case 'formlogin':
							$controller->formLogin();
							break;
							case 'register':
							$controller->register();
							break;
						case 'formregister':
							$controller->formRegister();
							break;
						case 'logout':
							$controller->logout();
							break;
						default:
							$controller->error();
							break;
						}
					break;
				}
				case 'products':{		
					include('controllers/ProductController.php');		
					$productcontroller = new ProductController();

					switch ($act){
						case 'list':{
							$productcontroller->list1();
							break;
						}
						case 'add':
							$productcontroller->add();
							break;
						case 'store':
							$productcontroller->store();
							break;
						case 'update':
							$productcontroller->update();
							break;
						case 'edit':
							$productcontroller->edit();
							break;
						case 'delete':
							$productcontroller->delete();
							break;
						case 'detail':
							$productcontroller->detail();
							break;
						default:
							$productcontroller->error();
							break;
						}
					break;
				}
			
				case 'categories':{					
						include_once('controllers/CategoryController.php');
						$categoryController = new CategoryController();
						switch ($act){
						case 'list':{
							$categoryController->list1();
							break;
						}
						case 'add':
							$categoryController->add();
							break;
						case 'store':
							$categoryController->store();
							break;
						case 'update':
							$categoryController->update();
							break;
						case 'edit':
							$categoryController->edit();
							break;
						case 'delete':
							$categoryController->delete();
							break;
						case 'detail':
							$categoryController->detail();
							break;
						default:
							$categoryController->error();
							break;
					}
					break;

				}
				case 'BanHang' :{
					include_once('controllers/BanHangController.php');
					$BanHangController = new BanHangController();
					switch ($act) {
						case 'list':
							$BanHangController->list1();
							break;
						case 'addcart':
							$BanHangController->addcart();
							break;
						case 'addtocart':
							$BanHangController->addtocart();
							break;
						case 'cart':
							$BanHangController->cart();
							break;
						case 'subcart':
							$BanHangController->subcart();
							break;
						case 'delete':
							$BanHangController->delete();
							break;
						case 'invoice':
							$BanHangController->invoice();

							break;
						
						default:
							include_once("views/404.php");
							break;
					}

					break;
				}
				case 'report' :{
					include_once('controllers/BillController.php');
					$BillController = new BillController();
					switch ($act) {
						case 'list':
							$BillController->listBillByDate($date);
							break;
						default:
							include_once("views/404.php");
							break;
					}

					break;
				}
				case 'customer':{		
					include_once('controllers/CustomerController.php');		
					$customerController = new CustomerController();

					switch ($act){
						case 'list':{
							$customerController->list1();
							break;
						}
						case 'register':{
							$customerController->register();
							break;
						}
						case 'add':
							$customerController->add();
							break;
						case 'order':
							$customerController->order();
							break;
						case 'store':
							$customerController->store();
							break;
						case 'addtwo':
							$customerController->addtwo();
							break;
						case 'register':
							$customerController->register();
							break;
						case 'Fromregister' :
							$customerController->Fromregister();
							break;
						default:
							$customerController->error();
							break;
						}
					break;
				}
				case 'bill': {

					include_once('controllers/BillController.php');		
					$billController = new BillController();

					switch ($act){
						case 'store':{
							$billController->store();
							break;
						}
						default:
							$customerController->error();
							break;
						

				}
			}
				// case 'invoices':{		
				// 	include_once('controllers/InvoiceController.php');		
				// 	$invoiceController = new InvoiceController();

				// 	switch ($act){
				// 		case 'list':{
				// 			$invoiceController->list1();
				// 			break;
				// 		}
				// 		default:
				// 			$invoiceController->error();
				// 			break;
				// 		}
				// 	break;
				// }
				default:
					include_once("views/404.php");
							break;
			}
 ?>