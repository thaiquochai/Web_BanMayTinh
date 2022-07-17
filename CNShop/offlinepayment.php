<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
 <?php 

	$login_check = Session::get('customer_login');
	if ($login_check==false) {
		echo "<script>window.open('login.php','_self')</script>";
		
	}

 ?>
<?php 
	if(isset($_GET['orderid']) && $_GET['orderid']=='order' ){
       $customer_id = Session::get('customer_id');
       $insertOrder = $ct->insertOrder($customer_id);
      
      	
       $delcart=$ct->del_all_data_cart();

       
       echo "<script>window.open('success.php','_self')</script>";
      
     
      
    }
 ?>
 

 <style type="text/css">
	.box_left {
    width: 50%;
    border: 1px solid #666;
    float: left;
    padding: 4px;	

	}
 	.box_right {
    width: 47%;
    border: 1px solid #666;
    float: right;
    padding: 4px;
	}
	.a_order {
    background: red;
    color: aliceblue;
    padding: 10px;
    font-size: 25px;
    border-radius: none;
    cursor: pointer;
	}
}
</style>

<form action="" method="POST" >
 <div class="main" >
    <div class="content">
    	<div class="section group" >
    		<div class="heading" >
    		    <div style="background: white;">
					
						
			    		<h2 style="font-size: 20px;"> <img src="images/logo4_1.png" alt="" height="100px" width=100px />Thanh toán</h2>
			    	
			    </div>
    		</div>
    		
    		<div class="clear"></div>
    		<div style="background: #f0f8fc;">
    			<table class="table" style="font-size: 20px;">
    				<?php
    					$id = Session::get('customer_id');
			    		$get_customers = $cs->show_customers($id);
			    		if ($get_customers) {
			    			while ($result = $get_customers->fetch_assoc()) {
    				?>
    					<tr>
    						<td style="color: #ed811c;"><i class="material-icons" style="font-size:20px; color: #ed811c;">place</i> Địa chỉ giao hàng</td>
    					</tr>
    					<tr>
    						<td><?php echo $result['name']; ?>(<?php echo $result['phone']; ?>)</td>
    						<td><?php echo $result['address']; ?></td>
    						<td  style="color: #c1c5c7;">Mặc định</td>
    						<td colspan="3"><a href="editdiachi.php">Cập nhật thông tin</a></td>
    					</tr>
    				<?php
    					}
    				}
    				?>
    			</table>
    		</div>
    		<div >
    			<div class="cartpage">
			    	
			    	<?php 
			    	if (isset($update_quantity_Cart)) {
			    		echo $update_quantity_Cart;
			    	}
			    	 ?>
			    	<?php 
			    	if (isset($delcart)) {
			    		echo $delcart;
			    	}
			    	 ?>
			    	 <?php
			    	 if(isset($delcart)){
			    	 	echo $delcart;
			    	 }
			    	?>
			    	<div style="background:#f0f8fc; ">
						<table class="table" style="font-size: 17px;">
							<tr>
								<th style="width: 550px;">Tên sản phẩm</th>
								<th style="width: 320px;" >Giá</th>
								<th >Số lượng</th>
								<th >Tổng giá</th>
								
							</tr>
						</table>
					</div>
							<?php 
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								$i=0;
								while ($result = $get_product_cart->fetch_assoc()) {
									$i++;
								
							 ?>
					<div style="background: #f0f8fc;">
						<table class="table" style="font-size: 17px;">
							<tr>
								<td style="width: 525px;"><img style="width: 150px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" />&nbsp;&nbsp;<?php echo $result['productName'] ?></td>
								
								
								<td style="width: 370px;"><?php echo '<sup>đ</sup>' .$result['price'] ?></td>
								<td style="width: 260px;">
									<?php echo $result['quantity'] ?>
								</td>
								<td >
									<?php 
									$total = $result['price'] * $result['quantity'];
									echo $total.' VND';
									 ?>
								</td>
								
							</tr>
							<tr>
								<td style="background: white;"></td>
								<td style="background: white;"></td>
								<td style="background: white;"></td>
								<td style="background: white;"></td>
							</tr>
							<?php 

							$subtotal += $total;
							$qty = $qty + $result['quantity'];
								}
							}
							 ?>
	
						</table>
					</div>
					<div style="background: #f0f8fc; height: 100px;">
						<br>
						<br>
						<span style="font-size: 20px;">Phương Thức Thanh toán</span>
						<span style="float: right; font-size: 15px;">Thanh toán khi nhận hàng</span>
					</div>
					<div>
						<br>
					</div>
					
						<?php
							$check_cart = $ct->check_cart();
							if ($check_cart) {

							 ?>
						<table style="float:right;text-align:left; background: #f0f8fc; font-size: 17px;" width="40%">
							<tr>
								<th>Tổng giá : </th>
								<td>
								<?php echo $subtotal.' VND';

									  Session::set('sum',$subtotal);
									  Session::set('qty',$qty);
								?>
								</td>
							</tr>
							<tr>
								<th>Thuế : </th>
								<td>0.2% (<?php echo $vat = $subtotal * 0.002. ' VND';?>)</td>
							</tr>
							 <tr>
                                <th>Phí vận chuyển: </th>
                                <td>30000<sup>đ</sup></td>
                            </tr>
							<tr>
								<th>Tổng cộng :</th>
								<td><?php 
								$vat = $subtotal * 0.002;
								$grandTotal = $subtotal + $vat+30000;
								echo $grandTotal.' VND';
								 ?> </td>
							</tr>
					   </table>
					   <?php 
						}else {
							echo 'Your cart is Empty ! Please Shopping now';
						}
					    ?>


					</div>
					
					

    		</div>
    	<!-- 	<div id="buttonthem" style="float: right;">
		        <a class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>Xem Thông tin</a>
		     </div>
		     <div id="formthem">
	    		<div class="box_right">
	    			<table class="tblone">
			    		<?php 
			    		$id = Session::get('customer_id');
			    		$get_customers = $cs->show_customers($id);
			    		if ($get_customers) {
			    			while ($result = $get_customers->fetch_assoc()) {
			    			
			    		 ?>
			    		<tr>
			    			<td>Tên</td>
			    			<td>:</td>
			    			<td><?php echo $result['name']; ?></td>
			    		</tr>
			    		<tr>
			    			<td>Thành Phố</td>
			    			<td>:</td>
			    			<td><?php echo $result['city']; ?></td>
			    		</tr>
			    		<tr>
			    			<td>Số điện thoại</td>
			    			<td>:</td>
			    			<td><?php echo $result['phone']; ?></td>
			    		</tr> -->
			    		<!-- <tr>
			    			<td>Country</td>
			    			<td>:</td>
			    			<td><?php echo $result['country']; ?></td>
			    		</tr> -->
		<!-- 	    		<tr>
			    			<td>Mã bưu điện</td>
			    			<td>:</td>
			    			<td><?php echo $result['zipcode']; ?></td>
			    		</tr>
			    		<tr>
			    			<td>Email</td>
			    			<td>:</td>
			    			<td><?php echo $result['email']; ?></td>
			    		</tr>
			    		<tr>
			    			<td>Địa chỉ</td>
			    			<td>:</td>
			    			<td><?php echo $result['address']; ?></td>
			    		</tr>
			            <tr>
			                <td colspan="3"><a href="editprofile.php">Cập nhật thông tin</a></td>
			               
			            </tr>
			    		
			    		<?php 
			    		}
			    		}
			    		 ?>
			    	</table>	

	    		</div>
    		
	    	</div>
 -->
 		</div>

 	</div>


 	<center style="padding-bottom: 20px;">
 		 <a style="background:yellow; color: black;" href="cart.php" class="btn btn-warning"> << Quay về</a>
 		<a style="background:#35afd4;" href="?orderid=order" class="btn btn-warning">Đặt hàng ngay</a>

 	</center>

 </div>
</form>

<script>
$(document).ready(function(){
    $("#formthem").hide();
    $("#buttonthem").click(function(){
        $("#formthem").toggle(1000);
    });
});
</script>
<?php 
	include 'inc/footer.php';
 ?>