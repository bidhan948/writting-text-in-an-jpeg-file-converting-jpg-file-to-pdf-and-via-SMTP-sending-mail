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
$text = "........";

// Print Text On Image
imagettftext($jpg_image, 20, 0, 88,185, $black, $font_path, $text);

// settingdate 
$course = "MYSQL Course ";

// Print Text On Image
imagettftext($jpg_image, 25, 0, 93,282, $black, $font_path, $course);

// settinf date 
$date = "3rd August 2020 ";

// Print Text On Image
imagettftext($jpg_image, 15, 0, 75,358, $black, $font_path, $date);


// Send Image to Browser
imagejpeg($jpg_image,"certificate/c1.jpg");

// Clear Memory
imagedestroy($jpg_image);
?>