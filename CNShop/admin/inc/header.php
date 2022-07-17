<?php 
    include '../lib/session.php';
     Session::checkSession();
 ?>

<?php
  // header("Cache-Control: no-cache, must-revalidate");
  // header("Pragma: no-cache"); 
  // header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // header("Cache-Control: max-age=2592000");
?>
<?php 
    include '../classes/admin.php';  
    $ad = new Admin(); 
   
?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>

</head>
<body style="background: #050505;">
    <div class="container_12" style="background: #050505;">
        <div class="grid_12 header-repeat" style="background: #0a0a0a;">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="img/hinh1.png" alt="Logo" style="width: 130px; height: 90px; " />
				</div>
				<div class="floatleft middle">
					<h1 style="text-shadow: 5px 10px #870909;">DichVu SHOP</h1>
					<p>www.dichvu.com</p>
				</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/logo.png" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <?php 
                                $show_admin = $ad -> show_admin();
                                $result = $show_admin -> fetch_assoc();
                                
                             ?>   
                            <li><a ><?php echo $result['adminName']; ?></a>
                                
                            </li>
                            <?php 
                                if(isset($_GET['action']) && $_GET['action']=='logout'){
                                    Session::destroy();
                                }
                             ?>

                            <li><a href="?action=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear" >
        </div>
        <div class="grid_12" style="background: #0a0a0a;">
            <ul class="nav main" style="background: #0a0a0a;">
                <li class="ic-dashboard"><a href="index.php"><span>Trang quản trị</span></a> </li>
                <li class="ic-form-style"><a href="thongtinnguoidung.php"><span>Thông tin người dùng</span></a></li>
				<!-- <li class="ic-typography"><a href="changepassword.php"><span>Thay đổi mật khẩu</span></a></li> -->
				<li class="ic-grid-tables"><a href="inbox.php"><span>Đơn hàng</span></a></li>
                <li class="ic-charts"><a href="../index.php"><span>Website</span></a></li>
                <li class="ic-typography"><a href="contant_us.php"><span>Help</span></a></li>
                
            </ul>
        </div>
        <div class="clear">
        </div>
    