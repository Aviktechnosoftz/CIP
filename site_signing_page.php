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


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<head>
  <script src="js/jquery.min.js"></script>
<div class="loader" style="position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('image/load.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;"></div>

<script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>
<header>
 <? include('header.php'); ?>
 <? include('test_side_new.php'); ?>
<link rel="stylesheet" href="css/bootstrap.min.css">
    
    <script src="js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
<!--     <script src="js/jquery.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script> -->
    <!-- <script src="js/bootstrap.min.3.3.6.js"></script> -->
     <script type="text/javascript" src=js/validation_site_induction.js></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css">

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">


<script src="js/signpad.js"></script> 
<script src="js/numeric-1.2.6.min.js"></script> 
    <script src="js/bezier.js"></script>
    
    
    <script type='text/javascript' src="js/html2canvas.js"></script>
    <script src="js/json2.min.js"></script>




 
<? 

include('header.php');
include('test_side_new.php');

$get_project_details= $conn->query("Select * from tbl_project_detail where project_id='".$_SESSION['admin']."'")->fetch_object();

if(isset($_POST['approve']))
{

  $update_project_details= $conn->query("Update tbl_project_detail SET 


    construction_manager='".$_POST['construction_manager']."',
    safety_manager='".$_POST['safety_manager']."',
    project_manager='".$_POST['project_manager']."',
    project_engineer='".$_POST['project_engineer']."',
    site_manager='".$_POST['site_manager']."',
    foreman='".$_POST['foreman']."',
    site_engineer='".$_POST['site_engineer']."',
      safety_representative    ='".$_POST['safety_representative']."',
      cm_sign='".$_POST['sign_div_hide1']."',
      safety_sign='".$_POST['sign_div_hide2']."',
      pm_sign='".$_POST['sign_div_hide3']."',
      pe_sign='".$_POST['sign_div_hide4']."',
      sm_sign='".$_POST['sign_div_hide5']."',
      fm_sign='".$_POST['sign_div_hide6']."',
      se_sign='".$_POST['sign_div_hide7']."',
      hsr_sign='".$_POST['sign_div_hide8']."',
      modified_date = NOW() where project_id='".$_SESSION['admin']."'");

  if($update_project_details)
  {
    ?><script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script> 
      <script>

           $.notify("Success !! You Have Updated the Details", "success", { position:"top-right" });
        window.location.href='header_home.php';
      </script>
    <?
  }
}


?> 

</header>
   <div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">Site Safety Management Plan Signing Page&nbsp;<?// echo $project_name->project_name ?> </span></label>
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
      <div class="slider col-md-4" style="padding-left: 0">

<div class="bs-example"> 
<div id="myCarousel" class="carousel slide" data-ride="carousel">
       <ol class="carousel-indicators"> 
         <? for($i=0;$i<=3;$i++){ 
                                        $j=$i+1;
                                        $image_col="image_".$j;
                                        if($get_project_details->$image_col !="")
                                        {

                                        ?>
                                        <li data-target="#myCarousel" data-slide-to="<?=$i?>" <?if($i==0) echo"class='active'";?>></li>
                                        <? } ?>
                                        <!-- <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>  -->

                                    <? } ?>  
       </ol> 
       <div class="carousel-inner"  style="cursor: pointer;">
                    <? for($i=0;$i<=3;$i++){ 
                                        $j=$i+1;
                                        $image_col="image_".$j;
                                        if($get_project_details->$image_col !="")
                                        {

                                        ?>
                                        <div class="item <?if(!$i) echo "active" ?>" style="">
                                        <?if($get_project_details->is_archieved==1) echo "<div class='overlay'>
                                        </div>"; ?>
                                            <img src="admin/temp_uploads/<?=$get_project_details->$image_col?>" alt="First Slide" id="<?=$get_project_details->id ?>" class="img-rounded draggable">

                                        </div>

                                         <? } ?>
                                        <!-- <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>  -->

                                    <? } ?> 




        </div> 
        </div>
        </div>
        </div>
    <script src="js/signpad.js"></script> 
          <div id="set_cover">
            
            <div class="col-sm-6"><div class="col-sm-12 heading"><span style="font-size: 3vh;margin: 0px; font-family:"Helvetica_nue_thin";"></span> </div> <div class="col-sm-12 details"> <span>Principal Contractor:</span>&nbsp<span><?=$get_project_details->principal_contractor?></span> </div> <div class="col-sm-12 details"> <span>Client Name:</span>&nbsp<span><?=$get_project_details->client?></span> </div> <div class="col-sm-12 details"> <span>Project Location:</span>&nbsp<span><?=$get_project_details->project_address?></span> </div> <div class="col-sm-12 details"> <span>Project Commencement Date:</span>&nbsp<span><?=$get_project_details->commencement_date?></span> </div> <div class="col-sm-12 details"> <span>Site Safety Management Plan Prepared by:</span>&nbsp<span><?=$get_project_details->mgmt_plan_prepared?></span> </div> <div class="col-sm-12 details"> <span>Site Safety Management Plan Issued by:</span>&nbsp<span><?=$get_project_details->mgmt_plan_prepared?></span> </div> <div class="col-sm-12 details"> <span>Date of Issue:</span>&nbsp<span><?=$get_project_details->mgmt_plan_issue_date?></span> </div> </div> <div class="col-sm-3" style=""> </div><div class="col-sm-12" style="margin-top: 5vh;background: #F0F0F0;color: #646464; margin-top: 5vh;font-size: 3vh background: #F0F0F0; color: #646464; padding-top: 2vh; padding-bottom: 2vh;"> SITE SAFETY MANAGEMENT PLAN - ISSUE 12.0 <br> <span style="font-size: 2vh">The personnel below confirm they have read the contents of the Site Safety Management Plan and appendices and understand their roles/responsibilities.</span> </div> 


            <form name="Sign_details" method="POST" id="Sign_details" onsubmit="return validate()"> 
            <div class="col-sm-12 Response" style="padding: 0;margin-top: 1vh"> 

            <table class="table table-striped"> <thead style="background: #DFDFDF;text-transform: none;"> <tr> <th>Name</th> <th>Position</th> <th>Signature</th> <th>Date</th> </tr> </thead> <tbody> <tr> <th scope="row">
            
            <input type="text" name="construction_manager" id="construction_manager" class="form-control form-control-left-radius" value="<?=$get_project_details->construction_manager?>"></th> 

            <td>Construction Manager</td> <td>
              
               <div style="-webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px;background:center top no-repeat rgb(255, 255, 255);height: 100%;background-size: 20vh 20vh;">
              <p class="h5" style="text-align: center;vertical-align: middle;">Sign Here<span style="margin-left: 10px;"><a href="#" data-toggle="modal" data-target="#bannerformmodal1" class="new-sign"> New Sign</a></span></p>
              

              

              <div style="height: 120px;" >
                <div style="background:url('<?="API/Uploads/".$get_project_details->cm_sign?>') center top no-repeat rgb(255, 255, 255);height: 100%;width: 100%;text-align: center;background-size: 100%" name="sign_div1" id= "sign_div1""></div>
              </div>

              
              <input type="text" name="sign_div_hide1" id="sign_div_hide1" value="<?=$get_project_details->cm_sign?>" hidden>

              <!-- New Sign Modal -->
<div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal1">
  <div class="modal-dialog">
    <div class="modal-content">      
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: inherit;">&times;</button>
      <h4 class="modal-title" id="myModalLabel">New Signature Here..</h4>
      </div>
    <div class="modal-body">
      <center>

        <div id="signArea1" >
        <!-- <h2 class="tag-ingo">Put signature below,</h2> -->
          <div class="sig sigWrapper" style="height:auto;">
            <div class="typed">
            </div>
            <canvas class="sign-pad" id="sign-pad1" width="300" height="100">
            </canvas>
            <canvas id='blank1' style='display:none'>
            </canvas>
            <div>
            <input class="button_sign" type="button" name="" id="btnSaveSign1" value="Save">
            <input class="clearButton button_sign" type="button" name="" value="Clear">
            </div>
          </div>
        </div>
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
      </center>
    </div>


    <!-- <div class="modal-footer">
    <button type="button" class="btn btn-blue">Submit</button>
    </div>   -->        
    </div>
  </div>
</div>
</div>









            </td> <td><? echo date('d/m/Y'); ?></td> </tr> <tr> <th scope="row">
            
            <input type="text" name="safety_manager" id="safety_manager" class="form-control form-control-left-radius" value="<?=$get_project_details->safety_manager?>"></th> <td>National Safety Manager</td> <td>
              
            <!-- sign2 -->

            <div style="-webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px;background:center top no-repeat rgb(255, 255, 255);height: 100%;background-size: 20vh 20vh;">
              <p class="h5" style="text-align: center;vertical-align: middle;">Sign Here<span style="margin-left: 10px;"><a href="#" data-toggle="modal" data-target="#bannerformmodal2" class="new-sign"> New Sign</a></span></p>
              

              

              <div style="height: 120px;" >
                <div style="background:url('<?="API/Uploads/".$get_project_details->safety_sign?>') center top no-repeat rgb(255, 255, 255);height: 100%;width: 100%;text-align: center;background-size: 100%" name="sign_div2" id= "sign_div2"></div>
              </div>

              
              <input type="text" name="sign_div_hide2" id="sign_div_hide2" value="<?=$get_project_details->safety_sign?>" hidden>

              <!-- New Sign Modal -->
<div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal2">
  <div class="modal-dialog">
    <div class="modal-content">      
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: inherit;">&times;</button>
      <h4 class="modal-title" id="myModalLabel">New Signature Here..</h4>
      </div>
    <div class="modal-body">
      <center>

        <div id="signArea2" >
        <!-- <h2 class="tag-ingo">Put signature below,</h2> -->
          <div class="sig sigWrapper" style="height:auto;">
            <div class="typed">
            </div>
            <canvas class="sign-pad" id="sign-pad2" width="300" height="100">
            </canvas>
            <canvas id='blank2' style='display:none'>
            </canvas>
            <div>
            <input class="button_sign" type="button" name="" id="btnSaveSign2" value="Save">
            <input class="clearButton button_sign" type="button" name="" value="Clear">
            </div>
          </div>
        </div>
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
      </center>
    </div>


    <!-- <div class="modal-footer">
    <button type="button" class="btn btn-blue">Submit</button>
    </div>   -->        
    </div>
  </div>
</div>
</div>



            <!--sign2 end -->

            </td> <td><? echo date('d/m/Y'); ?></td> </tr> <tr> <th scope="row">

            <input type="text" name="project_manager" id="project_manager" class="form-control form-control-left-radius" value="<?=$get_project_details->project_manager?>"></th> <td>Project Manager</td> <td>
              
                <!-- sign3 -->

            <div style="-webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px;background:center top no-repeat rgb(255, 255, 255);height: 100%;background-size: 20vh 20vh;">
              <p class="h5" style="text-align: center;vertical-align: middle;">Sign Here<span style="margin-left: 10px;"><a href="#" data-toggle="modal" data-target="#bannerformmodal3" class="new-sign"> New Sign</a></span></p>
              

              

              <div style="height: 120px;" >
                <div style="background:url('<?="API/Uploads/".$get_project_details->pm_sign?>') center top no-repeat rgb(255, 255, 255);height: 100%;width: 100%;text-align: center;background-size: 100%" name="sign_div3" id= "sign_div3"></div>
              </div>

              
              <input type="text" name="sign_div_hide3" id="sign_div_hide3" value="<?=$get_project_details->pm_sign?>" hidden>

              <!-- New Sign Modal -->
<div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal3">
  <div class="modal-dialog">
    <div class="modal-content">      
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: inherit;">&times;</button>
      <h4 class="modal-title" id="myModalLabel">New Signature Here..</h4>
      </div>
    <div class="modal-body">
      <center>

        <div id="signArea3" >
        <!-- <h2 class="tag-ingo">Put signature below,</h2> -->
          <div class="sig sigWrapper" style="height:auto;">
            <div class="typed">
            </div>
            <canvas class="sign-pad" id="sign-pad3" width="300" height="100">
            </canvas>
            <canvas id='blank3' style='display:none'>
            </canvas>
            <div>
            <input class="button_sign" type="button" name="" id="btnSaveSign3" value="Save">
            <input class="clearButton button_sign" type="button" name="" value="Clear">
            </div>
          </div>
        </div>
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
      </center>
    </div>


    <!-- <div class="modal-footer">
    <button type="button" class="btn btn-blue">Submit</button>
    </div>   -->        
    </div>
  </div>
</div>
</div>



            <!--sign3 end -->

            </td> <td><? echo date('d/m/Y'); ?></td> </tr> <tr> <th scope="row">

            <input type="text" name="project_engineer" id="project_engineer" class="form-control form-control-left-radius" value="<?=$get_project_details->project_engineer?>"></th> <td>Project Engineer</td> <td>
               <!-- sign3 -->

            <div style="-webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px;background:center top no-repeat rgb(255, 255, 255);height: 100%;background-size: 20vh 20vh;">
              <p class="h5" style="text-align: center;vertical-align: middle;">Sign Here<span style="margin-left: 10px;"><a href="#" data-toggle="modal" data-target="#bannerformmodal4" class="new-sign"> New Sign</a></span></p>
              

              

              <div style="height: 120px;" >
                <div style="background:url('<?="API/Uploads/".$get_project_details->pe_sign ?>') center top no-repeat rgb(255, 255, 255);height: 100%;width: 100%;text-align: center;background-size: 100%" name="sign_div4" id= "sign_div4"></div>
              </div>

              
              <input type="text" name="sign_div_hide4" id="sign_div_hide4" value="<?=$get_project_details->pe_sign?>" hidden>

              <!-- New Sign Modal -->
<div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal4">
  <div class="modal-dialog">
    <div class="modal-content">      
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: inherit;">&times;</button>
      <h4 class="modal-title" id="myModalLabel">New Signature Here..</h4>
      </div>
    <div class="modal-body">
      <center>

        <div id="signArea4" >
        <!-- <h2 class="tag-ingo">Put signature below,</h2> -->
          <div class="sig sigWrapper" style="height:auto;">
            <div class="typed">
            </div>
            <canvas class="sign-pad" id="sign-pad4" width="300" height="100">
            </canvas>
            <canvas id='blank4' style='display:none'>
            </canvas>
            <div>
            <input class="button_sign" type="button" name="" id="btnSaveSign4" value="Save">
            <input class="clearButton button_sign" type="button" name="" value="Clear">
            </div>
          </div>
        </div>
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
      </center>
    </div>


    <!-- <div class="modal-footer">
    <button type="button" class="btn btn-blue">Submit</button>
    </div>   -->        
    </div>
  </div>
</div>
</div>



            <!--sign3 end -->




            </td> <td><? echo date('d/m/Y'); ?></td> </tr> <tr> <th scope="row">

            <input type="text" name="site_manager" id="site_manager" class="form-control form-control-left-radius" value="<?=$get_project_details->site_manager?>"></th> <td>Site Manager</td> <td>
              
                <!-- sign4 -->

            <div style="-webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px;background:center top no-repeat rgb(255, 255, 255);height: 100%;background-size: 20vh 20vh;">
              <p class="h5" style="text-align: center;vertical-align: middle;">Sign Here<span style="margin-left: 10px;"><a href="#" data-toggle="modal" data-target="#bannerformmodal5" class="new-sign"> New Sign</a></span></p>
              

              

              <div style="height: 120px;" >
                <div style="background:url('<?="API/Uploads/".$get_project_details->sm_sign?>') center top no-repeat rgb(255, 255, 255);height: 100%;width: 100%;text-align: center;background-size: 100%" name="sign_div5" id= "sign_div5"></div>
              </div>

              
              <input type="text" name="sign_div_hide5" id="sign_div_hide5" value="<?=$get_project_details->sm_sign?>" hidden>

              <!-- New Sign Modal -->
<div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal5">
  <div class="modal-dialog">
    <div class="modal-content">      
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: inherit;">&times;</button>
      <h4 class="modal-title" id="myModalLabel">New Signature Here..</h4>
      </div>
    <div class="modal-body">
      <center>

        <div id="signArea5" >
        <!-- <h2 class="tag-ingo">Put signature below,</h2> -->
          <div class="sig sigWrapper" style="height:auto;">
            <div class="typed">
            </div>
            <canvas class="sign-pad" id="sign-pad5" width="300" height="100">
            </canvas>
            <canvas id='blank5' style='display:none'>
            </canvas>
            <div>
            <input class="button_sign" type="button" name="" id="btnSaveSign5" value="Save">
            <input class="clearButton button_sign" type="button" name="" value="Clear">
            </div>
          </div>
        </div>
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
      </center>
    </div>


    <!-- <div class="modal-footer">
    <button type="button" class="btn btn-blue">Submit</button>
    </div>   -->        
    </div>
  </div>
</div>
</div>



            <!--sign4 end -->

            </td> <td><? echo date('d/m/Y'); ?></td> </tr> <tr> <th scope="row">

            <input type="text" name="foreman" id="foreman" class="form-control form-control-left-radius" value="<?=$get_project_details->foreman?>"></th> <td>Foreman</td> 
            <td>
              
               <!-- sign6 -->

            <div style="-webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px;background:center top no-repeat rgb(255, 255, 255);height: 100%;background-size: 20vh 20vh;">
              <p class="h5" style="text-align: center;vertical-align: middle;">Sign Here<span style="margin-left: 10px;"><a href="#" data-toggle="modal" data-target="#bannerformmodal6" class="new-sign"> New Sign</a></span></p>
              

              

              <div style="height: 120px;" >
                <div style="background:url('<?="API/Uploads/".$get_project_details->fm_sign ?>') center top no-repeat rgb(255, 255, 255);height: 100%;width: 100%;text-align: center;background-size: 100%" name="sign_div6" id= "sign_div6"></div>
              </div>

              
              <input type="text" name="sign_div_hide6" id="sign_div_hide6" value="<?=$get_project_details->fm_sign?>" hidden>

              <!-- New Sign Modal -->
<div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal6">
  <div class="modal-dialog">
    <div class="modal-content">      
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: inherit;">&times;</button>
      <h4 class="modal-title" id="myModalLabel">New Signature Here..</h4>
      </div>
    <div class="modal-body">
      <center>

        <div id="signArea6" >
        <!-- <h2 class="tag-ingo">Put signature below,</h2> -->
          <div class="sig sigWrapper" style="height:auto;">
            <div class="typed">
            </div>
            <canvas class="sign-pad" id="sign-pad6" width="300" height="100">
            </canvas>
            <canvas id='blank6' style='display:none'>
            </canvas>
            <div>
            <input class="button_sign" type="button" name="" id="btnSaveSign6" value="Save">
            <input class="clearButton button_sign" type="button" name="" value="Clear">
            </div>
          </div>
        </div>
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
      </center>
    </div>


    <!-- <div class="modal-footer">
    <button type="button" class="btn btn-blue">Submit</button>
    </div>   -->        
    </div>
  </div>
</div>
</div>



            <!--sign6 end -->


            </td> <td><? echo date('d/m/Y'); ?></td> </tr> <tr> <th scope="row">

            <input type="text" name="site_engineer" id="site_engineer" class="form-control form-control-left-radius" value="<?=$get_project_details->site_engineer?>"></th> <td>Site Engineer</td> <td>
              
               <!-- sign4 -->

            <div style="-webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px;background:center top no-repeat rgb(255, 255, 255);height: 100%;background-size: 20vh 20vh;">
              <p class="h5" style="text-align: center;vertical-align: middle;">Sign Here<span style="margin-left: 10px;"><a href="#" data-toggle="modal" data-target="#bannerformmodal7" class="new-sign"> New Sign</a></span></p>
              

              

              <div style="height: 120px;" >
                <div style="background:url('<?="API/Uploads/".$get_project_details->se_sign?>') center top no-repeat rgb(255, 255, 255);height: 100%;width: 100%;text-align: center;background-size: 100%" name="sign_div7" id= "sign_div7"></div>
              </div>

              
              <input type="text" name="sign_div_hide7" id="sign_div_hide7" value="<?=$get_project_details->se_sign?>" hidden>

              <!-- New Sign Modal -->
<div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal7">
  <div class="modal-dialog">
    <div class="modal-content">      
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: inherit;">&times;</button>
      <h4 class="modal-title" id="myModalLabel">New Signature Here..</h4>
      </div>
    <div class="modal-body">
      <center>

        <div id="signArea7" >
        <!-- <h2 class="tag-ingo">Put signature below,</h2> -->
          <div class="sig sigWrapper" style="height:auto;">
            <div class="typed">
            </div>
            <canvas class="sign-pad" id="sign-pad7" width="300" height="100">
            </canvas>
            <canvas id='blank7' style='display:none'>
            </canvas>
            <div>
            <input class="button_sign" type="button" name="" id="btnSaveSign7" value="Save">
            <input class="clearButton button_sign" type="button" name="" value="Clear">
            </div>
          </div>
        </div>
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
      </center>
    </div>


    <!-- <div class="modal-footer">
    <button type="button" class="btn btn-blue">Submit</button>
    </div>   -->        
    </div>
  </div>
</div>
</div>



            <!--sign4 end -->


            </td> <td><? echo date('d/m/Y'); ?></td> </tr> <tr> <th scope="row">

            <input type="text" name="safety_representative" id="safety_representative" class="form-control form-control-left-radius" value="<?=$get_project_details->safety_representative?>"></th> <td>Health and Safety Representative</td> <td>
              
               <!-- sign4 -->

            <div style="-webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px;background:center top no-repeat rgb(255, 255, 255);height: 100%;background-size: 20vh 20vh;">
              <p class="h5" style="text-align: center;vertical-align: middle;">Sign Here<span style="margin-left: 10px;"><a href="#" data-toggle="modal" data-target="#bannerformmodal8" class="new-sign"> New Sign</a></span></p>
              

              

              <div style="height: 120px;" >
                <div style="background:url('<?="API/Uploads/".$get_project_details->hsr_sign ?>') center top no-repeat rgb(255, 255, 255);height: 100%;width: 100%;text-align: center;background-size: 100%" name="sign_div8" id= "sign_div8"></div>
              </div>

              
              <input type="text" name="sign_div_hide8" id="sign_div_hide8" value="<?=$get_project_details->hsr_sign?>" hidden>

              <!-- New Sign Modal -->
<div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal8">
  <div class="modal-dialog">
    <div class="modal-content">      
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: inherit;">&times;</button>
      <h4 class="modal-title" id="myModalLabel">New Signature Here..</h4>
      </div>
    <div class="modal-body">
      <center>

        <div id="signArea8" >
        <!-- <h2 class="tag-ingo">Put signature below,</h2> -->
          <div class="sig sigWrapper" style="height:auto;">
            <div class="typed">
            </div>
            <canvas class="sign-pad" id="sign-pad8" width="300" height="100">
            </canvas>
            <canvas id='blank' style='display:none'>
            </canvas>
            <div>
            <input class="button_sign" type="button" name="" id="btnSaveSign8" value="Save">
            <input class="clearButton button_sign" type="button" name="" value="Clear">
            </div>
          </div>
        </div>
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
      </center>
    </div>


    <!-- <div class="modal-footer">
    <button type="button" class="btn btn-blue">Submit</button>
    </div>   -->        
    </div>
  </div>
</div>
</div>



            <!--sign4 end -->



            </td> <td><? echo date('d/m/Y'); ?></td> </tr> </tbody> </table> 

               <div class="col-md-12">

               <div class="col-sm-3 col-sm-offset-4" >
              <input class="btn btn-primary form_submit_button" name="approve"  type="submit" value="Approve"/>
              </div>
            </div>

            </div>

            <script type="text/javascript">
    var toggle_val= 0;
      $(document).ready(function() {
        $('#signArea1').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
        $('#signArea2').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
        $('#signArea3').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
        $('#signArea4').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
        $('#signArea5').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
        $('#signArea6').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
        $('#signArea7').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
        $('#signArea8').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
        
      });
      
      $("#btnSaveSign1").click(function(e){
          canvas = document.getElementById('sign-pad1');
        if(canvas.toDataURL() == "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADHUlEQVR4Xu3YsQ3DQBADQasm9V+CanoDTu3A6RKjCvjDAwNd55zz8hEgQCAgcBmsQEsiEiDwETBYDoEAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARuDnYD3Pk3mAoAQIbArc9/31MIO12bVXEcgL/D1Y+Zd6AAECkwL+YU3W6lEENgUM1mavXkVgUsBgTdbqUQQ2BQzWZq9eRWBSwGBN1upRBDYFDNZmr15FYFLAYE3W6lEENgUM1mavXkVgUuANCUCU5ApZHy4AAAAASUVORK5CYII=" || canvas.toDataURL()=="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADKElEQVR4Xu3YsW2EUBREUbYA2qD/emiDAljJmeXE6R0dKph/5mkCPu/7voePAAECAYGPwQq0JCIBAj8CBsshECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgI/Bms+76P53kyDxCUAIFNgfM8j+u6fj3OYG127VUE8gL/Gqz8Kz2AAIFZAf+wZqv1MAJ7AgZrr1MvIjArYLBmq/UwAnsCBmuvUy8iMCtgsGar9TACewIGa69TLyIwK2CwZqv1MAJ7AgZrr1MvIjAr8AU2aZrkSYVn9AAAAABJRU5ErkJggg==")
        {
        alert('Signature Field Cannot be left blank');
        return false;
      }
        
            else
            {
        html2canvas([document.getElementById('sign-pad1')], {
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
                 $('#sign_div_hide1').val(response+".png");
                 $('#sign_div1').css('background-image', 'url(API/Uploads/' + response + '.png)');
              }
            });
          }
        });
      }
      });

</script>


<script type="text/javascript">
    var toggle_val_2= 0;
   
      
      $("#btnSaveSign2").click(function(e){
          canvas = document.getElementById('sign-pad2');
        if(canvas.toDataURL() == "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADHUlEQVR4Xu3YsQ3DQBADQasm9V+CanoDTu3A6RKjCvjDAwNd55zz8hEgQCAgcBmsQEsiEiDwETBYDoEAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARuDnYD3Pk3mAoAQIbArc9/31MIO12bVXEcgL/D1Y+Zd6AAECkwL+YU3W6lEENgUM1mavXkVgUsBgTdbqUQQ2BQzWZq9eRWBSwGBN1upRBDYFDNZmr15FYFLAYE3W6lEENgUM1mavXkVgUuANCUCU5ApZHy4AAAAASUVORK5CYII=" || canvas.toDataURL()=="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADKElEQVR4Xu3YsW2EUBREUbYA2qD/emiDAljJmeXE6R0dKph/5mkCPu/7voePAAECAYGPwQq0JCIBAj8CBsshECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgI/Bms+76P53kyDxCUAIFNgfM8j+u6fj3OYG127VUE8gL/Gqz8Kz2AAIFZAf+wZqv1MAJ7AgZrr1MvIjArYLBmq/UwAnsCBmuvUy8iMCtgsGar9TACewIGa69TLyIwK2CwZqv1MAJ7AgZrr1MvIjAr8AU2aZrkSYVn9AAAAABJRU5ErkJggg==")
        {
        alert('Signature Field Cannot be left blank');
        return false;
      }
        
            else
            {
        html2canvas([document.getElementById('sign-pad2')], {
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
                 toggle_val_2=1;
                 $('#sign_div_hide2').val(response+".png");
                 $('#sign_div2').css('background-image', 'url(API/Uploads/' + response + '.png)');
              }
            });
          }
        });
      }
      });

</script>


<script type="text/javascript">
    var toggle_val_3= 0;
    
      
      $("#btnSaveSign3").click(function(e){
          canvas = document.getElementById('sign-pad3');
        if(canvas.toDataURL() == "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADHUlEQVR4Xu3YsQ3DQBADQasm9V+CanoDTu3A6RKjCvjDAwNd55zz8hEgQCAgcBmsQEsiEiDwETBYDoEAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARuDnYD3Pk3mAoAQIbArc9/31MIO12bVXEcgL/D1Y+Zd6AAECkwL+YU3W6lEENgUM1mavXkVgUsBgTdbqUQQ2BQzWZq9eRWBSwGBN1upRBDYFDNZmr15FYFLAYE3W6lEENgUM1mavXkVgUuANCUCU5ApZHy4AAAAASUVORK5CYII=" || canvas.toDataURL()=="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADKElEQVR4Xu3YsW2EUBREUbYA2qD/emiDAljJmeXE6R0dKph/5mkCPu/7voePAAECAYGPwQq0JCIBAj8CBsshECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgI/Bms+76P53kyDxCUAIFNgfM8j+u6fj3OYG127VUE8gL/Gqz8Kz2AAIFZAf+wZqv1MAJ7AgZrr1MvIjArYLBmq/UwAnsCBmuvUy8iMCtgsGar9TACewIGa69TLyIwK2CwZqv1MAJ7AgZrr1MvIjAr8AU2aZrkSYVn9AAAAABJRU5ErkJggg==")
        {
        alert('Signature Field Cannot be left blank');
        return false;
      }
        
            else
            {
        html2canvas([document.getElementById('sign-pad3')], {
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
                 toggle_val_3=1;
                 $('#sign_div_hide3').val(response+".png");
                 $('#sign_div3').css('background-image', 'url(API/Uploads/' + response + '.png)');
              }
            });
          }
        });
      }
      });

</script>


<script type="text/javascript">
    var toggle_val_4= 0;
     
      
      $("#btnSaveSign4").click(function(e){
          canvas = document.getElementById('sign-pad4');
        if(canvas.toDataURL() == "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADHUlEQVR4Xu3YsQ3DQBADQasm9V+CanoDTu3A6RKjCvjDAwNd55zz8hEgQCAgcBmsQEsiEiDwETBYDoEAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARuDnYD3Pk3mAoAQIbArc9/31MIO12bVXEcgL/D1Y+Zd6AAECkwL+YU3W6lEENgUM1mavXkVgUsBgTdbqUQQ2BQzWZq9eRWBSwGBN1upRBDYFDNZmr15FYFLAYE3W6lEENgUM1mavXkVgUuANCUCU5ApZHy4AAAAASUVORK5CYII=" || canvas.toDataURL()=="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADKElEQVR4Xu3YsW2EUBREUbYA2qD/emiDAljJmeXE6R0dKph/5mkCPu/7voePAAECAYGPwQq0JCIBAj8CBsshECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgI/Bms+76P53kyDxCUAIFNgfM8j+u6fj3OYG127VUE8gL/Gqz8Kz2AAIFZAf+wZqv1MAJ7AgZrr1MvIjArYLBmq/UwAnsCBmuvUy8iMCtgsGar9TACewIGa69TLyIwK2CwZqv1MAJ7AgZrr1MvIjAr8AU2aZrkSYVn9AAAAABJRU5ErkJggg==")
        {
        alert('Signature Field Cannot be left blank');
        return false;
      }
        
            else
            {
        html2canvas([document.getElementById('sign-pad4')], {
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
                 toggle_val_4=1;
                 $('#sign_div_hide4').val(response+".png");
                 $('#sign_div4').css('background-image', 'url(API/Uploads/' + response + '.png)');
              }
            });
          }
        });
      }
      });

</script>


<script type="text/javascript">
    var toggle_val_5= 0;
     
      
      $("#btnSaveSign5").click(function(e){
          canvas = document.getElementById('sign-pad5');
        if(canvas.toDataURL() == "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADHUlEQVR4Xu3YsQ3DQBADQasm9V+CanoDTu3A6RKjCvjDAwNd55zz8hEgQCAgcBmsQEsiEiDwETBYDoEAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARuDnYD3Pk3mAoAQIbArc9/31MIO12bVXEcgL/D1Y+Zd6AAECkwL+YU3W6lEENgUM1mavXkVgUsBgTdbqUQQ2BQzWZq9eRWBSwGBN1upRBDYFDNZmr15FYFLAYE3W6lEENgUM1mavXkVgUuANCUCU5ApZHy4AAAAASUVORK5CYII=" || canvas.toDataURL()=="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADKElEQVR4Xu3YsW2EUBREUbYA2qD/emiDAljJmeXE6R0dKph/5mkCPu/7voePAAECAYGPwQq0JCIBAj8CBsshECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgI/Bms+76P53kyDxCUAIFNgfM8j+u6fj3OYG127VUE8gL/Gqz8Kz2AAIFZAf+wZqv1MAJ7AgZrr1MvIjArYLBmq/UwAnsCBmuvUy8iMCtgsGar9TACewIGa69TLyIwK2CwZqv1MAJ7AgZrr1MvIjAr8AU2aZrkSYVn9AAAAABJRU5ErkJggg==")
        {
        alert('Signature Field Cannot be left blank');
        return false;
      }
        
            else
            {
        html2canvas([document.getElementById('sign-pad5')], {
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
                 toggle_val_5=1;
                 $('#sign_div_hide5').val(response+".png");
                 $('#sign_div5').css('background-image', 'url(API/Uploads/' + response + '.png)');
              }
            });
          }
        });
      }
      });

</script>


<script type="text/javascript">
    var toggle_val_6= 0;
     
      
      $("#btnSaveSign6").click(function(e){
          canvas = document.getElementById('sign-pad6');
        if(canvas.toDataURL() == "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADHUlEQVR4Xu3YsQ3DQBADQasm9V+CanoDTu3A6RKjCvjDAwNd55zz8hEgQCAgcBmsQEsiEiDwETBYDoEAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARuDnYD3Pk3mAoAQIbArc9/31MIO12bVXEcgL/D1Y+Zd6AAECkwL+YU3W6lEENgUM1mavXkVgUsBgTdbqUQQ2BQzWZq9eRWBSwGBN1upRBDYFDNZmr15FYFLAYE3W6lEENgUM1mavXkVgUuANCUCU5ApZHy4AAAAASUVORK5CYII=" || canvas.toDataURL()=="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADKElEQVR4Xu3YsW2EUBREUbYA2qD/emiDAljJmeXE6R0dKph/5mkCPu/7voePAAECAYGPwQq0JCIBAj8CBsshECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgI/Bms+76P53kyDxCUAIFNgfM8j+u6fj3OYG127VUE8gL/Gqz8Kz2AAIFZAf+wZqv1MAJ7AgZrr1MvIjArYLBmq/UwAnsCBmuvUy8iMCtgsGar9TACewIGa69TLyIwK2CwZqv1MAJ7AgZrr1MvIjAr8AU2aZrkSYVn9AAAAABJRU5ErkJggg==")
        {
        alert('Signature Field Cannot be left blank');
        return false;
      }
        
            else
            {
        html2canvas([document.getElementById('sign-pad6')], {
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
                 toggle_val_6=1;
                 $('#sign_div_hide6').val(response+".png");
                 $('#sign_div6').css('background-image', 'url(API/Uploads/' + response + '.png)');
              }
            });
          }
        });
      }
      });

</script>


<script type="text/javascript">
    var toggle_val_7= 0;
     
      
      $("#btnSaveSign7").click(function(e){
          canvas = document.getElementById('sign-pad7');
        if(canvas.toDataURL() == "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADHUlEQVR4Xu3YsQ3DQBADQasm9V+CanoDTu3A6RKjCvjDAwNd55zz8hEgQCAgcBmsQEsiEiDwETBYDoEAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARuDnYD3Pk3mAoAQIbArc9/31MIO12bVXEcgL/D1Y+Zd6AAECkwL+YU3W6lEENgUM1mavXkVgUsBgTdbqUQQ2BQzWZq9eRWBSwGBN1upRBDYFDNZmr15FYFLAYE3W6lEENgUM1mavXkVgUuANCUCU5ApZHy4AAAAASUVORK5CYII=" || canvas.toDataURL()=="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADKElEQVR4Xu3YsW2EUBREUbYA2qD/emiDAljJmeXE6R0dKph/5mkCPu/7voePAAECAYGPwQq0JCIBAj8CBsshECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgI/Bms+76P53kyDxCUAIFNgfM8j+u6fj3OYG127VUE8gL/Gqz8Kz2AAIFZAf+wZqv1MAJ7AgZrr1MvIjArYLBmq/UwAnsCBmuvUy8iMCtgsGar9TACewIGa69TLyIwK2CwZqv1MAJ7AgZrr1MvIjAr8AU2aZrkSYVn9AAAAABJRU5ErkJggg==")
        {
        alert('Signature Field Cannot be left blank');
        return false;
      }
        
            else
            {
        html2canvas([document.getElementById('sign-pad7')], {
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
                 toggle_val_7=1;
                 $('#sign_div_hide7').val(response+".png");
                 $('#sign_div7').css('background-image', 'url(API/Uploads/' + response + '.png)');
              }
            });
          }
        });
      }
      });

</script>


<script type="text/javascript">
    var toggle_val_8= 0;
      
      
      $("#btnSaveSign8").click(function(e){
          canvas = document.getElementById('sign-pad8');
        if(canvas.toDataURL() == "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADHUlEQVR4Xu3YsQ3DQBADQasm9V+CanoDTu3A6RKjCvjDAwNd55zz8hEgQCAgcBmsQEsiEiDwETBYDoEAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARuDnYD3Pk3mAoAQIbArc9/31MIO12bVXEcgL/D1Y+Zd6AAECkwL+YU3W6lEENgUM1mavXkVgUsBgTdbqUQQ2BQzWZq9eRWBSwGBN1upRBDYFDNZmr15FYFLAYE3W6lEENgUM1mavXkVgUuANCUCU5ApZHy4AAAAASUVORK5CYII=" || canvas.toDataURL()=="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADKElEQVR4Xu3YsW2EUBREUbYA2qD/emiDAljJmeXE6R0dKph/5mkCPu/7voePAAECAYGPwQq0JCIBAj8CBsshECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgI/Bms+76P53kyDxCUAIFNgfM8j+u6fj3OYG127VUE8gL/Gqz8Kz2AAIFZAf+wZqv1MAJ7AgZrr1MvIjArYLBmq/UwAnsCBmuvUy8iMCtgsGar9TACewIGa69TLyIwK2CwZqv1MAJ7AgZrr1MvIjAr8AU2aZrkSYVn9AAAAABJRU5ErkJggg==")
        {
        alert('Signature Field Cannot be left blank');
        return false;
      }
        
            else
            {
        html2canvas([document.getElementById('sign-pad8')], {
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
                 toggle_val_8=1;
                 $('#sign_div_hide8').val(response+".png");
                 $('#sign_div8').css('background-image', 'url(API/Uploads/' + response + '.png)');
              }
            });
          }
        });
      }
      });

</script>
           </form>


          </div>   
      </div>    
 
    
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


.carousel-indicators .active {

    display: inline-block;
    width: 10px;
    height: 10px;
    margin: 1px;
    text-indent: -999px;
    cursor: pointer;
    /*background-color: #000\9;*/
    background-color: #888888;
    border: 1px solid #fff;
    border-radius: 10px;
}
.carousel-indicators {

    left: 20%;
    }
    .carousel{
   
    margin-top: 0px;
}
.carousel .item{
    height: 150px; /* Prevent carousel from being distorted if for some reason image doesn't load */
}
.carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
}
.bs-example{
    margin: 0px;
}
.carousel-control.left, .carousel-control.right {
    background-image: none
}

.carousel-inner>.item>img
{
  /*width: 100%;*/
  height: 100%;
  margin-left: 0;
  /*width: auto;
  height: 26vh;
  max-height: 26vh;*/
}


.carousel-indicators {
    bottom: -30px;
}
.carousel-indicators li {
background-color: #D8D8D8;
    }

    .carousel-indicators .active {
   
    background-color: #888888;
} 
.table > thead > tr > th {
    text-transform: none;
    color:#5A5A5A;
    font-family: 'Helvetica_nue';
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 6px 8px;
    vertical-align: middle;
     font-size: 12px;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    
     border-top: none; 
}

.table>tbody>tr>th,.table>tbody>tr>td
{
font-weight: normal;
    font-size: 12px;
    color: #000;}
   

    .table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #F0F0F0;
}

.table>tbody
{
    background: #F5F5F5;
}
</style>
<script>
  
  function validate()
  {
    if($('#construction_manager').val().trim() == '')
    {
      alert("Construction Manager Name Cannot Be Blank");
      return false;
    }

    else if($('#safety_manager').val().trim() == '')
    {
      alert("National Safety Manager Name Cannot Be Blank");
      return false;
    }
    else if($('#project_manager').val().trim() == '')
    {
      alert("Project Manager Name Cannot Be Blank");
      return false;
    }

     else if($('#project_engineer').val().trim() == '')
    {
      alert("Project Engineer Name Cannot Be Blank");
      return false;
    }

      else if($('#site_manager').val().trim() == '')
    {
      alert("Site Manager Name Cannot Be Blank");
      return false;
    }
      else if($('#foreman').val().trim() == '')
    {
      alert("Foreman Name Cannot Be Blank");
      return false;
    }
     else if($('#site_engineer').val().trim() == '')
    {
      alert("Site Engineer Name Cannot Be Blank");
      return false;
    }

      else if($('#safety_representative').val().trim() == '')
    {
      alert("HSR Name Cannot Be Blank");
      return false;
    }
    else
    {
      $('#Sign_details').submit();
    }

  }


</script>





<style type="text/css">
  
  .glyphicon-eye-open { display:none;}

.new-sign {
  text-decoration: none !important;
  margin-left: 10px;
  
}
 .new-sign a:active, a:focus {
  outline: none;
 }
.button_sign {
  background-color: #f47821 !important;
    color: white !important;
    border: none !important;
    border-radius: 10vh !important;
    width: 100px !important;
    outline: 0 !important;
    margin-top: 20px !important;
    margin-bottom: 20px !important; 
  }   
</style>

<footer>
  <? include("footer.php"); ?>
<footer>
  