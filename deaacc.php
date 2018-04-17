<!DOCTYPE html>
<?php
require 'common.php';
if ( !isset($_SESSION['name']))
    { header('location: index.php');
   }
if(isset($_POST['del_submit']))
 {
$pas = $_POST['password'];
        $pas= md5($pas);
        $name=$_SESSION['name'];
           $sql1 = "SELECT id FROM users WHERE password='$pas' LIMIT 1" ;
	$check_query1 = mysqli_query ($con,$sql1);
	$count_pas = mysqli_num_rows ($check_query1);
	if($count_pas > 0)
            {  
             $u_id=$_SESSION['id'];
        $sqldg = "DELETE FROM users_items WHERE user_id='$u_id'" ;
	$del_query1g = mysqli_query ($con,$sqldg);
         $sqld = "DELETE FROM users WHERE name='$name' AND password='$pas' LIMIT 1" ;
	$del_query1 = mysqli_query ($con,$sqld);
        echo "<script>alert('Your account deleted successfully..')</script>";
   header('location: logout.php');
   exit();
            }
 else {
     echo "<script type='text/javascript'>alert('Your Password is incorrect !')</script>";
                        echo "<script type='text/javascript'>window.open('deaacc.php','_self')</script>";
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
        <br>
        <br>
        <br>
        <br>
     <div class="jumbotron col-md-offset-3 col-md-6">
        <legend>
            <h2 style="text-align: center;">Deactivate Account</h2>
        </legend>
         <form method="POST" action="deaacc.php" class="form-horizontal">
            <div class="form-group">
                <label>Password</label>
                <div class=" col-md-12 input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" name="password" id="password" placeholder="Enter your password.." class="form-control" required>
            </div>
                <br><br>
            </div>
             <div class="form-group" style="text-align: center;">
                    <button type="submit" name="del_submit" value="submit" class="btn btn-primary" style="border-radius: 12px;" >DEACTIVATE</button>
    </div>
    </form>
     </div>
        
    </div>
        <p></p><br>
        <p><br></p><br><p></p>
        <p></p><br>
        <br><p></p>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
