<? 
// error_reporting(0);
	session_start();
	include_once('connect.php');
	// $get_total_main_records= $conn->query("select count(*) as count_main from tbl_sm_weekly_main where project_id='".$_SESSION['admin']."'")->fetch_object();
	// $get_total_action_records= $conn->query("select count(*) as count_action from tbl_sm_weekly_action where checklist_udid='".$_SESSION['udid']."'")->fetch_object();
	// if($get_total_main_records->count_main ==$get_total_action_records->count_action)
	// {
	  $update_checklist_submit= $conn->query("update tbl_filled_sm_weekly set is_submitted='1',updated=NOW() where checklist_udid='".$_SESSION['udid']."'");

	  $get_email_addr = $conn->query("select *,tbl_sm_weekly_main.id, date_format(tbl_sm_weekly_action.created, '%y%m%d') as checkdate FROM tbl_sm_weekly_main left join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id AND  tbl_sm_weekly_action.checklist_udid = '".$_SESSION['udid']."' left join tbl_employee on tbl_sm_weekly_action.emp_id = tbl_employee.id WHERE  tbl_sm_weekly_action.action = '2' order by  tbl_sm_weekly_main.task_number");

		$get_cc_email= $conn->query("select email_add from tbl_employee where id='".$_SESSION['induction']."'")->fetch_object();

		while($row_get_email_addr = $get_email_addr->fetch_object() )
		{
			$email_address = $row_get_email_addr->email_add;
			$checklistdate = $row_get_email_addr->checkdate;
			$task_number = $row_get_email_addr->task_number;
			$comments = str_replace(' ', '%20', $row_get_email_addr->comments);
			$targetDate =trim($row_get_email_addr->target_date);
			$url = "http://192.169.226.71/VS/api_upload.php?count=0&email_id=".$email_address."&sub=".$_SESSION['project_name']."-".$checklistdate."-SM-Weekly-Action%20Required-Task%20Number-".$task_number."&msg=Hi<br/><br/>Can%20you%20please%20tidy%20up%20the%20below%20action%20item<br/><br/>Task%20Number%20".$task_number."-".$comments."<br/><br/>Target%20Date:%20to%20rectify%20item%20".$targetDate."&cc=".$get_cc_email->email_add;
			$payload = file_get_contents($url);
		}
		
	// 	echo "1";
		
	// }
	// else
	// {
	// 	echo "0";
	// }
?>