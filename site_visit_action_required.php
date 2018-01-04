<?
  session_start();
  error_reporting(0);
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

  $get_data = $conn->query("select *,tbl_sm_report_action.id as aid, tbl_sm_report_action.row_id as arowid,tbl_sm_report_main.task_number as main_tasknumber,tbl_sm_report_action.emp_id as action_emp,tbl_sm_report_main.task_desc as main_taskdesc, date(tbl_sm_report_action.created) as created_filled,tbl_sm_report_task_obs.task_number as obstask, tbl_sm_report_task_obs.emp_id as employeeid  FROM tbl_sm_report_action left join tbl_sm_report_main on (tbl_sm_report_main.id = tbl_sm_report_action.row_id) left join tbl_sm_report_task_obs on (tbl_sm_report_action.row_id=tbl_sm_report_task_obs.id)  WHERE  ((tbl_sm_report_action.action = '2' or ( (tbl_sm_report_action.actual_date  = '' AND tbl_sm_report_action.actual_date IS NULL))) AND (tbl_sm_report_action.checklist_udid = '".$_SESSION['udid_report']."'))");

  // $get_count = $conn->query("select count(*) as count FROM tbl_sm_weekly_main  join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id   join tbl_filled_sm_weekly on tbl_sm_weekly_action.checklist_udid  = tbl_filled_sm_weekly.checklist_udid  AND tbl_filled_sm_weekly.project_id ='3'  AND tbl_filled_sm_weekly.is_deleted = '0' AND tbl_filled_sm_weekly.is_submitted = '1' AND  (tbl_sm_weekly_action.actual_date  = '' or tbl_sm_weekly_action.actual_date IS  NULL) AND tbl_sm_weekly_action.action = '2' WHERE  tbl_sm_weekly_action.emp_id = '1'  order by  tbl_sm_weekly_main.task_number")->fetch_object();
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
    <? include('header.php'); ?>
    <? //include('test_side_new.php');?>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--     <script src="js/jquery.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/sidebar.css">
  <div class="bluebackground mobilebackground col-md-12 col-sm-12" style="padding-right: 0px; padding-left: 0px">
    <div class="main_form_header_site_visit tab_site_visit " >
  
      <div class="col-sm-12" style="padding-top: 3vh">
       <div class="col-md-6 col-xs-6 main_title_container" style="padding-left: 0px;">
      <legend class="main_title_blue">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
      <label class="control-label rightpadding"><span class="form-name_blue" style="color: rgb(191, 184, 184) !important;">SENIOR MANAGEMENT SITE VISIT REPORT&nbsp;</span></label>
      <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container ">
      <img class="logowidth" src="image/logo.png" width="17%" style="image-rendering: pixelated;width :14vh;">
    </div>
  </div> </div>
        <div class="header_checklist" style="padding: 0px;">
          <div class="tab text-center"><button class="tablinks" id="defaultOpen" style="float: none">Action Item<!-- <span class="badge" style="background: red;padding: 4px 0px;font-size: 14px;margin-top:-30px;margin-left: 5px"><? if($count_action->count) {?><div style="height: 0px;"></div><? }?></span> --></button></div>
        
     
  
     <div class="col-md-12 checklist_head" style="height: 38%;" >
      <div class="col-md-2 col-sm-2" style="padding-left: 5%"><span class="blue_table_label">No</span></div>
      <div class="col-md-8 col-sm-8 text-left" style="padding-left: 5px;"><span class="blue_table_label">TASK / <span class="glyphicon1 glyphicon-edit glyphicon-edit1" style="margin-left: 15px;"></span> COMMENTS</span></div>
      <div class="col-md-2 col-sm-2 headeryesno" style="text-align: center;"><span class="blue_table_label ">YES/NO/NA</span></div>
    </div>
   </div>
    
 

  <div class="body_checklist" style="padding: 0px;overflow-x: hidden; ">
    <div class="col-md-12" style="padding: 0px; ">
      <form class="form-horizontal well_class" action=" " method="POST"  id="actionRequiredForm"  enctype="multipart/form-data"  style="border: none;">
        <fieldset>
      	  <div class="form-group">
        	  <div class="col-sm-12" >
        	  <? 
            	while($row_get_data = $get_data->fetch_object())
          	  {

                $string = $row_get_data->employeeid;
                $parts = explode(',', $string);
                $d = array();
                foreach ($parts as $name) {
                  $d[] = '"' . $name . '"';
                }

                $email_add_all_str=implode(",", $d);

                $get_emp_task=$conn->query("select tbl_employee.id as induction_id, tbl_employee.given_name,tbl_employee.surname as name,tbl_employee.pin,tbl_employee.email_add,CONCAT((GROUP_CONCAT(concat(tbl_employee.given_name,' ',tbl_employee.surname))),' (',tbl_employer.company_name,')') as email_add_all,tbl_induction_register.project_id,tbl_employee.contact_phone,tbl_employee.job_title,tbl_employer.company_name,tbl_employer.tread,tbl_induction_register.empid  as employer_id  FROM tbl_employee JOIN tbl_induction_register ON tbl_employee.id = tbl_induction_register.id JOIN tbl_employer ON tbl_employer.id = tbl_induction_register.empid  WHERE tbl_employee.id IN (".$email_add_all_str.") group by tbl_induction_register.project_id")->fetch_object();
          	?>
          	  <div id="London" class="tabcontent" style="padding: 0px; ">
	              <table id="mytable" class="table table-bordred blue_table_label" style="background-color: #283A50;color: #fff;margin-top: -6px;"> 
              	  <tbody>
	                  <tr class="content_tr" id="mod_button" data-toggle="modal" data-target="#action_required_modal<?=$row_get_data->aid?>"  style="height: 100px;border: none;">
                    	<td style="vertical-align: middle;padding-left: 5.3%;border: none;" class="col-md-2  col-sm-2">
                        <? if($row_get_data->is_task_obs == '1') {echo $row_get_data->task_number;} else {echo $row_get_data->main_tasknumber;} ?>
                      </td>
                  	  <td style="vertical-align: middle;border: none;" class="col-md-8  col-sm-8">
                     <div style="padding:3px 0px 3px 0px"><?if($row_get_data->is_task_obs == '1') {echo $row_get_data->task_desc;} else echo $row_get_data->main_taskdesc;  ?></div>
                    	  <div id="span2" class="t r" style="padding:3px 0px 3px 0px">
                       	  <?//if($row_get_data->checklist_action_comments == ''){?>
                      	  <b>Action Required : </b><?// echo $row_get_data->comments; ?><?=$row_get_data->action_required?>
                      	  <?//}else{?>
	                        <!-- <b>Action Required:</b>&nbsp;<? //echo $row_get_data->checklist_action_comments ?> -->
                      	  <?//}?>
                    	  </div> 
                    	  <div id="span2" class="t r" style="padding:3px 0px 3px 0px">
                        	<b>Action Complete : </b><? echo $row_get_data->action_complete ?>              
                    	  </div>
                        <div id="span2" class="t r" style="padding: 3px 0px 3px 0px">
                          <?$get_resp_email= $conn->query("select * from tbl_employee where  id='".$row_get_data->action_emp."'")->fetch_object();?>
                          <b>Resp : </b><? echo $get_resp_email->email_add ?>
                        </div>
                        <?if($row_get_data->employeeid != ''){?>
                        <div style="word-break: break-word; padding: 3px 0px 3px 0px"><?="Subcontractor Name : ".$get_emp_task->email_add_all;?></div>
                        <?}?>
                        <div id="span2" class="t r" style="padding:3px 0px 3px 0px">
                          <b>Target Date : </b><? echo $row_get_data->target_date ?>
                        </div>
                  	  </td>
                  	  <td class="col-md-2  col-sm-2" style="text-align: center;vertical-align: middle;border: none;">
  	                    <? if($row_get_data->action == 1) {?>
                        <span class="glyphicon glyphicon-ok not-selected1 not-selected1 glyphicontab-ok" id="gif_ok"></span>
                        <?}  else if($row_get_data->action == 2) { ?><?=$row_get_row_id->checklist_udid?>
                        <span  class="glyphicon glyphicon-remove not-selected2 not-selectedtick2 glyphicontab-remove" id="gif_ok"></span>
                        <?}  else if($row_get_data->action== 3){ ?>
                        <span class="glyphicon glyphicon-plus not-selected3 nasmall" id="gif_na" style="color: black"><span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px;">N/A</span></span>
                        <?}?>
                    	</td>
                  	</tr>
              	  </tbody>
            	  </table>
          	  </div>   
        		  <!--Pop Up for checklist editing-->
    				  <div class="modal fade" id="action_required_modal<?=$row_get_data->aid?>" role="dialog" data-backdrop="static" data-direction='bottom'>
        				<div class="modal-dialog" style="height: 150px">
        				  <div class="modal-content" style="border-radius: 25px;background-color:#F5F5F5;font-size: 12px;">
            				<div class="modal-header" style="border-bottom: none;padding: 0px">
            				  <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:50%;float: right;margin-top: -15px;margin-right: 20px;outline: none;border: none;width: 40px;height: 40px;">&#x2715;</button>
          				  </div>
          				  <div class="modal-body" style="padding-bottom: 0px;padding-top: 0px;">
              				<label class="label_blue" style="color:#686868 !important">Task Observed</label>         
            				  <textarea id="task_name" class="mod_btn_modalbackground"  rows="4" style="height: 47px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 10px; padding: 6px 12px;" readonly><?if($row_get_data->is_task_obs == '1') {echo $row_get_data->task_desc;} else echo $row_get_data->main_taskdesc;  ?></textarea>
            				  <div class="" style="margin-top: 10px">
              				  <label class="label_blue" style="color:#686868 !important">Action Required</label>
              				  <textarea type="text" class="mod_btn_modalbackground actioncomplete_pink" name="" id="actionRequired" style="height: 55px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 10px; padding: 6px 12px;"><?//if($row_get_data->checklist_action_comments == ''){echo $row_get_data->comments;}else{echo $row_get_data->checklist_action_comments;}?> <?=$row_get_data->action_required?></textarea>
                        <label class="label_blue" style="margin-top: 10px;color:#686868 !important">Actual Comment</label>         
                        <textarea class="mod_btn_modalbackground actioncomplete_pink" id="actualComment_<?=$row_get_data->id?>" rows="4" style="height: 55px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 10px; padding: 6px 12px;" required></textarea> 
            				  </div>
            				  <div class="" style="margin-top: 10px">
              				  <label class="label_blue" style="color:#686868 !important;">Resp Person</label>

              				  <!-- <select style="height: 34px;display: block;width: 100%;padding-left:20px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 20vh;" id="empId_<?=$row_get_data->id?>"  name="select_employer" required> -->
                			    <? 
                    			  //$get_resp_name= $conn->query("select tbl_employee.id,tbl_employee.email_add,tbl_employee.given_name,tbl_employee.surname as name from tbl_employee INNER JOIN tbl_induction_register ON tbl_employee.id=tbl_induction_register.id where ( (tbl_induction_register.inducted_by IS NOT NULL AND tbl_induction_register.inducted_by != '')  AND tbl_induction_register.project_id='".$_SESSION['admin']."' AND tbl_employee.given_name !='Pieter' AND tbl_employee.surname !='Koppen') OR tbl_employee.id = '".$_SESSION['induction']."'  AND tbl_induction_register.is_deleted =' 0'");
                
                  			    //while($row_resp_name=$get_resp_name->fetch_object()){  
                			    ?>
                     			<!-- <option value="<?=$row_resp_name->id ?>"><?=$row_resp_name->email_add ?></option> -->
                  		    <? //}?> 
                          <input style="font-size: 12px;" type="text" class="mod_btn_modalbackground form-control form-control-left-radius" name="" id="empId_<?=$row_get_data->id?>" value="<?=$get_resp_email->email_add?>" readonly>
              				  <!-- </select> -->
            				  </div>
            				  <div class="" style="margin-top: 10px">
              				  <label class="label_blue" style="color:#686868 !important">Target Date</label>
              				  <input type="text" class="form-control form-control-left-radius" name="" id="target_date" value="<?=$row_get_data->target_date?>"  readonly="" style="    font-size: 12px;color: rgb(0, 0, 0); background-color: rgb(255, 255, 255);">
            				  </div>			
            			    <div class="" style="margin-top: 10px">
              				  <label class="label_blue" style="color:#686868 !important">Actual Date</label>
              				  <input style="font-size: 12px;" type="text" class="form-control form-control-left-radius actualDate" name="" id="actualDate_<?=$row_get_data->id?>">
            				  </div>
            				  <input type="hidden" value="<?=$row_get_data->aid?>" id="tbl_id_<?=$row_get_data->aid?>"> 
                      <input type="hidden" id="empid" value="<?=$row_get_data->action_emp?>">
                      <input type="hidden" id="obsId" value="<?=$row_get_data->obsid?>">
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
              				<button type="button" class="btn btn-default"  style="background-color:#EE621A ;;outline: none;border-radius:6vh;outline: none;border:none;color: #fff;margin-right: 39.5%;width: 17%;height: 25%;" onclick="update_action_required($('#tbl_id_<?=$row_get_data->aid?>').val(),$('#actualDate_<?=$row_get_data->id?>').val(),$('#actualComment_<?=$row_get_data->id?>').val(),$('#empid').val(),'<?=$row_get_data->arowid ?>','<?=$row_get_data->created_filled ?>','<?=$row_get_data->obstask?>')">Save</button>
              				
            				</div>
        				  </div>
      				  </div>
    				  </div>
    				  <?}?>
    				  <!--Modal Close-->
  				  </div>
            <div class="col-sm-12 col-md-12"> 
              <div class="form-group" style="margin-bottom: 0px !important">
        <!-- <label class="col-md-1 control-label"></label> -->
            <div class="col-md-4 col-sm-4">
          </div>
          <div class="col-md-4 col-sm-4">
              <input type="button" id="submit_later" name="save_later" value="Submit" class="btn btn-warning form_submit_button" onclick="save_checklist()">
          </div> <div class="col-md-4 col-sm-4">
          </div>
        </div>
        </div>
          
  			  </div>
  		  </fieldset>
		  </form>
  	  <div id="margin_set"></div>    
  	  <? include("footer_new.php"); ?>
       </div>
      <div class="loadMail" style="position: fixed; left: 0px;  top: 0px;  width: 100%;  height: 100%;  z-index: 9999;    background: url('image/email_loader.gif') 50% 50% no-repeat rgb(249,249,249);  opacity: .8; display: none;"></div>
	 
  </div> 
</div>

  <!-- <script type="text/javascript"> 
    $('#margin_set').height($(window).height() - $('fieldset').height());
  </script> -->

  <script>
    $(document).on("click", "#mod_button", function () {
        $('.mod_btn_modalbackground').css('background-color','white');
         $(".actioncomplete_pink").css('color','#FF0000');
     });
    
    
    function save_checklist()
    {
      $(".loadMail").fadeIn("slow");
      $.ajax({
        type: "POST",
        url: "ajax_visit_edit_checklist_email.php",
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

    function validate(date,comm)
    {
      //alert(date+" "+comm);
      if(date == '' || comm == '')
      {
        alert("Please Fill Complete Information...");
        return false;
      }
      else
      {
        return true;
      }
    }

	  function update_action_required(id,date,comm,empid,row_id,checklist_date,obstask)
	  {
      alert(id+", "+date+", "+comm+", "+empid+", "+row_id+", "+checklist_date+", "+obstask);
       // return false;
      var valid = validate(date,comm);
      //alert(valid);
  	 	//alert(id+" "+date+" "+comm+" "+empid);return false;
      if(valid)
      {
  		  $.ajax({
          type: "POST",
          url: "ajax_site_visit_action_required.php",
          data: {id:id, date:date, action_comment: comm,empid:empid,row_id:row_id,checklist_date:checklist_date, obstask:obstask  },
          success: function(data) {
             /*console.log(data);
             return false;*/
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
.form-control-left-radius {
    background-color: white !important;
}
  .modal-body textarea
   {
    width: 100% !important;
    text-align: center !important;
  }
  
  .modal-body input
   {
    width: 100% !important;
    text-align: center !important;
  }
.modal-body .label_blue {
    width: 100% !important;
    text-align: center !important;
}
.nasmall {
    width: 20px !important;
    height: 20px !important;
    font-size: 9px !important;
}
 .glyphicontab-remove:before 
  {
    font-size: 16px !important;
        -webkit-text-stroke:2px #d15462 !important;
  }
   .not-selectedtick2 {
    width: 20px !important;
    height: 20px !important;
    background-color: #d15462 !important;
}
.glyphicontab-ok:before 
  {
    font-size: 12px !important;
  }
.bluebackground {
  /*background-image: url(./image/bg@2x.png);
   background-repeat: no-repeat;*/
   background: -webkit-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);
background: -o-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);
background: -ms-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);
background: -moz-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);
background: linear-gradient(to right, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);

  height: 100%;
  margin-left: 27.5%;
  width: 72.5%;
  position: absolute;
    top: 16vh;
    /*background-size: 100%;
    background-position:center;
*/
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
.checklist_head
  {
    background: #1B2733;
    /*margin: 15px 0 0 0;*/
    padding: 5px 0 5px 0;
  }
    .well_class {
    border: none !important;
    padding: 0px 0px !important;
    margin-bottom: 0px !important;
    box-shadow: none !important;
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
    height: 21.5%;
    padding-top: 30px;
    padding-bottom: 0px;
    padding-left: 15px;
    padding-right: 20px;
   /* background: #201B1F;*/
  }
  /* css for body*/
  .Main_Form_list_site_visit
  {
    float: left;
    position: absolute;
    top: 21vh;
    /*left: 27.5%;
    width: 72.5%;*/
    /*background-color: #f5f5f5;*/
    overflow-y: scroll;
    max-height: 56%;
    min-height: 56%;
    margin-bottom: 0px;
    /*background: #201B1F; */
  }
   .header_checklist 
  {
    float: left;
    position: absolute;
    top: 17.5vh;
    left: 0%;
    width: 100%;
  /*  background-color: #f5f5f5;*/
    height: 13%;
   /* padding-top: 30px;*/
    padding-bottom: 0px;
   /* padding-left: 15px;
    padding-right: 20px;*/
   /* background: #201B1F;*/
  }
    .body_checklist 
  {
    padding: 0px 0px;
    float: left;
    position: absolute;
    top: 30.3vh;
    left: 0%;
    width: 100%;
    overflow-y: scroll;
    max-height: 55%;
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
      .checklistwidth {
    width: 18vw !important;
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
 

  /* Create an active/current tablink class */
  div.tab button.active 
  {
    /*background-color: #ccc;*/
    border-bottom: 2px solid #FF7B2A;
  }

  /* Style the tab content */
  .tabcontent 
  {
    //display: none;
    padding: 6px 12px;
    /*border: 1px solid #ccc;*/
    border-top: none;
  }

  .not-selected1 
  {
    background-color:green;
    width: 30px;
    height: 30px;
    -webkit-text-stroke: 2px green;
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
   .glyphicon-edit1:before 
  {

    font-size: 14px !important;
    
    top: -12px !important%;
   
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
    right: 12%;
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
  @media (min-width:1400px){
    .body_checklist {
      top: 31.4vh !important;
          max-height: 54.5%;
    }
  }
  @media (max-width: 1024px){
    .body_checklist {
      top: 31.4vh !important;
      max-height: 53% !important;
   }
  }
  @media (max-width:768px){
     .checklistwidth {
    width: 20vw !important;
  }
  
        .headeryesno {
    margin-left: -15px !important;
}
#mytable {
    font-size: 1em !important;
}

  }
</style>


