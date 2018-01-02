<?php

session_start();
include_once('connect.php');
error_reporting(1);
// if(!isset($_SESSION['admin']))
// {
//   header("location:logout.php");
// }
// else
// {
//   $user= $_SESSION['admin'];
// }
if(isset($_POST['save']))
{
  /*echo "insert into tbl_itp_main set 
                    id = '".trim(mysqli_real_escape_string($conn,$_POST['project_id']))."',
                    name = '".trim(mysqli_real_escape_string($conn,$_POST['project_name']))."',
                    created= NOW(),
                    deleted=0,
                    updated= NOW()";*/
  $insert_query=$conn->query("insert into tbl_itp_main set 
                    id = '".trim(mysqli_real_escape_string($conn,$_POST['project_id']))."',
                    name = '".trim(mysqli_real_escape_string($conn,$_POST['project_name']))."',
                    created= NOW(),
                    deleted=0,
                    updated= NOW()");
                    

       
                  $insert_head=$conn->query("insert into tbl_itp_form_heading_header set main_id='".$_POST['project_id']."',title='".$_POST['project_name']."',created=NOW(),updated=NOW()") or die(mysqli_error($conn));
                       


                    


  
  if($insert_head AND  $insert_query)
  {
  
  $success=1;

}
}
 


// $project_name_query=$connn->query("select tbl_project.id as project_id,project_name as name,number from tbl_project_register left join tbl_project on tbl_project_register.project_id = tbl_project.id where tbl_project.id='".$_SESSION['admin']."'  group by project_id")->fetch_object();
$main_query=$conn->query("select * from tbl_itp_main");
$get_id=$conn->query("select max(id)+1 as id from tbl_itp_main")->fetch_object();
?>
<? include_once('header_itp.php'); ?>

<link rel="image icon" type="image/png" sizes="160x160" href="">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />


<!-- 
     <script type="text/javascript" src="jquery/jquery-1.7.2.min.js"></script>
     
<script src="js/jquery-ui/jquery-ui.js" type="text/javascript"></script>
<script src="js/bootstrap-multiselect.js"
    type="text/javascript"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
<link href="css/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css" />

<link href="css/bootstrap-multiselect.css"
    rel="stylesheet" type="text/css" /> -->


    <script type="text/javascript" src="js/jquery.min.js"></script>
<link href="css/bootstrap.min.css"
    rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link href="css/bootstrap-multiselect.css"
    rel="stylesheet" type="text/css" />
<script src="js/bootstrap-multiselect.js"
    type="text/javascript"></script>

<div class="main_form_header">
 <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">QUALITY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">ADD NEW PROJECT</span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>

<body onbeforeunload=”HandleBackFunctionality()” style="background-color: white">
<? include 'sidebar_itp.php'; ?></div>
<div class="Main_Form_list">

      <div class="well form-horizontal well_class" >
      <div class="form-group">
           <div class="col-md-12" style="padding-left: 0px;padding-bottom: 5px;">
                <label class="col-md-12 control-label" style=""><span class="project_title" style="">PROJECT :&nbsp;<? echo $_SESSION['project_name'] ?> </span></label>
            </div>
            </div>

    <!-- <div class="Form_name" style="text-shadow:1px 1px 1px rgba(18,18,18,1);font-weight:normal;color:#6495ED  ;letter-spacing:1pt;word-spacing:0pt;font-size:23px;text-align:center;font-family:verdana, sans-serif;line-height:2; background-color: #696969">NEW ITP PROJECT
      </div> -->
      
       <form class=" form-horizontal" action=" " method="post"  id="conntact_form">
        <div class="alert alert-success" role="alert" style="<? if($success!='1'){ echo 'display:none;';}?>">
          <strong>Well done!</strong> You successfully Added New Project.&nbsp
          <button onclick="back()"> Go Back</button>
        </div>

      <div class="form-group">
         
         <div class="col-sm-4">
            <input name="project_id" id="date_show" placeholder="Id" class="form-control"  type="hidden" value="<?=$get_id->id;?>" readonly>
         </div> 
        
      </div>

<!-- Text input-->


<div class="form-group">
<div class="col-md-12">
   <label class="col-md-12 control-label label-position">ITP Project Name</label> 
 </div>
   <div class="col-md-12" style="">
            <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input  placeholder="ITP Project Name" class="form-control"  type="text" value="" name="project_name" required>
        </div>
        </div>

</div>
<!-- Button -->


<div class="form-group">
        <label class="col-md-4 control-label"></label>
            <div class="col-md-5">
              
               <input type="submit" value="Submit" name="save" style="" class="btn btn-warning form_submit_button"></input>
          </div>
        </div>

</form>


    </div>
    </div>
 


</body>
<footer>
  <? include("footer.php"); ?>
<footer>
<script type="text/javascript">
  
function back()
{
window.location.href="project_list.php"; 
}

</script>

<style>
  label {
    
    font-weight: 100;
    font-style: italic;
    padding-left: 25px;

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
</style>