<?php
error_reporting(0);
include_once('connect.php');
if(isset($_POST['add']))
    {
 
       $qry = $conn->query(" insert into tbl_access set 
                    name = '".trim(mysqli_real_escape_string($conn,$_POST['name']))."',created_date=NOW(),modified_date=NOW()");
      $err1 = $_POST['name']." Created.";

      
       ?>
      <script>
      
             alert ('<?php echo $err1; ?>');
             window.location.href = "category.php";

        </script>
      <?
      
      }
    
?>

<html>
 <header>
  <? include_once('header.php');
     include('test_side_new.php'); ?>

</header>

<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">ADD NEW ACCESS AUTHORITY&nbsp;<?// echo $project_name->project_name ?> </span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>

<body onbeforeunload=”HandleBackFunctionality()”>

<div class="Main_Form_list">

      <div class="well form-horizontal well_class" >
      <div class="form-group">
           <div class="col-md-12" style="padding-left: 0px;padding-bottom: 5px;">
                <label class="col-md-12 control-label" style=""><span class="project_title" style="">PROJECT :&nbsp;<? echo $_SESSION['project_name'] ?> </span></label>
            </div>
        </div>

     
    
   <div class="row">
     <div class="col-lg-12">
         <form class="form-horizontal" method="post" id="add_ctgry" enctype="multipart/form-data" >
         <div class="form-group">
         <div class="col-sm-10">
         <input type="hidden" name="add" value="true" />
         </div>
         </div>
           <!-- <div class="form-group">
             <label class="control-label col-sm-4" for="access-name">Access Name:<span style="color:red;">*</span></label>
             <div class="col-sm-4">
               <input class="form-control" type="text" name="name" id="category_name" placeholder="Access Name"/>
             </div>
           </div> -->
           
          <div class="form-group">
            <div class="col-sm-12">
              <label>Access Name</label>
              <input class="form-control form-control-left-radius" type="text" name="name" id="category_name" placeholder="Access Name"/>

            </div>
          </div>
        

           <div class="col-sm-12">
           <div class="col-sm-6">
           <div class="col-sm-6 col-sm-offset-4">             
           <input type='button' class="btn btn-primary form_submit_button" onClick="return validateForm()" type="submit" value="Add"  style=""/>
            </div>
            </div>


            <div class="col-sm-6">
           <div class="col-sm-6 col-sm-offset-2"> 
               <input type='button' value='Back' onclick='back()' style='' class="btn btn-primary form_submit_button" >
               </div>
            </div> 
           </div>
         </form>
   </div>
   
     </div>
     
 
   
      
     

  </div><!---wraper close-->
</div><!--container close-->
<script>
function back(){
  window.location.href='category.php';
}
function validateForm() {

         if($( "#category_name" ).val() ==''){
          alert('Please fill Access Name');
          $( "#category_name" ).focus();
          return false;
         }
         
   else{
      $('#add_ctgry').submit();
      //window.location.href='event.php';
    return true;
   }
}
</script>
</body>
<footer>
  <? include("footer.php"); ?>
<footer>


<style>
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

.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: none;
    outline: none;
    border-radius: 10vh;
}

.select2-container--default .select2-search--dropdown .select2-search__field {
    border: 1px solid #aaa;
    outline: none;
}

h4
{
color: #95989a;
    font-size: 2.4vh;
    font-weight: 900;
}
</style>
