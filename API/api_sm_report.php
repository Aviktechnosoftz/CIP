
<?
include('inc/config.php');
$JsonData = $_REQUEST['jsondata'];

$exjson = json_decode($JsonData, true); 


foreach ($exjson['sm_report_action_data'] as $row) 
{ 

$sql_3 = "insert into  tbl_sm_report_action
 (`checklist_udid`,`action`,`checklist_action_comments`,`is_deleted`,`created`,`updated`,`row_id`,`checklist_main_comments`,`is_uploaded`,`action_required`,`resp`,`target_date`,`actual_date`,`resp_dd`,`emp_id`,`action_complete`,`induction_id`,`resp_name`,`is_task_obs`) 

 VALUES ('".$row['checklist_udid']."','".$row['action']."','".$row['checklist_action_comments']."','".$row['is_deleted']."','".$row['created']."','".$row['updated']."','".$row['row_id']."','".$row['checklist_main_comments']."','".$row['is_uploaded']."','".$row['action_required']."','".$row['resp']."','".$row['target_date']."','".$row['actual_date']."','".$row['resp_dd']."','".$row['emp_id']."','".$row['action_complete']."','".$row['induction_id']."','".$row['resp_name']."','".$row['is_task_obs']."') ON DUPLICATE KEY UPDATE 


 action='".$row['action']."',
  checklist_action_comments='".$row['checklist_action_comments']."',
   is_deleted='".$row['is_deleted']."',
    updated='".$row['updated']."',
     checklist_main_comments='".$row['checklist_main_comments']."',
      is_uploaded='".$row['is_uploaded']."',
       action_required='".$row['action_required']."',
        resp='".$row['resp']."',
        target_date='".$row['target_date']."',
        is_task_obs='".$row['is_task_obs']."',
        actual_date='".$row['actual_date']."',
 resp_dd='".$row['resp_dd']."',
 emp_id='".$row['emp_id']."',
 action_complete='".$row['action_complete']."',
 induction_id='".$row['induction_id']."',
 resp_name='".$row['resp_name']."'"


  ;
    

$result2 = mysql_query($sql_3);

    }



    foreach ($exjson['sm_report_filled_data'] as $row) 
{ 




$sql_4 = "insert into   tbl_sm_report_filled
 (`induction_no`,`checklist_udid`,`is_deleted`,`created`,`updated`,`project_id`,`number_of_week`,`year`,`is_uploaded`,`is_submitted`) 



 VALUES ('".$row['induction_no']."','".$row['checklist_udid']."','".$row['is_deleted']."','".$row['created']."','".$row['updated']."','".$row['project_id']."','".$row['number_of_week']."','".$row['year']."','".$row['is_uploaded']."','".$row['is_submitted']."') ON DUPLICATE KEY UPDATE 







 induction_no='".$row['induction_no']."',
  is_deleted='".$row['is_deleted']."',
   updated='".$row['updated']."',
    project_id='".$row['project_id']."',
     number_of_week='".$row['number_of_week']."',
      year='".$row['year']."',
    
 is_uploaded='".$row['is_uploaded']."',
is_submitted='".$row['is_submitted']."'"

  ;
    

$result3 = mysql_query($sql_4);

    }

    if($sql_3 OR $sql_4)
    {
      echo "{\"response\":\"200\",\"data\":\"Data Entered Successfully \"}";
    }

