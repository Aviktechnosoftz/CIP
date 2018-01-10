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

$emp_arr=array();
$id_arr=array();

$get_employer= $conn->query("select company_name,project_id,id from tbl_employer where project_id='".$_SESSION['admin']."' ");
while ($row_employer=$get_employer->fetch_object()) {
  array_push($emp_arr, $row_employer->company_name);
  array_push($id_arr, $row_employer->id);
  $new_arr=array_combine($id_arr,$emp_arr);
}

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
<div class="main_form_header" style="    height: 29%;">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
         <legend class="main_title">CONTRACTS ADMINISTRATION MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">SITE INSTRUCTION REGISTER&nbsp;<?// echo$project_name->project_name ?> </span></label>
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
           
      


</div>
        </div> 
</div> 
<body>


<div class="Main_Form2" style="    top: 45vh;
    max-height: 50%;
    min-height: 50%;
">

      <div class="well form-horizontal well_class" style="margin-bottom: 0px !important">
      

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
           


   
     <table class="display nowrap tablesorter" id="scrolling" cellspacing="0" width="90%">
            <thead class="cf">

              <tr>
                <th  class="">Sr. No.</th>
                 <th  class="">Email Date</th>
                 <th  class="">Site Instruction No.</th>
                 <th  class="">Date Issued</th>
                 <th  class="">Trade</th>
                <th  class="">Contractor</th>
                <th  class="">Description</th>
                <th class="">Variation Addition</th>
                <th class="">Variation Deletion</th>
                <th class="">Consultant's Instruction Number</th>
                <th class="">Client's Instruction Number</th>
                <th class="">Is this a likely Client Variation Y/N</th>
                <th class="">Comment</th>
                
                
                
              </tr>
            </thead>
            <tbody>
            <?
             $result = $conn->query("select a.id,DATE(a.created_date) as date,a.project_id,a.subject,a.instructions,a.today_date,a.emp_id,a.employee_id,b.company_name,c.given_name,c.surname,c.email_add
from
    tbl_instruction a
        inner join
   tbl_employer b
        on a.emp_id = b.id
        inner join 
    tbl_employee c
        on a.employee_id = c.id where a.is_approved='1' AND a.project_id=".$_SESSION['admin']." order by a.id desc");

        
           
               
              $s_no=1;
              while($row=$result->fetch_object())
                {?>
              <tr class="content">
             
                
                  
               <td><?=$s_no++; ?></td>
               <td><?=$row->date?></td>
                <td><a style="color: blue" href="site_instruction_approved_form.php?approved_form=<?=$row->id?>"> <?$value= str_pad($row->id, 4, '0', STR_PAD_LEFT); echo $value;?></td>
                  <td><?=$row->date?></td>
                
                <td><?=$row->company_name?></td>
                <td><?=$row->given_name." ".$row->surname?></td>
                
                <td><?=$row->subject?></td>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>No</td>
                 <td><?=$row->instructions?></td>
                 
                
            
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
        searchPlaceholder: "Search Here..."
    },


"bAutoWidth": false,
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
    height: 200px !important;
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


 
