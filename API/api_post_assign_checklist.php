 <?
include('inc/config.php');
$JsonData = $_REQUEST['jsondata'];

$exjson = json_decode($JsonData, true); 
$ids = array();
$count = 0;


foreach ($exjson['assignchecklist'] as $row) 
{  

	if($row['id'] < 0)
	{
				$count ++;
				$new_id = "select max(id) as idnew From tbl_assign_checklist";
				$new_id_result2 = mysql_fetch_row(mysql_query($new_id));
				$maxid = $new_id_result2[0] + $count;
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
foreach ( $exjson['assignchecklist'] as $row)
{  


	if ($row['id'] < 0 )
	{
	  $newID = getID($row['id'],$ids);
      $query2 = "insert into tbl_assign_checklist set `id` = '".$newID."',
	  checklist_name = '". $row['checklist_name']."',
	  itp_main_id = '". $row['itp_main_id']."',
	  created_by = '". $row['created_by']."',
	  uuid = '". $row['uuid']."',
	  itp_form_assign_uuid = '". $row['itp_form_assign_uuid']."',
	  is_deleted = '". $row['is_deleted']."',
	  created = now(),
	  updated = now() ";
	  $result = mysql_query($query2);
	}
	else
	{
		    $sql_1 = " update tbl_assign_checklist set 
					   checklist_name = '". $row['checklist_name']."',
					   itp_main_id = '". $row['itp_main_id']."',
					   created_by = '". $row['created_by']."',
					   uuid = '". $row['uuid']."',
					   itp_form_assign_uuid = '". $row['itp_form_assign_uuid']."',
					   is_deleted = '". $row['is_deleted']."',
					   updated = now() where id='".$row['id']."'";
		    $result = mysql_query($sql_1);

	}
}





//Transaction End 

if($result) // success 
{
	mysql_query("COMMIT");
	createJson($ids);
	
}
else
{
	 mysql_query("ROLLBACK");
	 echo "{\"responce\":\"201\",\"data\":\"".$result3 .",".$query1.",".$result4 .",".$result5 .",".$result2."\"}";
	
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