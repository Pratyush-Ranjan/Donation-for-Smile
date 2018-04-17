<!DOCTYPE html>
<html>
    <head> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
</head>        
<?php
include 'common.php';       
$user_name = $_POST['name'];
        $email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$contact = $_POST['contact'];
	$city = $_POST['city'];
	$address = $_POST['address'];
	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";
        //form data right type matching
        if(!preg_match($name,$user_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='signup.php' class='close' data-dismiss='alert' aria-label='close'><h3>&times;</h3></a>
				<b><h3>This $user_name is not valid..!</h3></b>
			</div>
		";
		exit();
	}
	if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='signup.php' class='close' data-dismiss='alert' aria-label='close'><h3>&times;</h3></a>
				<b><h3>This $email is not valid..!</h3></b>
			</div>
		";
		exit();
	}
	if(strlen($password) < 6 ){
		echo "
			<div class='alert alert-warning'>
				<a href='signup.php' class='close' data-dismiss='alert' aria-label='close'><h3>&times;</h3></a>
				<b><h3>Password is weak must be greater than 6 characters</h3></b>
			</div>
		";
		exit();
	}
	if(strlen($repassword) < 6 ){
		echo "
			<div class='alert alert-warning'>
				<a href='signup.php' class='close' data-dismiss='alert' aria-label='close'><h3>&times;</h3></a>
				<b><h3>Password is weak must be greater than 6 characters</h3></b>
			</div>
		";
		exit();
	}
	if($password != $repassword){
		echo "
			<div class='alert alert-warning'>
				<a href='signup.php' class='close' data-dismiss='alert' aria-label='close'><h3>&times;</h3></a>
				<b><h3>Password is not same<h3></b>
			</div>
		";
                exit();
	}
	if(!preg_match($number,$contact)){
		echo "
			<div class='alert alert-warning'>
				<a href='signup.php' class='close' data-dismiss='alert' aria-label='close'><h3>&times;</h3></a>
				<b><h3>Mobile number $contact is not valid</h3></b>
			</div>
		";
		exit();
	}
	if(!(strlen($contact) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='signup.php' class='close' data-dismiss='alert' aria-label='close'><h3>&times;</h3></a>
				<b><h3>Mobile number $contact must be 10 digit</h3></b>
			</div>
		";
		exit();
	}
	//email address already in our database
	$sql1 = "SELECT id FROM users WHERE email = '$email' LIMIT 1" ;
	$check_query1 = mysqli_query ($con,$sql1);
	$count_email = mysqli_num_rows ($check_query1);
	if($count_email > 0){
		echo "
			<div class='alert alert-warning'>
				<a href='signup.php' class='close' data-dismiss='alert' aria-label='close'><h3>&times;</h3></a>
				<b><h3>Email Address is already used. Try Another email address</h3></b>
			</div>
		";
		
                exit();
	} 
        //same username already in our database
	$sql2 = "SELECT name FROM users WHERE name = '$user_name' LIMIT 1" ;
	$check_query2 = mysqli_query ($con,$sql2);
	$count_name = mysqli_num_rows ($check_query2);
	if($count_name > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='signup.php' class='close' data-dismiss='alert' aria-label='close'><h3>&times;</h3></a>
				<b><h3>User Name is already used. Try Another User Name</h3></b>
			</div>
		";
		exit();
	} 
        $user_name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
		$password = md5($password);
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

$mail->Subject = 'Confirmation for registration';
$mail->Body    = "<html><p>Hello dear <b style='color:blue;'>$user_name</b> this is a confirmation mail as you have registered on our website DonationforSmile.com. Thank you !</p> <h3>Please go to your account and donate or buy books for free !</h3></html>";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

		$user_registration = "INSERT INTO `users` 
		(`id`, `name`, `email`, 
		`password`, `contact`, `city`, `address`) 
		VALUES (NULL, '$user_name','$email', 
		'$password', '$contact', '$city', '$address')";
		$run_query = mysqli_query($con,$user_registration)or die(mysqli_error($con));
		$_SESSION["id"] = mysqli_insert_id($con);
		$_SESSION["name"] = $user_name;  
                if($run_query){
			echo "User successfully registered";
			header('location: shop.php');
		}
?>
