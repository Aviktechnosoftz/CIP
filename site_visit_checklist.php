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

  $count_action = $conn->query("select count(*) as count  FROM tbl_sm_report_action left join tbl_sm_report_main on (tbl_sm_report_main.id = tbl_sm_report_action.row_id) left join tbl_sm_report_task_obs on (tbl_sm_report_action.row_id=tbl_sm_report_task_obs.id)  WHERE  ((tbl_sm_report_action.action = '2') AND (tbl_sm_report_action.checklist_udid = '".$_SESSION['udid_report']."'  OR tbl_sm_report_action.checklist_udid is null )  )")->fetch_object();
 
 $act_count= $count_action->count;


 $get_total_main_records= $conn->query("select count(*) as count_main from tbl_sm_report_main where project_id='".$_SESSION['admin']."'")->fetch_object();

  $get_total_action_records= $conn->query("select count(*) as count_action from tbl_sm_report_action where checklist_udid='".$_SESSION['udid_report']."' AND is_task_obs='0'")->fetch_object();

?><script src="js/jquery.min.js"></script>
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


  <? include('header.php'); ?>
  <? include('test_side_new.php');?></div>
<script type="text/javascript"> var selected2 = [];</script>
  <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" type="text/css" />


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
      $('#content_task_'+id).notify("Select Action for the Previous Task or Close it !!","warn",{ position:"top-right" });
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
    // alert(id+' '+action+' '+comment);
    $.ajax({
      type: "POST",
      url: "ajax_update_task_obs.php",
      data: {id:id, action: action, comment:comment},
      success: function(data) {
        //console.log(data);return false;
        if(data == 1)
        {
          checkFlip =0;
          $('.modal-backdrop ').removeClass();
            $('#leftTab').load('site_visit_task_observed_tab.php');
            // $('#leftTab').html('site_visit_task_observed_tab.php');
            $("#Paris").load("site_visit_action_required_tab.php");
            // $("#Paris").html('site_visit_action_required_tab.php');
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
        // alert(data);console.log(data);return false;
        if(data == 1)
        {
          checkFlip =0;
          $('.modal-backdrop ').removeClass();
            $('#leftTab').load('site_visit_task_observed_tab.php');
            // $('#leftTab').html('site_visit_task_observed_tab.php');
            $("#Paris").load("site_visit_action_required_tab.php");
            // $("#Paris").html('site_visit_action_required_tab.php');
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
    <div class="col-md-12" style="padding-top: 6vh; padding-left: 0px;">
      <div class="col-md-4 col-xs-6 main_title_container pull-left">
        <div class="col-md-2 pull-left mdatebtn " style="padding: 0px; margin-left: -5px;">  <? include('modbutton_visit.php'); ?></div>
        <div class="col-md-10 headerpadding" style="padding: 0px;"> 
          <legend class="main_title_blue">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
          <label class="control-label rightpadding"><span class="form-name_blue" style="color: rgb(191, 184, 184) !important;">SENIOR MANAGEMENT SITE VISIT REPORT&nbsp;</span></label>
          <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
        </div>
      </div>
      <div class="col-sm-4 col-md-4 datetop " style="margin-top: 10vh;">
        <span class="bottom_text datefont" style="font-family: 'Avenirnext'; margin-left: 32px;outline: none;font-size: 14px;border: 2px solid #49617B;border-radius: 25px; padding: 5px;padding-left: 20px;padding-right: 20px;background: #49617B;"><?=date("d F Y ") ?><img data-toggle="modal" data-target="#myModal_date" class="dateimage" src="image/homedate.png" style="margin-left: 3%;margin-bottom: 3px;"></span>
      </div>
      <div class="col-md-3 col-sm-3 form_logo_container ">
        <img class="logowidth" src="image/logo.png" width="17%" style="image-rendering: pixelated;width :14vh;margin-right: 20px;">
      </div>
    </div> 
  </div>
  <div class="modal fade modal-open_1 modal_1" id="myModal_date" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="" style="padding-bottom: 0px !important;border: none !important;">
          <center> <button type="button" class="btn btn-default" data-dismiss="modal">&times;</button></center>
        </div>
        <div class="modal-body modal-body_1" style="height: 65vh !important">               
          <iframe src="mdate_visit.php"  frameborder="0" style="height: 68% !important"></iframe>
        </div>
      </div>  
    </div>
  </div>
  <div class="header_checklist">
    <div class="col-md-12" style="padding: 0px;">
      <div class="tab">
        <div class="col-sm-4 text-center"><button class="tablinks" onclick="openCity(event,'leftTab')" id="defaultOpen">TASK OBSERVED</button></div>
        <div class="col-sm-4 text-center"><button class="tablinks" onclick="openCity(event, 'London')" >CHECKLIST</button></div>
        <div class="col-sm-4 text-center">
          <button class="tablinks" onclick="openCity(event, 'Paris')">ACTION REQUIRED
            <span class="badge actioncount" style="background: red;padding: 5px 7px;margin-bottom: 13px;border-radius: 100%; ">
              <? if($act_count > 0) {?><div style="height: 0px;"></div><? }?>
            </span>
          </button>
        </div>
      </div>
    </div>
    <div class="col-md-12 checklist_head" style="height: 38%;" >
      <div class="col-md-2 col-sm-2" style="padding-left: 5%;"><span class="blue_table_label">No</span></div>
      <div class="col-md-8 col-sm-8 text-left" style="padding-left: 5px;"><span class="blue_table_label">TASK/ <span class="glyphicon1 glyphicon-edit glyphicon-edit1" style="margin-left: 20px;"></span>&nbsp;COMMENTS</span></div>
      <div class="col-md-2 col-sm-2 headeryesno" style="text-align: center;"><span class="blue_table_label ">YES/NO/NA</span></div>
    </div>
  </div>
  <div class="body_checklist" style="">
    <div class="col-md-12" style="padding-right: 0px; padding-left: 0px;">  
      <form class=" form-horizontal well_class" action=" " method="post"  id="contact_form"  enctype="multipart/form-data" style="border: none;">
        <fieldset>
          <div class="form-group">
            <div class="col-sm-12" style="padding-right: 0px; padding-left: 0px;">
              <div id="leftTab" class="tabcontent">
                <? include('site_visit_task_observed_tab.php');?>
              </div>
              <div id="London" class="tabcontent">
                <? include('site_visit_checklist_tab.php');?>
              </div>
              <div id="Paris" class="tabcontent">
                <? include('site_visit_action_required_tab.php');?>
              </div>
            </div>
          </div>
        </fieldset>
      </form>    
      <div id="margin_set"></div>    
      <? include("Checklist_visit_footer/footer_new.php"); ?>
      <? //include("footer_new.php");?>
      <div class="loadMail" style="position: fixed; left: 0px;  top: 0px;  width: 100%;  height: 100%;  z-index: 9999;    background: url('image/email_loader.gif') 50% 50% no-repeat rgb(249,249,249);  opacity: .8; display: none;"></div>
    </div>
  </div> 
</div>


<script>
   $('.bottom_text').css('color','rgb(191, 184, 184)');
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
      $('.gif_remove').css('background-color','#AAAAAA;');
      $('.gif_na').css('background-color','#AAAAAA;');
      $('.lefttab_background1').css('text-align-last','center');
      $('.gifred').css('background-color','#AAAAAA');
   //   $("#crosswhite").css({ '-webkit-text-stroke':'4px #AAAAAA'});
      $("#tickgreen").css({ '-webkit-text-stroke':'2px #AAAAAA'});
       $('.glyphicon-remove').css({ '-webkit-text-stroke':'4px #AAAAAA'});
      //$(this).removeClass('gifred');
      //$('.caret').css('float','right');
      $('.not-selected2').css({ '-webkit-text-stroke':'4px #d15462'});
      $('.not-selected2').css( 'background-color','#d15462');
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
      $('.glyphicon_gif').css({ '-webkit-text-stroke':'2px #AAAAAA'});
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
      $('.glyphicon_gif').css({ '-webkit-text-stroke':'2px #AAAAAA'});
      $("#crosswhite").css({ '-webkit-text-stroke':'4px #AAAAAA'});
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

function save_checklist(count)
{
  if(count == 1)
  {
    $(".loadMail").fadeIn("slow");
    $.ajax({
      type: "POST",
      url: "ajax_site_visit_save.php",
      success: function(data) {
        //alert(data);
        $(".loadMail").fadeOut("slow");
        $.post("logout_udid_sm.php", {}, function(){
          alert("Checklist Saved Successfully !!");
          window.location.href="site_visit_new.php";
        });
      }
    });
  }
  else
  {
    alert('Please Select Actions for All Tasks !!');
  }
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
     if(actionId !='2') var respPerson=1;
      $.ajax({
        type: "POST",
        url: "ajax_site_visit_checklist.php",
        data: {action: actionId,task_number: task_number, taskobs: taskObserved, empid: employeeId, comment: comm, actionRequired: acreq, respPerson: respPerson, trgtDate: tdate, employerId: employerId },
        success: function(data) {
          //console.log(data);return false;
          if(data == '1')
          {
            checkFlip = 0;
             $('.modal-backdrop ').removeClass();
            $('#leftTab').load('site_visit_task_observed_tab.php');
            // $('#leftTab').html('site_visit_task_observed_tab.php');
            $("#Paris").load("site_visit_action_required_tab.php");
            // $("#Paris").html('site_visit_action_required_tab.php');
            $('.not-selected2').css({ '-webkit-text-stroke':'4px #d15462'});
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
       $('#content_'+id).notify("Select Action for the Previous Task or Close it !!","warn",{ position:"top-right" });
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
    //alert(Actioncomment);
    
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
            check = 0;
            $('.modal-backdrop ').removeClass();
            $("#London").load("site_visit_checklist_tab.php") ;
            // $("#London").html('site_visit_checklist_tab.php');
            $("#Paris").load("site_visit_action_required_tab.php");
            // $("#Paris").html('site_visit_action_required_tab.php');
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
    //alert(Actioncomment);
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
            check = 0;
            $('.modal-backdrop ').removeClass();
            $("#London").load("site_visit_checklist_tab.php") ;
            // $("#London").html('site_visit_checklist_tab.php');
            $("#Paris").load("site_visit_action_required_tab.php");
            // $("#Paris").html('site_visit_action_required_tab.php');
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
    //alert(action_req);
    $.ajax({
      type: "POST",
      url: "ajax_update_remove.php",
      data: {action: action,task_id: task_id,emp_id:emp_id,action_req:action_req,main_comment:main_comment,target_date:target_date},
      success: function(data) {
        console.log(data);
        if(data=='1')
        {
          check = 0;
          $('.modal-backdrop ').removeClass();
          $("#London").load("site_visit_checklist_tab.php") ;
          // $("#London").html('site_visit_checklist_tab.php');
          $("#Paris").load("site_visit_action_required_tab.php");
          // $("#Paris").html('site_visit_action_required_tab.php');
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
    //alert(action_comment);
    $.ajax({
      type: "POST",
      url: "ajax_update_comment.php",
      data: {task_id: task_id,main_comment:main_comment,action_comment:action_comment},
      success: function(data) {
        //alert(data);
        if(data == 1)
        {
          check = 0;
          $('.modal-backdrop').removeClass();
          $("#London").load("site_visit_checklist_tab.php") ;
          // $("#London").html('site_visit_checklist_tab.php');
          $("#Paris").load("site_visit_action_required_tab.php");
          // $("#Paris").html('site_visit_action_required_tab.php');
        }
        else
        {
          alert('Technical Error !! Try Again Later');
        }
      }
    });
  }

  function update_action_required_edit(task_id,emp_id,target_date,action_comment) 
  {
     // alert(emp_id);
    $.ajax({
      type: "POST",
      url: "ajax_update_action_required_edit.php",
      data: {task_id: task_id,emp_id:emp_id,target_date:target_date,action_comment: action_comment},
      success: function(data) {
        //alert(data);
        if(data==1)
        {
          $('.modal-backdrop ').removeClass();
          $("#Paris").load("site_visit_action_required_tab.php");
          // $("#Paris").html('site_visit_action_required_tab.php');
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
 
  $('.leff').css('margin-left','60px');
  $('.parisname').css('color','#AAAAAA');
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
     $(".label_blue").css('padding-left','5px');
  //   $(".lefttab_background").css("text-align", "center");

  });

  $(document).on("click", "#mod_btn_3", function () {
    var Id = $(this).data('temp');
    var rowid= $(this).data('id');
    var task_name= $(this).data('task');
    $('.mod_btn_3_modal_background').css('background-color','white');
    $(".modal-body #action_comment_temp_"+rowid).css('color','#CD510A');
    $(".modal-body #action_comment_temp_"+rowid).val(Id);
     $(".modal-body #action_comment_temp2").css('color','#FF0000');
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
  @media (max-width: 1440px){
  iframe{
    height:68% !important;
    width: 100%;
    overflow-x: none!important;
      overflow-y: none!important;
  }
  }
  .glyphicon-edit1:before 
    {
  
      font-size: 14px !important;
      
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
        margin-left: 58px !important;
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
 
   /* background-image: url(./image/bg@2x.png);*/
     background: -webkit-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);
     background: -o-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);
     background: -ms-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);
     background: -moz-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);
     background: linear-gradient(to right, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);

   
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
      -webkit-text-stroke: 4px #d15462;
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
      top: 12%;
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
    .glyphiconfull_remove{
     -webkit-text-stroke: 4px #AAAAAA !important;
    }
    .glyphicontab-remove:before 
    {
      font-size: 16px;
          -webkit-text-stroke:2px #d15462 !important;
          top: 15% !important;
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
      -webkit-text-stroke: 2px #AAAAAA;
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
     iframe{
    height:75%!important;
    width: 100%!important;
     overflow-x: none!important;
      overflow-y: none!important;
  }
    
      .main_form_header_site_visit{
            top: -2vh !important;
      }
     .header_checklist{
          height: 14.5% !important;
          top:18vh !important; 
     }
    .logowidth{
      width: 13vh !important;
      margin-right: 22px !important;
     }

      .datefont{
        margin-left: 10px !important;
        font-size: 1.2vw !important;
      }
      .dateimage{
        margin-left: 13px !important;
        margin-bottom: 3px !important;
      }
      .bluebackground{
        top: 15.4vh !important;
      }
      
      .body_checklist{
        top: 32vh !important;
        max-height: 56.5% !important;
      }
     
      .createleftmodal{
        width: 12vw !important;
      }
      .actioncount{
        padding: 3px 1px !important;
      }
      }
      @media (max-width: 768px){
   iframe{
    height:75%!important;
    width: 100%!important;
     overflow-x: none!important;
      overflow-y: none!important;
  }
      .mdatebtn{
     z-index: 111;
  }
       .gif_flip{
        padding-right: 0px !important;
       }
        .headerpadding{
          padding-left: 25px !important;
        }
            .logowidth{
      width: 12vh !important;
      margin-right:-75px !important;
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
        max-height: 54.5% !important;
      }
         .datefont{
          margin-left: -95px !important;
         }
         .datetop{
          margin-top: 12vh !important;
         }
         .checklistwidth{
          width: 18vw !important;
         }
       
       
       #mytable{
        font-size: 0.8em !important;
       }
       .submitaction{
            margin-top: -55px !important;
      width: 55% !important;
       }
    
      .tickwidth{
        width: 115%;
      }
      .bluebackground {
        background-size: 135% !important;
        top: 15.4vh !important;
      }
      .headeryesno{
               margin-left: -29px !important;
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
    /*  height: 77% !important;*/
      width: 100%!important;
    }


    .modal-body
    {
      overflow-x: none!important;
       width: 100%!important;
    }
</style>


