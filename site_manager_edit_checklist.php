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
  $udid = $_REQUEST['udid'];
  //echo $udid;
  /*$get_udid=$conn->query("select * from tbl_filled_sm_weekly where date(created)='".$udid."'");*/

  $get_udid_count=$conn->query("select * from tbl_filled_sm_weekly where date(created)='".$udid."'")->fetch_object();
  $tbl_udid = $get_udid_count->checklist_udid;
  //echo $get_udid_count->checklist_udid;die();

$count_action= $conn->query("select count(*) as count FROM tbl_sm_weekly_main left join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id and  (tbl_sm_weekly_action.checklist_udid = '".$get_udid_count->checklist_udid."'  OR tbl_sm_weekly_action.checklist_udid is null) WHERE  (tbl_sm_weekly_action.action = '2' )  order by  tbl_sm_weekly_main.task_number")->fetch_object();

$act_count= $count_action->count;

$get_main_detail=$conn->query("select * from tbl_sm_weekly_main where project_id='".$_SESSION['admin']."' order by task_number");

$get_action_required_content= $conn->query("select *,tbl_sm_weekly_main.id FROM tbl_sm_weekly_main left join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id and  (tbl_sm_weekly_action.checklist_udid = '".$_SESSION['udid']."'  OR tbl_sm_weekly_action.checklist_udid is null) WHERE  (tbl_sm_weekly_action.action = '2' or (tbl_sm_weekly_action.action = '1'  AND  (tbl_sm_weekly_action.actual_date  != '' AND tbl_sm_weekly_action.actual_date IS NOT NULL)))  order by  tbl_sm_weekly_main.task_number");



?>
<script src="js/jquery.min.js"></script>
<div class="loader" style="position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('image/load.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;"></div>

<script type="text/javascript">
  $(window).load(function() {
      $(".loader").fadeOut("slow");
  });
</script>
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
<div class="main_form_header_blue" style="padding-left: 0;padding-right: 0;padding-top: 5px;height: 25%">
  <div class="row">
    <div class="col-sm-12">
    <div class="col-sm-1" style="padding-top: 30px;padding-right:0;width: 40px;padding-left: 5px;"><? include('modButton.php'); ?></div> 
    <div class="col-sm-9" style="padding-top: 40px;padding-left: 0px;">
          <legend class="main_title_blue">OCCUPATIONAL HEALTH AND SAFETY MANAGEMENT SYSTEM</legend>
          <label class="control-label rightpadding"><span class="form-name_blue">SITE MANAGER SUPERVISOR WEEKLY REVIEW</span></label>
    </div>   
    <div class="col-sm-2" style="padding-right: 50px;padding-top: 30px">
        <img src="image/logo.png" class="img-responsive pull-right" style="width: 70px;height: 70px; image-rendering: -webkit-optimize-contrast;">
    </div>
    <div class="col-sm-12 text-center" style="margin-top: -20px"><span style="color:#fff;font-size: 18px;
    font-weight: bolder;"><? 
    $yrdata= strtotime($udid);
    echo date('d F Y', $yrdata);?></span></div>
    </div>  
     
    <div class="col-md-12">
      <div class="tab">
        <div class="col-sm-5" style="margin-left: -20px"><button class="tablinks col-sm-12" onclick="openCity(event, 'London')" ><div class="col-sm-9 col-sm-offset-3 text-left">Checklist</div></button>
        </div>
        <div class="col-sm-4 col-sm-offset-3" style="padding-right: 0"><button class="tablinks pull-right col-sm-12" onclick="openCity(event, 'Paris')" id="defaultOpen"><div style="padding-left: 55px;">Action Required<span class="badge" style="background: red;padding: 4px 0px;font-size: 14px;margin-top:-30px;margin-left: 5px;"><? if($act_count > 0) {?><div style="height: 0px;"></div><? }?></span></button>
      </div>
    </div>
    </div>
    </div>
   
    <div class="col-sm-12 blue_table_head">
      <div class="col-sm-1"><span class="blue_table_label">No</span></div>
        <div class="col-sm-8"><span class="blue_table_label">TASK/ COMMENTS</span></div>
        <div class="col-sm-3 text-right"><span class="blue_table_label" style="padding-right: 15;">YES/NO/NA</span></div>
    </div>

</div>

<div class="Main_Form2_blue" style="top: 46vh;max-height: 54.3%;">
  <div class="col-md-12" style="padding-left: 0;">
    <form class="well form-horizontal well_class" action=" " method="post"  id="contact_form"  enctype="multipart/form-data" style="border: none;background: #393848;padding-left: 0 !important;padding-right: 0 !important" onsubmit="return terms_check()">
      <fieldset>
        <div class="form-group">
          <div class="col-sm-12" style="padding-right: 0px">
            <div id="London" class="tabcontent">   
          <?   while($row_main_detail=$get_main_detail->fetch_object()){  ?>
            <table id="mytable" class="table table-bordred" style=" background-color: #333240;color: #fff;">
              <tbody>
                <tr class="content_tr">
                  <td style="text-align: left;vertical-align: middle;padding-left: 30px"  class="col-sm-1"><?=$row_main_detail->task_number ?></td>    
                  <td class="col-sm-9" style="vertical-align: middle;padding-left: 30px"><?=$row_main_detail->task_desc ?>
                  <? 
                    $get_action_status=$conn->query("select * from tbl_sm_weekly_action where row_id='".$row_main_detail->id."' and checklist_udid = '".$tbl_udid."'")->fetch_object();

                    $check_exist_action= $conn->query("select checklist_udid,checklist_main_comments,checklist_action_comments from tbl_sm_weekly_action where checklist_udid='".$_SESSION['udid']."' AND row_id='".$row_main_detail->id."'")->num_rows;
                    $temp_comments="";
                  ?>
                  <? if($check_exist_action <= 0) {  ?>
                    <div id="span2" class="t r" style="vertical-align: middle;"><br>
                      <?if($row_main_detail->comments!="") {?><span class="glyphicon glyphicon-edit" ></span>&nbsp;<? echo $row_main_detail->comments; $temp_comments= $row_main_detail->comments;?>
                      <? }?>
                    </div>
                  <? } ?> 
                  <?if($check_exist_action > 0) { ?>
                    <div id="span2" class="t r" style="vertical-align: middle;"><br>
                      <?if($get_action_status->action_required != ""){?><span class="glyphicon glyphicon-edit" ></span>&nbsp;<?echo $get_action_status->action_required;}
                      else if($get_action_status->checklist_action_comments != ""){?><span class="glyphicon glyphicon-edit" ></span>&nbsp;<?echo $get_action_status->checklist_action_comments;
                      $temp_comments= $get_action_status->checklist_action_comments;}

                      else 
                      {
                        if($row_main_detail->comments != ''){?><span class="glyphicon glyphicon-edit" ></span>&nbsp;<?echo $row_main_detail->comments; 
                      $temp_comments= $row_main_detail->comments;
                      }}?>
                    </div>
                  <? } ?>
                  </td>
                  <td class="col-sm-2 text-right" style="padding-right: 30px;vertical-align: middle;"><?if($get_action_status->action == "1") {?> <span  class="glyphicon glyphicon-ok not-selected1" id="gif_ok"></span>   <?}?>
                    <?if($get_action_status->action == "2") {?> <span  class="glyphicon glyphicon-remove not-selected2" id="gif_ok"></span>   <?}?>
                    <?if($get_action_status->action == "3") {?> <span class="glyphicon glyphicon-plus not-selected3"  id="gif_na" style="color: black">
                    <span style="position: absolute;top:9px;right: 4px;-webkit-text-stroke: 0px white;color: white;font-size: 13px;">N/A</span>
                    </span>
                  <?}?>
                  </td>
                </tr>
              </tbody>
            </table>
            <? } ?>
          </div>

    <!-- Action Required Tab-->
    <div id="Paris" class="tabcontent">    
      <?
        $get_action_required_content= $conn->query("select *,tbl_sm_weekly_main.id, tbl_sm_weekly_action.id as aid FROM tbl_sm_weekly_main left join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id and  (tbl_sm_weekly_action.checklist_udid = '".$tbl_udid."'  OR tbl_sm_weekly_action.checklist_udid is null) WHERE  (tbl_sm_weekly_action.action = '2' )  order by  tbl_sm_weekly_main.task_number");

          //echo "select *,tbl_sm_weekly_main.id FROM tbl_sm_weekly_main left join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id and  (tbl_sm_weekly_action.checklist_udid = '".$tbl_udid."'  OR tbl_sm_weekly_action.checklist_udid is null) WHERE  (tbl_sm_weekly_action.action = '2' or (tbl_sm_weekly_action.action = '1'  AND  (tbl_sm_weekly_action.actual_date  != '' AND tbl_sm_weekly_action.actual_date IS NOT NULL)))  order by  tbl_sm_weekly_main.task_number";die();
        
        
        while($row_action_required_detail=$get_action_required_content->fetch_object())
        { 
      ?>
        <script>
          $(document).on("click", "#mod_btn_3", function () {

            var Id = $(this).attr('taskDesc');
            //alert(Id);return false;
            var task_name= $(this).data('task');
            $(".modal-body #action_comment_temp2").css('color','#CD510A');
            $(".modal-body #action_comment_temp2").val(Id);
            $(".modal-body #task_name2").val(task_name);    
          });
        </script>
        <table id="mytable" class="table table-bordred " style=" background-color: #333240;color: #fff;">
          <tbody>
            <tr class="content_tr" id="mod_button" data-toggle="modal" data-target="#myModal2_action_<?=$row_action_required_detail->id?>">
              <td style="vertical-align: middle;padding-left: 30px" class="col-sm-1"><?=$row_action_required_detail->task_number?></td>    
              <td style="vertical-align: middle;" class="col-sm-9"><?=$row_action_required_detail->task_desc?>
                <div id="span2" class="t r" style="vertical-align: middle;"><br><b>Action Required:</b>
                <?
                  if($row_action_required_detail->action_required != ""){echo $row_action_required_detail->action_required;}


 else{echo $row_action_required_detail->checklist_action_comments;
  } 
                ?>
                <br>&nbsp;<b>Action Complete:</b><?=$row_action_required_detail->action_complete ?>
                  
                <?$get_resp_email= $conn->query("select id,email_add from tbl_employee where  id='".$row_action_required_detail->emp_id."'")->fetch_object();?>
                <br>&nbsp;<b>Resp:</b><?=$get_resp_email->email_add; ?>
                <br>&nbsp;<b>Target Date:</b><?=$row_action_required_detail->target_date ?>
                </div> 
              </td>
              <td style="padding-right: 30px;vertical-align: middle;" class="col--sm-2 text-right">
                <span  class="glyphicon glyphicon-remove not-selected2" id="gif_ok"></span>
              </td>
            </tr>
          </tbody>
        </table>
        <!--Pop Up for checklist editing-->
    <div class="modal fade" id="myModal2_action_<?=$row_action_required_detail->id ?>" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content" style="background: #393848 !important;">
          <div class="modal-header" style="border-bottom: none;">
            <button type="button" class="close" data-dismiss="modal" style="color: #C9D5D8">&times;</button>
          </div>
          <div class="modal-body">
            <label class="label_blue">Task</label>         
            <textarea id="task_name"   rows="4" style="height: 50px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 10px; padding: 6px 25px 6px 12px;" readonly><?=$row_action_required_detail->task_desc?></textarea>
            <div class="" style="margin-top: 10px">
              <label class="label_blue">Action Required</label>
              <textarea type="text"  name="" id="actionRequired" style="height: 70px;width: 100% ;border-radius: 10px;padding: 6px 25px 6px 12px;"  readonly><?  if($row_action_required_detail->action_required != ""){echo $row_action_required_detail->action_required;}


 else{echo $row_action_required_detail->checklist_action_comments;
  } ?></textarea> 
            </div>

            <label class="label_blue" style="margin-top: 10px">Actual Comment</label>         
            <textarea id="actualComment_<?=$row_action_required_detail->id?>" rows="4" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 10px; padding: 6px 25px 6px 12px;" required></textarea>

            <div class="" style="margin-top: 10px">
              <label class="label_blue">Resp Person</label>           
              <select style="height: 34px;display: block;width: 100%;padding-left:20px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 10px;" id="select_id_<?=$row_action_required_detail->id?>">
                <? 
                
                   $get_resp_name= $conn->query("select tbl_employee.id,tbl_employee.email_add,tbl_employee.given_name,tbl_employee.surname as name from tbl_employee INNER JOIN tbl_induction_register ON tbl_employee.id=tbl_induction_register.id where ( (tbl_induction_register.inducted_by IS NOT NULL AND tbl_induction_register.inducted_by != '')  AND tbl_induction_register.project_id='".$_SESSION['admin']."' AND tbl_employee.given_name !='Pieter' AND tbl_employee.surname !='Koppen') OR tbl_employee.id = '".$_SESSION['induction']."'  AND tbl_induction_register.is_deleted =' 0'");
                    
                    while($row_resp_name=$get_resp_name->fetch_object())
                    { 
                ?>
                    <option value="<?=$row_resp_name->id ?>"<?php if(trim($row_action_required_detail->emp_id) == trim($row_resp_name->id)) echo 'selected'; ?> ><?=$row_resp_name->email_add; ?>   </option>
                <? }  ?>
                  </select>  
              </select>

            </div>
            
            <div class="" style="margin-top: 10px">
              <label class="label_blue">Target Date</label>
              <input type="text" class="form-control form-control-left-radius" name="" id="target_date" value="<?=$row_action_required_detail->target_date ?>" readonly>
            </div>
            
            <div class="" style="margin-top: 10px">
              <label class="label_blue">Actual Date</label>
              <input type="text" class="form-control form-control-left-radius actualDate" name="" id="actualDate_<?=
              $row_action_required_detail->id?>">
            </div>
            <input type="hidden" value="<?=$row_action_required_detail->aid?>" id="hide_<?=$row_action_required_detail->aid?>">
            <script>
              $('.actualDate').datepicker({
                minDate: new Date(),
                dateFormat: "yy-mm-dd",
                duration: "fast",
                showAnim: "slide",
                onSelect: function(dateText, inst) { 
                  $('.actualDate').val(dateText);
                },
                showOptions: {direction: "down"} 
              });
            </script>
          </div>
          <div class="modal-footer" style="border-top: none;">
            <button type="button" class="btn btn-default"  style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;color: #fff;padding-left: 25px;padding-right: 25px;" onclick="update_action_response($('#hide_<?=$row_action_required_detail->aid?>').val(),$('#select_id_<?=$row_action_required_detail->id?>').val(),$('#actualDate_<?=$row_action_required_detail->id?>').val(),$('#actualComment_<?=$row_action_required_detail->id?>').val(), <?=$row_action_required_detail->row_id ?>,'<?=$_REQUEST['udid']?>')">Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;float: left;color: #fff;padding-left: 25px;padding-right: 25px;">Cancel</button>
          </div>
        </div>
      </div>
    </div>      
    <!--Modal Close-->
        <? } ?> 
    </div>
  </div>

    <!--Save Buttons-->
    <div class="form-group" style="width: 140px;margin-left: 370px;">
      <input type="button" id="submit_later" name="save_later" value="Save/Back" class="btn btn-warning form_submit_button" onclick="backSave('<? echo $tbl_udid;?>')">
    </div>
  </fieldset>
</form>
  <div id="margin_set"></div>    
  <? include("footer_new.php"); ?>
</div>
<span id="hidden_option" style="display: none;"></span>
</div> 
<div class="loadMail" style="position: fixed; left: 0px;  top: 0px;  width: 100%;  height: 100%;  z-index: 9999;    background: url('image/email_loader.gif') 50% 50% no-repeat rgb(249,249,249);  opacity: .8; display: none;"></div>


<script>
  function backSave(udid)
  {  $(".loadMail").fadeIn("slow");
      $.ajax({
        type: "POST",
        url: "ajax_site_manager_edit.php",
        data:{udid:udid},                   
        success: function(data) {
          //alert(data); 
          $(".loadMail").fadeOut("slow");
          alert("Checklist Saved Successfully !!");
          location.reload();
        }
      });
  }

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


<script>
  function validation(date,comment)
  {
    //alert(date+" "+comment);
    if(date == "" || comment == "")
    {
      alert("Please Fill Complete Information...");
      return false;
    }
    else
    {
      return true;
    }
  }
  function update_action_response(id,empid,date,comment,row_id,checklist_date)
  {
   /* alert(date+" "+comment);
    return false;*/
    var valid = validation(date,comment);
    //alert(valid);
    if(valid)
    {
      $.ajax({
        type: "POST",
        url: "query_update_checklist.php",
        data:{id:id,empid:empid,date: date, comment: comment,row_id:row_id,checklist_date:checklist_date},                   
        success: function(data) {
          //alert(data); 
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
</script>

<style>
  .not-selected1 
  {
    background-color:#489048;
    width: 30px;
    height: 30px;
    -webkit-text-stroke: 2px #489048;
    border-radius: 50%;
  }
  .not-selected2 
  {
    background-color:#f13232;
    width: 30px;
    height: 30px;
    -webkit-text-stroke: 2px #f13232;
    border-radius: 50%;
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
    top: 12%;
    right: 20%;
  }
  .glyphicon-remove:before 
  {
    font-size: 20px;
    color: white;
    position: absolute;
    top: 15%;
    right: 15%;
  }
  .glyphicon-edit:before 
  {
    font-size: 16px;
    color: white;
    position: initial;
    /*top: 15%;
    right: 15%;*/
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
  .glyphicon_gif2
  {
    width: 30px;
    height: 30px;
    background-color: #AAAAAA;
    border-radius: 50%;
  }
  .glyphicon_gif3
  {
    width: 30px;
    height: 30px;
    background-color: #AAAAAA;
    border-radius: 50%;
  }
  .glyphicon_gif4
  {
    width: 30px;
    height: 30px;
    background-color: #AAAAAA;
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
    
  h4 
  {
    text-align: left;
    margin:2vh;
    /*font-weight: bold;*/
    font-weight: 100 !important;
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
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
  }

  /* Change background color of buttons on hover */
  div.tab button:hover 
  {
    color: #3AAE72;
  }

  /* Create an active/current tablink class */
  div.tab button.active 
  {
    /*background-color: #ccc;*/
    border-bottom: 2px solid #FF7B2A;
  }

  /* Style the tab content */
  .tabcontent 
  {
    display: none;
    padding: 6px 0px;
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

     #sidebar
  {
        max-height: 77%;
    min-height: 86%;
  }
  
  /*.table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
    background-color: #26262d;
     color: #fff;
  }*/
</style>

