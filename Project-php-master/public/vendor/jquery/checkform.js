function formValidation(){
	var uid = document.registration.userid;
	var passid = document.registration.passid;
	var uname = document.registration.ten_nv;
	var uadd = document.registration.address;
	var ucountry = document.registration.country;
	var uzip = document.registration.zip;
	var uemail = document.registration.email;
	var umsex = document.registration.msex;
	var ufsex = document.registration.fsex; if(userid_validation(uid,5,12)){
		if(passid_validation(passid,7,12)){
			if(allLetter(uname)){
				if(alphanumeric(uadd)){ 
					if(countryselect(ucountry)){
						if(allnumeric(uzip)){
							if(ValidateEmail(uemail)){
								if(validsex(umsex,ufsex)){}
							} 
						}
					} 
				}
			}
		}
	}
	return false;
} 	
function userid_validation(uid,mx,my){
	var uid_len = uid.value.length;
	if (uid_len == 0 || uid_len >= my || uid_len < mx){
		// alert("User Id should not be empty / length be between "+mx+" to "+my);
		uid.focus(function(){
        $("span").css("display", "inline").fadeOut(2000);
    	}
		return false;
	}

	return true;
}
function passid_validation(passid,mx,my){
	var passid_len = passid.value.length;
	if (passid_len == 0 ||passid_len >= my || passid_len < mx){

		// alert("Password should not be empty / length be between "+mx+" to "+my);
		passid.focus();
		return false;
	}
	return true;
}
function allLetter(uname){ 
	var letters = /^[A-Za-z]+$/;
	if(uname.value.match(letters)){
		return true;
	}
	else{
		// alert('Username must have alphabet characters only');
		 // span.innerHTML="Họ Tên Không được chứa số";
		uname.focus(function(){
        $("span").css("display ": "inline" ,"color" : "red").fadeOut(200)
    });
		return false;
	}
}
function alphanumeric(uadd){ 
	var letters = /^[0-9a-zA-Z]+$/;
	if(uadd.value.match(letters)){
		return true;
	}
	else{
		// alert('User address must have alphanumeric characters only');
		uadd.focus(function(){
        	$("span").css("display", "inline").fadeOut(2000)
    	});
		return false;
	}
}
function countryselect(ucountry){
	if(ucountry.value == "Default"){
		alert('Select your country from the list');
		ucountry.focus();
		return false;
	}
	else{
		return true;
	}
}
function allnumeric(uzip){ 
	var numbers = /^[0-9]+$/;
	if(uzip.value.match(numbers)){
		return true;
	}else{
		alert('ZIP code must have numeric characters only');
		uzip.focus();
		return false;
	}
}
function ValidateEmail(uemail){
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(uemail.value.match(mailformat)){
		return true;
	}
	else{
		alert("You have entered an invalid email address!");
		return false;
	}
}
function validsex(umsex,ufsex){
	x=0;
	if(umsex.checked) {
		x++;
	}
	if(ufsex.checked){
		x++; 
	}
	if (x==2){
		alert('Both Male/Female are checked');
		ufsex.checked=false
		umsex.checked=false
		umsex.focus();
		return false;
	}

	if(x==0){
		alert('Select Male/Female');
		umsex.focus();
		return false;
	}else{
		alert('Form Succesfully Submitted');
		window.location.reload()
		return true;
	}
}


function check(){
			$nameErr=$mobileErr=$emailErr="";
			$data=array();
			function test_input($data) {
			  	$data = trim($data);
			  	$data = stripslashes($data);
			  	$data = htmlspecialchars($data);
			  	return $data;
			}
		
			if(isset($_POST['submit'])){
				$data=array();
				$data['name'] = $_POST['name'];
				$data['email']  = $_POST['email'];
				$data['mobile']  = $_POST['mobile'];
				$data['created_at'] =date('Y-m-d H:i:s');
			
				if($_POST['name']=="") {
					$nameErr="Tên sinh viên không được bỏ trống";
				}
					else $nameErr="";
				$name = test_input($_POST["name"]);
				if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			      $nameErr = "Tên chỉ chứa kí tự và khoảng trống"; 
			    }

			    if ($_POST["email"]=="") {
				    $emailErr = "Email không được bỏ trống";
				}else {
					$email = test_input($_POST["email"]);
				    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				      $emailErr = "Email không đúng định dạng"; 
					}
				}

				if($_POST['mobile']=="") $mobileErr="Số điện thoại không được bỏ trống";
					else $mobileErr="";

				if(!preg_match('/^[0-9]{3}[0-9]{3}[0-9]{5}$/', $_POST['mobile'])&&!preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/', $_POST['mobile'])){
				      	$mobileErr = 'Số điện thoại có 10 hoặc 11 số';
				    }
				    echo $_POST['name'];
				if( $_POST['name']!="" && preg_match("/^[a-zA-Z ]*$/",test_input($_POST["name"])) && $_POST["email"]!="" && filter_var(test_input($_POST["email"]), FILTER_VALIDATE_EMAIL)
					&& preg_match('/^[0-9]{3}[0-9]{3}[0-9]{5}$/', $_POST['mobile']) ){
					echo "đúng ròi";
						$data=array();
						$data['name'] = $_POST['name'];
						$data['email']  = $_POST['email'];
						$data['mobile']  = $_POST['mobile'];
						$data['created_at'] =date('Y-m-d H:i:s');
						if($_FILES["avatar"]["error"] > 0){
							echo "lỗi upload images";
						}
						else {
							move_uploaded_file($_FILES["avatar"]["tmp_name"], "upload/user/" .$_FILES["avatar"]["name"]);
							$link= "upload/user/" .$_FILES["avatar"]["name"];
						}			
						$data['avatar']=$link;
						header('location: ?mod=users&act=store');
				}
			}
			include_once('views/user/add.php');
		}