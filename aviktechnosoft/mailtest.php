<?php 
$name=@$_POST["txtName"];
 $email =@$_POST["txtEmail"]; 
 $subject =@$_POST["txtSubject"]; 
 $message=@$_POST["txtText"]; 
 $to="nishuteotia91@gmail.com";
 
 $headers = "From:".$email."\r\n"; 
 mail($to,$subject,$txt,$headers);
 
  if(mail($to,$subject,$txt,$headers))
   { 
   ?> 
 <script>
 window.location.assign("http://www.w3schools.com") 
</script> 
<?php 
	}	
	else echo "Email sending failed";	
	 ?>