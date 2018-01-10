
<?
error_reporting(0);
session_start();

include_once('connect.php');

$get_employer= $conn->query("select * from tbl_employer where project_id='".$_SESSION['admin']."' AND is_deleted=0 order by company_name asc ");

$get_employer2= $conn->query("select * from tbl_employer where project_id='".$_SESSION['admin']."' AND is_deleted=0 order by company_name asc ");

$get_consultant=$conn->query("select * from tbl_consultant where is_deleted=0 AND project_id=".$_SESSION['admin']." order by consultant_name asc");



if(isset($_POST['sub_submit']))
{
 
  $insert_sub_head_data=$conn->query("insert into drawing_sub_heading set 
                    title = '".trim(mysqli_real_escape_string($conn,$_POST['sub_head']))."',
                    project_id = '".trim(mysqli_real_escape_string($conn,$_SESSION['admin']))."',
                    created_date=NOW(),
                    modified_date=NOW()");
  if($insert_sub_head_data)
  {
     echo "<script type='text/javascript'>alert('Sub-Heading Added Successfully!')</script>";
  }
}
$get_sub_head= $conn->query("select * from drawing_sub_heading where is_deleted=0 AND project_id=".$_SESSION['admin']." order by created_date desc");
?>
<script type="text/javascript" src="js/contextMenu/contextMenu.js" ></script>
  <link rel="stylesheet" href="js/contextMenu/contextMenu.css">


<nav id="primary_nav_wrap" >
   <div class="logout"> <a href="logout.php" data-hover="Logout"><img src="image/Logout.png" style="    height: 4vh;"> 
      </a>  
   </div>
   <div class="nav_container" style="">
      <div id="mbmcpebul_wrapper">
         <ul id="mbmcpebul_table" class="mbmcpebul_menulist css_menu">
            <li>
               <a class="button_1" ><img src="image/Safety.png" style="height: 6vh;width: 6vh"><br><span class="text1">Safety</span></a>
               <ul class="gradient_menu gradient108">
                  <li class="first_item">
                     <a target="_blank" class="with_arrow" title="" >Site Safety Management Plans</a>
                     <ul class="gradient_menu gradient252">
                        <li class="first_item">
                           <a class="with_arrow" title="">Site Safety Management Plan</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title=""  href="Site_Safety_Management_Plan_iframe.php">Site Safety Management Plan</a></li>
                              <li><a title="" href="site_signing_page.php">Site Safety Management Plan Signing Page</a></li>
                              <li><a title="" href="" class="temp_color">Site Layout and Evacuation Plan</a></li>
                              <li><a title="" href="" class="temp_color">Internal Traffic Management Plan</a>
                              </li>
                           </ul>
                        </li>
                        </li>
                        <li class="sub-sub_menu"><a title="" class="temp_color"> Preliminary Risk Assessment</a></li>
                        <!--  <li class="last_item"><a class="with_arrow" title="">Site Induction Form</a>
                           <ul class="gradient_menu gradient72">
                           <li class="first_item"><a title="" href="unapproved_forms.php">Unapproved Forms</a></li>
                           <li class="last_item"><a title="" href="approved_forms.php">Approved Forms</a></li>
                           <li class="last_item"><a title="" href="resubmitted_forms.php">Resubmitted Forms</a></li>
                           <li class="last_item"><a title="" href="site_induction_form.php">New Site Induction Form</a></li>
                           </ul></li> -->
                        <li class="sub-sub_menu"><a title="" class="temp_color">Emergency Risk Assessment</a></li>
                        <li class="sub-sub_menu"><a title="" class="temp_color">Traffic Management Risk Assessment</a></li>
                        <li><a title="" class="temp_color">Project Establishment Checklist</a></li>
                        <!--   <li class="last_item"><a class="with_arrow" title="">Site Induction Register</a>
                           <ul class="gradient_menu gradient72">
                           <li class="first_item"><a title="" href="category.php">Site Admin</a></li>
                           <li class="last_item"><a title="">Induction Register</a></li>
                           
                           </ul></li> -->
                        <li><a title="" href="" class="temp_color">Project First Aid Risk Assessment</a></li>
                     </ul>
                  </li>
                  <li class="last_item">
                     <a class="with_arrow" title="" class="temp_color">Control Centre</a>
                     <ul class="gradient_menu gradient108">
                        <li class="first_item"><a title="" href="category.php">Access Authority</a></li>
                        <li><a title="" href="employer.php">Employer / Business Register</a></li>
                        <li><a title="" href="consultant_register.php">Consultant Register</a></li>
                        <!--  <li><a title="" href="employee.php">Site Induction Register</a></li> -->
                        <li><a title="" href="site_location.php">Site Locations</a></li>
                        <li class="last_item"><a class="" title=""  href="email_settings.php">Email Settings and Message</a>
                        </li>
                     </ul>
                  </li>
                  <li class="last_item">
                     <a class="with_arrow" title="" >Subbie Packs</a>
                     <ul class="gradient_menu gradient108" style="overflow-y:auto;height: 35vh;overflow-x: hidden;" id="main_parent_3">
                        <? while($row_employer=$get_employer->fetch_object()){ ?>
                        <li class="first_item"><a title="" ><?= $row_employer->company_name?></a></li>
                        <? }?>
                     </ul>
                  </li>
                  <li>
                     <a class="with_arrow" title="">Unapproved Forms</a>
                     <ul class="gradient_menu gradient288">
                        <li class="first_item"><a title="" href="approved_vs_resubmitted_form.php">Unapproved & Resubmitted Site Inductions Forms</a></li>
                        <!-- <li><a title="">Permit To Excavate</a></li>
                           <li><a title="">Permit To Hotwork</a></li>
                           <li><a title="">Permit To Enter Confined Space</a></li>
                           <li><a title="">Permit To Enter Cold Room/Freezer</a></li>
                           <li><a title="">Permit To Isolate Services</a></li>
                           <li><a title="">Permit To Penetrate Surface</a></li> -->
                        <!-- <li><a title="" href="resubmitted_forms.php">Resubmitted Site Induction Form</a></li>  -->
                        <li class="last_item"><a title="" class="temp_color" >Unapproved & Resubmitted Permits to Work </a></li>
                     </ul>
                  </li>
                  <li class="last_item">
                     <a class="with_arrow" title="">Site Inductions</a>
                     <ul class="gradient_menu gradient108">
                        <li class="first_item">
                           <a class="with_arrow" title="">Site Induction</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" href="site_induction_form_new.php">New Site Induction Form</a></li>
                              <li><a title="" href="approved_forms.php">Approved Site Induction Form</a></li>
                              <li><a title="" href="employee.php">Site Induction Register</a></li>
                              <li><a title="" href="site_induction_email_request.php">Site Induction Email Request</a></li>
                              <li class="last_item"><a title="" class="temp_color">Site Induction Video</a></li>
                           </ul>
                        </li>
                        <li>
                           <a class="with_arrow" title="" class="temp_color">Ceiling Induction</a>
                           <ul class="gradient_menu gradient252">
                              <li class="first_item"><a title="" href="" class="temp_color">Blank Ceiling Induction Form</a></li>
                              <li><a title="" class="temp_color">Approved Ceiling Induction Form</a></li>
                              <!-- <li><a title="">Permit To Hotwork Register</a></li>
                                 <li><a title="">Permit To Enter Confined Space Register</a></li>
                                 <li><a title="">Permit To Enter Cold Room / Freezer Register</a></li>
                                 <li><a title="">Permit To penetrate Surface Register</a></li>
                                 <li><a title="">Permit To Access Ceiling Register</a></li>
                                 <li><a title="">Permit To Isolate  Services Register</a></li>
                                 <li><a title="">Permit To Energise Electrical Register</a></li> -->
                              <li><a title="" class="temp_color">Ceiling Induction Register</a></li>
                              <li><a title="" class="temp_color">Ceiling Induction Video</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow" title="">Visitor Induction</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" href="visitor_induction_blank.php">New Visitor Induction Form</a></li>
                              <li><a title="" href="visitor_induction.php">Approved Visitor Induction Form</a></li>
                              <li><a title="" href="visitor_induction_out.php">Sign Out Visitor Induction Form</a></li>
                              <li><a title="" href="visitor_induction_register.php">Visitor Induction Register</a></li>
                              <!-- <li class="last_item"><a title="">Visitor Induction Video</a></li> -->
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Driver Induction</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" href="" class="temp_color">New Driver Induction Form</a></li>
                              <li><a title="" href="" class="temp_color">Approved Driver Induction Form</a></li>
                              <li><a title="" href="" class="temp_color">Driver Induction Register</a></li>
                           </ul>
                        </li>
                     </ul>
                  </li>
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
                  <li class="last_item">
                     <a class="with_arrow" title="">Site Attendance</a>
                     <ul class="gradient_menu gradient108">
                        <li class="first_item"><a title="" href="site_attendance_blank.php">New Site Attendance Form</a></li>
                        <li><a title="" href="site_attendance_approved.php">Approved Site Attendance Form</a></li>
                        <li class="last_item"><a title="" href="site_attendance_week.php">Site Attendance Register</a></li>
                     </ul>
                  </li>
                  <li class="last_item">
                     <a class="with_arrow temp_color" title="">Permit to Work</a>
                     <ul class="gradient_menu gradient"  style="overflow-y:auto;height: 35vh;overflow-x: hidden;" id="main_parent_2">
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Permit to Work Authorisation</a>
                           <ul class="gradient_menu gradient108">
                              <li><a class="first_item temp_color" title=""   >New Permit to Work Authorisation</a></li>
                              <li><a title=""  class="temp_color" >Approved Permit to Work Authorisation</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Permit to Work Authorisation Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Permit to Excavate</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item" ><a title="" class="temp_color">New Permit to Excavate</a></li>
                              <li><a title="" class="temp_color" >Approved Permit to Excavate</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Permit to Excavate Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Permit to Hot Work</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >New Permit to Hot Work</a></li>
                              <li><a title="" class="temp_color" >Approved Permit to Hot Work</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Permit to Hot Work Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Permit to Enter Confined Space</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >New Permit to Enter Confined Space</a></li>
                              <li><a title="" class="temp_color" >Approved Permit to Enter Confined Space</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Permit to Enter Confined Space Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Permit to Enter Cold Room / Freezer</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >New Permit to Enter Cold Room / Freezer</a></li>
                              <li><a title="" class="temp_color" >Approved Permit to Enter Cold Room / Freezer</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Permit to Enter Cold Room / Freezer</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Permit to Penetrate Surface</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >New Permit to Penetrate Surface</a></li>
                              <li><a title="" class="temp_color" >Approved Permit to Penetrate Surface</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Permit to Penetrate Surface Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Permit to Access Ceiling</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >New Permit to Access Ceiling</a></li>
                              <li><a title="" class="temp_color" >Approved Permit to Access Ceiling</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Permit to Access Ceiling Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Permit to Isolate Services</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >New Permit to Access Ceiling</a></li>
                              <li><a title="" class="temp_color" >Approved Permit to Access Ceiling</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Permit to Access Ceiling Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Permit to Energise Electrical</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >Blank Permit to Energise Electrical</a></li>
                              <li><a title="" class="temp_color" >Approved Permit to Energise Electrical</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Permit to Energise Electrical Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Permit to Energise Services</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >New Permit to Energise Services</a></li>
                              <li><a title="" class="temp_color" >Approved Permit to Energise Services</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Permit to Energise Services Register</a></li>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <li>
                     <a style=""  title="" href="#" class="temp_color">Tool Box Talks</a>
                     <ul class="gradient_menu gradient108">
                        <li ><a style=""  title="" href="#" class="temp_color" >New Tool Box Talks</a>
                        <li ><a style=""  title="" href="#" class="temp_color" >Approved Tool Box Talks</a>
                        <li ><a style=""  title="" href="#" class="temp_color" >Tool Box Talks Register</a>
                     </ul>
                  </li>
                  <li class="last_item">
                     <a class="with_arrow temp_color" title="">Safety Meetings</a>
                     <ul class="gradient_menu gradient108">
                        <li class="first_item">
                           <a class="with_arrow temp_color"  title="">OH&S Committee Constitution</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color">New OH&S Committee Constitution </a></li>
                              <li class="first_item"><a title="" class="temp_color">Approved OH&S Committee Constitution </a></li>
                              <li class="first_item"><a title="" class="temp_color">OH&S Committee Constitution Register </a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">OH&S Safety Committee</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color">New OH&S Safety Committee Minutes & Site OH&S Inspection Form</a></li>
                              <li class="first_item"><a title="" class="temp_color">Approved OH&S Safety Committee Minutes & Site OH&S Inspection Form</a></li>
                              <li class="first_item"><a title="" class="temp_color">OH&S Safety Committee Minutes Register</a></li>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <li class="last_item">
                     <a class="with_arrow temp_color" title="" style="">Weekly Checklist</a>
                     <!-- <div class="" style="position: absolute;display: none;z-index: 10;top: 20px;left: 30px"> -->
                     <ul class="gradient_menu gradient108" style="overflow-y:auto;height: 35vh;overflow-x: hidden;" id="main_parent_4">
                        <li class="first_item">
                           <a class="temp_color" title="" >Weekly Inspection Checklist</a>
                        </li>
                        <li class="first_item">
                           <a class="temp_color" title="" >Hoist Daily Checklist</a>
                        </li>
                        <li class="first_item">
                           <a class="temp_color" title="" >Precast Panel Erection Sign Off</a>
                        </li>
                        <li class="first_item">
                           <a class="temp_color" title="" >Pre Roof Access Checklist</a>
                        </li>
                        <li class="first_item">
                           <a class="temp_color" title="" >Daily Roof Sign Off</a>
                        </li>
                        <li class="first_item">
                           <a class="temp_color" title="" >Structural Steel Erection Daily Sign Off</a>
                        </li>
                        <li class="first_item">
                           <a class="temp_color" title="" >Crane Lift Plan</a>
                        </li>
                        <li class="last_item">
                           <a class="temp_color" title="" >Noise Hazard Identification Checklist</a>
                        </li>
                     </ul>
                     <!-- </div> -->
                  </li>
                  <li class="last_item">
                     <a class="with_arrow temp_color" title="">Safety Checklist</a>
                     <ul class="gradient_menu gradient108" style="overflow-y:auto;height: 35vh;overflow-x: hidden;" id="main_parent">
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Evacuation Test Checklist</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item "><a title="" class="temp_color" >New Evacuation Test Checklist </a></li>
                              <li><a title="" class="temp_color">Approved Evacuation Test Checklist</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Evacuation Test Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Nurse Call Inspection Checklist</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color">Blank Nurse Call Inspection Checklist</a></li>
                              <li><a title="" class="temp_color">Approved  Nurse Call Inspection Checklist </a></li>
                              <li class="last_item"><a title="" class="temp_color">Nurse Call Inspection Checklist Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Air Conditioning Checklist</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >New Air Conditioning Checklist</a></li>
                              <li><a title="" class="temp_color" >Approved Air Conditioning Checklist </a></li>
                              <li class="last_item"><a title="" class="temp_color" >Air Conditioning Checklist Register </a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Fire Protection Checklist</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >New Fire Protection Checklist</a></li>
                              <li><a title="" class="temp_color" >Approved Fire Protection Checklist</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Fire Protection Checklist Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Spill Kit General Purpose Checklist</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >New Spill Kit General Purpose Checklist</a></li>
                              <li><a title="" class="temp_color" >Approved Spill Kit General Purpose Checklist</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Spill Kit General Purpose Checklist Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Site Security Checklist</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >New Site Security Checklist</a></li>
                              <li><a title="" class="temp_color">Approved Site Security Checklist</a></li>
                              <li class="last_item"><a title="" class="temp_color">Site Security Checklist Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">First Aid Checklist</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >Blank First Aid Checklist</a></li>
                              <li><a title="" class="temp_color" >Approved First Aid Checklist</a></li>
                              <li class="last_item"><a title="" class="temp_color" >First Aid Checklist Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Scaffold Inspection Checklist</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >New Scaffold Inspection Checklist</a></li>
                              <li><a title="" class="temp_color" >Approved Scaffold Inspection Checklist</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Scaffold Inspection Checklist Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color"  title="">Hoist Inspection Checklist</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >New Hoist Inspection Checklist</a></li>
                              <li><a title="" class="temp_color" >Approved Hoist Inspection Checklist</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Hoist Inspection Checklist Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Roof Access Checklist</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >New Roof Access Checklist</a></li>
                              <li><a title="" class="temp_color" >Approved Roof Access Checklist</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Roof Access Checklist Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Noise Hazard Identification Checklist</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >New Noise Hazard Identification Checklist</a></li>
                              <li><a title="" class="temp_color" >Approved Noise Hazard Identification Checklist</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Noise Hazard Identification Checklist Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Roof Sign Off Checklist</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >New Roof Sign Off Checklist</a></li>
                              <li><a title="" class="temp_color" >Roof Sign Off Checklist Register</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Roof Sign Off Checklist Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Structural Steel Erection Signoff Checklist</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >Approved Structural Steel Erection Signoff Checklist</a></li>
                              <li><a title="" class="temp_color" >Structural Steel Erection Signoff Checklist register</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Structural Steel Erection Signoff Checklist</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Crane Lift Plan Checklist</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item"><a title="" class="temp_color" >New Crane Lift Plan Checklist</a></li>
                              <li><a title="" class="temp_color" >Approved Crane Lift Plan Checklist</a></li>
                              <li><a title="" class="temp_color" >Crane Lift Plan Checklist Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Precast Panel Erection Sign off Checklist</a>
                           <ul class="gradient_menu gradient108">
                              <li><a title="" class="temp_color" >New Precast Panel Erection Sign off Checklist</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Approved Precast Panel Erection Sign off Checklist</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Precast Panel Erection Sign off Checklist Register</a></li>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <li class="last_item">
                     <a class="with_arrow temp_color" title="">Safety Incident</a>
                     <ul class="gradient_menu gradient108" style="overflow-y:auto;height: 30vh;overflow-x: hidden;" id="main_parent_6">
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Safety Improvement Notice</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item "><a title="" class="temp_color" >New Safety Improvement Notice</a></li>
                              <li><a title="" class="temp_color">Approved Safety Improvement Notice</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Safety Improvement Notice Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Register of Injury/ Disease </a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item "><a title="" class="temp_color" >New Register of Injury/ Disease </a></li>
                              <li><a title="" class="temp_color">Approved Register of Injury/ Disease</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Register of Injury/ Disease Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Unexpected Find</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item "><a title="" class="temp_color" >New Unexpected Find </a></li>
                              <li><a title="" class="temp_color">Approved Unexpected Find</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Unexpected Find Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Incident Report Form</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item "><a title="" class="temp_color" >New Incident Report Form</a></li>
                              <li><a title="" class="temp_color">Approved Incident Report Form</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Incident Report Form Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Major Incident & Investigation Form</a>
                           <ul class="gradient_menu gradient108">
                              <li class="first_item "><a title="" class="temp_color" >New Major Incident & Investigation Form</a></li>
                              <li><a title="" class="temp_color">Approved Major Incident & Investigation Form</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Major Incident & Investigation Form Register</a></li>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <li class="last_item">
                     <a class="with_arrow" title="">Safety Statistics</a>
                     <ul class="gradient_menu gradient108">
                        <li class="last_item"><a title="" href="safety_statistics.php">Safety Statistics Weekly & Monthly</a></li>
                     </ul>
                  </li>
                  <li class="last_item">
                     <a class="with_arrow temp_color" title="" style="">Audits & Reviews</a>
                     <!-- <div class="" style="position: absolute;display: none;z-index: 10;top: 20px;left: 30px"> -->
                     <ul class="gradient_menu gradient108" style="overflow-y:auto;height: 15vh;overflow-x: hidden;" id="main_parent_5">
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="" >Project Audit Review</a>
                           <ul class="gradient_menu gradient108" style="">
                              <li class="first_item"><a title="" class="temp_color" >New Project Audit Review</a></li>
                              <li><a title="" class="temp_color" >Approved Project Audit Review</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Project Audit Review Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Senior Management Site Visit Report</a>
                           <ul class="gradient_menu gradient108" style="">
                              <li class="first_item"><a title="" class="temp_color" >New Senior Management Site Visit Report</a></li>
                              <li><a title="" class="temp_color" >Approved  Senior Management Site Visit Report</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Senior Management Site Visit Report Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Site Manager/Supervisors Weekly Project Review</a>
                           <ul class="gradient_menu gradient108" style="">
                              <li class="first_item"><a title="" class="temp_color" >New Site Manager/Supervisors Weekly Project Review</a></li>
                              <li><a title="" class="temp_color" >Approved Site Manager/Supervisors Weekly Project Review</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Site Manager/Supervisors Weekly Project Review Register</a></li>
                           </ul>
                        </li>
                        <li class="first_item">
                           <a class="with_arrow temp_color" title="">Project Managers Monthly</a>
                           <ul class="gradient_menu gradient108" style="">
                              <li class="first_item"><a title="" class="temp_color">New Project Managers Monthly</a></li>
                              <li><a title="" class="temp_color" >Approved Project Managers Monthly</a></li>
                              <li class="last_item"><a title="" class="temp_color" >Project Managers Monthly Register</a></li>
                           </ul>
                        </li>
                     </ul>
                     <!-- </div> -->
                  </li>
                  </li>
               </ul>
            </li>
            <li>
               <a class="button_1" style="color:white"><img src="image/Group 63.png"  style="height: 6vh;width: 6vh"><br><span class="text1">Quality</span></a>
               <ul class="gradient_menu gradient108">
                  <li class="first_item" ><a style="width: 200px"  title="" href="">Quality Management Plan</a></li>
                  <!-- <li class="first_item" ><a style="width: 200px"  title="">Site Diary</a></li> -->
                  <li class="first_item" >
                     <a style="width: 200px"  title="" class="with_arrow">Site Diary</a>
                     <ul class="gradient_menu gradient108" style="">
                        <li><a title="" href="site_diary_home.php">Site Diary Calendar</a></li>
                        <li class="last_item"><a href="site_diary_approved_list.php">Approved Site Diary</a></li>
                        <li class="last_item"><a title="" href="site_diary_register.php">Site Diary Register</a></li>
                     </ul>
                  </li>
                  <li class="first_item" ><a title="" href="photo_gallery.php">Photo Works</a></li>
                  <li class="first_item" ><a style="width: 200px"  title="" href="ITP/project_list.php">Inspection and Test Plan</a>
                  <li class="first_item" >
                     <a style=""  title="" href="" class="with_arrow temp_color">Meeting Minutes</a>
                     <ul class="gradient_menu gradient108">
                        <li>
                           <a style=""  title="" href="#" class="temp_color">Site Coordination Meeting</a>
                           <ul class="gradient_menu gradient108">
                              <li ><a style=""  title="" href="#" class="temp_color" >New Site Coordination Meeting</a>
                              <li ><a style=""  title="" href="#" class="temp_color" >Approved Site Coordination Meeting</a>
                              <li ><a style=""  title="" href="#" class="temp_color" >Site Coordination Meeting Register</a>
                           </ul>
                        </li>
                        <li >
                           <a style=""  title="" href="#" class="temp_color">Project Team Meeting Minutes</a>
                           <ul class="gradient_menu gradient108">
                              <li ><a style=""  title="" href="#" class="temp_color" >New Project Team Meeting Minutes</a>
                              <li ><a style=""  title="" href="#" class="temp_color" >Approved Project Team Meeting Minutes</a>
                              <li ><a style=""  title="" href="#" class="temp_color" >Project Team Meeting Minutes Register</a>
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
            <li>
               <a class="button_1" style="color:white"><img src="image/Envi.png"  style="height: 6vh;width: 6vh"><br><span class="text1">Environmental</span>
               </a>
               <ul class="gradient_menu gradient108">
                  <li class="first_item" ><a style="" class="" title=""  href="environment_plan_iframe.php" >Environmental Management Plan</a>
                  <li class="first_item" >
                     <a style="" class="with_arrow temp_color" title="" href="">Site Environmental Control Checklist</a>
                     <ul class="gradient_menu gradient108">
                        <!-- <li class="first_item"><a title="">Site Environmental Checklist</a></li> -->
                        <li><a title="" class="temp_color" >New Site Environmental Control Checklist</a></li>
                        <li><a title="" class="temp_color" >Approved Site Environmental Control Checklist</a></li>
                        <li><a title="" class="temp_color" >Site Environmental Control Checklist Register</a></li>
                     </ul>
                  </li>
                  <li class="first_item" >
                     <a style="" class="with_arrow temp_color" title="" href="">Environmental Incident Form</a>
                     <ul class="gradient_menu gradient108">
                        <!-- <li class="first_item"><a title="">Site Environmental Checklist</a></li> -->
                        <li><a title="" class="temp_color" >New Environmental Incident Form</a></li>
                        <li><a title="" class="temp_color" >Approved Environmental Incident Form</a></li>
                        <li><a title="" class="temp_color" >Environmental Incident Form Register</a></li>
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
            <li>
               <a class="button_1" style="color:white"><img src="image/Group 64.png"  style="height: 6vh;width: 6vh"><br><span class="text1">Design</span></a>
               <ul class="gradient_menu gradient108">
                  <li class="first_item" ><a style="width: 200px" class="" title="" href="design_management_plan_iframe.php">Design Management Plan</a>
                  <li>
                     <a style=""  title="" href="#" class="temp_color">Design Meeting Minutes</a>
                     <ul class="gradient_menu gradient108">
                        <li ><a style=""  title="" href="#" class="temp_color" >New Design Meeting Minutes</a>
                        <li ><a style=""  title="" href="#" class="temp_color" >Approved Design Meeting Minutes</a>
                        <li ><a style=""  title="" href="#" class="temp_color" >Design Meeting Minutes Register</a>
                     </ul>
                  </li>

                  <li>
                     <a style=""  title="" href="#" class="temp_color testButton">Design Drawing & Specifications <!-- <button type="button" class="btn btn-default btn-xs " data-toggle="modal" data-target="#myModal2">Add</button> --></a>



                    <ul class="gradient_menu gradient108" style="overflow-y:auto;height: 35vh;overflow-x: hidden;">
                        <? while($row_sub_head=$get_sub_head->fetch_object()){ ?>
                        
                        <li class="first_item" >
                        <div style="width: 250px" >
                        <div style="width: 200px; word-wrap: break-word;float: left" id="sub_head_hover">

                          <a row_id="<?=$row_sub_head->id ?>" class="testButton2" title="" ><?= $row_sub_head->title?></a>

                          

                        </div> 

                        <div style="width:50px;float: right;">
                          <!-- <button type="button" id="<?=$row_sub_head->id ?>" class="btn btn-default btn-xs del_btn" style="float: right;margin-top: 5px;outline: none;display: none;" onclick="delete_sub_head(<?=$row_sub_head->id ?>);">Delete</button>
 -->
                        </div>
                        </div>

                        </li>
                        <? }?>
                     </ul>

                  </li>

                  </li>
               </ul>
            </li>
            <li>
               <a class="button_1" style="color:white"><img src="image/Administration.png"  style="height: 6vh;width: 6vh"><br><span class="text1">Contracts Admin</span></a>
               <ul class="gradient_menu gradient108">
                  <li class="first_item" ><a style="" class="temp_color" title="" href="">Contracts Administration Management Plan</a></li>
                  

                  <li class="last_item">
                     <a class="with_arrow" title="" >Subcontract Agreements</a>
                     <ul class="gradient_menu gradient108" style="overflow-y:auto;height: 35vh;overflow-x: hidden;">
                        <? while($row_employer2=$get_employer2->fetch_object()){ ?>
                        <li class="first_item"><a title="" ><?= $row_employer2->company_name?></a></li>
                        <? }?>
                     </ul>
                  </li>

                  <li class="last_item">
                     <a class="with_arrow" title="" >Consultant Agreements</a>
                     <ul class="gradient_menu gradient108" style="overflow-y:auto;overflow-x: hidden;">
                        <? while($row_consultant=$get_consultant->fetch_object()){ ?>
                        <li class="first_item"><a title="" ><?= $row_consultant->consultant_name?></a></li>
                        <? }?>
                     </ul>
                  </li>


                  <li class="first_item" >
                     <a class="with_arrow" title="" href="">Site Instruction</a>
                     <ul class="gradient_menu gradient108">
                        <li class="first_item"><a title="" href="site_instruction_blank.php">New Site Instruction Form</a></li>
                        <li><a title="" href="site_instruction_approved.php">Approved Site Instruction Form</a></li>
                        <li><a title="" href="site_instruction_saved.php">Saved Site Instruction Form</a></li>
                        <li class="last_item"><a title="" href="site_instruction_register.php">Site Instruction Register</a></li>
                     </ul>
                  </li>
                  <li class="first_item" >
                     <a class="with_arrow temp_color" title="" >Back Charge</a>
                     <ul class="gradient_menu gradient108">
                        <li class="first_item"><a title="" class="temp_color" >New Back Charge Form</a></li>
                        <li><a title="" class="temp_color" >Approved Back Charge Form</a></li>
                        <li><a title="" class="temp_color"  >Saved Back Charge Form</a></li>
                        <li class="last_item"><a title=""  class="temp_color" >Back Charge Register</a></li>
                     </ul>
                  </li>
                  </li>
               </ul>
            </li>
            <li>
               <a class="button_1" style="color:white"><img src="image/Group 66.png"  style="height: 6vh;width: 6vh"><br><span class="text1">Future-Sub headings</span></a>
               <!-- <ul class="gradient_menu gradient108">
                  <li class="first_item" ><a style="width: 200px"  title="" href="ITP/project_list.php">ITP Project</a>
                    </li>
                  
                  </li>
                  </ul>
                  -->  
            </li>
         </ul>
         </ul>
         </ul>
      </div>
   </div>
</nav>
<ul class='custom-menu'>
                            <li data-action="first">Delete</li>
                          </ul>


<style type="text/css">
  /* CSS3 */

/* The whole thing */
.custom-menu {
    display: none;
    z-index: 99999;
    position: absolute;
    overflow: hidden;
    border: 1px solid #CCC;
    white-space: nowrap;
    font-family: sans-serif;
    background: #FFF;
    color: #333;
    border-radius: 5px;
    padding: 0;
}

/* Each of the items in the list */
.custom-menu li {
    padding: 8px 12px;
    cursor: pointer;
    list-style-type: none;
    transition: all .3s ease;
    user-select: none;
}

.custom-menu li:hover {
    background-color: #DEF;
}

</style>

<script type="text/javascript">
  // Trigger action when the contexmenu is about to be shown
$('.testButton2').bind("contextmenu", function (event) {
    
    // Avoid the real one
    event.preventDefault();
    $('.custom-menu li').attr('data-action',$(this).attr('row_id'));
    // Show contextmenu
    $(".custom-menu").finish().toggle(100).
    
    // In the right position (the mouse)
    css({
        top: event.pageY + "px",
        left: event.pageX + "px"
    });
});


// If the document is clicked somewhere
$(document).bind("mousedown", function (e) {
    
    // If the clicked element is not the menu
    if (!$(e.target).parents(".custom-menu").length > 0) {
        
        // Hide it
        $(".custom-menu").hide(100);
    }
});


// If the menu element is clicked
$(".custom-menu li").click(function(){
    
  
       delete_sub_head($(this).attr("data-action")) ; 

  
  
    $(".custom-menu").hide(100);
  });
</script>

<div id="myModal2" class="modal fade" role="dialog">
                         <div class="modal-dialog">
                                    <div class="modal-content">
                                               <div class="modal-header">
                                                     <button type="button" class="close" data-dismiss="modal">×</button>
                                                     <h4 class="modal-title">New Sub -Heading Details</h4>
                                               </div>
                                               <div class="modal-body">
                                                     <form method="POST" id="sub_head_form" onsubmit="return validate_sub()" autocomplete="off">
                  <div class="form-group">
                  <input class="form-control" type="text" name="sub_head" id="sub_head" placeholder="Enter Sub Heading title" style="border-radius:10vh;outline: none;border:none;box-shadow: none;background: rgb(228, 228, 228) !important">
                  <div id="errormsg" style="font-weight: 100;font-size: 1.7vh;color: red"></div>
                  <span></span>
                  </div>
                  <div class="form-group text-center">

                <input class="btn btn-info btn-sm" type="submit" name="sub_submit" id="sub_submit" value="Submit Heading" onclick="" style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none">
                  </div>  
                  </form>
                                               </div>
                                               <div class="modal-footer">
                                                     <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                                               </div>
                                    </div>

                        </div>
                        </div>


                        <script type="text/javascript">
                           $(document).on('show.bs.modal', '.modal', function (event) {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
            $(this).css('z-index', zIndex);
            setTimeout(function() {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);
        });
                        </script>
<script>
  function handler(ev) {
    // $(target).prevAll().toggle();
     var target = $(ev.target);
     // var previous_li=$('ul').find("ul.gradient_menu gradient108").css('position', 'initial');
     // $(previous_li).css({'position':'absolute'});


    if (target.next().css('position') == 'absolute')
{
    target.next().css({'position':'initial','opacity':'1'});

  }
  else
  {
    target.next().css({'position':'absolute','opacity':'0'});
  }
   
   
  $('#main_parent_2 > li > ul').not(target.next()).css({'position':'absolute'});
   $('#main_parent > li > ul').not(target.next()).css({'position':'absolute'});
    $('#main_parent_3 > li > ul').not(target.next()).css({'position':'absolute'});
        $('#main_parent_4 > li > ul').not(target.next()).css({'position':'absolute'});
            $('#main_parent_5 > li > ul').not(target.next()).css({'position':'absolute'});
              $('#main_parent_6 > li > ul').not(target.next()).css({'position':'absolute'});
   
}

function handler_leave(ev) {
    var target = $(ev.target);
    target.next().css('position','absolute');

}


$("#main_parent > li").click(handler);

// $("#main_parent_2 > li").mouseleave(handler_leave);

$("#main_parent > li >ul").mouseleave(function(){
  
  // if($(this).children('li').is(':last-child'))
  // {
  // $(this).css('position','absolute');
  // handler();
  // alert("ok");
  $(this).css('opacity','1');
}



);

$('#main_parent > li > ul > li').css('background-color','#fff'); 
$('#main_parent > li > ul > li > a').css('color','#000'); 
$('#main_parent > li > ul > li').css('padding-left',20+'px');
$('#main_parent > li > ul > li').mouseover(function(){
  
$(this).css('background-color','#A5ADAD'); 

  });

$('#main_parent > li > ul > li').mouseleave(function(){
  
$(this).css('background-color','#fff'); 
$('#main_parent > li > ul > li > a').css('color','#000'); 
  });

 



$("#main_parent_2 > li").click(handler);

// $("#main_parent_2 > li").mouseleave(handler_leave);

$("#main_parent_2 > li >ul").mouseleave(function(){
  
  // if($(this).children('li').is(':last-child'))
  // {
  // $(this).css('position','absolute');
  // handler();
  // alert("ok");
  $(this).css('opacity','1');
}



);

$('#main_parent_2 > li > ul > li').css('background-color','#fff'); 
$('#main_parent_2 > li > ul > li > a').css('color','#000'); 
$('#main_parent_2 > li > ul > li').css('padding-left',20+'px');
$('#main_parent_2 > li > ul > li').mouseover(function(){
  
$(this).css('background-color','#A5ADAD'); 

  });

$('#main_parent_2 > li > ul > li').mouseleave(function(){
  
$(this).css('background-color','#fff'); 
$('#main_parent_2 > li > ul > li > a').css('color','#000'); 
  });



$("#main_parent_3 > li").click(handler);

$("#main_parent_3 > li >ul").mouseleave(function(){
  

  $(this).css('opacity','1');
}



);



$('#main_parent_3 > li > ul > li').css('background-color','#fff'); 
$('#main_parent_3 > li > ul > li > a').css('color','#000'); 
$('#main_parent_3 > li > ul > li').css('padding-left',20+'px');
$('#main_parent_3 > li > ul > li').mouseover(function(){
  
$(this).css('background-color','#A5ADAD'); 

  });

$('#main_parent_3 > li > ul > li').mouseleave(function(){
  
$(this).css('background-color','#fff'); 
$('#main_parent_3 > li > ul > li > a').css('color','#000'); 
  });



$("#main_parent_4 > li").click(handler);

$("#main_parent_4 > li >ul").mouseleave(function(){
  

  $(this).css('opacity','1');
}



);



$('#main_parent_4 > li > ul > li').css('background-color','#fff'); 
$('#main_parent_4 > li > ul > li > a').css('color','#000'); 
$('#main_parent_4 > li > ul > li').css('padding-left',20+'px');
$('#main_parent_4 > li > ul > li').mouseover(function(){
  
$(this).css('background-color','#A5ADAD'); 

  });

$('#main_parent_4 > li > ul > li').mouseleave(function(){
  
$(this).css('background-color','#fff'); 
$('#main_parent_4 > li > ul > li > a').css('color','#000'); 
  });


$("#main_parent_5 > li").click(handler);

$("#main_parent_5 > li >ul").mouseleave(function(){
  

  $(this).css('opacity','1');
}



);



$('#main_parent_5 > li > ul > li').css('background-color','#fff'); 
$('#main_parent_5 > li > ul > li > a').css('color','#000'); 
$('#main_parent_5 > li > ul > li').css('padding-left',20+'px');
$('#main_parent_5 > li > ul > li').mouseover(function(){
  
$(this).css('background-color','#A5ADAD'); 

  });

$('#main_parent_5 > li > ul > li').mouseleave(function(){
  
$(this).css('background-color','#fff'); 
$('#main_parent_5 > li > ul > li > a').css('color','#000'); 
  });


$("#main_parent_6 > li").click(handler);

$("#main_parent_6 > li >ul").mouseleave(function(){
  

  $(this).css('opacity','1');
}



);



$('#main_parent_6 > li > ul > li').css('background-color','#fff'); 
$('#main_parent_6 > li > ul > li > a').css('color','#000'); 
$('#main_parent_6 > li > ul > li').css('padding-left',20+'px');
$('#main_parent_6 > li > ul > li').mouseover(function(){
  
$(this).css('background-color','#A5ADAD'); 

  });

$('#main_parent_6 > li > ul > li').mouseleave(function(){
  
$(this).css('background-color','#fff'); 
$('#main_parent_6 > li > ul > li > a').css('color','#000'); 
  });




function validate_sub()
{
  if($('#sub_head').val().trim() == "")
  {
    $('#errormsg').html("Please Enter The Sub Heading Title");
    return false;
  }
  else
  {
    $('#sub_head_form').submit();
  }
}

function delete_sub_head(data)
{
// alert(data);
$.ajax({
type: 'POST',
url: 'ajax_delete_sub.php',
data: {id:data},
success: function(data)
{
  if(data == "1")
  {
    alert("Sub-Heading Deleted !!");
    window.location.href='header_home.php';
  }
  else
  {
    alert("Technical Error Occured--Try Again !!");
  }
}
});
}

</script>

<style>

.temp_color
{
  color: red !important;
}
  #main_parent, #main_parent_2,#main_parent_5
}

{
  width: auto;

}

::-webkit-scrollbar {
    width: 10px;
        background: #fff;
}
#sub_head_hover:hover
{
    border-color: transparent;
    background-color: black;
    box-shadow: none;
  }
</style>


  <script type="text/javascript">
    var menu = [{
        name: 'create',
        img: 'js/contextMenu/images/add.png',
        title: 'Create new sub heading',
        fun: function () {
           event.preventDefault();
            jQuery.noConflict();
            $('#myModal2').modal('show'); 
        }
    
    }];



    // var key_obj=[{ row_id:$( this ).attr('row_id') }];
     
//Calling context menu
 $('.testButton').contextMenu(menu,{triggerOn:'click',mouseClick: 'right',top:'20%'});

  

// $('.testButton2').on('contextmenu', function(){
 
//   var id=$(this).attr('row_id');
//    console.log(id);
//    $('#'+id).show();
//     return false;
// });

//   $('.testButton2').click(function() {
//   // var id = $( this ).attr('row_id');
//   alert("ok");
// });
  </script>