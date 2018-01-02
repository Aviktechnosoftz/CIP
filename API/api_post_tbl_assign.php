
<?
include('inc/config.php');
$JsonData = $_REQUEST['jsondata'];


$exjson = json_decode($JsonData, true); 

$assign_udid=array();
foreach ($exjson['itp_assign'] as $row) 
{ 

$sql_3 = "insert into  itp_assign
 (`main_id`,`assign_uuid`,`is_deleted`,`itp_name`,`start_date`,`created`,`updated`,`key_controls`,`emp_id`,`special_information`,`completed_by`,`is_uploaded`) 

 VALUES ('".$row['main_id']."','".$row['assign_uuid']."','".$row['is_deleted']."','".$row['itp_name']."','".$row['start_date']."','".$row['created']."','".$row['updated']."','".$row['key_controls']."','".$row['emp_id']."','".$row['special_information']."','".$row['completed_by']."','".$row['is_uploaded']."') ON DUPLICATE KEY UPDATE 


 main_id='".$row['main_id']."',
  assign_uuid='".$row['assign_uuid']."',
   is_deleted='".$row['is_deleted']."',
    itp_name='".$row['itp_name']."',
     start_date='".$row['start_date']."',
      created='".$row['created']."',
       updated='".$row['updated']."',
        key_controls='".$row['key_controls']."',
          emp_id='".$row['  emp_id']."',
        special_information='".$row['special_information']."',
          completed_by='".$row['completed_by']."',
 is_uploaded='".$row['is_uploaded']."'"


  ;
    

$result2 = mysql_query($sql_3);


array_push($assign_udid, $row['assign_uuid']);



    }



    

    if($sql_3)
    {
      echo "{\"response\":\"200\",\"data\":\"Data Entered Successfully \",\"data_assign_udid\": ".json_encode($assign_udid)."}";
    }

    else
    {
      echo "{\"response\":\"201\",\"data\":\"Data Cannot be Entered \"}";
    }

