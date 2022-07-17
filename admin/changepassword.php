<?php include 'inc/header.php';?>

<?php include 'inc/sidebar.php';?>

<?php 
    if(!isset($_GET['adminid']) || $_GET['adminid'] == NULL){
       // echo "<script> window.location = 'brandlist.php' </script>";
        
    }else {
        $id = $_GET['adminid']; // Lấy catid trên host
    }
    // gọi class category
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST

        $mkmoi = $_POST['txtmatkhau'];
        $mkcu=$_POST['txtmatkhaucu'];
        if($ad->kiemtrapass($mkcu,$id) == '')
        {
           echo "<script>alert('Mật khẩu củ không chính xác!');</script>";
        }
        else
        {
            $Updatepass = $ad -> changepass($mkmoi,$id);
        }
         // hàm check catName khi submit lên
    }
    
  ?>

  <div class="grid_10" >
            <div class="box round first grid" style="background: #98b2f5; box-shadow: 5px 7px white; border-radius: 5px;">
                <h2> Đổi mật khẩu</h2>
                <div class="block">               
                     
                </div>
                <div id="formthem">
            <div class="content_top">
                <div class="heading">
                <h3>Change Password</h3>
                </div>
                <div class="clear"></div>
                <?php 
                    if(isset($Updatepass)){
                        echo $Updatepass;
                    }
                 ?>  
                  
                <form method="post" action="">

                    
                     <div class="form-group"> 
                       <label>Mật khẩu củ</label> 
                       <input class="form-control" type="password" name="txtmatkhaucu" style="width: 300px;" required>
                      
                     </div>
                     <div class="form-group"> 
                       <label>Mật khẩu mới</label> 
                       <input class="form-control" type="password" name="txtmatkhau" style="width: 300px;" required>
                      
                     </div> 
                     <!-- <div class="form-group"> 
                       <label>Nhập lại mật khẩu mới</label> 
                       <input class="form-control" type="password" name="txtmatkhaunhaplai">
                      
                     </div> -->
                     
                    <div class="form-group">
                     <input class="btn btn-primary" type="submit" value="Lưu" name="submit">
                     <input class="btn btn-warning" type="reset" value="Hủy"></div>
                     
                 </form>
             </div>
        </div>
                

            </div>
        </div>
<?php include 'inc/footer.php';?>