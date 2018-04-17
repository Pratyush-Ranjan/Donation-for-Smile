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
      $check_pro =" SELECT * FROM orders WHERE user_id='$u_id'";
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
        <br>
        <?php 
        if(!anyitem())
        { ?>
        <div class="jumbotron op" style="visibility: visible; background-color: rgba(0,0,0,0.1);">
            <br><br><br>
            <p><h1 style="text-align: center;">" You Haven't Ordered anything yet." </h1></p> 
        <div style="text-align: center;">
            <br>
             <a href="shop.php"><button type="button" style="border-radius: 12px;" class="btn btn-primary"><h4> Continue Shopping </h4></button></a>  
     </div>
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
        <th>Order No.</th>
      </tr>
    </thead>
    <tbody>
      
        <tr>
            <?php 
             $tot=0;
      $u_id=$_SESSION['id'];
            $select_query = "SELECT * FROM orders WHERE user_id='$u_id' ";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
      while ($row = mysqli_fetch_array($select_query_result)) {
?>
            <?php $o_id=$row['order_id']; ?> 
            <td> <?php $pro_img = $row['product_images'];
          if($pro_img=="")
           echo "<img src='product_image/nopes.jpg' alt='Lights' style='width:100px; height: 100px;' />";
       else
          echo "<img src='product_image/$pro_img' alt='Lights' style='width:100px; height: 100px;' />";
       ?> </td>
        <td> <?php echo $row['product_name']; ?> </td>
        <td> <?php echo $row['product_class']; ?> </td>
        <td><?php echo $row['qty']; ?></td>
        <td><b><?php echo $o_id; ?> </td>
            </tr>
            <?php } ?>
    </tbody>
  </table>  
         <br><br><p></p><br><br>
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