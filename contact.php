<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
 <?php include 'classes/contact_us.php';  ?>
<?php
    // gọi class category
    $contact = new Contact_us(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone=$_POST['dt'];
        $sub=$_POST['sub'];

        $insertcontact = $contact -> insert_contact($name,$email,$phone,$sub);

         // hàm check catName khi submit lên
    }
  ?> 

 <div class="main">
    <div class="content" style="background: #19323d; color: white;">
    	<div class="support">
  			<div class="support_desc">
  				
  			</div>
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2 style="color: white;">Mesenger</h2>

				  		<div class="block copyblock"> 
				  			<?php 
			                    if(isset($insertcontact)){
			                        echo $insertcontact;
			                    }
			                 ?>
					    <form action="contact.php" method="post">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input type="text" value="" name="name" required></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text" value="" name="email" required></span>
						    </div>
						    <div>
						     	<span><label>MOBILE.NO</label></span>
						    	<span><input type="text" value="" name="dt" required></span>
						    </div>
						    <div>
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea name="sub"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" value="SUBMIT" name="submit"></span>
						  </div>
					    </form>
					</div>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2 style="color: white;">Thông tin liên hệ :</h2>
						   		<p style="color: white;">An Giang - Long Xuyên</p>
				   		<p style="color: white;">Phone:0867757702</p>
				 	 	<p style="color: white;">Email: <span style="color: white;">dtpthanh_19th2@student.agu.edu.vn</span></p>
				   		<p style="color: white;"> Follow on: <a href="https://www.facebook.com/thanh3720/"><span style="color: white;">Facebook</span></a></p>
				   </div>
				 </div>
			  </div>    	
    </div>
 </div>

<?php 
	include 'inc/footer.php';
 ?>