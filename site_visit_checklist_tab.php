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

                while($row_main_detail=$get_main_detail->fetch_object())
                {
                  $get_action_status=$conn->query("select * from tbl_sm_report_action where row_id='".$row_main_detail->id."' and checklist_udid = '".$_SESSION['udid_report']."' and is_task_obs = 0")->fetch_object();
                  $check_exist_action= $conn->query("select checklist_udid,checklist_main_comments,checklist_action_comments from tbl_sm_report_action where checklist_udid='".$_SESSION['udid_report']."' AND row_id='".$row_main_detail->id."'")->num_rows;
                  $temp_comments="";
              ?>
              <table id="mytable" class="table table-bordred blue_table_label" style="background-color: #283A50;color: #fff;margin-top: -6px;">
                <tbody>
                  <tr class="content_tr" id="content_<?=$row_main_detail->id ?>" onclick="flip_action(<?=$row_main_detail->id ?>)" style="height: 100px;" >
                    <td style="vertical-align: middle; padding-left: 5.3%;" class="col-md-2 col-sm-2"><?=$row_main_detail->task_number ?></td> 
                    <td style="vertical-align: middle;" class="col-md-8 col-sm-8"><?=$row_main_detail->task_desc ?>
                    <?
                      if ($check_exist_action <= 0) 
                      {
                    ?>
                      <div id="span2" class="t r" style="text-align: center;padding:3px 0px 3px 0px">
                      <?
                        if ($row_main_detail->comments != "") 
                        {
                      ?>
                        <!-- <span class="" ></span> -->
                      <?
                        echo $row_main_detail->comments;
                        $temp_comments = $row_main_detail->comments;
                      ?>
                      <?
                        }
                      ?>
                      </div>
                    <?
                      }
                      if ($check_exist_action > 0) 
                      {
                        if ($get_action_status->action=="2" AND $get_action_status->action_required != "") 
                        {
                    ?>
                          <div id="span2" class="t r" style="padding:3px 0px 3px 0px">&nbsp;&emsp;
                            
                            <?
                              echo $get_action_status->action_required;
                            ?>
                          </div>
                        <?
                        }
                        else
                        {
                        ?>
                      <div id="span2" class="t r" style="padding:3px 0px 3px 0px">&nbsp;&emsp;
                      <?                          
                        if ($get_action_status->checklist_action_comments != "") 
                        {
                      ?>
                       <!--  <span class="" ></span>&emsp; -->
                        <?
                          echo $get_action_status->checklist_action_comments;
                          $temp_comments = $get_action_status->checklist_action_comments;
                        }
                        else 
                        {
                        ?>
                       <!--  <span class="" ></span>&emsp; -->
                        <?
                          echo $row_main_detail->comments;
                          $temp_comments = $row_main_detail->comments;
                        }
                      ?>
                      </div>
                      <?
                      }}
                      ?>
                    </td>
                    <td style="text-align: center;vertical-align: middle;" class="col-md-2 col-sm-2">
                      <?
                        if ($get_action_status->action == "1") 
                        {
                      ?>
                      <span  class="glyphicon glyphicon-ok not-selected1 glyphicontab-ok" id="gif_ok" ></span>   
                      <?
                        }
                      ?>
                      <?
                      if ($get_action_status->action == "2") 
                      {
                      ?> <span  class="glyphicon glyphicon-remove not-selected2 not-selectedtick2 glyphicontab-remove" id="gif_ok"></span>   
                      <?
                      }
                      ?>
                      <?
                        if ($get_action_status->action == "3") 
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
                  <tr class="action_tr" style="display: none;" >
                    <div class="action_tr_2" id= "action_<?=$row_main_detail->id?>" style="display: none;">
                      <div class=" col-sm-12 table table-bordred blue_table_label" style="background-color: #283A50;color: #fff;margin-top: -4px;padding-top: 10px;padding-bottom: 10px;">
                      <div class="col-sm-3 col-md-4"></div>
                      <div class="col-sm-7 col-md-8" style="height: 20%;padding: 10px;">         
                        <div style="text-align:center" class="votes tickwidth">
                        <!-- Tick Yes Module Begins-->
                          <div class="col-sm-2 col-md-1">
                            <?
                              if ($get_action_status->action == "0") 
                              {
                            ?>
                            <span  class="glyphicon glyphicon-ok glyphicon_gif  " id="mod_btn" onclick="//update_tick('<?= $row_main_detail->id ?>','1')" data-current_act="<?=$get_action_status->action ?>" data-userid="<?php echo $row_main_detail->task_desc ?>" data-userid2="<?if($get_action_status->action_required != ""){echo $get_action_status->action_required;}else if($get_action_status->checklist_action_comments != "") echo $get_action_status->checklist_action_comments;else echo $row_main_detail->comments;?>" data-toggle="modal" data-target="#ActionMyModal_<?=$row_main_detail->id?>" ></span>
                            <?
                              }
                              else if ($get_action_status->action == "1") 
                              {
                            ?>
                            <span  class="glyphicon glyphicon-ok not-selected1 glyphicon-okWH" id="mod_btn" onclick="//update_tick('<?= $row_main_detail->id ?>','0')" data-current_act="<?=$get_action_status->action ?>" data-userid="<?php echo $row_main_detail->task_desc ?>" data-userid2="<?if($get_action_status->action_required != ""){echo $get_action_status->action_required;}else if($get_action_status->checklist_action_comments != "") echo $get_action_status->checklist_action_comments;else echo $row_main_detail->comments;?>" data-toggle="modal" data-target="#ActionMyModal_<?=$row_main_detail->id?>" > </span>
                            <?
                              }
                              else
                              {
                            ?>
                            <span class="glyphicon glyphicon-ok glyphicon_gif" id="mod_btn" onclick="//update_tick('<?= $row_main_detail->id ?>','1')" data-current_act="<?=$get_action_status->action ?>" data-userid="<?php echo $row_main_detail->task_desc ?>" data-userid2="<?if($get_action_status->action_required != ""){echo $get_action_status->action_required;}else if($get_action_status->checklist_action_comments != "") echo $get_action_status->checklist_action_comments;else echo $row_main_detail->comments;?>" data-toggle="modal" data-target="#ActionMyModal_<?=$row_main_detail->id?>" ></span>
                            <?
                              }
                            ?>
                          </div>
                          <div class="col-sm-2 col-md-1">
                            <?
                              if ($get_action_status->action == "0") 
                              {
                            ?>
                            <span  id="mod_btn_2" class="glyphicon  glyphicon-remove glyphicon_gif glyphiconfull_remove" id="gif_remove"  data-toggle="modal" data-target="#myModal2_<?= $row_main_detail->id ?>" data-task="<?=$row_main_detail->task_desc ?>" data-id="<?=$row_main_detail->id ?>" data-comment="<? if($get_action_status->checklist_action_comments !="") echo $get_action_status->checklist_action_comments; else echo $row_main_detail->comments; ?>"></span>

                            <?
                              } 
                              else if ($get_action_status->action == "2") 
                              {
                            ?>
                              <span  id="mod_btn_2" class="glyphicon not-selected2 glyphicon-remove" id="gif_remove"  data-toggle="modal" data-task="<?=$row_main_detail->task_desc ?>" data-target="#myModal2_<?= $row_main_detail->id ?>" data-id="<?=$row_main_detail->id ?>"  data-comment="<?=$get_action_status->action_required ?>"></span>
                            <?
                              }
                              else
                              {
                            ?>
                            <span  id="mod_btn_2" class="glyphicon  glyphicon-remove  glyphicon_gif glyphiconfull_remove" id="gif_remove"  data-toggle="modal" data-task="<?=$row_main_detail->task_desc ?>"  data-target="#myModal2_<?= $row_main_detail->id ?>" data-id="<?=$row_main_detail->id ?>"  data-comment="<? if($get_action_status->checklist_action_comments !="") echo $get_action_status->checklist_action_comments; else echo $row_main_detail->comments ?>"></span>
                            <?
                              }
                            ?>
                            <!-- Modals Action Required-->
                            <div class="modal fade" id="myModal2_<?= $row_main_detail->id ?>" role="dialog" data-backdrop="static">
                              <div class="modal-dialog" style="height: 150px;">
                                <div class="modal-content" style="border-radius: 25px;background-color: #F5F5F5">
                                  <div class="modal-header" style="border-bottom: none;padding: 0px">
                                    <!-- <button type="button" class="close" data-dismiss="modal" style="color: #C9D5D8">&times;</button> -->
                                     <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:50%;float: right;margin-top: -15px;margin-right: 20px;outline: none;border: none;width: 40px;height: 40px;">&#x2715;</button>                          
                                  </div>
                                  <div class="modal-body" style="padding-top: 0px;padding-bottom: 0px;">
                                    <label class="label_blue" style="color: rgb(88, 84, 84) !important">Task Observed</label>                                   
                                    <textarea id="task_name" class="mod_btn_2_modalbackground" rows="4" style="height: 52px; width: 100%;border:none; outline: none; resize: none; border-radius: 1.5vh !important; padding: 6px 12px;color: black;text-align: center;" readonly></textarea>
                                    <div class="" style="margin-top: 10px">
                                      <label class="label_blue" style="color: rgb(88, 84, 84) !important">Action Required</label>
                                      <textarea type="text" class="form-control form-control-left-radius mod_btn_2_modalbackground" name="" id="action_comment_temp<?=$row_main_detail->id?>" style="height: 60px;text-align: center; resize: none; border-radius: 1.5vh !important;" ></textarea>
                                    </div>
                                    <div class="" style="margin-top: 10px">
                                      <label class="label_blue" style="color: rgb(88, 84, 84) !important">Resp Person</label> 
                                      <select class="mod_btn_2_modalbackground text-center" style="height: 34px;display: block;width: 100%;padding-left:20px;font-size: 14px;line-height: 1.42857143;background-image: none;border: 1px solid #eee;border-radius: 3vh;color: black;text-align-last: center; " id="select_emp_<?= $row_main_detail->id ?>"  name="select_employer" required>
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
                                      <label class="label_blue" style="color: rgb(88, 84, 84) !important">Target Date</label>
                                      <input type="text" class="form-control form-control-left-radius datepicker " style="text-align: center;background-color: #fff !important;" name="" id="target_date<?=$row_main_detail->id?>" >
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
                                      // $('#target_date<?=$row_main_detail->id?>').datepicker('setDate',new Date("<?=$get_action_status->target_date ?>"));
                                    </script>
                                  </div>
                                  <div class="modal-footer" style="border-top: none;">
                                    <button type="button" class="btn btn-default"  style="background-color:#f47821 ;outline: none;border-radius:6vh;outline: none;border:none;color: #fff;margin-right: 39.5%;width: 17%;height: 25%;" onclick="if($('#target_date').val() == ''){ alert('Please Select Date...');return false;}else{update_remove('2',<?= $row_main_detail->id ?>,$('#select_emp_<?= $row_main_detail->id ?>').val(),$('#action_comment_temp<?=$row_main_detail->id?>').val(),'<?=$row_main_detail->comments ?>',$('#target_date').val())}">Save</button>
                                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;float: left;color: #fff">Cancel</button> -->
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- NA Module Begain-->
                          <div class="col-sm-2 col-md-1">
                          <?
                            if ($get_action_status->action == "0") 
                            {
                          ?>
                            <span class="glyphicon glyphicon-plus glyphicon_gif"  id="mod_btn" style="color: black" onclick="//update_na('<?= $row_main_detail->id ?>','3')" data-current_act="<?=$get_action_status->action ?>" data-userid="<?php echo $row_main_detail->task_desc ?>" data-userid2="<?if($get_action_status->action_required != ""){echo $get_action_status->action_required;}else if($get_action_status->checklist_action_comments != "") echo $get_action_status->checklist_action_comments;else echo $row_main_detail->comments;?>" data-toggle="modal"  data-target="#NAMyModal_<?=$row_main_detail->id?>" >
                              <span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px white;color: white">N/A</span>
                            </span>
                          <?
                            } 
                            else if ($get_action_status->action == "3") 
                            {
                          ?>
                            <span class="glyphicon glyphicon-plus not-selected3"  id="mod_btn" style="color: black" onclick="//update_na('<?= $row_main_detail->id ?>','0')" data-current_act="<?=$get_action_status->action ?>" data-userid="<?php echo $row_main_detail->task_desc ?>" data-userid2="<?if($get_action_status->action_required != ""){echo $get_action_status->action_required;}else if($get_action_status->checklist_action_comments != "") echo $get_action_status->checklist_action_comments;else echo $row_main_detail->comments;?>" data-toggle="modal"  data-target="#NAMyModal_<?=$row_main_detail->id?>" >
                              <span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px white;color: white">N/A</span>
                            </span>
                          <?
                            }
                            else
                            {
                          ?>
                            <span class="glyphicon glyphicon-plus glyphicon_gif"  id="mod_btn" style="color: black" onclick="//update_na('<?= $row_main_detail->id ?>','3')" data-current_act="<?=$get_action_status->action ?>" data-userid="<?php echo $row_main_detail->task_desc ?>" data-userid2="<?if($get_action_status->action_required != ""){echo $get_action_status->action_required;}else if($get_action_status->checklist_action_comments != "") echo $get_action_status->checklist_action_comments;else echo $row_main_detail->comments;?>" data-toggle="modal"  data-target="#NAMyModal_<?=$row_main_detail->id?>" >
                              <span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px white;color: white">N/A</span>
                            </span>
                          <?
                            }
                          ?>
                          </div>
                          <!-- NA Module Ends-->
                          <?
                            if (($check_exist_action > 0) AND ($get_action_status->action != "2")) 
                            {
                          ?>
                          <div class="col-sm-2 col-md-1">
                            <span id="mod_btn" class="glyphicon glyphicon-edit glyphicon_gif" id="gif_edit" data-toggle="modal" data-target="#myModal_<?= $row_main_detail->id ?>" data-current_act="<?= $get_action_status->action ?>" data-question="<?= $row_main_detail->general_question ?>" data-userid="<?php echo $row_main_detail->task_desc;?>" data-userid2=<?
                            if ($get_action_status->checklist_action_comments != "")
                              echo "$get_action_status->checklist_action_comments";
                            else
                              echo "$row_main_detail->comments";
                            ?>
                                 ?> >
                            </span>
                          </div>
                          <?
                            }

                            else if (($check_exist_action > 0) AND ($get_action_status->action == "2")) 
                            {
                          ?>
                          <div class="col-sm-2 col-md-1">
                            <span id="mod_btn_2" class="glyphicon glyphicon-edit glyphicon_gif" id="gif_edit" data-toggle="modal" data-task="<?=$row_main_detail->task_desc ?>" data-target="#myModal2_<?= $row_main_detail->id ?>" data-id="<?=$row_main_detail->id ?>"  data-comment="<?=$get_action_status->action_required ?>"></span>
                          </div>
                          <?
                            }

                          ?>
                          <div class="modal fade" id="myModal_<?=$row_main_detail->id ?>" role="dialog" data-backdrop="static">
                            <div class="modal-dialog" style="height: 150px">
                              <!-- Modal content-->
                              <div class="modal-content" style="border-radius: 25px;background-color: #F5F5F5">
                                <div class="modal-header" style="border-bottom: 1px solid #8a8a8a;padding: 10px">
                                
                                  <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:50%;float: right;margin-top: -26px;outline: none;border: none;width: 40px;height: 40px;margin-right: 10px;">&#x2715;</button>
                                  <center style="">
                                   <h5 class="modal-title" style="text-align:center;margin-right:10px;color: black;"><b style="font-family: Avenirnextbold;">Task</b></h5>
                                  </center>
                                </div>
                                <div class="modal-body" style="color: black;height: 305px;text-align: left;padding: 0px;">
                                  <div style="height: 60px;padding: 15px;color:black;">
                                  <p id="main_comment_modal"></p></div>
                                  <input type="hidden" name="" id="current_act">
                              
                               <center style="color: black;border-bottom: 1px solid #8a8a8a;padding: 10px;"><b style="font-family: Avenirnextbold">General Question</b></center>
                                <textarea id="question_modal" class="question_modal question_modal_<?=$row_main_detail->id ?>" placeholder="" rows="4" style="height: 70px; width: 100% ;padding :15px; border:none; outline: none;resize: none;background-color:#fff !important" readonly></textarea>
                                <div style="border-bottom: 1px solid #8a8a8a;"><center style="color: black;padding: 10px;padding-bottom: 5px;"><b style="font-family:Avenirnextbold">Comments</b></center></div>
                                 <textarea id="action_comment_modal" class="action_modal_background action_modal_<?=$row_main_detail->id ?>" placeholder="" rows="4" style="height: 70px;padding :15px;width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important" ><?=$get_action_status->checklist_action_comments?></textarea>
                                  </div>
                                <div class="modal-footer" style="height: 50px;border-top: 1px solid #bdafaf;padding: 10px !important">
                                 <!--  <textarea id="action_comment_modal" class="action_modal_background action_modal_<?=$row_main_detail->id ?>" placeholder="Comment Here..." rows="4" style="height: 70px; padding-left: 40px;width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important" ></textarea> -->
                                  <button type="button" class="btn btn-default" style="border: none;float: left;background-color: #F5F5F5;color: black;font-weight: bold;outline: none;">Location</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal" style="float: right; border: none;color: #007AFF;background-color: #F5F5F5;outline: none;" onclick="update_comments(<?= $row_main_detail->id ?>,$('#hidden_action_<?=$row_main_detail->id ?>').val(),$('#main_comment_modal').html())">OK</button>
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

                          <div class="col-sm-4 col-md-8 gif_flip" style=" padding-right: 45px;">
                            <div class="glyphicon_gif_flip">
                              <span class="glyphicon glyphicon-refresh" title="Flip" style="color: #fff" onclick="flip_content(<?=$row_main_detail->id ?>)"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  </tr>
                </tbody>
              </table>
              <!--Modal for action 1-->
              <div class="modal fade" id="ActionMyModal_<?=$row_main_detail->id?>" role="dialog" data-backdrop="static">
                <div class="modal-dialog" style="height: 150px;">  
                <!-- Modal content-->
                  <div class="modal-content" style="border-radius: 25px;background-color: #F5F5F5">
                    <div class="modal-header" style="border-bottom: 1px solid #8a8a8a;padding: 10px;"> 
                      <h5 class="modal-title" style="text-align:center;margin-right:10px;color: black;"><b style="font-family: Avenirnextbold;">Task</b></h5>
                      <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:50%;float: right;margin-top: -45px;outline: none;border: none;width: 40px;height: 40px;margin-right: 10px;">&#x2715;</button>
                      <input type="hidden" name="hidden_action" id="hidden_na_<?=$row_main_detail->id?>" value="<? echo $get_action_status->checklist_action_comments?>">
                    </div>

                    <div class="modal-body" style="height: 315px;text-align: left;padding: 0px;">
                      <div style="height: 60px;padding: 15px;color:black;"><p id="main_comment_modal"></p></div>
                      <?
                        if($row_main_detail->general_question != "")
                        {
                      ?>
                           <div style="border-bottom: 1px solid #8a8a8a;padding: 10px;"><center style="color: black;"><b style="font-family: Avenirnextbold">General Question</b></center></div>
                      <div style="height: 60px;padding: 15px;color: black;"><p><?=$row_main_detail->general_question?></p></div>
                      <?}else{?>
                         <div style="height: 60px;padding: 15px;color: black;"></div>
                      <?}?>
                      
                    <div style="border-bottom: 1px solid #8a8a8a;"><center style="color: black;padding: 10px;padding-bottom: 5px;"><b style="font-family:Avenirnextbold">Comments</b></center> </div>
                      <div style="height: 60px;padding: 15px;">
                      <textarea id="action_comment_modal" class="action_modal_background action_modal_<?=$row_main_detail->id?>" placeholder="" rows="4" style="height: 90px;color:black; width: 100% ; border:none; outline: none;resize: none;background-color: #fff !important;"><?=$get_action_status->checklist_action_comments?></textarea></div>
                    </div>

                   <!--  <center style="margin-right: 30px"><b>Comment</b></center> -->
                    <div class="modal-footer" style="height:50px;padding:10px !important; border-top: 1px solid #bdafaf;">
                      <!-- <textarea id="action_comment_modal" class="action_modal_<?=$row_main_detail->id?>" placeholder="Comment Here..." rows="4" style="height: 90px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important"><?=$get_action_status->checklist_action_comments?></textarea> -->
                      <button type="button" class="btn btn-default" style="border: none;float: left;background-color: #F5F5F5;color: black;font-weight: bold;outline: none;">Location</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal" style="float: right; border: none;color: #007AFF;background-color: #F5F5F5;outline: none;" onclick="flip_content(<?=$row_main_detail->id ?>);update_tick('<?=$row_main_detail->id?>','1',$('#hidden_na_<?=$row_main_detail->id?>').val())">OK</button>

                    </div>
                    <script type="text/javascript">
                      $('.action_modal_<?=$row_main_detail->id ?>').bind('keypress keyup blur', function() {
                        $('#hidden_na_<?=$row_main_detail->id ?>').val($(this).val());
                      });
                    </script>
                  </div>
                </div>
              </div>
              <!--Modal End-->

              <!--Modal for action 3-->
              <div class="modal fade" id="NAMyModal_<?=$row_main_detail->id?>" role="dialog">
                <div class="modal-dialog" style="height: 150px">  
                <!-- Modal content-->
                  <div class="modal-content" style="border-radius: 25px;background-color: #F5F5F5">
                    <div class="modal-header" style="border-bottom: 1px solid #8a8a8a;padding: 10px;"> 
                      <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:50%;float: right;margin-top: -26px;margin-right:10px;outline: none;border: none;height: 40px;width: 40px;">&#x2715;</button>
                      <h5 class="modal-title" style="text-align: center;color: black;margin-left: 30px;"><b style="font-family: Avenirnextbold">Task</b></h5>
                     <!--  <button type="button" class="btn btn-default" data-dismiss="modal" style="float: right; border: none;color: #10869D;margin-top: -20px;" onclick="flip_content(<?=$row_main_detail->id ?>);update_na('<?= $row_main_detail->id ?>','3',$('na_modal_<?=$row_main_detail->id ?>').val())">OK</button> -->
                    </div>

                    <div class="modal-body" style="height: 300px;text-align: left;padding: 0px;border-bottom:1px solid #bdafaf;">
                      <div style="height: 60px;padding: 15px;color: black;"><p id="main_comment_modal"></p></div>
                      <?
                        if($row_main_detail->general_question != "")
                        {
                      ?>
                      <div style="border-bottom: 1px solid #8a8a8a;padding: 10px;"><center style="color: black;"><b style="font-family: Avenirnextbold">General Question</b></center></div>
                      <div style="height: 60px;padding: 15px;color: black;"><p><?=$row_main_detail->general_question?></p></div>
                      <?}?>
                   

                    <center style="color: black;border-bottom: 1px solid #8a8a8a;padding: 10px;padding-bottom: 5px;"><b style="font-family:Avenirnextbold">Comments</b></center>
                    <textarea id="action_comment_modal" class="action_modal_background na_modal_<?=$row_main_detail->id ?>" placeholder="" rows="4" style="height: 90px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;padding: 15px;color: black;"><?=$get_action_status->checklist_action_comments?></textarea> </div> 
                    <div class="modal-footer" style="height:50px;padding:10px !important;">
                      <button type="button" class="btn btn-default" style="border: none;float: left;background-color: #F5F5F5;color: black;font-weight: bold;outline: none;">Location</button>
                       <button type="button" class="btn btn-default" data-dismiss="modal" style="float: right; border: none;color: #007AFF;background-color: #F5F5F5;outline: none;" onclick="flip_content(<?=$row_main_detail->id ?>);update_na('<?= $row_main_detail->id ?>','3',$('.na_modal_<?=$row_main_detail->id ?>').val())">OK</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--Modal <End-->
              <? } ?>
              <div class="row" style="margin-bottom: -40px !important;margin-top:6%!important"> 
              <div class="form-group" style="margin-bottom: 0px !important">
        <label class="col-md-1 control-label"></label>
            <div class="col-md-2">
          </div>
          <div class="col-md-5" style="margin-left: 40px;">
              <input type="button" id="submit_later" name="save_later" value="Submit" class="btn btn-warning form_submit_button" onclick="<?if($get_total_main_records->count_main ==$get_total_action_records->count_action){?>save_checklist(1)<?}else{?>save_checklist(0)<?}?>">
          </div>
        </div>
        </div>