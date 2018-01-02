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

$project_name= $conn->query("select project_name,number from tbl_project where id='".$_SESSION['admin']."'")->fetch_object();

$get_query=$conn->query("select tbl_employee.id,CONCAT_WS(' ',tbl_employee.given_name,tbl_employee.surname) as given_name,tbl_employee.pin,tbl_employee.email_add,tbl_employee.contact_phone,tbl_employer.company_name,tbl_employer.tread,tbl_employee.occupation,tbl_induction_register.empid FROM tbl_employee JOIN tbl_induction_register ON tbl_employee.id = tbl_induction_register.id JOIN tbl_employer ON tbl_employer.id = tbl_induction_register.empid WHERE tbl_employee.id ='".$_SESSION['induction']."' AND tbl_employee.pin ='".$_SESSION['pin']."'")->fetch_object();

if(isset($_POST['save']))
{
	$visitor_business= $_POST['visitor_business_name'];
  $v_name_1=$_POST['visit_name_1'].",".$_POST['visit_phone_1']."#".$_POST['visit_name_2'].",".$_POST['visit_phone_2']."#".$_POST['visit_name_3'].",".$_POST['visit_phone_3']."#".$_POST['visit_name_4'].",".$_POST['visit_phone_4'];
 
        // if($_POST['visit_name_2'] != "" || $_POST['visit_name_3']!="")
        // {
        //  $replace=str_replace("#,#","#",$v_name_1);
        // $visitor=rtrim($replace,"#,#,");
        // }
        // else{
        // $replace=str_replace("#,#,#","#",$v_name_1);
        // $visitor= rtrim($replace,"#,#,");
        // }


    $visit_reason =$_POST['visit_reason'];
    $time_in=$_POST['time_in'];
     $induction_no=ltrim($_POST['induction_no'],"0");

    $emp_name= $_POST['emp_name'];
    $emp_trade=$_POST['emp_trade'];

    $visitor_insert = $conn->query("insert into tbl_visitor_induction set 
                    induction_no = '".$induction_no."',
                     position= '".$emp_trade."',
                    today_date = CURDATE(),
                    project_id= '".$_SESSION['admin']."',
                    visitor_business = '".$visitor_business."',
                    visitor_name = '".$v_name_1."',
                    visit_reason = '".$visit_reason."',
                    visit_in = '".$time_in."',
                    cont_business= '".$_POST['select_consultant']."',
                    visit_out = '',  
                    created=now(),
                    updated=now()");
    
    if($visitor_insert)
{




    $get_email= $conn->query("Select * from tbl_setting where project_id='".$_SESSION['admin']."'")->fetch_object();
    $get_state=$conn->query("select tbl_state.state_name,tbl_project_detail.state_id from tbl_project_detail INNER JOIN tbl_state ON  tbl_project_detail.state_id=tbl_state.id where tbl_project_detail.project_id='".$_SESSION['admin']."'")->fetch_object();
    $email= $get_email->induction_mail;  
    $max= $conn->query("Select MAX(id) as max from tbl_visitor_induction where project_id='".$_SESSION['admin']."'")->fetch_object();
     $date= date('y/m/d');
    $new_date= str_replace('/','',$date);
    $Sub = $_SESSION['project_name']."-".$new_date."-Visitor On Site-".$_POST['visit_name_1'];
 
  
  




          $to="shashank.r@aviktechnosoft.com".",".$email.",".$get_query->email_add;
        $msg = "<html> 
        <body>
        Hello HSR / SM, <br/><br/>

        You Have a Visitor Onsite and his name is ".$_POST['visit_name_1']." and he works for ".$emp_name.".The inducted person showing the visitor around is ".$_POST['subbie_name']." <br/>

        ".$get_email->visitor_induction_msg." <br/><br/>


       
       <a href ='https://cipropertyapp.com/visitor_induction_form_sign_out.php?visitor_form=".$max->max."'><input type=\"button\" value=\"Review\"> </a><br/><br/>




      Thanks <br/>
      Team CIP <br/>
      Sent from Web  <br/>   </body> 
      </html>";
        $subject= $Sub;
        $url = 'http://192.169.226.71/volts_dev/send_mail.php';
        $data = array('to' => $to, 'msg' => $msg, 'subject' => $subject);
        $options = array('http' => array(
          'method'  => 'POST',
          'content' => http_build_query($data)
              ));

              $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
              // $success= 1;


  ?>
     <script>
          
                  alert("You Have Successfully Visitor Details");
                  window.location.href='visitor_induction_out.php';
      </script>
 
<?
    }
}
 
 // $id= $_POST['visitor_form'];
 



// $visitior_db= $get_query->visitor_name;
// $myArray = explode('#', $visitior_db);

// $thirdArray = array();

// foreach ($myArray as $key => $value) {
//       $secondaryArray = explode(',', $value);
//       foreach($secondaryArray as $val)
//       {
//       array_push($thirdArray, $val);
//       }
//     }



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<head>
<header>
 <? include('header_demo.php'); ?>
  <? include('test_side_new.php'); ?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">



</header>
<div class="main_form_header" style="/*border: 1px solid grey;*/float: left;position: absolute;/*margin-top: -25vh;*/top: 16vh;
    left: 27.5%;
    width: 72.5%;
    background-color: #f5f5f5;
    height: 21.5%;
    padding-top: 30px;
    padding-bottom: 30px;
    padding-left: 15px;
    padding-right: 20px;">
<div class="col-md-12" style="padding-top: 14px">
  <div class="col-md-6" style="text-align: left;padding-left: 0px;height: 100px;padding-top: 30px;">
      <legend style="border-bottom: none;margin-bottom: 0px;">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
      <label class="col-md-12 control-label" style="text-align: left;padding-left: 0px;padding-top: 0px;"><span style="color: #000000;font-weight: normal;text-transform: uppercase;font-size: 1.5vh;font-style: normal;font-family: 'Avenirnext';padding-top: 0px;color: #686868">VISITOR INDUCTION FORM</label></span>
      <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
  </div>
    <div class="col-md-6" style="text-align: right;padding-right: 5px">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
</div>    
</div>

<div class="Main_Form2" style="/*border: 1px solid grey;*/
    float: left;
    position: absolute;
    /* margin: -220px 0 0 -200px; */
    /*margin-top: -25vh;*/
    top: 37.5vh;
    left: 27.5%;
    width: 72.5%;
    background-color: #f5f5f5;
    /*border-radius: 4px;*/
    overflow-y: scroll;
   max-height: 63%;">
	
 <center>

<div class="col-md-12">

    <form class="well form-horizontal" action=" " method="post"  id="contact_form" style="border: none;padding: 30px;padding-bottom: 0px;    padding-top: 0px;margin-bottom: 80px">
<fieldset>

<!-- Form Name -->
 <!--  <div class="form-group" style="margin-bottom: 50px">
    <div class="col-md-6" style="text-align: left;padding-left: 0px;height: 100px;
    padding-top: 30px;">
      <legend style="border-bottom: none;margin-bottom: 0px;">SAFETY MANAGEMENT SYSTEM</legend>
      <label class="col-md-12 control-label" style="text-align: left;padding-left: 0px;padding-top: 0px;"><span style="color: #000000;font-weight: normal;

    text-transform: uppercase;
    font-size: 2vh;
    font-style: normal;font-family: 'Avenirnext';padding-top: 0px;color: #686868">VISITOR INDUCTION FORM</label></span>

      <input type="hidden" name="id" value="<?= $instruction_no->id ?>">
      <label class="col-md-12 control-label" style="text-align: left;padding-left: 0px;margin-top: 20px;"><span style="color: #000000;font-weight: normal;

    text-transform: uppercase;
       font-size: 1.7vh;
    font-style: normal;font-family: 'Avenirnextmedium';padding-top: 0px;">PROJECT :<? echo $project_name->project_name ?> </label></span>
    </div>
    <div class="col-md-6" style="text-align: right;padding-right: 0px">
      <img src="image/logo.png" width="100px" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> -->
<!-- <div style="height: 600px;overflow-y: scroll;padding-left: 0;padding-right: 0;">  --> 
<div class="form-group">
  <div class="col-md-12" style="padding-left: 0px;padding-bottom: 25px;">
      <label class="col-md-12 control-label" style="text-align: left;padding-left: 0px;"><span style="color: #000000;font-weight: normal;text-transform: uppercase;font-size: 1.7vh;font-style: normal;font-family: 'Avenirnextmedium';padding-top: 0px;">PROJECT :&nbsp;<? echo $project_name->project_name ?> </span></label>
  </div>
</div>
<div class="form-group" style="">
    <div class="col-md-12" style="text-align: left;margin-bottom: 15px;padding-left: 0px;height: 50px;
    font-size: 12px;    padding-right: 0px;font-family: 'Avenirnext'">
    NOTE : All visitors must be accompanied at all times by someone who has been fully inducted onto this site and follow all instructions given to them. Visitors must wear a safety helmet, safety footwear, a high visibility vest and any other PPE deemed appropriate for the site.
    </div>
</div>    

<div class="form-group">
   <span class="col-md-12" style="text-align: left;padding-left: 0px;color:#000000;font-family: 'Avenirnextmedium';font-size: 2vh;padding-bottom: 30px">SITE VISITOR DETAIL</span> 
  
</div>


<!-- Text input-->
<div class="form-group"> 

 <!-- <div class="col-md-12" style="padding-left: 0px;">  -->
  <!-- <label class="col-md-4 control-label">Date</label> -->
    <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      
  <input name="city" id="date_show" placeholder="Date" class="form-control"  type="text" name="date_today" value=" <? echo date('Y-m-d') ?>" readonly>
    </div>
  </div>
</div>

<!-- </div> -->
<div class="form-group">
 <!--  <label class="col-md-4 control-label" >Visitor/Business Name</label>  -->
    <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
  <input  placeholder="Visitor/Business Name" class="form-control" id="visitor_business" type="text" value="" name="visitor_business_name" ">
    </div>
  </div>
</div>
<h4 id="or" style="color: #686868;"> OR </h4>
<div class="form-group" id="consultant">
  <!-- <label class="col-md-4 control-label" >Consultant</label>  -->
  <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
 
<select style="height: 34px;display: block;width: 100%;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;    border: none;background-color: #fff;background-image: none;border-top-right-radius: 10vh;border-bottom-right-radius:10vh " id="select" name="select_consultant" onchange="disable_visitor()" >
                 <option id="default" value="">Please Select Consultant Business Name</option>
                 <?$get_consultant= $conn->query("select consultant_name,id from tbl_consultant where is_deleted=0 AND project_id='".$_SESSION['admin']."'"); 
                 while ($row_consultant=$get_consultant->fetch_object()) { ?>
                <option id="default" value="<?= $row_consultant->id ?>"><?= $row_consultant->consultant_name ?></option>
                <? } ?>
                  </select>
    </div>
</div>
</div>
<!-- <div class="h-divider"></div> -->
 <div class="form-group">
  <!-- <label class="col-md-4 control-label">Visitor</label>   -->
    <div class="col-md-6" style="padding-left: 0px;padding-right: 15px;">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  placeholder="Visitor" class="form-control" name="visit_name_1"  type="text" value="" required>
    </div>
  </div>
  <div class="col-md-6" style="padding-left: 15px;padding-right: 0px;">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
  <input  placeholder="Mobile Number" class="form-control" name="visit_phone_1"  type="text" value="" required   onkeypress="return event.charCode > 47 && event.charCode < 58;" pattern="^[0-9]*$" minlength="10" maxlength="12">
    </div>
  </div>
</div>
<div class="form-group">
 <!--  <label class="col-md-4 control-label">Visitor</label>   -->
   <div class="col-md-6" style="padding-left: 0px;padding-right: 15px;">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  placeholder="Visitor" class="form-control" name="visit_name_2" type="text" value="" >
    </div>
  </div>
     <div class="col-md-6" style="padding-left: 15px;padding-right: 0px;">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
  <input  placeholder="Mobile Number"  onkeypress="return event.charCode > 47 && event.charCode < 58;" pattern="^[0-9]*$" minlength="10" maxlength="12" class="form-control" name="visit_phone_2" type="text" value="">
    </div>
  </div>
</div>
<div class="form-group">
  <!-- <label class="col-md-4 control-label">Visitor</label>   -->
      <div class="col-md-6" style="padding-left: 0px;padding-right: 15px;">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  placeholder="Visitor" class="form-control" name="visit_name_3" type="text" value="" >
    </div>
  </div>
     <div class="col-md-6" style="padding-left: 15px;padding-right: 0px;">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
  <input  placeholder="Mobile Number" class="form-control" name="visit_phone_3"   type="text"  onkeypress="return event.charCode > 47 && event.charCode < 58;" pattern="^[0-9]*$" minlength="10" maxlength="12" value="" >
    </div>
  </div>
</div>
<div class="form-group">
 <!--  <label class="col-md-4 control-label">Visitor</label>   -->
      <div class="col-md-6" style="padding-left: 0px;padding-right: 15px;">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  placeholder="Visitor " class="form-control" name="visit_name_4" type="text" value="" >
    </div>
  </div>
    <div class="col-md-6" style="padding-left: 15px;padding-right: 0px;">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
  <input  placeholder="Mobile Number"  onkeypress="return event.charCode > 47 && event.charCode < 58;" pattern="^[0-9]*$" minlength="10" maxlength="12" class="form-control" name="visit_phone_4"  type="text" value="">
    </div>
  </div>
</div>
<div class="form-group">
  <!-- <label class="col-md-4 control-label" >Reason For Visit</label>  -->
     <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
  <input placeholder="Reason for Visit" class="form-control" name="visit_reason"  type="text" value="" required>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" style="padding-left: 40px;padding-right: 0px;font-family: 'Avenirnext';color: #000">Time In</label> 
    <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
  <input   placeholder="Time IN" id="demo" class="test" name="time_in" type="text" readonly>
    </div>
  </div>
</div>
<script language="javascript">
var today = new Date();
document.getElementById("demo").value =  today.getHours() + ":" + today.getMinutes();
</script> 




<div class="col-md-12 h-divider"  style="padding-left: 0px;padding-right: 0px;"></div> 

<div class="form-group">
   <label class="col-md-6 control-label" style="text-align: left;padding-left: 0px;color:#686868;font-family: 'Avenirnextmedium';font-size: 2vh">INDUCTED PERSON</label> 
  <label class="col-md-3 control-label" style=" TEXT-ALIGN: RIGHT;font-family: 'Avenirnext'">Induction No.</label>
  <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
  <input style="text-align: center;" placeholder="Induction Number" class="form-control"  type="text" name="induction_no" value="<? $value= str_pad($get_query->id, 4, '0', STR_PAD_LEFT); echo $value; ?>" readonly>
    </div>
  </div>  
</div>

<!-- <div class="form-group">
  <label class="col-md-4 control-label" style="">Induction No.</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
  <input  placeholder="Induction Number" class="form-control"  type="text" name="induction_no" value="<? $value= str_pad($get_query->id, 4, '0', STR_PAD_LEFT); echo $value; ?>" readonly>
    </div>
  </div>
</div> -->

<div class="form-group">
   <label class="col-md-12 control-label" style="padding-left: 40px;padding-right: 0px;">Employer/Business Name</label> 
    <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
  <input name="emp_name" placeholder="Employer Name" class="form-control"   type="text" value="<? echo $get_query->company_name; ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->



<!-- Text input-->
       <div class="form-group">
  <label class="col-md-12 control-label" style="padding-left: 40px;padding-right: 0px;">Subcontractor Name</label>  
        <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="subbie_name" placeholder="Subcontractor Name" class="form-control"  type="text" value="<? echo $get_query->given_name; ?>" readonly>
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-12 control-label" style="padding-left: 40px;padding-right: 0px;">Mobile No. </label>  
    <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="phone" placeholder="(845)555-1212" class="form-control" type="text" value="<? echo $get_query->contact_phone; ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
 <label class="col-md-12 control-label" style="padding-left: 40px;padding-right: 0px;">Trade</label>  
   <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
  <input  placeholder="Trade" class="form-control" type="text" name="emp_trade" value="<? echo $get_query->tread ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
 
<div class="form-group">
  <label class="col-md-12 control-label" style="padding-left: 40px;padding-right: 0px;">Email Address</label>  
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
 <label class="col-md-12 control-label" style="padding-left: 40px;padding-right: 0px;">Date</label>
<div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      
  <input name="city" id="date_show" placeholder="Date" class="form-control"  type="text" value="<? echo date("Y-m-d"); ?>" readonly>
    </div>
  </div>
</div>
<!-- Success message -->
<!-- <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div> -->

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-5">
    <input type="submit" class="btn btn-success" value="Submit" name="save" style="background-color:#f47821;color: white;border:none;border-radius:10vh;width: 100%;outline: 0;margin-top: 20px;margin-bottom: 20px"> </input>
  </div>
</div>
<!-- </div> -->
</fieldset>
</form>
<? include("footer_demo.php"); ?> 
</div>
    </div><!-- /.container -->



</center>

</div> 
 <script type="text/javascript">
   
 $('#visitor_business').keyup(function() {

 
  if ($('#visitor_business').val().length <= 0) 
  {
       $('#consultant').show();
        $('#or').show();
        $('#select').prop('required',true);
        $('#visitor_business').prop('required',true);
  }
     else
     {
       $('#consultant').hide();
        $('#or').hide();
        $('#select').prop('required',false);
        // $('#visitor_business').prop('required',true);
      }   
 });

$( document ).ready(function() {
  $('#select').prop('required',true);
        $('#visitor_business').prop('required',true);
    
});
function disable_visitor()
{
  
  if( $('#select').val()!="")
  {
     $('#visitor_business').prop('disabled', true);
     $('#visitor_business').prop('required',false);
  }
  else
  {
    $('#visitor_business').prop('disabled', false);
    $('#visitor_business').prop('required',true);
  }
}
 </script>
  <style> 
 input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
input[type="number"] {
    -moz-appearance: textfield;
}

input[type="date"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    display: none;
    margin: 0;
}
.h-divider{
  margin-top:5px;
 margin-bottom:20px;
 height:1px;
 border-top:1.5px solid #E9E4E4;
}
label {
    
    font-weight: 100;
    font-size: 12px;
    font-style: normal;
    color: #555555;
    font-family: 'Avenirnextitalic';
}
.form-horizontal .control-label {
text-align: left;
padding-bottom: 7px;

  }

.form-control {
border-radius: 20vh;
border:none;
    box-shadow: none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   -moz-transition: none;
   -webkit-transition: none;
/*outline: none;
    border: none;
    box-shadow: none;
    -webkit-box-shadow: none;*/
}
.form-control:focus
{
  border:none;
    box-shadow: none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   -moz-transition: none;
   -webkit-transition: none;
}
input.form-control,input.form-control:focus {
    border:none;
    box-shadow: none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   -moz-transition: none;
   -webkit-transition: none;
}

select:focus
{
  border:none;
    box-shadow: none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   -moz-transition: none;
   -webkit-transition: none;
   outline: none;
} 

input[type="date"]:focus
{
  outline: none;
}
input[type="date"]
{
  border:none;
  box-shadow: none;
  text-align: center;
}

.input-group-addon:first-child {
    /* border-right: 0; */
       border-bottom-left-radius: 10vh;
    border-top-left-radius: 10vh;
    border: none;
}
.preview
{
  background-image: url('image/image_upload_2.png');


}
legend
{
  color: #fc3807;font-family: 'Avenirnext';font-weight: 200;    margin-top: 2vh;    font-size: 1.8vh;margin-top: 0px;
}
.input-group {
   
    z-index: 0;
}
.test
{
  color:#fc3807;
  border-radius: 20vh;
border:none;
    box-shadow: none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   -moz-transition: none;
   -webkit-transition: none;
       width: 100%;
    /* height: 20px; */
    /* line-height: 20px; */
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    border-top-left-radius: 0px;
    border-bottom-left-radius: 0px;
}



</style>

<footer>
  <? //include("footer_demo.php"); ?>
<footer>

	    				
          
					
							
						        
					



	    					