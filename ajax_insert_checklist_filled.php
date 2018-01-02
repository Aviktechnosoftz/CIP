<? 
session_start();
include_once('connect.php');


  $cur_date= strtotime(date('Y-m-d'));
  $cur_time= strtotime(date('H:i:s'));
  $sum= $cur_date+$cur_time;
  $udid=md5($sum);

$insert_data_filled= $conn->query("insert into tbl_filled_sm_weekly set 
                    induction_no = '".$_SESSION["induction"]."',
                    checklist_udid='".$udid."',
                    project_id='".$_SESSION['admin']."',
                    created='".$_POST['inspection_date']."',
                    updated='".$_POST['inspection_date']."'");


$get_previous_checklist=$conn->query("Select * from tbl_filled_sm_weekly Where project_id ='".$_SESSION['admin']."'  AND is_deleted = '0' AND is_submitted = '1'  order by date(created) DESC limit 1")->fetch_object();

$get_previous_data= $conn->query("select *,tbl_sm_weekly_main.id FROM tbl_sm_weekly_main join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id AND tbl_sm_weekly_action.checklist_udid = '".$get_previous_checklist->checklist_udid."'  AND tbl_sm_weekly_action.action = '2'  order by  tbl_sm_weekly_main.task_number")->num_rows;

if($get_previous_data >0)
{
$get_previous_data2= $conn->query("select *,tbl_sm_weekly_main.id FROM tbl_sm_weekly_main join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id AND tbl_sm_weekly_action.checklist_udid = '".$get_previous_checklist->checklist_udid."'  AND tbl_sm_weekly_action.action = '2'  order by  tbl_sm_weekly_main.task_number");

while ($row_get_previous_data= $get_previous_data2->fetch_object()) {

  $insert_previous_action= $conn->query("insert into tbl_sm_weekly_action set
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
                                          target_date='".$row_get_previous_data->target_date."',
                                          actual_date='".$row_get_previous_data->actual_date."',
                                          emp_id='".$row_get_previous_data->emp_id."',
                                          is_uploaded='".$row_get_previous_data->is_uploaded."',
                                          induction_id='".$row_get_previous_data->induction_id."'

                                        ");
}
}

if($insert_data_filled)
{
	echo "1";
	$_SESSION['udid']=$udid;
}
else{
	echo "0";
}




?>