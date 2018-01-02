
<?
include('inc/config.php');
$JsonData = $_REQUEST['jsondata'];


$exjson = json_decode($JsonData, true); 

$assign_udid=array();
foreach ($exjson['itp_signoff'] as $row) 
{ 

$sql_3 = "insert into  tbl_filled_final_signoff
 (`name`,`general_comments`,`induction_no`,`pin`,`date`,`created`,`updated`,`is_uploaded`,`assign_uuid`,`row_id`) 

 VALUES ('".$row['name']."','".$row['general_comments']."','".$row['induction_no']."','".$row['pin']."','".$row['date']."','".$row['created']."','".$row['updated']."','".$row['is_uploaded']."','".$row['assign_uuid']."','".$row['row_id']."') ON DUPLICATE KEY UPDATE 


 name='".$row['name']."',
  general_comments='".$row['general_comments']."',
   induction_no='".$row['induction_no']."',
    pin='".$row['pin']."',
     date='".$row['date']."',
      created='".$row['created']."',
       updated='".$row['updated']."',
        is_uploaded='".$row['is_uploaded']."',
          assign_uuid='".$row['assign_uuid']."',
        row_id='".$row['row_id']."'"


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

