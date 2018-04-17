<!DOCTYPE html>
<?php
require 'common.php';
if (!isset($_SESSION['name']))
    { header('location: index.php'); 
    }
if(isset($_POST['doc_ver']))
{
    $names=$_POST['namy'];
    $adhaarno=$_POST['aadhaar-no'];
    $license=$_POST['lno'];
    $jobdc=$_FILES['jobdoc']['name'];
    $jobdc_tmp = $_FILES['jobdoc']['tmp_name'];
    $numberi = "/^[0-9]{4}-[0-9]{4}-[0-9]{4}$/";
    if(!preg_match($numberi,$adhaarno)){
                        echo "<script type='text/javascript'>alert('Aadhaar number $adhaarno is not valid !')</script>";
                        echo "<script type='text/javascript'>window.open('docver.php','_self')</script>";
		exit();
	}
        move_uploaded_file($jobdc_tmp,"document_verification/$jobdc");
         $u_id=$_SESSION['id'];
         $user_name=$_SESSION['name'];
         $spd="SELECT email FROM users WHERE id='$u_id'";
         $run= mysqli_query($con, $spd);
         $r= mysqli_fetch_array($run);
         $email=$r['email'];
         define('my_mail',"pratyushran@gmail.com");
                define('my_pass',"Pratyush@1999");
                require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();   
// don't change the quotes!
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->Host ='smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = my_mail;                 // SMTP username
$mail->Password = my_pass;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(my_mail,'Donation For Smile');
$mail->addAddress($email,'user');     // Add a recipient
           // Name is optional
$mail->addReplyTo(my_mail);
      // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "Order Confirmation";
$mail->Body    = "<html><p>Hello dear <b style='color:blue;'>$user_name</b> you have ordered some products from our website DonationforSmile.com, your document verification is completed and your order will be deliver shortly. Thank you!</p>
				<h3>Please go to your account and see your order details!</h3>
				<h3> Thank you for your order. </h3>
			</html>
			";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

    $sq1t = "DELETE FROM `users_items` WHERE user_id='$u_id'" ;
	$check_q1 = mysqli_query ($con,$sq1t);
        echo "<script>alert('Your order has been registered and document has been sent to verify. In 2 days the delivery process will start and you will be informed through mail.')</script>";
        $doc_adv = "INSERT INTO `doc_verify` 
		(`name`, `adhaar_no`, 
		`license`, `document`) 
		VALUES ('$names', '$adhaarno','$license','$jobdc')";
		$run_query = mysqli_query($con,$doc_adv)or die(mysqli_error($con));
		if($run_query){
			echo "<script type='text/javascript'>window.open('docver.php','_self')</script>";    
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
        <div class="container-fluid" style="background-color: rgba(0,0,0,0.2)">
                <br>
                                <br>

                                                <br>

                                                <br>

                <div class="col-md-6">
                    <legend>
                        <h4>Delivery Information</h4>
                    </legend>
                    <?php
                         $nam=$_SESSION['name'];
                         $sqlg = "SELECT * FROM users WHERE name = '$nam'" ;
	                 $gets_query1 = mysqli_query ($con,$sqlg);
                         $rowt = mysqli_fetch_array($gets_query1);
                         ?>
                    <p><h2>
                        <br>
                    <?php echo $rowt['name'];?><br> 
                    <?php echo $rowt['contact'];?><br>
                    <?php echo $rowt['address'];?><br><?php echo $rowt['city'];?></h2>
                    <br>
                    To change address <a href="editset.php" style="text-decoration: none;">Click here</a>.
                    </p>
                </div>     
                      <br><br>                       
    <div class="col-md-6">
        
        <legend>
            <h4>Document Verification</h4>
        </legend>
        <p>For any query please contact us directly.</p>
        <form method="POST" action="docver.php" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
                <label >Name</label>
            <input type="text" id="namy" name="namy" placeholder="Enter your name.." class="form-control" required>
            </div>
            <div class="form-group">
            <label>Aadhaar Card Number</label>(format:- xxxx-xxxx-xxxx)
            <input maxLength="14" type="text" pattern="^\d{4}-\d{4}-\d{4}$" name="aadhaar-no" id="aadhaar-no" placeholder="Enter your 12 digit aadhaar number.." class="form-control" required>
            </div>
           <div class="form-group">
            <label>Government School License Number</label>
            <input type="text" id="lno" name="lno" placeholder="Enter your 10 digit number.." class="form-control" required>
            </div>
            <div class="form-group">
            <label>Upload job identification document</label>
            <input type="file" id="jobdoc" name="jobdoc" class="form-control">
            <b class="help-block" style="font-size: 10px;">HINT :- <i>You have to upload a document to verify that you are a Principal or teacher of the mentioned government school.</i></b>
            </div>
    <div class="form-group">
        <button type="submit" name="doc_ver" value="submit" class="btn btn-primary" style="border-radius: 12px;" >SUBMIT</button></a>
    </div>
        
    </form>
        <br><p></p>
            </div>
            <p>
                                                </p>
             <br><br><br><p></p>                                     
            </div>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
