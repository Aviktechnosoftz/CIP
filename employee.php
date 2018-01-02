<?php
error_reporting(0);
session_start();
include_once('connect.php');
//print_r($_POST);

if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}

if($_POST['del_tech']!=''){
   $data = $conn->query("delete from tbl_employee where id = '".$_POST['del_id']."'"); 
   //$data = $conn->query("delete from tbl_event where category = '".$_POST['del_tech']."'"); 
}
$emp_arr=array();
$id_arr=array();
$get_employer= $conn->query("select company_name,project_id,id from tbl_employer where project_id='".$_SESSION['admin']."' ");
while ($row_employer=$get_employer->fetch_object()) {
  array_push($emp_arr, $row_employer->company_name);
  array_push($id_arr, $row_employer->id);
  $new_arr=array_combine($id_arr,$emp_arr);
}
// if(isset($_POST['review']))
// {
//   $id= $_POST['edit_form'];
//   $check = $conn->query("select * 
// FROM tbl_induction_register
// LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id
// WHERE inducted_by IS NOT NULL AND inducted_by != '' AND tbl_induction_register.id= '".$id."' order by tbl_induction_register.id desc");
//   $rows = $check->num_rows;
// if ($rows == 1) {
//   header("location: http://cipropertyapp.com/site_induction_approved.php?approved_form=$id");

// }

// else
// {
// 
// }
// }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<header>
    <? include_once('header.php') ?>

<? include('test_side_new.php');?>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
</header>
 
 <link rel="stylesheet" href="css/jquery.dataTables.min.css">
<script src="js/jquery.dataTables.min.js"></script>
 
</header>
<div class="main_form_header" style="    height: 34%;">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">Site Induction Register&nbsp;<?// echo $project_name->project_name ?> </span></label>
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

          
                 
            <div class="col-md-4" style="padding-right: 0px;padding-left: 0px" id="contact_btn">
                 <input  href="#myModal" id="openBtn" data-toggle="modal" type="button" class="form_submit_button2" class="button edit_click1" value="Send Contacts" style=""/>


                </div>

                <div class="col-md-8" style="padding-right: 0px;padding-left: 0px" >
                <div class="col-sm-1" >
    <strong>Note:</strong>
     </div>
    <div class="col-sm-11" >
      <img src="image/red.png" height="10px" width="12px" style="margin-bottom: 3px">
     <span style="color: red">Resubmitted Inductions</span>
     <img src="image/green.png" height="10px" width="12px" style="margin-left: 1vw;margin-bottom: 3px">
    <span style="color: green">Approved Inductions</span>
    <img src="image/blue.png" height="10px" width="12px" style="margin-left: 1vw;margin-bottom: 3px">
      <span style="color: blue">Unapproved Inductions</span><br>
    
    </div>
                </div>
        </div>
      


</div>
        </div> 
</div> 
<body>


<div class="Main_Form2" style="top: 50vh;max-height: 43%;
    min-height: 43%;
">

      <div class="well form-horizontal well_class" style="margin-bottom: 0px !important">
      

    <div class="row">
     
    </div>


    <div class="col-md-12" style="padding-right: 0;padding-bottom: 20px;padding-left: 0">
<div class="typewriter col-md-2" style="padding-left: 0;padding-right: 0">
  <label style="padding-left: 0;text-align: center;">Filters</label>
</div>
<style>
  .typewriter label {
  color: black;
  font-size: 1.3em;
  font-family: monospace;
  overflow: hidden; /* Ensures the content is not revealed until the animation */
  border-right: .02em solid #DF5430; /* The typwriter cursor */
  white-space: nowrap; /* Keeps the content on a single line */
  margin: 0 auto; /* Gives that scrolling effect as the typing happens */
  letter-spacing: .15em; /* Adjust as needed */
  animation: 
    typing 3.5s steps(10, end),
    blink-caret .5s step-end infinite;
}

/* The typing effect */
@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

/* The typewriter cursor effect */
@keyframes blink-caret {
  from, to { border-color: transparent }
  50% { border-color: transparent }
}
</style>
          
                
            <div class="col-md-4" style="padding-right: 0px;padding-left: 0px">
             

               <select class="form-control form-control-left-radius" id="country" name="all_trade" style="width:100%;" onchange='filterText()'>
               <option  selected>ALL</option>
                        <!-- Dropdown List Option -->
                  </select >
                  <script>
                  var country= '<?php echo JSON_encode($new_arr);?>';
                  var parsed_json= JSON.parse(country);
                  // console.log(parsed_json);


             
                    var emp_name=[];
                    // console.log(parsed_json);
                   $.each(parsed_json, function(key,value2){

                      emp_name.push(value2);

                    
                   });

                     
                   
                   
                      $("#country").select2({
                        data: emp_name

                      });
                  function filterText()
  {  
    var rex = new RegExp($('#country').val());
    if(rex =="/ALL/"){clearFilter()}else{
      $('.content').hide();
      $('.content').filter(function() {
      return rex.test($(this).text());
      }).show();
  }
  }
  
function clearFilter()
  {
    $('.filterText').val('');
    $('.content').show();
  }

function tab_sort(text)
{
// alert(text);
if(text == 1)
{
$('#scrolling').DataTable().destroy();
var table = $('#scrolling').DataTable( {
  "scrollY": 310,
        "scrollX": true,
        "bPaginate": false,
"bLengthChange": false,
"bFilter": true,
"bInfo": false,
"bAutoWidth": false,
language: {
        search: "_INPUT_",
        searchPlaceholder: "Search..."
    },

 order: [[ 1, 'desc' ]]
    


    } );
}

else
{
  $('#scrolling').DataTable().destroy();
var table = $('#scrolling').DataTable( {
  "scrollY": 310,
        "scrollX": true,
        "bPaginate": false,
"bLengthChange": false,
"bFilter": true,
"bInfo": false,
"bAutoWidth": false,
language: {
        search: "_INPUT_",
        searchPlaceholder: "Search..."
    },

 order: [[ 1, 'asc' ]]
    


    } );
}
 
}



                  </script>
                </div>


            <div class="col-md-4" style="">
              <select class="datewise" id="datewise" name="" style="    background-color: white !important;
    border: 1px solid #aaa;
    border-radius: 4px;;    height: 28px;
    width: 100%;
    " onchange="tab_sort(this.value)">
               <option selected value="1">Newest-Oldest</option>
               <option value="2" >Oldest-Newest</option>
                       
                  </select >   

    </div>
    
          </div>


   
     <table class="display nowrap" id="scrolling" cellspacing="0" width="90%">
            <thead class="cf">

              <tr>
                <th class="numeric">Induction No.</th>

                <th class="">Induction Date</th>
                <th class="">Employer/ Business Name</th>
                <th class="">Trade</th>
                <th class="">Job Title</th>
                <th class="">Given Name</th>
                <th class="">Surname</th>
                <th class="numeric">Contact Number</th>
                <th style="text-align: center;"class="">Email Address</th>
                <th class="numeric">Induction Card Number</th>
                <th class="">Pin Code</th>
               <!--  <th class="" >Review/ Edit</th> -->
                <!-- <th class="">Delete</th> -->
              </tr>
            </thead>
            <tbody>
            <?
             $result = $conn->query("select *,tbl_induction_register.id as in_id,DATE(tbl_induction_register.created_date) as date,tbl_employee.email_add as emp_email 
FROM tbl_induction_register
LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id LEFT JOIN tbl_employer ON tbl_induction_register.empid=tbl_employer.id
where (tbl_induction_register.project_id='".$_SESSION['admin']."') 
order by tbl_induction_register.id desc");

        
           
               
              
              while($row=$result->fetch_object())
                {?>
              <tr  class="content">
              <? if($row->inducted_by!='' AND $row->isapproved=='0') { ?>
                <td style="text-align: center;"><a style="color: green" href="site_induction_approved.php?approved_form=<?=$row->in_id?>"> <?$value= str_pad($row->in_id, 4, '0', STR_PAD_LEFT); echo $value;?></a> </td>
           <? }?>
              <? if($row->inducted_by!='' AND $row->isapproved=='1') {  ?>

                <td style="text-align: center;"><a style="color: red" href="site_induction_resubmitted.php?resubmitted_form=<?=$row->in_id?>"> <?$value= str_pad($row->in_id, 4, '0', STR_PAD_LEFT); echo $value;?></a> </td>
               <? }?>
              <?if ($row->inducted_by=='') {  ?>

                <td style="text-align: center;"><a style="color: blue" href="site_induction_form_unapproved.php?unapproved_form=<?=$row->in_id?>"> <?$value= str_pad($row->in_id, 4, '0', STR_PAD_LEFT); echo $value;?></a> </td>
                  <? }?>
            

               
                <td style="text-align: center;"><?=$row->date?></td>
                <td style="text-align: center;"><?=$row->company_name?></td>
                <td style="text-align: center;"><?=$row->Tread?></td>
                <td style="text-align: center;"><?=$row->job_title?></td>
                <td style="text-align: center;"><?=$row->given_name?></td>
                <td style="text-align: center;"><?=$row->surname?></td>
                <td style="text-align: center;"><?=$row->contact_phone?></td>
                 <td style="text-align: center;"><?=$row->emp_email?></td>
                  <td style="text-align: center;"><?=$row->inductioncard?></td>
                  <td style="text-align: center;"><?=$row->pincode?></td>
            
                  <? } ?>
              </tr>
              <!-- <tr>
                <td data-title="Code">AGO</td>
                <td data-title="Company">ATLAS IRON LIMITED</td>
                <td data-title="Price" class="numeric">$3.17</td>
                <td data-title="Change" class="numeric">-0.02</td>
                <td data-title="Change %" class="numeric">-0.47%</td>
                <td data-title="Open" class="numeric">$3.11</td>
                <td data-title="High" class="numeric">$3.22</td>
                <td data-title="Low" class="numeric">$3.10</td>
                <td data-title="Volume" class="numeric">5,416,303</td>
              </tr> -->
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
                <th>Employee Name</th>
                <th>Employer Name</th>
               
                <th >Phone No.</th>
                <th class="text-right">Contacts To Send</th>
              </tr>
            </thead>

            <tbody>
             <?   $result_contact = $conn->query("select *,tbl_induction_register.id as in_id,tbl_employee.id as emp_id,tbl_employee.email_add as emp_email 
FROM tbl_induction_register
LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id LEFT JOIN tbl_employer ON tbl_induction_register.empid=tbl_employer.id
where (tbl_induction_register.project_id='".$_SESSION['admin']."') 
order by tbl_employee.given_name");
           while($row_contact=$result_contact->fetch_object())
                { ?>
              <tr>
               
                <td><?=$row_contact->given_name." ".$row->surname?></td>
                 <td><?=$row_contact->company_name?></td>
                <td><?=$row_contact->phone_no?></td>
                 <td  class="text-right"> <input type="checkbox" name="" class="contact" value="<?=$row_contact->emp_id ?>"></td>
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
  </div><!---wraper close-->

   

</div><!--container close-->

</body>
</html>
<script>

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
else if($('#access').val().trim()== "")
{
  alert("Please Enter Email ID");
   return false;
}
  else
  {
      var id_send = $('#access').val();
      $.ajax({
            type: "POST",
            url: "ajax_contacts_ind.php",
            data:{ 'data[]': checked_arr,id: id_send },
            success: function(data){
              alert("Contact Details Sent Successfully");
              location.reload();
              // console.log(data);
                }
          });
  }
}




$(document).ready(function() {
    $('#scrolling').DataTable( {
  "scrollY": 310,
        "scrollX": true,
        "bPaginate": false,
        "bLengthChange": false,
"bFilter": true,
"bInfo": false,
language: {
        search: "_INPUT_",
        searchPlaceholder: "Search..."
    },
    
 order: [[ 1, 'desc' ]]

    } );

} );

</script>
<style>
  div.dataTables_wrapper {
        /*width: 69vw;*/
        margin: 0 auto;

        
    }





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
.modal-body{
    height: 250px;
    overflow-y: auto;
}
.dataTables_scrollBody
{
      position: relative;
    overflow-x:scroll !important;
 overflow-y:auto !important;
    width: 100%;
    height: 180px !important;
}
 th {
    
    font-weight: 100 !important;
    /*font-style: italic;*/
    font-family: 'Avenirnextitalic' !important;
    color: #555555;
    font-size: 14px;
   
}
.dataTables_wrapper .dataTables_filter input {
 
    /*border-radius: 20vh !important;
    border:none;
    outline: none;
    border-top-left-radius: 20vh !important;  border-bottom-left-radius: 20vh !important;  
  padding-left: 25px !important;  background-color:rgb(228, 228, 228) !important;*/
  border: 1px solid rgb(170, 170, 170);
    border-radius: 4px;
    height: 27px;
    /*width: 100%;*/
    outline: none;
    background-color: rgb(255, 255, 255);
    color: rgb(0, 0, 0);
    }
    .dataTables_length > label
    {
      padding-left: 0 !important;
    }
    #scrolling_filter
    {
      margin-top: -48px;
    }
table.dataTable.nowrap td {
    white-space: pre-wrap;
}

span.select2-selection.select2-selection--single {
        outline: none;
    }
</style>


<footer>
  <? include("footer.php"); ?>
  <script>
    $('select').css('background-color','#fff');

  </script>
<footer>


 
