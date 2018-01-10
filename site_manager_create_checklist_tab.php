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

  $get_main_detail=$conn->query("select * from tbl_sm_weekly_main where project_id='".$_SESSION['admin']."' order by task_number");

  while($row_main_detail=$get_main_detail->fetch_object()){  ?>
                <table id="mytable" class="table table-bordred " style=" background-color: #333240;color: #fff;">
                  <tbody>
                    <tr class="content_tr" id="content_<?=$row_main_detail->id ?>" onclick="flip_action(<?=$row_main_detail->id ?>)">
                      <td style="vertical-align: middle;padding-left: 30px" class="col-sm-1"><?=$row_main_detail->task_number ?></td>    
                      <td style="vertical-align: middle;padding-left: 30px"><?=$row_main_detail->task_desc ?>
                      <? 
                        $get_action_status=$conn->query("select * from tbl_sm_weekly_action where row_id='".$row_main_detail->id."' and checklist_udid = '".$_SESSION['udid']."'")->fetch_object();
                      
                        $check_exist_action= $conn->query("select checklist_udid,checklist_main_comments,checklist_action_comments from tbl_sm_weekly_action where checklist_udid='".$_SESSION['udid']."' AND row_id='".$row_main_detail->id."'")->num_rows;
                        $temp_comments="";
                      ?>
                      <? if($check_exist_action <= 0) {  ?>
                        <div id="span2" class="t r" style=""><br>
                          <?if($row_main_detail->comments!="") {?><span class="glyphicon glyphicon-pencil" ></span>&nbsp;<? echo $row_main_detail->comments; $temp_comments= $row_main_detail->comments;?>
                          <? }?>
                        </div>
                      <? } ?> 
                      <?if($check_exist_action > 0 ){ ?>
                        <div id="span2" class="t r" style=""><br><span class="glyphicon glyphicon-pencil" ></span>&nbsp;
                          <?if($get_action_status->action == "2")
                          {
                            echo $get_action_status->action_required;
                            $temp_comments= $get_action_status->action_required;}
                            else if($get_action_status->action =="1" || $get_action_status->action =="3")
                            {
                              echo $get_action_status->checklist_action_comments;
                              $temp_comments= $get_action_status->checklist_action_comments;
                            } 
                            else 
                            {
                              echo $row_main_detail->comments; 
                              $temp_comments= $row_main_detail->comments;
                            }
                          ?>
                        </div>
                        <? } ?>
                      </td>                 
                      <td style="text-align: right;vertical-align: middle;padding-right: 30px"><?if($get_action_status->action == "1") {?> <span  class="glyphicon glyphicon-ok not-selected1" id="gif_ok"></span>   <?}?>
                      <?if($get_action_status->action == "2") {?> <span  class="glyphicon glyphicon-remove not-selected2" id="gif_ok"></span>   <?}?>
                      <?if($get_action_status->action == "3") {?> <span class="glyphicon glyphicon-plus not-selected3"  id="gif_na" style="color: black">
                      <span style="position: absolute;top:9px;right: 4px;-webkit-text-stroke: 0px white;color: white;font-size: 13px;">N/A</span>
                      </span>  
                      <?}?>
                      </td>
                    </tr>
                    <tr class="action_tr" style="display: none" >
                      <div class="action_tr_2" id= "action_<?=$row_main_detail->id?>" style="display: none;">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">     
                          <div style="text-align:center" class="votes">
                          <!--Modal for action 3-->
                            <div class="modal fade" id="NAMyModal_<?=$row_main_detail->id?>" role="dialog">
                              <div class="modal-dialog" style="height: 150px">  
                                <!-- Modal content-->
                                <div class="modal-content" style="border-radius: 25px;">
                                  <div class="modal-header">
                                    <center ><h5 class="modal-title"><b>Task</b></h5></center> 
                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="border: none;color: #10869D;float: left;">Close</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="float: right; border: none;color: #10869D;" onclick="flip_content(<?=$row_main_detail->id ?>);update_action('3','<?=$row_main_detail->id?>','<?=$row_main_detail->comments ?>','<?=$get_action_status->checklist_action_comments?>',$('#hidden_na_<?=$row_main_detail->id ?>').val(),'')">OK</button>
                                  </div>
                                  <div class="modal-body" style="height: 175px;text-align: left;">
                                    <p id="main_comment_modal"></p>
                                  </div>
                                  <center style="margin-right: 30px"><b>Comment</b></center>
                                  <div class="modal-footer" style="height: 130px">
                                    <textarea id="action_comment_modal" class="action_modal_text_area action_modal_<?=$row_main_detail->id ?>" placeholder="Comment Here..." rows="4" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important"></textarea>
                                    <input type="hidden" name="hidden_action" id="hidden_na_<?=$row_main_detail->id?>" value="<? echo $get_action_status->checklist_action_comments?>">
                                    <script type="text/javascript">
                                      $('.action_modal_<?=$row_main_detail->id ?>').bind('keypress keyup blur', function() {
                                        $('#hidden_na_<?=$row_main_detail->id ?>').val($(this).val());
                                      });
                                    </script>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--Modal End-->
                            <!--Modal for action 1-->
                            <div class="modal fade" id="ActionMyModal_<?=$row_main_detail->id?>" role="dialog">
                              <div class="modal-dialog" style="height: 150px">  
                                <!-- Modal content-->
                                <div class="modal-content" style="border-radius: 25px;">
                                  <div class="modal-header">
                                    <center ><h5 class="modal-title"><b>Task</b></h5></center> 
                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="border: none;color: #10869D;float: left;">Close</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="float: right; border: none;color: #10869D;" onclick="flip_content(<?=$row_main_detail->id ?>);update_action('1','<?=$row_main_detail->id?>','<?=$row_main_detail->comments?>',$('#hidden_action_<?=$row_main_detail->id ?>').val(),'')">OK</button>
                                  </div>
                                  <div class="modal-body" style="height: 175px;text-align: left;">
                                    <p id="main_comment_modal"></p>
                                  </div>
                                  <center style="margin-right: 30px"><b>Comment</b></center>
                                  <div class="modal-footer" style="height: 130px">
                                    <textarea id="action_comment_modal" class="action_modal_text_area action_modal_<?=$row_main_detail->id ?>" placeholder="Comment Here..." rows="4" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important"></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--Modal End-->
                            <div class="col-sm-1">
                              <? if($get_action_status->action =="0"){ ?>
                              <span class="glyphicon glyphicon-ok glyphicon_gif" id="mod_btn" onclick="//update_action('1','<?=$row_main_detail->id?>','<?=$row_main_detail->comments ?>','<?=$get_action_status->checklist_action_comments?>','')" data-current_act="<?=$get_action_status->action ?>" data-userid="<?php echo $row_main_detail->task_desc ?>" data-userid2="<?if($get_action_status->action_required != ""){echo $get_action_status->action_required;}else if($get_action_status->checklist_action_comments != "") echo $get_action_status->checklist_action_comments;else echo $row_main_detail->comments;?>" data-toggle="modal" data-target="#ActionMyModal_<?=$row_main_detail->id?>"></span>
                              <?}  else if($get_action_status->action =="1") {?>
                              <span  class="glyphicon glyphicon-ok not-selected1" id="mod_btn" onclick="//update_action('0','<?=$row_main_detail->id?>','<?=$row_main_detail->comments ?>','<?=$get_action_status->checklist_action_comments?>','')" data-current_act="<?=$get_action_status->action ?>" data-userid="<?php echo $row_main_detail->task_desc ?>" data-userid2="<?if($get_action_status->action_required != ""){echo $get_action_status->action_required;}else if($get_action_status->checklist_action_comments != "") echo $get_action_status->checklist_action_comments;else echo $row_main_detail->comments;?>" data-toggle="modal" data-target="#ActionMyModal_<?=$row_main_detail->id?>"></span>
                              <?}  else { ?>
                              <span class="glyphicon glyphicon-ok glyphicon_gif" id="mod_btn" onclick="//update_action('1','<?=$row_main_detail->id?>','<?=$row_main_detail->comments ?>','<?=$get_action_status->checklist_action_comments?>','')" data-current_act="<?=$get_action_status->action ?>" data-userid="<?php echo $row_main_detail->task_desc ?>" data-userid2="<? if($get_action_status->action == "2"){
                                echo $get_action_status->action_required;
                                $temp_comments= $get_action_status->action_required;}
                                else if($get_action_status->action =="1" || $get_action_status->action =="3"){
                                echo $get_action_status->checklist_action_comments;
                                $temp_comments= $get_action_status->checklist_action_comments;} 
                                else {
                                  echo $row_main_detail->comments; 
                                  $temp_comments= $row_main_detail->comments;
                              } ?>" data-toggle="modal" data-target="#ActionMyModal_<?=$row_main_detail->id?>"></span>
                              <? }?>
                            </div>
                            <div class="col-sm-1">
                              <?     if($get_action_status->action =="0"){ ?>
                          <span id="mod_btn_2" class="glyphicon glyphicon-remove glyphicon_gif" id="gif_remove"  data-toggle="modal" data-target="#myModal2_<?=$row_main_detail->id?>"  data-temp="<?=$temp_comments?>" data-task="<?=$row_main_detail->task_desc ?>"></span>
                          <?}  else if($get_action_status->action =="2") {?>
                          <span id="mod_btn_2" class="glyphicon glyphicon-remove not-selected2" id="gif_remove"  data-toggle="modal" data-target="#myModal2_<?=$row_main_detail->id?>"  data-temp="<?=$temp_comments?>" data-task="<?=$row_main_detail->task_desc ?>"></span>
                          <?}  else { ?>
                          <span id="mod_btn_2" class="glyphicon glyphicon-remove glyphicon_gif" id="gif_remove"  data-toggle="modal" data-target="#myModal2_<?=$row_main_detail->id?>"  data-temp="<?=$temp_comments?>" data-task="<?=$row_main_detail->task_desc ?>"></span>
                          <? }?>
                        </div>
                        <div class="col-sm-1">
                          <?     if($get_action_status->action =="0"){ ?>
                          <span class="glyphicon glyphicon-plus glyphicon_gif"  id="mod_btn" style="color: black" onclick="//update_action('3','<?=$row_main_detail->id?>','<?=$row_main_detail->comments ?>','<?=$get_action_status->checklist_action_comments?>','') data-current_act="<?=$get_action_status->action ?>" data-userid="<?php echo $row_main_detail->task_desc ?>" data-userid2="<?if($get_action_status->action_required != ""){echo $get_action_status->action_required;}else if($get_action_status->checklist_action_comments != "") echo $get_action_status->checklist_action_comments;else echo $row_main_detail->comments;?>" data-toggle="modal" data-target="#NAMyModal_<?=$row_main_detail->id?>"">
                            <span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px white;color: white">N/A</span>
                          </span>
                          <?}  else if($get_action_status->action =="3") {?>
                          <span class="glyphicon glyphicon-plus not-selected3"  id="mod_btn" style="color: black" onclick="//update_action('0','<?=$row_main_detail->id?>','<?=$row_main_detail->comments ?>','<?=$get_action_status->checklist_action_comments?>','')" data-current_act="<?=$get_action_status->action ?>" data-userid="<?php echo $row_main_detail->task_desc ?>" data-userid2="<?if($get_action_status->action_required != ""){echo $get_action_status->action_required;}else if($get_action_status->checklist_action_comments != "") echo $get_action_status->checklist_action_comments;else echo $row_main_detail->comments;?>" data-toggle="modal" data-target="#NAMyModal_<?=$row_main_detail->id?>">
                            <span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px white;color: white">N/A</span>
                          </span>
                          <?}  else { ?>
                          <span class="glyphicon glyphicon-plus glyphicon_gif"  id="mod_btn" style="color: black" onclick="//update_action('3','<?=$row_main_detail->id?>','<?=$row_main_detail->comments ?>','<?=$get_action_status->checklist_action_comments?>','')" data-current_act="<?=$get_action_status->action ?>" data-userid="<?php echo $row_main_detail->task_desc ?>" data-userid2="<?if($get_action_status->action_required != ""){echo $get_action_status->action_required;}else if($get_action_status->checklist_action_comments != "") echo $get_action_status->checklist_action_comments;else echo $row_main_detail->comments;?>" data-toggle="modal" data-target="#NAMyModal_<?=$row_main_detail->id?>">
                            <span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px white;color: white">N/A</span>
                          </span>
                          <? }?>
                        </div>
                        <?if(($check_exist_action > 0) AND ($get_action_status->action == "1" OR $get_action_status->action == "3") ){ ?>
                        <div class="col-sm-1"><span id="mod_btn" class="glyphicon glyphicon-edit glyphicon_gif" id="gif_edit" data-toggle="modal" data-target="#myModal_<?=$row_main_detail->id?>" data-current_act="<?=$get_action_status->action ?>" data-userid="<?php echo $row_main_detail->task_desc ?>" data-userid2="<? if($get_action_status->action == "2"){echo $get_action_status->action_required; $temp_comments= $get_action_status->action_required;}else if($get_action_status->action =="1" || $get_action_status->action =="3") {echo $get_action_status->checklist_action_comments; $temp_comments= $get_action_status->checklist_action_comments;} else {
                        echo $row_main_detail->comments; $temp_comments= $row_main_detail->comments;} ?>"></span></div>
                        <?}?>
                        <!-- Comment for Action Modal -->

                        <?if(($check_exist_action > 0) AND ($get_action_status->action == "2") ){ ?>
                        <div class="col-sm-1">
                          <span id="mod_btn_2" class="glyphicon glyphicon-edit glyphicon_gif" id="gif_remove"  data-toggle="modal" data-target="#myModal2_<?=$row_main_detail->id?>"  data-temp="<?=$temp_comments?>" data-task="<?=$row_main_detail->task_desc ?>"></span>
                        </div>
                        <?}?>
                        <script type="text/javascript">
                          $(document).on("click", "#mod_btn", function () {
                            var Id = $(this).data('userid');
                            var Id2 = $(this).data('userid2');
                            var cur_act= $(this).data('current_act');
                            $(".modal-body #main_comment_modal").html(Id);
                            $(".modal-body #current_act").val(cur_act);
                            $(".modal-footer #action_comment_modal").val(Id2);
                            $('.action_modal_text_area').css('background-color','white');    
                          });
                          $(document).on("click", "#mod_btn_2", function () {
                            var Id = $(this).data('temp');
                            var task_name= $(this).data('task');
                            $(".modal-body #action_comment_temp"+'<?=$row_main_detail->id ?>').css('color','#FF0000');
                            $(".modal-body #action_comment_temp<?=$row_main_detail->id?>").val(Id);
                            $(".modal-body #task_name").val(task_name);    
                          });
                          $(document).on("click", "#mod_btn_3", function () {
                            var Id = $(this).data('temp');
                            var task_name= $(this).data('task');
                            $(".modal-body #action_comment_temp2").css('color','#FF0000');
                            $(".modal-body #action_comment_temp2").val(Id);
                            $(".modal-body #task_name2").val(task_name);    
                          });
                        </script>
                        </div>
                        <div class="col-sm-8">
                          <div class="glyphicon_gif_flip">
                            <span class="glyphicon glyphicon-refresh" title="Flip /Close" style="color: #fff" onclick="flip_content(<?=$row_main_detail->id ?>)"></span>
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
                          <button type="button" class="btn btn-default" data-dismiss="modal" style="float: right; border: none;color: #10869D;"  onclick="update_action($('#current_act').val(),'<?=$row_main_detail->id?>','<?=$row_main_detail->comments?>',$('#hidden_action_<?=$row_main_detail->id ?>').val(),'')">OK</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal" style="border: none;color: #10869D;">Close</button>
                          <center style="margin-top: -30px"><h5 class="modal-title"><b>Task</b></h5></center>
                        </div>
                        <div class="modal-body" style="height: 175px">
                          <p id="main_comment_modal"></p>
                          <input type="hidden" name="" id="current_act">
                        </div>
                        <center style="margin-right: 30px"><b>Comment</b></center>
                        <div class="modal-footer" style="height: 130px">
                          <!-- <input type="text" placeholder="Comment Here..." style="height: 70px; width: 100% ; border:none; outline: none;word-break: break-word;"> -->
                          <textarea id="action_comment_modal" class="action_modal_text_area action_modal_<?=$row_main_detail->id ?>" placeholder="Comment Here..." rows="4" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important" ></textarea>
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
                    <div class="modal-dialog">
                      <div class="modal-content" style="background: #393848 !important;">
                        <div class="modal-header" style="border-bottom: none;">
                          <button type="button" class="close" data-dismiss="modal" style="color: #C9D5D8">&times;</button></div>
                          <div class="modal-body">
                            <label class="label_blue">Task</label>
                            <textarea id="task_name" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 10px;padding: 6px 12px 6px 25px;" readonly></textarea>
                            <div class="" style="margin-top: 10px">
                              <label class="label_blue">Action Required</label>
                              <textarea  class="form-control form-control-left-radius" name="" id="action_comment_temp<?=$row_main_detail->id?>" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 10px !important;padding: 6px 12px 6px 25px;" > </textarea>
                            </div>
                            <input type="hidden" name="hidden_action_temp" id="hidden_action_temp<?=$row_main_detail->id?>" value="<? echo $temp_comments?>">
                              <script type="text/javascript">
                                $('#action_comment_temp<?=$row_main_detail->id?>').bind('keypress keyup blur', function() {
                                  $('#hidden_action_temp<?=$row_main_detail->id?>').val($(this).val());
                                });
                              </script>
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
                            <button type="button" class="btn btn-default"  style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;color: #fff" onclick="update_action_response('2',$('#hidden_action_temp<?=$row_main_detail->id?>').val(),<?=$row_main_detail->id?>,$('#select_emp_<?=$row_main_detail->id ?>').val(),$('#target_date').val())">Save</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;float: left;color: #fff">Cancel</button>
                          </div>
                        </div>  
                      </div>
                    </div>
                  </tbody>        
                </table>
              <? } ?>