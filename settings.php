<!DOCTYPE html>
<?php
require 'common.php';
if ( !isset($_SESSION['name']))
    { header('location: index.php');
   }
if(isset($_POST['pass_submit']))
 {
$op = $_POST['old-password'];
        $np = $_POST['new-password'];
	$rnp = $_POST['rnew-password'];
        $op= md5($op);
        $name=$_SESSION['name'];
        if($np != $rnp){
            echo "<script type='text/javascript'>alert('Password is not matching !')</script>";
                        echo "<script type='text/javascript'>window.open('settings.php','_self')</script>";
                        exit();
	}
        $np= md5($np);
           $sql1 = "SELECT id FROM users WHERE password='$op' LIMIT 1" ;
	$check_query1 = mysqli_query ($con,$sql1);
	$count_pas = mysqli_num_rows ($check_query1);
	if($count_pas > 0)
            {     
         $sqlmt = "UPDATE users SET password='$np' WHERE name='$name' AND password='$op' LIMIT 1" ;
	$update_query1 = mysqli_query ($con,$sqlmt);
        echo "<script>alert('Password successfully changed..')</script>";
        if(mysqli_query($con,$update_query1)){
                        echo "<script type='text/javascript'>window.open('settings.php','_self')</script>";
                        exit();
		}
            }
 else {
     echo "<script type='text/javascript'>alert('Your Old Password is incorrect !')</script>";
                        echo "<script type='text/javascript'>window.open('settings.php','_self')</script>";
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
     <div class="jumbotron">
        <legend>
            <h2>Change Password</h2>
        </legend>
         <form method="POST" action="settings.php" class="form-horizontal">
            <div class="form-group">
                <label>Old Password</label>
                <div class="col-md-12 input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" name="old-password" id="old-password" placeholder="Enter your password.." class="form-control" required>
            </div>
            </div>
        <div class="form-group">
    <label>New Password</label>
    <div class="col-md-12 input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="password" name="new-password" id="new-password" placeholder="Enter your new password.." class="form-control" required>
            </div>
        </div>
        <div class="form-group">
    <label>Re-Type New Password</label>
    <div class="col-md-12 input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="password" name="rnew-password" id="rnew-password" placeholder="Re-Enter your new password.." class="form-control" required>
            </div>
        </div>
             <div class="form-group" style="text-align: right;">
                    <button type="submit" name="pass_submit" value="submit" class="btn btn-primary" style="border-radius: 12px;" >SUBMIT</button>
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
