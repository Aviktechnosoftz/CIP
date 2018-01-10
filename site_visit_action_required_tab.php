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
   $get_action_required_content= $conn->query("select *,tbl_sm_report_action.row_id,tbl_sm_report_action.id as action_id,tbl_sm_report_task_obs.emp_id as employees_id_task,tbl_sm_report_main.task_number as main_tasknumber,tbl_sm_report_action.emp_id as action_emp,tbl_sm_report_main.task_desc as main_taskdesc  FROM tbl_sm_report_action left join tbl_sm_report_main on (tbl_sm_report_main.id = tbl_sm_report_action.row_id) left join tbl_sm_report_task_obs on (tbl_sm_report_action.row_id=tbl_sm_report_task_obs.id)  WHERE  ((tbl_sm_report_action.action = '2') AND (tbl_sm_report_action.checklist_udid = '".$_SESSION['udid_report']."'  OR tbl_sm_report_action.checklist_udid is null )  )");
while ($row_action_required_detail = $get_action_required_content->fetch_object()) {


      $string_2 = $row_action_required_detail->employees_id_task;
                  $parts_2 = explode(',', $string_2);
                  $d_2 = array();
                  foreach ($parts_2 as $name_2) {
                      $d_2[] = '"' . $name_2 . '"';
                  }

                  $email_add_all_str_2=implode(",", $d_2);

                  $get_emp_task_2=$conn->query("select tbl_employee.id as induction_id, tbl_employee.given_name,tbl_employee.surname as name,tbl_employee.pin,tbl_employee.email_add,CONCAT((GROUP_CONCAT(concat(tbl_employee.given_name,' ',tbl_employee.surname))),' (',tbl_employer.company_name,')') as email_add_all,tbl_induction_register.project_id,tbl_employee.contact_phone,tbl_employee.job_title,tbl_employer.company_name,tbl_employer.tread,tbl_induction_register.empid  as employer_id  FROM tbl_employee JOIN tbl_induction_register ON tbl_employee.id = tbl_induction_register.id JOIN tbl_employer ON tbl_employer.id = tbl_induction_register.empid  WHERE tbl_employee.id IN (".$email_add_all_str_2.") group by tbl_induction_register.project_id")->fetch_object();
    
    $get_resp_email = $conn->query("select id,email_add from tbl_employee where  id='" . $row_action_required_detail->action_emp. "'")->fetch_object();
?>
              <table id="mytable" class="table table-bordred" style=" background-color: #283A50; color: #fff;">
<tbody>

    
    <tr class="content_tr" id="mod_btn_3" data-toggle="modal" data-target="#myModal2_action_<?= $row_action_required_detail->action_id ?>" data-id="<?= $row_action_required_detail->action_id ?>"  data-temp="<?
        echo $row_action_required_detail->action_required;
?>" data-task="<?if($row_action_required_detail->is_task_obs == '1') {echo $row_action_required_detail->task_desc;} else echo $row_action_required_detail->main_taskdesc;  ?>">
   
     
      <td style="padding-left: 5.3%;vertical-align: middle;" class="col-sm-2"><? if($row_action_required_detail->is_task_obs == '1') {echo $row_action_required_detail->task_number;} else echo $row_action_required_detail->main_tasknumber; ?></td> 
      <td style="text-align: left;padding-top: 15px" class="col-sm-8"><p><?if($row_action_required_detail->is_task_obs == '1') {echo $row_action_required_detail->task_desc;} else echo $row_action_required_detail->main_taskdesc;  ?></p>
         <div id="span2" class="t r" style="text-align: left;"><p><b>Action Required : </b><?
    
        echo " ".$row_action_required_detail->action_required;
   
?></p><p> <b> Action Complete : </b>
         <?= " ".$row_action_required_detail->action_complete; ?></p>
        <p> <b>Resp : </b><?=" ". $row_action_required_detail->resp; ?></p>
 <?if($row_action_required_detail->is_task_obs == '1'){ ?> 
        <p> <b>Subcontractor Name : </b><?=" ". $get_emp_task_2->email_add_all; ?></p>
       <? } ?>
        <p><b>Target Date : </b><?= " ".$row_action_required_detail->target_date ?></p> 
        </div>


      </td>    
    <td style="text-align: center;vertical-align: middle;" class="col-sm-2"><span  class="glyphicon glyphicon-remove not-selected2 not-selectedtick2 glyphicontab-remove" id="gif_ok"></span></td>

    </tr>


  <div class="modal fade" id="myModal2_action_<?= $row_action_required_detail->action_id ?>" role="dialog">
    <div class="modal-dialog" style="height: 150px">
      <div class="modal-content" style="border-radius: 25px;background-color: #F5F5F5;text-align: center;">
        <div class="modal-header" style="border-bottom: none;padding: 0px">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:50%;float: right;margin-top: -15px;margin-right: 20px;outline: none;border: none;width: 40px;height: 40px;">&#x2715;</button>
        </div>
        <div class="modal-body" style="padding-bottom: 0px;padding-top: 0px;">

          <label class="label_blue" style="color: rgb(88, 84, 84) !important">Task Observed</label>
         
     <textarea id="task_name2" class="mod_btn_3_modal_background"  rows="4" style="height: 52px; width: 100%;border:none; outline: none; resize: none; border-radius: 1.5vh !important; padding: 6px 12px;color: black;text-align: center;" readonly></textarea>

          <div class="" style="margin-top: 10px">
           <label class="label_blue" style="color: rgb(88, 84, 84) !important">Action Required</label>
          <textarea type="text" class="form-control form-control-left-radius" name="" id="action_comment_temp_<?=$row_action_required_detail->action_id ?>" style="height: 60px;resize:none;text-align: center; border-radius: 1.5vh !important;"></textarea> 
          </div>
             <div class="" style="margin-top: 10px">
           <label class="label_blue" style="color: rgb(88, 84, 84) !important">Resp Person</label>
           
         <select class="mod_btn_3_modal_background" style="height: 34px;display: block;width: 100%;padding-left:20px;font-size: 14px;line-height: 1.42857143;background-image: none;border: 1px solid #eee;border-radius: 3vh;color: black;text-align-last: center;" id="select_<?= $row_action_required_detail->action_id ?>"  name="select_employer" required>
         <?
    $get_resp_name = $conn->query("select tbl_employee.id,tbl_employee.email_add,tbl_employee.given_name,tbl_employee.surname as name from tbl_employee INNER JOIN tbl_induction_register ON tbl_employee.id=tbl_induction_register.id where ( (tbl_induction_register.inducted_by IS NOT NULL AND tbl_induction_register.inducted_by != '')  AND tbl_induction_register.project_id='" . $_SESSION['admin'] . "' AND tbl_employee.given_name !='Pieter' AND tbl_employee.surname !='Koppen') OR tbl_employee.id = '" . $_SESSION['induction'] . "'  AND tbl_induction_register.is_deleted =' 0'");
    
    while ($row_resp_name = $get_resp_name->fetch_object()) {


?>
              <option value="<?= $row_resp_name->id ?>"<?php
        if ($row_action_required_detail->action_emp == $row_resp_name->id)
            echo 'selected';
?>>

                  <?= $row_resp_name->email_add; ?>
              </option>
          <? }?> 
          </select>
          </div>
          <div class="" style="margin-top: 10px">
           <label class="label_blue text-center" style="color: rgb(88, 84, 84) !important;">Target Date</label>
          <input type="text" style="background-color: #fff !important;text-align: center;" class="form-control form-control-left-radius datepicker_<?= $row_action_required_detail->action_id ?>"  name="" id="target_date_<?= $row_action_required_detail->action_id ?>">
          </div>
            <script>

           $('.datepicker_<?= $row_action_required_detail->action_id ?>').datepicker({
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



            </script>

        </div>
        
        <div class="modal-footer" style="border-top: none;">
          <button type="button" class="btn btn-default"  style="background-color:#f47821 ;outline: none;border-radius:6vh;outline: none;border:none;color: #fff;margin-right: 39.5%;width: 17%;height: 25%;" onclick="if($('#target_date_<?= $row_action_required_detail->action_id ?>').val() == ''){alert('Please Select Target Date...');} else{update_action_required_edit('<?= $row_action_required_detail->action_id ?>',$('#select_<?= $row_action_required_detail->action_id ?>').val(),$('#target_date_<?= $row_action_required_detail->action_id ?>').val(),$('#action_comment_temp_<?=$row_action_required_detail->action_id ?>').val())}">Save</button>
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;float: left;color: #fff">Cancel</button> -->
        </div>
      </div>
    </div>
  </div>
  <?}?>
</tbody>
    </table>
    <div class="col-md-12" style="padding-left: 4%;padding-top: 5px">
    <?
$get_person_details = $conn->query("select id,email_add ,job_title,concat_ws(' ',given_name,surname) as name from tbl_employee where  id='" . $_SESSION['induction'] . "'")->fetch_object();
?>      <div class="col-sm-12">
      <label style="color: #fff;font-size:14px;border: none;font-weight: bold;font-family: 'Avenirnext' !important;margin-bottom: 5px;padding-left: 0px;">DETAILS OF PERSON COMPLITING THIS FORM</label></div>
          <div class="col-sm-4">
          <label class="label_blue">Name</label>
          <input type="text" class="form-control form-control-left-radius parisname" value="<?= $get_person_details->name ?>" name="" readonly>
          </div>
          <div class="col-sm-4 ">
          <label class="label_blue">Position</label>
          <input type="text" class="form-control form-control-left-radius parisname" value="<?= $get_person_details->job_title ?>" name="" readonly>
          </div>
           <div class="col-md-4 submitaction" style="margin-top: 5px;width: 15%;float: right;margin-right: 25px;">
              <input type="button" id="submit_later" name="save_later" value="Submit" class="btn btn-warning form_submit_button" style=" height: 37px!important;" onclick="<?if($get_total_main_records->count_main ==$get_total_action_records->count_action){?>save_checklist(1)<?}else{?>save_checklist(0)<?}?>">
          </div>

    </div>