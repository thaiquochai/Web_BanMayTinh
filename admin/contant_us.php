<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/contact_us.php';  ?>
<?php
    // gọi class category
    $con = new Contact_us();     
    if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['delid']; // Lấy catid trên host
        $delcontact = $con -> del_contact($id); // hàm check delete Name khi submit lên
    }
 ?> 

        <div class="grid_10">
            <div class="box round first grid" style="background: #98b2f5; box-shadow: 5px 7px white; border-radius: 5px;">
                <h2>Cần giúp đỡ</h2>
                <div class="block">  
                      <?php 
                        if(isset($delcontact)){
                            echo $delcontact;
                        }
                    ?> 
                    <table class="data display datatable" id="example">
                    <thead>
                        <tr>
                            <th>No.</th>
                            
                            <th>Email</th>
                            <th>trả lời</th>
                            
                            <th>Xử lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $show_contact = $con -> show_contact_us();
                            if($show_contact){
                                $i = 0;
                                while($result = $show_contact -> fetch_assoc()){
                                    $i++;
                                
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i; ?></td>
                            
                            <td><?php echo $result['email']; ?></td> 
                            
                            <td><a href="traloi.php?id_traloi=<?php echo $result['id'] ?>">Tra lời</a></td>
                            <td><a onclick = "return confirm('Are you want to delete???')" href="?delid=<?php echo $result['id'] ?>">Delete</a></td>
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

