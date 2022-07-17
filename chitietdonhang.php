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
     	$shifted_confirm = $ct->shifted_confirm1($id,$time,$price);
    }
?>
<?php
    // gọi class category
        
    if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
        // echo "<script> window.location = 'dh_dahuy.php' </script>";
        
    }else {
        $id = $_GET['delid']; 
       
        // Lấy catid trên host
        $insertcart = $ct->add_to_huydon($id);
       if(isset($insertcart)){
        $delorder = $ct -> del_order($id); }
        // hàm check delete Name khi submit lên
    }
 ?> 
 <?php
 	if(!isset($_GET['date_order']) || $_GET['date_order'] == NULL){
        // echo "<script> window.location = 'dh_dahuy.php' </script>";
        
    }else {
        $date_order = $_GET['date_order']; 
       
        // Lấy catid trên host
      
        // hàm check delete Name khi submit lên
    }

 ?>
 

 <div class="main">
    <div class="content">
    	<div style=" background: #abc9ed; ">
    		<span style="font-size: 20px; ">

    					<span>
    						<a href="dh_choxacnhan.php" style="color: black; ">
    						Chờ xác nhận </a>
    						<a href="" style="color: red; ">
    							<?php
    								$customer_id = Session::get('customer_id'); 
									$check_cart = $ct->check_order_choxacnhan($customer_id);
									
									if(count($check_cart) ==0 )
									{
										echo '0';
									}
									else
									{
										echo $check_cart;
									}
									
									
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

						<table >
							
							<?php
							$customer_id = Session::get('customer_id');  
							$get_cart_ordered = $ct->donhangchitiet($date_order,$customer_id);
							if($get_cart_ordered){
								$i=0;
								$qty = 0;
								$subtotal = 0;
								while ($result = $get_cart_ordered->fetch_assoc()) {
								$i++;
							 ?>
							<tr >
								<td style="float: left; "><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" width="200px"/></td>
								<td style="margin-left: auto; font-size: 20px; color: red;"><?php echo 'price : <sup>đ</sup>'.$result['giagoc'] ?></td>
								<td> &ensp; </td>
								<td style="font-size: 20px; "><?php echo 'Số lượng: '. $result['quantity'] ?></td>
							</tr>
							<tr>
								<td style="background: white; float: left; font-size: 30px; text-align: center;"><?php echo $result['productName'] ?></td>
								<td> &ensp; </td>
								

							</tr>
							<tr>
								<td><?php echo 'Ngày đặt: '.$fm->formatDate($result['date_order'])  ?></td>
								<td></td>
								<td>
								 	<!-- <a class="btn btn-warning" href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Hủy đơn</a> -->

								 
								 </td>
							</tr>
							<tr style="background: #e4e697; font-size: 20px;">
								<td >
                                    <?php 
                                    $total = $result['giagoc'] * $result['quantity'];
                                    echo'Thành tiền: ' .$total.' VND';
                                     ?>
                                </td>
							</tr>
							<tr>
								 <td> <hr></td>
							</tr>


							<?php 
							 $subtotal += $total;
                            $qty = $qty + $result['quantity'];							
								}
							}
							 ?>

	
						</table>
						</table>
						  
                        <table style="float:right;text-align:left; background: #e4e697;" width="40%">
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
