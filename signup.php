<!DOCTYPE html>
<?php
include 'common.php';
if (isset($_SESSION['name']))
    { header('location: shop.php');
   }
?>

<html>
    <head> 
    <title>BOOK Store</title> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="index.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
    <script type="text/javascript" src="bootstrap/js/jquery-3.1.1.min.js"></script>
    <body>
        <!--navigation bar-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                     
                    </button>
                    <a class="navbar-brand" href="index.php">DONATION FOR SMILE</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="about.php"><span class="glyphicon glyphicon-bed"></span> About Us</a></li>
                        <li><a href="contact.php"><span class="glyphicon glyphicon-phone"></span> Contact Us</a></li> 
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid" style="background-color: rosybrown">
        
    <div class="col-md-offset-1 col-md-4">
        <br><br><br><br><br><br><br>
    <img src="img_avatar.png" alt="Avatar" class="avatar">
    </div>
    <div class="col-md-6">
        <div class="jumbotron">
        <legend>
            <h2>REGISTER</h2>
        </legend>
            <form method="POST" action="signup_go.php" class="form-horizontal">

            <div class="form-group">
                <label>Name</label>
                <div class="col-md-12 input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" id="name" name="name" placeholder="Enter your name.." class="form-control" required>
            </div>
            </div>
        <div class="form-group">
    <label>E-mail</label>
    <div class="col-md-12 input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input type="email" id="email" name="email" placeholder="Enter your mail id.." class="form-control" required>
            </div>
        </div>
        <div class="form-group">
    <label>Password</label>
    <div class="col-md-12 input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="password" id="password" name="password" placeholder="Enter your password.." class="form-control" required>
            </div>
        </div>
    <div class="form-group">
    <label>Re-Type Password</label>
    <div class="col-md-12 input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input type="password" id="repassword" name="repassword" placeholder="Enter your password again.." class="form-control" required>
            </div>
        </div>
            <div class="form-group">
            <label>Contact</label>
            <div class="col-md-12 input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
            <input type="text" id="contact" name="contact" placeholder="Enter your 10 digit number.." class="form-control" required>
            </div>
            </div>
            <div class="form-group">
            <label>City</label>
            <div class="col-md-12 input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
            <input type="text" id="city" name="city" placeholder="Enter your city.." class="form-control" required>
            </div>
            </div>
        <div class="form-group">
            <label>Address</label>
            <div class="col-md-12 input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input type="text" id="address" name="address" placeholder="Enter your address.." class="form-control" required>
            </div>
        </div>
    <div class="form-group">
        
        <button type="submit" name="register" value="submit" class="btn btn-primary" style="border-radius: 12px;" >SUBMIT</button>
    </div>
    </form>
        </div>
    </div>
    </div>
        </div>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
