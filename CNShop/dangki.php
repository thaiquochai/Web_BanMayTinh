<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
 <?php 
	$login_check = Session::get('customer_login');
	if ($login_check) {
		echo "<script>window.open('products.php','_self')</script>";
		 
	}
?>

<?php
    // gọi class category
     
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertCustomer = $cs -> insert_customer($_POST,$_FILES); // hàm check catName khi submit lên
    }
 ?>
 <?php 
 	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $login_Customer = $cs -> login_customer($_POST); // hàm check catName khi submit lên
    }
 ?>
 <div class="main">
    <div class="content" style="background:#d5e6ed; height: 500px;">
    	 

    	<div class="register_account" style="text-align: center; background: white; float: none; width: 800px; margin: auto; height: 400px; ">
    		<h3 style="color: black;">Đăng ký tài khoản</h3>
    		<?php 
    		if (isset($insertCustomer)) {
    			echo $insertCustomer;
    		}
    		 ?>
    		<form action="" method="POST" enctype="multipart/form-data">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Nhập Name...">
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Nhập công ty..." >
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Nhập Zipcode...">
							</div>
							<div>
								<input type="text" name="email" placeholder="Nhập E-Mail...">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Nhập địa chỉ...">
						</div>
		    		<div>
						<?php
							include('inc/contry.php');
						?>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Nhập số điện thoại...">
		          </div>
				  
				  <div>
					<input type="password" name="password" placeholder="Nhập Password..." style=" width: 95%;height: 33px;margin-top: 7px;">
				</div>
				<br>
				<div><input name="image" type="file" placeholder="Chọn ảnh đại diện"/></div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search" style="float: none;"><div><input type="submit" name="submit" class="grey" value="Tạo tài khoản" style="
    background: #81a9c7; border-radius: 5px; "></div></div>
		    
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>


<?php 
	include 'inc/footer.php';
 ?>
