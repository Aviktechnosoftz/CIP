<?php
include_once('connect.php');





$name_sign= $_POST['name'];
$time_sign=$_POST['time'];


// Create a 100*30 image
$im = imagecreate(150,30);

// White background and blue text
$bg = imagecolorallocate($im, 255, 255, 255);
$textcolor = imagecolorallocate($im, 0, 0, 255);

// Write the string at the top left
imagestring($im, 5, 0, 0, $name_sign, $textcolor);

// Output the image

   $resp = imagepng($im, $_SERVER['DOCUMENT_ROOT'].'/site_admin'.'/image/'.$time_sign.'.png');

// print_r($time_sign);

imagepng($im);
imagedestroy($im);



?>