<?php 
	// gọi file adminlogin
	include '../classes/adminlogin.php';
 ?>
 <?php
 	// gọi class adminlogin
 	$class = new adminlogin(); 
 	if($_SERVER['REQUEST_METHOD'] == 'POST'){
 		// LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
 		$adminUser = $_POST['adminUser'];
 		$adminPass = md5($_POST['adminPass']);

 		$login_check = $class -> longin_admin($adminUser,$adminPass); // hàm check User and Pass khi submit lên

 	}
  ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container" style="float: none; width: 500px; ">
	<!-- <section id="content"> -->
		<form action="login.php" method="post" style="text-align: center; background: #93a3bd;  border-radius: 10px; height: 200px; box-shadow: 10px 7px #c1d0e8;">
			<h1>Admin Login</h1><br>
			<span><?php 
				if(isset($login_check)){
					echo $login_check;
				}
			 ?>  </span>
			<div >
				<input style="width: 350px; height: 30px; border-radius: 10px;" type="text" placeholder="Username" required="" name="adminUser"/>
			</div>
			<br>
			<div>
				<input style="width: 350px;height: 30px; border-radius: 10px;" type="password" placeholder="Password" required="" name="adminPass"/>
			</div>
			<br>
			<div>
				<input style="background: #5e7ca8; border-radius: 10px; width: 100px; color: white;" type="submit" value="Log in" />
			</div>
			<div><br></div>
		</form><!-- form -->
		<!-- button -->
	<!-- </section>content -->
</div><!-- container -->
</body>
</html>