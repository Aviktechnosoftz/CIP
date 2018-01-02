<?php
error_reporting(0);


include_once('connect.php');
$project_number= $conn->query("select * from tbl_project where id='".$_SESSION['admin']."'")->fetch_object();
?>

<!DOCTYPE html>
<html>
<header>
  <link rel="shortcut icon" type="image/x-icon" href="../image/favicon.ico"/>


 <link rel="stylesheet" href="css/bootstrap.min.css">
    


  <link rel="stylesheet" href="../index_files/mbcsmbmcp.css" type="text/css" />
 <link rel="stylesheet" href="../css/font-awesome.min.css">
   <link rel="stylesheet" href="../main.css" type="text/css" />
 <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0" />
   <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
</header>


<body>
<div class="logo" onclick="redirect()"></div>
<script>
  function redirect()
  {
    window.location.href="../header_home.php";
  }
</script>
   


<div class="nav_wrap" style=" background-color:#DF5430;">
<nav id="primary_nav_wrap" >
<div class="logout"> <a href="../logout.php" data-hover="Logout"><img src="../image/Logout.png" style="    height: 4vh;"> 
</a>  </div>
<div class="nav_container" style="">
  <div id="mbmcpebul_wrapper">

  <ul id="mbmcpebul_table" class="mbmcpebul_menulist css_menu">
  <li><a class="button_1" ><img src="../image/Safety.png" style="height: 6vh;width: 6vh"><br><span class="text1">Safety</span></a>
    <ul class="gradient_menu gradient108">
      <li class="first_item"><a target="_blank" class="with_arrow" title="">Site Safety Management Plans</a>
      <ul class="gradient_menu gradient252">
      <li class="first_item"><a class="with_arrow" title="">Site Safety Management Plan</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title=""  href="../Site_Safety_Management_Plan_iframe.php">Site Safety Management Plan</a></li>
        <li><a title="" href="#">Site Safety Management Plan Signing Page</a></li>
        <li><a title="" href="#">Site Layout and Evacuation Plan</a></li>
        <li><a title="" href="#">Internal Traffic Management Plan</a></li>
       
	   </ul></li>

      </li>
      <li class="sub-sub_menu"><a title="">Preliminary Risk Assessment</a></li>
     <!--  <li class="last_item"><a class="with_arrow" title="">Site Induction Form</a>
        <ul class="gradient_menu gradient72">
        <li class="first_item"><a title="" href="unapproved_forms.php">Unapproved Forms</a></li>
        <li class="last_item"><a title="" href="approved_forms.php">Approved Forms</a></li>
        <li class="last_item"><a title="" href="resubmitted_forms.php">Resubmitted Forms</a></li>
        <li class="last_item"><a title="" href="site_induction_form.php">New Site Induction Form</a></li>
        </ul></li> -->
      <li class="sub-sub_menu"><a title="">Emergency Risk Assessment</a></li>
      <li class="sub-sub_menu"><a title="">Traffic Management Risk Assessment</a></li>
      <li><a title="">Project Establishment Checklist</a></li>
    <!--   <li class="last_item"><a class="with_arrow" title="">Site Induction Register</a>
        <ul class="gradient_menu gradient72">
        <li class="first_item"><a title="" href="category.php">Site Admin</a></li>
        <li class="last_item"><a title="">Induction Register</a></li>

        </ul></li> -->
         <li><a title="" href="">Project First Aid Risk Assessment</a></li>
      </ul></li>

  

    <li><a class="with_arrow" title="">Unapproved Forms</a>
      <ul class="gradient_menu gradient288">
      <li class="first_item"><a title="" href="../approved_vs_resubmitted_form.php">Unapproved & Resubmitted Site Inductions Forms</a></li>
      <!-- <li><a title="">Permit To Excavate</a></li>
      <li><a title="">Permit To Hotwork</a></li>
      <li><a title="">Permit To Enter Confined Space</a></li>
      <li><a title="">Permit To Enter Cold Room/Freezer</a></li>
      <li><a title="">Permit To Isolate Services</a></li>
      <li><a title="">Permit To Penetrate Surface</a></li> -->
       <!-- <li><a title="" href="resubmitted_forms.php">Resubmitted Site Induction Form</a></li>  -->
      <li class="last_item"><a title="">Unapproved & Resubmitted Permits to Work </a></li>
      </ul></li>
    <li class="last_item"><a class="with_arrow" title="">Site Inductions</a>
      <ul class="gradient_menu gradient108">
      <li class="first_item"><a class="with_arrow" title="">Site Induction</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="" href="../site_induction_form_new.php">New Site Induction Form</a></li>
        <li><a title="" href="../approved_forms.php">Approved Site Induction Form</a></li>
        <li><a title="" href="../employee.php">Site Induction Register</a></li>
        <li><a title="" href="../site_induction_email_request.php">Site Induction Email Request</a></li>
        <li class="last_item"><a title="">Site Induction Video</a></li>
        </ul></li>
      <li><a class="with_arrow" title="">Ceiling Induction</a>
        <ul class="gradient_menu gradient252">
        <li class="first_item"><a title=""  href="../visitor_induction_blank_demo.php">Blank Ceiling Induction Form</a></li>
        <li><a title="">Approved Ceiling Induction Form</a></li>
        <!-- <li><a title="">Permit To Hotwork Register</a></li>
        <li><a title="">Permit To Enter Confined Space Register</a></li>
        <li><a title="">Permit To Enter Cold Room / Freezer Register</a></li>
        <li><a title="">Permit To penetrate Surface Register</a></li>
        <li><a title="">Permit To Access Ceiling Register</a></li>
        <li><a title="">Permit To Isolate  Services Register</a></li>
        <li><a title="">Permit To Energise Electrical Register</a></li> -->
        <li><a title="">Ceiling Induction Register</a></li>
		<li><a title="">Ceiling Induction Video</a></li>
   
        </ul></li>
      <li class="first_item"><a class="with_arrow" title="">Visitor Induction</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="" href="../visitor_induction_blank.php">New Visitor Induction Form</a></li>
         <li><a title="" href="../visitor_induction.php">Approved Visitor Induction Form</a></li>
         <li><a title="" href="../visitor_induction_out.php">Sign Out Visitor Induction Form</a></li>
			<li><a title="" href="#">Visitor Induction Register</a></li>
        
       <!--  <li class="last_item"><a title="">Visitor Induction Video</a></li> -->
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Driver Induction</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="" href="">New Driver Induction Form</a></li>
        <li><a title="" href="">Approved Driver Induction Form</a></li>
		<li><a title="" href="">Driver Induction Register</a></li>
        </ul></li>
      </ul></li>
      <li class="last_item"><a class="with_arrow" title="">Control Centre</a>
      <ul class="gradient_menu gradient108">
      <li class="first_item"><a title="" href="../category.php">Access Authority</a></li>

      <li><a title="" href="../employer.php">Employer / Business Register</a></li>
      <li><a title="" href="../consultant_register.php">Consultant Register</a></li>
    <!--   <li><a title="" href="../employee.php">Site Induction Register</a></li> -->
      <li><a title="" href="../site_location.php">Site Locations</a></li>
      <li class="last_item"><a class="" title=""  href="../email_settings.php">Email Settings and Message</a>
        
      </li>
    
      </ul></li>
     <!--  <li class="last_item"><a class="with_arrow" title="">Site Daily Diary</a>
      <ul class="gradient_menu gradient108">
      <li class="first_item"><a class="with_arrow" title="">Site Daily Diary</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Site Daily Diary</a></li>
        <li><a title="">Approved Daily Site Diary</a></li>
        <li class="last_item"><a title="">Site Daily Diary Register</a></li>
        </ul></li>
      <li><a class="with_arrow" title="">Permit To Work Register</a>
        <ul class="gradient_menu gradient252">
        <li class="first_item"><a title="">Permit to work Authorisation Register</a></li>
        <li><a title="">Permit To Excavate Register</a></li>
        <li><a title="">Permit To Hotwork Register</a></li>
        <li><a title="">Permit To Enter Confined Space Register</a></li>
        <li><a title="">Permit To Enter Cold Room / Freezer Register</a></li>
        <li><a title="">Permit To penetrate Surface Register</a></li>
        <li><a title="">Permit To Access Ceiling Register</a></li>
        <li><a title="">Permit To Isolate  Services Register</a></li>
        <li><a title="">Permit To Energise Electrical Register</a></li>
        <li><a title="">Permit To Energise Service Register</a></li>
   
        </ul></li>
      <!-- <li class="last_item"><a title="">Other Register (Still to come)</a></li> -->
      <!-- </ul></li> --> -->
      <li class="last_item"><a class="with_arrow" title="">Site Attendance</a>
      <ul class="gradient_menu gradient108">
      
        <li class="first_item"><a title="" href="../site_attendance_blank.php">New Site Attendance Form</a></li>
        <li><a title="" href="../site_attendance_approved.php">Approved Site Attendance Form</a></li>
        <li class="last_item"><a title="" href="../site_attendance_week.php">Site Attendance Register</a></li>
        <!-- <li class="last_item"><a title="" href="photo_gallery.php">Photo Works</a></li> -->
       
<!--       <li><a class="with_arrow" title="">Permit To Work Register</a>
        <ul class="gradient_menu gradient252">
        <li class="first_item"><a title="">Permit to work Authorisation Register</a></li>
        <li><a title="">Permit To Excavate Register</a></li>
        <li><a title="">Permit To Hotwork Register</a></li>
        <li><a title="">Permit To Enter Confined Space Register</a></li>
        <li><a title="">Permit To Enter Cold Room / Freezer Register</a></li>
        <li><a title="">Permit To penetrate Surface Register</a></li>
        <li><a title="">Permit To Access Ceiling Register</a></li>
        <li><a title="">Permit To Isolate  Services Register</a></li>
        <li><a title="">Permit To Energise Electrical Register</a></li>
        <li><a title="">Permit To Energise Service Register</a></li>
   
        </ul></li>
      <li class="last_item"><a title="">Other Register (Still to come)</a></li> -->
      </ul></li>
            <li class="last_item"><a class="with_arrow" title="">Permit to Work</a>
      <ul class="gradient_menu gradient108"  style="overflow-y:auto;height: 35vh;overflow-x: hidden;" id="main_parent_2">
      <li class="first_item"><a class="with_arrow" title="">Permit to Work Authorisation</a>
        <ul class="gradient_menu gradient108">
        <li><a class="first_item" title="" >New Permit to Work Authorisation</a></li>
        <li><a title="">Approved Permit to Work Authorisation</a></li>
        <li class="last_item"><a title="">Permit to Work Authorisation Register</a></li>
        </ul></li>
         <li class="first_item"><a class="with_arrow" title="">Permit to Excavate</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item" ><a title="">New Permit to Excavate</a></li>
        <li><a title="">Approved Permit to Excavate</a></li>
        <li class="last_item"><a title="">Permit to Excavate Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Permit to Hot Work</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New Permit to Hot Work</a></li>
        <li><a title="">Approved Permit to Hot Work</a></li>
        <li class="last_item"><a title="">Permit to Hot Work Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Permit to Enter Confined Space</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New Permit to Enter Confined Space</a></li>
        <li><a title="">Approved Permit to Enter Confined Space</a></li>
        <li class="last_item"><a title="">Permit to Enter Confined Space Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Permit to Enter Cold Room / Freezer</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New Permit to Enter Cold Room / Freezer</a></li>
        <li><a title="">Approved Permit to Enter Cold Room / Freezer</a></li>
        <li class="last_item"><a title="">Permit to Enter Cold Room / Freezer</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Permit to Penetrate Surface</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New Permit to Penetrate Surface</a></li>
        <li><a title="">Approved Permit to Penetrate Surface</a></li>
        <li class="last_item"><a title="">Permit to Penetrate Surface Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Permit to Access Ceiling</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New Permit to Access Ceiling</a></li>
        <li><a title="">Approved Permit to Access Ceiling</a></li>
        <li class="last_item"><a title="">Permit to Access Ceiling Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Permit to Isolate Services</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New Permit to Access Ceiling</a></li>
        <li><a title="">Approved Permit to Access Ceiling</a></li>
        <li class="last_item"><a title="">Permit to Access Ceiling Register</a></li>
        </ul></li>
          <li class="first_item"><a class="with_arrow" title="">Permit to Energise Electrical</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Permit to Energise Electrical</a></li>
        <li><a title="">Approved Permit to Energise Electrical</a></li>
        <li class="last_item"><a title="">Permit to Energise Electrical Register</a></li>
        </ul></li>
          <li class="first_item"><a class="with_arrow" title="">Permit to Energise Services</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New Permit to Energise Services</a></li>
        <li><a title="">Approved Permit to Energise Services</a></li>
        <li class="last_item"><a title="">Permit to Energise Services Register</a></li>
        </ul></li>
      </ul></li>

      <li class="last_item"><a class="with_arrow" title="">Safety Statistics</a>
      <ul class="gradient_menu gradient108">
     
       <!--  <li><a title="" href="pdf_php/weekly_project_pdf.php">Weekly Safety Statistics</a></li>
        <li class="last_item"><a title="" href="pdf_php/monthly_project_pdf.php">Monthly Safety Statistics</a></li> -->
        <li class="last_item"><a title="" href="../safety_statistics.php">Safety Statistics Weekly & Monthly</a></li>
       
        
       
  
      
      </ul></li>
        
      

       <li class="last_item"><a class="with_arrow" title="">Safety Meetings</a>
      <ul class="gradient_menu gradient108">
     
        <li class="first_item"><a class="with_arrow" title="">OH&S Committee Constitution</a>
         <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New OH&S Committee Constitution </a></li>
        <li class="first_item"><a title="">Approved OH&S Committee Constitution </a></li>
        <li class="first_item"><a title="">OH&S Committee Constitution Register </a></li>
          </ul>
        </li>
        <li class="first_item"><a class="with_arrow" title="">OH&S Safety Committee</a>
         <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New OH&S Safety Committee Minutes & Site OH&S Inspection Form</a></li>
        <li class="first_item"><a title="">Approved OH&S Safety Committee Minutes & Site OH&S Inspection Form</a></li>
        <li class="first_item"><a title="">OH&S Safety Committee Minutes Register</a></li>
          </ul>
        </li>
       
        
       
  
      
      </ul></li>
        

           <li class="last_item"><a class="with_arrow" title="">Safety Checklist</a>
        <ul class="gradient_menu gradient108" style="overflow-y:auto;height: 35vh;overflow-x: hidden;" id="main_parent">
      <li class="first_item">
	  <a class="with_arrow" title="">Evacuation Test Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New Evacuation Test Checklist </a></li>
        <li><a title="">Approved Evacuation Test Checklist</a></li>
        <li class="last_item"><a title="">Evacuation Test Register</a></li>
        </ul></li>

      <li class="first_item"><a class="with_arrow" title="">Nurse Call Inspection Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Nurse Call Inspection Checklist</a></li>
        <li><a title="">Approved  Nurse Call Inspection Checklist </a></li>
        <li class="last_item"><a title="">Nurse Call Inspection Checklist Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Air Conditioning Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New Air Conditioning Checklist</a></li>
        <li><a title="">Approved Air Conditioning Checklist </a></li>
        <li class="last_item"><a title="">Air Conditioning Checklist Register </a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Fire Protection Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New Fire Protection Checklist</a></li>
        <li><a title="">Approved Fire Protection Checklist</a></li>
        <li class="last_item"><a title="">Fire Protection Checklist Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Spill Kit General Purpose Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New Spill Kit General Purpose Checklist</a></li>
        <li><a title="">Approved Spill Kit General Purpose Checklist</a></li>
        <li class="last_item"><a title="">Spill Kit General Purpose Checklist Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Site Security Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New Site Security Checklist</a></li>
        <li><a title="">Approved Site Security Checklist</a></li>
        <li class="last_item"><a title="">Site Security Checklist Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">First Aid Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank First Aid Checklist</a></li>
        <li><a title="">Approved First Aid Checklist</a></li>
        <li class="last_item"><a title="">First Aid Checklist Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Scaffold Inspection Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New Scaffold Inspection Checklist</a></li>
        <li><a title="">Approved Scaffold Inspection Checklist</a></li>
        <li class="last_item"><a title="">Scaffold Inspection Checklist Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Hoist Inspection Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New Hoist Inspection Checklist</a></li>
        <li><a title="">Approved Hoist Inspection Checklist</a></li>
        <li class="last_item"><a title="">Hoist Inspection Checklist Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Roof Access Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New Roof Access Checklist</a></li>
        <li><a title="">Approved Roof Access Checklist</a></li>
        <li class="last_item"><a title="">Roof Access Checklist Register</a></li>
        </ul></li>
         <li class="first_item"><a class="with_arrow" title="">Noise Hazard Identification Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New Noise Hazard Identification Checklist</a></li>
        <li><a title="">Approved Noise Hazard Identification Checklist</a></li>
        <li class="last_item"><a title="">Noise Hazard Identification Checklist Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Roof Sign Off Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New Roof Sign Off Checklist</a></li>
        <li><a title="">Roof Sign Off Checklist Register</a></li>
        <li class="last_item"><a title="">Roof Sign Off Checklist Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Structural Steel Erection Signoff Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Approved Structural Steel Erection Signoff Checklist</a></li>
        <li><a title="">Structural Steel Erection Signoff Checklist register</a></li>
        <li class="last_item"><a title="">Structural Steel Erection Signoff Checklist</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Crane Lift Plan Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">New Crane Lift Plan Checklist</a></li>
        <li><a title="">Approved Crane Lift Plan Checklist</a></li>
        <li><a title="">Crane Lift Plan Checklist Register</a></li>
        
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Precast Panel Erection Sign off Checklist</a>
        <ul class="gradient_menu gradient108">
        <li><a title="">New Precast Panel Erection Sign off Checklist</a></li>
        <li class="last_item"><a title="">Approved Precast Panel Erection Sign off Checklist</a></li>
        <li class="last_item"><a title="">Precast Panel Erection Sign off Checklist Register</a></li>
        </ul></li>

      </ul></li>
     
    
    </ul>
    </li>


  <li><a class="button_1" style="color:white"><img src="../image/Group 63.png"  style="height: 6vh;width: 6vh"><br><span class="text1">Quality</span></a>
<ul class="gradient_menu gradient108">
<li class="first_item" ><a style="width: 200px"  title="" href="">Quality Management Plan</a></li>
      <li class="first_item" ><a style="width: 200px"  title="" href="../site_diary_home.php">Site Diary</a></li>
      <li class="first_item" ><a title="" href="../photo_gallery.php">Photo Works</a></li>
      <li class="first_item" ><a style="width: 200px"  title="" href="../ITP/project_list.php">Inspectiona and Test Plan</a>
     <li class="first_item" ><a style=""  title="" href="">Meeting Minutes</a>
	  <ul class="gradient_menu gradient108">
	   <li><a style=""  title="" href="#">Site Coordination Meeting</a>
		<ul class="gradient_menu gradient108">
		   <li ><a style=""  title="" href="#">New Project Team Meeting Minutes</a>
		   <li ><a style=""  title="" href="#">Approved Project Team Meeting Minutes</a>
		   <li ><a style=""  title="" href="#">Project Team Meeting Minutes Register</a>
		</ul></li>
		<li ><a style=""  title="" href="#">Project Team Meeting Minutes</a>
		<ul class="gradient_menu gradient108">
		  <li ><a style=""  title="" href="#">New Project Team Meeting Minutes</a>
		  <li ><a style=""  title="" href="#">Approved Project Team Meeting Minutes</a>
		   <li ><a style=""  title="" href="#">Project Team Meeting Minutes Register</a>
		</ul>
		</li>
	  </ul>
	  </li>



      <li class="first_item" ><a style=""  title="" href=""></a>

        <!-- <ul class="gradient_menu gradient108">
         <li class="first_item"><a title="" href="site_instruction_blank.php">New Site Instruction Form</a></li>
        <li><a title="" href="site_instruction_approved.php">Approved Site Instruction Form</a></li>
        <li class="last_item"><a title="" href="site_instruction_register.php">Site Instruction Register</a></li>
        </ul></li>

      </li> -->
      </ul>


  </li>
     
    <li><a class="button_1" style="color:white"><img src="../image/Envi.png"  style="height: 6vh;width: 6vh"><br><span class="text1">Environmental</span>
    </a>

<ul class="gradient_menu gradient108">
 <li class="first_item" ><a style="" class="" title=""  href="../environment_plan_iframe.php" >Environmental Management Plan</a>
      <li class="first_item" ><a style="" class="with_arrow" title="" href="">Site Environmental Control Checklist</a>

      <ul class="gradient_menu gradient108">
              <li class="first_item"><a title="">Site Environmental Checklist</a></li>
              <li><a title="">New Site Environmental Control Checklist</a></li>
			  <li><a title="">Approved Site Environmental Control Checklist</a></li>
			  <li><a title="">Site Environmental Control Checklist Register</a></li>

             </ul>



      </li>
      

        <!-- <ul class="gradient_menu gradient108">
         <li class="first_item"><a title="" href="site_instruction_blank.php">New Site Instruction Form</a></li>
        <li><a title="" href="site_instruction_approved.php">Approved Site Instruction Form</a></li>
        <li class="last_item"><a title="" href="site_instruction_register.php">Site Instruction Register</a></li>
        </ul></li>

      </li> -->
      </ul>


    </li>


<li><a class="button_1" style="color:white"><img src="../image/Group 64.png"  style="height: 6vh;width: 6vh"><br><span class="text1">Design</span></a>
<ul class="gradient_menu gradient108">
<li class="first_item" ><a style="width: 200px" class="" title="" href="../design_management_plan_iframe.php">Design Management Plan</a>
<li><a style=""  title="" href="#">Design Meeting Minutes</a>
		<ul class="gradient_menu gradient108">
		   <li ><a style=""  title="" href="#">New Design Meeting Minutes</a></li>
		   <li ><a style=""  title="" href="#">Approved Design Meeting Minutes</a></li>
		   <li ><a style=""  title="" href="#">Design Meeting Minutes Register</a></li>
		</ul></li>
</li>
      
</ul>
</li>


 
 
 <li><a class="button_1" style="color:white"><img src="../image/Administration.png"  style="height: 6vh;width: 6vh"><br><span class="text1">Contracts Admin</span></a>
<ul class="gradient_menu gradient108">
<li class="first_item" ><a style="" class="" title="" href="">Contracts Administration Management Plan</a></li>
      <li class="first_item" ><a class="with_arrow" title="" href="">Site Instruction</a>
        <ul class="gradient_menu gradient108">
         <li class="first_item"><a title="" href="../site_instruction_blank.php">New Site Instruction Form</a></li>
        <li><a title="" href="../site_instruction_approved.php">Approved Site Instruction Form</a></li>
        <li><a title="" href="../site_instruction_saved.php">Saved Site Instruction Form</a></li>
        <li class="last_item"><a title="" href="../site_instruction_register.php">Site Instruction Register</a></li>
        </ul></li>

      </li>
      </ul>
 </li>

<li><a class="button_1" style="color:white"><img src="../image/Group 66.png"  style="height: 6vh;width: 6vh"><br><span class="text1">Future-Sub headings</span></a>
<!-- <ul class="gradient_menu gradient108">
      <li class="first_item" ><a style="width: 200px"  title="" href="ITP/project_list.php">ITP Project</a>
        </li>

      </li>
      </ul>
 -->  </li>
 



  </ul>
  </ul>
  </ul>
</div>
  
</div>
</nav>


<!--  <form class="navbar-form" role="search" style="background-color:#DF5430;">
         <div class="input-group" id= "search_site" style="margin-top: 5vh">
            <input type="text" class="form-control" placeholder="Search" id="search2" name="q" style="margin-left: 1vw;width: 6vw">
            <div class="input-group-btn">
                <button class="btn btn-default" id="submit_search_site" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
</form> -->



</div>

<div style="background-color: red">
<div style="background: #303030;float: left; width: 27vw;  height: 8vh;"></div>
<div >
   
<span style="float: left; 

"><span style="position: absolute;z-index: 100;color: #EEEEEE;font-size: 1.6vh;
    padding-left: 1vw;
    padding-top: 2vh;
">Project No. : <?=$project_number->number?></span><img src="../image/header_new4.png" style="position: absolute;
    width: 15vw;z-index: 1;
   "> </span> 
</div>
</div>

  <? include('footer.php') ?>

</body>

<style>
@font-face {
  font-family: 'Helvetica_Nue';
   src: url('../fonts/helvetica-neue-5923ee0f5f95b.ttf');
}
@font-face {
  font-family: 'Helvetica_Nue_light';
   src: url('../fonts/helvetica-neue-light-5925314ecbd06.ttf');
}

@media (min-width: 992px)
bootstrap.css:1937
.col-md-10 {
    width: 75%;
}
  
  body {
    background-color: white;
    height: 0vh;
    margin: 0px;
    overflow-x: hidden;
  overflow:hidden;

}

    html *
{
  
   font-family: 'Avenirnext'; 
   

}




.nav_container
{
     
   /* margin-top: 1vh;*/
    margin-left: 12.5vw;
    float: left;
    margin-bottom: 1vh;
    font-size: 1.4vw;
   }

.nav_wrap
{
  
  
  
  float: left;
  width: 100%;
  height: 13.7vh;
  background-color: #DF5430;
  /*margin-top: -2px;*/


}

.button_1
{
  height: 13.4vh;

}

.logout a
{
    


display: block;
    text-decoration: none;
    font-size: 2vh;
    /* line-height: 30px; */
    padding: 2vh;
    color: white;
    text-shadow: 1px 1px 1px rgba(128,125,122,1);
    font-weight: bold;
    color: white;
    /* letter-spacing: 1pt; */
    /* word-spacing: -10pt; */
    /* text-align: left; */
    font-family: Arial;
    float: right;
    /* height: 20vh; */
    margin-top: 4vh;
    background-size: 1vw;
  
}

.logout a:hover
{
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1);
transition: 0.1s ease;

}

.effect_item:hover
{
box-shadow: 0 0 0 2px white;
transition: 0.4s ease;
}



.welcome
{   
  text-shadow:1px 1px 1px rgba(222,222,222,1);font-weight:normal;color:#255915;background-color:#EBFCA4;letter-spacing:2pt;word-spacing:6pt;font-size:15px;text-align:center;font-family:impact, sans-serif;line-height:1;
}

.logo
{

/*border: 1px solid; */*/
    float: left;
    height: 11.6vh;
    margin-left: 2vw;
    margin-top: 1vh;
    width: 11.6vh;
    position: absolute;
    background-image: url(../image/logo.png);
    background-repeat: no-repeat;
    background-size: 100% 100%;
    image-rendering:optimizeSpeed;              /* Legal fallback                 */
    image-rendering:-moz-crisp-edges;           /* Firefox                        */
    image-rendering:-o-crisp-edges;             /* Opera                          */
    image-rendering:-webkit-optimize-contrast;  /* Chrome (and eventually Safari) */
    image-rendering:crisp-edges;                /* CSS3 Proposed                  */
    -ms-interpolation-mode:bicubic;    
    cursor: pointer;

}

.sub-sub_menu
{
  background-color: white;
}

.Name
{
 padding-top: 1vw;
padding-left: 3.5vw;


  
  text-shadow:1px 1px 1px rgba(0,0,0,1);font-weight:normal;color:#F5F5F5;letter-spacing:1pt;word-spacing:2pt;font-size:27px;text-align:left;font-family:arial, helvetica, sans-serif;line-height:1;
}

#search_site
{
/*  left: 3%;*/
  margin-top: 28px;
  float: right;
}
#submit_search_site
{
    margin-left: 0.5px;
    height: 34px;
    float: right;
  }
  #mbmcpebul_wrapper {
    background-image: -webkit-linear-gradient(top, #DF5430 0%, #DF5430 100%);
  }

  #mbmcpebul_table li:hover {
    background: #3C3C3C;
  

  }
  li a img
  {
    margin-top: 2vh;
  }

 

   
#mbmcpebul_table ul.gradient_menu {

   z-index: 1;
     background-color: #505153;
    /* IE9, iOS 3.2+ */
    background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZpZXdCb3g9IjAgMCAxIDEiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxsaW5lYXJHcmFkaWVudCBpZD0idnNnZyIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIHgxPSIwJSIgeTE9IjAlIiB4Mj0iMTAwJSIgeTI9IjAlIj48c3RvcCBzdG9wLWNvbG9yPSIjMDAwMDAwIiBzdG9wLW9wYWNpdHk9IjEiIG9mZnNldD0iMC4zMjc5OTk5OTk5OTk5OTk5NiIvPjxzdG9wIHN0b3AtY29sb3I9IiNlZWYxZjUiIHN0b3Atb3BhY2l0eT0iMSIgb2Zmc2V0PSIwLjk5NiIvPjxzdG9wIHN0b3AtY29sb3I9IiNlZWYxZjUiIHN0b3Atb3BhY2l0eT0iMSIgb2Zmc2V0PSIxIi8+PHN0b3Agc3RvcC1jb2xvcj0iI2VlZjFmNSIgc3RvcC1vcGFjaXR5PSIxIiBvZmZzZXQ9IjEiLz48L2xpbmVhckdyYWRpZW50PjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InVybCgjdnNnZykiIC8+PC9zdmc+);
    background-image: -webkit-gradient(linear, 0% 0%, 100% 0%,color-stop(0.328, rgb(0, 0, 0)),color-stop(0.996, rgb(238, 241, 245)),color-stop(1, rgb(238, 241, 245)),color-stop(1, rgb(238, 241, 245)));
    /* Android 2.3 */
    background-image: -webkit-linear-gradient(left,rgb(0, 0, 0) 70.8%,rgb(238, 241, 245) 130.6%,rgb(238, 241, 245) 100%,rgb(238, 241, 245) 100%);
    /* IE10+ */
    background-image: linear-gradient(to right,rgb(2, 0, 0) 70.8%,rgb(238, 241, 245) 130.6%,rgb(238, 241, 245) 100%,rgb(238, 241, 245) 100%);
    background-image: -ms-linear-gradient(left,rgb(0, 0, 0) 70.8%,rgb(238, 241, 245) 130.6%,rgb(238, 241, 245) 100%,rgb(238, 241, 245) 100%);
}
 
/* IE8- CSS hack */
@media \0screen\,screen\9 {
    .gradient {
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff000000",endColorstr="#ffeef1f5",GradientType=1);
    }





  }

  #mbmcpebul_table ul li:hover, #mbmcpebul_table ul li.subexpanded, #mbmcpebul_table ul li.subitemhot {
    border-color: transparent;
    background-color: black;
    box-shadow: none;
}

#mbmcpebul_table.css_menu ul li:hover > ul {

   background-color: #505153;
    /* IE9, iOS 3.2+ */
    background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZpZXdCb3g9IjAgMCAxIDEiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxsaW5lYXJHcmFkaWVudCBpZD0idnNnZyIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIHgxPSIwJSIgeTE9IjAlIiB4Mj0iMTAwJSIgeTI9IjAlIj48c3RvcCBzdG9wLWNvbG9yPSIjMDAwMDAwIiBzdG9wLW9wYWNpdHk9IjEiIG9mZnNldD0iMC4zMjc5OTk5OTk5OTk5OTk5NiIvPjxzdG9wIHN0b3AtY29sb3I9IiNlZWYxZjUiIHN0b3Atb3BhY2l0eT0iMSIgb2Zmc2V0PSIwLjk5NiIvPjxzdG9wIHN0b3AtY29sb3I9IiNlZWYxZjUiIHN0b3Atb3BhY2l0eT0iMSIgb2Zmc2V0PSIxIi8+PHN0b3Agc3RvcC1jb2xvcj0iI2VlZjFmNSIgc3RvcC1vcGFjaXR5PSIxIiBvZmZzZXQ9IjEiLz48L2xpbmVhckdyYWRpZW50PjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InVybCgjdnNnZykiIC8+PC9zdmc+);
    background-image: -webkit-gradient(linear, 0% 0%, 100% 0%,color-stop(0.328, rgb(0, 0, 0)),color-stop(0.996, rgb(238, 241, 245)),color-stop(1, rgb(238, 241, 245)),color-stop(1, rgb(238, 241, 245)));
    /* Android 2.3 */
    background-image: -webkit-linear-gradient(left,rgb(0, 0, 0) 32.8%,rgb(238, 241, 245) 99.6%,rgb(238, 241, 245) 100%,rgb(238, 241, 245) 100%);
    /* IE10+ */
    background-image: linear-gradient(to right,rgb(0, 0, 0) 32.8%,rgb(238, 241, 245) 99.6%,rgb(238, 241, 245) 100%,rgb(238, 241, 245) 100%);
    background-image: -ms-linear-gradient(left,rgb(0, 0, 0) 32.8%,rgb(238, 241, 245) 99.6%,rgb(238, 241, 245) 100%,rgb(238, 241, 245) 100%);
}
 
/* IE8- CSS hack */
@media \0screen\,screen\9 {
    .gradient {
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff000000",endColorstr="#ffeef1f5",GradientType=1);
    }

  }
.main_content
{
     /*border: 1px solid grey;*/
    /*float: left;*/
   
    /* margin: -220px 0 0 -200px; */
  
   
    /*margin-left: 3vw;*/
    /*background-color: #f5f5f5;*/
 
    
    
    height: 82vh;
}

#content {
                 width: 30vw;
    height: 78vh;
    margin-top: 3vh;
    /*border: 1px solid;*/
    display: inline-block;
    float: left;
      /*background-image: url('image/notification_1.png');*/
      background-position: center;
    background-size: 30vw 79vh;
    background-repeat: no-repeat
    
}
#content2 {
       width: 38vw;
    height: 78vh;
    margin-left: 2vw;
    margin-top: 3vh;
    /*border: 1px solid;*/*/
    display: inline-block;
    float: left;
    /*margin-left: 2vw;*/
    
}

#side_1{  height: 26vh;        /*border: 1px solid;*/    /*background-image: url('image/notification_2.png');*/    background: #fff;   background-position: center;    background-size:  38vw 26vh;    background-repeat: no-repeat;}

#side_2
{

  
    margin-top: 3vh;
    padding-top: 1%;
    height: 60%;

    background-color: white;
/*  border: 1px solid;*/
    /*background-image: url('image/notification_3.png');*/
    background-position: center;
    background-size: 38vw 47vh;
    background-repeat: no-repeat;
 
}




@media (min-width: 768px) and (max-width: 1200px)
{
#content  {
    width: 40%;
        background-size: 257px 565px;
  
}

#content2  {
       width: 56%;
    margin-left: 2vw;
}
#side_2  {
       background-size: 365px 335px;
}
#side_1  {
     background-size: 365px 187px;
    
}


}

.forecast_submenu
{
  
    height: 5vh;
    width: 5vh;
    float: right;
    margin-right: 2vh;
    background-position: center;
    background-repeat: no-repeat;
    background-image: url(image/menu_icon.png);
    position: static;
    /* background-color: #00bbee; */
    /* margin-left: 20%; */
    /* margin-right: 20%; */
    margin-top: -5vh;
    /* margin-bottom: 15%; */
    /* border: 2px solid red; */
}
.temp
{
/*  border:1px solid;*/
      margin-top: 3vh;
      text-align: left;
      padding-left:  2vw;
}
.country
{
  /*border:1px solid;*/
    
      text-align: left;
      padding-left:  2vw;
}
.other_units
{
   /*border:1px solid;*/
    
      text-align: left;
      padding-left:  2vw;
}

sub, sup {
    position: relative;
    /* font-size: 75%; */
    line-height: 0;
    /* vertical-align: baseline; */
    margin-bottom: 0px;

    }
    sub
    {
             top: 0.5em;
    }
    .line-separator{

height:1px;

background:#717171;

border-bottom:1px solid #313030;

}

.text1
{
  font-size: 1.7vh;
}

#side_3
{

  
    margin-top: 3vh;
    padding-top: 1%;
    height: 51.5vh;
    background-color: white;
    background-position: center;
    background-size: 38vw 47vh;
    background-repeat: no-repeat;
 
}
.imgclass {
width: 100%;
height: 26vh;
}
::-webkit-scrollbar {
    width: 7px;
        background: #fff;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
    border-top-left-radius: 0;
     border-bottom-left-radius: 0;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    border-radius: 10px;
    border-top-left-radius: 0;
     border-bottom-left-radius: 0;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    background: #E3E1E3;
}

@font-face {
  font-family: 'Helvetica_Nue';
   src: url('../fonts/helvetica-neue-5923ee0f5f95b.ttf');
}
@font-face {
  font-family: 'Helvetica_Nue_light';
   src: url('../fonts/helvetica-neue-light-5925314ecbd06.ttf');
}

@font-face {
  font-family: 'Helvetica_Nue_thin';
   src: url('../fonts/HelveticaNeue-Thin.otf');
}
@font-face {
  font-family: 'Avenirnext';
   src: url('../fonts/AvenirNextLTPro-Regular.otf');
}
@font-face {
  font-family: 'Avenirnextbold';
   src: url('../fonts/AvenirNextLTPro-Bold.otf');
}
@font-face {
  font-family: 'Avenirnextitalic';
   src: url('../fonts/AvenirNextLTPro-It.otf');
}
@font-face {
  font-family: 'Avenirnextmedium';
   src: url('../fonts/avenir-next-lt-pro-medium-596dfa60711d1.otf');
}

</style>

</html>


<script>
  

$('#mbmcpebul_table li a').hover(
 function() {

// $(this).css('font-weight','bolder');
$('#mbmcpebul_table li .button_1').closest(this).css('color','#DF5430');
}, function(){

$(this).css('font-weight','100');
$(this).css('color','white');
// $('#mbmcpebul_table li .button_1').css('color','white');


});

function handler(ev) {
    var target = $(ev.target);
    target.next().css({'position':'initial'});
  
   
}

function handler_leave(ev) {
    var target = $(ev.target);
    target.next().css('position','absolute');

}



$("#main_parent > li").mouseover(handler);

$("#main_parent > li").mouseleave(handler_leave);

$("#main_parent > li >ul").mouseleave(function(){
  
  if($(this).children('li').is(':last-child'))
  {
  $(this).css('position','absolute');
  // alert('ok');
}
});

$('#main_parent > li > ul > li').css('background-color','#767070');
 



$("#main_parent_2 > li").mouseover(handler);

$("#main_parent_2 > li").mouseleave(handler_leave);

$("#main_parent_2 > li >ul").mouseleave(function(){
  
  
  if($(this).children('li').is(':last-child'))
  {
  $(this).css('position','absolute');
  // alert('ok');
}
});

$('#main_parent_2 > li > ul > li').css('background-color','#767070'); 




$('#mbmcpebul_table > li > ul > li').click(function() {
   // alert($(this).children('a').html());
 
   var text_menu= $(this).children('a').html();
   create_sidebar(text_menu);

});

// function create_sidebar(text_menu)
// { 
//   var url = String(window.location);
//   var redirect_url="../test_side_new.php";
//   if(url.split('/')[4] == 'ITP')
//   {
//     var redirect_url="sidebar_itp.php";
//   }

//   // var url="test_side_new.php";
//   // //  var url="../ITP/sidebar_itp.php";
//   // if(text_menu == "Inspection & Test Plan")
//   // {
//   //   var url="../ITP/sidebar_itp.php";
//   // }
  
//   $.ajax({
//                       type: "POST",
//                       url: redirect_url,
//                       data: {text1: text_menu},
//                       // dataType: 'json',

//                       success: function(data) {
                           
//                            console.log(data);
                      
//                             return false;    
//                           }
                         
                      
                      
                    
                       
//                   });
      
// }

</script>