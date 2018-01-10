 <?
include('inc/config.php');
// $JsonData = $_REQUEST['jsondata'];
$JsonData = '{{
	"datadeclaration": [{
		"edit_certifiy": "nitj ghjh",
		"id": "39",
		"isuploaded": "0",
		"todays_date": "16-02-2017",
		"your_signature": "sign_20170216_120920.png"
	}],
	"dataemployee": [{
		"DOB": "16-02-2017",
		"address": "ndj",
		"contact_person_name": "jtjtj",
		"contact_phone": "445",
		"created_date": "2017-02-16 12:09:34",
		"date_issued": "16-02-2017",
		"email_add": "j@d.v",
		"given_name": "nitj",
		"id": "39",
		"inductioncard": "5555",
		"insert_detail": "",
		"is_activated": "1",
		"is_deleted": "0",
		"isuploaded": "0",
		"occupation": "!kkjrj",
		"pin": "5555",
		"position": "Site Manager",
		"relationship": "kkkkrj",
		"surname": "ghjh",
		"their_phn_no": "4455",
		"training_provider_name": "jjjf",
		"general_card_induction_num_cb": 0,
		"medical_check_box": 0
	}],
	"datainduction_register": [{
		"created_date": "2017-02-16 12:09:34",
		"empid": "2",
		"id": "39",
		"induction_card_no": "5555",
		"induction_date": "16-02-2017",
		"isuploaded": "0",
		"pincode": "5555",
		"project_id": "1",
		"inducted_by": 0
	}],
	"datasite_attachment": [{
		"image_url": "20170216_120550.jpg",
		"isuploaded": "0",
		"image_id": 4,
		"induction_id": 39
	}, {
		"image_url": "20170216_120901.jpg",
		"isuploaded": "0",
		"image_id": 5,
		"induction_id": 39
	}],
	"datasite_ids": [{
		"induction_id": "39"
	}],
	"datasite_induction_topic": [{
		"id": "39",
		"induction_topic_edit_text_34": "",
		"isuploaded": "0",
		"induction_topic_1": 1,
		"induction_topic_10": 0,
		"induction_topic_11": 0,
		"induction_topic_12": 0,
		"induction_topic_13": 0,
		"induction_topic_14": 0,
		"induction_topic_15": 0,
		"induction_topic_16": 0,
		"induction_topic_17": 0,
		"induction_topic_18": 0,
		"induction_topic_19": 0,
		"induction_topic_2": 1,
		"induction_topic_20": 0,
		"induction_topic_21": 0,
		"induction_topic_22": 0,
		"induction_topic_23": 0,
		"induction_topic_24": 0,
		"induction_topic_25": 0,
		"induction_topic_26": 0,
		"induction_topic_27": 0,
		"induction_topic_28": 0,
		"induction_topic_29": 0,
		"induction_topic_3": 1,
		"induction_topic_30": 0,
		"induction_topic_31": 0,
		"induction_topic_32": 0,
		"induction_topic_33": 0,
		"induction_topic_34": 0,
		"induction_topic_4": 0,
		"induction_topic_5": 0,
		"induction_topic_6": 0,
		"induction_topic_7": 0,
		"induction_topic_8": 0,
		"induction_topic_9": 0,
		"it_SelectAll": 0
	}]
}}';

$exjson = json_decode($JsonData, true);
echo $exjson;
 
$ids = array();
$count = 0;
$countcpi = 0;
foreach ($exjson['datainduction_register'] as $row) 
{  

	if($row['id'] < 0)
	{
	 if($row['empid'] == 1)
	 {
		    $countcpi++;
			$new_id = "select max(id) as idnew From tbl_induction_register where id < 20";
			$new_id_result  = mysql_query($new_id);
			$new_id_result2 = mysql_fetch_row($new_id_result);
			$maxid = $new_id_result2[0];
			$maxid = $maxid + $countcpi;
	 }
	 else
	 {
		    $count ++;
		    $new_id = "select max(id) as idnew From tbl_induction_register";
			$new_id_result  = mysql_query($new_id);
			$new_id_result2 = mysql_fetch_row($new_id_result);
			$maxid = $new_id_result2[0];
			if($maxid < 20)
			{
			  $maxid = 20 + $count;
			}
			else
			{
				$maxid = $maxid + $count;
			}
	 }
	 $ids = array_merge($ids, array($maxid=> $row['id'].",".$maxid.",".$row['empid'] ));
	}
	else
	{
	  $ids = array_merge($ids, array($maxid=> $row['id'].",".$row['id'].",".$row['empid'] ));
	}
}
//Transection start
mysql_query("SET AUTOCOMMIT=0");
mysql_query("START TRANSACTION");

//For Induction Register 
foreach ($exjson['datainduction_register'] as $row)
{  

	if ($row['id'] < 0 )
	{
	  $newID = getID($row['id'],$ids);
      $query2 = "insert into tbl_induction_register (`id`,`empid`,`induction_card_no`,`project_id`,`induction_date`,`pincode`,`created_date`,`modified_date`) VALUES (".$newID.",".$row['empid'].",'".$row['induction_card_no']."',".$row['project_id'].",'".$row['induction_date']."','".$row['pincode']."','".$row['created_date']."',now())";
  
	   $result2 = mysql_query($query2);
	}
	else
	{
		    $sql_1 = "update tbl_induction_register SET modified_date=now() where id='".$row['id']."'";
		    $result_1= mysql_query($sql_1);

	}
}




 // for Employee  
foreach ( $exjson['dataemployee'] as $row ) 
{ 
	if($row['id'] < 0)
	{	
		 $newID = getID($row['id'],$ids);
		 $EmployeerID = getEMPID($row['id'],$ids);
	
		$query3 = "insert into tbl_employee (`id`, `given_name`, `surname`, `contact_phone`, `occupation`, 
 `email_add`, `emrg_contact_name`, `emrg_contact_phone`, `emrg_contact_relation`, 
 `inductioncard`, `pin`, `itp_name` ,`DOB`, `address`, `medical_condition_desc`, `medical_condition`, `created_date`, `job_title`,`gcic_issue_date`,`is_gcic`,modified_date,employer_id)
   VALUES (".$newID .",'".$row['given_name']."','".$row['surname']."','".$row['contact_phone']."','".$row['occupation']."','".$row['email_add']."','".$row['contact_person_name']."','".$row['their_phn_no']."','".$row['relationship']."','".$row['inductioncard']."','".$row['pin']."','".$row['training_provider_name']."','".$row['DOB']."','".$row['address']."','".$row['insert_detail']."','".$row['medical_check_box']."','".$row['created_date']."','".$row['position']."','".$row['date_issued']."','".$row['general_card_induction_num_cb']."',now(),'".$EmployeerID."')";


   $result3 = mysql_query($query3);
	}
	else
	{	
		$EmployeerID = getEMPID($row['id'],$ids);
		 $sql_2 = "update tbl_employee SET 
		 modified_date=now(),
		 given_name= '".$row['given_name']."',
		 surname='".$row['surname']."',
		 contact_phone='".$row['contact_phone']."',
		 occupation='".$row['occupation']."',
		 email_add='".$row['email_add']."',
		 emrg_contact_name='".$row['contact_person_name']."',
		 emrg_contact_phone='".$row['their_phn_no']."',
		 emrg_contact_relation='".$row['relationship']."',
		 inductioncard='".$row['inductioncard']."',
		 pin='".$row['pin']."',
		 itp_name='".$row['training_provider_name']."',
		 DOB='".$row['DOB']."',
		 address='".$row['address']."',
		 medical_condition_desc='".$row['insert_detail']."',
		 medical_condition='".$row['medical_check_box']."',
		 job_title='".$row['position']."',
		 gcic_issue_date='".$row['date_issued']."',
		 modified_date= now(),
		 employer_id='".$EmployeerID."'
		 where id='".$row['id']."'";
		 $result_2= mysql_query($sql_2);
		 	
	}
	
 }

// for Attachment 
foreach ( $exjson['datasite_attachment'] as $row ) 
{ 	
	if($row['induction_id'] < 0)
	{
	 $newID = getID($row['induction_id'],$ids);
	 $query1 = "insert into tbl_site_upload_attachment (`image_id`,`induction_id`,`image_url`) VALUES ('".$row['image_id']."','".$newID."','".$row['image_url']."')";
	
	 $result1 = mysql_query($query1);
	}
	else
	{
		$sql_3 = "update tbl_site_upload_attachment SET 
				  image_id='".$row['image_id']."',
				  image_url='".$row['image_url']."'
				  where induction_id='".$row['induction_id']."'";
		$result_3= mysql_query($sql_3);
		
	}
}


 // for Induction Topic
foreach ( $exjson['datasite_induction_topic'] as $row ) 
{ 
	if($row['id'] < 0)
	{
	   $newID = getID($row['id'],$ids);
	
		$query5 = "insert into tbl_site_induction_topics(`id`,`induction_topic_1`,`induction_topic_2`,`induction_topic_3`,`induction_topic_4`,`induction_topic_5`,`induction_topic_6`,`induction_topic_7`,`induction_topic_8`,`induction_topic_9`,`induction_topic_10`,`induction_topic_11`,`induction_topic_12`,`induction_topic_13`,`induction_topic_14`,`induction_topic_15`,`induction_topic_16`,`induction_topic_17`,`induction_topic_18`,`induction_topic_19`,`induction_topic_20`,`induction_topic_21`,`induction_topic_22`,`induction_topic_23`,`induction_topic_24`,`induction_topic_25`,`induction_topic_26`,`induction_topic_27`,`induction_topic_28`,`induction_topic_29`,`induction_topic_30`,`induction_topic_31`,`induction_topic_32`,`induction_topic_33`,`induction_topic_34`,`induction_topic_edit_text_34`)
		VALUES (". $newID .",'".$row['induction_topic_1']."','".$row['induction_topic_2']."','".$row['induction_topic_3']."','".$row['induction_topic_4']."','".$row['induction_topic_5']."','".$row['induction_topic_6']."','".$row['induction_topic_7']."','".$row['induction_topic_8']."','".$row['induction_topic_9']."','".$row['induction_topic_10']."','".$row['induction_topic_11']."','".$row['induction_topic_12']."','".$row['induction_topic_13']."','".$row['induction_topic_14']."','".$row['induction_topic_15']."','".$row['induction_topic_16']."','".$row['induction_topic_17']."','".$row['induction_topic_18']."','".$row['induction_topic_19']."','".$row['induction_topic_20']."','".$row['induction_topic_21']."','".$row['induction_topic_22']."','".$row['induction_topic_23']."','".$row['induction_topic_24']."','".$row['induction_topic_25']."','".$row['induction_topic_26']."','".$row['induction_topic_27']."','".$row['induction_topic_28']."','".$row['induction_topic_29']."','".$row['induction_topic_30']."','".$row['induction_topic_31']."','".$row['induction_topic_32']."','".$row['induction_topic_33']."','".$row['induction_topic_34']."','".$row['induction_topic_edit_text_34']."')";
		

		 $result5 = mysql_query($query5);
		}
		else
		{
			$sql_4 = "update tbl_site_induction_topics SET 
				  	induction_topic_1='".$row['induction_topic_1']."',
				  	induction_topic_2='".$row['induction_topic_2']."',
				  	induction_topic_3='".$row['induction_topic_3']."',
				  	induction_topic_4='".$row['induction_topic_4']."',
				  	induction_topic_5='".$row['induction_topic_5']."',
				  	induction_topic_6='".$row['induction_topic_6']."',
				  	induction_topic_7='".$row['induction_topic_7']."',
				  	induction_topic_8='".$row['induction_topic_8']."',
				  	induction_topic_9='".$row['induction_topic_9']."',
				  	induction_topic_10='".$row['induction_topic_10']."',
				  	induction_topic_11='".$row['induction_topic_11']."',
				  	induction_topic_12='".$row['induction_topic_12']."',
				  	induction_topic_13='".$row['induction_topic_13']."',
				  	induction_topic_14='".$row['induction_topic_14']."',
				  	induction_topic_15='".$row['induction_topic_15']."',
				  	induction_topic_16='".$row['induction_topic_16']."',
				  	induction_topic_17='".$row['induction_topic_17']."',
				  	induction_topic_18='".$row['induction_topic_18']."',
				  	induction_topic_19='".$row['induction_topic_19']."',
				  	induction_topic_20='".$row['induction_topic_20']."',
				  	induction_topic_21='".$row['induction_topic_21']."',
				  	induction_topic_22='".$row['induction_topic_22']."',
				  	induction_topic_23='".$row['induction_topic_23']."',
				  	induction_topic_24='".$row['induction_topic_24']."',
				  	induction_topic_25='".$row['induction_topic_25']."',
				  	induction_topic_26='".$row['induction_topic_26']."',
				  	induction_topic_27='".$row['induction_topic_27']."',
				  	induction_topic_28='".$row['induction_topic_28']."',
				  	induction_topic_29='".$row['induction_topic_29']."',
				  	induction_topic_30='".$row['induction_topic_30']."',
				  	induction_topic_31='".$row['induction_topic_31']."',
				  	induction_topic_32='".$row['induction_topic_32']."',
				  	induction_topic_33='".$row['induction_topic_33']."',
				  	induction_topic_34='".$row['induction_topic_34']."',
				  	induction_topic_edit_text_34='".$row['induction_topic_edit_text_34']."'
				  where id='".$row['id']."'";
				$result_4= mysql_query($sql_4);
				

		}


  
 }

 // for declaration 
foreach ( $exjson['datadeclaration'] as $row ) 
{ 
	if($row['id'] < 0)
	{
	  $newID = getID($row['id'],$ids);
	  $query4 = "insert into tbl_site_induction_declaration(`id`, `edit_certifiy`, `todays_date`, `your_signature`)  VALUES ('".$newID."','".$row['edit_certifiy']."','".$row['todays_date']."','".$row['your_signature']."')";

	  $result4 = mysql_query($query4);
	}
	else
	{
		$sql_5 = "update tbl_site_induction_declaration SET 
				 edit_certifiy='".$row['edit_certifiy']."',
				 your_signature='".$row['your_signature']."'
				  where id='".$row['id']."'";
		$result_5= mysql_query($sql_5);
		
	}
	
 		
}

//Transaction End 

if($result3 and $result4 and $result5 and $result2) // success 
{
	mysql_query("COMMIT");
	createJson($ids);
	
}
else
{
	 mysql_query("ROLLBACK");
	 echo "{\"response\":\"201\",\"data\":\"".$result3 .",".$query1.",".$result4 .",".$result5 .",".$result2."\"}";
	
}

function getID($oldid,$arrayIds)
{
	 foreach ($arrayIds as $value) 
	 {
			list($old,$new,$empid) = split(',', $value);
			if($old == $oldid)
			{ 
				return $new;
			}
	 }
 }

 function getEMPID($oldid,$arrayIds)
{
	 foreach ($arrayIds as $value) 
	 {
			list($old, $new,$empid) = split(',', $value);
			if($old == $oldid)
			{ 
				return $empid;
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