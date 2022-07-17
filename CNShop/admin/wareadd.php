<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';  ?>

<?php include '../classes/ware.php';  ?>

<?php
    // gọi class category
    $ware = new ware(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $id_sanpham = $_POST['product'];
        $soluong=$_POST['soluong'];
        $ngaynhap=$_POST['ngaynhap'];
        $insertWare = $ware -> insert_ware($id_sanpham, $soluong, $ngaynhap); // hàm check catName khi submit lên
    }
  ?> 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Nhập hàng vào kho</h2>      
               <div class="block copyblock"> 
                <?php 
                    if(isset($insertWare)){
                        echo $insertWare;
                    }
                 ?>
                 <form action="wareadd.php" method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Sản Phẩm: </label>
                            </td>
                            <td>
                                <select id="select" name="product">
                                    <option>Chọn sản phẩm</option>
                                    <?php 
                                        $pro = new product();
                                        $prolist = $pro->show_product();
                                        if($prolist){
                                            while ($result = $prolist->fetch_assoc()){
                                        
                                     ?>
                                        <option value=" <?php echo $result['productId'] ?> "> <?php echo $result['productName'] ?> </option>
                                    
                                    <?php 
                                             }
                                         }
                                     ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Số lượng nhập: </label>
                                <input type="text" name="soluong" placeholder="số lượng nhập" class="medium" /><br>
                            </td>
                        </tr>
                        <tr>
                             <td>
                                <label>Ngày nhập: </label>
                                <input type="date" name="ngaynhap"  class="medium" />
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