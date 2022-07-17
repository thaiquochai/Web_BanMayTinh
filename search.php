<?php 
	include 'inc/header.php';
 ?>	
 <div class="section group" style="background: #d5e6ed; border-radius: 10px;">
 		<h3 style="background: #527585; color: white; border-radius: 10px; height: 50px;">Sản phẩm cần tìm</h3>
	      	<?php 
	      	$txttim=$_POST['txttim'];
	      	$product_featheread = $product->search_product($txttim);
	      	if($product_featheread){
	      		while ($result = $product_featheread->fetch_assoc()) {
	      			      	
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4" style="background: white; box-shadow: 3px 10px #7aa4de; border-radius: 5px; height: 350px; width: 250px;">
					 <a href="details.php?proid=<?php echo $result['productId'] ?>&brand=<?php echo $result['catId'] ?>"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					<!--  <p><?php echo $fm->textShorten($result['product_desc'], 50) ?></p> -->
					 <p><span class="price"><?php echo $fm->format_currency($result['price'])." "."VND" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php 
				}
				}
				 ?>
</div>

 <?php 
	include 'inc/footer.php';
 ?>