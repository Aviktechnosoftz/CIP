<?php
session_start();
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


<div class="wrapper" style="border: 1px solid grey;
    float: left;
    position: absolute;
    /* margin: -220px 0 0 -200px; */
    margin-top: -25vh;
    top: 38.5vh;
    left: 27.5vw;
    width: 72.5vw;
    overflow-x: hidden;
    background-color: #f5f5f5;
    border-radius: 4px;
    overflow-y: scroll;
    max-height: 82vh;">
 <center>

<div class="container">
<div class="col-md-9">
<form class="well form-horizontal" action=" " method="post"  id="contact_form"  enctype="multipart/form-data">
  <fieldset>

  <!-- Form Name -->
  <legend>Site Instruction Form No. <?= $instruction_no->id ?></legend> 
  <input type="hidden" name="id" value="<?= $instruction_no->id ?>">
  <div class="alert alert-danger" style="<? if($counter!='1'){ echo 'display:none;';}?> ">
    <strong>Incorrect!</strong> Please Fill All Fields
  </div>
  <div class="form-group">
     <label class="col-md-4 control-label" style="text-align: right;color: #E74C3C"><? echo $project_name->project_name ?> "ART" Project</label> 
     <label class="col-md-4 control-label" style="text-align: left;float:right;color: #E74C3C">Project No. : <span style="color:#E74C3C"> <? echo $project_name->number ?></span></label> 

  </div>

<!-- Text input-->
<div class="form-group"> 

  <label class="col-md-3 control-label">Subject</label>
    <div class="col-md-7 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
      
  <input name="subject" id="date_show" placeholder="Subject Goes Here" class="form-control"  type="text" name="date_today" value="" required>
    </div>
  </div>
</div>
<div class="form-group"> 

  <label class="col-md-3 control-label"></label>
    <div class="col-md-7 inputGroupContainer">
   <div class="input-group">
        
       <div class="alert alert-info" style="text-align: justify;">
  <strong>Site Instruction: </strong> This instruction is not a variation to the Subcontract. Should,however, the execution of the instruction result in additional costs which, in the opinion of the Trade Contractor would justify an application for a variation, then the Trade Contractor must submit sucha a claim within three (3) days of receipt of this instruction. Failure to do so will signify acceptance of this instruction without cost.
    </div>
  </div>
  
  </div>
</div>
<div class="h-divider">
<br>
<div class="form-group"> 
<label class="col-md-3 control-label">To</label>
    <div class="col-md-3 inputGroupContainer">
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
<label class="col-md-1 control-label">Date</label>
    <div class="col-md-3 inputGroupContainer">
   <div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
 <input  id="" placeholder="Date Goes Here" class="form-control"  type="text" name="date_today" value="<? echo date('d/m/y') ?>" readonly>
  </div>
  </div>
</div>

<div class="form-group"> 
<label class="col-md-3 control-label">Page</label>
    <div class="col-md-3 inputGroupContainer">
   <div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
  <input  id="" placeholder="Page Goes Here" class="form-control"  type="text" value="01" readonly>
</div>
 </div>
 <label class="col-md-1 control-label">Of</label>
    <div class="col-md-3 inputGroupContainer">
   <div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
 <input id="" placeholder="Of Goes Here" class="form-control"  type="text"  value="01" readonly>
</div>
  </div>
</div>


<div class="form-group"> 
<label class="col-md-3 control-label">Phone No.</label>
    <div class="col-md-3 inputGroupContainer">
   <div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input  id="phone" placeholder="Phone Goes Here" class="form-control"  type="text" value="" readonly>
</div>
 </div>
 <label class="col-md-1 control-label">Email</label>
    <div class="col-md-3 inputGroupContainer">
   <div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
 <input id="email" placeholder="Email Goes Here" class="form-control"  type="text"  value="" readonly>
</div>
  </div>
</div>
<div class="form-group"> 
 <label class="col-md-3 control-label">Attention</label>
<label class="col-md-3 control-label"></label>
    <div class="col-md-7 inputGroupContainer">
   <div class="input-group">
     <span class="input-group-addon"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
    <!-- <select  class="form-control selectpicker"  id="employee_name" name="employee_name" required >
    <option value=""> Please Select Employee</option>
  
    </select> -->

   <select name="employee[]" id="limitedNumbSelect2" class="form-control selectpicker" multiple="true"  style="">
       
        </select>

</div>
  </div>
  
  </div>
<div class="form-group"> 
 <label class="col-md-3 control-label">Instruction</label>
<label class="col-md-3 control-label"></label>
    <div class="col-md-7 inputGroupContainer">
   <div class="alert alert-info" style="text-align: center;">
  Instructions to be detailed with reference to attachments as necessary
    </div>
    <div class="input-group">
   <span class="input-group-addon" id="addon"></span>
    <textarea class="form-control" rows="20" id="comment" name="instruction" required></textarea>
</div>
</div>
  </div>

  <div class="form-group"> 
<label class="col-md-3 control-label">Requested Completion Date</label>
    <div class="col-md-3 inputGroupContainer">
   <div class="input-group">
 <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
<input type="text" name="date" id="date" class="form-control"  readonly placeholder="Click Here To Select Date"  />

    <input type="hidden" name="req_date2" id="date2" class="form-control"  readonly placeholder="DD/MM/YYYY" />
</div>
 </div>
<!--  <label class="col-md-1 control-label">Pin</label>
    <div class="col-md-3 inputGroupContainer">
   <div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
 <input name="req_date" id="pin_enter" placeholder="Pin To Submit" class="form-control"  type="password"  value="" required onkeyup="pin_approve()">

</div>
  </div> -->

</div>



  <div class="form-group"> 
<label class="col-md-3 control-label">Issued By</label>
    <div class="col-md-3 inputGroupContainer">
   <div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="issue_by" id="" placeholder="Issued By Here" class="form-control"  type="text"  value="<?=$issue_details->given_name." ".$issue_details->surname ?>" readonly>
</div>
 </div>
 <!-- <label class="col-md-1 control-label">Date</label>
    <div class="col-md-3 inputGroupContainer">
   <div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
 <input name="req_date" id="" placeholder="Date Goes Here" class="form-control"  type="text"  value="<? echo date('d/m/y') ?>" readonly>

</div>
  </div> -->

</div>
<div class="form-group"> 
 <label class="col-md-3 control-label">SI</label>
<label class="col-md-3 control-label"></label>
    <div class="col-md-7 inputGroupContainer">
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




<div class="form-group">
                                    <div class="form-group col-sm-2" style="padding-left: 0px;padding-right: 0px;">
                                    <img id="upload_1"  width="70" height="70"  onclick="get_image(1)" />
                                   <input type="file" name="photo[]" id="file_1" 
                                    onchange="document.getElementById('upload_1').src = window.URL.createObjectURL(this.files[0])">
                                    </div>

                                    <div class="form-group col-sm-2" style="padding-left: 0px;padding-right: 0px;">
                                    <img id="upload_2"  width="70" height="70" onclick="get_image(2)" />
                                     <input type="file" name="photo[]" id="file_2" 
                                    onchange="document.getElementById('upload_2').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                     <div class="form-group col-sm-2" style="padding-left: 0px;padding-right: 0px;">
                                    <img id="upload_3"  width="70" height="70" onclick="get_image(3)" />
                                   <input type="file" name="photo[]" id="file_3" 
                                    onchange="document.getElementById('upload_3').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    <div class="form-group col-sm-2" style="padding-left: 0px;padding-right: 0px;">
                                    <img id="upload_4"  width="70" height="70"  onclick="get_image(4)"/>
                                   <input type="file" name="photo[]" id="file_4" 
                                    onchange="document.getElementById('upload_4').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    <div class="form-group col-sm-2" style="padding-left: 0px;padding-right: 0px;">
                                    <img id="upload_5"  width="70" height="70"  onclick="get_image(5)"/>
                                   <input type="file" name="photo[]" id="file_5" 
                                    onchange="document.getElementById('upload_5').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    <div class="form-group col-sm-2" style="padding-left: 0px;">
                                    <img id="upload_6"  width="70" height="70"  onclick="get_image(6)"/>
                                   <input type="file" name="photo[]" id="file_6" 
                                    onchange="document.getElementById('upload_6').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    
                                    
                                                                        
 </div>
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

    
 <label class="col-md-5 control-label">Pin</label>
    <div class="col-md-3 inputGroupContainer" style="">
   <div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
 <input name="req_date" id="pin_enter" placeholder="Pin To Submit" class="form-control"  type="password"  value="" required onkeyup="pin_approve()">
 </div>
 <div class="col-md-12 inputGroupContainer">
   <div class="input-group">
<h5 class="text-center"><input type="submit" id="submit3" name="save" value="Save Instructions" class="btn btn-primary btn-success" style="border-radius: 15px;margin-top: 4vh;"></h5>
</div>
  </div>

</div>
  </div>

</div>

</div>


</div>


</form>
</div>
    </div><!-- /.container -->

<span id="hidden_option" style="display: none;"></span>
</div>
</div>        
</center> 
 
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
 margin-bottom:5px;
 height:1px;
 width:100%;
 border-top:1px solid gray;
}
#attention
{
    border: 0;
    border-bottom: 1.5px solid black;
    outline: 0;
}

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
.select2-selection
{
  border-radius: 10vh;
}
#date
{
  width: 30vw;
}
.container
{
/*width: 1027px;*/
width: 80vw;
}

.select2-container--default .select2-selection--multiple:hover {
    cursor: pointer;
    
}

.select2-container--default .select2-selection--multiple li:hover {
    background: white;
    cursor: pointer;
}

.input-group {
   
    z-index: 0;
}
.form-horizontal .control-label { 
    
    font-weight: 100;
    font-style: italic;
    text-align: center;
    padding-top: 7px;
    margin-bottom: 0;
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
  color: #DF5430;font-family: Helvetica_Nue;font-weight: 200;
}

#submit3
{
  background-color: #f47821;
  color: white;
  outline: none;
  border:none;
}

.select2-container--default.select2-container--focus .select2-selection--multiple {
    border: none;
    outline: 0;
    
}

.select2-container--default.select2-container--focus .select2-selection--multiple {

border-top-right-radius: 10vh;
    border-bottom-right-radius: 10vh;
    background: #E4E4E3;
}

.select2-container--default.select2-container .select2-selection--multiple {
    border: none;
    outline: 0;
    background: #E4E4E3;
    
}

.select2-container--default.select2-container .select2-selection--multiple {

    border-top-right-radius: 10vh;
    border-bottom-right-radius: 10vh;
}

.select2-container--open .select2-dropdown--below {
   
    border: none;
    
    border-bottom-right-radius: 10vh;
}
.select2-container--default.select2-container--open.select2-container--below .select2-selection--single, .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple
{
  background: #E4E4E3;
}

.select2-container--default .select2-selection--multiple li:hover
{
  background: #E4E4E3;
}
.select2-container--default .select2-selection--multiple li
{
  background: #E4E4E3;
}

.select2-search__field {
  width: 750px !important;
}
#upload_1,#upload_2,#upload_3,#upload_4,#upload_5,#upload_6
{
    background-image: url('image/upload_image.png');
    background-size: 70px 70px;
    border-radius: 7vh;
    border:solid 1px grey;

}
input[type='file'] {
        color: transparent; 
        display: none;  
}
 .select2-container.select2-dropdown-open {
    width: 170%;
  }

  .select2-selection__rendered
  {
    border-radius: 10vh !important;
  }
</style>

<footer>
  <? include("footer.php"); ?>
<footer>

<script type="text/javascript">
  
$( "#date" ).datepicker({
  dateFormat: 'dd-mm-yy',
  maxDate: new Date(),
  onSelect: function(date) {

    $('#date2').val(date);


  }
 });

function emp()
{
// $('#employee_name').find('option').not(':first').remove();
$('#limitedNumbSelect2').empty().trigger("change");;


          


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
       $("#submit3").attr("value", "Enter Pin To Save Instructions");
        $("#submit3").css({"background-color":"#f47821"});
        $("#submit3").animate({color:'white'},100);
}
function pin_btn_aprrove()
{
  $("#submit3").attr("disabled", false);
       $("#submit3").attr("value", "Save Instructions");
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
  // $('ul').find('.select2-selection__rendered').css('background-color'.'red');


});

</script>
					
	<script type="text/javascript">
      
      $(document).ready(function(){
  //Chosen
      
  //Select2
  $("#limitedNumbSelect2").select2({
        maximumSelectionLength: 10,
    placeholder: "Please Select Employees"
    })
});
      $(document).ready(function(){
  //Chosen
  
  //Select2
  $("#limitedNumbSelect3").select2({
        maximumSelectionLength: 10,
    placeholder: "Please Distribution List",

    
    })
});
 


       
        
  function get_image(id)
{
    
    $('#file_'+id).click();


}

      
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

	    					