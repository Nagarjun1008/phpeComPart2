<?php
date_default_timezone_set('Asia/Kolkata');

session_start();
$con=mysqli_connect("localhost","root","","ecom");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/prog/SVIT/Projects/phpeComPart2/');
define('SITE_PATH','http://127.0.0.1/prog/SVIT/Projects/phpeComPart2/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');

#Updating status in table product
$sql="select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id desc";
$res_p=mysqli_query($con,$sql);

while($row_p=mysqli_fetch_assoc($res_p)){

   $today = date("Y-m-d h:i:s");
	
	$exp = strtotime($row_p['ex_d_t']);
	$td = strtotime($today);

	if($td >= $exp)
	{
		$status = 0;
	}
	else
	{
		$status = 1;
	}
   
   mysqli_query($con,"UPDATE `product` SET `status`='$status' WHERE `id` ='$row_p[id]'");
   
}

?>