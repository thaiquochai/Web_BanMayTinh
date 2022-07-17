<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>



<?php 
	/**
	* 
	*/
	class ware
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_ware($id_sanpham,$sl_nhap, $ngaynhap){
			$id_sanpham = $this->fm->validation($id_sanpham);
			$sl_nhap = $this->fm->validation($sl_nhap); 
			$ngaynhap = $this->fm->validation($ngaynhap);
			//gọi ham validation để ktra có rỗng hay ko để ktra
			$id_sapham = mysqli_real_escape_string($this->db->link, $id_sapham);
			$sl_nhap = mysqli_real_escape_string($this->db->link, $sl_nhap);
			$ngaynhap = mysqli_real_escape_string($this->db->link, $ngaynhap);
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			
			if(empty($id_sanpham)){
				$alert = "<span class='error'>Sản phẩm không được để trống</span>";
				return $alert;

			}

			if(empty($sl_nhap)){
				$alert = "<span class='error'> Số lượng không được để trống</span>";
				return $alert;
			
			}
			if(empty($ngaynhap)){
				$alert = "<span class='error'> Ngày nhập không được để trống</span>";
				return $alert;
			
			}
			
				$query = "INSERT INTO tbl_warehouse(id_sanpham,sl_nhap,sl_ngaynhap) VALUES('$id_sanpham','$sl_nhap','$ngaynhap') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Insert brand Successfully</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Insert ware NOT Success</span>";
					return $alert;
				}
			
		}
		public function show_ware()
		{
			$query = "SELECT * FROM tbl_warehouse order by id_warehouse desc ";
			$result = $this->db->select($query);
			return $result;
		}
		// public function getbrandbyId($id)
		// {
		// 	$query = "SELECT * FROM tbl_brand where brandId = '$id' ";
		// 	$result = $this->db->select($query);
		// 	return $result;
		// }
		// public function update_brand($brandName,$id)
		// {
		// 	$brandName = $this->fm->validation($brandName); //gọi ham validation từ file Format để ktra
		// 	$brandName = mysqli_real_escape_string($this->db->link, $brandName);
		// 	$id = mysqli_real_escape_string($this->db->link, $id);
		// 	if(empty($brandName)){
		// 		$alert = "<span class='error'>Brand must be not empty</span>";
		// 		return $alert;
		// 	}else{
		// 		$query = "UPDATE tbl_brand SET brandName= '$brandName' WHERE brandId = '$id' ";
		// 		$result = $this->db->update($query);
		// 		if($result){
		// 			$alert = "<span class='success'>Brand Update Successfully</span>";
		// 			return $alert;
		// 		}else {
		// 			$alert = "<span class='error'>Update Brand NOT Success</span>";
		// 			return $alert;
		// 		}
		// 	}

		// }
		// public function del_brand($id)
		// {
		// 	$query = "DELETE FROM tbl_brand where brandId = '$id' ";
		// 	$result = $this->db->delete($query);
		// 	if($result){
		// 		$alert = "<span class='success'>Brand Deleted Successfully</span>";
		// 		return $alert;
		// 	}else {
		// 		$alert = "<span class='success'>Brand Deleted Not Success</span>";
		// 		return $alert;
		// 	}
		// }
		
	}
 ?>