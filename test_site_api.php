	<?php
	//error_reporting(0);
	// require_once "Mail.php";
	// require_once 'Mail/mime.php';



	// $content	= @$_REQUEST["pdf_file"];
	
	

	$usermail	= "shashank.r@aviktechnosoft.com";
	$subject	= "test_pdf";
	$filedata	= @$_REQUEST["pdf_file"];
	$body		= $subject;

	
		$filename  = "test_file.pdf";

		$myfile = fopen($filename, "w") or die("Unable to open file!");
			fwrite($myfile, $filedata);
			 fclose($myfile);
			
	// echo $filedata;


	// $date		= date_create();
	// $filename =  date_timestamp_get($date);
	// $filename  = "CIP_Contact".$filename.".vcf";

	// $myfile = fopen($filename, "w") or die("Unable to open file!");
	// fwrite($myfile, $filedata);
	// fclose($myfile);




			// $from = "NO_REPLY_COOLTODAY<cooltoday.vs@gmail.com>";
		   
			// $host = "ssl://smtp.gmail.com";
			// $port = "465";
			// $username = "cooltoday.vs@gmail.com";  //<> give errors
			// $password = "saurabhlew";

			// $headers = array ('From' => $from,
			//   'To' => $usermail,
			//   'Subject' => $subject);
			// $smtp = @Mail::factory('smtp',
			//   array ('host' => $host,
			// 	'port' => $port,
			// 	'auth' => true,
			// 	'username' => $username,
			// 	'password' => $password));
		   
			// $mime = new Mail_mime($crlf);
			// $mime->setTXTBody($body);
			// $mime->setHTMLBody($body);
			// $mime->addAttachment($filename, 'application/pdf');
			// $body = $mime->get();
			// $headers = $mime->headers($headers);

		 //   $mail = $smtp->send($usermail, $headers, $body);
		
		 //  if (@PEAR::isError($mail)) {
			//   echo("{\"data\": \"".$mail->getMessage()."\"}");
			//  } else {
			//  echo("{\"data\": \"eooror\"}");
			//  }
		

	?>