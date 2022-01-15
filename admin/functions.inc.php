<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}

function get_course_status($ex_d)
{
	$today = date("Y-m-d h:i:s");
	
	$exp = strtotime($ex_d);
	$td = strtotime($today);

	if($td >= $exp)
	{
		return 0;
	}
	else
	{
		return 1;
	}
}

?>