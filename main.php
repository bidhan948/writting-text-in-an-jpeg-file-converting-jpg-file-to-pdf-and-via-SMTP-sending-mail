<?php
//Set the Content Type
// header('Content-type: image/jpeg');

// Create Image From Existing File
$jpg_image = imagecreatefromjpeg('certificate-completion-template.jpg');

// Allocate A Color For The Text
$black = imagecolorallocate($jpg_image, 0, 0, 0);

// Set Path to Font File
$font_path = 'E:\Xampp\htdocs\makingcertificate\BRUSHSCI.TTF';

// Set Text to Be Printed On Image
$text = "Mr Krisal Pokharel";

// Print Text On Image
imagettftext($jpg_image, 20, 0, 88,185, $black, $font_path, $text);

// settingdate 
$course = "MYSQL Course ";

// Print Text On Image
imagettftext($jpg_image, 25, 0, 93,282, $black, $font_path, $course);

// settinf date 
$date = "4th August 2020 ";

// Print Text On Image
imagettftext($jpg_image, 15, 0, 75,358, $black, $font_path, $date);

//creating a file to save with unique name
$file =time();

$file_path = "certificate/". $file . ".jpg";
$file_path_pdf = "certificate/". $file . ".pdf";


// Send Image to Browser
imagejpeg($jpg_image,"$file_path");

// Clear Memory
imagedestroy($jpg_image);


require('certificate\fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf -> Image("$file_path",0,0,210,200);
$pdf ->Output("$file_path_pdf","F");


require('smtp\PHPMailerAutoload.php');
$mail=new PHPMailer();
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->Port=587;
$mail->SMTPSecure="tls";
$mail->SMTPAuth=true;
$mail->Username="Subashbaniya789@gmail.com";
$mail->Password="";
$mail->setFrom("Subashbaniya789@gmail.com");
$mail->addAddress("krisalpokharel30@gmail.com");
$mail->isHTML(true);
$mail->Subjet="Certificate Generated";
$mail->Body="Certificate Generated";
$mail->addAttachment($file_path_pdf);
$mail->SMTPOptions=array("ssl"=>array(
    "verify_peer"=>false,
    "verify_peer_name"=>false,
    "allow_self_signed"=>false,
));
if($mail->send()){
    echo "Send";
}else{
    echo $mail->ErrorInfo;
}
?>