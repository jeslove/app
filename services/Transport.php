<?php 
namespace services\Transport;
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Transport
{
	public static function registrationEmail($address,$user, $token)
    {
		$mail = new PHPMailer(true);
		
        try {
            //Recipients
			$mail->setFrom('no-replay@email.com', 'Authentic Africa');
			$mail->addAddress("$address");  
			$mail->addReplyTo('no-replay@email.com', 'Authentic Africa');             
            // Content
            $mail->isHTML(true);     
            $mail->Subject = 'Account Activation.';
            $mail->addEmbeddedImage('assets/images/logo.png', 'logo');
            $mail->Body    = '
				<div align="center">
					<div style="width:500px;">
						<article style="background-color:white;  margin-top: 0px;  padding: 30px;">
						<div align="center"><img src="cid:logo"></div>
						<p style="font-size:20px;font-weight:500">Hello!, ' . $user . '</p>
						<h4 align="center">Welcome to Africa Craft Store.</h4>
						<p align="center">
						Let Get started by Setting up our Password.
						</p>
						<p align="center">
						Kindly click on the button below to setup your password.
						</p>
						<br/>
						<a href="'.URL.'setpassword/index/' . $token . '" style="background:#2d9add;padding:12px;color:#fff;text-decoration:none;">Setup Password.</a>
						<h4 align="left">Thanks.</h4>
						<h4 align="left">Support Team.</h4>
						</article>
					</div>
				</div>';
            $mail->send();
        } 
        catch (Exception $e)
        {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
	}
	
	public static function forgotMail($address,$token)
	{
		try{
			$mail = new PHPMailer(true);
			//Recipients
			$mail->setFrom('no-replay@email.com', 'Authentic Africa');
			$mail->addAddress("$address");   
			$mail->addReplyTo('no-replay@email.com', 'Authentic Africa'); 
            $mail->isHTML(true);     
			$mail->Subject = 'Forgot Password';
			$mail->addEmbeddedImage('assets/images/logo.png', 'logo');
            $mail->Body    = '
				<div align="center">
					<div style="width:500px;">
						<article style="background-color:white;  margin-top: 0px;  padding: 30px;">
						<div align="center"><img src="cid:logo"></div>
						<p style="font-size:20px;font-weight:500">Hello!, ' . $address . '</p>
						<h4 align="center">Welcome to Authentic Africa Password Reset Centre.</h4>
						<p align="center">
						Let Get started by Setting up a new password by clicking on the link below.
						</p>
						<br/>
						<a href="'.URL.'setpassword/resetpassword/' . $token . '" style="background:#2d9add;padding:12px;color:#fff;text-decoration:none;">Setup new password.</a>
						<h4 align="left">Thanks.</h4>
						<h4 align="left">Authentic Africa Surpport Team.</h4>
						</article>
					</div>
				</div>';
            $mail->send();
		}
		catch (Exception $e)
        {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
	}


	public static function sendmail($address,$titles,$bodys)
	{
		$mail = new PHPMailer(true);
		$mail->setFrom('no-replay@email.com', 'Authentic Africa');
		$mail->addAddress("$address");   
		$mail->addReplyTo('no-replay@email.com', 'Authentic Africa');
		$mail->isHTML(true);     
		$mail->Subject = "$titles";
		$mail->addEmbeddedImage('assets/images/logo.png', 'logo');
		$mail->Body= '<div style="text-align:center;">
		<div align="center"><img src="cid:logo" width="150"></div>
		   <p style="white-space:pre-line;">'.$bodys.'</p>
		</div>';
		$mail->send();
	}



	public static function verificationmail($address,$codes)
	{
		
		$mail = new PHPMailer(true);

		// $mail->isSMTP();
		// $mail->Host       = EMAIL_SMTP_HOST;      
		// $mail->SMTPAuth   = EMAIL_SMTP_AUTH;    
		// $mail->Username   = EMAIL_SMTP_USERNAME;   
		// $mail->Password   = EMAIL_SMTP_PASSWORD;  
		// $mail->SMTPSecure = EMAIL_SMTP_SECURE;  
		// $mail->Port       = EMAIL_SMTP_PORT;

		$mail->setFrom('no-replay@email.com', 'Authentic Africa');

		$mail->addAddress("$address");  //add to email  

		$mail->addReplyTo("no-replay@email.com", 'Authentic Africa');  //add replay to email

		$mail->isHTML(true); 

		$mail->Subject = "Please verify your device";

		$mail->addEmbeddedImage('assets/images/logo.png', 'logo');

		$body  = $mail->Body = "";
		$body .= "Dear  Member, \n\n A sign in attempt requires further verification because we did not recognize your device. 
		To complete the sign in, enter the verification code on the unrecognized device.: ";

		$body .= "\n\nVerification code:".$codes."";

		$body .= "\n\nIf you did not attempt to sign in to your account, your password may be compromised.";

		$body .= "\n\nPlease consider changing your account password and create strong password for your Authentic Africa account..";

		$body .= "\n\nRegards\nAuthentic Africa";

		return ($mail->send()) ? true : false;
	}

}