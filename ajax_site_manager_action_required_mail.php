<?
  session_start();
  //error_reporting(0);
  include_once('connect.php');
  $udid = $_POST['udid'];
  
  $get_cc_email= $conn->query("select email_add from tbl_employee where id='".$_SESSION['induction']."'")->fetch_object();

  $get_email_completed=$conn->query("select *,date_format(tbl_sm_weekly_action.created, '%y%m%d') as checkdate from tbl_sm_weekly_action where tbl_sm_weekly_action.action = '1' and (tbl_sm_weekly_action.actual_date != NULL or tbl_sm_weekly_action.actual_date != '' ) and (tbl_sm_weekly_action.action_complete != NULL or tbl_sm_weekly_action.action_complete != '') order by tbl_sm_weekly_action.id");

  while($row_get_email_addr = $get_email_completed->fetch_object() )
  {
    if($row_get_email_addr->is_mail == 0)
    {
      $update_is_mail = $conn->query("update tbl_sm_weekly_action set is_mail = 1 where id=".$row_get_email_addr->id);

      $get_name=$conn->query("select tbl_employee.given_name,tbl_employee.email_add from tbl_employee inner join tbl_sm_weekly_action on tbl_employee.id=tbl_sm_weekly_action.emp_id WHERE tbl_sm_weekly_action.emp_id = '".@$row_get_email_addr->emp_id."'")->fetch_object();  

      $emp_name=str_replace(' ', '%20', @$get_name->given_name);
      $email_address = @$get_name->email_add;
      $checklistdate = $row_get_email_addr->checkdate;
      $task_number = $row_get_email_addr->row_id;
      $comments = str_replace(' ', '%20', $row_get_email_addr->action_complete);
      $targetDate =trim($row_get_email_addr->target_date);
      $actual_comments = str_replace(' ', '%20', $row_get_email_addr->action_complete);
      $actualDate =trim($row_get_email_addr->actual_date);

      $url = "http://192.169.226.71/VS/api_upload.php?count=0&email_id=".$email_address."&sub=".$_SESSION['project_name']."-".$checklistdate."-SM-Weekly-Action%20Required-Task%20Number-".$task_number."%20Completed&msg=Hi%20".$emp_name."<br/><br/>Please%20be%20advised%20that%20action%20Item%20".$task_number."%20has%20been%20closed%20out.<br/><br/>Task%20Number%20".$task_number."-".$comments."<br/><br/>Target%20Date:%20to%20rectify%20item%20".$targetDate."<br/><br/>Action%20Completed%20:%20".$actual_comments."<br/><br/>Actual%20Date%20:%20".$actualDate."&cc=".$get_cc_email->email_add;

      $payload = file_get_contents($url);
    }
  }

 $get_email_addr = $conn->query("select *,tbl_sm_weekly_main.id, date_format(tbl_sm_weekly_action.created, '%y%m%d') as checkdate FROM tbl_sm_weekly_main left join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id left join tbl_employee on tbl_sm_weekly_action.emp_id = tbl_employee.id WHERE  tbl_sm_weekly_action.action = '2' and tbl_sm_weekly_action.is_uploaded = 1 order by  tbl_sm_weekly_main.task_number");

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
    
?>