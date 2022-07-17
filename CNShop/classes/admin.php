<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>



<?php 
	/**
	* 
	*/
	class Admin
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function changepass($password,$id)
		{
			// $sId = session_id();
			$password = $this->fm->validation($password); //gọi ham validation từ file Format để ktra
			$password = mysqli_real_escape_string($this->db->link, $password);
			// $id = mysqli_real_escape_string($this->db->link, $id);
			if(empty($password)){
				$alert = "<span class='error'>Mật khẩu không được để trống!</span>";
				return $alert;
			}else{
						$query = "UPDATE tbl_admin SET adminPass= md5('$password') WHERE adminId = '$id' ";
						$result = $this->db->update($query);
						if($result){
							$alert = "<span class='success'>Change password  Successfully</span>";
							return $alert;
						}else {
							$alert = "<span class='error'>Change password NOT Success</span>";
							return $alert;
					
				}
			}


		}

		public function kiemtrapass($password,$id)
		{
			
			$query = "SELECT * FROM tbl_admin where adminPass = md5('$password') AND  adminId='$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_admin()
		{
			$query = "SELECT * FROM tbl_admin order by adminId desc ";
			$result = $this->db->select($query);
			return $result;
		}

		public function getadminbyId($id)
		{
			$query = "SELECT * FROM tbl_admin where adminId = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}


		public function del_admin($id)
		{
			$query = "DELETE FROM tbl_admin where adminId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Admin Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Admin Deleted Not Success</span>";
				return $alert;
			}
		}
		public function insert_addmin($data){
		
			$adminName = mysqli_real_escape_string($this->db->link, $data['adminName']);
			$adminEmail = mysqli_real_escape_string($this->db->link, $data['adminEmail']);
			$adminUser = mysqli_real_escape_string($this->db->link, $data['adminUser']);
			$adminPass = mysqli_real_escape_string($this->db->link, $data['adminPass']);
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			
			if(empty($adminName) || empty($adminEmail) || empty($adminUser) || empty($adminPass)){
				$alert = "<span class='error'>Admin must be not empty</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_admin(adminName,adminEmail,adminUser,adminPass) VALUES('$adminName','$adminEmail','$adminUser',md5('$adminPass')) ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Insert admin Successfully</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Insert admin NOT Success</span>";
					return $alert;
				}
			}
		}

		public function update_level($id)
		{
			
			$query = "UPDATE tbl_admin set level='0' where adminId='$id' ";
			$result = $this->db->update($query);
			return $result;
		}

			public function update_level1($id)
		{
			
			$query = "UPDATE tbl_admin set level='1' where adminId='$id' ";
			$result = $this->db->update($query);
			return $result;
		}

		
	}

 ?>