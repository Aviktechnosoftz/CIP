<?php

session_start();
include_once('connect.php');
if(!isset($_SESSION['admin']))
{
	header("location:logout.php");
}
else
{
	$user= $_SESSION['admin'];
}


$main_query= $conn->query("select tbl_employee.id, tbl_employee.given_name as name,tbl_employee.pin,tbl_employee.email_add,tbl_employee.contact_phone,tbl_employer.company_name, tbl_visitor_induction.induction_no,tbl_visitor_induction.id as visit_id,tbl_visitor_induction.position,tbl_visitor_induction.today_date,tbl_visitor_induction.visitor_business,tbl_visitor_induction.visitor_name,tbl_visitor_induction.visitor_mobile,tbl_visitor_induction.visit_reason,tbl_visitor_induction.visit_in ,tbl_visitor_induction.visit_out  FROM tbl_employee JOIN tbl_visitor_induction ON tbl_employee.id = tbl_visitor_induction.induction_no JOIN tbl_induction_register ON tbl_employee.id = tbl_induction_register.id JOIN tbl_employer ON tbl_employer.id = tbl_induction_register.empid WHERE tbl_visitor_induction.project_id ='".$_SESSION['admin']."'  AND visit_out !='' ORDER BY created DESC");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>



<head>
<header>
 <? include('header.php'); ?>
   <? include('test_side_new.php');?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">
</header>
<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">Approved Visitor Induction Form&nbsp;<?// echo $project_name->project_name ?> </span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>
<body onbeforeunload=”HandleBackFunctionality()” style="background-color: white">


	<<div class="Main_Form_list">

      <div class="well form-horizontal well_class" >
      <div class="form-group">
           <div class="col-md-12" style="padding-left: 0px;padding-bottom: 5px;">
                <label class="col-md-12 control-label" style=""><span class="project_title" style="">PROJECT :&nbsp;<? echo $_SESSION['project_name'] ?> </span></label>
            </div>
        </div>
			
			 <table  class="table table-hover" style= "border: 1px solid rgba(128, 128, 128, 0.57);"">
        <tr style="background-color: #696969; color: white">
            <th>Induction Number</th>
            <th>Employer/Business Name</th>
            <th>Created Date</th>
            <th style="text-align: left;">Review</th>

        </tr>

         <tbody style="" id='user'>
              <?

              while($row=$main_query->fetch_object())
                {?>
              
              <tr style="background-color: #f5f5f5; font-size: 15px"> 
              
                <td><? $value= str_pad($row->induction_no, 4, '0', STR_PAD_LEFT); echo $value; ?></td>
                <td><? echo $row->company_name?></td>
                <td><? echo $row->today_date?></td>
                <td>
                  <form id="visitor_attendance_form<?=$row->id?>" method="post" action="visitor_induction_form.php" >
                  <input type="hidden"  name="visitor_form" value="<?=$row->visit_id?>" />
                  <input type="submit" class="btn btn-primary" class="button edit_click1" value="Review Form" style="width: 8vw;
  background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;
  border:none;
  outline: none;font-size: 1.6vh" /> 
                </form>  
                </td>
               
              </tr>

             <? } ?>
          </tbody> 
      </table>

   

      </div> <!-- wrapper close -->
     
        

</div><!--container close-->
	


</body>
<footer>
  <? include("footer.php"); ?>
<footer>

<style>
  th {
    
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
.btn-primary
{
  width: 8vw;
  background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;
  border:none;
  outline: none;
}
</style>