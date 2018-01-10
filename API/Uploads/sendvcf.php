	<?php
	//error_reporting(0);
	require_once "Mail.php";
	require_once 'Mail/mime.php';



	$usermail	= @$_REQUEST["email_id"];
	$subject	= @$_REQUEST["sub"];
	$filedata	= @$_REQUEST["vcardtext"];
	$body		= $subject;

	$file_str  = "END:VCARD";
	$file_arr=array();
	$pieces = explode(" ", $file_str);
	foreach ($pieces as $key => $value) {


		$v_name = $value;
preg_match('/N:(.*?);/', $file, $match);
		$filename  = $match[1].".vcf";

		$myfile = fopen($filename, "w") or die("Unable to open file!");
			fwrite($myfile, $filedata);
			fclose($myfile);
			array_push($file_arr,$filename);
	}


	// $date		= date_create();
	// $filename =  date_timestamp_get($date);
	// $filename  = "CIP_Contact".$filename.".vcf";

	// $myfile = fopen($filename, "w") or die("Unable to open file!");
	// fwrite($myfile, $filedata);
	// fclose($myfile);




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
			$mime->addAttachment($file_arr, 'text/plain');
			$body = $mime->get();
			$headers = $mime->headers($headers);

		   $mail = $smtp->send($usermail, $headers, $body);
		
		  if (@PEAR::isError($mail)) {
			  echo("{\"data\": \"".$mail->getMessage()."\"}");
			 } else {
			 echo("{\"data\": \"eooror\"}");
			 }
		

	?>