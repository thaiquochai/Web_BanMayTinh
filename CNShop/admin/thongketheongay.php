<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	include '../classes/product.php';
	$product=new product();
?>
<div class="grid_10" >
            <div class="box round first grid" style="background: #98b2f5; box-shadow: 5px 7px white; border-radius: 5px;">
                <h2>Thống kê theo ngày</h2>
                <div>
                	<form method="post">
                		<span>
	                		<input type="date" name="tungay">
	                		<input type="submit" name="submit" value="Thống Kê">
                		</span>
                		&nbsp;&nbsp;&nbsp;
                		<span style="font-size: 20px; background:#c1c2d9; ">
                			Đã bán được: 
                			<?php
                				if(isset($_POST['submit']))
								{
									$tk=$_POST['tungay'];
                					$daban=$product->dabanhomnay($tk);
                					$sl=$daban->fetch_assoc();
                					echo $sl['daban'] .' sản phẩm';
                				}

                			?>
                		</span>
                		&nbsp;&nbsp;&nbsp;
                		<span style="font-size: 20px; background:#c1c2d9; ">
                			Tổng tiền: 

                			<?php
                				if(isset($_POST['submit']))
								{
									$tk=$_POST['tungay'];
                					$daban=$product->tongtiensp($tk);
                					$sl=$daban->fetch_assoc();
                					echo $sl['daban'] .'<sup>đ</sup>';
                				}

                			?>
                		</span>
                	</form>
                	
                </div>
                <table class="data display datatable" id="example">
                	<th>STT</th>
                	<th>Ảnh</th>
                	<th>Tên sản phẩm</th>
                	<th>Số lượng</th>
                	<th>giá</th>
                	<th>Ngày bán</th>
                	<tbody>
						<?php 
							if(isset($_POST['submit']))
							{
								$tk=$_POST['tungay'];
						
								$date = $product -> thongketheongay($tk);
								if($date){
									$i = 0;
									while($result = $date -> fetch_assoc()){
										$i++;
								
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><img src="uploads/<?php echo $result['image'] ?>" width="80"></td>
							<td><?php echo $result['productName']; ?></td>
							<td><?php echo $result['quantity']; ?></td>
							<td><?php echo $result['price']; ?></td>
							<td><?php echo $result['date_order']; ?></td>
							
							
						</tr>
						<?php 
							}
						}
					}else
					{
						echo "Không có sản phẩm nào!";
					}
				?>
					
				
					</tbody>
                </table>
               

            </div>
        </div>

<?php include 'inc/footer.php';?>