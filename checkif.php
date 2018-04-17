<?php
  function checkifadded($p_id)
  {
    $con = mysqli_connect("localhost", "root", "", "store") or die(mysqli_error($con));
      $u_id=$_SESSION['id'];
      $check_pro =" SELECT * FROM users_items WHERE user_id='$u_id' AND item_id='$p_id' ";
    $run_check = mysqli_query($con, $check_pro)or die(mysqli_error($con));
    if(mysqli_num_rows($run_check) > 0)
    { 
        return 1;
    }
 else {
    return 0;    
    }
  }
?>
    
