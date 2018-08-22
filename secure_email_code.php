<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST["submit"])){
	// if($_POST["vname"]=="" ||
	//    $_POST["vemail"]==""||
	//    $_POST["vdesign"]==""||
	//    $_POST["grp2"]==""||
	//    $_POST["abc"]==""||
	//    $_POST["checkbox"]==""||
	//    $_POST["datepicker"]=="")
	// {
	// 	echo "Fill All Fields..";
	// }
	// else
	// {
		$email=$_POST['vemail'];

		$email =filter_var($email, FILTER_SANITIZE_EMAIL);

		$email= filter_var($email, FILTER_VALIDATE_EMAIL);
		if (!$email){
			echo "Invalid Sender's Email";
		}
		else
		{
			$message = $_POST['vdesign'];

			$body = $_POST['vname']." ".$_POST['vemail']." ".$_POST['vdesign']." ".$_POST['grp2']." ".$_POST['abc']." ".$_POST['checkbox']." ".$_POST['datepicker']." ";
			

			$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
			try {
			    //Server settings
			    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
			    $mail->isSMTP();                                      // Set mailer to use SMTP
			    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			    $mail->SMTPAuth = true;                               // Enable SMTP authentication
			    $mail->Username = 'mayu11vyas@gmail.com';                 // SMTP username
			    $mail->Password = '1234';                           // SMTP password
			    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			    $mail->Port = 587;                                    // TCP port to connect to

			    //Recipients
			    $mail->setFrom('mayu11vyas@gmail.com', 'Mayur Vyas');
			    $mail->addAddress($email);     // Add a recipient


			    //Content
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = $subject;
			    $mail->Body    = $body;
			    $mail->send();
			    header('Location: ' . $_SERVER['HTTP_REFERER']);
			    echo 'Message has been sent';
			} catch (Exception $e) {
			    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			}	
		// }
	}
}
?>