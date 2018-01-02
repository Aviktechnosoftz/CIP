<?
   include 'connect.php';
   include "header_itp.php";
   //print_r($_POST);
   // exit();
   error_reporting(0);
   $name=$_POST["itp_project_name"];
   $main= $_POST["main_id"];
    $cip_name=$_POST["cip_name"];

    $get_header_detail= $conn->query("Select * from tbl_itp_form_heading_header where main_id='".$main."'")->fetch_object();
    
           
?>

    <link href="css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/bootstrap-multiselect.js" type="text/javascript"></script>

<style type="text/css">
.highlight {
  font-style: italic;
}
    .highlight tr{
     
     border-bottom: : 1px solid black !important;
      }
   .table>tbody>tr>th, .table>thead>tr>th {
    padding-left: 5px;
    padding-right: 5px;
    }  
 

label {
    
    font-weight: 100;
    font-style: italic;
    padding-left: 25px;
}

.h4
{
    color: #95989a;
    font-size: 2.4vh;
    font-weight: 900;
}
.custom-heading {
  text-align: center;background-color: #ccc;font-style: italic;font-weight:100;padding:10px 0;color:#555555;
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
  width: 34.3vw;
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

</head>
<body>
<? include_once('sidebar_itp.php'); ?></div></div>
<div class="main_form_header">
 <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">QUALITY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">Review Checklist</span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
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
    </div>

    <form id="head_data" class="well form-horizontal well_class" style="margin-bottom: 5px !important;">
      <input type="hidden" name="main" value="<?=$main?>">
      <input type="hidden" name="name" value="<?=$name?>">
      <fieldset>
        <div class="row">
          <div class="form-group">
            <div class="col-sm-6">
              <input type="hidden" name="main" value="<?=$main?>">
              <input type="hidden" name="name" value="<?=$name?>">
              <label>TITLE :</label>
              <span><?=$get_header_detail->title?></span>
            </div>
            <div class="col-sm-6">
              <label>Location:</label><input class="form-control form-control-left-radius" type="text" id="location" name="location" readonly value="<?=$get_header_detail->location?>">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="form-group">
            <div class="col-sm-3">
              <strong>Completed by:&nbsp;</strong>
            </div>
            <div class="col-sm-2">
              <strong>Date:</strong>&nbsp;<?= date("d/m/Y");?>
            </div> 
            <div class="col-sm-3">
              <strong>Project Name:</strong>&nbsp;<?=$cip_name;?>
            </div> 
            <div class="col-sm-2">
              <strong>Audited By:</strong>&nbsp;
            </div> 
            <div class="col-sm-2">
              <strong>Date:</strong>&nbsp;<?= date("d/m/Y");?>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="form-group">
            <div class="col-sm-4">
              <label >Trade Contractors Name:</label>&nbsp;
              <span><?= $get_header_detail->trade_name ?></span>
              <label>Key Controls: H - Hold, W - Witness, S - Surveillance,</label>
            </div>
            <div class="col-sm-4">
              <label>Special Information/ Comments:</label>
              <textarea class="form-control form-control-left-radius" readonly cols="40" rows="3"  placeholder="Enter special information  here..." id="special_info" name="special_info" ><?=$get_header_detail->special_info?></textarea>
              <input type="hidden" name="info" id="info">
            </div>
            <div class="col-sm-4">
              <label>Attach Reports, Certificates, NCR’s and QA Documents to ITP.</label>
            </div>
          </div>
        </div>
      </fieldset>
    </form>

    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-12">         
          <table id="heading_table" class="table table-bordered table-responsive" style="font-size: small;">
            <tr>
              <th rowspan="2">No.</th>
              <th rowspan="2">Item</th>
              <th rowspan="2">Acceptance Criteria</th> 
              <th colspan="8" style="text-align: center;background-color: #ccc;"><label>Compliance</label></th>  
            </tr>

            <tr>
              <th>Y</th>
              <th>N</th>
              <th>NA</th>
              <th>Key</th>
              <th>CIP Sign</th>
              <th>CIP Client</th>
              <th>CIP Comments</th>
            </tr>
            <input type="text" name="itp_id" id="itp_id2" value="<?=$main ?>" hidden >

              <?
              $counter=1;
              $heading_detail = $conn->query("select * from tbl_checklist_heading");

              while($row_heading= $heading_detail->fetch_object())
              {

              ?>
            <tr class="highlight">
              <td><?= $row_heading->id ?></td>
              <td colspan="9"><?=$row_heading->title?></td>
            </tr>
             <?        
              $get_sub_header_detail=$conn->query("Select * from tbl_checklist_data_row where  checklist_heading_id= '".$row_heading->id."' AND itp_main_id='".$main."' AND is_deleted=0");
                        


                while($row_sub_detail=$get_sub_header_detail->fetch_object())
                { 
                  $get_ipad_data=$conn->query("select s.uuid
    , s.itp_main_id
    , s.checklist_name,
hp.compliance,hp.comments,hp.acceptance_criteria_Data

FROM tbl_assign_checklist s
INNER JOIN tbl_checklist_data_filled hp
    on s.uuid = hp.assign_checklist_uuid

where hp.row_id='".$row_sub_detail->id."' and s.uuid='".$_POST['u_id']."' ");
                  

           $temp=array();
                  while($row_ipad_data=mysqli_fetch_array($get_ipad_data,MYSQLI_ASSOC))
                  {
                    array_push($temp,$row_ipad_data);
                  }
                    // print_r($temp);
              ?>

             <tr>
               <td><?=$row_heading->id.".".$counter ?></td>
               <td><?=$row_sub_detail->acceptance_criteria?><br>
               <span style="background-color: yellow"> <? if($temp[0][acceptance_criteria_Data] !="") echo $temp[0][acceptance_criteria_Data];
                  else
                    echo $row_sub_detail->acceptance_criteria_input;
                ?></span><br>
                  Uploaded Image:
                  <?               
           
                  $get_images= $conn->query("select * from tbl_checklist_image where row_id='".$row_sub_detail->id."'");

                    while ($row_image= $get_images->fetch_object())
                    {
                  ?>
            
             
              Uploaded Image: <?if($row_image->image_name!="") echo "<a href=/API/Uploads/".$row_image->image_name.">".$row_image->image_name."</a>"; else echo "NA"; 

                  }
                ?>
                </td>
                <td><?if($temp[0][compliance]=='1') echo "Yes"; else echo "NA" ?></td>
                <td><?if($temp[0][compliance]=='2') echo "Yes"; else echo "NA" ?></td>
                <td><?if($temp[0][compliance]=='0') echo "Yes"; else echo "NA" ?></td>
                <td><?=$row_sub_detail->key?></td>
                <td>NA</td>
                <td>NA</td>
                <td>NA</td>
                <td><?if($temp[0][comments]!="") echo $temp[0][comments]; else echo "NA"  ?></td>
              </tr>
               <? 
                  $counter++;
               
                } //sub_heading loop

                    // print_r($temp);
                $counter=1;

                    } //main heading loop

                  ?>
          
          </table><!-- End of table -->
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-12">
          <h4 class="custom-heading">General Comments</h4>
          <textarea class="form-control form-control-left-radius" readonly > </textarea>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-12">
          <h4 class="custom-heading">Site Manager Sign Off</h4>
        </div>      
        <div class="col-sm-4">
          <label>Name</label>
          <input class="form-control form-control-left-radius" type="text" name="" readonly>
        </div>
        <div class="col-sm-4">
          <label>Name</label>
          <input class="form-control form-control-left-radius" type="text" name="" readonly>
        </div>
        <div class="col-sm-4">
          <label>Name</label>
          <input class="form-control form-control-left-radius" type="text" name="" readonly>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-12">
          <h4 class="custom-heading">Site Engineer Sign Off</h4>
        </div>      
        <div class="col-sm-4">
          <label>Name</label>
          <input class="form-control form-control-left-radius" type="text" name="" readonly>
        </div>
        <div class="col-sm-4">
          <label>Name</label>
          <input class="form-control form-control-left-radius" type="text" name="" readonly>
        </div>
        <div class="col-sm-4">
          <label>Name</label>
          <input class="form-control form-control-left-radius" type="text" name="" readonly>
        </div>
      </div>
    </div>

    <div class="row" style="margin-bottom: 20px;">
      <div class="col-sm-12">
        <div class="col-sm-12">
          <h4 class="custom-heading">Client Sign Off</h4>
        </div>      
        <div class="col-sm-4">
          <label>Name</label>
          <input class="form-control form-control-left-radius" type="text" name="" readonly>
        </div>
        <div class="col-sm-4">
          <label>Name</label>
          <input class="form-control form-control-left-radius" type="text" name="" readonly>
        </div>
        <div class="col-sm-4">
          <label>Name</label>
          <input class="form-control form-control-left-radius" type="text" name="" readonly>
        </div>
      </div>
    </div>
    <? include 'itpfooter.php'; ?>
  </div>  
</div>   

        <!-- Modals -->

 
 
   <div class="modal fade" id="modal_add" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #D01616">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: white;">Add Row</h4>
        </div>
        <div class="modal-body">
      
            <table class="table table-striped">
            <thead></thead>
            <form id="test" class="test2">
            <input type="text" name="" id="heading_id" hidden>
            <tbody>
          
              <tr>
                <td>Acceptance Criteria : </td>
                <td>
                  <input type="text" class="form-control form-control-left-radius" id="accept_criteria2" name="accept_criteria2" value="">
                </td>
              </tr>
              <tr>
                <td>Acceptance Criteria Input: </td>
                <td>
                  <input type="text" class="form-control form-control-left-radius" id="accept_criteria_input" name="accept_criteria2" value="" style="background-color: yellow">
                </td>
              </tr>
               <!-- <tr>
                <td>Compliance : </td>
                <td>
                  <input type="radio" id="accept_criteria" name="compliance" value="1" checked>Yes<br>
                   <input type="radio" id="accept_criteria" name="compliance" value="0">No<br>
                    <input type="radio"  id="accept_criteria" name="compliance" value="2">NA<br>
                </td>
              </tr> -->
              <tr>
                <td>Key : </td>
                <td>
                <select class="form-control form-control-left-radius" id="key" name="key" value="" >
                
                  <option value="Hold">Hold</option>
                   <option value="Witness">Witness</option>
                    <option value="Surveillance">Surveillance</option>
                </select>
                 <!--  <input type="text" class="form-control" id="key" name="key" value=""> -->
                </td>
              </tr>
              <!-- <tr>
                <td>CIP Sign : </td>
                <td>
                  <input type="text" class="form-control" id="cip_sign" name="cip_sign" value="">
                </td>
              </tr>
              <tr>
                <td>Client Sign : </td>
                <td>
                  <input type="text" class="form-control"  name="client_sign" id="client_sign" value="">
                </td>
              </tr>
              <tr>
                <td>Comments: </td>
                <td>
                  <input type="text" class="form-control"  name="comments" id="comments" value="">
                </td>
              </tr> -->
              
              <tr>
                <td colspan="2" style="text-align: center;padding-top: 10;">
                  <input type="hidden" id="id" name="id" value="">
                   <input type="hidden" id="index" name="index" value="">
                    <input type="hidden" id="title" name="title" value="">
                
                  <center><input type="button"  style="border-radius: 8px;background: #d82731;border: none;
    color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;"  id="save_heading_rows" name="save_heading_rows" value="Add"></center>
                </td>
              </tr>
            </table>
            </tbody>
      </form>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


   <div class="modal fade" id="modal_edit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #D01616">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: white;">Edit Details</h4>
        </div>
        <div class="modal-body">
      
            <table class="table table-striped">
            <thead></thead>
            <form id="edit" class="edit">
            <input type="text" name="" id="heading_id" hidden>
            <tbody>
          
              <tr>
                <td>Acceptance Criteria : </td>
                <td>
                  <input type="text" class="form-control form-control-left-radius" id="criteria_edit" name="accept_criteria3" value="">
                  <input type="text" name="hidden_row_id" id="hidden_row_id" hidden>
                </td>
              </tr>
              <tr>
                <td>Acceptance Criteria Input: </td>
                <td>
                  <input type="text" class="form-control form-control-left-radius" id="criteria_input_edit" name="accept_criteria2" value="" style="background-color: yellow">
                </td>
              </tr>
               <!-- <tr>
                <td>Compliance : </td>
                <td>
                  <input type="radio" id="accept_criteria" name="compliance" value="1" checked>Yes<br>
                   <input type="radio" id="accept_criteria" name="compliance" value="0">No<br>
                    <input type="radio"  id="accept_criteria" name="compliance" value="2">NA<br>
                </td>
              </tr> -->
              <tr>
                <td>Key : </td>
                <td>
                <select class="form-control form-control-left-radius" id="key2" name="key" value="" >
                
                  <option value="Hold">Hold</option>
                   <option value="Witness">Witness</option>
                    <option value="Surveillance">Surveillance</option>
                </select>
                 <!--  <input type="text" class="form-control" id="key" name="key" value=""> -->
                </td>
              </tr>
              <!-- <tr>
                <td>CIP Sign : </td>
                <td>
                  <input type="text" class="form-control" id="cip_sign" name="cip_sign" value="">
                </td>
              </tr>
              <tr>
                <td>Client Sign : </td>
                <td>
                  <input type="text" class="form-control"  name="client_sign" id="client_sign" value="">
                </td>
              </tr>
              <tr>
                <td>Comments: </td>
                <td>
                  <input type="text" class="form-control"  name="comments" id="comments" value="">
                </td>
              </tr> -->
              
              <tr>
                <td colspan="2" style="text-align: center;padding-top: 10;">
                  <input type="hidden" id="id" name="id" value="">
                   <input type="hidden" id="index" name="index" value="">
                    <input type="hidden" id="title" name="title" value="">
                
                  <center><input type="button"  style="border-radius: 8px;background: #d82731;border: none;
    color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;"  id="edit_sub" name="save_heading_rows" value="Save"></center>
                </td>
              </tr>
            </table>
            </tbody>
      </form>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



  </body>
</html>


<script>
  
  function add_heading_rows(id){ 
        
        
      $("#heading_id").val(id);
    
$("#modal_add").show();
   
     
    }




$(function() { 


     
     

    $("#save_heading_rows").click(function(){
      var criteria= $("#accept_criteria2").val();
      var criteria_input= $("#accept_criteria_input").val();
      var comments= $("#comments").val();
      var key =$("#key").val();
      var cip =$("#cip_sign").val();
      var client= $("#client_sign").val();
      // var compliance= $("#compliance").val();
      var compliance= $("#compliance").val();
      var itp_id= $("#itp_id2").val();
      var heading_id= $("#heading_id").val();

         
            $.ajax({
                 type: "POST",
                 url: "ajax_add_heading.php",
                 data: {criteria: criteria,key:key,criteria_input:criteria_input,itp_id:itp_id,heading_id:heading_id},
                 cache: false,
                 success: function(data){ 
                    alert(data);
                    location.reload();
      
                   
                    
                 }
            });
       
    });


});



function edit_heading_rows(id){ 
  
      
     $.ajax({
       type: "POST",
       url:"ajax_edit_sub.php",
       data:"id="+id,
       success: function(data){
       // alert(data);

      var data_arr = data.split("$$");
      alert(data_arr[10]);
      $("#criteria_edit").val(data_arr[6]);
      $("#hidden_row_id").val(data_arr[1]);
       $("#criteria_input_edit").val(data_arr[8]);
      
     $("#key2").val(data_arr[10]);
      // $("#cip_sign").val();
      //  $("#client_sign").val();
      
      //  $("#compliance").val();
      // $("#itp_id2").val();
      // $("#heading_id").val();
      }
    });
   }


   $("#edit_sub").click(function(){
      
         
            $.ajax({
                 type: "POST",
                 url: "ajax_edit_sub_heading.php",
                 data: $("#edit").serialize(),
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



$(document).on('click','#delete',function(){
var element = $(this);
var del_id = element.attr("data-id");
// alert(del_id);
var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({ 
   type: "POST",
   url: "ajax_delete_sub.php",
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
