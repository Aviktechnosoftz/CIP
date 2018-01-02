<?php

session_start();
error_reporting(0);
include_once('connect.php');
// print_r($_SESSION);

if(!isset($_SESSION['admin']))
{
	header("location:logout.php");
}
else

{
	$user= $_SESSION['admin'];
}






 $project_name= $conn->query("select project_name,number from tbl_project where id='".$_SESSION['admin']."'")->fetch_object();
$id= $_REQUEST['visitor_form'];
if(isset($_REQUEST['signout']))
{

	$visitor_update=$conn->query("update tbl_visitor_induction set visit_out='".$_REQUEST['time_out']."',updated=NOW() where id='".$_REQUEST['id']."'");

  if($visitor_update)
  {


    $get_email= $conn->query("Select * from tbl_setting where project_id='".$_SESSION['admin']."'")->fetch_object();
  $email= $get_email->induction_mail; 
  $to="shashank.r@aviktechnosoft.com".",".$email.",".$_POST['email_log'];
        $msg = "<html> 
        <body>
        Hello HSR / SM, <br/><br/>

      A Visitor Has Signed-Out his name is ".$_REQUEST['visit_name_1']." and he works for ".$_REQUEST['employer_name']." <br/>

        ".$get_email->visitor_induction_msg." <br/><br/>


       
       <a href ='https://cipropertyapp.com/visitor_induction_form.php?visitor_form=".$_REQUEST['id']."'><input type=\"button\" value=\"Review\"> </a><br/><br/>




      Thanks <br/>
      Team CIP <br/>
      Sent from Web  <br/>   </body> 
      </html>";
        $date= date('y/m/d');
        $new_date= str_replace('/','',$date);
        $Sub = $project_name->project_name."-".$new_date."-Visitor Has Signed-Out-".$_REQUEST['visit_name_1'];
        $subject= $Sub;
        $url = 'http://192.169.226.71/volts_dev/send_mail.php';
        $data = array('to' => $to, 'msg' => $msg, 'subject' => $subject);
        $options = array('http' => array(
          'method'  => 'POST',
          'content' => http_build_query($data)
              ));

              $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
           

           
    ?>
    <script>
      alert ("You have successfully Signed Out the Visitor Induction");
      window.location.href='visitor_induction.php';
    </script>
    <?
  }

  

 
}


 $id= $_REQUEST['visitor_form'];

 $get_query=$conn->query("select tbl_employee.id, tbl_employee.given_name,tbl_employee.surname as name,tbl_employee.pin,tbl_employee.email_add,tbl_employee.contact_phone,tbl_employer.company_name,tbl_employer.Tread, tbl_visitor_induction.induction_no,tbl_visitor_induction.id as visit_id,tbl_visitor_induction.position,tbl_visitor_induction.today_date,tbl_visitor_induction.visitor_business,tbl_visitor_induction.visitor_name,tbl_visitor_induction.visitor_mobile,tbl_visitor_induction.visit_reason,tbl_visitor_induction.visit_in ,tbl_visitor_induction.visit_out,tbl_visitor_induction.cont_business  FROM tbl_employee JOIN tbl_visitor_induction ON tbl_employee.id = tbl_visitor_induction.induction_no JOIN tbl_induction_register ON tbl_employee.id = tbl_induction_register.id JOIN tbl_employer ON tbl_employer.id = tbl_induction_register.empid WHERE  tbl_visitor_induction.project_id ='".$_SESSION['admin']."'  AND visit_out ='' AND tbl_visitor_induction.id='".$id."'  ORDER BY created DESC")->fetch_object();



  // $get_query=$conn->query("select tbl_employee.id, tbl_employee.given_name,tbl_employee.surname as name,tbl_employee.pin,tbl_employee.email_add,tbl_employee.contact_phone,tbl_employer.company_name, tbl_visitor_induction.induction_no,tbl_visitor_induction.id as visit_id,tbl_visitor_induction.position,tbl_visitor_induction.today_date,tbl_visitor_induction.visitor_business,tbl_visitor_induction.visitor_name,tbl_visitor_induction.visitor_mobile,tbl_visitor_induction.visit_reason,tbl_visitor_induction.visit_in ,tbl_visitor_induction.visit_out,tbl_visitor_induction.cont_business  FROM tbl_employee JOIN tbl_visitor_induction ON tbl_employee.id = tbl_visitor_induction.induction_no JOIN tbl_induction_register ON tbl_employee.id = tbl_induction_register.id JOIN tbl_employer ON tbl_employer.id = tbl_induction_register.empid WHERE tbl_visitor_induction.induction_no ='".$_SESSION['induction']."' AND tbl_visitor_induction.project_id ='".$_SESSION['admin']."'  AND visit_out ='' AND tbl_visitor_induction.id='".$id."'  ORDER BY created DESC")->fetch_object();
if($get_query->cont_business!="")
{
 $get_consultant_name= $conn->query("select consultant_name from tbl_consultant where id= ".$get_query->cont_business."")->fetch_object();
}

$visitior_db= $get_query->visitor_name;
$myArray = explode('#', $visitior_db);

$thirdArray = array();

foreach ($myArray as $key => $value) {
      $secondaryArray = explode(',', $value);
      foreach($secondaryArray as $val)
      {
      array_push($thirdArray, $val);
      }
    }



?>
<script>
function DisplayDateTime()
     {
     var DateTime = new Date();
     var strYear= DateTime.getYear();
     var strMonth= DateTime.getMonth() +1;
     var strDay = DateTime.getDate();
     var strHours = DateTime.getHours();
     var curr_date = ("0" + strHours).slice(-2);

     var strMinutes = DateTime.getMinutes();
     var strSeconds = DateTime.getSeconds();
     var tagDiv=document.getElementById("DivTag");
     document.getElementById("DivTag").value =  curr_date + ":" + strMinutes;
  
     }
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<!-- <head> -->
<header>
 <? include('header.php'); ?>
 <? include('test_side_new.php'); ?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">



</header>
 <!-- <center> -->
<Body bgcolor=#00ff00 onload="DisplayDateTime()">
<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
  <div class="col-md-6 main_title_container">
      <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
      <label class="col-md-12 control-label form-name">Sign Out Visitor Induction Form</label>
      <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
  </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="20%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
</div> 
</div>

<div class="Main_Form2">
  <div class="col-md-12">
    <form class="well form-horizontal well_class" action=" " method="post"  id="contact_form">
      <fieldset>

<!-- Form Name -->
        <div class="form-group">
            <div class="col-md-12" style="padding-left: 0px;padding-bottom: 25px;">
                <label class="col-md-12 control-label" style="padding-left: 0px;"><span class="project_title" style="">PROJECT :&nbsp;<? echo $project_name->project_name ?> </span></label>
            </div>
        </div>

        <div class="form-group">
                <div class="col-md-12 note" style="margin-bottom: 15px">
            NOTE : All visitors must be accompanied at all times by someone who has been fully inducted onto this site and follow all instructions given to them. Visitors must wear a safety helmet, safety footwear, a high visibility vest and any other PPE deemed appropriate for the site.
            </div>
        </div>

        <div class="form-group">
            <span class="col-md-6 label-title" style="padding-bottom: 30px">SITE VISITOR DETAIL</span>          
        </div>

        <!-- Text input-->
        <div class="form-group"> 
          <!-- <label class="col-md-4 control-label">Date</label> -->
           <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>              
                <input name="city" id="date_show" placeholder="Date" class="form-control"  type="text" value="<? echo date('Y-m-d'); ?>" readonly>
            </div>
          </div>
        </div>

        <div class="form-group">
          <!-- <label class="col-md-4 control-label" >Visitor/Business Name</label>  -->
            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                <input name="last_name" placeholder="Visitor/Business Name" class="form-control"  type="text" value="<? echo $get_query->visitor_business; ?>" readonly>
              </div>
            </div>
        </div>
        <div class="form-group">
          <!-- <label class="col-md-4 control-label" >Consultant</label>  -->
            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                <input name="consultant" placeholder="Consultant Name" class="form-control"  type="text" value="<?= $get_consultant_name->consultant_name ?>" readonly>
              </div>
            </div>
        </div>

       <div class="form-group">
       <!--  <label class="col-md-4 control-label">Visitor</label>   -->
          <div class="col-md-6 rightpadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input name="visit_name_1" placeholder="Visitor" class="form-control"  type="text" value="<? echo $thirdArray[0]; ?>" readonly>
            </div>
          </div>
          <div class="col-md-6 leftpadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input name="email" placeholder="Mobile Number" class="form-control"  type="text" value="<? echo $thirdArray[1] ?>" readonly>
            </div>
          </div>
      </div>
      <div class="form-group">
      <!--   <label class="col-md-4 control-label">Visitor</label>   -->
        <div class="col-md-6 rightpadding">
          <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input name="email" placeholder="Visitor" class="form-control"  type="text" value="<?echo $thirdArray[2] ?>" readonly>
          </div>
        </div>
        <div class="col-md-6 leftpadding">
          <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
              <input name="email" placeholder="Mobile Number" class="form-control"  type="text" value="<? echo $thirdArray[3] ?>" readonly>
          </div>
        </div>
      </div>

      <div class="form-group">
       <!--  <label class="col-md-4 control-label">Visitor</label>  --> 
          <div class="col-md-6 rightpadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input name="email" placeholder="Visitor" class="form-control"  type="text" value="<? echo $thirdArray[4] ?>" readonly>
            </div>
        </div>
         <div class="col-md-6 leftpadding">
          <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
              <input name="email" placeholder="Mobile Number" class="form-control"  type="text" value="<? echo $thirdArray[5] ?>" readonly>
          </div>
        </div>
      </div>
      <div class="form-group">
        <!-- <label class="col-md-4 control-label">Visitor</label>   -->
          <div class="col-md-6 rightpadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input name="email" placeholder="Visitor" class="form-control"  type="text" value="<? echo $thirdArray[6] ?>" readonly>
            </div>
        </div>
        <div class="col-md-6 leftpadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input name="email" placeholder="Mobile Number" class="form-control"  type="text" value="<? echo $thirdArray[7] ?>" readonly>
            </div>
        </div>
      </div>
      <div class="form-group">
        <!-- <label class="col-md-4 control-label" >Reason For Visit</label>  -->
            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                <input name="last_name" placeholder="Reason for Visit" class="form-control"  type="text" value="<? echo $get_query->visit_reason; ?>" readonly>
            </div>
          </div>
      </div>
<!-- <div class="form-group">
  <label class="col-md-4 control-label" >Time In</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
  <input name="last_name" placeholder="Employer Name" class="form-control"  type="text" value="<? echo $get_query->visit_in; ?>" readonly>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >Time Out</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
  <input name="time_out" placeholder="Time Out" class="form-control" id="DivTag" type="text" readonly>
    </div>
  </div>
</div> -->

      <div class="form-group" style="margin-bottom: 0px;">
        <span class="label-position col-md-6 control-label time">Time In</span>        
         <label class="label-position col-md-6 control-label time"><span class="leftpadding">Time Out</span></label>
      </div>
      <div class="form-group">
        <div class="col-md-6 rightpadding">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
            <input name="last_name" placeholder="Time In" class="test"  type="text" value="<? echo $get_query->visit_in; ?>" readonly>
          </div>
        </div>
       <div class="col-md-6 leftpadding">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
            <input name="time_out" placeholder="Time Out" class="test" id="DivTag" type="text" readonly>
          </div>
        </div>
      </div>

      <div class="col-md-12 h-divider"  style="padding-left: 0px;padding-right: 0px;"></div> 
      <div class="form-group">
          <label class="col-md-6 control-label label-title">INDUCTED PERSON</label> 
          <label class="col-md-3 control-label" ><div style=" TEXT-ALIGN: RIGHT; font-family: 'Avenirnext';font-size: 12px">Induction No.</div></label>
          <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
            <input  placeholder="Induction Number" class="form-control"  type="text" name="induction_no" value="<? $value= str_pad($get_query->id, 4, '0', STR_PAD_LEFT); echo $value; ?>" style="text-align: center;" readonly >
          </div>
        </div>  
      </div>

      <div class="form-group">
        <label class="col-md-12 control-label label-position">Employer/Business Name</label> 
        <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
            <input name="employer_name" placeholder="Employer Name" class="form-control"  type="text" value="<? echo $get_query->company_name; ?>" readonly>
          </div>
        </div>
      </div>

<!-- Text input-->



<!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label label-position">Subcontractor Name</label>  
      <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="email" placeholder="Subcontractor Name" class="form-control"  type="text" value="<? echo $get_query->given_name." ".$get_query->name; ?>" readonly>
        </div>
    </div>
  </div>


<!-- Text input-->
       
<div class="form-group">
 <label class="col-md-12 control-label label-position">Mobile No. </label>  
    <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="phone" placeholder="(845)555-1212" class="form-control" type="text" value="<? echo $get_query->contact_phone; ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-12 control-label label-position">Trade</label>  
   <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
  <input name="address" placeholder="Trade" class="form-control" type="text" value="<? echo $get_query->Tread ?>" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
 
<div class="form-group">
    <label class="col-md-12 control-label label-position">Email Address</label>  
    <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email_log" placeholder="Enail Address" class="form-control"  type="text" value="<? echo $get_query->email_add?>" readonly>
    </div>
  </div>
</div>

<!-- Select Basic -->
   

<!-- Text input-->

<div class="form-group"> 
 <label class="col-md-12 control-label label-position">Date</label>
<div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      
  <input name="city" id="date_show" placeholder="Date" class="form-control"  type="text" value="<? echo date('Y-m-d'); ?>" readonly>
    </div>
  </div>
</div>
<!-- Success message -->
<!-- <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div> -->

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-5">
  <input type="hidden" name="id" value="<? echo $get_query->visit_id  ?>">
    <input type="submit" class="btn btn-danger form_submit_button" value="Sign-Out" name="signout"> </input>
  </div>
</div>

</fieldset>
</form>
<? include('footer_new.php'); ?>
</div>
</div><!-- /.container --><!-- </center>   -->      
<!-- </div>  -->
 


	    				
          
					
							
						        
					



	    					