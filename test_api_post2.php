 <?

include('inc/config.php');

// echo "ok";
// die(mysql_error());

   // $JsonData = $_REQUEST['jsondata'];
  
      $JsonData =  "{\"wc_gps_task_obs\":[],\"wc_wallMounted_task_obs\":[{\"qty_available\":\"1\",\"created\":\"2018-01-03 06:14:39\",\"udid\":\"31EBCF09-923F-4FD5-BC58-68CAAC4AC7A4\",\"actual_date\":\"\",\"resp\":\"\",\"action\":\"1\",\"emp_id\":\"\",\"action_complete\":\"\",\"is_deleted\":\"0\",\"project_id\":\"3\",\"id\":\"-2\",\"is_uploaded\":\"0\",\"induction_id\":\"23\",\"comments\":\"fffcccdvvdcsdsf\",\"target_date\":\"\",\"row_id\":\"2\",\"action_required\":\"\",\"shortage\":\"0\",\"resp_name\":\"\",\"checklist_action_comments\":\"fffcccdvvdcsdsf\",\"resp_dd\":\"\",\"updated\":\"2018-01-03 06:14:39\"},{\"qty_available\":\"0\",\"created\":\"2018-01-03 06:14:29\",\"udid\":\"31EBCF09-923F-4FD5-BC58-68CAAC4AC7A4\",\"actual_date\":\"\",\"resp\":\"\",\"action\":\"2\",\"emp_id\":\"\",\"action_complete\":\"\",\"is_deleted\":\"0\",\"project_id\":\"3\",\"id\":\"-1\",\"is_uploaded\":\"0\",\"induction_id\":\"23\",\"comments\":\"\",\"target_date\":\"2018-01-03\",\"row_id\":\"1\",\"action_required\":\"Required 1 Bag Resealable Plastic Small\",\"shortage\":\"1\",\"resp_name\":\"\",\"checklist_action_comments\":\"\",\"resp_dd\":\"\",\"updated\":\"2018-01-03 06:14:29\"}],\"wc_portable_task_obs\":[{\"qty_available\":\"1\",\"created\":\"2018-01-03 06:15:00\",\"udid\":\"37B3A0D7-CE7D-4257-B39D-C1843582CB10\",\"actual_date\":\"\",\"resp\":\"\",\"action\":\"1\",\"emp_id\":\"\",\"action_complete\":\"\",\"is_deleted\":\"0\",\"project_id\":\"3\",\"id\":\"-2\",\"is_uploaded\":\"0\",\"induction_id\":\"23\",\"comments\":\"cdsdw\",\"target_date\":\"\",\"row_id\":\"2\",\"action_required\":\"\",\"shortage\":\"0\",\"resp_name\":\"\",\"checklist_action_comments\":\"cdsdw\",\"resp_dd\":\"\",\"updated\":\"2018-01-03 06:15:00\"},{\"qty_available\":\"0\",\"created\":\"2018-01-03 06:14:53\",\"udid\":\"37B3A0D7-CE7D-4257-B39D-C1843582CB10\",\"actual_date\":\"\",\"resp\":\"\",\"action\":\"2\",\"emp_id\":\"\",\"action_complete\":\"\",\"is_deleted\":\"0\",\"project_id\":\"3\",\"id\":\"-1\",\"is_uploaded\":\"0\",\"induction_id\":\"23\",\"comments\":\"\",\"target_date\":\"2018-01-03\",\"row_id\":\"1\",\"action_required\":\"Required 1 Bag Resealable Plastic Small\",\"shortage\":\"1\",\"resp_name\":\"\",\"checklist_action_comments\":\"\",\"resp_dd\":\"\",\"updated\":\"2018-01-03 06:14:53\"}],\"wc_personal_task_obs\":[{\"qty_available\":\"1\",\"created\":\"2018-01-03 06:15:27\",\"udid\":\"C3832FB2-AE5C-44DF-8CAC-8D0D29F05E07\",\"actual_date\":\"\",\"resp\":\"\",\"action\":\"1\",\"emp_id\":\"\",\"action_complete\":\"\",\"is_deleted\":\"0\",\"project_id\":\"3\",\"id\":\"-2\",\"is_uploaded\":\"0\",\"induction_id\":\"23\",\"comments\":\"dddfd\",\"target_date\":\"\",\"row_id\":\"2\",\"action_required\":\"\",\"shortage\":\"0\",\"resp_name\":\"\",\"checklist_action_comments\":\"dddfd\",\"resp_dd\":\"\",\"updated\":\"2018-01-03 06:15:27\"},{\"qty_available\":\"0\",\"created\":\"2018-01-03 06:15:20\",\"udid\":\"C3832FB2-AE5C-44DF-8CAC-8D0D29F05E07\",\"actual_date\":\"\",\"resp\":\"\",\"action\":\"2\",\"emp_id\":\"\",\"action_complete\":\"\",\"is_deleted\":\"0\",\"project_id\":\"3\",\"id\":\"-1\",\"is_uploaded\":\"0\",\"induction_id\":\"23\",\"comments\":\"\",\"target_date\":\"2018-01-03\",\"row_id\":\"1\",\"action_required\":\"Required 1 Bag Resealable Plastic Small\",\"shortage\":\"1\",\"resp_name\":\"\",\"checklist_action_comments\":\"\",\"resp_dd\":\"\",\"updated\":\"2018-01-03 06:15:20\"}],\"wc_fpr_image\":[],\"wc_wallMounted_filled\":[{\"emp_id\":\"23\",\"is_submitted\":\"0\",\"project_id\":\"3\",\"induction_no\":\"23\",\"updated\":\"2018-01-03 06:14:23\",\"is_uploaded\":\"0\",\"created\":\"2018-01-03 06:14:18\",\"udid\":\"31EBCF09-923F-4FD5-BC58-68CAAC4AC7A4\",\"is_deleted\":\"0\"}],\"wc_etr_task_obs\":[],\"wc_ncic_task_obs\":[],\"wc_ssi_task_obs\":[],\"wc_fpr_filled\":[],\"wc_acc_filled\":[],\"wc_ncic_filled\":[],\"wc_acc_task_obs\":[],\"wc_gps_filled\":[],\"wc_portable_filled\":[{\"emp_id\":\"23\",\"is_submitted\":\"0\",\"project_id\":\"3\",\"induction_no\":\"23\",\"updated\":\"2018-01-03 06:14:48\",\"is_uploaded\":\"0\",\"created\":\"2018-01-03 06:14:44\",\"udid\":\"37B3A0D7-CE7D-4257-B39D-C1843582CB10\",\"is_deleted\":\"0\"}],\"wc_personal_filled\":[{\"emp_id\":\"23\",\"is_submitted\":\"1\",\"project_id\":\"3\",\"induction_no\":\"23\",\"updated\":\"2018-01-03 06:15:43\",\"is_uploaded\":\"0\",\"created\":\"2018-01-03 06:15:09\",\"udid\":\"C3832FB2-AE5C-44DF-8CAC-8D0D29F05E07\",\"is_deleted\":\"0\"}],\"wc_ssi_filled\":[],\"wc_fpr_task_obs\":[],\"wc_etr_filled\":[]}";



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

$ids_wm = array();
$count_wm = 0;
$countcpi_wm = 100;

$ids_por = array();
$count_por = 0;
$countcpi_por = 100;


$ids_per = array();
$count_per = 0;
$countcpi_per = 100;




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


foreach ($exjson['wc_wallMounted_task_obs'] as $row) 
{  

  if($row['id'] < 0)
  {
     
        $countcpi_wm++;
        $new_id_wm = "select max(id) as idnew From tbl_wall_mounted_obs";
        $new_id_result_wm  = mysql_query($new_id_wm);
        $new_id_result2_wm = mysql_fetch_row($new_id_result_wm);
        if($new_id_result2_wm[0] == "NULL")
          $maxid_wm=0;
        else{
        $maxid_wm = $new_id_result2_wm[0];}
        $maxid_wm = $maxid_wm + $countcpi_wm;
     
    
     $ids_wm = array_merge($ids_wm, array($maxid_wm=> $row['id'].",".$maxid_wm ));
  }
  else
  {
    $maxid_wm  = $row['id'];
    $ids_wm = array_merge($ids_wm, array($maxid_wm=> $row['id'].",".$row['id']));
  }
}



foreach ($exjson['wc_portable_task_obs'] as $row) 
{  

  if($row['id'] < 0)
  {
     
        $countcpi_por++;
        $new_id_por = "select max(id) as idnew From tbl_portable_task_obs";
        $new_id_result_por  = mysql_query($new_id_por);
        $new_id_result2_por = mysql_fetch_row($new_id_result_por);
        if($new_id_result2_por[0] == "NULL")
          $maxid_por=0;
        else{
        $maxid_por = $new_id_result2_por[0];}
        $maxid_por = $maxid_por + $countcpi_por;
     
    
     $ids_por = array_merge($ids_por, array($maxid_por=> $row['id'].",".$maxid_por ));
  }
  else
  {
    $maxid_por  = $row['id'];
    $ids_por = array_merge($ids_por, array($maxid_por=> $row['id'].",".$row['id']));
  }
}

foreach ($exjson['wc_personal_task_obs'] as $row) 
{  

  if($row['id'] < 0)
  {
     
        $countcpi_per++;
        $new_id_per = "select max(id) as idnew From tbl_personal_task_obs";
        $new_id_result_per  = mysql_query($new_id_per);
        $new_id_result2_per = mysql_fetch_row($new_id_result_per);
        if($new_id_result2_per[0] == "NULL")
          $maxid_per=0;
        else{
        $maxid_per = $new_id_result2_per[0];}
        $maxid_per = $maxid_per + $countcpi_per;
     
    
     $ids_per = array_merge($ids_per, array($maxid_per=> $row['id'].",".$maxid_per ));
  }
  else
  {
    $maxid_per  = $row['id'];
    $ids_per = array_merge($ids_per, array($maxid_per=> $row['id'].",".$row['id']));
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


foreach ( $exjson['wc_wallMounted_task_obs'] as $row )
{  




  if ($row['id'] < 0 )
  {
    $newID_wm = getID($row['id'],$ids_wm);
      $query2_ncic = "insert into tbl_wall_mounted_obs SET  
    `id`  ='".$newID_wm."',

      `comments` ='".$row['comments']."',
  `project_id`  ='".$row['project_id']."',
  `udid`  ='".$row['udid']."',
  `emp_id` ='".$row['emp_id']."',
  `is_uploaded` ='".$row['is_uploaded']."',
  `action` ='".$row['action']."',
  `checklist_action_comments` ='".$row['checklist_action_comments']."',
  `action_required` ='".$row['action_required']."',
  `resp` ='".$row['resp']."',
  `is_uploaded` ='".$row['is_uploaded']."',
  `action` ='".$row['action']."',
  `checklist_action_comments` ='".$row['checklist_action_comments']."',
  `action_required` ='".$row['action_required']."',
  `resp` ='".$row['resp']."',
  `target_date` ='".$row['target_date']."',
  `resp_dd` ='".$row['resp_dd']."',
  `resp_name` ='".$row['resp_name']."',
  `action_complete` ='".$row['action_complete']."',
  `induction_id` ='".$row['induction_id']."',
  `created` ='".$row['created']."',
  `updated` ='".$row['updated']."',
  `is_deleted` ='".$row['is_deleted']."',
  `qty_available` ='".$row['qty_available']."',
  `shortage` ='".$row['shortage']."',

  `row_id` ='".$row['row_id']."',
  `actual_date` ='".$row['actual_date']."'

   ";
     
   // echo $query2;
    
    
   
  
  
     $result2_wm = mysql_query($query2_wm);


  
  }
  else
  {
        $sql_1_ncic = "update tbl_wall_mounted_obs SET  

        `comments` ='".$row['comments']."',
  `project_id`  ='".$row['project_id']."',
  `udid`  ='".$row['udid']."',
  `emp_id` ='".$row['emp_id']."',
  `is_uploaded` ='".$row['is_uploaded']."',
  `action` ='".$row['action']."',
  `checklist_action_comments` ='".$row['checklist_action_comments']."',
  `action_required` ='".$row['action_required']."',
  `resp` ='".$row['resp']."',
  `is_uploaded` ='".$row['is_uploaded']."',
  `action` ='".$row['action']."',
  `checklist_action_comments` ='".$row['checklist_action_comments']."',
  `action_required` ='".$row['action_required']."',
  `resp` ='".$row['resp']."',
  `target_date` ='".$row['target_date']."',
  `resp_dd` ='".$row['resp_dd']."',
  `resp_name` ='".$row['resp_name']."',
  `action_complete` ='".$row['action_complete']."',
  `induction_id` ='".$row['induction_id']."',
  `created` ='".$row['created']."',
  `updated` ='".$row['updated']."',
  `is_deleted` ='".$row['is_deleted']."',
  `qty_available` ='".$row['qty_available']."',
  `shortage` ='".$row['shortage']."',

  `row_id` ='".$row['row_id']."',
  `actual_date` ='".$row['actual_date']."'

       where id='".$row['id']."'";


  

    $result2_wm = mysql_query($sql_1_wm);
     

        

  }
}



foreach ( $exjson['wc_wallMounted_filled'] as $row )
{  



$result_check_exist = mysql_query("select udid from tbl_wall_mounted_filled where udid = '".$row['udid']."'");  
$number_of_rows = mysql_num_rows($result_check_exist);

if($number_of_rows <= 0)
{ 

 $query2_wm_filled = "insert into tbl_wall_mounted_filled SET  
    `induction_no` ='".$row['induction_no']."',
  `udid` ='".$row['udid']."',
  `emp_id` ='".$row['emp_id']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `is_submitted`  ='".$row['is_submitted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."'";

     $result2_wm_filled = mysql_query($query2_wm_filled);
     array_push($wm_udid, $row['udid']);
}

else
{



   $sql_1_wm_filled= "update tbl_wall_mounted_filled SET  
    `induction_no` ='".$row['induction_no']."',
  `emp_id` ='".$row['emp_id']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `is_submitted`  ='".$row['is_submitted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."' where `udid` ='".$row['udid']."'";

   $result2_wm_filled = mysql_query($sql_1_wm_filled);
   array_push($wm_udid, $row['udid']);

}
  
}






foreach ( $exjson['wc_portable_task_obs'] as $row )
{  




  if ($row['id'] < 0 )
  {
    $newID_por = getID($row['id'],$ids_por);
      $query2_por = "insert into tbl_portable_task_obs SET  
    `id`  ='".$newID_por."',

      `comments` ='".$row['comments']."',
  `project_id`  ='".$row['project_id']."',
  `udid`  ='".$row['udid']."',
  `emp_id` ='".$row['emp_id']."',
  `is_uploaded` ='".$row['is_uploaded']."',
  `action` ='".$row['action']."',
  `checklist_action_comments` ='".$row['checklist_action_comments']."',
  `action_required` ='".$row['action_required']."',
  `resp` ='".$row['resp']."',
  `is_uploaded` ='".$row['is_uploaded']."',
  `action` ='".$row['action']."',
  `checklist_action_comments` ='".$row['checklist_action_comments']."',
  `action_required` ='".$row['action_required']."',
  `resp` ='".$row['resp']."',
  `target_date` ='".$row['target_date']."',
  `resp_dd` ='".$row['resp_dd']."',
  `resp_name` ='".$row['resp_name']."',
  `action_complete` ='".$row['action_complete']."',
  `induction_id` ='".$row['induction_id']."',
  `created` ='".$row['created']."',
  `updated` ='".$row['updated']."',
  `is_deleted` ='".$row['is_deleted']."',
  `qty_available` ='".$row['qty_available']."',
  `shortage` ='".$row['shortage']."',

  `row_id` ='".$row['row_id']."',
  `actual_date` ='".$row['actual_date']."'

   ";
     
   // echo $query2;
    
    
   
  
  
     $result2_por = mysql_query($query2_por);


  
  }
  else
  {
        $sql_1_por = "update tbl_portable_task_obs SET  

        `comments` ='".$row['comments']."',
  `project_id`  ='".$row['project_id']."',
  `udid`  ='".$row['udid']."',
  `emp_id` ='".$row['emp_id']."',
  `is_uploaded` ='".$row['is_uploaded']."',
  `action` ='".$row['action']."',
  `checklist_action_comments` ='".$row['checklist_action_comments']."',
  `action_required` ='".$row['action_required']."',
  `resp` ='".$row['resp']."',
  `is_uploaded` ='".$row['is_uploaded']."',
  `action` ='".$row['action']."',
  `checklist_action_comments` ='".$row['checklist_action_comments']."',
  `action_required` ='".$row['action_required']."',
  `resp` ='".$row['resp']."',
  `target_date` ='".$row['target_date']."',
  `resp_dd` ='".$row['resp_dd']."',
  `resp_name` ='".$row['resp_name']."',
  `action_complete` ='".$row['action_complete']."',
  `induction_id` ='".$row['induction_id']."',
  `created` ='".$row['created']."',
  `updated` ='".$row['updated']."',
  `is_deleted` ='".$row['is_deleted']."',
  `qty_available` ='".$row['qty_available']."',
  `shortage` ='".$row['shortage']."',

  `row_id` ='".$row['row_id']."',
  `actual_date` ='".$row['actual_date']."'

       where id='".$row['id']."'";


  

    $result2_por = mysql_query($sql_1_por);
     

        

  }
}



foreach ( $exjson['wc_portable_filled'] as $row )
{  



$result_check_exist = mysql_query("select udid from tbl_portable_filled where udid = '".$row['udid']."'");  
$number_of_rows = mysql_num_rows($result_check_exist);

if($number_of_rows <= 0)
{ 

 $query2_wm_filled = "insert into tbl_portable_filled SET  
    `induction_no` ='".$row['induction_no']."',
  `udid` ='".$row['udid']."',
  `emp_id` ='".$row['emp_id']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `is_submitted`  ='".$row['is_submitted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."'";

     $result2_por_filled = mysql_query($query2_por_filled);
     array_push($por_udid, $row['udid']);
}

else
{



   $sql_1_por_filled= "update tbl_portable_filled SET  
    `induction_no` ='".$row['induction_no']."',
  `emp_id` ='".$row['emp_id']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `is_submitted`  ='".$row['is_submitted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."' where `udid` ='".$row['udid']."'";

   $result2_por_filled = mysql_query($sql_1_por_filled);
   array_push($por_udid, $row['udid']);

}
  
}





foreach ( $exjson['wc_personal_task_obs'] as $row )
{  




  if ($row['id'] < 0 )
  {
    $newID_per = getID($row['id'],$ids_per);
      $query2_per = "insert into tbl_personal_task_obs SET  
    `id`  ='".$newID_per."',

      `comments` ='".$row['comments']."',
  `project_id`  ='".$row['project_id']."',
  `udid`  ='".$row['udid']."',
  `emp_id` ='".$row['emp_id']."',
  `is_uploaded` ='".$row['is_uploaded']."',
  `action` ='".$row['action']."',
  `checklist_action_comments` ='".$row['checklist_action_comments']."',
  `action_required` ='".$row['action_required']."',
  `resp` ='".$row['resp']."',
  `is_uploaded` ='".$row['is_uploaded']."',
  `action` ='".$row['action']."',
  `checklist_action_comments` ='".$row['checklist_action_comments']."',
  `action_required` ='".$row['action_required']."',
  `resp` ='".$row['resp']."',
  `target_date` ='".$row['target_date']."',
  `resp_dd` ='".$row['resp_dd']."',
  `resp_name` ='".$row['resp_name']."',
  `action_complete` ='".$row['action_complete']."',
  `induction_id` ='".$row['induction_id']."',
  `created` ='".$row['created']."',
  `updated` ='".$row['updated']."',
  `is_deleted` ='".$row['is_deleted']."',
  `qty_available` ='".$row['qty_available']."',
  `shortage` ='".$row['shortage']."',

  `row_id` ='".$row['row_id']."',
  `actual_date` ='".$row['actual_date']."'

   ";
     
   // echo $query2;
    
    
   
  
  
     $result2_per = mysql_query($query2_per);


  
  }
  else
  {
        $sql_1_per = "update tbl_personal_task_obs SET  

        `comments` ='".$row['comments']."',
  `project_id`  ='".$row['project_id']."',
  `udid`  ='".$row['udid']."',
  `emp_id` ='".$row['emp_id']."',
  `is_uploaded` ='".$row['is_uploaded']."',
  `action` ='".$row['action']."',
  `checklist_action_comments` ='".$row['checklist_action_comments']."',
  `action_required` ='".$row['action_required']."',
  `resp` ='".$row['resp']."',
  `is_uploaded` ='".$row['is_uploaded']."',
  `action` ='".$row['action']."',
  `checklist_action_comments` ='".$row['checklist_action_comments']."',
  `action_required` ='".$row['action_required']."',
  `resp` ='".$row['resp']."',
  `target_date` ='".$row['target_date']."',
  `resp_dd` ='".$row['resp_dd']."',
  `resp_name` ='".$row['resp_name']."',
  `action_complete` ='".$row['action_complete']."',
  `induction_id` ='".$row['induction_id']."',
  `created` ='".$row['created']."',
  `updated` ='".$row['updated']."',
  `is_deleted` ='".$row['is_deleted']."',
  `qty_available` ='".$row['qty_available']."',
  `shortage` ='".$row['shortage']."',

  `row_id` ='".$row['row_id']."',
  `actual_date` ='".$row['actual_date']."'

       where id='".$row['id']."'";


  

    $result2_per = mysql_query($sql_1_per);
     

        

  }
}



foreach ( $exjson['wc_personal_filled'] as $row )
{  



$result_check_exist = mysql_query("select udid from tbl_personal_filled where udid = '".$row['udid']."'");  
$number_of_rows = mysql_num_rows($result_check_exist);

if($number_of_rows <= 0)
{ 

 $query2_wm_filled = "insert into tbl_personal_filled SET  
    `induction_no` ='".$row['induction_no']."',
  `udid` ='".$row['udid']."',
  `emp_id` ='".$row['emp_id']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `is_submitted`  ='".$row['is_submitted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."'";

     $result2_per_filled = mysql_query($query2_per_filled);
     array_push($per_udid, $row['udid']);
}

else
{



   $sql_1_por_filled= "update tbl_personal_filled SET  
    `induction_no` ='".$row['induction_no']."',
  `emp_id` ='".$row['emp_id']."',
  `is_deleted`  ='".$row['is_deleted']."',
  `is_submitted`  ='".$row['is_submitted']."',
  `created`  ='".$row['created']."',
  `updated`  ='".$row['updated']."',
  `project_id`  ='".$row['project_id']."',
  `is_uploaded`  ='".$row['is_uploaded']."' where `udid` ='".$row['udid']."'";

   $result2_per_filled = mysql_query($sql_1_per_filled);
   array_push($per_udid, $row['udid']);

}
  
}




//Transaction End 

if($result2 OR $result2_ncic OR $result2_acc OR  $result2_fpr OR $result2_fpr_filled OR $result2_acc_filled OR $result2_ncic_filled OR $result2_filled OR $result2_ssi_filled OR $result2_ssi OR  $result2_gps_filled  OR  $result2_wm_filled OR $result2_por_filled OR $result2_per_filled OR $res OR $result2_filled_fpr_image) // success 
{
  mysql_query("COMMIT");
  createJson_etr($ids,$etr_udid);
  createJson_ncic($ids_ncic,$ncic_udid);
  createJson_acc($ids_acc,$acc_udid);
  createJson_fpr($ids_fpr,$fpr_udid);
  createJson_ssi($ids_ssi,$ssi_udid);
  createJson_gps($ids_gps,$gps_udid);
   createJson_wm($ids_wm,$wm_udid);
    createJson_por($ids_por,$por_udid);
     createJson_per($ids_per,$per_udid);
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


 function createJson_wm($arrayIds,$wm_udid)
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
   echo "\"data_wc_wallmounted_filled\": ".json_encode($wm_udid).",\"data_wc_wallmounted_task_obs\": [".$message ."],";
  
 }


 function createJson_wm($arrayIds,$por_udid)
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
   echo "\"data_wc_portable_filled\": ".json_encode($por_udid).",\"data_wc_portable_task_obs\": [".$message ."],";
  
 }


 function createJson_wm($arrayIds,$per_udid)
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
   echo "\"data_wc_personal_filled\": ".json_encode($per_udid).",\"data_wc_personal_task_obs\": [".$message ."],";
  
 }




function createJson_image($fpr_image_udid)
{
  echo "\"data_wc_fpr_image\": ".json_encode($fpr_image_udid)."}";
}




 ?>