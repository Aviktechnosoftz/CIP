 <?
include('inc/config.php');
$JsonData = $_REQUEST['jsondata'];

$exjson = json_decode($JsonData, true); 
$ids = array();
$count = 0;

foreach ($exjson['formdatafilled'] as $row) 
{  

	if($row['id'] < 0)
	{
				$count ++;
				$new_id = "select max(id) as idnew From tbl_form_data_filled";
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
foreach ( $exjson['formdatafilled'] as $row)
{  

	
	if ($row['id'] < 0 )
	{
	  $newID = getID($row['id'],$ids);
      $query2 = "insert into tbl_form_data_filled set `id` = '".$newID."',
	  row_id = '". $row['row_id']."',
	  remark = '". $row['remark']."',
	  ref_doc_data = '". $row['ref_doc_data']."',
	  filled_by = '".$row['filled_by']."',
	  assign_uuid='".$row['assign_uuid']."',
	  is_keycontrol='".$row['is_keycontrol']."',
	  unlock_induction_no='".$row['unlock_induction_no']."',
	  is_notification='".$row['is_notification']."',
	  comment_keycontrol='".$row['comment_keycontrol']."',
	  is_person='".$row['is_person']."',
	  is_acceptance_criteria='".$row['is_acceptance_criteria']."',
	  other_comment='".$row['other_comment']."',
	  created = now(),
	  updated = now() ";
  
	   $result = mysql_query($query2);
	}
	else
	{
		    $sql_1 = "update tbl_form_data_filled set 
					 row_id = '". $row['row_id']."',
					 remark = '". $row['remark']."',
					 ref_doc_data = '". $row['ref_doc_data']."',
					 filled_by = '".$row['filled_by']."',
					  assign_uuid='".$row['assign_uuid']."',
					  is_keycontrol='".$row['is_keycontrol']."',
					   unlock_induction_no='".$row['unlock_induction_no']."',
					   is_notification='".$row['is_notification']."',
	  					comment_keycontrol='".$row['comment_keycontrol']."',
					  is_person='".$row['is_person']."',
					  is_acceptance_criteria='".$row['is_acceptance_criteria']."',
					  other_comment='".$row['other_comment']."',
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