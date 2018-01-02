<?php
$to = "saurabh@aviktechnosoft.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: saurabh@aviktechnosoft.com" . "\r\n" .
"CC: somebodyelse@example.com";

$result = mail($to,$subject,$txt,$headers);
echo $result;
?>