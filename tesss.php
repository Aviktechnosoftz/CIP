 <?

include('inc/config.php');

// echo "ok";
// die(mysql_error());

   // $JsonData = $_REQUEST['jsondata'];
  
       $JsonData =  "{\"wc_gps_task_obs\":[],\"wc_wallMounted_task_obs\":[{\"qty_available\":\"1\",\"created\":\"2018-01-03 06:14:39\",\"udid\":\"31EBCF09-923F-4FD5-BC58-68CAAC4AC7A4\",\"actual_date\":\"\",\"resp\":\"\",\"action\":\"1\",\"emp_id\":\"\",\"action_complete\":\"\",\"is_deleted\":\"0\",\"project_id\":\"3\",\"id\":\"-2\",\"is_uploaded\":\"0\",\"induction_id\":\"23\",\"comments\":\"fffcccdvvdcsdsf\",\"target_date\":\"\",\"row_id\":\"2\",\"action_required\":\"\",\"shortage\":\"0\",\"resp_name\":\"\",\"checklist_action_comments\":\"fffcccdvvdcsdsf\",\"resp_dd\":\"\",\"updated\":\"2018-01-03 06:14:39\"},{\"qty_available\":\"0\",\"created\":\"2018-01-03 06:14:29\",\"udid\":\"31EBCF09-923F-4FD5-BC58-68CAAC4AC7A4\",\"actual_date\":\"\",\"resp\":\"\",\"action\":\"2\",\"emp_id\":\"\",\"action_complete\":\"\",\"is_deleted\":\"0\",\"project_id\":\"3\",\"id\":\"-1\",\"is_uploaded\":\"0\",\"induction_id\":\"23\",\"comments\":\"\",\"target_date\":\"2018-01-03\",\"row_id\":\"1\",\"action_required\":\"Required 1 Bag Resealable Plastic Small\",\"shortage\":\"1\",\"resp_name\":\"\",\"checklist_action_comments\":\"\",\"resp_dd\":\"\",\"updated\":\"2018-01-03 06:14:29\"}],\"wc_portable_task_obs\":[{\"qty_available\":\"1\",\"created\":\"2018-01-03 06:15:00\",\"udid\":\"37B3A0D7-CE7D-4257-B39D-C1843582CB10\",\"actual_date\":\"\",\"resp\":\"\",\"action\":\"1\",\"emp_id\":\"\",\"action_complete\":\"\",\"is_deleted\":\"0\",\"project_id\":\"3\",\"id\":\"-2\",\"is_uploaded\":\"0\",\"induction_id\":\"23\",\"comments\":\"cdsdw\",\"target_date\":\"\",\"row_id\":\"2\",\"action_required\":\"\",\"shortage\":\"0\",\"resp_name\":\"\",\"checklist_action_comments\":\"cdsdw\",\"resp_dd\":\"\",\"updated\":\"2018-01-03 06:15:00\"},{\"qty_available\":\"0\",\"created\":\"2018-01-03 06:14:53\",\"udid\":\"37B3A0D7-CE7D-4257-B39D-C1843582CB10\",\"actual_date\":\"\",\"resp\":\"\",\"action\":\"2\",\"emp_id\":\"\",\"action_complete\":\"\",\"is_deleted\":\"0\",\"project_id\":\"3\",\"id\":\"-1\",\"is_uploaded\":\"0\",\"induction_id\":\"23\",\"comments\":\"\",\"target_date\":\"2018-01-03\",\"row_id\":\"1\",\"action_required\":\"Required 1 Bag Resealable Plastic Small\",\"shortage\":\"1\",\"resp_name\":\"\",\"checklist_action_comments\":\"\",\"resp_dd\":\"\",\"updated\":\"2018-01-03 06:14:53\"}],\"wc_personal_task_obs\":[{\"qty_available\":\"1\",\"created\":\"2018-01-03 06:15:27\",\"udid\":\"C3832FB2-AE5C-44DF-8CAC-8D0D29F05E07\",\"actual_date\":\"\",\"resp\":\"\",\"action\":\"1\",\"emp_id\":\"\",\"action_complete\":\"\",\"is_deleted\":\"0\",\"project_id\":\"3\",\"id\":\"-2\",\"is_uploaded\":\"0\",\"induction_id\":\"23\",\"comments\":\"dddfd\",\"target_date\":\"\",\"row_id\":\"2\",\"action_required\":\"\",\"shortage\":\"0\",\"resp_name\":\"\",\"checklist_action_comments\":\"dddfd\",\"resp_dd\":\"\",\"updated\":\"2018-01-03 06:15:27\"},{\"qty_available\":\"0\",\"created\":\"2018-01-03 06:15:20\",\"udid\":\"C3832FB2-AE5C-44DF-8CAC-8D0D29F05E07\",\"actual_date\":\"\",\"resp\":\"\",\"action\":\"2\",\"emp_id\":\"\",\"action_complete\":\"\",\"is_deleted\":\"0\",\"project_id\":\"3\",\"id\":\"-1\",\"is_uploaded\":\"0\",\"induction_id\":\"23\",\"comments\":\"\",\"target_date\":\"2018-01-03\",\"row_id\":\"1\",\"action_required\":\"Required 1 Bag Resealable Plastic Small\",\"shortage\":\"1\",\"resp_name\":\"\",\"checklist_action_comments\":\"\",\"resp_dd\":\"\",\"updated\":\"2018-01-03 06:15:20\"}],\"wc_fpr_image\":[],\"wc_wallMounted_filled\":[{\"emp_id\":\"23\",\"is_submitted\":\"0\",\"project_id\":\"3\",\"induction_no\":\"23\",\"updated\":\"2018-01-03 06:14:23\",\"is_uploaded\":\"0\",\"created\":\"2018-01-03 06:14:18\",\"udid\":\"31EBCF09-923F-4FD5-BC58-68CAAC4AC7A4\",\"is_deleted\":\"0\"}],\"wc_etr_task_obs\":[],\"wc_ncic_task_obs\":[],\"wc_ssi_task_obs\":[],\"wc_fpr_filled\":[],\"wc_acc_filled\":[],\"wc_ncic_filled\":[],\"wc_acc_task_obs\":[],\"wc_gps_filled\":[],\"wc_portable_filled\":[{\"emp_id\":\"23\",\"is_submitted\":\"0\",\"project_id\":\"3\",\"induction_no\":\"23\",\"updated\":\"2018-01-03 06:14:48\",\"is_uploaded\":\"0\",\"created\":\"2018-01-03 06:14:44\",\"udid\":\"37B3A0D7-CE7D-4257-B39D-C1843582CB10\",\"is_deleted\":\"0\"}],\"wc_personal_filled\":[{\"emp_id\":\"23\",\"is_submitted\":\"1\",\"project_id\":\"3\",\"induction_no\":\"23\",\"updated\":\"2018-01-03 06:15:43\",\"is_uploaded\":\"0\",\"created\":\"2018-01-03 06:15:09\",\"udid\":\"C3832FB2-AE5C-44DF-8CAC-8D0D29F05E07\",\"is_deleted\":\"0\"}],\"wc_ssi_filled\":[],\"wc_fpr_task_obs\":[],\"wc_etr_filled\":[]}";



//  $JsonData='';





//$_REQUEST['jsondata'];*/



$exjson = json_decode($JsonData, true); 






$ids_wm = array();
$count_wm = 0;
$countcpi_wm = 100;








$wm_udid=array();




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







//Transection start
mysql_query("SET AUTOCOMMIT=0");
mysql_query("START TRANSACTION");

//For wc_etr_task_obs








foreach ( $exjson['wc_wallMounted_task_obs'] as $row )
{  

  if ($row['id'] < 0 )
  {
     $newID_wm=getID($row['id'],$ids_wm);
            $query2_wm="insert into tbl_wall_mounted_obs SET  
          `id`='".$newID_wm."',

            `comments`='".$row['comments']."',
        `project_id`='".$row['project_id']."',
        `udid`='".$row['udid']."',
        `emp_id`='".$row['emp_id']."',
        `is_uploaded`='".$row['is_uploaded']."',
        `action`='".$row['action']."',
        `checklist_action_comments`='".$row['checklist_action_comments ']."',
        `action_required`='".$row['action_required']."',
       `resp`='".$row['resp']."',
        `target_date`='".$row['target_date']."',
        `resp_dd`='".$row['resp_dd']."',
        `resp_name`='".$row['resp_name']."',
        `action_complete`='".$row['action_complete']."',
        `induction_id`='".$row['induction_id']."',
        `created`='".$row['created']."',
        `updated`='".$row['updated']."',
        `is_deleted`='".$row['is_deleted']."',
        `qty_available`='".$row['qty_available']."',
        `shortage`='".$row['shortage']."',

        `row_id`='".$row['row_id']."',
        `actual_date`='".$row['actual_date']."'

         ";
     

   // echo $query2;
    
    
   
  
  
     $result2_wm = mysql_query($query2_wm);


  
  }
  else
  {
        $sql_1_wm = "update tbl_wall_mounted_obs SET  

    `comments`='".$row['comments']."',
        `project_id`='".$row['project_id']."',
        `udid`='".$row['udid']."',
        `emp_id`='".$row['emp_id']."',
        `is_uploaded`='".$row['is_uploaded']."',
        `action`='".$row['action']."',
        `checklist_action_comments`='".$row['checklist_action_comments ']."',
        `action_required`='".$row['action_required']."',
       `resp`='".$row['resp']."',
        `target_date`='".$row['target_date']."',
        `resp_dd`='".$row['resp_dd']."',
        `resp_name`='".$row['resp_name']."',
        `action_complete`='".$row['action_complete']."',
        `induction_id`='".$row['induction_id']."',
        `created`='".$row['created']."',
        `updated`='".$row['updated']."',
        `is_deleted`='".$row['is_deleted']."',
        `qty_available`='".$row['qty_available']."',
        `shortage`='".$row['shortage']."',

        `row_id`='".$row['row_id']."',
        `actual_date`='".$row['actual_date']."'  where id='".$row['id']."'";


  

    $result2_wm = mysql_query($sql_1_wm);
     

        

  }
}




foreach ($exjson['wc_wallMounted_filled'] as $row)
{  



$result_check_exist = mysql_query("select udid from tbl_wall_mounted_filled where udid = '".$row['udid']."'");  
$number_of_rows = mysql_num_rows($result_check_exist);

if($number_of_rows <= 0)
{ 

 $query2_wm_filled = "insert into tbl_wall_mounted_filled SET  
    `induction_no` ='".$row['induction_no']."',
  `udid` ='".$row['udid']."',
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




  




//Transaction End 

if($result2_wm_filled) // success 
{
  mysql_query("COMMIT");
  
  createJson_wm($ids_wm,$wm_udid);
  
  
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


 function createJson_wm($arrayIds,$ncic_udid)
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
   echo "\"data_wc_ncic_filled\": ".json_encode($wm_udid).",\"data_wc_ncic_task_obs\": [".$message ."],";
  
 }


 



 ?>