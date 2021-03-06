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

if(isset($_REQUEST['back']))
{
	header("location:visitor_induction.php");
}
 $project_name= $conn->query("select project_name,number from tbl_project where id='".$_SESSION['admin']."'")->fetch_object();
 $id= $_REQUEST['visitor_form'];
 $get_query=$conn->query("select tbl_employee.id, tbl_employee.given_name as name,tbl_employee.pin,tbl_employee.email_add,tbl_employee.contact_phone,tbl_employer.company_name,tbl_employer.Tread, tbl_visitor_induction.induction_no,tbl_visitor_induction.id as visit_id,tbl_visitor_induction.position,tbl_visitor_induction.today_date,tbl_visitor_induction.visitor_business,tbl_visitor_induction.visitor_name,tbl_visitor_induction.visitor_mobile,tbl_visitor_induction.visit_reason,tbl_visitor_induction.visit_in ,tbl_visitor_induction.visit_out,tbl_visitor_induction.cont_business   FROM tbl_employee JOIN tbl_visitor_induction ON tbl_employee.id = tbl_visitor_induction.induction_no JOIN tbl_induction_register ON tbl_employee.id = tbl_induction_register.id JOIN tbl_employer ON tbl_employer.id = tbl_induction_register.empid WHERE  tbl_visitor_induction.id= '".$id."'   AND visit_out !='' ORDER BY created DESC")->fetch_object();
 
 if($get_query->cont_business != "")
 {
 $get_consultant_name= $conn->query("select consultant_name from tbl_consultant where id= ".$get_query->cont_business."")->fetch_object();
}

$visitior_db= $get_query->visitor_name;
$myArray = explode('#', $visitior_db);

$thirdArray = array();

foreach ($myArray as $key => $value) {
      $secondaryArray = explode(',', $value);
      foreach($secondaryArray as $val)
      {
      array_push($thirdArray, $val);
      }
    }

if(isset($_REQUEST['back'])== true)
{
	?>
	<script>
		window.location.href="visitor_induction_form.php"
	</script>
	<?
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<head>
<header>
  <? include('header.php'); ?>
  <? include('test_side_new.php'); ?>
</header>

<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="col-md-12 control-label form-name">Approved Visitor Induction Form</label>

        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>
<!-- <div class="Main_Form" style="border: 1px solid grey;
    float: left;
    position: absolute;
    /* margin: -220px 0 0 -200px; */
    margin-top: -25vh;
    top: 38.5vh;
    left: 27.5%;
    width: 72.5%;
    background-color: #f5f5f5;
    border-radius: 4px;
    overflow-y: scroll;
    max-height: 82.2%;">
	
 <center> -->
<div class="Main_Form2">
  <div class="col-md-12">
    <form class="well form-horizontal well_class" action=" " method="post"  id="contact_form">
      <fieldset>

<!-- Form Name -->
        <div class="form-group">
                <div class="col-md-12" style="padding-left: 0px;padding-bottom: 25px;">
                <label class="col-md-12 control-label" style="padding-left: 0px;"><span class="project_title" style="">PROJECT :&nbsp;<? echo $project_name->project_name ?> </span></label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12 note" style="margin-bottom: 15px">
            NOTE : All visitors must be accompanied at all times by someone who has been fully inducted onto this site and follow all instructions given to them. Visitors must wear a safety helmet, safety footwear, a high visibility vest and any other PPE deemed appropriate for the site.
            </div>
        </div>

         <div class="form-group">
            <span class="col-md-6 label-title" style="padding-bottom: 30px">SITE VISITOR DETAIL</span>          
        </div>


        <!-- Text input-->
        <div class="form-group"> 
          <!-- <label class="col-md-4 control-label">Date</label> -->
            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>              
                <input name="city" id="date_show" placeholder="Date" class="form-control"  type="text" value="<? echo $get_query->today_date; ?>" readonly>
            </div>
          </div>
        </div>

<div class="form-group">
<!--   <label class="col-md-4 control-label" >Visitor/Business Name</label>  -->
    <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
        <input name="last_name" placeholder="Visitor/Business Name" class="form-control"  type="text" value="<? echo $get_query->visitor_business; ?>" readonly>
      </div>
  </div>
</div>
<div class="form-group">
  <!-- <label class="col-md-4 control-label" >Consultant</label>  -->
  <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
      <input name="consultant" placeholder="Consultant Name" class="form-control"  type="text" value="<?= $get_consultant_name->consultant_name ?>" readonly>
    </div>
  </div>
</div>

 <div class="form-group">
  <!-- <label class="col-md-4 control-label">Visitor</label> -->  
    <div class="col-md-6 rightpadding">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input name="email" placeholder="Visitor" class="form-control"  type="text" value="<? echo $thirdArray[0]; ?>" readonly>
    </div>
  </div>
  <div class="col-md-6 leftpadding">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
        <input name="email" placeholder="Mobile Number" class="form-control"  type="text" value="<? echo $thirdArray[1] ?>" readonly>
    </div>
  </div>
</div>
<div class="form-group">
 <!--  <label class="col-md-4 control-label">Visitor</label>   -->
   <div class="col-md-6 rightpadding">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input name="email" placeholder="Visitor" class="form-control"  type="text" value="<?echo $thirdArray[2] ?>" readonly>
    </div>
  </div>
<div class="col-md-6 leftpadding">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
        <input name="email" placeholder="Mobile Number" class="form-control"  type="text" value="<? echo $thirdArray[3] ?>" readonly>
    </div>
  </div>
</div>
<div class="form-group">
<!--   <label class="col-md-4 control-label">Visitor</label>   -->
    <div class="col-md-6 rightpadding">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input name="email" placeholder="Visitor" class="form-control"  type="text" value="<? echo $thirdArray[4] ?>" readonly>
    </div>
  </div>
   <div class="col-md-6 leftpadding">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
        <input name="email" placeholder="Mobile Number" class="form-control"  type="text" value="<? echo $thirdArray[5] ?>" readonly>
    </div>
  </div>
</div>
<div class="form-group">
 <!--  <label class="col-md-4 control-label">Visitor</label>   -->
    <div class="col-md-6 rightpadding">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input name="email" placeholder="Visitor" class="form-control"  type="text" value="<? echo $thirdArray[6] ?>" readonly>
    </div>
  </div>
   <div class="col-md-6 leftpadding">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
       <input name="email" placeholder="Mobile Number" class="form-control"  type="text" value="<? echo $thirdArray[7] ?>" readonly>
    </div>
  </div>
</div>
<div class="form-group">
<!--   <label class="col-md-4 control-label" >Reason For Visit</label>  -->
    <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
      <input name="last_name" placeholder="Reason for Visit" class="form-control"  type="text" value="<? echo $get_query->visit_reason; ?>" readonly>
    </div>
  </div>
</div>
<div class="form-group"  style="margin-bottom: 0px;">
  <span class="col-md-6 rightpadding control-label label-position time">Time In</span>  
   <label class="col-md-6 leftpadding control-label label-position time"><span class="leftpadding">Time Out</span></label> 
</div>

<div class="form-group">
  <div class="col-md-6 rightpadding">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
      <input name="last_name" placeholder="Time In" class="test"  type="text" value="<? echo $get_query->visit_in; ?>" readonly>
    </div>
  </div>

 <div class="col-md-6 leftpadding">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
      <input name="last_name" placeholder="Time Out" class="test"  type="text" value="<? echo $get_query->visit_out; ?>" readonly>
    </div>

  </div>

</div>


<!-- <div class="form-group">
  <label class="col-md-4 control-label" >Time Out</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
  <input name="last_name" placeholder="Time Out" class="form-control"  type="text" value="<? echo $get_query->visit_out; ?>" readonly>
    </div>
  </div>
</div> -->


<div class="col-md-12 h-divider"  style="padding-left: 0px;padding-right: 0px;"></div> 

<div class="form-group">
   <label class="col-md-6 rightpadding control-label label-title">INDUCTED PERSON</label> 
  <label class="col-md-3 control-label"><div style=" TEXT-ALIGN: RIGHT; font-family: 'Avenirnext';font-size: 12px">Induction No.</div></label>
  <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
  <input  placeholder="Induction Number" class="form-control"  type="text" name="induction_no" value="<? $value= str_pad($get_query->id, 4, '0', STR_PAD_LEFT); echo $value; ?>" style= "text-align: center;"readonly>
    </div>
  </div>  
</div>

<div class="form-group">
 <label class="col-md-12 control-label label-position">Employer/Business Name</label> 
    <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
  <input name="last_name" placeholder="Employer Name" class="form-control"  type="text" value="<? echo $get_query->company_name; ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->



<!-- Text input-->
       <div class="form-group">
          <label class="col-md-12 control-label label-position">Subcontractor Name</label>  
          <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input name="email" placeholder="Subcontractor Name" class="form-control"  type="text" value="<? echo $get_query->given_name." ".$get_query->name; ?>" readonly>
            </div>
          </div>
        </div>


<!-- Text input-->
       
        <div class="form-group">
          <label class="col-md-12 control-label label-position">Mobile No. </label>  
            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input name="phone" placeholder="(845)555-1212" class="form-control" type="text" value="<? echo $get_query->contact_phone; ?>" readonly>
            </div>
          </div>
        </div>

<!-- Text input-->
      
        <div class="form-group">
         <label class="col-md-12 control-label label-position">Trade</label>  
           <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
                <input name="address" placeholder="Trade" class="form-control" type="text" value="<? echo $get_query->Tread ?>" readonly>
            </div>
          </div>
        </div>

<!-- Text input-->
 
        <div class="form-group">
           <label class="col-md-12 control-label label-position">Email Address</label>  
            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input name="city" placeholder="Enail Address" class="form-control"  type="text" value="<? echo $get_query->email_add?>" readonly>
            </div>
          </div>
        </div>

<!-- Select Basic -->
   

<!-- Text input-->

        <div class="form-group"> 
          <label class="col-md-12 control-label label-position">Date</label>
          <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>             
                <input name="city" id="date_show" placeholder="Date" class="form-control"  type="text" value="<? echo $get_query->today_date; ?>" readonly>
            </div>
          </div>
        </div>
<!-- Success message -->
<!-- <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div> -->

<!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label"></label>
          <div class="col-md-5">
            <input type="submit" class="btn btn-warning form_submit_button" value="Back to Visitor Induction Forms" name="back"> </input>
          </div>
        </div>

</fieldset>
</form>
<? include('footer_new.php'); ?>
</div>
</div><!-- main_form2 -->



<!-- </center>   -->      
</div> 
 