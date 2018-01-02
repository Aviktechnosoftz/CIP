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

$get_employee= $conn->query("select CONCAT_WS(' ',tbl_employee.given_name,tbl_employee.surname) as emp_name,tbl_employee.id as emp_id,tbl_induction_register.id as ind_id from tbl_employee INNER JOIN tbl_induction_register ON tbl_induction_register.id= tbl_employee.id where tbl_induction_register.project_id='".$_SESSION['admin']."'");
while ($row_employee=$get_employee->fetch_object()) {
  array_push($emp_arr, $row_employee->emp_name);
  array_push($id_arr, $row_employee->emp_id);
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
<div class="main_form_header" style="    height: 34%;">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">QUALITY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">Site Diary Register&nbsp;<?// echo $project_name->project_name ?> </span></label>
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

          
                 
            

                <div class="col-md-12" style="padding-right: 0px;padding-left: 0px" >
                <div class="col-sm-1" style="padding-right: 0px;padding-left: 0px">
    <strong>Note:</strong>
     </div>
    <div class="col-sm-11" >
     
     <img src="image/green.png" height="10px" width="12px" style="margin-left: 1vw;margin-bottom: 3px">
    <span style="color: green">Approved Site Diary</span>
    <img src="image/blue.png" height="10px" width="12px" style="margin-left: 1vw;margin-bottom: 3px">
      <span style="color: blue">Need Attention Site Diary</span><br>
    
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
      

      <div class="col-md-12" style="padding-right: 0;padding-bottom: 20px">

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

 order: [[ 3, 'desc' ]]
    


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

 order: [[ 3, 'asc' ]]
    


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
                <th class="">Site Diary Number</th>
                <th class="">Employee Name</th>
                <th class="">General Comments</th>
                 <th class="">Diary Date</th>
               
              </tr>
            </thead>
            <tbody>
            <?
             $result = $conn->query("select tbl_site_diary.id,tbl_site_diary.project_id,tbl_site_diary.general_comment,tbl_site_diary.diary_date,tbl_site_diary.is_approved,
                CONCAT_WS(' ',tbl_employee.given_name,tbl_employee.surname) as site_manager from tbl_site_diary INNER JOIN tbl_employee ON tbl_employee.id=tbl_site_diary.site_manager_id where tbl_site_diary.project_id='".$_SESSION['admin']."' order by tbl_site_diary.diary_date desc");

        
           
               
              
              while($row=$result->fetch_object())
                {?>
              <tr class="content">
                <? if($row->is_approved==0)
                { ?>
                <td><a style="color: blue" href="site_diary_attention.php?attention_date=<?=$row->diary_date?>"><?$value= str_pad($row->id, 4, '0', STR_PAD_LEFT); echo $value;?></td>
                <? }?>
              <? if($row->is_approved==1) { ?>
<td><a style="color: green" href="site_diary_approved.php?approved_date=<?=$row->diary_date?>"><?$value= str_pad($row->id, 4, '0', STR_PAD_LEFT); echo $value;?></td>

              <? } ?>
                
                <td><?=$row->site_manager?></td>
                <td><?=$row->general_comment?></td>
           
                <td><?=$row->diary_date ?></td>
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
 order: [[ 3, 'desc' ]]
    


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
    overflow-x:hidden !important;
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
    height: 28px;
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


 
