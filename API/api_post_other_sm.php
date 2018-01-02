 <?

include('inc/config.php');

// echo "ok";
// die(mysql_error());

   $JsonData = $_REQUEST['jsondata'];
  
      // $JsonData =  "{\"wc_gps_task_obs\":[{\"qty_available\":\"1\",\"created\":\"2017-12-27 06:53:18\",\"udid\":\"C4C7DCE6-E5EB-4E67-8D76-3A8ABF500A77\",\"actual_date\":\"\",\"resp\":\"narendra Kumar(arti.m@aviktechnosoft.com)\",\"action\":\"2\",\"emp_id\":\"23\",\"action_complete\":\"\",\"is_deleted\":\"0\",\"project_id\":\"3\",\"id\":\"-2\",\"is_uploaded\":\"0\",\"induction_id\":\"23\",\"comments\":\"\",\"target_date\":\"2017-12-27\",\"row_id\":\"2\",\"action_required\":\"Required 99 General purpose absorbent pad\",\"shortage\":\"99\",\"resp_name\":\"narendra Kumar\",\"checklist_action_comments\":\"\",\"resp_dd\":\"arti.m@aviktechnosoft.com\",\"updated\":\"2017-12-27 06:53:18\"},{\"qty_available\":\"6\",\"created\":\"2017-12-27 06:53:05\",\"udid\":\"C4C7DCE6-E5EB-4E67-8D76-3A8ABF500A77\",\"actual_date\":\"\",\"resp\":\"\",\"action\":\"1\",\"emp_id\":\"\",\"action_complete\":\"\",\"is_deleted\":\"0\",\"project_id\":\"3\",\"id\":\"-1\",\"is_uploaded\":\"0\",\"induction_id\":\"23\",\"comments\":\"test\",\"target_date\":\"\",\"row_id\":\"1\",\"action_required\":\"\",\"shortage\":\"0\",\"resp_name\":\"\",\"checklist_action_comments\":\"test\",\"resp_dd\":\"\",\"updated\":\"2017-12-27 06:53:05\"}],\"wc_fpr_image\":[{\"is_deleted\":\"0\",\"is_image_uploaded\":\"0\",\"assign_uuid\":\"2876C8A1-4E2F-42D9-A29A-6EA9F6BDCDEB\",\"document_name\":\"\",\"index_image_id\":\"0\",\"img_desc\":\"test1\",\"updated\":\"2017-12-21 11:26:24\",\"is_uploaded\":\"0\",\"created\":\"0000-00-00 00:00:00\",\"is_download\":\"1\",\"image_name\":\"20171221165616.jpg\"},{\"is_deleted\":\"0\",\"is_image_uploaded\":\"0\",\"assign_uuid\":\"5D360857-6F55-4807-A28B-174A17480E9D\",\"document_name\":\"\",\"index_image_id\":\"0\",\"img_desc\":\"img 1\",\"updated\":\"2017-12-21 11:44:48\",\"is_uploaded\":\"0\",\"created\":\"0000-00-00 00:00:00\",\"is_download\":\"1\",\"image_name\":\"20171221171425.jpg\"},{\"is_deleted\":\"0\",\"is_image_uploaded\":\"0\",\"assign_uuid\":\"5D360857-6F55-4807-A28B-174A17480E9D\",\"document_name\":\"\",\"index_image_id\":\"4\",\"img_desc\":\"img 2\",\"updated\":\"2017-12-21 11:44:48\",\"is_uploaded\":\"0\",\"created\":\"0000-00-00 00:00:00\",\"is_download\":\"1\",\"image_name\":\"20171221171442.jpg\"},{\"is_deleted\":\"0\",\"is_image_uploaded\":\"0\",\"assign_uuid\":\"61217577-3BBC-4400-86E5-DA2855D85F69\",\"document_name\":\"ApplePDF.pdf\",\"index_image_id\":\"0\",\"img_desc\":\"doc1\",\"updated\":\"2017-12-21 12:42:12\",\"is_uploaded\":\"0\",\"created\":\"0000-00-00 00:00:00\",\"is_download\":\"1\",\"image_name\":\"ApplePDF.pdf\"}],\"wc_etr_task_obs\":[],\"wc_ncic_task_obs\":[],\"wc_ssi_task_obs\":[],\"wc_fpr_filled\":[],\"wc_acc_filled\":[],\"wc_ncic_filled\":[],\"wc_acc_task_obs\":[],\"wc_gps_filled\":[{\"is_submitted\":\"0\",\"project_id\":\"3\",\"induction_no\":\"23\",\"updated\":\"2017-12-27 06:52:51\",\"is_uploaded\":\"0\",\"created\":\"2017-12-27 06:52:49\",\"udid\":\"C4C7DCE6-E5EB-4E67-8D76-3A8ABF500A77\",\"is_deleted\":\"0\"}],\"wc_ssi_filled\":[],\"wc_fpr_task_obs\":[],\"wc_etr_filled\":[]}";



//  $JsonData='';





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

$ids_gps = array();
$count_gps = 0;
$countcpi_gps = 100;




$ncic_udid=array();
$acc_udid=array();
$etr_udid=array();
$fpr_udid=array();
$ssi_udid=array();
$gps_udid=array();


$fpr_image_udid=array();

foreach ($exjson['wc_fpr_image'] as $row) 
{  

 $query2_filled_fpr_image = "insert into tbl_fpr_image  SET  
    `image_name` ='".$row['image_name']."',
  `created` ='".$row['created ']."',
  `updated`  ='".$row['updated']."',
  `is_uploaded`  ='".$row['is_uploaded']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `is_image_uploaded`  ='".$row['is_image_uploaded']."',
  `is_download`  ='".$row['is_download']."',
  `assign_uuid`  ='".$row['assign_uuid']."',
  `index_image_id`  ='".$row['index_image_id']."',
  `document_name`  ='".$row['document_name']."',
  `img_desc`  ='".$row['img_desc']."'

  ON DUPLICATE KEY UPDATE 

  `image_name` ='".$row['image_name']."',
  `created` ='".$row['created ']."',
  `updated`  ='".$row['updated']."',
  `is_uploaded`  ='".$row['is_uploaded']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `is_image_uploaded`  ='".$row['is_image_uploaded']."',
  `is_download`  ='".$row['is_download']."',
  `assign_uuid`  ='".$row['assign_uuid']."',
  `index_image_id`  ='".$row['index_image_id']."',
  `document_name`  ='".$row['document_name']."',
  `img_desc`  ='".$row['img_desc']."'

  

  ";

   $result2_filled_fpr_image = mysql_query($query2_filled_fpr_image);
   array_push($fpr_image_udid, $row['assign_uuid']);
    // $fpr_image_udid=$row['assign_uuid'];
     
}





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


foreach ($exjson['wc_gps_task_obs'] as $row) 
{  

  if($row['id'] < 0)
  {
     
        $countcpi_gps++;
        $new_id_gps = "select max(id) as idnew From tbl_gps_task_obs";
        $new_id_result_gps  = mysql_query($new_id_gps);
        $new_id_result2_gps = mysql_fetch_row($new_id_result_gps);
        if($new_id_result2_gps[0] == "NULL")
          $maxid_gps=0;
        else{
        $maxid_gps = $new_id_result2_gps[0];}
        $maxid_gps = $maxid_gps + $countcpi_gps;
     
    
     $ids_gps = array_merge($ids_gps, array($maxid_gps=> $row['id'].",".$maxid_gps ));
  }
  else
  {
    $maxid_gps  = $row['id'];
    $ids_gps = array_merge($ids_gps, array($maxid=> $row['id'].",".$row['id']));
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
   `is_uploaded`  ='".$row['is_uploaded']."',
    `action`  ='".$row['action']."',
     `checklist_action_comments`  ='".$row['checklist_action_comments']."',
      `action_required`  ='".$row['action_required']."',

  `action_by`  ='".$row['action_by']."',
  `fence_type`  ='".$row['fence_type']."',
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
   `is_uploaded`  ='".$row['is_uploaded']."',
    `action`  ='".$row['action']."',
     `checklist_action_comments`  ='".$row['checklist_action_comments']."',
      `action_required`  ='".$row['action_required']."',
      
  `action_by`  ='".$row['action_by']."',
  `fence_type`  ='".$row['fence_type']."',
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






foreach ($exjson['wc_gps_task_obs'] as $row )
{  


  if ($row['id'] < 0 )
  {


    $newID_gps = getID($row['id'],$ids_gps);
      $query2_gps = "insert into tbl_gps_task_obs SET  
    `id`  ='".$newID_gps."',

      `comments` ='".$row['comments']."',
  `project_id`  ='".$row['project_id']."',
  `udid`  ='".$row['udid']."',
  `emp_id`  ='".$row['emp_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."',
  `action`  ='".$row['action']."',
  `checklist_action_comments`  ='".$row['checklist_action_comments']."',
  `action_required`  ='".$row['action_required']."',    


  `resp`  ='".$row['resp']."',
   `target_date`  ='".$row['target_date']."',
    `resp_dd`  ='".$row['resp_dd']."',
     `resp_name`  ='".$row['resp_name']."',
      `action_complete`  ='".$row['action_complete']."',

  `induction_id`  ='".$row['induction_id']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `qty_available`  ='".$row['qty_available']."',
  `shortage`  ='".$row['shortage']."',
  `row_id`  ='".$row['row_id']."',
  `actual_date`  ='".$row['actual_date']."'
 ";
     
   // echo $query2;
    
    
   
  
  
     $result2_gps = mysql_query($query2_gps);


  
  }
  else
  {
        $sql_1_gps = "update tbl_gps_task_obs SET  

       `comments` ='".$row['comments']."',
  `project_id`  ='".$row['project_id']."',
  `udid`  ='".$row['udid']."',
  `emp_id`  ='".$row['emp_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."',
  `action`  ='".$row['action']."',
  `checklist_action_comments`  ='".$row['checklist_action_comments']."',
  `action_required`  ='".$row['action_required']."',    


  `resp`  ='".$row['resp']."',
   `target_date`  ='".$row['target_date']."',
    `resp_dd`  ='".$row['resp_dd']."',
     `resp_name`  ='".$row['resp_name']."',
      `action_complete`  ='".$row['action_complete']."',

  `induction_id`  ='".$row['induction_id']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `qty_available`  ='".$row['qty_available']."',
  `shortage`  ='".$row['shortage']."',
  `row_id`  ='".$row['row_id']."',
  `actual_date`  ='".$row['actual_date']."' where id='".$row['id']."'";


  

    $result2_gps = mysql_query($sql_1_gps);
     // array_push($fpr_udid, $row['udid']);
     

        

  }

 
}



foreach ( $exjson['wc_gps_filled'] as $row )
{  



$result_check_exist = mysql_query("select udid from tbl_gps_filled where udid = '".$row['udid']."'");  
$number_of_rows = mysql_num_rows($result_check_exist);

if($number_of_rows <= 0)
{ 

 $query2_gps_filled = "insert into tbl_gps_filled SET  
    `induction_no` ='".$row['induction_no']."',
  `udid` ='".$row['udid']."',
  `emp_id` ='".$row['emp_id']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `is_submitted`  ='".$row['is_submitted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."'";

     $result2_gps_filled = mysql_query($query2_gps_filled);
     array_push($gps_udid, $row['udid']);
}

else
{



   $sql_1_gps_filled= "update tbl_gps_filled SET  
    `induction_no` ='".$row['induction_no']."',
  `emp_id` ='".$row['emp_id']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `is_submitted`  ='".$row['is_submitted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."' where `udid` ='".$row['udid']."'";

   $result2_gps_filled = mysql_query($sql_1_gps_filled);
   array_push($gps_udid, $row['udid']);

}
  
}



//Transaction End 

if($result2 OR $result2_ncic OR $result2_acc OR  $result2_fpr OR $result2_fpr_filled OR $result2_acc_filled OR $result2_ncic_filled OR $result2_filled OR $result2_ssi_filled OR $result2_ssi OR  $result2_gps_filled OR $res OR $result2_filled_fpr_image) // success 
{
  mysql_query("COMMIT");
  createJson_etr($ids,$etr_udid);
  createJson_ncic($ids_ncic,$ncic_udid);
  createJson_acc($ids_acc,$acc_udid);
  createJson_fpr($ids_fpr,$fpr_udid);
  createJson_ssi($ids_ssi,$ssi_udid);
  createJson_gps($ids_gps,$gps_udid);
  createJson_image($fpr_image_udid);
  
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
   echo "\"data_wc_fpr_filled\": ".json_encode($fpr_udid).",\"data_wc_fpr_task_obs\": [".$message ."],";
  
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
   echo "\"data_wc_ssi_filled\": ".json_encode($ssi_udid).",\"data_wc_ssi_task_obs\": [".$message ."],";
  
 }


 function createJson_gps($arrayIds,$gps_udid)
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
   echo "\"data_wc_gps_filled\": ".json_encode($gps_udid).",\"data_wc_gps_task_obs\": [".$message ."],";
  
 }


function createJson_image($fpr_image_udid)
{
  echo "\"data_wc_fpr_image\": ".json_encode($fpr_image_udid)."}";
}




 ?>