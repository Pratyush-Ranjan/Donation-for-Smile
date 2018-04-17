<!DOCTYPE html>
<html>
    <head> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
</head>        
<?php
include 'common.php';       
$book_name = mysqli_real_escape_string($con, $_POST['bname']);
        $category = $_POST['category'];
	$class = $_POST['class'];
	$quantity = $_POST['quantity'];
	$book_image = $_FILES['bimage']['name'];
        $book_image_tmp = $_FILES['bimage']['tmp_name'];
	$name = "/^[a-zA-Z]+$/";
	$number = "/^[0-9]+$/";
        if(!preg_match($name,$book_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='give_book.php' class='close' data-dismiss='alert' aria-label='close'><h3>&times;</h3></a>
				<b><h3>This $book_name is not valid, book name should only contain letters !</h3></b>
			</div>
		";
		exit();
	}
	if(strlen($class) > 12 ){
		echo "
			<div class='alert alert-warning'>
				<a href='give_book.php' class='close' data-dismiss='alert' aria-label='close'><h3>&times;</h3></a>
				<b><h3>Class cannot be greater than 12.</h3></b>
			</div>
		";
		exit();
	}
	if(!preg_match($number,$contact)){
		echo "
			<div class='alert alert-warning'>
				<a href='give_book.php' class='close' data-dismiss='alert' aria-label='close'><h3>&times;</h3></a>
				<b><h3>Class $class is not valid</h3></b>
			</div>
		";
		exit();
	}
        move_uploaded_file($book_image_tmp,"product_image/$book_image");
        
                
        $sqlm = "SELECT * FROM items WHERE name = '$book_name' AND class='$class' LIMIT 1" ;
	$check_query1 = mysqli_query ($con,$sqlm);
	$county = mysqli_num_rows ($check_query1);
        if($county > 0){
            $sq = "SET @inr=$quantity" ;
	$check_query = mysqli_query ($con,$sq);
        $update_quantity_query = "UPDATE items SET quantity = quantity + @inr WHERE name = '$book_name' AND class='$class'";
$update_result = mysqli_query($con, $update_quantity_query) or die(mysqli_error($con));
            echo "<script>alert('Book Advertisement successfully registered')</script>";
			echo "<script>window.open('give_book.php','_self')</script>";
                        exit();
        }
        else{
		$book_adv = "INSERT INTO `items` 
		(`id`, `name`, `class`, 
		`category`, `quantity`,'images') 
		VALUES ('', '$book_name','$class', 
		'$category','$quantity',$book_image')";
		$run_query = mysqli_query($con,$book_adv)or die(mysqli_error($con));
		if(mysqli_query($con,$run_query)){
			echo "<script>alert('Book Advertisement successfully registered')</script>";
			echo "<script>window.open('give_book.php')</script>";
		}
        }
?>
