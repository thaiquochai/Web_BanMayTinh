<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php include 'classes/comment.php';  
$comment = new comment(); ?>

<?php 
	if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
        echo "<script> window.location = '404.php' </script>";
        
    }else {
        $id = $_GET['proid'];
        $brand=$_GET['brand']; // Lấy productid trên host
    }
    
	$customer_id = Session::get('customer_id'); // bỏ $ nha chú , $ là biến chứ không phải thuộc tính 
	//$customer_id = Session::get('$customer_id'); // dòng lỗi ,nản chú ghê,easy vậy mà
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $productid = $_POST['productid'];
        $insertCompare = $product -> insertCompare($productid, $customer_id); // hàm check catName khi submit lên
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $productid = $_POST['productid'];
        $insertWishlist = $product -> insertWishlist($productid, $customer_id); // hàm check catName khi submit lên
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $quantity = $_POST['quantity'];
        $insertCart = $ct -> add_to_cart($id, $quantity); // hàm check catName khi submit lên
    }  
 ?>
 
<style type="text/css">
	.img-container2{ 
 
	  height: auto; /** Chiều cao tự động **/ 
	  margin: 10px auto; /** Cách trên dưới 10px và nằm giữa **/ 
	  overflow: hidden; /** DÒNG BẮT BUỘC CÓ **/ 
	  position: relative; width: 400px; /** Chiều rộng vùng chứa **/ } 
	.img-container2 img { 
	 /** Hình ảnh rộng 100% so với vùng chứa **/ 
	
	  transition: all 1s; /** Tạo độ mượt **/ } 
	  
	.img-container2:hover img { 
	  -webkit-transform: scale(1.2); transform: scale(1.2); }
</style>  
	  

 <div class="main">
    <div class="content" style="background: #d5e6ed;">
    	<div class="section group" >
    		<?php 
    		$get_product_details = $product->get_details($id);
    		$demluotdanhgia=$comment->demluotdanhgia($id);
    		$demluotdanhgia_1sao=$comment->demluotdanhgia_1sao($id);
    		$demluotdanhgia_2sao=$comment->demluotdanhgia_2sao($id);
    		$demluotdanhgia_3sao=$comment->demluotdanhgia_3sao($id);
    		$demluotdanhgia_4sao=$comment->demluotdanhgia_4sao($id);
    		$demluotdanhgia_5sao=$comment->demluotdanhgia_5sao($id);
    		$demluotdanhgia_cohinhanh=$comment->demluotdanhgia_coanh($id);
    		if ($get_product_details) {
    			while ($result_details = $get_product_details->fetch_assoc()) {
    				# code...
    			
    		 ?>
				<div class="cont-desc span_1_of_2" style="border: 5px solid #f09630; background: white;">				
					<div class="grid images_3_of_2">
						<div class="img-container2">
						<img style="height: 400px;"src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" /></div>
					</div>
				<div class="desc span_3_of_2" >

					<h2 ><?php echo $result_details['productName'] ?> </h2>
					<p style="color: black;">
						<span style="float: left;">
								<?php
									$kiemtra=$comment->kiemtra($id);
									
									
									if ($kiemtra > 0) {
										$tbsao = $product->tbsao($id);
										$result_tbsao = $tbsao->fetch_assoc();
										
										if($result_tbsao['slsao'] == 1){
										# code...
									
								?>
									<label class="star star-5" for="star-5"  ></label>
								    <label class="star star-4" for="star-4"  ></label>
								    <label class="star star-3" for="star-3" ></label>
								    <label class="star star-2" for="star-2" ></label>
								    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label>

								    <?php
								    	}elseif($result_tbsao['slsao'] == 2){
								    ?>
								    	<label class="star star-5" for="star-5"  ></label>
									    <label class="star star-4" for="star-4"  ></label>
									    <label class="star star-3" for="star-3" ></label>
									    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
									    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label>
									<?php
								    	}elseif($result_tbsao['slsao'] == 3){
								    ?>
								    	<label class="star star-5" for="star-5"  ></label>
									    <label class="star star-4" for="star-4"  ></label>
									    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
									    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
									    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label>
									<?php
								    	}elseif($result_tbsao['slsao'] == 4){
								    ?>
								    	<label class="star star-5" for="star-5"  ></label>
									    <label class="star star-4" for="star-4"  style="color: #ffcc00; "></label>
									    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
									    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
									    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label>

									<?php
								    	}elseif($result_tbsao['slsao'] == 5){
								    ?>
								    	<label class="star star-5" for="star-5"  style="color: #ffcc00; "></label>
									    <label class="star star-4" for="star-4" style="color: #ffcc00; " ></label>
									    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
									    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
									    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label>
									<?php
								    	}elseif($result_tbsao['slsao'] == 0){
								    ?>
								    	<label class="star star-5" for="star-5"  ></label>
									    <label class="star star-4" for="star-4"  ></label>
									    <label class="star star-3" for="star-3" ></label>
									    <label class="star star-2" for="star-2" ></label>
									    <label class="star star-1" for="star-1"></label>
								    <?php

										}
										

									}
									else{
										
									?>
									<p>Bài viết chưa có đánh giá</p>
									<?php
										}
									?>
							
								</span>
								<span style="font-size: 14px;">
									<?php
								echo $demluotdanhgia.' Đánh Giá';
								?>
								</span>
								<span style="font-size: 14px;"> || <?php
									$soluongdaban=$comment->dabansanpham($id);
									$sl=$soluongdaban->fetch_assoc();

									echo  $sl['product_soldout'].' Đã Bán';

								?></span>
						
							</p>

							
					<div class="price" >
						<p style="background: #e1e9fa;" ><span ><?php echo '<sup>đ</sup>'. $fm->format_currency($result_details['price']) ?></span></p>
						<!-- <p>Category: <span><?php echo $result_details['catName'] ?></span></p>
						<p>Brand:<span><?php echo $result_details['brandName'] ?></span></p> -->
					</div>
				<div class="add-cart">
				
					<form action="" method="post">
						<label style=" color: #a4a9b3;">Số lượng: </label>
						<input type="number" class="buyfield" name="quantity" value="1" min="1" />&nbsp;&nbsp;&nbsp;
						<label style=" color: #a4a9b3;">
							<?php
								$product_featheread = $product->show_product_id($id);
								$result = $product_featheread->fetch_assoc();
								echo $result['product_remain'].' sản phẩm có sẵn';
							?>
						</label>
						<br>
						<br>
						
					
					<br>
					<div>
						<span >
							<i class="material-icons" style="font-size:30px; color: red;">airport_shuttle</i>
						</span>
						<span><b>Đảm bảo giao hàng: </b></span>
						&nbsp;&nbsp;&nbsp;
						<span style=" color: #a4a9b3;">3 Ngày trả hàng/ Hoàn tiền</span>
					</div>
					<br>
					<div>
						<i class="material-icons" style="font-size:30px;color: #5e91f7;">featured_play_list</i>
						<span><b>Phí vận chuyển:  </b></span>
						&nbsp;&nbsp;&nbsp;
						<span style=" color: black;font-size: 15px;">
							<sup>đ</sup>30000
						</span>
					</div>
					<br>
					
					<input  type="submit" class="buysubmit" name="submit" value="Thêm vào giỏ hàng" style="background: #56aed6;" />
					</form>

						<?php 
							if(isset($insertCompare)) {
								echo $insertCompare;
							}
							 ?>
					 <?php 
						if (isset($AddtoCart)) {
							echo '<span style="color:red; font-size:18px;">Sản phẩm đã được bạn thêm vào giỏ hàng</span>';
						}
					 ?>	 
					 <?php 
						if (isset($insertCart)) {
							echo $insertCart;
						}
					 ?>	 

				</div>
				<!-- so sánh sản phẩm -->
				<div class="add-cart">
					<div class="button_details">
					
					</div>
					<div class="clear"></div>
				</div>
			</div>
			
					<div>&nbsp &nbsp</div>
					
			<div class="product-desc">
			<h2 style="border-radius: 10px; border: 2px solid white; background: #e1e9fa;; color: black;">Chi tiết sản phẩm</h2>
			<p><?php echo $result_details['product_desc'] ?></p>
	    </div>

		<?php 
		}
    		}
		 ?>		
	</div>
		
		<div style="float: right;">
 			<?php 
	      	$product_featheread = $product->product_brand($brand);
	      	if($product_featheread){
	      		while ($result = $product_featheread->fetch_assoc()) {
	      			      	
	      	 ?>
	      	 <table>
				<div class="grid_1_of_4 images_1_of_4" style=" height: 200px; width: 400px;">
					
					 <a href="details.php?proid=<?php echo $result['productId'] ?>&brand=<?php echo $result['catId'] ?>"><img style="height: 150px; " src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <!-- <p><?php echo $fm->textShorten($result['product_desc'], 50) ?></p> -->
					 
				    <!--  <div class="button" ><span><a  href="details.php?proid=<?php echo $result['productId'] ?>" class="details" style="background: #7299e8; color: white;" >Chi tiết</a></span></div> -->
				</div>
				<?php 
				}
				}
				 ?>
			</table>
 		</div>	
 	</div>
 		
 	</div>
 	<div class="comment">
 		
			<?php
		    // gọi class category
		    
		    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment'])){
		        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
		        $comment_us = $_POST['txtcomment'];
		        $sao=$_POST['star'];
		        $insertcomment = $comment -> insert_comment($comment_us,$customer_id, $id,$_FILES,$sao);
		        if ($insertcomment) {
		        	
		        	# code...
		        }
		        else
		        {
		        	echo "<script>alert('bl thành công');</script>";
		        }

		       // hàm check catName khi submit lên
		    }
		  	?>

		 <div style="background: #e1e9fa;height: 125px; border-radius: 10px;" >
		 	<span>
		 		<form method="post" >
		 			<br>
		 			<?php 
		 					if ($kiemtra>0) {
		 						
		 					
		 			?>
		 			<span>
		 				<p style=" color: #e06641;"> 
		 					<span style="font-size: 30px;">
		 						<?php echo $result_tbsao['slsao'] ?>
		 					</span>
		 					<span style="font-size: 20px;"> trên 5</span>
		 				</p>
		 			</span>
		 			<?php
		 					}else{
		 						echo "";
		 					}
		 			?>
		 			<span style="float: left;">
								<?php
									$kiemtra=$comment->kiemtra($id);
									
									
									if ($kiemtra > 0) {
										$tbsao = $product->tbsao($id);
										$result_tbsao = $tbsao->fetch_assoc();
										
										if($result_tbsao['slsao'] == 1){
										# code...
									
								?>

									<label class="star star-5" for="star-5"  ></label>
								    <label class="star star-4" for="star-4"  ></label>
								    <label class="star star-3" for="star-3" ></label>
								    <label class="star star-2" for="star-2" ></label>
								    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label>

								    <?php
								    	}elseif($result_tbsao['slsao'] == 2){
								    ?>
								    	<label class="star star-5" for="star-5"  ></label>
									    <label class="star star-4" for="star-4"  ></label>
									    <label class="star star-3" for="star-3" ></label>
									    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
									    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label>
									<?php
								    	}elseif($result_tbsao['slsao'] == 3){
								    ?>
								    	<label class="star star-5" for="star-5"  ></label>
									    <label class="star star-4" for="star-4"  ></label>
									    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
									    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
									    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label>
									<?php
								    	}elseif($result_tbsao['slsao'] == 4){
								    ?>
								    	<label class="star star-5" for="star-5"  ></label>
									    <label class="star star-4" for="star-4"  style="color: #ffcc00; "></label>
									    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
									    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
									    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label>

									<?php
								    	}elseif($result_tbsao['slsao'] == 5){
								    ?>
								    	<label class="star star-5" for="star-5"  style="color: #ffcc00; "></label>
									    <label class="star star-4" for="star-4" style="color: #ffcc00; " ></label>
									    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
									    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
									    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label>
									<?php
								    	}elseif($result_tbsao['slsao'] == 0){
								    ?>
								    	<label class="star star-5" for="star-5"  ></label>
									    <label class="star star-4" for="star-4"  ></label>
									    <label class="star star-3" for="star-3" ></label>
									    <label class="star star-2" for="star-2" ></label>
									    <label class="star star-1" for="star-1"></label>
								    <?php

										}
										

									}
									else{
										
									?>
									<p>Bài viết chưa có đánh giá</p>
									<?php
										}
									?>


							
								</span>



		 			<input style="background: white; border-radius: 2px; width: 150px; height: 40px;" type="submit" name="tatca" value="Tất cả bình luận (<?php echo $demluotdanhgia?>)">

		 			<input style="border-radius: 2px; background: white; width: 150px; height: 40px;" type="submit" name="motsao" value="1 sao (<?php echo $demluotdanhgia_1sao?>) " >
		 			<input style="background: white; border-radius: 2px; width: 150px; height: 40px;" type="submit" name="haisao" value="2 sao (<?php echo $demluotdanhgia_2sao?>)">
		 			<input style="background: white; border-radius: 2px;width: 150px; height: 40px;" type="submit" name="basao" value="3 sao (<?php echo $demluotdanhgia_3sao?>)">
		 			<input style="background: white; border-radius: 2px;width: 150px; height: 40px;" type="submit" name="bonsao" value="4 sao (<?php echo $demluotdanhgia_4sao?>)">
		 			<input style="background: white; border-radius: 2px;width: 150px; height: 40px;" type="submit" name="namsao" value="5 sao (<?php echo $demluotdanhgia_5sao?>)">
		 			<input style="background: white; border-radius: 2px;width: 150px; height: 40px;" type="submit" name="cohinhanh" value="Có hình ảnh (<?php echo $demluotdanhgia_cohinhanh?>)">
		 		</form>
		 		
		 	</span>
		 </div>
 		<h3 style="background: #e1e9fa; color: black; border-radius: 5px;">Comment</h3>
 		<div class="hiencoment" >
 			<?php 
 				if(isset($_POST['tatca']))
 				{
					$show_comment = $comment -> show_comment($id);
					if($show_comment){
						$i = 0;
							while($result = $show_comment -> fetch_assoc()){
								$i++;
								
						?>
						<div style="border: 1px solid white; border-radius: 10px;">

							<table id="table" >
								
								
								<tr>
									
									<td style="color: white; font-weight: bold;"><img style="width: 50px; height: 50px;  border: 1px #d4d4d4 solid;padding: 7px;border-radius:50%;-moz-border-radius:50%; -webkit-border-radius:50%;" src="images/<?php echo $result['image'] ?>" alt="" /> <?php echo $result['name'];?> </td>
									
									<td></td>

									
									<td style="color: white;font-style: oblique; font-size: 10px;"><?php echo $result['ngaybl'];?></td>
								</tr>
								<tr>
									<?php 	
									if($result['sao']=='2'){
									?>
										<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" ></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									<?php }
										elseif($result['sao']=='1')
										{
									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" ></label>
					                    <label class="star star-2" for="star-2" ></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>

									 <?php
										}elseif($result['sao']=='3'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									<?php
										}elseif($result['sao']=='4'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"   style="color: #ffcc00; "></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									 <?php
										}elseif($result['sao']=='5'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"   style="color: #ffcc00; "></label>
					                    <label class="star star-4" for="star-4"   style="color: #ffcc00; "></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									 <?php
										}else{

									 ?>
									 	<td>
									 		<label class="star star-5" for="star-5" ></label>
						                    <label class="star star-4" for="star-4"></label>
						                    <label class="star star-3" for="star-3" ></label>
						                    <label class="star star-2" for="star-2" ></label>
						                    <label class="star star-1" for="star-1" ></label>
									 	</td>

					                <?php
					                	}
					                ?>

								</tr>

								<tr>
									<td style="color: white;"><?php echo $result['comment'];?></td>
								</tr>
								<tr >
									<?php 
										$anh=$result['image_cm'];
										if (!empty($anh)) {
									 ?>

										<td><img style="width: 200px; height: 100px; border-radius: 10px;" src="<?php echo $result['image_cm'] ?>" /></td>

									 <?php 
									}else{
									  ?>
									  
									<td></td>

									<?php 
									}
									 ?>
										
									
								</tr>
								
								<tr>
									<td><hr></td>
								</tr>
								
						
							</table>

							
						<?php 
							}
						}
					}elseif(isset($_POST['motsao'])){
						$show_comment = $comment -> show_comment_1sao($id);
						if($show_comment){
						$i = 0;
							while($result = $show_comment -> fetch_assoc()){
							$i++;			
				?>
					<table id="table" >
								
								<tr>
									
									<td style="color: white; font-weight: bold;"><img style="width: 50px; height: 50px;  border: 1px #d4d4d4 solid;padding: 7px;border-radius:50%;-moz-border-radius:50%; -webkit-border-radius:50%;" src="images/<?php echo $result['image'] ?>" alt="" /> <?php echo $result['name'];?> </td>
									
									<td></td>

									
									<td style="color: white;font-style: oblique; font-size: 10px;"><?php echo $result['ngaybl'];?></td>
								</tr>
								<tr>
									<?php 	
									if($result['sao']=='2'){
									?>
										<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" ></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									<?php }
										elseif($result['sao']=='1')
										{
									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" ></label>
					                    <label class="star star-2" for="star-2" ></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>

									 <?php
										}elseif($result['sao']=='3'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									<?php
										}elseif($result['sao']=='4'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"   style="color: #ffcc00; "></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									 <?php
										}elseif($result['sao']=='5'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"   style="color: #ffcc00; "></label>
					                    <label class="star star-4" for="star-4"   style="color: #ffcc00; "></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									 <?php
										}else{

									 ?>
									 	<td>
									 		<label class="star star-5" for="star-5" ></label>
						                    <label class="star star-4" for="star-4"></label>
						                    <label class="star star-3" for="star-3" ></label>
						                    <label class="star star-2" for="star-2" ></label>
						                    <label class="star star-1" for="star-1" ></label>
									 	</td>

					                <?php
					                	}
					                ?>

								</tr>

								<tr>
									<td style="color: white;"><?php echo $result['comment'];?></td>
								</tr>
								<tr >
									<?php 
										$anh=$result['image_cm'];
										if (!empty($anh)) {
									 ?>

										<td><img style="width: 200px; height: 100px; border-radius: 10px;" src="<?php echo $result['image_cm'] ?>" /></td>

									 <?php 
									}else{
									  ?>
									  
									<td></td>

									<?php 
									}
									 ?>
										
									
								</tr>
								
								<tr>
									<td><hr></td>
								</tr>
								
						
							</table>



				<?php
					}	
				}

			}elseif(isset($_POST['haisao']))
				{
					$show_comment = $comment -> show_comment_2sao($id);
					if($show_comment){
						$i = 0;
							while($result = $show_comment -> fetch_assoc()){
								$i++;
			
			?>
				<table id="table" >
								
								<tr>
									
									<td style="color: white; font-weight: bold;"><img style="width: 50px; height: 50px;  border: 1px #d4d4d4 solid;padding: 7px;border-radius:50%;-moz-border-radius:50%; -webkit-border-radius:50%;" src="images/<?php echo $result['image'] ?>" alt="" /> <?php echo $result['name'];?> </td>
									
									<td></td>

									
									<td style="color: white;font-style: oblique; font-size: 10px;"><?php echo $result['ngaybl'];?></td>
								</tr>
								<tr>
									<?php 	
									if($result['sao']=='2'){
									?>
										<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" ></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									<?php }
										elseif($result['sao']=='1')
										{
									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" ></label>
					                    <label class="star star-2" for="star-2" ></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>

									 <?php
										}elseif($result['sao']=='3'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									<?php
										}elseif($result['sao']=='4'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"   style="color: #ffcc00; "></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									 <?php
										}elseif($result['sao']=='5'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"   style="color: #ffcc00; "></label>
					                    <label class="star star-4" for="star-4"   style="color: #ffcc00; "></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									 <?php
										}else{

									 ?>
									 	<td>
									 		<label class="star star-5" for="star-5" ></label>
						                    <label class="star star-4" for="star-4"></label>
						                    <label class="star star-3" for="star-3" ></label>
						                    <label class="star star-2" for="star-2" ></label>
						                    <label class="star star-1" for="star-1" ></label>
									 	</td>

					                <?php
					                	}
					                ?>

								</tr>

								<tr>
									<td style="color: white;"><?php echo $result['comment'];?></td>
								</tr>
								<tr >
									<?php 
										$anh=$result['image_cm'];
										if (!empty($anh)) {
									 ?>

										<td><img style="width: 200px; height: 100px; border-radius: 10px;" src="<?php echo $result['image_cm'] ?>" /></td>

									 <?php 
									}else{
									  ?>
									  
									<td></td>

									<?php 
									}
									 ?>
										
									
								</tr>
								
								<tr>
									<td><hr></td>
								</tr>
								
						
							</table>


			<?php
				}
			}
		}elseif(isset($_POST['basao']))
			{
				$show_comment = $comment -> show_comment_3sao($id);
					if($show_comment){
						$i = 0;
							while($result = $show_comment -> fetch_assoc()){
								$i++;
		?>
				<table id="table" >
								
								<tr>
									
									<td style="color: white; font-weight: bold;"><img style="width: 50px; height: 50px;  border: 1px #d4d4d4 solid;padding: 7px;border-radius:50%;-moz-border-radius:50%; -webkit-border-radius:50%;" src="images/<?php echo $result['image'] ?>" alt="" /> <?php echo $result['name'];?> </td>
									
									<td></td>

									
									<td style="color: white;font-style: oblique; font-size: 10px;"><?php echo $result['ngaybl'];?></td>
								</tr>
								<tr>
									<?php 	
									if($result['sao']=='2'){
									?>
										<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" ></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									<?php }
										elseif($result['sao']=='1')
										{
									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" ></label>
					                    <label class="star star-2" for="star-2" ></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>

									 <?php
										}elseif($result['sao']=='3'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									<?php
										}elseif($result['sao']=='4'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"   style="color: #ffcc00; "></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									 <?php
										}elseif($result['sao']=='5'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"   style="color: #ffcc00; "></label>
					                    <label class="star star-4" for="star-4"   style="color: #ffcc00; "></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									 <?php
										}else{

									 ?>
									 	<td>
									 		<label class="star star-5" for="star-5" ></label>
						                    <label class="star star-4" for="star-4"></label>
						                    <label class="star star-3" for="star-3" ></label>
						                    <label class="star star-2" for="star-2" ></label>
						                    <label class="star star-1" for="star-1" ></label>
									 	</td>

					                <?php
					                	}
					                ?>

								</tr>

								<tr>
									<td style="color: white;"><?php echo $result['comment'];?></td>
								</tr>
								<tr >
									<?php 
										$anh=$result['image_cm'];
										if (!empty($anh)) {
									 ?>

										<td><img style="width: 200px; height: 100px; border-radius: 10px;" src="<?php echo $result['image_cm'] ?>" /></td>

									 <?php 
									}else{
									  ?>
									  
									<td></td>

									<?php 
									}
									 ?>
										
									
								</tr>
								
								<tr>
									<td><hr></td>
								</tr>
								
						
							</table>

		<?php
			}
		}
		}elseif (isset($_POST['bonsao'])) 
			{
					$show_comment = $comment -> show_comment_4sao($id);
					if($show_comment){
						$i = 0;
							while($result = $show_comment -> fetch_assoc()){
								$i++;
	
	?>
	<table id="table" >
								
								<tr>
									
									<td style="color: white; font-weight: bold;"><img style="width: 50px; height: 50px;  border: 1px #d4d4d4 solid;padding: 7px;border-radius:50%;-moz-border-radius:50%; -webkit-border-radius:50%;" src="images/<?php echo $result['image'] ?>" alt="" /> <?php echo $result['name'];?> </td>
									
									<td></td>

									
									<td style="color: white;font-style: oblique; font-size: 10px;"><?php echo $result['ngaybl'];?></td>
								</tr>
								<tr>
									<?php 	
									if($result['sao']=='2'){
									?>
										<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" ></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									<?php }
										elseif($result['sao']=='1')
										{
									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" ></label>
					                    <label class="star star-2" for="star-2" ></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>

									 <?php
										}elseif($result['sao']=='3'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									<?php
										}elseif($result['sao']=='4'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"   style="color: #ffcc00; "></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									 <?php
										}elseif($result['sao']=='5'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"   style="color: #ffcc00; "></label>
					                    <label class="star star-4" for="star-4"   style="color: #ffcc00; "></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									 <?php
										}else{

									 ?>
									 	<td>
									 		<label class="star star-5" for="star-5" ></label>
						                    <label class="star star-4" for="star-4"></label>
						                    <label class="star star-3" for="star-3" ></label>
						                    <label class="star star-2" for="star-2" ></label>
						                    <label class="star star-1" for="star-1" ></label>
									 	</td>

					                <?php
					                	}
					                ?>

								</tr>

								<tr>
									<td style="color: white;"><?php echo $result['comment'];?></td>
								</tr>
								<tr >
									<?php 
										$anh=$result['image_cm'];
										if (!empty($anh)) {
									 ?>

										<td><img style="width: 200px; height: 100px; border-radius: 10px;" src="<?php echo $result['image_cm'] ?>" /></td>

									 <?php 
									}else{
									  ?>
									  
									<td></td>

									<?php 
									}
									 ?>
										
									
								</tr>
								
								<tr>
									<td><hr></td>
								</tr>
								
						
							</table>

	<?php
		}
	}
}elseif(isset($_POST['namsao'])){

			$show_comment = $comment -> show_comment_5sao($id);
					if($show_comment){
						$i = 0;
							while($result = $show_comment -> fetch_assoc()){
								$i++;
	?>
			<table id="table" >
								
								<tr>
									
									<td style="color: white; font-weight: bold;"><img style="width: 50px; height: 50px;  border: 1px #d4d4d4 solid;padding: 7px;border-radius:50%;-moz-border-radius:50%; -webkit-border-radius:50%;" src="images/<?php echo $result['image'] ?>" alt="" /> <?php echo $result['name'];?> </td>
									
									<td></td>

									
									<td style="color: white;font-style: oblique; font-size: 10px;"><?php echo $result['ngaybl'];?></td>
								</tr>
								<tr>
									<?php 	
									if($result['sao']=='2'){
									?>
										<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" ></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									<?php }
										elseif($result['sao']=='1')
										{
									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" ></label>
					                    <label class="star star-2" for="star-2" ></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>

									 <?php
										}elseif($result['sao']=='3'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									<?php
										}elseif($result['sao']=='4'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"   style="color: #ffcc00; "></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									 <?php
										}elseif($result['sao']=='5'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"   style="color: #ffcc00; "></label>
					                    <label class="star star-4" for="star-4"   style="color: #ffcc00; "></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									 <?php
										}else{

									 ?>
									 	<td>
									 		<label class="star star-5" for="star-5" ></label>
						                    <label class="star star-4" for="star-4"></label>
						                    <label class="star star-3" for="star-3" ></label>
						                    <label class="star star-2" for="star-2" ></label>
						                    <label class="star star-1" for="star-1" ></label>
									 	</td>

					                <?php
					                	}
					                ?>

								</tr>

								<tr>
									<td style="color: white;"><?php echo $result['comment'];?></td>
								</tr>
								<tr >
									<?php 
										$anh=$result['image_cm'];
										if (!empty($anh)) {
									 ?>

										<td><img style="width: 200px; height: 100px; border-radius: 10px;" src="<?php echo $result['image_cm'] ?>" /></td>

									 <?php 
									}else{
									  ?>
									  
									<td></td>

									<?php 
									}
									 ?>
										
									
								</tr>
								
								<tr>
									<td><hr></td>
								</tr>
								
						
							</table>

	<?php
		}
	}

}else{
	$show_comment = $comment -> show_comment_coanh($id);
					if($show_comment){
						$i = 0;
							while($result = $show_comment -> fetch_assoc()){
								$i++;

?>
			<table id="table" >
								
								<tr>
									
									<td style="color: white; font-weight: bold;"><img style="width: 50px; height: 50px;  border: 1px #d4d4d4 solid;padding: 7px;border-radius:50%;-moz-border-radius:50%; -webkit-border-radius:50%;" src="images/<?php echo $result['image'] ?>" alt="" /> <?php echo $result['name'];?> </td>
									
									<td></td>

									
									<td style="color: white;font-style: oblique; font-size: 10px;"><?php echo $result['ngaybl'];?></td>
								</tr>
								<tr>
									<?php 	
									if($result['sao']=='2'){
									?>
										<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" ></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									<?php }
										elseif($result['sao']=='1')
										{
									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" ></label>
					                    <label class="star star-2" for="star-2" ></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>

									 <?php
										}elseif($result['sao']=='3'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"  ></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									<?php
										}elseif($result['sao']=='4'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"  ></label>
					                    <label class="star star-4" for="star-4"   style="color: #ffcc00; "></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									 <?php
										}elseif($result['sao']=='5'){

									 ?>
									 	<td>
										<label class="star star-5" for="star-5"   style="color: #ffcc00; "></label>
					                    <label class="star star-4" for="star-4"   style="color: #ffcc00; "></label>
					                    <label class="star star-3" for="star-3" style="color: #ffcc00; "></label>
					                    <label class="star star-2" for="star-2" style="color: #ffcc00; "></label>
					                    <label class="star star-1" for="star-1" style="color: #ffcc00; "></label></td>
									 <?php
										}else{

									 ?>
									 	<td>
									 		<label class="star star-5" for="star-5" ></label>
						                    <label class="star star-4" for="star-4"></label>
						                    <label class="star star-3" for="star-3" ></label>
						                    <label class="star star-2" for="star-2" ></label>
						                    <label class="star star-1" for="star-1" ></label>
									 	</td>

					                <?php
					                	}
					                ?>

								</tr>

								<tr>
									<td style="color: white;"><?php echo $result['comment'];?></td>
								</tr>
								<tr >
									<?php 
										$anh=$result['image_cm'];
										if (!empty($anh)) {
									 ?>

										<td><img style="width: 200px; height: 100px; border-radius: 10px;" src="<?php echo $result['image_cm'] ?>" /></td>

									 <?php 
									}else{
									  ?>
									  
									<td></td>

									<?php 
									}
									 ?>
										
									
								</tr>
								
								<tr>
									<td><hr></td>
								</tr>
								
				</table>

<?php

	}
	}
}
?>
					
				
 		</div>

 		<?php 

			$login_check = Session::get('customer_login');
			if ($login_check==false) {
				echo "";
				
			}else{

		 ?>

 		
 		 <div id="buttonthem">
	        <a class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>Comment</a>
	     </div>
	     <?php
	 }
	 ?>
	     <br>
 		<div id="formthem" style="border-radius: 10px; border: 2px solid #7babc9;">
         <form method="post" enctype="multipart/form-data">
         	
         	<div class="stars">
				  
				    <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
				    <label class="star star-5" for="star-5"></label>
				    <input class="star star-4" id="star-4" type="radio" name="star" value="4" />
				    <label class="star star-4" for="star-4"></label>
				    <input class="star star-3" id="star-3" type="radio" name="star" value="3" />
				    <label class="star star-3" for="star-3"></label>
				    <input class="star star-2" id="star-2" type="radio" name="star" value="2" />
				    <label class="star star-2" for="star-2"></label>
				    <input class="star star-1" id="star-1" type="radio" name="star" value="1" />
				    <label class="star star-1" for="star-1"></label>
				   <input class="star star-1" id="star-6" type="radio" name="star" value="0"  checked />
				  
			</div>
			<div></div>
	 		<span><input style="border-radius: 5px; height: 50px; width: 500px;" type="text" name="txtcomment">
	 			<input type="file" name="image">
	 		</span>
	 		<br>
	 		
	 		
	 		<div>
	 		<input type="submit" name="comment" value="Comment" style="background: #8db9eb; border-radius: 10px;"></div>
 		</form>
 		</div>
 	</div>
 	<hr>
 	
 <script>
	$(document).ready(function(){
	    $("#formthem").hide();
	    $("#buttonthem").click(function(){
	        $("#formthem").toggle(1000);
	    });
	});
</script>
<style type="text/css">
div.stars {
  width: 200px;
  display: inline-block;
}
 
input.star { display: none; }
 
label.star {
  float: right;
  padding: 4px;
  font-size: 20px;
  color: #444;
  transition: all .2s;
}
 
input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}
 
input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}
 
input.star-1:checked ~ label.star:before { color: #F62; }
 
label.star:hover { transform: rotate(-15deg) scale(1.3); }
 
label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
</style>

 <?php 

	$login_check = Session::get('customer_login');

	
	if(isset($_POST['comment'])  )
	{
		
			if ($login_check==false) {
				
				 echo "<script>window.open('login.php','_self')</script>";
			}
		
	}

 ?>
