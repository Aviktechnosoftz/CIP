<?php
// error_reporting(0);
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
  $get_states=$conn->query("Select * from tbl_state");

if(isset($_POST['save']))
{
  $insert_query=$conn->query("insert into  tbl_consultant  set 
                   consultant_name = '".trim(mysqli_real_escape_string($conn,$_POST['name']))."',
                     contact_person = '".trim(mysqli_real_escape_string($conn,$_POST['contact']))."',
                      Tread = '".trim(mysqli_real_escape_string($conn,$_POST['trade']))."',
                       phone_no = '".trim(mysqli_real_escape_string($conn,$_POST['phone']))."',
                        email_add = '".trim(mysqli_real_escape_string($conn,$_POST['email']))."',
                         address = '".trim(mysqli_real_escape_string($conn,$_POST['address']))."',
                         project_id='".$_SESSION['admin']."',
                         state_id='".$_POST['state_name_hidden']."',
                         pin = '1111',
                    created_date= NOW(),
                  
                    modified_date= NOW()");

  
  if($insert_query)
  {
  
  $success=1;

}

  }
 



?>
<header>
<? include_once('header.php'); ?>
  <? include('test_side_new.php');?>
  </header>

  <div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">ADD NEW CONSULTANT&nbsp;<?// echo $project_name->project_name ?> </span></label>
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


       <form class="form-horizontal" action=" " method="post"  id="contact_form">
        <div class="alert alert-success" role="alert" style="<? if($success!='1'){ echo 'display:none;';}?>">
          <strong>Well done!</strong> You successfully Added New Consultant.&nbsp
          <input type="button" name="" value="Go Back" onclick="back()"> </button>
        </div>

<div class="form-group">
          <div class="col-md-12">
            <span class="col-md-6 label-title" style="padding-bottom: 30px">CONSULTANT DETAIL</span> 
           </div>          
        </div>

<!-- Text input-->
<input name="project_id" id="date_show" placeholder="Id" class="form-control"  type="hidden" value="<?=$get_id->id;?>" readonly>
   <!-- <div class="form-group">
      <label class="col-md-12 control-label label-position">Subcontractor Name</label>  
      <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="email" placeholder="Subcontractor Name" class="form-control"  type="text" value="<? echo $get_query->given_name." ".$get_query->name; ?>" readonly>
        </div>
    </div>
  </div> -->

<div class="form-group">
  <label class="col-md-12 control-label label-position">Consultant Name</label> 
    <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
  <input  placeholder="Consultant Name" class="form-control"  type="text" value="" name="name" required>
    </div>
  </div>
</div>
<div class="form-group">
    <label class="col-md-12 control-label label-position">Contact Person</label> 
   <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
  <input  placeholder="Contact Person" class="form-control"  type="text" value="" name="contact" required>
    </div>
  </div>
</div>
<div class="form-group">
    <label class="col-md-12 control-label label-position">Consultancy Discipline</label> 
    <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
 
         <input  placeholder="Consultancy Discipline" class="form-control"  type="text" value="" name="trade" required>
    </div>
  </div>
</div>
<div class="form-group">
   <label class="col-md-12 control-label label-position">Phone</label> 
    <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
  <input  placeholder="Phone" class="form-control"  type="text" value="" name="phone" required>
    </div>
  </div>
</div>
<div class="form-group">
   <label class="col-md-12 control-label label-position">Email</label> 
    <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
  <input  placeholder="Email" class="form-control"  type="email" value="" name="email" required>
    </div>
  </div>
</div>
<div class="form-group">
   <label class="col-md-12 control-label label-position">Address</label> 
   <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
  <input  placeholder="Address" class="form-control"  type="text" value="" name="address" required>
    </div>
  </div>
</div>


        <div class="form-group">
         <label class="col-md-12 control-label label-position">State</label> 
          <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
          <input type="text" name="state_name_hidden" id="state_name_hidden" hidden>
           <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
           <select style="height: 34px;display: block;width: 100%;padding-left:20px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 20vh;border-top-left-radius: 0;border-bottom-left-radius: 0" id="select" onchange ="select2()" name="select_employer" required>
              <option value="">Please Select State</option>
              <? while($row_state=  $get_states->fetch_object()) {?>
              <option value="<? echo $row_state->id ?>"><? echo $row_state->state_name ?> </option>
              <? } ?>
            <script>
            function select2() {
                  
                 var e = document.getElementById("select");
                 var strUser = e.options[e.selectedIndex].value;
                  // alert(strUser);
                  $('#state_name_hidden').val(strUser);
                
                }
               </script>
                            
              </select>
          </div>
           </div>
        </div>

<!-- <div class="form-group">
  <label class="col-md-4 control-label" > Pin</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
  <input  placeholder="Pin" class="form-control"  type="password" value="" name="pin" required>
    </div>
  </div>
</div> -->


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-5">
    <input type="submit" class="btn btn-danger form_submit_button" value="Submit" name="save" style=""> </input>
  </div>
</div>


 
</fieldset>
</form>
			
			 

   

      </div> <!-- wrapper close -->
     
        

</div><!--container close-->
	


</body>
<footer>
  <? include("footer.php"); ?>
<footer>
<script type="text/javascript">
  
function back()
{
window.location.href="consultant_register.php"; 
}

</script>

<style>
  label {
    
    font-weight: 100;
    font-style: italic;
}
.form-horizontal .control-label {
text-align: left;
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

legend
{
  color: #DF5430;font-family: Helvetica_Nue;font-weight: 200;
}
</style>
