
<?php 
	/*Update credentials*/
	define('EMAIL', '');
	define('PASS', '');
 ?>
	<?php 
		   $generator = "1357902468";
  
		   // Iterate for n-times and pick a single character
		   // from generator and append it to $result
			 
		   // Login for generating a random character from generator
		   //     ---generate a random number
		   //     ---take modulus of same with length of generator (say i)
		   //     ---append the character at place (i) from generator to result
		 
		   $result = "";
		   $resultF = "";
		 
		   for ($i = 1; $i <= 4; $i++) {
			   $result .= substr($generator, (rand()%(strlen($generator))), 1);
		   }
		
		   	session_start();
			$_SESSION['otp']=$result;
		   //otp_gen_END


		if($_SERVER['REQUEST_METHOD']=="POST") {
			require 'PHPMailerAutoload.php';
			include 'partial/_dbConnect.php';

			$verifyEmail=$_POST['verifyEmail'];
			$_SESSION['verifyEmail']=$verifyEmail;

			$checkUser= "SELECT * FROM `users` WHERE userEmail='$verifyEmail'";
			$checkUser_result= mysqli_query($conn,$checkUser);
	
			 // checking no of rows 
			$noOfRows= mysqli_num_rows($checkUser_result);
	
			if($noOfRows>0){
				$alert='"'.$verifyEmail.'" This Email Id is already used.';
				$_SESSION['alert']=$alert;
				header('Location:home.php');
			}
			else{
			
				$mail = new PHPMailer;

				// $mail->SMTPDebug = 4;                               // Enable verbose debug output

				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'tls://smtp.gmail.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'gokuamin720@gmail.com';                 // SMTP username
				$mail->Password = 'orux yaew jxla owkk';                           // SMTP password
				
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    // TCP port to connect to

				$mail->setFrom(EMAIL, 'Dsmart Tutorials');
				$mail->addAddress($_POST['verifyEmail']);     // Add a recipient or address we want to sent to

				// $mail->addReplyTo(EMAIL);
				// print_r($_FILES['file']); exit;
				// for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
				// 	$mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
				// }
				// $mail->isHTML(true);                                  // Set email format to HTML
				$resultF="Hi, Your One Time Password(OTP) for registration on Covid Win app is ".$result.". Please do not share this with anybody. ";
				$mail->Subject = "Verify Your Email for Vaccine Registration!";
				$mail->Body    = $resultF;
				// $mail->AltBody = "$_POST['message']";

				if(!$mail->send()) {
					
					unset($_SESSION['otp']);
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
				} else {
					$_SESSION['otpSent']="True";
					// echo 'Message has been sent';
					// header('Location: /FoodFest/account.php?otpSent=1');
					echo "<script>document.location = 'regi.php'</script>";
				}
			}
		}


		
	 ?>
	 