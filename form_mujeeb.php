<?
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
     include "header_itp.php";

   //print_r($_POST);
   error_reporting(0);
   $name=$_POST["itp_project_name"];
   $main= $_POST["itp_project"];
    $cip_name=$_POST["cip_name"];
    
           
?>
<head>
   <link href="css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/bootstrap-multiselect.js" type="text/javascript"></script>

    <style type="text/css">
    label {
    padding-left: 25px;
     }
 h4 {
    color: ##666666;
    font-size: 2.4vh;
    font-weight: 900;
}
    .highlight tr{
     
     border-bottom: : 1px solid black !important;
      }
   .table>tbody>tr>th, .table>thead>tr>th {
    padding-left: 5px;
    padding-right: 5px;
    }  
      .cp{
      padding-left: 30px !important;
      padding-right: 30px !important;
     }
     .cname { 
   height: 12.6vh;
 }
     @media only screen and (min-device-width : 768px) and (max-device-width : 1024px)  { 
     .cp{
     /* padding-left: 15px !important;
      padding-right: 15px !important;*/
     }
     .lgo{max-width: 150px;}
     .cname { 
   height: 14.6vh;
 }
   }
   
 input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
input[type="number"] {
    -moz-appearance: textfield;
}

input[type="date"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    display: none;
    margin: 0;
}

.btn_logout_induction {
  background: #dae1e6;
  background-image: -webkit-linear-gradient(top, #dae1e6, #f01818);
  background-image: -moz-linear-gradient(top, #dae1e6, #f01818);
  background-image: -ms-linear-gradient(top, #dae1e6, #f01818);
  background-image: -o-linear-gradient(top, #dae1e6, #f01818);
  background-image: linear-gradient(to bottom, #dae1e6, #f01818);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #2b172b;
  font-size: 18px;
/*  padding: 10px 20px 10px 20px;*/
  text-decoration: none;
}

.btn_logout_induction:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
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


.preview1,.preview2,.preview3,.preview4,.preview5,.preview6,.preview7,.preview8,.preview9,.preview10,.preview11,.preview12,.preview13,.preview14
{
  background-image: url('image/image_upload_2.png');

}
#sign_div
{
  background-image: url('image/Your_Signature.png');
}
.h4
{
color: #95989a;
    font-size: 2.4vh;
    font-weight: 900;
}
.btn-primary
{
  width: 8vw;
  background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;
  border:none;
  outline: none;
}
.btn-info
{
  border-color: none;
  border:none;
}
.dropdown-menu {
  padding-left: 1vh;
  width: 22vw;
}
.open>.dropdown-menu {
font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid rgba(0, 140, 255, 1);
}
.dropdown-menu>li>a {
word-break: break-word;
white-space: normal;
}
.dropdown-menu>li>a:hover {
background-color: rgba(0, 140, 255, 1);
color: #fff;}
    </style>
<script type="text/javascript">
   $(document).ready(function() {     
            $('.multiselect').multiselect({
              maxHeight: 250,
                numberDisplayed: 1
              });      
    });
    $(document).ready(function(){
   $('#ref_docs').on('change',function(){
    //alert('hlo');
   
    if( $(this).val()=="other"){ 
     $("#ref_docs").hide(); 
    $("#otherType").show();
   
    }
    else{
    $("#otherType").hide()
    }
});
 });
</script>
     <script>

function edit_heading_rows(id){ 
         $("#edit_ref_docs").multiselect("refresh");
      $("#id").val(id);
      
     $.ajax({
       type: "POST",
       url:"select_edit.php",
       data:"id="+id,
       success: function(data){
       // alert(data);
        //arr_3=data; 
        var data_arr = data.split("$$$");
        //console.log(data_arr);
        var multi_arr=data_arr.slice(16, data_arr.length);
        //console.log(multi_arr);
        //alert(multi_arr);
        $("#edit_id").val(data_arr[0]);
       $("#edit_activity").val(data_arr[4]);
       $("#edit_ref_docs_input").val(data_arr[5]);
       $("#edit_accept_criteria").val(data_arr[6]);
       $("#edit_key").val(data_arr[7]);
       $("#edit_person").val(data_arr[8]);
       $("#edit_remarks_rec").val(data_arr[9]);
       //$("#edit_is_doc_needed").val(data_arr[10]);
       var idNum= data_arr[10];
       ///alert(idNum);
       if(idNum == '1')
       {
         $('#edit_is_doc_needed').prop('checked',true);
       }
       else
       {
        $('#edit_is_doc_needed').prop('checked',false);
       }
        
      $("#edit_ref_docs option:selected").removeAttr("selected");
       $.each(multi_arr, function(index,value) {
       // alert( index + ": " + value);
          //$("#edit_ref_docs").multiselect("refresh");
          console.log(value.length);
        $("#edit_ref_docs option[value='"+$.trim(value)+"']").attr('selected', true);
        //$("#edit_ref_docs1 option[value='" + value.trim(" ") +"'  ]").attr('selected', true);
         });
       
       $("#edit_ref_docs").multiselect("refresh");

       }
      });
     
    }
    $(function() { //alert('hlo');
     $("#update_heading_rows").click(function(){ 

        if($('#other_ref_hidden').text()=="" && $('#other_check').val() == '1')
        {
          alert("Please Specify Other Document");
          return false;
        }
          $("#id").val(id);

            $.ajax({
                 type: "POST",
                 url: "query_edit.php",
                 data: $("#edit_heading_rows_form").serialize()+"&for='heading_rows'",
                 cache: false,
                 success: function(qry){ 
                   alert(qry);
                  
                    location.reload();
                    
                 }
            });
        
        
      });
   });
  

/*  $(document).ready(function(){ //alert('hlo');
  $('[data-dismiss=modal]').on('click', function () {
     var $t = $(this),
        target =  $t.data("target") || $t.parents('.modal') || [];
    
  $(target)
   .find("input").val('').end() 
   .find("input[type=checkbox]")
       .prop("checked")
       .end();
      
});
});*/
   
 /*$(document).ready(function() { 
   $('[data-dismiss=modal]').on('click', function () {alert('hlo');
  
    $('#activity').val("helo");
    $('#ref_docs').val("");
    $('#ref_docs_input').val("");
    $('#key').val("");
    $('#remarks_rec').val("");
    $('#is_doc_needed').val("");
  });
});
*/
     




function add_heading_rows(index,id,title){ //alert(title); 
        
        $("#title").val(title);
       $("#index").val(index);
      $("#id").val(id);
    
$("#modal_add").show();
   /* $("#dialog_add").dialog({
      modal: true,
      title: title,
      width: 600,
      autoOpen: false,
      draggable: false,
      
      
      
    });
      $('#dialog_add').dialog('open');*/
     
    }

$(function() { 


     
     

    $("#save_heading_rows").click(function(){
      
         
            $.ajax({
                 type: "POST",
                 url: "query_add.php",
                 data: $("#add_heading_rows_form").serialize()+"&for='heading_rows'",
                 cache: false,
                 success: function(data){ 
                   alert(data);
                  
                   
                    //$('#dialog_add').dialog('close');
                    //$("#add_heading").hide();
                    location.reload();
                    
                 }
            });
        //}
    });


});



</script>


<script type="text/javascript">
 /*function changeText2(){
var special_info = document.getElementById('special_info').value;
document.getElementById('boldStuff2').innerHTML = special_info;
var node=document.createElement("LI");
var textnode=document.createTextNode(special_info);
node.appendChild(textnode);
document.getElementById("demo").appendChild(node);
 }*/


 
$(document).ready(function(){
   


    $('#special_info').keyup(function() {
       $("#info").val($(this).val());
    });
});
$(document).ready(function(){
    $("#location").keyup(function(){
     //var comments = this.value;
     //alert($(this).val());
       $("#loc").val($(this).val());
    });
});
$(document).on('click','#submit',function(){
 $.ajax({
   type: "POST",
   url:"query.php",
   data:$("#head_data").serialize(),
   success: function(data){ alert(data);
   
   }
 });
});
 $(document).on('click','#delete',function(){
var element = $(this);
var del_id = element.attr("data-id");
// alert(del_id);
var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({ 
   type: "POST",
   url: "row_heading_delete.php",
   data: info,
   success: function(a){


 }
});
  $(this).parents("tr").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
});

</script>




  </head>
  <body>
<? include "sidebar_itp.php";?> </div>
<div class="main_form_header">
  <div class="col-md-12">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">QUALITY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="project_title">Manage ITP</span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="20%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>

<div class="Main_Form2">
  <div class="col-md-12">
    
      <div class="row">
        <div class="col-sm-12">
          <div class="col-sm-12">
            <div style="border:1px solid;border-color: #9d9d9d;width: 17vw;float:right;" >
                <div style="border-bottom:1px solid;font-size: 1.7vh; "><label>QMS</label></div>
                <div style="border-bottom:1px solid;font-size: 1.7vh; "><label>Doc. Code: C-Q-ITP-0202C</label></div>
                <div style="border-bottom:1px solid;font-size: 1.7vh; "><label>Issue Date: TBC</label></div>
                <div style="font-size: 1.7vh;" ><label>Issue No: 4</label></div>
            </div>
          </div>
        </div>
      </div>  
          
    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-12">
          <h5>Inspection And Test Plan</h5>
          <h5>Project: Auto Upload from Business Register</h5>
        </div>
      </div>
          <?
   //echo "SELECT * FROM tbl_itp_form_heading_header WHERE main_id='$main'";
     $res2=mysqli_query($conn,"SELECT * FROM tbl_itp_form_heading_header WHERE main_id='$main'");
         // echo "SELECT * FROM tbl_itp_form_heading_header WHERE main_id='$main'";
                  
                   $row=mysqli_fetch_array($res2);
                      
                       //echo $row['special_info'];
          ?>
    </div>
            
    <form id="head_data" class="well form-horizontal well_class">
    <fieldset>
      <div class="row">
        <div class="form-group">
          <div class="col-sm-6">
            <input type="hidden" name="main" value="<?=$main?>">
            <input type="hidden" name="name" value="<?=$name?>">
            <label>TITLE :</label>
            <span><?=$row[6]?></span>
          </div>
          <div class="col-sm-6">
            <label>LOCATION:</label>
            <input class="form-control form-control-left-radius" type="text" id="location" name="location" value="<?=$row[2];?>"> 
            <input type="hidden" name="loc" id="loc">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="form-group">
          <div class="col-sm-3">
            <label><strong>Completed by:&nbsp;</strong></label>
          </div>
          <div class="col-sm-2">
            <label><strong>Date:</strong>&nbsp;<?= date("d/m/Y");?></label>
          </div> 
          <div class="col-sm-3">
            <label><strong>Project Name:</strong>&nbsp;<?=$cip_name;?></label>
          </div> 
          <div class="col-sm-2">
            <label><strong>Audited By:</strong>&nbsp;</label>
          </div> 
          <div class="col-sm-2">
            <label><strong>Date:</strong>&nbsp;<?= date("d/m/Y");?></label>
          </div>
        </div>
      </div>
              <?
                $res2="SELECT * FROM `tbl_itp_form_heading_header` WHERE main_id='$main'";
                 $result=mysqli_query($conn,$res2);
                  $row=mysqli_fetch_array($result);
              ?>

      <div class="row">
        <div class="form-group">
          <div class="col-sm-4">
            <label >Trade Contractors Name:</label>&nbsp;
            <select    id="trade_name" name="trade_name" style="height: 34px;display: block;width: 100%;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 20vh;">
                  <?
                   $sql=$conn->query("select *  from tbl_employer");
                       while($ob_2 =$sql->fetch_object())
                        {
                            
                         ?>
                       <option <?=($row[7]==$ob_2->company_name)?'selected':''?> ><?=$ob_2->company_name;?></option>
                         
                         
                          <?}
                        
                  ?> 
               </select>
               <label>Key Controls: H - Hold, W - Witness, S - Surveillance,</label>
          </div>
               <?
                   //echo "SELECT * FROM `tbl_itp_form_heading_header` WHERE main_id='$main'";
                  $res="SELECT * FROM `tbl_itp_form_heading_header` WHERE main_id='$main'";
                  $result=mysqli_query($conn,$res);
                  $row=mysqli_fetch_array($result,MYSQLI_NUM);
                  //print_r($row);
                   /* $req=explode(",", $row);
                      echo $req;*/
                ?> 
          <div class="col-sm-4">
            <label>Special Information/ Comments:</label>
            <textarea class="form-control form-control-left-radius" cols="40" rows="3"  placeholder="Enter special information  here..." id="special_info" name="special_info" ><?=$row[5]?></textarea>
             <input type="hidden" name="info" id="info"> 
          </div>
          <div class="col-sm-4">
            <label>Attach Reports, Certificates, NCR’s and QA Documents to ITP.</label>
            <input type='hidden' name='qry_type' value='add'>
            <div class="col-sm-6 col-sm-offset-3">
              <input type='button'   id="submit" value='Submit' class="btn btn-primary form_submit_button" style="padding-top: 0;padding-bottom: 0;" />
            </div>
          </div>
        </div>
      </div>
    </fieldset>
  </form>

  <div class="row">
    <div class="col-sm-12">
      <div class="col-sm-12">  
        <table id="heading_table" class="table table-bordered table-responsive" style="font-size: small;">
          <tr style="background-color: #ccc;">
            <th>Item No.</th>
            <th>Activity<br> (Including the Necessary Inspections)</label></th>
            <th>Reference Documents <span style="font-weight: normal;">(Specify the required drawing numbers, relevant specifications, procedures, etc.) </span></th>
            <th>Acceptance Criteria </th>
            <th>Key</th>
            <th>Person</th>
            <th>CIP PIN And Date </th>
            <th>Client Sign/ PIN And Date</th>
            <th>Remarks/<br>Records<span style="font-weight: normal;"><br>(E.g. Report/<br> Certificate/<br>Checklist No, NCR No, Testers Name,<br> Test Frequency<br> etc.) </span></th>
          </tr>
          
          <tr>
            <th colspan="9" style="font-weight: bold;">Pre-Compliance Documents</th>
          </tr>
          
                   <?
                     //echo "select * from tbl_from_data_heading ";
                      $qry = "select * from tbl_from_data_heading ";
                     
                      $result1 = mysqli_query($conn,$qry);

                     
                       if(mysqli_num_rows($result1)>0)
                             {
                               while($row=mysqli_fetch_array($result1))
                               {
                                  //print_r($row[1]);
                    
  
                      ?> 
            
          
          <tr class="highlight">
            <td><label><?= $row['index']; ?></label></td>
            <td colspan="8"><label><?=$row['title'];?></label>
                <span style="float: right;">
                  <a style='margin-left: 16vh'  data-toggle="modal" data-target="#modal_add" onclick='add_heading_rows("<?= trim($row['index']); ?>","<?=$row['id'];?>","<?=substr_replace($row['title'],"’s)",strpos($row['title'],"'"))?>")'>

                         <span class="glyphicon glyphicon-plus" id="addrow"></span>
                  </a>

                </span>
            </td>            
          </tr>          
          
            <? 
                 //echo "SELECT *,tbl_from_data_row.id ,tbl_form_data_filled.id as filled_data_id FROM tbl_from_data_row LEFT JOIN tbl_form_data_filled ON   tbl_form_data_filled.row_id = tbl_from_data_row.id Where tbl_from_data_row.data_heading_id ='".$row['id']."' AND tbl_from_data_row.main_id='$main'";
            //echo "SELECT * FROM tbl_from_data_row where main_id='$main' and data_heading_id='".$row['id']."' and is_deleted='0'";
                
               $qry_row = $conn->query("SELECT * FROM tbl_from_data_row where main_id='$main' and data_heading_id='".$row['id']."' and is_deleted='0'");
               
                while ($row_1 = mysqli_fetch_array($qry_row)) {           
           
              ?>
               
          
          <tr>
            <td><?=$row_1['item_no']?></td>
            <td><?=$row_1['activity']?></td>
            <td>
              <div>
                  <?

                      $result = mysqli_query($conn,"SELECT * FROM tbl_ref_doc where row_id='".$row_1['id']."' and is_deleted='0' ");

                         while ($row_2 = mysqli_fetch_array($result)) {
                          echo $row_2['ref_doc']."<br>";
                         }?>
                        <br >
                        <SPAN style="background-color:yellow;"><?=$row_1['ref_doc_input']?></SPAN>
              </div>
            </td>
            <td><?=$row_1['acc_criteria']?></td>
            <td><?=substr($row_1['key'],0,1);?></td>
            <td><div style="word-wrap: break-word; "><?=$row_1['person']?></div></td>
            <td></td>
            <td></td>
            <td><?=$row_1['comments']?><div><a  data-toggle="modal" data-target="#modal_edit" onclick="edit_heading_rows('<?=$row_1['id'];?>')"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
            <a href="#" data-id="<?=$row_1['id'];?>"  id="delete"><span class="glyphicon glyphicon-remove"></span>
        </a></div></td>
          </tr>
     
              <?
              }
              ?>
             
                
                <?}
                }
                 ?>              
          
        </table>
        </div>
      </div>
    </div>  

    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-12">
        <h4 align="left" >Final Sign Off</h4>
        <table class="table table-bordered table-responsive" style="border:1px solid black;" class="table">
          <!-- <thead> -->
          <tr>
            <th colspan="4" style="font-family: Helvetica_Nue;text-align: center;background-color: #ccc;">The personnel below confirm that the ITP form has been satisfactorily completed.</th>
          </tr>

          <tr style=";background-color: #ccc;">
            <th>Position</th>
            <th>Name</th>
            <th>Signature</th>
            <th>Date</th>
          </tr>
      <!-- </thead> -->
          <tbody>
          <tr>
            <td><strong>Project Manager</strong></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>

          <tr>
            <td><strong>Site Manager</strong></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        
         </tbody>
      </table>
      </div>
     </div>
    </div>
    <div class="row"><? include("itpfooter.php"); ?></div>
    </div>
  </div> <!-- end of form_main2 -->


  <!--Add Model --> 

   <div class="modal fade" id="modal_add" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Row</h4>
        </div>
        <div class="modal-body">
         <form id="add_heading_rows_form" class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-5">Activity : </label>
              <div class="col-sm-5">
                <input style="background-color: #eee;" type="text" class="form-control form-control-left-radius" id="activity" name="activity" value="">
                <input type="hidden" name="main" value="<?=$main?>">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-5">Reference Documents   :</label>
              <div class="col-sm-5">  
                <select style="height: 34px;display: block;width: 100%;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 20vh;" class="multiselect" multiple="multiple" id="ref_docs" name="ref_docs[]">

                 <?
                 $qery=$conn->query("SELECT * FROM tbl_ref_docs");

                 while ( $row = $qery->fetch_object()) {
                  ?>

                  <option value="<?=$row->ref_docs_select;?>"><?=$row->ref_docs_select;?></option>

                  <?
                  }
                 ?>
                 <!-- <option value="other">other</option> -->
                 </select>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-5">Reference Documents  Input :</label>
              <div class="col-sm-5">  
                <input  style="background-color: #eee" type="text" class="form-control form-control-left-radius" placeholder="enter documents" id="ref_docs_input" name="ref_docs_input" value="">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-5">Acceptance Criteria :</label>
              <div class="col-sm-5"> 
                  <input style="background-color: #eee;" type="text" class="form-control form-control-left-radius" id="accept_criteria" name="accept_criteria" value="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-5">Key : </label>
              <div class="col-sm-5">
                <select style="height: 34px;display: block;width: 100%;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 20vh;" class="form-control form-control-left-radius" id="key" name="key" value="" >
                
                    <option value="Hold">Hold</option>
                    <option value="Witness">Witness</option>
                    <option value="Surveillance">Surveillance</option>
                </select>
                 <!--  <input type="text" class="form-control" id="key" name="key" value=""> -->
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-5">Person :</label>
              <div class="col-sm-5">
                <input style="background-color: #eee;" type="text" class="form-control form-control-left-radius" id="person" name="person" value="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-5">Remarks/Records : </label>
              <div class="col-sm-5">
                  <input style="background-color: #eee;" type="text" class="form-control form-control-left-radius" id="remarks_rec" name="remarks_rec" value="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-5">Doc Required:</label>
              <div class="col-sm-5">
                <div><input style="background-color: #eee;" type="checkbox" name="is_doc_needed" id="is_doc_needed" value="1">Yes</div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <input type="hidden" id="id" name="id" value="">
                <input type="hidden" id="index" name="index" value="">
                <input type="hidden" id="title" name="title" value="">
                <center><input type="button" style="cursor:pointer; width:8vw; font-size: 1.6vh;background-color:#f47821;color: white;border-radius:10vh;border:none;outline: none;"  id="save_heading_rows" name="save_heading_rows" value="Add"></center>
              </div>
            </div>
           </form>
           
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
     </div>
  </div> <!-- End Add Model -->
 

<div class="modal fade" id="modal_edit" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit </h4>
      </div>
      <div class="modal-body">
        <form id="edit_heading_rows_form" class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-5">Activity : </label>
            <div class="col-sm-5">
              <input type="text" class="form-control form-control-left-radius" id="edit_activity" name="activity" value="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-5">Reference Documents   :</label>
            <div class="col-sm-5">
              <select style="height: 34px;display: block;width: 100%;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #ccc;border-radius: 20vh;" class="multiselect form-control form-control-left-radius" multiple="multiple" id="edit_ref_docs" name="ref_docs[]"  >
  
                <?
                 $qery=$conn->query("SELECT * FROM tbl_ref_docs");
                 while ( $obj = $qery->fetch_object()) {
                     //var_dump($temp);
                  ?>
                 
                 <option value="<?=trim($obj->ref_docs_select);?>"><?=$obj->ref_docs_select;?></option>
                  <?
                  }
                 ?>
                 
                  <!-- <option value="other">other</option> -->
                </select>

                <span style="display: none;" >
                <select   class="multiselect" multiple="multiple" id="edit_ref_docs1"  name="docs[]"  >
  
                <?
                 $qery=$conn->query("SELECT * FROM tbl_ref_docs");
                 while ( $obj = $qery->fetch_object()) {
                     //var_dump($temp);
                  ?>
                 <option value="<?=trim($obj->ref_docs_select);?>"><?=$obj->ref_docs_select;?></option> 
                  
                  <?
                  }
                 ?>
                 
                  <!-- <option value="other">other</option> -->
                 </select>

                 </span>
                 <input type="checkbox" name="other_ref" value="0" id="other_check"> Other

                 <script>
                 $(document).ready (function(){ 
                  $('#other_ref').hide();

                   } );
                   $('#other_check').change(function(){
                    if($(this).prop("checked")) {
                      $('#other_ref').show();
                      $(this).val('1');
                     
                       // $('#other_ref').prop('required',true);
                    } else {
                      $('#other_ref').hide();
                      $(this).val('0');
                      
                      // $('#other_ref').prop('required',false);
                    }
                  });

                    $(function() { 
                    $("#other_ref").keyup(function() {

                      var $this= $(this);

                      window.setTimeout(function() {
                         $("#other_ref_hidden").text($this.val());
                      }, 0);
                  });
                    });

                 </script>
            <div>
              <input class="form-control form-control-left-radius" type="text" id="other_ref" name="other" value="" placeholder="Other Documents">
            </div>              
              <div id="other_ref_hidden" name="other_hidden" style="display: none"></div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5">Reference Documents  Input :</label>
          <div class="col-sm-5">
            <input  style="background-color: yellow" type="text" class="form-control form-control-left-radius" placeholder="enter documents" id="edit_ref_docs_input" name="ref_docs_input" value=" ">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5">Acceptance Criteria :</label>
          <div class="col-sm-5">
            <input style="background-color: #eee;" type="text" class="form-control form-control-left-radius" id="edit_accept_criteria" name="accept_criteria" value="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5">Key : </label>
          <div class="col-sm-5">
            <select style="height: 34px;display: block;width: 100%;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 20vh;"  class="form-control form-control-left-radius" id="edit_key" name="key"  >
              <option value="Hold" <?=($row->key=='Hold')?'selected':''?> >Hold</option>
              <option value="Witness" <?=($row->key=='Witness')?'selected':''?> >Witness</option>
              <option value="Surveillance" <?=($row->key=='Surveillance')?'selected':''?> >Surveillance</option>
            </select>
             <!--  <input type="text" class="form-control" id="key" name="key" value="<?= $row->key;?>"> -->
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5">Person :</label>
          <div class="col-sm-5">
            <input style="background-color: #eee;" type="text" class="form-control form-control-left-radius" id="edit_person" name="person" value="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5">Remarks/Records : </label>
          <div class="col-sm-5">
            <input style="background-color: #eee;" type="text" class="form-control form-control-left-radius" id="edit_remarks_rec" name="remarks_rec" value="">
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-5">Doc Required:</label>
          <div class="col-sm-5">
            <div><input type="checkbox" name="is_doc_needed" id="edit_is_doc_needed" value='1' >Yes</div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
            <input type="hidden" id="edit_id" name="id"  value="">
            <input type='hidden' name='qry_type' value='edit'>
            <center><input style="cursor:pointer; width:8vw; font-size: 1.6vh;background-color:#f47821;color: white;border-radius:10vh;border:none;outline: none;" type="button" id="update_heading_rows" name="update_heading_rows" value="Save"></center>
          </div>
        </div>                             
      </form> 
    </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div> -->
     </div>
  </div>
 </div> <!--End of edit model -->
  </body>
  </html>

