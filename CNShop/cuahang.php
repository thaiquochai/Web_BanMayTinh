<?php 
	include 'inc/header.php';
	include 'inc/slider.php';
 ?>
  <?php include 'classes/cuahang.php';  
$cuahang = new cuahang(); ?>
<?php 
	if(!isset($_GET['idcuahang']) || $_GET['idcuahang'] == NULL){
        echo "<script> window.location = '404.php' </script>";
        
    }else {
        $id = $_GET['idcuahang'];
       
    }
    
	
 ?>
 <div class="main">
    <div class="content" style="background: #d5e6ed;">
    	<div class="section group">
	      	<?php 
	      	$product_featheread = $cuahang->getcuahangbyId($id);
	      	if($product_featheread){
	      		while ($result = $product_featheread->fetch_assoc()) {
	      			      	
	      	 ?>
				
					<div class="img-container2">
					 
					 <h2><?php echo $result['tencuahang'] ?></h2>
					<!--  <p><?php echo $fm->textShorten($result_new['product_desc'], 50) ?></p> -->
					
				  <!--    <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId'] ?>" class="details"   style="background: #7299e8; color: white;" >Chi tiết</a></span></div> -->
				</div>
				<?php 
				}
				}
				 ?>
			
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

