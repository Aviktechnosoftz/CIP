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
 $get_project_state= $conn->query("Select state_id from tbl_project_detail where project_id='".$_SESSION['admin']."' ")->fetch_object();
$main_query=$conn->query("select * from tbl_consultant where is_deleted=0 AND project_id=".$_SESSION['admin']." order by consultant_name asc");

 



if(isset($_POST['edit_itp']))
{
  $main_query=$conn->query("update tbl_consultant set 
                    consultant_name = '".trim(mysqli_real_escape_string($conn,$_POST['name']))."',
                     contact_person = '".trim(mysqli_real_escape_string($conn,$_POST['contact']))."',
                      Tread = '".trim(mysqli_real_escape_string($conn,$_POST['trade']))."',
                       phone_no = '".trim(mysqli_real_escape_string($conn,$_POST['phone']))."',
                        email_add = '".trim(mysqli_real_escape_string($conn,$_POST['email']))."',
                         address = '".trim(mysqli_real_escape_string($conn,$_POST['address']))."',
                         pin = '".trim(mysqli_real_escape_string($conn,$_POST['pin']))."',
                          state_id='".$_POST['state_name_hidden']."',
                    created_date= NOW(),
                    modified_date= NOW()
                    where id = '".$_POST['main_id']."'");
 
                   
  header("location:consultant_register.php");

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>



<head>
<header>
 <? include('header.php'); ?>
 <? include('test_side_new.php') ?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <script src="js/jquery.min.js"></script> -->
   <!--  <script src="js/bootstrap.min.js"></script> -->
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" type="text/css" />
</header>



  <div class="main_form_header" style="    height: 34.5%;">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">Consultant Register&nbsp;<?// echo $project_name->project_name ?> </span></label>
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

                  <? $check_import=$conn->query("Select *,tbl_consultant.id as emp_id from tbl_consultant LEFT JOIN tbl_project_detail ON tbl_consultant.project_id = tbl_project_detail.project_id where tbl_consultant.project_id !='".$_SESSION['admin']."'  and consultant_name  not  in (Select consultant_name from tbl_consultant left join tbl_project_detail on tbl_consultant.project_id = tbl_project_detail.project_id where (tbl_project_detail.project_id ='".$_SESSION['admin']."' OR tbl_project_detail.state_id='".$get_project_state->state_id."') AND tbl_consultant.is_deleted='0') AND tbl_project_detail.state_id = '".$get_project_state->state_id."' order by tbl_consultant.consultant_name asc");?>

              <div class="import_section" <? if(mysqli_num_rows($check_import)<=0){echo "style='display:none'";} ?> >
            <div class="col-md-4" style="padding-left: 0">
           
                <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple">


                    <? $get_other_consultant=$conn->query("Select *,tbl_consultant.id as emp_id from tbl_consultant LEFT JOIN tbl_project_detail ON tbl_consultant.project_id = tbl_project_detail.project_id where tbl_consultant.project_id !='".$_SESSION['admin']."'  and consultant_name  not  in (Select consultant_name from tbl_consultant left join tbl_project_detail on tbl_consultant.project_id = tbl_project_detail.project_id where (tbl_project_detail.project_id ='".$_SESSION['admin']."' OR tbl_project_detail.state_id='".$get_project_state->state_id."') AND tbl_consultant.is_deleted='0') AND tbl_project_detail.state_id = '".$get_project_state->state_id."' order by tbl_consultant.consultant_name asc");
                     
                       
                        while($row_get_other_consultant=$get_other_consultant->fetch_object())
                        {
                     ?>
                     <option value="<?=$row_get_other_consultant->emp_id ?>"><?=$row_get_other_consultant->consultant_name."&nbsp(".$row_get_other_consultant->project_name.")" ?></option>
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
            <div class="col-md-4" style="padding-right: 0px"  id="contact_btn"> 
                 <input  href="#myModal" id="openBtn" data-toggle="modal" type="button" class="form_submit_button2" class="button edit_click1" value="Send Contacts" style=""/>


                </div>
        </div>
        <div class="col-md-6 " style="padding-right: 0px">
                <div class="col-md-3 pull-right" style="padding-right: 20px;">
                 

                   <input type="button" class="form_submit_button2" class="button edit_click1" value="Add" style="" onclick="add()" />
                </div>
                </div>


</div>



        </div> 
</div>


<!-- <div style="text-align: left;float: left;width: 21vh;margin-left: 1vh">  <input type="button" class="btn btn-info" class="button edit_click1" value="Add New Consultant" style="cursor:pointer;font-weight: 100;background-color: #f47821;  color: white;  outline: none;  border:none;border-radius:10vh;margin-top: 2vh;    font-size: 1.8vh; " onclick="add()" /></div> -->
<body onbeforeunload=”HandleBackFunctionality()” style="background-color: white">


<div class="Main_Form2" style="top: 50vh;max-height: 43%;
    min-height: 43%;">

      <div class="well form-horizontal well_class" >
 
			
			 <table  class="table table-hover" style= "border: 1px solid rgba(128, 128, 128, 0.57);">
        <tr style="background-color: #696969; color: white">
        <!--     <th>ITP  Number</th> -->
            <th>Consultant Name</th>
            <th >Consultancy Discipline</th>
            <th >Contact Person</th>
            <th >Phone_no</th>
            <th >Email</th>
            <th >Address</th>
            <th style="text-align: left;">Update</th>
            <th style="text-align: left;">Delete</th>

           <!--  <th>Created Date</th> -->
           

        </tr>

         <tbody style="" id='user'>
              <?

              while($row=$main_query->fetch_object())
                {?>
                
              <tr style="background-color: #f5f5f5; font-size: 15px"> 
              
             
                <td><? echo $row->consultant_name ?></td>
                <td><? echo $row->Tread ?></td>
                <td><? echo $row->contact_person ?></td>
                <td><? echo $row->phone_no ?></td>
                <td><? echo $row->email_add ?></td>
                <td><? echo $row->address ?></td>
                  <td>
              
<a data-toggle="modal" data-id="<? echo $row->consultant_name ?>" data-name="<? echo $row->Tread ?>" 

data-contact="<? echo $row->contact_person ?>"
data-phone="<? echo $row->phone_no ?>"
data-email="<? echo $row->email_add ?>"
data-address="<? echo $row->address ?>"
data-main_id="<? echo $row->id ?>"
data-pin="<? echo $row->pin ?>"
data-trade="<? echo $row->Tread ?>"
data-state_name_hidden="<? echo $row->state_id ?>"




data-toggle="modal" title="Add this item" class="open-AddDialog btn btn-primary form_submit_button_edit" href="#myModalNorm"  style="padding:0px">Edit</a>
                </td>
                <td>
                  
                  <a  class="btn btn-primary form_submit_button_delete" data-id="<?=$row->id ?>" id="delete" href="#"  style="padding:0px">Delete</a>
                  
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
                <th>Consultant Name</th>
                <th>Contact Person</th>

                <th >Phone No.</th>
                <th class="text-right">Contacts To Send</th>
              </tr>
            </thead>

            <tbody>
             <?   $result_contact = $conn->query("select * from tbl_consultant where project_id='".$_SESSION['admin']."' AND is_deleted=0 order by tbl_consultant.consultant_name asc");
            
           while($row_contact=$result_contact->fetch_object())
                { ?>
              <tr><td><?=$row_contact->consultant_name?></td>
                <td><?=$row_contact->contact_person?></td>
                
                <td><?=$row_contact->phone_no?></td>
                 <td  class="text-right"> <input type="checkbox" name="" class="contact" value="<?=$row_contact->id ?>"></td>
              </tr>
              <? } ?>

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

   

      </div> <!-- wrapper close -->
     <?  include("footer.php");?>
      </div>  

</div><!--container close-->


<!-- Modal -->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #f5f5f5">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal" style="outline:none">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                   Edit Consultant Details Here
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                 
                <form  name="edit_itp" method="POST">
                <input type="hidden" class="form-control"
                      id="main_id" name="main_id" />
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cosultant Name</label>
                      <input type="text" class="form-control form-control-left-radius"
                      id="Project" name="name" placeholder="Enter Name" required/>
                      <input type="hidden" class="form-control"
                      id="id" name="id2" required />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Consultancy Discipline</label>
                      
                    <input type="text" class="form-control form-control-left-radius"
                      id="trade" name="trade" placeholder="Enter Consultancy Discipline" required/>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Contact Person</label>
                      <input type="text" class="form-control form-control-left-radius"
                      id="contact" name="contact" placeholder="Enter Contact Person" required/>
                      <input type="hidden" class="form-control"
                      id="id3" name="id2" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone_no</label>
                      <input type="text" class="form-control form-control-left-radius"
                      id="phone" name="phone" placeholder="Enter phone_no" required/>
                      <input type="hidden" class="form-control"
                      id="id4" name="id2" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                      <input type="text" class="form-control form-control-left-radius"
                      id="email" name="email" placeholder="Enter Email" required/>
                      <input type="hidden" class="form-control"
                      id="id5" name="id2" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                      <input type="text" class="form-control form-control-left-radius"
                      id="address" name="address" placeholder="Enter Address" required/>
                      <input type="hidden" class="form-control"
                      id="id6" name="id2" />
                  </div>

                  <div class="form-group">
          <label for="exampleInputEmail1">State</label>


          <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
          <input type="text" name="state_name_hidden" id="state_name_hidden" hidden>
          
           
           <select style="height: 34px;display: block;width: 100%;padding-left:20px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 20vh" id="select" onchange ="select2()" name="select_employer" required>
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
                  <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Pin</label>
                      <input type="text" class="form-control"
                      id="pin" name="pin" placeholder="Enter Pin"/>
                      <input type="hidden" class="form-control"
                      id="id6" name="id2" />
                  </div> -->

                  <div class="form-group text-center" >
                 
                  <input type="submit" class="btn btn-primary" name="edit_itp" value="Save Changes" style="width: 8vw;
  background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;
  border:none;
  outline: none;font-size: 1.9vh">

  </div>
                </form>
                
                
           <!--  </div> -->
            
         
            
        </div>
    </div>
</div>

</body>


<script type="text/javascript">
function add()
{
window.location.href="consultant_register_add.php"; 
}

$(document).on("click", ".open-AddDialog", function () {
     var Id = $(this).data('id');
     var Id_trade = $(this).data('name');
     var Id_contact = $(this).data('contact');
     var Id_phone = $(this).data('phone');
     var Id_email = $(this).data('email');
     var Id_address= $(this).data('address');
      var Id_main_id= $(this).data('main_id');
       var Id_pin= $(this).data('pin');
       var Id_trade= $(this).data('trade');
       var state= $(this).data('state_name_hidden');
     $(".modal-body #Project").val(Id);
     $(".modal-body #trade option[value='"+Id_trade+"']").attr('selected','selected');
     // $('.id_100 option[value=val2]').attr('selected','selected');
      $(".modal-body #contact").val(Id_contact);
       $(".modal-body #phone").val(Id_phone);
        $(".modal-body #email").val(Id_email);
        $(".modal-body #address").val(Id_address);
        $(".modal-body #main_id").val(Id_main_id);
        $(".modal-body #pin").val(Id_pin);
          $(".modal-body #trade").val(Id_trade);
          $(".modal-body #state_name_hidden").val(state);
          $(".modal-body #select").val(state);
    $('#myModalNorm').modal('show');
});


$(document).on('click','#delete',function(){
var element = $(this);
var del_id = element.attr("data-id");
var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
   type: "POST",
   url: "consultant_register_delete.php",
   data: info,
   success: function(a){


 }
});
  $(this).parents("tr").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
});


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
{   $("#contact_btn").hide();
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
                      url: "ajax_other_consultant.php",
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
            url: "ajax_contacts_con.php",
            data:{ 'data[]': checked_arr,id: id_send },
            success: function(data){
              alert("Contact Details Sent Successfully");
              location.reload();
                }
          });
  }
}
</script>

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
/*.btn-primary
{
  width: 8vw;
  background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;
  border:none;
  outline: none;
}*/
h4
{
color: #95989a;
    font-size: 2.4vh;
    font-weight: 900;
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


.modal-body{
    height: 250px;
    overflow-y: auto;
}
 </style>