 <? 
 session_start();
if(isset($_SESSION['admin_user']))
{
  header("location:dashboard.php");
}

 ?>
 <html>

        <head>
         <? include('header.php') ?>
        </head>
        <body id="top">
		<div class="container-fluid" style="height: 100%;padding: 50px;background:#E4DFD0">
		<div class="inner-wrap">               
				<div class="col-lg-6  col-md-6  col-sm-6 col-xs-12 noPadding">
					
                     <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
				        <div class="carousel-inner" role="listbox">
				            <div class="item active">
				                <img src="Slider/images/imageedit_23_6388306178.jpg" alt="Chania">
				                
				            </div>
				            <div class="item">
				                <img src="Slider/images/contractor3 (2).jpg" alt="Chania">
				                <div class="carousel-caption">
				                <div class="col-sm-12 col-sm-offset-2">
				                    <h3 class="caption_title">NOTICE BOARD</h3>

				                    
				                    <p style="color: #F4A9A9;text-shadow: none;">&#42 Gate #5 closed for maintainance. Technopark P3<br><br>

										&#42 TownHall Meeting on Tuesday 24th May<br><br>

										&#42 CIP Fire Drill on Thursday<br><br>

										&#42 Gate #9 closed for maintainance. Technopark P3<br><br>

										&#42 Gate #7 Open. Technopark P3
									</p>
									

									</div>	
				                </div>
				            </div>
				            <div class="item">
				                <img src="Slider/images/Construction-engineer 2 (1).jpg" alt="Flower">
				                <div class="carousel-caption" >
				                <div class="col-sm-12 col-sm-offset-2">
				                    <h3 class="caption_title">Weather Forecast</h3>

				                    
				                 <p style="color: #F9A7A9;text-shadow: none;"> 



						                 <span style="font-size: 60px;font-family:'helvetica_nue_thin'">22 <sup style="font-family:'helvetica_nue_thin'">o<sub style="font-family:'helvetica_nue_thin'">C<sub></sup>

						                 
						                 <span style="font-family: 'helvetica_nue_thin'">l</span> 

						                 <sup style="font-family:'helvetica_nue_thin'">o<sub style="font-family:'helvetica_nue_thin'">F<sub></sup>
						                 </span>
						                 <br>
											Sydney NSW,Australia <br>
										<div style="opacity: 0.4">
											<span> Precipitation: 17%</span><br>
											<span> Humidity: 64%</span> <br>
											<span>Wind: 8km/h</span><br>
											<span>Temperature Precipitation: Wind</span>
										</div>									
								</p>
									

									</div>	
				                </div>
				            </div>
				            <div class="item">
				                <img src="Slider/images/Construction-engineer (3).jpg" alt="Flower">
				                <!-- div class="carousel-caption">
				                    <h3 class="caption_title">Header of Slide3</h3>
				                    <p>Details of Slide 3. Lorem Ipsum Blah Blah Blah....</p>
				                </div> -->
				            </div>
				        </div>
				        <!-- Left and right controls -->
				        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				            <span class="fa fa-angle-left" aria-hidden="true"></span>
				            <span class="sr-only">Previous</span>
				        </a>
				        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				            <span class="fa fa-angle-right" aria-hidden="true"></span>
				            <span class="sr-only">Next</span>
				        </a>
				        <ol class="carousel-indicators">
				            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				            <li data-target="#myCarousel" data-slide-to="1"></li>
				            <li data-target="#myCarousel" data-slide-to="2"></li>
				            <li data-target="#myCarousel" data-slide-to="3"></li>
				        </ol>
				    </div>



    	


			    </div>
				<div class=" col-lg-6  col-md-6  col-sm-6 col-xs-12 noPadding" style="background-color: #333333;height: 100%">
					 
					<div class="row" style="background-color:  #333333;">
					<div class="col-sm-12 sinup-padding">
							

							 <div class="pull-right">
							    <input type="button" class="btn btn-default btn-sm" value="Sign Up" id="sign_up_btn" style="border-top-right-radius: 6vh;background-color: #727272;border-bottom-right-radius: 6vh;outline: none;border:none;color:#95989A" onclick="sign('2')">
							        
							    </input>
							 </div>
							 <div class=" pull-right">
		   				 <input type="button" class="btn btn-default btn-sm" value="Sign In" id ="sign_in_btn" style=" border-top-left-radius: 6vh;background-color: #DF5430;color:#FFFFFF;border-bottom-left-radius: 6vh;outline: none;border:none
		   				 " onclick="sign('1');">
		        
		     				</input>
		 					</div>
 					</div>
 					</div>
 					<div style="color: #95989A;background-color:  #333333;
    width: 100%;
    margin: auto;font-size: 4vh;    padding-left: 4.5vw; font-weight: 100;font-family: 'Helvetica_Nue_thin'"> <span id="signin_title"> Sign In</span> or <span id="signup_title">Sign Up</span> </div>

 					
 					<div class="row" style="background-color:  #333333">
						<form action="" method="post" id="loginform" onsubmit="return validate()" autocomplete="off">
						<div class="form-group">
								<div class="label_login"> FULL NAME </div>
								<input type="text" class="form-control input-lg input-block text_enter" id="username" name="username" placeholder="Enter your Full Name">
							</div>

							<div class="form-group">
								<div class="label_login"> PASSWORD </div>
								<input type="password" class="form-control input-lg input-block text_enter" id="password" name="username" placeholder="Enter your Password">
							</div>
							<div class="form-group">
								<div class="label_login"> E-MAIL </div>
								<input type="text" class="form-control input-lg input-block text_enter" id="email" name="username" placeholder="Your e-mail goes here">
							</div>
							<div class="form-group" style="padding-top: 4vh;">
								<div class="checkbox_form">
								<input type="checkbox" class="faChkSqr"><span style=" color: #95989A;padding-left: 2vw ">I agree all statements in</span> <span style="color: #FFFFFF">terms of service</span>
								</div>
							</div>
							
							 <div class="form-group" style="padding-top: 3.4vh;">
								<div class="" style="margin:auto;width: 80%;">
								 <button type="submit" class="btn btn-primary btn-sm btn btn-primary btn-sm" id="submitform" style=" background-color: #DF5430;
								    font-size: 14px;
								    border-radius: 6vh;
								    font-weight: 400;outline: none;border:none">Sign Up</button> 
								    <span style="color: #585858;padding-left: 2vw;cursor: pointer;" onclick="sign('1');">I'm already member</span>

								</div>
							</div>
						
						</form>
						
					
					
					
						<form action="dashboard.php" method="post" id="signUpForm" onsubmit="return login_validate()" autocomplete="off">
						<div class="form-group">
								<div class="label_login"> LOGIN </div>
								<input type="text" class="form-control input-lg input-block text_enter" id="username_log" name="username" placeholder="Enter Login ID">

							</div>

							<div class="form-group">
								<div class="label_login"> PASSWORD </div>
								<input type="password" class="form-control input-lg input-block text_enter" id="password_log" name="username" placeholder="Enter your Password">
							</div>
							
							<div class="form-group" style="padding-top: 4vh;">
								<div class="checkbox_form">
								<input type="checkbox" class="faChkSqr"><span style=" color: #95989A;padding-left: 1vw ">Keep me signed in</span>
								<span style=" color: #FFFFFF;padding-left: 1vw ">Forgot Password? <input type="button" name="" value="GO" id="forgot_btn" data-toggle="modal" data-target="#myModal" onclick="forgot_password()"></span>
								</div>
							</div>
							
							<div class="form-group" style="padding-top: 15.4vh;">
								<div class="" style="margin:auto;width: 80%;">
								 <button type="submit" class="btn btn-primary btn-sm" id="submitform" style=" background-color: #DF5430;
								    font-size: 14px;
								    border-radius: 6vh;
								    font-weight: 400;outline: none;border:none">Sign In</button> 

								</div>
							</div>
						
						</form>
					</div>
				</div>
			</div>
			</div>
			
			</body>
			</html>


		<div id="myModal" class="modal fade" role="dialog">
             <div class="modal-dialog">
                        <div class="modal-content">
                                   <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal">×</button>
                                         <h4 class="modal-title">Email Sent!!</h4>
                                   </div>
                                   <div class="modal-body">
                                         <p>We have Successfully Sent You the link to Reset Password..!!</p>
                                   </div>
                                   <div class="modal-footer">
                                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                   </div>
                        </div>

            </div>
     	</div>

			<style>
				#loginform , #signUpForm{
    /*background-color: #404040;*/
    border: 3px none;
    width:100%;
   
	margin-top:0px;
	    margin-bottom: 0px;
	    padding-top: 20px;
}
#loginform{
	display:none;
}
.modal-header
{
    background:#DF5430;
    color:white;
}
.btn-default
{
    background:#DF5430;
    color:white;
}

body
{ 
	/*background-image:url(../img/wall.jpg);
	body { width: 100%; height: 100%; margin: 0px; padding: 0px; }*/
	background-color:  #333333;
}
.list-group-item-choice{
	background-color:#4CAF50;
	background-color:#a0b3b0;
	border-top: 1px solid #ddd;
	border-bottom:1px solid #ddd;
	border-right:0px solid #ddd;
	margin:auto;
	padding:10px 50px;
}
.active {
  background: transparent;
  color: #ffffff;
  width:100%;
  /*padding: 30px 52px;*/
}
.list-group-item-choice:hover{
  background: #179b77;
  color: #ffffff;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.swichChoices:link ,.swichChoices:visited , .swichChoices:hover , .swichChoices:active {
    text-decoration: none;
}
a:focus, a:hover {
    color: #ffffff;
    text-decoration: none;
}
.swichChoices{
    color: #ffffff;
    text-decoration: none;
    border-radius: 7px;
}
.row{margin:0;}
.noPadding{padding-right:0px;
padding-left:0px;
padding-top:0px;}
#firstName , #lastName
{
	font-family: 'Helvetica_Nue';
    font-size: 2vh;
    width:100%;
    font-weight: 400;
    margin:auto;
}
#signUpForm > div.row{
	padding:0 43px;
}
.header{
	width:100%;
	padding-top:20px;
}
div input[type=password] , input[type=text]
{
	font-family: 'Helvetica_Nue';
    font-size: 2vh;
    width:80%;
    font-weight: 400;
    margin:auto;
}
#gender
{

	font-family: 'Helvetica_Nue';
    font-size: 2vh;
    margin:auto;
        width:80%;
    font-weight: 400;
}
div button[type="submit"]
{
	
	margin:auto;
	    width:30%;
	    color: #FFFFFF;
	    background-color: #DF5430;
    font-size: 14px;
    border-radius: 6vh;
    font-weight: normal;
    font-family: 'Helvetica_Nue';
}


.label_login
{
	color: #FFFFFF;width: 80%;margin: auto;font-size: 2.2vh; font-weight: 100;
}
.text_enter
{
	border: none;
    background: none;
    box-shadow: none;
    padding: 0px;
    border-bottom: solid grey 0.5px;
    border-radius: 0px;
    color: #95989A;
    height: 7vh;
    padding-top: 4vh;
}
.text_enter:focus
{
	border: none;
	/*color: #FFFFFF;*/
    background: none;
    box-shadow: none;
    padding: 0px;
    border-bottom: solid grey 0.5px;
    border-radius: 0px;
    height: 7vh;
    padding-top: 4vh;
}	

.text_enter::-webkit-input-placeholder {
    /*color: #FFFFFF;*/
    font-weight: 100;
    font-size: 2vh;
}				
.checkbox_form
{
	padding: 0px;
	width: 80%;
	margin:auto;
}

input.faChkRnd, input.faChkSqr {
  visibility: hidden;
}

input.faChkRnd:checked:after, input.faChkRnd:after,
input.faChkSqr:checked:after, input.faChkSqr:after {
  visibility: visible;
  font-family: FontAwesome;
  /*font-size:2vh;height: 2.2vh; width: 2.5vh;*/
 
 
  display: inline-block;
}

input.faChkRnd:checked:after {
  content: '\f058';
}

input.faChkRnd:after {
  content: '\f10c';
}

input.faChkSqr:checked:after {
  content: '\f00c';
   color: #3A3A3A;
   background-color: #E7513A;

   width: 14px;

    height: 14px;
}

input.faChkSqr:after {
  content: '\f096';
  color: #E7513A;
  background-color: #E7513A;
  width: 14px;
    height: 14px;
}
#forgot_btn
{
-webkit-border-radius: 60;
  -moz-border-radius: 60;
  border-radius: 60px;
  font-family: Arial;
  color: #ffffff;
  font-size: 12px;
/*  margin-left: 1vw;*/
  background: transparent;
  /*padding: 10px 20px 10px 20px;*/
  border: solid #ffffff 1px;
  text-decoration: none;
  outline: none;
  font-family: 'Helvetica_Nue_thin';
}
 
#signin_title,#signup_title
{

	font-family: 'Helvetica_Nue_thin';
}

.inner-wrap
{
	background-color: transparent;
	height: 100%;
	 //overflow: hidden;

}
.sinup-padding {
	    height: 19%;
    padding-top: 6vh;
}

    		.carousel-control.left
			{
				background: none;
				display: none;
			}
			.carousel-control.right
			{
				background: none;
				display: none;
			}

			.carousel-control
			{
				position: absolute;
				top: 45%;
				bottom: 0;
				left: 0;
				width: 15%;
				font-size: auto;
				color: #fff;
				text-align: center;
				opacity: 1;
				text-shadow: none;
			}
			.carousel-control:hover
			{
				color: #000;
			}
			.carousel-indicators
			{
				/*bottom: -50px;*/
			}
			.carousel-indicators li
			{
				display: inline-block;
				width: 7px;
				height: 7px;
				margin: 1px;
				text-indent: -999px;
				cursor: pointer;
				background-color: #000\9;
				background-color: #AFACAC;
				border: none;
				border-radius: 50%;
			}
			.carousel-indicators .active
			{
				display: inline-block;
				width: 7px;
				height: 7px;
				margin: 1px;
				text-indent: -999px;
				cursor: pointer;
				background-color: #000\9;
				background-color: #FFFFFF;
				border: none;
				border-radius: 50%;
				
			}
			.carousel-caption
			{
				    position: absolute;
    right: 0;
    top: 0;
    left: 0;
    z-index: 10;
    padding-top: 20px;
    height: 21vh;
    padding-bottom: 20px;
    color: #fff;
    text-align: left;
 /*   opacity: 0.4;*/

    /*background: rgba(0,0,0,0.4);*/
			}

			.carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img {
    display: block;
    width: 100%;
    height: 100%;
}
.carousel-inner {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
}
.caption_title
{
	color: #373536;
	text-shadow: none;
    font-family: 'Helvetica_Nue_thin';
    font-size: 36px;
    opacity: 0.8;
}

/*input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0 30px #404040 inset;
 color: #95989A !important;*/
    /*-webkit-border: none;
    -webkit-background: none;
    -webkit-box-shadow: none;
    -webkit-padding: 0px;
    -webkit-border-bottom: solid grey 0.5px;
    -webkit-border-radius: 0px;
    -webkit-color: #95989A;
    -webkit-height: 7vh;
    -webkit-padding-top: 4vh;*/
    
   /*}*/

   input:-webkit-autofill, textarea:-webkit-autofill, select:-webkit-autofill {    background-color: #333333 !important;  background-image: none;    -webkit-text-fill-color: #95989A !important ;-webkit-box-shadow: 0 0 0 30px #333333 inset !important} 

</style>

<script>
$(document).ready(function(){
		$('#signin_title').css('color','white');

		});


	function sign(val)
	{
		if(val == '2')
		{
			// alert("login");
			$("#signUpForm").fadeOut('fast',function(){$('#loginform').fadeIn('fast')});
			$("#signUpForm").hide();
				$('#signup_title').css('color','white');
				$('#signin_title').css('color','#95989a');
				$('#sign_up_btn').css('backgroundColor','#DF5430');
				$('#sign_up_btn').css('color','#FFFFFF');
				$('#sign_in_btn').css('backgroundColor','#727272');
				$('#sign_in_btn').css('color',' #95989A ');
		}
		if(val == '1')
		{
			// alert("signup");
			$('#loginform').fadeOut('fast',function(){$('#signUpForm').fadeIn('fast')});
		$("#loginform").hide();
			$('#signin_title').css('color','white');
			$('#signup_title').css('color','#95989a');
			$('#sign_in_btn').css('backgroundColor','#DF5430');
			$('#sign_in_btn').css('color','#FFFFFF');
			$('#sign_up_btn').css('backgroundColor','#727272');
			$('#sign_up_btn').css('color','#95989A');

		}
	}
</script>

<script type="text/javascript">

function validate () {
	var email = $("#email").val();


if ($("#username").val() == '')
	{
		$("#username").attr('placeholder', "Please Enter Name").focus();


		
		return false;
	}
else if ($("#password").val() == '')
	{
		$("#password").attr('placeholder', "Please Enter Password").focus();
		return false;
	}
else if (email == '' || !checkmail(email))
	{
		
		$("#email").attr('placeholder', "Please Enter Valid Email").focus();
		$("#email").val('');
		return false;
	}
	
}

function login_validate()
{

if ($("#username_log").val() == '')
	{
		$("#username_log").attr('placeholder', "Please Enter Username").focus();


		
		return false;
	}
	else if ($("#password_log").val() == '')
	{
		$("#password_log").attr('placeholder', "Please Enter Password").focus();
		return false;
	}
	// else if ($("#password_log").val() != '1111')
	// {
	// 	$("#password_log").val('');
	// 	$("#password_log").attr('placeholder', "Invalid Password").focus();
	// 	return false;
	// }
	// else if ($("#username_log").val() != 'pkoppen@ciproperty.com.au')
	// {
	// 	$("#username_log").val('');
	// 	$("#username_log").attr('placeholder', "Invalid Username").focus();
	// 	return false;
	// }
	else if($("#password_log").val() != "" && $("#username_log").val() != '')
	{
		var user= $("#username_log").val();
		var pass= $("#password_log").val();
		var trueorfalse = false;
		$.ajax({

				url:"ajax_check_login.php",
				type:"POST",
				data:{ username : user, password : pass },
				  async: false, 
				success: function(data)
				{
					if(data == "0")
					{
						alert("Sorry ! Invalid Credentials...");
						trueorfalse = false;
					}
					else
					{
						 trueorfalse = true;
					}


					
				}

		});

		return trueorfalse;
	}

}

$('.carousel').carousel({
  interval: 30000
})
</script>
<script>
function checkmail(email) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(email).focus();
};


function forgot_password()
{
	$.ajax({
		url: "forgot_password_email.php",
		type:"POST",
		success: function(data)
		{
			// alert(data);
		}


	})
}
</script>