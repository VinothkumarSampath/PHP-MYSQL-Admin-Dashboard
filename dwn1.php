<?php
ob_start();
// Include config file
require_once "includes/config.php";
// Processing form data when form is submitted
if($_POST["submit"] == "Download2"){

//print_r($_POST); exit;

$oname = trim($_POST["ogname"]);
$cname = trim($_POST["name"]);
$cemail = trim($_POST["email"]);
$cphone = trim($_POST["phone"]);
$comments = trim($_POST["comments"]);
        
        // Prepare an insert statement
        
        $mail_content ='<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
    <!-- Web Font / @font-face : BEGIN -->
    <!--[if mso]>
        <style>
            * {
                font-family: Roboto, sans-serif !important;
            }
        </style>
    <![endif]-->

    <!--[if !mso]>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
    <![endif]-->

    <!-- Web Font / @font-face : END -->

    <!-- CSS Reset : BEGIN -->
    
    
    <style>
        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            font-family: Roboto, sans-serif !important;
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 24px;
            color:#8094ae;
            font-weight: 400;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
        }
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }
        a {
            text-decoration: none;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
    </style>

</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f5f6fa;">
	<center style="width: 100%; background-color: #f5f6fa;">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f6fa">
            <tr>
               <td style="padding: 40px 0;">
                    <table style="width:100%;max-width:620px;margin:0 auto;">
                        <tbody>
                            <tr>
                                <td style="text-align: center; padding-bottom:25px">
                                    <a href="#"><img style="height: 40px" src="https://camsinfotech.co.in/logilab-eln/admin/images/logo.png" alt="logo"></a>
                                 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
                        <tbody>
                            <tr>
                                <td style="text-align:left;padding: 30px 30px 20px">
                                    

             <p style="margin-bottom: 15px; color: #526484; font-size: 16px;">Organisation: '.$oname.'</p>
             <p style="margin-bottom: 15px; color: #526484; font-size: 16px;">Name: '.$cname.'</p>
             <p style="margin-bottom: 15px; color: #526484; font-size: 16px;">Email: '.$cemail.'</p>
             <p style="margin-bottom: 15px; color: #526484; font-size: 16px;">Phone: '.$cphone.'</p>
             <p style="margin-bottom: 15px; color: #526484; font-size: 16px;">Comments: '.$comments.'</p>
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width:100%;max-width:620px;margin:0 auto;">
                        <tbody>
                            <tr>
                                <td style="text-align: center; padding:25px 20px 0;">
                                    <p style="font-size: 13px;">Copyright © 2022 Agaram Technologies. All rights reserved.</p>
                                    </td>
                            </tr>
                        </tbody>
                    </table>
            </tr>
        </table>
    </center>
</body>
</html>';

     
     
      

     
     error_reporting(E_STRICT);
			
			
			require_once('mailer/class.phpmailer.php');
			//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
			
			$mail             = new PHPMailer();
			
			//$body             = file_get_contents('contents.html');
			$body = $mail_content;
			//$body             = preg_replace('/[\]/','',$body);
			
			$mail->IsSMTP(); // telling the class to use SMTP
			$mail->Host       = "camsinfotech.co.in"; // SMTP server
			$mail->SMTPDebug  =1;                    
				
			$mail->SMTPAuth   = true;                  
			$mail->Host       = "camsinfotech.co.in"; 
			$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
			$mail->Username   = "camsidrb"; // SMTP account username enquires@acewaterdelivery.com.au 
			$mail->Password   = "0yT7&}dtp73_";        // SMTP account password
		
			$mail->SetFrom('enquires@camsinfotech.co.in', $name);
			$mail->AddReplyTo($email,$name);
			$mail->Subject    = "Contact-Form";
			
			//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
			
			$mail->MsgHTML($body);
			
			
		//	$address1 = "manilols17@gmail.com";
			$address1 = "vin.cse80@gmail.com";
	        $mail->AddAddress($address1, "Info");
			
			
		
			if(!$mail->Send()) {
			   echo "Mailer Error: " . $mail->ErrorInfo; die; ?>
				<script type="application/javascript">
				window.location="contact.php?send=0#page";
				</script>
			<?php }else{ 
        
        

 error_reporting(E_STRICT);
			
			$clientcopy ='<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
    <!-- Web Font / @font-face : BEGIN -->
    <!--[if mso]>
        <style>
            * {
                font-family: Roboto, sans-serif !important;
            }
        </style>
    <![endif]-->

    <!--[if !mso]>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
    <![endif]-->

    <!-- Web Font / @font-face : END -->

    <!-- CSS Reset : BEGIN -->
    
    
    <style>
        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            font-family: Roboto, sans-serif !important;
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 24px;
            color:#8094ae;
            font-weight: 400;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
        }
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }
        a {
            text-decoration: none;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
    </style>

</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f5f6fa;">
	<center style="width: 100%; background-color: #f5f6fa;">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f6fa">
            <tr>
               <td style="padding: 40px 0;">
                    <table style="width:100%;max-width:620px;margin:0 auto;">
                        <tbody>
                            <tr>
                                <td style="text-align: center; padding-bottom:25px">
                                    <a href="#"><img style="height: 40px" src="https://camsinfotech.co.in/logilab-eln/admin/images/logo.png" alt="Agaram Tech"></a>
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
                        <tbody>
                            <tr>
                                <td style="text-align:left;padding: 30px 30px 20px">
                                  <p style="margin-bottom: 15px; color: #526484; font-size: 16px;">Hi '.$cname.' <br> Thank you for Contacting Agaram Technologies.</p>
                                   
<p style="margin-bottom: 15px; color: #526484; font-size: 16px;"> For issues/Feedback,</p>
<p style="margin-bottom: 15px; color: #526484; font-size: 16px;">Email: info@agaramtech.com</p>
<p style="margin-bottom: 15px; color: #526484; font-size: 16px;">Phone: +91 44 4208 2005</p>
<p style="margin-bottom: 15px;">This e-mail was sent from Agaram Technologies (https://www.agaramtech.com). </p>
                                 </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width:100%;max-width:620px;margin:0 auto;">
                        <tbody>
                            <tr>
                                <td style="text-align: center; padding:25px 20px 0;">
                                    <p style="font-size: 13px;">Copyright © 2022 Agaram Technologies. All rights reserved.</p>
                                    </td>
                            </tr>
                        </tbody>
                    </table>
               </td>
            </tr>
        </table>
    </center>
</body>
</html>';

			require_once('mailer/class.phpmailer.php');
			//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
			
			$mail             = new PHPMailer();
			
			//$body             = file_get_contents('contents.html');
			$body = $clientcopy;
			//$body             = preg_replace('/[\]/','',$body);
			
			$mail->IsSMTP(); // telling the class to use SMTP
			$mail->Host       = "camsinfotech.co.in"; // SMTP server
			$mail->SMTPDebug  =1;                    
				
			$mail->SMTPAuth   = true;                  
			$mail->Host       = "camsinfotech.co.in"; 
			$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
			$mail->Username   = "camsidrb"; // SMTP account username enquires@acewaterdelivery.com.au 
			$mail->Password   = "0yT7&}dtp73_";        // SMTP account password
		
			$mail->SetFrom('enquires@camsinfotech.co.in', $cname);
			$mail->AddReplyTo($cemail,$cname);
			$mail->Subject    = "Thank You";
			
			//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
			
			$mail->MsgHTML($body);
			
			
			$address1 = $cemail;
	        $mail->AddAddress($address1, "Info");
           
             
            
        if($mail->Send()) {
        $sql = "INSERT INTO `tblDownload`(`doname`, `dname`, `demail`, `dphone`, `dmessage`)  VALUES (?, ?, ?, ?, ?)";
		
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
			
            mysqli_stmt_bind_param($stmt, "sssss", $oname, $cname, $cemail, $cphone, $comments);
			
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){ 
              //Redirect to thank you page
                header("location: thank.php"); 
            } else{
                   //echo "no";
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    
	}
			}
    // Close connection
    mysqli_close($link);
}
?>