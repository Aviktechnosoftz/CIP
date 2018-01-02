<?php
session_start();
include_once('connect.php');
 // print_r($_POST);
error_reporting(1);
if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}



@$check_query= $conn->query("select * from tbl_capture where (induction_id='".$_POST['induction_no']."' AND capture_date='".$_POST['today_date']."' and project_id='".$_POST['project_id']."' and employer_id='".$_POST['employer_id']."')");
// echo "select image_1,image_2,image_3,image_4,image_5,image_6 from tbl_site_attendace where id=".$_POST['atendance_id']."";
if($_POST['atendance_id']!="")
{

@$count_images=$conn->query("select image_1,image_2,image_3,image_4,image_5,image_6 from tbl_site_attendace where id=".$_POST['atendance_id']."")->fetch_object();
}
else
{
  header('location:site_attendance_approved.php');
}

$a=0;
for($i=1;$i<=6;$i++)
 
{
    $str='image_'.$i;
  if($count_images->$str=="")
  {
    $count= ++$a;
  }

}
// echo $count;

// $get_date= $conn->query("select capture_date from tbl_capture where induction_id='".@$_POST['induction_no']."'")->fetch_object();
?>
<header>
 <? include('header.php'); ?>
 
 <? include('test_side_new.php'); ?>


<!-- fancybox CSS library -->
<link rel="stylesheet" type="text/css" href="js/jquery.fancybox.css">
<!-- JS library -->

<!-- fancybox JS library -->
<script src="js/jquery.fancybox.js"></script>

   </header>

   <div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">IMAGE GALLERY&nbsp;<?// echo $project_name->project_name ?> </span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>
    <script>
      function back()
      {
          window.location.href="site_attendance_approved.php"
      }
    </script>



    

   


<div class="Main_Form_list">
  <div class="col-md-12">
   


<form class="well form-horizontal" method="post"  id="contact_form" action="test_image_gallery.php"> 


<div class="form-group">
  <label class="col-md-12 control-label label-position">Employer/Business Name</label> 
    <div class="col-md-12 zeropadding">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Employer Name" class="form-control"  type="text" value="<? echo $_POST['last_name']; ?>" readonly>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label label-position">Filled By</label> 
    <div class="col-md-12 zeropadding">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Employer Name" class="form-control"  type="text" value="<? echo $_POST['email']; ?>" readonly>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label label-position">Induction Number</label> 
    <div class="col-md-12 zeropadding">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Employer Name" class="form-control"  type="text" value="<? $value= str_pad($_POST['induction_no'], 4, '0', STR_PAD_LEFT); echo $value;  ?>" readonly>
    </div>
  </div>
</div>
<div class="form-group">
 <label class="col-md-12 control-label label-position">Capture Date</label> 
    <div class="col-md-12 zeropadding">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Employer Name" class="form-control"  type="text" value="<? echo $_POST['today_date']; ?>" readonly>
    </div>
  </div>
  </div>

    <div class="form-group">
      <div class="col-sm-12">
        <div class="col-sm-6">
          <div class="col-sm-6 col-sm-offset-3">
           <input type="button" class="btn btn-primary form_submit_button" value="Save Changes"   onclick="save(<? echo $count.",".$_POST['atendance_id'] ?>)"> </input>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="col-sm-6 col-sm-offset-3">
            <input class="btn btn-primary form_submit_button" type='button' value='Back' onclick='back()'>
          </div>
        </div>
      </div>
    </div>
  <!--  <label class="col-md-12 control-label" ></label>
  
    <input type="button" class="btn btn-primary" value="Save Changes"   style=" width:125px;
    margin-left:auto;
    margin-right:auto;background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;" onclick="save(<? echo $count.",".$_POST['atendance_id'] ?>)"> </input> -->

</form>

    <div class="gallery col-sm-12 well" >
    <p style="color: red;font-weight: 200">You Can Select Max <?echo $count ?> Images</p>
        <?php

        
        
        if($check_query->num_rows > 0){
            while($row = $check_query->fetch_assoc()){
            
                $imageThumbURL = 'API/Uploads/'.$row["image_name"];
                $imageURL = 'API/Uploads/'.$row["image_name"];
                ?>
                
                         
                         <div class="col-sm-2">
            <a style="outline: none;text-decoration: none;" href="<?php echo $imageURL; ?>" data-fancybox="group" data-caption="<?php echo $row["text_data"]; ?>" >
                <img src="<?php echo $imageThumbURL; ?>" alt="" />

            </a>
            <input type="checkbox" class="check2" name="check[]" style=" " value="<? echo $row["image_name"]?>"> <?echo '<br>'; echo $row["text_data"];?>
                      </div>
 
           <?
            	

         }

        } ?>
    </div>
    </div>

</div>
 <? include("footer.php"); ?>
<script type="text/javascript">
    $("[data-fancybox]").fancybox({ });



</script>
<style type="text/css">
.gallery img {
    width: 60px;
    height: 60px;
    border-radius: 5px;
    cursor: pointer;
    transition: .3s;
   /* margin-left: 2vw;*/
}
 
#text_title
{
    text-shadow:1px 1px 1px rgba(51,255,105,1);font-weight:normal;color:#0C4FEB;letter-spacing:1pt;word-spacing:-1pt;font-size:13px;text-align:left;font-family:arial, helvetica, sans-serif;line-height;
}

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

</style>

<script type="text/javascript">

      function save(count,id)
      {
         
          // var a= $('#contact_form').serialize();
           
          var numberOfChecked = $('input:checkbox:checked').length;
          if(numberOfChecked>count)
          {
            alert("You Cannot Select more Than "+count+" images");
          }
          else if(numberOfChecked<=0)
          {
            alert("Please Select Atleast 1 image to make changes");
          }
          else
          {
          var checkedVals = $('.check2:checkbox:checked').map(function() {
              return this.value;
          }).get();
            var values= checkedVals.join(",");
    $.ajax({
        url: 'gallery_update.php',
        type: 'POST',
        data: {allVals: values, id: id},
       
        success: function (data) {
            alert("Images Saved Successfully");
            window.location.href="site_attendance_approved.php";
            
        },
       
    });

          }

          
      }
</script>