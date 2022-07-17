<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    // gọi class category
        
    if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['delid']; // Lấy catid trên host
        $delbrand = $ad -> del_admin($id); // hàm check delete Name khi submit lên
    }
 ?> 

 <?php
   if(isset($_GET['admindid_khoa'])){
        $id = $_GET['admindid_khoa'];
       
        $update_level = $ad->update_level($id);
    }
 ?>
<?php
    if(isset($_GET['admindid_kichhoat'])){
        $id = $_GET['admindid_kichhoat'];
       
        $update_level = $ad->update_level1($id);
    }
?>
 

        <div class="grid_10">
            <div class="box round first grid" style="background: #98b2f5; box-shadow: 5px 7px white; border-radius: 5px;">
                <h2>Danh sách admin</h2><br>
               	<a href="adminadd.php"><button style="background: #54bdc7; border-radius: 10px;"> Thêm admin </button></a> 
                <div class="block">  
                    
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>email</th>
							
							<th>Xử lý</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show_admin = $ad -> show_admin();
							if($show_admin){
								$i = 0;
								while($result = $show_admin -> fetch_assoc()){
									$i++;
								
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['adminName']; ?></td>
							<td><?php echo $result['adminEmail']; ?></td>
							<?php
								if($result['level']==1){
							?>
							<td><a href="?admindid_khoa=<?php echo $result['adminId']; ?>">Khóa</a> </td>
							<?php
								}else{
							?>
							<td><a href="?admindid_kichhoat=<?php echo $result['adminId']; ?>">Kích hoạt</a> </td>

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

