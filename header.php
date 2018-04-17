<!DOCTYPE html>
<html>
    <head> 
</head>
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
                    <?php if (isset($_SESSION['name'])) 
            { 
     echo '<a class="navbar-brand" href="shop.php">Welcome '.($_SESSION['name']).'</a>';
                     }
            else {
                ?>
                  <a class="navbar-brand" href="index.php">DONATION FOR SMILE</a>
                  <?php
            }
            ?>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">

<?php if (isset($_SESSION['name'])) 
            { ?> 
                        <li><a href="cart.php"><span class="label label-info "><?php echo counter(); ?></span> <span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
    <li><a href="#" data-toggle="modal" data-target="#myModalset"><span class="glyphicon glyphicon-user"></span>Settings</a></li>
    <li><a href="logout.php"><span class="glyphicon glyphicon-lock"></span>Logout</a></li>
    <a href="give_book.php"><button class="btn btn-warning navbar-btn">Donate Your BOOK!</button></a>
            <?php }
            else {
                ?>
    <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
   <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
   <li><a href="about.php"><span class="glyphicon glyphicon-bed"></span> About Us</a></li>
   <li><a href="contact.php"><span class="glyphicon glyphicon-phone"></span> Contact Us</a></li>
   <button class="btn btn-warning navbar-btn" data-toggle="modal" data-target="#myModal">Donate Your BOOK!</button>
       <?php
            }
            ?>
                    </ul>
                    
                </div>
            </div>
        </nav>
        <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">LOGIN</h3>
      </div>
        <form method="POST" action="login_kar.php" class="form-horizontal">
      <div class="modal-body">
          <p>Don't have an account? <a href="signup.php"> Register</a></p>
          <!-- form-->
          
  <div class="form-group">
    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-9 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-9 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
      </div>
        <!--form-->
      <div class="modal-footer">
          <button type="submit" name="register" value="submit" class="buton btn btn-primary" >Login</button>
      </div>
        </form>
    </div>
  </div>
</div>
        
        <div id="myModalset" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title"><center> Account Settings </center></h3>
      </div>
      <div class="modal-body">
          <div class="col-sm-4">
              <a href="editset.php"> <button class="btn btn-success">Edit Your Account</button></a>
          </div>
          <div class="col-sm-4">
              <a href="settings.php"> <button class="btn btn-success">Change Password</button></a>
          </div>
          <div class="col-sm-4">
              <a href="deaacc.php"> <button class="btn btn-success">Deactivate Account</button></a>
          </div>
      </div>
    </div>
  </div>
</div>
          </body>
</html>
<?php 
function counter()
{
  $con = mysqli_connect("localhost", "root", "", "store") or die(mysqli_error($con));
    $u_id=$_SESSION['id'];
            $select_query = "SELECT * FROM users_items WHERE user_id='$u_id' ";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
      $count_pro = mysqli_num_rows($select_query_result);
      if($count_pro > 0)
      {return $count_pro;
      }
      else {
          return ;    
      }
}