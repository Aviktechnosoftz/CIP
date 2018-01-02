<?
session_start();
if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else

{
  $user= $_SESSION['admin'];
}
?>

<header>
<? include('header.php'); ?> 
<? include('test_side_new.php');?>
</header>
   <div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">SITE INDUCTION FORMS CATEGORY&nbsp;<?// echo $project_name->project_name ?> </span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>
<div class="Main_Form_list">

      <div class="well form-horizontal well_class" >
      <div class="form-group">
           <div class="col-md-12" style="padding-left: 0px;padding-bottom: 5px;">
                <label class="col-md-12 control-label" style=""><span class="project_title" style="">PROJECT :&nbsp;<? echo $_SESSION['project_name'] ?> </span></label>
            </div>
        </div>
      
      <hr>
      <div class="col-md-12">
           <div class="col-md-6">
           <button class="btn btn-default regbutton" onclick="unapproved();" style="color:white;background-color:#DD5536;outline: none;border-radius:6vh;font-size: 1.8vh">Unapproved Site Induction Forms</button>
           
          </div>
          <div class="col-md-5 col-md-offset-1">
           <button class="btn btn-default logbutton" onclick="resubmitted();" style="color:white;background-color:#41C9B5;outline: none;border-radius:6vh;font-size: 1.8vh">Resubmitted Site Inductions Forms</button>           
          </div>          
      </div>    
 
    <script>
      function unapproved()
      {
       
        window.location.href = "unapproved_forms.php";

      }
      function resubmitted()
      {
       
        window.location.href = "resubmitted_forms.php";

      }

    </script>
  </div>
  </div>

 
<style>
  
  .register-form{
    font-size: 16px;
       margin-left: 38vw;
    top: 50%;
    position: absolute;
    left: 38%;
   
  
    margin-left: .7vw;
}

.regbutton{    
    height: 50px;
  
    background-color:tomato;
    border-radius: 0px;
    font-size: 18px;
    color:white;
    border: none !important;
    margin-bottom: 5px;
    margin-left: 2vw;
}
.regbutton:hover{    
    color: white;
    background-color:#aa422f;
}
.regbutton:active{    
    color: white;
    background-color:#aa422f;
}
.logbutton{    
    height: 50px;

    background-color:yellowgreen;
    border-radius: 0px;
    font-size: 18px;
    color:white;
    border: none !important;
    margin-bottom: 5px;
    margin-left: -.5vw;
}
.logbutton:hover{    
    color: white;
    background-color:darkolivegreen;
}
.logbutton:active{    
    color: white;
    background-color:darkolivegreen;
}


.register-form label{
    color: aliceblue;
    
}
.register-form input{
    margin-bottom: 5px;
    width: 430px;
    height: 40px;
    border-radius: 0px;
}

</style>

<footer>
  <? include("footer.php"); ?>
<footer>
  