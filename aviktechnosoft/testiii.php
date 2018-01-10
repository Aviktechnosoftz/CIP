<?php 

  $subject ="hiii"; 
  $message="mother"; 
  $txt="nishu";
  $to="nishuteotia91@gmail.com";
  $email="nishuteotia@gmail.com";
  
  $headers = "From:".$email."\r\n"; 
  mail($to,$subject,$txt,$headers);
  ?>
