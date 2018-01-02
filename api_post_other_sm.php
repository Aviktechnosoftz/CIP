 <?
include('inc/config.php');

 $JsonData = $_REQUEST['jsondata'];
	
   $JsonData =  "{\"wc_ncic_task_obs\":[{\"next_inspection_date\":\"2017-11-01\",\"nurse_call_number\":\"4444444444\",\"created\":\"2017-11-01 10:18:31\",\"actual_date\":\"\",\"udid\":\"B4D78C01-F7A1-4B55-BD12-A6B42F109D67\",\"resp\":\"narendra Kumar(arti.m@aviktechnosoft.com)\",\"action\":\"2\",\"emp_id\":\"23\",\"is_deleted\":\"0\",\"task_desc\":\"eeee\",\"action_complete\":\"\",\"task_number\":\"1\",\"id\":\"-1\",\"is_uploaded\":\"0\",\"project_id\":\"3\",\"comments\":\"\",\"target_date\":\"2017-11-01\",\"induction_id\":\"1\",\"action_required\":\"34rwfr\",\"last_inspection_date\":\"2017-11-01\",\"resp_name\":\"narendra Kumar\",\"checklist_action_comments\":\"\",\"resp_dd\":\"arti.m@aviktechnosoft.com\",\"inspected_by\":\"Pieter Koppen\",\"updated\":\"2017-11-01 10:18:31\"}],\"wc_etr_task_obs\":[],\"wc_ncic_filled\":[{\"is_submitted\":\"0\",\"project_id\":\"3\",\"induction_no\":\"1\",\"updated\":\"2017-11-01 10:18:02\",\"is_uploaded\":\"0\",\"created\":\"2017-11-01 10:18:01\",\"udid\":\"B4D78C01-F7A1-4B55-BD12-A6B42F109D67\",\"is_deleted\":\"0\"}],\"wc_etr_filled\":[],\"wc_acc_filled\":[],\"wc_acc_task_obs\":[]}";

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

$ncic_udid="";
$acc_udid="";
$etr_udid="";

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

   $etr_udid = $row['udid'];
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
   $etr_udid = $row['udid'];

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
     $ncic_udid= $row['udid'];
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
   $ncic_udid= $row['udid'];

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

       $acc_udid= $row['udid'];
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
   $acc_udid= $row['udid'];

}
	
}



//Transaction End 

if($result2 OR $result2_ncic OR $result2_acc) // success 
{
	mysql_query("COMMIT");
	createJson_etr($ids,"wc_etr_task_obs");
	createJson_ncic($ids_ncic,"wc_ncic_task_obs");
	createJson_acc($ids_acc,"wc_acc_task_obs");
	
}
else
{
	 mysql_query("ROLLBACK");
	 echo "{\"responce\":\"201\",\"data\":\"".$result2.$result2_acc.$result2_ncic."\"}";
	
	
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


 function createJson_etr($arrayIds)
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
	 echo "{\"response\":\"200\",\"data_wc_etr_filled\": [".$etr_udid."],\"data_wc_etr_task_obs\": [".$message ."],";
	
 }

 function createJson_ncic($arrayIds)
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
	 echo "\"data_wc_ncic_filled\": [".$ncic_udid."],\"data_wc_ncic_task_obs\": [".$message ."],";
	
 }


 function createJson_acc($arrayIds)
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
	 echo "\"data_wc_acc_filled\": [".$acc_udid."],\"data_wc_acc_task_ob\": [".$message ."]}";
	
 }









 ?>