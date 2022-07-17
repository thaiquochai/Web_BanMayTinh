<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';  ?>
<?php include '../classes/brand.php';  ?> 
<?php include '../classes/product.php';  ?>
<?php include '../classes/customer.php';  ?>
<?php
    // gọi class category
   $customer = new customer(); 
      if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertCustomer = $customer -> themnguoidung($_POST,$_FILES); // hàm check catName khi submit lên
    }
  ?>
<div class="grid_10">
    <div class="box round first grid" style="background: #98b2f5; box-shadow: 5px 7px white; border-radius: 5px;">
        <h2>Thêm người dùng</h2>
        <?php 
            if(isset($insertCustomer)){
                echo $insertCustomer;
            }
         ?>   
        <div class="block">

         <form action="customeradd.php" method="post" enctype="multipart/form-data">
            <table class="form">
                
              
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input name="name" type="text" placeholder="Nhập tên " class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>City</label>
                    </td>
                    <td>
                        <input name="city" type="text" placeholder="Nhập city" class="medium" />
                    </td>
                </tr>
                  <tr>
                    <td>
                        <label>Mã bưu điện</label>
                    </td>
                    <td>
                        <input name="zipcode" type="text" placeholder="Nhập mã bưu điện" class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input name="email" type="text" placeholder="Nhập email" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Address</label>
                    </td>
                    <td>
                        <input name="address" type="text" placeholder="Nhập address" class="medium" />
                    </td>
                </tr>
                
                 <tr>
                    <td>
                        <label>Country</label>
                    </td>
                    <td>
                        <div>
                        <?php
                            include('../inc/contry.php');
                        ?>
                 </div> 
                    </td>
                </tr>
              
                <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td>
                        <input name="phone" type="text" placeholder="Nhập SĐT" class="medium" />
                    </td>
                </tr>
               
                <tr>
                    <td>
                        <label>Password</label>
                    </td>
                    <td>
                        <input name="password" type="password" placeholder="Nhập password" class="medium" />
                    </td>
                </tr>
                   <tr>
                    <td>
                        <label>ảnh </label>
                    </td>
                    <td>
                        <input name="image" type="file" placeholder="Chọn ảnh đại diện"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>

              
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


