	<?php
	//error_reporting(0);
	require_once "Mail.php";
	require_once 'Mail/mime.php';
	
	$usermail	= @$_REQUEST['to'];
	$subject	= @$_REQUEST['subject'];

	$body		= @$_REQUEST['msg'];

			$from = "NO_REPLY_COOLTODAY<cooltoday.vs@gmail.com>";
		   
			$host = "ssl://smtp.gmail.com";
			$port = "465";
			$username = "cooltoday.vs@gmail.com";  //<> give errors
			$password = "saurabhlew";

			$headers = array ('From' => $from,
			  'To' => $usermail,
			  'Subject' => $subject);
			$smtp = @Mail::factory('smtp',
			  array ('host' => $host,
				'port' => $port,
				'auth' => true,
				'username' => $username,
				'password' => $password));
		   
			$mime = new Mail_mime($crlf);
			$mime->setTXTBody($body);
			$mime->setHTMLBody($body);
			
			
			$body = $mime->get();
			$headers = $mime->headers($headers);

		   $mail = $smtp->send($usermail, $headers, $body);
		
		  if (@PEAR::isError($mail)) {
			  echo("{\"data\": \"".$mail->getMessage()."\"}");
			 } else {
			 echo("{\"data\": \"eooror\"}");
			 }
		



	?>