<?php
require('connection.inc.php');
require('functions.inc.php');

$user_id = 1;

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
        
        $sql = "INSERT INTO `user_products` (`user_id`, `product_id`) VALUES ('$user_id', '$product_id');";
        
        $res=mysqli_query($con,$sql);

       header('location:'.$get_product['0']['product_link']);
	die();


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
