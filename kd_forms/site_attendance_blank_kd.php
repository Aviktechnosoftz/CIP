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
$project_name= $conn->query("select project_name,number from tbl_project where id='".$_SESSION['admin']."'")->fetch_object();


//  $get_query=$conn->query("select * 
// FROM tbl_induction_register
// LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id
// WHERE inducted_by IS NOT NULL AND inducted_by != '' order by tbl_employee.given_name");
 $get_query=$conn->query("select *, tbl_employee.id,tbl_employer.company_name from tbl_employee left join tbl_employer on tbl_employee.employer_id = tbl_employer.id where tbl_employer.project_id=".$_SESSION['admin']."  and tbl_employer.is_deleted =0  group by tbl_employer.company_name");

$err=0;
if(isset($_POST['insert']))
{
  if($_POST['pin']!= '' AND $_POST['no_worker']!='' AND $_POST['comment']!= '')
  {
    
  $image_path= 'API/Uploads/';  


// Renaming File
  if($_FILES['photo']['name'][0]!="")
  {
  $path_parts0 = pathinfo($_FILES['photo']['name'][0]);
$building_images_0 = $path_parts0['filename'].'_'.time().'.'.$path_parts0['extension'];
}
if($_FILES['photo']['name'][1]!="")
  {
 $path_parts1 = pathinfo($_FILES['photo']['name'][1]);
$building_images_1 = $path_parts1['filename'].'_'.time().'.'.$path_parts1['extension'];
 }
 if($_FILES['photo']['name'][2]!="")
  {
 $path_parts2 = pathinfo($_FILES['photo']['name'][2]);
$building_images_2 = $path_parts2['filename'].'_'.time().'.'.$path_parts2['extension'];
 }
 if($_FILES['photo']['name'][3]!="")
  {
 $path_parts3 = pathinfo($_FILES['photo']['name'][3]);
$building_images_3 = $path_parts3['filename'].'_'.time().'.'.$path_parts3['extension'];
}
if($_FILES['photo']['name'][4]!="")
  {
 $path_parts4 = pathinfo($_FILES['photo']['name'][4]);
$building_images_4 = $path_parts4['filename'].'_'.time().'.'.$path_parts4['extension'];
}
if($_FILES['photo']['name'][5]!="")
  {
 $path_parts5 = pathinfo($_FILES['photo']['name'][5]);
$building_images_5 = $path_parts5['filename'].'_'.time().'.'.$path_parts5['extension'];
}
  $target0 = $image_path . $building_images_0;
  $target1 = $image_path . $building_images_1;
  $target2 = $image_path . $building_images_2;
  $target3 = $image_path . $building_images_3;
  $target4 = $image_path . $building_images_4;
    $target5 = $image_path . $building_images_5;

  move_uploaded_file($_FILES['photo']['tmp_name'][0], $target0);
  move_uploaded_file($_FILES['photo']['tmp_name'][1], $target1);
  move_uploaded_file($_FILES['photo']['tmp_name'][2], $target2);
  move_uploaded_file($_FILES['photo']['tmp_name'][3], $target3);
  move_uploaded_file($_FILES['photo']['tmp_name'][4], $target4);
   move_uploaded_file($_FILES['photo']['tmp_name'][5], $target5);
  
  $insert_query= $conn->query("insert into tbl_site_attendace set 
                    induction_no = '".trim($_POST['subcontractor'])."',
                    trade= '".$_POST['trade']."',
                    project_id='".$_SESSION['admin']."',
                    employees_location= '".$_POST['comment']."',
                    no_of_worker= '".$_POST['no_worker']."',
                    today_date= '".$_POST['date_today']."',
                    whom= '".$_SESSION['induction']."',
                    image_1='". $building_images_0 ."',
                     image_2='". $building_images_1 ."',
                      image_3='". $building_images_2 ."',
                       image_4='". $building_images_3 ."',
                        image_5='". $building_images_4 ."',
                        image_6='". $building_images_5 ."',
                        image_1_text='". $_POST['desc1']."',
                        image_2_text='". $_POST['desc2']."',
                        image_3_text='". $_POST['desc3']."',
                        image_4_text='". $_POST['desc4']."',
                        image_5_text='". $_POST['desc5']."',
                        image_6_text='". $_POST['desc6']."',
                    created=now(),
                    updated=now()");
      if($insert_query)
      {
        ?>
        <script>
         alert("You Have Successfully Submitted Attendance");
                  window.location.href='site_attendance_approved.php';
        </script>
        <?
      }
    }

else{
  $err="Please Fill All Fields";
}

}

?>
<header>
 <? include('header.php'); ?>
 <? include('test_side_new.php');?>
 <link rel="stylesheet" type="text/css" media="screen" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css">
 <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script type="text/javascript" src=js/validation_site_induction.js></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
</header>
<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
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
    <form class="well form-horizontal well_class" action="" method="post"  id="contact_form" enctype="multipart/form-data">
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

        <!-- <div class="form-group">
            <span class="col-md-6 label-title"><span class="project_title">INDUCTED PERSON</span></span>          
        </div> -->

        <!-- <div class="form-group">
                 <label class="col-md-12 control-label label-position">Induction No.</label>
                  <div class="col-md-12 selectContainer zeropadding">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                           <input name="induction" placeholder="Induction Number" class="form-control" name="name" id="induction"  type="text" value="" readonly>
                    </div>
                  </div>
        </div>

        <div class="form-group">
              <label class="col-md-12 control-label label-position">Employer/Business Name</label> 
                <div class="col-md-12 zeropadding">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input name="last_name" placeholder="Employer Name" class="form-control" id="employer_name" type="text" value="" readonly>
                    </div>
              </div>
        </div> -->
        <div class="form-group" style="display: none">
          <label class="col-md-4 control-label">Employer/Business Name</label> 
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="last_name" placeholder="Employer Name" class="form-control" id="employer_name" type="text" value="" readonly>
            </div>
          </div>
        </div>


        <div class="form-group">
          <div><span style="color:red;" id='err'><? if($err!='0') echo $err?></span></div>
                
                  <label class="col-md-12 control-label label-position">Date</label>
                  <div class="col-md-12 zeropadding">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>                    
                      <input  id="date_show" placeholder="Date" class="form-control" name="date_today"  type="text" value="" readonly>
                            <script>

                           $( "#date_show" ).datepicker({  
                                       dateFormat: "yy-mm-dd", 
                                       maxDate: new Date(),
                                        onSelect: function(date)
                                          {
                                              $("#subcontractor_name option").show();
                                               date_ajax(date);
                                                  $('#loading').html('<img src="https://s3.amazonaws.com/codechef_shared/em/components/cceditor/images/loader.gif">Please Wait');
                                                  $('#loading').show();
                                                  $('#subcontractor_name').hide();
                                           }
                                        });
                                           
                          function date_ajax(date)
                          {

                                              $.ajax({
                                                  type:"POST",
                                                  url:"test_ajax.php",
                                                  data: {
                                                    value: date
                                                },
                                                  success: function(result)
                                                  {
                                                        var obj =JSON.parse(result);
                                                        $.each(obj,function(index, value) {
                                                        $("#subcontractor_name option[value=" + value + "]").hide();

                                                         });
                                                        $('#loading').hide(1000);
                                                        $('#subcontractor_name').show();
                                                 }

                                                    });
                          }

                          $(document).ready(function() {
                          $("#date_show").datepicker().datepicker("setDate", new Date());
                          var a= $('#date_show').val();
                          date_ajax(a);
                          });
                           

                            </script>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12 control-label label-position">Employer Name</label>  
              <div class="col-md-12 zeropadding">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <div id="loading" style="float: right; color: red"></div>
                    <select name="subcontractor" class="form-control selectpicker" onchange="select_subcontractor()" id="subcontractor_name" style="border-bottom-right-radius: 10vh;
                      border-top-right-radius: 10vh" required>
                        <option value="" >Please Select Employer</option>
                        <? if($get_query->num_rows<=0) {?><option value="" >No Employee Available</option><? }?>
                       <? while($row= $get_query->fetch_object()){ ?>
                       <option value="<? echo $row->id?>"> <?  echo $row->company_name; ?></option>
                       <?} ?>
                      </select>
                       <script>
                       function select_subcontractor() {
                                     
                                      $("#submit").attr("disabled","disabled");
                                      $("#submit").attr('value', 'Please Enter Pin');
                                      $('#no_worker').attr('readonly',false);
                                      $('#loc').attr('readonly',false);
                                      $('#date_show').attr('readonly',false);
                                      $('#show_men').hide();
                                      $('#loc').val('');
                                      $('#no_worker').val('');
                                      $('#pin_enter').val('');
                                       $('#no_worker').val('');
                                      
                                     var e = document.getElementById("subcontractor_name");
                                     var strUser2 = e.options[e.selectedIndex].value;
                                     // alert(strUser2);
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax_attendance_pin.php",
                                        data: {
                                            value_ajax: strUser2
                                        },

                                        success: function(data) {
                                       // alert (data);
                                          var val_b = data.split(",");
                                          // var pin_db= val_b[6];
                                          var employer = val_b[26];
                                          // var given_name = val_b[15];
                                          var mobile_no = val_b[29];
                                          var trade = val_b[27];
                                          var email = val_b[30];
                                         
                                          // $('#pin_db').val(pin_db);
                                          $('#employer_name').val(employer);
                                          // $('#subcontractor_name').val(given_name);
                                          $('#phone').val(mobile_no);
                                          $('#trade').val(trade);
                                          $('#email').val(email);
                                          var a = ('0000' + strUser2).slice(-4);
                                          $('#induction').val(a);
                                          // pin_validate();

                                        

                                          
                                       }     
                                    });


                                   }
                              </script>
                    </div>
                </div>
              </div>

        <div class="form-group">
              <label class="col-md-12 control-label label-position">Mobile No. #</label>  
                <div class="col-md-12 zeropadding">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
              <input name="phone" placeholder="(845)555-1212" class="form-control" type="text" value="" id="phone" readonly>
                </div>
              </div>
        </div>


        <div class="form-group">
          <label class="col-md-12 control-label label-position">Trade</label>  
            <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
          <input  placeholder="Trade" class="form-control" name="trade" id="trade" type="text" value="" readonly>
            </div>
          </div>
        </div>

        <div class="form-group">
        <label class="col-md-12 control-label label-position">Email Address</label>  
          <div class="col-md-12 zeropadding">
          <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input name="city" placeholder="Enail Address" class="form-control" name="name" id="email"  type="text" value="" readonly>
          </div>
        </div>
      </div>


              <div class="form-group">
                <label class="col-md-12 control-label label-position">Number of Workers on Site</label>  
                <div class="col-md-12 zeropadding">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                      <input placeholder="No. of Workers" class="form-control" id="no_worker" name="no_worker"  type="text" value="" autocomplete="off" readonly>
                  </div>
                  <script>
                        $(document).ready(function(){

                          $('#show_men').hide();
                         $('#no_worker').keyup(function() {
                            if ($(this).val().length > 0) 
                      {       var emp = $('#employer_name').val();
                         
                               $('#show_men').slideDown('fast');
                               $('#show_men').html(emp+" "+"has"+" "+$(this).val()+" "+"Men Onsite");
                             }
                            else 
                               $('#show_men').hide();
                         });
                      });
                  </script>
              <label name="" id="show_men" style="display: hidden; padding-left: 52px !important;"> </label>
              </div>
            </div>

  
            <div class="form-group">
              <label class="col-md-12 control-label label-position">Location and Activities per Worker</label>
                <div class="col-md-12 zeropadding">    
                    	<textarea class="form-control worker-location" name="comment" id="loc" placeholder="3 men working in the main warehouse pouring slab 27
3 men digging the stormwater trench to main carpark 
2 men installing bollards to doorways D38 & D36" readonly></textarea>
              
              </div>
            </div>
          <!-- Images Upload -->
            <div class="form-group">
              <!-- <label class="col-md-12 control-label label-position">Upload Documents:</label> -->
              <div class="col-md-2" style="padding-left: 0px">
                <!--   <input type="file" name="photo[]" id="imgInp" onchange="loadFile1(event);">
                  <img class="preview" id="preview1" style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;"> -->
			 <span class="glyphicon glyphicon-eye-open" id="viewer1" style="left:80px;position:relative;top:25px;display:none"></span>
                 
				 <div id="uploader"  onclick="$('#file_1').click()" >
                  <img id="upload_1"  width="70" height="70"  onerror="javascript:this.src='Document.png'" /> </div>
                                   <input type="file" name="photo[]" id="file_1" 
                                    onchange="document.getElementById('upload_1').src = window.URL.createObjectURL(this.files[0]); $('#desc1').show();
      $('#desc1').attr('required', true); document.getElementById('viewer1').style.display = 'block';">
                                   
                  <input name="desc1" placeholder="Image Description" class="simple_field  form-control"  id="desc1"  type="text" value="" >
              </div>

              <div class="col-md-2 text-center" style="padding-left: 0px">
                  <!-- <input type="file" name="photo[]" id="imgInp" onchange="loadFile2(event);">
                  <img class="preview" id="preview2" style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;"> -->
			 <span class="glyphicon glyphicon-eye-open" id="viewer2" style="left:80px;position:relative;top:25px;display:none"></span>

				  <div id="uploader2"  onclick="$('#file_2').click()" >
                  <img id="upload_2"  width="70" height="70"   onerror="javascript:this.src='Document.png'"/> </div>
                                   <input type="file" name="photo[]" id="file_2" 
                                    onchange="document.getElementById('upload_2').src = window.URL.createObjectURL(this.files[0]);$('#desc2').show();
      $('#desc2').attr('required', true);document.getElementById('viewer2').style.display = 'block';">
                                   
                  <input name="desc2" placeholder="Image Description" class="simple_field form-control"  id="desc2"  type="text" value="" >
              </div>
                  
              <div class="col-md-2 text-center" style="padding-left: 0px">
                  <!-- <input type="file" name="photo[]" id="imgInp" onchange="loadFile3(event);">
                  <img class="preview" id="preview3"  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block; margin-left: -6vw;"> -->
                  			 <span class="glyphicon glyphicon-eye-open" id="viewer3" style="left:80px;position:relative;top:25px;display:none"></span>

				  <div id="uploader3"  onclick="$('#file_3').click()" >
                  <img id="upload_3"  width="70" height="70"  onerror="javascript:this.src='Document.png'"/></div>
                                   <input type="file" name="photo[]" id="file_3" 
                                    onchange="document.getElementById('upload_3').src = window.URL.createObjectURL(this.files[0]);$('#desc3').show();
      $('#desc3').attr('required', true);document.getElementById('viewer3').style.display = 'block';">
                                    
                  <input name="desc3" placeholder="Image Description" class="simple_field form-control"  id="desc3"  type="text" value="" >
              </div>
            
             
                  <div class="col-md-2 text-center" style="padding-left: 0px">
                  <!-- <input type="file" name="photo[]" id="imgInp" onchange="loadFile4(event);">
                 <img class="preview" id="preview4"  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;"> -->
                 			 <span class="glyphicon glyphicon-eye-open" id="viewer4" style="left:80px;position:relative;top:25px;display:none"></span>

				 <div id="uploader4"  onclick="$('#file_4').click()" >
                 <img id="upload_4"  width="70" height="70"   onerror="javascript:this.src='Document.png'"/></div>
                                   <input type="file" name="photo[]" id="file_4" 
                                    onchange="document.getElementById('upload_4').src = window.URL.createObjectURL(this.files[0]);$('#desc4').show();
      $('#desc4').attr('required', true);document.getElementById('viewer4').style.display = 'block';">
                                    
                 <input name="desc4" placeholder="Image Description" class="simple_field form-control"  id="desc4"  type="text" value="" >
                  </div>


              <div class="col-md-2 text-center" style="padding-left: 0px">
                  <!-- <input type="file" name="photo[]" id="imgInp" onchange="loadFile5(event);">
                 <img class="preview" id="preview5"  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;"> -->

                 			 <span class="glyphicon glyphicon-eye-open" id="viewer5" style="left:80px;position:relative;top:25px;display:none"></span>
	
				 <div id="uploader5"  onclick="$('#file_5').click()" >
                 <img id="upload_5"  width="70" height="70"  onerror="javascript:this.src='Document.png'" /></div>
                                   <input type="file" name="photo[]" id="file_5" 
                                    onchange="document.getElementById('upload_5').src = window.URL.createObjectURL(this.files[0]);$('#desc5').show();
      $('#desc5').attr('required', true);document.getElementById('viewer5').style.display = 'block';">
                                    
                 <input name="desc5" placeholder="Image Description" class="simple_field form-control"  id="desc5"  type="text" value="" >
                  </div>
                  <div class="col-md-2 text-right" style="padding-right: 0px">
                 <!--  <input type="file" name="photo[]" id="imgInp" onchange="loadFile6(event);">
                 <img class="preview" id="preview6"  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;"> -->
                 			 <span class="glyphicon glyphicon-eye-open" id="viewer6" style="left:-80px;position:relative;top:25px;display:none"></span>

				 <div id="uploader6"  onclick="$('#file_6').click()" >
                 <img id="upload_6"  width="70" height="70"  onerror="javascript:this.src='Document.png'"/> </div>
                                   <input type="file" name="photo[]" id="file_6" 
                                    onchange="document.getElementById('upload_6').src = window.URL.createObjectURL(this.files[0]);$('#desc6').show();
      $('#desc6').attr('required', true);document.getElementById('viewer6').style.display = 'block';">
                                   
                 <input name="desc6" placeholder="Image Description" class="simple_field form-control"  id="desc6"  type="text" value="" >
                  </div>
               </div>   

           

            <!-- Image Upload Ends -->

            <!-- Success message -->
            <!-- <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div> -->
            <div class="form-group">
              <div id="pin_div">
              <label class="col-md-12 control-label label-position" style="">PIN</label>  
              <div class="col-md-12 zeropadding">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                  <input  name="pin" placeholder="Enter a Valid Pin" class="form-control" id="pin_enter" type="password" value="" 
              onkeyup="pin_validate()" style="  border-bottom-right-radius: 10vh;
                border-top-right-radius: 10vh" required>
                  <input type="hidden" name="" value="<? echo $_SESSION['pin'] ?>" id="pin_db">
                  <input type="hidden" name="induction_no" value="" id="induction_no">
                </div>
              </div>
            </div>
          </div>
            <script>
            function pin_validate()
                              {
                                pin_val= document.getElementById('pin_enter').value;
                                pin_db2= document.getElementById('pin_db').value;
                              
                                if(pin_val == pin_db2)
                                {
                                document.getElementById('submit').disabled=false;
                         
                                document.getElementById('submit').value="Click to Submit";
                                // document.getElementById('submit').style.borderColor="white";
                                document.getElementById('submit').style.backgroundColor="#f47821";
                                $('#loc').prop('required',true);
                                $('#no_worker').prop('required',true);
                                }
                                else
                                {
                                document.getElementById('submit').value="Please Enter Correct Pin to Submit";
                                // document.getElementById('submit').style.borderColor="red";
                                document.getElementById('submit').style.backgroundColor="#f47821";
                                document.getElementById('submit').disabled=true;
                                }

                              }
             </script>
            <!-- Button -->
            <div class="form-group">
            <label class="col-md-4 control-label"></label>
              <div class="col-md-5">
                <input type="submit"  class="btn btn-warning form_submit_button" value="Submit" name="insert" id="submit"></input>
              </div>
            </div>
    </fieldset>
  </form>
  <? include("footer_new.php"); ?>
  </div>
</div><!-- /.container -->
<script type="text/javascript">
  

  function get_image(id)
{
    
    $('#file_'+id).click();
     $('#desc'+id).show();
      $('#desc'+id).attr('required', true);

}
</script>
<style>
  
  #upload_1,#upload_2,#upload_3,#upload_4,#upload_5,#upload_6
{
    background-image: url('image/upload_image.png');
    background-size: 70px 70px;
    border-radius: 7vh;
    
    /*background: transparent !important;*/

}
#desc1,#desc2,#desc3,#desc4,#desc5,#desc6
{
  display: none;
  margin-top: 10px;
}



input[type='file'] {
        color: transparent; 
        display: none;  
}
</style>


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
</script>
<script>
// uploader5

var imageLoader5 = document.getElementById('file_5');
    imageLoader5.addEventListener('change', handleImage5, false);

function handleImage5(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader5 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox5;
dropbox5 = document.getElementById("uploader5");
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
					document.getElementById("viewer5").style.display = "block";

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
        $('#uploader6 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox6;
dropbox6 = document.getElementById("uploader6");
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
					document.getElementById("viewer6").style.display = "block";

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
	  <!-- The Modal -->
 <div id="myModal" class="modal">
											  <div class="modeliconbackgroundcolor">
											 
											  <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#myModal').hide();
											  $('.hideclose').hide();">
											  <span aria-hidden="true">&times;</span></button>
											  </div>
				
											  <img class="modal-content modal-content-image north" id="img01"  >
											  <div id="caption"></div>
	</div>
	
<script>

 // model script for first image
/* var modalImg = document.getElementById("img01");
var viewerimg = document.getElementById('viewer');
var modal = document.getElementById('myModal');
var img = document.getElementById('preview0');
$(document).ready(function(){ if (img.src == ""){$("#viewer").hide(); }  else  {$("#viewer").show(); } });
viewerimg.onclick = function(){
	
	if(img.src != "" ) { var imgsrc = img.src.split("/").reverse()[0];
	var path="API/Uploads/"+imgsrc;
	$("#img01").attr("src",path); 
	$("#onerrorm").show();
	$("#myModal").show(); 
} 
}
console.log("sada"); */
 </script>
 <script>

 // model script for 1 image
 var modalImg = document.getElementById("img01");
var modal = document.getElementById('myModal');

var viewerimg1 = document.getElementById('viewer1');
var img1 = document.getElementById('upload_1');
viewerimg1.onclick = function(){
	// alert(img1.src);
	if(img1.src != "" ) { 
	
	$("#img01").attr("src",img1.src); 
	$("#myModal").show(); 
	}}
 </script>
 <script>

 // model script for 2 image

var viewerimg2 = document.getElementById('viewer2');
var img2 = document.getElementById('upload_2');
viewerimg2.onclick = function(){
	if(img2.src != "" ) {
		
	$("#img01").attr("src",img2.src); 
	$("#myModal").show(); }}
 </script>
 <script>

 // model script for 3 image

var viewerimg3 = document.getElementById('viewer3');
var img3 = document.getElementById('upload_3');
// alert(img3.src);

viewerimg3.onclick = function(){
	if(img3.src != "" ) { 
	$("#img01").attr("src",img3.src); $("#myModal").show(); }}
 </script>
 <script>

 // model script for 4 image

var viewerimg4 = document.getElementById('viewer4');
var img4 = document.getElementById('upload_4');
viewerimg4.onclick = function(){
	if(img4.src != "" ) {
	$("#img01").attr("src",img4.src); $("#myModal").show(); }}
 </script>
 <script>

 // model script for 5 image
 var viewerimg6 = document.getElementById('viewer6');
var img6 = document.getElementById('upload_6');
viewerimg6.onclick = function(){
	if(img6.src != "" ) { 
	$("#img01").attr("src",img6.src); $("#myModal").show(); }}

var viewerimg5 = document.getElementById('viewer5');
var img5 = document.getElementById('upload_5');
viewerimg5.onclick = function(){
	if(img5.src != "" ) { 
	$("#img01").attr("src",img5.src); $("#myModal").show(); }}
 </script>
 
 <style>
  <script>

 // model script for 6 image
// var viewerimg6 = document.getElementById('viewer6');
// var img6 = document.getElementById('upload_6');
// viewerimg6.onclick = function(){
	// if(img6.src != "" ) { 
	// $("#img01").attr("src",img6.src); $("#myModal").show(); }}
// var viewerimg5 = document.getElementById('viewer5');
// var img5 = document.getElementById('upload_5');
// viewerimg5.onclick = function(){
	// if(img5.src != "" ) { 
	// $("#img01").attr("src",img5.src); $("#myModal").show(); }}
 
 
// var viewerimg6 = document.getElementById('viewer6');
// var img6 = document.getElementById('upload_6');
// viewerimg6.onclick = function(){
	// if(img6.src != "" ) {
	// $("#img01").attr("src",img6.src);  $("#myModal").show(); }}
 </script>
 
 
 <style>
		 
<!-- Get the modal css -->
#preview0 , #upload_2,#upload_3,#upload_4,#upload_5,#upload_6 {
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
							
						        
					



	    						
	    			