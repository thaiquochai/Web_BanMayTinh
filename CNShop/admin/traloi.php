<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php include '../classes/contact_us.php'; 
 $contact = new Contact_us();  ?>
<?php
    if(!isset($_GET['id_traloi']) || $_GET['id_traloi'] == NULL){
        
        
    }else {
        $id = $_GET['id_traloi']; // Lấy catid trên host
    }
?>
<?php
    // // gọi class category
   
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $traloi = $_POST['traloi'];

        $insertBrand = $contact -> insert_traloi($traloi,$id); // hàm check catName khi submit lên
    }
  ?> 
        <div class="grid_10">
            <div class="box round first grid" style="background: #98b2f5; box-shadow: 5px 7px white; border-radius: 5px;">
                <h2>Trả lời câu hỏi</h2>      
               <div class="block copyblock"> 
                <?php 
                    if(isset($insertBrand)){
                        echo $insertBrand;
                    }
                 ?>
                 <form action="traloi.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="traloi" placeholder="nhập nội dung trả lời" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>