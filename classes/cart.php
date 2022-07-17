<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


 
<?php 
	/**
	* 
	*/
	class cart
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function add_to_cart($id, $quantity)
		{
			$quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$id = mysqli_real_escape_string($this->db->link, $id);

			// $id_customer = mysqli_real_escape_string($this->db->link, $id_customer);
			$sId = session_id();

			$query = "SELECT * FROM tbl_product WHERE productId = '$id' ";
			$result = $this->db->select($query)->fetch_assoc();

			$productName = $result['productName'];
			$price = $result['price'];
			$image = $result['image'];

			// $sql="SELECT * FROM tbl_customer WHERE id = '$id_customer' ";
			// $result1 = $this->db->select($query)->fetch_assoc();
			// $id_customer=$result1['id'];


			if($result['product_remain']>$quantity){
			
				$query_insert = "INSERT INTO tbl_cart(productId,productName,quantity,sId,price,image) VALUES('$id','$productName','$quantity','$sId','$price','$image') ";
				$insert_cart = $this->db->insert($query_insert);
				if($result){
					 echo "<script>window.open('cart.php','_self')</script>";
				}else {
					 echo "<script>window.open('404.php','_self')</script>";
				}
			}else{
				$msg = "<span class='erorr'> Số lượng ".$quantity." bạn đặt quá số lượng chúng tôi chỉ còn ".$result['product_remain']." cái</span> ";
				return $msg;
			}
			

		}
		public function add_to_huydon($id)
		{
			//$quantity = $this->fm->validation($quantity);
			//$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			//$id = mysqli_real_escape_string($this->db->link, $id);
			$sId = session_id();

			$query = "SELECT * FROM tbl_order WHERE id = '$id' ";
			$result = $this->db->select($query)->fetch_assoc();

			$productid=$result['productId'];
			$productName = $result['productName'];
			$sl=$result['quantity'];
			$price = $result['price'];
			$image = $result['image'];
			$customer_id=$result['customer_id'];
			
			
				$query_insert = "INSERT INTO huydon(productId,productName,quantity,sId,price,image,customer_id) VALUES('$productid','$productName','$sl','$sId','$price','$image' ,'$customer_id') ";
				$insert_cart = $this->db->insert($query_insert);
				if($insert_cart){
					 echo "<script>window.open('dh_dahuy.php','_self')</script>";
				}else {
					 echo "<script>window.open('404.php','_self')</script>";
				}
			
		}
		public function get_product_cart()
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function get_product_oder($ioder)
		{
			// $sId = session_id();
			$query = "SELECT * FROM tbl_order WHERE id = '$ioder' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function get_donhuy($id)
		{
			// $sId = session_id();
			$query = "SELECT * FROM huydon WHERE customer_id = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_donhuy1($id)
		{
			// $sId = session_id();
			$query = "SELECT * FROM huydon WHERE customer_id = '$id' ";
			$result = $this->db->dem($query);
			return $result;
		}
		public function update_quantity_Cart($proId,$cartId, $quantity)
		{
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$cartId = mysqli_real_escape_string($this->db->link, $cartId);
			$proId = mysqli_real_escape_string($this->db->link, $proId);

			$query_product = "SELECT * FROM tbl_product WHERE productId = '$proId' ";
			$result_product = $this->db->select($query_product)->fetch_assoc();
			if($quantity<$result_product['product_remain']){
				$query = "UPDATE tbl_cart SET

				quantity = '$quantity'

				WHERE cartId = '$cartId'";

				$result = $this->db->update($query);
				if ($result) {
					 echo "<script>window.open('cart.php','_self')</script>";
				}else {
					$msg = "<span class='erorr'> Product Quantity Update NOT Succesfully</span> ";
					return $msg;
				}
			}else{
				$msg = "<span class='erorr'> Số lượng ".$quantity." bạn đặt quá số lượng chúng tôi chỉ còn ".$result_product['product_remain']." cái</span> ";
				return $msg;
			}

		}
		public function del_product_cart($cartid){
			$cartid = mysqli_real_escape_string($this->db->link, $cartid);
			$query = "DELETE FROM tbl_cart WHERE cartId = '$cartid'";
			$result = $this->db->delete($query);
			if($result){
				 echo "<script>window.open('cart.php','_self')</script>";
			}else{
				$msg = "<span class='error'>Sản phẩm đã được xóa</span>";
				return $msg;
			}
		}

		public function check_cart()
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId' ";
			$result = $this->db->select($query);
			return $result;
		}
			public function check_order1($id)
		{
			
			$query = "SELECT * FROM tbl_order WHERE id = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function check_order($customer_id)
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function check_order_choxacnhan($customer_id)
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' and status='0' group by date_order";
			$result = $this->db->dem($query);
			return $result;
		}
		public function check_order_choxacnhan1($customer_id)
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' and status='1' group by date_order";
			$result = $this->db->dem($query);
			return $result;
			
			
		}
		public function check_order_choxacnhan2($customer_id)
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' and status='2' group by date_order";
			$result = $this->db->dem($query);
			return $result;
		}
		public function check_order_choxacnhan3($customer_id)
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' and status='3' group by date_order";
			$result = $this->db->dem($query);
			return $result;
		}

		public function del_all_data_cart()
		{
			$sId = session_id();
			$query = "DELETE FROM tbl_cart where 1 ";
			$result = $this->db->delete($query);
			
			return $result;
		}
		public function del_compare($customer_id){
			$sId = session_id();
			$query = "DELETE FROM tbl_compare WHERE customer_id = '$customer_id'";
			$result = $this->db->delete($query);
			return $result;
		}
		public function insertOrder($customer_id)
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$get_product = $this->db->select($query);
			if($get_product){
				while($result = $get_product->fetch_assoc()){
					$productid = $result['productId'];
					$productName = $result['productName'];
					$quantity = $result['quantity'];
					$price = $result['price'] * $quantity;
					$image = $result['image'];
					
					$customer_id = $customer_id;
					$query_order = "INSERT INTO tbl_order(productId,productName,quantity,price,image,customer_id,sId) VALUES('$productid','$productName','$quantity','$price','$image','$customer_id','$sId')";
					$insert_order = $this->db->insert($query_order);
				}
			}
		}
		public function insertOrder_donhuy($id)
		{
			// $sId = session_id();
			$query = "SELECT * FROM huydon WHERE id='$id'";
			$get_product = $this->db->select($query);
			if($get_product){
				while($result = $get_product->fetch_assoc()){
					$productid = $result['productId'];
					$productName = $result['productName'];
					$quantity = $result['quantity'];
					$price = $result['price'] * $quantity;
					$image = $result['image'];
					$customer_id =$result['customer_id'];
					$sid=$result['sId'];
					$query_order = "INSERT INTO tbl_order(productId,productName,quantity,price,image,customer_id,sId) VALUES('$productid','$productName','$quantity','$price','$image','$customer_id','$sId')";
					$insert_order = $this->db->insert($query_order);
				}
			}
		}
		public function getAmountPrice($customer_id)
		{
			$query = "SELECT price FROM tbl_order WHERE customer_id = '$customer_id' ";
			$get_price = $this->db->select($query);
			return $get_price;
		}
		public function get_cart_ordered($customer_id)
		{
			$sId=session_id();
			$query = "SELECT tbl_order.*, tbl_product.price as giagoc FROM tbl_order 
				INNER JOIN tbl_product ON tbl_order.productId=tbl_product.productId
			WHERE tbl_order.customer_id = '$customer_id' AND status ='0'
            group by date_order";
			$get_cart_ordered = $this->db->select($query);
			return $get_cart_ordered;
		}

		public function dem_get_cart_ordered($customer_id, $date)
		{
			$sId=session_id();
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' AND status ='0' AND date_order='$date'";
			$get_cart_ordered = $this->db->dem($query);
			return $get_cart_ordered;
		}
		public function dem_get_cart_ordered1($customer_id, $date)
		{
			$sId=session_id();
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' AND status ='1' AND date_order='$date'";
			$get_cart_ordered = $this->db->dem($query);
			return $get_cart_ordered;
		}
		public function dem_get_cart_ordered2($customer_id, $date)
		{
			$sId=session_id();
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' AND status ='2' AND date_order='$date'";
			$get_cart_ordered = $this->db->dem($query);
			return $get_cart_ordered;
		}
		public function dem_get_cart_ordered3($customer_id, $date)
		{
			$sId=session_id();
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' AND status ='3' AND date_order='$date'";
			$get_cart_ordered = $this->db->dem($query);
			return $get_cart_ordered;
		}
		public function get_cart_ordered1($customer_id)
		{
			$query = "SELECT tbl_order.*, tbl_product.price as giagoc FROM tbl_order 
				INNER JOIN tbl_product ON tbl_order.productId=tbl_product.productId
			WHERE tbl_order.customer_id = '$customer_id' AND status ='1'
            group by date_order";
			$get_cart_ordered = $this->db->select($query);
			return $get_cart_ordered;
		}
		public function get_cart_ordered2($customer_id)
		{
			$query = "SELECT tbl_order.*, tbl_product.price as giagoc FROM tbl_order 
				INNER JOIN tbl_product ON tbl_order.productId=tbl_product.productId
			WHERE tbl_order.customer_id = '$customer_id' AND status ='2'
            group by date_order";
			$get_cart_ordered = $this->db->select($query);
			return $get_cart_ordered;
		}

		public function get_cart_ordered3($customer_id)
		{
			$query = "SELECT tbl_order.*, tbl_product.price as giagoc FROM tbl_order 
				INNER JOIN tbl_product ON tbl_order.productId=tbl_product.productId
			WHERE tbl_order.customer_id = '$customer_id' AND status ='3'
            group by date_order";
			$get_cart_ordered = $this->db->select($query);
			return $get_cart_ordered;
		}
		public function del_order($id)
		{
			$query = "DELETE FROM tbl_order where id = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'> Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'> Deleted Not Success</span>";
				return $alert;
			}
		}
		public function del_donhuy($id)
		{
			$query = "DELETE FROM huydon where id = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'> Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'> Deleted Not Success</span>";
				return $alert;
			}
		}
		public function get_inbox_cart()
		{
			$query = "SELECT * FROM tbl_order group by date_order";
			$get_inbox_cart = $this->db->select($query);
			return $get_inbox_cart;
		}
		
		public function shifted($id,$proid,$qty,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$proid = mysqli_real_escape_string($this->db->link, $proid);
			$qty = mysqli_real_escape_string($this->db->link, $qty);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);

			$query_select = "SELECT * FROM tbl_product WHERE productId='$proid'";
			$get_select = $this->db->select($query_select);

			if($get_select){
				while($result = $get_select->fetch_assoc()){
					$soluong_new = $result['product_remain'] - $qty;
					$qty_soldout = $result['product_soldout'] + $qty;

					$query_soluong = "UPDATE tbl_product SET

					product_remain = '$soluong_new',product_soldout = '$qty_soldout' WHERE productId = '$proid'";
					$result = $this->db->update($query_soluong);
				}
			}

			$query = "UPDATE tbl_order SET

			status = '1'

			WHERE id = '$id' AND date_order = '$time' AND price = '$price' ";


			$result = $this->db->update($query);
			if ($result) {
				$msg = "<span class='success'> Update Order Succesfully</span> ";
				return $msg;
			}else {
				$msg = "<span class='erorr'> Update Order NOT Succesfully</span> ";
				return $msg;
			}
		}
		public function del_shifted($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "DELETE FROM tbl_order 
					  WHERE id = '$id' AND date_order = '$time' AND price = '$price' ";

			$result = $this->db->update($query);
			if ($result) {
				$msg = "<span class='success'> DELETE Order Succesfully</span> ";
				return $msg;
			}else {
				$msg = "<span class='erorr'> DELETE Order NOT Succesfully</span> ";
				return $msg;
			}
		}
		public function shifted_confirm($id,$time)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			
			$query = "UPDATE tbl_order SET

			status = '2'

			WHERE customer_id = '$id' AND date_order = '$time' ";

			$result = $this->db->update($query);
			return $result;
		}


		public function shifted_confirm1($id,$time)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			
			$query = "UPDATE tbl_order SET

			status = '3'

			WHERE customer_id = '$id' AND date_order = '$time'  ";

			$result = $this->db->update($query);
			return $result;
		}

		public function shifted_confirm2($id,$time)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			
			$query = "UPDATE tbl_order SET

			status = '0'

			WHERE customer_id = '$id' AND date_order = '$time' ";

			$result = $this->db->update($query);
			return $result;
		}

		public function donhangchitiet($date, $customer_id)
		{
			$query = "SELECT tbl_order.*, tbl_product.price as giagoc, tbl_product.catId as catId FROM tbl_order 
				INNER JOIN tbl_product ON tbl_order.productId=tbl_product.productId WHERE date_order='$date' and tbl_order.customer_id='$customer_id'";
			$get_inbox_cart = $this->db->select($query);
			return $get_inbox_cart;


			
		}
	}
 ?>