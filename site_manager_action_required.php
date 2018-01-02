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

  $get_data = $conn->query("select *,tbl_sm_weekly_main.id, tbl_sm_weekly_action.id as aid,tbl_sm_weekly_action.row_id as final_row_id, date(tbl_filled_sm_weekly.created) as created_filled FROM tbl_sm_weekly_main  join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id   join tbl_filled_sm_weekly on tbl_sm_weekly_action.checklist_udid  = tbl_filled_sm_weekly.checklist_udid  AND tbl_filled_sm_weekly.project_id ='3'  AND tbl_filled_sm_weekly.is_deleted = '0' AND tbl_filled_sm_weekly.is_submitted = '1' AND  (tbl_sm_weekly_action.actual_date  = '' or tbl_sm_weekly_action.actual_date IS  NULL) AND tbl_sm_weekly_action.action = '2' WHERE  tbl_sm_weekly_action.emp_id = '1'  order by  tbl_sm_weekly_main.task_number");
  $get_count = $conn->query("select count(*) as count FROM tbl_sm_weekly_main  join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id   join tbl_filled_sm_weekly on tbl_sm_weekly_action.checklist_udid  = tbl_filled_sm_weekly.checklist_udid  AND tbl_filled_sm_weekly.project_id ='3'  AND tbl_filled_sm_weekly.is_deleted = '0' AND tbl_filled_sm_weekly.is_submitted = '1' AND  (tbl_sm_weekly_action.actual_date  = '' or tbl_sm_weekly_action.actual_date IS  NULL) AND tbl_sm_weekly_action.action = '2' WHERE  tbl_sm_weekly_action.emp_id = '1'  order by  tbl_sm_weekly_main.task_number")->fetch_object();
?>
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
      <div class="col-sm-1" style="padding-top: 30px"><? include('modButton.php'); ?></div>
      <div class="col-sm-9" style="padding-top: 40px;padding-left: 30px;">
          <legend class="main_title_blue">OCCUPATIONAL HEALTH AND SAFETY MANAGEMENT SYSTEM</legend>
          <label class="control-label rightpadding"><span class="form-name_blue">SITE MANAGER SUPERVISOR WEEKLY REVIEW</span></label>
      </div>    
      <div class="col-sm-2">
        <div>
          <img src="image/logo.png" class="img-responsive pull-right" style="width: 70px;height: 70px;margin-top: 20px;image-rendering: -webkit-optimize-contrast;">
        </div>
      </div>

      <div class="col-md-12" >
          <div class="tab text-center"><button class="tablinks" id="defaultOpen" style="float: none">Action Required<span class="badge" style="background: red;padding: 4px 0px;font-size: 14px;margin-top:-30px;margin-left: 5px"><? if($count_action->count) {?><div style="height: 0px;"></div><? }?></span></button>
          </div>
      </div>
    </div>
  </div>



    <div class="col-sm-12 blue_table_head">
      <div class="col-sm-1"><span class="blue_table_label">No</span></div>
      <div class="col-sm-8"><span class="blue_table_label">TASK/ COMMENTS</span></div>
      <div class="col-sm-3 text-right"><span class="blue_table_label">Action</span></div>
    </div>
  </div>


<div class="Main_Form2_blue" style="top: 43vh;max-height: 56.6%;">
  <div class="col-md-12" style="padding-left: 0;">
    <form class="well form-horizontal well_class" action=" " method="POST"  id="actionRequiredForm"  enctype="multipart/form-data"  style="border: none;background: #393848;padding-left: 0 !important;padding-right: 0 !important">
      <fieldset>

      	<div class="form-group">
        	<div class="col-sm-12" style="padding-right: 0px;padding-left: 0px">
        		<? 
            	while($row_get_data = $get_data->fetch_object())
          		{
          	?>

          	<div id="London" class="tabcontent" >
	            <table id="mytable" class="table table-bordred" style=" background-color: #333240;color: #fff;">
              	<tbody>
	                <tr class="content_tr" id="mod_button" data-toggle="modal" data-target="#action_required_modal<?=$row_get_data->id?>">
                  	<td style="text-align: left;vertical-align: middle;padding-left: 30px"  class="col-sm-1"><?=$row_get_data->task_number?></td>    
                  	<td class="col-sm-9" style="vertical-align: middle;padding-left: 30px"><?=$row_get_data->task_desc?>
                    	<div id="span2" class="t r" style="vertical-align: middle;">
                      	<?if($row_get_data->checklist_action_comments == ''){?>
                      	<b>Action Required:</b>&nbsp;<? echo $row_get_data->comments; ?>
                      	<?}else{?>
	                      <b>Action Required:</b>&nbsp;<? echo $row_get_data->checklist_action_comments ?>
                      	<?}?>
                    	</div> 
                    	<div id="span2" class="t r" style="vertical-align: middle;;">
                      	
                      	&nbsp;<b>Action Complete:</b><? echo $row_get_data->action_complete ?>
                
                    	</div>
                      <div id="span2" class="t r" style="vertical-align: middle;;">
                        <?$get_resp_email= $conn->query("select id,email_add from tbl_employee where  id='".$row_get_data->emp_id."'")->fetch_object();?>
                        &nbsp;<b>RESP:</b><? echo $get_resp_email->email_add ?>
                      </div>
                      <div id="span2" class="t r" style="vertical-align: middle;;">
                        &nbsp;<b>Target Date:</b><? echo $row_get_data->target_date ?>
                      </div>
                  	</td>
                  	<td class="col-sm-2 text-right" style="padding-right: 30px;vertical-align: middle;">
	                    <?if($row_get_data->action == 1){ ?>
                        <span class="glyphicon glyphicon-ok not-selected1" id="gif_ok"></span>
                      <?}  else if($row_get_data->action == 2) {?><?=$row_get_row_id->checklist_udid?>
                        <span  class="glyphicon glyphicon-remove not-selected2" id="gif_ok"></span>
                      <?}  else if($row_get_data->action== 3){ ?>
                        <span class="glyphicon glyphicon-plus not-selected3" id="gif_na" style="color: black"><span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px;">N/A</span></span>
                      <? }?>
                  	</td>
                	</tr>
              	</tbody>
            	</table>
          	</div>   
        		<!--Pop Up for checklist editing-->
    				<div class="modal fade" id="action_required_modal<?=$row_get_data->id?>" role="dialog">
      				<div class="modal-dialog">
        				<div class="modal-content" style="background: #393848 !important;">
          				<div class="modal-header" style="border-bottom: none;">
            				<button type="button" class="close" data-dismiss="modal" style="color: #C9D5D8">&times;</button>
          				</div>
          				<div class="modal-body">
            				<label class="label_blue">Task</label>         
            				<textarea id="task_name"   rows="4" style="height: 50px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 10px; padding: 6px 12px;" readonly><?=$row_get_data->task_desc?></textarea>
            				<div class="" style="margin-top: 10px">
              				<label class="label_blue">Action Required</label>
              				<textarea type="text" name="" id="actionRequired" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 10px; padding: 6px 12px;"><?if($row_get_data->checklist_action_comments == ''){echo $row_get_data->comments;}else{echo $row_get_data->checklist_action_comments;}?></textarea>
                      <label class="label_blue" style="margin-top: 10px">Actual Comment</label>         
                    <textarea id="actualComment_<?=$row_get_data->id?>" rows="4" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 10px; padding: 6px 12px;" required></textarea> 
            				</div>
            				<div class="" style="margin-top: 10px">
              				<label class="label_blue">Resp Person</label>           
              				<select style="height: 34px;display: block;width: 100%;padding-left:20px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 20vh;" id="empId_<?=$row_get_data->id?>"  name="select_employer" required>
                			<? 
                  			$get_resp_name= $conn->query("select tbl_employee.id,tbl_employee.email_add,tbl_employee.given_name,tbl_employee.surname as name from tbl_employee INNER JOIN tbl_induction_register ON tbl_employee.id=tbl_induction_register.id where ( (tbl_induction_register.inducted_by IS NOT NULL AND tbl_induction_register.inducted_by != '')  AND tbl_induction_register.project_id='".$_SESSION['admin']."' AND tbl_employee.given_name !='Pieter' AND tbl_employee.surname !='Koppen') OR tbl_employee.id = '".$_SESSION['induction']."'  AND tbl_induction_register.is_deleted =' 0'");
                
                  			while($row_resp_name=$get_resp_name->fetch_object()){  
                			?>
                  			<option value="<?=$row_resp_name->id ?>"><?=$row_resp_name->email_add ?></option>
                  		<? }?> 
              				</select>
            				</div>
            				<div class="" style="margin-top: 10px">
              				<label class="label_blue">Target Date</label>
              				<input type="text" class="form-control form-control-left-radius" name="" id="target_date" value="<?=$row_get_data->target_date?>" readonly>
            				</div>
            				
            				<div class="" style="margin-top: 10px">
              				<label class="label_blue">Actual Date</label>
              				<input type="text" class="form-control form-control-left-radius actualDate" name="" id="actualDate_<?=$row_get_data->id?>">
            				</div>
            				<input type="hidden" value="<?=$row_get_data->aid?>" id="tbl_id_<?=$row_get_data->aid?>"> 
                    <input type="hidden" id="empid" value="<?=$row_get_data->emp_id?>">
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
            				<button type="button" class="btn btn-default"  style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;color: #fff;padding-left: 25px;padding-right: 25px" onclick="update_action_required($('#tbl_id_<?=$row_get_data->aid?>').val(),$('#actualDate_<?=$row_get_data->id?>').val(),$('#actualComment_<?=$row_get_data->id?>').val(),$('#empid').val(),'<?=$row_get_data->final_row_id ?>','<?=$row_get_data->created_filled ?>')">Save</button>
            				<button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;float: left;color: #fff;padding-left: 25px;padding-right: 25px">Cancel</button>
          				</div>
        				</div>
      				</div>
    				</div>
    				<?}?>
    				<!--Modal Close-->
  				</div>
  			</div>
  		</fieldset>
		</form>
  	<div id="margin_set" style="background: rgb(57, 56, 72)"></div>    
  	<? include("footer_new.php"); ?>
	</div>
</div> 

  <script type="text/javascript"> $('#margin_set').height($(window).height() - $('fieldset').height());
            </script>

<script>
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

	function update_action_required(id,date,comm,empid,row_id,checklist_date)
	{
    var valid = validate(date,comm);
    //alert(valid);
	 	//alert(id+" "+date+" "+comm+" "+empid);return false;
    if(valid)
    {
		  $.ajax({
        type: "POST",
        url: "query_action_required.php",
        data: {id:id, date:date, action_comment: comm,empid:empid,row_id:row_id,checklist_date:checklist_date },
        success: function(data) {
          alert(data);
          if(data=='1')
          {
            //location.reload();

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

<style>
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
    //display: none;
    padding: 6px 12px;
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
</style>


