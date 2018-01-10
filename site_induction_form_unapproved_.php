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

if(isset($_REQUEST['set']) == true && !empty($_REQUEST['set']))
{
	$ID        = $_REQUEST['hide2'];
	$induction = $_REQUEST['induction_number'];
	$s         = ltrim($induction, '0');
	$insert_approve= $conn->query("Update `tbl_induction_register` set `inducted_by` = '".$ID."' ,`isapproved` = '0'   ,`modified_date` = now() where `id`='".$s."'" ); 
	$get_email= $conn->query("Select * from tbl_setting where project_id='".$_SESSION['admin']."'")->fetch_object();
	$email= $get_email->induction_mail;

 	if($insert_approve)
 	{
 		?>
		 <script>
		              alert("You Have Successfully Approved");
		              window.location.href='unapproved_forms.php';
		  </script>

 		<?
 		 	
				  
				  $query  = "select concat(given_name,' ',surname) as name,induction_date,concat(project_name) as project from tbl_induction_register left join tbl_employee on tbl_induction_register.id = tbl_employee.id left join tbl_project on tbl_induction_register.project_id = tbl_project.id where tbl_employee.id = ".$s;

      $new_id_result  = $conn->query($query)->fetch_object();
      $project  = $new_id_result->project;
      $name   = $new_id_result->name;
      $date  = $new_id_result->induction_date;
      $source = $date;
	  $date = new DateTime($source);
      

      

      $Sub = $project ."-".$date->format('y/m/d')."-Site Induction Number ".$induction;
 


   $to=$email;
       $msg = "<html> 
			  <body>
			  Hello HSR / SM, <br/><br/>
			  ".$get_email->site_induction_msg."<br/>
			Site Induction form ".$induction." is approved.<br/><br/>


			  <a href ='https://cipropertyapp.com/site_induction_approved.php?approved_form=".$s."'><input type=\"button\" value=\"Review\"> </a><br/><br/>



			Thanks <br/>
			Team CIP <br/>
			Send from Mobile app <br/>   </body> 
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
              $success= 1;



				

 	}
 	
	
}

if(isset($_REQUEST['reject']) == true)
{
	
	$ID        = $_REQUEST['hide2'];
	$induction = $_REQUEST['induction_number'];
	$s         = ltrim($induction, '0');
	$comments= $_REQUEST['comment_post'];
	$get_email= $conn->query("Select * from tbl_setting where project_id='".$_SESSION['admin']."'")->fetch_object();
	$email= $get_email->induction_mail;
	$insert_resubmit= $conn->query("Update `tbl_induction_register` set `inducted_by` = '".$ID."' ,`isapproved` = '1', 
		`comments` = '".$comments."'  ,`modified_date` = now() where `id`='".$s."'" ); 
	if($insert_resubmit)
 	{
 		?>
		 <script>
		  
		              
		           
		              alert("You Have Successfully Rejected");
		              window.location.href='unapproved_forms.php';
		  </script>
 		<?
 		$query  = "select concat(given_name,' ',surname) as name,induction_date,concat(project_name) as project from tbl_induction_register left join tbl_employee on tbl_induction_register.id = tbl_employee.id left join tbl_project on tbl_induction_register.project_id = tbl_project.id where tbl_employee.id = ".$s;

      $new_id_result  = $conn->query($query)->fetch_object();
      $project  = $new_id_result->project;
      $name   = $new_id_result->name;
      $date  = $new_id_result->induction_date;
      $source = $date;
	  $date = new DateTime($source);
      

      

      $Sub = $project ."-".$date->format('ymd')."-Site Induction Number ".$induction;
     


  $to=$_POST['empe_email'];
       $msg = "<html> 
			  <body>
			  Hello HSR / SM, <br/><br/>
			  ".$get_email->site_induction_msg."<br/>
			Site Induction form ".$induction." is Rejected.<br/><br/>


			  <a href ='https://cipropertyapp.com/site_induction_resubmitted.php?resubmitted_form=".$s."'><input type=\"button\" value=\"Review\"> </a><br/><br/>



			Thanks <br/>
			Team CIP <br/>
			Send from Mobile app <br/>   </body> 
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
              $success= 1;
 	}
	
}


$obj=$conn->query("Select * FROM tbl_project WHERE id ='".$_SESSION['admin']."'")->fetch_object();
$obj2=$conn->query("Select MAX(id)+1 AS 'id' FROM tbl_induction_register")->fetch_object();

 $obj4=$conn->query("Select * FROM tbl_employer where project_id='".$_SESSION['admin']."'");
 $obj6=$conn->query("Select tbl_employee.id,concat(tbl_employee.given_name ,' ',tbl_employee.surname) as name,tbl_employer.company_name FROM tbl_employee left join tbl_employer on  tbl_employee.employer_id = tbl_employer.id where tbl_employer.id is not null");
$test = $conn->query ("select * 
FROM tbl_induction_register
LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id
WHERE ( inducted_by IS NULL or inducted_by = '')  AND tbl_induction_register.id = '".$_REQUEST['unapproved_form']."'")->fetch_object();



$obj3=$conn->query("select name from tbl_access INNER JOIN tbl_project_register ON tbl_access.id=tbl_project_register.access_id where project_id=".$_SESSION['admin']." group by name")->fetch_object();


$employer_name = $conn->query("Select * from tbl_employer where id = '".$test->empid."'")->fetch_object();
// $test2 = "Select * from tbl_site_upload_attachment where induction_id = '".$test->id."' AND image_id = '0";



$image_0= $conn->query("Select * from tbl_site_upload_attachment where induction_id = '".$test->id."'");
$topic_check=$conn->query("Select * from tbl_site_induction_topics where id = '".$test->id."'")->fetch_object();
$declaration=$conn->query("Select * from tbl_site_induction_declaration where id = '".$test->id."'")->fetch_object();
$approval_select=$conn->query("select tbl_induction_register.id,given_name,surname,pin from tbl_employee left join tbl_induction_register on tbl_employee.id = tbl_induction_register.id where empid = 1");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>


<head>
<header>



 <? include('header.php'); ?>
 <? include_once('test_side_new.php'); ?>
 </header>

<body onbeforeunload=”HandleBackFunctionality()”>
<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">Unapproved Site Induction Form&nbsp;<?// echo $project_name->project_name ?> </span></label>
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
	
 <center>
 <table style='width: 70%;border: 1px solid rgba(128, 128, 128, 0.57);'>
          <div class="Form_name" style="background-color: #f5f5f5;"> <span style="font-size:3vh;text-align:left;line-height:2;color: #DF5430;font-family: Helvetica_Nue;font-weight: 200">Unapproved Site Induction Form</span>
			</div>

	<div class="col-lg-12 well">
	<div class="row"> -->
<div class="Main_Form2">
  <div class="col-md-12">
  	<form  name="site_form" method="POST" enctype="multipart/form-data" class="well form-horizontal well_class" id="main_form" onsubmit="return pin_check()">
  		<fieldset>
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>NAME OF PROJECT/SITE</label>
						<input type="text" placeholder="Enter First Name Here.." class="form-control form-control-left-radius" value="<? echo $obj ->project_name; ?>" readonly>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">		
						<label>PROJECT NUMBER</label>
						<input type="text" placeholder="Enter Project Number Here.." class="form-control form-control-left-radius" value="<? echo $obj ->number; ?>" readonly>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">		
						<label>DATE</label>
						<input type="text" class="form-control form-control-left-radius" value="<?echo $test->created_date;  ?>" readonly>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">	
						<label>Induction Number</label>
						<input type="text" name="induction_number" class="form-control form-control-left-radius" value="<? $value= str_pad($test->id, 4, '0', STR_PAD_LEFT); echo $value;
						?>" readonly>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Access Authority Issued</label>
						<input type="text" placeholder="Access Authority.." class="form-control form-control-left-radius" value="<? echo $obj3->name ?>" readonly>
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<p class="h4" style="text-align: left;">EMPLOYER DETAILS</p>								
					</div>							
				</div>
			</div>
				
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Employer/Business Name</label>						
						<input type="text" class="form-control form-control-left-radius" value="<? echo $employer_name->company_name ?>" readonly>
					</div>
				</div>
			</div>		
		
							
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Phone Number</label>
						<input type="text" id="ph" name ="ph" class="form-control form-control-left-radius" value="<? echo $employer_name->phone_no ?>" readonly>
					</div>
				</div>				
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Employer Contact Person</label>
						<input type="text" placeholder="Contact Person.." id="emp_contact" class="form-control form-control-left-radius"  value="<?php echo $employer_name->contact_person ?>" readonly>
					</div>
				</div>	
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Email Address</label>
						<input type="Email" id="email"  class="form-control form-control-left-radius" value="<? echo $employer_name->email_add; ?>" readonly>
					</div>
				</div>
			</div>
			

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Address  Of Your Employer/ Business </label>
						<textarea id="address"  class="form-control form-control-left-radius" readonly> <? echo $employer_name->address ?></textarea>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<p class="h4">PERSON INDUCTED DETAILS</p>								
					</div>
				</div>
			</div>		
							
			<div class="row">
				<div class="form-group">
					<div class="col-sm-6">
						<label>Your First Name</label>
						<input type="text"  class="form-control form-control-left-radius" name="empe_name" value="<? echo $test->given_name; ?>" readonly>
							<div class="col-sm-4"><label class="label-transition" style=""><div>

						 <input type="radio" id="f-option" name="selector" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="f-option">Yes</div></div> <div class="check"></div></label></div>

    <!-- <div class="col-sm-4">
     <input type="radio" id="s-option" name="selector">
    <label for="s-option">Bacon</label>
    <div class="check"></div></div>
 -->


    <div class="col-sm-4"><label class="label-transition" style=""><div>

						  <input type="radio" id="s-option" name="selector" value="Issue In First Name">
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="s-option">No</div></div> <div class="check"></div></label></div>
					</div>
					<!-- <ul>
  <li>
    <input type="radio" id="f-option" name="selector">
    <label for="f-option">Pizza</label>
    
    <div class="check"></div>
  </li>
  
  <li>
    <input type="radio" id="s-option" name="selector">
    <label for="s-option">Bacon</label>
    
    <div class="check"><div class="inside"></div></div>
  </li>
  
  <li>
    <input type="radio" id="t-option" name="selector">
    <label for="t-option">Cats</label>
    
    <div class="check"><div class="inside"></div></div>
  </li>
</ul> -->
					<div class="col-sm-6">
						<label>Your Surname</label>
						<input type="text" class="form-control form-control-left-radius" name="empe_surname" value="<? echo $test->surname; ?>" readonly>
						<div class="col-sm-4"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector2" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>

   


    <div class="col-sm-4"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector2" value="Issue In Last Name">
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>
					</div>
				</div>
			</div>
			

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Your Address </label>
						<textarea  rows="2" class="form-control form-control-left-radius" name="empe_add" readonly> <? echo $test->address; ?></textarea>
						<div class="col-sm-4"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector3" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-4"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector3" value="Issue In Address">
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>

					</div>
				</div>
			</div>


			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Your Date of Birth</label>
						<input type="text" class="form-control form-control-left-radius"  value="<? echo $test->DOB; ?>" readonly>

						<div class="col-sm-4"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector4" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-4"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector4" value="Issue In Dob">
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>

					</div>
				</div>
			</div>		

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Your Contact Number</label>
						<input type="text" class="form-control form-control-left-radius"  value="<? echo $test->contact_phone; ?>" readonly>

						<div class="col-sm-4"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector5" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-4"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector5" value="Issue In Contact Phone">
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Your Occupation</label>
						<input type="text"  class="form-control form-control-left-radius" name="empe_occupation" value="<? echo $test->occupation; ?>"readonly>
						<div class="col-sm-4"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector6" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-4"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector6" value="Issue In Occupation">
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Your Position</label>
						<input type="text"  class="form-control form-control-left-radius" name="empe_position" value="<? echo $test->job_title; ?>"readonly>
						<div class="col-sm-4"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector7" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-4"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector7" value="Issue In Position">
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>

					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Your Email Address</label>
						<input type="Email"  class="form-control form-control-left-radius"  name="empe_email" value="<? echo $test->email_add; ?>"readonly>
						<div class="col-sm-4"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector8" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-4"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector8" value="Issue In Email">
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>
					</div>
				</div>						
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<p class="h4">EMERGENCY CONTACT PERSON</p>								
					</div>
				</div>
			</div>


			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Contact Persons Name</label>
						<input type="text"  class="form-control form-control-left-radius" name="empe_emrg_name" value="<? echo $test->emrg_contact_name; ?>"readonly>
						<div class="col-sm-4"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector9" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-4"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector9" value="Issue In Persons Name">
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Their Contact Number</label>
						<input type="Number"  class="form-control form-control-left-radius" name="empe_emrg_number" value="<? echo $test->emrg_contact_phone; ?>"readonly>
						<div class="col-sm-4"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector10" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-4"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector10" value="Issue In Contact Number">
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>
					</div>
				</div>
			</div>		
							

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Relationship To You</label>
						<input type="text"  class="form-control form-control-left-radius" name="empe_emrg_relation" value="<? echo $test->emrg_contact_relation; ?>"readonly>
						<div class="col-sm-4"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector11" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-4"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector11" value="Issue In Relationship To You">
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>
					</div>
				</div>
			</div>
			

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<p class="h4">MEDICAL CONDITIONS</p>								
					</div>							
				</div>
			</div>	
						
			<div class="row">
				<div class="form-group">
					<div class="col-sm-9 col-md-9">
						<p class="text"> Do you have a medical condition that poses a health or safety risk to you or others on site? e.g. Diabetes, Deafness, Heart/Lung Condition, Allergy etc.)</p>								
					</div>							
				    <div class="col-sm-3 col-md-3">						              
				        <label class="checkbox-inline"  style="float: right;padding-right: 5px;">						    
					        <script>
					        	
					        	$( document ).ready(function() {
					        		$('#medical').click(function() {
									return false;
									});
									$('#induction_card').click(function() {
									return false;
									});
									$('.checkbox').click(function() {
									return false;
									});
									$('.checkbox_all').click(function() {
									return false;
									});
									
					        	});
					        </script>
					        <? while($row= mysqli_fetch_object($image_0))
								{
									// echo $row->image_id;
									// echo $row->image_url;
							?>
					        <script>
					        	$( document ).ready(function() {
					        		$("#preview"+"<? echo $row->image_id?>").attr("src", "API/Uploads/<? echo $row->image_url?>");
									
					        	});

					        </script>
					        <? }?>				      
												  
				       <input class="faChkSqr" name="medical_check" id="medical" type="checkbox" checked> 
				       <div style="margin-top: 6px;margin-left: 6px;width: 42px;height: 25px;"><label id="label_txt"> </label></div></label>
				       <input type="hidden" id= "yes_or_no" value="<?echo $test->medical_condition; ?>">
					       
					       	 <script>

					       	 $(document).ready(function() {
					       	 	var val = $("#yes_or_no").val();
					       	 	if(val == 1)
					       	 		
									$("#label_txt").text("Yes");

									else
									{
										$("#label_txt").text("No");
									}
									});
					       	 </script>
					       	 			          
      				</div>
				</div>
			</div>	

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<textarea name="medical_detail"  id="txt_1" rows="2" class="form-control form-control-left-radius" readonly="readonly">
						<? if($test->medical_condition ==1) echo $test->medical_condition_desc;

						else echo "No Description Available";
						?>
						
						</textarea>
						<div class="col-sm-4"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector15" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-4"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector15" value="Issue In Medical Conditions">
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>	
					</div>
				</div>
			</div>		

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<p class="h4">COMPETENCY CERTIFICATES / PROOF OF IDENTITY</p>
					</div>
				</div>
			</div>	

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<p class="text" style="text-align: left;">Have you completed a 'General Construction Induction Card'?</p>				
					</div>
				</div>
			</div>		

  			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label class="inline">Date Issued</label>
						<input type="text"  class="form-control form-control-left-radius" value="<? echo $test->gcic_issue_date ?>" readonly>
						<div class="col-sm-4"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector12" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-4"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector12" value="Issue In Date">
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>
					</div>
				</div>	
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Name Of Induction Training Provider</label>
						<input type="text"  class="form-control form-control-left-radius" value="<? echo $test->itp_name; ?>" readonly>
						<div class="col-sm-4"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector13" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-4"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector13" value="Issue In Provider">
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>General Construction Induction Card</label>
						<input type="text"  class="form-control form-control-left-radius" value="<? echo $test->induction_card_no; ?>" readonly>
						<div class="col-sm-4"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector14" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-4"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector14" value="Issue In Induction Card">
    <div style="padding-left: 0;margin-top: 2px; width: 40px;float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
        				<p class="text" style="text-align: left; font-size: 15px">Upload General Construction Induction Card, Driver's License,Trade Certificates, Prescribe Occupations, Licenses, First Aid Certificate, etc. related to your work on this site e.g. Electrician, Plant Operator, Crane, Rigger, First Aider, Demolitionetc.<strong>Upload Licenses</strong></p>
					</div>
				</div>
			</div>
			

			<div class="row">

				<div class="form-group">

					<div class="col-sm-6">

						
						<p style="text-align: center;">
								<!-- <img class="preview0" id="preview0" alt="" style=" width: 180px;height: 180px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;"> -->

																	
							<img src =""class="preview1" id="preview0" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;" onerror="onerrorfun()" />
							
							
							
						 <span class="glyphicon glyphicon-eye-open" id="viewer" style="display:none" ></span>
				               
							   <br>
								<label>General Construction Induction Card Front:</label>
						</p>


						<div class="col-sm-2">
					</div>
					<div class="col-sm-3 col-sm-offset-1"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector16" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-3"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector16" value="Issue In General Construction Induction Card Front">
    <div style="padding-left: 0;margin-top: 2px; float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>	
    <div class="col-sm-2">
					</div>
					</div>
	    			<div class="col-sm-6">
    					<p style="text-align: center;">
    					
  						
  						<img src="" class="preview2" id="preview1" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
												 <span class="glyphicon glyphicon-eye-open" id="viewer1" style="display:none" ></span>

				               <br>
				               <label>General Construction Induction Card Back:</label>
						</p>
						<div class="col-sm-2">
					</div>
					<div class="col-sm-3 col-sm-offset-1"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector17" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-3"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector17" value="Issue In General Construction Induction Card Back">
    <div style="padding-left: 0;margin-top: 2px; float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>	
    <div class="col-sm-2">
					</div>
	    			</div>
				</div>
			</div>
				
			<div class="row">
				<div class="form-group">
					<div class="col-sm-6">
    					<p style="text-align: center;">
    					    						
  						<img src="" class="preview3" id="preview2" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
												 <span class="glyphicon glyphicon-eye-open" id="viewer2" style="" ></span>

				               <br>
				        <label> Driver License Front:</label>         
						</p>
						<div class="col-sm-2">
					</div>
					<div class="col-sm-3 col-sm-offset-1"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector18" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-3"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector18" value="Issue In Driver License Front">
    <div style="padding-left: 0;margin-top: 2px; float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>	
    <div class="col-sm-2">
					</div>
    				</div>
	    			<div class="col-sm-6">
    					<p style="text-align: center;">
    					
  					
  						<img class="preview4" id="preview3" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
												 <span class="glyphicon glyphicon-eye-open" id="viewer3" style="" ></span>

				               <br>
				               <label> Driver License Back:</label>
						</p>
						<div class="col-sm-2">
					</div>
					<div class="col-sm-3 col-sm-offset-1"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector19" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-3"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector19" value="Issue In Driver License Back">
    <div style="padding-left: 0;margin-top: 2px; float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>	
    <div class="col-sm-2">
					</div>
    				</div>
				</div>
			</div>	

			<div class="row">
				<div class="form-group">
					<div class="col-sm-6">
    					<p style="text-align: center;">
    					
  						
  						<img class="preview5" id="preview4" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
												 <span class="glyphicon glyphicon-eye-open" id="viewer4" style="" ></span>

				               <br>
				         <label> Competency/ Certificates:</label>
						</p>
						<div class="col-sm-2">
					</div>
					<div class="col-sm-3 col-sm-offset-1"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector20" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-3"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector20" value="Issue In Competency Certificates 1">
    <div style="padding-left: 0;margin-top: 2px; float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>	
    <div class="col-sm-2">
					</div>
    				</div>
					<div class="col-sm-6">
						<p style="text-align: center;">
						<img class="preview6" id="preview5" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
												 <span class="glyphicon glyphicon-eye-open" id="viewer5" style="" ></span>

				               <br>
				         <label> Competency/ Certificates:</label>
						</p>
						<div class="col-sm-2">
					</div>
					<div class="col-sm-3 col-sm-offset-1"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector21" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-3"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector21" value="Issue In Competency Certificates 2">
    <div style="padding-left: 0;margin-top: 2px; float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>	
    <div class="col-sm-2">
					</div>
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="form-group">
					<div class="col-sm-6">
						<p style="text-align: center;">
							<img class="preview7" id="preview6" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
				               						 <span class="glyphicon glyphicon-eye-open" id="viewer6" style="" ></span>

							   <br>
				         <label> Competency/ Certificates:</label>
						</p>
						<div class="col-sm-2">
					</div>
					<div class="col-sm-3 col-sm-offset-1"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector22" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-3"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector22" value="Issue In Competency Certificates 3">
    <div style="padding-left: 0;margin-top: 2px; float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>	
    <div class="col-sm-2">
					</div>
						
					</div>
					<div class="col-sm-6">
						<p style="text-align: center;">
					<img class="preview8" id="preview7" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
											 <span class="glyphicon glyphicon-eye-open" id="viewer7" style="" ></span>

				               <br>
				         <label> Competency/ Certificates:</label>
						</p>						
					
					<div class="col-sm-2">
					</div>
					<div class="col-sm-3 col-sm-offset-1"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector23" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-3"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector23" value="Issue In Competency Certificates 4">
    <div style="padding-left: 0;margin-top: 2px; float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>	
    <div class="col-sm-2">
					</div>
				</div>
			</div>	

			<div class="row">
				<div class="form-group">
					<div class="col-sm-6">
						<p style="text-align: center;">
						<img class="preview9" id="preview8" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
												 <span class="glyphicon glyphicon-eye-open" id="viewer8" style="" ></span>

				               <br>
				         <label> Competency/ Certificates:</label>
						</p>
						<div class="col-sm-2">
					</div>
					<div class="col-sm-3 col-sm-offset-1"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector24" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-3"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector24" value="Issue In Competency Certificates 5">
    <div style="padding-left: 0;margin-top: 2px; float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>	
    <div class="col-sm-2">
					</div>
					</div>
					<div class="col-sm-6">
						<p style="text-align: center;">
							<img class="preview10" id="preview9" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
				               						 <span class="glyphicon glyphicon-eye-open" id="viewer9" style="" ></span>

							   <br>
				         <label> Competency/ Certificates:</label>
						</p>
						<div class="col-sm-2">
					</div>
					<div class="col-sm-3 col-sm-offset-1"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector25" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-3"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector25" value="Issue In Competency Certificates 6">
    <div style="padding-left: 0;margin-top: 2px; float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>	
    <div class="col-sm-2">
					</div>
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="form-group">
					<div class="col-sm-6">
						<p style="text-align: center;">
						<img class="preview11" id="preview10" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
												 <span class="glyphicon glyphicon-eye-open" id="viewer10" style="" ></span>

				               <br>
				         <label> Competency/ Certificates:</label>
						</p>
						<div class="col-sm-2">
					</div>
					<div class="col-sm-3 col-sm-offset-1"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector26" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-3"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector26" value="Issue In Competency Certificates 7">
    <div style="padding-left: 0;margin-top: 2px; float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>	
    <div class="col-sm-2">
					</div>
					</div>
					<div class="col-sm-6">
						<p style="text-align: center;">
						<img class="preview12" id="preview11" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
												 <span class="glyphicon glyphicon-eye-open" id="viewer11" style="" ></span>

				               <br>
				         <label> Competency/ Certificates:</label>
						</p>
						<div class="col-sm-2">
					</div>
					<div class="col-sm-3 col-sm-offset-1"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector27" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-3"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector27" value="Issue In Competency Certificates 8">
    <div style="padding-left: 0;margin-top: 2px; float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>	
    <div class="col-sm-2">
					</div>
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="form-group">
					<div class="col-sm-6">
						<p style="text-align: center;">
						<img class="preview13" id="preview12" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
												 <span class="glyphicon glyphicon-eye-open" id="viewer12" style="" ></span>

				               <br>
				         <label> Competency/ Certificates:</label>
						</p>
						<div class="col-sm-2">
					</div>
					<div class="col-sm-3 col-sm-offset-1"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector28" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-3"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector28" value="Issue In Competency Certificates 9">
    <div style="padding-left: 0;margin-top: 2px; float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>	
    <div class="col-sm-2">
					</div>
					</div>
					<div class="col-sm-6">
						<p style="text-align: center;">
						<img class="preview14" id="preview13" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
												 <span class="glyphicon glyphicon-eye-open" id="viewer13" style="" ></span>

				               <br>
				         <label> Competency/ Certificates:</label>
						</p>
						<div class="col-sm-2">
					</div>
					<div class="col-sm-3 col-sm-offset-1"><label class="label-transition" style=""><div>

						 <input type="radio" id="b-option" name="selector29" value="0" checked>
    <div style="padding-left: 0;margin-top: 2px;float: right;margin-left: 3px;" for="b-option">Yes</div></div> <div class="check"></div></label></div>




    <div class="col-sm-3"><label class="label-transition" style=""><div>

						  <input type="radio" id="a-option" name="selector29" value="Issue In Competency Certificates 10">
    <div style="padding-left: 0;margin-top: 2px; float: right;margin-left: 3px;" for="a-option">No</div></div> <div class="check"></div></label></div>	
    <div class="col-sm-2">
					</div>
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="form-group">
					<div class="col-sm-6">
						<p class="h4">INDUCTION TOPICS</p>								
					</div>
					<div class="col-md-6">				              
				        <label class="checkbox-inline" class="checkbox_all_title" style="float: right;">	
			            	<input type="checkbox" class="checkbox_all faChkSqr" id="select_all"><div style="margin-top: 6px;width: 80px;height: 25px;text-align: right;padding-right: 7px;">Select All</div>
			            </label>		          	
      				</div>
  				</div>
			</div>
						
			<div class="row">
				<div class="form-group">
					<div class="col-md-12 rightpadding">
						<div class="col-sm-6">
							<div class="chknum">1)</div>
							<div class="col-sm-10 chkcontent">
								<p>Additional Inductions i.e. Visitor, Ceiling, Client. </p>
							</div>
							<div class="chkbox">							        
					            <input type="checkbox" id="topic_id" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_1 == 1 ? 'checked' : ''); ?> >

							</div>
						</div>	
						<div class="col-sm-6">
							<div class="chknum">27)</div>
							<div class="col-sm-10 chkcontent">
								<p>Minimum PPE - 
									<ul class="ulpaddingdd">
										<li>Hard Hats, Steel Capped Boots.</li>
										<li>Protective Clothing Short Sleeve Shirt & Work Shorts are the Minimum Requirement.</li>
										<li>High Visibility Vests.</li>
									</ul>
								</p>
							</div>
							<div class="chkbox">							        
					            <input type="checkbox"  name="check_test[]" class="checkbox" <? echo ($topic_check->induction_topic_27 == 1 ? 'checked' : ''); ?> >

							</div>
						</div>							
					</div>
					<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
				</div>	
			</div>

			<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">2)</div>
								<div class="col-sm-10 chkcontent">
									<p>What We are Building- 
										<ul class="ulpaddingsd">
											<li>Description.</li>
											<li>Expected Duration & Completion Date.</li>
											<li>Site Ph. No. etc.</li>
											<li>Sites Hours.</li>
										</ul>
									</p>
								</div>
								<div class="chkbox">							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_2 == 1 ? 'checked' : ''); ?> >

								</div>
							</div>
							<div class="col-sm-6">
								<div class="chknum">28)</div>
								<div class="col-sm-10 chkcontent">
									<p>Safety Signs &nbsp; Barricades</p>
								</div>
								<div class="chkbox">							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_28 == 1 ? 'checked' : ''); ?>>

								</div>		
						</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">3)</div>
								<div class="col-sm-10 chkcontent">
									<p>Site Management Team - <ul class="ulpaddingsd">
													<li>Project Director and Site Manager.</li>
													<li>Foremen.</li>
													<li>Site Ph. No. etc.</li>
													<li>Site Safety Advisor (SSA).</li>
													</ul>
									</p>
								</div>
								<div class="chkbox">							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_3 == 1 ? 'checked' : ''); ?>>

								</div>
							</div>
							<div class="col-sm-6">	
								<div class="chknum">29)</div>
								<div class="col-sm-10 chkcontent">
									<p>Emergency Procedures -<ul class="ulpaddingdd">
													<li>Evacuation Procedures.</li>
													<li>Emergency Contact Details.</li>
													<li>Fire Fighting Equipment, etc.</li>
									
													</ul>
									</p>
								</div>
								<div class="chkbox">							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_29 == 1 ? 'checked' : ''); ?>>

								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">4)</div>
								<div class="col-sm-10 chkcontent">
									<p>Site Layout - <ul class="ulpaddingsd">
													<li>Offices, Amenities, First Aid, Parking, etc.</li>
													<li>Deliveries To Site</li>
													</ul>
									</p>
								</div>
								<div class="chkbox">							        
					            <input type="checkbox" Id="1" name="check_test[]" class="checkbox" <? echo ($topic_check->induction_topic_4 == 1 ? 'checked' : ''); ?> >

								</div>
							</div>
							<div class="col-sm-6">
								<div class="chknum">30)</div>
								<div class="col-sm-10 chkcontent">
									<p>Incident Reporting Requirements -<ul class="ulpaddingdd">
													<li>Accidents</li>
													<li>Dangerous Events.</li>
													<li>Near Misses</li>
													<li>Hazard</li>
									
													</ul>
									</p>
								</div>
								<div class="chkbox">							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_30 == 1 ? 'checked' : ''); ?>>

								</div>
							</div>
						</div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">5)</div>
								<div class="col-sm-10 chkcontent">
									<p>Policies - <ul class="ulpaddingsd">
													<li>WHS, Quality, Environment.</li>
													<li>Outline of CMP.</li>
													</ul>
									</p>
								</div>
								<div class="chkbox">
							        
					            <input type="checkbox" Id="1" name="check_test[]" class="checkbox"  <? echo ($topic_check->induction_topic_5 == 1 ? 'checked' : ''); ?>>

					           </div>
							</div>
							<div class="col-sm-6">
								<div class="chknum">31)</div>
								<div class="col-sm-10 chkcontent">
									<p>First Aid Facility</p>
								</div>
								<div class="chkbox">							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_31 == 1 ? 'checked' : ''); ?>>

					           </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">6)</div>
								<div class="col-sm-10 chkcontent">
									<p>Essential Health & Safety Requirements for site.</p>
								</div>
								<div class="chkbox">
							        
					            <input type="checkbox" Id="1" name="check_test[]" class="checkbox"  <? echo ($topic_check->induction_topic_6 == 1 ? 'checked' : ''); ?>>

					            </div>
							</div>
							<div class="col-sm-6">
								<div class="chknum">32)</div>
								<div class="col-sm-10 chkcontent">
									<p>Amenities, Toilets & Drink Stations</p>
								</div>
								<div class="chkbox">
							        
					            <input type="checkbox" Id="1" name="check_test[]" class="checkbox" <? echo ($topic_check->induction_topic_32 == 1 ? 'checked' : ''); ?>>

					            </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">7)</div>
								<div class="col-sm-10 chkcontent">
									<p>Site Access & Security</p>
								</div>
								<div class="chkbox">
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox"  <? echo ($topic_check->induction_topic_7 == 1 ? 'checked' : ''); ?> >

					           </div>
							</div>
							<div class="col-sm-6">
								<div class="chknum">33)</div>
								<div class="col-sm-10 chkcontent">
									<p>General Site Requirements</p>
								</div>
								<div class="chkbox">
							        
					            <input type="checkbox" Id="1" name="check_test[]" class="checkbox" <? echo ($topic_check->induction_topic_34 == 1 ? 'checked' : ''); ?>>

					            </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">8)</div>
								<div class="col-sm-10 chkcontent">
									<p>Site Rules -e.g. Civil  Language & Behaviour</p>
								</div>
								<div class="chkbox">							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_8 == 1 ? 'checked' : ''); ?> > 

								</div>
								<!-- <div class="col-md-1"><br><br>
								<p>**</p>
								</div>
								<div class="col-md-2" style="text-align: left;"><br><br>
								<p>Information provided under Item 1. Addition Inductions
								</p>
								</div> -->
								<div class="col-sm-2 form-group">							        
					            <!-- <input type="text" Id=""  class="form-group" value="<? echo $topic_check->induction_topic_edit_text_34 ?>" readonly> -->					        
								</div>								
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>
				</div>
							
				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">9)</div>
								<div class="col-sm-10 chkcontent">
									<p>Disciplinary Procedures -</p>
								</div>
								<div class="chkbox">							        
					            <input type="checkbox" Id="1" name="check_test[]" class="checkbox" <? echo ($topic_check->induction_topic_9 == 1 ? 'checked' : ''); ?> >

					           </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>						
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">10)</div>
								<div class="col-sm-10 chkcontent">
									<p>Drugs and Alcohol -</p>
								</div>
								<div class="chkbox">							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_10 == 1 ? 'checked' : ''); ?>>

					            </div>
							</div>	
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>						
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">11)</div>
								<div class="col-sm-10 chkcontent">
									<p>Smoking Policy, Designated Smoking Area's</p>
								</div>
								<div class="chkbox">							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_11 == 1 ? 'checked' : ''); ?>>

					            </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>						
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">12)</div>
								<div class="col-sm-10 chkcontent">
									<p>Project Consultation & Communication</p>
								</div>
								<div class="chkbox">							        
					            <input type="checkbox" Id="1" name="check_test[]" class="checkbox" <? echo ($topic_check->induction_topic_12 == 1 ? 'checked' : ''); ?>>

					            </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">13)</div>
								<div class="col-sm-10 chkcontent">
									<p>Site Specific Hazards</p>
								</div>
								<div class="chkbox">							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_13 == 1 ? 'checked' : ''); ?>>

					            </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">14)</div>
								<div class="col-sm-10 chkcontent">
									<p>Work Method Statement Requirements</p>
								</div>
								<div class="chkbox">
							        
					            <input type="checkbox" Id="1" name="check_test[]"   class="checkbox" <? echo ($topic_check->induction_topic_14 == 1 ? 'checked' : ''); ?> >

					           </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">15)</div>
								<div class="col-sm-10 chkcontent">
									<p>Site Permits</p>
								</div>
								<div class="chkbox">
							        
					            <input type="checkbox" Id="1"name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_15 == 1 ? 'checked' : ''); ?>>

					            </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>
				
				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">16)</div>
								<div class="col-sm-10 chkcontent">
									<p>Live Services</p>
								</div>
								<div class="chkbox">
							        
					            <input type="checkbox" Id="1" name="check_test[]" class="checkbox" <? echo ($topic_check->induction_topic_16 == 1 ? 'checked' : ''); ?> >

					            </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>
			
				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">17)</div>
								<div class="col-sm-10 chkcontent">
									<p>Underground Services</p>
								</div>
								<div class="chkbox">
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_17 == 1 ? 'checked' : ''); ?> >

					            </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>
		
				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">18)</div>
								<div class="col-sm-10 chkcontent">
									<p>Mobile Plant</p>
								</div>
								<div class="chkbox">
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_18 == 1 ? 'checked' : ''); ?>>

					            </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">19)</div>
								<div class="col-sm-10 chkcontent">
									<p>Working at Heights</p>
								</div>
								<div class="chkbox">
							        
					            <input type="checkbox" Id="1" name="check_test[]" class="checkbox" <? echo ($topic_check->induction_topic_19 == 1 ? 'checked' : ''); ?> >

					            </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>
			
				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">20)</div>
								<div class="col-sm-10 chkcontent">
									<p>Safety Harnesses.</p>
								</div>
								<div class="chkbox">
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_20 == 1 ? 'checked' : ''); ?>>

					            </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>
			
				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">21)</div>
								<div class="col-sm-10 chkcontent">
									<p>Ladders</p>
								</div>
								<div class="chkbox">
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_21 == 1 ? 'checked' : ''); ?> >

					            </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>
		
				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">22)</div>
								<div class="col-sm-10 chkcontent">
									<p>Mobile and Fixed Scaffold.</p>
								</div>
								<div class="chkbox">
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_22 == 1 ? 'checked' : ''); ?> >

					            </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">23)</div>
								<div class="col-sm-10 chkcontent">
									<p>Electrical -<ul class="ulpaddingdd">
													<li>Portable equip/tools tested and tagged.</li>
													</ul>
									</p>
								</div>
								<div class="chkbox">
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_23 == 1 ? 'checked' : ''); ?> >

					            </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">24)</div>
								<div class="col-sm-10 chkcontent">
									<p>Fire Prevention</p>
								</div>
								<div class="chkbox">
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_24 == 1 ? 'checked' : ''); ?> >

					            </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>	

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">25)</div>
								<div class="col-sm-10 chkcontent">
									<p>Hazardous Substances & MSDS</p>
								</div>
								<div class="chkbox">
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_25 == 1 ? 'checked' : ''); ?> >

					           </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">26)</div>
								<div class="col-sm-10 chkcontent">
									<p>Manual Handling</p>
								</div>
								<div class="chkbox">
							        
					            <input type="checkbox" Id="1" name="check_test[]"  class="checkbox" <? echo ($topic_check->induction_topic_26 == 1 ? 'checked' : ''); ?> >

					           </div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>
				<script>
		        	$( document ).ready(function() {
		        		if($(".checkbox").prop("checked") )
		        		{ 
		        			$(".checkbox_all").prop("checked",true);
		        		}
		        		 
		        	else{
		        		
		        		 $(".checkbox_all").prop("checked",false);
		        		 

		        	}

		        	});
		        		

		     	</script>
								
				<div class="row">
					<div class="col-sm-12 form-group">
						<p class="h4" style="text-align: left;">PRIVACY NOTIFICATION:</p>
						
					</div>					
				</div>	

				<div class="row">
					<div class="col-sm-12 form-group">
						<p style="font-size: 2.1vh;padding-top: 1vh;font-family: Helvetica_Nue;color:#919191;">The personal information you have provided may be used for the purpose of contacting the person you have nominated in the event of an emergency. From time to time the information may be supplied to others such (as medical officers, ambulance officers) involved with the outcome of an emergency or medical situation. All disclosures will be subject to the provisions imposed by the Privacy Act 1988.</p>
						
					</div>					
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-sm-12">
							<p class="h4" style="color: #010101;">INDUCTION DECLARATION</p>
							<div class="col-sm-12" style="-webkit-border-radius: 15px;-moz-border-radius: 15px;	border-radius: 15px;background: #e4e4e4;">
							<p class="h5" style="text-align: left;font-weight: 100;">I <input type="text" id="declaration_name" name="declaration_name" style="border: 0;text-align: center;background: #e4e4e4;" value= "<?= $declaration->edit_certifiy ?>" readonly>&nbsp;<span style="float: right;color: #272727;"> certify the following:</span> </p>
							<ul style="padding-left: 15px;color: #8f8f8f;">
								<li>All information givenby me verbally during the induction and written by me on this form is true and correct.</li>
								<li>I understand my Work Health and Safety, Quality and Environmental obligations and responsibilities on this project as explained to me during the Site Specific Induction and as ticked by meabove.</li>
								<li>I have all the relevant licences, experience, trainings, qualifications,knowledge and skills to do the tasksallocated to me on this project competently and in a safe way.</li>
								<li>I am medically fit to perform the respective tasks I am required to undertake while on site.</li>
							</ul>							
							</div>
						</div>	
					</div>					
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-sm-12">
						<div style="-webkit-border-radius: 50px;-moz-border-radius: 50px;border-radius: 50px;background: #d3d3d3;height: 155px">
						 <div style="width: 50%; float: left;">
						 	<p class="h5" style="text-align: center;vertical-align: middle;">Declaration Date<br><? echo $declaration->todays_date?></p>
						</div>
						  <div style="-webkit-border-radius: 50px;-moz-border-radius: 50px;border-radius: 50px;background:url('<?="API/Uploads/".$declaration->your_signature ?>') center top no-repeat rgb(255, 255, 255);height: 100%;width: 50%;float: right;background-size: 20vh 20vh;" name="sign_div" id= "sign_div">
							<p class="h5" style="text-align: center;vertical-align: middle;"  >Your Signature</p>
						</div>
						</div>
						</div>
					</div>
				</div>
							
						
						<!-- <div class="row">
							<div class="col-sm-3 form-group">
								<p class="h5" style="text-align: left;">Your Signature</p>
		
							</div>
							<div class="col-sm-3 form-group">
								<div style="-webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3); height:180px; width:180px;margin-top:20px" readonly>
									<img src="API/Uploads/<?echo $declaration->your_signature ?>" height = "180px"; width= "180px">
								</div>
							</div>
							<div class="col-sm-3 form-group">
								<p class="h5" style="text-align: left;">Declaration Date</p>
		
							</div>
							<div class="col-sm-3 form-group">
								<input type="text" style="border: 0;text-align:center;outline: 0; padding-top: 10px;" value="<? echo $declaration->todays_date?>" readonly>
							
							</div>
							
						</div> -->

			<div class="row">
					<div class="form-group">
						<div class="col-sm-12">
							<p class="h4">PERSON CARRYING OUT INDUCTION</p>
						</div>
					</div>
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-3">								
						<label>Induction Number</label>
						<select id="induction_select" style="height: 34px; display: block;width: 100%;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555; background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 10vh;" onchange="select_induction()" required>
						<option value="">Select Induction Number</option>
						<? while($row2= $approval_select->fetch_object()) { ?>
							<option value="<? echo $row2->id ?>"> <? $value= str_pad($row2->id, 4, '0', STR_PAD_LEFT); echo $value;?> </option>
							<? } ?>
						</select>	
					</div>
				<!-- </div>
			</div>

			<div class="row">
					<div class="form-group"> -->
						<div class="col-sm-3">
							<label>Date</label>
								<input type="text"  class="form-control form-control-left-radius" value="<? echo date("d/m/y"); ?>"
								readonly>
						</div>
						<script>
							  function select_induction() {
							  	
							   var e = document.getElementById("induction_select");
							   var strUser2 = e.options[e.selectedIndex].value;
							 // alert(strUser2);
							 document.getElementById("pin_induction").value="";

								$.ajax({
								    type: "POST",
								    url: "ajax3.php",
								    data: {
								        value_ajax: strUser2
								    },

								    success: function(data) {


								    	
								         var val_b = data.split(",");
								         var givenname= val_b[1];
								         var surname= val_b[2];
								         var pin_db= val_b[3];
								         $('#name_induction').val(givenname+" "+surname);
								         $('#pin').val(pin_db);
								         $('#induct_id').val(val_b[0]);
								         pin_validate();
								         pin_validate_reject();
								    } 
								});
							}
							 </script>							
				<!-- 	</div>
				</div>	

				<div class="row">
					<div class="form-group"> -->
						<div class="col-sm-3">						
							<label>Name</label>
							<input type="text" id= "name_induction" placeholder="Enter Name Here.." class="form-control form-control-left-radius" readonly>
							<input type="text" name="hide" id="pin" hidden>
							<input type="text" name="hide2" id="induct_id" hidden>
						</div>
				<!-- 	</div>
				</div>

				<div class="row">
					<div class="form-group"> -->
						<div class="col-sm-3">						
							<label>Enter PIN</label>
							<input id= "pin_induction" type="password" class="form-control form-control-left-radius"  required onkeyup="pin_validate();pin_validate_reject()">
							<script> 
																										

								function pin_validate()
								{

									
									pin_val= document.getElementById('pin_induction').value;
									pin_db2= document.getElementById('pin').value;
								
									if(pin_val == pin_db2)
									{
									// document.getElementById('submit').disabled=false;
									// alert("correct");
									document.getElementById('submit').value="Approve";
									// document.getElementById('submit').style.borderColor="white";
									document.getElementById('submit').style.backgroundColor="#f47821";

										if(toggle == 0 )
										{
											document.getElementById('submit').disabled=false;
											document.getElementById('resubmit').disabled=true;		
										}

										if(toggle == 1)
										{
											document.getElementById('submit').disabled=true;
											document.getElementById('resubmit').disabled=false;	
										}
									// document.getElementById('resubmit').disabled=false;
									// // alert("correct");
									// document.getElementById('resubmit').value="Click to Resubmit";
									// document.getElementById('resubmit').style.borderColor="black";
									// document.getElementById('resubmit').style.backgroundColor="#7FFF00";
									
									
									}
									else
									{
									// document.getElementById('resubmit').value="Please Enter Correct Pin";
									// document.getElementById('resubmit').style.borderColor="red";
									// document.getElementById('resubmit').style.backgroundColor="#7FFF00";
									// document.getElementById('resubmit').disabled=true;

									document.getElementById('submit').value="Approve";
									// document.getElementById('submit').style.borderColor="red";
									document.getElementById('submit').style.backgroundColor="#f47821";
									// document.getElementById('submit').disabled=true;



										if(toggle == 0 )
										{
											document.getElementById('submit').disabled=false;
											document.getElementById('resubmit').disabled=true;		
										}

										if(toggle == 1)
										{
											document.getElementById('submit').disabled=true;
											document.getElementById('resubmit').disabled=false;	
										}
									}
									
		
							 }
							 	function pin_validate_reject()
								{

									
									pin_val= document.getElementById('pin_induction').value;
									pin_db2= document.getElementById('pin').value;
								
									if(pin_val == pin_db2)
									{
									

									// document.getElementById('resubmit').disabled=false;
									// alert("correct");
									document.getElementById('resubmit').value="Resubmit";
									// document.getElementById('resubmit').style.borderColor="black";
									document.getElementById('resubmit').style.backgroundColor="#f47821";
									
									
									}
									else
									{
									document.getElementById('resubmit').value="Resubmit";
									// document.getElementById('resubmit').style.borderColor="red";
									document.getElementById('resubmit').style.backgroundColor="#f47821";
									// document.getElementById('resubmit').disabled=true;

									
									}
									
		
							 }
								

								function pin_check()
								{
									pin_val= document.getElementById('pin_induction').value;
									pin_db2= document.getElementById('pin').value;
								
									if(pin_val != pin_db2)
									{
										alert("Please Enter Correct Pin To Save Changes");
										return false;
									}

								}

							
							$(document).ready(function(){
								document.getElementById('resubmit').disabled=true;
								document.getElementById('submit').disabled=false;
						    // $("#resubmit").click(function(){
						    //     $('#comment_reject').attr('required', true);
						    //  });
						    // $("#submit").click(function(){
						    // $('#comment_reject').attr('required', false);
						       

						    // });
						});
																						

							</script>								
						</div>							
					</div>
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-sm-12">								
							<label style="display: block">Comments:</label>
							<textarea  class="comment_section"  rows="5" id="comment_reject" name="comment_post" readonly></textarea>
							
						</div>
					</div>
				</div>
					
				<div class="row">
					<div class="form-group">
						<div class="col-sm-6">
							<div class="col-sm-6 pull-right">
								<input type="submit" class="btn btn-primary form_submit_button" value="Resubmit"  name="reject" id="resubmit" />
							</div>
						</div>	
						<div class="col-sm-6">
							<div class="col-sm-6">								
								<input type="submit" class="btn btn-primary form_submit_button"  id= "submit" value="Approve"  name="set" onclick=""   />
							</div>	
						</div>
					</div>
				</div>

				<!-- <div class="row">
					<div class="form-group">
						<div class="col-sm-12">								
							<label style="display: block">Comments:</label>
							<textarea style="margin-top: 8px;border-radius: 10vh;padding-left: 1vw;outline: none" cols=45 id="comment_reject" name="comment_post"></textarea>
							<input type="submit" class="btn btn-warning" value="Enter Pin to Resubmit"  name="reject" style="width:20vw; height:4rem;margin-top:3rem;     color: white;background-color: #f47821;margin-top: 3rem;outline: none;border-radius: 6vh;" id="resubmit" />
						</div>
					</div>
				</div> -->		
			</fieldset>		
		</form>
		<? include("footer_new.php"); ?>
	</div>				
</div>				 
							
<!-- 			</div>
	</div>
</table> 


</center>        
</div>  -->
<script>
// 	$('#main_form input[type=radio]').on('change', function() {
//    var val= $('input[name=selector]:checked').val(); 
//    $('.comment_section').val(val);
// });

//  	$('#main_form input[type=radio]').on('change', function() {
	
// 		if($(this).val() != 0)
// 		{
// 		$('.comment_section').append($(this).val()+"<br>");
// console.log($(this).val());
// }
// });
var toggle=0;
$('#main_form input[type=radio]').on('change', function() {
var checkboxValArry=[];
$('input[type=radio]:checked').each(function(){
	if($(this).val() != 0){
   checkboxValArry.push($(this).val());
}

})
console.log(checkboxValArry);
$('.comment_section').html(checkboxValArry+"\r\n");

if(checkboxValArry == "")
{ 
document.getElementById('resubmit').disabled=true;
document.getElementById('submit').disabled=false;
}
else
{
	document.getElementById('resubmit').disabled=false;
	document.getElementById('submit').disabled=true;
	toggle=1;
}
});
</script>
 
  <style> 

img {
 color:green;
 font:40px Impact;   
}
	
label {        
    font-style: italic;
    padding-left: 25px;
}


.preview1,.preview2,.preview3,.preview4,.preview5,.preview6,.preview7,.preview8,.preview9,.preview10,.preview11,.preview12,.preview13,.preview14
{
	background-image: url('image/grid.png');

}

.h4
{
	color: ##666666;
    font-size: 2vh;
    font-weight: 900;
}






label div{
 
  -webkit-transition: all 0.25s linear;
}

label div:hover {
	color: red;
}

label div .check{
  /*display: block;
  position: absolute;*/
  border: 5px solid #AAAAAA;
  border-radius: 100%;
  height: 25px;
  width: 25px;
  top: 30px;
  left: 20px;
	z-index: 5;
	transition: border .25s linear;
	-webkit-transition: border .25s linear;
}

label div .check:hover  {
  border: 5px solid red;
}

label div .check::before {
 /* display: block;
  position: absolute;*/
	content: '';
  border-radius: 100%;
  height: 15px;
  width: 15px;
  top: 5px;
	left: 5px;
  margin: auto;
	transition: background 0.25s linear;
	-webkit-transition: background 0.25s linear;
}

input[type=radio]:checked ~ .check {
  border: 5px solid #0DFF92;
}

input[type=radio]:checked ~ .check::before{
  background: #0DFF92;
}

input[type=radio]:checked ~ label{
  color: #0DFF92;
}
</style>
	  <!-- The Modal -->
 <div id="myModal" class="modal">
											  <div class="modeliconbackgroundcolor">
											 
											  </div>
											  <span class="close ">&times;</span>
				<a class="help-button  downl fa fa-download" id="onerrorm"   style="display:none"   download></a>
				<a class="help-button  down2 fa fa-download" id="onerrorm1"  style="display:none"    download></a>
				<a class="help-button  down3 fa fa-download" id="onerrorm2"  style="display:none"    download></a>
				<a class="help-button  down4 fa fa-download" id="onerrorm3"  style="display:none"    download></a>
				<a class="help-button  down5 fa fa-download" id="onerrorm4"  style="display:none"    download></a>
				<a class="help-button  down6 fa fa-download" id="onerrorm5"  style="display:none"    download></a>
				<a class="help-button  down7 fa fa-download" id="onerrorm6"  style="display:none"    download></a>
				<a class="help-button  down8 fa fa-download" id="onerrorm7"  style="display:none"    download></a>
				<a class="help-button  down9 fa fa-download" id="onerrorm8"  style="display:none"    download></a>
				<a class="help-button  downl0 fa fa-download"id="onerrorm9"  style="display:none"    download></a>
				<a class="help-button  downl1 fa fa-download"id="onerrorm10" style="display:none"    download></a>
				<a class="help-button  downl2 fa fa-download"id="onerrorm11" style="display:none"    download></a>
				<a class="help-button  downl3 fa fa-download"id="onerrorm12" style="display:none"    download></a>
				<a class="help-button  down14 fa fa-download"id="onerrorm13" style="display:none"    download></a>
											  <img class="modal-content modal-content-image north" onerror="javascript:this.src='Document.png';  onerrorfun()"  id="img01"  >
											  <div id="caption"></div>
	</div>
	<script>
							function onerrorfun() {
    // alert('The image(s) could not be loaded. you can Download from eye/Download icon');
}
							</script>
<script>

 // model script for first image
var modalImg = document.getElementById("img01");
var viewerimg = document.getElementById('viewer');
var modal = document.getElementById('myModal');
var img = document.getElementById('preview0');
console.log(img.src);
$(document).ready(function(){ if (img.src.split(".").reverse()[0] == "php" || img.src == ""){$("#viewer").hide(); }  else  {$("#viewer").show(); } });
viewerimg.onclick = function(){
		
	if(img.src != "" ) { var imgsrc = img.src.split("/").reverse()[0];
	var path="API/Uploads/"+imgsrc;
	$("#img01").attr("src",path); 
	$("#onerrorm").show();
	$("#onerrorm").attr("href" ,path); 
	$("#myModal").show(); 
} 
}
// Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];
// When the user clicks on <span> (x), close the modal
$(document).ready(function(){
$(".close").click (function() { 
			 $("#onerrorm").hide();
			$("#onerrorm1").hide();	
			$("#onerrorm2").hide();	
			$("#onerrorm3").hide();	
			$("#onerrorm4").hide();		
			$("#onerrorm5").hide();		
			$("#onerrorm6").hide();	
			$("#onerrorm7").hide();		
			$("#onerrorm8").hide();		
			$("#onerrorm9").hide();
			$("#onerrorm10").hide();			
			$("#onerrorm11").hide();			
			$("#onerrorm12").hide();	
			$("#onerrorm13").hide();		
	$("#myModal").hide(); 
});
});
console.log("sada");
 </script>
 <script>

 // model script for 2 image

var viewerimg1 = document.getElementById('viewer1');
var img1 = document.getElementById('preview1');
$(document).ready(function(){  
if (img1.src.split(".").reverse()[0] == "php" || img1.src == "")
{
	$("#viewer1").hide(); 
	}  else {
		$("#viewer1").show(); 
		}
		});
viewerimg1.onclick = function(){
	if(img1.src != "" ) { var imgsrc = img1.src.split("/").reverse()[0]; var path="API/Uploads/"+imgsrc;
	$("#img01").attr("src",path); $("#onerrorm1").show(); $("#onerrorm1").attr("href" ,path); $("#myModal").show(); }}
 </script>
 <script>

 // model script for 3 image

var viewerimg2 = document.getElementById('viewer2');
var img2 = document.getElementById('preview2');
$(document).ready(function(){ if (img2.src.split(".").reverse()[0] == "php"  || img2.src == ""){$("#viewer2").hide(); }  else {$("#viewer2").show(); } });
viewerimg2.onclick = function(){
	if(img2.src != "" ) { var imgsrc = img2.src.split("/").reverse()[0]; var path="API/Uploads/"+imgsrc;
	$("#img01").attr("src",path); $("#onerrorm2").show(); $("#onerrorm2").attr("href" ,path); $("#myModal").show(); }}
 </script>
 <script>

 // model script for 4 image

var viewerimg3 = document.getElementById('viewer3');
var img3 = document.getElementById('preview3');
// alert(img3.src);

$(document).ready(function(){ if (img3.src.split(".").reverse()[0] == "php"  || img3.src== ""){$("#viewer3").hide(); }  else {$("#viewer3").show(); } });
viewerimg3.onclick = function(){
	if(img3.src != "" ) { var imgsrc = img3.src.split("/").reverse()[0]; var path="API/Uploads/"+imgsrc;
	$("#img01").attr("src",path); $("#onerrorm3").show(); $("#onerrorm3").attr("href" ,path); $("#myModal").show(); }}
 </script>
 <script>

 // model script for 5 image

var viewerimg4 = document.getElementById('viewer4');
var img4 = document.getElementById('preview4');
$(document).ready(function(){ if  (img4.src.split(".").reverse()[0] == "php"  || img4.src== ""){$("#viewer4").hide(); }  else {$("#viewer4").show(); } });
viewerimg4.onclick = function(){
	if(img4.src != "" ) { var imgsrc = img4.src.split("/").reverse()[0]; var path="API/Uploads/"+imgsrc;
	$("#img01").attr("src",path); $("#onerrorm4").show(); $("#onerrorm4").attr("href" ,path); $("#myModal").show(); }}
 </script>
 <script>

 // model script for 6 image

var viewerimg5 = document.getElementById('viewer5');
var img5 = document.getElementById('preview5');
$(document).ready(function(){ if (img5.src.split(".").reverse()[0] == "php"  || img5.src== ""){$("#viewer5").hide(); }  else {$("#viewer5").show(); } });
viewerimg5.onclick = function(){
	if(img5.src != "" ) { var imgsrc = img5.src.split("/").reverse()[0]; var path="API/Uploads/"+imgsrc;
	$("#img01").attr("src",path); $("#onerrorm5").show(); $("#onerrorm5").attr("href" ,path); $("#myModal").show(); }}
 </script>
 <script>

 // model script for 7 image

$(document).ready(function(){ if (img6.src.split(".").reverse()[0] == "php"  || img6.src== ""){$("#viewer6").hide(); }  else {$("#viewer6").show(); } });
var viewerimg6 = document.getElementById('viewer6');
var img6 = document.getElementById('preview6');
viewerimg6.onclick = function(){
	if(img6.src != "" ) { var imgsrc = img6.src.split("/").reverse()[0]; var path="API/Uploads/"+imgsrc;
	$("#img01").attr("src",path); $("#onerrorm6").show(); $("#onerrorm6").attr("href" ,path); $("#myModal").show(); }}
 </script>
 <script>

 // model script for 8 image

var viewerimg7 = document.getElementById('viewer7');
var img7 = document.getElementById('preview7');
$(document).ready(function(){ if (img7.src.split(".").reverse()[0] == "php"  || img7.src== ""){$("#viewer7").hide(); }  else {$("#viewer7").show(); } });
viewerimg7.onclick = function(){
	if(img7.src != "" ) { var imgsrc = img7.src.split("/").reverse()[0]; var path="API/Uploads/"+imgsrc;
	$("#img01").attr("src",path); $("#onerrorm7").show(); $("#onerrorm7").attr("href" ,path); $("#myModal").show(); }}
 </script>
 <script>

 // model script for 9 image

var viewerimg8 = document.getElementById('viewer8');
var img8 = document.getElementById('preview8');
$(document).ready(function(){ if (img8.src.split(".").reverse()[0] == "php"  || img8.src== ""){$("#viewer8").hide(); }  else {$("#viewer8").show(); } });
viewerimg8.onclick = function(){
	if(img8.src != "" ) { var imgsrc = img8.src.split("/").reverse()[0]; var path="API/Uploads/"+imgsrc;
	$("#img01").attr("src",path); $("#onerrorm8").show(); $("#onerrorm8").attr("href" ,path); $("#myModal").show(); }}
 </script>
 <script>

 // model script for 10 image

var viewerimg9 = document.getElementById('viewer9');
var img9 = document.getElementById('preview9');
$(document).ready(function(){ if (img9.src.split(".").reverse()[0] == "php"  || img9.src== ""){$("#viewer9").hide(); }  else {$("#viewer9").show(); } });
viewerimg9.onclick = function(){
	if(img9.src != "" ) { var imgsrc = img9.src.split("/").reverse()[0]; var path="API/Uploads/"+imgsrc;
	$("#img01").attr("src",path); $("#onerrorm9").show(); $("#onerrorm9").attr("href" ,path); $("#myModal").show(); }}
 </script>
  <script>

 // model script for 11 image

var viewerimg10 = document.getElementById('viewer10');
var img10 = document.getElementById('preview10');
$(document).ready(function(){ if (img10.src.split(".").reverse()[0] == "php"  || img10.src== ""){$("#viewer10").hide(); }  else {$("#viewer10").show(); } });
viewerimg10.onclick = function(){
	if(img10.src != "" ) { var imgsrc = img10.src.split("/").reverse()[0]; var path="API/Uploads/"+imgsrc;
	$("#img01").attr("src",path); $("#onerrorm10").show(); $("#onerrorm10").attr("href" ,path); $("#myModal").show(); }}
 </script>
 <script>

 // model script for 12 image

var viewerimg11 = document.getElementById('viewer11');
var img11 = document.getElementById('preview11');
$(document).ready(function(){ if (img11.src.split(".").reverse()[0] == "php"  || img11.src== ""){$("#viewer11").hide(); }  else {$("#viewer11").show(); } });
viewerimg11.onclick = function(){
	if(img11.src != "" ) { var imgsrc = img11.src.split("/").reverse()[0]; var path="API/Uploads/"+imgsrc;
	$("#img01").attr("src",path); $("#onerrorm11").show(); $("#onerrorm11").attr("href" ,path); $("#myModal").show(); }}
 </script>
 <script>

 // model script for 13 image

var viewerimg12 = document.getElementById('viewer12');
var img12 = document.getElementById('preview12');
$(document).ready(function(){ if (img12.src.split(".").reverse()[0] == "php"  || img12.src== ""){$("#viewer12").hide(); }  else {$("#viewer12").show(); } });
viewerimg12.onclick = function(){
	if(img12.src != "" ) { var imgsrc = img12.src.split("/").reverse()[0]; var path="API/Uploads/"+imgsrc;
	$("#img01").attr("src",path); $("#onerrorm12").show(); $("#onerrorm12").attr("href" ,path); $("#myModal").show(); }}
 </script>

 <script>

 // model script for 14 image

var viewerimg13 = document.getElementById('viewer13');
var img13 = document.getElementById('preview13');
$(document).ready(function(){ if (img13.src.split(".").reverse()[0] == "php"  || img13.src== ""){$("#viewer13").hide(); }  else {$("#viewer13").show(); } });
viewerimg13.onclick = function(){
	if(img13.src != "" ) { var imgsrc = img13.src.split("/").reverse()[0]; var path="API/Uploads/"+imgsrc;
	$("#img01").attr("src",path); $("#onerrorm13").show(); $("#onerrorm13").attr("href" ,path); $("#myModal").show(); }}
 </script> 
 <style>
		 
<!-- Get the modal css -->
#preview0 , #upload_2,#upload_3,#upload_4 {
    cursor: pointer;
    transition: 0.3s;
}



/* The Modal (background) */
#myModal .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 150px; /* Location of the box */
    left: 0;
    top: 100px;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.8); /* Black w/ opacity */
}

/* Modal Content (image) */
#myModal .modal-content-image {
	    top: 50px;

    margin: auto;
    display: block;
    width: 50%;
    width: 550px;
 	
}

/* Caption of Modal Image */
#myModal #caption {
    margin: auto;
    display: block;
    width: 550px;
    height: 100px;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
}

/* Add Animation */
 .modal-content-image, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale()}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale()}
}

/* The Close Button */
.close {
    position: absolute;
    top: 45px;
    right: 500px;
    font-size: 40px;
    font-weight: bold;
   /* transition: 0.3s;*/
	opacity: 5.2 !important;
	-webkit-animation-name: zoom;
    -webkit-animation-duration: 2s;
    animation-name: zoom;
    animation-duration: 2s;
	z-index:1051;
	color: black;

}
.downl, .down2 ,.down3 ,.down4, .down5, .down6, .down7 ,.down8 , .down9 ,.downl0,.downl1,.downl2,.downl3,.down14

 {
	  position: absolute;
    top: 58px;
    right: 530px;
	z-index:1051;
    font-size: 20px;
    /*transition: 0.3s;*/
	opacity: 5.2 !important;
	-webkit-animation-name: zoom;
    -webkit-animation-duration: 2s;
    animation-name: zoom;
    animation-duration: 2s;
	color: black;
}

.close:hover,
.close:focus {
    text-decoration: none;
	color: black;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>