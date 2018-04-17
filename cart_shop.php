<?php
  include 'common.php';
  $u_id=$_SESSION['id'];
  $sq1 = "SELECT item_id,qty FROM users_items WHERE user_id='$u_id'" ;
	$check_q1 = mysqli_query ($con,$sq1);
        $numbs= mt_rand();
 while($pro_row = mysqli_fetch_array($check_q1))
 {
     $product_id=$pro_row['item_id'];
     $product_qty=$pro_row['qty'];
     $s1 = "SELECT * FROM items WHERE id='$product_id'" ;
	$check_q2 = mysqli_query ($con,$s1);
        $pro_row2 = mysqli_fetch_array($check_q2);
        $product_name=$pro_row2['name'];
        $product_class=$pro_row2['class'];
        $product_category=$pro_row2['category'];
        $product_img=$pro_row2['images'];
        $order_id=$numbs+$u_id;
        $sq1n = "SELECT * FROM orders WHERE user_id='$u_id' AND product_id='$product_id'" ;
	$check_q1c = mysqli_query ($con,$sq1n);
        $ro= mysqli_fetch_array($check_q1c);
        if($ro > 0)
        {
            header('location: docver.php');
            exit();
        }
 else {
        if($pro_row2['quantity']==$product_qty)
        {
            $order_registration = "INSERT INTO `orders` 
		(`order_id`, `user_id`,`product_id`,`product_name`, 
		`product_class`, `product_category`, `product_images`, `qty`) 
		VALUES ('$order_id','$u_id','$product_id','$product_name', 
		'$product_class', '$product_category', '$product_img', '$product_qty')";
		$run_query = mysqli_query($con,$order_registration)or die(mysqli_error($con));
                
            $sqldg = "DELETE FROM items WHERE id='$product_id'" ;
	$del_query1g = mysqli_query ($con,$sqldg);
        }
 else {
     $prod_qty=$pro_row2['quantity']-$product_qty;
    
     $order_registration = "INSERT INTO `orders` 
		(`order_id`, `user_id`,`product_id`,`product_name`, 
		`product_class`, `product_category`, `product_images`, `qty`) 
		VALUES ('$order_id','$u_id','$product_id','$product_name', 
		'$product_class', '$product_category', '$product_img', '$product_qty')";
		$run_query = mysqli_query($con,$order_registration)or die(mysqli_error($con));
                
      $updqty_pro ="UPDATE `items` SET quantity='$prod_qty' WHERE id='$product_id'";
    $run_ch = mysqli_query($con, $updqty_pro)or die(mysqli_error($con));
 }
 }
 }
   header('location: docver.php');
?>
