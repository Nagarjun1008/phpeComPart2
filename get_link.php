<?php
require('connection.inc.php');
require('functions.inc.php');

$user_id = 1;
$pro_name = '';
$pro_desc = '';
$pro_price = '';
$pro_mrp = '';
$pro_image = '';
$pro_ex_d_t = '';
$pro_qty = '';
$pro_status = '';
$pro_cat_id = '';

// if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']!=''){
//   $user_id = $_SESSION['user_id'];
// }else{
// 	header('location:login.php');
// 	die();
// }


if(isset($_GET['id'])){

	$product_id=mysqli_real_escape_string($con,$_GET['id']);

	if($product_id>0){

		$get_product=get_product($con,'','',$product_id);
		if($get_product[0]['product_link'] != '')
		{
			$pro_name = $get_product[0]['name'];
			$pro_desc = $get_product[0]['description'];
			$pro_price = $get_product[0]['price'];
			$pro_mrp = $get_product[0]['mrp'];
			$pro_image = $get_product[0]['image'];
			$pro_ex_d_t = $get_product[0]['ex_d_t'];
			$pro_qty = $get_product[0]['qty'];
			$pro_status = $get_product[0]['status'];
			$pro_cat_id = $get_product[0]['categories_id'];

			$sql = "INSERT INTO `user_products` (`user_id`, `product_id`, `product_name`, `product_desc`, `product_price`, `product_mrp`, `product_image`, `product_ex_d_t`, `product_qty`, `product_status`, `category_id`) VALUES ('$user_id', '$product_id', '$pro_name', '$pro_desc', '$pro_price', '$pro_mrp', '$pro_image', '$pro_ex_d_t', '$pro_qty', '$pro_status', '$pro_cat_id')";
			
			$res=mysqli_query($con,$sql);

			header('location:'.$get_product['0']['product_link']);
			die();

		}
		else
		{
			header('location:index.php');
		}

	}else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
	}
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
