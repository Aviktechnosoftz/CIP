<? 
	// error_reporting(0);
	session_start();
	include_once('connect.php');

	$update_checklist_submit= $conn->query("update tbl_sm_report_filled set is_submitted='1',updated=NOW() where checklist_udid='".$_SESSION['udid_report']."'");

	$get_cc_email = $conn->query("select email_add from tbl_employee where id='".$_SESSION['induction']."'")->fetch_object();

	$get_mail_data = $conn->query("select *,tbl_sm_report_main.id, date_format(tbl_sm_report_action.created, '%y%m%d') as checkdate FROM tbl_sm_report_main left join tbl_sm_report_action on tbl_sm_report_main.id = tbl_sm_report_action.row_id AND tbl_sm_report_action.checklist_udid = '".$_SESSION['udid_report']."' WHERE tbl_sm_report_action.action = '2' order by tbl_sm_report_main.task_number");

	while ( $row_get_mail_data = $get_mail_data->fetch_object()) 
	{
		$get_email_addr = $conn->query("select * from tbl_employee where id =".$row_get_mail_data->emp_id)->fetch_object();
		$email_address = $get_email_addr->email_add;
		$name = $get_email_addr->given_name.'%20'.$get_email_addr->surname;
		$checklistdate = $row_get_mail_data->checkdate;
		$task_number = $row_get_mail_data->task_number;
		$comments = str_replace(' ', '%20', $row_get_mail_data->action_required);
		$targetDate =trim($row_get_mail_data->target_date);

		$url = "http://192.169.226.71/VS/api_upload.php?count=0&email_id=".$email_address."&sub=".$_SESSION['project_name']."-".$checklistdate."-Senior%20Visit-Action%20Required-Task%20Number-".$task_number."&msg=Hi,%20".$name."<br/><br/>Can%20you%20please%20tidy%20up%20the%20below%20action%20item<br/><br/>Task%20Number%20".$task_number."-".$comments."<br/><br/>Target%20Date:%20to%20rectify%20item%20".$targetDate."&cc=".$get_cc_email->email_add;
		$payload = file_get_contents($url);
	}

	$get_mail_data_task_obs =$conn->query("select *,tbl_sm_report_task_obs.id, date_format(tbl_sm_report_task_obs.created, '%y%m%d') as checkdate, tbl_sm_report_action.emp_id as mainEmpId FROM tbl_sm_report_task_obs left join tbl_sm_report_action on tbl_sm_report_task_obs.id = tbl_sm_report_action.row_id AND  tbl_sm_report_action.checklist_udid = '".$_SESSION['udid_report']."' WHERE  tbl_sm_report_action.action = '2' order by  tbl_sm_report_task_obs.task_number");

	while ( $row_get_mail_data_task_obs = $get_mail_data_task_obs->fetch_object()) 
	{
		$get_email_addr_task_obs = $conn->query("select * from tbl_employee where id =".$row_get_mail_data_task_obs->mainEmpId)->fetch_object();
		$email_address = $get_email_addr_task_obs->email_add;
		$name = $get_email_addr_task_obs->given_name.'%20'.$get_email_addr_task_obs->surname;
		$checklistdate = $row_get_mail_data_task_obs->checkdate;
		$task_number = $row_get_mail_data_task_obs->task_number;
		$comments = str_replace(' ', '%20', $row_get_mail_data_task_obs->action_required);
		$targetDate =trim($row_get_mail_data_task_obs->target_date);

		$url = "http://192.169.226.71/VS/api_upload.php?count=0&email_id=".$email_address."&sub=".$_SESSION['project_name']."-".$checklistdate."-Senior%20Visit-Action%20Required-Task%20Number-".$task_number."&msg=Hi,%20".$name."<br/><br/>Can%20you%20please%20tidy%20up%20the%20below%20action%20item<br/><br/>Task%20Number%20".$task_number."-".$comments."<br/><br/>Target%20Date:%20to%20rectify%20item%20".$targetDate."&cc=".$get_cc_email->email_add;

		$payload = file_get_contents($url);
	}

?>