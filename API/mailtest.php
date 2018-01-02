 <?


		$emailadd = 'diamondsaurabh@gmail.com';
		$new = '36';
		$Sub = $project ."-Site Induction Number ".$new;
	


$msg  = "Hello";



		
echo $emailadd;
echo $Sub;
echo $msg;

	$headers = 'From: donotreply@cip.com' . "\r\n".
			"Content-type: text/html\r\n" .
			'Reply-To: ='.$emailadd . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		echo mail($emailadd,$Sub,$msg,$headers);





 ?>