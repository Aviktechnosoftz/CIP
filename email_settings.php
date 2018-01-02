<?php

session_start();
error_reporting(0);
include_once('connect.php');
if(!isset($_SESSION['admin']))
{
	header("location:logout.php");
}
else
{
	$user= $_SESSION['admin'];
}
$get_email_rows= $conn->query("Select * from tbl_setting where project_id='".$_SESSION['admin']."'");
$get_email=$get_email_rows->fetch_object();


if (isset($_POST['site_msg'])) {
  if($get_email_rows->num_rows >0)
  {
    
    $update_site_msg=$conn->query(
      "update tbl_setting SET
                    site_induction_msg = '".trim($_POST['site_msg'])."' where project_id='".$_SESSION['admin']."'");
    $success=1;
  }
  else
  {
    $error=1;
  }
}
if (isset($_POST['visitor_msg'])) {
  if($get_email_rows->num_rows >0)
  {
   
    $update_site_msg=$conn->query(
      "update tbl_setting SET
                    visitor_induction_msg = '".trim($_POST['visitor_msg'])."' where project_id='".$_SESSION['admin']."'");
    $success=1;
    
  }
  else
  {
    $error=1;
  }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
 <script type="text/javascript" src=js/validation_site_induction.js></script>


<header>
 <? include('header.php'); ?>
 <? include('test_side_new.php'); ?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">
</header>


<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">Email Settings and Message&nbsp;<?// echo $project_name->project_name ?> </span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>

<body>
  <div class="Main_Form_list">

      <div class="well form-horizontal well_class" >
      <div class="form-group">
           <div class="col-md-12" style="padding-left: 0px;padding-bottom: 5px;">
                <label class="col-md-12 control-label" style=""><span class="project_title" style="">PROJECT :&nbsp;<? echo $_SESSION['project_name'] ?> </span></label>
            </div>
        </div>

         <div class="alert alert-warning" role="alert" style="<? if($error!='1'){ echo 'display:none;';}?>">
          <strong>Sorry!</strong> You Have Not Registered Email Address with Us.&nbsp
          <!-- <input type="button" name="" value="Go Back" onclick="back()"> </button> -->
        </div>
        <div class="alert alert-success" role="alert" style="<? if($success!='1'){ echo 'display:none;';}?>">
          <strong>Well Done !</strong> Your Message Have been Saved.&nbsp
          <input type="button" name="" value="Refresh" onclick="window.location.href='email_settings.php'"> </button>
        </div>

  			<div class="col-sm-12" style="padding-left: 0px;padding-right: 0px " >
    		<div class="col-sm-12" style="padding-left: 0px;padding-right: 0px " >
                <label>Enter the Email ID</label>
								<script>
								$( document ).ready(function() {
								    if($('#email2').val()=="")
								    {
								    	  $("#email2").val("No Email Registered");
								    }
								    
								});
								</script>
								<input type="text" id="email2" placeholder="Enter First Name Here.." class="form-control form-control-left-radius" value="<? echo $get_email->induction_mail ?>" readonly>
								
							</div>
    
  			</div>
  			<div class="col-sm-12" style="">
    
    		<h1 class="text-center"><a href="#myModal" role="button" class="btn btn-success btn-md" data-toggle="modal" style="background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;">Register New Email ID</a></h1>
    
  			</div>

        <div class="col-sm-12" style="margin-top: 10px">
        <hr>
        <div class="form-group">
        <form name="site_mail_msg" id="site_mail_msg"  method="POST" >
          <div class="col-sm-6" style="padding-left: 0">
            <label>Message For Site Induction</label>
            <textarea id="site_msg" name="site_msg" placeholder="Message..." rows="3" class="form-control form-control-left-radius"  style="resize: none;"><?=$get_email->site_induction_msg ?></textarea>
            
          </div>
      </form>
      <form name="visitor_mail_msg" id="visitor_mail_msg" method="POST">
          <div class="col-sm-6" style="padding-right: 0">
            <label>Message For Visitor Induction</label>
            <textarea name="visitor_msg" id="visitor_msg" placeholder="Message..." rows="3" class="form-control form-control-left-radius"  style="resize: none;"><?=$get_email->visitor_induction_msg ?></textarea>
          </div>
        </div>
        </form>
      </div>
      <div class="col-sm-12">
<div class="form-group">
<div class="col-sm-4 col-sm-offset-2">
<input type="button" onclick="site_msg2()" name="" value="Save Message" class="btn btn-success btn-md" style="background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;" >

</div>
<div class="col-sm-4 col-sm-offset-2">
<input type="button" name="" value="Save Message" class="btn btn-success btn-md" style="background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;" onclick="visitor_msg2()">
</div>
</div>

      </div>
  		


</div> <!-- Wrapper Close -->
</div>  <!-- Conatiner Close -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: #f5f5f5">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="outline: none">x</button>
        <h3 id="myModalLabel">We'd Love to Register New Email ID</h3>
      </div>
      <div class="modal-body" style="height: 80px">
        <form class="form-horizontal col-sm-12" method="POST" >
        
         
          <div class="form-group"><label>E-Mail</label><input id="email" class="form-control form-control-left-radius email" placeholder="email@you.com (so that we can register you)" data-placement="top" data-trigger="manual" data-content="Must be a valid e-mail address (user@gmail.com)" type="text"></div>
      
          <div class="form-group"><input type= "button"  value="Register!" onclick = "email_validate()" class="btn btn-success pull-right" style="background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;width: 8vw"> <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p></div>
        </form>
      </div>
      <div class="modal-footer">
        <button id= "cancel" class="btn" data-dismiss="modal" aria-hidden="true" style="background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;width: 8vw;">Cancel</button>
      </div>
    </div>
  </div>
</div>


</body>


 <script>
 	function email_validate()
 	 {

    var x = document.getElementById('email').value;
    var dataString = 'name1='+ x;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert ("Not a valid e-mail address");
       
    }
    else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "ajax_new_email.php",
data: dataString,
cache: false,
success: function(html) {
alert(html);
window.location.href='email_settings.php';
}
});
}

}


 </script>
    
    <style>



 label {
    
    font-weight: 100;
    font-style: italic;
    padding-left: 25px;
}
    </style>
  <footer>
  <? include("footer.php"); ?>
<footer>
<script type="text/javascript">

  function site_msg2()
{
  if($('#site_msg').val() =="" )
  {
    alert( "Please Enter Site Induction Message");
  }
  else
  {
    $('#site_mail_msg').submit();
  }
  
}

function visitor_msg2()
{
  if($('#visitor_msg').val() =="" )
  {
    alert( "Please Enter Visitor Induction Message");
  }
  else
  {
    $("#visitor_mail_msg").submit();
  }
  
}
</script>