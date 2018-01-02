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


// if(@$_POST['del_tech']!=''){
//    $data = $conn->query("delete from tbl_access where name = '".$_POST['del_tech']."'"); 
   
// }

  $result = $conn->query("select tbl_access.name,tbl_access.id from tbl_project_register INNER JOIN tbl_access ON tbl_access.id= tbl_project_register.access_id where project_id='".$_SESSION['admin']."' group by tbl_access.name")->fetch_object();
  $all_access= $conn->query("select * from tbl_access where is_deleted=0");

  
    

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
   <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/sidebar.css">

<header>
 <? include('header.php'); ?>
<? include('test_side_new.php');?>
</header>
<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">Access Authority&nbsp;<?// echo $project_name->project_name ?> </span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>

  <script>

  function catadd()
{
  //alert('test');
  window.location.href='add_category.php';
}

  </script>
 

<body style="background-color: white">
<!-- <div id="container">

       
 <div class= "wrapper" style="border: 1px solid grey;
    float: left;
    position: absolute;
    /* margin: -220px 0 0 -200px; */
    margin-top: -25vh;
    top: 25vh;
    left: 27.2vw;
    width: 76vw;
    background-color: #f5f5f5;
    border-radius: 4px;
    overflow-y: scroll;
    max-height: 100%;"> -->
      
<!--   <div style="margin-top: 2vh;margin-left: 1vh;width: 7vw;float:left;">
     <input type='button' class="btn btn-primary" value='Add New' id='add_catgry' onclick="catadd();" style="font-size: 1.8vh;width: 6vw;background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;
  border:none;
  outline: none;">
  </div>
  <h2 align="center" style="font-size:3vh;text-align:center;line-height:2;color: #DF5430;font-family: Helvetica_Nue;font-weight: 200;margin-top: 1vh">Approved Visitor Induction 
  </h2> -->
  <div class="Main_Form_list">

      <div class="well form-horizontal well_class" >
      <div class="form-group">
           <div class="col-md-12" style="padding-left: 0px;padding-bottom: 5px;">
                <label class="col-md-12 control-label" style=""><span class="project_title" style="">PROJECT :&nbsp;<? echo $_SESSION['project_name'] ?> </span></label>
            </div>
            <div class="col-md-6" style="padding-left: 0px;padding-bottom: 5px;">
                 <label class="col-md-12 control-label" style=""> Assigned Access Authority: <?=$result->name  ?>  &nbsp&nbsp </label>
            </div>
            <div class="col-md-6" style="padding-right: 0">
                <div class="col-md-3 pull-right">
                  <input type="button" name="" class="change form_submit_button3" value="Change" onclick="select2()">
                </div>
                <div class="col-md-3 pull-right">
                  <input type='button' class="form_submit_button2" value='Add' id='add_catgry' onclick="catadd();">
                </div>
          </div>
        </div>  

          <!-- <caption style="text-align: center">Assigned Access Authority: <?=$result->name  ?>  &nbsp&nbsp<input type="button" name="" class="change" value="change" onclick="select2()"></caption> -->

  <table  class="table table-hover" style='width:100% ;border: 1px solid rgba(128, 128, 128, 0.57);'>
          <tr style="background-color: #696969;color: white">
            
            <th>Name</th>
            <th style="text-align: center;"><div class="authority_head" style="display: none;">Select New Authority</div></th>
            <th style="text-align: center;">Update</th>
            <th style="text-align: center;">Delete</th>
          </tr>
      <!--   <caption style="text-align: center">Assigned Access Authority: <?=$result->name  ?>  &nbsp&nbsp<input type="button" name="" class="change" value="change" onclick="select2()"></caption> -->
         <tbody style="" id='user'>
              <?//echo "select * from tbl_category"; 
              
             
              while($row=$all_access->fetch_object())
                {?>
              
              <tr style="background-color: #f5f5f5; font-size: 15px"> 
              
                <td >
                  <?=$row->name?>
                </td>
               <td align="center"><div class="authority_radio" style="display: none">
                  <!-- <form id="update_form<?=$row->id?>" method="post" action="edit_category.php" > -->
                  <input type="hidden"  name="edit_form2" value="<?=$row->id?>" />
                  <input type="radio" class="btn btn-primary radio_change"  name="change_access"
                  onchange="select_radio()" value="<?= $row->id ?>" 
                  <?php echo ($row->id==$result->id)?'checked':'' ?>
                  style="cursor:pointer; width:8vw; font-size: 1.6vh;background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;
  border:none;
  outline: none;"  /> 
                <!-- </form>  -->
                </div>
                </td>
                <td style="text-align: center;">
                  <form id="edit_form<?=$row->id?>" method="post" action="edit_category.php" >
                  <input type="hidden"  name="edit_form" value="<?=$row->id?>" />
                  <input type="submit" class="form_submit_button_edit" class="button edit_click1" value="Edit" style="" /> 
                </form> 

                

                </td>
                
                <td style="text-align: center;">
                <form id="del<?=$row->id?>" method="post" action="category.php" >
                     <input type="hidden" name="del_tech" value="<?=$row->name?>" />
                     <input type="hidden" name="deltech" value="<?=$row->id?>" />
                      <input type="button" class="form_submit_button_delete" class="button" id="delete" value="Delete" style="" onclick='del(<?=$row->id?>)'/>
                  </form> 
                
                </td>
              </tr>
             <? } ?>
          </tbody> 
      </table>
   
        </div>
        
<input type="hidden" name="" id="radio_hidden" value="<?=$result->id ?>">
</div><!--container close-->


</body>
<footer>
  <? include("footer.php"); ?>
<footer>
</html>

<script>

function del(id){
   // $('.form_submit_button_delete').css('background-color','red');
   $.ajax({
                      type: "POST",
                      url: "category_delete.php",
                      data: {text1: id},

                      success: function(data) {
                         
                          
                         alert(data);

                        
                          
                          window.location.href="category.php";
                        





                      }
                  });


}


function select_radio()
{
  var a= $(".radio_change:checked").val();
  $('#radio_hidden').val(a);
}

function select2()
{
  // alert("ok");
  $('.authority_head').toggle();
  $('.authority_radio').toggle();
  $('.form_submit_button3').toggleClass('form_submit_button3_active');
  if($('.change').val() == 'Change')
  {
    $('.change').val('Done');
  }
  else
  {
    $('.change').val('Change');
      var value= $('#radio_hidden').val();
      $.ajax({
                      type: "POST",
                      url: "category_update.php",
                      data: {text1: value},

                      success: function(data) {
                         
                          
                         alert("Details Updated");
                         window.location.href="category.php";
                          

                          





                      }
                  });

  }
  

}
 


</script>
<style>
  .change
  {
    content:'goodbye'; 
  }

</style>
<footer>
  <? include("footer.php"); ?>
<footer>

<style>
td {
    /*border: 1px solid black;*/
    word-wrap:break-word;
}

table {
border-collapse: collapse;
    table-layout: fixed;
    width:100%
}

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


 </style>
