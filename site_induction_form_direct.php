<?php

error_reporting(0);
include_once('connect.php');

$refrence_no= $_REQUEST['ref'];
$get_details_ref= $conn->query("select * from tbl_refrence where refrence_no='".$refrence_no."'");

 $row_cnt = $get_details_ref->num_rows;
 $details= $get_details_ref->fetch_object();

if($row_cnt>= 1)
{
  session_start();
  $_SESSION['admin2']= $details->project_id;
  $_SESSION['induction2']= $details->induction_id;
  $_SESSION['pin2']= $details->pin;

}
else
{
  header("location:logout_direct.php");
}
if(isset($_POST['logout_direct']))
{
  header("location:logout_direct.php");
}
$obj=$conn->query("Select * FROM tbl_project WHERE id ='".$_SESSION['admin2']."'")->fetch_object();
$obj2=$conn->query("Select MAX(id)+1 AS 'id' FROM tbl_induction_register")->fetch_object();
$obj3=$conn->query("select name from tbl_access INNER JOIN tbl_project_register ON tbl_access.id=tbl_project_register.access_id where project_id=".$_SESSION['admin2']." group by name")->fetch_object();

// echo "select name from tbl_access INNER JOIN tbl_project_register ON tbl_access.id=tbl_project_register.access_id where project_id=".$_SESSION['admin2']." group by name";
$obj4=$conn->query("Select * FROM tbl_employer where is_deleted=0 AND project_id=".$_SESSION['admin2']." order by company_name");
$obj6=$conn->query("Select tbl_employee.id,concat(tbl_employee.given_name ,' ',tbl_employee.surname) as name,tbl_employer.company_name FROM tbl_employee left join tbl_employer on  tbl_employee.employer_id = tbl_employer.id where tbl_employer.id is not null");

if(isset($_POST['set']) && !empty($_POST['set']) && $_POST['sign_div_hide'] !="")
{

    // Insert Table Employee Details
    if(!empty($_POST['medical_check']))
    {
      $medical_check= 1;
      $medical_details= $_POST['medical_detail'];
    }
    else
    {
      $medical_check= 0;
      $medical_details= "";
    }
    if(!empty($_POST['check_gcic']))
    {
      $gcic_check= 1;
    }
    else
    {
      $gcic_check= 0;
    }
$induction_id = $_POST['induction_number'];
  // $induction_id = '786'; 
$empe_name= $_POST['empe_name'];
$empe_surname= $_POST['empe_surname'];
$empe_add=$_POST['empe_add'];
$empe_dob=$_POST['empe_dob'];
$empe_contact=$_POST['empe_contact'];
$empe_occupation=$_POST['empe_occupation'];
$empe_position=$_POST['empe_position'];
$empe_email=$_POST['empe_email'];
$empe_emrg_name=$_POST['empe_emrg_name'];
$get_emp_name= $_POST['select_employer'];
//get employer_id by name
// $get_emp_name=  $conn->query("Select id from tbl_employer where company_name='".$employer_name."'")->fetch_object();
$employer_id= $get_emp_name;
$empe_emrg_number=$_POST['empe_emrg_number'];
$empe_emrg_relation=$_POST['empe_emrg_relation'];
$qry_employee = $conn->query("insert into tbl_employee set 
                    given_name = '".trim(mysqli_real_escape_string($conn,$empe_name))."',
                    surname = '".trim(mysqli_real_escape_string($conn,$empe_surname))."',
                    address = '".trim(mysqli_real_escape_string($conn,$empe_add))."',
                    DOB = '".trim($empe_dob)."',
                    contact_phone = '".trim($empe_contact)."',
                    occupation = '".trim($empe_occupation)."',
                    job_title = '".trim($empe_position)."',
                    emrg_contact_name = '".trim($empe_emrg_name)."',
                    emrg_contact_phone  = '".trim($empe_emrg_number)."',
                    emrg_contact_relation = '".trim($empe_emrg_relation)."',
                    employer_id = '".trim($employer_id)."',
                    medical_condition = '".trim($medical_check)."',
                    medical_condition_desc = '".trim($medical_details)."',
                    id='".$induction_id."',
                    pin=  '".$_POST['pin_value']."',
                    gcic_issue_date= '".$_POST['gcic_issue']."',
                    is_gcic= '".$gcic_check."',
                    itp_name= '".$_POST['provider_name']."',
                    inductioncard= '".$_POST['card_number']."',
                    created_date=now(),
                    modified_date=now(),
                    email_add = '".trim($empe_email)."'");
                     $err1 = "Employee ".$empe_name." Created.";

   

  //Insert Site Induction Register

   
$qry_induction_register = $conn->query("insert into tbl_induction_register set 
                    id = '".$induction_id."',
                    project_id = '".$_SESSION['admin2']."',
                    induction_date= date(now()),
                    empid='".$employer_id."',
                    induction_card_no= '".$_POST['card_number']."',
                    pincode='1234',
                    created_date=now(),
                    modified_date=now(),
                    signature=   '".$_POST['sign_div_hidden']."'");


                    
// Insert Attachments Details-- Images

$val = '';

foreach ($_FILES['photo']['name'] as $key=>$value ) {

  
  if($value!="")
  {
    //$val= $key;
    $val.=$key.",";

  }
  
}
//echo $val;
// echo substr($val,0,strlen($val)-1);
$val2= substr($val,0,strlen($val)-1);
$array=explode(",",$val2);
// print_r($array);


  $image_path= 'API/Uploads/';  
  $building_images_0  = $_FILES['photo']['name'][0];
  $building_images_1  = $_FILES['photo']['name'][1];
  $building_images_2  = $_FILES['photo']['name'][2];
  $building_images_3  = $_FILES['photo']['name'][3];
  $building_images_4  = $_FILES['photo']['name'][4];
  $building_images_5  = $_FILES['photo']['name'][5];
  $building_images_6  = $_FILES['photo']['name'][6]; 
  $building_images_7  = $_FILES['photo']['name'][7]; 
  $building_images_8  = $_FILES['photo']['name'][8]; 
  $building_images_9  = $_FILES['photo']['name'][9]; 
  $building_images_10  = $_FILES['photo']['name'][10];
  $building_images_11  = $_FILES['photo']['name'][11];   
  $building_images_12  = $_FILES['photo']['name'][12]; 
  $building_images_13  = $_FILES['photo']['name'][13]; 

  $building_images_14 = $_FILES['sign']['name'][0];
  // $target_sign= $image_path . $building_images_14;

  $target0 = $image_path . $building_images_0;
  $target1 = $image_path . $building_images_1;
  $target2 = $image_path . $building_images_2;
  $target3 = $image_path . $building_images_3;
  $target4 = $image_path . $building_images_4;
  $target5 = $image_path . $building_images_5;
  $target6 = $image_path . $building_images_6;
  $target7 = $image_path . $building_images_7;
  $target8 = $image_path . $building_images_8;
  $target9 = $image_path . $building_images_9;
  $target10 = $image_path . $building_images_10;
  $target11 = $image_path . $building_images_11;
  $target12 = $image_path . $building_images_12;
  $target13 = $image_path . $building_images_13;
  move_uploaded_file($_FILES['photo']['tmp_name'][0], $target0);
  move_uploaded_file($_FILES['photo']['tmp_name'][1], $target1);
  move_uploaded_file($_FILES['photo']['tmp_name'][2], $target2);
  move_uploaded_file($_FILES['photo']['tmp_name'][3], $target3);
  move_uploaded_file($_FILES['photo']['tmp_name'][4], $target4);
  move_uploaded_file($_FILES['photo']['tmp_name'][5], $target5);
  move_uploaded_file($_FILES['photo']['tmp_name'][6], $target6);
  move_uploaded_file($_FILES['photo']['tmp_name'][7], $target7);
  move_uploaded_file($_FILES['photo']['tmp_name'][8], $target8);
  move_uploaded_file($_FILES['photo']['tmp_name'][9], $target9);
  move_uploaded_file($_FILES['photo']['tmp_name'][10], $target10);
  move_uploaded_file($_FILES['photo']['tmp_name'][11], $target11);
  move_uploaded_file($_FILES['photo']['tmp_name'][12], $target12);
  move_uploaded_file($_FILES['photo']['tmp_name'][13], $target13);

  // move_uploaded_file($_FILES['sign']['tmp_name'][0], $target_sign);

  foreach($array as $i)
  
{
  $new_target= ${"target" . $i};

  $new_target2= substr($new_target,12);


  
  $qry_attachment = $conn->query("insert into tbl_site_upload_attachment set 
                    induction_id= '".$induction_id."',
                    image_url= '".$new_target2."',
                   
                    image_id = '".$i."'");

                     
} 

 
 

//Insert Induction topics Details--

$checked_val = $_POST['check_test'];
$x="";
$p= "'1'".","; $z=""; 
foreach ($checked_val as $selected) {
$y="`induction_topic_".$selected."`,";
$x=$x.$y;

$p;
$z=$z.$p;

}
$column= substr($x,0,strlen($x)-1);
$column2= $column;
// echo $column2;

$value = substr($z,0,strlen($z)-1);
// echo $value;

$test= "insert into tbl_site_induction_topics(`id`,".$column2.",`induction_topic_edit_text_34`) VALUES ('".$induction_id."',".$value.",'".$_POST['topic_34_text']."')";
// echo $test;
$qry_topic = $conn->query($test);

// Insert Declaration Details---

$qry_declaration = $conn->query("insert into tbl_site_induction_declaration set 
                    id = '".$induction_id."',
                    edit_certifiy = '".$_POST['declaration_name']."',
                    your_signature = '".$_POST['sign_div_hide']."',
                    todays_date = CURDATE()");



}


if($qry_declaration && $qry_topic && $qry_attachment && $qry_employee && $qry_induction_register)
{
  $induction_id = $_POST['induction_number'];
  $induction= str_pad($induction_id, 4, '0', STR_PAD_LEFT);
  $get_email= $conn->query("Select * from tbl_setting where project_id='".$_SESSION['admin2']."'")->fetch_object();
  $email= $get_email->induction_mail;
  $s         = ltrim($induction_id, '0');
 

    $query  = "select concat(given_name,' ',surname) as name,induction_date,concat(project_name) as project from tbl_induction_register left join tbl_employee on tbl_induction_register.id = tbl_employee.id left join tbl_project on tbl_induction_register.project_id = tbl_project.id where tbl_employee.id = ".$s;

      $new_id_result  = $conn->query($query)->fetch_object();
      $project  = $new_id_result->project;
      $name   = $new_id_result->name;
      $date  = $new_id_result->induction_date;
      $source = $date;
    $date = new DateTime($source);
      

      

      $Sub = $project ."-".$date->format('y/m/d')."-Site Induction Number ".$induction;
  


          $to=$email;
        $msg = "<html> 
        <body>
        Hello HSR / SM, <br/><br/>
        ".$get_email->site_induction_msg."<br/>
      Site Induction form ".$induction." is ready to be reviewed.<br/><br/>


        <a href ='https://cipropertyapp.com/site_induction_form_unapproved.php?unapproved_form=".$s."'><input type=\"button\" value=\"Review\"> </a><br/><br/>



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
            $result = file_get_contents($url, false, $context);
              $success= 1;


              $query_del  = $conn->query("delete FROM tbl_refrence WHERE refrence_no='".$refrence_no."'");

                 ?>
                  <script>
          
                  alert("You Have Successfully Submitted Details");
                  </script>
                  <?
                header("location:logout_direct.php");
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
 <link rel="stylesheet" href="css/font-awesome.min.css">
 <script type="text/javascript" src=js/validation_site_induction.js></script>
  <script type="text/javascript" src=js/upload.js></script>
 
<head>
<header>
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="main.css">
 <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js">
      </script>
<link href="./css/jquery.signaturepad.css" rel="stylesheet">
 <script src="js/jquery.signaturepad.js"></script> 
<script src="js/numeric-1.2.6.min.js"></script> 
    <script src="js/bezier.js"></script>
    
    
    <script type='text/javascript' src="js/html2canvas.js"></script>
    <script src="js/json2.min.js"></script>

<style>
@font-face {
  font-family: 'Helvetica_Nue';
   src: url('fonts/helvetica-neue-5923ee0f5f95b.ttf');
}
@font-face {
  font-family: 'Helvetica_Nue_light';
   src: url('fonts/helvetica-neue-light-5925314ecbd06.ttf');
}

@font-face {
  font-family: 'Helvetica_Nue_thin';
   src: url('fonts/HelveticaNeue-Thin.otf');
}
@font-face {
  font-family: 'Avenirnext';
   src: url('fonts/AvenirNextLTPro-Regular.otf');
}
@font-face {
  font-family: 'Avenirnextbold';
   src: url('fonts/AvenirNextLTPro-Bold.otf');
}
@font-face {
  font-family: 'Avenirnextitalic';
   src: url('fonts/AvenirNextLTPro-It.otf');
}
@font-face {
  font-family: 'Avenirnextmedium';
   src: url('fonts/avenir-next-lt-pro-medium-596dfa60711d1.otf');
}
   html *
{
  
   font-family: 'Avenirnext';
   

}
.form_direct_header {
    float: left;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #f5f5f5;
    height: 21.5%;
    padding-top: 30px;
    padding-bottom: 30px;
    padding-left: 15px;
    padding-right: 20px;
}
.form_direct_content{
  float: left;
    position: absolute;
    top: 21.5vh;
    left: 0;
    width: 100%;
    background-color: #f5f5f5;
    overflow-y: scroll;
  max-height: 78%;
} 
label {        
    font-style: italic;
    padding-left: 25px;
}

.preview1,.preview2,.preview3,.preview4,.preview5,.preview6,.preview7,.preview8,.preview9,.preview10,.preview11,.preview12,.preview13,.preview14
{
  background-image: url('image/image_upload_2.png');

}

.h4
{
  /*color: #666666;*/
  font-size: 2.4vh;
  font-weight: 900;
}
</style>
</header>
<div class="form_direct_header">
  <div class="col-md-12" style="padding-top: 0px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">Site Induction Form&nbsp;<?// echo $project_name->project_name ?> </span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="13%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>


<!-- <div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">Site Induction Form&nbsp;<?// echo $project_name->project_name ?> </span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div> -->


 <!-- <form method="POST"> <input type="submit"  name="logout_direct" value="LogOut-induction" class="btn_logout_induction"> </form>
 <table style='width: 70%;border: 1px solid rgba(128, 128, 128, 0.57);'>
          <center><div class="Form_name"> <span style="text-shadow:1px 1px 1px rgba(18,18,18,1);font-weight:normal;color:#FF5733 ;letter-spacing:1pt;word-spacing:0pt;font-size:23px;text-align:center;font-family:verdana, sans-serif;line-height:2;">NEW SITE INDUCTION FORM </span>
      </div>
      </center> 

  <div class="col-lg-12 well">
  
  <div class="row">-->
<div class="form_direct_content">
  <div class="col-md-12"> 
  <form  name="site_form" id="myform"  method="POST" enctype="multipart/form-data" class="well form-horizontal well_class" style="margin-bottom: 0px !important;" autocomplete="off">
    <fieldset>
        <div class="row">
          <div class="form-group">
            <div class="col-sm-12">
                <label>NAME OF PROJECT/SITE</label>
                <input type="text" placeholder="Enter First Name Here.." class="form-control form-control-left-radius" value="<? echo $obj ->project_name; ?>" readonly>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="form-group">
            <div class="col-sm-12">
                <label>PROJECT NUMBER</label>
                <input type="text" placeholder="Enter Project Number Here.." class="form-control form-control-left-radius" value="<? echo $obj ->number; ?>" readonly>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="form-group">
            <div class="col-sm-12">
                <label>DATE</label>
                <input type="text" class="form-control form-control-left-radius" value="<? echo date("d-m-Y"); ?>" readonly>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="form-group">
            <div class="col-sm-12">
                <label>INDUCTION NUMBER</label>
                <input type="text" name="induction_number" class="form-control form-control-left-radius" value="" id="ind_no" placeholder= "Please Select Employer for the Induction Number"readonly>
            </div>
          </div>
        </div>
        
        <div class="row">
        <div class="form-group">      
            <div class="col-sm-12">
              <label>Access Authority Issued</label>
              <input type="text"  class="form-control form-control-left-radius" readonly value="<? echo $obj3->name ?>">          
            </div>
        </div>  
      </div>
      
      <div class="row">
        <div class="form-group">      
            <div class="col-sm-12">
               A <? echo $obj3->name ?> exclusively for this site shall be issued to you on completion of this Site Specific Induction and must remain with you at all times while you are on site.
                  
            </div>
        </div>    
      </div>

      <div class="row">
        <div class="form-group">
            <div class="col-sm-12">
              <p class="h4" style="text-align: left;font-size: 2vh;">EMPLOYER DETAILS/BUSINESS DETAILS</p>             
            </div>
        </div>
      </div>

      <div class="row">
        <div class="form-group">
          <div class="col-sm-12">
            <label>Employer/Business Name</label>
              <p>           
              <select style="height: 34px;display: block;width: 100%;padding-left:20px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 20vh;" id="select" onchange ="select2()" name="select_employer" required>
              <option value="">Select Employer/ Business</option>
              <? while($row_emp=  $obj4->fetch_object()) {?>
              <option value="<? echo $row_emp->id ?>"><? echo $row_emp->company_name ?> </option>
              <? } ?>
            <script>
            function select2() {
                  
                 var e = document.getElementById("select");
                 var strUser = e.options[e.selectedIndex].value;
                // alert(strUser);
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: {text1: strUser},

                    success: function(data) {
                       
                        
                       // alert(data);
                        var val_a= data.split("$");
                        
                        $('#ph').val(val_a[5]);
                        $('#emp_contact').val(val_a[3]);
                        $('#email').val(val_a[6]);
                        $('#address').val(val_a[7]);
                        $('#emp_trade').val(val_a[4]);
                        $('#ind_no').val(val_a[14]);

                        





                    }
                });
                }
               </script>
                            
              </select>
              
              
              </p>
            <!-- <div>
              <label> Please Select</label>
            </div> -->  
              
            </div>
          </div>
      </div>
      <div class="row">
        <div class="form-group">            
            <div class="col-sm-12">
              <label>Ph No.</label>
              <input type="text" id="ph" name ="ph" class="form-control form-control-left-radius" value="" readonly>            
            </div>
        </div>
      </div>


      <div class="row">
        <div class="form-group">
          <div class="col-sm-12">
            <label>Employer's Contact Person</label>
            <input type="text" placeholder="Contact Person.." id="emp_contact" class="form-control form-control-left-radius"  value="<?php echo $_POST['x'] ?>" readonly>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group">    
          <div class="col-sm-12">
            <label>Email Address</label>
            <input type="Email" id="email" placeholder="Email Address.." class="form-control form-control-left-radius" readonly>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group">
          <div class="col-sm-12">
            <label>Address  Of Your Employer/ Business </label>
            <input type="text" id="address"  rows="3" class="form-control form-control-left-radius" readonly>
          </div>
        </div>
      </div>    

      <div class="row">
        <div class=" form-group">
          <div class="col-sm-12">
            <p class="h4" style="text-align: left;font-size: 2vh;">PERSON INDUCTED DETAILS</p>
            
          </div>
        </div>
      </div>
        
        <div class="row">
        <div class="alert3" style="text-align: center;"></div>
          <div class="form-group">
            <div class="col-sm-6">
                <label>Your First Name</label>
                <input type="text" placeholder="Please Enter First Name " id= "f_name_emp" class="form-control form-control-left-radius" name="empe_name"  required>
            </div>
            <div class="col-sm-6">
                <label>Your Surname</label>
                <input type="text" placeholder="Please Enter Surname" class="form-control form-control-left-radius" name="empe_surname" id="s_name_emp" required>
            </div>
          </div>
        </div>
        
          <div class="row">
        <div class="form-group">
          <div class="col-md-12">
            <label>Your Address </label>
            <!-- <textarea placeholder="Enter Address Here.." rows="2" class="form-control form-control-left-radius" name="empe_add" id="person_address"  required></textarea>
            <div id="error_address" style="display: none;margin-top: 3px;font-size: 12px;color:#E74C3C">
              <label><i>The Address Must conatin atleast a number</i></label> -->
              <input type="text" name="empe_add" id="person_address" pattern="^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9 -/]+$" title="alphanumeric 5 to 250 chars" class="form-control form-control-left-radius" placeholder="Street name and Number Suburb State Post Code" required />
            </div>
          </div>              
        </div>
      
  <div class="row">
        <div class="form-group">
          <div class="col-sm-12 ">
            <label>Your Date of Birth</label>
            <input type="text"  class="form-control form-control-left-radius" name="empe_dob" id= "dob" style="text-align: left;"   placeholder="DD-MM-YYYY" required aria-required="true" >

              <script type="text/javascript">
                    $( "#dob" ).datepicker({
                      dateFormat: 'dd-mm-yy',
                      maxDate: new Date(),
                       changeYear: true,
                         changeMonth: true,
                        stepMonths:12,
                         yearRange: "1939:" + new Date().getFullYear(),
                      onSelect: function(date) {
                        $('#dob').val(date);
                      }
                    }
                               );
                               </script>

            
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group">    
         <div class="col-sm-12">
            <label>Your Contact Ph No.</label>
            <input type="text" placeholder="Please Enter Contact Ph No." class="form-control form-control-left-radius input" name="empe_contact" required 
            onkeypress="return event.charCode > 47 && event.charCode < 58;" pattern="^[0-9]*$" minlength="10" maxlength="12">
          </div>
          <div class="alert"></div>
        </div>
      </div>

      <div class="row">
        <div class="form-group">
          <div class="col-sm-12 ">
            <label>Trade</label>
            <input type="text" class="form-control form-control-left-radius" name="empe_occupation" id="emp_trade" readonly>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group">    
          <div class="col-sm-12">
            <label>Employee Position</label>
            <select id="position" style="height: 34px;display: block;width: 100%;padding-left:20px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 20vh;" name="empe_position" required>
              <option value=""> Select your position </option>
              <option value="Project Manager"> Project Manager </option>
              <option value="Site Manager"> Site Manager </option>
              <option value="Site Foreman"> Site Foreman </option>
              <option value="Worker"> Worker </option>
              <option id="other_value" value="1"> Other</option>

              <script>
                $(document).ready(function(){
                    $('#position').on('change', function() {
                      if ( this.value == '1')
                      //.....................^.......
                      {
                         $("#position_other").show();
                         $("#position-other_text").focus();
                         $("#position-other_text").prop('required',true);
                 
                          

                         
                        }
                        
                        else
                        {
                          $("#position-other_text").prop('required',false);
                          $("#position_other").hide();
                          $('#other_value').val('1');
                        }
                
                  });

                    });
                
                
                  $(function() {
                    $(".input").keypress(function(event) {
                        if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
                            $(".alert").html("Enter only digits!").show().fadeOut(2000);
                            return false;
                        }
                    });
                });
                  $(function() {
                    $(".input2").keypress(function(event) {
                        if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
                            $(".alert2").html("Enter only digits!").show().fadeOut(2000);
                            return false;
                        }
                    });
                });
                                  
              </script>



            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="form-group">
          <div class="col-sm-12 ">
            <label>Email Address</label>
            <input type="Email" placeholder="Please Enter Email Address" class="form-control form-control-left-radius"  name="empe_email" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group">    
          <div class="col-sm-12" id= "position_other" hidden>
            <label>Enter Position</label>
            <input type="text" placeholder="Enter Position.." class="form-control form-control-left-radius" id= "position-other_text" name=""  onchange="other_val()">
            <script>
              function other_val()
              {
              var other_position= document.getElementById('position-other_text').value;
              
              document.getElementById("other_value").value = other_position;
            }
            </script>
          </div>
        </div>
      </div>
          
          <div class="row">
            <div class="form-group">
              <div class="col-sm-12">
                <p class="h4">EMERGENCY CONTACT PERSON</p>
              </div>
            </div>
          </div>
        
          <div class="row">
            <div class="form-group">
              <div class="col-sm-12">
                  <label>Contact Person's Name</label>
                  <input type="text" placeholder="Enter Contact Person Name Here.." class="form-control form-control-left-radius" name="empe_emrg_name" required>
              </div>
            </div>
          </div>
        
          <div class="row">
        <div class="form-group">    
          <div class="col-sm-12 ">
            <label>Their Ph No.</label>
            <input type="text" placeholder=" Please Enter Their Ph No." class="form-control input2 form-control-left-radius" name="empe_emrg_number" required onkeypress="return event.charCode > 47 && event.charCode < 58;" pattern="^[0-9]*$" minlength="10" maxlength="12">
          </div>
          <div class="alert2"></div>
        </div>
      </div>
        
          <div class="row">
            <div class="form-group">
              <div class="col-sm-12">
                  <label>Relationship To You</label>
                  <input type="text" placeholder="Enter Relationship Here.." class="form-control form-control-left-radius" name="empe_emrg_relation" required>
              </div>
            </div>
          </div>
        
          <div class="row">
            <div class="form-group">
              <div class="col-sm-12">
                <p class="h4">MEDICAL CONDITIONS</p>
              </div>
            </div>
          </div>
        
        <div class="row">
        <div class="form-group">
          <div class="col-sm-9">
          <p class="text" style="text-align: left;"> Do you have a medical condition that poses a health or safety risk to you or others on site?<br><br> e.g. Diabetes, Deafness, Heart/Lung Condition, Allergy etc.)</p>
          </div>              
            <div class="col-sm-3">
                      
                <label class="checkbox-inline" style="float: right;">
                  <div style="float: left;">
                  <input class="faChkSqr" name="medical_check"  id="medical" type="checkbox" onclick="uncheck(1);"><div style="margin-top: 6px;margin-left: 6px;width: 30px;height: 25px;">Yes</div>
                </div>
              <label class="checkbox-inline">
                <div style="float: right;">
                    <input style="margin-top:-3px" class="faChkSqr" name="medical_check_no"   id="medical_no" type="checkbox" onclick="uncheck(2);" checked><div style="margin-left: 10px;width: 25px;height: 25px">No</div>
                  </div>
                  
                
                  <script>
            function uncheck(check) {
                var prim = document.getElementById("medical");
                var secn = document.getElementById("medical_no");
                if (prim.checked == true && secn.checked == true) {
                    if (check == 1) {
                        secn.checked = false;
                        document.getElementById("txt_1").readOnly = false;
                        document.getElementById("txt_1").focus();
                        document.getElementById("txt_1").value="";

                    } else if (check == 2) {
                        prim.checked = false;
                        document.getElementById("txt_1").readOnly = true;
                        document.getElementById("txt_1").value="";



                    }
                }
                if (prim.checked == false && secn.checked == false) {

                    secn.checked = true;
                    document.getElementById("txt_1").readOnly = true;

                }

            }   
            </script>
                  </label>
                  </label>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="form-group">
            <div class="col-sm-12">
               <label id="err2"> Insert Details-</label>
              <textarea name="medical_detail"  id="txt_1" rows="2" class="form-control form-control-left-radius" readonly="readonly" required style="resize: none;"></textarea>
              <div style="display: none;">
              <label id="err2"> Please Fill The Medical Description </label>
              </div>
            </div>
          </div>
        </div>
        
          <div class="row">
            <div class="form-group">
              <div class="col-sm-12">
                <p class="h4">COMPETENCY CERTIFICATES / PROOF OF IDENTITY</p>
              </div>
            </div>
          </div>
        
          <div class="row">
            <div class="form-group">
              <div class="col-sm-12">
                <p class="text">Have you completed a 'General Construction Induction Card'?</p>
              </div>
            </div>
          </div>

                <div class="row">
            <div class="form-group">
             <div class="col-sm-12">
              <label class="inline">Date Issued</label>
              <input  class="inline form-control form-control-left-radius" type="text" name="gcic_issue" id="date_issue" style=" text-align: left;"  placeholder="DD-MM-YYYY" required >
            </div>
            </div>
          </div>

            <script type="text/javascript">
        $( "#date_issue" ).datepicker({
          dateFormat: 'dd-mm-yy',
          maxDate: new Date(),
          minDate: new Date('1997-01-01'),
          onSelect: function(date) {
            $('#date_issue').val(date);
          }
        }
                               );
                               </script>

        
          <div class="row">
            <div class="form-group">
              <div class="col-sm-12">
                  <label>Name Of Induction Training Provider</label>
                  <input type="text" name="provider_name" class="form-control form-control-left-radius" required> 
              </div>
            </div>
          </div>
        
          <div class="row">
          <div class="alert4" style="text-align: center;"></div>
            <div class="form-group">
              <div class="col-sm-12">
                  <label>General Construction Induction Card</label>
                  <input  type="text" name="card_number" class="form-control form-control-left-radius" id= "pin_insert"  onchange="pin_generate()" minlength="4" required>
                  

                  <input type="hidden" name="pin_value" id= "pin_generation" hidden>
                  <script>
                    
                    function pin_generate()
                    {
                      
                      
                      var fianl_val= document.getElementById('pin_insert').value;
                      var lastFour = fianl_val.substr(fianl_val.length - 4); 
                      document.getElementById('pin_generation').value = lastFour;       
                    
                    }
                  </script>
              </div>
            </div>
          </div>
        
          <div class="row">
            <div class="form-group">
              <div class="col-sm-12">
                    <p class="text" style="text-align: left; font-size: 15px">Upload General Construction Induction Card, Driver's License,Trade Certificates, Prescribe Occupations, Licenses, First Aid Certificate, etc. related to your work on this site e.g. Electrician, Plant Operator, Crane, Rigger, First Aider, Demolitionetc.<strong>Upload Licenses</strong></p>
                  </div>
            </div>
          </div>
        
        <div class="row">
          <div class="form-group">
            <div class="col-sm-6">
              <p style="text-align: center;">
                <!-- <input type="file" name="photo[]" id="imgInp1" required style="padding-left: 28%;">
                <img class="preview1" id="preview1" alt="" style=" width: 120px;height: 120px;background-position: center 
                center;background-size: cover; border-radius:20px ;display: inline-block;"> -->
              <div style="text-align: center;">
              <span class="glyphicon glyphicon-eye-open" id="viewer" style="display: none;left: -7%;position: relative;"></span>
              <div id="uploader"  onclick="$('#file_1').click()" >

                 <img class="preview1" id="preview1" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;" onerror="javascript:this.src='Document.png'"/>
                 </div>
                        <input type="file" name="photo[]" id="file_1"  
                        onchange="document.getElementById('preview1').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer').style.display = 'block';" required><br>
                <label> General Construction Induction Card Front:</label>
              </div>
              </p>
            </div>
            <div class="col-sm-6">
              <p style="text-align: center;">
              <div style="text-align: center;">
              <span class="glyphicon glyphicon-eye-open" id="viewer2" style="display: none;left: -7%;position: relative;"></span>
              <div id="uploader2"  onclick="$('#file_2').click()" >
                 <img class="preview2" id="preview2" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  onerror="javascript:this.src='Document.png'"/>
              </div>
              <input type="file" name="photo[]"  class="file_2" id="file_2" 
                        onchange="document.getElementById('preview2').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer2').style.display = 'block';" required><br>
                <label>General Construction Induction Card Back:</label>
              </div>

              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group">
            <div class="col-sm-6">
              <p style="text-align: center;">
              <div style="text-align: center;">
              <span class="glyphicon glyphicon-eye-open" id="viewer3" style="display: none;left: -7%;position: relative;"></span>
              <div id="uploader3"  onclick="$('#file_3').click()" >
            
                 <img class="preview3" id="preview3" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;" onerror="javascript:this.src='Document.png'"/>
                        </div>
                <input type="file" name="photo[]" id="file_3" 
                        onchange="document.getElementById('preview3').src = window.URL.createObjectURL(this.files[0]);document.getElementById('viewer3').style.display = 'block';" required><br>
                <label> Upload Driver License Front:</label>
              </div>
              </p>
            </div>
            <div class="col-sm-6">
              <p style="text-align: center;">
              <div style="text-align: center;">
              <span class="glyphicon glyphicon-eye-open" id="viewer4" style="display: none;left: -7%;position: relative;"></span>
              <div id="uploader4"  onclick="$('#file_4').click()" >           
              <img class="preview4" id="preview4" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  onerror="javascript:this.src='Document.png'"/>
                        </div>
                <input type="file" name="photo[]" id="file_4" 
                        onchange="document.getElementById('preview4').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer4').style.display = 'block';" required><br>
                <label> Upload Driver License Back:</label>
              </div>
              </p>
            </div>
          </div>  
        </div>
        <div class="row">
          <div class="form-group">
            <div class="col-sm-6">
              <p style="text-align: center;">         
              <div style="text-align: center;">
              <span class="glyphicon glyphicon-eye-open" id="viewer5" style="display: none;left: -7%;position: relative;"></span>
              <div id="uploader5"  onclick="$('#file_5').click()" >
                <img class="preview5" id="preview5" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;" onerror="javascript:this.src='Document.png'"/>
                        </div>
                <input type="file" name="photo[]" id="file_5" 
                        onchange="document.getElementById('preview5').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer5').style.display = 'block';"><br>
                <label> Upload Competency/ Certificates:</label>
              </div>
              </p>
            </div>
            <div class="col-sm-6">
              <p style="text-align: center;">
              <div style="text-align: center;">
              <span class="glyphicon glyphicon-eye-open" id="viewer6" style="display: none;left: -7%;position: relative;"></span>
              <div id="uploader6"  onclick="$('#file_6').click()" >
                <img class="preview6" id="preview6" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  onerror="javascript:this.src='Document.png'"/>
                        </div>
                <input type="file" name="photo[]" id="file_6" 
                        onchange="document.getElementById('preview6').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer6').style.display = 'block';"><br>
                <label> Upload Competency/ Certificates:</label>
              </div>
              </p>
            </div>
          </div>
        </div>  
        <div class="row">
          <div class="form-group">
            <div class="col-sm-6">
              <p style="text-align: center;">
              <div style="text-align: center;">
              <span class="glyphicon glyphicon-eye-open" id="viewer7" style="display: none;left: -7%;position: relative;"></span>
              <div id="uploader7"  onclick="$('#file_7').click()" >
                <img class="preview7" id="preview7" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  onerror="javascript:this.src='Document.png'"/>
                        </div>
                <input type="file" name="photo[]" id="file_7" 
                        onchange="document.getElementById('preview7').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer7').style.display = 'block';"><br>
                <label> Upload Competency/ Certificates:</label>
              </div>
              </p>
            </div>
            <div class="col-sm-6">
              <p style="text-align: center;">
              <div style="text-align: center;">
              <span class="glyphicon glyphicon-eye-open" id="viewer8" style="display: none;left: -7%;position: relative;"></span>
              <div id="uploader8"  onclick="$('#file_8').click()" >
                <img class="preview8" id="preview8" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  onerror="javascript:this.src='Document.png'"/>
                        </div>
                <input type="file" name="photo[]" id="file_8" 
                        onchange="document.getElementById('preview8').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer8').style.display = 'block';"><br>
                <label> Upload Competency/ Certificates:</label>
                </div>
                </p>          
            </div>
          </div>  
        </div>
        <div class="row">
          <div class="form-group">
            <div class="col-sm-6">
              <p style="text-align: center;">
              <div style="text-align: center;">
              <span class="glyphicon glyphicon-eye-open" id="viewer9" style="display: none;left: -7%;position: relative;"></span>
              <div id="uploader9"  onclick="$('#file_9').click()" >
                <img class="preview9" id="preview9" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;" onerror="javascript:this.src='Document.png'"/>
                        </div>
                <input type="file" name="photo[]" id="file_9" 
                        onchange="document.getElementById('preview9').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer9').style.display = 'block';"><br>
                <label> Upload Competency/ Certificates:</label>
              </div>
              </p>
            </div>
            <div class="col-sm-6">
              <p style="text-align: center;">
              <div style="text-align: center;">
              <span class="glyphicon glyphicon-eye-open" id="viewer10" style="display: none;left: -7%;position: relative;"></span>
              <div id="uploader10"  onclick="$('#file_10').click()" >
                <img class="preview10" id="preview10" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  onerror="javascript:this.src='Document.png'"/>
                  </div>
                 <input type="file" name="photo[]" id="file_10" 
                        onchange="document.getElementById('preview10').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer10').style.display = 'block';"><br>
                <label> Upload Competency/ Certificates:</label>
              </div>
              </p>
            </div>
          </div>  
        </div>
        <div class="row">
          <div class="form-group">
            <div class="col-sm-6">
              <p style="text-align: center;">
              <div style="text-align: center;">
              <span class="glyphicon glyphicon-eye-open" id="viewer11" style="display: none;left: -7%;position: relative;"></span>
              <div id="uploader11"  onclick="$('#file_11').click()" >
                <img class="preview11" id="preview11" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  onerror="javascript:this.src='Document.png'"/>
                        </div>
                <input type="file" name="photo[]" id="file_11" 
                        onchange="document.getElementById('preview11').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer11').style.display = 'block';"><br>
                <label> Upload Competency/ Certificates:</label>
              </div>
              </p>
            </div>
            <div class="col-sm-6">
              <p style="text-align: center;">
              <div style="text-align: center;">
              <span class="glyphicon glyphicon-eye-open" id="viewer12" style="display: none;left: -7%;position: relative;"></span>
              <div id="uploader12"  onclick="$('#file_12').click()" >
                <img class="preview12" id="preview12" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  onerror="javascript:this.src='Document.png'"/>
                        </div>
                <input type="file" name="photo[]" id="file_12" 
                        onchange="document.getElementById('preview12').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer12').style.display = 'block';"><br>
                <label> Upload Competency/ Certificates:</label>
              </div>
              </p>
            </div>
          </div>  
        </div>
        <div class="row">
          <div class="form-group">
            <div class="col-sm-6">
              <p style="text-align: center;">
              <div style="text-align: center;">
              <span class="glyphicon glyphicon-eye-open" id="viewer13" style="display: none;left: -7%;position: relative;"></span>

              <div id="uploader13"  onclick="$('#file_13').click()" >
                <img class="preview13" id="preview13" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  onerror="javascript:this.src='Document.png'"/>
                        </div>
                <input type="file" name="photo[]" id="file_13" 
                        onchange="document.getElementById('preview13').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer13').style.display = 'block';"><br>
                <label> Upload Competency/ Certificates:</label>
              
              </div>
              </p>
            </div>
            <div class="col-sm-6">
              <p style="text-align: center;">
              <div style="text-align: center;">
              <span class="glyphicon glyphicon-eye-open" id="viewer14" style="display: none;left: -7%;position: relative;"></span>
              <div id="uploader14"  onclick="$('#file_14').click()" >
                <img class="preview14" id="preview14" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  onerror="javascript:this.src='Document.png'"/>
                        </div>
                <input type="file" name="photo[]" id="file_14" 
                        onchange="document.getElementById('preview14').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer14').style.display = 'block';"><br>
                <label> Upload Competency/ Certificates:</label>
              </div>
              </p>
            </div>
          </div>  
        </div>
              
          <div class="row">
            <div class="form-group">
              <div class="col-sm-6">
                <p class="h4">INDUCTION TOPICS</p>                
              </div>
              <div class="col-md-9">
                  <h4 align="left"> <b> Note:-</b> &nbsp Please select all to confirm you understand all of the below induction topics discussed at the induction.</h4>
              </div>
                <div class="col-md-3 form-group">
                            
                      <label class="checkbox-inline" style="float: right;padding-right: 10px;margin-left">
                        
                        <input type="checkbox" id="select_all" class="faChkSqr"><div style="margin-top: 6px;width: 80px;height: 25px;text-align: right;padding-right: 7px;">Select All</div>

                        </label>
                    </div>
              </div>
          </div>
              
          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">1)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Additional Inductions i.e. Visitor, Ceiling, Client. </p>
                  </div>
                  <div class="chkbox">
                        
                          <input type="checkbox" Id="1" name="check_test[]" value="1" class="checkbox">

                      </div>
                </div>  
                <div class="col-sm-6">
                  <div class="chknum">27)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Minimum PPE - 
                      <ul class="ulpaddingdd">
                        <li>Hard Hats, Steel Capped Boots.</li>
                        <li>Protective Clothing Short Sleeve Shirt & Work Shorts are the Minimum Requirement.</li>
                        <li>High Visibility Vests.</li>
                      </ul>
                    </p>
                  </div>
                  <div class="chkbox">
                        
                          <input type="checkbox" Id="1" name="check_test[]" value="27" class="checkbox">

                       </div>
                </div>              
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">2)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>What We are Building- 
                      <ul class="ulpaddingsd">
                        <li>Description.</li>
                        <li>Expected Duration & Completion Date.</li>
                        <li>Site Ph. No. etc.</li>
                        <li>Sites Hours.</li>
                      </ul>
                    </p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value= "2" class="checkbox">

                        </div>
                </div>
                <div class="col-sm-6">
                  <div class="chknum">28)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Safety Signs &nbsp; Barricades</p>
                  </div>
                  <div class="chkbox">
                        
                           <input type="checkbox" Id="1" name="check_test[]" value="28" class="checkbox">

                    </div>    
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">3)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Site Management Team - <ul class="ulpaddingsd">
                            <li>Project Director and Site Manager.</li>
                            <li>Foremen.</li>
                            <li>Site Ph. No. etc.</li>
                            <li>Site Safety Advisor (SSA).</li>
                            </ul>
                    </p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="3" class="checkbox">

                       </div>
                </div>
                <div class="col-sm-6">  
                  <div class="chknum">29)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Emergency Procedures -<ul class="ulpaddingdd">
                            <li>Evacuation Procedures.</li>
                            <li>Emergency Contact Details.</li>
                            <li>Fire Fighting Equipment, etc.</li>
                    
                            </ul>
                    </p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="29" class="checkbox">
                  </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">4)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Site Layout - <ul class="ulpaddingsd">
                            <li>Offices, Amenities, First Aid, Parking, etc.</li>
                            <li>Deliveries To Site</li>
                            </ul>
                    </p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="4" class="checkbox">

                        </div>
                </div>
                <div class="col-sm-6">
                  <div class="chknum">30)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Incident Reporting Requirements -<ul class="ulpaddingdd">
                            <li>Accidents</li>
                            <li>Dangerous Events.</li>
                            <li>Near Misses</li>
                            <li>Hazard</li>
                    
                            </ul>
                    </p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="30" class="checkbox">

                       </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">5)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Policies - <ul class="ulpaddingsd">
                            <li>WHS, Quality, Environment.</li>
                            <li>Outline of CMP.</li>
                            </ul>
                    </p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="5" class="checkbox">

                         </div>
                </div>
                <div class="col-sm-6">
                  <div class="chknum">31)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>First Aid Facility</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="31" class="checkbox">

                      </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">6)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Essential Health & Safety Requirements for site.</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="6" class="checkbox">

                       </div>
                </div>
                <div class="col-sm-6">
                  <div class="chknum">32)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Amenities, Toilets & Drink Stations</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="32" class="checkbox">

                      </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">7)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Site Access & Security</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="7" class="checkbox">

                        </div>
                </div>
                <div class="col-sm-6">
                  <div class="chknum">33)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>General Site Requirements</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="33" class="checkbox">

                      </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">8)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Site Rules -e.g. Civil  Language & Behaviour</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="8" class="checkbox">

                      </div>
                </div>                
                <div class="col-sm-6">
                  <div class="chknum">34)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Environmental Compliance</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="Environmental_select" name="check_test[]" value="34" class="checkbox">

                  </div>
                    <script>
                    // $(document).ready(function(){

                    //      $("#Environmental_select").click(function(){
                        

                    //      var SelectVal = $(this).val();

                    //      if(SelectVal == "1"){
                    //          $("#Environmental_text").attr("readonly", true);
                    //          $("#Environmental_text").attr("required", false);  
                    //          $(this).val("0");
                    //      }  
                    //       else{
                    //          $("#Environmental_text").attr("readonly", false);
                    //          $("#Environmental_text").attr("required", true); 
                    //          $("#Environmental_text").focus();

                    //          $(this).val("1");
                    //      }
                    //    });
                    // });
                    $(document).ready(function(){

                         $("#select_all").click(function(){
                        

                         var SelectVal_all = $(this).val();

                         if(SelectVal_all == "1"){
                             $("#Environmental_text").attr("readonly", true);     
                             $(this).val("0");
                         }  
                          else{
                             $("#Environmental_text").attr("readonly", false);
                             $("#Environmental_text").focus();

                             $(this).val("1");
                         }
                       });
                    });
                  </script>               
                </div>
              </div>  
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>            
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">9)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Disciplinary Procedures -</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="9" class="checkbox">

                      </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>            
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">10)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Drugs and Alcohol -</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="10" class="checkbox">

                      </div>
                </div>  
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>            
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">11)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Smoking Policy, Designated Smoking Area's</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="11" class="checkbox">

                        </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>            
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">12)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Project Consultation & Communication</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="12" class="checkbox">

                      </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">13)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Site Specific Hazards</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="13" class="checkbox">

                      </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">14)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Work Method Statement Requirements</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="14"  class="checkbox">

                        </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">15)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Site Permits</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1"name="check_test[]" value="15" class="checkbox">

                      </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>
          
          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">16)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Live Services</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="16" class="checkbox">

                      </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>
        
          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">17)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Underground Services</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="17" class="checkbox">

                      </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>
      
          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">18)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Mobile Plant</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="18" class="checkbox">

                      </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">19)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Working at Heights</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="19" class="checkbox">

                       </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>
        
          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">20)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Safety Harnesses.</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="20" class="checkbox">

                      </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>
        
          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">21)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Ladders</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="21" class="checkbox">

                       </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>
      
          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">22)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Mobile and Fixed Scaffold.</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="22" class="checkbox">

                       </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">23)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Electrical -<ul class="ulpaddingdd">
                            <li>Portable equip/tools tested and tagged.</li>
                            </ul>
                    </p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="23" class="checkbox">

                       </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">24)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Fire Prevention</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="24" class="checkbox">

                       </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>  

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">25)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Hazardous Substances & MSDS</p>
                  </div>
                  <div class="chkbox">
                      
                          <input type="checkbox" Id="1" name="check_test[]" value="25" class="checkbox">

                      </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 rightpadding">
                <div class="col-sm-6">
                  <div class="chknum">26)</div>
                  <div class="col-sm-10 chkcontent">
                    <p>Manual Handling</p>
                  </div>
                  <div class="chkbox">                      
                          <input type="checkbox" Id="1" name="check_test[]" value="26" class="checkbox">
                        </div>
                </div>
              </div>
              <div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
            </div>  
          </div>
            <script>
                    $(document).ready(function(){
                            $('#select_all').on('click',function(){
                                if(this.checked){
                                    $('.checkbox').each(function(){
                                        this.checked = true;
                                    });
                                }else{
                                     $('.checkbox').each(function(){
                                        this.checked = false;
                                    });
                                }
                            });
                            
                            $('.checkbox').on('click',function(){
                                if($('.checkbox:checked').length == $('.checkbox').length){
                                    $('#select_all').prop('checked',true);
                                }else{
                                    $('#select_all').prop('checked',false);
                                }
                            });
                        });
                    $(document).ready(function(){

                      $(".checkbox").prop('required',true);
                    });
            </script> 
          <div class="row">
            <div class="col-sm-12 form-group">
              <p class="h4" style="text-align: left;">PRIVACY NOTIFICATION:</p>
              
            </div>          
          </div>  

          <div class="row">
            <div class="col-sm-12 form-group">
              <p style="font-size: 2.1vh;padding-top: 1vh;font-family: Helvetica_Nue;color:#919191;">The personal information you have provided may be used for the purpose of contacting the person you have nominated in the event of an emergency. From time to time the information may be supplied to others such (as medical officers, ambulance officers) involved with the outcome of an emergency or medical situation. All disclosures will be subject to the provisions imposed by the Privacy Act 1988.</p>           
            </div>          
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-sm-12">
                <p class="h4">INDUCTION DECLARATION</p>
                <div class="col-sm-12" style="-webkit-border-radius: 15px;-moz-border-radius: 15px; border-radius: 15px;background: #e4e4e4;">
                  <p class="h5" style="text-align: left;font-weight: 100;">I <input type="text"  id="declaration_name" name="declaration_name" style="border: 0;text-align: center;background: #e4e4e4;" readonly>&nbsp;<span style="float: right;color: #272727;"> certify the following:</span> </p>
                  <ul style="padding-left: 15px;color: #8f8f8f;">
                    <li>All information givenby me verbally during the induction and written by me on this form is true and correct.</li>
                    <li>I understand my Work Health and Safety, Quality and Environmental obligations and responsibilities on this project as explained to me during the Site Specific Induction and as ticked by meabove.</li>
                    <li>I have all the relevant licences, experience, trainings, qualifications,knowledge and skills to do the tasksallocated to me on this project competently and in a safe way.</li>
                    <li>I am medically fit to perform the respective tasks I am required to undertake while on site.</li>

                  </ul>
                  
                </div>
              </div>  
            </div>          
          
              <script>
                $('#f_name_emp,#s_name_emp').bind('keypress keyup blur', function() {
                  $('#declaration_name').val($('#f_name_emp').val() + ' ' + $('#s_name_emp').val());
                });
    
              </script>
              <script>
              // function dec_name_get(){
              //  var name= document.getElementById("f_name_emp").value;
              //  // alert(name);
              //  var today = new Date();

              //  var time = today.getHours()+ "" + today.getMinutes() + "" + today.getSeconds();
              //  $.ajax({
              //        type: "POST",
              //        url: "ajax_decalaration.php",
              //        data: "name="+name+"&time="+time,

              //        success: function(data) {
              //          var string = "API/Uploads/"+time+".jpg";
              //          document.getElementById("sign_div").style.backgroundImage = "url('" + string + "')";
       //                           document.getElementById("sign_div").style.backgroundRepeat= "no-repeat";
       //                           document.getElementById("sign_div_hidden").value= time;


  
              //        }
              //    });
              // }
              </script>
          </div>
           <div class="row">
          <div class="form-group">
            <div class="col-sm-12">
            <div style="-webkit-border-radius: 50px;-moz-border-radius: 50px;border-radius: 50px;background: #d3d3d3;height: 155px">
             <div style="width: 50%; float: left;">
              <p class="h5" style="text-align: center;vertical-align: middle;">Today's Date<br><? echo date("d/m/y"); ?></p>
            </div>
            <div style="width: 50%; float: right;">
              <p class="h5" style="text-align: center;vertical-align: middle;position: absolute;left: 70%;" >Your Signature</p>
                <input type="text" name="sign_div_hide" id="sign_div_hide" hidden="">
              <div id="signArea" >
      <!-- <h2 class="tag-ingo">Put signature below,</h2> -->
      <div class="sig sigWrapper" style="height:auto;">
        <div class="typed"></div>
        <canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
        <canvas id='blank' style='display:none'></canvas>
        <input type="button" name="" id="btnSaveSign" value="Save">
        <!-- <li class="clearButton"><a href="#clear">Clear</a></li> -->
        <input type="button" name="" class="clearButton" value="Clear">
      </div>
    </div></div>
    <div class="sign-container">
    <?php
    $image_list = glob("./doc_signs/*.png");
    foreach($image_list as $image){
      //echo $image;
    ?>
    <img src="<?php echo $image; ?>" class="sign-preview" />
    <?php
    
    }
    ?>
    </div>
                
                        
            </div>
            </div>
          </div>
        </div>

          <div class="row">
            <div class="form-group">
              <div class="col-sm-6">
                <div class="col-sm-6 col-sm-offset-3">
                  <input type="submit"  class="btn btn-primary form_submit_button" id= "submit" value="Submit"  name="set"  data-complete-text="Loading Completed" autocomplete="off" onclick="check_sign()" />
                </div>
              </div>
            <div class="col-sm-6">
              <div class="col-sm-6 col-sm-offset-3">
                <form method="POST"> 
                  <input type="button"  name="logout_direct" value="LogOut-induction" class="btn btn-primary form_submit_button" onclick="window.location.href='index.php'"> 
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="margin-right: -30px;margin-left: -30px;">
          <div class="form-group">
            <div class="col-sm-12 footer">
              <span style="float: left;
    padding-left: 30px;
    padding-top: 5px;">
    <img src="image/logo_foot_2.png" style="   width: 8.5vw;">
</span>
<span class="bottom_text footer_date" style="font-family: 'Avenirnext';">Date: &nbsp <?=date("d F Y ") ?></span>


<span style="float: right;    margin-right: 7.7vw; 


"> <img src="image/footer_new.png" style="position: absolute;
    width: 6vw;
    bottom: 20px;"> </span>
            </div>
          </div>
        </div>
      </fieldset>         
    </form>
  
<!-- <div class="footer">
  <span style="float: left;    padding-left: 2vw;     padding-top: 5px;
    padding-bottom: 6px;">
    <img src="image/logo_foot_2.png" style="   width: 8.5vw;">
</span>
<span class="bottom_text footer_date" style="font-family: 'Avenirnext';">Date: &nbsp <?=date("d F Y ") ?></span>


<span style="float: right;    margin-right: 8.3vw; 


"> <img src="image/footer_new.png" style="position: absolute;"> </span>

</div> -->
  
    


<style>
  .footer {
      /*position: absolute;
    right: 0;
    height: 10vh;
    bottom: 0;
    left: 0;*/
    /* padding: 1rem; */
    padding: 0;
   
    background-color: #3D3D3D;
    text-align: center;
    margin-bottom: -15px;
}

label {
    
    
    font-style: italic;
    padding-left: 25px;
}
.preview1,.preview2,.preview3,.preview4,.preview5,.preview6,.preview7,.preview8,.preview9,.preview10,.preview11,.preview12,.preview13,.preview14
{
  background-image: url('image/grid.png');

}


#sign_div
{
  background-image: url('image/Your_Signature.png');
}
.h4
{
color: ##666666;
    font-size: 2.4vh;
    font-weight: 900;
}


input[type='file'] {
        color: transparent; 
        /*display: none;  */    position: absolute;
    top: 30px;
    left: 190px;
    z-index: -9999;
}

::-webkit-scrollbar {
    width: 7px;
        background: #fff;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
    border-top-left-radius: 0;
     border-bottom-left-radius: 0;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    border-radius: 10px;
    border-top-left-radius: 0;
     border-bottom-left-radius: 0;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    background: #E3E1E3;
}

#signArea{
        width:304px;
        margin: 25px auto;
      }
      .sign-container {
        width: 60%;
        margin: auto;
      }
      .sign-preview {
        width: 150px;
        height: 50px;
        border: solid 1px #CFCFCF;
        margin: 10px 5px;
      }
      .tag-ingo {
        font-family: cursive;
        font-size: 12px;
        text-align: left;
        font-style: oblique;
      }
</style>
  </div>
</div>  

<script>
    function get_image(id)
{
    
    $('#file_'+id).click();


}
</script>

<script> 


$(document).ready(function() {

      $("#s_name_emp").prop('disabled', true);
    });
$(function() {
                    $("#f_name_emp").keyup(function(event) {
                      if($("#f_name_emp").val() !="")
                      {
                      $("#s_name_emp").prop('disabled', false);
                      }
                      else
                      {
                        $("#s_name_emp").prop('disabled', true);
                      }

                    });

                    });
$(function() {
                    $("#s_name_emp").keyup(function(event) {
                        // if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
                        //     $(".alert2").html("Enter only digits!").show().fadeOut(2000);
                        //     return false;
                        // }

                        var f_name= $("#f_name_emp").val().trim();
                    var l_name= $("#s_name_emp").val().trim();


      $.ajax({
              url: 'ajax_check_name_direct.php',
              data: {first: f_name, last: l_name},
              type: 'post',
              success: function (response) {
                // alert(response);
                 if(response == "name_exist")
                 {
                    // alert("Sorry!!! the Name is already registered with us");
                    
                    // $("#f_name_emp").val("");
                    $(".alert3").html('<span style="color:red">'+'Username is Not Available'+'</span>').show().fadeOut(3000);
                  $("#s_name_emp").val("");
                    return false;
                  }
                  else
                  {
                    
                    $(".alert3").html('<span style="color:green">'+'Username is Available'+'</span>').show().fadeOut(3000);
                  }

              

   
              }
            });
                    });


$("#pin_insert").keyup(function(event) {
                        // if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
                        //     $(".alert2").html("Enter only digits!").show().fadeOut(2000);
                        //     return false;
                        // }

                        var card= $("#pin_insert").val().trim();
                    


      $.ajax({
              url: 'ajax_check_pin_direct.php',
              data: {card: card},
              type: 'post',
              success: function (response) {
                // alert(response);
                 if(response == "card_exist")
                 {
                    // alert("Sorry!!! the Name is already registered with us");
                    
                    // $("#f_name_emp").val("");
                    $(".alert4").html('<span style="color:red">'+'Card Number is already registered with us'+'</span>').show().fadeOut(6000);
                  $("#pin_insert").val("");
                    return false;
                  }
                  else
                  {
                    
                    $(".alert4").html('<span style="color:green">'+'Card Number is Available'+'</span>').show().fadeOut(2000);
                  }

              

   
              }
            });
                    });








                });




















 var toggle_val= 0;
      $(document).ready(function() {
        $('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
        
      });
      
      $("#btnSaveSign").click(function(e){
          canvas = document.getElementById('sign-pad');
        if(canvas.toDataURL() == "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADHUlEQVR4Xu3YsQ3DQBADQasm9V+CanoDTu3A6RKjCvjDAwNd55zz8hEgQCAgcBmsQEsiEiDwETBYDoEAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARuDnYD3Pk3mAoAQIbArc9/31MIO12bVXEcgL/D1Y+Zd6AAECkwL+YU3W6lEENgUM1mavXkVgUsBgTdbqUQQ2BQzWZq9eRWBSwGBN1upRBDYFDNZmr15FYFLAYE3W6lEENgUM1mavXkVgUuANCUCU5ApZHy4AAAAASUVORK5CYII=" || canvas.toDataURL()=="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADKElEQVR4Xu3YsW2EUBREUbYA2qD/emiDAljJmeXE6R0dKph/5mkCPu/7voePAAECAYGPwQq0JCIBAj8CBsshECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgI/Bms+76P53kyDxCUAIFNgfM8j+u6fj3OYG127VUE8gL/Gqz8Kz2AAIFZAf+wZqv1MAJ7AgZrr1MvIjArYLBmq/UwAnsCBmuvUy8iMCtgsGar9TACewIGa69TLyIwK2CwZqv1MAJ7AgZrr1MvIjAr8AU2aZrkSYVn9AAAAABJRU5ErkJggg==")
        alert('Signature Field Cannot be left blank');
        
            else
            {
        html2canvas([document.getElementById('sign-pad')], {
          onrendered: function (canvas) {
            var canvas_img_data = canvas.toDataURL('image/png');
            var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
            //ajax call to save image inside folder
            $.ajax({
              url: 'demo_sign_2.php',
              data: { img_data:img_data },
              type: 'post',
              dataType: 'json',
              success: function (response) {
                 alert("Signature Saved");
                 toggle_val=1;
                 $('#sign_div_hide').val(response+".png");
              }
            });
          }
        });
      }
      });

      
            // var signaturePad = new signaturePad(canvas);

//            canvas = document.getElementById('sign-pad');
//        ctx = canvas.getContext('2d');
//               // var signaturePad1 = new SignaturePad(sign1_canvas);
//                      canvas.addEventListener('mousemove',function(e){
//     ctx.lineTo(e.pageX,e.pageY);
//     ctx.stroke();
// });

      function check_sign()
      {
               
        canvas = document.getElementById('sign-pad');
         console.log(canvas.toDataURL());
    if(canvas.toDataURL() == "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADHUlEQVR4Xu3YsQ3DQBADQasm9V+CanoDTu3A6RKjCvjDAwNd55zz8hEgQCAgcBmsQEsiEiDwETBYDoEAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARuDnYD3Pk3mAoAQIbArc9/31MIO12bVXEcgL/D1Y+Zd6AAECkwL+YU3W6lEENgUM1mavXkVgUsBgTdbqUQQ2BQzWZq9eRWBSwGBN1upRBDYFDNZmr15FYFLAYE3W6lEENgUM1mavXkVgUuANCUCU5ApZHy4AAAAASUVORK5CYII=" || canvas.toDataURL()=="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADKElEQVR4Xu3YsW2EUBREUbYA2qD/emiDAljJmeXE6R0dKph/5mkCPu/7voePAAECAYGPwQq0JCIBAj8CBsshECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgI/Bms+76P53kyDxCUAIFNgfM8j+u6fj3OYG127VUE8gL/Gqz8Kz2AAIFZAf+wZqv1MAJ7AgZrr1MvIjArYLBmq/UwAnsCBmuvUy8iMCtgsGar9TACewIGa69TLyIwK2CwZqv1MAJ7AgZrr1MvIjAr8AU2aZrkSYVn9AAAAABJRU5ErkJggg==")
        alert('Signature Field Cannot be left blank');
  

        else if(toggle_val == 0)
        {
          alert("Please Save Your Signature");
        }



        

        
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
      document.getElementById("viewer7").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader7.files = files;
}
</script>
<script>
// uploader8

var imageLoader8 = document.getElementById('file_8');
    imageLoader8.addEventListener('change', handleImage8, false);

function handleImage8(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader8 img').attr('src',event.target.result);
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
      document.getElementById("viewer8").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader8.files = files;
}
</script>
<script>
// uploader9

var imageLoader9 = document.getElementById('file_9');
    imageLoader9.addEventListener('change', handleImage9, false);

function handleImage9(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader9 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox9;
dropbox9 = document.getElementById("uploader9");
dropbox9.addEventListener("dragenter", dragenter9, false);
dropbox9.addEventListener("dragover", dragover9, false);
dropbox9.addEventListener("drop", drop9, false);

function dragenter9(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover9(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop9(e) {
      document.getElementById("viewer9").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader9.files = files;
}
</script>
<script>
// uploader10

var imageLoader10 = document.getElementById('file_10');
    imageLoader10.addEventListener('change', handleImage10, false);

function handleImage10(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader10 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox10;
dropbox10 = document.getElementById("uploader10");
dropbox10.addEventListener("dragenter", dragenter10, false);
dropbox10.addEventListener("dragover", dragover10, false);
dropbox10.addEventListener("drop", drop10, false);

function dragenter10(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover10(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop10(e) {
      document.getElementById("viewer10").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader10.files = files;
}
</script>
<script>
// uploader11

var imageLoader11 = document.getElementById('file_11');
    imageLoader11.addEventListener('change', handleImage11, false);

function handleImage11(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader11 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox11;
dropbox11 = document.getElementById("uploader11");
dropbox11.addEventListener("dragenter", dragenter11, false);
dropbox11.addEventListener("dragover", dragover11, false);
dropbox11.addEventListener("drop", drop11, false);

function dragenter11(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover11(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop11(e) {
      document.getElementById("viewer11").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader11.files = files;
}
</script>
<script>
// uploader12

var imageLoader12 = document.getElementById('file_12');
    imageLoader12.addEventListener('change', handleImage12, false);

function handleImage12(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader12 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox12;
dropbox12 = document.getElementById("uploader12");
dropbox12.addEventListener("dragenter", dragenter12, false);
dropbox12.addEventListener("dragover", dragover12, false);
dropbox12.addEventListener("drop", drop12, false);

function dragenter12(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover12(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop12(e) {
      document.getElementById("viewer12").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader12.files = files;
}
</script>
<script>
// uploader13

var imageLoader13 = document.getElementById('file_13');
    imageLoader13.addEventListener('change', handleImage13, false);

function handleImage13(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader13 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox13;
dropbox13 = document.getElementById("uploader13");
dropbox13.addEventListener("dragenter", dragenter13, false);
dropbox13.addEventListener("dragover", dragover13, false);
dropbox13.addEventListener("drop", drop13, false);

function dragenter13(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover13(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop13(e) {
      document.getElementById("viewer13").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader13.files = files;
}
</script>
<script>
// uploader14

var imageLoader14 = document.getElementById('file_14');
    imageLoader14.addEventListener('change', handleImage14, false);

function handleImage14(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader14 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox14;
dropbox14 = document.getElementById("uploader14");
dropbox14.addEventListener("dragenter", dragenter14, false);
dropbox14.addEventListener("dragover", dragover14, false);
dropbox14.addEventListener("drop", drop14, false);

function dragenter14(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover14(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop14(e) {
      document.getElementById("viewer14").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader14.files = files;
}
</script>
<!-- The Modal -->
                    <div id="myModal" class="modal">
                        <div class="modal-dialog">
                        <div class="modal-content">              
                           <div class="modal-body">
                        <button type="button" id="mohid" class="modhide" data-dismiss="modal">&times;</button>
                        <img class="modal-content north" id="img01">
                        <div id="caption"></div>
                    </div>
                    </div>
                    </div>
                    </div>

<script>
$('.modhide').click(function(){
$('#myModal').hide();
  });
  
var modal = document.getElementById('myModal');
var modalImg = document.getElementById("img01");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg = document.getElementById('viewer');
var img = document.getElementById('preview1');
viewerimg.onclick = function(){
  if(img.src != "" ) {
    modal.style.display = "block";
  modalImg.src = img.src;
    captionText.innerHTML = img.alt;
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
// for file 2, and image 2
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg2 = document.getElementById('viewer2');
var img2 = document.getElementById('preview2');
viewerimg2.onclick = function(){
  if(img2.src != "" ) {
    modal.style.display = "block";
  modalImg.src = img2.src;
  }
}
</script>
<script>
// for file 3, and image 3
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg3 = document.getElementById('viewer3');
var img3 = document.getElementById('preview3');
viewerimg3.onclick = function(){
  if(img3.src != "" ) {
    modal.style.display = "block";
  modalImg.src = img3.src;
  }
}
</script>
<script>
// for file 4, and image 4
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg4 = document.getElementById('viewer4');
var img4 = document.getElementById('preview4');
viewerimg4.onclick = function(){
  if(img4.src != "" ) {
    modal.style.display = "block";
  modalImg.src = img4.src;
  }
}
</script>
<script>
// for file 5, and image 5
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg5 = document.getElementById('viewer5');
var img5 = document.getElementById('preview5');
viewerimg5.onclick = function(){
  if(img5.src != "" ) {
    modal.style.display = "block";
  modalImg.src = img5.src;
  }
}
</script>
<script>
// for file 6, and image 6
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg6 = document.getElementById('viewer6');
var img6 = document.getElementById('preview6');
viewerimg6.onclick = function(){
  if(img6.src != "" ) {
    modal.style.display = "block";
  modalImg.src = img6.src;
  }
}
</script>
<script>
// for file 7, and image 7
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg7 = document.getElementById('viewer7');
var img7 = document.getElementById('preview7');
viewerimg7.onclick = function(){
  if(img7.src != "" ) {
    modal.style.display = "block";
  modalImg.src = img7.src;
  }
}
</script>
<script>
// for file 8, and image 8
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg8 = document.getElementById('viewer8');
var img8 = document.getElementById('preview8');
viewerimg8.onclick = function(){
  if(img8.src != "" ) {
    modal.style.display = "block";
  modalImg.src = img8.src;
  }
}
</script>
<script>
// for file 9, and image 9
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg9 = document.getElementById('viewer9');
var img9 = document.getElementById('preview9');
viewerimg9.onclick = function(){
  if(img9.src != "" ) {
    modal.style.display = "block";
  modalImg.src = img9.src;
  }
}
</script>
<script>
// for file 10, and image 10
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg10 = document.getElementById('viewer10');
var img10 = document.getElementById('preview10');
viewerimg10.onclick = function(){
  if(img10.src != "" ) {
    modal.style.display = "block";
  modalImg.src = img10.src;
  }
}
</script>
<script>
// for file 11, and image 11
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg11 = document.getElementById('viewer11');
var img11 = document.getElementById('preview11');
viewerimg11.onclick = function(){
  if(img11.src != "" ) {
    modal.style.display = "block";
  modalImg.src = img11.src;
  }
}
</script>
<script>
// for file 12, and image 12
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg12 = document.getElementById('viewer12');
var img12 = document.getElementById('preview12');
viewerimg12.onclick = function(){
  if(img12.src != "" ) {
    modal.style.display = "block";
  modalImg.src = img12.src;
  }
}
</script>
<script>
// for file 13, and image 13
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg13 = document.getElementById('viewer13');
var img13 = document.getElementById('preview13');
viewerimg13.onclick = function(){
  if(img13.src != "" ) {
    modal.style.display = "block";
  modalImg.src = img13.src;
  }
}
</script>
<script>
// for file 14, and image 14
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg14 = document.getElementById('viewer14');
var img14 = document.getElementById('preview14');
viewerimg14.onclick = function(){
  if(img14.src != "" ) {
    modal.style.display = "block";
  modalImg.src = img14.src;
  }
}
</script>


<style>
<!-- Get the modal css -->
#preview1 , #preview2,#preview3,#preview4,#preview5,#preview6,#preview7,#preview8,#preview9,#preview10,#preview11,#preview12,#preview13,#preview14 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}



/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1051; /* Sit on top */
    padding-top: 50px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.7); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    width: 100%!important;
    
    
  
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 100%;
    height: 100%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
}
.modal-body
{
      padding: 0px!important;
}
/* Add Animation */
.modal-content, #caption {    
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

/* The Close Button 
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: white !important;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
  opacity: 5.2 !important;
}*/

.modhide {
    position: absolute;
    font-size: 40px;
    right: 0px;
    font-weight: bold;
    background: none;
    border: none;
  opacity:  animation-name: zoom;
    animation-duration: 2s;
  z-index:1051;
  color: black;
  -webkit-animation-name: zoom;
    -webkit-animation-duration: 2s;
   

}

.close:hover,
.close:focus {
    color: black;
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

