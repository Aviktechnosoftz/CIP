<?php
$name=@$_POST["txtName"];
$email =@$_POST["txtEmail"];
$subject =@$_POST["txtSubject"];
$message=@$_POST["txtText"];
$to="diamondsaurabh@gmail.com";
$headers = "From:".$email."\r\n";
 //mail( $to, $subject, $message, $headers );
/*//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
$content = chunk_split(base64_encode($content));
    $num = md5(time());
	
	 //Normal headers

    $headers = "From:".$email."\r\n";
       $headers  .= "MIME-Version: 1.0\r\n";
       $headers  .= "Content-Type: multipart/mixed; ";
	    $headers .= "".$message."\n";
		$headers .= "--".$num."\n";
       
        // With message

    $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
       $headers .= "Content-Transfer-Encoding: 8bit\r\n";
       $headers .= "".$message."\n";
	   $headers .= "--".$num."\n";*/
	   
	    // SEND MAIL
		if ($name != "")
       if (@mail($to, $subject, $message, $headers))
	   {
			echo "<script>";
			echo "alert(\"message sent!\")";
			echo "</script>";
		}
		else
		{
			echo "<script> ";
				echo "alert(\" not sent !\")";
			echo "</script>";
		}
	  
?>
	  
	  


<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Contact Us</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="css/style.css" type="text/css"  media="all">
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,400,700,900' rel='stylesheet' type='text/css'>

	<!-- JS
  ================================================== -->
   <script type="text/javascript" src="js/jquery.min.js" ></script>
	<!--[if lt IE 9]>
	<script src="js/modernizr.custom.11889.js" type="text/javascript"></script>
	<![endif]-->
		<!-- HTML5 Shiv events (end)-->
    <script type="text/javascript" src="js/nav-resp.js"></script>
	<!-- Favicons
  ================================================== -->
	<link rel="shortcut icon" href="images/aik.png">
	<script
src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>

<script>
function validateForm()
{

	var x=document.forms["contactform"]["txtName"].value;
	if (x==null || x=="")
	  {
	  alert("Name must be filled out");
	  return false;
	  }
  
	var y=document.forms["contactform"]["txtEmail"].value;
	if (y==null || y=="")
	  {
	  alert("Email must be filled out");
	  return false;
	  }
	  
	   var b=document.forms["contactform"]["txtEmail"].value;
	var atpos=b.indexOf("@");
	var dotpos=b.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=b.length)
	  {
	  alert("Not a valid e-mail address");
	  return false;
	  }
	  
	  var z=document.forms["contactform"]["txtSubject"].value;
	if (z==null || z=="")
	  {
	  alert("Subject must be filled out");
	  return false;
	  }
	  

	   var a=document.forms["contactform"]["txtText"].value;
	if (a==null || a=="")
	  {
	  alert("Message must be filled out");
	  return false;
	  }
	  
return true;
}


var myCenter=new google.maps.LatLng(28.616650, 77.388556);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:18,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
    </head>
<body>

	<!-- Primary Page Layout
	================================================== -->
	<div id="wrap" class="colorskin-1">
  <div class="top-bar">
   <!-- <div class="container">
      <div class="top-links"> <a href="#">Form</a> | <a href="#">Terms</a> | <a href="#">Contact</a></div>
      <div class="socailfollow"><a href="#" class="facebook"><img src="images/social_facebook2.png" alt="" ></a> <a href="#" class="twitter"><img src="images/social_twitter2.png" alt="" ></a> <a href="#" class="dribble"><img src="images/social_dribble.png" alt=""></a> <a href="#" class="pinterest"><img src="images/social_pinterest.png" alt=""></a> <a href="#" class="vimeo"><img src="images/social_vimeo.png" alt=""></a> <a href="#" class="youtube"><img src="images/social_youtube.png" alt=""></a> </div>
    </div>-->
  </div>

<!----<div id="wrap" class="colorskin-1">
<div class="top-bar">
<div class="container">
<div class="top-links"> <a href="#">Form</a> | <a href="#">Terms</a> | <a href="#">Contact</a></div>
<div class="socailfollow"><a href="#" class="facebook"><img src="images/social_facebook2.png" alt="" ></a> <a href="#" class="twitter"><img src="images/social_twitter2.png" alt="" ></a> <a href="#" class="dribble"><img src="images/social_dribble.png" alt=""></a> <a href="#" class="pinterest"><img src="images/social_pinterest.png" alt=""></a> <a href="#" class="vimeo"><img src="images/social_vimeo.png" alt=""></a> <a href="#" class="youtube"><img src="images/social_youtube.png" alt=""></a> </div>
</div>
</div>-->
<header id="header">
<div  class="container">
<div class="four columns logo"><a href="index.php"><img src="images/logo.gif" id="img-logo" alt="logo"></a></div>
<div class="twelve columns alignright"></div>
</div>
<nav id="nav-wrap" class="nav-wrap2">
<div class="container">
					<ul id="nav" class="sixteen columns">
          <li><a class="drp-aro" href="index.php">Home <!--<span class="row-mn"></span>--></a>
            <!--<ul>
              <li><a href="index.html">Home 01 - Business</a></li>
              <li><a href="home-header2.html">Home 02 + Header2</a></li>
              <li><a href="home03.html">Home 03 - Agency</a></li>
              <li><a href="home04.html">Home 04 + Header3</a></li>
              <li><a href="home05.html">Home 05 - Portfolio</a></li>
              <li><a href="home06.html">Home 06 - Blog</a></li>
              <li><a href="home07.html">Home 07 - SmallBiz</a></li>
              <li><a href="home08.html">Home 08 - No Slider</a></li>
            </ul>-->
          </li>
          <li><a data-description="About Us" class="drp-aro" href="about-us.php">About Us <!--<span class="row-mn"></span>--></a>
            <!--<ul>
              <li><a href="services.html">Services</a></li>
              <li><a href="pricing.html">Pricing</a></li>
              <li><a href="elements.html">Elements</a></li>
              <li><a href="404.html">404 page not found</a></li>
              <li><a href="icons.html">icons</a></li>
              <li><a href="columns.html">Columns</a></li>
              <li><a href="sidebar-right.html">Right Side-Bar</a></li>
              <li><a href="sidebar-left.html">Left Side-Bar</a></li>
              <li><a href="left-nav-page.html">Left Navigation Page</a></li>
              <li><a href="faq.html">FAQ</a></li>
              <li><a href="timeline1.html">Timeline</a></li>
              <li><a href="contact.html">Contact</a></li>
              <li><a href="#">Sub Menu</a>
                <ul>
                  <li><a href="#">Menu Item 01</a></li>
                  <li><a href="#">Menu Item 02</a></li>
                  <li><a href="#">Menu Item 03</a></li>
                </ul>
              </li>
            </ul>-->
          </li>
  <li><a data-description="Development" class="drp-aro" href="website-development-india.php">Development <span class="row-mn"></span></a>
            <ul>
              <li><a href="website-development-india.php">Website Development</a></li>
              <li><a href="software-development-india.php">Software Development</a></li>
              <li><a href="ecommerce-india.php">eCommerce</a></li>
              <li><a href="elearning-india.php">eLearning</a></li>
              <li><a href="crm-development-india.php">CRM Development</a></li>
			  <li><a href="product-development-india.php">Product Development</a></li>
              <li><a href="ipad-development-india.php">iPad Development</a></li>
              <li><a href="iphone-development-india.php">iPhone Development</a></li>
              <li><a href="android-development-india.php">Android Development</a></li>
            </ul>
          </li>
		  
		  <li><a data-description="Technologies" class="drp-aro" href="technologies.php">Technologies <span class="row-mn"></span></a>
            <ul>
             <li><a href="technologies.php">PHP</a></li>
              <li><a href="java-technologies.php">Java</a></li>
              <li><a href="microsoft.net-technologies.php">Microsoft .NET</a></li>
              <li><a href="microsoftsharepoint-technologies.php">Microsoft Sharepoint</a></li>
              <li><a href="drupalcms-technologies.php">Drupal CMS</a></li>
			  <li><a href="sugarcrm-technologies.php">Sugar CRM</a></li>
              <li><a href="salesforce-technologies.php">Salesforce</a></li>
              <li><a href="magento-technologies.php">Magento</a></li>
              <li><a href="objectivec-technologies.php">Objective C</a></li>
            </ul>
          </li>
          <!--<li><a data-description="What we Think" href="blog.html">Blog <span class="row-mn"></span></a>
					<ul>
						<li><a href="blog.html">Blog 1</a></li>
						<li><a href="blog-leftsidebar.html">Blog 1 - Left Sidebar</a></li>
						<li><a href="blog2.html">Blog 2</a></li>
						<li><a href="blog2-leftsidebar.html">Blog 2 - Left Sidebar</a></li>
						<li><a href="blog-bothsidebar.html">Blog - Both Sidebar</a></li>
						<li><a href="timeline1.html">Blog - Timeline</a></li>
						<li><a href="blog-single.html">Blog - Single Post</a></li>
					</ul>
					</li>-->
          <li><a data-description="Portfolio" class="drp-aro" href="portfolio.php">Portfolio <!--<span class="row-mn"></span>--></span></a>
            <!--<ul>
              <li><a href="portfolio2col.html">Portfolio 2 Column</a></li>
              <li><a href="portfolio3col.html">Portfolio 3 Column ***</a></li>
              <li><a href="portfolio4col.html">Portfolio 4 Column</a></li>
              <li><a href="portfolio-pin.html">Portfolio Pinterest</a></li>
						<li><a href="timeline2.html">Portfolio Timeline</a></li>
						<li><a href="portfolio-item.html">Portfolio Item (Single)</a>
					</li>
				</ul>-->
			<li class="current"><a data-description="Contact Us" class="selected" href="contact-us.php">Contact Us <!--<span class="row-mn"></span>--></span></a>
          </li>
        </ul>
			</div>
	</nav>
		<!-- /nav-wrap -->
</header>
<!-- end-header -->
<section id="headline2">
<div class="container">
<h3>Contact Us -
<small>Use the contact form</small></h3>
</div>
</section>
<div class="blox section-bg4">
<div class="container">
<div class="eight columns">
<div class="vertical-space3"></div>
<h2><strong>Send us a message about whatever you like, ask a question or tell us about your next job.</strong></h2><br>
<p>Use the contact form to get in touch, and if you’re looking to hire us for a project, fill in as much detail about the project as you can.</p>
</div>
</div>
</div>
<section class="container page-content" >

<div class="vertical-space3"></div>
<div class="seven columns contact-inf">
<h4>Contact Information:</h4>
<br />
<p><img src="images/social_address.png" alt="">&nbsp;<strong>Address:</strong></p>
<p>
G 19 Basement Sector 63, Noida, India , PIN: 201301</ p>
<br />
<p><img src="images/social_phone.png" alt="">&nbsp;&nbsp;<strong>Phone:</strong></p>
<p>
(+91) 120 4340668<br />
</p>
<br />
<p><img src="images/social_mail.png" alt="">&nbsp;<strong>Email:</strong></p>
<p>
info@aviktechnosoft.com<br />
</p>
<hr>
<!--<p>Raw denim you probably haven't heard of them jean shorts Austin. Etiam ut lacus a dui accumsan accumsan tofu stumptown aliqua, retro synth master cleanse.<br>
Asunt in anim uis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in anim id est laborum. Allamco laboris nisi ut aliquip ex ea commodo consequat. Aser velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in anim id est laborum.
<br>
Malesuada tortor, nec scelerisque lorem mattis. Nunc et rutrum consetetur sadipscing elitr, sed diam nonumy at volutpat. Sed consectetur suscipit lorem nunc.adipiscing elit. Integer commodo tristique odio, quis fringilla ligula aliquet ut. Maecenas sed justo varius velit imperdiet bibendum et rutrum.</p>-->
</div>

<div class="eight columns offset-by-one">
<div class="contact-form">
<div class="clr"></div><br />
<form action="" method="post" id="frmContact" name="contactform" onSubmit="return validateForm()">

<h5>Whats your Name?</h5>
<input name="txtName" type="text" class="txbx" placeholder="Name" value="<?php  @$_POST['name'];?>"/><br />
<h5>Whats your Email?</h5>
<input name="txtEmail" type="text" class="txbx" placeholder="Email" value="<?php  @$_POST['email'];?>" /><br />
<h5>Email Subject?</h5>
<input name="txtSubject" type="text" class="txbx" placeholder="Subject" value="<?php  @$_POST['emailsub'];?>"  /><br />
<div class="erabox">
<h5>Message to us</h5>
<textarea name="txtText" tabindex="text" cols="" rows="" class="txbx era" value="<?php  @$_POST['message'];?>" ></textarea><br />
<input name="" type="submit" class="sendbtn" value="Send Message" id="send" name="send" />

<div id="spanMessage">
</div>
</div>
</form>
</div><!-- end-contact-form  -->

</div>
<div class="white-space"></div>
</section><!-- container -->
<section class="full-width">
<div id="contact-map">
<div id="googleMap" style="width:100%;height:250px;"></div>
<!-- END-Google Map -->
</div><!-- END-contact Map -->
</section><!-- END-Google Map Section -->

<footer id="footer">
    <div class="container footer-in">
      <div class="disclaimer four columns">
       <h4 class="subtitle">Disclaimer</h4>
        <br />
        <p>The content of the Avik Technosoft website is given solely for the information purposes. No legal claim is made as to the accuracy or consistency of the content on this site at any time. Services referenced on this site may not be available in all jurisdictions and may not be offered to all inquirers.</p>
        <br />
        <p>@ 2012. All Rights Reserved.<br>
          Powered by <a href="index.php">Avik Technosoft Pvt. Ltd.</a></p>
      </div>
      <!-- Disclaimer /end -->
   <div class="five columns">
        <h4 class="subtitle">stay connected</h4>
        <!--<br />
        <p class="twitt-txt">@<a href="https://twitter.com/webnus">webnus</a> <span id="twitter"></span> </p>-->
        <div class="socailfollow"><a href="https://www.facebook.com/Aviktechnosoft" target="_blank" class="facebook"><img src="images/social_facebook2.png" alt="" ></a> <a href="http://dribbble.com/AvikTech" target="_blank" class="dribble"><img src="images/social_dribble.png" alt=""></a> <a href="http://www.pinterest.com/aviktech/" target="_blank" class="pinterest"><img src="images/social_pinterest.png" alt=""></a> <a href="https://twitter.com/AvikTech" target="_blank" class="twitter"><img src="images/twitterlogo.jpg" alt=""><a href="skype:diamondsaurabh?add" target="_blank" class="skype"><img src="images/skypelogo.jpeg" alt="" ></a> </div>
      </div>
      <!-- end-stay connected /end -->
      <div class="five columns">
        <!--<h4 class="subtitle">flickr photostream</h4>
        <br />
        <div class="flickr-feed">
          <script type="text/javascript" src="http://www.flickr.com/badge_code.gne?count=9&amp;display=random&amp;size=square&amp;nsid=36587311@N08&amp;raw=1"></script>
          <div class="clear"></div>
        </div>-->
      </div>
      <!-- flickr  /end -->
      <div class="four columns contact-inf">
        <h4 class="subtitle">Contact Information</h4>
        <br />
        <p><strong> </strong> G 19 Basement</p>
		<p><strong> </strong> Sector 63, Noida, India </p>
        <p><strong> </strong>  (+91) 120 4340668  </p>
        <!--<p><strong>Fax: </strong> + 1 (234) 567 8901 </p>-->
        <p><strong> </strong> saurabh@aviktechnosoft.com </p>
      </div>
      <!-- end-contact-info /end -->
    </div>
    <!-- end-footer-in -->
    <div class="footbot container" >
      <div class="footer-navi"> <a href="index.php">Home</a> | <a href="about-us.php">About us</a> | <a href="contact-us.php">Contact</a> | <a href="portfolio.php">Portfolio</a> </div>
	  <!-- footer-navigation /end -->
      <!--<img src="images/logo-footer.png" alt=""> </div>
    <!-- end-footbot -->
  </footer>
<!-- end-footer -->
<span id="scroll-top"><a class="scrollup"></a></span>

</div><!-- end-wrap -->
<!-- End Document
================================================== -->
<script type="text/javascript" src="js/quentin-custom.js" ></script>
<script type="text/javascript" src="js/bootstrap-alert.js"></script>

</body>
</html>