<?php
error_reporting(0);
session_start();
// print_r($_SESSION);

include_once('connect.php');
if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}
$get_project_state= $conn->query("Select state_id from tbl_project_detail where project_id='".$_SESSION['admin']."'")->fetch_object();


if($_POST['del_tech']!=''){
  // echo $_POST['del_tech'];
  // echo "update tbl_employer set is_deleted=1,modified_date where id = '".$_POST['del_id']."'";
   $data = $conn->query("update tbl_employer set is_deleted=1,modified_date=NOW() where id = '".$_POST['del_id']."'"); 

   $data2 = $conn->query("update tbl_project_register set is_deleted=1,modified_date=NOW() where employer_id = '".$_POST['del_id']."'"); 
  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">


<header>
    <? include_once('header.php') ?>
     <? include('test_side_new.php');?>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" type="text/css" />
      

</header>

  <script>
/*  $("#add_catgry").click(function(){
   alert('test');
});*/
  function catadd()
{
  //alert('test');
  window.location.href='add_employer.php';
}
  </script>

  <div class="main_form_header" style="    height: 34.5%;">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">Employer Register/ Business Register&nbsp;<?// echo $project_name->project_name ?> </span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div>
   <div class="form-group">
           <div class="col-md-12" style="padding-left: 0px;padding-bottom: 10px;">
                <label class="col-md-12 control-label" style=""><span class="project_title" style="">PROJECT :&nbsp;<? echo $_SESSION['project_name'] ?> </span></label>
            </div>
            <div class="col-md-12" style="padding-right: 0">

          
                  <div class="col-md-6" style="padding-left: 0">

                  <? $check_import=$conn->query("Select *,tbl_employer.id as emp_id from tbl_employer left JOIN tbl_project_detail ON tbl_employer.project_id = tbl_project_detail.project_id where tbl_employer.project_id !='".$_SESSION['admin']."'  and company_name  not  in (SELECT company_name FROM `tbl_employer` left join tbl_project_detail on tbl_employer.project_id = tbl_project_detail.project_id where (tbl_project_detail.state_id <> '".$get_project_state->state_id."' OR  tbl_employer.project_id = '".$_SESSION['admin']."')  AND tbl_employer.is_deleted='0' ) AND tbl_project_detail.state_id = '".$get_project_state->state_id."' order by tbl_employer.company_name asc" );?>
            <div class="import_section" <? if(mysqli_num_rows($check_import)<=0){echo "style='display:none'";} ?> >
            <div class="col-md-4" style="padding-left: 0">
           
                <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple">
                    <? $get_other_employer=$conn->query("Select *,tbl_employer.id as emp_id from tbl_employer LEFT JOIN tbl_project_detail  ON tbl_employer.project_id = tbl_project_detail.project_id where tbl_employer.project_id !='".$_SESSION['admin']."'  and company_name  not  in (SELECT company_name FROM `tbl_employer` left join tbl_project_detail on tbl_employer.project_id = tbl_project_detail.project_id where ( tbl_project_detail.state_id <> '".$get_project_state->state_id."' OR  tbl_employer.project_id = '".$_SESSION['admin']."' ) AND tbl_employer.is_deleted='0' ) AND tbl_project_detail.state_id = '".$get_project_state->state_id."'  order by tbl_employer.company_name asc");
                      
                      
                        while($row_get_other_employer=$get_other_employer->fetch_object())
                        {
                     ?>
                     <option value="<?=$row_get_other_employer->emp_id ?>"><?=$row_get_other_employer->company_name."&nbsp(".$row_get_other_employer->project_name.")" ?></option>
                      <?} 
                      ?>
                </select>
            </div>
            <div class="col-md-4">
               <input type="button" class="form_submit_button2" class="button edit_click1" value="Import" style="" onclick="import_data()"/>

            </div>
            <div class="col-md-4" id="success" style="display: none">
              <div class="alert alert-success btn-group"  style="padding: 0">
  <strong>Import Done!</strong>
  
</div>
            </div>
            <div class="col-md-4" id="alert" style="display: none">
              <div class="alert alert-danger"  style="padding: 0">
  <strong>Please Select!</strong>
</div>
            </div>
</div>
            <div class="col-md-4" style="padding-right: 0px" id="contact_btn">
                 <input  href="#myModal" id="openBtn" data-toggle="modal" type="button" class="form_submit_button2" class="button edit_click1" value="Send Contacts" style=""/>


                </div>
        </div>
        <div class="col-md-6 " style="padding-right: 0px">
                <div class="col-md-3 pull-right" style="padding-right: 20px;">
                   <input type="button" class="form_submit_button2" class="button edit_click1" value="Add" style="" id='add_employer' onclick="catadd();" />
                </div>
                </div>


</div>
        </div> 
</div> 

<!--  <input type='button' class="btn btn-primary" value='Add New' style="cursor:pointer; width: 6vw; background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none; border:none; outline: none;font-size: 1.8vh;margin-top: 2vh;" id='add_employer' onclick="catadd();"> -->
<body>



<div class="Main_Form2" style="top: 50vh;max-height: 43%;
    min-height: 43%;
">

      <div class="well form-horizontal well_class" >
     
      <table  class="table table-hover" style='border: 1px solid rgba(128, 128, 128, 0.57);'>
          <tr style="background-color: #696969; color: white;">
            
            <th>Employer/ Business</th>
            <th>Trade</th>
            <th>Contact Person</th>
            <th>Phone No.</th>
            <th>Email Address</th>
            <th>Address</th>
            <th style="text-align: center;">Update</th>
            <th style="text-align: center;">Delete</th>
          </tr>

         <tbody style="" id='user'>
              <?//echo "select * from tbl_category"; 
              
              $result = $conn->query("select * from tbl_employer where project_id='".$_SESSION['admin']."' AND is_deleted=0 order by company_name asc ");
              
              while($row=$result->fetch_object())
                {?>
              
              <tr style="background-color: #f5f5f5; font-size: 15px;"> 
              
                <td ><?=$row->company_name?></td>
                <td ><?=$row->Tread?></td>
                <td ><?=$row->contact_person?></td>
                <td ><?=$row->phone_no?></td>
                <td ><?=$row->email_add?></td>
                <td ><?=$row->address?></td>
                <td align="center">
                  <form id="edit_form<?=$row->id?>" method="post" action="edit_employer.php" >
                  <input type="hidden"  name="edit_form" value="<?=$row->id?>" />
                  <input type="submit" class="form_submit_button_edit" class="button edit_click1" value="Edit" style="" /> 
                </form>  
                </td>
                <td>
                  <form id="del<?=$row->id?>" method="post" action="employer.php" >
                     <input type="hidden" name="del_tech" value="<?=$row->id?>" />
                     <input type="hidden" name="del_id" value="<?=$row->id?>" />
                      <input type="button" class="form_submit_button_delete" class="button" value="Delete" style="" onclick='del(<?=$row->id?>)'/>
                  </form>
                
                </td>
                
              </tr>
             <? } ?>
          </tbody> 
      </table>


      <div class="modal fade" id="myModal">
<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
          <h3 class="modal-title">Send Contact Details</h3>
        </div>
        <div class="modal-body">
     <!--  <h5 class="text-center">Hello. Some text here.</h5> -->
          <table class="table table-striped" id="tblGrid">
            <thead id="tblHead">
              <tr>
                <th>Employer Name</th>
                <th>Contact Person</th>
               
                <th >Phone No.</th>
                <th class="text-right">Contacts To Send</th>
              </tr>
            </thead>

            <tbody>
             <?   $result_contact = $conn->query("select * from tbl_employer where project_id='".$_SESSION['admin']."' AND is_deleted=0 order by company_name asc");
           while($row_contact=$result_contact->fetch_object())
                { ?>
              <tr>
               
                <td><?=$row_contact->company_name?></td>
                 <td><?=$row_contact->contact_person?></td>
                <td><?=$row_contact->phone_no?></td>
                 <td  class="text-right"> <input type="checkbox" name="" class="contact" value="<?=$row_contact->id ?>"></td>
              </tr>
              <? }?>
            </tbody>
          </table>
     
          
    </div>

        <div class="modal-footer">
        <div class="form-group">
                  
                  <div class="col-sm-12">
                  <label style="float: left;">Email ID</label>
                      <input class="form-control form-control-left-radius" type="text" name="access" id="access" placeholder="Enter Email to Send the Contact Details" value="" />
                  </div>
              </div>
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default" onclick="send_contact()">Send Contact</button>
        </div>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!--   </div> -->
    
    </center>
  </div><!---wraper close-->

    <? include("footer.php"); ?>

        </div>

</div><!--container close-->

</body>
</html>
<script>


/*function catadd()
{
  alert('test');
 // window.location.href='add_category.php';
}*/
/*function filter(text_data, jo_object) {
  alert(jo_object);
        jo = jo_object.find('tr');

        var data4 = capitalize(text_data.trim());
        var data5 = text_data.toLowerCase().trim();
        var data6 = text_data.toUpperCase().trim();
        var data7 = text_data.trim();

        jo.hide();
        jo.filter(function(i, v) {
            var $t = $(this);

            if (($t.is(":contains('" + data4 + "')")) || ($t.is(":contains('" + data5 + "')")) || ($t.is(":contains('" + data6 + "')")) || ($t.is(":contains('" + data7 + "')"))) {
                return true;
            }

            return false;
        }).show();
    }*/

function del(id){
ysorn = confirm("Are you want to delete Employer ?");
if(ysorn)
$('#del'+id).submit();
}
</script>
 <? //include_once('footer.php') ?>

 <style>
    th {
    
    font-weight: 100;
    font-style: italic;
}

td {
    /*border: 1px solid black;*/
    word-wrap:break-word;
}

table {
border-collapse: collapse;
    table-layout: fixed;
    width:100%
}

.modal-body{
    height: 250px;
    overflow-y: auto;
}
 </style>
<!--  <footer>
  <? //include("footer.php"); ?>
<footer> -->
<script type="text/javascript">
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true,
         numberDisplayed: 0,
        maxHeight: 200


        
    });
});


function import_data()
{

if($("#dates-field2 :selected").length === 0)
{ $("#contact_btn").hide();
  // alert ("Please Select Employer to Import");
  $("#alert").hide().slideDown();

tId=setTimeout(function(){
  $("#contact_btn").show();
  $("#alert").hide();        
}, 1000);
  return false;
}

  var brands = $('#dates-field2 option:selected');

        var selected = [];
        $(brands).each(function(index, brand){
            selected.push([$(this).val()]);
        });
        console.log(selected);


         $.ajax({
                      type: "POST",
                      url: "ajax_other_employer.php",
                      data: {emp_id:selected},
                      // dataType: 'json',

                      success: function(data) {
                           $("#contact_btn").hide();
                           $('#success').show();
                      
                               setTimeout(function(){
                                 window.location.reload(1);
                              }, 2000);
                          }
                         
                      
                      
                    
                       
                  });
}


var checked_arr = [];
// onclick="send_data()"

$('.contact').change(function(e) {

         var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
     
    checked_arr = val;

   
// console.log(checked_arr);
 
}); 

function send_contact()
{
  if(checked_arr.length == "")
  {
    alert("Please Select atleast One Contact");
    return false;
  }
else if($('#access').val()== "")
{
  alert("Please Enter Email ID");
   return false;
}
  else
  {
      var id_send = $('#access').val();
      $.ajax({
            type: "POST",
            url: "ajax_contacts.php",
            data:{ 'data[]': checked_arr,id: id_send },
            success: function(data){
              alert("Contact Details Sent Successfully");
              location.reload();
                }
          });
  }
}
</script>