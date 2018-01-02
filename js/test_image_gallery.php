<?php
session_start();
include_once('connect.php');
// print_r($_POST);

if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}



$check_query= $conn->query("select * from tbl_capture where induction_id='".$_POST['induction_no']."'");
$get_date= $conn->query("select capture_date from tbl_capture where induction_id='".$_POST['induction_no']."'")->fetch_object();
?>
<header>
 <? include('header.php'); ?>
 <? include('test_side3.php');?>



<!-- fancybox CSS library -->
<link rel="stylesheet" type="text/css" href="js/jquery.fancybox.css">
<!-- JS library -->

<!-- fancybox JS library -->
<script src="js/jquery.fancybox.js"></script>

   </header>
   
<script type="text/javascript">
    $("[data-fancybox]").fancybox({ });



</script>

<div class="Main_Form" style="border: 1px solid grey;
    float: left;
    position: absolute;
    /*margin: -220px 0 0 -200px;*/
    margin-top: -25vh;
    top: 48vh;
    left:18vw;
    width: auto;background-color: white   ;border-radius: 4px">
    
 <center>
<div class="container">
<div>
<span style="text-shadow:1px 1px 1px rgba(18,18,18,1);font-weight:normal;color:#FF5733 ;letter-spacing:1pt;word-spacing:0pt;font-size:23px;text-align:center;font-family:verdana, sans-serif;line-height:2;">IMAGE GALLERY</span></div>


<form class="well form-horizontal" method="post"  id="contact_form" action="test_image_gallery.php"> 


<div class="form-group">
  <label class="col-md-4 control-label" >Employer/Business Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Employer Name" class="form-control"  type="text" value="<? echo $_POST['last_name']; ?>" readonly>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >Filled By</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Employer Name" class="form-control"  type="text" value="<? echo $_POST['email']; ?>" readonly>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >Induction Number</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Employer Name" class="form-control"  type="text" value="<? echo $_POST['induction_no']; ?>" readonly>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" > Capture Date</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Employer Name" class="form-control"  type="text" value="<? echo $get_date->capture_date; ?>" readonly>
    </div>
  </div>
</div>
</form>

    <div class="gallery">
        <?php

        
        
        if($check_query->num_rows > 0){
            while($row = $check_query->fetch_assoc()){
            
                $imageThumbURL = 'API/Uploads/'.$row["image_name"];
                $imageURL = 'API/Uploads/'.$row["image_name"];
                ?>
                 
            <a href="<?php echo $imageURL; ?>" data-fancybox="group" data-caption="<?php echo $row["text_data"]; ?>" >
                <img src="<?php echo $imageThumbURL; ?>" alt="" />
            </a>
         
            	
           

        <?php }
        } ?>
    </div>
    </div>
</div>
</center>
</div>
<style type="text/css">
.gallery img {
    width: 20%;
    height: auto;
    border-radius: 5px;
    cursor: pointer;
    transition: .3s;
   /* margin-left: 2vw;*/
}
 
#text_title
{
    text-shadow:1px 1px 1px rgba(51,255,105,1);font-weight:normal;color:#0C4FEB;letter-spacing:1pt;word-spacing:-1pt;font-size:13px;text-align:left;font-family:arial, helvetica, sans-serif;line-height;
}
</style>
<footer>
  <? include("footer.php"); ?>
<footer>