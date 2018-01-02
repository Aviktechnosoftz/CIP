 <?


		$emailadd = 'diamondsaurabh@gmail.com';
		$new = '36';
		$Sub = $project ."-Site Induction Number ".$new;
	/*	$msg = "<html> 
  <body> Hello HSR / SM, <br/><br/>

Site Induction form ".$new." is ready to be reviewed.<br/><br/>


  <input type=\"button\" value=\"Review\" onclick=\"location.href='http://checklist.aviktechnosoft.com/site_induction_form_unapproved.php?unapproved_form=36'\"><br/><br/>
 

<br/>
Thanks <br/>
Team CIP <br/>
Send from Mobile app

 </body> 
</html>
";*/


$msg  = "
<html> 
  <body>
  Site Induction form ".$new." is ready to be reviewed.<br/><br/>
 <a href ='http://checklist.aviktechnosoft.com/site_induction_form_unapproved.php?unapproved_form=36'> <input type=\"button\" value=\"Download Report\"> </a>
  </body> 
</html>
";


		$headers = 'From: donotreply@cip.com' . "\r\n".
			"Content-type: text/html\r\n" .
			'Reply-To: ='.$emailadd . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		echo mail($emailadd,$Sub,$msg,$headers);





 ?>