<!DOCTYPE html>
<?php
require 'common.php';
if (isset($_SESSION["name"]))
    { header('location: shop.php'); }
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
        <div class="container-fluid">
  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2500">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="carousel-content" style=" background-color: rgba(0, 0, 0, 0.7); ">
            <br>
            <p><h1>We sell books for Good</h1></p><br>
                <a href="products.php" class=" btn btn-danger
                   btn-lg active" data-toggle="modal" data-target="#myModal">SHOP NOW </a>
        </div>    

      <div class="item active">
          <img src="GTS-1.jpg" alt="kaise" style="width:100%; height: 660px;">
        
      </div>

      <div class="item">
          <img src="GTS-2.jpg" alt="mein" style="width:100%;height: 660px;">
        
      </div>
    
      <div class="item">
          <img src="GTS-3.jpg" alt="kahun" style="width:100%;height: 660px;">
      </div>
        <div class="item">
            <img src="GTS-4.jpg" alt="tujhse" style="width:100%;height: 660px;">
      </div>
        <div class="item">
            <img src="GTS-5.jpeg" alt="rehena" style="width:100%;height: 660px;">
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      
    </a>
  </div>
</div>
<!--collection gallery-->
    <div class="container">
  <h2>Our Collection</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
          <img src="primary.jpg" alt="tum" style="width:100%">
          <div class="caption" style="text-align: center" >
              <h3>Primary School</h3>
            <p>This category involve class from 1st to 5th</p>
            <a href="#" class=" btn btn-primary
                   btn-md active" data-toggle="modal" data-target="#myModal">Order Now!</a>
          </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
          <img src="middle.png" alt="mere" style="width:100%">
          <div class="caption" style="text-align: center">
            <h3>Middle School</h3>
            <p>This category involve class from 6th to 8th</p>
            <a href="#" class=" btn btn-primary
                   btn-md active" data-toggle="modal" data-target="#myModal">Order Now!</a>
          </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
          <img src="secondary.jpg" alt="Ho" style="width:100%">
          <div class="caption" style="text-align: center">
            <h3>Secondary School</h3>
            <p>This category involve class from 9th to 12th</p>
            <a href="#" class=" btn btn-primary
                   btn-md active" data-toggle="modal" data-target="#myModal">Order Now! </a>
          </div>
       </div>
    </div>
  </div>
</div>
<?php
        include 'footer.php';
        ?>
    </body>
</html>
