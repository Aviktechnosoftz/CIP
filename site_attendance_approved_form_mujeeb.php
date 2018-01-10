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
  <div class="col-md-12">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">SAFETY MANAGEMENT SYSTEM</legend>
        <label class="col-md-12 control-label form-name">SITE ATTENDANCE FORM</label>

        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="20%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>

<div class="Main_Form2">
  <div class="col-md-12">
    <form class="well form-horizontal well_class" method="post"  id="contact_form" action="test_image_gallery.php" enctype="multipart/form-data">
        <fieldset>
        <div class="form-group">
            <div class="col-md-12" style="padding-left: 0px;">
                <label class="col-md-12 control-label" style="padding-left: 0px;"><span class="project_title" style="">PROJECT :&nbsp;<? echo $project_name->project_name ?> </span></label>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-12 note">
            NOTE : All visitors must be accompanied at all times by someone who has been fully inducted onto this site and follow all instructions given to them. Visitors must wear a safety helmet, safety footwear, a high visibility vest and any other PPE deemed appropriate for the site.
            </div>
        </div>

         <div class="form-group">
            <span class="col-md-6 label-title">SITE VISITOR DETAIL</span>          
        </div>

        <div class="form-group">
            <span class="col-md-6 label-title"><span style="color:#000;">INDUCTED PERSON</span></span>          
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
            <input type="button"  id="saveForm" onclick="delete_image(1)" style="background-image: url(image/delete.png);" />
            <label  class="form-control"   id="desc1" style="text-align: left;background-color: transparent;"> Description:&nbsp;<? if($get_query->image_1_text != "" ) {echo $get_query->image_1_text; }else {echo "NA";}?> </label>
          </div>

          <div class="col-md-4 text-center">
         <input type="file" name="photo[]" id="imgInp2" onchange="loadFile2(event);">
         <img class="preview" id="preview2"  <? if($get_query->image_2!="") { echo 'src=API/Uploads/'.$get_query->image_2;} ?>  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
          <input type="button"  id="saveForm" onclick="delete_image(2)" style="background-image: url(image/delete.png);" />
          <label  class="form-control"   id="desc2" style="text-align: left;background-color: transparent;"> Description:&nbsp;<? if($get_query->image_2_text != "" ) {echo $get_query->image_2_text; }else {echo "NA";}?> </label>
          </div>

      <div class="col-md-4 text-center">
      <input type="file" name="photo[]" id="imgInp3" onchange="loadFile3(event);">
     <img class="preview" id="preview3"  <? if($get_query->image_3!="") { echo 'src=API/Uploads/'.$get_query->image_3;} ?>  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
      <input type="button"  id="saveForm" onclick="delete_image(3)" style="background-image: url(image/delete.png);" />
      <label  class="form-control"   id="desc3" style="text-align: left;background-color: transparent;"> Description:&nbsp;<? if($get_query->image_3_text != "" ) {echo $get_query->image_3_text; }else {echo "NA";}?> </label>
      </div>
</div>
<div class="form-group">
      <div class="col-md-4 text-center">
      <input type="file" name="photo[]" id="imgInp4" onchange="loadFile4(event);">
     <img class="preview" id="preview4"  <? if($get_query->image_4!="") { echo 'src=API/Uploads/'.$get_query->image_4;} ?>  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
      <input type="button"  id="saveForm" onclick="delete_image(4)" style="background-image: url(image/delete.png);" />
      <label  class="form-control"   id="desc4" style="text-align: left;background-color: transparent;"> Description:&nbsp;<? if($get_query->image_4_text != "" ) {echo $get_query->image_4_text; }else {echo "NA";}?> </label>
      </div>

      <div class="col-md-4 text-center">
      <input type="file" name="photo[]" id="imgInp5" onchange="loadFile5(event);">
     <img class="preview" id="preview5"  <? if($get_query->image_5!="") { echo 'src=API/Uploads/'.$get_query->image_5;} ?> style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
      <input type="button"  id="saveForm" onclick="delete_image(5)" style="background-image: url(image/delete.png);" />
      <label  class="form-control"   id="desc5" style="text-align: left;background-color: transparent;"> Description:&nbsp;<? if($get_query->image_5_text != "" ) {echo $get_query->image_5_text; }else {echo "NA";}?> </label>
      </div>

      <div class="col-md-4 text-center">
      <input type="file" name="photo[]" id="imgInp6" onchange="loadFile6(event);">
     <img class="preview" id="preview6"  <? if($get_query->image_6!="") { echo 'src=API/Uploads/'.$get_query->image_6;} ?>  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
      <input type="button"  id="saveForm" onclick="delete_image(6)" style="background-image: url(image/delete.png);" />
      <label  class="form-control"   id="desc6" style="text-align: left;background-color: transparent;"> Description:&nbsp;<? if($get_query->image_6_text != "" ) {echo $get_query->image_6_text; }else {echo "NA";}?> </label>
      </div>
</div> -->

   <div class="form-group">

              <div class="col-md-2 text-center" style="padding-left: 0px">
                  <!-- <input type="file" name="photo[]" id="imgInp" onchange="loadFile2(event);">
                  <img class="preview" id="preview2" style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;"> -->
                  <img id="upload_1"  width="70" height="70" onclick="get_image(1)" <? if($get_query->image_1!="") { echo 'src=API/Uploads/'.$get_query->image_1;} ?> />
                                   <input type="file" name="photo[]" id="file_1" 
                                    onchange="document.getElementById('upload_1').src = window.URL.createObjectURL(this.files[0])">
                                    <input type="button"  id="saveForm" onclick="delete_image(1)" style="background-image: url(image/delete.png);" />
                  <input name="desc1" placeholder="Image Description" class="simple_field form-control"  id="desc1"  type="text" value="<? if($get_query->image_1_text != "" ) {echo $get_query->image_1_text; }else {echo "NA";}?> " >
              </div>
             
              

              <div class="col-md-2 text-center" style="padding-left: 0px">
                  <!-- <input type="file" name="photo[]" id="imgInp" onchange="loadFile2(event);">
                  <img class="preview" id="preview2" style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;"> -->
                  <img id="upload_2"  width="70" height="70" onclick="get_image(2)" />
                                   <input type="file" name="photo[]" id="file_2" 
                                    onchange="document.getElementById('upload_2').src = window.URL.createObjectURL(this.files[0])">
                  <input name="desc2" placeholder="Image Description" class="simple_field form-control"  id="desc2"  type="text" value="" >
              </div>
                  
              <div class="col-md-2 text-center" style="padding-left: 0px">
                  <!-- <input type="file" name="photo[]" id="imgInp" onchange="loadFile3(event);">
                  <img class="preview" id="preview3"  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block; margin-left: -6vw;"> -->
                  <img id="upload_3"  width="70" height="70" onclick="get_image(3)" />
                                   <input type="file" name="photo[]" id="file_3" 
                                    onchange="document.getElementById('upload_3').src = window.URL.createObjectURL(this.files[0])">
                  <input name="desc3" placeholder="Image Description" class="simple_field form-control"  id="desc3"  type="text" value="" >
              </div>
            
             
                  <div class="col-md-2 text-center" style="padding-left: 0px">
                  <!-- <input type="file" name="photo[]" id="imgInp" onchange="loadFile4(event);">
                 <img class="preview" id="preview4"  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;"> -->
                 <img id="upload_4"  width="70" height="70" onclick="get_image(4)" />
                                   <input type="file" name="photo[]" id="file_4" 
                                    onchange="document.getElementById('upload_4').src = window.URL.createObjectURL(this.files[0])">
                 <input name="desc4" placeholder="Image Description" class="simple_field form-control"  id="desc4"  type="text" value="" >
                  </div>


              <div class="col-md-2 text-center" style="padding-left: 0px">
                  <!-- <input type="file" name="photo[]" id="imgInp" onchange="loadFile5(event);">
                 <img class="preview" id="preview5"  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;"> --><span class="leftpadding"><span class="leftpadding">
                 <img id="upload_5"  width="70" height="70" onclick="get_image(5)" />
                                   <input type="file" name="photo[]" id="file_5" 
                                    onchange="document.getElementById('upload_5').src = window.URL.createObjectURL(this.files[0])">
                 <input name="desc5" placeholder="Image Description" class="simple_field form-control"  id="desc5"  type="text" value="" >
                  </span></span></div>
                  <div class="col-md-2 text-right" style="padding-right: 0px">
                 <!--  <input type="file" name="photo[]" id="imgInp" onchange="loadFile6(event);">
                 <img class="preview" id="preview6"  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;"> -->
                 <img id="upload_6"  width="70" height="70" onclick="get_image(6)" />
                                   <input type="file" name="photo[]" id="file_6" 
                                    onchange="document.getElementById('upload_6').src = window.URL.createObjectURL(this.files[0])">
                 <input name="desc6" placeholder="Image Description" class="simple_field form-control"  id="desc6"  type="text" value="" >
                  </div>
               </div>   


<!-- Image Modal -->
<script type="text/javascript">
  
  $( document ).ready(function() {
                      
                        $("#preview1").click(function() {
                            
                          $('.imagepreview').attr("src","API/Uploads/"+"<? echo $get_query->image_1?>");

                      $('#imagemodal').modal('show');  
                        });
                 
                        $("#preview2").click(function() {
                            
                          $('.imagepreview').attr("src","API/Uploads/"+"<? echo $get_query->image_2?>");

                      $('#imagemodal').modal('show');  
                        });
                        $("#preview3").click(function() {
                            
                          $('.imagepreview').attr("src","API/Uploads/"+"<? echo $get_query->image_3?>");

                      $('#imagemodal').modal('show');  
                        });
                        $("#preview4").click(function() {
                            
                          $('.imagepreview').attr("src","API/Uploads/"+"<? echo $get_query->image_4?>");

                      $('#imagemodal').modal('show');  
                        });
                        $("#preview5").click(function() {
                            
                          $('.imagepreview').attr("src","API/Uploads/"+"<? echo $get_query->image_5?>");

                      $('#imagemodal').modal('show');  
                        });
                         $("#preview6").click(function() {
                            
                          $('.imagepreview').attr("src","API/Uploads/"+"<? echo $get_query->image_6?>");

                      $('#imagemodal').modal('show');  
                        });
                        

                      });
</script>

          <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">              
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <img src="" class="imagepreview" style="width: 100%; height: 70vh" >
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
          <input type="hidden" id="attendance_id" name="atendance_id" value="<? echo $id?>">
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
                       

            $.ajax({
                url: 'test_a.php',
                type: 'POST',
                data: formData,
                async: false,
                success: function (data) {
                    alert("Changes Saved Successfully");
                    window.location.href = 'site_attendance_approved.php';
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
                  var check= <? echo $counter ?>;
                  
                  if(check!= "0")
                  {
                  $('#show').prop('disabled', false);
                  $("#show").attr('value', 'Show Gallery');
                  }
                 var attendance = $('#attendance_id').val();
                 
                  // $('#preview'+id).removeAttr('src');
                  $('#upload_'+id).css('background-image' , 'none');
                  $('#Upload_'+id).removeAttr('src');
                  $("#imgInp1"+id).val(null);
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
  

  function get_image(id)
{
    
    $('#file_'+id).click();
     $('#desc'+id).show();
      $('#desc'+id).attr('required', true);

}
</script>
            </div>
          </div>
        </div>
      </fieldset>
    </form>
    <? include("footer_new.php"); ?>
   </div>
</div>                     

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
    background-image: url('image/upload_image.png');
    background-size: 70px 70px;
    border-radius: 7vh;
    
    /*background: transparent !important;*/

}
/*#desc1,#desc2,#desc3,#desc4,#desc5,#desc6
{
  display: none;
}*/



input[type='file'] {
        color: transparent; 
        display: none;  
}
							
</style>						        
					



	    						
	    			