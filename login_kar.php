<!DOCTYPE html>
<html>
    <head> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
</head>  
<?php
  include 'common.php';

if(isset($_POST["email"]) && isset($_POST["password"])){
	$email = mysqli_real_escape_string($con,$_POST["email"]);
	$password = md5($_POST["password"]);
	$sqlt = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
	$run_query = mysqli_query($con,$sqlt);
	$count = mysqli_num_rows($run_query);
	if($count == 1){
		$row = mysqli_fetch_array($run_query);
		$_SESSION["id"] = $row["id"];
		$_SESSION["name"] = $row["name"];  
                echo "login_success";
			
                        header('location: shop.php');
                        exit();
		}else {
                    echo "
			<div class='alert alert-warning'>
				<a href='index.php' class='close' data-dismiss='alert' aria-label='close'><h3>&times;</h3></a>
				<b><h3>Please register before login..!</h3></b>
			</div>
		";
		exit();
		}
                
}
?>
    
