<!DOCTYPE html>
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
<?php
require 'common.php';
if(isset($_POST['book_submit']))
 {
$book_name = $_POST['bname'];
        $category = $_POST['category'];
	$class = $_POST['class'];
	$quantity = $_POST['quantity'];
	$book_image = $_FILES['bimage']['name'];
        $book_image_tmp = $_FILES['bimage']['tmp_name'];
	
	$numberi = "/^[0-9]+$/";
        if(preg_match($numberi,$book_name)){
                        echo "<script type='text/javascript'>alert('This $book_name is not valid, book name should contain letters !')</script>";
                        echo "<script type='text/javascript'>window.open('give_book.php','_self')</script>";
                        exit();
	}
	if($class > 12 )
            {
                echo "<script type='text/javascript'>alert('Class cannot be greater than 12 !')</script>";
                        echo "<script type='text/javascript'>window.open('give_book.php','_self')</script>";
		exit();
	}
	if(!preg_match($numberi,$class)){
                        echo "<script type='text/javascript'>alert('Class $class is not valid !')</script>";
                        echo "<script type='text/javascript'>window.open('give_book.php','_self')</script>";
		exit();
	}
        if(!preg_match($numberi,$quantity)){
                        echo "<script type='text/javascript'>alert('Quantity $quantity is not valid !')</script>";
                        echo "<script type='text/javascript'>window.open('give_book.php','_self')</script>";
		exit();
	}
        echo "<script>alert('Book Advertisement successfully registered..')</script>";
        $name1=$_SESSION["name"];
        $book_details = "INSERT INTO `user_info` 
		(`book_user_id`, `user_name`, `book_name`, 
		`book_class`, `book_quantity`)
                VALUES (NULL, '$name1','$book_name', 
		'$class', '$quantity')";
		$run_query = mysqli_query($con,$book_details)or die(mysqli_error($con));        
        
        $sqlm = "SELECT * FROM items WHERE name = '$book_name' AND class='$class' LIMIT 1" ;
	$check_query1 = mysqli_query ($con,$sqlm);
	$county = mysqli_num_rows ($check_query1);
        if($county > 0){
            $sq = "SET @inr=$quantity" ;
	$check_query = mysqli_query ($con,$sq);
        $update_quantity_query = "UPDATE items SET quantity = quantity + @inr WHERE name = '$book_name' AND class='$class'";
$update_result = mysqli_query($con, $update_quantity_query) or die(mysqli_error($con));
if(mysqli_query($con,$update_result)){ 
    echo "<script type='text/javascript'>window.open('give_book.php','_self')</script>";                    
    exit();
        }
        }
        else{
            move_uploaded_file($book_image_tmp,"product_image/$book_image");
		$book_adv = "INSERT INTO `items` 
		(`id`, `name`, `class`, 
		`category`,`quantity`, `images`)
                VALUES (NULL, '$book_name','$class', 
		'$category', '$quantity', '$book_image')";
		$run_query = mysqli_query($con,$book_adv)or die(mysqli_error($con));
		if(mysqli_query($con,$run_query)){
                        
                        echo "<script type='text/javascript'>window.open('give_book.php','_self')</script>";
                        exit();
		}
        }
 }
?>
    <body>
        <?php
        include 'header.php';
        ?>
        <div class="container">
        <div class="jumbotron">
            <legend>
            <h3>BOOK DETAILS</h3>
            </legend>
            <form method="POST" action="give_book.php" class="form-horizontal" enctype="multipart/form-data">

            <div class="form-group">
                <label>Book Title</label>
                    <input type="text" id="bname" name="bname"  class="form-control" required>
            </div>
    <div class="form-group">    
    <label>Category</label>
    <select class="col-lg-10" style="height: 35px; width: 100%;"id="category" name="category">
      <option value="Primary">Primary</option>
      <option value="Middle">Middle</option>
      <option value="Secondary">Secondary</option>
    </select>
    </div>             
        <div class="form-group">
    <label>Class</label>
    <input type="text" id="class" name="class" class="form-control" required>
            </div>
            <div class="form-group">
            <label>Quantity</label>
                        <input type="text" id="quantity" name="quantity" class="form-control" required>
                        <b class="help-block" style="font-size: 10px;">HINT :- <i>The number of same book you want to donate</i></b>
            </div>
           <div class="form-group">
            <label>Book Image</label>
            <input type="file" id="bimage" name="bimage" class="form-control">
            </div>
                <div class="form-group" style="text-align: right;">
                    <button type="submit" name="book_submit" value="submit" class="btn btn-primary" style="border-radius: 12px;" >SUBMIT</button>
    </div>
    </form>
        </div>
    </div>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
