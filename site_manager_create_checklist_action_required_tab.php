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
  
  $get_action_required_content= $conn->query("select *,tbl_sm_weekly_main.id FROM tbl_sm_weekly_main left join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id and  (tbl_sm_weekly_action.checklist_udid = '".$_SESSION['udid']."'  OR tbl_sm_weekly_action.checklist_udid is null) WHERE  (tbl_sm_weekly_action.action = '2' or (tbl_sm_weekly_action.action = '1'  AND  (tbl_sm_weekly_action.actual_date  != '' AND tbl_sm_weekly_action.actual_date IS NOT NULL)))  order by  tbl_sm_weekly_main.task_number");

?>

<table id="mytable" class="table table-bordred " style="background-color: #333240;color: #fff;">
                  <tbody>
                  <?while($row_action_required_detail=$get_action_required_content->fetch_object())
                    { 
                      $get_resp_email= $conn->query("select id,email_add from tbl_employee where  id='".$row_action_required_detail->emp_id."'")->fetch_object();
                  ?>
                    <tr class="content_tr" id="mod_btn_3" data-toggle="modal" data-target="#myModal2_action_<?=$row_action_required_detail->id?>"  data-temp="<? if($row_action_required_detail->action_required != ""){echo $row_action_required_detail->action_required;} else{echo $row_action_required_detail->checklist_action_comments; } ?>" data-task="<?=$row_action_required_detail->task_desc ?>">
                      <td style="vertical-align: middle;padding-left: 30px" class="col-sm-1"><?=$row_action_required_detail->task_number?></td> 
                      <td style="vertical-align: middle;padding-left: 30px"><?=$row_action_required_detail->task_desc?>
                        <div id="span2" class="t r" style="vertical-align: middle;"><br>&nbsp;<b>Action Required:</b>        
                        <?
                          if($row_action_required_detail->action_required != ""){echo $row_action_required_detail->action_required;}
                          else{echo $row_action_required_detail->checklist_action_comments;} 
                        ?>
                        <br>&nbsp;<b>Action Complete:</b>
                        <?=$row_action_required_detail->action_complete; ?><br>&nbsp;<b>Resp:</b>
                        <?=$row_action_required_detail->resp; ?><br>&nbsp;<b>Target Date:</b><?=$row_action_required_detail->target_date ?>
                        </div>
                      </td>    
                      <td style="vertical-align: middle;"><span  class="glyphicon glyphicon-remove not-selected2" id="gif_ok"></span></td>
                    </tr>
                    <div class="modal fade" id="myModal2_action_<?=$row_action_required_detail->id?>" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content" style="background: #393848 !important;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <!-- <h4 class="modal-title">Modal Header</h4> -->
                          </div>
                        <div class="modal-body">
                          <label class="label_blue">Task</label>         
                            <textarea id="task_name2" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 10px;    padding: 6px 12px 6px 25px" readonly></textarea>
                             <div class="" style="margin-top: 10px">
                             <label class="label_blue">Action Required</label>
                            <textarea class="form-control form-control-left-radius" name="" id="action_comment_temp2" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 10px !important;padding: 6px 12px 6px 25px;" readonly> </textarea>
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
          <button type="button" class="btn btn-default"  style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;color: #fff;padding-left: 25px;padding-right: 25px;" onclick="update_action_response('2',$('#action_comment_temp2').val(),<?=$row_action_required_detail->id?>,$('#select_<?=$row_action_required_detail->id?>').val(),$('#target_date_<?=$row_action_required_detail->id ?>').val())">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;float: left;color: #fff;padding-left: 25px;padding-right: 25px;">Cancel</button>
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