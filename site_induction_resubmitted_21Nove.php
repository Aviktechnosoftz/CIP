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
	header("location:resubmitted_forms.php");
}



$obj=$conn->query("Select * FROM tbl_project WHERE id ='".$_SESSION['admin']."'")->fetch_object();
$obj2=$conn->query("Select MAX(id)+1 AS 'id' FROM tbl_induction_register")->fetch_object();

 $obj4=$conn->query("Select * FROM tbl_employer where project_id='".$_SESSION['admin']."'");
 $obj6=$conn->query("Select tbl_employee.id,concat(tbl_employee.given_name ,' ',tbl_employee.surname) as name,tbl_employer.company_name FROM tbl_employee left join tbl_employer on  tbl_employee.employer_id = tbl_employer.id where tbl_employer.id is not null");
$test = $conn->query ("select * 
FROM tbl_induction_register
LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id
WHERE (inducted_by IS NOT NULL or inducted_by = '' ) AND tbl_induction_register.id = '".$_REQUEST['resubmitted_form']."'")->fetch_object();


$employer_name = $conn->query("Select * from tbl_employer where id = '".$test->empid."'")->fetch_object();
// $test2 = "Select * from tbl_site_upload_attachment where induction_id = '".$test->id."' AND image_id = '0";

$obj3=$conn->query("select tbl_access.id,name from tbl_project_register left join tbl_access on tbl_project_register.access_id = tbl_access.id where tbl_project_register.project_id = '".$_SESSION['admin']."' AND tbl_project_register.employer_id = '".$test->empid."' group by access_id")->fetch_object();



$image_0= $conn->query("Select * from tbl_site_upload_attachment where induction_id = '".$test->id."'");
$topic_check=$conn->query("Select * from tbl_site_induction_topics where id = '".$test->id."'")->fetch_object();
$declaration=$conn->query("Select * from tbl_site_induction_declaration where id = '".$test->id."'")->fetch_object();
$approval_select=$approval_select=$conn->query("select tbl_induction_register.id,given_name,surname,pin from tbl_employee left join tbl_induction_register on tbl_employee.id = tbl_induction_register.id where empid = 1");
//Update Button Clicked

 if(isset($_REQUEST['update']) == true) 
 { 
// print_r ($_FILES);
// die();
	$ID        = $_REQUEST['hide2'];
	$induction = $_REQUEST['induction_number'];
	$s         = ltrim($induction, '0');
	$get_email= $conn->query("Select * from tbl_setting where project_id='".$_SESSION['admin']."'")->fetch_object();
	$email= $get_email->induction_mail;
	$insert_approve= $conn->query("Update `tbl_induction_register` set `inducted_by` = '".$ID."' ,`isapproved` = '0'   ,`modified_date` = now() where `id`='".$s."'" ); 


 	?>
		 
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
			Site Induction form ".$induction." is ready to be reviewed.<br/><br/>


			  <a href ='https://cipropertyapp.com/site_induction_form_unapproved.php?unapproved_form=".$s."'><input type=\"button\" value=\"Review\"> </a><br/><br/>



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





 $str = ltrim($_REQUEST['induction_number'], '0');

 	 $image_pre= $conn->query("Select * from tbl_site_upload_attachment where induction_id = '".$str."'");

 	 //Update Employee details
 	$update_employee = $conn->query("Update `tbl_employee` SET `given_name`='".$_REQUEST['empe_name']."',`surname`= '".$_REQUEST['empe_surname']."',`contact_phone`= '".$_REQUEST['empe_contact']."',`job_title`= '".$_REQUEST['empe_position']."',`occupation`='".$_REQUEST['empe_occupation']."',`email_add`='".$_REQUEST['empe_email']."',`emrg_contact_name`='".$_REQUEST['empe_emrg_name']."',`emrg_contact_phone`='".$_REQUEST['empe_emrg_number']."',`emrg_contact_relation`='".$_REQUEST['empe_emrg_relation']."',`address`='".$_REQUEST['empe_add']."',`DOB`='".$_REQUEST['empe_dob']."',`gcic_issue_date`='".$_REQUEST['gcic_date']."',`itp_name`='".$_REQUEST['itp_name']."',`modified_date`=NOW() where `id`= '".$str."'");

 	

 	//Update Attachments Details-- Images


										// $val = '';



										// foreach ($_FILES['photo']['name'] as $key=>$value ) {
										 
											
										// 	if($value!="")
										// 	{
										// 		//$val= $key;
										// 		$val.=$key.",";


										// 	}
	

// echo $val;
// echo substr($val,0,strlen($val)-1);
$val2= substr($val,0,strlen($val)-1);
$array=explode(",",$val2);
 

	$image_path= 'API/Uploads/';  
  $building_images_0  = $_FILES['photo']['name'][0];
  $building_images_1  = $_FILES['photo']['name'][1];
  $building_images_2  = $_FILES['photo']['name'][2];
  $building_images_3  = $_FILES['photo']['name'][3];
  $building_images_4  = $_FILES['photo']['name'][4];
  $building_images_5  = $_FILES['photo']['name'][5];
  $building_images_6  = $_FILES['photo']['name'][6]; 
  $building_images_7  = $_FILES['photo']['name'][7]; 
  $building_images_8  = $_FILES['photo']['name'][8]; 
  $building_images_9  = $_FILES['photo']['name'][9]; 
  $building_images_10  = $_FILES['photo']['name'][10];
  $building_images_11  = $_FILES['photo']['name'][11];   
  $building_images_12  = $_FILES['photo']['name'][12]; 
  $building_images_13  = $_FILES['photo']['name'][13];  
  $target0 = $image_path . $building_images_0;
  $target1 = $image_path . $building_images_1;
  $target2 = $image_path . $building_images_2;
  $target3 = $image_path . $building_images_3;
  $target4 = $image_path . $building_images_4;
  $target5 = $image_path . $building_images_5;
  $target6 = $image_path . $building_images_6;
  $target7 = $image_path . $building_images_7;
  $target8 = $image_path . $building_images_8;
  $target9 = $image_path . $building_images_9;
  $target10 = $image_path . $building_images_10;
  $target11 = $image_path . $building_images_11;
  $target12 = $image_path . $building_images_12;
  $target13 = $image_path . $building_images_13;
  move_uploaded_file($_FILES['photo']['tmp_name'][0], $target0);
  move_uploaded_file($_FILES['photo']['tmp_name'][1], $target1);
  move_uploaded_file($_FILES['photo']['tmp_name'][2], $target2);
  move_uploaded_file($_FILES['photo']['tmp_name'][3], $target3);
  move_uploaded_file($_FILES['photo']['tmp_name'][4], $target4);
  move_uploaded_file($_FILES['photo']['tmp_name'][5], $target5);
  move_uploaded_file($_FILES['photo']['tmp_name'][6], $target6);
  move_uploaded_file($_FILES['photo']['tmp_name'][7], $target7);
  move_uploaded_file($_FILES['photo']['tmp_name'][8], $target8);
  move_uploaded_file($_FILES['photo']['tmp_name'][9], $target9);
  move_uploaded_file($_FILES['photo']['tmp_name'][10], $target10);
  move_uploaded_file($_FILES['photo']['tmp_name'][11], $target11);
  move_uploaded_file($_FILES['photo']['tmp_name'][12], $target12);
  move_uploaded_file($_FILES['photo']['tmp_name'][13], $target13);


	$arr2= array();
	$c= array();
	$arr3=array();
	$db_val_id=array();
	$db_val_url=array();

	
while($row= mysqli_fetch_object($image_pre))
	{
	
		// print_r($row);
		// echo $str;

		
		$arr= explode(" ",$row->image_url);
		$arr2= explode(" ",$row->image_id);
		$c = array_combine($arr2, $arr);
		

			for($i=0;$i<=13;$i++)
			{
					if($_FILES['photo']['name'][$i] == "") 
					{
					$_FILES['photo']['name'][$i] = $c[$i];
					}


	
		
			}
array_push($db_val_id,$row->image_id);
array_push($db_val_url,$row->image_url);
}

// print_r($db_val_url,$row->image_url); 




// print_r($_FILES['photo']['name']);


foreach ($_FILES['photo']['name'] as $key=>$value) {
	

		if(in_array($key, $db_val_id))
		{
			if($value !="")
			{
				$url= $value;
			}

			else
			{
				$url= $db_val_url[$key];
			}
				$update_attachment_1= $conn->query("update `tbl_site_upload_attachment` set 
                    
                  									`image_url`= '".$url."',
                   
              										`image_id` = '".$key."' where (`induction_id`='".$str."' AND `image_id`= '".$key."')");


		}
		else 
		{
					if($value != ""   && in_array($key, $db_val_id) == false)
					{
			        $update_attachment_2= $conn->query("insert into tbl_site_upload_attachment set 
					
                    induction_id= '".$str."',
                    image_url= '".$value."',
                   
                    image_id = '".$key."'");
                }
	
		}
}
	

	
		

}	
 	

if( $update_employee && ($update_attachment_1 || $update_attachment_2))
		{



      
       $qry_declaration_update = $conn->query("update tbl_site_induction_declaration set 
                   
                    edit_certifiy = '".$_REQUEST['empe_name'] ." ". $_REQUEST['empe_surname']."',
                    your_signature = '".$_REQUEST['sign_div_hide']."',
                    todays_date = CURDATE() where id='".$str."'");

                

			$insert_resubmit= $conn->query("Update `tbl_induction_register` set `inducted_by` = '' ,`isapproved` = '0', 
		`comments` = '".$comments."'  ,`modified_date` = now() where `id`='".$str."'" ); 




			?>
		 <script>
		              alert("You Have Successfully Updated Details");
		              window.location.href='unapproved_forms.php';
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
<link rel="stylesheet" href="css/bootstrap.min.css">
    
    <script src="js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
<!--     <script src="js/jquery.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script> -->
    <!-- <script src="js/bootstrap.min.3.3.6.js"></script> -->
     <script type="text/javascript" src=js/validation_site_induction.js></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css">

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">


<script src="js/jquery.signaturepad.js"></script> 
<script src="js/numeric-1.2.6.min.js"></script> 
		<script src="js/bezier.js"></script>
		
		
		<script type='text/javascript' src="js/html2canvas.js"></script>
		<script src="js/json2.min.js"></script>
</header>
<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">Resubmitted Site Induction Form&nbsp;<?// echo $project_name->project_name ?> </span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>

<div class="Main_Form2">
  <div class="col-md-12">
		<form  name="site_form" id="site_form" method="POST" enctype="multipart/form-data" class="well form-horizontal well_class">
			<fieldset>

			<div class="row">
					<div class="form-group">
					<div class="col-sm-12" align="center">
						<label style="color: #fc3807;text-decoration: none">REJECTION COMMENTS-<br><? $arr=explode(",", $test->comments);$resultstr = array(); foreach($arr as $value) {  $resultstr[] = $value ;} echo implode(",",$resultstr);?></label>
						
					</div> 
				</div>
				</div>	

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
							<label>CREATED DATE</label>
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
							<p class="h4">EMPLOYER DETAILS</p>
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
							<input type="text" id="ph" name ="ph" class="form-control form-control-left-radius" 
							value="<? echo $employer_name->phone_no ?>" readonly>
							
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
			<div class="alert3" style="text-align: center;"></div>
				<div class="form-group">
					<div class="col-sm-6">
								<label>Your First Name</label>
								<input type="text"  class="form-control form-control-left-radius" name="empe_name" id="given_name" value="<? echo $test->given_name; ?>" required>
								<script>
									$( document ).ready(function() {
									    $("#given_name").focus();

									});

								</script>
					</div>
			
					<div class="col-sm-6">
								<label>Your Surname</label>
								<input type="text" class="form-control form-control-left-radius" name="empe_surname" id= "surname" value="<? echo $test->surname; ?>" required>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
							<label>Your Address </label>
							<textarea  rows="2" class="form-control form-control-left-radius" name="empe_add"> <? echo $test->address; ?></textarea>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
								<label>Your Date of Birth</label>
								<input style="text-align: left;" type="date"  class="form-control form-control-left-radius" name="empe_dob"  value="<? echo date_format(date_create($test->DOB),"Y-m-d"); ?>" > 
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
								<label>Your Contact Number</label>
								<input type="text" class="form-control form-control-left-radius" name="empe_contact"  value="<? echo $test->contact_phone; ?>">
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
								<label>Your Occupation</label>
								<input type="text"  class="form-control form-control-left-radius" name="empe_occupation" value="<? echo $test->occupation; ?>">
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
								<label>Employee Position</label>
								<select id="position" name="empe_position" style="height: 34px;display: block;width: 100%;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 10vh;" name="empe_position" >
								<option value="Project Manager" <?  if($test->job_title=="Project Manager"){ echo "selected";}?> > Project Manager </option>
									<option value="Site Manager" <?  if($test->job_title=="Site Manager"){ echo "selected";}?>> Site Manager </option>
									<option value="Site Foreman" <?  if($test->job_title=="Site Foreman") { echo "selected";}?> > Site Foreman </option>
									<option value="Worker" <?  if($test->job_title=="Worker") { echo "selected";}?> > Worker </option>

									<option id="other_value" value="1" <? if($test->job_title!="Site Manager" AND $test->job_title!="Project Manager" AND $test->job_title!="Site Foreman" AND  $test->job_title!="Worker" ){ echo "selected" ;}?> > Other </option>

									<script>
										$(document).ready(function(){
										     $('#position').on('change', function() {
										      if ( this.value == '1')
										      //.....................^.......
										      {
										         $("#position_other").show();
										         $("#position-other_text").focus();
										         $("#position-other_text").prop('required',true);
										 
										          

										         
										        }
										        
										        else
										        	$("#position_other").hide();
										
											

										    });
										         });
										      
										
										

																			
									</script>



								</select>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
								<label>Your Email Address</label>
								<input type="Email"  class="form-control form-control-left-radius"  name="empe_email" value="<? echo $test->email_add; ?>">
							</div>
									<div class="col-sm-6 form-group" id= "position_other" hidden>
								<label>Enter Position</label>
								<input type="text" placeholder="Enter Position.." class="form-control form-control-left-radius" id= "position-other_text" name=""  onchange="other_val()">
								<script>
									function other_val()
									{
									var other_position= document.getElementById('position-other_text').value;
									
									document.getElementById("other_value").value = other_position;
								}
								</script>
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
								<input type="text"  class="form-control form-control-left-radius" name="empe_emrg_name" value="<? echo $test->emrg_contact_name; ?>">
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
								<label>Their Contact Number</label>
								<input type="Number"  class="form-control form-control-left-radius" name="empe_emrg_number" value="<? echo $test->emrg_contact_phone; ?>">
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
								<label>Relationship To You</label>
								<input type="text"  class="form-control form-control-left-radius" name="empe_emrg_relation" value="<? echo $test->emrg_contact_relation; ?>">
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
					<div class="col-sm-9">
								<p class="text" style="text-align: left;"> Do you have a medical condition that poses a health or safety risk to you or others on site? e.g. Diabetes, Deafness, Heart/Lung Condition, Allergy etc.)</p>
					</div>
					<div class="col-md-3 col-sm-3">						              
				        <label class="checkbox-inline" style="float: right;padding-right: 5px;">
				    
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
								 
						?>
				        <script>
				        	$( document ).ready(function() {
				        		$("#preview"+"<? echo $row->image_id?>").attr("src", "API/Uploads/<? echo $row->image_url?>");
				        		

				        	});
				        	// $( document ).ready(function() {
								
				        		// $("#viewer"+"<? echo $row->image_id?>").click(function() {
									  function get_image(id) {

									var img = document.getElementById('preview'+id);
				                    var imgsrc = img.src.split("/").reverse()[0];
									
									var imgimg = $('#preview'+id).attr('src');
									var path2="API/Uploads/"+imgsrc;

				        			  console.log(path2);
				        			$('.imagepreview').attr("src",imgimg);

									$('#imagemodal').modal('show');  
									$('#onerrorm'+id).show();
									$('#onerrorm'+id).attr("href" ,path2);
									  }
								// });

				        	// });
							$(document).ready(function(){
				var viewerhas =document.getElementById('preview'+<? echo $row->image_id?>); 
				if ( viewerhas.src == ""){ $("#viewer"+"<? echo $row->image_id?>").hide();} else  {$("#viewer"+"<? echo $row->image_id?>").show(); } 
				
				
				});
							// var i;
				   //      	for (i = 0;i<=13;i++) { 
							//     if ($('#preview'+i).css('background-image') == 'none') {
							// 			  $('#preview'+i).css("background", "url(/image/5.svg) no-repeat");
							// 			}
							// }

				        </script>
						<? }?>

						<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">              
						      <div class="modal-body" style="padding: 5px;">
             <button type="button" class="close" data-dismiss="modal"  style="position: initial;font-size: 25px;line-height: 0.7;"><span aria-hidden="true" style="color: #23527c;">&times;</span><!-- <span class="sr-only">Close</span> --></button>
        <a class="help-button  down1 fa fa-download" id="onerrorm0"  style="display:none" download></a>
        <a class="help-button  down2 fa fa-download" id="onerrorm1"  style="display:none" download></a>
        <a class="help-button  down3 fa fa-download" id="onerrorm2"  style="display:none" download></a>
        <a class="help-button  down4 fa fa-download" id="onerrorm3"  style="display:none" download></a>
        <a class="help-button  down5 fa fa-download" id="onerrorm4"  style="display:none" download></a>
        <a class="help-button  down6 fa fa-download" id="onerrorm5"  style="display:none" download></a>
        <a class="help-button  down7 fa fa-download" id="onerrorm6"  style="display:none" download></a>
        <a class="help-button  down8 fa fa-download" id="onerrorm7"  style="display:none" download></a>
        <a class="help-button  down9 fa fa-download" id="onerrorm8"  style="display:none" download></a>
        <a class="help-button  downl0 fa fa-download" id="onerrorm9"  style="display:none" download></a>
        <a class="help-button  downl1 fa fa-download" id="onerrorm10" style="display:none" download></a>
        <a class="help-button  downl2 fa fa-download" id="onerrorm11" style="display:none" download></a>
        <a class="help-button  downl3 fa fa-download" id="onerrorm12" style="display:none" download></a>
        <a class="help-button  down14 fa fa-download" id="onerrorm13" style="display:none" download></a>						
								
						        <img src="" class="imagepreview" style="width: 100%;" onerror="javascript:this.src='Document.png'; " >
						      </div>
						    </div>
						  </div>
						</div>						     
					    <input name="medical_check" id="medical" type="checkbox" checked class="faChkSqr"> 
					    <div style="margin-top: 6px;margin-left: 14px;width: 24px;height: 25px;"><label id="label_txt"> </label></div>
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
					    </label>      	
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
			
			<!-- div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						              
						        <label class="checkbox-inline">
							   
					          <input type="checkbox" Id="induction_card" <?php echo ($test->is_gcic == 1 ? 'checked' : '');    ?> ><strong>Yes</strong> 
					</div> -->
				<!-- </div>
			</div>
			 -->
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
								<label class="inline">Date Issued</label>
								<input style="text-align: left;" type="date" min="1997-01-01" name= "gcic_date" class="form-control form-control-left-radius" value="<? echo date_format(date_create($test->gcic_issue_date),"Y-m-d"); ?>" required>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
								<label>Name Of Induction Training Provider</label>
								<input type="text" name= "itp_name"  class="form-control form-control-left-radius" value="<? echo $test->itp_name; ?>" required>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
								<label>General Construction Induction Card</label>
								<input type="text" name="pin" minlength="4"  class="form-control form-control-left-radius" value="<? echo $test->induction_card_no; ?>" readonly>
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

      		<img class="preview0" id="preview0" alt="" onclick="$('#Img1').click()" onerror="onerrorfun(0) ;" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;">
						<span class="glyphicon glyphicon-eye-open" id="viewer0" onclick="get_image(0)" ></span>
						
						<br><br>
      						<label for="Img1" class="btn btn-default btn-xs">Upload New File</label><br>  
      						<label> General Construction Induction Card Front:</label><br>
	    					<input type="file" name="photo[]" id="Img1" class="hidden" value="ok" onchange="document.getElementById('preview0').src = window.URL.createObjectURL(this.files[0]); $('#viewer0').show();"> 
	    					
                 

						</p>
	    			</div>
	    			<div class="col-sm-6">
	    				<p style="text-align: center;">
	    					     						
      						<img class="preview1" id="preview1" alt="" onclick="$('#Img2').click()" onerror="onerrorfun(1) ;" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;" >
													<span class="glyphicon glyphicon-eye-open" id="viewer1" onclick="get_image(1)"></span>

							<br><br>
      						<label for="Img2" class="btn btn-default btn-xs">Upload New File</label><br>  
      						<label> General Construction Induction Card Front:</label><br>
	    					<input type="file" name="photo[]" id="Img2" class="hidden" value="ok" onchange="document.getElementById('preview1').src = window.URL.createObjectURL(this.files[0]); $('#viewer1').show();"> 
						</p>
					</div>
				</div>
			</div>
						
	    	<div class="row">
				<div class="form-group">
					<div class="col-sm-6">
						<p style="text-align: center;">
	    					
      						<img class="preview3" id="preview2" alt="" onclick="$('#Img3').click()" onerror="onerrorfun(2) ;" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;">
							<span class="glyphicon glyphicon-eye-open" id="viewer2" onclick="get_image(2)" style="" ></span>

							<br><br>
      						<label for="Img3"class="btn btn-default btn-xs">Upload New File</label><br>  
      						<label> Driver License Front:</label><br>
	    					<input type="file" name="photo[]" id="Img3" class="hidden" value="ok" onchange="document.getElementById('preview2').src = window.URL.createObjectURL(this.files[0]); $('#viewer2').show();"> 
						</p>
					</div>
    				<div class="col-sm-6">
	    				<p style="text-align: center;">
	    					     					
      						<img class="preview4" id="preview3" alt="" onclick="$('#Img4').click()" onerror="onerrorfun(3) ;" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;">
							<span class="glyphicon glyphicon-eye-open" id="viewer3" onclick="get_image(3)" style="" ></span>

							<br><br>
      						<label for="Img4"class="btn btn-default btn-xs">Upload New File</label><br>  
      						<label> Driver License Back:</label><br>
	    					<input type="file" name="photo[]" id="Img4" class="hidden" value="ok" onchange="document.getElementById('preview3').src = window.URL.createObjectURL(this.files[0]); $('#viewer3').show();">

						</p>
					</div>
				</div>
			</div>
						
	    	<div class="row">
				<div class="form-group">
					<div class="col-sm-6">
						<p style="text-align: center;">
	    					    						
      						<img class="preview5" id="preview4" alt="" onclick="$('#Img5').click()" onerror="onerrorfun(4) ;" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;">
							<span class="glyphicon glyphicon-eye-open" id="viewer4"onclick="get_image(4)" style="" ></span>

							<br><br>
      						<label for="Img5"class="btn btn-default btn-xs">Upload New File</label><br>  
      						<label>Competency/ Certificates:</label><br>
	    					<input type="file" name="photo[]" id="Img5" class="hidden" value="ok" onchange="document.getElementById('preview4').src = window.URL.createObjectURL(this.files[0]); $('#viewer4').show();">
						</p>
					</div>
					<div class="col-sm-6">
	    				<p style="text-align: center;">
	    				     				
      						<img class="preview6" id="preview5" alt="" onclick="$('#Img6').click()" onerror="onerrorfun(5) ;" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;">
							<span class="glyphicon glyphicon-eye-open" id="viewer5" onclick="get_image(5)" style="" ></span>

							<br><br>
      						<label for="Img6"class="btn btn-default btn-xs">Upload New File</label><br>  
      						<label> Competency/ Certificates:</label><br>
	    					<input type="file" name="photo[]" id="Img6" class="hidden" value="ok" onchange="document.getElementById('preview5').src = window.URL.createObjectURL(this.files[0]); $('#viewer5').show();">
						</p>
					</div>
				</div>
			</div>
						
	    	<div class="row">
				<div class="form-group">
					<div class="col-sm-6">
						<p style="text-align: center;">	    					
    						  				
      						<img class="preview7" id="preview6" alt="" onclick="$('#Img7').click()" onerror="onerrorfun(6) ;" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;">
							<span class="glyphicon glyphicon-eye-open" id="viewer6" onclick="get_image(6)" style="" ></span>

							<br><br>
      						<label for="Img7"class="btn btn-default btn-xs">Upload New File</label><br>  
      						<label> Competency/ Certificates:</label><br>
	    					<input type="file" name="photo[]" id="Img7" class="hidden" value="ok" onchange="document.getElementById('preview6').src = window.URL.createObjectURL(this.files[0]); $('#viewer6').show();">
						</p>
					</div>
					<div class="col-sm-6">
    					<p style="text-align: center;">
    					    						
  						<img class="preview8" id="preview7" alt="" onclick="$('#Img8').click()" onerror="onerrorfun(7) ;" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;">
						<span class="glyphicon glyphicon-eye-open" id="viewer7" onclick="get_image(7)" style="" ></span>

						<br><br>
      						<label for="Img8"class="btn btn-default btn-xs">Upload New File</label><br>  
      						<label> Competency/ Certificates:</label><br>
	    					<input type="file" name="photo[]" id="Img8" class="hidden" value="ok" onchange="document.getElementById('preview7').src = window.URL.createObjectURL(this.files[0]); $('#viewer7').show();">
						</p>
					</div>
				</div>
			</div>
						
			<div class="row">
				<div class="form-group">
					<div class="col-sm-6">
						<p style="text-align: center;">
	    					     					
      						<img class="preview9" id="preview8" alt="" onclick="$('#Img9').click()" onerror="onerrorfun(8) ;" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;">
							<span class="glyphicon glyphicon-eye-open" id="viewer8" onclick="get_image(8)"style="" ></span>

							<br><br>
      						<label for="Img9"class="btn btn-default btn-xs">Upload New File</label><br>  
      						<label> Competency/ Certificates:</label><br>
	    					<input type="file" name="photo[]" id="Img9" class="hidden" value="ok" onchange="document.getElementById('preview8').src = window.URL.createObjectURL(this.files[0]); $('#viewer8').show();">
						</p>
					</div>
					<div class="col-sm-6">
	    				<p style="text-align: center;">
    						    						
  						<img class="preview10" id="preview9" alt="" onclick="$('#Img10').click()" onerror="onerrorfun(9) ;" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;">
						<span class="glyphicon glyphicon-eye-open" id="viewer9" onclick="get_image(9)"style="" ></span>

						<br><br>
      						<label for="Img10"class="btn btn-default btn-xs">Upload New File</label><br>  
      						<label> Competency/ Certificates:</label><br>
	    					<input type="file" name="photo[]" id="Img10" class="hidden" value="ok" onchange="document.getElementById('preview9').src = window.URL.createObjectURL(this.files[0]); $('#viewer9').show();">
						</p>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<div class="col-sm-6">
						<p style="text-align: center;">
	    					
      						<img class="preview11" id="preview10" alt="" onclick="$('#Img11').click()" onerror="onerrorfun(10) ;" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;">
							<span class="glyphicon glyphicon-eye-open" id="viewer10" onclick="get_image(10)" style="" ></span>

							<br><br>
      						<label for="Img11"class="btn btn-default btn-xs">Upload New File</label><br>  
      						<label> Competency/ Certificates:</label><br>
	    					<input type="file" name="photo[]" id="Img11" class="hidden" value="ok" onchange="document.getElementById('preview10').src = window.URL.createObjectURL(this.files[0]); $('#viewer10').show();">
						</p>
					</div>
					<div class="col-sm-6">
    					<p style="text-align: center;">
	    					
	  						<img class="preview12" id="preview11" alt="" onclick="$('#Img12').click()" onerror="onerrorfun(11) ;" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;">
							<span class="glyphicon glyphicon-eye-open" id="viewer11"onclick="get_image(11)" style="" ></span>

	  						<br><br>
      						<label for="Img12"class="btn btn-default btn-xs">Upload New File</label><br>  
      						<label> Competency/ Certificates:</label><br>
	    					<input type="file" name="photo[]" id="Img12" class="hidden" value="ok" onchange="document.getElementById('preview11').src = window.URL.createObjectURL(this.files[0]); $('#viewer11').show();">
						</p>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<div class="col-sm-6">
						<p style="text-align: center;">
	    					
      						<img class="preview13" id="preview12" alt="" onclick="$('#Img13').click()" onerror="onerrorfun(12) ;" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;">
							<span class="glyphicon glyphicon-eye-open" id="viewer12"onclick="get_image(12)" style="" ></span>

							<br><br>
      						<label for="Img13"class="btn btn-default btn-xs">Upload New File</label><br>  
      						<label> Competency/ Certificates:</label><br>
	    					<input type="file" name="photo[]" id="Img13" class="hidden" value="ok" onchange="document.getElementById('preview12').src = window.URL.createObjectURL(this.files[0]); $('#viewer12').show();">
						</p>
					</div>
					<div class="col-sm-6">
	    				<p style="text-align: center;">
	    					
      						<img class="preview14" id="preview13" alt="" onclick="$('#Img14').click()" onerror="onerrorfun(13) ;" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;">
							<span class="glyphicon glyphicon-eye-open" id="viewer13" onclick="get_image(13)" style="" ></span>

							<br><br>
      						<label for="Img14"class="btn btn-default btn-xs">Upload New File</label><br>  
      						<label> Competency/ Certificates:</label><br>
	    					<input type="file" name="photo[]" id="Img14" class="hidden" value="ok" onchange="document.getElementById('preview13').src = window.URL.createObjectURL(this.files[0]); $('#viewer13').show();">
						</p>
					</div>
				</div>
			</div>
							
				<div class="row">
					<div class="form-group">
						<div class="col-sm-6">
							<p class="h4">INDUCTION TOPICS</p>								
						</div>
						<div class="col-md-6">						              
						        <label class="checkbox-inline" class="checkbox_all_title" style="float: right;padding-right: 10px;margin-left">
			
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
									<div class="chknum">34</div>
									<div class="col-sm-10 chkcontent">
									<p>Environmental Compliance</p>
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
								</div>
									<!-- <div class="col-md-1"><br><br>
									<p>**</p>
									</div> -->
									<!-- <div class="col-md-2" style="text-align: left;"><br><br>
									<p>Information provided under Item 1. Addition Inductions
									</p>
									</div> -->
									<!-- <div class="col-sm-2 form-group"><br><br>
									
								        
						            <input type="text" Id=""  class="form-group" value="<? echo $topic_check->induction_topic_edit_text_34 ?>" readonly>

						        
									</div> -->

								</div>	
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
									<p class="h5" style="text-align: left;font-weight: 100;">I <input type="text" style="border: 0;text-align: center;background: #e4e4e4;" readonly" value="<? echo $declaration->edit_certifiy ?>" readonly>&nbsp;<span style="float: right;color: #272727;"> certify the following:</span> </p>
									<ul style="text-align: left;">
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
							   <div style="-webkit-border-radius: 50px;-moz-border-radius: 50px;border-radius: 50px;background:center top no-repeat rgb(255, 255, 255);height: 100%;width: 50%;float: right;background-size: 20vh 20vh;">
							<p class="h5" style="text-align: center;vertical-align: middle;">Your Signature<span style="margin-left: 10px;"><a href="#" data-toggle="modal" data-target="#bannerformmodal" class="new-sign"> New Sign</a></span></p>
							<div style="background:url('<?="API/Uploads/".$declaration->your_signature ?>') center top no-repeat rgb(255, 255, 255);height: 50%;left:25%;width: 75%;float: right;" name="sign_div" id= "sign_div""></div>
							<input type="text" name="sign_div_hide" id="sign_div_hide" value="<?=$declaration->your_signature ?>" hidden>

							<!-- New Sign Modal -->


									
							

							</div>
							</div>
						</div>
					</div>
				</div>	
				
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
										<option value="<? echo $row2->id ?>"> <? $value= str_pad($row2->id, 4, '0', STR_PAD_LEFT); echo $value; ?> </option>
										<? } ?>
									</select>
						</div>				
						<div class="col-sm-3">
							<label>Date</label>
							<input type="text"  class="form-control form-control-left-radius" value="<? echo date("d/m/y"); ?>" readonly>
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
										         // pin_validate_reject();
										    }
										});
									}
									 </script>
								<div class="col-sm-3">						
								<label>Name</label>
									<input type="text" id= "name_induction" placeholder="Enter Name Here.." class="form-control form-control-left-radius" readonly>
									<input type="text" name="hide" id="pin" hidden>
									<input type="text" name="hide2" id="induct_id" hidden>
								</div>
								<div class="col-sm-3">						
								<label>Enter PIN</label>
									<input id= "pin_induction" type="password" class="form-control form-control-left-radius"  required onkeyup="pin_validate();">
									<script>

									 
																												

										function pin_validate()
										{

											
											pin_val= document.getElementById('pin_induction').value;
											pin_db2= document.getElementById('pin').value;
										
											if(pin_val == pin_db2)
											{
											document.getElementById('submit').disabled=false;
											// alert("correct");
											document.getElementById('submit').value="Resubmit Changes";
											// document.getElementById('submit').style.borderColor="black";
											document.getElementById('submit').style.backgroundColor="#f47821";

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

											document.getElementById('submit').value="Resubmit Changes";
											// document.getElementById('submit').style.borderColor="red";
											document.getElementById('submit').style.backgroundColor="#f47821";
											document.getElementById('submit').disabled=true;
											}
											
				
									 }
								
										

									
									$(document).ready(function(){
								    $("#resubmit").click(function(){
								        $('#comment_reject').attr('required', true);
								     });
								    $("#submit").click(function(){
								    $('#comment_reject').attr('required', false);
								       

								    });
								});
																								

									</script>
									
							</div>
						</div>
					</div>
						
					<div class="row">
						<div class="form-group">
							<div class="col-sm-6">
								<div class="col-sm-6 col-sm-offset-3">
									<!-- <input type="submit" class="btn btn-primary form_submit_button" id= "submit" value="Approve"  name="set" /> -->


									<input type="submit" class="btn btn-primary form_submit_button" id= "submit" value="Resubmit Changes"  name="update" />
								</div>
							</div>	
							<div class="col-sm-6">
								<div class="col-sm-6 col-sm-offset-3">								
									<input type="submit" class="btn btn-primary form_submit_button" id= "back_btn" value="Back"  name="back" onclick="window.location.href='resubmitted_forms.php'" />
							</div>	
							</div>


							
						</div>
					</div>
						
			</fieldset>
		</form> 
		<div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal">
  <div class="modal-dialog">
    <div class="modal-content">      
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: inherit;">&times;</button>
          <h4 class="modal-title" id="myModalLabel">New Signature Here..</h4>
        </div>
        <div class="modal-body">
        	<center>
          
          <div id="signArea" >
            <!-- <h2 class="tag-ingo">Put signature below,</h2> -->
            <div class="sig sigWrapper" style="height:auto;">
              <div class="typed">
              </div>
              <canvas class="sign-pad" id="sign-pad" width="300" height="100">
              </canvas>
              <canvas id='blank' style='display:none'>
              </canvas>
			<div>
				<input class="button_sign" type="button" name="" id="btnSaveSign" value="Save">
				<input class="clearButton button_sign" type="button" name="" value="Clear">
			</div>
            </div>
          </div>
          <div class="sign-container">
	        <?php
				$image_list = glob("./doc_signs/*.png");
				foreach($image_list as $image){
				//echo $image;
				?>
				          <img src="<?php echo $image; ?>" class="sign-preview" />
				          <?php
				}
			?>
        </div>
        </center>
        </div>
        
    
      <!-- <div class="modal-footer">
<button type="button" class="btn btn-blue">Submit</button>
</div>   -->        
    </div>
  </div>
</div>


<? include("footer_new.php"); ?>
		
    </div>


		
	</div>
</div>

 
<style> 
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
	color: #666666;
	font-size: 2vh;
	font-weight: 900;
}
</style>
	  	 <!-- The Modal -->
 


<script>
            function onerrorfun(id) {
              var qqqq =$('#preview'+id).css('background-image', 'url(Document.png)');
              console.log(qqqq);
              
            }
            </script>
<script>
$(document).ready(function(){
$(".close").click (function() {
      $("#onerrorm0").hide();$("#onerrorm1").hide();  $("#onerrorm2").hide(); $("#onerrorm3").hide(); $("#onerrorm4").hide();$("#onerrorm5").hide();$("#onerrorm6").hide(); $("#onerrorm7").hide();$("#onerrorm8").hide();  $("#onerrorm9").hide(); $("#onerrorm10").hide();  $("#onerrorm11").hide();$("#onerrorm12").hide();$("#onerrorm13").hide();  
      $("#imagemodal").hide(); 
});
});
</script>
<script>
// file downlode for file_1
$("#onerrorm0").click(function(){
        var filename = $('#Img1').val();
            var file = document.getElementById('Img1').files[0];      
            var filename = document.getElementById('Img1').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);
            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = ""; }) 
</script>  
<script>
// file downlode for file_1
$("#onerrorm1").click(function(){
        var filename = $('#Img2').val();
            var file = document.getElementById('Img2').files[0];      
            var filename = document.getElementById('Img2').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);
            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = ""; }) 
</script> 
<script>
// file downlode for file_1
$("#onerrorm2").click(function(){
        var filename = $('#Img3').val();
            var file = document.getElementById('Img3').files[0];      
            var filename = document.getElementById('Img3').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);
            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = ""; }) 
</script> 
<script>
// file downlode for file_1
$("#onerrorm3").click(function(){
        var filename = $('#Img4').val();
            var file = document.getElementById('Img4').files[0];      
            var filename = document.getElementById('Img4').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);
            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = ""; }) 
</script> 
<script>
// file downlode for file_1
$("#onerrorm4").click(function(){
        var filename = $('#Img5').val();
            var file = document.getElementById('Img5').files[0];      
            var filename = document.getElementById('Img5').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);
            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = ""; }) 
</script> 
<script>
// file downlode for file_1
$("#onerrorm5").click(function(){
        var filename = $('#Img6').val();
            var file = document.getElementById('Img6').files[0];      
            var filename = document.getElementById('Img6').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);
            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = ""; }) 
</script> 
<script>
// file downlode for file_1
$("#onerrorm6").click(function(){
        var filename = $('#Img7').val();
            var file = document.getElementById('Img7').files[0];      
            var filename = document.getElementById('Img7').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);
            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = ""; }) 
</script> 
<script>
// file downlode for file_1
$("#onerrorm7").click(function(){
        var filename = $('#Img8').val();
            var file = document.getElementById('Img8').files[0];      
            var filename = document.getElementById('Img8').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);
            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = ""; }) 
</script> 
<script>
// file downlode for file_1
$("#onerrorm8").click(function(){
        var filename = $('#Img9').val();
            var file = document.getElementById('Img9').files[0];      
            var filename = document.getElementById('Img9').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);
            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = ""; }) 
</script> 
<script>
// file downlode for file_1
$("#onerrorm9").click(function(){
        var filename = $('#Img10').val();
            var file = document.getElementById('Img10').files[0];      
            var filename = document.getElementById('Img10').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);
            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = ""; }) 
</script> 
<script>
// file downlode for file_1
$("#onerrorm10").click(function(){
        var filename = $('#Img11').val();
            var file = document.getElementById('Img11').files[0];      
            var filename = document.getElementById('Img11').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);
            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = ""; }) 
</script> 
<script>
// file downlode for file_1
$("#onerrorm11").click(function(){
        var filename = $('#Img12').val();
            var file = document.getElementById('Img12').files[0];      
            var filename = document.getElementById('Img12').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);
            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = ""; }) 
</script> 
<script>
// file downlode for file_1
$("#onerrorm12").click(function(){
        var filename = $('#Img13').val();
            var file = document.getElementById('Img13').files[0];      
            var filename = document.getElementById('Img13').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);
            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = ""; }) 
</script> 
<script>
// file downlode for file_1
$("#onerrorm13").click(function(){
        var filename = $('#Img13').val();
            var file = document.getElementById('Img14').files[0];      
            var filename = document.getElementById('Img14').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);
            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = ""; }) 
</script> 
<script>
// uploader1
var imageLoader = document.getElementById('Img1');
    imageLoader.addEventListener('change', handleImage, false);
console.log("1");
function handleImage(e) {
    console.log("2");

    var reader = new FileReader();
    reader.onload = function (event) {
    console.log("3");

        $('#preview0 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox;
dropbox = document.getElementById("preview0");
dropbox.addEventListener("dragenter", dragenter, false);
dropbox.addEventListener("dragover", dragover, false);
dropbox.addEventListener("drop", drop, false);

function dragenter(e) {
  console.log("4");

  e.stopPropagation();
  e.preventDefault();
}

function dragover(e) {
  console.log("5");

  e.stopPropagation();
  e.preventDefault();
}

function drop(e) {
  console.log("6");

          $("#viewer0").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader.files = files;
  
}
</script>
<script>
// uploader2

var imageLoader2 = document.getElementById('Img2');
    imageLoader2.addEventListener('change', handleImage2, false);

function handleImage2(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#preview1 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox2;
dropbox2 = document.getElementById("preview1");
dropbox2.addEventListener("dragenter", dragenter2, false);
dropbox2.addEventListener("dragover", dragover2, false);
dropbox2.addEventListener("drop", drop2, false);

function dragenter2(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover2(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop2(e) {
          $("#viewer1").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader2.files = files;
}
</script>
<script>
// uploader3

var imageLoader3 = document.getElementById('Img3');
    imageLoader3.addEventListener('change', handleImage3, false);

function handleImage3(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#preview2 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox3;
dropbox3 = document.getElementById("preview2");
dropbox3.addEventListener("dragenter", dragenter3, false);
dropbox3.addEventListener("dragover", dragover3, false);
dropbox3.addEventListener("drop", drop3, false);

function dragenter3(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover3(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop3(e) {
          $("#viewer2").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader3.files = files;
}
</script>
<script>
// uploader4

var imageLoader4 = document.getElementById('Img4');
    imageLoader4.addEventListener('change', handleImage4, false);

function handleImage4(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#preview3 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbo4;
dropbox4 = document.getElementById("preview3");
dropbox4.addEventListener("dragenter", dragenter4, false);
dropbox4.addEventListener("dragover", dragover4, false);
dropbox4.addEventListener("drop", drop4, false);

function dragenter4(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover4(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop4(e) {
          $("#viewer3").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader4.files = files;
}
</script>
<script>
// uploader5

var imageLoader5 = document.getElementById('Img5');
    imageLoader5.addEventListener('change', handleImage5, false);

function handleImage5(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#preview4 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox5;
dropbox5 = document.getElementById("preview4");
dropbox5.addEventListener("dragenter", dragenter5, false);
dropbox5.addEventListener("dragover", dragover5, false);
dropbox5.addEventListener("drop", drop5, false);

function dragenter5(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover5(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop5(e) {
          $("#viewer4").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader5.files = files;
}
</script>
<script>
// uploader6

var imageLoader6 = document.getElementById('Img6');
    imageLoader6.addEventListener('change', handleImage6, false);

function handleImage6(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#preview5 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox6;
dropbox6 = document.getElementById("preview5");
dropbox6.addEventListener("dragenter", dragenter6, false);
dropbox6.addEventListener("dragover", dragover6, false);
dropbox6.addEventListener("drop", drop6, false);

function dragenter6(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover6(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop6(e) {
          $("#viewer5").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader6.files = files;
}
</script>
<script>
// uploader3

var imageLoader7 = document.getElementById('Img7');
    imageLoader7.addEventListener('change', handleImage7, false);

function handleImage7(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#preview6 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox7;
dropbox7 = document.getElementById("preview6");
dropbox7.addEventListener("dragenter", dragenter7, false);
dropbox7.addEventListener("dragover", dragover7, false);
dropbox7.addEventListener("drop", drop7, false);

function dragenter7(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover7(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop7(e) {
          $("#viewer6").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader7.files = files;
}
</script>
<script>
// uploader8

var imageLoader8 = document.getElementById('Img8');
    imageLoader8.addEventListener('change', handleImage8, false);

function handleImage8(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#preview7 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox8;
dropbox8 = document.getElementById("preview7");
dropbox8.addEventListener("dragenter", dragenter8, false);
dropbox8.addEventListener("dragover", dragover8, false);
dropbox8.addEventListener("drop", drop8, false);

function dragenter8(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover8(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop8(e) {
          $("#viewer7").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader8.files = files;
}
</script>
<script>
// uploader9

var imageLoader9 = document.getElementById('Img9');
    imageLoader9.addEventListener('change', handleImage9, false);

function handleImage9(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#preview8 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox9;
dropbox9 = document.getElementById("preview8");
dropbox9.addEventListener("dragenter", dragenter9, false);
dropbox9.addEventListener("dragover", dragover9, false);
dropbox9.addEventListener("drop", drop9, false);

function dragenter9(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover9(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop9(e) {
          $("#viewer8").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader9.files = files;
}
</script>
<script>
// uploader10

var imageLoader10 = document.getElementById('Img10');
    imageLoader10.addEventListener('change', handleImage10, false);

function handleImage10(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#preview9 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox10;
dropbox10 = document.getElementById("preview9");
dropbox10.addEventListener("dragenter", dragenter10, false);
dropbox10.addEventListener("dragover", dragover10, false);
dropbox10.addEventListener("drop", drop10, false);

function dragenter10(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover10(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop10(e) {
          $("#viewer9").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader10.files = files;
}
</script>
<script>
// uploader11

var imageLoader11 = document.getElementById('Img11');
    imageLoader11.addEventListener('change', handleImage11, false);

function handleImage11(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#preview10 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox11;
dropbox11 = document.getElementById("preview10");
dropbox11.addEventListener("dragenter", dragenter11, false);
dropbox11.addEventListener("dragover", dragover11, false);
dropbox11.addEventListener("drop", drop11, false);

function dragenter11(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover11(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop11(e) {
          $("#viewer10").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader11.files = files;
}
</script>
<script>
// uploader12

var imageLoader12 = document.getElementById('Img12');
    imageLoader12.addEventListener('change', handleImage12, false);

function handleImage12(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#preview11 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox12;
dropbox12 = document.getElementById("preview11");
dropbox12.addEventListener("dragenter", dragenter12, false);
dropbox12.addEventListener("dragover", dragover12, false);
dropbox12.addEventListener("drop", drop12, false);

function dragenter12(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover12(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop12(e) {
          $("#viewer11").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader12.files = files;
}
</script>
<script>
// uploader13

var imageLoader13 = document.getElementById('Img13');
    imageLoader13.addEventListener('change', handleImage13, false);

function handleImage13(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#preview12 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox13;
dropbox13 = document.getElementById("preview12");
dropbox13.addEventListener("dragenter", dragenter13, false);
dropbox13.addEventListener("dragover", dragover13, false);
dropbox13.addEventListener("drop", drop13, false);

function dragenter13(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover13(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop13(e) {
          $("#viewer12").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader13.files = files;
}
</script>
<script>
// uploader14

var imageLoader14 = document.getElementById('Img14');
    imageLoader14.addEventListener('change', handleImage14, false);

function handleImage14(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#preview13 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox14;
dropbox14 = document.getElementById("preview13");
dropbox14.addEventListener("dragenter", dragenter14, false);
dropbox14.addEventListener("dragover", dragover14, false);
dropbox14.addEventListener("drop", drop14, false);

function dragenter14(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover14(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop14(e) {
          $("#viewer13").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader14.files = files;
}
</script>





 <style>
.glyphicon-eye-open { display:none;}

.new-sign {
	text-decoration: none !important;
	margin-left: 10px;
	
}
 .new-sign a:active, a:focus {
 	outline: none;
 }
.button_sign {
	background-color: #f47821 !important;
    color: white !important;
    border: none !important;
    border-radius: 10vh !important;
    width: 100px !important;
    outline: 0 !important;
    margin-top: 20px !important;
    margin-bottom: 20px !important;	
  }   
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
    max-width: 550px;
    max-height: 500px;
	
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
	  /*position: absolute;
    top: 58px;
    right: 530px;*/
	       z-index:1051;
    font-size: 13px;
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
    color: black !important;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>

<script type="text/javascript">
		var toggle_val= 0;
			$(document).ready(function() {
				$('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
				
			});
			
			$("#btnSaveSign").click(function(e){
					canvas = document.getElementById('sign-pad');
				if(canvas.toDataURL() == "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADHUlEQVR4Xu3YsQ3DQBADQasm9V+CanoDTu3A6RKjCvjDAwNd55zz8hEgQCAgcBmsQEsiEiDwETBYDoEAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARuDnYD3Pk3mAoAQIbArc9/31MIO12bVXEcgL/D1Y+Zd6AAECkwL+YU3W6lEENgUM1mavXkVgUsBgTdbqUQQ2BQzWZq9eRWBSwGBN1upRBDYFDNZmr15FYFLAYE3W6lEENgUM1mavXkVgUuANCUCU5ApZHy4AAAAASUVORK5CYII=" || canvas.toDataURL()=="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADKElEQVR4Xu3YsW2EUBREUbYA2qD/emiDAljJmeXE6R0dKph/5mkCPu/7voePAAECAYGPwQq0JCIBAj8CBsshECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgI/Bms+76P53kyDxCUAIFNgfM8j+u6fj3OYG127VUE8gL/Gqz8Kz2AAIFZAf+wZqv1MAJ7AgZrr1MvIjArYLBmq/UwAnsCBmuvUy8iMCtgsGar9TACewIGa69TLyIwK2CwZqv1MAJ7AgZrr1MvIjAr8AU2aZrkSYVn9AAAAABJRU5ErkJggg==")
        {
        alert('Signature Field Cannot be left blank');
        return false;
      	}
        
        		else
        		{
				html2canvas([document.getElementById('sign-pad')], {
					onrendered: function (canvas) {
						var canvas_img_data = canvas.toDataURL('image/png');
						var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
						//ajax call to save image inside folder
						$.ajax({
							url: 'demo_sign_2.php',
							data: { img_data:img_data },
							type: 'post',
							dataType: 'json',
							success: function (response) {
							   alert("Signature Saved");
							   toggle_val=1;
							   $('#sign_div_hide').val(response+".png");
							   $('#sign_div').css('background-image', 'url(API/Uploads/' + response + '.png)');
							}
						});
					}
				});
			}
			});

</script>



