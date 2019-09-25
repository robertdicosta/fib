<?php

if(isset ($_POST['Send']))
{


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
         $headers = "From: artpack@artpackco.com\r\n" .
         "MIME-Version: 1.0\r\n" .
            "Content-Type: multipart/mixed;\r\n" .
            " boundary=\"{$mime_boundary}\"";
         $message = "This is a multi-part message in MIME format.\n\n" .
            "--{$mime_boundary}\n" .
            "Content-Type: text/html; charset=\"iso-8859-1\"\n" .
            "Content-Transfer-Encoding: 7bit\n\n" .
         $message . "\n\n";
         foreach($_FILES as $userfile)
         {
            $tmp_name = $userfile['tmp_name'];
            $type = $userfile['type'];
            $name = $userfile['name'];
            $size = $userfile['size'];
            if (file_exists($tmp_name))
            {
               if(is_uploaded_file($tmp_name))
               {
                  $file = fopen($tmp_name,'rb');
                  $data = fread($file,filesize($tmp_name));
                  fclose($file);
                  $data = chunk_split(base64_encode($data));
               }
               $message .= "--{$mime_boundary}\n" .
                  "Content-Type: {$type};\n" .
                  " name=\"{$name}\"\n" .
                  "Content-Disposition: attachment;\n" .
                  " filename=\"{$fileatt_name}\"\n" .
                  "Content-Transfer-Encoding: base64\n\n" .
               $data . "\n\n";
            }
         }
         $message.="--{$mime_boundary}--\n";
if (mail($to, $subject, $message, $headers))
   //echo "Mail sent successfully.";
   header( 'Location: https://familiesinbloom.net/thankyou.html' ) ;
else
   echo "Error in mail";
}
?>