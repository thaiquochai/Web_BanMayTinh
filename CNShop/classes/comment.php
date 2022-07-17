<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>



<?php 
	/**
	* 
	*/
	class comment
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_comment($comment,$idnguoidung,$id_product,$file, $sao){
			$comment = $this->fm->validation($comment); //gọi ham validation để ktra có rỗng hay ko để ktra
			$comment = mysqli_real_escape_string($this->db->link, $comment);
			$idnguoidung = mysqli_real_escape_string($this->db->link, $idnguoidung);
			$id_product = mysqli_real_escape_string($this->db->link, $id_product);
			$sao = mysqli_real_escape_string($this->db->link, $sao);

			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
			
			$div =explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
			$uploaded_image = "images/".$unique_image;

			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			
			if(empty($comment)){
				$alert = "<span class='error'>comment must be not empty</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "SELECT * FROM tbl_customer WHERE id = '$idnguoidung' ";
				$result = $this->db->select($query)->fetch_assoc();
				$idnguoidung = $result['id'];
				

				$query = "SELECT * FROM tbl_product WHERE productId = '$id_product' ";
				$result2 = $this->db->select($query)->fetch_assoc();
				$id_product = $result2['productId'];

				if(!empty($file_name) && !empty($sao)){
				$query = "INSERT INTO comment(comment,id_nguoidung,id_product,image_cm,sao) VALUES('$comment','$idnguoidung','$id_product','$uploaded_image','$sao') ";
				}
				elseif(empty($file_name) && empty($sao))
				{
					$query = "INSERT INTO comment(comment,id_nguoidung,id_product,image_cm,sao) VALUES('$comment','$idnguoidung','$id_product','',0) ";
				}
				elseif(!empty($file_name) && empty($sao))
				{
					$query = "INSERT INTO comment(comment,id_nguoidung,id_product,image_cm,sao) VALUES('$comment','$idnguoidung','$id_product','$uploaded_image',0) ";

				}
				else
				{
					$query = "INSERT INTO comment(comment,id_nguoidung,id_product,image_cm,sao) VALUES('$comment','$idnguoidung','$id_product','','$sao') ";
				}
				$result1 = $this->db->insert($query);
				if($result1){
					$alert = "<span class='success'>Insert comment Successfully</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Insert comment NOT Success</span>";
					return $alert;
				}
			}
		}
		public function show_comment($id_product)
		{
			$query = "SELECT comment.*, tbl_customer.name, tbl_customer.image

			 FROM comment INNER JOIN tbl_customer ON comment.id_nguoidung = tbl_customer.id
			 				INNER JOIN tbl_product ON comment.id_product = tbl_product.productId
			 WHERE comment.id_product= $id_product";
			$result = $this->db->select($query);
			return $result;
		}

		public function kiemtra( $id_product)
		{
			$query = "SELECT * FROM `comment` WHERE  id_product='$id_product'";
			$result = $this->db->dem($query);
			return $result;
		}
		public function demluotdanhgia($id_product)
		{
			$query = "SELECT * FROM `comment` WHERE id_product='$id_product'";
			$result = $this->db->dem($query);
			return $result;
		}
		public function demluotdanhgia_1sao($id_product)
		{
			$query = "SELECT * FROM `comment` WHERE id_product='$id_product' and sao='1'";
			$result = $this->db->dem($query);
			return $result;
		}
		public function demluotdanhgia_2sao($id_product)
		{
			$query = "SELECT * FROM `comment` WHERE id_product='$id_product' and sao='2'";
			$result = $this->db->dem($query);
			return $result;
		}
		public function demluotdanhgia_3sao($id_product)
		{
			$query = "SELECT * FROM `comment` WHERE id_product='$id_product' and sao='3'";
			$result = $this->db->dem($query);
			return $result;
		}
		public function demluotdanhgia_4sao($id_product)
		{
			$query = "SELECT * FROM `comment` WHERE id_product='$id_product' and sao='4'";
			$result = $this->db->dem($query);
			return $result;
		}
		public function demluotdanhgia_5sao($id_product)
		{
			$query = "SELECT * FROM `comment` WHERE id_product='$id_product' and sao='5'";
			$result = $this->db->dem($query);
			return $result;
		}
		public function demluotdanhgia_coanh($id_product)
		{
			$query = "SELECT * FROM `comment` WHERE id_product='$id_product' and image_cm !=''";
			$result = $this->db->dem($query);
			return $result;
		}
		public function dabansanpham($id_product)
		{
			$query = "SELECT product_soldout FROM `tbl_product` WHERE productId='$id_product'";
			$result = $this->db->select($query);
			return $result;
		}

		public function show_comment_1sao($id_product)
		{
			$query = "SELECT comment.*, tbl_customer.name, tbl_customer.image

			 FROM comment INNER JOIN tbl_customer ON comment.id_nguoidung = tbl_customer.id
			 				INNER JOIN tbl_product ON comment.id_product = tbl_product.productId
			 WHERE comment.id_product= '$id_product' and sao='1'";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_comment_2sao($id_product)
		{
			$query = "SELECT comment.*, tbl_customer.name, tbl_customer.image

			 FROM comment INNER JOIN tbl_customer ON comment.id_nguoidung = tbl_customer.id
			 				INNER JOIN tbl_product ON comment.id_product = tbl_product.productId
			 WHERE comment.id_product= '$id_product' and sao='2'";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_comment_3sao($id_product)
		{
			$query = "SELECT comment.*, tbl_customer.name, tbl_customer.image

			 FROM comment INNER JOIN tbl_customer ON comment.id_nguoidung = tbl_customer.id
			 				INNER JOIN tbl_product ON comment.id_product = tbl_product.productId
			 WHERE comment.id_product= '$id_product' and sao='3'";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_comment_4sao($id_product)
		{
			$query = "SELECT comment.*, tbl_customer.name, tbl_customer.image

			 FROM comment INNER JOIN tbl_customer ON comment.id_nguoidung = tbl_customer.id
			 				INNER JOIN tbl_product ON comment.id_product = tbl_product.productId
			 WHERE comment.id_product= '$id_product' and sao='4'";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_comment_5sao($id_product)
		{
			$query = "SELECT comment.*, tbl_customer.name, tbl_customer.image

			 FROM comment INNER JOIN tbl_customer ON comment.id_nguoidung = tbl_customer.id
			 				INNER JOIN tbl_product ON comment.id_product = tbl_product.productId
			 WHERE comment.id_product= '$id_product' and sao='5'";
			$result = $this->db->select($query);
			return $result;
		}

		public function show_comment_coanh($id_product)
		{
			$query = "SELECT comment.*, tbl_customer.name, tbl_customer.image

			 FROM comment INNER JOIN tbl_customer ON comment.id_nguoidung = tbl_customer.id
			 				INNER JOIN tbl_product ON comment.id_product = tbl_product.productId
			 WHERE comment.id_product= '$id_product' and image_cm != ''";
			$result = $this->db->select($query);
			return $result;
		}
		
		
	}
 ?>