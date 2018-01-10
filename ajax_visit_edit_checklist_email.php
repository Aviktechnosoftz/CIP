<? 
	// error_reporting(0);
	session_start();
	include_once('connect.php');
	//echo $_REQUEST['date'];die();
	$get_cc_email= $conn->query("select email_add from tbl_employee where id='".$_SESSION['induction']."'")->fetch_object();

	$get_visit_edit_data_completed = $conn->query("select *,date_format(tbl_sm_report_action.created, '%y%m%d') as checkdate from tbl_sm_report_action left join tbl_sm_report_filled on (tbl_sm_report_filled.checklist_udid = tbl_sm_report_action.checklist_udid) where date(tbl_sm_report_filled.created) = '".$_REQUEST['date']."' and tbl_sm_report_action.action = '1' and (tbl_sm_report_action.actual_date != NULL or tbl_sm_report_action.actual_date != '' ) and (tbl_sm_report_action.action_complete != NULL or tbl_sm_report_action.action_complete != '') order by tbl_sm_report_action.id");

	while ($row_get_visit_edit_data = $get_visit_edit_data_completed->fetch_object())
	{
		if($row_get_visit_edit_data->is_mail == 0 )
		{
			$update_is_mail = $conn->query("update tbl_sm_report_action set is_mail = 1 where id=".$row_get_visit_edit_data->id);
			
			$get_visit_edit_email=$conn->query("select * from tbl_employee where id =".$row_get_visit_edit_data->emp_id)->fetch_object();

			$email_address = $get_visit_edit_email->email_add;
			$name = $get_visit_edit_email->given_name.'%20'.$get_visit_edit_email->surname;
			$checklistdate = $row_get_visit_edit_data->checkdate;
			$comments = str_replace(' ', '%20', $row_get_visit_edit_data->action_required);
			$targetDate =trim($row_get_visit_edit_data->target_date);
			$action_complete = str_replace(' ', '%20', $row_get_visit_edit_data->action_complete);
			$actual_date = $row_get_visit_edit_data->actual_date;
			if($row_get_visit_edit_data->is_task_obs == 1)
			{	
				$get_task_number = $conn->query("select task_number from tbl_sm_report_task_obs where id=".$row_get_visit_edit_data->row_id)->fetch_object();
				$task_number = $get_task_number->task_number;
				$url = "http://192.169.226.71/VS/api_upload.php?count=0&email_id=".$email_address."&sub=".$_SESSION['project_name']."-".$checklistdate."-SM%20Weekly-Action%20Required-Task%20Number-".$task_number."%20Completed&msg=Hi,%20".$name."<br/><br/>Can%20you%20please%20tidy%20up%20the%20below%20action%20item<br/><br/>Task%20Number%20".$task_number."-".$comments."<br/><br/>Target%20Date:%20to%20rectify%20item%20".$targetDate."<br/><br/>Action%20Completed%20:%20".$action_complete."<br/><br/>Actual%20Date%20:%20".$actual_date."&cc=".$get_cc_email->email_add;

				$payload = file_get_contents($url);	
			}
			else
			{
				$task_number = $row_get_visit_edit_data->row_id;
				$url = "http://192.169.226.71/VS/api_upload.php?count=0&email_id=".$email_address."&sub=".$_SESSION['project_name']."-".$checklistdate."-SM%20Weekly-Action%20Required-Task%20Number-".$task_number."%20Completed&msg=Hi,%20".$name."<br/><br/>Can%20you%20please%20tidy%20up%20the%20below%20action%20item<br/><br/>Task%20Number%20".$task_number."-".$comments."<br/><br/>Target%20Date:%20to%20rectify%20item%20".$targetDate."<br/><br/>Action%20Completed%20:%20".$action_complete."<br/><br/>Actual%20Date%20:%20".$actual_date."&cc=".$get_cc_email->email_add;

				$payload = file_get_contents($url);
			}
		}
	}

	$get_visit_edit_data = $conn->query("select *,date_format(tbl_sm_report_action.created, '%y%m%d') as checkdate from tbl_sm_report_action left join tbl_sm_report_filled on (tbl_sm_report_filled.checklist_udid = tbl_sm_report_action.checklist_udid) where date(tbl_sm_report_filled.created) = '".$_REQUEST['date']."' and tbl_sm_report_action.action = '2' and (tbl_sm_report_action.actual_date = NULL or tbl_sm_report_action.actual_date = '' ) and (tbl_sm_report_action.action_complete = NULL or tbl_sm_report_action.action_complete = '') order by tbl_sm_report_action.id");

	while ($row_get_visit_edit_data = $get_visit_edit_data->fetch_object())
	{
		$get_visit_edit_email=$conn->query("select * from tbl_employee where id =".$row_get_visit_edit_data->emp_id)->fetch_object();

		$email_address = $get_visit_edit_email->email_add;
		$name = $get_visit_edit_email->given_name.'%20'.$get_visit_edit_email->surname;
		$checklistdate = $row_get_visit_edit_data->checkdate;
		$comments = str_replace(' ', '%20', $row_get_visit_edit_data->action_required);
		$targetDate =trim($row_get_visit_edit_data->target_date);
		$action_complete = str_replace(' ', '%20', $row_get_visit_edit_data->action_complete);
		$actual_date = $row_get_visit_edit_data->actual_date;
		if($row_get_visit_edit_data->is_task_obs == 1)
		{	
			$get_task_number = $conn->query("select task_number from tbl_sm_report_task_obs where id=".$row_get_visit_edit_data->row_id)->fetch_object();
			$task_number = $get_task_number->task_number;
		
			$url = "http://192.169.226.71/VS/api_upload.php?count=0&email_id=".$email_address."&sub=".$_SESSION['project_name']."-".$checklistdate."-Senior%20Visit-Action%20Required-Task%20Number-".$task_number."&msg=Hi,%20".$name."<br/><br/>Can%20you%20please%20tidy%20up%20the%20below%20action%20item<br/><br/>Task%20Number%20".$task_number."-".$comments."<br/><br/>Target%20Date:%20to%20rectify%20item%20".$targetDate."&cc=".$get_cc_email->email_add;

			$payload = file_get_contents($url);	
		}
		else
		{
			$task_number = $row_get_visit_edit_data->row_id;
		

			$url = "http://192.169.226.71/VS/api_upload.php?count=0&email_id=".$email_address."&sub=".$_SESSION['project_name']."-".$checklistdate."-Senior%20Visit-Action%20Required-Task%20Number-".$task_number."&msg=Hi,%20".$name."<br/><br/>Can%20you%20please%20tidy%20up%20the%20below%20action%20item<br/><br/>Task%20Number%20".$task_number."-".$comments."<br/><br/>Target%20Date:%20to%20rectify%20item%20".$targetDate."&cc=".$get_cc_email->email_add;

			$payload = file_get_contents($url);
		}
	}
?>