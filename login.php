<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
 <?php 
	// $login_check = Session::get('customer_login');
	// if ($login_check) {
	// 	header('Location: order.php'); 
	// }
 $login_check=Session::get('customer_login');
     if($login_check==true)
     {
        echo "<script>window.open('order.php','_self')</script>";
     }
?>

<?php
    // gọi class category
     
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertCustomer = $cs -> insert_customer($_POST); // hàm check catName khi submit lên
    }
 ?>
 <?php 
 	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $login_Customer = $cs -> login_customer($_POST); // hàm check catName khi submit lên
    }
 ?>
 <div class="main">
    <div class="content" style="background:#d5e6ed;">
    	 <div class="login_panel" style="text-align: center; background: white; float: none; width: 500px; margin: auto; ">
        	<h3 style="color: black;">Đăng nhập</h3>
        	<p>Mời nhập thông tin</p>
        	<?php 
    		if (isset($login_Customer)) {
    			echo $login_Customer;
    		}
    		 ?>
        	 <form method="post" action="" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input  name="email" id="user" type="text" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password"  id="password" type="password" class="form-control" placeholder="Password">
                </div>
               
                <div class="form-group">
                     <input class="btn btn-success px-5" type="submit" name="login" value="Login">
                </div>
                <div class="form-group">
                    <p>Don't have an account yet? <a href="dangki.php">Register now</a>.</p>
                    <p>Forgot your password? <a href="quenmk.php">Reset your password</a>.</p>
                </div>
            </form>
        </div>

    	 	
       <div class="clear"></div>
    </div>
 </div>


<?php 
	include 'inc/footer.php';
 ?>
