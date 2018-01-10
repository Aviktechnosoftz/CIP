 <?

include('inc/config.php');

// echo "ok";
// die(mysql_error());

  // $JsonData = $_REQUEST['jsondata'];
  
    // $JsonData =  "{\"wc_etr_task_obs\":[],\"wc_ncic_task_obs\":[],\"wc_etr_filled\":[],\"wc_ncic_filled\":[],\"wc_acc_task_obs\":[],\"wc_fpr_filled\":[{\"is_submitted\":\"1\",\"project_id\":\"3\",\"induction_no\":\"23\",\"updated\":\"2017-11-16 12:36:27\",\"is_uploaded\":\"0\",\"created\":\"2017-11-16 12:32:55\",\"udid\":\"6216B7DB-124B-42FB-B74B-286FD1953B58\",\"is_deleted\":\"0\"}],\"wc_acc_filled\":[],\"wc_fpr_task_obs\":[{\"extinguisher_location\":\"location 2\",\"next_inspection_weekly\":\"2017-11-23\",\"next_inspection_six_monthly\":\"2018-05-16\",\"created\":\"2017-11-16 12:34:18\",\"udid\":\"6216B7DB-124B-42FB-B74B-286FD1953B58\",\"condition_fpr\":\"Good\",\"actual_date\":\"\",\"last_inspection_weekly\":\"2017-11-16\",\"action\":\"2\",\"emp_id\":\"23\",\"resp\":\"narendra Kumar(arti.m@aviktechnosoft.com)\",\"action_complete\":\"\",\"task_number\":\"2\",\"id\":\"-2\",\"is_uploaded\":\"0\",\"comments\":\"\",\"project_id\":\"3\",\"target_date\":\"2017-11-16\",\"induction_id\":\"23\",\"action_required\":\"Please charge extinguisher as soon as possible\",\"resp_name\":\"narendra Kumar\",\"charge_level\":\"Need Recharge\",\"checklist_action_comments\":\"\",\"fire_extinguisher_type\":\"type 2\",\"inspected_by\":\"narendra Kumar\",\"last_inspection_six_monthly\":\"2017-11-16\",\"resp_dd\":\"arti.m@aviktechnosoft.com\",\"updated\":\"2017-11-16 12:34:18\",\"serial_number\":\"2\"},{\"extinguisher_location\":\"location dese\",\"next_inspection_weekly\":\"2017-11-23\",\"next_inspection_six_monthly\":\"2018-05-16\",\"created\":\"2017-11-16 12:33:40\",\"udid\":\"6216B7DB-124B-42FB-B74B-286FD1953B58\",\"condition_fpr\":\"Good\",\"actual_date\":\"\",\"last_inspection_weekly\":\"2017-11-16\",\"action\":\"1\",\"emp_id\":\"\",\"resp\":\"\",\"action_complete\":\"\",\"task_number\":\"1\",\"id\":\"-1\",\"is_uploaded\":\"0\",\"comments\":\"ccc\",\"project_id\":\"3\",\"target_date\":\"\",\"induction_id\":\"23\",\"action_required\":\"\",\"resp_name\":\"\",\"charge_level\":\"Good\",\"checklist_action_comments\":\"ccc\",\"fire_extinguisher_type\":\"type\",\"inspected_by\":\"narendra Kumar\",\"last_inspection_six_monthly\":\"2017-11-16\",\"resp_dd\":\"\",\"updated\":\"2017-11-16 12:33:40\",\"serial_number\":\"1\"}]}";



  $JsonData="\"wc_etr_task_obs\": [],\n\t\"wc_ncic_task_obs\": [],\n\t\"wc_etr_filled\": [],\n\t\"wc_ncic_filled\": [],\n\t\"wc_acc_task_obs\": [],\n\t\"wc_fpr_filled\": [],\n\t\"wc_acc_filled\": [],\n\t\"wc_fpr_task_obs\": [],\n\t\"wc_ssi_task_obs\": [{\n\t\t\"created\": \"2017-12-19 06:23:26\",\n\t\t\"actual_date\": \"\",\n\t\t\"udid\": \"8C7892CC-58A0-4434-92E8-CADE81B21922\",\n\t\t\"resp\": \"testing direct(narendra.k@aviktechnosoft.com)\",\n\t\t\"action\": \"2\",\n\t\t\"emp_id\": \"33\",\n\t\t\"is_deleted\": \"0\",\n\t\t\"task_desc\": \"new\",\n\t\t\"action_complete\": \"\",\n\t\t\"task_number\": \"2\",\n\t\t\"id\": \"-2\",\n\t\t\"is_uploaded\": \"0\",\n\t\t\"project_id\": \"3\",\n\t\t\"comments\": \"\",\n\t\t\"target_date\": \"2017-12-19\",\n\t\t\"action_by\": \"22\",\n\t\t\"induction_id\": \"23\",\n\t\t\"action_required\": \"test  action cross\",\n\t\t\"resp_name\": \"testing direct\",\n\t\t\"checklist_action_comments\": \"\",\n\t\t\"resp_dd\": \"narendra.k@aviktechnosoft.com\",\n\t\t\"updated\": \"2017-12-19 06:23:26\"\n\t}, {\n\t\t\"created\": \"2017-12-19 06:22:52\",\n\t\t\"actual_date\": \"\",\n\t\t\"udid\": \"8C7892CC-58A0-4434-92E8-CADE81B21922\",\n\t\t\"resp\": \"\",\n\t\t\"action\": \"1\",\n\t\t\"emp_id\": \"\",\n\t\t\"is_deleted\": \"0\",\n\t\t\"task_desc\": \"Temporary Fence\",\n\t\t\"action_complete\": \"\",\n\t\t\"task_number\": \"1\",\n\t\t\"id\": \"-1\",\n\t\t\"is_uploaded\": \"0\",\n\t\t\"project_id\": \"3\",\n\t\t\"comments\": \"test\",\n\t\t\"target_date\": \"\",\n\t\t\"action_by\": \"22\",\n\t\t\"induction_id\": \"23\",\n\t\t\"action_required\": \"\",\n\t\t\"resp_name\": \"\",\n\t\t\"checklist_action_comments\": \"test\",\n\t\t\"resp_dd\": \"\",\n\t\t\"updated\": \"2017-12-19 06:22:52\"\n\t}],\n\t\"wc_ssi_filled\": [{\n\t\t\"is_submitted\": \"1\",\n\t\t\"project_id\": \"3\",\n\t\t\"induction_no\": \"23\",\n\t\t\"updated\": \"2017-12-19 06:23:47\",\n\t\t\"is_uploaded\": \"0\",\n\t\t\"created\": \"2017-12-19 06:22:30\",\n\t\t\"udid\": \"8C7892CC-58A0-4434-92E8-CADE81B21922\",\n\t\t\"is_deleted\": \"0\"\n\t}]";




//$_REQUEST['jsondata'];*/



$exjson = json_decode($JsonData, true); 



$ids = array();
$count = 0;
$countcpi = 100;


$ids_ncic = array();
$count_ncic = 0;
$countcpi_ncic = 100;



$ids_acc = array();
$count_acc = 0;
$countcpi_acc = 100;


$ids_fpr = array();
$count_fpr = 0;
$countcpi_fpr = 100;

$ids_ssi = array();
$count_ssi = 0;
$countcpi_ssi = 100;




$ncic_udid=array();
$acc_udid=array();
$etr_udid=array();
$fpr_udid=array();
$ssi_udid=array();




foreach ($exjson['wc_etr_task_obs'] as $row) 
{  

  if($row['id'] < 0)
  {
     
        $countcpi++;
        $new_id = "select max(id) as idnew From tbl_etr_task_obs";
        $new_id_result  = mysql_query($new_id);
        $new_id_result2 = mysql_fetch_row($new_id_result);
        if($new_id_result2[0] == "NULL")
          $maxid=0;
        else{
        $maxid = $new_id_result2[0];}
        $maxid = $maxid + $countcpi;
     
    
     $ids = array_merge($ids, array($maxid=> $row['id'].",".$maxid ));

      // $ncic_udid = array_merge($ncic_udid, array($maxid=> $row['id'].",".$maxid ));
  }
  else
  {
    $maxid  = $row['id'];
    $ids = array_merge($ids, array($maxid=> $row['id'].",".$row['id']));
  }
}


foreach ($exjson['wc_ncic_task_obs'] as $row) 
{  

  if($row['id'] < 0)
  {
     
        $countcpi_ncic++;
        $new_id_ncic = "select max(id) as idnew From tbl_ncic_task_obs";
        $new_id_result_ncic  = mysql_query($new_id_ncic);
        $new_id_result2_ncic = mysql_fetch_row($new_id_result_ncic);
        if($new_id_result2_ncic[0] == "NULL")
          $maxid_ncic=0;
        else{
        $maxid_ncic = $new_id_result2_ncic[0];}
        $maxid_ncic = $maxid_ncic + $countcpi_ncic;
     
    
     $ids_ncic = array_merge($ids_ncic, array($maxid_ncic=> $row['id'].",".$maxid_ncic ));
  }
  else
  {
    $maxid_ncic  = $row['id'];
    $ids_ncic = array_merge($ids_ncic, array($maxid_ncic=> $row['id'].",".$row['id']));
  }
}



foreach ($exjson['wc_acc_task_obs'] as $row) 
{  

  if($row['id'] < 0)
  {
     
        $countcpi_acc++;
        $new_id_acc = "select max(id) as idnew From tbl_acc_task_obs";
        $new_id_result_acc  = mysql_query($new_id_acc);
        $new_id_result2_acc = mysql_fetch_row($new_id_result_acc);
        if($new_id_result2_acc[0] == "NULL")
          $maxid_acc=0;
        else{
        $maxid_acc = $new_id_result2_acc[0];}
        $maxid_acc = $maxid_acc + $countcpi_acc;
     
    
     $ids_acc = array_merge($ids_acc, array($maxid_acc=> $row['id'].",".$maxid_acc ));
  }
  else
  {
    $maxid_acc  = $row['id'];
    $ids_acc = array_merge($ids_acc, array($maxid_acc=> $row['id'].",".$row['id']));
  }
}

foreach ($exjson['wc_fpr_task_obs'] as $row) 
{  

  if($row['id'] < 0)
  {
     
        $countcpi_fpr++;
        $new_id_fpr = "select max(id) as idnew From tbl_fpr_task_obs";
        $new_id_result_fpr  = mysql_query($new_id_fpr);
        $new_id_result2_fpr = mysql_fetch_row($new_id_result_fpr);
        if($new_id_result2_fpr[0] == "NULL")
          $maxid_fpr=0;
        else{
        $maxid_fpr = $new_id_result2_fpr[0];}
        $maxid_fpr = $maxid_fpr + $countcpi_fpr;
     
    
     $ids_fpr = array_merge($ids_fpr, array($maxid_fpr=> $row['id'].",".$maxid_fpr ));
  }
  else
  {
    $maxid_fpr  = $row['id'];
    $ids_fpr = array_merge($ids_fpr, array($maxid_fpr=> $row['id'].",".$row['id']));
  }
}


foreach ($exjson['wc_ssi_task_obs'] as $row) 
{  

  if($row['id'] < 0)
  {
     
        $countcpi_ssi++;
        $new_id_ssi = "select max(id) as idnew From tbl_ssi_task_obs";
        $new_id_result_ssi  = mysql_query($new_id_ssi);
        $new_id_result2_ssi = mysql_fetch_row($new_id_result_ssi);
        if($new_id_result2_ssi[0] == "NULL")
          $maxid_ssi=0;
        else{
        $maxid_ssi = $new_id_result2_ssi[0];}
        $maxid_ssi = $maxid_ssi + $countcpi_ssi;
     
    
     $ids_ssi = array_merge($ids_ssi, array($maxid_ssi=> $row['id'].",".$maxid_ssi ));
  }
  else
  {
    $maxid_ssi  = $row['id'];
    $ids_ssi = array_merge($ids_ssi, array($maxid_ssi=> $row['id'].",".$row['id']));
  }
}






//Transection start
mysql_query("SET AUTOCOMMIT=0");
mysql_query("START TRANSACTION");

//For wc_etr_task_obs
foreach ( $exjson['wc_etr_task_obs'] as $row )
{  

  if ($row['id'] < 0 )
  {
    $newID = getID($row['id'],$ids);
      $query2 = "insert into tbl_etr_task_obs SET  
    `id`  ='".$newID."',

      `task_number` ='".$row['task_number']."',
  `task_desc`  ='".$row['task_desc']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `created` ='".$row['created']."',
  `updated` ='".$row['updated']."',
  `project_id` ='".$row['project_id']."',
  `comments` ='".$row['comments']."',
  `udid` ='".$row['udid']."',
  `emp_id` ='".$row['emp_id']."',
  `is_uploaded` ='".$row['is_uploaded']."',
  `action` ='".$row['action']."',
  `checklist_action_comments` ='".$row['checklist_action_comments']."',
  `action_required` ='".$row['action_required']."',
  `resp` ='".$row['resp']."',
  `target_date` ='".$row['target_date']."',
  `actual_date` ='".$row['actual_date']."',
  `resp_dd` ='".$row['resp_dd']."',
  `resp_name` ='".$row['resp_name']."',
  `action_complete` ='".$row['action_complete']."',
  `induction_id` ='".$row['induction_id']."',
  `last_inspection_date` ='".$row['last_inspection_date']."',
  `inspected_by` ='".$row['inspected_by']."',
  `next_inspection_date` ='".$row['next_inspection_date']."',
  `is_alarm_work` ='".$row['is_alarm_work']."' ";
     
   // echo $query2;


   
    
    
    
  
  
     $result2 = mysql_query($query2);
     
  }
  else
  {
        $sql_1 = "update tbl_etr_task_obs SET  

      `task_number` ='".$row['task_number']."',
  `task_desc`  ='".$row['task_desc']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `created` ='".$row['created']."',
  `updated` ='".$row['updated']."',
  `project_id` ='".$row['project_id']."',
  `comments` ='".$row['comments']."',
  `udid` ='".$row['udid']."',
  `emp_id` ='".$row['emp_id']."',
  `is_uploaded` ='".$row['is_uploaded']."',
  `action` ='".$row['action']."',
  `checklist_action_comments` ='".$row['checklist_action_comments']."',
  `action_required` ='".$row['action_required']."',
  `resp` ='".$row['resp']."',
  `target_date` ='".$row['target_date']."',
  `actual_date` ='".$row['actual_date']."',
  `resp_dd` ='".$row['resp_dd']."',
  `resp_name` ='".$row['resp_name']."',
  `action_complete` ='".$row['action_complete']."',
  `induction_id` ='".$row['induction_id']."',
  `last_inspection_date` ='".$row['last_inspection_date']."',
  `inspected_by` ='".$row['inspected_by']."',
  `next_inspection_date` ='".$row['next_inspection_date']."',
  `is_alarm_work` ='".$row['is_alarm_work']."'  where id='".$row['id']."'";




        $result2 = mysql_query($sql_1);
        

  }
}






foreach ( $exjson['wc_etr_filled'] as $row )
{  



$result_check_exist = mysql_query("select udid from tbl_etr_filled where udid = '".$row['udid']."'");  
$number_of_rows = mysql_num_rows($result_check_exist);

if($number_of_rows <= 0)
{ 

$query2_filled = "insert into tbl_etr_filled SET  
    `induction_no` ='".$row['induction_no']."',
  `udid` ='".$row['udid']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `is_submitted`  ='".$row['is_submitted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."'";

   $result2_filled = mysql_query($query2_filled);

   array_push($etr_udid, $row['udid']);

  
}

else
{



   $sql_1_filled= "update tbl_etr_filled SET  
    `induction_no` ='".$row['induction_no']."',
  
  `is_deleted`  ='".$row['is_deleted']."',
  `is_submitted`  ='".$row['is_submitted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."' where `udid` ='".$row['udid']."'";

   $result2_filled = mysql_query($sql_1_filled);
  array_push($etr_udid, $row['udid']);

}
  
}







foreach ( $exjson['wc_ncic_task_obs'] as $row )
{  

  if ($row['id'] < 0 )
  {
    $newID_ncic = getID($row['id'],$ids_ncic);
      $query2_ncic = "insert into tbl_ncic_task_obs SET  
    `id`  ='".$newID_ncic."',

      `task_number` ='".$row['task_number']."',
  `task_desc`  ='".$row['task_desc']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `created` ='".$row['created']."',
  `updated` ='".$row['updated']."',
  `project_id` ='".$row['project_id']."',
  `comments` ='".$row['comments']."',
  `udid` ='".$row['udid']."',
  `emp_id` ='".$row['emp_id']."',
  `is_uploaded` ='".$row['is_uploaded']."',
  `action` ='".$row['action']."',
  `checklist_action_comments` ='".$row['checklist_action_comments']."',
  `action_required` ='".$row['action_required']."',
  `resp` ='".$row['resp']."',
  `target_date` ='".$row['target_date']."',
  `actual_date` ='".$row['actual_date']."',
  `resp_dd` ='".$row['resp_dd']."',
  `resp_name` ='".$row['resp_name']."',
  `action_complete` ='".$row['action_complete']."',
  `induction_id` ='".$row['induction_id']."',
  `last_inspection_date` ='".$row['last_inspection_date']."',
  `inspected_by` ='".$row['inspected_by']."',
  `next_inspection_date` ='".$row['next_inspection_date']."',
  `nurse_call_number` ='".$row['nurse_call_number']."' ";
     
   // echo $query2;
    
    
   
  
  
     $result2_ncic = mysql_query($query2_ncic);


  
  }
  else
  {
        $sql_1_ncic = "update tbl_ncic_task_obs SET  

      `task_number` ='".$row['task_number']."',
  `task_desc`  ='".$row['task_desc']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `created` ='".$row['created']."',
  `updated` ='".$row['updated']."',
  `project_id` ='".$row['project_id']."',
  `comments` ='".$row['comments']."',
  `udid` ='".$row['udid']."',
  `emp_id` ='".$row['emp_id']."',
  `is_uploaded` ='".$row['is_uploaded']."',
  `action` ='".$row['action']."',
  `checklist_action_comments` ='".$row['checklist_action_comments']."',
  `action_required` ='".$row['action_required']."',
  `resp` ='".$row['resp']."',
  `target_date` ='".$row['target_date']."',
  `actual_date` ='".$row['actual_date']."',
  `resp_dd` ='".$row['resp_dd']."',
  `resp_name` ='".$row['resp_name']."',
  `action_complete` ='".$row['action_complete']."',
  `induction_id` ='".$row['induction_id']."',
  `last_inspection_date` ='".$row['last_inspection_date']."',
  `inspected_by` ='".$row['inspected_by']."',
  `next_inspection_date` ='".$row['next_inspection_date']."',
  `nurse_call_number` ='".$row['nurse_call_number']."'  where id='".$row['id']."'";


  

    $result2_ncic = mysql_query($sql_1_ncic);
     

        

  }
}




foreach ( $exjson['wc_ncic_filled'] as $row )
{  



$result_check_exist = mysql_query("select udid from tbl_ncic_filled where udid = '".$row['udid']."'");  
$number_of_rows = mysql_num_rows($result_check_exist);

if($number_of_rows <= 0)
{ 

 $query2_ncic_filled = "insert into tbl_ncic_filled SET  
    `induction_no` ='".$row['induction_no']."',
  `udid` ='".$row['udid']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `is_submitted`  ='".$row['is_submitted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."'";

     $result2_ncic_filled = mysql_query($query2_ncic_filled);
     array_push($ncic_udid, $row['udid']);
}

else
{



   $sql_1_ncic_filled= "update tbl_ncic_filled SET  
    `induction_no` ='".$row['induction_no']."',
  
  `is_deleted`  ='".$row['is_deleted']."',
  `is_submitted`  ='".$row['is_submitted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."' where `udid` ='".$row['udid']."'";

   $result2_ncic_filled = mysql_query($sql_1_ncic_filled);
   array_push($ncic_udid, $row['udid']);

}
  
}



foreach ( $exjson['wc_acc_task_obs'] as $row )
{  

  if ($row['id'] < 0 )
  {
    $newID_acc = getID($row['id'],$ids_acc);
      $query2_acc = "insert into tbl_acc_task_obs SET  
    `id`  ='".$newID_acc."',

      `task_number` ='".$row['task_number']."',
  `task_desc`  ='".$row['task_desc']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `created` ='".$row['created']."',
  `updated` ='".$row['updated']."',
  `project_id` ='".$row['project_id']."',
  `comments` ='".$row['comments']."',
  `udid` ='".$row['udid']."',
  `emp_id` ='".$row['emp_id']."',
  `is_uploaded` ='".$row['is_uploaded']."',
  `action` ='".$row['action']."',
  `checklist_action_comments` ='".$row['checklist_action_comments']."',
  `action_required` ='".$row['action_required']."',
  `resp` ='".$row['resp']."',
  `target_date` ='".$row['target_date']."',
  `actual_date` ='".$row['actual_date']."',
  `resp_dd` ='".$row['resp_dd']."',
  `resp_name` ='".$row['resp_name']."',
  `action_complete` ='".$row['action_complete']."',
  `induction_id` ='".$row['induction_id']."',
  `last_inspection_date` ='".$row['last_inspection_date']."',
  `inspected_by` ='".$row['inspected_by']."',
  `next_inspection_date` ='".$row['next_inspection_date']."',
  `plant_number` ='".$row['plant_number']."' ";

    
  
  
     $result2_acc = mysql_query($query2_acc);
   
     
   // echo $query2;
    
    
    
  
  
     
  }
  else
  {
        $sql_1_acc = "update tbl_acc_task_obs SET  

      `task_number` ='".$row['task_number']."',
  `task_desc`  ='".$row['task_desc']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `created` ='".$row['created']."',
  `updated` ='".$row['updated']."',
  `project_id` ='".$row['project_id']."',
  `comments` ='".$row['comments']."',
  `udid` ='".$row['udid']."',
  `emp_id` ='".$row['emp_id']."',
  `is_uploaded` ='".$row['is_uploaded']."',
  `action` ='".$row['action']."',
  `checklist_action_comments` ='".$row['checklist_action_comments']."',
  `action_required` ='".$row['action_required']."',
  `resp` ='".$row['resp']."',
  `target_date` ='".$row['target_date']."',
  `actual_date` ='".$row['actual_date']."',
  `resp_dd` ='".$row['resp_dd']."',
  `resp_name` ='".$row['resp_name']."',
  `action_complete` ='".$row['action_complete']."',
  `induction_id` ='".$row['induction_id']."',
  `last_inspection_date` ='".$row['last_inspection_date']."',
  `inspected_by` ='".$row['inspected_by']."',
  `next_inspection_date` ='".$row['next_inspection_date']."',
  `plant_number` ='".$row['plant_number']."'  where id='".$row['id']."'";


  


        $result2_acc = mysql_query($sql_1_acc);

       

  }
}


foreach ( $exjson['wc_acc_filled'] as $row )
{  



$result_check_exist = mysql_query("select udid from tbl_acc_filled where udid = '".$row['udid']."'");  
$number_of_rows = mysql_num_rows($result_check_exist);

if($number_of_rows <= 0)
{ 

$query2_acc_filled = "insert into tbl_acc_filled SET  
    `induction_no` ='".$row['induction_no']."',
  `udid` ='".$row['udid']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `is_submitted`  ='".$row['is_submitted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."'";

      $result2_acc_filled = mysql_query($query2_acc_filled);

       array_push($acc_udid, $row['udid']);
}

else
{



   $sql_1_acc_filled= "update tbl_acc_filled SET  
    `induction_no` ='".$row['induction_no']."',
  
  `is_deleted`  ='".$row['is_deleted']."',
  `is_submitted`  ='".$row['is_submitted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."' where `udid` ='".$row['udid']."'";

  $result2_acc_filled = mysql_query($sql_1_acc_filled);
   array_push($acc_udid, $row['udid']);

}
  
}



foreach ( $exjson['wc_fpr_task_obs'] as $row )
{  
  if ($row['id'] < 0 )
  {
    $newID_fpr = getID($row['id'],$ids_fpr);
      $query2_fpr = "insert into tbl_fpr_task_obs SET  
    `id`  ='".$newID_fpr."',

      `task_number` ='".$row['task_number']."',
  `fire_extinguisher_type`  ='".$row['fire_extinguisher_type']."',
  `extinguisher_location`  ='".$row['extinguisher_location']."',
  `serial_number`  ='".$row['serial_number']."',
  `condition_fpr`  ='".$row['condition_fpr']."',
  `charge_level`  ='".$row['charge_level']."',
  `last_inspection_six_monthly`  ='".$row['last_inspection_six_monthly']."',
  `inspected_by`  ='".$row['inspected_by']."',    


  `last_inspection_weekly`  ='".$row['last_inspection_weekly']."',
  `next_inspection_weekly`  ='".$row['next_inspection_weekly']."',
  `next_inspection_six_monthly`  ='".$row['next_inspection_six_monthly']."',
  `comments`  ='".$row['comments']."',
  `project_id`  ='".$row['project_id']."',
  `udid`  ='".$row['udid']."',
  `emp_id`  ='".$row['emp_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."',
  `action`  ='".$row['action']."',
  `checklist_action_comments`  ='".$row['checklist_action_comments']."',
  `action_required`  ='".$row['action_required']."',
  `resp`  ='".$row['resp']."',
  `target_date`  ='".$row['target_date']."',
  `actual_date`  ='".$row['actual_date']."',
  `resp_dd`  ='".$row['resp_dd']."',
  `action_complete`  ='".$row['action_complete']."',
  `induction_id`  ='".$row['induction_id']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."'




    

   ";
     
   // echo $query2;
    
    
   
  
  
     $result2_fpr = mysql_query($query2_fpr);


  
  }
  else
  {
        $sql_1_fpr = "update tbl_fpr_task_obs SET  

       `task_number` ='".$row['task_number']."',
  `fire_extinguisher_type`  ='".$row['fire_extinguisher_type']."',
  `extinguisher_location`  ='".$row['extinguisher_location']."',
  `serial_number`  ='".$row['serial_number']."',
  `condition_fpr`  ='".$row['condition_fpr']."',
  `charge_level`  ='".$row['charge_level']."',
  `last_inspection_six_monthly`  ='".$row['last_inspection_six_monthly']."',
  `inspected_by`  ='".$row['inspected_by']."',    


  `last_inspection_weekly`  ='".$row['last_inspection_weekly']."',
  `next_inspection_weekly`  ='".$row['next_inspection_weekly']."',
  `next_inspection_six_monthly`  ='".$row['next_inspection_six_monthly']."',
  `comments`  ='".$row['comments']."',
  `project_id`  ='".$row['project_id']."',
  `udid`  ='".$row['udid']."',
  `emp_id`  ='".$row['emp_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."',
  `action`  ='".$row['action']."',
  `checklist_action_comments`  ='".$row['checklist_action_comments']."',
  `action_required`  ='".$row['action_required']."',
  `resp`  ='".$row['resp']."',
  `target_date`  ='".$row['target_date']."',
  `actual_date`  ='".$row['actual_date']."',
  `resp_dd`  ='".$row['resp_dd']."',
  `action_complete`  ='".$row['action_complete']."',
  `induction_id`  ='".$row['induction_id']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."'  where id='".$row['id']."'";


  

    $result2_fpr = mysql_query($sql_1_fpr);
     // array_push($fpr_udid, $row['udid']);
     

        

  }

}



foreach ( $exjson['wc_fpr_filled'] as $row )
{  



$result_check_exist = mysql_query("select udid from tbl_fpr_filled where udid = '".$row['udid']."'");  
$number_of_rows = mysql_num_rows($result_check_exist);

if($number_of_rows <= 0)
{ 

 $query2_fpr_filled = "insert into tbl_fpr_filled SET  
    `induction_no` ='".$row['induction_no']."',
  `udid` ='".$row['udid']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `is_submitted`  ='".$row['is_submitted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."'";

     $result2_fpr_filled = mysql_query($query2_fpr_filled);
     array_push($fpr_udid, $row['udid']);
}

else
{



   $sql_1_fpr_filled= "update tbl_fpr_filled SET  
    `induction_no` ='".$row['induction_no']."',
  
  `is_deleted`  ='".$row['is_deleted']."',
  `is_submitted`  ='".$row['is_submitted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."' where `udid` ='".$row['udid']."'";

   $result2_fpr_filled = mysql_query($sql_1_fpr_filled);
   array_push($fpr_udid, $row['udid']);

}
  
}



foreach ($exjson['wc_ssi_task_obs'] as $row )
{  


  if ($row['id'] < 0 )
  {


    $newID_ssi = getID($row['id'],$ids_ssi);
      $query2_ssi = "insert into tbl_ssi_task_obs SET  
    `id`  ='".$newID_ssi."',

      `task_number` ='".$row['task_number']."',
  `task_desc`  ='".$row['task_desc']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `comments`  ='".$row['comments']."',
  `udid`  ='".$row['udid']."',    


  `emp_id`  ='".$row['emp_id']."',
  `action_by`  ='".$row['action_by']."',
  `resp`  ='".$row['resp']."',
  `target_date`  ='".$row['target_date']."',
  `actual_date`  ='".$row['actual_date']."',
  `resp_dd`  ='".$row['resp_dd']."',
  `resp_name`  ='".$row['resp_name']."',
  `action_complete`  ='".$row['action_complete']."',
  `induction_id`  ='".$row['induction_id']."'
 ";
     
   // echo $query2;
    
    
   
  
  
     $result2_ssi = mysql_query($query2_ssi);


  
  }
  else
  {
        $sql_1_ssi = "update tbl_ssi_task_obs SET  

      `task_number` ='".$row['task_number']."',
  `task_desc`  ='".$row['task_desc']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `comments`  ='".$row['comments']."',
  `udid`  ='".$row['udid']."',    


  `emp_id`  ='".$row['emp_id']."',
  `action_by`  ='".$row['action_by']."',
  `resp`  ='".$row['resp']."',
  `target_date`  ='".$row['target_date']."',
  `actual_date`  ='".$row['actual_date']."',
  `resp_dd`  ='".$row['resp_dd']."',
  `resp_name`  ='".$row['resp_name']."',
  `action_complete`  ='".$row['action_complete']."',
  `induction_id`  ='".$row['induction_id']."' where id='".$row['id']."'";


  

    $result2_ssi = mysql_query($sql_1_ssi);
     // array_push($fpr_udid, $row['udid']);
     

        

  }

 
}



foreach ( $exjson['wc_ssi_filled'] as $row )
{  



$result_check_exist = mysql_query("select udid from tbl_ssi_filled where udid = '".$row['udid']."'");  
$number_of_rows = mysql_num_rows($result_check_exist);

if($number_of_rows <= 0)
{ 

 $query2_ssi_filled = "insert into tbl_ssi_filled SET  
    `induction_no` ='".$row['induction_no']."',
  `udid` ='".$row['udid']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `is_submitted`  ='".$row['is_submitted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."'";

     $result2_ssi_filled = mysql_query($query2_ssi_filled);
     array_push($ssi_udid, $row['udid']);
}

else
{



   $sql_1_ssi_filled= "update tbl_ssi_filled SET  
    `induction_no` ='".$row['induction_no']."',
  
  `is_deleted`  ='".$row['is_deleted']."',
  `is_submitted`  ='".$row['is_submitted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."' where `udid` ='".$row['udid']."'";

   $result2_ssi_filled = mysql_query($sql_1_ssi_filled);
   array_push($ssi_udid, $row['udid']);

}
  
}


//Transaction End 

if($result2 OR $result2_ncic OR $result2_acc OR  $result2_fpr OR $result2_fpr_filled OR $result2_acc_filled OR $result2_ncic_filled OR $result2_filled OR $result2_ssi_filled OR $result2_ssi) // success 
{
  mysql_query("COMMIT");
  createJson_etr($ids,$etr_udid);
  createJson_ncic($ids_ncic,$ncic_udid);
  createJson_acc($ids_acc,$acc_udid);
  createJson_fpr($ids_fpr,$fpr_udid);
  createJson_ssi($ids_ssi,$ssi_udid);
}
else
{
   mysql_query("ROLLBACK");
   echo "{\"responce\":\"201\",\"data\":\"".$result2.$result2_acc.$result2_ncic.$sql_1_fpr_filled.$sql_1_ssi_filled."\"}";
  
  
}

function getID($oldid,$arrayIds)
{
   foreach ($arrayIds as $value) 
   {
      list($old,$new) = split(',', $value);
      if($old == $oldid)
      { 
        return $new;
      }
   }
 }


 function createJson_etr($arrayIds,$etr_udid)
 {
  $message = "";
  $count = 0 ;
  $length = sizeof($arrayIds);
  foreach ($arrayIds as $value) 
   {
    $count++;
    if($count == $length)
    {
      list($old, $new) = split(',', $value);
      $message = $message. "{\"oldid\": \"".$old."\",\"newid\":\"".$new."\"}";
    }
    else
    {
      list($old, $new) = split(',', $value);
      $message = $message. "{\"oldid\": \"".$old."\",\"newid\":\"".$new."\"},";
    }
   }
   echo "{\"response\":\"200\",\"data_wc_etr_filled\": ".json_encode($etr_udid).",\"data_wc_etr_task_obs\": [".$message ."],";
  
 }

 function createJson_ncic($arrayIds,$ncic_udid)
 {
  $message = "";
  $count = 0 ;
  $length = sizeof($arrayIds);
  foreach ($arrayIds as $value) 
   {
    $count++;
    if($count == $length)
    {
      list($old, $new) = split(',', $value);
      $message = $message. "{\"oldid\": \"".$old."\",\"newid\":\"".$new."\"}";
    }
    else
    {
      list($old, $new) = split(',', $value);
      $message = $message. "{\"oldid\": \"".$old."\",\"newid\":\"".$new."\"},";
    }
   }
   echo "\"data_wc_ncic_filled\": ".json_encode($ncic_udid).",\"data_wc_ncic_task_obs\": [".$message ."],";
  
 }


 function createJson_acc($arrayIds,$acc_udid)
 {
  $message = "";
  $count = 0 ;
  $length = sizeof($arrayIds);
  foreach ($arrayIds as $value) 
   {
    $count++;
    if($count == $length)
    {
      list($old, $new) = split(',', $value);
      $message = $message. "{\"oldid\": \"".$old."\",\"newid\":\"".$new."\"}";
    }
    else
    {
      list($old, $new) = split(',', $value);
      $message = $message. "{\"oldid\": \"".$old."\",\"newid\":\"".$new."\"},";
    }
   }
   echo "\"data_wc_acc_filled\": ".json_encode($acc_udid).",\"data_wc_acc_task_ob\": [".$message ."],";
  
 }


  function createJson_fpr($arrayIds,$fpr_udid)
 {
  $message = "";
  $count = 0 ;
  $length = sizeof($arrayIds);
  foreach ($arrayIds as $value) 
   {
    $count++;
    if($count == $length)
    {
      list($old, $new) = split(',', $value);
      $message = $message. "{\"oldid\": \"".$old."\",\"newid\":\"".$new."\"}";
    }
    else
    {
      list($old, $new) = split(',', $value);
      $message = $message. "{\"oldid\": \"".$old."\",\"newid\":\"".$new."\"},";
    }
   }
   echo "\"data_wc_fpr_filled\": ".json_encode($fpr_udid).",\"data_wc_fpr_task_obs\": [".$message ."]}";
  
 }

  function createJson_ssi($arrayIds,$ssi_udid)
 {
  $message = "";
  $count = 0 ;
  $length = sizeof($arrayIds);
  foreach ($arrayIds as $value) 
   {
    $count++;
    if($count == $length)
    {
      list($old, $new) = split(',', $value);
      $message = $message. "{\"oldid\": \"".$old."\",\"newid\":\"".$new."\"}";
    }
    else
    {
      list($old, $new) = split(',', $value);
      $message = $message. "{\"oldid\": \"".$old."\",\"newid\":\"".$new."\"},";
    }
   }
   echo "\"data_wc_ssi_filled\": ".json_encode($ssi_udid).",\"data_wc_ssi_task_obs\": [".$message ."]}";
  
 }







 ?>