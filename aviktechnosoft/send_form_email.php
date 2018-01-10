<!DOCTYPE html >


<html>
<link rel="shortcut icon" href="logosmall.png">


<head>
	
<title>Avik Technosoft</title>
	
<meta  charset="iso-8859-1" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	
<!--[if IE 6]>
		
<link href="css/ie6.css" rel="stylesheet" type="text/css" />
	
<![endif]-->
	<!--[if IE 7]>
        
<link href="css/ie7.css" rel="stylesheet" type="text/css" />  
	
<![endif]-->
</head>

<body>

	  <div id="background">
			  
<div id="page">
			  
					 
<div class="header">
						
<div class="footer">
							
<div class="body">
									
<div id="sidebar">
									    
<a href="index.html"><img id="logo" src="images/logo.gif" with="154" height="74" alt="" title=""/>
</a>
										
										
<ul class="navigation">
										   
 <li><a  href="index.html"><b>HOME</b></a></li>
											
<li ><a href="about.html"><b>ABOUT</b></a></li>
<li><a href="technology.html"><b>TECHNOLOGY</b></a></li>

<li><a href="specialisation.html"><b>SPECIALISATION</b></a></li>
<!--<li><a href="portfolio.html"><b>PORTFOLIO</b></a></li>
<li><a href="blog.html"><b>TESTIMONIALS</b></a></li>

-->
<li><a href="career.html"><b>CAREER</b></a></li>											
<li class="active last"><a href="contact.html"><b>CONTACT</b></a></li>
										
</ul>
										
										
<div class="connect">
										    
<a href="https://www.facebook.com/Aviktechnosoft?fref=ts" class="facebook">&nbsp;</a>
											
<a href="http://twitter.com/fwtemplates" class="twitter">&nbsp;</a>
											
<a href="http://www.youtube.com/fwtemplates" class="vimeo">&nbsp;</a>
										
</div>
										
										
<div class="footenote">
										  
<span>&copy; Copyright &copy; 2012.</span>
										  
<span><a href="index.html">Avik Technosoft</a> all rights reserved</span>
										
</div>
										
									
</div>
									
<div id="content">
									          
<div class="content">
											   
 <ul>
													
<li>
																															
 													

<i><br></br>“All our dreams can come true – if we have the courage to pursue them.”</i>															
<p><br>
Address:													
															
<span>Avik Technosoft</span>
															
															
<span>Sarasota, FL 34233</span>	
<span>Mobile: (+1) 941-882-0477 (US) </span>
<span>Mobile: (+91) 965-021-1774 (INDIA) </span>
<span>email: info@aviktechnosoft.com</span>

<?php
if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "diamondsaurabh@gmail.com";
    $email_subject = "Your email subject line";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 <br/> <br/> <br/>
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
}
?>
<a href="contact.html"><span>www.aviktechnosoft.com</span></a><br></br>													
</li>
												
</ul>
										     
</div>
									
</div>
							
</div>
						
</div>
					 
</div>
					 
<div class="shadow">
					 
</div>
			  
</div>    
	  
</div>    
	

</body>

</html>