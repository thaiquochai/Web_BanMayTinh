<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php
 //    if(isset($_GET['cartid'])){
 //        $cartid = $_GET['cartid']; 
 //        $delcart = $ct->del_product_cart($cartid);
 //    }
        
	// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
 //        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
 //        $cartId = $_POST['cartId'];
 //        $quantity = $_POST['quantity'];
 //        $update_quantity_Cart = $ct -> update_quantity_Cart($cartId, $quantity); // hàm check catName khi submit lên
 //    	if ($quantity <= 0) {
 //    		$delcart = $ct->del_product_cart($cartId);
 //    	}
 //    } 
 ?>
<?php 
	$login_check = Session::get('customer_login');
	  if ($login_check==false) {
	  	echo "<script>window.open('login.php','_self')</script>";
	  	
	  }
 ?>
 <?php
	if(isset($_GET['confirmid'])){
     	$id = $_GET['confirmid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$shifted_confirm = $ct->shifted_confirm($id,$time,$price);
    }
?>
<?php
    // gọi class category
        
    if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['delid']; 
        // Lấy catid trên host
        $delorder = $ct -> del_order($id); 
        $delcart = $ct->del_product_cart($id);
        // hàm check delete Name khi submit lên
    }
 ?> 
 <div class="main">
    <div class="content">
    	<div style=" background: #f0f8fc; ">
    		<span style="font-size: 20px; ">

    					<span>
    						<a href="dh_choxacnhan.php" style="color: black; ">
    						Chờ xác nhận </a>
    						<a href="" style="color: red; ">
    							<?php
    								$customer_id = Session::get('customer_id'); 
									$check_cart = $ct->check_order_choxacnhan($customer_id);
									echo $check_cart;
									
									
									
								?>
    						</a>
    					</span>
    						
    					&nbsp;&nbsp;&nbsp;&nbsp;
    					<span>
			    			<a href="dh_danggiao.php" style="color: black; ">Đang giao</a>
			    			<a href="" style="color: red;">
    							<?php
    								$customer_id = Session::get('customer_id'); 
									$check_cart = $ct->check_order_choxacnhan1($customer_id);
									echo $check_cart;
									
								?>
    						</a>
			    		</span>&nbsp;&nbsp;&nbsp;&nbsp;
			    		<span>
			    			<a href="dh_danhan.php" style="color: black; ">Đã nhận</a> 
			    			<a href="" style="color: red;">
    							<?php
    								$customer_id = Session::get('customer_id'); 
									$check_cart = $ct->check_order_choxacnhan2($customer_id);
									echo $check_cart;
									
									
								?>
    						</a>
			    		</span>&nbsp;&nbsp;&nbsp;&nbsp;
			    		<span>

			    			<a href="dh_dahuy.php"style="color: black; ">Đã hủy</a>
			    			<a href="" style="color: red;">
    							<?php
    								$customer_id = Session::get('customer_id'); 
									$check_cart = $ct->check_order_choxacnhan3($customer_id);
									
									echo $check_cart;
									
								?>
    						</a>
			    		</span>&nbsp;&nbsp;&nbsp;&nbsp;
			</span>
    	</div>
    	<div class="cartoption">		
			<div class="cartpage">

					<div style="background: #f0f8fc;">
					<table class="table" style="font-size: 20px;">
						<tr>
								<th style="width: 570px;">Tên sản phẩm</th>
								<th style="width: 320px;" >Giá</th>
								<th >Số lượng sản phẩm</th>
								<th >Ngày đặt</th>
								
						</tr>

					</table>
				</div>
				<div style="background:#f0f8fc; ">

						<table class="table">
							
							<?php
							$customer_id = Session::get('customer_id');  
							$get_cart_ordered = $ct->get_cart_ordered2($customer_id);

							if($get_cart_ordered){
								$i=0;
								$qty = 0;
								while ($result = $get_cart_ordered->fetch_assoc()) {
								$i++;
							 ?>
							
								<?php
									$date=$result['date_order'];
									$demslsp=$ct->dem_get_cart_ordered2($customer_id, $date);
									


								?>
								<td style="float: left; font-size: 17px; width: 525px;"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" width="150px"/> &ensp;<?php echo $result['productName'] ?></td>
								<td style="width: 370px;font-size: 17px; color: red;"><?php echo '<sup>đ</sup> '.$result['giagoc'] ?></td>

								<td style="width: 260px;font-size: 17px;"><?php echo 'x'. $demslsp ?></td>

								
								<td style="font-size: 17px;"><?php echo $fm->formatDate($result['date_order'])  ?></td>
								
							
							
							<tr>
							
								<td></td>
								<td>
								 	

								 	<a class="btn btn-warning" href="chitietdonhang_danhan.php?date_order=<?php echo $result['date_order'] ?>">Chi tiết đơn hàng</a>

								 </td>
							</tr>
							<tr>
								<td style="background: white;"></td>
								<td style="background: white;"></td>
								<td style="background: white;"></td>
								<td style="background: white;"></td>
							</tr>

							<?php 							
								}
							}
							 ?>

	
						</table>
						</div>
						
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <button type="button" class="btn btn-warning" style="float: left;">Commping shop</button></a>
						</div>

						<!-- <div class="shopright">
							<a href="payment.php"> <button type="button" class="btn btn-danger" style="float: right;">Chi tiết đơn hàng</button></a>
						</div> -->
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php 
	include 'inc/footer.php';
 ?>
