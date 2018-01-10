<?php 
if ( isset($_POST["image"]) && !empty($_POST["image"]) ) 
{

$data = $_POST['image'];

$uri =  substr($data,strpos($data,",")+1);

$uri1 =__DIR__ .'/API/'.$uri;
$file = md5(uniqid()) . '.png';

//file_put_contents($file, base64_decode($uri1));

file_put_contents(__DIR__ .'/API/'.$file, base64_decode($uri));

// return the filename
echo $file;
}