<?
session_start();
error_reporting(0);
include_once('connect.php');
if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}

$get_main_detail=$conn->query("select * from tbl_sm_report_main where project_id='".$_SESSION['admin']."' order by task_number");



$get_action_required_content= $conn->query("select *,tbl_sm_weekly_main.id FROM tbl_sm_weekly_main left join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id and  (tbl_sm_weekly_action.checklist_udid = '".$_SESSION['udid']."'  OR tbl_sm_weekly_action.checklist_udid is null) WHERE  (tbl_sm_weekly_action.action = '2' or (tbl_sm_weekly_action.action = '1'  AND  (tbl_sm_weekly_action.actual_date  != '' AND tbl_sm_weekly_action.actual_date IS NOT NULL)))  order by  tbl_sm_weekly_main.task_number");

$count_action = $conn->query("select count(*) as count,tbl_sm_weekly_main.id FROM tbl_sm_weekly_main left join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id and  (tbl_sm_weekly_action.checklist_udid = '".$_SESSION['udid']."'  OR tbl_sm_weekly_action.checklist_udid is null) WHERE  (tbl_sm_weekly_action.action = '2' or (tbl_sm_weekly_action.action = '1'  AND  (tbl_sm_weekly_action.actual_date  != '' AND tbl_sm_weekly_action.actual_date IS NOT NULL)))  order by  tbl_sm_weekly_main.task_number")->fetch_object();
$act_count= $count_action->count_action_req;

?>
<header>
 <? include('header.php'); ?>
 <? include('test_side_new.php');?>

   <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
       <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
 <link rel="stylesheet" href="css/bootstrap.min.css">
<!--     <script src="js/jquery.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
   
 
   

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">
</header>
<div class="main_form_header_blue">
<div style="height: 75%">
  <div class="col-md-12" style="padding-top: 14px">
  <div class="tab">
  <div class="col-sm-6"><button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Checklist</button>
  </div>
  <div class="col-sm-6"><button class="tablinks pull-right" onclick="openCity(event, 'Paris')">Action Required
  <span class="badge" style="background: red;padding: 4px 7px;font-size: 14px"><?=$count_action->count; ?></span></button></div>
</div>
</div>
</div>
<div style="height: 25%">
<div class="col-sm-12 blue_table_head">
  <div class="col-sm-2"><span class="blue_table_label">No</span></div>
  <div class="col-sm-8 text-center"><span class="blue_table_label">TASK/ COMMENTS</span></div>
  <div class="col-sm-2"><span class="blue_table_label">YES/NO/NA</span></div>
</div>
</div>


</div>



<div class="Main_Form2_blue">
  <div class="col-md-12">
    <form class="well form-horizontal well_class" action=" " method="post"  id="contact_form"  enctype="multipart/form-data" style="border: none;background: #393848;" onsubmit="return terms_check()">
      <fieldset>

      



      <div class="form-group">
        <div class="col-sm-12">
        <div id="London" class="tabcontent" >
          
                   
                   
    

    <?   while($row_main_detail=$get_main_detail->fetch_object()){  ?>
    <table id="mytable" class="table table-bordred " style=" background-color: #333240;
    color: #fff;">
<tbody>
    <tr class="content_tr" id="content_<?=$row_main_detail->id ?>" onclick="flip_action(<?=$row_main_detail->id ?>)">
   
      <td style="text-align: center;"><?=$row_main_detail->task_number ?></td>    
    <td style="text-align: center;"><?=$row_main_detail->task_desc ?>
    <? 
    $get_action_status=$conn->query("select * from tbl_sm_weekly_action where row_id='".$row_main_detail->id."' and checklist_udid = '".$_SESSION['udid']."'")->fetch_object();

    $check_exist_action= $conn->query("select checklist_udid,checklist_main_comments,checklist_action_comments from tbl_sm_weekly_action where checklist_udid='".$_SESSION['udid']."' AND row_id='".$row_main_detail->id."'")->num_rows;
    $temp_comments="";

    ?>
    <? if($check_exist_action <= 0) {  ?>
    <div id="span2" class="t r" style="text-align: center;"><br>
    <?if($row_main_detail->comments!="") {?><span class="glyphicon glyphicon-pencil" ></span>&nbsp<? echo $row_main_detail->comments; $temp_comments= $row_main_detail->comments;?>
    <? }?>
    </div>
   <? } ?> 
  <?if($check_exist_action > 0) { ?>

 <div id="span2" class="t r" style="text-align: center;"><br><span class="glyphicon glyphicon-pencil" ></span>&nbsp<? 

if($get_action_status->action_required != ""){echo $get_action_status->action_required;}


 else if($get_action_status->checklist_action_comments != ""){echo $get_action_status->checklist_action_comments;
  $temp_comments= $get_action_status->checklist_action_comments;} 

 else {echo $row_main_detail->comments; 
        $temp_comments= $row_main_detail->comments;
  }?>
    </div>
  <? } ?>







    </td>
    <td style="text-align: right;vertical-align: middle;"><?if($get_action_status->action == "1") {?> <span  class="glyphicon glyphicon-ok not-selected1" id="gif_ok"></span>   <?}?>
    <?if($get_action_status->action == "2") {?> <span  class="glyphicon glyphicon-remove not-selected2" id="gif_ok"></span>   <?}?>

    <?if($get_action_status->action == "3") {?> <span class="glyphicon glyphicon-plus not-selected3"  id="gif_na" style="color: black">
      <span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px white;color: white
      ">N/A
      </span>
</span>   <?}?>

    </td>
    </tr>


    


     <tr class="action_tr" style="display: none" >
      <div class="action_tr_2" id= "action_<?=$row_main_detail->id?>" style="display: none;">
   <div class="col-sm-4"></div>
   <div class="col-sm-8"> 
    
<div style="text-align:center" class="votes">
<div class="col-sm-1">



<?     if($get_action_status->action =="0"){ ?>
<span class="glyphicon glyphicon-ok glyphicon_gif" id="gif_ok" onclick="update_action('1','<?=$row_main_detail->id?>','<?=$row_main_detail->comments ?>','<?=$get_action_status->checklist_action_comments?>')"></span>
<?}  else if($get_action_status->action =="1") {
  ?>

    <span  class="glyphicon glyphicon-ok not-selected1" id="gif_ok" onclick="update_action('0','<?=$row_main_detail->id?>','<?=$row_main_detail->comments ?>','<?=$get_action_status->checklist_action_comments?>')"></span>

  <?}  else { ?>
  <span class="glyphicon glyphicon-ok glyphicon_gif" id="gif_ok" onclick="update_action('1','<?=$row_main_detail->id?>','<?=$row_main_detail->comments ?>','<?=$get_action_status->checklist_action_comments?>')"></span>
  <? }?>

</div>
<div class="col-sm-1">




<?     if($get_action_status->action =="0"){ ?>
<span id="mod_btn_2" class="glyphicon glyphicon-remove glyphicon_gif" id="gif_remove"  data-toggle="modal" data-target="#myModal2_<?=$row_main_detail->id?>"  data-temp="<?=$temp_comments?>" data-task="<?=$row_main_detail->task_desc ?>"></span>

<?}  else if($get_action_status->action =="2") {
  ?>

   <span id="mod_btn_2" class="glyphicon glyphicon-remove not-selected2" id="gif_remove"  data-toggle="modal" data-target="#myModal2_<?=$row_main_detail->id?>"  data-temp="<?=$temp_comments?>" data-task="<?=$row_main_detail->task_desc ?>"></span>

  <?}  else { ?>
  <span id="mod_btn_2" class="glyphicon glyphicon-remove glyphicon_gif" id="gif_remove"  data-toggle="modal" data-target="#myModal2_<?=$row_main_detail->id?>"  data-temp="<?=$temp_comments?>" data-task="<?=$row_main_detail->task_desc ?>"></span>
  <? }?>


</div>

<div class="col-sm-1">


<?     if($get_action_status->action =="0"){ ?>

<span class="glyphicon glyphicon-plus glyphicon_gif"  id="gif_na" style="color: black" onclick="update_action('3','<?=$row_main_detail->id?>','<?=$row_main_detail->comments ?>','<?=$get_action_status->checklist_action_comments?>')">
      <span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px white;color: white
      ">N/A
      </span>
</span>

<?}  else if($get_action_status->action =="3") {
  ?>

   <span class="glyphicon glyphicon-plus not-selected3"  id="gif_na" style="color: black" onclick="update_action('0','<?=$row_main_detail->id?>','<?=$row_main_detail->comments ?>','<?=$get_action_status->checklist_action_comments?>')">
      <span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px white;color: white
      ">N/A
      </span>
</span>

  <?}  else { ?>
  <span class="glyphicon glyphicon-plus glyphicon_gif"  id="gif_na" style="color: black" onclick="update_action('3','<?=$row_main_detail->id?>','<?=$row_main_detail->comments ?>','<?=$get_action_status->checklist_action_comments?>')">
      <span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px white;color: white
      ">N/A
      </span>
</span>
  <? }?>






</div>








<?if(($check_exist_action > 0) AND ($get_action_status->action != "0")){ ?>
<div class="col-sm-1"><span id="mod_btn" class="glyphicon glyphicon-edit glyphicon_gif" id="gif_edit" data-toggle="modal" data-target="#myModal_<?=$row_main_detail->id?>" data-current_act="<?=$get_action_status->action ?>" data-userid="<?php echo $row_main_detail->comments ?>" data-userid2=<? 

 if($get_action_status->action_required != "")
         {
          echo "$get_action_status->action_required";
         }


         else if($get_action_status->checklist_action_comments != "") echo "$get_action_status->checklist_action_comments"; 
         else echo "$row_main_detail->comments";?>


 ?>></span></div>
<? }?>

<script type="text/javascript">
  $(document).on("click", "#mod_btn", function () {
    $('#action_comment_modal').css('background-color','white');
     var Id = $(this).data('userid');
      var Id2 = $(this).data('userid2');
      var cur_act= $(this).data('current_act');
      $(".modal-body #main_comment_modal").html(Id);
      $(".modal-body #current_act").val(cur_act);
      $(".modal-footer #action_comment_modal").val(Id2);
    
});
  $(document).on("click", "#mod_btn_2", function () {

     var Id = $(this).data('temp');
     var task_name= $(this).data('task');
$(".modal-body #action_comment_temp").css('color','#CD510A');
      $(".modal-body #action_comment_temp").val(Id);
        $(".modal-body #task_name").val(task_name);
    
    
});

    $(document).on("click", "#mod_btn_3", function () {

     var Id = $(this).data('temp');
     var task_name= $(this).data('task');
$(".modal-body #action_comment_temp2").css('color','#CD510A');
      $(".modal-body #action_comment_temp2").val(Id);
        $(".modal-body #task_name2").val(task_name);
    
    
});


</script>




</div>
  <div class="col-sm-8">
                          <div class="glyphicon_gif_flip">
                            <span class="glyphicon glyphicon-refresh" title="Flip" style="color: #fff" onclick="flip_content(<?=$row_main_detail->id ?>)"></span>
                          </div>
                        </div>
</div>
</div>
</tr>


    <div class="modal fade" id="myModal_<?=$row_main_detail->id ?>" role="dialog">
    <div class="modal-dialog" style="height: 150px">  
      <!-- Modal content-->
      <div class="modal-content" style="border-radius: 25px;">
        <div class="modal-header">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="float: right; border: none;color: #10869D;" onclick="update_action($('#current_act').val(),'<?=$row_main_detail->id?>','<?=$row_main_detail->comments?>',$('#hidden_action_<?=$row_main_detail->id ?>').val())">OK</button>

          <button type="button" class="btn btn-default" data-dismiss="modal" style="border: none;color: #10869D;">Close</button>
          <center style="margin-top: -30px"><h5 class="modal-title"><b>Task</b></h5></center>
        </div>
        <div class="modal-body">
          <p id="main_comment_modal"></p>
          <input type="hidden" name="" id="current_act">
        </div>
        <center style="margin-right: 30px"><b>Comment</b></center>
        <div class="modal-footer" style="height: 100px">
          <!-- <input type="text" placeholder="Comment Here..." style="height: 70px; width: 100% ; border:none; outline: none;word-break: break-word;"> -->
          <textarea id="action_comment_modal" class="action_modal_<?=$row_main_detail->id ?>" placeholder="Comment Here..." rows="4" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important" ></textarea>
          <input type="hidden" name="hidden_action" id="hidden_action_<?=$row_main_detail->id?>" value="<? echo $get_action_status->checklist_action_comments?>">

          <script type="text/javascript">
            $('.action_modal_<?=$row_main_detail->id ?>').bind('keypress keyup blur', function() {
    $('#hidden_action_<?=$row_main_detail->id ?>').val($(this).val());
});
          </script>
        </div>
      </div>
    </div>
  </div>





  


  <div class="modal fade" id="myModal2_<?=$row_main_detail->id ?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="background: #393848 !important;">
        <div class="modal-header" style="border-bottom: none;">
          <button type="button" class="close" data-dismiss="modal" style="color: #C9D5D8">&times;</button>
          
        </div>
        <div class="modal-body">

          <label class="label_blue">Task</label>
         
     <textarea id="task_name"   rows="4" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 20vh;    padding: 6px 12px;" readonly></textarea>

          <div class="" style="margin-top: 10px">
           <label class="label_blue">Action Required</label>
          <input type="text" class="form-control form-control-left-radius" name="" id="action_comment_temp" style="height: 50px;" readonly> 
          </div>
             <div class="" style="margin-top: 10px">
           <label class="label_blue">Resp Person</label>
           
         <select style="height: 34px;display: block;width: 100%;padding-left:20px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 20vh;" id="select_emp_<?=$row_main_detail->id ?>"  name="select_employer" required>
         <? 
          $get_resp_name= $conn->query("select tbl_employee.id,tbl_employee.email_add,tbl_employee.given_name,tbl_employee.surname as name from tbl_employee INNER JOIN tbl_induction_register ON tbl_employee.id=tbl_induction_register.id where ( (tbl_induction_register.inducted_by IS NOT NULL AND tbl_induction_register.inducted_by != '')  AND tbl_induction_register.project_id='".$_SESSION['admin']."' AND tbl_employee.given_name !='Pieter' AND tbl_employee.surname !='Koppen') OR tbl_employee.id = '".$_SESSION['induction']."'  AND tbl_induction_register.is_deleted =' 0'");

         while($row_resp_name=$get_resp_name->fetch_object()){  ?>
              <option value="<?=$row_resp_name->id ?>"><?=$row_resp_name->email_add ?></option>
              <? }?> 
          </select>
          </div>
          <div class="" style="margin-top: 10px">
           <label class="label_blue">Target Date</label>
          <input type="text" class="form-control form-control-left-radius datepicker" name="" id="target_date">
          </div>
            <script>

           $('.datepicker').datepicker({
             minDate: new Date(),
              dateFormat: "yy-mm-dd",
             duration: "fast",
             showAnim: "slide",

             onSelect: function(dateText, inst) { 
       $('.datepicker').val(dateText);
    },
             showOptions: {direction: "down"} 
           });




            </script>

        </div>
        <div class="modal-footer" style="border-top: none;">
          <button type="button" class="btn btn-default"  style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;color: #fff" onclick="update_action_response('2',<?=$row_main_detail->id?>,$('#select_emp_<?=$row_main_detail->id ?>').val(),$('#target_date').val())">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;float: left;color: #fff">Cancel</button>
        </div>
      </div>
    </div>
  </div>


  
</tbody>
        
</table>
    <? } ?>
 
    

    

    
    



        </div>

<div id="Paris" class="tabcontent">
<table id="mytable" class="table table-bordred " style="    background-color: #333240;
    color: #fff;">
<tbody>
  <? while($row_action_required_detail=$get_action_required_content->fetch_object()){ 

      $get_resp_email= $conn->query("select id,email_add from tbl_employee where  id='".$row_action_required_detail->emp_id."'")->fetch_object();
    ?>
    
    <tr class="content_tr" id="mod_btn_3" data-toggle="modal" data-target="#myModal2_action_<?=$row_action_required_detail->id?>"  data-temp="<?if($row_action_required_detail->checklist_action_comments != "") echo $row_action_required_detail->checklist_action_comments; else echo $row_action_required_detail->comments;?>" data-task="<?=$row_action_required_detail->task_desc ?>">
   
      <td style="text-align: center;vertical-align: middle;"><?=$row_action_required_detail->task_number?></td> 
      <td style="text-align: center;"><?=$row_action_required_detail->task_desc?>
         <div id="span2" class="t r" style="text-align: center;"><br>&nbsp<b>Action Required:</b><?if($row_action_required_detail->checklist_action_comments != "") echo $row_action_required_detail->checklist_action_comments; else echo $row_action_required_detail->comments;?><br>&nbsp<b>Action Complete:</b>
         <?=$row_action_required_detail->action_complete; ?><br>&nbsp<b>Resp:</b>
         <?=$get_resp_email->email_add; ?><br>&nbsp<b>Target Date:</b><?=$row_action_required_detail->target_date ?>
        </div>


      </td>    
    <td style="text-align: center;"><span  class="glyphicon glyphicon-remove not-selected2" id="gif_ok"></span></td>

    </tr>


  <div class="modal fade" id="myModal2_action_<?=$row_action_required_detail->id?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="background: #393848 !important;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">

          <label class="label_blue">Task</label>
         
     <textarea id="task_name2"   rows="4" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 20vh;    padding: 6px 12px;" readonly></textarea>

          <div class="" style="margin-top: 10px">
           <label class="label_blue">Action Required</label>
          <input type="text" class="form-control form-control-left-radius" name="" id="action_comment_temp2" style="height: 50px;" readonly> 
          </div>
             <div class="" style="margin-top: 10px">
           <label class="label_blue">Resp Person</label>
           
         <select style="height: 34px;display: block;width: 100%;padding-left:20px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 20vh;" id="select_<?=$row_action_required_detail->id ?>"  name="select_employer" required>
         <? 
          $get_resp_name= $conn->query("select tbl_employee.id,tbl_employee.email_add,tbl_employee.given_name,tbl_employee.surname as name from tbl_employee INNER JOIN tbl_induction_register ON tbl_employee.id=tbl_induction_register.id where ( (tbl_induction_register.inducted_by IS NOT NULL AND tbl_induction_register.inducted_by != '')  AND tbl_induction_register.project_id='".$_SESSION['admin']."' AND tbl_employee.given_name !='Pieter' AND tbl_employee.surname !='Koppen') OR tbl_employee.id = '".$_SESSION['induction']."'  AND tbl_induction_register.is_deleted =' 0'");

         while($row_resp_name=$get_resp_name->fetch_object()){  ?>
              <option value="<?=$row_resp_name->id ?>"<?php if($row_action_required_detail->emp_id==$row_resp_name->id) echo 'selected'; ?>>

                  <?=$row_resp_name->email_add; ?>
              </option>
              <? }?> 
          </select>
          </div>
          <div class="" style="margin-top: 10px">
           <label class="label_blue">Target Date</label>
          <input type="text" class="form-control form-control-left-radius datepicker_<?=$row_action_required_detail->id ?>" name="" id="target_date_<?=$row_action_required_detail->id ?>">
          </div>
            <script>

           $('.datepicker_<?=$row_action_required_detail->id ?>').datepicker({
             minDate: new Date(),
              dateFormat: "yy-mm-dd",
             duration: "fast",
             showAnim: "slide",

             onSelect: function(dateText, inst) { 
       $('.datepicker').val(dateText);
    },
             showOptions: {direction: "down"} 
           });

// 
$('.datepicker_<?=$row_action_required_detail->id ?>').datepicker('setDate',new Date("<?=$row_action_required_detail->target_date?>") );


            </script>

        </div>
        <div class="modal-footer" style="border-top: none;">
          <button type="button" class="btn btn-default"  style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;color: #fff" onclick="update_action_response('2',<?=$row_action_required_detail->id?>,$('#select_<?=$row_action_required_detail->id?>').val(),$('#target_date_<?=$row_action_required_detail->id ?>').val())">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;float: left;color: #fff">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  



     
    

    <? }?>
</tbody>
    </table>

    <div class="col-md-12">
    <? $get_person_details=$conn->query("select id,email_add ,job_title,concat_ws(' ',given_name,surname) as name from tbl_employee where  id='".$_SESSION['induction']."'")->fetch_object(); ?>
      <center><legend style="color: #fff;font-size: 1.2em;border: none;font-weight: bold">Details of person completing this form</legend></center>
          <div class="col-sm-12">
          <center><label class="label_blue">Name</label></center>
          <input type="text" class="form-control form-control-left-radius" value="<?=$get_person_details->name?>" name="" readonly>
          </div>
          <div class="col-sm-12">
          <center><label class="label_blue">Position</label></center>
          <input type="text" class="form-control form-control-left-radius" value="<?=$get_person_details->job_title?>" name="" readonly>
          </div>

    </div>
</div>

</div>
      </div>
      <
      <div class="form-group">
        <label class="col-md-1 control-label"></label>
            <div class="col-md-2">
             
          </div>

          <div class="col-md-5">
              <input type="button" id="submit_later" name="save_later" value="Save" class="btn btn-warning form_submit_button" onclick="save_checklist()">
          </div>
        </div>
      
        

      </fieldset>

  
    </form>
      <div id="margin_set"></div>    
    <? include("footer_new.php"); ?>
  </div>
  <span id="hidden_option" style="display: none;"></span>
</div> 


  

<style>

.glyphicon_gif_flip
  {
    float: right;
    padding: 7px;
    width: 30px;
    height: 30px;
    background-color: #AAAAAA;
    -webkit-text-stroke: 1px #efeeee;
    border-radius: 50%;
  }
	
	h4 {
  text-align: left;
  margin:2vh;
  font-weight: bold;
}

table caption {
	padding: .5em 0;
}

@media screen and (max-width: 767px) {
  table caption {
    border-bottom: 1px solid #ddd;
  }
}

.p {
  text-align: center;
  padding-top: 140px;
  font-size: 14px;
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
h4
{
color: #95989a;
    font-size: 2.4vh;
    font-weight: 900;
}

#search_btn
{
    -webkit-border-radius: 60;
  -moz-border-radius: 60;
  border-radius: 60px;
  font-family: Arial;
  color: white;
  font-size: 12px;
    width: 12vw;
    height: 4vh;

/*  margin-left: 1vw;*/
  background: transparent;
  /*padding: 10px 20px 10px 20px;*/
  border: solid #686868 1px;
  text-decoration: none;
  outline: none;
  font-family: 'Helvetica_Nue_thin';
}


::-webkit-scrollbar {
    width: 7px;
        background: #393848;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
    border-top-left-radius: 0;
     border-bottom-left-radius: 0;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    border-radius: 10px;
    border-top-left-radius: 0;
     border-bottom-left-radius: 0;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    background: #F6F6F6;
}

#attention_btn:hover, #approved_btn:hover, #today_btn:hover

{
  /*background: #212121;*/
  cursor: pointer;
}

#effects:hover
{
  background: #181717;
  cursor: pointer;
}



div.tab {
    overflow: hidden;
    color: #fff;
    /*border: 1px solid #ccc;
    background-color: #f1f1f1;*/
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    color: #3AAE72;
}

/* Create an active/current tablink class */
div.tab button.active {
    /*background-color: #ccc;*/
    border-bottom: 2px solid #FF7B2A;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    /*border: 1px solid #ccc;*/
    border-top: none;
}

.table>tbody>tr>td
{
  border-top: 20px solid #3B3B49 !important;
}

.table>tbody>tr
{
  font-size: 1em;
}

/*.table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
   background-color: #26262d;
   color: #fff;
}*/


</style>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";

    if(cityName == "Paris")
    {
        // $('#margin_set').css('height','40vh');
        // alert($(window).height());
        // alert($('fieldset').height());
        $('#margin_set').height($(window).height() - $('fieldset').height());
    }

    if(cityName == "London")
    {
      $('#margin_set').height('0');
    }
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();


</script>

<script type="text/javascript">
var check=0;
  function flip_action(id)

{
  if(check == '0')
  {
  check=1;
  $('.action_tr_2').hide();
  $('#content_'+id).fadeOut('slow').hide('slow');
  $('#action_'+id).fadeIn('slow').show();
  }
  else
  {
    alert('Select Action for the Previous Task or Close it');
  }
}

function flip_content(id)
{
  check=0;
  $('#content_'+id).fadeIn('slow').show();
  $('#action_'+id).fadeOut('slow').hide('slow');
  // alert('ok');
}
</script>
























<script>
function save_checklist()
{

  $.ajax({
                        type: "POST",
                        url: "ajax_save_checklist.php",
                       
                        
                        success: function(data) {
                      alert(data);
                            if(data=='1')
                            {

                              $.post("logout_udid_sm.php", {}, function(){
                                  alert("Checklist Saved Successfully !!");
                                  window.location.href="site_manager_new.php";
                                });
                              
                            }
                            else
                            {
                              alert('Please Select Actions for All Tasks !!');
                            }
                          
                             
                        }
                    });
}

function update_action(act,task_id,main_comment,action_comment)
{

  $.ajax({
                        type: "POST",
                        url: "ajax_update_action.php",
                        data: { action: act,task_id: task_id,main_comment: main_comment, action_comment: action_comment },
                        
                        success: function(data) {
                     
                            if(data=='1')
                            {
                              location.reload();
                            }
                            else
                            {
                              alert('Technical Error !! Try Again Later');
                            }
                          
                             
                        }
                    });
  }



function update_action_response(act,task_id,emp_id,target_date)
{
 
  $.ajax({
                        type: "POST",
                        url: "ajax_update_action_response.php",
                        data: { action: act,task_id: task_id,emp_id: emp_id, target_date: target_date },
                        
                        success: function(data) {
                     
                            if(data=='1')
                            {
                              location.reload();
                            }
                            else
                            {
                              alert('Technical Error !! Try Again Later');
                            }
                          
                             
                        }
                    });
  }

 
</script>
<style>
.not-selected1 {
    background-color:green;
  width: 30px;
    height: 30px;
        -webkit-text-stroke: 2px green;

  border-radius: 50%;
  
    }
.not-selected2 {
    background-color:red;
  width: 30px;
    height: 30px;
      -webkit-text-stroke: 2px red;

    border-radius: 50%;
    }
  .not-selected3 {
    background-color:#D97631;
  width: 30px;
    height: 30px;

    border-radius: 50%;
    }
  .not-selected4 {
    background-color:#6DB4B4;
  width: 30px;
    height: 30px;
      -webkit-text-stroke: 1px #6DB4B4;

    border-radius: 50%;
    }
.glyphicon-ok:before {
    font-size: 20px;
    color: white;
    position: absolute;
    top: 12%;
    right: 20%;
}
.glyphicon-remove:before {
    font-size: 20px;
    color: white;
    position: absolute;
    top: 15%;
    right: 15%;
}
.glyphicon-edit:before {
    font-size: 20px;
    color: white;
    position: absolute;
    top: 15%;
    right: 15%;
}
.glyphicon-plus:before {
    font-size: 20px;
    color: white;
    position: absolute;
    top: 15%;
    right: 15%;
}

.glyphicon_gif{
  width: 30px;
    height: 30px;
    background-color: #AAAAAA;
    -webkit-text-stroke: 1px #AAAAAA;

    border-radius: 50%;
}
.glyphicon_gif2{
  width: 30px;
    height: 30px;
    background-color: #AAAAAA;
    border-radius: 50%;
}
.glyphicon_gif3{
  width: 30px;
    height: 30px;
    background-color: #AAAAAA;
    border-radius: 50%;

}
.glyphicon_gif4{
  width: 30px;
    height: 30px;
    background-color: #AAAAAA;
    border-radius: 50%;
}

.glyphicon-plus:before {
    content: none;

    }
    .glyphicon
    {
      cursor: pointer;
    }
</style>


