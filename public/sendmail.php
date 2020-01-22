<?php
session_start();
if(isset ($_POST['Send']))
{

if( (!isset($_POST['name'])) && (!isset($_POST['phone'])) && (!isset($_POST['email'])) ){
	exit;
}else{

$key=substr($_SESSION['key'],0,5);
$number = $_POST['er_auth'];
 if($number!=$key){
    echo '<p style="color: #DD252F;font-size:13pt;font-family: Verdana, Arial, Helvetica, sans-serif; text-align:center;"><strong>You have enter Incorrect verification code!Please try Again.</strong></p>';
    echo '<p align="center"><b><a href="javascript:history.go(-1)" style="color: #666666;font-size:12pt;font-family: Verdana, Arial, Helvetica, sans-serif;">GO BACK</a></b></p>';
    die();
 }

$to = "lorivraney@gmail.com";
$subject= "Contact Us Form";
$todayis = date("l, F j, Y, g:i a") ;

$contact_name = $_POST['name'] ;
$contact_email = $_POST['email'] ;
$contact_phone = $_POST['phone'] ;
$pdescription = $_POST['message'] ;


$message = "New Quote Request<br><table width='400px' border='1' cellpadding='0' cellspacing='0'>
  <tr>
    <td colspan='3'><b>CONTACT INFO</b></td>
  </tr>
  <tr>
    <td>Name</td>
    <td style='text-align:center; font-weight:bold;'>:</td>
    <td>".$contact_name."</td>
  </tr>
  <tr>
    <td>Email</td>
    <td style='text-align:center; font-weight:bold;'>:</td>
    <td>".$contact_email."</td>
  </tr>
  <tr>
    <td>Phone</td>
    <td style='text-align:center; font-weight:bold;'>:</td>
    <td>".$contact_phone."</td>
  </tr>
  <tr>
    <td>Message</td>
    <td style='text-align:center; font-weight:bold;'>:</td>
    <td>".$pdescription."</td>
  </tr>
</table>
<br>
";
  $mime_boundary="==Multipart_Boundary_x".md5(mt_rand())."x";
         $headers = "From: info@familiesinbloom.net\r\n" .
         "MIME-Version: 1.0\r\n" .
            "Content-Type: multipart/mixed;\r\n" .
            " boundary=\"{$mime_boundary}\"";
         $message = "This is a multi-part message in MIME format.\n\n" .
            "--{$mime_boundary}\n" .
            "Content-Type: text/html; charset=\"iso-8859-1\"\n" .
            "Content-Transfer-Encoding: 7bit\n\n" .
         $message . "\n\n";
         $message.="--{$mime_boundary}--\n";
if (mail($to, $subject, $message, $headers))
   //echo "Mail sent successfully.";
   header( 'Location: https://familiesinbloom.net/thankyou.html' ) ;
else
   echo "Error in mail";
}
}
?>