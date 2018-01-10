<?php

session_start();
// error_reporting(0);
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
if(isset($_REQUEST['set']))
{
  header("location:approved_forms.php");
}

 $id= @$_POST['attendance_form'];
 $type= @$_POST['type'];
 // echo $type;
 // $get_query=$conn->query("Select tbl_employee.id,concat(tbl_employee.given_name,' ',tbl_employee.surname) as name,tbl_employer.company_name,tbl_employer.phone_no,tbl_employer.Tread,tbl_employer.email_add,tbl_site_attendace.induction_no,tbl_site_attendace.id as attendance_id,tbl_site_attendace.employees_location,tbl_site_attendace.no_of_worker,tbl_site_attendace.today_date FROM tbl_employee JOIN tbl_site_attendace ON tbl_employee.id = tbl_site_attendace.induction_no JOIN tbl_induction_register ON tbl_employee.id = tbl_induction_register.id JOIN tbl_employer ON tbl_employer.id = tbl_induction_register.empid AND tbl_site_attendace.id=".$id." ORDER BY today_date DESC")->fetch_object();
 if($id != "")
 {
  // echo $id;
  $get_query=$conn->query("select tbl_site_attendace.id,tbl_site_attendace.employees_location,tbl_site_attendace.induction_no,tbl_site_attendace.image_1,tbl_site_attendace.image_2,tbl_site_attendace.image_2,tbl_site_attendace.image_3,tbl_site_attendace.image_4,tbl_site_attendace.image_5,tbl_site_attendace.image_6,tbl_site_attendace.image_1_text,tbl_site_attendace.image_2_text,tbl_site_attendace.image_3_text,tbl_site_attendace.image_4_text,tbl_site_attendace.image_5_text,tbl_site_attendace.image_6_text,tbl_employer.*,company_name,concat(emp2.given_name, ' ',emp2.surname) as Name, if(whom != 0 , 'Web','App') as 'Type' ,tbl_site_attendace.whom, tbl_site_attendace.today_date,tbl_site_attendace.no_of_worker from tbl_site_attendace  left join tbl_employee emp1 on tbl_site_attendace.induction_no = emp1.id  left join tbl_employer on emp1.employer_id = tbl_employer.id left join tbl_employee emp2 on IF(whom = 0 ,tbl_site_attendace.induction_no = emp2.id ,tbl_site_attendace.whom = emp2.id) where tbl_site_attendace.id='".$id."'  order by tbl_site_attendace.id desc")->fetch_object();

$capture_query= $conn->query("select tbl_site_attendace.id, employer_id, tbl_site_attendace.project_id, tbl_site_attendace.today_date, IF( whom =0, tbl_site_attendace.induction_no, tbl_site_attendace.whom ) AS induction_number, whom
FROM  `tbl_site_attendace` 
LEFT JOIN  `tbl_employee` ON IF( whom =0, tbl_site_attendace.induction_no = tbl_employee.id, tbl_site_attendace.whom = tbl_employee.id ) where tbl_site_attendace.id='".$id."' ORDER BY today_date DESC")->fetch_object();



$search_query= $conn->query("select * from tbl_capture where (induction_id='".$capture_query->induction_number."' AND capture_date='".$capture_query->today_date."' and project_id='".$capture_query->project_id."' and employer_id='".$capture_query->employer_id."')");


  if($search_query->num_rows > 0)
  {
    if($get_query->image_1=="" OR $get_query->image_2=="" OR $get_query->image_3=="" OR $get_query->image_4=="" OR $get_query->image_5=="" OR $get_query->image_6=="" )
    {
       $counter=1;
    }
    else
    {
      $counter=2;
    }
  }
  else
  {
    $counter=0;
  }
}



if(isset($_POST['show'])== true)
{
  
}

if(isset($_POST['save'])== true)
{
  print($_POST);
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
 <? include('test_side_new.php');?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

 </header>


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

<div class="col-lg-12"> -->
<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">SAFETY MANAGEMENT SYSTEM</legend>
        <label class="col-md-12 control-label form-name">SITE ATTENDANCE FORM</label>

        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>

<div class="Main_Form2">
  <div class="col-md-12">
    <form class="well form-horizontal well_class" method="post"  id="contact_form" action="test_image_gallery.php" enctype="multipart/form-data">
        <fieldset>
        <div class="form-group">
            <div class="col-md-12" style="padding-left: 0px;padding-bottom: 25px;">
                <label class="col-md-12 control-label" style="padding-left: 0px;"><span class="project_title" style="">PROJECT :&nbsp;<? echo $project_name->project_name ?> </span></label>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-12 note" style="margin-bottom: 15px">
             NOTE: All subcontractor must record total number of workers on site each day by no later than 9am.<br>For any workers starting on site after 9am the form must be filled in or adjusted immediately upon their arrival on site
            </div>
        </div>

         <div class="form-group">
            <span class="col-md-6 label-title">INDUCTED PERSON</span>          
        </div>

      

      <div class="form-group">
        <label class="col-md-12 control-label label-position">Employer/Business Name</label> 
        <div class="col-md-12 zeropadding">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="last_name" placeholder="Employer Name" class="form-control"  type="text" value="<? echo $get_query->company_name; ?>" readonly>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-12 control-label label-position">Filled By</label>  
        <div class="col-md-12 zeropadding">
          <div class="input-group" >
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input name="email" placeholder="Subcontractor Name" class="form-control"  type="text" value="<? echo $get_query->Name; ?>" readonly>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-12 control-label label-position">Submitted From</label>  
        <div class="col-md-12 label-position">
          <span class="leftpadding">
            <? if($type=="App")
            { ?>
            <img src="image/app2.gif" height="31vh" width="20vw">
            <? }
            else{ ?>
          <img src="image/web2.gif" height="32vh" width="30vw">
           <? } ?>
          </span>

              <!-- <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="email" placeholder="Subcontractor Name" class="form-control"  type="text" value="<? //echo $get_query->given_name." ".$get_query->name; ?>" readonly>
              </div> -->
          </div>
        </div>

       
        <div class="form-group">
          <label class="col-md-12 control-label label-position">Mobile No. #</label>  
          <div class="col-md-12 zeropadding">
            <div class="input-group" id="">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input name="phone" placeholder="(845)555-1212" class="form-control" type="text" value="<? echo $get_query->phone_no; ?>" readonly>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12 control-label label-position">Trade</label>  
          <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
                <input name="address" placeholder="Address" class="form-control" type="text" value="<? echo $get_query->Tread ?>" readonly>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12 control-label label-position">Email Address</label>  
          <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input name="city" placeholder="Enail Address" class="form-control"  type="text" value="<? echo $get_query->email_add?>" readonly>
            </div>
          </div>
        </div>

        <div class="form-group"> 
          <label class="col-md-12 control-label label-position">Date</label>
          <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>              
                <input name="city" id="date_show" placeholder="Date" class="form-control"  type="text" value="<? echo $get_query->today_date; ?>" readonly>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12 control-label label-position">Number of Workers on Site</label>  
          <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                <input name="zip" id="no_worker" placeholder="No. of Workers" class="form-control"  type="text" value="<? echo $get_query->no_of_worker ?>" >
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-12 label-position">
            <div id="text_below">
              <i><? echo $get_query->company_name ?>&nbsp;has:&nbsp;<?echo $get_query->no_of_worker?>&nbsp;Men Onsite<? echo "\r\n" ?><? echo $get_query->trade ?></i>
            </div>  
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12 control-label label-position">Location and Activities per Worker</label>
          <div class="col-md-12 zeropadding">    
              <textarea class="form-control worker-location" name="comment" id="loc" placeholder="3 men working in the main warehouse pouring slab 27
3 men digging the stormwater trench to main carpark 
2 men installing bollards to doorways D38 & D36" readonly><? echo $get_query->employees_location  ?></textarea>
          </div>
        </div>

<!-- Images Upload -->
     <!--    <div class="form-group">
          <label class="col-md-12 control-label label-position">Uploaded Documents:</label>
          <div class="col-md-4 text-center">
            <input type="file" name="photo[]" id="imgInp1" onchange="loadFile1(event);">
            <img class="preview" id="preview1"  <? if($get_query->image_1!="") { echo 'src=API/Uploads/'.$get_query->image_1;} ?>  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
            <input type="button"  id="saveForm" onclick="delete_image(1)" style="background-image: url(image/icon_icon_delete.png);" />
            <label  class="form-control"   id="desc1" style="text-align: left;background-color: transparent;"> Description:&nbsp;<? if($get_query->image_1_text != "" ) {echo $get_query->image_1_text; }else {echo "NA";}?> </label>
          </div>

          <div class="col-md-4 text-center">
         <input type="file" name="photo[]" id="imgInp2" onchange="loadFile2(event);">
         <img class="preview" id="preview2"  <? if($get_query->image_2!="") { echo 'src=API/Uploads/'.$get_query->image_2;} ?>  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
          <input type="button"  id="saveForm" onclick="delete_image(2)" style="background-image: url(image/icon_icon_delete.png);" />
          <label  class="form-control"   id="desc2" style="text-align: left;background-color: transparent;"> Description:&nbsp;<? if($get_query->image_2_text != "" ) {echo $get_query->image_2_text; }else {echo "NA";}?> </label>
          </div>

      <div class="col-md-4 text-center">
      <input type="file" name="photo[]" id="imgInp3" onchange="loadFile3(event);">
     <img class="preview" id="preview3"  <? if($get_query->image_3!="") { echo 'src=API/Uploads/'.$get_query->image_3;} ?>  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
      <input type="button"  id="saveForm" onclick="delete_image(3)" style="background-image: url(image/icon_icon_delete.png);" />
      <label  class="form-control"   id="desc3" style="text-align: left;background-color: transparent;"> Description:&nbsp;<? if($get_query->image_3_text != "" ) {echo $get_query->image_3_text; }else {echo "NA";}?> </label>
      </div>
</div>
<div class="form-group">
      <div class="col-md-4 text-center">
      <input type="file" name="photo[]" id="imgInp4" onchange="loadFile4(event);">
     <img class="preview" id="preview4"  <? if($get_query->image_4!="") { echo 'src=API/Uploads/'.$get_query->image_4;} ?>  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
      <input type="button"  id="saveForm" onclick="delete_image(4)" style="background-image: url(image/icon_icon_delete.png);" />
      <label  class="form-control"   id="desc4" style="text-align: left;background-color: transparent;"> Description:&nbsp;<? if($get_query->image_4_text != "" ) {echo $get_query->image_4_text; }else {echo "NA";}?> </label>
      </div>

      <div class="col-md-4 text-center">
      <input type="file" name="photo[]" id="imgInp5" onchange="loadFile5(event);">
     <img class="preview" id="preview5"  <? if($get_query->image_5!="") { echo 'src=API/Uploads/'.$get_query->image_5;} ?> style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
      <input type="button"  id="saveForm" onclick="delete_image(5)" style="background-image: url(image/icon_icon_delete.png);" />
      <label  class="form-control"   id="desc5" style="text-align: left;background-color: transparent;"> Description:&nbsp;<? if($get_query->image_5_text != "" ) {echo $get_query->image_5_text; }else {echo "NA";}?> </label>
      </div>

      <div class="col-md-4 text-center">
      <input type="file" name="photo[]" id="imgInp6" onchange="loadFile6(event);">
     <img class="preview" id="preview6"  <? if($get_query->image_6!="") { echo 'src=API/Uploads/'.$get_query->image_6;} ?>  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
      <input type="button"  id="saveForm" onclick="delete_image(6)" style="background-image: url(image/icon_icon_delete.png);" />
      <label  class="form-control"   id="desc6" style="text-align: left;background-color: transparent;"> Description:&nbsp;<? if($get_query->image_6_text != "" ) {echo $get_query->image_6_text; }else {echo "NA";}?> </label>
      </div>
</div> -->

   <div class="form-group">

              <div class="col-md-2 text-left" style="">
                  <!-- <input type="file" name="photo[]" id="imgInp" onchange="loadFile2(event);">
                  <img class="preview" id="preview2" style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;"> -->
                                   <span class="glyphicon glyphicon-eye-open" id="viewer1" onclick="get_image(1)" style="" ></span>

          <img id="upload_1"  width="70" height="70"  onclick="$('#file_1').click()"  <? if($get_query->image_1!="") { echo 'src=API/Uploads/'.$get_query->image_1;} else { echo 'src=image/upload_image.png';} ?> onerror="onerrorfun(1) ;"/>
                                   <input type="file" name="photo[]" id="file_1" 
                                    onchange="document.getElementById('upload_1').src = window.URL.createObjectURL(this.files[0]);          $('#viewer1').show();">
                                    <input type="button"  id="saveForm" onclick="delete_image(1)" style="background-image: url(image/icon_delete.png);" class="btn" />
                  <input name="desc1" placeholder="Image Description" class="simple_field form-control"  id="desc1"  type="text" value="<? if($get_query->image_1_text != "" ) {echo $get_query->image_1_text; }else {echo "NA";}?> " readonly>
              </div>

              

              <div class="col-md-2 text-center" style="padding-left: 0px">
                  <!-- <input type="file" name="photo[]" id="imgInp" onchange="loadFile2(event);">
                  <img class="preview" id="preview2" style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;"> -->
                 <span class="glyphicon glyphicon-eye-open" id="viewer2" onclick="get_image(2)" style="" ></span>
                 
         <img id="upload_2"  width="70" height="70"  onclick="$('#file_2').click()" <? if($get_query->image_2!="") { echo 'src=API/Uploads/'.$get_query->image_2;} else { echo 'src=image/upload_image.png';} ?> onerror="onerrorfun(2) ;"/>
                                   <input type="file" name="photo[]" id="file_2" 
                                    onchange="document.getElementById('upload_2').src = window.URL.createObjectURL(this.files[0]);          $('#viewer2').show();">
                                    <input type="button"  id="saveForm" onclick="delete_image(2)" style="background-image: url(image/icon_delete.png);" class="btn"/>
                  <input name="desc2" placeholder="Image Description" class="simple_field form-control"  id="desc2"  type="text" value="<? if($get_query->image_2_text != "" ) {echo $get_query->image_2_text; }else {echo "NA";}?> " readonly>
              </div>
                  
              <div class="col-md-2 text-center" style="padding-left: 0px">
                  <!-- <input type="file" name="photo[]" id="imgInp" onchange="loadFile2(event);">
                  <img class="preview" id="preview2" style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;"> -->
                 <span class="glyphicon glyphicon-eye-open" id="viewer3" onclick="get_image(3)" style="" ></span>
            
      <img id="upload_3"  width="70" height="70"  onclick="$('#file_3').click()" onerror="onerrorfun(3) ;" <? if($get_query->image_3!="") { echo 'src=API/Uploads/'.$get_query->image_3;} else { echo 'src=image/upload_image.png';} ?> />       
                                   <input type="file" name="photo[]" id="file_3" 
                                    onchange="document.getElementById('upload_3').src = window.URL.createObjectURL(this.files[0]);          $('#viewer3').show();">
                                    <input type="button"  id="saveForm" onclick="delete_image(3)" style="background-image: url(image/icon_delete.png);" class="btn"/>
                  <input name="desc3" placeholder="Image Description" class="simple_field form-control"  id="desc3"  type="text" value="<? if($get_query->image_3_text != "" ) {echo $get_query->image_3_text; }else {echo "NA";}?> " readonly>
              </div>
            
             
                  <div class="col-md-2 text-center" style="padding-left: 0px">
                  <!-- <input type="file" name="photo[]" id="imgInp" onchange="loadFile2(event);">
                  <img class="preview" id="preview2" style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;"> -->

                 <span class="glyphicon glyphicon-eye-open" id="viewer4" onclick="get_image(4)" style="" ></span>
                  <img id="upload_4"  width="70" height="70"  onclick="$('#file_4').click()" onerror="onerrorfun(4)" <? if($get_query->image_4!="") { echo 'src=API/Uploads/'.$get_query->image_4;} else { echo 'src=image/upload_image.png';} ?> />
                                   <input type="file" name="photo[]" id="file_4" 
                                    onchange="document.getElementById('upload_4').src = window.URL.createObjectURL(this.files[0]);          $('#viewer4').show();">
                                    <input type="button"  id="saveForm" onclick="delete_image(4)" style="background-image: url(image/icon_delete.png);" class="btn"/>
                  <input name="desc4" placeholder="Image Description" class="simple_field form-control"  id="desc4"  type="text" value="<? if($get_query->image_4_text != "" ) {echo $get_query->image_4_text; }else {echo "NA";}?> " readonly>
              </div>


              <div class="col-md-2 text-center" style="padding-left: 0px">
                  <!-- <input type="file" name="photo[]" id="imgInp" onchange="loadFile2(event);">
                  <img class="preview" id="preview2" style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;"> -->
                           <span class="glyphicon glyphicon-eye-open" id="viewer5" onclick="get_image(5)" style="" ></span>

                  <img id="upload_5"  width="70" height="70"  onclick="$('#file_5').click()" onerror="onerrorfun(5) ;" <? if($get_query->image_5!="") { echo 'src=API/Uploads/'.$get_query->image_5;} else { echo 'src=image/upload_image.png';} ?> />
                                   <input type="file" name="photo[]" id="file_5" 
                                    onchange="document.getElementById('upload_5').src = window.URL.createObjectURL(this.files[0]);          $('#viewer5').show();">
                                    <input type="button"  id="saveForm"  onclick="delete_image(5)"  style="background-image: url(image/icon_delete.png);" class="btn"/>
                  <input name="desc5" placeholder="Image Description" class="simple_field form-control"  id="desc5"  type="text" value="<? if($get_query->image_5_text != "" ) {echo $get_query->image_5_text; }else {echo "NA";}?> " readonly>
              </div>


                  <div class="col-md-2 text-right" style="padding-left: 0px">
                  <!-- <input type="file" name="photo[]" id="imgInp" onchange="loadFile2(event);">
                  <img class="preview" id="preview2" style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;"> -->
                                   <span class="glyphicon glyphicon-eye-open" id="viewer6" onclick="get_image(6)" style="" ></span>

          <img id="upload_6"  width="70" height="70"  onclick="$('#file_6').click()" onerror="onerrorfun(6) ;" <? if($get_query->image_6!="") { echo 'src=API/Uploads/'.$get_query->image_6;} else { echo 'src=image/upload_image.png';} ?> />
                                   <input type="file" name="photo[]" id="file_6" 
                                    onchange="document.getElementById('upload_6').src = window.URL.createObjectURL(this.files[0]);          $('#viewer6').show();">
                                    <input type="button"  id="saveForm" onclick="delete_image(6)" style="background-image: url(image/icon_delete.png);" class="btn"/>
                  <input name="desc6" placeholder="Image Description" class="simple_field form-control"  id="desc6"  type="text" value="<? if($get_query->image_6_text != "" ) {echo $get_query->image_6_text; }else {echo "NA";}?> " readonly>
              </div>
               </div>   
<script>
            function onerrorfun(id) {
				// alert($('#upload_'+id).css('background-image', 'url(Document.png)'));
               $('#upload_'+id).css('content', 'url(Document.png)');
              
              
            }
            </script>

<!-- Image Modal -->
<script type="text/javascript">
  
  // $( document ).ready(function() {
                      
                      //   $("#upload_1").click(function() {
                            
                      //     $('.imagepreview').attr("src","API/Uploads/"+"<? echo $get_query->image_1?>");

                      // $('#imagemodal').modal('show');  
                      //   });
                 
                      //   $("#preview2").click(function() {
                            
                      //     $('.imagepreview').attr("src","API/Uploads/"+"<? echo $get_query->image_2?>");

                      // $('#imagemodal').modal('show');  
                      //   });
                      //   $("#preview3").click(function() {
                            
                      //     $('.imagepreview').attr("src","API/Uploads/"+"<? echo $get_query->image_3?>");

                      // $('#imagemodal').modal('show');  
                      //   });
                      //   $("#preview4").click(function() {
                            
                      //     $('.imagepreview').attr("src","API/Uploads/"+"<? echo $get_query->image_4?>");

                      // $('#imagemodal').modal('show');  
                      //   });
                      //   $("#preview5").click(function() {
                            
                      //     $('.imagepreview').attr("src","API/Uploads/"+"<? echo $get_query->image_5?>");

                      // $('#imagemodal').modal('show');  
                      //   });
                      //    $("#preview6").click(function() {
                            
                      //     $('.imagepreview').attr("src","API/Uploads/"+"<? echo $get_query->image_6?>");

                      // $('#imagemodal').modal('show');  
                      //   });
                        

                      // });
</script>

          <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">              
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <a class="help-button  down2 fa fa-download" id="onerrorm1"  style="display:none"    download></a>
        <a class="help-button  down3 fa fa-download" id="onerrorm2"  style="display:none"    download></a>
        <a class="help-button  down4 fa fa-download" id="onerrorm3"  style="display:none"    download></a>
        <a class="help-button  down5 fa fa-download" id="onerrorm4"  style="display:none"    download></a>
        <a class="help-button  down6 fa fa-download" id="onerrorm5"  style="display:none"    download></a>
        <a class="help-button  down7 fa fa-download" id="onerrorm6"  style="display:none"    download></a>
          <img src="" class="imagepreview" style="width: 100%; height: 70vh" onerror="javascript:this.src='Document.png'; "  >
                </div>
              </div>
            </div>
          </div>

<!-- Image Modal Ends -->

<!-- Button -->
        <div class="form-group">
          <div class="col-md-12  text-center">
          <div class="col-md-4 col-md-offset-2">
            <input type="button" class="btn btn-danger form_submit_button" value="Save Changes" name="save" onclick="update()"> </input>   
          </div>
          <input type="hidden" name="induction_no" value="<? echo $capture_query->induction_number?>">
          <input type="hidden" name="project_id" value="<? echo $capture_query->project_id?>">
          <input type="hidden" name="employer_id" value="<? echo $capture_query->employer_id?>">
          <input type="hidden" name="today_date" value="<? echo $capture_query->today_date?>">
          <input type="hidden" id="attendance_id" name="atendance_id" value="<? echo $_POST['attendance_form']?>">
          <div class="col-md-4">   
          <input type="submit" class="btn btn-success form_submit_button" value="Show Image Gallery" id="show"  name="show"></span></input>

            <script>
              function update()
              {
                  // alert("ok");
                  // var a= $('#contact_form').serialize();
                   
                   var formData = new FormData($("#contact_form")[0]);
                    
                    $.each($('input[type=file]').files, function(i, file) {
                   formdata.append(i, file);
                    });
                       
console.log(formData);
            $.ajax({
                url: 'test_a.php',
                type: 'POST',
                data: formData,
                async: false,
                success: function (data) {
                    alert("Changes Saved Successfully");
                    // window.location.href = 'site_attendance_approved.php';
                },
                cache: false,
                contentType: false,
                processData: false
            });

            

                  
              }

              function delete_image(id)
              {
                  // $image="Image Removed";
                 // alert("ok");
                 $('#viewer'+id).hide();
                  var check= <? echo $counter ?>;
                  
                  if(check!= "0")
                  {
                  $('#show').prop('disabled', false);
                  $("#show").attr('value', 'Show Gallery');
                  }
                 var attendance = $('#attendance_id').val();
                 
                  // $('#preview'+id).removeAttr('src');

                  $('#upload_'+id).removeAttr('src');
                  $('#upload_'+id).attr('src','image/upload_image.png');
                  $("#desc"+id).val(null);
                    $.ajax({
                url: 'delete_image.php',
                type: 'POST',
                data: {text1: id, name: attendance},
               
                success: function (data) {
                   
                              // window.location.href = 'site_attendance_approved.php';

                },
               
            });

              }

              $(document).ready(function() {
                var a= <? echo $counter ?>;
                if(a == '0')
                {
                  $('#show').prop('disabled', true);
                }
                if(a== '1')
                {
                  $('#show').prop('disabled', false);
                }
                if(a== '2')
                {
                  $('#show').prop('disabled', true);
                  $("#show").attr('value', 'Please Delete Image');
                }
              });
           
            </script>

            <script type="text/javascript">
      
      $(document).ready(function(){
        var img1 =document.getElementById('upload_1'); 
        if (img1.src.split("/").reverse()[0] == "upload_image.png" || img1.src == ""){ $("#viewer1").hide();} else  {$("#viewer1").show(); } 
        var img2 =document.getElementById('upload_2'); 
        if (img2.src.split("/").reverse()[0] == "upload_image.png" || img2.src == ""){ $("#viewer2").hide();} else  {$("#viewer2").show(); } 
        var img3 =document.getElementById('upload_3'); 
        if (img3.src.split("/").reverse()[0] == "upload_image.png" || img3.src == ""){ $("#viewer3").hide();} else  {$("#viewer3").show(); }
        var img4 =document.getElementById('upload_4'); 
                if (img4.src.split("/").reverse()[0] == "upload_image.png" || img4.src == ""){ $("#viewer4").hide();} else  {$("#viewer4").show(); } 
        var img5 =document.getElementById('upload_5'); 
        if (img5.src.split("/").reverse()[0] == "upload_image.png" || img5.src == ""){ $("#viewer5").hide();} else  {$("#viewer5").show(); } 
        var img6 =document.getElementById('upload_6'); 
        if (img6.src.split("/").reverse()[0] == "upload_image.png" || img6.src == ""){ $("#viewer6").hide();} else  {$("#viewer6").show(); } 
        
        });

  

  function get_image(id)

  { 
   
          if($('#upload_'+id).attr('src') == "image/upload_image.png") 
            {
             $('#file_'+id).click();
              }
             else
             {
          var img = document.getElementById('upload_'+id);
          var imgsrc = img.src.split("/").reverse()[0];
          var path="API/Uploads/"+imgsrc;
              $('#imagemodal').modal('show');
              var src =$('#upload_'+id).attr("src");
              $('.imagepreview').attr("src",src); 
        $('#onerrorm'+id).show();
        $('#onerrorm'+id).attr("href" ,path);
              }


}
$(document).ready(function(){
$(".close").click (function() {
      $("#onerrorm1").hide(); $("#onerrorm2").hide(); $("#onerrorm3").hide(); $("#onerrorm4").hide();$("#onerrorm5").hide();$("#onerrorm6").hide(); 
      $("#imagemodal").hide(); 
});
});
</script>
            </div>
          </div>
        </div>
      </fieldset>
    </form>
    <? include("footer_new.php"); ?>
   </div>
</div>       

<script>
// file downlode for file_1
$("#onerrorm1").click(function(){
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
$("#onerrorm2").click(function(){
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
$("#onerrorm3").click(function(){
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
$("#onerrorm4").click(function(){
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
// file downlode for file_1
$("#onerrorm5").click(function(){
        var filename = $('#file_5').val();

      
       
            var file = document.getElementById('file_5').files[0];      
            var filename = document.getElementById('file_5').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);

            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = "";
        

    }) 
</script>  
<script>
// file downlode for file_1
$("#onerrorm6").click(function(){
        var filename = $('#file_6').val();

      
       
            var file = document.getElementById('file_6').files[0];      
            var filename = document.getElementById('file_6').files[0].name;      
            var blob = new Blob([file]);
            var urlm  = URL.createObjectURL(blob);

            $(this).attr({ 'download': filename, 'href': urlm});  
            filename = "";
        

    }) 
</script>           
                 <script>
// uploader1
var imageLoader = document.getElementById('file_1');
    imageLoader.addEventListener('change', handleImage, false);

function handleImage(e) {
    
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#upload_1 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox;
dropbox = document.getElementById("upload_1");
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
          $("#viewer1").show();

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
        $('#upload_2 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox2;
dropbox2 = document.getElementById("upload_2");
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
          $("#viewer2").show();

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
        $('#upload_3 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox3;
dropbox3 = document.getElementById("upload_3");
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
          $("#viewer3").show();

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
        $('#upload_4 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbo4;
dropbox4 = document.getElementById("upload_4");
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
          $("#viewer4").show();

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
</script>
<script>
// uploader5

var imageLoader5 = document.getElementById('file_5');
    imageLoader5.addEventListener('change', handleImage5, false);

function handleImage5(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#upload_5 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox5;
dropbox5 = document.getElementById("upload_5");
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
          $("#viewer5").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader5.files = files;
   $('#desc5').show();
      $('#desc5').attr('required', true);
}
</script>
<script>
// uploader6

var imageLoader6 = document.getElementById('file_6');
    imageLoader6.addEventListener('change', handleImage6, false);

function handleImage6(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#upload_6 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox6;
dropbox6 = document.getElementById("upload_6");
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
          $("#viewer6").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader6.files = files;
   $('#desc6').show();
      $('#desc6').attr('required', true);
}
</script>
<!-- </div>
    </div> --><!-- /.container -->



<!-- </center>        
</div> 
 
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
.container {
    width: 70vw;
  }
img {
 color:green;
 font:20px Impact; 

}
.input-group:not(#search_site){
 width: 28.5vw;
}
#saveForm
{
   
                height: 16px;
                width: 16px;
                 background-repeat: no-repeat;
    background-size: contain;
    background-color: red;
}
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
#text_below
{
  font-weight: 100;
}
.input-group {
   
    z-index: 0;
}
</style> -->
<!-- 
<footer>
  
<footer> -->

  <style>           
#upload_1,#upload_2,#upload_3,#upload_4,#upload_5,#upload_6
{
   /* background-image: url('image/upload_image.png');*/
    background-size: 70px 70px;
    border-radius: 7vh;
    /*content: url("image/upload_image.png");*/
    
    /*background: transparent !important;*/

}
#desc1,#desc2,#desc3,#desc4,#desc5,#desc6
{
  margin-top: 10px;
}



input[type='file'] {
        color: transparent; 
        display: none;  
}
  #saveForm
{
   
                /*height: 16px;
                width: 16px;
                 background-repeat: no-repeat;
    background-size: contain;*/
  background-color: transparent;
  outline: none;
  background-repeat: no-repeat;
}           
</style>                    
          



                  
            