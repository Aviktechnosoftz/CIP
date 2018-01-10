<?
   session_start();
   //error_reporting(0);
  //print_r($_SESSION);die();
  include_once('connect.php');
  if(!isset($_SESSION['admin']))
  {
    header("location:logout.php");
  }
  else
  {
    $user= $_SESSION['admin'];
  }

    $udid_edit_date = $_SESSION['udid_report_get_date'];

    $get_udid_date=$conn->query("Select checklist_udid from tbl_sm_report_filled where date(created)='".$udid_edit_date."'")->fetch_object();
    $udid_edit=$get_udid_date->checklist_udid;

    $get_action_required_content= $conn->query("select *,tbl_sm_report_action.row_id,tbl_sm_report_action.id as main_id,tbl_sm_report_main.task_number as main_tasknumber,tbl_sm_report_action.emp_id as action_emp,tbl_sm_report_main.task_desc as main_taskdesc, tbl_sm_report_task_obs.emp_id as employees_id  FROM tbl_sm_report_action left join tbl_sm_report_main on (tbl_sm_report_main.id = tbl_sm_report_action.row_id) left join tbl_sm_report_task_obs on (tbl_sm_report_action.row_id=tbl_sm_report_task_obs.id)  WHERE  ((tbl_sm_report_action.action = '2') AND (tbl_sm_report_action.checklist_udid = '".$udid_edit."'  OR tbl_sm_report_action.checklist_udid is null )  )");

          while ($row_action_required_detail = $get_action_required_content->fetch_object()) 
          {
            $string = $row_action_required_detail->employees_id;
            echo $string;
            $parts = explode(',', $string);
            $d = array();
            foreach ($parts as $name) 
            {
              $d[] = '"' . $name . '"';
            }

            $email_add_all_str=implode(",", $d);

             $get_emp_task = $conn->query("select tbl_employee.id as induction_id, tbl_employee.given_name,tbl_employee.surname as name,tbl_employee.pin,tbl_employee.email_add,CONCAT((GROUP_CONCAT(concat(tbl_employee.given_name,' ',tbl_employee.surname))),' (',tbl_employer.company_name,')') as email_add_all,tbl_induction_register.project_id,tbl_employee.contact_phone,tbl_employee.job_title,tbl_employer.company_name,tbl_employer.tread,tbl_induction_register.empid  as employer_id  FROM tbl_employee JOIN tbl_induction_register ON tbl_employee.id = tbl_induction_register.id JOIN tbl_employer ON tbl_employer.id = tbl_induction_register.empid  WHERE tbl_employee.id IN (".$email_add_all_str.") group by tbl_induction_register.project_id")->fetch_object();

            $get_resp_email = $conn->query("select id,email_add from tbl_employee where  id='".$row_action_required_detail->action_emp."'")->fetch_object();
        ?>
      <table id="mytable" class="table table-bordred " style="background-color: #283A50; color: #fff;">
      
        <tbody>
       
          <tr class="content_tr" id="mod_btn_3" data-toggle="modal" data-target="#myModal2_action_<?= $row_action_required_detail->main_id ?>"  data-temp="<?echo $row_action_required_detail->action_required;?>" data-task="<?if($row_action_required_detail->is_task_obs == '1') {echo $row_action_required_detail->task_desc;} else echo $row_action_required_detail->main_taskdesc;  ?>">
            <td style="vertical-align: middle;padding-left: 5.3%" class="col-sm-2"><? if($row_action_required_detail->is_task_obs == '1') {echo $row_action_required_detail->task_number;} else echo $row_action_required_detail->main_tasknumber; ?></td> 
            <td style="text-align: left;" class="col-sm-8"><p><?if($row_action_required_detail->is_task_obs == '1') {echo $row_action_required_detail->task_desc;} else echo $row_action_required_detail->main_taskdesc;  ?></p>
              <div id="span2" class="t r" style="text-align: left;">
                <p><b>Action Required : </b><? echo $row_action_required_detail->action_required;?></p>
                <p><b>Action Complete : </b><?= $row_action_required_detail->action_complete; ?></p>
                <p><b>Resp : </b><?= $get_resp_email->email_add; ?></p>
                <?if($row_action_required_detail->is_task_obs == 1){?>
                 <div style="word-break: break-word; padding: 3px 0px 3px 0px"><?="Subcontractor Name : ".$get_emp_task->email_add_all;?></div><?}?>
                <p><b>Target Date : </b><?= $row_action_required_detail->target_date?></p>
              </div>
              <div>
                
              
              </div>
            </td>    
            <td style="text-align: center;vertical-align: middle;" class="col-sm-2"><span  class="glyphicon glyphicon-remove not-selected2 not-selectedtick2  glyphicontab-remove" id="gif_ok"></span></td>
          </tr>
          <div class="modal fade mymodalbottom" id="myModal2_action_<?= $row_action_required_detail->main_id ?>" role="dialog" data-direction='bottom' data-backdrop="static" >
            <div class="modal-dialog" style="height: 150px">
              <div class="modal-content" style="border-radius: 25px;background-color:#F5F5F5;text-align: center;font-size: 12px;">
                <div class="modal-header" style="border-bottom: none;padding: 0px">
                  <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:50%;float: right;margin-top: -15px;margin-right: 20px;outline: none;border: none;width: 40px;height: 40px;">&#x2715;</button>
        </div>
                
                <div class="modal-body" style="padding-bottom: 0px;padding-top: 0px;">
                  <label class="label_blue" style="color:#686868 !important">Task Observed</label>
                  <textarea class="mod_btn_3_modalbackground" id="task_name2"   rows="4" style="height: 47px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 2vh; padding: 6px 12px;text-align: center;" readonly></textarea>
                
                <div class="" style="margin-top: 10px">
                  <label class="label_blue" style="color:#686868 !important">Action Required</label>
                  <div class="" style="padding-top: 0px;">
                  <textarea class="form-control form-control-left-radius " name="" id="action_comment_temp2" 
                  value="" style="height:55px;border-radius: 2vh !important;text-align: center;background-color:#fff !important;resize:none;padding: 6px 12px;padding-top: 10px" readonly><? echo $row_action_required_detail->action_required;?></textarea> </div>
                </div>

                <div class="" style="margin-top: 10px">
                  <label class="label_blue" style="color:#686868 !important">Action Complete</label>
                  <textarea type="text" class="form-control form-control-left-radius actioncomplete_pink" name="" id="action_complete_<?= $row_action_required_detail->main_id ?>" style="height: 55px;border-radius: 2vh !important;text-align: center;resize: none;"></textarea> 
                </div>
                <script >
                 
                </script>
                <div class="" style="margin-top: 10px">
                  <label class="label_blue" style="color:#686868 !important">Resp Person</label>  
                  <input type="text" class="form-control form-control-left-radius " name="" id="respPser" value="<?= $get_resp_email->email_add; ?>" style="height: 45px;text-align: center;" readonly>
                </div>
                <div class="" style="margin-top: 10px">
                  <label class="label_blue" style="color:#686868 !important">Target Date</label>
                  <input style="text-align: center;font-size: 12px;" type="text" class=" form-control form-control-left-radius datepicker_<?= $row_action_required_detail->id ?>" name="" id="target_date_<?= $row_action_required_detail->id ?>" value="<?=$row_action_required_detail->target_date?>" readonly>
                </div>
                <div class="" style="margin-top: 10px">
                  <label class="label_blue" style="color:#686868 !important">Actual Date</label>
                  <input style="text-align: center;font-size: 12px;" type="text" class=" form-control form-control-left-radius datepickerAcDate_<?=$row_action_required_detail->main_id ?>" name="" id="actual_date_<?= $row_action_required_detail->main_id ?>">
                </div>
                <script>
                  $('.datepickerAcDate_<?=$row_action_required_detail->main_id ?>').datepicker({
                    minDate: new Date(),
                    dateFormat: "yy-mm-dd",
                    duration: "fast",
                    showAnim: "slide",
                    onSelect: function(dateText, inst) { 
                      $('.datepicker').val(dateText);
                    },
                    showOptions: {direction: "down"} 
                  });
                  $('.datepickerAcDate_<?= $row_action_required_detail->main_id ?>').datepicker('setDate',new Date() );
                </script>  
                </div>
                <div class="modal-footer" style="border-top: none;">
                  <button type="button" class="btn btn-default"  style="background-color:#EE621A ;;outline: none;border-radius:6vh;outline: none;border:none;color: #fff;margin-right: 39.5%;width: 17%;height: 25%;" onclick="if($('#actual_date_<?=$row_action_required_detail->main_id ?>').val() == '' || $('#action_complete_<?= $row_action_required_detail->main_id ?>').val() == ''){alert('Please Fill Form Complete...');}else{update_action_required_edit('<?=$row_action_required_detail->main_id ?>', $('#action_complete_<?= $row_action_required_detail->main_id ?>').val(), $('#actual_date_<?= $row_action_required_detail->main_id?>').val())}">Save</button>
                 <!--  <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;float: left;color: #fff">Cancel</button> -->
                </div>
              </div>
              </div>
            </div>
      
          <?}?>
        </tbody>
      </table>