<? 
session_start();
if((isset($_POST['txtName'])&(isset($_POST['txtEmail']))&(isset($_POST['txtSubject']))&(isset($_POST['txtText'])) )){
$to = "prakhar.mona01@gmail.com";
$subject = "Contact US";
$from = "prakhar.mona01@gmail.com";
$headers = "From:" . $from;
$headers = "From: " . strip_tags($from) . "\r\n";
$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
$headers .= "CC: ".$from."\r\n";
$headers .= "Bcc:prakhar.mona01@gmail.com,prakhar.mona01@gmail.com" . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//$url = SITEURL;
$message = '<!DOCTYPE html>';
$message.='<p><b> Hello, </b> : '.$_POST['txtName'].'</p>';
$message.='<p><b>Email</b> : '.$_POST['txtEmail'].'</p>';
$message.='<p><b>Subject</b> : '.$_POST['txtSubject'].'</p>';
$message.='<p><b>Message</b> : '.$_POST['txtText'].'</p>';
mail($to,$subject,$message,$headers);

}
else {
$_POST['txtName'] = 'Anonymous';
}
?>
<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Thank You</title>
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
          <li><a class="selected" href="index.php" title="Home">Home <!--<span class="row-mn"></span>--></a>
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
          <li><a data-description="About Us"  href="about-us.php" title="About Us">About Us <!--<span class="row-mn"></span>--></a>
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
           <li><a data-description="Development" class="drp-aro" href="website-development-india.php" title="Development">Development <span class="row-mn"></span></a>
            <ul>
                    <li><a href="website-development-india.php" title="Website Application Development with PHP">Website Development</a></li>
              <li><a href="software-development-india.php" title="Software Development">Software Development</a></li>
              <li><a href="ecommerce-india.php" title="ECommerce">eCommerce</a></li>
              <li><a href="elearning-india.php" title="ELearning">eLearning</a></li>
              <li><a href="crm-development-india.php" title="Customer Relationship Management System">CRM Development</a></li>
			  <li><a href="product-development-india.php" title="Product Development">Product Development</a></li>
              <li><a href="ipad-development-india.php" title="IPad Application Development with Apple iOS">iPad Development</a></li>
              <li><a href="iphone-development-india.php" title="IPhone Application Development with Apple iOS">iPhone Development</a></li>
              <li><a href="android-development-india.php" title="Android Development">Android Development</a></li>
			  <li><a href="google_glass-development-india.php" title="Google Glass">Google Glass</a></li>
            </ul>
          </li>
		  
		  <li><a data-description="Technologies" class="drp-aro" href="technologies.php" title="Technologies">Technologies <span class="row-mn"></span></a>
             <ul>
             <li><a href="technologies.php" title="PHP">PHP</a></li>
              <li><a href="java-technologies.php" title="Java">Java</a></li>
              <li><a href="microsoft.net-technologies.php" title="Microsoft.NET">Microsoft .NET</a></li>
              <li><a href="microsoftsharepoint-technologies.php" title="Microsoft Sharepoint">Microsoft Sharepoint</a></li>
              <li><a href="drupalcms-technologies.php" title="Drupal CMS">Drupal CMS</a></li>
			  <li><a href="sugarcrm-technologies.php" title="Sugar CRM">Sugar CRM</a></li>
              <li><a href="salesforce-technologies.php" title="Salesforce">Salesforce</a></li>
              <li><a href="magento-technologies.php" title="Magento">Magento</a></li>
              <li><a href="objectivec-technologies.php" title="Objective C">Objective C</a></li>
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
          <li><a data-description="Portfolio" class="drp-aro" href="portfolio.php" title="Portfolio">Portfolio <!--<span class="row-mn"></span>--></span></a>
            <!--<ul>
              <li><a href="portfolio2col.html">Portfolio 2 Column</a></li>
              <li><a href="portfolio3col.html">Portfolio 3 Column ***</a></li>
              <li><a href="portfolio4col.html">Portfolio 4 Column</a></li>
              <li><a href="portfolio-pin.html">Portfolio Pinterest</a></li>
						<li><a href="timeline2.html">Portfolio Timeline</a></li>
						<li><a href="portfolio-item.html">Portfolio Item (Single)</a>
					</li>
				</ul>-->
			<li class="current"><a data-description="Contact Us" class="drp-aro" href="contact-us.php" title="Contact Us">Contact Us <!--<span class="row-mn"></span>--></span></a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- /nav-wrap -->
  </header>
<!-- end-header -->
<div class="blox section-bg4">
<div class="container">
<div class="eight columns">
<div class="vertical-space3"></div>
<h2><strong>Thank you <?=$_POST['txtName']?> !</strong></h2><br>
<p>we will contact with you as soon as possible</p>
<a href="index.php"><p>Click here for Home page </p></a>
</div>
</div>
</div>
<!-- container -->
<!-- END-Google Map Section -->

 <footer id="footer">
    <div class="container footer-in">
      <div class="disclaimer four columns">
    <h4 class="subtitle">Disclaimer</h4>
        <br />
        <p align="justify"> The content of the Avik Technosoft website is given solely for the information purposes. No legal claim is made as to the accuracy or consistency of the content on this site at any time. Services referenced on this site may not be available in all jurisdictions and may not be offered to all inquirers. </p>
        <br />
        <p>@ 2012. All Rights Reserved.<br>
          Powered by <a href="index.php" title="Home">Avik Technosoft Pvt. Ltd.</a></p>
      </div>
      <!-- Disclaimer /end -->
     <div class="five columns">
        <h4 class="subtitle">stay connected</h4>
        <!--<br />
        <p class="twitt-txt">@<a href="https://twitter.com/webnus">webnus</a> <span id="twitter"></span> </p>-->
        <div class="socailfollow"><a href="https://www.facebook.com/Aviktechnosoft" target="_blank" class="facebook"><img src="images/social_facebook2.png" alt="facebook" title="facebook"></a> <a href="http://dribbble.com/AvikTech" target="_blank" class="dribble"><img src="images/social_dribble.png" alt="dribble" title="dribble"></a> <a href="http://www.pinterest.com/aviktech/" target="_blank" class="pinterest"><img src="images/social_pinterest.png" alt="pinterest" title="pinterest"></a> <a href="https://twitter.com/AvikTech" target="_blank" class="twitter"><img src="images/twitterlogo.jpg" alt="twitter" title="twitter"><a href="skype:diamondsaurabh?add" target="_blank" class="skype"><img src="images/skypelogo.jpeg" alt="skype" title="skype" ></a> </div>
      </div>
      <!-- end-stay connected /end -->
      <div class="five columns contact-inf">
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
       <div class="footer-navi"> <a href="index.php" title="Home">Home</a> | <a href="about-us.php" title="About us">About us</a> | <a href="contact-us.php" title="Contact">Contact</a> | <a href="portfolio.php" title="Portfolio">Portfolio</a> </div>
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
<?php
if(isset($_SESSION['name']))unset($_SESSION['name']);
if(isset($_SESSION['email']))unset($_SESSION['email']);
if(isset($_SESSION['subject']))unset($_SESSION['subject']);
if(isset($_SESSION['message']))unset($_SESSION['message']);
?>