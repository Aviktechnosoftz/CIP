 <?
include('inc/config.php');

 $JsonData = $_REQUEST['jsondata'];
	
  /* "{\"sm_report_task_obs\":[{\"id\":\"-1\",\"is_uploaded\":\"0\",\"task_desc\":\"ddd\",\"general_question\":\"\",\"emp_id\":\"54\",\"task_number\":\"1\",\"is_deleted\":\"0\",\"img_url\":\"\",\"updated\":\"2017-10-15 11:44:55\",\"project_id\":\"3\",\"comments\":\"qefqwef\",\"created\":\"2017-10-15 11:44:55\",\"udid\":\"0E113266-5FBD-4AFD-8ADE-F16320BBFB1\"}]}";

//$_REQUEST['jsondata'];*/



$exjson = json_decode($JsonData, true); 



$ids = array();
$count = 0;
$countcpi = 100;

foreach ($exjson['sm_report_task_obs'] as $row) 
{  

	if($row['id'] < 0)
	{
		 
				$countcpi++;
				$new_id = "select max(id) as idnew From tbl_sm_report_task_obs";
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
//Transection start
mysql_query("SET AUTOCOMMIT=0");
mysql_query("START TRANSACTION");

//For Induction Register 
foreach ( $exjson['sm_report_task_obs'] as $row )
{  

	if ($row['id'] < 0 )
	{
	  $newID = getID($row['id'],$ids);
      $query2 = "insert into tbl_sm_report_task_obs SET task_desc='".$row['task_desc']."',general_question='".$row['general_question']."',emp_id='".$row['emp_id']."',task_number='".$row['task_number']."',is_deleted='".$row['is_deleted']."',img_url='".$row['img_url']."',updated='".$row['updated']."',project_id='".$row['project_id']."',comments='".$row['comments']."',created='".$row['created']."',udid='".$row['udid']."' , id=".$newID."";
     
	 // echo $query2;
	  
	  
	  
	
  
	   $result2 = mysql_query($query2);
	}
	else
	{
		    $sql_1 = "update tbl_sm_report_task_obs SET task_desc='".$row['task_desc']."',general_question='".$row['general_question']."',emp_id='".$row['emp_id']."',task_number='".$row['task_number']."',is_deleted='".$row['is_deleted']."',img_url='".$row['img_url']."',updated='".$row['updated']."',project_id='".$row['project_id']."',comments='".$row['comments']."',created='".$row['created']."',udid='".$row['udid']."' where id='".$row['id']."'";
		    $result2 = mysql_query($sql_1);

	}
}




//Transaction End 

if($result2) // success 
{
	mysql_query("COMMIT");
	createJson($ids);
	
}
else
{
	 mysql_query("ROLLBACK");
	 echo "{\"responce\":\"201\",\"data\":\"".$result2."\"}";
	
	
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


 function createJson($arrayIds)
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
	 echo "{\"response\":\"200\",\"data\": [".$message ."]}";
	
 }









 ?>