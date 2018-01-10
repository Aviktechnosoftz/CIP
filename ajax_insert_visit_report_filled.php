<? 
session_start();
error_reporting(0);
include_once('connect.php');


  $cur_date= strtotime(date('Y-m-d'));
  $cur_time= strtotime(date('H:i:s'));
  $sum= $cur_date+$cur_time;
  $udid=md5($sum);

$insert_data_filled= $conn->query("insert into tbl_sm_report_filled set 
                    induction_no = '".$_SESSION["induction"]."',
                    checklist_udid='".$udid."',
                    project_id='".$_SESSION['admin']."',
                    created='".$_POST['inspection_date']."',
                    updated='".$_POST['inspection_date']."'");


$get_previous_checklist=$conn->query("Select * from tbl_sm_report_filled Where project_id ='".$_SESSION['admin']."'  AND is_deleted = '0' AND is_submitted = '1'  order by date(created) DESC limit 1")->fetch_object();

@$get_previous_data= $conn->query("select *,tbl_sm_report_main.id FROM tbl_sm_report_action left join tbl_sm_report_main on tbl_sm_report_main.id = tbl_sm_report_action.row_id 
left join tbl_sm_report_task_obs on tbl_sm_report_task_obs.id=tbl_sm_report_action.row_id where
 tbl_sm_report_action.checklist_udid = '".$get_previous_checklist->checklist_udid."' AND tbl_sm_report_action.action = '2'  order by  tbl_sm_report_main.task_number")->num_rows;





if($get_previous_data >0)
{
$get_previous_data2= $conn->query("select *,tbl_sm_report_main.id,tbl_sm_report_task_obs.task_desc as obs_task_desc,tbl_sm_report_task_obs.emp_id as task_obs_empid,tbl_sm_report_task_obs.comments as task_obs_comments,tbl_sm_report_task_obs.general_question as task_obs_general_question,tbl_sm_report_action.emp_id as action_emp

 FROM tbl_sm_report_action left join tbl_sm_report_main on tbl_sm_report_main.id = tbl_sm_report_action.row_id 
left join tbl_sm_report_task_obs on tbl_sm_report_task_obs.id=tbl_sm_report_action.row_id where
 tbl_sm_report_action.checklist_udid = '".$get_previous_checklist->checklist_udid."' AND tbl_sm_report_action.action = '2'  order by  tbl_sm_report_main.task_number");
$task_number=1;
while ($row_get_previous_data= $get_previous_data2->fetch_object()) {

  if($row_get_previous_data->is_task_obs == '0')
  {

  $insert_previous_action= $conn->query("insert into tbl_sm_report_action set
                                          checklist_udid='".$udid."',
                                          action='".$row_get_previous_data->action."',
                                          checklist_action_comments='".$row_get_previous_data->checklist_action_comments."',
                                          created='".$_POST['inspection_date']."',
                                          updated='".$_POST['inspection_date']."',
                                          row_id='".$row_get_previous_data->row_id."',
                                          checklist_main_comments='".$row_get_previous_data->checklist_main_comments."',
                                          action_required='".$row_get_previous_data->action_required."',
                                          resp='".$row_get_previous_data->resp."',
                                          resp_dd='".$row_get_previous_data->resp_dd."',
                                          is_task_obs='0',
                                          target_date='".$row_get_previous_data->target_date."',
                                          actual_date='".$row_get_previous_data->actual_date."',
                                          emp_id='".$row_get_previous_data->action_emp."',
                                          is_uploaded='".$row_get_previous_data->is_uploaded."',
                                          induction_id='".$row_get_previous_data->induction_id."'
                                         

                                        ");
  }

  if($row_get_previous_data->is_task_obs == '1')
  {


$get_max_task_obs= $conn->query("Select max(id)+1 as max_task from tbl_sm_report_task_obs where project_id='".$_SESSION['admin']."'")->fetch_object();


$insert_task_obs_previous=$conn->query("insert into tbl_sm_report_task_obs set
                                             id='".$get_max_task_obs->max_task."',
                                          task_number='".$task_number."',
                                          task_desc='".$row_get_previous_data->obs_task_desc."',
                                          project_id='".$_SESSION['admin']."',
                                          emp_id='".$row_get_previous_data->task_obs_empid."',
                                          comments='".$row_get_previous_data->task_obs_comments."',
                                          general_question='".$row_get_previous_data->task_obs_general_question."',
                                          udid='".$udid."',
                                          created=NOW(),
                                          updated=NOW()
                                              
                                       ");


  $insert_previous_action_task= $conn->query("insert into tbl_sm_report_action set
                                          checklist_udid='".$udid."',
                                          action='".$row_get_previous_data->action."',
                                          checklist_action_comments='".$row_get_previous_data->checklist_action_comments."',
                                          created='".$_POST['inspection_date']."',
                                          updated='".$_POST['inspection_date']."',
                                          row_id='".$get_max_task_obs->max_task."',
                                          checklist_main_comments='".$row_get_previous_data->checklist_main_comments."',
                                          action_required='".$row_get_previous_data->action_required."',
                                          resp='".$row_get_previous_data->resp."',
                                          resp_dd='".$row_get_previous_data->resp_dd."',
                                          is_task_obs='1',
                                          target_date='".$row_get_previous_data->target_date."',
                                          actual_date='".$row_get_previous_data->actual_date."',
                                          emp_id='".$row_get_previous_data->action_emp."',
                                          is_uploaded='".$row_get_previous_data->is_uploaded."',
                                          induction_id='".$row_get_previous_data->induction_id."'
                                         

                                        ");

  $task_number++;
  }









  }
}

if($insert_data_filled)
{
	echo "1";
	$_SESSION['udid_report']=$udid;
}
else{
	echo "0";
}




?>