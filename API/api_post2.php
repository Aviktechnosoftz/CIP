 <?
include('inc/config.php');
// $JsonData = $_REQUEST['jsondata'];

$JsonData = '{
	"datasite_ids":[{"induction_id":"-1"}],

	"datainduction_register":[{"id":"-1","":"","is_deleted":"0","inducted_by":"","empid":"3","induction_card_no":"12345","isuploaded":"0","project_id":"1","induction_date":"08-02-2017","pincode":"2345","created_date":"2017-02-08 08:43:17","is_activated":"1"}],

	"datasite_attachment":[{"image_id":"0","isdownloaded":"1","image_url":"1486543360.png","isuploaded":"0","induction_id":"-1"},{"image_id":"1","isdownloaded":"1","image_url":"1486543368.png","isuploaded":"0","induction_id":"-1"}],

	"dataemployee":[{"":"","pin":"2345","position":"Project Manager","created_date":"2017-02-08 08:43:17","is_activated":"1","is_deleted":"0","email_add":"n@gmail.com","general_card_induction_num_cb":"1","contact_person_name":"Abhilekh","isuploaded":"0","surname":"Kushwaha","id":"-1","address":"Noida","inductioncard":"12345","occupation":"occupation","date_issued":"08-02-2014","their_phn_no":"444444444","relationship":"find","insert_detail":"Fit","training_provider_name":"tttttpppppp","contact_phone":"55565555555","given_name":"narendra","DOB":"08-02-1991","medical_check_box":"1"}],

	"datadeclaration":[{"edit_certifiy":"narendra Kushwaha","id":"-1","todays_date":"08-02-2017","your_signature":"nnnkkkk","isuploaded":"0"}],

	"datasite_induction_topic":[{"induction_topic_28":"1","induction_topic_13":"1","id":"-1","induction_topic_5":"1","induction_topic_23":"1","induction_topic_19":"1","induction_topic_33":"1","induction_topic_6":"1","induction_topic_29":"1","induction_topic_14":"1","induction_topic_24":"1","induction_topic_7":"1","induction_topic_34":"1","induction_topic_8":"1","induction_topic_15":"1","induction_topic_25":"1","induction_topic_10":"1","induction_topic_9":"1","induction_topic_edit_text_34":"additional","isuploaded":"0","induction_topic_20":"1","induction_topic_16":"1","induction_topic_30":"1","induction_topic_26":"1","induction_topic_11":"1","induction_topic_1":"0","induction_topic_21":"1","induction_topic_17":"1","induction_topic_31":"1","induction_topic_2":"0","induction_topic_27":"1","induction_topic_12":"1","induction_topic_3":"1","induction_topic_22":"1","induction_topic_18":"1","induction_topic_32":"1","induction_topic_4":"1"}]
}';

$exjson = json_decode($JsonData, true); 
$ids = array();
$count = 0;
$countcpi = 0;

foreach ( $exjson['datainduction_register'] as $row ) 
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
	 $ids = array_merge($ids, array($maxid=> $row['id'].",".$maxid));
}
//Transection start
mysql_query("SET AUTOCOMMIT=0");
mysql_query("START TRANSACTION");

//For Induction Register 
foreach ( $exjson['datainduction_register'] as $row )
{  
	  $newID = getID($row['id'],$ids);
      $query2 = "insert into tbl_induction_register (`id`,`empid`,`induction_card_no`,`project_id`,`induction_date`,`pincode`,`created_date`,modified_date) VALUES ('".$newID."','".$row['empid']."','".$row['induction_card_no']."','".$row['project_id']."','".$row['induction_date']."','".$row['pincode']."','".$row['created_date']."',now())";
  
	   $result2 = mysql_query($query2);
}




 // for Employee  
foreach ( $exjson['dataemployee'] as $row ) 
{ 
		 $newID = getID($row['id'],$ids);
	
		$query3 = "insert into tbl_employee (`id`, `given_name`, `surname`, `contact_phone`, `occupation`, 
 `email_add`, `emrg_contact_name`, `emrg_contact_phone`, `emrg_contact_relation`, 
 `inductioncard`, `pin`, `itp_name` ,`DOB`, `address`, `medical_condition_desc`, `medical_condition`, `created_date`, `job_title`,`gcic_issue_date`,`is_gcic`,modified_date)
   VALUES (".$newID .",'".$row['given_name']."','".$row['surname']."','".$row['contact_phone']."','".$row['occupation']."','".$row['email_add']."','".$row['contact_person_name']."','".$row['their_phn_no']."','".$row['relationship']."','".$row['inductioncard']."','".$row['pin']."','".$row['training_provider_name']."','".$row['DOB']."','".$row['address']."','".$row['insert_detail']."','".$row['medical_check_box']."','".$row['created_date']."','".$row['position']."','".$row['date_issued']."','".$row['general_card_induction_num_cb']."',now())";


   $result3 = mysql_query($query3);

	
 }


// for Attachment 
foreach ( $exjson['datasite_attachment'] as $row ) 
{ 
	 $newID = getID($row['induction_id'],$ids);
	 $query1 = "insert into tbl_site_upload_attachment (`image_id`,`induction_id`,`image_url`) VALUES ('".$row['image_id']."','".$newID."','".$row['image_url']."')";
	
	 $result1 = mysql_query($query1);
}


 // for Attachment 
foreach ( $exjson['datasite_induction_topic'] as $row ) 
{ 
	   $newID = getID($row['id'],$ids);
	
		$query5 = "insert into tbl_site_induction_topics(`id`,`induction_topic_1`,`induction_topic_2`,`induction_topic_3`,`induction_topic_4`,`induction_topic_5`,`induction_topic_6`,`induction_topic_7`,`induction_topic_8`,`induction_topic_9`,`induction_topic_10`,`induction_topic_11`,`induction_topic_12`,`induction_topic_13`,`induction_topic_14`,`induction_topic_15`,`induction_topic_16`,`induction_topic_17`,`induction_topic_18`,`induction_topic_19`,`induction_topic_20`,`induction_topic_21`,`induction_topic_22`,`induction_topic_23`,`induction_topic_24`,`induction_topic_25`,`induction_topic_26`,`induction_topic_27`,`induction_topic_28`,`induction_topic_29`,`induction_topic_30`,`induction_topic_31`,`induction_topic_32`,`induction_topic_33`,`induction_topic_34`,`induction_topic_edit_text_34`)
		VALUES (". $newID .",'".$row['induction_topic_1']."','".$row['induction_topic_2']."','".$row['induction_topic_3']."','".$row['induction_topic_4']."','".$row['induction_topic_5']."','".$row['induction_topic_6']."','".$row['induction_topic_7']."','".$row['induction_topic_8']."','".$row['induction_topic_9']."','".$row['induction_topic_10']."','".$row['induction_topic_11']."','".$row['induction_topic_12']."','".$row['induction_topic_13']."','".$row['induction_topic_14']."','".$row['induction_topic_15']."','".$row['induction_topic_16']."','".$row['induction_topic_17']."','".$row['induction_topic_18']."','".$row['induction_topic_19']."','".$row['induction_topic_20']."','".$row['induction_topic_21']."','".$row['induction_topic_22']."','".$row['induction_topic_23']."','".$row['induction_topic_24']."','".$row['induction_topic_25']."','".$row['induction_topic_26']."','".$row['induction_topic_27']."','".$row['induction_topic_28']."','".$row['induction_topic_29']."','".$row['induction_topic_30']."','".$row['induction_topic_31']."','".$row['induction_topic_32']."','".$row['induction_topic_33']."','".$row['induction_topic_34']."','".$row['induction_topic_edit_text_34']."')";
		

		 $result5 = mysql_query($query5);

  
 }

 // for declaration 
foreach ( $exjson['datadeclaration'] as $row ) 
{ 
	  $newID = getID($row['id'],$ids);
	  $query4 = "insert into tbl_site_induction_declaration(`id`, `edit_certifiy`, `todays_date`, `your_signature`)  VALUES ('".$newID."','".$row['edit_certifiy']."','".$row['todays_date']."','".$row['your_signature']."')";

	  $result4 = mysql_query($query4);
}

//Transaction End 

if($result3 and $result1 and $result4 and $result5 and $result2) // success 
{
	mysql_query("COMMIT");
	createJson($ids);
	
}
else
{
	 mysql_query("ROLLBACK");
	 echo "{\"response\":\"201\",\"data\":\"Some Error\"}";
}

function getID($oldid,$arrayIds)
{
	 foreach ($arrayIds as $value) 
	 {
			list($old, $new) = split(',', $value);
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