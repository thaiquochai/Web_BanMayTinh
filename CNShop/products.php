<?php 
	include 'inc/header.php';
	include 'inc/slider.php';
 ?>
  <?php include 'classes/comment.php';  
$comment = new comment(); ?>
 <div class="main">
    <div class="content" style="background: #d5e6ed;">
    	<div class="section group">
	      	<?php 
	      	$product_featheread = $product->show_product();
	      	if($product_featheread){
	      		while ($result = $product_featheread->fetch_assoc()) {
	      			      	
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4" style="background: white; box-shadow: 3px 10px #7aa4de; border-radius: 5px; height: 350px; width: 250px;">
					<div class="img-container2">
					 <a href="details.php?proid=<?php echo $result['productId'] ?>&brand=<?php echo $result['catId'] ?>"><img style="height: 150px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a></div>
					 <h2><?php echo $result['productName'] ?></h2>
					<!--  <p><?php echo $fm->textShorten($result_new['product_desc'], 50) ?></p> -->
					 <p><span class="price" style="float: left;"><?php echo'<sup>đ</sup>' .$fm->format_currency($result['price']) ?></span>
					 	<span style="float: right;">
					 		<?php
					 				$id=$result['productId'];
					 				$soluongdaban=$comment->dabansanpham($id);
									$sl=$soluongdaban->fetch_assoc();

									echo  $sl['product_soldout'].' Đã Bán';
					 		?>
					 	</span>
					 </p>
				  <!--    <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId'] ?>" class="details"   style="background: #7299e8; color: white;" >Chi tiết</a></span></div> -->
				</div>
				<?php 
				}
				}
				 ?>
			</div>
	</div>

 </div>
 <style type="text/css">
	.img-container2{ 
 
	  height: auto; /** Chiều cao tự động **/ 
	  margin: 10px auto; /** Cách trên dưới 10px và nằm giữa **/ 
	  overflow: hidden; /** DÒNG BẮT BUỘC CÓ **/ 
	  position: relative; width: 200px; /** Chiều rộng vùng chứa **/ } 
	.img-container2 img { 
	 /** Hình ảnh rộng 100% so với vùng chứa **/ 
	 width: 200px;
	  transition: all 1s; /** Tạo độ mượt **/ } 
	  
	.img-container2:hover img { 
	  -webkit-transform: scale(1.2); transform: scale(1.2); }
</style>	
<?php 
	include 'inc/footer.php';
 ?>

