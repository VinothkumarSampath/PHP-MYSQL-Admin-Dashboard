<?php
ob_start();
// Include config file
require_once "includes/config.php";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

//print_r($_POST); exit;

$oname = trim($_POST["oname"]);
$cname = trim($_POST["cname"]);
$cemail = trim($_POST["cemail"]);
$cphone = trim($_POST["cphone"]);
$caddress = trim($_POST["caddress"]);
$country = trim($_POST["country"]);
        
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
             <p style="margin-bottom: 15px; color: #526484; font-size: 16px;">Address: '.$caddress.'</p>
             <p style="margin-bottom: 15px; color: #526484; font-size: 16px;">Country: '.$country.'</p>
                                    
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
			
			
			$address1 = "manilols17@gmail.com";
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
		
			$mail->SetFrom('enquires@camsinfotech.co.in', $name);
			$mail->AddReplyTo($email,$name);
			$mail->Subject    = "Thank You";
			
			//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
			
			$mail->MsgHTML($body);
			
			
			$address1 = $cemail;
	        $mail->AddAddress($address1, "Info");
           
        if($mail->Send()) {
        $sql = "INSERT INTO `tblcontact`(`cOrganisation`, `cName`, `cEmail`, `cPhone`, `cAddress`, `cCountry`)  VALUES (?, ?, ?, ?, ?, ?)";
		
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
			
            mysqli_stmt_bind_param($stmt, "ssssss", $oname, $cname, $cemail, $cphone, $caddress, $country);
			
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                //echo "yes";
                // Redirect to thank you page
                header("location: thankyou.php"); 
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
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
      <title>Contact Us - Agaramtech</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!--icon font css-->
      <link rel="stylesheet" href="vendors/themify-icon/themify-icons.css">
      <link rel="stylesheet" href="vendors/font-awesome/css/all.css">
      <link rel="stylesheet" href="vendors/flaticon/flaticon.css">
      <link rel="stylesheet" href="vendors/animation/animate.css">
      <link rel="stylesheet" href="vendors/owl-carousel/assets/owl.carousel.min.css">
      <link rel="stylesheet" href="vendors/animation/animate.css">
      <link rel="stylesheet" href="vendors/magnify-pop/magnific-popup.css">
      <link rel="stylesheet" href="vendors/elagent/style.css">
      <link rel="stylesheet" href="vendors/scroll/jquery.mCustomScrollbar.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">
   </head>
   <body>
      <div class="body_wrapper pricingPage">
         <?php include 'includes/header-inner.php';?>
         <section class="breadcrumb_area">
            <img class="breadcrumb_shap" src="img/breadcrumb/banner_bg.png" alt="">
            <div class="container pricingBanner">
               <div class="breadcrumb_content text-center">
                  <h1 class="f_p f_700 f_size_50 w_color l_height50 mb_20">Contact Us</h1>
                  <p class="white-font">We are here to provide you with more information, answer any questions or queries you may have and create an effective solution for your laboratory needs.</p>
               </div>
            </div>
         </section>
         <section class="contact_info_area sec_pad bg_color">
            <div class="container">
               <div class="contact_form">
                  <!-- <form action="contact_process.php" class="contact_form_box" method="post" id="contactForm"
                     novalidate="novalidate"> -->
                  <div class="row">
                     <div class="col-md-6">
                        <form action="#" class="contact_form_box" method="post" id="">
                           <h2 class="f_p f_size_22 t_color3 f_600 l_height28 mt_20 mb_20">Thank you for your interest in Logilab ELN.</h2>
                           <p class="mt_20">Want to know more about Logilab ELN, or are you interested in implementing it in your laboratory?</p>
                           <p class="mb_40 mt_20">Fill out the form below and someone from our team will be in touch soon. Old-fashioned phone calls work too.</p>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group text_box">
                                    <input type="text" id="" name="cname" placeholder="Name*" required >
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group text_box">
                                    <input type="text" name="cemail" id="cemail" placeholder="Email*" required>
                                 </div>
                              </div>
                         
                              <div class="col-md-6">
                                 <div class="form-group text_box">
                                    <input type="text" id="" name="oname" placeholder="Company Name">
                                 </div>
                              </div>
                               <div class="col-md-6">
                                  <div class="form-group text_box">
                              <input type="text" id="" name="country" placeholder="Country">
                           </div>
                              </div>
                           </div>
                           <div class="form-group text_box">
                              <select name="purpose" >
                                 <option>Purpose of Contact</option>
                                 <option value="Purpose of Contact">Please contact me</option>
                                 <option value="Schedule a demo">Schedule a demo</option>
                                 <option value="Respond to our RFP">Respond to our RFP</option>
                                 <option value="Partner With Us">Partner With Us</option>
                              </select>
                           </div>
                         
                         
                           <div class="form-group text_box">
                              <textarea name="comment"  placeholder="Message" ></textarea>
                           </div>
                           <div class="form-group text_box">
                              <input type="checkbox" id="" name="agreement" required> <label> End user License Agreement</label>
                           </div>
                           <button type="submit" class="btn_three">Submit</button>
                        </form>
                     </div>
                     <div class="col-md-5 offset-md-1">
                        <h2 class="f_p f_size_22 t_color3 f_600 l_height28 mt_20 mb_40">Technical Support </h2>
                        <div class="contact_info_item">
                           <h6 class="f_p f_size_20 t_color3 f_500 mb_20">Contact Info</h6>
                           <p class="f_400 f_size_15"><span class="f_400">Need help on our products?</span> <br>
                              <a href="mailto:support@agaramtech.com">info@agaramtech.com</a>
                           </p>
                           <p class="f_400 f_size_15"><span class="f_400">Customer Support Portal</span> <br>
                              <a href="https://support.agaramtech.com/" target="_blank">support.agaramtech.com</a>
                           </p>
                        </div>
                        <div class="contact_info_item">
                           <h6 class="f_p f_size_20 t_color3 f_500 mb_20">Office Address</h6>
                           <p class="f_400 f_size_15">
                              <b>Global HQ </b> <br>
                              Priyan Plaza, 76, Nelson Road, Aminjikarai, Chennai 600 029, INDIA<br>
                              T: +91 44 4208 2005<br>
                              T: +91 44 42189406<br>
                              E: info@agaramtech.com
                           </p>
                           <a href="https://www.google.com/maps/place/Agaram+Technologies/@13.0710821,80.2182257,17z/data=!3m1!4b1!4m5!3m4!1s0x3a526685f5f0a15d:0x69e5d4e8014d532b!8m2!3d13.0710821!4d80.2227104"><u>View Map</u></a><br>
                           <br>
                           <p class="f_400 f_size_15">
                              <b>Korea</b><br>
                              941 Hogye-Geumjeong SK V1 Center, 42, LS-ro, Dongan-gu, Anyang-si, Gyeonggi-do 14118, KOREA <br>
                              T: +82 31 429 8958<br>
                              E: info@agaramtech.com<br>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="h_action_promo_area">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-md-12">
                     <div class="h_promo_content text-center">
                        <h2><a href="#">Click Here</a> to read the General Terms of Service</h2>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <?php include 'includes/footer.php';?>
      </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="js/jquery-3.6.0.min.js"></script>
      <script src="js/propper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="vendors/wow/wow.min.js"></script>
      <script src="vendors/sckroller/jquery.parallax-scroll.js"></script>
      <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
      <script src="vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
      <script src="vendors/isotope/isotope-min.js"></script>
      <script src="vendors/magnify-pop/jquery.magnific-popup.min.js"></script>
      <script src="vendors/scroll/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/plugins.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>