<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    include '../classes/brand.php';  
    $brand = new brand();
   
    // if(!isset($_GET['adminid']) || $_GET['adminid'] == NULL){
    //     //echo "<script> window.location = 'index.php' </script>";
        
    // }else {
    //     $id = $_GET['adminid']; // Lấy catid trên host
    // }
   
    
    
  ?>


        <div class="grid_10" >
            <div class="box round first grid" style="background: #98b2f5; box-shadow: 5px 7px white; border-radius: 5px;">

                <h2> Trang quản trị</h2>
                <div class="test" style="color: black; font-size: 20px;">  
                <marquee>             
                 <?php 
                 	$show_admin = $ad -> show_admin();
                 	$result = $show_admin -> fetch_assoc();
                 	echo "Chào mừng ". $result['adminName'] .' đến với CN Shop';
                 ?>     
               </marquee>
                </div>
                <hr style="background: white;">
               
                <div >
                  <span>
                    <a  href="changepassword.php?adminid=<?php echo $result['adminId']; ?>">
                  <button style="background: #074af5; border-radius: 10px; color: white;"> Đổi mật khẩu </button></a>
                  </span>
                  <span>
                      <a  href="adminlist.php?adminid=<?php echo $result['adminId']; ?>"><button style="background: #074af5; border-radius: 10px; color: white;"> Danh Sách Admin </button></a>
                  </span>
                  <span>
                      <a  href="thongketheongay.php"><button style="background: #074af5; border-radius: 10px; color: white;"> Thống Kê theo ngày </button></a>
                  </span>
                </div>


                <br>
                <span style="margin: 0 auto; color: black;">
                  
                  <button style="width: 300px; height: 150px; font-size: 30px; border-radius: 10px; box-shadow: 7px 7px #8183a6; background: #cca20c; font-family: Fantasy;" ><a href="brandlist.php" style="color: black;">
                    Brand
                    <br>
                    <?php
                      $dem=$brand->show_brand_dem();
                      echo $dem;
                    ?>
                    </a>
                  </button>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <button style="width: 300px; height: 150px; font-size: 30px; border-radius: 10px; box-shadow: 7px 7px #8183a6; background: #0775b5; font-family: Fantasy;">
                    <a href="catlist.php" style="color: black;">
                    Category
                    <br>
                    <?php
                      $dem=$brand->show_categy_dem();
                      echo $dem;
                    ?></a></button>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                  <button style="width: 300px; height: 150px; font-size: 30px; border-radius: 10px; box-shadow: 7px 7px #8183a6; background: #c70808; font-family: Fantasy;">
                    <a href="productlist.php" style="color: black;">
                    Product
                    <br>
                    <?php
                      $dem=$brand->show_product_dem();
                      echo $dem;
                    ?>
                  </a>
                  </button>
                   &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                  <button style="width: 300px; height: 150px; font-size: 30px; border-radius: 10px; box-shadow: 7px 7px #8183a6; background: #98bd06; font-family: Fantasy;">
                    <a href="thongtinnguoidung.php" style="color: black;">
                    Customer
                    <br>
                    <?php
                      $dem=$brand->show_customer_dem();
                      echo $dem;
                    ?>
                  </a>
                  </button>
                </span>
            </div>
        </div>

<?php include 'inc/footer.php';?>