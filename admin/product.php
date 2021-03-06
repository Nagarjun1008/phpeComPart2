<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update product set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);

		$sql="SELECT `categories_id` FROM `product` WHERE `id` = '$id'";
		$res_p=mysqli_query($con,$sql);

		while($row_p=mysqli_fetch_assoc($res_p)){
			mysqli_query($con,"UPDATE `categories` SET `products` = `products`- 1 WHERE `id` = '$row_p[categories_id]'");
		}
		
		$delete_sql="delete from product where id='$id'";
		mysqli_query($con,$delete_sql);

		
	}
}

$sql="select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id desc";
$res=mysqli_query($con,$sql);

?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Products </h4>
				   <h4 class="box-link"><a href="manage_product.php">Add Product</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">S.No.</th>
							   <th>ID</th>
							   <th>Category</th>
							   <th>Name</th>
							   <th>Image</th>
							   <th>MRP</th>
							   <th>Price</th>
							   <th>Qty</th>
							   <th>Date</th>
							   <th>Time</th>
							   <th>Status</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=0;
							while($row=mysqli_fetch_assoc($res)){
								$date = trim($row['ex_d_t']);
								$time;
								$date = str_split($date,10);
								$time = $date[1];
								$date = $date[0];
								?>
							<tr>
							   <td class="serial"><?php echo ++$i;?></td>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['categories']?></td>
							   <td><?php echo $row['name']?></td>
							   <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"/></td>
							   <td><?php echo $row['mrp']?></td>
							   <td><?php echo $row['price']?></td>
							   <td><?php echo $row['qty']?></td>
							   <td><?php echo $date?></td>
							   <td><?php echo $time?></td>
							   <td>
								   <?php 
								   if($row['status'] == 1)
								   {
									   echo '<i style="color:green;" class="fas fa-check"></i>';
								   }else
								   {
									   echo '<i style="color:red;" class="fas fa-times"></i>';
								   }								   
								   ?>
							 </td>
							   <td>
								<?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_product.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>