<? 
session_start();
include_once('connect.php');


  $cur_date= strtotime(date('Y-m-d'));
  $cur_time= strtotime(date('H:i:s'));
  $sum= $cur_date+$cur_time;
  $udid=md5($sum);


  $get_previous_checklist=$conn->query("Select * from tbl_filled_sm_weekly Where project_id ='".$_SESSION['admin']."'  AND is_deleted = '0' AND is_submitted = '1'  order by date(created) DESC limit 1")->fetch_object();

  $get_previous_checklist_actions=$conn->query("select *,tbl_sm_weekly_main.id FROM tbl_sm_weekly_main join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id AND tbl_sm_weekly_action.checklist_udid = '".$get_previous_checklist->checklist_udid."'  order by  tbl_sm_weekly_main.task_number");


  $insert_new_filled= $conn->query("insert into tbl_filled_sm_weekly set 
  	induction_no='".$_SESSION['induction']."',
	checklist_udid='".$udid."',
	is_deleted='0',
	created='".$_POST['inspection_date']."',
	updated=NOW(),
	project_id='".$_SESSION['admin']."'
	");

  if($insert_new_filled)
  {
  	while($row_previous_action=$get_previous_checklist_actions->fetch_object())
  	{
  		$insert_new_action= $conn->query("insert into tbl_sm_weekly_action set 
	checklist_udid='".$udid."',
	action='".$row_previous_action->action."',
	checklist_action_comments='".$row_previous_action->checklist_action_comments."',
	is_deleted  ='".$row_previous_action->is_deleted."',
	row_id  ='".$row_previous_action->row_id."',
	checklist_main_comments='".$row_previous_action->checklist_main_comments."',
	is_uploaded='".$row_previous_action->is_uploaded."',
	action_required='".$row_previous_action->action_required."',
	resp='".$row_previous_action->resp."',
		target_date='".$row_previous_action->target_date."',
			actual_date='".$row_previous_action->actual_date."',
				resp_dd='".$row_previous_action->resp_dd."',
					resp_name='".$row_previous_action->resp_name."',
						emp_id='".$row_previous_action->emp_id."',
						action_complete='".$row_previous_action->action_complete."',
						induction_id='".$row_previous_action->induction_id."',

	created='".$_POST['inspection_date']."',
	updated=NOW()
	");

  	}

  		echo "1";
  }

  else
  {
  	echo "0";
  }

?>