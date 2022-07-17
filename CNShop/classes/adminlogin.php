<?php
	$filepath = realpath(dirname(__FILE__));
	include ($filepath.'/../lib/session.php');
	Session::checkLogin(); // gọi hàm check login để ktra session
	include_once($filepath.'/../lib/database.php');
	include_once($filepath.'/../helpers/format.php');
?>



<?php 
	/**
	* 
	*/
	class adminlogin
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function longin_admin($adminUser,$adminPass){
			$adminUser = $this->fm->validation($adminUser); //gọi ham validation từ file Format để ktra
			$adminPass = $this->fm->validation($adminPass);

			$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link, $adminPass); //mysqli gọi 2 biến. (adminUser and link) biến link -> gọi conect db từ file db
			
			if(empty($adminUser) || empty($adminPass)){
				$alert = "User and Pass không nhập rỗng";
				return $alert;
			}else{
				$query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass' LIMIT 1 ";
				$result = $this->db->select($query);

				if($result != false){
					//session_start();
					// $_SESSION['login'] = 1;
					//$_SESSION['user'] = $user;
					$value = $result->fetch_assoc();
					Session::set('adminlogin', true); // set adminlogin đã tồn tại
					// gọi function Checklogin để kiểm tra true.
					Session::set('adminId', $value['adminId']);
					Session::set('adminUser', $value['adminUser']);
					Session::set('adminName', $value['adminName']);
					echo "<script>window.open('index.php','_self')</script>";
				}else {
					$alert = "User and Pass not match";
					return $alert;
				}
			}


		}


		// public function longin_admin1($date)
		// {
		// 	$email =  $date['adminUser'];
		// 	$password = md5($date['adminPass']);
		// 	if($email == '' || $password == ''){
		// 		$alert = "<span class='error'>Email And Password must be not empty</span>";
		// 		return $alert;
		// 	}else{
		// 		$check_login = "SELECT * FROM tbl_admin WHERE adminUser='$email' AND adminPass='$password' ";
		// 		$result_check = $this->db->select($check_login);
		// 		if ($result_check != false) {
		// 			$value = $result_check->fetch_assoc();
					
		// 			Session::set('adminlogin', true);
		// 			Session::set('adminId', $value['id']);
		// 			Session::set('adminUser', $value['adminUser']);
		// 			echo "<script>window.open('index.php','_self')</script>";
					
		// 		}else {
		// 			$alert = "<span class='error'>Email or Password doesn't match</span>";
		// 			return $alert;
		// 		}
		// 	}
		// }

	

	

	}
 ?>