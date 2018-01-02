<?
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

// if($_REQUEST['date_selected'] == '')
// {
//   header("location:site_diary_home.php");
// }
$get_project_name= $conn->query("Select * from tbl_project LEFT JOIN tbl_project_detail ON tbl_project_detail.project_id=tbl_project.id where tbl_project.id='".$_SESSION['admin']."'")->fetch_object();
 $decoded_date= base64_decode($_REQUEST['date_selected']);
 $get_project_state=$conn->query("Select * from tbl_project_detail where project_id='".$_SESSION['admin']."'")->fetch_object();

$get_project_weather=$conn->query("Select * from tbl_state where id='".$get_project_state->state_id."'")->fetch_object();

 $jsonurl = "http://api.openweathermap.org/data/2.5/weather?zip=$get_project_weather->state_zip,au&appid=11ba8d385fb1ddb8d674e46946911606&units=metric";
$jsonurl2 = "http://api.openweathermap.org/data/2.5/weather?zip=$get_project_weather->state_zip,au&appid=11ba8d385fb1ddb8d674e46946911606&units=imperial";

$json = file_get_contents($jsonurl);

$json2 = file_get_contents($jsonurl2);
$weather = json_decode($json);
$weather2 = json_decode($json2);


$temp= $weather->main->temp;
$temp2= $weather2->main->temp;
$humidity=$weather->main->humidity;
$wind=$weather->wind->speed;
$temp_precipitation= $weather->weather[0]->main;




// queries

$your_date = $_REQUEST['approved_date'];

$get_visitor= $conn->query("select tbl_employee.id, tbl_employee.given_name as name,tbl_employee.pin,tbl_employee.email_add,tbl_employee.contact_phone,tbl_employer.company_name, tbl_visitor_induction.induction_no,tbl_visitor_induction.id as visit_id,tbl_visitor_induction.position,tbl_visitor_induction.today_date,tbl_visitor_induction.visitor_business,tbl_visitor_induction.visitor_name,tbl_visitor_induction.visitor_mobile,tbl_visitor_induction.visit_reason,tbl_visitor_induction.visit_in ,tbl_visitor_induction.visit_out  FROM tbl_employee JOIN tbl_visitor_induction ON tbl_employee.id = tbl_visitor_induction.induction_no JOIN tbl_induction_register ON tbl_employee.id = tbl_induction_register.id JOIN tbl_employer ON tbl_employer.id = tbl_induction_register.empid WHERE tbl_visitor_induction.project_id ='".$_SESSION['admin']."'  AND visit_out !='' AND DATE(tbl_visitor_induction.created)='".$your_date."' ORDER BY created DESC");


$get_instruction= $conn->query("select a.id,a.project_id,a.subject,a.clause,a.instructions,a.today_date,a.emp_id,a.image_1_text,a.image_2_text,a.image_3_text,a.image_4_text,a.distribution_id as distribution,a.employee_id,a.issued_by,a.req_date,a.attachments,b.company_name,b.phone_no as emp_phone,b.email_add as emp_email,c.given_name,c.surname,c.email_add from tbl_instruction a inner join tbl_employer b on a.emp_id = b.id inner join tbl_employee c on a.employee_id = c.id where a.project_id='".$_SESSION['admin']."' AND  DATE (a.created_date) = '".$your_date."'");

$get_attendance=$conn->query("select tbl_site_attendace.id,tbl_site_attendace.employees_location,tbl_site_attendace.induction_no,tbl_site_attendace.image_1,tbl_site_attendace.image_2,tbl_site_attendace.image_2,tbl_site_attendace.image_3,tbl_site_attendace.image_4,tbl_site_attendace.image_5,tbl_site_attendace.image_6,tbl_site_attendace.image_1_text,tbl_site_attendace.image_2_text,tbl_site_attendace.image_3_text,tbl_site_attendace.image_4_text,tbl_site_attendace.image_5_text,tbl_site_attendace.image_6_text,tbl_employer.*,company_name,concat(emp2.given_name, ' ',emp2.surname) as Name, if(whom != 0 , 'Web','App') as 'Type' ,tbl_site_attendace.whom, tbl_site_attendace.today_date,tbl_site_attendace.no_of_worker from tbl_site_attendace  left join tbl_employee emp1 on tbl_site_attendace.induction_no = emp1.id  left join tbl_employer on emp1.employer_id = tbl_employer.id left join tbl_employee emp2 on IF(whom = 0 ,tbl_site_attendace.induction_no = emp2.id ,tbl_site_attendace.whom = emp2.id) where DATE(tbl_site_attendace.created)='".$your_date."'  order by tbl_site_attendace.id desc");

$get_consultant=$conn->query("select * from tbl_consultant where is_deleted=0 AND project_id=".$_SESSION['admin']." AND DATE(created_date)='".$your_date."'");

$get_site_manager= $conn->query("select given_name,surname,id from tbl_employee where id='".$_SESSION['admin']."'")->fetch_object();

//GEt Diary Details

$get_diary= $conn->query("Select * from tbl_site_diary where project_id='".$_SESSION['admin']."' AND diary_date='".$your_date."'")->fetch_object();
// echo "Select * from tbl_site_diary where project_id='".$_SESSION['admin']."' AND diary_date='".$your_date."'";

// if(isset($_REQUEST['diary_update']))
// {
//   $insert_diary_details= $conn->query("update tbl_site_diary set 
                   
//                     project_id = '".$_SESSION['admin']."',
//                     diary_date='".$_REQUEST['diary_date']."',
//                     lost_time='".$_REQUEST['lost_time']."',
//                     ohs_issue='".$_REQUEST['ohs_issue']."',
//                    contractual_issue='".$_REQUEST['contractual_issue']."',
//                     general_comment='".$_REQUEST['general_comments']."',
//                     site_manager_id='".$get_site_manager->id."',
//                     site_manager_date=DATE(NOW()),
//                     site_foreman_name='".$_REQUEST['site_foreman_name']."',
                 
//                     site_foreman_date=DATE(NOW()),
//                     is_approved=1,
//                     modified_date=now() where diary_date='".$_REQUEST['diary_date']."'");



//   if($insert_diary_details)
//   {
//      ?>
    <!--  <script>
          
//                   alert("You Have Approved Submitted Site Diary");
//                   window.location.href='header_home.php';
//       </script> -->
     <?
//   }
// }


?>
<header>
 <? include('header.php'); ?>
 <? include('test_side_new.php');?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
<!--     <script src="js/jquery.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
   <link href="admin/assets/css/datepicker.css" rel="stylesheet" type="text/css"/>  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="admin/assets/js/jquery-ui-1.8.18.custom.min.js"></script>
   <script src="js/jquery.signaturepad.js"></script> 
<link href="./css/jquery.signaturepad.css" rel="stylesheet">
<script src="js/numeric-1.2.6.min.js"></script> 
    <script src="js/bezier.js"></script>
        <script src="js/json2.min.js"></script>


      <script type='text/javascript' src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js"></script>
       <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>



</header>

<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">QUALITY MANAGEMENT SYSTEM</legend>
        <label class="col-md-12 control-label form-name">SITE DIARY APPROVED FORM</label>

        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>


<div class="Main_Form2">
  <div class="col-md-12">
    <form class="well form-horizontal well_class" method="post"  id="diary_form" enctype="multipart/form-data" onsubmit="return validate()">
        <fieldset >
        <div class="form-group">
            <div class="col-md-12" style="padding-left: 0px;">
                <label class="col-md-12 control-label" style="padding-left: 0px;"><span class="project_title" style="">PROJECT :&nbsp;<? echo $get_project_name->project_name ?> </span></label>
            </div>
        </div>
                            <div class="col-sm-6" style="padding-left: 0">
                            <div class="row">
                            <div class="form-group">
                                    
                                    <label class="col-md-12 control-label label-position">Date</label>
                                     <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>  
                                    <input class="form-control" type="" name="" id="" style="width: 97%" value="<?=$your_date ?>" readonly>
                                    
                           </div>
          </div>
        </div>
        </div>

        <!-- <div class="form-group"> 
          <label class="col-md-12 control-label label-position">Date</label>
          <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>              
                <input name="city" id="date_show" placeholder="Date" class="form-control"  type="text" value="<? echo $get_query->today_date; ?>" readonly>
            </div>
          </div>
        </div> -->



                             <div class="row">
                            <div class="form-group">
                                    <div style="padding-right: 10px">
                                    <label class="col-md-12" id="text_area_label">CIP STAFF</label>
                                    <span class="staff">Project Director:</span><span class="details"><?=$get_project_name->construction_manager ?></span><br>
                                     <span class="staff">Project Manager:</span><?=$get_project_name->project_manager ?><span class="details"> </span><br>
                                     <span class="staff">Project Engineer:</span><span class="details"> <?=$get_project_name->project_engineer ?></span><br>
                                     <span class="staff">Site Manager:</span><?=$get_project_name->site_manager ?><span class="details"> </span><br>
                                     <span class="staff">Foreman:</span><span class="details"><?=$get_project_name->foreman ?></span><br>
                                     <span class="staff">National Safety Manager:</span><?=$get_project_name->safety_manager ?><span class="details"> </span><br>
                                     <span class="staff">HSR:</span><?=$get_project_name->safety_representative ?><span class="details"> </span><br>
                                     <span class="staff">Site Engineer:</span><?=$get_project_name->site_engineer ?><span class="details"> </span><br>
                                     <span class="staff">Contract Administrator:</span><span class="details"><?=$get_project_name->contract_admin ?> </span><br>
                               </div>     
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                                   <div style="padding-right: 10px"> 
                                    <label class="col-md-12" id="text_area_label">LOST TIME</label>
                                    <textarea class="lost_time" rows="5" id="comment"  name="lost_time" readonly><?php if($get_diary->lost_time) echo trim($get_diary->lost_time);?></textarea>
                                   </div> 
                            </div>
                            </div>

                            <div class="row">
                            <div class="form-group">
                                   <div style="padding-right: 10px"> 
                                    <label class="col-md-12" id="text_area_label">VISITORS</label>
                                    <table class="table table table-bordered scroll" id="visitor_table">
  <thead>
    <tr>
      <th><div style="width:15vw;">NAME/ COMPANY</div></th>
      <th><div style="width:15vw;">REASON</div></th>
    </tr>
  </thead>

  <tbody style="height: 20vh">
    <tr>
      <?
      
      while($row_visitor=$get_visitor->fetch_object()){?>
        <?$visit_name=explode("#",$row_visitor->visitor_name);
          $visitor_arr=array(); 
          $counter=1;
        foreach ($visit_name as $key => $value) {
          if($value != ",")
            // echo $value;
          // echo $counter++ ." ". $value . "<br>";
          array_push($visitor_arr,str_replace(","," ","<b>".$counter++.".</b>" ." ". $value . "<br>"));

        }

        ?>
      <th><div style="width:15vw;"><?="<b>". $row_visitor->company_name."</b><br>" .implode(" ",$visitor_arr); ?></div></th>
      <th><div style="width:15vw;"><?=$row_visitor->visit_reason ?></div></th>
    </tr>
 <? } ?>
  </tbody>
 
</table>
                                   </div> 
                            </div>
                            </div>

                            <div class="row">
                            <div class="form-group">
                                   <div style="padding-right: 10px"> 
                                    <label class="col-md-12" id="text_area_label">PLANT HIRE</label>
                                    <textarea class="plant_hire" rows="5" id="comment" name="plant_hire" ><?=$get_diary->plant_hire?></textarea>
                                   </div> 
                            </div>
                            </div>
                             

                              <div class="row">
                             <div class="form-group">
                                    <div style="padding-right: 10px">
                                    <label class="col-md-12" id="text_area_label">WORKS UNDERTAKEN/ COMPLETED</label>
                                    <div  rows="30" id="comment" name="work_completed" style="text-align: left;height: 29.2vh;line-height: 22px;overflow-y: scroll;">
                                      <?
                                        while($row_attendance=$get_attendance->fetch_object())
                                        {
                                      echo "<b>".$row_attendance->company_name."</b>" ?>&nbsp;has:&nbsp;<?echo $row_attendance->no_of_worker?>&nbsp;Men Onsite<? echo "<br>";
                                        }
                                      ?> 

                                    </div>
                                    </div>
                            </div>
                            </div>

                            <? if($get_diary->work_undertaken !="")
                            {?>

                              <div class="row slidingDiv"  >
                            <div class="form-group">
                                   <div style="padding-right: 10px"> 
                                    <label class="col-md-12" id="text_area_label">[Manually Write] WORKS UNDERTAKEN/ COMPLETED</label>
                                    <textarea style="padding-left: 20px !important" class="works_new" rows="5" id="comment" name="works_new" ><?=$get_diary->work_undertaken ?></textarea>
                                   </div> 
                            </div>
                            </div>
                            <? }?>
                          
                          </div> 
                            <div class="col-sm-6" style="padding-right: 3px;">
                            <div class="row">
                                 <div class="form-group">
                                    <div style="padding-left: 10px">
                                    <label class="col-md-12 control-label label-position">Project</label>
                                     <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                    <input class="form-control" type="" name="" id="" style="width: 97%" value="<?= $get_project_name->project_name ?>" readonly></div>
                                    
                             </div>
          </div>
        </div>
        </div>
                            <div class="row">
                            <div class="form-group">
                                   <div style="padding-left: 10px"> 
                                    <label class="col-md-12" id="text_area_label">WEATHER CONDITION</label>
                                    <!-- <textarea class="" rows="5" id="comment" name="weather_condition" ></textarea> -->
                                                  <div id="" style="height: 205px;padding-top: 60px">
               
              
               
               
               <div id="">
                  <div style="text-align: left;padding-left: 2vw;">
                     <span  style="font-size: 25px;"><span class="temp_value"><? echo $temp?></span><sup class="celcius"   style="cursor: pointer;color: red"><span style="font-size: 0.4em;margin-left: 5%;">o</span><sub style="font-size: 0.4em;">C</sub></sup>
                     <sup> <span><img src="image/divider.png"  style="    height: 13px;
                        width: 1px;
                        margin-top: 13px;"></span></sup>
                     <sup class="farn" style="cursor: pointer;"><span style="font-size: 0.4em;">o</span><sub style=" font-size: 0.4em;">F</sub></sup></span>
                  </div>
                  <div class="country">
                     <h4 style="font-size: 12px;margin-top: 1vh;margin-bottom: 1vh"><span id="city">Brisbane</span>, <span id="country">AU</span></h4>
                  </div>
                  <div class="other_units">
                     <!-- <h6  style="font-size: 2vh;margin-top: 1vh;margin-bottom: 1vh">Precipitation: NA</h6> -->
                     <h6  style="font-size: 12px;margin-top: 1vh;margin-bottom: 1vh">Humidity:<span  id="humid"> <?=$humidity."%" ?></span></h6>
                     <h6 style="font-size: 12px;margin-top: 1vh;margin-bottom: 1vh">Wind:<span  id="wind"> <?= $wind." km/h" ?>
                        </span>
                     </h6>
                     <h6 style="font-size: 12px;margin-top: 1vh;margin-bottom: 1vh">Temperature Precipitation:<span id="temp_prec"> <? echo $temp_precipitation ?></span></h6>
                  </div>
               </div>
               <input type="hidden" name="celcius_value" class="api_value" value="<?= $temp?>">
               <input type="hidden" name="farn_value" class="farn_val" value="<?=$temp2 ?>">
            </div>
                                  </div>  
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                                    <div style="padding-left: 10px">
                                    <label class="col-md-12" id="text_area_label">OH&S ISSUES (E.G INCIDENTS, FIRST AID ETC.)</label>
                                    <textarea class="" rows="5" id="comment"  name="" readonly></textarea>
                                   </div> 
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                                   <div style="padding-left: 10px"> 
                                    <label class="col-md-12" id="text_area_label">CONSULTANT INSPECTION UNDERTAKEN</label>
                                  

                                    <div  class=""  id="comment" name="consultant_inspection" style="text-align: left;height: 29vh;line-height: 22px">
                                      <?
                                        while($row_consultant=$get_consultant->fetch_object())
                                        {
                                      echo "<b>".$row_consultant->consultant_name."</b>"."-".$row_consultant->phone_no."-".$row_consultant->Tread."<br>";
                                        }
                                      ?> 

                                    </div>
                                   </div> 
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                                    
                                    <label class="col-md-12" id="text_area_label">CONTRACTUAL ISSUES</label>
                                    <textarea class="contract_issue" rows="5" id="comment"  name="contractual_issue" readonly><?php if($get_diary->contractual_issue) echo trim($get_diary->contractual_issue);?></textarea>
                                    
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                                  
                                    <label class="col-md-12" id="text_area_label">SITE INSTRUCTION ISSUED</label>
                                     <table class="table table-bordered scroll" id="instruction_table">
  <thead>
    <tr>
      <th><div style="width:9.8vw">INITIATING PERSON/COMPANY</div></th>
      <th><div style="width:9.8vw">INSTRUCTION DETAILS</div></th>
      <th><div style="width:8.8vw">RECIPEINT PERSON/COMPANY</div></th>
     
    </tr>
  </thead>
  <tbody style="height: 18vh">
  <? while($row_instruction=$get_instruction->fetch_object()) { 

      $issue_details= $conn->query("select id,given_name,surname,email_add from tbl_employee where id=".$row_instruction->issued_by."")->fetch_object();
      $employee_name= $conn->query("select given_name,surname,email_add from tbl_employee where id IN (".$row_instruction->employee_id.")");
    ?>
    <tr>
      <th><div style="width:9.8vw;"><?=$issue_details->given_name." ".$issue_details->surname ?></div></th>
     <th><div style="width:9.8vw;"><?=$row_instruction->instructions ?></div></th>
      <th><div style="width:9.8vw;"><?$seprator=",";
  $str_loop= "";
  while($rows=$employee_name->fetch_object()) {
  $str= $str.$rows->given_name." ".$rows->surname." ( ".$rows->email_add. ") ".$seprator;
  $str3= rtrim($str,','); echo $str3;
  }?></div></th>

    </tr>
   <? } ?>
   
  </tbody>
</table>
                                   
                            </div>
                            </div>


                            <div class="row">

                            <div class="form-group">
                                    
                                    <label class="col-md-12" id="text_area_label">GENERAL COMMENTS</label>
                                    <textarea class="general_comments" rows="5" id="comment"  name="general_comments" readonly><?php if($get_diary->general_comment) echo trim($get_diary->general_comment);?></textarea>
                                    
                            </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    
                                    <label class="col-md-12" id="text_area_label"  style="border-radius: 0px">SIGN OFF/ APPROVAL</label>
                                    
                                <label class="col-md-12" id="text_area_label" style="border-radius:0px;background: #EFEEF0; color: #2C2B2C;   margin-bottom: 5px;">SITE MANAGER</label>
                                    
                            </div>
                            </div>
                            <!-- <div class="row">
                            <div class="form-group">
                               <label class="col-sm-6" id="check_label">Pin</label>
                               <div class="col-sm-6"><input type="text" class="table_field2 pin" style="margin-bottom: 5px"></div>
                               </div>
                            </div> -->
                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-6" id="check_label">Name</label>
                               <div class="col-sm-6"><input type="text" class="table_field2" value="<?=$get_site_manager->given_name." ".$get_site_manager->surname ?>" style="margin-bottom: 5px" readonly></div>
                               </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-6" id="check_label">Date</label>
                               <div class="col-sm-6"><input type="text" value="<?=$your_date;?>" class="table_field2" style="margin-bottom: 5px" readonly></div>
                               </div>
                            </div>
                              <label class="col-md-12" id="text_area_label" style="border-radius:0px;background: #EFEEF0; color: #2C2B2C;   margin-bottom: 5px;">SITE FOREMAN</label>

                               <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label" style="padding-top:25px">Signature</label>
                               <div class="col-sm-8" style="padding:0 10px 0 0;">
                <input type="text" name="sign_div_hide" id="sign_div_hide" hidden="">
                 <div id="signArea" >
      <!-- <h2 class="tag-ingo">Put signature below,</h2> -->
      <img src='<?="API/Uploads/".$get_diary->site_foreman_signature ?>'>
    </div>  
                               </div>
                               </div>
                            </div>
<style>
                           




                           
<!--signature css -->
#sign_div
{
  background-image: url('image/Your_Signature.png');
}
.h4
{
color: #666666;
    font-size: 2.4vh;
    font-weight: 900;
}


input[type='file'] {
        color: transparent; 
        /*display: none;  */    position: absolute;
    top: 30px;
    left: 190px;
    z-index: -9999;
}
#signArea{
        width:304px;
        margin: 25px auto;
      }
      .sign-container {
        width: 60%;
        margin: auto;
      }
      .sign-preview {
        width: 150px;
        height: 50px;
        border: solid 1px #CFCFCF;
        margin: 10px 5px;
      }
      .tag-ingo {
        font-family: cursive;
        font-size: 12px;
        text-align: left;
        font-style: oblique;
      }

      .output>img,.output1>img,.output2>img,.output3>img,.output4>img,.output5>img,.output6>img,.output7>img,.output8>img,.output9>img,.output10>img,.output11>img,.output12>img,.output13>img,.output14>img
      {
        width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;
      }
</style>

                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-6" id="check_label">Name</label>
                               <div class="col-sm-6"><input type="text" name="site_foreman_name" class="table_field2 site_foreman_name" style="margin-bottom: 5px" value="<?=$get_diary->site_foreman_name ?>"readonly></div>
                               </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-6" id="check_label">Date</label>
                               <div class="col-sm-6"><input value="<?=$your_date  ?>" type="text" name="diary_date" class="table_field2" style="margin-bottom: 5px" readonly></div>
                               </div>
                            </div>


              


                               
                            

                            
                            </div> <!-- Content Div closed -->
                            
                            <div class="form-group">
                            
                                    <div class="col-sm-12" style="text-align: center;">
                                    
                                    <button type="button" class="btn btn-danger btn-fill" id="site_diary_update"  name="diary_update" style="background-color: #E66F26;border:none;border-radius: 50px;width: 20%;margin-top: 25px;outline: none;" onclick="window.location.href='header_home.php'">Back to Home</button>
                                    
                                    
                                   
                                  
                                    </div>
                                    
                                </div>
                             
                            <form>
                                   
<? include("footer_new.php"); ?>
                                    
                                    
                                </form>
                            </div>




                        </div>
                    </div> 

    </div> <!-- Wrapper Close -->
    </div>  <!--Container Close -->



<style>


	
label {
    
    font-weight: 100;
    font-style: italic;
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



.form-control {
    background-color: #E3E3E2;
    border: none;
    outline: none;
    border-radius: 6vh;
    color: #565656;
    padding: 8px 12px;
    height: 5vh;
    -webkit-box-shadow: none;
    box-shadow: none;
}
.form-control:focus {
    background-color: #E3E3E2;
    border: none;
    outline: none;
     -webkit-box-shadow: none;
    box-shadow: none;
}

.table > thead > tr > th {
    text-transform: none;
    color:#5A5A5A;
    font-size: 1.6vh;
    font-family: 'Helvetica_nue';
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 6px 8px;
    vertical-align: middle;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    
     border-top: none; 
}

.table>tbody>tr>th,.table>tbody>tr>td
{
font-weight: normal;
    f/*ont-size: 13px;*/
    color: #9B9EA0;}
   

    .table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #F0F0F0;
}

.table>tbody
{
    background: #fff;
}
.table>thead
{
    background: #EFEEF0; color: #2C2B2C; 
}


#comment {
font-family: 'Helvetica_Nue';
font-weight: 100;
 width: 100%;
 padding: 5px 0px;
/*margin-bottom: 20px;*/
resize: none;
font-size: 11px;
line-height: 24px;

-webkit-appearance: none;
border: none;
    outline: none;
  
    color: #565656;

    -webkit-box-shadow: none;
    box-shadow: none;
/*border-top-right-radius: 5vh;
border-bottom-right-radius: 5vh;*/
background: url(admin/assets/img/notebook.png);

}

#text_area_label
{
    background: #E3E1E3;
    height: 30px;
    line-height: 30px;
    color: #E6523A;
    border-top-right-radius: 3vh;
    border-top-left-radius: 3vh;
    font-size: 1.6vh;
    margin-bottom: 0px;
    font-weight: 600;
    font-style: normal;
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
  content: '\f00c';
   color: black;
   background-color: #FFFEFF;

   width: 25px;
    border: 1px solid #DFDEDF;
    height: 25px;
    text-align: center;
    font-size: 20px;
        line-height: 25px;
        -webkit-text-stroke: 3px #fff;  
}

input.faChkSqr:after {
  content: '\f096';
  color: #FFFEFF;
  background-color: #FFFEFF;
 width: 25px;
    border: 1px solid #DFDEDF;
    border-radius: 5px;
    height: 25px;
    text-align: center;
    font-size: 19px;

}

#check_label
{
    line-height: 30px;
    color: #616062;
    font-size: 2vh;
    text-transform: none;
    font-style: normal;
}
.table_field
{
    border: none;
    color:#616062;
    width: 100%;
    outline: none;  
    -webkit-box-shadow: none;
    box-shadow: none;
}
.table_field2
{
   /* border: none;*/
 
    color:#616062;
    width: 100%;
   /* text-align: center;*/
  
     background-color: #E3E3E2;
    border: none;
    outline: none;
    border-radius: 6vh;
    color: #565656;
    padding: 8px 12px;
    height: 4vh;
    -webkit-box-shadow: none;
    box-shadow: none;
}
.row {
    margin-right: 0px; 
    margin-left: 0px; 
   /* background: #fff;*/
}




table.scroll tbody,
table.scroll thead { display: block; }

.table {
margin-bottom: 0px;
}
table.scroll tbody {
    height: 100px;
    overflow-y: auto;
    overflow-x: hidden;
}


.table th div
{
  word-wrap: break-word;
  font-size: 12px;
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




</style>
<footer>
  <? //include("footer.php"); ?>
<footer>

<script>
  
$( ".farn" ).click(function() {
    var val= $('.api_value').val();
    var calc= val*9/5+32;
    var final= Number(calc).toFixed(2);
    // alert(final);
    $('.temp_value').html(final);
    $(".farn").css('color', 'red');
    $('.farn_val').val(final);
    $(".celcius").css('color', 'black');
  
});
$( ".celcius" ).click(function() {
    var val= $('.farn_val').val();
    var calc= (5/9) * (val-32);
    var final= Number(calc).toFixed(2);
    // alert(final);
    $('.temp_value').html(final);
    $(".celcius").css('color', 'red');
    $(".farn").css('color', 'black');

  
});



</script>
