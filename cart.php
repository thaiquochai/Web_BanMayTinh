 <?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php
    if(isset($_GET['cartid'])){
        $cartid = $_GET['cartid']; 
        $delcart = $ct->del_product_cart($cartid);
    }
        
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $cartId = $_POST['cartId'];
        $proId = $_POST['proId'];
        $quantity = $_POST['quantity'];
        $update_quantity_Cart = $ct -> update_quantity_Cart($proId,$cartId, $quantity); // hàm check catName khi submit lên
    	if ($quantity <= 0) {
    		$delcart = $ct->del_product_cart($cartId);
    	}
    } 
 ?>
 <?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}
?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage" style="background: #f7f7f7;">
				<div style="background: white;">
					
						
			    		<h2 style="font-size: 20px;"> <img src="images/logo4_1.png" alt="" height="100px" width=100px />Giỏ hàng của bạn</h2>
			    	
			    </div>
			    <div style="background: white;">
			    	<table class="table">
			    		<th style="width: 500px;">Sản phẩm</th>
			    		<th style="width: 300px;">Đơn giá</th>
			    		<th style="width: 370px;">Số lượng</th>
			    		<th style="width: 200px;">Số tiền</th>
			    		<th>Thao tác</th>
			    	</table>
			    </div>
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
			    	<div style="background: white;">
						<table class="table">
							<?php 
						
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								while ($result = $get_product_cart->fetch_assoc()) {
									
								
							 ?>
							 <tr>
							 	<td><img style="width: 150px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" />&nbsp;&nbsp;<?php echo $result['productName'] ?></td>
							 	<td style="font-size: 20px; color: red;"><?php echo '<sup>đ</sup>'.  $fm->format_currency($result['price'])?></td>
							 	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
							 	<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" min="0" value="<?php echo $result['cartId'] ?>"/>
										<input type="hidden" name="proId" min="0" value="<?php echo $result['productId'] ?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity'] ?>"/>
										<input style="background: #e1e9fa; width: 100px; height: 35px; 
										border-radius: 5px;" type="submit" name="submit" value="Update"/>
									</form>
								</td>
									
								
								<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
								
								<td style=" color: red;font-size: 20px; ">
									<?php 
									$total = $result['price'] * $result['quantity'];
									echo '<sup>đ</sup>'. $fm->format_currency($total);
									 ?>
								</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td style="float: right;"><a class="btn btn-danger" href="?cartid=<?php echo $result['cartId'] ?>">Xóa</a></td>
								
							 </tr>
							
							<tr>
								<td  style="background: #f7f7f7;"></td>
								<td  style="background: #f7f7f7;"></td>
								<td  style="background: #f7f7f7;"></td>
								<td  style="background: #f7f7f7;"></td>
								<td  style="background: #f7f7f7;"></td>
								<td  style="background: #f7f7f7;"></td>
								<td  style="background: #f7f7f7;"></td>
								<td  style="background: #f7f7f7;"></td>
								
								
							</tr>

							<?php 

							$subtotal += $total;
							$qty = $qty + $result['quantity'];
								}
							}
							 ?>
	
						</table>
						</div>
						<?php
							$check_cart = $ct->check_cart();
							if ($check_cart) {

							 ?>
						<table style="float:right;text-align:left; background: #abd2d4;" width="40%" >
							<tr>
								<th>Sub Total : </th>
								<td>
								<?php echo $fm->format_currency($subtotal)." VND";

									  Session::set('sum',$subtotal);
									  Session::set('qty',$qty);
								?>
								</td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>0.2%</td>
							</tr>
							 <tr>
                                <th>Phí vận chuyển: </th>
                                <td>30000<sup>đ</sup></td>
                            </tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php 
								$vat = $subtotal * 0.002;
								$grandTotal = $subtotal + $vat+30000;
								echo $fm->format_currency($grandTotal)." VND";
								 ?> </td>
							</tr>
					   </table>
					   <?php 
						}else {
							echo 'Giỏ của bạn trống trơn ! Hãy mua sắm ngay bây giờ';
						}
					    ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php">  <button type="button" class="btn btn-warning" style="float: left;">Commping shop</button></a>
						</div>
						<div class="shopright">
							<a href="offlinepayment.php">  <button type="button" class="btn btn-danger" style="float: right;">Checkout</button></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php 
	include 'inc/footer.php';
 ?>
