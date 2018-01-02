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
if(@$_GET['redirect']=="true")
{
$main_query= $conn->query("select a.id,a.project_id,a.subject,a.instructions,a.today_date,a.emp_id,a.employee_id,b.company_name,c.given_name,c.surname,c.email_add
from
    tbl_instruction a
        inner join
   tbl_employer b
        on a.emp_id = b.id
        inner join 
    tbl_employee c
        on a.employee_id = c.id where  date(a.created_date)='".$_GET['d']."' AND a.is_approved='1' AND b.company_name='".$_GET['e']."'  AND a.project_id= '".$_SESSION['admin']."' order by a.id desc ");

}
 else
{
$main_query= $conn->query("select a.id,a.project_id,a.subject,a.instructions,a.today_date,a.emp_id,a.employee_id,b.company_name,c.given_name,c.surname,c.email_add
from
    tbl_instruction a
        inner join
   tbl_employer b
        on a.emp_id = b.id
        inner join 
    tbl_employee c
        on a.employee_id = c.id where a.is_approved='1' AND a.project_id=".$_SESSION['admin']." order by a.id desc");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>



<head>
<header>
 <? include('header.php'); ?>
<? include('test_side_new_3.php') ?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <script src="js/jquery.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
 

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">
 
</header>

<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">CONTRACTS ADMINISTRATION MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">Approved Site Instruction Form&nbsp;<?// echo $project_name->project_name ?> </span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>

<body onbeforeunload=”HandleBackFunctionality()” style="background-color: white">


	<div class="Main_Form_list">

      <div class="well form-horizontal well_class" >
      <div class="form-group">
           <div class="col-md-12" style="padding-left: 0px;padding-bottom: 5px;">
                <label class="col-md-12 control-label" style=""><span class="project_title" style="">PROJECT :&nbsp;<? echo $_SESSION['project_name'] ?> </span></label>
            </div>
        </div>
			 <table  class="table table-hover" style= "border: 1px solid rgba(128, 128, 128, 0.57);"">
        <tr style="background-color: #696969; color: white">
            <th>Site Instruction Number</th>
            <th>Employer Name</th>
             <th>Subject</th>
            <th>Created Date</th>
            <th style="text-align: left;">Review</th>

        </tr>

         <tbody style="" id='user'>
              <?

              while($row=$main_query->fetch_object())
                {?>
              
              <tr style="background-color: #f5f5f5; font-size: 15px"> 
              
                <td><? $value= str_pad($row->id, 4, '0', STR_PAD_LEFT); echo $value; ?></td>
                <td><? echo $row->company_name ?></td>
                <td><? echo $row-> subject?></td>
                 <td><? echo $row-> today_date?></td>
                <td>
                  <form id="approved_form<?=$row->id?>" method="post" action="site_instruction_approved_form.php" >
                  <input type="hidden"  name="approved_form" value="<?=$row->id?>" />
                  <input type="submit" class="btn btn-primary" class="button edit_click1" value="Review Form" style="cursor:pointer;width: 8vw;
  background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;
  border:none;
  outline: none;font-size: 1.6vh" /> <br><br>
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

<style >
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

/*.btn-primary:hover {
    color: white;
background-color:#f47821;
    border:none;
    outline: none;
}
.btn-primary:focus {
    
}*/
</style>