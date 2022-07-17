<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>



<?php 
	/**
	* 
	*/
	class Contact_us
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_contact( $email,$id_nguoidung){
			
			$email = $this->fm->validation($email); 
			 
			//gọi ham validation để ktra có rỗng hay ko để ktra
			
			$email = mysqli_real_escape_string($this->db->link, $email);
			
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			
			if(empty($email)){
				$alert = "<span class='error'>Vui lòng không để trống</span>";
				return $alert;
			}else{
				$query = "INSERT INTO contact_us(email,id_nguoidung) VALUES('$email',$id_nguoidung) ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Bạn đã gửi thành công! Hãy đợi phản hồi!</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Gửi lỗi</span>";
					return $alert;
				}
			}
		}
		public function show_contact_us()
		{
			$query = "SELECT * FROM contact_us order by id desc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function del_contact($id)
		{
			$query = "DELETE FROM contact_us where id = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'> Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Deleted Not Success</span>";
				return $alert;
			}
		}

		public function insert_traloi($noidung, $id_contact){
			$noidung = $this->fm->validation($noidung); 
			//gọi ham validation để ktra có rỗng hay ko để ktra
			$noidung = mysqli_real_escape_string($this->db->link, $noidung);
			$id_contact = mysqli_real_escape_string($this->db->link, $id_contact);
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			
			if(empty($noidung)){
				$alert = "<span class='error'>Không rỗng</span>";
				return $alert;
			}else{
				$query = "INSERT INTO traloi(noidung, id_costact) VALUES('$noidung','$id_contact') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Insert  Successfully</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Insert  NOT Success</span>";
					return $alert;
				}
			}
		}
		


		
	}
 ?>