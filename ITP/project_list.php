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



  
$main_query1=$conn->query("select * from tbl_itp_main where deleted='0'");


if(isset($_POST['edit_itp']))
{ 
  // echo "update tbl_itp_main set 
  //                   name = '".trim(mysqli_real_escape_string($conn,$_POST['project_name']))."',
  //                   updated= NOW()
  //                   where id = '".$_POST['id2']."'";
  $main_query=$conn->query("update tbl_itp_main set 
                    name = '".trim(mysqli_real_escape_string($conn,$_POST['project_name']))."',
                    updated= NOW()
                    where id = '".$_POST['id2']."'");
  // echo "update tbl_itp_form_heading_header set 
  //                   title = '".trim(mysqli_real_escape_string($conn,$_POST['project_name']))."',
  //                   updated= NOW()
  //                   where main_id = '".$_POST['id2']."'";
  $main_query2=$conn->query("update tbl_itp_form_heading_header set 
                    title = '".trim(mysqli_real_escape_string($conn,$_POST['project_name']))."',
                    updated= NOW()
                    where main_id = '".$_POST['id2']."'");
  header("location:project_list.php");

}
?>

<? include_once('header_itp.php'); ?>
 <link rel="image icon" type="image/png" sizes="160x160" href="">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />


<!-- 
     <script type="text/javascript" src="jquery/jquery-1.7.2.min.js"></script>
     
<script src="js/jquery-ui/jquery-ui.js" type="text/javascript"></script>
<script src="js/bootstrap-multiselect.js"
    type="text/javascript"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
<link href="css/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css" />

<link href="css/bootstrap-multiselect.css"
    rel="stylesheet" type="text/css" /> -->


    <script type="text/javascript" src="js/jquery.min.js"></script>
<link href="css/bootstrap.min.css"
    rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link href="css/bootstrap-multiselect.css"
    rel="stylesheet" type="text/css" />
<script src="js/bootstrap-multiselect.js"
    type="text/javascript"></script>
<body onbeforeunload=”HandleBackFunctionality()” style="background-color: white">

  <?
$project_name_query=$conn->query("select tbl_project.id as project_id,project_name as name,number from tbl_project_register left join tbl_project on tbl_project_register.project_id = tbl_project.id where tbl_project.id='".$_SESSION['admin']."'  group by project_id");
while ($obj_3=$project_name_query->fetch_object()) {
  //print_r($obj_3);
  ?>
  
<? include 'sidebar_itp.php'; ?></div>

<div class="main_form_header">
 <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">QUALITY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">PROJECT LIST</span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>
<div class="Main_Form_list">

      <div class="well form-horizontal well_class" >
      <div class="form-group">
           <div class="col-md-12" style="padding-left: 0px;padding-bottom: 5px;">
                <label class="col-md-12 control-label" style=""><span class="project_title" style="">PROJECT :&nbsp;<? echo $_SESSION['project_name'] ?> </span></label>
            </div>
      <!-- <div class="row" style="border-bottom: 1px solid #333;border-left: 1px solid #333;border-right: 1px solid #333;"> -->

       <div class="col-md-12" style="padding-right: 0">

          
                  <div class="col-md-3" style="padding-left: 0">

       <input type="button" class="button edit_click1 form_submit_button2" value="Add New ITP Project" style="" onclick="add()" />
       </div>
         
              </div>
        </div>
      
          <table  class="table " style= "border: 1px solid rgba(128, 128, 128, 0.57);">
       <tr style="background-color: #696969; color: white">
                <th>ITP Name</th>
                <th>ITP Edit</th>
                <th>ITP Delete</th>
                <th>Create ITP</th>
                <th>Create Checklist</th>
                <th>View ITP</th>
                <th>View Checklist</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <?

              while($row=$main_query1->fetch_object())
                {?>
                <td><? echo $row->name ?></td>
                <td>
                  <button data-toggle="modal" data-id="<? echo $row->name ?>" data-name="<? echo $row->id ?>" data-toggle="modal" title="Add this item" class="open-AddDialog form_submit_button_edit" href="#myModalNorm" style="">Edit</button>
                </td>
                <td>
                  <button style="" data-id="<?=$row->id ?>" id="delete" href="#" class="form_submit_button_delete">Delete</<button>
                </td>
                <td>
                  <form id="approved_form<?=$row->id?>" method="post" action="form.php" >
                  <input type="hidden"  name="itp_project" value="<?=$row->id?>" />
                  <input type="hidden" name="itp_project_name" value="<?=$row->name?>">
                  <input type="hidden" name="cip_name" value="<?=$obj_3->name?>">
                  <input type="submit" onclick="add_new_itp()"  class="button edit_click1 form_submit_button2" value="Create New ITP" style="" />
                  </form>
                </td>
                <td>
                  <form  method="post" action="checklist.php" >
                   <input type="hidden"  name="itp_project" value="<?=$row->id?>" />
                   <input type="hidden" name="itp_project_name" value="<?=$row->name?>">
                   <input type="hidden" name="cip_name" value="<?=$obj_3->name?>">
                  <input type="submit" style=""  class="button edit_click1 form_submit_button2" value="Create New Checklist"/>
                  </form>
                </td>
                <td>
                  <form  method="post" action="view_itp.php" >
                   <input type="hidden"  name="itp_project" value="<?=$row->id?>" />
                   <input type="hidden" name="itp_project_name" value="<?=$row->name?>">
                   <input type="hidden" name="cip_name" value="<?=$obj_3->name?>">
                  <input type="submit" onclick="view_itp()"  class="button edit_click1 form_submit_button2" value="View ITP" style="" />
                  </form>
                </td>
                <td>
                  <form  method="post" >
                   <input type="hidden"  name="itp_project" value="<?=$row->id?>" />
                   <input type="hidden" name="itp_project_name" value="<?=$row->name?>">
                   <input type="hidden" name="cip_name" value="<?=$obj_3->name?>">
                 

                   <a style=''  data-toggle="modal" data-target="#modal_view" onclick='view_checklist("<?=$row->id?>")'>
 <input type="button" class="button edit_click1 form_submit_button2" value="View Checklist" style=""  />
                         
                  </a>
                  
                  </form>
                </td>
                
              </tr>
              <? } ?>
               <?}?>
            </tbody>
          </table>
          </div>
          </div>

          
      <!-- </div> -->

    <!-- </div>  -->
  
    
     
        

<!-- </div> --><!--conntainer close-->

    </div><!--End og main form-->


<!-- Modal -->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                   Edit ITP Project Here
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form  name="edit_itp" method="POST">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ITP Project Name</label>
                      <input type="text" class="form-control form-control-left-radius"
                      id="Project" name="project_name" placeholder="Enter Project"/>
                      <input type="hidden" class="form-control"
                      id="id" name="id2" />
                  </div>

                  
                  <input type="submit" class="btn btn-danger form_submit_button" name="edit_itp" value="Save Changes">

                </form>

                
                
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
               
                
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal_view" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                   Select a Checklist Here
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form  name="checklist_view" method="POST" id="checklist_view_form" action="checklist_view.php">
                  <div class="form-group">
                    <label for="exampleInputEmail1">View Checklist</label>
                     <select class="form-control" id="view_list" >
       

                      </select>
                      <input type="text" name="u_id" id="uuid" hidden>
                      <input type="text" name="main_id" id="main_id" hidden>
                  </div>

                  
                  <input type="button" class="btn btn-primary" name="edit_itp" value="View" onclick="view_checklist_form()">
                </form>
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
               
                
            </div>
        </div>
    </div>
</div>

</body>
<footer>
   <? include("../footer.php"); ?>
<footer>
<style type="text/css">
  table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}
th, td {
    border: none;
    text-align: left;
    padding: 8px;
}
.pad {
 padding-left: 1px;
 padding-right: 1px;
}
th {
 font-weight: 100;
    font-style: italic;
}
</style>
<script type="text/javascript">

function add()
{ //alert('hlo');
window.location.href="add_itp_project.php"; 
}

function add_new_itp(){
  window.location.href="form.php"; 
}

function view_itp(){
  window.location.href="view_itp.php"; 
}
$(document).on("click", ".open-AddDialog", function () {
     var Id = $(this).data('id');
     var Id_pr = $(this).data('name');
     $(".modal-body #Project").val(Id);
     $(".modal-body #id").val(Id_pr);
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
   url: "ajax_project_delete.php",
   data: info,
   success: function(a){


 }
});
  $(this).parents("tr").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
});



function view_checklist(id){ 
        $('#view_list').find('option').remove();
        
      $.ajax({
                      type: "POST",
                      url: "get_checklist.php",
                      data: {text1: id},

                      success: function(data) {
                         
                          
                         // alert(data);
                          if(data.length === 2)
                         {
                          $('#view_list').append('<option>No Data Available</option>');
                          
                         }
                          else{
                         var obj = JSON.parse(data);

                        
                         
                         for (i in obj)
                            {
                              // document.write(obj[i].name + "<br />");

                               $('#view_list').append('<option value="'+obj[i].u_id+'">'+obj[i].name+'</option>');
                            }
                             $('#main_id').val(id);
                            }                       
                      
                    }
                        
                          
                          





                  });
    

   
     
    }

function view_checklist_form()
{
  if($("#view_list").val() == "No Data Available")
  {
    alert("No Checklist Available");
    // return false;

  }
  else{
  // alert($('#view_list option:selected').val());
  $('#uuid').val($('#view_list option:selected').val());
  $("#checklist_view_form").submit();

}
}
</script>





</body>


</html>
