<?php
include 'common.php';
if(isset($_GET['isd']))
{
      $u_id=$_SESSION['id'];
      $p_id = $_GET['isd'];
      $delete_pro ="DELETE FROM `users_items` WHERE item_id='$p_id' AND user_id='$u_id'";
    $run_che = mysqli_query($con, $delete_pro)or die(mysqli_error($con));
    echo "<script type='text/javascript'>window.open('cart.php','_self')</script>";
                        exit();
}
                        ?>