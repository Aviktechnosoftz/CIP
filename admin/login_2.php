 <html>

        <head>
         <? include('header.php') ?>
        </head>
        <body id="top">
		<div class="container-fluid" style="height: 100%;padding: 50px;background:#fff">
		<div class="inner-wrap">               
				<div class="col-lg-6  col-md-6  col-sm-6 col-xs-12 noPadding box">
					


			    </div>
				<div class=" col-lg-6  col-md-6  col-sm-6 col-xs-12 noPadding box">
		
			</div>
			</div>
			
			</body>
			</html>

			<style>
				#loginform , #signUpForm{
    background-color: #404040;
    border: 3px none;
    width:100%;
   
	margin-top:0px;
	    margin-bottom: 0px;
	    padding: 20px 0;
}
#signUpForm{
	display:none;
}
body
{ 
	/*background-image:url(../img/wall.jpg);
	body { width: 100%; height: 100%; margin: 0px; padding: 0px; }*/
	background-color: #404040;
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
  background: #1ab188;
  color: #ffffff;
  width:100%;
  padding: 30px 52px;
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
	font-family: 'Exo', sans-serif;
    font-size: 16px;
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
	font-family: 'Exo', sans-serif;
    font-size: 16px;
    width:80%;
    font-weight: 400;
    margin:auto;
}
#gender
{

	font-family: 'Exo', sans-serif;
    font-size: 16px;
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
    font-weight: 400;
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
  content: '\f14a';
   color: #3A3A3A;
   background-color: #E7513A;

   width: 13px;

    height: 14px;
}

input.faChkSqr:after {
  content: '\f096';
  color: #E7513A;
  background-color: #E7513A;
  width: 13px;
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
  margin-left: 1vw;
  background: transparent;
  /*padding: 10px 20px 10px 20px;*/
  border: solid #ffffff 1px;
  text-decoration: none;

}
#forgot_btn:hover {
 

/*background-color: #41C9B5;
transition: 0.20s ease;
*/

 background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e4685d), color-stop(1, #fc8d83));
  background:-moz-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
  background:-webkit-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
  background:-o-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
  background:-ms-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
  background:linear-gradient(to bottom, #e4685d 5%, #fc8d83 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e4685d', endColorstr='#fc8d83',GradientType=0);
  background-color:#e4685d;

/*background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e4685d), color-stop(1, #41C9B5));
  background:-moz-linear-gradient(top, #e4685d 100%, #41C9B5 100%);
  background:-webkit-linear-gradient(top, #e4685d 100%, #41C9B5 100%);
  background:-o-linear-gradient(top, #e4685d 5%, #41C9B5 100%);
  background:-ms-linear-gradient(top, #e4685d 5%, #41C9B5 100%);
  background:linear-gradient(to bottom, #e4685d 5%, #41C9B5 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e4685d', endColorstr='#41C9B5',GradientType=0);*/

} 
#signin_title,#signup_title
{

	font-family: 'Helvetica_Nue_thin';
}

.inner-wrap
{
	background-color: red;
	//height: 550px;
	 //overflow: hidden;

}
.box {
	background: red;
	height: 550px;
}
.sinup-padding {
	padding-top: 4vh;
	padding-bottom: 8vh;
}
@media (max-width: 768px) {
	.sinup-padding {
		padding-top: 2vh;
	padding-bottom: 6.3vh;
	}
}
@media (max-width: 993px) {
.box {
	height: 525px;
}
}
@media (max-width: 1025px) {
	 .sinup-padding {
	padding-top: 10px;
	padding-bottom: 10px;
}
}
@media screen and (min-width: 1025px) and (max-width: 1280px) {
	 .sinup-padding {
	padding-top: 10px;
	padding-bottom: 17px;
}
 }
</style>

<script>
$(document).ready(function(){
		$('#signup_title').css('color','white');

		});


	function sign(val)
	{
		if(val == '2')
		{
			$("#signUpForm").fadeOut('fast',function(){$('#loginform').fadeIn('fast')});
			$("#signUpForm").hide();
				$('#signup_title').css('color','white');
				$('#signin_title').css('color','#95989a');
				$('#sign_up_btn').css('backgroundColor','#DF5430');
				$('#sign_up_btn').css('color','#FFFFFF');
				$('#sign_in_btn').css('backgroundColor','#95989a');
				$('#sign_in_btn').css('color','grey');
		}
		if(val == '1')
		{
			
			$('#loginform').fadeOut('fast',function(){$('#signUpForm').fadeIn('fast')});
		$("#loginform").hide();
			$('#signin_title').css('color','white');
			$('#signup_title').css('color','#95989a');
			$('#sign_in_btn').css('backgroundColor','#DF5430');
			$('#sign_in_btn').css('color','#FFFFFF');
			$('#sign_up_btn').css('backgroundColor','#95989a');
			$('#sign_up_btn').css('color','grey');

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
	else if ($("#password_log").val() != '1111')
	{
		$("#password_log").val('');
		$("#password_log").attr('placeholder', "Invalid Password").focus();
		return false;
	}
	else if ($("#username_log").val() != 'pkoppen@ciproperty.com.au')
	{
		$("#username_log").val('');
		$("#username_log").attr('placeholder', "Invalid Username").focus();
		return false;
	}

}
</script>
<script>
function checkmail(email) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(email).focus();
};
</script>