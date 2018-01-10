<?php
error_reporting(0);
session_start();
include_once('connect.php');

if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}


?>

<!DOCTYPE html>
<html>
<header>
  <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico"/>


  <link rel="stylesheet" href="css/bootstrap.min.css">
     <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 <!--    <script type="text/javascript" src="js/upload.js" ></script> -->
  <link rel="stylesheet" href="css/sidebar.css">
  <link rel="stylesheet" href="index_files/mbcsmbmcp.css" type="text/css" />

</header>
<body>
<div class="logo"><img src="image/logo.png" style=" overflow: hidden; height: 10.5vh; width: 5.5vw;
    padding: 0;
    position: fixed;margin-left: 2vw" onclick="home()" /></div>
   


<div class="nav_wrap" style="margin-top:-5vh; background-color:#DF5430;">
<nav id="primary_nav_wrap" >
<div class="logout"> <a href="logout.php" data-hover="Logout"><img src="image/Logout.png" height="30vh" width="65vw"> 
</a>  </div>
<div class="nav_container" style="">
  <div id="mbmcpebul_wrapper">
  <ul id="mbmcpebul_table" class="mbmcpebul_menulist css_menu">
  <li><a class="button_1" style="color:white"><img src="image/Safety.png" height="40vh" width="40vw" ><br>Safety</a>
    <ul class="gradient_menu gradient108">
    <li class="first_item"><a target="_blank" class="with_arrow" title="">Site Safety Management Plans</a>
      <ul class="gradient_menu gradient252">
      <li class="first_item"><a class="with_arrow" title="">Site Safety Management Plan</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="" href="">Blank Safety Management Plan</a></li>
        <li><a title="" href="">Approved Safety Management Plan</a></li>
        <li><a title="" href="">Safety Management Plan Register</a></li>
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
         <li><a title="" href="email_settings.php">Project First Aid Risk Assessment</a></li>
      </ul></li>

    <li><a class="with_arrow" title="">Unapproved Forms</a>
      <ul class="gradient_menu gradient288">
      <li class="first_item"><a title="" href="approved_vs_resubmitted_form.php">Unapproved & Resubmitted Site Inductions Forms</a></li>
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
        <li class="first_item"><a title="" href="site_induction_form_new.php">New Site Induction Form</a></li>
        <li><a title="" href="approved_forms.php">Approved Site Induction Form</a></li>
        <li><a title="" href="site_induction_email_request.php">Site Induction Email Request</a></li>
        <li class="last_item"><a title="">Site Induction Video</a></li>
        </ul></li>
      <li><a class="with_arrow" title="">Ceiling Induction</a>
        <ul class="gradient_menu gradient252">
        <li class="first_item"><a title="">Blank Ceiling Induction Form</a></li>
        <li><a title="">Approved Ceiling Induction Form</a></li>
        <!-- <li><a title="">Permit To Hotwork Register</a></li>
        <li><a title="">Permit To Enter Confined Space Register</a></li>
        <li><a title="">Permit To Enter Cold Room / Freezer Register</a></li>
        <li><a title="">Permit To penetrate Surface Register</a></li>
        <li><a title="">Permit To Access Ceiling Register</a></li>
        <li><a title="">Permit To Isolate  Services Register</a></li>
        <li><a title="">Permit To Energise Electrical Register</a></li> -->
        <li><a title="">Ceiling Induction Video</a></li>
   
        </ul></li>
      <li class="first_item"><a class="with_arrow" title="">Visitor Induction</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="" href="visitor_induction_blank.php">New Visitor Induction Form</a></li>
        <li><a title="" href="visitor_induction.php">Approved Visitor Induction Form</a></li>
        <li><a title="" href="visitor_induction_out.php">Sign Out Visitor Induction Form</a></li>
        <li class="last_item"><a title="">Visitor Induction Video</a></li>
        </ul></li>
      </ul></li>
      <li class="last_item"><a class="with_arrow" title="">Site Induction Registers</a>
      <ul class="gradient_menu gradient108">
      <li class="first_item"><a title="" href="category.php">Access Authority</a></li>

      <li><a title="" href="employer.php">Employer / Business Register</a></li>
      <li><a title="" href="consultant_register.php">Consultant Register</a></li>
      <li><a title="" href="employee.php">Site Induction Register</a></li>
      <li><a title="" href="site_location.php">Site Locations</a></li>
      <li class="last_item"><a class="with_arrow" title="">Email Settings</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title=""  href="email_settings.php">Email Setting & Email Message</a></li>
       <!--  <li class="last_item"><a title="">Email Message</a></li> -->
        </ul></li>
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
      
        <li class="first_item"><a title="" href="site_attendance_blank.php">New Site Attendance Form</a></li>
        <li><a title="" href="site_attendance_approved.php">Approved Site Attendance Form</a></li>
        <li class="last_item"><a title="" href="site_attendance_week.php">Site Attendance Register</a></li>
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
        <li class="last_item"><a class="with_arrow" title="">Safety Statistics</a>
      <ul class="gradient_menu gradient108">
     
       <!--  <li><a title="" href="pdf_php/weekly_project_pdf.php">Weekly Safety Statistics</a></li>
        <li class="last_item"><a title="" href="pdf_php/monthly_project_pdf.php">Monthly Safety Statistics</a></li> -->
        <li class="last_item"><a title="" href="safety_statistics.php">Safety Statistics Weekly & Monthly</a></li>
       
        
       
  
      
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
      <li class="last_item"><a class="with_arrow" title="">Permit to Work</a>
      <ul class="gradient_menu gradient108">
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
      <li class="last_item"><a class="with_arrow" title="">Safety Checklist</a>
      <ul class="gradient_menu gradient108">
      <li class="first_item"><a class="with_arrow" title="">Evacuation Test Checklist</a>
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



    <li><a class="button_1" style="color:white"><img src="image/Quality.png" height="40vh" width="40vw"><br>Quality</a>
<ul class="gradient_menu gradient108">
      <li class="first_item" ><a style="width: 200px"  title="" href="">Site Diary</a></li>
      <li class="first_item" ><a title="" href="photo_gallery.php">Photo Works</a></li>

        <!-- <ul class="gradient_menu gradient108">
         <li class="first_item"><a title="" href="site_instruction_blank.php">New Site Instruction Form</a></li>
        <li><a title="" href="site_instruction_approved.php">Approved Site Instruction Form</a></li>
        <li class="last_item"><a title="" href="site_instruction_register.php">Site Instruction Register</a></li>
        </ul></li>

      </li> -->
      </ul>


  </li>
    <li><a class="button_1" style="color:white"><img src="image/enviroment .png" height="40vh" width="40vw"><br>Environment</a>
<li><a class="button_1" style="color:white"><img src="image/Design.png" height="40vh" width="40vw"><br>Design</a>
<li><a class="button_1" style="color:white"><img src="image/Administration.png" height="40vh" width="40vw"><br>Administration</a>
<ul class="gradient_menu gradient108">
      <li class="first_item" ><a style="width: 200px" class="with_arrow" title="" href="">Site Instruction</a>
        <ul class="gradient_menu gradient108">
         <li class="first_item"><a title="" href="site_instruction_blank.php">New Site Instruction Form</a></li>
        <li><a title="" href="site_instruction_approved.php">Approved Site Instruction Form</a></li>
        <li class="last_item"><a title="" href="site_instruction_register.php">Site Instruction Register</a></li>
        </ul></li>

      </li>
      </ul>
 </li>

<li><a class="button_1" style="color:white"><img src="image/Sub.png" height="40vh" width="40vw"><br>Future Sub- headings</a>
  </li>
 



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



  <? include('footer.php') ?>

</body>

<style>
@font-face {
  font-family: 'Helvetica_Nue';
   src: url('fonts/helvetica-neue-5923ee0f5f95b.ttf');
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
  
   font-family: Helvetica_Nue;
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
  height: 15.4vh;
  background-color: #DF5430;
  margin-top: -2px;


}

.logout a
{
     display: block;
    text-decoration: none;
    font-size: 13px;
    line-height: 30px;
    padding: 4px 25px;
    color: white;
    text-shadow:1px 1px 1px rgba(128,125,122,1);
    font-weight:bold;color:white;
    letter-spacing:1pt;
    word-spacing:-10pt;
    text-align:left;
    font-family:Arial;
    float: right;
    /* height: 20vh; */
    margin-top: 6vh;
    background-size: 1vw;
  
}

.logout a:hover
{
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1);
transition: 0.2s ease;

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
border: 1px solid black;
float: left;
height: 100%;
right: 0;
top: 0;
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

  li:hover {
    background: #3C3C3C;
    

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

</style>

</html>


<script>
  function home()
  {
    window.location.href='header_home.php';
  }
 
</script>