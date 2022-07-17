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
	// if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
 //        echo "<script> window.location = '404.php' </script>";
        
 //    }else {
 //        $id = $_GET['proid']; // Lấy productid trên host
 //    }
    $id = Session::get('customer_id');
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $UpdateCustomers = $cs -> update_customers($_POST, $id,$_FILES); // hàm check catName khi submit lên
    } 
 ?>
 <div class="main">
    <div class="content" style="background: #d5e6ed;">
    	<div class="section group" style="border-radius: 10px; " >
    		<div class="content_top">
    		<div class="heading">
    		<h3 style="color: black;">Profile Customer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
        <form action="" method="post" enctype="multipart/form-data" style="border: 2px solid white; border-radius: 10px; ">
    	<table style="color: black; font-size: 15px; width: 500px;">
            <tr>
                <?php 
                if (isset($UpdateCustomers)) {
                    echo '<td colspan="3">'.$UpdateCustomers.'</td>';
                }
                 ?>
            </tr>

    		<?php 
    		$id = Session::get('customer_id');
    		$get_customers = $cs->show_customers($id);
    		if ($get_customers) {
    			while ($result = $get_customers->fetch_assoc()) {
    			
    		 ?>
            <tr>
                 <td><img style="width: 100px; height: 100px;  border: 1px #d4d4d4 solid;padding: 7px;border-radius:50%;-moz-border-radius:50%; -webkit-border-radius:50%;" src="images/<?php echo $result['image'] ?>" alt="" />
                <input name="image" type="file" /></td>
            </tr>
    		<tr>
    			<td> Name</td>
    		</tr>
            <tr>
                <td><input style="width: 1000px; border-radius: 10px; height: 40px;" type="text" name="name" value="<?php echo $result['name']; ?>"></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
    		<!-- <tr>
    			<td>City</td>
    			<td>:</td>
                <td><input type="text" name="name" value="<?php echo $result['city']; ?>"></td>
    			
    		</tr> -->
    		<tr>
    			<td>Phone</td>
    		</tr>
            <tr>
                <td><input style="width: 1000px; border-radius: 10px; height: 40px;" type="text" name="phone" value="<?php echo $result['phone']; ?>"></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
    		<!-- <tr>
    			<td>Country</td>
    			<td>:</td>
    			<td><?php echo $result['country']; ?></td>
    		</tr> -->
    		<tr>
    			<td>Zipcode</td>
    		</tr>
            <tr>
                 <td><input style="width: 1000px; border-radius: 10px; height: 40px;" type="text" name="zipcode" value="<?php echo $result['zipcode']; ?>"></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
    		<tr>
    			<td>Email</td>
    		</tr>
            <tr>
                 <td><input style="width: 1000px; border-radius: 10px; height: 40px;" type="text" name="email" value="<?php echo $result['email']; ?>"></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
    		<tr>
    			<td>Address</td>
    		</tr>
            <tr>
                 <td><input style="width: 1000px; border-radius: 10px; height: 40px;" type="text" name="address" value="<?php echo $result['address']; ?>"></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            
            <tr>
                <td><br></td>
            </tr>
            <tr >
                <td colspan="3"><input type="submit" name="save" value="Save" class="grey" style="width: 100px; height: 50px; background: blue; border-radius: 10px; float: none; color: white;"></td>
               
            </tr>
    		
    		<?php 
    		}
    		}
    		 ?>
    	</table>
        </form>

    	</div>	
 	</div>

<?php 
	include 'inc/footer.php';
 ?>