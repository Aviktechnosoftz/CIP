<?
session_start();
   include 'connect.php';
  include "header_itp.php";
   //print_r($_POST);
   error_reporting(0);
   $name=$_POST["itp_project_name"];
   $main= $_POST["itp_project"];
    $cip_name=$_POST["cip_name"];
           
?>
    <link href="css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/bootstrap-multiselect.js" type="text/javascript"></script>

    <style type="text/css">
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
  color: ##666666;
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

<script type="text/javascript">
   $(document).ready(function() {     
            $('.multiselect').multiselect({
              maxHeight: 300,
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
        
      $("#id").val(id);
      
     $.ajax({
       type: "POST",
       url:"select_edit.php",
       data:"id="+id,
       success: function(data){
       alert(data);
        //arr_3=data; 
        var data_arr = data.split(",");
        var multi_arr=data_arr.slice(16, data_arr.length);
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
      
       $.each(multi_arr, function(index,value) {
        alert(value);
          //$("#edit_ref_docs").multiselect("refresh");
        $("#edit_ref_docs option[value='" + value + "'  ]").attr('selected', true);
        $("#edit_ref_docs1 option[value='" + value +"'  ]").attr('selected', true);
         });
       
       $("#edit_ref_docs").multiselect("refresh");

       }
      });
     
    }
    $(function() { //alert('hlo');
     $("#update_heading_rows").click(function(){ 
      
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
alert(del_id);
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
<? include_once('sidebar_itp.php'); ?></div></div>
<div class="main_form_header">
 <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">QUALITY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">Review ITP</span></label>
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
                <?
                   //echo "SELECT * FROM tbl_itp_form_heading_header WHERE main_id='$main'";
                     $res2=mysqli_query($conn,"SELECT * FROM tbl_itp_form_heading_header WHERE main_id='$main'");
          
                    
                     $row=mysqli_fetch_array($res2);
                        
                         //print_r($row) ;
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
            <label>LOCATION:</label><?=$row[2];?> 
            <input type="hidden" name="loc" id="loc">
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
        <?
        $res2="SELECT * FROM `tbl_itp_form_heading_header` WHERE main_id='$main'";
        $result=mysqli_query($conn,$res2);
        $row=mysqli_fetch_array($result);
        ?>
      <div class="row">
        <div class="form-group">
          <div class="col-sm-4">
            <label >Trade Contractors Name:</label>&nbsp;
            <span><?=$row[7];?></span>
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
            <span><?=$row[5]?></span>
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

                                   while($row=mysqli_fetch_array($result1))
                                   {
                        ?>
          <tr class="highlight">
            <td style="font-style: italic;"> <?= $row['index']; ?></td>
            <td style="font-style: italic;" colspan="8"><label><?=$row['title'];?></td>
          </tr>

          <tr>
           <? 
             //echo "SELECT * FROM tbl_from_data_row where main_id='$main' and data_heading_id='".$row['id']."' and is_deleted='0'";
           $qry_row = $conn->query("SELECT * FROM tbl_from_data_row where main_id='$main' and data_heading_id='".$row['id']."' and is_deleted='0'");
           
            while ($row_1 = mysqli_fetch_array($qry_row)) {
         
              ?>
                <td style="font-family: Helvetica_Nue"><?=$row_1['item_no']?></td>
                <td style="font-family: Helvetica_Nue"><?=$row_1['activity']?></td>
                
                <td>
                                  
                          <?
                                $result = mysqli_query($conn,"select * from tbl_ref_doc left join tbl_form_image ON tbl_form_image.ref_doc_id = tbl_ref_doc.id and tbl_form_image.is_deleted = '0' where tbl_ref_doc.row_id ='".$row_1['id']."' and tbl_ref_doc.is_deleted='0'");

                                 while ($row_2 = mysqli_fetch_array($result)) {
                                    
                                     
                                 if($row_2['image_name'] !="" )
                                 {
                                  echo "<a href=/API/Uploads/".$row_2['image_name'].">".$row_2['ref_doc']."</a>"."<br>";
                                                              }
                                                              else
                                                              {
                                                                echo $row_2['ref_doc']."<br>";
                                                              }
                                           
                                   }
                                 ?>

                              
                              <br >
                              <?
                              $res_2=$conn->query("SELECT *,tbl_from_data_row.id ,tbl_form_data_filled.id as filled_data_id FROM tbl_from_data_row LEFT JOIN tbl_form_data_filled ON tbl_form_data_filled.row_id = tbl_from_data_row.id Where tbl_from_data_row.data_heading_id ='".$row['id']."' and tbl_from_data_row.item_no= '".$row_1['item_no']."'  AND tbl_from_data_row.main_id='$main'")->fetch_object();

                              if($res_2->ref_doc_input!='')
                              {
                                ?>
                                <SPAN style="background-color:yellow;"><?=$res_2->ref_doc_data?></SPAN>
                          <?
                              }
                              else
                              {
                                ?>
                                <SPAN style="background-color:yellow;"><?=""?></SPAN>
                              
                              <? }

                              ?>
                              
                              
                          
                </td>
                <td style="width: 12vw"><?=$row_1['acc_criteria']?></td>
                <td><?=substr($row_1['key'],0,1);?></td>
                <td><?=$row_1['person']?></td>
                <td></td>
                <td></td>
               
                <td><?=$row_1['comments']?>&nbsp;<br><span>User Comments:</span> 

                <?
               
                $res_1=$conn->query("SELECT *,tbl_from_data_row.id ,tbl_form_data_filled.id as filled_data_id FROM tbl_from_data_row LEFT JOIN tbl_form_data_filled ON tbl_form_data_filled.row_id = tbl_from_data_row.id Where tbl_from_data_row.data_heading_id ='".$row['id']."' AND tbl_from_data_row.item_no='".$row_1['item_no']."' AND tbl_from_data_row.main_id='$main'");

                // echo "SELECT *,tbl_from_data_row.id ,tbl_form_data_filled.id as filled_data_id FROM tbl_from_data_row LEFT JOIN tbl_form_data_filled ON tbl_form_data_filled.row_id = tbl_from_data_row.id Where tbl_from_data_row.data_heading_id ='".$row['id']."'AND tbl_from_data_row.main_id='$main'";
                while($row_comm=$res_1->fetch_array()){
                //print_r($row_comm);
                ?><?= $row_comm['remark']?>
                    
                    <?
                     }
                    ?>
                </td>

                  </tr>
                  
                 
                  <?
                  }
                  ?>
                 
                    
                    <?
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
            <th colspan="4" style="text-align: center;background-color: #ccc;">The personnel below confirm that the ITP form has been satisfactorily completed.</th>
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
  </body>
</html>
