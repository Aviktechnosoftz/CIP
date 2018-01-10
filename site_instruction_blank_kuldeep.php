<?php
session_start();
error_reporting(0);
// print_r($_SESSION);
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
$issue_details= $conn->query("select id,given_name,surname from tbl_employee where id=".$_SESSION['induction']."")->fetch_object();
$get_employee= $conn->query("select tbl_employee.id,tbl_employee.email_add,given_name,surname from tbl_employee INNER JOIN tbl_induction_register ON tbl_employee.id=tbl_induction_register.id where (tbl_induction_register.inducted_by IS NOT NULL AND tbl_induction_register.inducted_by != '') AND tbl_employee.employer_id='1' AND tbl_employee.id!=".$_SESSION['induction']." AND tbl_induction_register.project_id=".$_SESSION['admin']." ");

// echo "select tbl_employee.id,tbl_employee.email_add,given_name,surname from tbl_employee INNER JOIN tbl_induction_register ON tbl_employee.id=tbl_induction_register.id where (tbl_induction_register.inducted_by IS NOT NULL AND tbl_induction_register.inducted_by != '') AND tbl_employee.employer_id='1' AND tbl_employee.id!=".$_SESSION['induction']." AND tbl_induction_register.project_id=".$_SESSION['admin']." ";
$instruction_no=$conn->query("select MAX(id)+1 as id FROM tbl_instruction")->fetch_object();

if(isset($_POST['save']))
{

  if($_POST['req_date2']=="" OR $_POST['distribution']=="" OR $_POST['employee']=="")
  {
    $counter=1;
  }
  else
  {
     $image_path= 'API/Uploads/';  
 
     $name="";
          if($_FILES['photo']['name'][0]!="")
          {
          $path_parts0 = pathinfo($_FILES['photo']['name'][0]);
        $building_images_0 = $path_parts0['filename'].'_'.time().'.'.$path_parts0['extension'];
        $name= $building_images_0;
        }
        if($_FILES['photo']['name'][1]!="")
          {
         $path_parts1 = pathinfo($_FILES['photo']['name'][1]);
        $building_images_1 = $path_parts1['filename'].'_'.time().'.'.$path_parts1['extension'];
        $name= $building_images_1.",".$name;
         }
         if($_FILES['photo']['name'][2]!="")
          {
         $path_parts2 = pathinfo($_FILES['photo']['name'][2]);
        $building_images_2 = $path_parts2['filename'].'_'.time().'.'.$path_parts2['extension'];
        $name= $building_images_2.",".$name;
         }
         if($_FILES['photo']['name'][3]!="")
          {
         $path_parts3 = pathinfo($_FILES['photo']['name'][3]);
        $building_images_3 = $path_parts3['filename'].'_'.time().'.'.$path_parts3['extension'];
        $name= $building_images_3.",".$name;
        }
        if($_FILES['photo']['name'][4]!="")
          {
         $path_parts4 = pathinfo($_FILES['photo']['name'][4]);
        $building_images_4 = $path_parts4['filename'].'_'.time().'.'.$path_parts4['extension'];
        $name= $building_images_4.",".$name;
        }
        if($_FILES['photo']['name'][5]!="")
          {
         $path_parts5 = pathinfo($_FILES['photo']['name'][5]);
        $building_images_5 = $path_parts5['filename'].'_'.time().'.'.$path_parts5['extension'];
        $name= $building_images_5.",".$name;
          }
      @$target0 = $image_path . $building_images_0;
      @$target1 = $image_path . $building_images_1;
      @$target2 = $image_path . $building_images_2;
      @$target3 = $image_path . $building_images_3;
      @$target4 = $image_path . $building_images_4;
      @$target5 = $image_path . $building_images_5;

      move_uploaded_file($_FILES['photo']['tmp_name'][0], $target0);
      move_uploaded_file($_FILES['photo']['tmp_name'][1], $target1);
      move_uploaded_file($_FILES['photo']['tmp_name'][2], $target2);
      move_uploaded_file($_FILES['photo']['tmp_name'][3], $target3);
      move_uploaded_file($_FILES['photo']['tmp_name'][4], $target4);
      move_uploaded_file($_FILES['photo']['tmp_name'][5], $target5);
  
  
  

 

    $distribution= implode(",",$_POST['distribution']);
    $employee= implode(",",$_POST['employee']);

    $qry_insert = $conn->query("insert into tbl_instruction set
                    project_id = '".$_SESSION['admin']."',
                    subject= '".$_POST['subject']."',
                    emp_id= '".$_POST['subcontractor_name']."',
                     employee_id= '".$employee."',
                     distribution_id= '".$distribution."',
                     instructions='".$_POST['instruction']."',
                    req_date= '".$_POST['req_date2']."',
                    issued_by='".$_SESSION['induction']."',
                    today_date='".$_POST['date']."',
                    attachments= '".$name."',
                    image_1_text='". $_POST['desc1']."',
                        image_2_text='". $_POST['desc2']."',
                        image_3_text='". $_POST['desc3']."',
                        image_4_text='". $_POST['desc4']."',
                        clause='".$_POST['clause_filled_hide']."',
                    created_date=now(),
                    modified_date=now() ");
    
          
  
  $str= implode($_POST['employee'],",");
  $employee_name= $conn->query("select given_name,surname,email_add from tbl_employee where id IN (".$str.")");
  $str="";
        while($rows= $employee_name->fetch_object())
            {
                $str= $rows->email_add.",".$str;
              }
              $str2= rtrim($str,",");$dis= implode($_POST['distribution'],",");
  $distribution= $conn->query("select given_name,surname,email_add from tbl_employee where id IN (".$dis.")");
  $str3="";
        while($rows2=$distribution->fetch_object()) {
        $str3= $rows2->email_add.",".$str3;
       
     }
        $str4= rtrim($str3,',');
      
     $to= $str2.",".$str4.",shashank.r@aviktechnosoft.com";
     $Sub = "New Site Instruction Form Submitted";
 
           

      $msg = "<html> 
            <body>
            Hello HSR / SM, <br/><br/>

          Site Instruction form  is submitted.<br/><br/>


          <a href ='https://cipropertyapp.com/site_instruction_approved_form.php?approved_form=".$_POST['id']."'><input type=\"button\" value=\"Download\"> </a><br/><br/>



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
                @$result = file_get_contents($url, false, $context);

                
  }
  if($qry_insert)
                {
                   
                  ?>
                  <script> alert("You Have Successfully Submitted Instruction Form");
                  window.location.href='site_instruction_approved.php';</script>
                  <?
                }  
    }

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>



<head>
<header>
 <? include('header.php'); ?>
 <? include('test_side_new_3.php') ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css">
<!-- Load jQuery from Google's CDN -->
    <!-- Load jQuery UI CSS  -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <!-- Load jQuery JS -->
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
    

</header>

<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">CONTRACTS ADMINISTRATION MANAGEMENT SYSTEM</legend>
        <label class="col-md-12 control-label form-name">Site Instruction Form</label>

        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>

<div class="Main_Form2">
  <div class="col-md-12">
    <form class="well form-horizontal well_class" action=" " method="post"  id="contact_form"  enctype="multipart/form-data" style="border: none" onsubmit="return terms_check()">
      <fieldset>
        <div class="form-group">
               <div class="col-md-12" style="padding-left: 0px;padding-bottom: 25px;">
                <label class="col-md-12 control-label" style="padding-left: 0px;"><span class="project_title" style="">PROJECT :&nbsp;<? echo $project_name->project_name ?> </span></label>
            </div>
        </div>        
        <div class="alert alert-danger" style="<? if($counter!='1'){ echo 'display:none;';}?> ">
          <strong>Incorrect!</strong> Please Fill All Fields
        </div>
 <!--  <div class="form-group">
     <label class="col-md-4 control-label" style="text-align: right;color: #E74C3C"><? //echo $project_name->project_name ?> "ART" Project</label> 
     <label class="col-md-4 control-label" style="text-align: left;float:right;color: #E74C3C">Project No. : <span style="color:#E74C3C"> <? //echo $project_name->number ?></span></label> 

  </div> -->

<!-- Text input-->
         <div class="form-group">
          <!-- <label class="col-md-3 control-label">Subject</label> -->
            <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>              
                <input name="subject" id="date_show" placeholder="Site Instruction Number" class="form-control"  type="text" name="" value="<?= str_pad($instruction_no->id, 4, "0", STR_PAD_LEFT); ?>" readonly>
            </div>
          </div>
        </div>

        <div class="form-group">
          <!-- <label class="col-md-3 control-label">Subject</label> -->
            <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>              
                <input name="subject" id="date_show" placeholder="Subject Goes Here" class="form-control"  type="text" name="date_today" value="" required>
            </div>
          </div>
        </div>

        <div class="form-group"> 
          <div class="col-md-12 zeropadding">
           <div class="input-group">                
              <div class="alert alert-info" style="text-align: justify;margin-bottom: 0px">
                  Site Instruction:  This instruction is not a variation to the Subcontract. Should,however, the execution of the instruction result in additional costs which, in the opinion of the Trade Contractor would justify an application for a variation, then the Trade Contractor must submit sucha a claim within three (3) days of receipt of this instruction. Failure to do so will signify acceptance of this instruction without cost.
            </div>
          </div>          
          </div>
        </div>


        <div class="form-group">
          <div class="col-md-6 rightpadding"> 
            <label class="col-md-12 control-label label-position">To</label>
            <div class="col-md-12 zeropadding">
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <select  class="form-control selectpicker"   id="subcontractor_name" name="subcontractor_name" required onchange="emp()" required style="font-size: 1.8vh">
                      <option value=""> Please Select Employer</option>
                    <? $employer= $conn->query("select * from tbl_employer where is_deleted=0 AND project_id=".$_SESSION['admin']."");
                        while($row= $employer->fetch_object())
                        {
                     ?>
                      <option value=<?= $row->id ?>> <? echo $row->company_name ?> </option>
                      <? }?>
                      </select>
              </div>
          </div>
          </div>
         <div class="col-md-6 leftpadding"> 
            <label class="col-md-12 control-label label-position">Date</label>
            <div class="col-md-12 zeropadding" >
              <div class="input-group" >
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input  id="" placeholder="Date Goes Here" class="form-control"  type="text" name="date_today" value="<? echo date('d/m/y') ?>" readonly>
              </div>
            </div>
          </div>
        </div>

      <!-- <div class="form-group">
       <div class="col-md-6 rightpadding">
          <label class="col-md-12 control-label label-position">Page</label>
          <div class="col-md-12 zeropadding" >
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                <input  id="" placeholder="Page Goes Here" class="form-control"  type="text" value="01" readonly>
            </div>
          </div>
        </div>
        <div class="col-md-6 leftpadding">  
          <label class="col-md-12 control-label label-position">Of</label>
          <div class="col-md-12 zeropadding" >
           <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
             <input id="" placeholder="Of Goes Here" class="form-control"  type="text"  value="01" readonly>
          </div>
        </div>
      </div>
      </div>
 -->

      <div class="form-group">
        <div class="col-md-6 rightpadding">  
          <label class="col-md-12 control-label label-position">Phone No.</label>
          <div class="col-md-12 zeropadding" >
             <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
              <input  id="phone" placeholder="Phone Goes Here" class="form-control"  type="text" value="" readonly>
          </div>
          </div>
       </div>
       <div class="col-md-6 leftpadding">
          <label class="col-md-12 control-label label-position">Email</label>
          <div class="col-md-12 zeropadding">
             <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              <input id="email" placeholder="Email Goes Here" class="form-control"  type="text"  value="" readonly>
            </div>
          </div>
        </div>
      </div>

    <div class="form-group">
     <div class="col-md-12 zeropadding">  
      <label class="col-md-12 control-label label-position">Attention</label>
      <div class="col-md-12 zeropadding">
         <div class="input-group">
           <span class="input-group-addon"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
          <!-- <select  class="form-control selectpicker"  id="employee_name" name="employee_name" required >
          <option value=""> Please Select Employee</option>
        
          </select> -->

         <select name="employee[]" id="limitedNumbSelect2" class="form-control selectpicker col-md-6" multiple="true" style="-webkit-border-top-right-radius: 20px !important;
-webkit-border-bottom-right-radius: 20px;
-moz-border-radius-topright: 20px;
-moz-border-radius-bottomright: 20px;
border-top-right-radius: 20px;
border-bottom-right-radius: 20px;"></select>

        </div>
      </div>
       </div>
      </div>

      <div class="form-group"> 
       <div class="col-md-12 zeropadding"> 
        <label class="col-md-12 control-label label-position">Instruction</label>
        <div class="col-md-12 zeropadding">
           <div class="alert alert-info">Instructions to be detailed with reference to attachments as necessary</div>
           <div class="alert alert-info" id="clause_filled" style="display: none"></div>
           <input type="text" name="clause_filled_hide" id="clause_filled_hide" hidden>
          <div class="input-group col-md-12">
           
            <!-- <span class="input-group-addon" id="addon"></span> -->
            <textarea class="form-control instruction_area" rows="10" id="comment" name="instruction" style="-webkit-border-radius: 15px !important;-moz-border-radius: 15px !important;border-radius: 15px !important;font-size: 12px " required></textarea>


           
         
          </div>
        </div>
      </div>
      </div>


      <div class="form-group"> 
       <div class="col-md-12 zeropadding"> 
     <!--    <label class="col-md-12 control-label label-position">Instruction</label> -->
        <div class="col-md-12 zeropadding">
           <!-- <div class="alert alert-info">Instructions to be detailed with reference to attachments as necessary</div> -->
           <!-- <div class="alert alert-info" id="clause_filled" style="display: none"></div> -->
           <!-- <input type="text" name="clause_filled_hide" id="clause_filled_hide" hidden> -->
          <div class="input-group col-md-12">
           
            <!-- <span class="input-group-addon" id="addon"></span> -->
               <div class="form-control instruction_area"  id="contract_condition" readonly    style="-webkit-border-radius: 15px !important;-moz-border-radius: 15px !important;border-radius: 15px !important;font-size: 12px;height:auto;background-color:white !important;display:none;"></div>


           
         
          </div>
        </div>
      </div>
      </div>





      

        <div class="form-group">

             <div class="col-md-12 zeropadding"> 
             <label class="col-md-4 control-label"></label>
            <div class="col-md-9 col-md-offset-2 text-center">
              <a class="" data-toggle="modal" data-target="#termsModal" style="text-decoration: none;cursor: pointer;">Select Subcontract Conditions</a>
            <input type="hidden" name="agree" value="no"  />
            </div>
<!-- <div class="col-md-1">
            <i class="form-control-feedback glyphicon glyphicon-ok" data-fv-icon-for="agree" style="display: none;"></i>
    <i class="form-control-remove glyphicon glyphicon-remove" data-fv-icon-for="agree" style="display: none;"></i>

           
            </div> -->
          </div>
           </div>

    <div class="form-group"> 
      <div class="col-md-12 zeropadding"> 
      <label class="col-md-12 control-label label-position">Requested Completion Date</label>
        <div class="col-md-12 zeropadding">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input type="text" name="date" id="date" class="form-control"  readonly placeholder="Click Here To Select Date"  />
            <input type="hidden" name="req_date2" id="date2" class="form-control"  readonly placeholder="DD/MM/YYYY" />
          </div>
        </div>
      </div>
    </div>



  <div class="form-group"> 
   <div class="col-md-12 zeropadding"> 
   <label class="col-md-12 control-label label-position">Issued By</label>
    <div class="col-md-12  zeropadding">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input name="issue_by" id="" placeholder="Issued By Here" class="form-control"  type="text"  value="<?=$issue_details->given_name." ".$issue_details->surname ?>" readonly>
      </div>
    </div>
  </div>
  </div>

  <div class="form-group"> 
    <div class="col-md-12 zeropadding"> 
    <label class="col-md-12 control-label label-position">SI</label>
      <div class="col-md-12 zeropadding">
         <div class="input-group">
           <span class="input-group-addon"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
               <select name= "distribution[]" id="limitedNumbSelect3" class="form-control selectpicker" multiple="true">
               <? while($row2= $get_employee->fetch_object())
                {?>
            <option value="<?= $row2->id ?>"><? echo $row2->given_name." ".$row2->surname." (".$row2->email_add.") " ?></option>
                
                <?}?>
              </select>
        </div>
      </div>
    </div>    
  </div>
  <!-- <div class="form-group">
  <label class="col-md-4 control-label">Upload Documents:</label>
  <div class="col-md-3 inputGroupContainer">
      <input type="file" name="photo[]" id="imgInp" onchange="loadFile1(event);">
     <img class="preview" id="preview1" alt="No Image" style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block; margin-left: -6vw;">
      </div>
      <div class="col-md-3 inputGroupContainer">
      <input type="file" name="photo[]" id="imgInp" onchange="loadFile2(event);">
     <img class="preview" id="preview2" alt="No Image" style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
      </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-3 inputGroupContainer">
      <input type="file" name="photo[]" id="imgInp" onchange="loadFile3(event);">
     <img class="preview" id="preview3" alt="No Image" style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block; margin-left: -6vw;">
      </div>
      <div class="col-md-3 inputGroupContainer">
      <input type="file" name="photo[]" id="imgInp" onchange="loadFile4(event);">
     <img class="preview" id="preview4" alt="No Image" style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
      </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-3 inputGroupContainer">
      <input type="file" name="photo[]" id="imgInp" onchange="loadFile5(event);">
     <img class="preview" id="preview5" alt="No Image" style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block; margin-left: -6vw;">
      </div>
      <div class="col-md-3 inputGroupContainer">
      <input type="file" name="photo[]" id="imgInp" onchange="loadFile6(event);">
     <img class="preview" id="preview6" alt="No Image" style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
      </div>
      
</div> -->
<!-- <script>
  var loadFile1 = function(event) {
    oldimg = $('#preview1').attr('src');
    var preview = document.getElementById('preview1');
    preview.src = URL.createObjectURL(event.target.files[0]);
    newimg = preview.src;
    if(newimg.indexOf('/null') > -1) {
        preview.src = oldimg;
    }
};
var loadFile2 = function(event) {
    oldimg = $('#preview2').attr('src');
    var preview = document.getElementById('preview2');
    preview.src = URL.createObjectURL(event.target.files[0]);
    newimg = preview.src;
    if(newimg.indexOf('/null') > -1) {
        preview.src = oldimg;
    }
};
var loadFile3 = function(event) {
    oldimg = $('#preview3').attr('src');
    var preview = document.getElementById('preview3');
    preview.src = URL.createObjectURL(event.target.files[0]);
    newimg = preview.src;
    if(newimg.indexOf('/null') > -1) {
        preview.src = oldimg;
    }
};
var loadFile4 = function(event) {
    oldimg = $('#preview4').attr('src');
    var preview = document.getElementById('preview4');
    preview.src = URL.createObjectURL(event.target.files[0]);
    newimg = preview.src;
    if(newimg.indexOf('/null') > -1) {
        preview.src = oldimg;
    }
};
var loadFile5 = function(event) {
    oldimg = $('#preview5').attr('src');
    var preview = document.getElementById('preview5');
    preview.src = URL.createObjectURL(event.target.files[0]);
    newimg = preview.src;
    if(newimg.indexOf('/null') > -1) {
        preview.src = oldimg;
    }
};
var loadFile6 = function(event) {
    oldimg = $('#preview6').attr('src');
    var preview = document.getElementById('preview6');
    preview.src = URL.createObjectURL(event.target.files[0]);
    newimg = preview.src;
    if(newimg.indexOf('/null') > -1) {
        preview.src = oldimg;
    }
};

</script> -->

        <div class="form-group">
          <div class="col-md-12 zeropadding"> 
             <div class="col-sm-3" style="">
			 
			 <span class="glyphicon glyphicon-eye-open" id="viewer" style="display:none;left:65px;position:relative;top:25px"></span>
			
              <div id="uploader"  onclick="$('#file_1').click()" >
                <img id="upload_1"  width="70" height="70"   onerror="javascript:this.src='Document.png'" />
			
                </div>
                <input type="file" name="photo[]" id="file_1" 
                onchange="document.getElementById('upload_1').src = window.URL.createObjectURL(this.files[0]); $('#desc1').show();
      $('#desc1').attr('required', true); document.getElementById('viewer').style.display = 'block';">
                <input name="desc1" placeholder="Image Description" class="simple_field  form-control"  id="desc1"  type="text" value="" >
              </div>

              <div class="col-sm-3 text-center">
			 <span class="glyphicon glyphicon-eye-open" id="viewer2" style="display:none;left:65px;position:relative;top:25px"></span>

			  <div id="uploader2"  onclick="$('#file_2').click()" >
                <img id="upload_2"  width="70" height="70" onerror="javascript:this.src='Document.png'" />
                </div>
                <input type="file" name="photo[]" id="file_2" 
              onchange="document.getElementById('upload_2').src = window.URL.createObjectURL(this.files[0]); $('#desc2').show();
      $('#desc2').attr('required', true);document.getElementById('viewer2').style.display = 'block';">
              <input name="desc2" placeholder="Image Description" class="simple_field form-control"  id="desc2"  type="text" value="" >
              </div>

               <div class="col-sm-3 text-center">
			 <span class="glyphicon glyphicon-eye-open" id="viewer3" style="display:none;left:65px;position:relative;top:25px"></span>

			   <div id="uploader3"  onclick="$('#file_3').click()" >
                <img id="upload_3"  width="70" height="70" onerror="javascript:this.src='Document.png'" />
                </div>
                <input type="file" name="photo[]" id="file_3" 
              onchange="document.getElementById('upload_3').src = window.URL.createObjectURL(this.files[0]); $('#desc3').show();
      $('#desc3').attr('required', true);document.getElementById('viewer3').style.display = 'block';">
              <input name="desc3" placeholder="Image Description" class="simple_field form-control"  id="desc3"  type="text" value="" >
              </div>
 
              <div class="col-sm-3 text-right">
			 <span class="glyphicon glyphicon-eye-open" id="viewer4" style="display:none;left:65px;position:relative;top:25px"></span>

			  <div id="uploader4"  onclick="$('#file_4').click()" >
                <img id="upload_4"  width="70" height="70" onerror="javascript:this.src='Document.png'"/>
                </div>
                <input type="file" name="photo[]" id="file_4" 
              onchange="document.getElementById('upload_4').src = window.URL.createObjectURL(this.files[0]); $('#desc4').show();
      $('#desc4').attr('required', true);document.getElementById('viewer4').style.display = 'block';">
              <input name="desc4" placeholder="Image Description" class="simple_field form-control"  id="desc4"  type="text" value="" >
              </div>

              <!-- <div class="col-sm-2 text-center">
                <img id="upload_5"  width="70" height="70"  onclick="get_image(5)"/>
                <input type="file" name="photo[]" id="file_5" 
              onchange="document.getElementById('upload_5').src = window.URL.createObjectURL(this.files[0])">
              </div>

              <div class="col-sm-2 text-right" style="padding-right: 0px"> 
                <img id="upload_6"  width="70" height="70"  onclick="get_image(6)"/>
                <input type="file" name="photo[]" id="file_6" 
              onchange="document.getElementById('upload_6').src = window.URL.createObjectURL(this.files[0])">
              </div> -->
                                                                       
      </div>
     </div>


      <div class="form-group">
       <div class="col-md-12 zeropadding"> 
        <label class="col-md-12 control-label label-position">Pin</label>
          <div class="col-md-12 zeropadding">
             <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
                <input name="req_date" id="pin_enter" placeholder="Pin To Submit" class="form-control"  type="password"  value="" required onkeyup="pin_approve()">
            </div>

            <input type="text" name="clause_hide2" id="clause_hide" hidden>
    </div>
  </div>
  </div>

          
   


      <!-- Terms and conditions modal -->
<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="Terms and conditions" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: center;"><b>Subcontract Conditions</b></h4>
            </div>

           <div class="modal-body">
               <div style="text-align:justify;">
         <style>
         .spantoinput {
  display: block;
  padding-left: 15px;
  text-indent: -15px;
  text-align:justify;
  position:relative;
}
.inputtolabel {
  width: 13px;
  height: 13px;
  padding: 0;
  margin:0;
  vertical-align: bottom;
  position: relative;
  top: -4px; 
    text-align:justify;

}
         </style>
     <span class="spantoinput"><input type="checkbox" value="2.1.3"  class="clause inputtolabel">&nbsp;&nbsp;&nbsp;&nbsp;<span class=""><b>2.1.3.</b>The Contractor is entitled to require the Subcontractor at the Subcontractor's own cost from time to time to reschedule the performance of the whole or any part of the Subcontract Works including returning to the site on not less than 24 hours' notice to recommence the Subcontract Works. The Subcontractor is entitled to an extension of time if completion of the Subcontract Works is delayed by any such requirement. The Subcontractor acknowledges that any such requirement by the Contractor is not a breach of the Subcontract and the Contractor is not liable for any damages, costs and expenses suffered or incurred by the Subcontractor in complying with the requirement.</span></span><br/><br/>
    <span class="spantoinput"><input type="checkbox" value="2.4.1"  class="clause inputtolabel">&nbsp;&nbsp;&nbsp;&nbsp;<b>2.4.1.</b>The Subcontractor must carry out the Subcontract Works in accordance with any directions given by the Contractor from time to time. If any direction by the Contractor is not given in writing, it must be confirmed in writing within 3 days of the direction.If the Contractor considers there is an emergency, it may give an oral direction, which must be acted on immediately by the Subcontractor and confirmed in writing by the Contractor within 24 hours.</span><br/><br/>
    <span class="spantoinput"><input type="checkbox" value="2.4.2"  class="clause inputtolabel">&nbsp;&nbsp;&nbsp;&nbsp;<b>2.4.2.</b>If the Subcontractor wishes to claim that a direction, although not stated to be a variation, involves a variation, it must lodge written notice with the Contractor to that effect within 3 days of receipt of the direction otherwise any subsequent claim that a variation is involved is barred absolutely.Without limiting this clause, the Contractor may concede in a particular instance or instances that a variation is involved without waiving the requirement for such written notice to be given in all other instances.</span><br/><br/>
    <span class="spantoinput"><input type="checkbox" value="2.7"  class="clause inputtolabel">&nbsp;&nbsp;&nbsp;&nbsp;<b>2.7. Cleaning Up</b><br/>
    When on site, the Subcontractor must clean up and remove all rubbish from the site daily or, if so directed by the Contractor to designated areas on the site. Upon completion of the Subcontract Works, the Subcontractor must leave the site in a clean and tidy condition.If the Subcontractor fails within 24 hours from the receipt of a written direction by the Contractor to clean up or remove rubbish, the Contractor may (without being obliged to do so) arrange for the cleaning up, or, removal of the rubbish at the Subcontractors expense and the cost of doing so is a debt due and owing to the Contractor. The Contractor will advise the Subcontractor of any costs incurred under this clause.</span><br/><br/>
    <span class="spantoinput"><input type="checkbox" value="5.3" name="chkParent" id="parentChk" class="clause inputtolabel" onclick="pcCheck();">&nbsp;&nbsp;&nbsp;&nbsp;<b>5.3 Work by Others&nbsp;</b><br />If the Subcontract Works is dependent on or appreciably affected by the quality of any other work to be carried out or that has been carried out by the Contractor or any Separate Contractors ("other work"):</span><br/><br/>
    <span class="spantoinput"><input type="checkbox" value="5.3.1" name="ch[]" class="clause inputtolabel" onclick="pCheck();">&nbsp;&nbsp;&nbsp;&nbsp;<b>5.3.1.</b>if the other work is defective, the Subcontractor must immediately notify the Contractor in writing so that the Contractor may arrange for the defects to remedied; and</span><br/><br/>
    <span class="spantoinput"><input type="checkbox" value="5.3.2" name="ch[]" class="clause inputtolabel" onclick="pCheck();">&nbsp;&nbsp;&nbsp;&nbsp;<b>5.3.2.</b>if the Subcontractor accepts the other work by proceeding with the execution of the Subcontract Works and the other work is subsequently found to be defective, then upon rectification of the other work by the Contractor (or any Separate Contractor), if directed by the Contractor the Subcontractor will re-execute that part of the Subcontract Works at no additional cost.</span><br/><br/>
    <span class="spantoinput"><input type="checkbox" value="5.7.2"  class="clause inputtolabel">&nbsp;&nbsp;&nbsp;&nbsp;<b>5.7.2.</b>If the Contractor discovers materials or work which is not in accordance with the Subcontract, the Contractor may direct the Subcontractor to comply with the Subcontract and to:</span><br/><br/>
    <span class="spantoinput"><input type="checkbox" value="5.7.3.1"  class="clause inputtolabel">&nbsp;&nbsp;&nbsp;&nbsp;<b>5.7.3.1.</b> remove materials from the site;</span><br/><br/>
    <span class="spantoinput"><input type="checkbox" value="5.7.3.2"  class="clause inputtolabel">&nbsp;&nbsp;&nbsp;&nbsp;<b>5.7.3.2.</b> demolish work;</span><br/><br/>
    <span class="spantoinput"><input type="checkbox" value="5.7.3.3"  class="clause  inputtolabel">&nbsp;&nbsp;&nbsp;&nbsp;<b>5.7.3.3.</b> reconstruct, replace, or correct the materials or work; or</span><br/><br/>
    <span class="spantoinput"><input type="checkbox" value="5.7.3.4"  class="clause  inputtolabel">&nbsp;&nbsp;&nbsp;&nbsp;<b>5.7.3.4.</b> not deliver the materials or work to the site.</span><br/><br/>
    <span class="spantoinput"><input type="checkbox" value="5.7.4"  class="clause  inputtolabel">&nbsp;&nbsp;<b>5.7.4.</b>The Subcontractor must comply with all such directions within the times specified by the Contractor and at no cost to the Contractor.</span><br/><br/>
    <span class="spantoinput"><input type="checkbox" value="5.8"  class="clause  inputtolabel">&nbsp;&nbsp;&nbsp;&nbsp;<b>5.8. Cost of Rectification or Compliance</b><br /></span><span>If the Subcontractor fails to comply with any direction from the Contractor given under the Subcontract and, in particular any direction under clauses 2.4, 2.7, 5.3, 5.5, 5.7 and 14.2 then, without giving further notice, the Contractor may arrange for compliance itself by performing the relevant work or by engaging others to do so and the cost of such performance will be a debt due and owing to the Contractor by the Subcontractor.</span><br/><br/>
  </div>
            </div>


            <div class="modal-footer">
               <!--  <button type="button" style="background-color: #f47821 !important;
    color: white !important;
    border: none !important;
    border-radius: 10vh !important;" class="btn btn-primary" id="agreeButton"  onclick="$('.form-control-feedback').show();$('.form-control-remove').hide(); send_data()">Agree</button> -->
                <button type="button" style="background-color: #f47821 !important;
    color: white !important;
    border: none !important;
    border-radius: 10vh !important;" class="btn btn-default" id="disagreeButton" data-dismiss="modal" onclick="">OK</button>

     <button type="button" style="display: none" class="btn btn-default" id="close_modal" data-dismiss="modal" onclick=""></button>

            </div>
        </div>
    </div>
</div>

      
      <div class="form-group">
        <label class="col-md-4 control-label"></label>
            <div class="col-md-5">
              <input type="submit" id="submit3" name="save" value="Save Instructions" class="btn btn-warning form_submit_button" >
          </div>
        </div>
      
      

      </fieldset>
    </form>
    <? include("footer_new.php"); ?>
  </div>
  <span id="hidden_option" style="display: none;"></span>
</div> 
 
<style> 
.form-control-feedback {
    color: #3c763d;

    }

    .form-control-remove {
    color: #F55151;
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2;
    display: block;
    width: 34px;
    height: 34px;
    line-height: 34px;
    text-align: center;
    pointer-events: none;

    }
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
/*.h-divider{
 margin-top:5px;
 margin-bottom:5px;
 height:1px;
 width:100%;
 border-top:1px solid gray;
}*/
/*#attention
{
    border: 0;
    border-bottom: 1.5px solid black;
    outline: 0;
}*/
/*label {
    
    font-weight: 100;
    font-style: normal;
    color: #555555;
}*/

#comment {
font-family: Helvetica_Nue;
font-weight: 100;
 width: 100%;
 padding: 5px 0px;
/*margin-bottom: 20px;*/
resize: vertical;
font-size: 11px;
line-height: 24px;

-webkit-appearance: none;
border-top-right-radius: 5vh;
border-bottom-right-radius: 5vh;
background: url(img/notebook.png);

}

/*#date
{
  width: 30vw;
}*/
/*.container
{
width: 1027px;
width: 80vw;
}
*/
.select2-container--default .select2-selection--multiple:hover {
    cursor: pointer;
    
}

.select2-container--default .select2-selection--multiple li:hover {
    background: white;
    cursor: pointer;
}

/*.input-group {
   
    z-index: 0;
}
.form-horizontal .control-label { 
    
    font-weight: 100;
    font-style: normal;
    text-align: left;
    padding-top: 7px;
    margin-bottom: 0;
    color: #555555;
}

.form-control {
border-radius: 20vh;
border:none;
    box-shadow: none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   -moz-transition: none;
   -webkit-transition: none;
outline: none;
    border: none;
    box-shadow: none;
    -webkit-box-shadow: none;
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
}*/

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
/*legend
{
  color: #fc3807;font-family: 'Helvetica_Nue';font-weight: 200;    margin-top: 2vh;    font-size: 2.3vh;margin-top: 0px;
}
*/
/*#submit3
{
  background-color: #f47821;
  color: white;
  outline: none;
  border:none;
}*/
.select2-selection__rendered
  {
    border-radius: 10vh !important;
  }
.select2-container--default.select2-container--focus .select2-selection--multiple {
    border: none;
    outline: 0;
    
}

.select2-container--default.select2-container--focus .select2-selection--multiple {

border-top-right-radius: 20vh;
    border-bottom-right-radius: 20vh;
    background: #E4E4E3;
}

.select2-container--default.select2-container .select2-selection--multiple {
    border: none;
    outline: 0;
    background: #E4E4E3;
    
}

.select2-container--default.select2-container .select2-selection--multiple {

    border-top-right-radius: 20vh;
    border-bottom-right-radius: 20vh;
}

.select2-container--open .select2-dropdown--below {
   
    border: none;
    
    border-bottom-right-radius: 20vh;
}
.select2-container--default.select2-container--open.select2-container--below .select2-selection--single, .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple
{
  background: #E4E4E3;
}

.select2-container--default .select2-selection--multiple li:hover
{
  background: #E4E4E3;
  border-top-right-radius: 20vh;

}
.select2-container--default .select2-selection--multiple li
{
  background: #E4E4E3;
  border-top-right-radius: 20vh;
}
#upload_1,#upload_2,#upload_3,#upload_4,#upload_5,#upload_6
{
    background-image: url('image/upload_image.png');
    background-size: 70px 70px;
    border-radius: 7vh;
    
    /*background: transparent !important;*/

}


.select2-container--default .select2-selection--multiple .select2-selection__rendered {
padding: 6px 12px;
}
input[type='file'] {
        color: transparent; 
        display: none;  
}
.control-label
{
  padding-left: 0px;
}
.select2-search__field::-webkit-input-placeholder {
color:#a7a7ae !important;
}
.select2-search__field:-moz-placeholder { /* Firefox 18- */
color:#a7a7ae !important;
}
 
.select2-search__field::-moz-placeholder { /* Firefox 19+ */
color:#a7a7ae !important;
}
 
.select2-search__field:-ms-input-placeholder {
color:#a7a7ae !important;

}
  

#desc1,#desc2,#desc3,#desc4,#desc5,#desc6
{
  display: none;
  margin-top: 10px;
}

#termsModal .modal-body
{
  height:500px;
  overflow:auto;
}

</style> 
<script type="text/javascript">
  
$( "#date" ).datepicker({
  dateFormat: 'dd-mm-yy',
  // maxDate: new Date(),
  onSelect: function(date) {

    $('#date2').val(date);


  }
 });

function emp()
{
// $('#employee_name').find('option').not(':first').remove();
$('#limitedNumbSelect2').empty().trigger("change");

          


  var emp= $('#subcontractor_name').val();
      
       $.ajax({
        url: 'site_instruction_ajax.php',
        type: 'POST',
        data: {emp: emp},
        // dataType: 'json',
        success: function (data) {
            
            
            $('#hidden_option').html(data);
             
          
   
    }
                  
  });

 } 
function pin_btn()
{
  $("#submit3").attr("disabled", true);
       $("#submit3").attr("value", "Submit");
        $("#submit3").css({"background-color":"#f47821"});
        $("#submit3").animate({color:'white'},100);
}
function pin_btn_aprrove()
{
  $("#submit3").attr("disabled", false);
       $("#submit3").attr("value", "Submit");
        $("#submit3").css({"background-color":"#f47821"});
        $("#submit3").animate({color:'white'},100);
}

function pin_approve()
{
 var pin_enter= $('#pin_enter').val();
 var pin_db= <? echo $_SESSION['pin'] ?>;
 if(pin_enter == pin_db)
 {
  pin_btn_aprrove();
 }
 else
 {
   pin_btn();
 }
}

$(document).ready(function() {
  pin_btn();
});

</script>
					
	<script type="text/javascript">
      
      $(document).ready(function(){
  //Chosen

  //Select2
  $("#limitedNumbSelect2").select2({
        maximumSelectionLength: 15,
    placeholder: "Please Select Employees"
    })
});
      $(document).ready(function(){
  //Chosen
  
  //Select2
  $("#limitedNumbSelect3").select2({
        maximumSelectionLength: 15,
    placeholder: "Please Distribution List",

    
    })
});
 
  function get_image(id)
{
    
    $('#file_'+id).click();

     $('#desc'+id).show();
      $('#desc'+id).attr('required', true);
}


       
    function pcCheck()
   {
        var check = document.getElementById('parentChk');
        var chkElements = document.getElementsByName('ch[]');
        if(check.checked==true)
        {
            for (var i = 0; i < chkElements.length; i++)
            {
                chkElements[i].checked=true;
            }

        }
        if(check.checked==false)
        {
            for (var i = 0; i < chkElements.length; i++)
            {
                chkElements[i].checked=false;   
            }   
        }
    }
    function pCheck()
    {
        var check = document.getElementById('parentChk');
        var chkElements = document.getElementsByName('ch[]');
        for (var i = 0; i < chkElements.length; i++)
        {
            if(chkElements[i].checked==true)
            {
                check.checked=false;
                chkElements[i].checked=false;
                chkElements[i++].checked=false;
            }   
        }
    }    
  
function send_data()
    {   
      // $('#termsModal').modal({'backdrop': 'static'});
      // var arr = new Array();
      //  var element= document.getElementsByClassName("clause");
      //   for(var i=0; i<element.length; i++)
      //   {
      //       if(element[i].checked==true)
      //       {
      //         arr[i]=element[i].value;   
                
      //       }
      //   }
      //   console.log(arr);

        // if($.inArray("2.4.1",arr)==-1 || $.inArray("2.4.2",arr)==-1 || $.inArray("2.7",arr)==-1 || $.inArray("5.3",arr)==-1 || $.inArray("5.7.2",arr)==-1 )
        // {
        //   alert("Please tick the mandatory Clauses (2.4.1,2.4.2,2.7,5.3,5.7.2)");
        // }
        // else
        // {
        //   // alert("ok baby");
        //   toggle=1;
        //   $('#clause_hide').val(arr.join());
        //   $("#close_modal").click()

        // }
          

          // data-dismiss="modal"



        
    }
      
    </script>	
    <script>
// uploader1
var imageLoader = document.getElementById('file_1');
    imageLoader.addEventListener('change', handleImage, false);

function handleImage(e) {
    
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox;
dropbox = document.getElementById("uploader");
dropbox.addEventListener("dragenter", dragenter, false);
dropbox.addEventListener("dragover", dragover, false);
dropbox.addEventListener("drop", drop, false);

function dragenter(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop(e) {
			document.getElementById("viewer").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader.files = files;
  $('#desc1').show();
      $('#desc1').attr('required', true);
}
</script>
<script>
// uploader2

var imageLoader2 = document.getElementById('file_2');
    imageLoader2.addEventListener('change', handleImage2, false);

function handleImage2(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader2 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox2;
dropbox2 = document.getElementById("uploader2");
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
			document.getElementById("viewer2").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader2.files = files;
   $('#desc2').show();
      $('#desc2').attr('required', true);
}
</script>
<script>
// uploader3

var imageLoader3 = document.getElementById('file_3');
    imageLoader3.addEventListener('change', handleImage3, false);

function handleImage3(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader3 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox3;
dropbox3 = document.getElementById("uploader3");
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
				document.getElementById("viewer3").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader3.files = files;
   $('#desc3').show();
      $('#desc3').attr('required', true);
}
</script>
<script>
// uploader4

var imageLoader4 = document.getElementById('file_4');
    imageLoader4.addEventListener('change', handleImage4, false);

function handleImage4(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader4 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbo4;
dropbox4 = document.getElementById("uploader4");
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
				document.getElementById("viewer4").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader4.files = files;
   $('#desc4').show();
      $('#desc4').attr('required', true);
}

// var toggle=0
function terms_check()
{
  var check=$('#clause_filled_hide').val();
  // alert("Please Select Subcontract Conditions");
  if(check=="")
  {
    alert("Please Select Atleast One  Subcontract Conditions");
     return false;
  }
 
}




 // console.log( val);
var textArray= {"2.1.3": "The Contractor is entitled to require the Subcontractor at the Subcontractor's own cost from time to time to reschedule the performance of the whole or any part of the Subcontract Works including returning to the site on not less than 24 hours' notice to recommence the Subcontract Works. The Subcontractor is entitled to an extension of time if completion of the Subcontract Works is delayed by any such requirement. The Subcontractor acknowledges that any such requirement by the Contractor is not a breach of the Subcontract and the Contractor is not liable for any damages, costs and expenses suffered or incurred by the Subcontractor in complying with the requirement.",
    "2.4.1" : "The Subcontractor must carry out the Subcontract Works in accordance with any directions given by the Contractor from time to time. If any direction by the Contractor is not given in writing, it must be confirmed in writing within 3 days of the direction.If the Contractor considers there is an emergency, it may give an oral direction, which must be acted on immediately by the Subcontractor and confirmed in writing by the Contractor within 24 hours.",
    "2.4.2" : "If the Subcontractor wishes to claim that a direction, although not stated to be a variation, involves a variation, it must lodge written notice with the Contractor to that effect within 3 days of receipt of the direction otherwise any subsequent claim that a variation is involved is barred absolutely.Without limiting this clause, the Contractor may concede in a particular instance or instances that a variation is involved without waiving the requirement for such written notice to be given in all other instances.",
    "2.7" : "<b>Cleaning Up</b><br> When on site, the Subcontractor must clean up and remove all rubbish from the site daily or, if so directed by the Contractor to designated areas on the site.  Upon completion of the Subcontract Works, the Subcontractor must leave the site in a clean and tidy condition.If the Subcontractor fails within 24 hours from the receipt of a written direction by the Contractor to clean up or remove rubbish, the Contractor may (without being obliged to do so) arrange for the cleaning up, or, removal of the rubbish at the Subcontractors expense and the cost of doing so is a debt due and owing to the Contractor.  The Contractor will advise the Subcontractor of any costs incurred under this clause.",
    "5.3" : "<b>Work by Others</b><br> If the Subcontract Works is dependent on or appreciably affected by the quality of any other work to be carried out or that has been carried out by the Contractor or any Separate Contractors ('other work'):",
    "5.3.1" : "if the other work is defective, the Subcontractor must immediately notify the Contractor in writing so that the Contractor may arrange for the defects to remedied; and",
    "5.3.2" : "if the Subcontractor accepts the other work by proceeding with the execution of the Subcontract Works and the other work is subsequently found to be defective, then upon rectification of the other work by the Contractor (or any Separate Contractor), if directed by the Contractor the Subcontractor will re-execute that part of the Subcontract Works at no additional cost.",
    "5.7.2" : " If the Contractor discovers materials or work which is not in accordance with the Subcontract, the Contractor may direct the Subcontractor to comply with the Subcontract and to:",
    "5.7.3.1" : "remove materials from the site;",
    "5.7.3.2" : "demolish work;",
    "5.7.3.3" :  "reconstruct, replace, or correct the materials or work; or",
    "5.7.3.4" : " not deliver the materials or work to the site.",
    "5.7.4" : "The Subcontractor must comply with all such directions within the times specified by the Contractor and at no cost to the Contractor.",
    "5.8" : "<b>Cost of Rectification or Compliance</b><br>If the Subcontractor fails to comply with any direction from the Contractor given under the Subcontract and, in particular any direction under clauses 2.4, 2.7, 5.3, 5.5, 5.7 and 14.2 then, without giving further notice, the Contractor may arrange for compliance itself by performing the relevant work or by engaging others to do so and the cost of such performance will be a debt due and owing to the Contractor by the Subcontractor."};


var checked_arr = [];
// onclick="send_data()"

$('.clause').change(function(e) {

         var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
     
    checked_arr = val;
    var arr = new Array();
     $.each(checked_arr, function(key, value) {
        // console.log(key, value);
        var valuew = value.bold();
         arr.push(valuew+ " " +':'+ " "+textArray[value]+"<br /><br />");
         // $('#clause_filled').show();
         $('#clause_filled').html(arr);
         // var ret = $('#clause_filled').html().replace('data-','');
         $('#contract_condition').show();

         $('#contract_condition').html( $('#clause_filled').html());

    });
     if(checked_arr == "")
         {
                $('#contract_condition').hide();

          $('#clause_filled').hide();
                $('#contract_condition').html('');

         }
// console.log(arr);
 $("#clause_filled_hide").val(val);
}); 

    
      
  
     // $texts = $clauses[$key];
     // array_push($texts, $textArray[$value]);
    
  

</script>					
						        
					

<!--   <div class="form-group"> 
 <label class="col-md-3 control-label">Requested Completion Date</label>
<label class="col-md-3 control-label"></label>
    <div class="col-md-7 inputGroupContainer">
   
    <div class="input-group">
   <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    <input type="text" name="date" id="date" class="form-control"  readonly placeholder="Click Here To Select Date"  />

    <input type="hidden" name="req_date2" id="date2" class="form-control"  readonly placeholder="DD/MM/YYYY" />
</div>
</div>
  </div> -->
 
 <!-- The Modal -->
											<div id="myModal" class="modal">
											  <div class="modeliconbackgroundcolor">
											  <span class="close ">&times;</span>
				<a class="help-button  downloadupaddinvoice1 fa fa-downlode" id="onerrorm1"   download style="display:none">Download </a>
				<a class="help-button  downloadupaddinvoice2 fa fa-downlode" id="onerrorm2"   download style="display:none">Download </a>
				<a class="help-button  downloadupaddinvoice3 fa fa-downlode" id="onerrorm3"   download style="display:none">Download </a>
				<a class="help-button  downloadupaddinvoice4 fa fa-downlode" id="onerrorm4"   download style="display:none">Download </a>
  
											  

											 
											  </div>
											  <img class="modal-content modal-content-image north" id="img01"  >
											  <div id="caption"></div>
										</div>

<script>
// file downlode for file_1
$(".downloadupaddinvoice1").click(function(){
        var filename = $('#file_1').val();

        
       
            var file = document.getElementById('file_1').files[0];      
            var filename = document.getElementById('file_1').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);

            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = "";
        

    }) 
</script>
<script>
// file downlode for file_1
$(".downloadupaddinvoice2").click(function(){
        var filename = $('#file_2').val();

        
       
            var file = document.getElementById('file_2').files[0];      
            var filename = document.getElementById('file_2').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);

            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = "";
        

    }) 
</script>
<script>
// file downlode for file_1
$(".downloadupaddinvoice3").click(function(){
        var filename = $('#file_3').val();

        
       
            var file = document.getElementById('file_3').files[0];      
            var filename = document.getElementById('file_3').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);

            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = "";
        

    }) 
</script>
<script>
// file downlode for file_1
$(".downloadupaddinvoice4").click(function(){
        var filename = $('#file_4').val();

        
       
            var file = document.getElementById('file_4').files[0];      
            var filename = document.getElementById('file_4').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);

            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = "";
        

    }) 
</script>
<script>

	// model script for first image
	
var modal = document.getElementById('myModal');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById('caption');
// alert(fileVal.value);

// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg = document.getElementById('viewer');
var img = document.getElementById('upload_1');
viewerimg.onclick = function(){
	if(img.src != "" ) 
	{
		modal.style.display = "block";
		modalImg.src = img.src;
		captionText.innerHTML = img.alt;
		// alert(img.src);
		if(img.src.split("/").reverse()[0] == 'Document.png' )
		{
			document.getElementById("onerrorm1").style.display = "block";		
		}
		else 
		{
			document.getElementById("onerrorm1").style.display = "none";
		}
	}
	
}
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}		
</script>
<script>
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg2 = document.getElementById('viewer2');
var img2 = document.getElementById('upload_2');
viewerimg2.onclick = function(){
	if(img2.src != "" ) 
	{
		modal.style.display = "block";
		modalImg.src = img2.src;
		captionText.innerHTML = img2.alt;
		// alert(img.src);
		if(img2.src.split("/").reverse()[0] == 'Document.png' )
		{
			document.getElementById("onerrorm2").style.display = "block";		
		}
		else 
		{
			document.getElementById("onerrorm2").style.display = "none";
		}
	}
	
}
</script>
<script>
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg3 = document.getElementById('viewer3');
var img3 = document.getElementById('upload_3');
viewerimg3.onclick = function(){
	if(img3.src != "" ) 
	{
		modal.style.display = "block";
		modalImg.src = img3.src;
		captionText.innerHTML = img3.alt;
		// alert(img.src);
		if(img3.src.split("/").reverse()[0] == 'Document.png' )
		{
			document.getElementById("onerrorm3").style.display = "block";		
		}
		else 
		{
			document.getElementById("onerrorm3").style.display = "none";
		}
	}
	
}
</script>
<script>
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg4 = document.getElementById('viewer4');
var img4 = document.getElementById('upload_4');
viewerimg4.onclick = function(){
	if(img4.src != "" ) 
	{
		modal.style.display = "block";
		modalImg.src = img4.src;
		captionText.innerHTML = img4.alt;
		// alert(img.src);
		if(img4.src.split("/").reverse()[0] == 'Document.png' )
		{
			document.getElementById("onerrorm4").style.display = "block";		
		}
		else 
		{
			document.getElementById("onerrorm4").style.display = "none";
		}
	}
	
}
</script>
 <style>
<!-- Get the modal css -->
#upload_1 , #upload_2,#upload_3,#upload_4 {
    cursor: pointer;
    transition: 0.3s;
}



/* The Modal (background) */
#myModal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 50px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.7); /* Black w/ opacity */
    z-index: 999;
}

/* Modal Content (image) */
.modal-content-image {
    margin: auto;
    display: block;
    width: 50%;
    max-width: 500px;
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

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: white !important;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
	opacity: 5.2 !important;
}
.downloadupaddinvoice1,.downloadupaddinvoice2,.downloadupaddinvoice3,.downloadupaddinvoice4 {
	  position: absolute;
    top: 30px;
    right: 65px;
	
    color: white !important;
    font-size: 20px;
    transition: 0.3s;
	opacity: 5.2 !important;
	
}

.close:hover,
.close:focus {
    color: white !important;
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

	    					