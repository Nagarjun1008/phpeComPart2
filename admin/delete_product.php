<?php
require('connection.inc.php');
require('functions.inc.php');

$sql="select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id desc";
$res=mysqli_query($con,$sql);

while($row=mysqli_fetch_assoc($res)){
    if($row['status']==0){
        $res=mysqli_query($con,"");
    }
}

?>