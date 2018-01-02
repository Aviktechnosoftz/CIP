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
  $get_query=$conn->query("select tbl_site_attendace.id,tbl_site_attendace.induction_no,tbl_site_attendace.image_1,tbl_site_attendace.image_2,tbl_site_attendace.image_2,tbl_site_attendace.image_3,tbl_site_attendace.image_4,tbl_site_attendace.image_5,tbl_site_attendace.image_6,tbl_employer.*,company_name,concat(emp2.given_name, ' ',emp2.surname) as Name, if(whom != 0 , 'Web','App') as 'Type' ,tbl_site_attendace.whom, tbl_site_attendace.today_date,tbl_site_attendace.no_of_worker from tbl_site_attendace  left join tbl_employee emp1 on tbl_site_attendace.induction_no = emp1.id  left join tbl_employer on emp1.employer_id = tbl_employer.id left join tbl_employee emp2 on IF(whom = 0 ,tbl_site_attendace.induction_no = emp2.id ,tbl_site_attendace.whom = emp2.id) where tbl_site_attendace.id='".$id."'  order by tbl_site_attendace.id desc")->fetch_object();

  $search_query=$conn->query("select * from tbl_capture where (induction_id=".$get_query->induction_no." OR induction_id=".$get_query->whom." )");
  if($search_query->num_rows > 0)
  {
    $counter=1;
  }
}



if(isset($_POST['show'])== true)
{
	
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
 <? include('test_side3.php');?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">



</header>


<div class="Main_Form" style="border: 1px solid grey;
    float: left;
    position: absolute;
    /*margin: -220px 0 0 -200px;*/
    margin-top: -25vh;
    top: 48vh;
    left:18vw;
    width: auto;background-color: white;border-radius: 4px">
	
 <center>

<div class="container">

    <form class="well form-horizontal" method="post"  id="contact_form" action="test_image_gallery.php"> 
<fieldset>

<!-- Form Name -->
<legend>APPROVED SITE ATTENDANCE FORM</legend>

<!-- Text input-->

<!-- <div class="form-group">
  <label class="col-md-4 control-label">Induction No.</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
  <input  name="first_name" placeholder="Induction Number" class="form-control"  type="text" value="<? $value= str_pad($get_query->induction_no, 4, '0', STR_PAD_LEFT); echo $value; ?>" readonly>
    </div>
  </div>
</div> -->

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Employer/Business Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Employer Name" class="form-control"  type="text" value="<? echo $get_query->company_name; ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Filled By</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group" >
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="email" placeholder="Subcontractor Name" class="form-control"  type="text" value="<? echo $get_query->Name; ?>" readonly>
    </div>
  </div>
</div>

  <div class="form-group">
  <label class="col-md-4 control-label">Submitted From</label>  
    <div class="col-md-4 inputGroupContainer">
    <? if($type=="App")
    { ?>
    <img src="image/app2.gif" height="31vh" width="20vw">
    <? }
    else{ ?>
  <img src="image/web2.gif" height="32vh" width="30vw">
   <? } ?>

    <!-- <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="email" placeholder="Subcontractor Name" class="form-control"  type="text" value="<? echo $get_query->given_name." ".$get_query->name; ?>" readonly>
    </div> -->
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Mobile No. #</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group" id="">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="phone" placeholder="(845)555-1212" class="form-control" type="text" value="<? echo $get_query->phone_no; ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-4 control-label">Trade</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
  <input name="address" placeholder="Address" class="form-control" type="text" value="<? echo $get_query->Tread ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
 
<div class="form-group">
  <label class="col-md-4 control-label">Email Address</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="city" placeholder="Enail Address" class="form-control"  type="text" value="<? echo $get_query->email_add?>" readonly>
    </div>
  </div>
</div>

<!-- Select Basic -->
   
<div class="form-group"> 
  <label class="col-md-4 control-label">Date</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      
  <input name="city" id="date_show" placeholder="Date" class="form-control"  type="text" value="<? echo $get_query->today_date; ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Number of Workers on Site</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
  <input name="zip" placeholder="No. of Workers" class="form-control"  type="text" value="<? echo $get_query->no_of_worker ?>" readonly>
    </div>
</div>
</div>

<!-- Text input-->
<!-- <div class="form-group">
  <label class="col-md-4 control-label">Location and Activities per Worker </label>  
   <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
  <input name="website" placeholder="Website or domain name" class="form-control" type="text">
    </div>
  </div>
</div> -->

<!-- radio checks -->


<!-- Text area -->
  
<div class="form-group">
  <label class="col-md-4 control-label">Location and Activities per Worker</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
        	<textarea class="form-control" name="comment" placeholder="Project Description" style="height: 100px;width: 400px" readonly><? echo $get_query->company_name ?>&nbsphas:&nbsp<?echo $get_query->no_of_worker?>&nbspMen Onsite<? echo "\r\n" ?><? echo $get_query->trade ?> </textarea>
  </div>
  </div>
</div>
<!-- Images Upload -->

<div class="form-group">
  <label class="col-md-4 control-label">Uploaded Documents:</label>
  <div class="col-md-3 inputGroupContainer" style="">
     <img class="preview" id="preview1" alt="No Image" <? if($get_query->image_1!="") { echo 'src=API/Uploads/'.$get_query->image_1;} ?>  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;     margin-left: -6vw;">
      </div>
      <div class="col-md-3 inputGroupContainer">
     
     <img class="preview" id="preview2" alt="No Image" <? if($get_query->image_2!="") { echo 'src=API/Uploads/'.$get_query->image_2;} ?>  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
      </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-3 inputGroupContainer">
  
     <img class="preview" id="preview3" alt="No Image" <? if($get_query->image_3!="") { echo 'src=API/Uploads/'.$get_query->image_3;} ?>  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;    margin-left: -6vw;">
      </div>
      <div class="col-md-3 inputGroupContainer">

     <img class="preview" id="preview4" alt="No Image" <? if($get_query->image_4!="") { echo 'src=API/Uploads/'.$get_query->image_4;} ?>  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
      </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-3 inputGroupContainer">
      
     <img class="preview" id="preview5" alt="No Image" <? if($get_query->image_5!="") { echo 'src=API/Uploads/'.$get_query->image_5;} ?> style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;    margin-left: -6vw;">
      </div>
      <div class="col-md-3 inputGroupContainer">

     <img class="preview" id="preview6" alt="No Image" <? if($get_query->image_6!="") { echo 'src=API/Uploads/'.$get_query->image_6;} ?>  style=" width: 120px;height: 130px;background-position: center center;background-size: cover; -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);display: inline-block;">
      </div>
      
</div>



<!-- Image Upload Ends -->
<!-- Success message -->
<!-- <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div> -->

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
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4" style="margin-left: -05vw">
    <input type="button" class="btn btn-warning" value="Back to Site Attendance Forms"  onclick="back()"> <span class="glyphicon glyphicon-share-alt"></span></input>

    <script>
      function back()
      {
          window.location.href="site_attendance_approved.php"
      }
    </script>
  </div>
<input type="hidden" name="induction_no" value="<? echo $get_query->induction_no ?>">
  <div class="col-md-4" style="margin-left: -02vw">
    <input type="submit" class="btn btn-success" value="Show Image Gallery"  <?php if ($counter != '1'){ ?> disabled <?php   } ?>  name="show"> <span class="glyphicon glyphicon-share-alt"></span></input>
    
    <script>
      function back()
      {
          window.location.href="site_attendance_approved.php"
      }
    </script>
  </div>
</div>

</fieldset>
                     
</form>

</div>
    </div><!-- /.container -->



</center>        
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

</style>

<footer>
  <? include("footer.php"); ?>
<footer>

	    				
          
					
							
						        
					



	    						
	    			