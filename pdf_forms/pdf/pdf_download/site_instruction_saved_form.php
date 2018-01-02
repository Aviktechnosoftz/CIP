<?php
session_start();
error_reporting(1);
 // print_r($_REQUEST);
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
if(isset($_REQUEST['save']))
{
 
   if($_POST['distribution']=="" OR $_POST['employee_new']=="")
  {
    ?>
    <script>alert("Please Fill New Attention and SI Details"); window.location.href='site_instruction_saved.php'</script>
    <?
  }
  else
  {
    $distribution= implode(",",$_POST['distribution']);
    $employee= implode(",",$_POST['employee_new']);

    $update_qry=$conn->query("update tbl_instruction set
                    
                    subject= '".$_POST['subject']."',
                    
                     employee_id= '".$employee."',
                     distribution_id= '".$distribution."',
                     instructions='".$_POST['instruction']."',
                    req_date= '".$_POST['req_date2']."',
                   
                    today_date='".$_POST['date_today']."',
                    
                  
                        clause='".$_POST['clause_filled_hide']."',
                        is_approved=1,
                    
                    modified_date=now() where id='".$_POST['instruction_id']."'");
          
          
          foreach ($_FILES[photo][name] as $key => $value) {
          // echo "ok";
          if($value!="")
          {
          
         $image_path= 'API/Uploads/';  
          $building_images_0  = $value;
           $target0 = $image_path . $building_images_0;

           move_uploaded_file($_FILES['photo']['tmp_name'][$key], $target0);
           $auploads .=$building_images_0.',';



          
          }
        

          // else
// {
  // $query="update `tbl_site_attendace` 
  // SET `employees_location`='".$_POST['comment']."',`no_of_worker`='".$_POST['zip']."' where `id`= '".$_POST['atendance_id']."'";

   // $update_query= $conn->query($query);
// }
        }
        
        
                $idimagesave = $_POST['instruction_id'];
          @$main_query_image= $conn->query("select attachments from tbl_instruction  where  id= '$idimagesave'")->fetch_object();
         
$img_arr_image=array();
$img_arr_image=$main_query_image->attachments;
if( $img_arr_image[0] == "" AND  $img_arr_image[1] == "" AND $img_arr_image[2] == "" AND $img_arr_image[3] == ""  ){
// print_r($img_arr_image);
 $attachments = rtrim($auploads,',');

$update_img= $conn->query("update tbl_instruction
  SET attachments='".$attachments."' where id= '".$_POST['instruction_id']."'");
 
}
else{
  
  
  $attac = rtrim($auploads,',');

 $attachments = $img_arr_image.','.$attac;

$update_img= $conn->query("update tbl_instruction
  SET attachments='".rtrim($attachments,",")."' where id= '".$_POST['instruction_id']."'");
  
}
        
              $dec = $_POST['desc'];
            
              $total_desc = array();    
              $total_desc = "";   
            $old_desc_hide = array();
            $old_desc_hide = $_POST['old_desc_hide'];
            
            $des_new = array();
            $des_new = "";
            
foreach ($_POST['desc'] as $k => $value) {
  // echo "ok";
  if($value!="")
  {            
         
  // $val=++$k;   
   // $update_image_desc= $conn->query("update tbl_instruction set image_".$val."_text='".$value."' where id='".$_POST['instruction_id']."'");
           $des_new .=$value.',';

  
  }
}
    $des_new = rtrim($des_new,',');
  
    //   print_r("old=");
    // print_r($old_desc_hide);
    // print_r("first0=");
    // print_r($old_desc_hide[0]);
    // print_r("second0=");
    // print_r($old_desc_hide[l]);
    
    // print_r("new=");
    // print_r($des_new);
    // print_r("firstn=");
    // print_r($des_new[0]);
    // print_r("secondn=");
    // print_r($des_new[1]);
if($old_desc_hide == "" AND $des_new != "")
{    
 // print_r("old_desc_hide=blank");

  // $total_desc = $des_new;
  // foreach ($total_desc as $d => $value) {
    foreach ($_POST['desc'] as $d => $value) {

  // echo "ok";
  if($value!="")
  {            
         
  $val=++$d;   
   $update_image_desc= $conn->query("update tbl_instruction set image_".$val."_text='".$value."' where id='".$_POST['instruction_id']."'");
           // $des_new .=$value.',';

  
  }
}
}
 if($des_new == "" AND $old_desc_hide != "") 
{   
  // print_r("des_new=blank");

  $total_desc = $old_desc_hide;
  foreach ($total_desc as $d => $value) {
  // echo "ok";
  if($value!="")
  {            
         
  $val=++$d;   
   $update_image_desc= $conn->query("update tbl_instruction set image_".$val."_text='".$value."' where id='".$_POST['instruction_id']."'");
           // $des_new .=$value.',';

  
  }
}
}    
 if($des_new != "" AND $old_desc_hide != "") 

{   
  // print_r("old_desc_hide=blank");

  // $total_desc = $des_new;
  // foreach ($total_desc as $d => $value) {
      $for_desc_c = 5;   
    foreach ($_POST['desc'] as $d => $value) {

  // echo "ok";
  if($value!="")
  {            
  $val=--$for_desc_c;   
  // $val=++$d;   
   $update_image_desc= $conn->query("update tbl_instruction set image_".$val."_text='".$value."' where id='".$_POST['instruction_id']."'");
           // $des_new .=$value.',';

  
  }
}
}
$str= implode($_POST['employee_new'],",");
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



    

        if($update_qry)
        {


          
          ?>
          <script>
            alert("Successfully Submitted the Instruction");
           window.location.href='site_instruction_approved.php';
          </script>
          <?
        }
    
  }
}
else
{
  @$main_query= $conn->query("select a.id,a.project_id,a.subject,a.clause,a.instructions,a.today_date,a.emp_id,a.image_1_text,a.image_2_text,a.image_3_text,a.image_4_text,a.distribution_id as distribution,a.employee_id,a.issued_by,a.req_date,a.attachments,b.company_name,b.phone_no as emp_phone,b.email_add as emp_email,c.given_name,c.surname,c.email_add from tbl_instruction a inner join tbl_employer b on a.emp_id = b.id inner join tbl_employee c on a.employee_id = c.id where a.project_id='".$_SESSION['admin']."' AND a.id='".$_REQUEST['approved_form']."'")->fetch_object();


@$project_name= $conn->query("select project_name,number from tbl_project where id='".$main_query->project_id."'")->fetch_object();
$issue_details= $conn->query("select id,given_name,surname,email_add from tbl_employee where id=".$main_query->issued_by."")->fetch_object();


$employee_name= $conn->query("select given_name,surname,email_add from tbl_employee where id IN (".$main_query->employee_id.")");
$distribution= $conn->query("select given_name,surname,email_add from tbl_employee where id IN (".$main_query->distribution.")");

//  print_r($main_query);
$img_arr=array();
$img_arr=explode(",",$main_query->attachments);
// print_r($img_arr[0]);
// print_r($img_arr[1]);
// print_r($img_arr[2]);
// print_r($img_arr[3]);

   

  $textArray = array(
    "2.1.3" => "The Contractor is entitled to require the Subcontractor at the Subcontractor's own cost from time to time to reschedule the performance of the whole or any part of the Subcontract Works including returning to the site on not less than 24 hours' notice to recommence the Subcontract Works. The Subcontractor is entitled to an extension of time if completion of the Subcontract Works is delayed by any such requirement. The Subcontractor acknowledges that any such requirement by the Contractor is not a breach of the Subcontract and the Contractor is not liable for any damages, costs and expenses suffered or incurred by the Subcontractor in complying with the requirement.",
    "2.4.1" => "The Subcontractor must carry out the Subcontract Works in accordance with any directions given by the Contractor from time to time. If any direction by the Contractor is not given in writing, it must be confirmed in writing within 3 days of the direction.If the Contractor considers there is an emergency, it may give an oral direction, which must be acted on immediately by the Subcontractor and confirmed in writing by the Contractor within 24 hours.",
    "2.4.2" => "If the Subcontractor wishes to claim that a direction, although not stated to be a variation, involves a variation, it must lodge written notice with the Contractor to that effect within 3 days of receipt of the direction otherwise any subsequent claim that a variation is involved is barred absolutely.Without limiting this clause, the Contractor may concede in a particular instance or instances that a variation is involved without waiving the requirement for such written notice to be given in all other instances.",
    "2.7" => "Cleaning Up
    When on site, the Subcontractor must clean up and remove all rubbish from the site daily or, if so directed by the Contractor to designated areas on the site.  Upon completion of the Subcontract Works, the Subcontractor must leave the site in a clean and tidy condition.If the Subcontractor fails within 24 hours from the receipt of a written direction by the Contractor to clean up or remove rubbish, the Contractor may (without being obliged to do so) arrange for the cleaning up, or, removal of the rubbish at the Subcontractors expense and the cost of doing so is a debt due and owing to the Contractor.  The Contractor will advise the Subcontractor of any costs incurred under this clause.",
    "5.3" => "Work by Others If the Subcontract Works is dependent on or appreciably affected by the quality of any other work to be carried out or that has been carried out by the Contractor or any Separate Contractors (“other work”):",
    "5.3.1" => "if the other work is defective, the Subcontractor must immediately notify the Contractor in writing so that the Contractor may arrange for the defects to remedied; and",
    "5.3.2" => "if the Subcontractor accepts the other work by proceeding with the execution of the Subcontract Works and the other work is subsequently found to be defective, then upon rectification of the other work by the Contractor (or any Separate Contractor), if directed by the Contractor the Subcontractor will re-execute that part of the Subcontract Works at no additional cost.",
    "5.7.2" => " If the Contractor discovers materials or work which is not in accordance with the Subcontract, the Contractor may direct the Subcontractor to comply with the Subcontract and to:",
    "5.7.3.1" => "remove materials from the site;",
    "5.7.3.2" => "demolish work;",
    "5.7.3.3" => "reconstruct, replace, or correct the materials or work; or",
    "5.7.3.4" => " not deliver the materials or work to the site.",
    "5.7.4" => "The Subcontractor must comply with all such directions within the times specified by the Contractor and at no cost to the Contractor.",
    "5.8" => "Cost of Rectification or Compliance"
    );

  $clauses=explode(",",$main_query->clause);
  $texts=array();
  // print_r($clauses);
  foreach($clauses as $key=>$value)
  {
     // $texts = $clauses[$key];
     array_push($texts, $textArray[$value]);
  }

$c= array_combine($clauses, $texts);
  // print_r($c);

}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>



<head>
<header>
 <? include('header.php'); ?>
 <? 
include('test_side_new_3.php') ?>
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

        <input type="hidden" name="id_to_post" value="<?= $_REQUEST['approved_form'] ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>

<div class="Main_Form2">
  <div class="col-md-12">
    <div class="alert alert-success" role="alert" style="<? if($success!='1'){ echo 'display:none;';}?>">
      <strong>Well done!</strong> You have successfully Sent Site Instruction Form Download Link.&nbsp;
      <button onclick="back()"> Go Back</button>
      <script>
        function back()
        {
            window.location.href='site_instruction_approved.php';
        }
      </script>
    </div>

    <form class="well form-horizontal well_class" action="" method="post"  id="contact_form"  enctype="multipart/form-data" onsubmit="return validate()">
      <fieldset>
      <div class="form-group">
                 <div class="col-md-12" style="padding-left: 0px;padding-bottom: 25px;">
                <label class="col-md-12 control-label" style="padding-left: 0px;"><span class="project_title" style="">PROJECT :&nbsp;<? echo $project_name->project_name ?> </span></label>
            </div>
        </div>
         <div class="alert alert-danger" style="<? if($counter!='1'){ echo 'display:none;';}?> ">
          <strong>Something Missing!</strong> Please Fill New SI and New Attention Details
        </div> 

      <div class="form-group">
           <div class="col-md-12 zeropadding">
           <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>              
               <input name="subject"  placeholder="Site Instruction Number" class="form-control"  type="text" name="" value="<?= str_pad($_REQUEST['approved_form'], 4, "0", STR_PAD_LEFT); ?>" readonly>
           </div>
           <input type="hidden" name="instruction_id" value="<?=$_REQUEST['approved_form'] ?>">
         </div>
       </div>

      <div class="form-group"> 
        <div class="col-md-12 zeropadding">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>            
              <input name="subject" id="subject" placeholder="Subject Goes Here" class="form-control"  type="text" value="<?echo $main_query->subject ?>" >        
            </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-12 zeropadding">
         <div class="input-group">              
            <div class="alert alert-info" style="text-align: justify;margin-bottom: 0px">
                  Site Instruction: This instruction is not a variation to the Subcontract. Should,however, the execution of the instruction result in additional costs which, in the opinion of the Trade Contractor would justify an application for a variation, then the Trade Contractor must submit sucha a claim within three (3) days of receipt of this instruction. Failure to do so will signify acceptance of this instruction without cost.
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
            <input  id="" placeholder="Page Goes Here" class="form-control"  type="text" value="<?= $main_query->company_name ?>" readonly>       
          </div>
        </div>
        </div>
        <div class="col-md-6 leftpadding">  
          <label class="col-md-12 control-label label-position">Date</label>
          <div class="col-md-12 zeropadding">
             <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input  id="" placeholder="Date Goes Here" class="form-control"  type="text" name="date_today" value="<? echo date('d-m-Y') ?>" readonly>
            </div>
          </div>
      </div>
    </div>

   <!--    <div class="form-group"> 
        <div class="col-md-6 rightpadding">
        <label class="col-md-12 control-label label-position">Page</label>
         <div class="col-md-12 zeropadding">
           <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
              <input  id="" placeholder="Page Goes Here" class="form-control"  type="text" value="01" readonly>
          </div>
        </div>
        </div>
        <div class="col-md-6 leftpadding">
        <label class="col-md-12 control-label label-position">Of</label>
        <div class="col-md-12 zeropadding">
           <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
              <input id="" placeholder="Of Goes Here" class="form-control"  type="text"  value="01" readonly>
          </div>
        </div>
        </div>
      </div> -->


      <div class="form-group">
        <div class="col-md-6 rightpadding">  
        <label class="col-md-12 control-label">Phone No.</label>
        <div class="col-md-12 zeropadding">
             <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input  id="phone" placeholder="Phone Goes Here" class="form-control"  type="text" value="<?=$main_query->emp_phone  ?>" readonly>
            </div>
         </div>
        </div>
        <div class="col-md-6 leftpadding">
        <label class="col-md-12 control-label label-position">Email</label>
          <div class="col-md-12 zeropadding" >
           <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              <input id="email" placeholder="Email Goes Here" class="form-control"  type="text"  value="<?=$main_query->emp_email ?>" readonly>
          </div>
        </div>
      </div>
      </div>

      <div class="form-group">
        <div class="col-md-12 zeropadding"> 
        <label class="col-md-12 control-label label-position">Previous Attention </label> 
          <div class="col-md-12 zeropadding">
           <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
              <?
            
  $seprator=",";
  $str_loop= "";
  while($rows=$employee_name->fetch_object()) {
  $str= $str.$rows->given_name." ".$rows->surname." ( ".$rows->email_add. ") ".$seprator;
  $str3= rtrim($str,',');
  }


?>   



              <input id="email" placeholder="Employee Name Here" class="form-control"  type="text"  value="<?=$str3;?>" readonly> 
            
          </div>
        </div>
        </div>
      </div>

          <div class="form-group" >
     <div class="col-md-12 zeropadding">
     <div id="new_attention">  
  
     <label class="col-md-12 control-label label-position" title="click pencil to edit">New Attention <i class="glyphicon glyphicon-pencil" onclick="var $example = $('.js-example-programmatic').select2();
  $('#limitedNumbSelect2').prop( 'disabled', false );
    $('#limitedNumbSelect2').focus();
    $example.select2('open');" >
  </i></label>
      <div class="col-md-12 zeropadding">
         <div class="input-group">
           <span class="input-group-addon"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
          <!-- <select  class="form-control selectpicker"  id="employee_name" name="employee_name" required >
          <option value=""> Please Select Employee</option>
        
          </select> -->

          <select name="employee_new[]" id="limitedNumbSelect2" class="js-example-programmatic form-control selectpicker col-md-6" multiple="true" style="-webkit-border-top-right-radius: 20px !important;
-webkit-border-bottom-right-radius: 20px;
-moz-border-radius-topright: 20px;
-moz-border-radius-bottomright: 20px;
border-top-right-radius: 20px;
border-bottom-right-radius: 20px">
  
<? $get_employee= $conn->query("select tbl_employee.id,tbl_employee.email_add,given_name,surname from tbl_employee INNER JOIN tbl_induction_register ON tbl_employee.id=tbl_induction_register.id where (tbl_induction_register.inducted_by IS NOT NULL AND tbl_induction_register.inducted_by != '') AND tbl_employee.employer_id='".$main_query->emp_id."'AND tbl_employee.id!=".$_SESSION['induction']." AND tbl_induction_register.project_id=".$_SESSION['admin']." ");


$get_si= $conn->query("select tbl_employee.id,tbl_employee.email_add,given_name,surname from tbl_employee INNER JOIN tbl_induction_register ON tbl_employee.id=tbl_induction_register.id where (tbl_induction_register.inducted_by IS NOT NULL AND tbl_induction_register.inducted_by != '') AND tbl_employee.employer_id='1' AND tbl_employee.id!=".$_SESSION['induction']." AND tbl_induction_register.project_id=".$_SESSION['admin']." ");

   while($row2= $get_employee->fetch_object())
   {
?>
<option value="<? echo $row2->id ?>"><? echo $row2->given_name." ".$row2->surname." (".$row2->email_add.")" ?> </option>
<?
   }
?>
</select>

        </div>
      </div>
       </div>
       </div>
      </div>



      <div class="form-group"> 
       <div class="col-md-12 zeropadding"> 
        <label class="col-md-12 control-label label-position">Instruction</label>
        <div class="col-md-12 zeropadding">
           <div class="alert alert-info">Instructions to be detailed with reference to attachments as necessary</div>
           
            <div class="input-group col-md-12">           
                <textarea class="form-control instruction_area" id="comment" style="-webkit-border-radius: 15px !important;-moz-border-radius: 15px !important;border-radius: 15px !important;border: none;font-size: 12px" rows="10" name="instruction"  > <? echo $main_query->instructions ?>  </textarea>

            </div>
        </div>
      </div>
    </div>


        <div class="form-group">

             <div class="col-md-12 zeropadding"> 
             <label class="col-md-4 control-label"></label>
            <div class="col-md-9 col-md-offset-2 text-center">
              <a class="" data-toggle="modal" data-target="#termsModal" style="text-decoration: none;cursor: pointer;">Edit Subcontract Conditions</a>
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
     <!--    <label class="col-md-12 control-label label-position">Instruction</label> -->
        <div class="col-md-12 zeropadding">
           <!-- <div class="alert alert-info">Instructions to be detailed with reference to attachments as necessary</div> -->
          <div class="alert alert-info" id="clause_filled" style="display: none"></div> 
           <input type="text" name="clause_filled_hide" id="clause_filled_hide" value="<?= $main_query->clause ?>" hidden> 
          <div class="input-group col-md-12">
           
            <!-- <span class="input-group-addon" id="addon"></span> -->
             <div class="form-control instruction_area" rows="15" id="contract_condition" name="" style="-webkit-border-radius: 15px !important;-moz-border-radius: 15px !important;border-radius: 15px !important;font-size: 12px;height:auto;background-color: white !important  " readonly> <?foreach($c as $key=>$value)
          { echo "<b>$key</b>:"." ".$value."<br /><br />";
         
            }?> </div>


           
         
          </div>
        </div>
      </div>
      </div>

    <div class="form-group"> 
      <div class="col-md-12 zeropadding">
      <label class="col-md-12 control-label label-position">Requested Completion Date</label>  
          <div class="col-md-12 zeropadding">
           <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input type="text" name="date" id="date" class="form-control"  readonly placeholder="Click Here To Select Date"  />
            <input type="hidden" name="req_date2" id="date2" class="form-control"  readonly placeholder="DD/MM/YYYY" value="<?=$main_query->req_date ?>" />
          </div>
        </div>
      </div>
    </div>
          <? if($distribution->num_rows>0) { ?>
         <div class="form-group"> 
    <div class="col-md-12 zeropadding"> 
      <label class="col-md-12 control-label label-position">Previous SI</label>
      <div class="col-md-12 zeropadding">
       <div class="input-group">
           <span class="input-group-addon"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
           <?
              $seprator=",";
              $str_loop= "";
              while($rows3=$distribution->fetch_object()) {
              $str2= $str2.$rows3->given_name." ".$rows3->surname." (".$rows3->email_add. ") ".$seprator;
              
           }
            
              $str3= rtrim($str2,',');
            ?>
          <textarea  id="distribution" placeholder="Distribution List" class="form-control" style="resize: none;" readonly> <?=$str3?></textarea>      
        </div>
      </div>
    </div>
  </div>

  <? }?>
       <div class="form-group"> 
    <div class="col-md-12 zeropadding"> 
    <label class="col-md-12 control-label label-position" title="click pencil to edit">New SI <i class="glyphicon glyphicon-pencil" onclick="var $example1 = $('.js-example-programmatic1').select2();
  $('#limitedNumbSelect3').prop( 'disabled', false );
    $('#limitedNumbSelect3').focus();
    $example1.select2('open');"></i></label>
      <div class="col-md-12 zeropadding">
         <div class="input-group">
           <span class="input-group-addon"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
               <select name= "distribution[]" id="limitedNumbSelect3" class="js-example-programmatic1 form-control selectpicker" multiple="true">
               <? while($row2= $get_si->fetch_object())
                {?>
            <option value="<?= $row2->id ?>"><? echo $row2->given_name." ".$row2->surname." (".$row2->email_add.") " ?></option>
                
                <?}?>
              </select>
        </div>
      </div>
    </div>    
  </div>
  
  <?php if (  $img_arr[0] == "" AND  $img_arr[1] == "" AND $img_arr[2] == "" AND $img_arr[3] == ""   )
  {
$dickmeupfold = "";   
    $w=0;
    $calcu = 4;
  } 
  else {
  ?>    
               


  
  <div class="form-group">
        <label class="col-md-12 control-label label-position">Previous Image</label>
    <div class="col-md-12 zeropadding"> 

                            <div class="col-sm-12" >
                          <?php  foreach ($img_arr as $key=>$value) { 

                              // $j=$key+1;
                              
                            ?>
                              
                              <div class="col-sm-3">
                
                  <span class="glyphicon glyphicon-eye-open" id="viewer<?=$key ?>"  style="left: 83px;position: relative;top: -22px;"></span>

                              <img id="upload_<?=$key ?>" height="70px" width="70px"  src= "<? if($img_arr[$key]!="") echo "API/Uploads/".$img_arr[$key] ?>" onerror="this.src='Document.png'">
                
                <input type="hidden" id="hid4image<?=$key ?>" value="<? if($img_arr[$key]!="") echo "API/Uploads/".$img_arr[$key] ?>">

                              </div>
                              


                                <?php $w++ ; }   
                // echo '<script>alert("'.$w.'");</script>';
                $calcu = 4 - $w ; 
                ?>
                                </div>


                                <div class="col-sm-12" >
                                
                                <?php
                
                for($i=1;$i<=4;$i++){

                                    $image_text_col="image_".$i."_text";
                                    if($main_query->$image_text_col !="")
                                    {
                                  ?>

                                    <div class="col-sm-3">
                              <input name="desc<?=$i ?>" placeholder="Image Description" class="simple_field form-control"  id="desc<?=$i ?>"  type="text" value="<?=$main_query->$image_text_col ?> " readonly>
                              </div>
                              <?php 
                    
                  $dickmeup .=$main_query->$image_text_col.',';
                      $dickmeupfold = rtrim($dickmeup,',');

                
                }  }
               
                // echo '<script>alert("'.$dickmeupfold.'");</script>';
                ?>
                                     
                                    </div>  
  
  </div>
   </div>
   <?php if($w < 4) {?><hr/><?php }?>
  <?php } ?> <?php if($calcu < 5) {  ?>
  
  <div class="form-group">
        <?php if($w != 4 ) {?><label class="col-md-12 control-label label-position">New Image <small> (you can add upto) <b style="background-color: #E4E4E4;padding:5px;border-radius:50px"><?php echo $calcu; ?></b> image(s)</small></label><?php }?>
    <div class="col-md-12 zeropadding"> 
   
                            <div class="col-sm-12" >
              
                          <?php for($jj = $w ;$jj<4;$jj++){ $j = $jj + 5; ?>
                    
          <div class="col-sm-3 text-center">
              <span class="glyphicon glyphicon-eye-open" id="viewer<?php echo $j ;?>"  style="display:none;left:0px;position:relative;top:25px"></span>

               <div id="uploader<?php echo $j ;?>"  onclick="$('#file_<?php echo $j ;?>').click()" style="text-align: left;padding-left: 20px;" >
                <img id="upload_<?php echo $j ;?>"  width="70" height="70"  onerror="javascript:this.src='Document.png'" />
                </div>
                <input type="file" name="photo[]" id="file_<?php echo $j ;?>" 
              onchange="document.getElementById('upload_<?php echo $j ;?>').src = window.URL.createObjectURL(this.files[0]); $('#desc<?php echo $j ;?>').show();
      $('#desc<?php echo $j ;?>').attr('required', true);document.getElementById('viewer<?php echo $j ;?>').style.display = 'block';">
              <input name="desc[]" placeholder="Image Description" class="simple_field form-control"  id="desc<?php echo $j ;?>"  type="text" value="" style="display:none" >
              </div>
                              
              <?php } ?>
                                     
                                    </div>  
   </div>
   </div>   
       <?php } ?>

    <div class="form-group"> 
      <div class="col-md-12 zeropadding">
        <label class="col-md-12 control-label label-position">Issued By</label>  
        <div class="col-md-12 zeropadding">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="issue_by" id="" placeholder="Issued By Here" class="form-control"  type="text"  value="<?=$issue_details->given_name." ".$issue_details->surname ?>" readonly>
          </div>
        </div>
      </div>
    </div>

  
<div class="form-group">
       <div class="col-md-12 zeropadding"> 
          <div class="col-md-12 zeropadding">
             <div class="input-group" style="display:none">
        <label class="col-md-12 control-label label-position">Pin</label>
                <span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
                <input name="req_date" id="pin_enter" placeholder="Pin To Submit" class="form-control"  type="text"  value="1111"  >
            </div>

            <input type="text" name="clause_hide2" id="clause_hide" hidden>
    </div>
  </div>
  </div>
  <?php                 
  // echo '<script>alert("'.$dickmeupfold.'");</script>'; ?>
  <input type="hidden" name="old_desc_hide[]" value="<?php echo$dickmeupfold; ?>">
  <div class="form-group">
      <div class="col-md-12 zeropadding">
        <center>
          <div class="input-group col-md-5">
              <input type="submit" id="save" name="save" value="Submit" class="btn btn-warning form_submit_button"  >
            </div>
        </center>
      </div>  
  </div>
  <script>
   // function update()
              // {
                  // alert("ok");
                  // var a= $('#contact_form').serialize();
                   
                   // var formData = new FormData($("#contact_form")[0]);
                    
                    // $.each($('input[type=file]').files, function(i, file) {
                   // formdata.append(i, file);
                    // });
                     // alert(formData);  
// console.log(formData);
            // $.ajax({
                // url: 'site_instruction_saved_form_save.php',
                // type: 'POST',
                // data: formData,
                // async: false,
                // success: function (data) {
                    // alert(data);
                    // alert("Changes Saved Successfully");
                    // window.location.href = 'site_attendance_approved.php';
                // },
                // cache: false,
                // contentType: false,
                // processData: false
            // });

            

                  
              // }
        </script>
<script>
// function pin_btn()
// {
//   $("#save").attr("disabled", true);
//        $("#save").attr("value", "Submit");
//         $("#save").css({"background-color":"#f47821"});
//         $("#save").animate({color:'white'},100);
// }
// function pin_btn_aprrove()
// {
//   $("#save").attr("disabled", false);
//        $("#save").attr("value", "Submit");
//         $("#save").css({"background-color":"#f47821"});
//         $("#save").animate({color:'white'},100);
// }
//   function pin_approve()
// {
//  var pin_enter= $('#pin_enter').val();
//  var pin_db= <? echo $_SESSION['pin'] ?>;
//  if(pin_enter == pin_db)
//  {
//   pin_btn_aprrove();
//  }
//  else
//  {
//    pin_btn();
//  }
// }

// $(document).ready(function() {
//   pin_btn();
// });

</script>

<!-- </div>


</div> -->

<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="Terms and conditions" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: center;color: black"><b>Subcontract Conditions</b></h4>
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


</fieldset>
<? include("footer_new.php"); ?>
</form>

</div>
<span id="hidden_option" style="display: none;"></span>
</div>


  <style> 


#attention
{
    border: 0;
    border-bottom: 1.5px solid black;
    outline: 0;
}


h4
{
    color: #95989a;
    font-size: 2.4vh;
    font-weight: 900;
}

#upload_0,#upload_1,#upload_2,#upload_3
{
    background-image: url('Document.png');
    background-size: 70px 70px;
    border-radius: 7vh;
    border:solid 1px grey;

}
#upload_4,#upload_5,#upload_6,#upload_7,#upload_8
{
   background-image: url('image/upload_image.png');
    background-size: 70px 70px;
    border-radius: 7vh;
      border:solid 1px grey;

    }

input[type='file'] {
        }

.select2-container--default .select2-selection--multiple .select2-selection__rendered {
padding: 6px 12px;
}
#comment {

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
  margin-top: 10px;
}

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
#termsModal .modal-body
{
  height:500px;
  overflow:auto;
}
</style>



<script>

$(".open-AddDialog").click(function(){
    var email = $('#emp_email_hide').val();
     var email2 = $('#email').val();
     var distribution_email= $('#distribution_email').val();
      var distribution= $('#distribution').val();
     // $(".modal-body #emp_email").val(email);
     // $(".modal-body #employer_email").val(email2);
     //  $(".modal-body #distribution_modal").val(distribution);
     //   $(".modal-body #hidden_email_distribution").val(distribution_email);
    
  });
 
$("#limitedNumbSelect2").select2({
        maximumSelectionLength: 15,
    placeholder: "Please Select Employees"
  
});
      $(document).ready(function(){

         $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
  //Chosen
  
  //Select2
  $("#limitedNumbSelect3").select2({
        maximumSelectionLength: 15,
    placeholder: "Please Distribution List",

    
    })
});
$( "#date" ).datepicker({
  dateFormat: 'dd-mm-yy',
  // maxDate: new Date(),

  onSelect: function(date) {

    $('#date2').val(date);


  }
 });
var parsedDate = $.datepicker.parseDate('dd-mm-yy', "<?php echo $main_query->req_date; ?>");
// $("#date").datepicker(
//     "setDate", new Date("")
// );
$('#date').datepicker('setDate', parsedDate);
  $(document).ready(function(){
  //Chosen
  
  //Select2
  $('#limitedNumbSelect2').prop("disabled", "true");
    $('#limitedNumbSelect3').prop("disabled", "true");

  $.each(<?echo json_encode($c) ?>, function(i, value){

    $('input[type="checkbox"][value="' + i.toString() + '"]').prop("checked", true);
    

})

});
    
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

</script> 

<script>
  function validate()
  {
    if($('#subject').val().trim()=='')
    {
      alert("Please Enter Subject");
      return false;
    }
    else if($('#comment').val().trim()=='')
    {
      alert("Please Enter Instruction");
      return false;
    }
    else if ($(".clause:checked").length <= 0)
    {
    alert("Please Select Subcontract Condition");
      return false;
    }
    else if($('#date2').val().trim()=='')
    {
      alert("Please Select Completion Date");
      return false;
    }

    else
    {
      $('#contact_form').submit();
    }
  }

</script>


<script>
/*
                $(function() {

                $("#Img1").on("change", function() {
 
        var files = !! this.files ? this.files : [];
                        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                        if (/^image/.test(files[0].type)) { // only image file
                            var reader = new FileReader(); // instance of the FileReader
                            reader.readAsDataURL(files[0]); // read the local file

                            reader.onloadend = function() { // set image data as background of div
                                $("#preview0").attr("src", this.result);
                                
                            }
                        }

              });
            });
                $(function() {

                $("#Img2").on("change", function() {
 
        var files = !! this.files ? this.files : [];
                        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                        if (/^image/.test(files[0].type)) { // only image file
                            var reader = new FileReader(); // instance of the FileReader
                            reader.readAsDataURL(files[0]); // read the local file

                            reader.onloadend = function() { // set image data as background of div
                                $("#preview1").attr("src", this.result);
                            }
                        }

              });
            });
                $(function() {

                $("#Img3").on("change", function() {
 
        var files = !! this.files ? this.files : [];
                        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                        if (/^image/.test(files[0].type)) { // only image file
                            var reader = new FileReader(); // instance of the FileReader
                            reader.readAsDataURL(files[0]); // read the local file

                            reader.onloadend = function() { // set image data as background of div
                                $("#preview2").css("background-image", "url(" + this.result + ")");
                            }
                        }

              });
            });
                  $(function() {

                $("#Img4").on("change", function() {
 
        var files = !! this.files ? this.files : [];
                        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                        if (/^image/.test(files[0].type)) { // only image file
                            var reader = new FileReader(); // instance of the FileReader
                            reader.readAsDataURL(files[0]); // read the local file

                            reader.onloadend = function() { // set image data as background of div
                                $("#preview3").css("background-image", "url(" + this.result + ")");
                            }
                        }

              });
            });
                  $(function() {

                $("#Img5").on("change", function() {
 
        var files = !! this.files ? this.files : [];
                        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                        if (/^image/.test(files[0].type)) { // only image file
                            var reader = new FileReader(); // instance of the FileReader
                            reader.readAsDataURL(files[0]); // read the local file

                            reader.onloadend = function() { // set image data as background of div
                                $("#preview4").css("background-image", "url(" + this.result + ")");
                            }
                        }

              });
            });
       */
  </script>


<!-- The Modal -->
                      <div id="myModal" class="modal">
                        <div class="modeliconbackgroundcolor"></div>
                        <span class="close">&times;</span>
        <a class="help-button  downloadupaddinvoice0 fa fa-download" id="onerrorm0"   download style="display:none"></a>
        <a class="help-button  downloadupaddinvoice1 fa fa-download" id="onerrorm1"   download style="display:none"></a>
        <a class="help-button  downloadupaddinvoice2 fa fa-download" id="onerrorm2"   download style="display:none"></a>
        <a class="help-button  downloadupaddinvoice3 fa fa-download" id="onerrorm3"   download style="display:none"></a>
        <a class="help-button  downloadupaddinvoice4 fa fa-download" id="onerrorm4"   download style="display:none"></a>
  
                        

                       
                        
                        <img class="modal-content modal-content-image north" id="img01"  onerror="this.src='Document.png'">
                    </div>
          <script>

  // model script for first image
  
var modal = document.getElementById('myModal');
var modalImg = document.getElementById("img01");
// alert(fileVal.value);

// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg = document.getElementById('viewer1');
var img = document.getElementById('upload_1');
var hid4image1 = document.getElementById('hid4image1').value;
viewerimg.onclick = function(){
  // alert(img.src);
    // modal.style.display = "block";
    
   // var path="API/Uploads/"+;
  
          var imgsrc = img.src.split("/").reverse()[0];
          var path="API/Uploads/"+imgsrc;
  modalImg.src = path;

            $("#onerrorm1").attr("href" ,hid4image1);
  
    $('#onerrorm1').show();
  $('#myModal').show();
  
  
    // alert(img.src);
  
}
// Get the <span> element that closes the modal

$(document).ready(function(){
$(".close").click (function() {
      $("#onerrorm0").hide(); $("#onerrorm1").hide(); $("#onerrorm2").hide(); $("#onerrorm3").hide(); $("#onerrorm4").hide(); 
      $("#myModal").hide();
$('#img01').attr('src', '');    
});
});   
</script>
<script>
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg0 = document.getElementById('viewer0');
var img0 = document.getElementById('upload_0');
var hid4image0 = document.getElementById('hid4image0').value;

viewerimg0.onclick = function(){
  // alert(img.src);
    // modal.style.display = "block";
    
   // var path="API/Uploads/"+;
    $('#onerrorm0').show();
  $('#myModal').show();
  modalImg.src = img0.src;
          var imgsrc = img0.src.split("/").reverse()[0];
          var path="API/Uploads/"+imgsrc;

            $("#onerrorm0").attr("href" ,hid4image0);
  
  
  
    // alert(img.src);
  
  
}

</script>
<script>
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg2 = document.getElementById('viewer2');
var img2 = document.getElementById('upload_2');
var hid4image2 = document.getElementById('hid4image2').value;

viewerimg2.onclick = function(){
  // alert(img.src);
    // modal.style.display = "block";
    
   // var path="API/Uploads/"+;
    $('#onerrorm2').show();
  $('#myModal').show();
  modalImg.src = img2.src;
          var imgsrc = img2.src.split("/").reverse()[0];
          var path="API/Uploads/"+imgsrc;

            $("#onerrorm2").attr("href" ,hid4image2);
  
  
  
    // alert(img.src);
  
  
}

</script>
<script>
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg3 = document.getElementById('viewer3');
var img3 = document.getElementById('upload_3');
var hid4image3 = document.getElementById('hid4image3').value;

viewerimg3.onclick = function(){
  // alert(img.src);
    // modal.style.display = "block";
    
   // var path="API/Uploads/"+;
          var imgsrc = img3.src.split("/").reverse()[0];
          var path="API/Uploads/"+imgsrc;

            $("#onerrorm3").attr("href" ,hid4image3);
  
  
  modalImg.src = img3.src;
  
    // alert(img.src);
    $('#onerrorm3').show();
  $('#myModal').show();
  
  
}

</script>
<script>
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg4 = document.getElementById('viewer4');
var img4 = document.getElementById('upload_4');
viewerimg4.onclick = function(){
  // alert(img.src);
    // modal.style.display = "block";
    
   // var path="API/Uploads/"+;
          var imgsrc = img4.src.split("/").reverse()[0];
          var path="API/Uploads/"+imgsrc;

            $("#onerrorm4").attr("href" ,path);
  
  
  modalImg.src = img4.src;
  
    // alert(img.src);
    $('#onerrorm4').show();
  $('#myModal').show();
  
  
}

</script>
<script>
$(document).ready(function(){
$(".close").click (function() {
      $("#onerrorm0").hide(); $("#onerrorm1").hide(); $("#onerrorm2").hide(); $("#onerrorm3").hide(); $("#onerrorm4").hide(); 
      $("#myModal").hide();
$('#img01').attr('src', '');    
});
});   
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg5 = document.getElementById('viewer5');
var img5 = document.getElementById('upload_5');
viewerimg5.onclick = function(){
  // alert(img.src);
    // modal.style.display = "block";
    
   // var path="API/Uploads/"+;
          var imgsrc = img5.src.split("/").reverse()[0];
          var path="API/Uploads/"+imgsrc;

            // $("#onerrorm4").attr("href" ,path);
  
  
  modalImg.src = img5.src;
  
    // alert(img.src);
    // $('#onerrorm4').show();
  $('#myModal').show();
  
  
}

</script>
<script>
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg6 = document.getElementById('viewer6');
var img6 = document.getElementById('upload_6');
viewerimg6.onclick = function(){
  // alert(img.src);
    // modal.style.display = "block";
    
   // var path="API/Uploads/"+;
          var imgsrc = img6.src.split("/").reverse()[0];
          var path="API/Uploads/"+imgsrc;

            // $("#onerrorm4").attr("href" ,path);
  
  
  modalImg.src = img6.src;
  
    // alert(img.src);
    // $('#onerrorm4').show();
  $('#myModal').show();
  
  
}

</script><script>
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg7 = document.getElementById('viewer7');
var img7 = document.getElementById('upload_7');
viewerimg7.onclick = function(){
  // alert(img.src);
    // modal.style.display = "block";
    
   // var path="API/Uploads/"+;
          var imgsrc = img7.src.split("/").reverse()[0];
          var path="API/Uploads/"+imgsrc;

            // $("#onerrorm4").attr("href" ,path);
  
  
  modalImg.src = img7.src;
  
    // alert(img.src);
    // $('#onerrorm4').show();
  $('#myModal').show();
  
  
}

</script><script>
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg8 = document.getElementById('viewer8');
var img8 = document.getElementById('upload_8');
viewerimg8.onclick = function(){
  // alert(img.src);
    // modal.style.display = "block";
    
   // var path="API/Uploads/"+;
          var imgsrc = img8.src.split("/").reverse()[0];
          var path="API/Uploads/"+imgsrc;

            // $("#onerrorm4").attr("href" ,path);
  
  
  modalImg.src = img8.src;
  
    // alert(img.src);
    // $('#onerrorm4').show();
  $('#myModal').show();
  
  
}

</script>
              
                  <script>
// uploader1
var imageLoader = document.getElementById('file_5');
    imageLoader.addEventListener('change', handleImage, false);

function handleImage(e) {
    
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader5 img').attr('src',event.target.result);
        $('#upload_5').css('background-image','none');
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox;
dropbox = document.getElementById("uploader5");
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
        $("#viewer5").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  $('#upload_5').css('background-image','none');
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader.files = files;
  $('#desc5').show();
      $('#desc5').attr('required', true);
}
</script>
<script>
// uploader2

var imageLoader6 = document.getElementById('file_6');
    imageLoader6.addEventListener('change', handleImage6, false);

function handleImage6(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader6 img').attr('src',event.target.result);
        $('#upload_6').css('background-image','none');
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
        $("#viewer6").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  $('#upload_6').css('background-image','none');
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader6.files = files;
   $('#desc6').show();
      $('#desc6').attr('required', true);
}
</script>
<script>
// uploader3

var imageLoader7 = document.getElementById('file_7');
    imageLoader7.addEventListener('change', handleImage7, false);

function handleImage7(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader7 img').attr('src',event.target.result);
        $('#upload_7').css('background-image','none');
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox7;
dropbox7 = document.getElementById("uploader7");
dropbox7.addEventListener("dragenter", dragenter7, false);
dropbox7.addEventListener("dragover", dragover7, false);
dropbox7.addEventListener("drop", drop7, false);

function dragenter7(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover7(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop7(e) {
        $("#viewer7").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  $('#upload_7').css('background-image','none');
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader7.files = files;
   $('#desc7').show();
      $('#desc7').attr('required', true);
}
</script>
<script>
// uploader3

var imageLoader8 = document.getElementById('file_8');
    imageLoader8.addEventListener('change', handleImage8, false);

function handleImage8(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader8 img').attr('src',event.target.result);
        $('#upload_8').css('background-image','none');
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox8;
dropbox8 = document.getElementById("uploader8");
dropbox8.addEventListener("dragenter", dragenter8, false);
dropbox8.addEventListener("dragover", dragover8, false);
dropbox8.addEventListener("drop", drop8, false);

function dragenter8(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover8(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop8(e) {
        $("#viewer8").show();

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  $('#upload_8').css('background-image','none');
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader8.files = files;
   $('#desc8').show();
      $('#desc8').attr('required', true);
}
</script>





          


<style>
<!-- Get the modal css -->
#upload_0,#upload_1 , #upload_2,#upload_3,#upload_4 {
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
.downloadupaddinvoice0,.downloadupaddinvoice1,.downloadupaddinvoice2,.downloadupaddinvoice3,.downloadupaddinvoice4 {
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