<!DOCTYPE html>
<?php
require 'common.php';
if ( !isset($_SESSION['name']))
    { header('location: index.php');
   }
   $select_query = "SELECT  id,name,class,quantity,images FROM items WHERE category='Middle'";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));

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
</head>
    <body>
        <?php
        include 'hello.php';
        include 'header.php';
        include 'checkif.php';
        ?>
        <!--mid-->
        <div class="container-fluid">
        <div class="row text-center">
            <?php while ($row = mysqli_fetch_array($select_query_result)) { ?>
    <div class="col-md-3">
      <div class="thumbnail">
          
         <?php
          $pro_img = $row['images'];
          $pro_id=$row['id'];
          if($pro_img=="")
           echo "<img src='product_image/nopes.jpg' alt='Lights' style='width:100%; height: 220px;' />";
       else
          echo "<img src='product_image/$pro_img' alt='Lights' style='width:100%; height: 220px;' />"; 
          ?>
          <div class="caption">
              <h3><?php echo $row['name']; ?></h3>
                            <p>class:-<?php echo $row['class']; ?>th</p>
                            <p>Quantity:-<?php echo $row['quantity']; ?></p>
                             <?php 
                            if (checkifadded($pro_id)) {
                                echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>'; } 
                                else { ?>
                            <a href="shop2.php?imd=<?php echo $pro_id;?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                   <?php } ?>
          
          </div>
          
      </div>
    </div>
            <?php } ?>
        </div>
         
    
    </div>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
<?php
if(isset($_GET['imd']))
{
      $u_id=$_SESSION['id'];
      $p_id = $_GET['imd'];
      $insert_pro ="INSERT INTO `users_items` 
		(`user_id`, `item_id`) 
		VALUES ('$u_id', '$p_id')";
    $run_che = mysqli_query($con, $insert_pro)or die(mysqli_error($con));
    echo "<script type='text/javascript'>window.open('shop2.php','_self')</script>";
                        exit();
}
                        ?>
    