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

        <div class="grid_10">
            <div class="box round first grid" style="background: #98b2f5; box-shadow: 5px 7px white; border-radius: 5px;">
                <h2>Thông tin người dùng</h2>
                <div class="block">  
                   
                    <table class="data display datatable" id="example">
                    <thead>
                        <tr>
                            <th>STT</th>
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
                            <td><?php echo $result['name']; ?></td>
                            <td><?php echo $result['address']; ?></td>
                            <td><?php echo $result['city']; ?></td>
                            <td><?php echo $result['country']; ?></td>
                            <td><?php echo $result['zipcode']; ?></td>
                            <td><?php echo $result['phone']; ?></td>
                            <td><?php echo $result['email']; ?></td>
                            <td><a href="customeredit.php?id=<?php echo $result['id']; ?>">Edit</a> || <a onclick = "return confirm('Are you want to delete???')" href="?delid=<?php echo $result['id'] ?>">Delete</a></td>
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

