<!DOCTYPE html>
<?php
require 'common.php';
if (isset($_SESSION['name']))
    { header('location: shop.php'); }
?>
<html>
    <head> 
    <title>BOOK Store</title> 
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
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
          <div class="container-fluid conto">
                <br>
                                <br>

                                                <br>

                                                <br>

                <div class="col-md-6">
                    <legend>
                        <h4>CONTACT INFO</h4>
                    </legend>
                    <ul>
                        <li>
                            <p></p>
                            <address>
                                <i class="glyphicon glyphicon-map-marker"></i>
                                 D-101,ABV-Indian Institute of Information Technology & Management<br>    Morena Link Road, Gwalior-474015
                            </address>
                        </li>
                        <li>
                            <i class="glyphicon glyphicon-earphone"></i>  +91 9598319698 <span class="badge">Idea</span>
                        </li>
                        <br>
                        <li>
                            <i class="glyphicon glyphicon-earphone"></i>  +91 8319650716 <span class="badge">Jio</span>
                        </li>
                        <br>
                        <li>
                            <span class="glyphicon glyphicon-envelope"></span>  pratyushr1102@gmail.com 
                        </li>
                        <br>
                        <br>
                        <br>
                    </ul>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18054.15707847123!2d78.16876836301645!3d26.245540297547144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf834069adc0c9b89!2sAtal+Bihari+Vajpayee+Indian+Institute+Of+Information+Technology+And+Management!5e0!3m2!1sen!2sin!4v1503946396073" height="243.125" width="540" style="border: none"></iframe>
                </div>
            
    <div class="col-md-6">
        
        <legend>
            <h4>SEND US A MESSAGE</h4>
        </legend>
        <p>For any query please contact us directly.We will respond for sure.</p>
        <form class="form-horizontal">
            <div class="form-group">
                <label >Name</label>
            <input type="text" name="name" placeholder="Enter your name.." class="form-control" required>
            </div>
            <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" placeholder="Enter your 10 digit number.." class="form-control" required>
            </div>
            <div class="form-group">
    <label>E-mail</label>
    <input type="email" name="email" placeholder="Enter your mail id.." class="form-control" required>
            </div>
            <div class="form-group">
    <label>Message</label>
    <textarea name="subject" placeholder="Enter your query.." style="height:100px;" class="form-control"></textarea>
            </div>
    <div class="form-group">
        
        <a href="#" data-toggle="tooltip" title="Thanks for contacting us!"><button type="submit" value="submit" class="btn btn-primary" style="border-radius: 12px;" >SUBMIT</button></a>
    </div>
        
    </form>
        <br><p></p>
            </div>
                                                  
            </div>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
