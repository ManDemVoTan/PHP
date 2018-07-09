<?php 
include_once('models/Product.php');
include_once('models/Customer.php');
class BanHangController{
	public $product_model;
	public $customer_model;
	public function __construct(){
		$this->product_model = new Product();
		$this->customer_model = new Customer();

	}
	public function list1(){
			// if(isset($_SESSION['cart'])){
			$data = $this->product_model->getAll();
		// }else{
		// 	echo "Your Cart Empty";
		// }

		include_once('views/banhang/listProduct.php');
	}
	public function cart(){
		if(isset($_SESSION['cart'])){
			$data = $this->product_model->getAll();
			include_once('views/banhang/cart.php');
		}else{
			// echo "Your Cart Empty";
			include_once('views/banhang/cart.php');
		}
		
		
	}
	public function addcart(){

		$code = $_GET['ma_sp'];
		$product = $this->product_model->find($code);

		if (isset($_SESSION['cart'][$code])) {
			$_SESSION['cart'][$code]['qty']++;
			$_SESSION['cart'][$code]['price']+= $_SESSION['cart'][$code]['price'];
		}else{
			$_SESSION['cart'][$code] = $product;
			$_SESSION['cart'][$code]['qty']=1;
		}

		setcookie('update', 'Success!', time()+3);

		header('location:index.php?mod=BanHang&act=list');
	}
	public function addtocart(){
		$code = $_GET['ma_sp'];


		if (isset($_SESSION['cart'][$code])) {
			$_SESSION['cart'][$code]['qty']++;
			// $_SESSION['cart'][$code]['price']+= $_SESSION['cart'][$code]['price'];
		}else{
			$_SESSION['cart'][$code] = $data[$code];
			$_SESSION['cart'][$code]['qty']=1;
		}

		header('location:index.php?mod=BanHang&act=cart');

	}
	public function send_email($email_recive,$name,$contents,$subject ){
		//https://www.google.com/settings/security/lesssecureapps
		// Khai báo thư viên phpmailer
        require "public/mailer.php/phpmailer/PHPMailerAutoload.php";
        require "public/mailer.php/phpmailer/class.phpmailer.php";
        // Khai báo tạo PHPMailer
        $mail = new PHPMailer();
        //Khai báo gửi mail bằng SMTP
        $mail->IsSMTP();
        //Tắt mở kiểm tra lỗi trả về, chấp nhận các giá trị 0 1 2
        // 0 = off không thông báo bất kì gì, tốt nhất nên dùng khi đã hoàn thành.
        // 1 = Thông báo lỗi ở client
        // 2 = Thông báo lỗi cả client và lỗi ở server
        // To load the French version
        $mail->setLanguage('vi', '/optional/path/to/language/directory/');
        $mail->SMTPDebug  = 2;
        $mail->CharSet="UTF-8";
        $mail->Debugoutput = "html"; // Lỗi trả về hiển thị với cấu trúc HTML
        $mail->Host       = "smtp.gmail.com"; //host smtp để gửi mail
        $mail->Port       = 587; // cổng để gửi mail
        $mail->SMTPSecure = "tls"; //Phương thức mã hóa thư - ssl hoặc tls
        $mail->SMTPAuth   = true; //Xác thực SMTP
        $mail->Username   = "auto.zentgroup@gmail.com"; // Tên đăng nhập tài khoản Gmail
        $mail->Password   = "1@3$5^7*"; //Mật khẩu của gmail
        $mail->SetFrom("zentgroup@gmail.com", "Zent Group"); // Thông tin người gửi
        $mail->AddReplyTo("zentgroup@gmail.com","Zent Group");// Ấn định email sẽ nhận khi người dùng reply lại.
        $mail->AddAddress($email_recive, $name);//Email của người nhận
        $mail->Subject = $subject; //Tiêu đề của thư
        $mail->MsgHTML($contents); //Nội dung của bức thư.
        // $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
        // Gửi thư với tập tin html
        $mail->AltBody = "Nội dung thư";//Nội dung rút gọn hiển thị bên ngoài thư mục thư.
        //$mail->AddAttachment("images/attact-tui.gif");//Tập tin cần attach
         
        //Tiến hành gửi email và kiểm tra lỗi
        if(!$mail->Send()) {
         // echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
			return false;
        } else {
			return true;
          //echo "Đã gửi thư thành công!";
        }
	}

    // $name ='Phương';
    // $msg="

    // <h2>Xin Chao".$name." </h2> 
    // <p>Email nay duoc gui cho ban tu <font color=\"red\">Zent Group</p>

    

    // ";


    // send_email("vup0851@gmail.com",$name,$msg,"php09");
   

	// }



	public function subcart(){
		if (isset($_GET['ma_sp'])) {
		$code = $_GET['ma_sp'];

		if (isset($_SESSION['cart'][$code])) {

			if ($_SESSION['cart'][$code]['qty'] >  1) {


				$_SESSION['cart'][$code]['qty']--;
				
			}else{
				unset($_SESSION['cart'][$code]);
			}

		}
		
	}

		header('location:index.php?mod=BanHang&act=cart');
	}


	public function delete(){

		if(isset($_GET['ma_sp'])){
			$code = $_GET['ma_sp'];
			if (isset($_SESSION['cart'][$code])) {

				unset($_SESSION['cart'][$code]);
		}
	}
	setcookie('delete', 'Success!', time()+3);
		
	header('location:index.php?mod=BanHang&act=cart');


	}

	public function invoice(){
		 		include_once('views/banhang/hoadon.php');
 	
	}
}


?>