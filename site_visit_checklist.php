<?
  session_start();
  // error_reporting(0);
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
  $get_main_detail=$conn->query("select * from tbl_sm_report_main where project_id='".$_SESSION['admin']."' order by task_number");

  $get_task_observed=$conn->query("select *,tbl_sm_report_task_obs.id,tbl_sm_report_task_obs.udid as checklist_udid,tbl_sm_report_task_obs.emp_id as employees_id FROM tbl_sm_report_task_obs INNER JOIN tbl_sm_report_action on tbl_sm_report_task_obs.id = tbl_sm_report_action.row_id AND tbl_sm_report_action.is_task_obs = '1' WHERE  tbl_sm_report_task_obs.udid ='".$_SESSION['udid_report']."' order by  tbl_sm_report_task_obs.task_number");

 $get_action_required_content= $conn->query("select *,tbl_sm_report_action.row_id,tbl_sm_report_action.id as action_id,tbl_sm_report_main.task_number as main_tasknumber,tbl_sm_report_action.emp_id as action_emp,tbl_sm_report_main.task_desc as main_taskdesc  FROM tbl_sm_report_action left join tbl_sm_report_main on (tbl_sm_report_main.id = tbl_sm_report_action.row_id) 
left join tbl_sm_report_task_obs on (tbl_sm_report_action.row_id=tbl_sm_report_task_obs.id)  
WHERE  (
(tbl_sm_report_action.action = '2')


AND (tbl_sm_report_action.checklist_udid = '".$_SESSION['udid_report']."'  OR tbl_sm_report_action.checklist_udid is null )  )");


  $get_max_task_number=$conn->query("select max(task_number) as max_number from tbl_sm_report_task_obs where udid='".$_SESSION['udid_report']."'")->fetch_object();

$count_action = $conn->query("select count(*) as count  FROM tbl_sm_report_action left join tbl_sm_report_main on (tbl_sm_report_main.id = tbl_sm_report_action.row_id) 
left join tbl_sm_report_task_obs on (tbl_sm_report_action.row_id=tbl_sm_report_task_obs.id)  
WHERE  ((tbl_sm_report_action.action = '2')
AND (tbl_sm_report_action.checklist_udid = '".$_SESSION['udid_report']."'  OR tbl_sm_report_action.checklist_udid is null )  )")->fetch_object();
 $act_count= $count_action->count;


?>
<header>
  <? include('header.php'); ?>
  <? //include('test_side_new.php');?>
<script type="text/javascript"> var selected2 = [];</script>
  <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" type="text/css" />

</header>
<script>
  /*script for task observed flip*/

  var checkFlip = 0;
  function flip_action_task_obs(id)
  {
    if(checkFlip == '0')
    {
      checkFlip=1;
      $('.action_task_obs').hide();
      $('#content_task_'+id).fadeOut('slow').hide('slow');
      $('#action_task_obs'+id).fadeIn('slow').show();
    }
    else
    {
      alert('Select Action for the Previous Task or Close it');
    }
  }

  function flip_content_task_obs(id)
  {
    checkFlip=0;
    $('#content_task_'+id).fadeIn('slow').show();
    $('#action_task_obs'+id).fadeOut('slow').hide('slow');
  }
  /*End Of Script*/

  function update_task(id,action,comment)
  {
    //alert(id+' '+action+' '+comment);
    $.ajax({
      type: "POST",
      url: "ajax_update_task_obs.php",
      data: {id:id, action: action, comment:comment},
      success: function(data) {
        //console.log(data);return false;
        if(data == '1')
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
  function update_task_action_required(id,action,resp,tsk,target_date)
  {
    //alert(id+' '+action+' '+resp+' '+tsk+' '+target_date);
    $.ajax({
      type: "POST",
      url: "ajax_update_task_obs.php",
      data: {id:id, action: action, emp_id: resp, comment: tsk, tdate: target_date },
      success: function(data) {
        //alert(data);console.log(data);return false;
        if(data == '1')
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
<div class="bluebackground  col-md-12 col-sm-12" style="padding-right: 0px; padding-left: 0px">
<div class="main_form_header_site_visit tab_site_visit ">
  <div class="col-md-12" style="padding-top: 5vh; padding-left: 0px;">
   
    <div class="col-md-4 col-xs-6 main_title_container pull-left">
      <div class="col-md-2 pull-left" style="padding: 0px; margin-left: -5px;z-index: 111;">  <? include('modbutton_visit.php'); ?></div>
       <div class="col-md-10 headerpadding" style="padding: 0px;"> 
      <legend class="main_title_blue">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
      <label class="control-label rightpadding"><span class="form-name_blue" style="color: rgb(191, 184, 184) !important;">SENIOR MANAGEMENT SITE VISIT REPORT&nbsp;</span></label>
      <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div></div>
     <div class="col-sm-4 datetop " style="margin-top: 10vh;p"><button data-toggle="modal" data-target="#myModal_date" class="btn" style="font-family: 'Avenirnext';outline: none; margin-left: 32px;font-size: 14px;border: 2px solid #49617B;border-radius: 25px; padding: 5px;padding-left: 20px;padding-right: 20px;background: #49617B;"><span class="bottom_text datefont" style="font-family: 'Avenirnext';font-size: 14px;border: 2px solid #49617B;border-radius: 25px; background: #49617B;"><?=date("d F Y ") ?><img class="dateimage" src="image/homedate.png" style="margin-left: 3%;margin-bottom: 3px;"></span></button></div>
    <div class="col-md-3 form_logo_container ">
      <img class="logowidth" src="image/logo.png" width="17%" style="image-rendering: pixelated;width :14vh;margin-right: 42px;">
    </div>
  </div> 
</div>
<div class="modal fade modal-open_1 modal_1" id="myModal_date" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <center> <button type="button" class="btn btn-default" data-dismiss="modal">&times;</button></center>
      </div>
      <div class="modal-body modal-body_1">               
        <iframe src="mdate_visit.php"  frameborder="0"></iframe>
      </div>
    </div>  
  </div>
</div>
<div class="header_checklist">
 <!--  <div style="height: 75%"> -->
    <!-- <div class="col-md-12">
      <div class="col-sm-4"></div>
      <div class="col-sm-8"><span class="bottom_text" style="font-family: 'Avenirnext'; margin-left: 32px;font-size: 14px;border: 2px solid #49617B;border-radius: 25px; padding: 5px;padding-left: 20px;padding-right: 20px;background: #49617B;"><?=date("d F Y ") ?><img src="image/homedate.png" style="margin-left: 38px;margin-bottom: 3px;"></span></div>
    </div> -->
    <div class="col-md-12" style="padding: 0px;">
      <div class="tab">
        <div class="col-sm-4 text-center"><button class="tablinks" onclick="openCity(event, 'leftTab')">TASK OBSERVED</button></div>
        <div class="col-sm-4 text-center"><button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">CHECKLIST</button></div>
        <div class="col-sm-4 text-center"><button class="tablinks" onclick="openCity(event, 'Paris')">ACTION REQUIRED
        <span class="badge actioncount" style="background: red;padding: 5px 7px;margin-bottom: 13px;border-radius: 100%; "><? if($act_count > 0) {?><div style="height: 0px;"></div><? }?></span></button></div>
      </div>
    
  </div>
  <!-- </div>
  <div style="height: 25%;"> -->
    <div class="col-md-12 checklist_head" style="height: 34%;" >
      <div class="col-md-2 col-sm-2" style="padding-left: 5%;"><span class="blue_table_label">No</span></div>
      <div class="col-md-8 col-sm-8 text-left" style="padding-left: 5px;"><span class="blue_table_label">TASK/ COMMENTS</span></div>
      <div class="col-md-2 col-sm-2 headeryesno" style="text-align: center;"><span class="blue_table_label ">YES/NO/NA</span></div>
    </div>
 <!--  </div> -->
</div>
<div class="body_checklist">
  <div class="col-md-12" style="padding-right: 0px; padding-left: 0px;" >
    <form class=" form-horizontal well_class" action=" " method="post"  id="contact_form"  enctype="multipart/form-data" style="border: none;">
      <fieldset>
        <div class="form-group">
          <div class="col-sm-12" style="padding-right: 0px; padding-left: 0px;">
            <div id="leftTab" class="tabcontent">
               <?  if($get_max_task_number->max_number == NULL) $t_no=0; else $t_no=$get_max_task_number->max_number;$t_no++;
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

                  $get_emp_task=$conn->query("select tbl_employee.id as induction_id, tbl_employee.given_name,tbl_employee.surname as name,tbl_employee.pin,tbl_employee.email_add,GROUP_CONCAT(tbl_employee.email_add) as email_add_all,tbl_induction_register.project_id,tbl_employee.contact_phone,tbl_employee.job_title,tbl_employer.company_name,tbl_employer.tread,tbl_induction_register.empid  as employer_id  FROM tbl_employee JOIN tbl_induction_register ON tbl_employee.id = tbl_induction_register.id JOIN tbl_employer ON tbl_employer.id = tbl_induction_register.empid  WHERE tbl_employee.id IN (".$email_add_all_str.") group by tbl_induction_register.project_id")->fetch_object();

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
                    <div style="word-break: break-word; padding: 3px 0px 3px 0px"><?=$get_emp_task->email_add_all;?></div>
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
                      <div class=" col-sm-12 table table-bordred blue_table_label " style="background-color: #283A50;color: #fff;margin-top: -4px;padding-top: 10px;padding-bottom: 10px;">
                      <div class="col-sm-4"></div>
                      <div class="col-sm-8" style="height: 20%;padding: 10px">         
                        <div style="text-align:center" class="votes tickwidth">
                        <!-- Tick Yes Module Begins-->
                          <div class="col-sm-1">
                            <?
                              if ($get_action_status_task->action == "0") 
                              {
                            ?>
                            <span class="glyphicon glyphicon-ok glyphicon_gif" id="task_btn" onclick="//update_tick('<?= $row_main_detail->id ?>','1')" data-current_act="<?=$get_action_status_task->action ?>" data-userid="<?php echo $comm ?>" data-userid2="<?=$row_main_detail_task->task_desc?>" data-toggle="modal" data-target="#Action_Task_MyModal_<?=$row_main_detail_task->id?>" data-act="1"></span>
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
                                  <button type="button" class="btn btn-default" data-dismiss="modal" style="float: right; border: none;color: #007AFF;background-color: #F5F5F5;outline: none;" onclick="flip_content_task_obs(<?=$row_main_detail_task->id ?>);if($('#action_comment_modal_<?=$row_main_detail_task->id?>').val() == ''){ alert('Please Enter the comments');return false;}else{update_task('<?=$row_main_detail_task->id?>',$('#hidden_na_<?=$row_main_detail_task->id?>').val(),$('#action_comment_modal_<?=$row_main_detail_task->id?>').val())}">OK</button>
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
                          <div class="col-sm-1">
                            <?
                              if ($get_action_status_task->action == "0") 
                              {
                            ?>
                            <span style="-webkit-text-stroke: 4px #AAAAAA;" id="task_btn2" class="glyphicon glyphicon-remove glyphicon_gif gif_remove" data-toggle="modal" data-target="#Task_Obs_myModal_<?=$row_main_detail_task->id ?>" data-userid="<?=$row_main_detail_task->task_desc ?>" data-userid2="<? echo $comm ?>"></span>

                            <?
                              } 
                              else if ($get_action_status_task->action == "2") 
                              {
                            ?>
                              <span style="background-color: #d15462 !important;" id="task_btn2" class="glyphicon glyphicon-remove not-selected2  gif_remove" data-toggle="modal"  data-target="#Task_Obs_myModal_<?=$row_main_detail_task->id ?>" data-userid="<?=$row_main_detail_task->task_desc ?>" data-userid2="<? echo $comm ?>"></span>
                            <?
                              }
                              else
                              {
                            ?>
                            <span style="-webkit-text-stroke: 4px #AAAAAA;" id="task_btn2" class="glyphicon glyphicon-remove glyphicon_gif gif_remove" data-toggle="modal"   data-target="#Task_Obs_myModal_<?=$row_main_detail_task->id ?>"  data-userid="<?=$row_main_detail_task->task_desc ?>" data-userid2="<? echo $comm ?>"></span>
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
                                    <textarea id="task_name" class="action_comment_modal" rows="4" style="height: 70px; width: 100%;border:none; outline: none; resize: none; background-color:#fff !important; border-radius: 2vh; padding: 6px 12px;color: black;text-align: center;" readonly></textarea>
                                    <div class="" style="margin-top: 10px">
                                      <label class="label_blue" style="color: rgb(88, 84, 84) !important">Action Required</label>
                                      <input type="text" class="form-control form-control-left-radius ac_req redcolor" name="" id="action_comment_temp<?=$row_main_detail_task->id?>" style="height: 50px;color:rgb(255, 0, 0)!important; border-radius: 2vh;text-align: center;" > 
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
                         <div class="col-sm-1">
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
                          <div class="col-sm-1">
                            <span id="task_btn" class="glyphicon glyphicon-edit glyphicon_gif" data-toggle="modal" data-target="#Action_Task_MyModal_<?=$row_main_detail_task->id?>" data-userid="<?php echo $comm ?>" data-userid2="<?=$row_main_detail_task->task_desc ?>">
                            </span>
                          </div>
                          <?
                            }

                            else if ($get_action_status_task->action == "2") 
                            {
                          ?>
                          <div class="col-sm-1">
                            <span id="task_btn2" class="glyphicon glyphicon-edit glyphicon_gif" data-toggle="modal" data-target="#Task_Obs_myModal_<?= $row_main_detail_task->id ?>" data-userid="<?=$row_main_detail_task->task_desc ?>" data-userid2="<? echo $comm ?>"></span>
                          </div>
                          <?
                            }

                          ?>
                          <div class="col-sm-8" style="padding-right: 45px;">
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
        <!-- <label class="col-md-1 control-label"></label>
            <div class="col-md-2">
          </div>
          <div class="col-md-5" style="margin-left: 40px;">
              <input type="button" id="submit_later" name="save_later" value="Submit" class="btn btn-warning form_submit_button" onclick="save_checklist()">
          </div> -->
        </div>
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
                    <textarea id="taskObserved" class="lefttab_background lefttab_background1" rows="4" style="height: 70px; text-align-last: center;width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 2vh;padding: 6px 12px;"></textarea>
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
                        <center>
                          <span class="glyphicon glyphicon-ok glyphicon_gif gif_ok" style="margin-right: 15px" onclick="showhide(1)"></span>
                          <span class="glyphicon glyphicon-remove glyphicon_gif  gif_remove " id="crosswhite" style="margin-right: 15px;-webkit-text-stroke: 4px #AAAAAA;" onclick="showhide(2)"></span>
                          <script>
                            $(document).ready(function(){
                               $(document).on("click", "#crosswhite", function (){
                                $("#crosswhite").css({ '-webkit-text-stroke':'4px #d15462'});
                              })
                            })
                            
                            // $(document).ready(function(){
                            //    $(document).on("click", "#buttonTaskobserved", function (){
                            //     $("#buttonTaskobserved").css({ '-webkit-text-stroke':'4px #AAAAAA'});
                            //   })
                            // })
                          </script>
                          <span class="glyphicon glyphicon-plus glyphicon_gif gif_na" style="color: black">
                            <span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px white;color: white;font-size: 12px;" onclick="showhide(3)">N/A</span>
                          </span>
                        </center>
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
                    <div class="col-sm-12" style="padding-top: 10px;">
                    <button type="button" class="btn btn-default"  style="background-color:#f47821 ;outline: none;border-radius:6vh;outline: none;border:none;color: #fff;width: 10vw" onclick="saveData()">Save</button></div>
                   <!--  <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;float: left;color: #fff" id="closeModCancel">Cancel</button> -->
                  </div>
                </div>
                </div>  
     
              </div>

            
            <!--End of modal box-->
            <div id="London" class="tabcontent">
              <?
                while($row_main_detail=$get_main_detail->fetch_object())
                {
                  $get_action_status=$conn->query("select * from tbl_sm_report_action where row_id='".$row_main_detail->id."' and checklist_udid = '".$_SESSION['udid_report']."'")->fetch_object();
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
                      <div id="span2" class="t r" style="text-align: center;padding:3px 0px 3px 0px"><br>
                      <?
                        if ($row_main_detail->comments != "") 
                        {
                      ?>
                        <span class="glyphicon glyphicon-pencil" ></span>&nbsp;
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
                          <div id="span2" class="t r" style="padding:3px 0px 3px 0px">
                            
                            <?
                              echo $get_action_status->action_required;
                            ?>
                          </div>
                        <?
                        }
                        else
                        {
                        ?>
                      <div id="span2" class="t r" style="padding:3px 0px 3px 0px"><br>
                      <?                          
                        if ($get_action_status->checklist_action_comments != "") 
                        {
                      ?>
                        <span class="glyphicon glyphicon-pencil" ></span>&nbsp;
                        <?
                          echo $get_action_status->checklist_action_comments;
                          $temp_comments = $get_action_status->checklist_action_comments;
                        }
                        else 
                        {
                        ?>
                        <span class="glyphicon glyphicon-pencil" ></span>&nbsp;
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
                      <div class="col-sm-4"></div>
                      <div class="col-sm-8" style="height: 20%;padding: 10px;">         
                        <div style="text-align:center" class="votes tickwidth">
                        <!-- Tick Yes Module Begins-->
                          <div class="col-sm-1">
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
                          <div class="col-sm-1">
                            <?
                              if ($get_action_status->action == "0") 
                              {
                            ?>
                            <span style="-webkit-text-stroke: 4px #AAAAAA;" id="mod_btn_2" class="glyphicon glyphicon-remove glyphicon_gif" id="gif_remove"  data-toggle="modal" data-target="#myModal2_<?= $row_main_detail->id ?>" data-task="<?=$row_main_detail->task_desc ?>" data-id="<?=$row_main_detail->id ?>" data-comment="<? if($get_action_status->checklist_action_comments !="") echo $get_action_status->checklist_action_comments; else echo $row_main_detail->comments; ?>"></span>

                            <?
                              } 
                              else if ($get_action_status->action == "2") 
                              {
                            ?>
                              <span id="mod_btn_2" class="glyphicon not-selected2 glyphicon-remove" id="gif_remove"  data-toggle="modal" data-task="<?=$row_main_detail->task_desc ?>" data-target="#myModal2_<?= $row_main_detail->id ?>" data-id="<?=$row_main_detail->id ?>"  data-comment="<?=$get_action_status->action_required ?>"></span>
                            <?
                              }
                              else
                              {
                            ?>
                            <span style="-webkit-text-stroke: 4px #AAAAAA;" id="mod_btn_2" class="glyphicon glyphicon-remove  glyphicon_gif" id="gif_remove"  data-toggle="modal" data-task="<?=$row_main_detail->task_desc ?>"  data-target="#myModal2_<?= $row_main_detail->id ?>" data-id="<?=$row_main_detail->id ?>"  data-comment="<? if($get_action_status->checklist_action_comments !="") echo $get_action_status->checklist_action_comments; else echo $row_main_detail->comments ?>"></span>
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
                                    <textarea id="task_name" class="mod_btn_2_modalbackground" rows="4" style="height: 52px; width: 100%;border:none; outline: none; resize: none; border-radius: 2vh !important; padding: 6px 12px;color: black;text-align: center;" readonly></textarea>
                                    <div class="" style="margin-top: 10px">
                                      <label class="label_blue" style="color: rgb(88, 84, 84) !important">Action Required</label>
                                      <input type="text" class="form-control form-control-left-radius mod_btn_2_modalbackground" name="" id="action_comment_temp<?=$row_main_detail->id?>" style="height: 50px;text-align: center; border-radius: 1.5vh !important;" > 
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
                                      <input type="text" class="form-control form-control-left-radius datepicker " style="text-align: center;background-color: #fff !important;" name="" id="target_date">
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
                                    <button type="button" class="btn btn-default"  style="background-color:#f47821 ;outline: none;border-radius:6vh;outline: none;border:none;color: #fff;margin-right: 39.5%;width: 17%;height: 25%;" onclick="if($('#target_date').val() == ''){ alert('Please Select Date...');return false;}else{update_remove('2',<?= $row_main_detail->id ?>,$('#select_emp_<?= $row_main_detail->id ?>').val(),$('#action_comment_temp<?=$row_main_detail->id?>').val(),'<?=$row_main_detail->comments ?>',$('#target_date').val())}">Save</button>
                                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;float: left;color: #fff">Cancel</button> -->
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- NA Module Begain-->
                          <div class="col-sm-1">
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
                          <div class="col-sm-1">
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
                          <div class="col-sm-1">
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

                          <div class="col-sm-8" style=" padding-right: 45px;">
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
                              // alert("helo");
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
              <div class="form-group" style="margin-bottom: 30px !important">
        <label class="col-md-1 control-label"></label>
            <div class="col-md-2">
          </div>
          <div class="col-md-5" style="margin-left: 40px;">
              <input type="button" id="submit_later" name="save_later" value="Submit" class="btn btn-warning form_submit_button" onclick="save_checklist()">
          </div>
        </div>
            </div>



   <div id="Paris" class="tabcontent">
      <?
while ($row_action_required_detail = $get_action_required_content->fetch_object()) {
    
    $get_resp_email = $conn->query("select id,email_add from tbl_employee where  id='" . $row_action_required_detail->action_emp. "'")->fetch_object();
?>
              <table id="mytable" class="table table-bordred " style="    background-color: #283A50;
    color: #fff;">
<tbody>

    
    <tr class="content_tr" id="mod_btn_3" data-toggle="modal" data-target="#myModal2_action_<?= $row_action_required_detail->id ?>"  data-temp="<?
        echo $row_action_required_detail->action_required;
?>" data-task="<?if($row_action_required_detail->is_task_obs == '1') {echo $row_action_required_detail->task_desc;} else echo $row_action_required_detail->main_taskdesc;  ?>">
   
     
      <td style="padding-left: 5.3%;vertical-align: middle;" class="col-sm-2"><? if($row_action_required_detail->is_task_obs == '1') {echo $row_action_required_detail->task_number;} else echo $row_action_required_detail->main_tasknumber; ?></td> 
      <td style="text-align: left;padding-top: 15px" class="col-sm-8"><p><?if($row_action_required_detail->is_task_obs == '1') {echo $row_action_required_detail->task_desc;} else echo $row_action_required_detail->main_taskdesc;  ?></p>
         <div id="span2" class="t r" style="text-align: left;"><p><b>Action Required : </b><?
    
        echo " ".$row_action_required_detail->action_required;
   
?></p><p> <b> Action Complete : </b>
         <?= " ".$row_action_required_detail->action_complete; ?></p>
        <p> <b>Resp : </b><?=" ". $get_resp_email->email_add; ?></p>
         <p><b>Target Date : </b><?= " ".$row_action_required_detail->target_date ?></p>
        </div>


      </td>    
    <td style="text-align: center;vertical-align: middle;" class="col-sm-2"><span  class="glyphicon glyphicon-remove not-selected2 not-selectedtick2 glyphicontab-remove" id="gif_ok"></span></td>

    </tr>


  <div class="modal fade" id="myModal2_action_<?= $row_action_required_detail->id ?>" role="dialog">
    <div class="modal-dialog" style="height: 150px">
      <div class="modal-content" style="border-radius: 25px;background-color: #F5F5F5;text-align: center;">
        <div class="modal-header" style="border-bottom: none;padding: 0px">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:50%;float: right;margin-top: -15px;margin-right: 20px;outline: none;border: none;width: 40px;height: 40px;">&#x2715;</button>
        </div>
        <div class="modal-body" style="padding-bottom: 0px;padding-top: 0px;">

          <label class="label_blue" style="color: rgb(88, 84, 84) !important">Task Observed</label>
         
     <textarea id="task_name2" class="mod_btn_3_modal_background"  rows="4" style="height: 52px; width: 100%;border:none; outline: none; resize: none; border-radius: 2vh !important; padding: 6px 12px;color: black;text-align: center;" readonly></textarea>

          <div class="" style="margin-top: 10px">
           <label class="label_blue" style="color: rgb(88, 84, 84) !important">Action Required</label>
          <input type="text" class="form-control form-control-left-radius" name="" id="action_comment_temp2" style="height: 50px;text-align: center; border-radius: 1.5vh !important;" readonly> 
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
$('.datepicker_<?= $row_action_required_detail->action_id ?>').datepicker('setDate',new Date("<?= $row_action_required_detail->target_date ?>") );


            </script>

        </div>
        
        <div class="modal-footer" style="border-top: none;">
          <button type="button" class="btn btn-default"  style="background-color:#f47821 ;outline: none;border-radius:6vh;outline: none;border:none;color: #fff;margin-right: 39.5%;width: 17%;height: 25%;" onclick="update_action_required_edit('<?= $row_action_required_detail->action_id ?>',$('#select_<?= $row_action_required_detail->action_id ?>').val(),$('#target_date_<?= $row_action_required_detail->action_id ?>').val())">Save</button>
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
      <label style="color: #fff;font-size: 1.2em;border: none;font-weight: bold;font-family: 'Avenirnext' !important;margin-bottom: 5px;padding-left: 0px;">DETAILS OF PERSON COMPLITING THIS FORM</label></div>
          <div class="col-sm-4">
          <label class="label_blue">Name</label>
          <input type="text" class="form-control form-control-left-radius" value="<?= $get_person_details->name ?>" name="" readonly>
          </div>
          <div class="col-sm-4 ">
          <label class="label_blue">Position</label>
          <input type="text" class="form-control form-control-left-radius" value="<?= $get_person_details->job_title ?>" name="" readonly>
          </div>
           <div class="col-md-4 submitaction" style="margin-top: 5px;width: 15%;float: right;margin-right: 25px;">

              <input type="button" id="submit_later" name="save_later" value="Submit" class="btn btn-warning form_submit_button" onclick="save_checklist()">
          </div>

    </div>
            </div>
          </div>
        </div>
       <!--  <div class="form-group">
        <label class="col-md-1 control-label"></label>
            <div class="col-md-2">
          </div>
         
        </div> -->
      </fieldset>
    </form>
    <style type="text/css">
      .footer_date{
        padding-left: 16vw !important;
        padding-top: 4vh !important;
        font-size: 0.9vw !important;
      }
    </style>
    <div id="margin_set"></div>    
    <? include("Checklist_visit_footer/footer_new.php"); ?>
  </div>
</div> 
</div>


<script>
  // $(document).ready(function(){
  //   $('.glyphicon-remove').css({ '-webkit-text-stroke':'4px #AAAAAA'});
  // });
  $(document).on("click", "#buttonTaskobserved", function () {
    // $('.glyphicon-remove').addClass('glyphiconwhite-remove');
     //$('.glyphicon-remove').css({ '-webkit-text-stroke':'4px #AAAAAA'});
  });
  $(function () {
    $(document).on("hidden.bs.modal", "#modalTaskObserved", function () {
      $(this).find('textarea').val('');
      $(this).find('input').val('');
      $(this).find('select').val('');

      //$("#example-getting-started option:selected").removeAttr("selected");

      $('#Tgreen').hide();
      $('#Tred').hide();
      $('.gif_ok').css('background-color','#AAAAAA');
   //   $('.gif_remove').css('background-color','#AAAAAA;');
      $('.gif_na').css('background-color','#AAAAAA;');
      $('.lefttab_background1').css('text-align-last','center');
      $('.gifred').css('background-color','#AAAAAA');
      $("#crosswhite").css({ '-webkit-text-stroke':'4px #AAAAAA'});
      //$(this).removeClass('gifred');
      //$('.caret').css('float','right');
    //  $('.glyphicon-remove').css({ '-webkit-text-stroke':'4px #AAAAAA'});
      //$('.glyphicon-remove:before').css({ '-webkit-text-stroke':'4px'});
    });
  });

  var flag = 0;
  function showhide(event)
  {
    $('.test_hide').val(event);
    if(event == 1)
    {
      $('#Tred').hide();
      $('#Tgreen').show();
      $('#actionRequired').val('');
      $('#respPerson').val('');
      $('#targetDate').val('');
      $('#Comments').val('');
      $('.gif_ok').css('background-color','#4cad74');
      $('.gif_remove').css('background-color','#AAAAAA;');
      $('.gif_na').css('background-color','#AAAAAA;');
      $('.glyphicon-remove').css({ '-webkit-text-stroke':'4px #AAAAAA'});

      $('#hideAction').val(event);
      return flag = 1;
    }
    else if(event == 2)
    {
      $('#Tgreen').hide();
      $('#Tred').show();
      $('#Comments').val('');
      $('.gif_remove').css('background-color','#d15462');
      // $('.body_height').css('height','75vh');
      $('.gif_na').css('background-color','#AAAAAA;');
      $('.gif_ok').css('background-color','#AAAAAA;');
      $('#hideAction').val(event);
      $(this).addClass('gifred');
     // $(this).addClass('glyphiconred_remove');
    // $('.glyphicon-remove').css({ '-webkit-text-stroke':'4px #d15462'});
     // $(this).removeClass('glyphicon-remove');
      return flag = 1;
    }
    else if(event == 3)
    {
      $('#Tred').hide();
      $('#Tgreen').show();
      $('#actionRequired').val('');
      $('#respPerson').val('');
      $('#targetDate').val('');
       $('#Comments').val('');
      $('.gif_na').css('background-color','#D9763');
      $('.gif_ok').css('background-color','#AAAAAA;');
      $('.gif_remove').css('background-color','#AAAAAA;');
      $('.glyphicon-remove').css({ '-webkit-text-stroke':'4px #AAAAAA'});
      $('#hideAction').val(event);
      return flag = 1;
    }
  }

  function validation()
  {
    var taskOb = $('#taskObserved').val();
    var subContName = $('#subContName').val();
    var employees = selected2.length;
    if($('#Tgreen').css('display') != 'none')
    {
      if(taskOb == '' || subContName == '' || (employees == 0 || employees == "NULL" || employees == "undefined") || $('#Comments').val() == '')
      {
        if(flag == 1)
        {
          alert("Please Fill Complete Information...");
          return false;
        }
        if(flag == 0)
        {
          alert("Please Select Atleast One Action...");
          return false;
        }
      }
      else
      {
        return true;
      }  
    }
    else if($('#Tred').css('display') != 'none')
    {
      var actionRequired = $('#actionRequired').val();
      var respPerson = $('#respPerson').val();
      var targetDate = $('#targetDate').val();
      if(taskOb == '' || subContName == 'Select...' || employees == '' ||  actionRequired == '' || respPerson == '' || targetDate =='')
      {
        if(flag == 1)
        {
          alert("Please Fill Complete Information...");
          return false;
        }
        if(flag == 0)
        {
          alert("Please Select Atleast One Action...");
          return false;
        }
      }
      else
      {
        
        return true;
      } 
    }
    else
    {
      if(taskOb == '' || subContName == 'Select...' || employees == '')
      {
        alert("Please Fill Complete Information...");
        return false;
      }
      else
      {
        if(flag == 0)
        {
          alert("Please Select Atleast One Action...");
          return false;
        }
        else
        {
          return true;
        }
      }
    }
  }

  function save_checklist()
{

  $.ajax({
                        type: "POST",
                        url: "ajax_site_visit_save.php",
                       
                        
                        success: function(data) {
                        alert(data);
                            if(data=='1')
                            {

                              $.post("logout_udid_sm.php", {}, function(){
                                  alert("Checklist Saved Successfully !!");
                                  window.location.href="site_visit_new.php";
                                });
                              
                            }
                            else
                            {
                              alert('Please Select Actions for All Tasks !!');
                            }
                          
                             
                        }
                    });
}

  function saveData()
  {
    var valid = validation();
    var actionId = $('#hideAction').val();
    var taskObserved =  $('#taskObserved').val();    
    var employeeId = $('.hideempid').val();
    var comm = $('#Comments').val();
    var acreq = $('#actionRequired').val();
    var respPerson = $('#respPerson').val();
    var tdate = $('#targetDate').val();
    var employerId = $('#subContName').val();
     var task_number=$('.task_number').val();
    //alert(employerId);return false;
    if(valid)
    {
     
      $.ajax({
        type: "POST",
        url: "ajax_site_visit_checklist.php",
        data: {action: actionId,task_number: task_number, taskobs: taskObserved, empid: employeeId, comment: comm, actionRequired: acreq, respPerson: respPerson, trgtDate: tdate, employerId: employerId },
        success: function(data) {
          //console.log(data);return false;
          if(data == '1')
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
  }
</script>


<script type="text/javascript">
  var check=0;
  function flip_action(id)
  {
    // alert(id);
    if(check == '0')
    {
      check=1;
      //$('.action_tr_2').hide();
      $('#content_'+id).hide().fadeOut(500);
      $('#action_'+id).fadeIn(500).show(500);
    }
    else
    {
      alert('Select Action for the Previous Task or Close it');
    }
  }

  function flip_content(id)
  {
    check=0;
    $('#content_'+id).fadeIn(500).show();
    $('#action_'+id).fadeOut(500).hide();
    // alert('ok');
  }
   
  function update_tick(row_id,tick_yes,Actioncomment)
  {
    alert(Actioncomment);
    
    if(Actioncomment == '')
    {
      alert("Please Enter Comment...");
      return false;
    }
    //alert(tick_yes);
    else
    {
      $.ajax({
        type: "POST",
        url: "ajax_update_tick.php",
        data: {action: tick_yes,task_id: row_id , comment: Actioncomment},
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
  }

  function update_na(row_id,na,Actioncomment)
  {
    alert(Actioncomment);
   // var Actioncomment = $('.validActionComment').val();
   /* alert(Actioncomment);
    return false;*/
    if(Actioncomment == '')
    {
      alert("Please Enter Comment...");
      return false;
    }
    //alert(tick_yes);
    else
    {
    //alert(na);
      $.ajax({
        type: "POST",
        url: "ajax_update_na.php",
        data: {action: na,task_id: row_id,comment: Actioncomment},
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
  }


  function update_remove(action,task_id,emp_id,action_req,main_comment,target_date)
  {
    alert(action_req);
    $.ajax({
      type: "POST",
      url: "ajax_update_remove.php",
      data: {action: action,task_id: task_id,emp_id:emp_id,action_req:action_req,main_comment:main_comment,target_date:target_date},
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


  // update_comments(<?= $row_main_detail->id ?>,$('#action_comment_modal').val(),$('#main_comment_modal').val()
  function update_comments(task_id,action_comment,main_comment)
  {
    alert(action_comment);
    $.ajax({
      type: "POST",
      url: "ajax_update_comment.php",
      data: {task_id: task_id,main_comment:main_comment,action_comment:action_comment},
      success: function(data) {
        alert(data);
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

  function update_action_required_edit(task_id,emp_id,target_date) 
  {
    // alert(action_comment);
    $.ajax({
      type: "POST",
      url: "ajax_update_action_required_edit.php",
      data: {task_id: task_id,emp_id:emp_id,target_date:target_date},
      success: function(data) {
        alert(data);
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

<script>
  $('.bottom_text').css('color','rgb(191, 184, 184)');
  $('.leff').css('margin-left','60px');
  function openCity(evt, cityName) 
  {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) 
    {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) 
    {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
    if(cityName == "leftTab")
    {
      $('#margin_set').height($(window).height() - $('fieldset').height());
    }
    if(cityName == "Paris")
    {
      $('#margin_set').height($(window).height() - $('fieldset').height());
    }
    if(cityName == "London")
    {
      $('#margin_set').height('0');
    }
  }
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
  //MOdals
  $(document).on("click", "#leftTab", function () {
     $('.lefttab_background').css('background-color','white');
     $('.example-getting-started').removeClass('.btn-default');
  //   $(".lefttab_background").css("text-align", "center");

  });

  $(document).on("click", "#mod_btn_3", function () {
    var Id = $(this).data('temp');
    var task_name= $(this).data('task');
    $('.mod_btn_3_modal_background').css('background-color','white');
    $(".modal-body #action_comment_temp2").css('color','#CD510A');
    $(".modal-body #action_comment_temp2").val(Id);
    $(".modal-body #task_name2").val(task_name);
  });
  
  $(document).on("click", "#mod_btn_2", function () {
    var row_id= $(this).data('id');
    var Id = $(this).data('comment');
    var task_name= $(this).data('task');
     //$(".label_blue").css('color','#585454 !important');
    $('.mod_btn_2_modalbackground').css('background-color','white');
   // $('.form-control-left-radius').css('background-color','white !important');
    $(".modal-body #action_comment_temp"+row_id).css('color','#FF0000');
    $(".modal-body #action_comment_temp"+row_id).val(Id);
    $(".modal-body #task_name").val(task_name);
  });
  $(document).on("click", "#mod_btn", function () {
    $('.action_modal_background').css('background-color','rgba(243, 243, 243);');
    $('.question_modal').css('background-color','rgba(243, 243, 243)');
    var Id = $(this).data('userid');
    var Id2 = $(this).data('userid2');
    var cur_act= $(this).data('current_act');
    $(".modal-body #main_comment_modal ").html(Id);
    $(" #question_modal").html($(this).data('question'));
    $(".modal-body #current_act").val(cur_act);
    //$(".modal-footer #action_comment_modal").val(Id2);
  });
</script>

<style>
 .glyphicon-edit1:before 
  {

    font-size: 16px !important;
    
    top: -12px !important%;
   
  }
  .glyphicon1{
    position: relative;
    top: -12px;
    display: inline-block;
    font-family: 'Glyphicons Halflings';
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
  }
.modal-open .modal {
    overflow-x: hidden;
    overflow-y: hidden;
}
.modal-backdrop.in {
    opacity: 0.8;
}
.modal.fade .modal-dialog {
  transform: translate3d(0, 100vh, 0);
}

.modal.in .modal-dialog {
  transform: translate3d(0, 0, 0);
   transition: 0.5s;
}
.datefont{
      margin-left: 50px !important;
}

.footer{
  height:11vh;
}
.caret{
  vertical-align:middle;
  float :right;
  margin-top: 6px;
  }
.nasmall{
  width: 20px !important;
  height: 20px !important;
 
  font-size: 9px !important;
}
.naright{
   right: 12% !important;
}
.bluebackground {
 
    background-image: url(./image/bg@2x.png);
    background-repeat: no-repeat;
    height: 100%;
    margin-left: 27.5%;
    width: 72.5%;
    position: absolute;
    top: 16vh;
    background-size: 100%;
    background-position: center;
}
.form-control-left-radius{
  background-color: rgb(255, 255, 255) !important;
}
.main_form_header_site_visit
  {
    float: left;
    position: absolute;
    top: -3vh;
        width: 100%;
   /* top: 16vh;*/
   /* left: 27.5%;
    width: 72.5%;*/
    /*background-color: #f5f5f5;*/
    height: 20%;
   /* padding-top: 30px;*/
    padding-bottom: 0px;
    padding-left: 15px;
    padding-right: 20px;
   /* background: #201B1F;*/
  }
  .well_class {
    border: none !important;
    padding: 0px 0px !important;
    margin-bottom: 80px !important;
    box-shadow: none !important;
}
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
  .not-selected1 {
    background-color:##4cad74;
  width: 30px;
    height: 30px;
        -webkit-text-stroke: 2px #4cad74;

  border-radius: 50%;
  
    }

  /* css for header and body*/
  .header_checklist 
  {
    float: left;
    position: absolute;
    top: 16vh;
    width: 100%;
  /*  left: 27.5%;
    width: 72.5%;*/
   /* background-color: #f5f5f5;*/
    height: 12.5%;
   /* padding-top: 30px;*/
    padding-bottom: 0px;
    /*padding-left: 15px;
    padding-right: 20px;*/
    /*background: #201B1F;*/
  }
  .body_checklist 
  {
    float: left;
    position: absolute;
    top: 28.5vh;
    /*left: 27.5%;*/
    width: 100%;
    overflow-y: scroll;
    max-height: 59%;
    /*background: #201B1F;*/
  }
  .checklist_head
  {
    background: #1B2733;
    /*margin: 15px 0 0 0;*/
    padding: 5px 0 5px 0;
  }
  .backhIn
  {
    background-color: #424043 !important;
    color :#fff !important;
  }
  h4 
  {
    text-align: left;
    margin:2vh;
    font-weight: bold;
  }

  table caption 
  {
    padding: .5em 0;
  }

  @media screen and (max-width: 767px) 
  {
    table caption 
    {
      border-bottom: 1px solid #ddd;
    }
  }

  .p 
  {
    text-align: center;
    padding-top: 140px;
    font-size: 14px;
  }
  th 
  {
    font-weight: 100;
    font-style: italic;
  }

  .form-control 
  {
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
  input.form-control,input.form-control:focus 
  {
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

  ::-webkit-scrollbar 
  {
    width: 7px;
    background: #393848;
  }

  ::-webkit-scrollbar-track 
  {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }
 
  ::-webkit-scrollbar-thumb 
  {
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
  
  div.tab 
  {
    overflow: hidden;
    color: #fff;
    /*border: 1px solid #ccc;
    background-color: #f1f1f1;*/
  }

  /* Style the buttons inside the tab */
  div.tab button 
  {
    background-color: inherit;
   /* float: left;*/
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 15px;
    color: rgb(191, 184, 184) !important;
  }

  /* Change background color of buttons on hover */
  div.tab button:hover 
  {
    color: #fff;
     width: 100%;
  }
  /* Create an active/current tablink class */
  div.tab button.active 
  {
   /* background-color: #fff;*/
    border-bottom: 2px solid #FF7B2A;
    width: 100%;
    color: #fff !important;
  }
  /* Style the tab content */
  .tabcontent 
  {
    display: none;
    padding: 1px 12px;
    /*border: 1px solid #ccc;*/
    border-top: none;
  }

  .table>tbody>tr>td
  {
    border-top: 20px  !important;
  }
  .table>tbody>tr
  {
    font-size: 1em;
  }
  .not-selected1 
  {
    background-color:#4cad74;
    width: 20px;
    height: 20px;
    -webkit-text-stroke: 2px #4cad74;
    border-radius: 50%;
  }
  .glyphicon-okWH{
    width: 30px;
    height: 30px;
  }
  .not-selected2 
  {
    background-color:#d15462;
    width: 30px;
    height: 30px;
    -webkit-text-stroke: 3px #d15462;
    border-radius: 50%;
  }
   .not-selectedtick2 
  {
    width: 20px !important;
    height: 20px !important;
    background-color: #d15462 !important;
  }
  .not-selected3 
  {
    background-color:#D97631;
    width: 30px;
    height: 30px;
    border-radius: 50%;
  }

  .not-selected4 
  {
    background-color:#6DB4B4;
    width: 30px;
    height: 30px;
    -webkit-text-stroke: 1px #6DB4B4;
    border-radius: 50%;
  }
  .glyphicon-ok:before 
  {
    font-size: 20px;
    color: white;
    position: absolute;
    top: 19%;
    right: 20%;
  }
  .glyphicontab-ok:before 
  {
    font-size: 12px !important;
  }
  .glyphicon-remove:before 
  {
    font-size: 25px;
    color: white;
    position: absolute;
    top: 15%;
    right: 10%;
        /*-webkit-text-stroke: 4px #AAAAAA;*/
  }
  .glyphicon1-remove:before 
  {
    font-size: 25px;
    color: white;
    position: absolute;
    top: 15%;
    right: 10%;
        /*-webkit-text-stroke: 4px #AAAAAA;*/
  }

  .glyphiconred_remove{
    font-size: 25px;
    color: white;
    position: absolute;
    top: 15%;
    right: 10%;
    -webkit-text-stroke: 4px #d15462 !important;
  }
  .gifred{
    background-color: #d15462 !important;
  }
  .glyphiconwhite-remove
  {

        -webkit-text-stroke: 4px #AAAAAA !important;
  }
 
  .glyphicontab-remove:before 
  {
    font-size: 16px;
        -webkit-text-stroke:2px #d15462 !important;
  }
  .glyphicon-edit:before 
  {
    font-size: 20px;
    color: white;
    position: absolute;
    top: 15%;
    right: 15%;
  }
  .glyphicon-plus:before 
  {
    font-size: 20px;
    color: white;
    position: absolute;
    top: 15%;
    right: 15%;
  }

  .glyphicon_gif
  {
    width: 30px;
    height: 30px;
    background-color: #AAAAAA;
    -webkit-text-stroke: 1px #AAAAAA;
    border-radius: 50%;
  }
  .glyphicon-plus:before 
  {
    content: none;
  }
  .glyphicon
  {
    cursor: pointer;
  }

  @media (max-width: 1024px){
    .main_form_header_site_visit{
          top: -2vh !important;
    }
   .header_checklist{
        height: 14.5% !important;
   }
  .logowidth{
    width: 13vh !important;
    margin-right: 32px !important;
   }

    .datefont{
      margin-left: 14px !important;
      font-size: 1.2vw !important;
    }
    .dateimage{
      margin-left: 13px !important;
      margin-bottom: 3px !important;
    }
    .bluebackground{
      top: 14vh !important;
    }
    .footer{
      height: 13vh !important;
    }
    .body_checklist{
      top: 30.5vh !important;
      max-height: 62% !important;
    }
    .checklistfooter{
      width: 10.5vw !important;
    }
    .createleftmodal{
      width: 12vw !important;
    }
    .actioncount{
      padding: 3px 1px !important;
    }
    }
    @media (max-width: 768px){
      .headerpadding{
        padding-left: 25px !important;
      }
          .logowidth{
    width: 12vh !important;
    margin-right:55px !important;
    margin-top: -90px;
   }
      .header_checklist{
        height: 13.5% !important;
        top: 21vh !important;
   }
      .main_title_container{
        padding-left: 0px !important;
      }
      .form_logo_container{
        padding-right: 5px !important;
      }
       div.tab button {
        font-size: 14px !important;
        padding-left: 0px;
       }
       .actioncount{
            margin-left: -5px;
       }
       .form_submit_button{
         margin-left: 140px !important;
         width: 40% !important;
       }
       .createleftmodal{
              width: 18vw !important;
       }
       .main_form_header_site_visit{
        top: -1vh !important;
        height: 22% !important;

       }
       .body_checklist{
      top: 34.5vh !important;
      max-height: 56% !important;
    }
       .datefont{
        margin-left: -85px !important;
       }
       .datetop{
        margin-top: 12vh !important;
       }
       .checklistwidth{
        width: 18vw !important;
       }
       .footer {
    height: 12vh !important;
       }
       .checklistfooter {
    width: 16.5vw !important;
    height: 11vh;
}
     #mytable{
      font-size: 0.8em !important;
     }
     .submitaction{
          margin-top: -50px !important;
    width: 55% !important;
     }
     .footer_date {
    padding-left: 8vw !important;
    font-size: 1.4vw !important;
    }
    .tickwidth{
      width: 115%;
    }
    .bluebackground {
      background-size: 135% !important;
    }
    .headeryesno{
          margin-left: -15px !important;
    }
    }

    .multiselect-container, .dropdown-menu{
      max-height: 300px;
      overflow-y:scroll; 
    }
   .modal-open .modal_1
  {
    overflow-x: hidden;
    overflow-y: hidden;
    width: 100%!important;
    
  }
  .modal-body_1
  {
    overflow-x: none!important;
    overflow-y: none!important;
    height: 77% !important;
    width: 100%!important;
  }

iframe{
  height:63%!important;
  width: 100%!important;
   overflow-x: none!important;
    overflow-y: none!important;
}
  .modal-body
  {
    overflow-x: none!important;
     width: 100%!important;
  }
</style>


