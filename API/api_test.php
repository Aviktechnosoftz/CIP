

		 <?
include('../connect.php');
	$JsonData = '{
  "sm_action_data": [{
    "is_uploaded": "0",
    "row_id": "12",
    "id": "74",
    "resp": "",
    "checklist_main_comments": "All Site Amenities are cleaned by cleaner",
    "action_required": "",
    "resp_dd": "",
    "action": "1",
    "checklist_action_comments": "",
    "is_deleted": "0",
    "updated": "2017-09-15 06:52:22",
    "actual_date": "",
    "created": "2017-09-15 06:52:22",
    "checklist_udid": "847A1148-DBB8-457C-BC75-29C5187AADD0",
    "target_date": ""
  }, {
    "is_uploaded": "0",
    "row_id": "13",
    "id": "75",
    "resp": "test",
    "checklist_main_comments": "Site Fence is checked daily and also signed off on the weekly register",
    "action_required": "Site boundaries fenced and secure",
    "resp_dd": "SM",
    "action": "2",
    "checklist_action_comments": "",
    "is_deleted": "0",
    "updated": "2017-09-15 06:52:25",
    "actual_date": "2017-09-15",
    "created": "2017-09-15 06:52:24",
    "checklist_udid": "847A1148-DBB8-457C-BC75-29C5187AADD0",
    "target_date": "2017-09-15"
  }],
  "sm_filled_data": []
}';

$exjson = json_decode($JsonData, true); 


foreach ($exjson['sm_action_data'] as $row) 
{ 

  $check_exist= "select checklist_udid, row_id from tbl_sm_weekly_action
 where checklist_udid='".$row['checklist_udid']."' AND row_id='".$row['row_id']."'";


 $check_return = mysql_query($check_exist);

 if($check_return)
 {
  $update_check= "Update tbl_sm_weekly_action SET  action='".$row['action']."',
  checklist_action_comments='".$row['checklist_action_comments']."',
   is_deleted='".$row['is_deleted']."',
    updated='".$row['updated']."',
     checklist_main_comments='".$row['checklist_main_comments']."',
      is_uploaded='".$row['is_uploaded']."',
       action_required='".$row['action_required']."',
        resp='".$row['resp']."',
        target_date='".$row['target_date']."',
        actual_date='".$row['actual_date']."',
        resp_dd='".$row['resp_dd']."'";

        $update_check= mysql_query($update_check);

 }

else
{

$sql_3 = "insert into  tbl_sm_weekly_action
 (`checklist_udid`,`action`,`checklist_action_comments`,`is_deleted`,`created`,`updated`,`row_id`,`checklist_main_comments`,`is_uploaded`,`action_required`,`resp`,`target_date`,`actual_date`,`resp_dd`) 



 VALUES ('".$row['checklist_udid']."','".$row['action']."','".$row['checklist_action_comments']."','".$row['is_deleted']."','".$row['created']."','".$row['updated']."','".$row['row_id']."','".$row['checklist_main_comments']."','".$row['is_uploaded']."','".$row['action_required']."','".$row['resp']."','".$row['target_date']."','".$row['actual_date']."','".$row['resp_dd']."')";

 $result2 = mysql_query($sql_3);
    
    }




    }



    foreach ($exjson['sm_filled_data'] as $row) 
{ 




$sql_4 = "insert into   tbl_filled_sm_weekly
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

    
    if($sql_3 OR $sql_4 OR $update_check)
    {
      echo "{\"response\":\"200\",\"data\":\"Data Entered Successfully \"}";
    }

