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

    $get_max_task_number=$conn->query("select max(task_number) as max_number from tbl_sm_report_task_obs where udid='".$_SESSION['udid_report']."'")->fetch_object();
    $get_task_observed=$conn->query("select *,tbl_sm_report_task_obs.id,tbl_sm_report_task_obs.udid as checklist_udid,tbl_sm_report_task_obs.emp_id as employees_id FROM tbl_sm_report_task_obs INNER JOIN tbl_sm_report_action on tbl_sm_report_task_obs.id = tbl_sm_report_action.row_id AND tbl_sm_report_action.is_task_obs = '1' WHERE  tbl_sm_report_task_obs.udid ='".$_SESSION['udid_report']."' order by  tbl_sm_report_task_obs.task_number");

    if($get_max_task_number->max_number == NULL){ $t_no=0;} else{ $t_no=$get_max_task_number->max_number;}$t_no++;
                while($row_main_detail_task=$get_task_observed->fetch_object())
                {  
      
                  // echo "helo";
                  $string = $row_main_detail_task->employees_id;
                  $parts = explode(',', $string);
                  $d = array();
                  foreach ($parts as $name) {
                      $d[] = '"' . $name . '"';
                  }

                  $email_add_all_str=implode(",", $d);

                  $get_emp_task=$conn->query("select tbl_employee.id as induction_id, tbl_employee.given_name,tbl_employee.surname as name,tbl_employee.pin,tbl_employee.email_add,CONCAT((GROUP_CONCAT(concat(tbl_employee.given_name,' ',tbl_employee.surname))),' (',tbl_employer.company_name,')') as email_add_all,tbl_induction_register.project_id,tbl_employee.contact_phone,tbl_employee.job_title,tbl_employer.company_name,tbl_employer.tread,tbl_induction_register.empid  as employer_id  FROM tbl_employee JOIN tbl_induction_register ON tbl_employee.id = tbl_induction_register.id JOIN tbl_employer ON tbl_employer.id = tbl_induction_register.empid  WHERE tbl_employee.id IN (".$email_add_all_str.") group by tbl_induction_register.project_id")->fetch_object();

                  $get_action_status_task=$conn->query("select * from tbl_sm_report_action where row_id='".$row_main_detail_task->id."' and checklist_udid = '".$_SESSION['udid_report']."' AND is_task_obs='1'")->fetch_object();
                      
                  $check_exist_action_task= $conn->query("select checklist_udid,checklist_main_comments,checklist_action_comments from tbl_sm_report_action where checklist_udid='".$_SESSION['udid_report']."' AND row_id='".$row_main_detail_task->id."' AND is_task_obs='1'")->num_rows;
              ?>
              <table id="mytable" class="table table-bordred blue_table_label" style="background-color: #283A50;color: #fff;margin-top: -3px;">   
                <tbody> 
                  <tr class="content_tr" id="content_task_<?=$row_main_detail_task->id ?>" onclick="flip_action_task_obs(<?=$row_main_detail_task->id ?>)" style="height: 100px;" >
                    <td style="vertical-align: middle;padding-left: 5.3%;" class="col-sm-2"><?=$row_main_detail_task->task_number ?></td> 
                    <td style="vertical-align: middle;" class="col-sm-8">
                    <div style="padding: 3px 0px 3px 0px"><?=$row_main_detail_task->task_desc ?></div>
                    <? $comm=""; 
                        if($get_action_status_task->action !='2') 
                        {
                          $comm= $get_action_status_task->checklist_action_comments;
                        }
                        else
                        {
                          $comm= $get_action_status_task->action_required;
                        }
                      ?>
                    <div style="padding: 3px 0px 3px 18px"><span class="glyphicon1 glyphicon-edit glyphicon-edit1" ></span>&nbsp;<?=$comm?></div>
                    <div style="word-break: break-word; padding: 3px 0px 3px 0px"><?="Subcontractor Name : ".$get_emp_task->email_add_all;?></div>
                    </td>

                    <td style="text-align: center;vertical-align: middle;" class="col-md-2">
                    <?
                        if ($get_action_status_task->action == "1") 
                        {
                      ?>
                      <span  class="glyphicon glyphicon-ok not-selected1 glyphicontab-ok" id="gif_ok"></span>   
                      <?
                        }
                      ?>
                      <?
                      if ($get_action_status_task->action == "2") 
                      {
                      ?> <span  class="glyphicon glyphicon-remove not-selected2 not-selectedtick2 glyphicontab-remove" id="gif_ok"></span>   
                      <?
                      }
                      ?>
                      <?
                        if ($get_action_status_task->action == "3") 
                        {
                      ?> 
                      <span class="glyphicon glyphicon-plus not-selected3 nasmall"  id="gif_na" style="color: black">
                        <span class="naright" style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px white;color: white">N/A</span>
                      </span>
                      <?
                      }
                      ?>
                    </td>            
                  </tr>
                  <tr style="display: none">
                    <div class="action_task_obs" id= "action_task_obs<?=$row_main_detail_task->id?>" style="display: none;">
                      <div class=" col-sm-12 col-md-12 table table-bordred blue_table_label " style="background-color: #283A50;color: #fff;margin-top: -4px;padding-top: 10px;padding-bottom: 10px;">
                      <div class="col-sm-3 col-md-4"></div>
                      <div class="col-sm-7 col-md-8" style="height: 20%;padding: 10px">         
                        <div style="text-align:center" class="votes tickwidth">
                        <!-- Tick Yes Module Begins-->
                          <div class="col-sm-2 col-md-1">
                            <?
                              if ($get_action_status_task->action == "0") 
                              {
                            ?>
                            <span class="glyphicon glyphicon-ok glyphicon_gif " id="task_btn" onclick="//update_tick('<?= $row_main_detail->id ?>','1')" data-current_act="<?=$get_action_status_task->action ?>" data-userid="<?php echo $comm ?>" data-userid2="<?=$row_main_detail_task->task_desc?>" data-toggle="modal" data-target="#Action_Task_MyModal_<?=$row_main_detail_task->id?>" data-act="1"></span>
                            <?
                              }
                              else if ($get_action_status_task->action == "1") 
                              {
                            ?>
                            <span  class="glyphicon glyphicon-ok not-selected1 glyphicon-okWH" id="task_btn" onclick="//update_tick('<?= $row_main_detail->id ?>','0')" data-current_act="<?=$get_action_status_task->action ?>" data-userid="<?php echo $comm ?>" data-userid2="<?=$row_main_detail_task->task_desc ?>" data-toggle="modal" data-target="#Action_Task_MyModal_<?=$row_main_detail_task->id?>" data-act="1" > </span>
                            <?
                              }
                              else
                              {
                            ?>
                            <span class="glyphicon glyphicon-ok glyphicon_gif" id="task_btn" onclick="//update_tick('<?= $row_main_detail->id ?>','1')" data-current_act="<?=$get_action_status_task->action ?>" data-userid="<?php echo $comm ?>" data-userid2="<?=$row_main_detail_task->task_desc ?>" data-toggle="modal" data-target="#Action_Task_MyModal_<?=$row_main_detail_task->id?>" data-act="1" ></span>
                            <?
                              }
                            ?>
                          </div>

                          <!--Modal for Task Observed Action-->
                          <div class="modal fade" id="Action_Task_MyModal_<?=$row_main_detail_task->id?>" role="dialog">
                            <div class="modal-dialog" style="height: 150px">  
                              <!-- Modal content-->
                              <div class="modal-content" style="border-radius: 25px;background-color: rgb(243,243,243);">
                                <div class="modal-header" style="border-bottom: 1px solid #8a8a8a;"> 
                                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal" style="border: none;color: #10869D;float: right;">Close</button> --> <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:50%;float: right;margin-top: -32px;margin-right: 6px;outline: none;border: none;width: 40px;height: 40px;">&#x2715;</button>  
                                  <h5 class="modal-title" style="text-align: center;margin-left: 18px;color: black"><b  style="font-family: Avenirnextbold;">Task</b></h5>
                                  <input type="hidden" name="hidden_action" id="hidden_na_<?=$row_main_detail_task->id?>" value="">
                                </div>
                                <div class="modal-body" style="height: 190px;text-align: left;padding: 0px;">
                                  <div style="height: 60px;color: black;padding: 15px;"><p class="main_comment_modal_task"></p></div>
                               
                                <center style="margin-right: 30px; color: black;border-bottom: 1px solid #8a8a8a;    width: 100%;"><b  style="font-family: Avenirnextbold;">Comment</b></center>
                                 <textarea id="action_comment_modal_<?=$row_main_detail_task->id?>" class="action_comment_modal action_modal_<?=$row_main_detail_task->id?>" placeholder="" rows="4" style="height: 90px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;color: black;padding: 15px;"></textarea> </div>
                                <div class="modal-footer" style="height: 50px;border-top: 1px solid #bdafaf;padding: 10px !important">
                                 
                                 
                                   <button type="button" class="btn btn-default" style="border: none;float: left;background-color: #F5F5F5;color: black;font-weight: bold;outline: none;">Location</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal" style="float: right; border: none;color: #007AFF;background-color: #F5F5F5;outline: none;" onclick="flip_content_task_obs(<?=$row_main_detail_task->id ?>);if($('#action_comment_modal_<?=$row_main_detail_task->id?>').val() == ''){ alert('Please Enter the comments...');return false;}else{update_task('<?=$row_main_detail_task->id?>',$('#hidden_na_<?=$row_main_detail_task->id?>').val(),$('#action_comment_modal_<?=$row_main_detail_task->id?>').val())}">OK</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--Modal End-->
                          <script>
                              $(document).on("click", "#task_btn", function () {
                                $('.action_comment_modal').css('background-color','rgb(243,243,243);');
                                var Id = $(this).data('userid');
                                var Id2 = $(this).data('userid2');
                                var IdAct = $(this).data('act');
                                //alert(Id+' '+Id2);
                                
                                $(" #action_comment_modal_<?=$row_main_detail_task->id?> ").html(Id);
                                $(".main_comment_modal_task").html(Id2);
                                $("#hidden_na_<?=$row_main_detail_task->id?>").val(IdAct);
                              });

                              $(document).on("click", "#task_btn2", function () {
                                $('.action_comment_modal').css('background-color','white');
                                
                                $('.redcolor').css('color','rgb(255, 0, 0)');
                                var Id = $(this).data('userid');
                                var Id2 = $(this).data('userid2');
                                //alert(Id+' '+Id2);
                                var cur_act= $(this).data('current_act');
                                $(" #task_name ").html(Id);
                                $(".ac_req").val(Id2);
                               //$(".modal-body #current_act").val(cur_act);
                              });
                          </script>
                          <div class="col-sm-2 col-md-1">
                            <?
                              if ($get_action_status_task->action == "0") 
                              {
                            ?>
                            <span style="-webkit-text-stroke: 4px #AAAAAA;" id="task_btn2" class="glyphicon  glyphicon-remove glyphicon_gif gif_remove glyphiconfull_remove " data-toggle="modal" data-target="#Task_Obs_myModal_<?=$row_main_detail_task->id ?>" data-userid="<?=$row_main_detail_task->task_desc ?>" data-userid2="<? echo $comm ?>"></span>

                            <?
                              } 
                              else if ($get_action_status_task->action == "2") 
                              {
                            ?>
                              <span style="background-color: #d15462 !important;" id="task_btn2" class="glyphicon glyphicon-remove not-selected2  gif_remove " data-toggle="modal"  data-target="#Task_Obs_myModal_<?=$row_main_detail_task->id ?>" data-userid="<?=$row_main_detail_task->task_desc ?>" data-userid2="<? echo $comm ?>"></span>
                            <?
                              }
                              else
                              {
                            ?>
                            <span  id="task_btn2" class="glyphicon glyphicon-remove glyphicon_gif gif_remove glyphiconfull_remove" data-toggle="modal"   data-target="#Task_Obs_myModal_<?=$row_main_detail_task->id ?>"  data-userid="<?=$row_main_detail_task->task_desc ?>" data-userid2="<? echo $comm ?>"></span>
                            <?
                              }
                            ?>
                          <!-- Modals Task Observed Action Required-->
                            <div class="modal fade" id="Task_Obs_myModal_<?=$row_main_detail_task->id ?>" role="dialog">
                                <div class="modal-dialog" style="height: 150px;">
                                <div class="modal-content" style="border-radius: 25px;background-color: #F5F5F5">
                                  <div class="modal-header" style="border-bottom: none;padding: 0px">
                                    <!-- <button type="button" class="close" data-dismiss="modal" style="color: #C9D5D8">&times;</button> -->
                                     <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:50%;float: right;margin-top: -15px;margin-right: 20px;outline: none;border: none;width: 40px;height: 40px;">&#x2715;</button>                          
                                  </div>
                                  <div class="modal-body" style="padding-top: 0px;padding-bottom: 0px;">
                                    <label class="label_blue" style="color: rgb(88, 84, 84) !important">Task Observed</label>                                
                                    <textarea id="task_name" class="action_comment_modal" rows="4" style="height: 50px; width: 100%;border:none; outline: none; resize: none; background-color:#fff !important; border-radius: 1.5vh; padding:15px;color: black;text-align: center;" readonly></textarea>
                                    <div class="" style="margin-top: 10px">
                                      <label class="label_blue" style="color: rgb(88, 84, 84) !important">Action Required</label>
                                      <textarea type="text" class="action_comment_modal ac_req redcolor" name="" id="action_comment_temp<?=$row_main_detail_task->id?>" style="height:60;width: 100%;border:none; outline: none; resize: none; background-color:#fff !important; border-radius: 1.5vh; padding: 6px 12px;color: black;text-align: center;" ></textarea> 
                                    </div>
                                    <div class="" style="margin-top: 10px">
                                      <label class="label_blue" style="color: rgb(88, 84, 84) !important">Resp Person</label> 
                                      <select class="action_comment_modal" style="height: 34px;display: block;width: 100%;padding-left:20px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 20vh;text-align-last: center;" id="select_emp_<?=$row_main_detail_task->id ?>"  name="select_employer" required>
                                      <?
                                        $get_resp_name = $conn->query("select tbl_employee.id,tbl_employee.email_add,tbl_employee.given_name,tbl_employee.surname as name from tbl_employee INNER JOIN tbl_induction_register ON tbl_employee.id=tbl_induction_register.id where ( (tbl_induction_register.inducted_by IS NOT NULL AND tbl_induction_register.inducted_by != '')  AND tbl_induction_register.project_id='" . $_SESSION['admin'] . "' AND tbl_employee.given_name !='Pieter' AND tbl_employee.surname !='Koppen') OR tbl_employee.id = '" . $_SESSION['induction'] . "'  AND tbl_induction_register.is_deleted =' 0'");

                                        while ($row_resp_name = $get_resp_name->fetch_object()) 
                                        {
                                      ?>
                                        <option value="<?= $row_resp_name->id ?>"><?= $row_resp_name->email_add ?></option>
                                      <?
                                        }
                                      ?> 
                                      </select>
                                    </div>
                                    <div class="" style="margin-top: 10px">
                                      <label class="label_blue" style="color: rgb(88, 84, 84) !important;">Target Date</label>
                                      <input type="text" class="form-control form-control-left-radius datepicker" name="" id="target_date" style="text-align-last: center;">
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
                                    <button type="button" class="btn btn-default"   style="background-color:#f47821 ;outline: none;border-radius:6vh;outline: none;border:none;color: #fff;margin-right: 39.5%;width: 17%;height: 25%;" onclick="if($('#target_date').val() == '' || $('#action_comment_temp<?=$row_main_detail_task->id?>').val() == ''){ alert('Please Fill Complete From...');return false;}else{update_task_action_required('<?=$row_main_detail_task->id?>','2',$('#select_emp_<?=$row_main_detail_task->id ?>').val(),$('#action_comment_temp<?=$row_main_detail_task->id?>').val(),$('#target_date').val())}">Save</button>
                                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;float: left;color: #fff">Cancel</button> -->
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--End of modal task observed action required-->
                          </div>
                          <!-- NA Module Begain-->
                         <div class="col-sm-2 col-md-1">
                            <?if($get_action_status_task->action == "0"){?>

                            <span class="glyphicon glyphicon-plus glyphicon_gif"  id="task_btn" style="color: black" onclick="//update_na('<?= $row_main_detail->id ?>','3')" data-toggle="modal"  data-target="#Action_Task_MyModal_<?=$row_main_detail_task->id?>" data-userid="<?php echo $comm ?>" data-userid2="<?=$row_main_detail_task->task_desc?>" data-act="3" >
                              <span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px white;color: white">N/A</span>
                            </span>

                            <?}else if($get_action_status_task->action == "3"){?>
                            <span class="glyphicon glyphicon-plus not-selected3"  id="task_btn" style="color: black" onclick="//update_na('<?= $row_main_detail->id ?>','3')" data-toggle="modal"  data-target="#Action_Task_MyModal_<?=$row_main_detail_task->id?>" data-userid="<?php echo $comm ?>" data-userid2="<?=$row_main_detail_task->task_desc?>" data-act="3" >
                              <span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px white;color: white">N/A</span>
                            </span>
                            <?}else{?>
                            <span class="glyphicon glyphicon-plus glyphicon_gif"  id="task_btn" style="color: black" onclick="//update_na('<?= $row_main_detail->id ?>','3')" data-toggle="modal"  data-target="#Action_Task_MyModal_<?=$row_main_detail_task->id?>" data-userid="<?php echo $comm ?>" data-userid2="<?=$row_main_detail_task->task_desc?>" data-act="3" >
                              <span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px white;color: white">N/A</span>
                            </span>
                            <?}?>
                          </div>
                          <!-- NA Module Ends-->
                          <?
                            if($get_action_status_task->action != "2")
                            {
                          ?>
                          <div class="col-sm-2 col-md-1">
                            <span id="task_btn" class="glyphicon glyphicon-edit glyphicon_gif" data-toggle="modal" data-target="#Action_Task_MyModal_<?=$row_main_detail_task->id?>" data-userid="<?php echo $comm ?>" data-userid2="<?=$row_main_detail_task->task_desc ?>" data-act="<?=$get_action_status_task->action?>">
                            </span>
                          </div>
                          <?
                            }

                            else if ($get_action_status_task->action == "2") 
                            {
                          ?>
                          <div class="col-sm-2 col-md-1">
                            <span id="task_btn2" class="glyphicon glyphicon-edit glyphicon_gif" data-toggle="modal" data-target="#Task_Obs_myModal_<?= $row_main_detail_task->id ?>" data-userid="<?=$row_main_detail_task->task_desc ?>" data-userid2="<? echo $comm ?>" data-act="<?=$get_action_status_task->action?>"></span>
                          </div>
                          <?
                            }

                          ?>
                          <div class="col-sm-4 col-md-8 gif_flip" style="padding-right: 45px;">
                            <div class="glyphicon_gif_flip">
                              <span class="glyphicon glyphicon-refresh" title="Flip" style="color: #fff" onclick="flip_content_task_obs(<?=$row_main_detail_task->id ?>)"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </tr>
                </tbody>
              </table> 
              <!--Modal <End-->
              <? } ?>
              <center><button type="button" class="btn btn-default createleftmodal"  style="margin-top:3rem;outline: none;outline: none;border:none;background: url(./image/create_new_observation@3x.png);height:8vh;width:10vw;background-size: 100%;background-repeat: no-repeat;" data-toggle="modal" id="buttonTaskobserved" data-target="#modalTaskObserved"></button></center>
              <div class="form-group" style="margin-bottom: 30px !important">
        </div>
        <!--Modal Box for Task Observed-->
            <div class="modal fade" id="modalTaskObserved" role="dialog" data-backdrop="static">
              <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 25px;background-color: #F5F5F5;text-align: center;color: black;">
                  <div class="modal-header" style="border-bottom: none;padding: 0px;">
                   <!--  <button type="button" id="closeModCros" class="close" data-dismiss="modal" style="color: #C9D5D8">&times;</button> -->
                    <button type="button" id="btnClose" class="btn btn-default" data-dismiss="modal" style="border-radius:50%;float: right;margin-top: -15px;margin-right: 20px;outline: none;border: none;width: 40px;height: 40px;">&#x2715;</button>
                    <script>
                      $(function () {
                        $("#btnClose").on("click", function () {
                           $('#example-getting-started').val('');
                           $('#example-getting-started').multiselect('disable');
                           $('#example-getting-started').multiselect('refresh');
                        });
                      });
                    </script>
                  </div>
                  <div class="modal-body body_height">
                    <label class="label_blue" style="color: #555555 !important;">Task Observed</label>
                    <textarea id="taskObserved" class="lefttab_background lefttab_background1" rows="4" style="height: 70px; text-align-last: center; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 2vh;padding: 6px 12px;" autofocus> </textarea>
                    <div class="" style="margin-top: 10;">
                      <label class="label_blue" style="color: #555555 !important;">Subcontractor Business Name</label>
                        <? $get_employer=$conn->query("select company_name,id from tbl_employer where project_id='".$_SESSION['admin']."' and is_deleted='0' order by company_name"); ?>
                        <script type="text/javascript">
                          
                        </script>
                        <div>
                         <select class="lefttab_background" style="height: 34px;display: block;width: 100%;padding-left:20px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 20vh; text-align-last: center;" id="subContName"  name="" onchange="employee_generate($(this).val())" required>
                          <div style="text">
                         <option value="">Please Select Employer</option>
                        <!--  <option value=""></option> -->
                        <? while($row_employer=$get_employer->fetch_object()){ ?>
                          <option value="<?= $row_employer->id ?>"><?= $row_employer->company_name ?></option></div>
                        
                        <? }?>
                        </select>
                        <style type="text/css">
                          .select { width: 400px; text-align-last:center; }
                        </style>
                      </div>
                        <input type="hidden" name="hideempid" class="hideempid">
                         <input type="hidden" name="task_number" class="task_number" value="<?=$t_no; ?>">
                    </div>

                    
                    <script>
                      function employee_generate(id)
                      {
                        //alert(id);
                        $.ajax({
                          type: "POST",
                          url: "ajax_generate_employee.php",
                          data: {id: id},
                          success: function(data) {
                            //alert(data);
                            var result = jQuery.parseJSON(data);           
                            var dropdown2OptionList = [];
                            var dropdown2OptionList2= [];
                            jQuery.each(result, function(i, item){
                              dropdown2OptionList.push({                    
                                'value': i,
                                'label': item
                              })
                            });
                            jQuery('#example-getting-started').multiselect({
                              includeSelectAllOption: true,
                            });
                            jQuery('#example-getting-started').multiselect('dataprovider', dropdown2OptionList);
                          }
                        });
                      }
                    </script>
                    <div class="" style="margin-top: 10px">
                      <label class="label_blue" style="color: #555555 !important;">Employees</label>                    
                      <script type="text/javascript">
                        $(document).ready(function() {
                          $('#example-getting-started').multiselect({
                            numberDisplayed: 2,
                            buttonWidth: '100%',
                            border: 'none',
                           //  buttonborderradius:10vh,
                            nonSelectedText: 'Please Select Employees',
                            onChange: function() {
                              // console.log($('#example-getting-started').val());
                              var brands = $('#example-getting-started option:selected');
                              var selected = [];
                              $(brands).each(function(index, brand){
                                selected.push($(this).val());
                              });
                              selected2=selected;
                              var employeeId = selected.toString();
                              //console.log(employeeId);
                              $('.hideempid').val(employeeId);
                            }
                          });
                        });
                      </script>
                      <style>
                        .multiselect
                        {
                          border-radius: 10vh;
                          color: black;
                          text-align: center;
                          border: none;
                        }
                        .checkbox{
                          width: 84vh;
                        }
                      </style>
                    </div>
                    <select id="example-getting-started" multiple="multiple" style="width: 100%;border-radius: 20vh;"></select> 
                    <div class="" style="margin-top: 10px">
                      <label class="label_blue" style="color: #555555 !important;">Action</label>
                      <div style="height: 35px;width: 100%;background-color: #F5F5F5;border-radius: 20px;">
                        <input type="hidden" name="hideAction" id="hideAction">
                        <div class="col-md-4 col-sm-4" style=""></div>
                        <div class="col-md-4 col-sm-4" style="">
                          <div class="col-md-4 col-sm-4" style="text-align: right;padding: 0px;">
                          <span class="glyphicon glyphicon-ok  glyphicon_gif not-selected1 gif_ok glyphicon-okWH" style="-webkit-text-stroke: 2px #AAAAAA;" id="tickgreen" onclick="showhide(1)"></span></div>
                          <div class="col-md-4 col-sm-4" style="text-align: center;padding: 0px;">
                          <span class="glyphicon glyphicon-remove glyphicon_gif  gif_remove " id="crosswhite" style="-webkit-text-stroke: 4px #AAAAAA; top: 12%;" onclick="showhide(2)"></span></div>
                          <script>
                            $(document).ready(function(){
                               $(document).on("click", "#crosswhite", function (){
                                $("#crosswhite").css({ '-webkit-text-stroke':'4px #d15462'});
                              })
                                $(document).on("click", "#tickgreen", function (){
                                $("#tickgreen").css({ '-webkit-text-stroke':'2px #4cad74'});
                              })
                            })
                            
                            // $(document).ready(function(){
                            //    $(document).on("click", "#buttonTaskobserved", function (){
                            //     $("#buttonTaskobserved").css({ '-webkit-text-stroke':'4px #AAAAAA'});
                            //   })
                            // })
                          </script>
                          <div class="col-md-4 col-sm-4" style="text-align: left;padding: 0px;">
                          <span class="glyphicon glyphicon-plus glyphicon_gif gif_na" style="color: black">
                            <span style="position: absolute;top:30%;right: 14%;-webkit-text-stroke: 0px white;color: white;font-size: 12px;" onclick="showhide(3)">N/A</span>
                          </span></div>
                        </div><div class="col-md-4 col-sm-4" style=""></div>
                      </div>
                    </div>
                    <div id="Tgreen" style="display: none;">
                      <div style="margin-top: 10px">
                        <label class="label_blue" style="color: #555555 !important;">Comments</label>
                        <textarea class="lefttab_background" id="Comments" rows="4" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;border-radius: 2vh;padding: 6px 12px;text-align-last: center;"></textarea>
                      </div>
                    </div>
                    <div id="Tred" style="display: none;">
                      <div style="margin-top: 10px">
                        <label class="label_blue" style="color: #555555 !important;">Action Required</label>
                        <textarea id="actionRequired" class="lefttab_background" rows="4" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;border-radius: 2vh;padding: 6px 12px;text-align-last: center;"></textarea>
                      </div>
                      <div style="margin-top: 10px">
                        <div class="col-sm-6">
                        <label class="label_blue" style="color: #555555 !important;">Resp Person</label>
                      <select class="lefttab_background" style="height: 34px;display: block;width: 100%;padding-left:20px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 20vh;text-align-last: center;" id="respPerson"  name="select_employer" required>
                                      <?
                                        $get_resp_name_task = $conn->query("select tbl_employee.id,tbl_employee.email_add,tbl_employee.given_name,tbl_employee.surname as name from tbl_employee INNER JOIN tbl_induction_register ON tbl_employee.id=tbl_induction_register.id where ( (tbl_induction_register.inducted_by IS NOT NULL AND tbl_induction_register.inducted_by != '')  AND tbl_induction_register.project_id='" . $_SESSION['admin'] . "' AND tbl_employee.given_name !='Pieter' AND tbl_employee.surname !='Koppen') OR tbl_employee.id = '" . $_SESSION['induction'] . "'  AND tbl_induction_register.is_deleted =' 0'");

                                        while ($row_resp_name_task = $get_resp_name_task->fetch_object()) 
                                        {
                                      ?>
                                        <option value="<?= $row_resp_name_task->id ?>"><?= $row_resp_name_task->email_add ?></option>
                                      <?
                                        }
                                      ?> 
                                      </select>
                      </div>
                      <div class="col-sm-6">
                        <label class="label_blue" style="color: #555555 !important;">Target Date</label>
                        <input type="text" class="form-control form-control-left-radius datepicker" style="text-align-last: center;" name="" id="targetDate">
                      </div>
                    </div>
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
                  <div class="modal-footer" style="border-top: none;text-align: center;margin-top: 10px;">
                    <div class="col-sm-12 col-md-12" style="padding-top: 10px;">
                    <button type="button" class="btn btn-default"  style="background-color:#f47821 ;outline: none;border-radius:6vh;outline: none;border:none;color: #fff;width: 10vw" onclick="saveData()">Save</button></div>
                   <!--  <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;float: left;color: #fff" id="closeModCancel">Cancel</button> -->
                  </div>
                </div>
                </div>  
     
              </div>
            <!--End of modal box-->