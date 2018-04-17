<!DOCTYPE html>
<?php
require 'common.php';
if ( !isset($_SESSION['name']))
    { header('location: index.php');
   }
 $n=$_SESSION['name'];  
if(isset($_POST['edit_submit']))
 {
    $user_name = $_POST['name'];
        $email = $_POST['email'];
	$contact = $_POST['contact'];
	$city = $_POST['city'];
	$address = $_POST['address'];
	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";
        //form data right type matching
        if(!preg_match($name,$user_name)){
            echo "<script type='text/javascript'>alert('This $user_name is not valid..!')</script>";
                        echo "<script type='text/javascript'>window.open('editset.php','_self')</script>";
                        exit();
	}
	if(!preg_match($emailValidation,$email)){
	echo "<script type='text/javascript'>alert('This $email is not valid..!')</script>";
                        echo "<script type='text/javascript'>window.open('editset.php','_self')</script>";
                        exit();	
	}
	if(!preg_match($number,$contact)){
	echo "<script type='text/javascript'>alert('Mobile number $contact is not valid..!')</script>";
                        echo "<script type='text/javascript'>window.open('editset.php','_self')</script>";
                        exit();	
	}
	if(!(strlen($contact) == 10)){
	echo "<script type='text/javascript'>alert('Mobile number $contact must be 10 digit..!')</script>";
                        echo "<script type='text/javascript'>window.open('editset.php','_self')</script>";
                        exit();		
	}
        //email address already in our database
	$sql1 = "SELECT id FROM users WHERE email = '$email' AND name != '$n' LIMIT 1" ;
	$check_query1 = mysqli_query ($con,$sql1);
	$count_email = mysqli_num_rows ($check_query1);
	if($count_email > 0){
	echo "<script type='text/javascript'>alert('Email Address is already used. Try Another email address !')</script>";
                        echo "<script type='text/javascript'>window.open('editset.php','_self')</script>";
                        exit();		
	} 
        //same username already in our database
	$sql2 = "SELECT name FROM users WHERE name = '$user_name' AND name != '$n' LIMIT 1" ;
	$check_query2 = mysqli_query ($con,$sql2);
	$count_name = mysqli_num_rows ($check_query2);
	if($count_name > 0){
		echo "<script type='text/javascript'>alert('User Name is already used. Try Another User Name !')</script>";
                        echo "<script type='text/javascript'>window.open('editset.php','_self')</script>";
                        exit();	
	} 
         $sqlmt = "UPDATE users SET name='$user_name',email='$email',contact='$contact',city='$city',address='$address' WHERE name = '$n'" ;
	$update_query1 = mysqli_query ($con,$sqlmt);
        echo "<script>alert('Account details successfully changed..')</script>";
        if($user_name!=$n)
        {
        echo "<script>alert('Log OUT & Log IN again for getting the changes made and using your account properly.')</script>";
        }
                    if(mysqli_query($con,$update_query1)){
                     echo "<script type='text/javascript'>window.open('editset.php','_self')</script>";   
                        exit();
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
</head>
    <body>
        <?php
        include 'header.php';
        ?>
        <!--mid-->
    <div class="container">
        <br>
        <br><br>
     <div class="jumbotron">
        <legend>
            <h2>Edit Account Details</h2>
        </legend>
             <form method="POST" action="editset.php" class="form-horizontal">
                 <?php
                         $nam=$_SESSION['name'];
                         $sqlg = "SELECT * FROM users WHERE name = '$nam'" ;
	                 $gets_query1 = mysqli_query ($con,$sqlg);
                         $rowt = mysqli_fetch_array($gets_query1);
                         ?>
            <div class="form-group">
                <label>Name</label>
                <div class="col-md-12 input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" id="name" name="name" value="<?php echo $nam; ?>" class="form-control" required>
            </div>
            </div>
        <div class="form-group">
    <label>E-mail</label>
    <div class="col-md-12 input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input type="email" id="email" name="email" value="<?php echo $rowt['email'];?>" class="form-control" required>
            </div>
        </div>
            <div class="form-group">
            <label>Contact</label>
            <div class="col-md-12 input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input type="text" id="contact" name="contact" value="<?php echo $rowt['contact'];?>" class="form-control" required>
            </div>
            </div>
            <div class="form-group">
            <label>City</label>
            <div class="col-md-12 input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                <input type="text" id="city" name="city" value="<?php echo $rowt['city'];?>" class="form-control" required>
            </div>
            </div>
        <div class="form-group">
            <label>Address</label>
            <div class="col-md-12 input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input type="text" id="address" name="address" value="<?php echo $rowt['address'];?>" class="form-control" required>
            </div>
        </div>
    <div class="form-group">
        
        <button type="submit" name="edit_submit" value="submit" class="btn btn-primary" style="border-radius: 12px;" >SUBMIT</button>
    </div>
    </form>
     </div>
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
