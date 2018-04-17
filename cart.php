<!DOCTYPE html>
<?php
require 'common.php';
if ( !isset($_SESSION['name']))
    { header('location: index.php');
   }
   function anyitem()
  {
    $con = mysqli_connect("localhost", "root", "", "store") or die(mysqli_error($con));
      $u_id=$_SESSION['id'];
      $check_pro =" SELECT * FROM users_items WHERE user_id='$u_id'";
    $run_check = mysqli_query($con, $check_pro)or die(mysqli_error($con));
    if(mysqli_num_rows($run_check) > 0)
    { 
        return 1;
    }
 else {
    return 0;    
    }
  }
  function sum($parameter1, $parameter2) {
  $addition = $parameter1 + $parameter2;
  return $addition;
  }
   ?>
<html>
    <head> 
    <title>BOOK Store</title> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="index.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript">
</script>
</head>
    <body>
        <?php
        include 'header.php';
        ?>
        <!--mid-->
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <div style="text-align: left;">
             <a href="myorder.php"><button type="button" style="border-radius: 12px;" class="btn btn-warning"><h4> My Orders</h4></button></a>   
         </div>
        <br>
        <?php 
        if(!anyitem())
        { ?>
        <div class="jumbotron op" style="visibility: visible; background-color: rgba(0,0,0,0.1);">
            <br><br><br>
            <p ><h1 style="text-align: center;">" YOUR CART IS EMPTY " </h1></p> 
        <div style="text-align: center;">
            <br>
             <a href="shop.php"><button type="button" style="border-radius: 12px;" class="btn btn-primary"><h4> Continue Shopping </h4></button></a>  
     </div>
        <br><br><br>
        </div>
        <?php } else { ?>
     <div class="jumbotron po" style="visibility: visible;">
        <table class="table table-striped">
    <thead>
      <tr>
        <th>ITEM</th>
        <th>NAME</th>
        <th>CLASS</th>
        <th>QTY</th>
        <th> </th>
      </tr>
    </thead>
    <tbody>
      
        <tr>
            <?php 
             $tot=0;
      $u_id=$_SESSION['id'];
            $select_query = "SELECT * FROM users_items WHERE user_id='$u_id' ";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
      while ($row = mysqli_fetch_array($select_query_result)) {
          $pr_id=$row['item_id'];
          $select_query24="SELECT id,name,class,quantity,images FROM items WHERE id='$pr_id'";  
$select_query_result24 = mysqli_query($con, $select_query24) or die(mysqli_error($con));
$row2 = mysqli_fetch_array($select_query_result24);
?>
            <form method="POST" action="cart.php">
            <td> <?php $pro_img = $row2['images'];
          if($pro_img=="")
           echo "<img src='product_image/nopes.jpg' alt='Lights' style='width:100px; height: 100px;' />";
       else
          echo "<img src='product_image/$pro_img' alt='Lights' style='width:100px; height: 100px;' />";
       ?> </td>
        <td> <?php echo $row2['name']; ?> </td>
        <td> <?php echo $row2['class']; ?> </td>
        <?php 
       $quan=$row['qty'];
       $quant=$row2['quantity'];
        ?>
        <td><div class="form-group">
                <input type="number" name="qun" style="text-align: center; width: 50px; " min="1" value="<?php echo $quan; ?>" max="<?php echo $quant; ?>"></td>
            <td> <input type="hidden" name="rm" value="<?php echo $row2['id']; ?>"> <button type="submit" name="refresh"><span style="color: green;" class="glyphicon glyphicon-refresh"></span></button></div>
            <a href="cart-remove.php?isd=<?php echo $row2['id']; ?>"><span style="color: red;" class="glyphicon glyphicon-remove"></span></a></td>
            </form>
            </tr>
      <?php 
      $tot = sum($tot,$row['qty']);
      }  ?>
      <tr>
          <td><b>TOTAL ITEMS:-</b></td>
        <td></td>
        <td></td>
        <td><b><?php echo $tot; ?> books</b></td>
        <td></td>
      </tr>
    </tbody>
  </table>  
         <div style="text-align: right;">
             <a href="shop.php"><button type="button" style="border-radius: 12px;" class="btn btn-primary"><h4> Continue Shopping </h4></button></a>
             <a href="cart_shop.php"><button type="button" style="border-radius: 12px;" class="btn btn-warning"><h4>Proceed to CheckOut</h4></button></a>   
     </div>
     </div>
        <?php } ?>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
<?php
if(isset($_POST['refresh']))
{
      $u_id=$_SESSION['id'];
      $qt=$_POST['qun'];
      $pd_id=$_POST['rm'];
    $up2qty_pro ="UPDATE `users_items` SET qty='$qt' WHERE item_id='$pd_id' AND user_id='$u_id'";
    $run_chec = mysqli_query($con, $up2qty_pro)or die(mysqli_error($con));
    echo "<script type='text/javascript'>window.open('cart.php','_self')</script>";
                        exit();
}
                        ?>