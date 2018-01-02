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

  $get_data = $conn->query("select *,tbl_sm_report_action.id as aid, tbl_sm_report_action.row_id as arowid,tbl_sm_report_main.task_number as main_tasknumber,tbl_sm_report_action.emp_id as action_emp,tbl_sm_report_main.task_desc as main_taskdesc, date(tbl_sm_report_action.created) as created_filled,tbl_sm_report_task_obs.task_number as obstask  FROM tbl_sm_report_action left join tbl_sm_report_main on (tbl_sm_report_main.id = tbl_sm_report_action.row_id) left join tbl_sm_report_task_obs on (tbl_sm_report_action.row_id=tbl_sm_report_task_obs.id)  WHERE  ((tbl_sm_report_action.action = '2' or ( (tbl_sm_report_action.actual_date  = '' AND tbl_sm_report_action.actual_date IS NULL))))");

  // $get_count = $conn->query("select count(*) as count FROM tbl_sm_weekly_main  join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id   join tbl_filled_sm_weekly on tbl_sm_weekly_action.checklist_udid  = tbl_filled_sm_weekly.checklist_udid  AND tbl_filled_sm_weekly.project_id ='3'  AND tbl_filled_sm_weekly.is_deleted = '0' AND tbl_filled_sm_weekly.is_submitted = '1' AND  (tbl_sm_weekly_action.actual_date  = '' or tbl_sm_weekly_action.actual_date IS  NULL) AND tbl_sm_weekly_action.action = '2' WHERE  tbl_sm_weekly_action.emp_id = '1'  order by  tbl_sm_weekly_main.task_number")->fetch_object();
?>
  <header>
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
  </header>
   <div class="main_form_header_blue gradient_Class" style="padding-left: 0;padding-right: 0;padding-top: 5px;height: 25% background:#354A65;">
    <div class="row">
      <div class="col-sm-12">
          <div class="col-md-6 col-xs-6 main_title_container pull-left">
      <div class="col-md-2 pull-left" style="padding: 0px; margin-left: -5px;z-index: 111;display:none;"> 
	  <div >
	  <? include('modbutton_visit.php'); ?>
	  </div>
	  </div>
       <div class="col-md-10 headerpadding" style="margin-left: -1em;"> 
      <legend class="main_title_blue">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
      <label class="control-label rightpadding"><span class="form-name_blue" style="color: rgb(191, 184, 184) !important;">SENIOR MANAGEMENT SITE VISIT REPORT&nbsp;</span></label>
      <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div></div>
     <div class="col-sm-2 datetop " style="margin-top: 10vh;p"><span class="bottom_text datefont" style="display:none;font-family: 'Avenirnext'; margin-left: 32px;font-size: 14px;border: 2px solid #49617B;border-radius: 25px; padding: 5px;padding-left: 20px;padding-right: 20px;background: #49617B;"><?=date("d F Y ") ?><img class="dateimage" src="image/homedate.png" style="margin-left: 3%;margin-bottom: 3px;"></span></div>
    <div class="col-md-3 form_logo_container ">
      <img class="logowidth" src="image/logo.png" width="17%">
    </div>
		
		<div class="col-md-12" >
          <div class="tab text-center"><button class="tablinks" id="defaultOpen" style="float: none;border-bottom: 2px solid #FF7B2A;">Action Item<!-- <span class="badge" style="background: red;padding: 4px 0px;font-size: 14px;margin-top:-30px;margin-left: 5px"><? if($count_action->count) {?><div style="height: 0px;"></div><? }?></span> --></button></div>
        </div>
      </div>
    </div>
    <div class="col-sm-12 blue_table_head new_grey">
      <div class="col-sm-1"><span class="blue_table_label ">No</span></div>
      <div class="col-sm-8"><span class="blue_table_label ">TASK/</span> <span class="glyphicon glyphicon-Edit "></span><span class="blue_table_label ">COMMENTS</span></div>
      <div class="col-sm-3 text-right"><span class="blue_table_label">YES/NO/NA</span></div>
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
	                  <tr class="content_tr" id="mod_button" data-toggle="modal" data-target="#action_required_modal<?=$row_get_data->aid?>">
                    	<td style="text-align: left;vertical-align: middle;padding-left: 30px"  class="col-sm-1">
                        <? if($row_get_data->is_task_obs == '1') {echo $row_get_data->task_number;} else {echo $row_get_data->main_tasknumber;} ?>
                      </td>
                  	  <td class="col-sm-9" style="vertical-align: middle;padding-left: 30px">
                        <?if($row_get_data->is_task_obs == '1') {echo $row_get_data->task_desc;} else echo $row_get_data->main_taskdesc;  ?>
                    	  <div id="span2" class="t r" style="vertical-align: middle;">
                       	  <?//if($row_get_data->checklist_action_comments == ''){?>
                      	  <b>Action Required:</b>&nbsp;<?// echo $row_get_data->comments; ?><?=$row_get_data->action_required?>
                      	  <?//}else{?>
	                        <!-- <b>Action Required:</b>&nbsp;<? //echo $row_get_data->checklist_action_comments ?> -->
                      	  <?//}?>
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
  	                    <? if($row_get_data->action == 1) {?>
                        <span class="glyphicon glyphicon-ok not-selected1" id="gif_ok"></span>
                        <?}  else if($row_get_data->action == 2) { ?><?=$row_get_row_id->checklist_udid?>
                        <span  class="glyphicon glyphicon-remove not-selected2" id="gif_ok"></span>
                        <?}  else if($row_get_data->action== 3){ ?>
                        <span class="glyphicon glyphicon-plus not-selected3" id="gif_na" style="color: black"><span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px;">N/A</span></span>
                        <?}?>
                    	</td>
                  	</tr>
              	  </tbody>
            	  </table>
          	  </div>   
        		  <!--Pop Up for checklist editing-->
    				  <div class="modal fade" id="action_required_modal<?=$row_get_data->aid?>" role="dialog">
        		  <div class="modal-dialog">					
  
        				  <div class="modal-content" style="background: #F5F5F5 !important;">
						     <!--  <span class="fa-stack fa-lg close-button" data-dismiss="modal" >
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-times fa-stack-1x fa-inverse"></i>
    </span>
	-->
	<button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:50%;float: right;margin-top: -20px;margin-right: 6px;outline: none;border: none;width: 40px;height: 40px;">&#x2715;</button>   
						  
            				<div class="modal-header" style="border-bottom: none;">
							
            				  <button type="button" class="close" data-dismiss="modal" style="color: #C9D5D8">&times;</button>
          				  </div>
          				  <div class="modal-body">
						  
              				<label class="label_blue ">Task Observed</label>         
            				  <textarea id="task_name"   rows="4" style="height: 50px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 10px; padding: 6px 12px;" readonly><?if($row_get_data->is_task_obs == '1') {echo $row_get_data->task_desc;} else echo $row_get_data->main_taskdesc;  ?></textarea>
            				  <div class="" style="margin-top: 10px">
              				  <label class="label_blue ">Action Required</label>
              				  <textarea type="text" name="" id="actionRequired" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 10px; padding: 6px 12px;"><?//if($row_get_data->checklist_action_comments == ''){echo $row_get_data->comments;}else{echo $row_get_data->checklist_action_comments;}?> <?=$row_get_data->action_required?></textarea>
                        <label class="label_blue" style="margin-top: 10px">Action Complete</label>         
                        <textarea id="actualComment_<?=$row_get_data->id?>" rows="4" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 10px; padding: 6px 12px;" required></textarea> 
            				  </div>
            				  <div class="" style="margin-top: 10px">
              				  <label class="label_blue ">Resp Person</label>
                  		    <? //}?> 
                          <input type="text" class="form-control round_all_Borders" name="" id="empId_<?=$row_get_data->id?>" value="<?=$get_resp_email->email_add?>" readonly>
              				  <!-- </select> -->
            				  </div>
            				  <div class="" style="margin-top: 10px">
              				  <label class="label_blue ">Target Date</label>
              				  <input type="text" class="form-control round_all_Borders" name="" id="target_date" value="<?=$row_get_data->target_date?>" readonly>
            				  </div>			
            			    <div class="" style="margin-top: 10px">
              				  <label class="label_blue ">Actual Date</label>
              				  <input type="text" class="form-control round_all_Borders actualDate" name="" id="actualDate_<?=$row_get_data->id?>"> 
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
          				  <div class="modal-footer" style="border-top: none;height: 3em;">
              				<button type="button" class="btn btn-default"  style="background-color: #f47821;outline: none;border-radius: 6vh;  outline: none; border: none; color: #fff; padding-left: 25px;
    padding-right: 25px; left: 43%;position: absolute; bottom: 1%;" onclick="update_action_required($('#tbl_id_<?=$row_get_data->aid?>').val(),$('#actualDate_<?=$row_get_data->id?>').val(),$('#actualComment_<?=$row_get_data->id?>').val(),$('#empid').val(),'<?=$row_get_data->arowid ?>','<?=$row_get_data->created_filled ?>','<?=$row_get_data->obstask?>')">Save</button>
		
	<!--
              				<button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;float: left;color: #fff;padding-left: 25px;padding-right: 25px">Cancel</button>
            				</div>
							-->
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

  <script type="text/javascript"> 
    $('#margin_set').height($(window).height() - $('fieldset').height());
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
background: -webkit-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);
background: -o-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);
background: -ms-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);
background: -moz-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);
background: linear-gradient(to right, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);
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
    padding: 6px 12px;
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
    /*border: 1px solid #ccc;*/
    border-top: none;
  }

  .table>tbody>tr>td
  {
    border-top: #354A65 !important;
	background: #354A65;
  }
  .table>tbody>tr
  {
    font-size: 1em;
	background: #354A65;
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
    width: 20px;
    height: 20px;
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
    color: white;
    position: absolute;
    top: 15%;
    right: 10%;
  }
  .glyphicon-edit:before 
  {
    font-size: 20px;
    color: white;
    position: initial;
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
  
  
  
  
      .modal-body .label_blue 
	 {
    width: 100% !important;
    text-align: center !important;
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
	
	
	.close-button {
    position: absolute;
    right: -20px;
    top: -20px;
}

	
	.gradient_Class
	{
		
		background: -webkit-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%) !important;
background: -o-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%) !important;
background: -ms-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%) !important;
background: -moz-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%) !important;
background: linear-gradient(to right, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%) !important;
	}
	
.new_grey
	{
		
		background: #263344;
		
	}
	
	
	.round_all_Borders {
    border-top-left-radius: 20vh !important;
    border-bottom-left-radius: 20vh !important;
    border-top-right-radius: 20vh !important;
    border-bottom-right-radius: 20vh !important;
	}
	
	
 .logowidth 
 {
	 image-rendering: pixelated;width :14vh;margin-right: 42px;
	 
 }

.glyphicon-edit:before {font-size: 14px; !important;}

.table>tbody>tr>td {
     padding-left: 47px !important; 
}

.main_title_container {  text-align: left;  padding-left: 2em !important; height:0px !important;padding-top: 22px;}

.main_title_blue  {font-size: 2.1vh !important;}
.form-name_blue {font-size: 2.1vh !important;}
<!---->


  .headerpadding
 {
    padding: 10px; !important;
 }
 

@media only screen and (max-width: 768px)	
	{
		
		.modal-dialog{     margin: 13px auto  !important;}
.modal-content {    height:94% ;border-radius: 3% ; }

.logowidth  {	     width: 14vh;margin-right: 7px; }
  
 .main_form_header_blue {
    position: absolute;
    top: 16vh;
    left: 27.5%;
    width: 70.5%;
    height: 21.5%;
    padding-top: 30px;
}


.Main_Form2_blue {
    float: left;
    position: absolute;
    top: 37.5vh;
    left: 27.5%;
    width: 72.5%;
    overflow-y: scroll;
    max-height: 63%;
    background: #363642;
}

 
 
 .main_title_container {  text-align: left;  padding-left: 2em !important;  height: 100px;  padding-top: 22px;}
 
  .headerpadding
 {
 margin-left: -1em !important;
 }
 
 
   .headerpadding
 {
    padding: 0px; !important;
 }
 

} <!-- @media only screen and (max-width: 768px) -->



</style>


<script>

$(".modal-body textarea").css({"background-color": "#ffffff"});
$(".modal-body input").css({"background-color": "#ffffff"});
$(".modal-header").css({"display": "none"});

</script>


