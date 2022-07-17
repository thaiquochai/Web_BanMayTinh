<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php
    // gọi class category
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        

        $insertadmin = $ad -> insert_addmin($_POST); // hàm check catName khi submit lên
    }
  ?> 
        <div class="grid_10">
            <div class="box round first grid" style="background: #98b2f5; box-shadow: 5px 7px white; border-radius: 5px;">
                <h2>Thêm ADMIN</h2>      
               <div class="block copyblock"> 
                <?php 
                    if(isset($insertadmin)){
                        echo $insertadmin;
                    }
                 ?>
                 <form action="adminadd.php" method="post" >
                    <table class="form">					
                        <tr>
                            <td>
                            	<label>Name</label>
                                <input type="text" name="adminName" placeholder="nhập tên" class="medium" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <label>Email</label>
                                <input type="text" name="adminEmail" placeholder="nhập email" class="medium" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <label>User</label>
                                <input type="text" name="adminUser" placeholder="nhập user" class="medium" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <label>Password</label>
                                <input type="password" name="adminPass" placeholder="nhập password" class="medium" required/>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" style="text-align: center; background: #68a9de; border-radius: 10px; " />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
                <a href="adminlist.php">
        				<button style="background: #d0de68; border-radius: 5px;"> <=== </button></a>
            </div>
        </div>
<?php include 'inc/footer.php';?>