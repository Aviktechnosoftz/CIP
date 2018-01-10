<?
error_reporting(0);
session_start();

include_once('connect.php');

$get_employer= $conn->query("select * from tbl_employer where project_id='".$_SESSION['admin']."' AND is_deleted=0 order by company_name asc ");
?>

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

      <li class="last_item"><a class="with_arrow" title="">Subbie Packs</a>
      <ul class="gradient_menu gradient108" style="overflow-y:auto;height: 35vh;" id="main_parent_3">
      <? while($row_employer=$get_employer->fetch_object()){ ?>
      <li class="first_item"><a title="" ><?= $row_employer->company_name?></a></li>
      <? }?>
      
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
			<li><a title="" href="../visitor_induction_register.php">Visitor Induction Register</a></li>
        
       <!--  <li class="last_item"><a title="">Visitor Induction Video</a></li> -->
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Driver Induction</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="" href="">New Driver Induction Form</a></li>
        <li><a title="" href="">Approved Driver Induction Form</a></li>
		<li><a title="" href="">Driver Induction Register</a></li>
        </ul></li>
      </ul></li>
      

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
    <li class="last_item"><a class="with_arrow" title="" style="">Weekly Checklist</a>
           <!-- <div class="" style="position: absolute;display: none;z-index: 10;top: 20px;left: 30px"> -->
      <ul class="gradient_menu gradient108" style="overflow-y:auto;height: 35vh;" id="main_parent_4">
      <li class="first_item">
      <a class="" title="" >Weekly Inspection Checklist</a></li>
      <li class="first_item">
      <a class="" title="" >Hoist Daily Checklist</a></li>
            <li class="first_item">
      <a class="" title="" >Precast Panel Erection Sign Off</a></li>
                  <li class="first_item">
      <a class="" title="" >Pre Roof Access Checklist</a></li>
                        <li class="first_item">
      <a class="" title="" >Daily Roof Sign Off</a></li>
       <li class="first_item">
      <a class="" title="" >Structural Steel Erection Daily Sign Off</a></li>
      <li class="first_item">
      <a class="" title="" >Crane Lift Plan</a></li>
      <li class="last_item">
      <a class="" title="" >Noise Hazard Identification Checklist</a></li>

      </ul><!-- </div> --></li>

        

           <li class="last_item"><a class="with_arrow" title="">Safety Checklist</a>
        <ul class="gradient_menu gradient108" style="overflow-y:auto;height: 25vh;overflow-x: hidden;" id="main_parent">
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
      
      <li class="last_item"><a class="with_arrow" title="">Safety Statistics</a>
      <ul class="gradient_menu gradient108">
      <li class="last_item"><a title="" href="../safety_statistics.php">Safety Statistics Weekly & Monthly</a></li>
      </ul></li>
        
    


            <li class="last_item"><a class="with_arrow" title="" style="">Audits & Reviews</a>
           <!-- <div class="" style="position: absolute;display: none;z-index: 10;top: 20px;left: 30px"> -->
      <ul class="gradient_menu gradient108" style="overflow-y:auto;height: 25vh;" id="main_parent_5">
      <li class="first_item">
      <a class="with_arrow" title="" >Project Audit Review</a>
        <ul class="gradient_menu gradient108" style="">
        <li class="first_item"><a title="">New Project Audit Review</a></li>
        <li><a title="">Approved Project Audit Review</a></li>
        <li class="last_item"><a title="">Project Audit Review Register</a></li>
        </ul>
        </li>

      <li class="first_item"><a class="with_arrow" title="">Senior Management Site Visit Report</a>
        <ul class="gradient_menu gradient108" style="">
        <li class="first_item"><a title="">New Senior Management Site Visit Report</a></li>
        <li><a title="">Approved  Senior Management Site Visit Report</a></li>
        <li class="last_item"><a title="">Senior Management Site Visit Report Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Site Manager/Supervisors Weekly Project Review</a>
        <ul class="gradient_menu gradient108" style="">
        <li class="first_item"><a title="">New Site Manager/Supervisors Weekly Project Review</a></li>
        <li><a title="">Approved Site Manager/Supervisors Weekly Project Review</a></li>
        <li class="last_item"><a title="">Site Manager/Supervisors Weekly Project Review Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Project Managers Monthly</a>
        <ul class="gradient_menu gradient108" style="">
        <li class="first_item"><a title="">New Project Managers Monthly</a></li>
        <li><a title="">Approved Project Managers Monthly</a></li>
        <li class="last_item"><a title="">Project Managers Monthly Register</a></li>
        </ul></li>
        

        

      </ul><!-- </div> --></li>
     
    
    </ul>
    </li>


  <li><a class="button_1" style="color:white"><img src="../image/Group 63.png"  style="height: 6vh;width: 6vh"><br><span class="text1">Quality</span></a>
<ul class="gradient_menu gradient108">
<li class="first_item" ><a style="width: 200px"  title="" href="">Quality Management Plan</a></li>
      <li class="first_item" ><a style="width: 200px"  title="" class="with_arrow">Site Diary</a>
        <ul class="gradient_menu gradient108" style="">
        <li><a title="" href="../site_diary_home.php">Site Diary Calendar</a></li>
        <li class="last_item"><a href="../site_diary_approved_list.php">Approved Site Diary</a></li>
        <li class="last_item"><a title="" href="">Site Diary Register</a></li>
        </ul>


      </li>
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
              <!-- <li class="first_item"><a title="">Site Environmental Checklist</a></li> -->
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
<li class="first_item" ><a style="width: 200px" class="" title="" href="">Design Management Plan</a>
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
		<li class="first_item" ><a class="with_arrow" title="" >Back Charge</a>
        <ul class="gradient_menu gradient108">
         <li class="first_item"><a title="" >New Back Charge Form</a></li>
        <li><a title="">Approved Back Charge Form</a></li>
        <li><a title="" >Saved Back Charge Form</a></li>
        <li class="last_item"><a title="" >Back Charge Register</a></li>
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

<script>
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


$("#main_parent_3 > li").mouseover(handler);

$("#main_parent_3 > li").mouseleave(handler_leave);

$("#main_parent_3 > li >ul").mouseleave(function(){
  
  if($(this).children('li').is(':last-child'))
  {
  $(this).css('position','absolute');
  // alert('ok');
}
});

$('#main_parent_3 > li > ul > li').css('background-color','#767070');

$("#main_parent_4 > li").mouseover(handler);

$("#main_parent_4 > li").mouseleave(handler_leave);

$("#main_parent_4 > li >ul").mouseleave(function(){
  
  if($(this).children('li').is(':last-child'))
  {
  $(this).css('position','absolute');
  // alert('ok');
}
});

$('#main_parent_4 > li > ul > li').css('background-color','#767070'); 

$('#main_parent_5 > li > ul > li').css('background-color','#767070'); 


$("#main_parent_5 > li").mouseover(handler);

$("#main_parent_5 > li").mouseleave(handler_leave);

$("#main_parent_5 > li >ul").mouseleave(function(){
  
  if($(this).children('li').is(':last-child'))
  {
  $(this).css('position','absolute');
  // alert('ok');
}
});

$('#main_parent_5 > li > ul > li').css('background-color','#767070');  
</script>

<style>
  #main_parent, #main_parent_2,#main_parent_5

{
  width: 30vw;

}

</style>