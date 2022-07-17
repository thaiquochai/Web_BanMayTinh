<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php'; ?>
<?php include '../classes/customer.php'; ?>
<?php
    // gọi class category
    $customer = new customer();     
    if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['delid']; // Lấy catid trên host
        $delcustomer = $customer -> del_customer($id); // hàm check delete Name khi submit lên
    }
 ?> 
 <?php
   if(isset($_GET['id_customer'])){
        $id = $_GET['id_customer'];
       
        $update_level = $customer->update_level($id);
    }
 ?>
<?php
    if(isset($_GET['id_kichhoat'])){
        $id = $_GET['id_kichhoat'];
       
        $update_level = $customer->update_level1($id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid" style="background: #98b2f5; box-shadow: 5px 7px white; border-radius: 5px;">
                <h2>Thông tin người dùng</h2>
                <div class="block">     
                   <div><button style="color: black; padding: 5px;margin-bottom: 5px; background: #074af5;"><a href="customeradd.php" style="color: white;">Thêm người dùng</a></button></div>
                    <table class="data display datatable" id="example">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ảnh</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Mã Bưu điện</th>
                            <th>SĐT</th>
                            <th>email</th>
                            <th>Xử lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                
                            $pdlist = $customer->show_customer();
                             $i = 0;
                
                
                              if($pdlist){
                    
                                 while ($result = $pdlist->fetch_assoc()){
                                  $i++;
                                    
                                    
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i; ?></td>
                            <td><img style="width: 70px; height: 70px;  border: 1px #d4d4d4 solid;padding: 7px;border-radius:50%;-moz-border-radius:50%; -webkit-border-radius:50%; " src="../images/<?php echo $result['image']?>"></td>
                            <td><?php echo $result['name']; ?></td>
                            <td><?php echo $result['address']; ?></td>
                            <td><?php echo $result['city']; ?></td>
                            <td><?php echo $result['country']; ?></td>
                            <td><?php echo $result['zipcode']; ?></td>
                            <td><?php echo $result['phone']; ?></td>
                            <td><?php echo $result['email']; ?></td>
    
                                <?php
                                    if($result['level']==0){

                                  
                                ?>
                                 <td>
                                    <a href="?&id_customer=<?php echo $result['id'] ?>">Khóa</a>
                                 </td>
                            <?php
                                }else
                                {
                            ?>
                            <td>
                                    <a href="?&id_kichhoat=<?php echo $result['id'] ?>">Kích hoạt</a>
                            </td>

                            <?php
                        }
                        ?>
                        </tr>
                        <?php 
                            }
                        }
                         ?>
                    </tbody>
                </table>
               </div>
            </div>

        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>

<?php include 'inc/footer.php';?>

