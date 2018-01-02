 <?
include('inc/config.php');
//$JsonData = '{"visit_induction":[{"id":"-1","trade":"Block laying","visitor_business":"Test by Narendra","induction_no":"1","visit_in":"07:22","visit_out":"","today_date":"2017-11-27","cont_business":"","isuploaded":"0","visit_reason":"test visitor","visitor_mobile":"","created":"2017-11-27 07:22:46","isdeleted":"1","updated":"2017-11-27 07:22:46","project_id":"3","visitor_name":"Narendra,999999999999#,#,#,"},{"id":"198","trade":"(null)","visitor_business":"construction","induction_no":"1","visit_in":"06:51","visit_out":"06:56","today_date":"2017-11-27","cont_business":"","isuploaded":"0","visit_reason":"for surway","visitor_mobile":"","created":"2017-11-27 06:52:45","isdeleted":"1","updated":"2017-11-27 06:52:45","project_id":"3","visitor_name":"shan,op#him,#,#,"}],"site_attendance":[]}';

$JsonData = $_REQUEST['jsondata'];

$flag = true;

$exjson = json_decode($JsonData, true); 
$ids = array();
$count = 0;
$maxid = 0 ;
foreach ($exjson['site_attendance'] as $row) 
{  

	if($row['id'] < 0)
	{				
				$count++;
				$new_id = "select max(id) as new_id from tbl_site_attendace";
				$new_id_result  = mysql_query($new_id);
				$new_id_result2 = mysql_fetch_row($new_id_result);
				$maxid = $new_id_result2[0];
				if($new_id_result == 'NULL')
				{
					$new_id_result = 0 ;
				}
				$maxid = $maxid + $count;
				$ids = array_merge($ids, array($maxid=> $row['id'].",".$maxid));
	}
	else
	{
		$maxid  = $row['id'];
		$ids = array_merge($ids, array($maxid=> $row['id'].",".$row['id']));
	}
}

$ids_vist = array();
$count = 0;
$maxid = 0 ;

foreach ($exjson['visit_induction'] as $row) 
{  

	if($row['id'] < 0)
	{				
				$count++;
				$new_id = "select max(id) as new_id from tbl_visitor_induction";
				$new_id_result  = mysql_query($new_id);
				$new_id_result2 = mysql_fetch_row($new_id_result);
				$maxid = $new_id_result2[0];
				if($new_id_result == 'NULL')
				{
					$new_id_result = 0 ;
				}
				$maxid = $maxid + $count;
				$ids_vist = array_merge($ids_vist, array($maxid=> $row['id'].",".$maxid));
	}
	else
	{
		$maxid  = $row['id'];
		$ids_vist = array_merge($ids_vist, array($maxid=> $row['id'].",".$row['id']));
	}

}



//Transection start
mysql_query("SET AUTOCOMMIT=0");
mysql_query("START TRANSACTION");

//For Induction Register 
$result_site_attendace = '';
foreach ( $exjson['site_attendance'] as $row )
{  

	  $newID = getID($row['id'],$ids);
      $query_site_attendace = "insert into  tbl_site_attendace (id,induction_no,trade,employees_location,no_of_worker,today_date,created,updated,project_id,image_1,image_2,image_3,image_4,image_5,image_1_text,image_2_text,image_3_text,image_4_text,image_5_text) values (".$newID.",'".$row['induction_no']."','".$row['trade']."','".$row['employees_location']."','".$row['no_of_worker']."','".$row['today_date']."','".$row['created']."',now(), '".$row['project_id']."' , '".$row['image_1']."', '".$row['image_2']."', '".$row['image_3']."', '".$row['image_4']."', '".$row['image_5']."', '".$row['image_1_text']."', '".$row['image_2_text']."','".$row['image_3_text']."','".$row['image_4_text']."', '".$row['image_5_text']."') on duplicate key update induction_no = '".$row['induction_no']."', trade = '".$row['trade']."',no_of_worker= '".$row['no_of_worker']."',today_date = '".$row['today_date']."',updated=now() ,employees_location = '".$row['employees_location']."'";




	     
		 $Query = "SELECT tbl_site_attendace.id, employer_id, tbl_site_attendace.project_id, tbl_site_attendace.today_date, IF( whom =0,   tbl_site_attendace.induction_no, tbl_site_attendace.whom ) AS induction_number, whom  FROM  `tbl_site_attendace` LEFT JOIN  `tbl_employee` ON  tbl_site_attendace.induction_no = tbl_employee.id where  tbl_site_attendace.project_id = '".$row['project_id']."' and today_date = '".$row['today_date']."' and tbl_employee.id in (select id from tbl_employee where employer_id = (select employer_id from tbl_employee where id = '".$row['induction_no']."'))  ORDER BY today_date DESC";

		 $result  = mysql_query($Query);
		 $num_rows = mysql_num_rows($result);
	   
				if($num_rows > 0 )
				{
					 $flag = false;
					 echo "{\"response\":\"204\",\"data\":\"Attendance already filed for ".$row['today_date']." \"}";
				}
				else
				{
					$result_site_attendace = mysql_query($query_site_attendace);
				}
	   
	   
}

$result_visit_induction = '';
$to='';
$subject='';
$msg='';
$Sub='';


$subject2='';
$msg2='';
$Sub2='';


$mail_visit=false;
$mail_visit_out=false;
// $result_email_log2='';
// $result_msg2='';
// $visitor_name='';


foreach ( $exjson['visit_induction'] as $row )
{  

	  $newID = getID($row['id'],$ids_vist);
      $query_visit_induction = "insert into tbl_visitor_induction (id,induction_no,position,today_date,visitor_business,visitor_name,visitor_mobile,visit_reason,visit_in,visit_out,created,updated,project_id,cont_business) values (".$newID .",".$row['induction_no'].",'".$row['position']."','".$row['today_date']."','".$row['visitor_business']."','".$row['visitor_name']."','".$row['visitor_mobile']."','".$row['visit_reason']."','".$row['visit_in']."','".$row['visit_out']."','".$row['created']."',now() , '".$row['project_id']."', '".$row['cont_business']."') on duplicate key update visit_out = '".$row['visit_out']."' ,updated=now()";
	  $result_visit_induction = mysql_query($query_visit_induction);

	  if($row['visit_out'] == "" AND $row['id'] < 0)
	  {
	  	$mail_visit=true;
	  $date= date('y/m/d');
      $new_date= str_replace('/','',$date);

      $visitor_name = explode(',',$row['visitor_name']);
	  $get_message=  "SELECT * from tbl_setting where project_id='".$row['project_id']."'";
	  $get_login_email= "SELECT email_add from tbl_employee where id='".$row['induction_no']."'";
	  $get_project_name=mysql_query("Select project_name from tbl_project where id='".$row['project_id']."'");

	  $get_company=mysql_query("select tbl_employer.company_name,tbl_induction_register.empid,tbl_induction_register.id from tbl_induction_register inner join tbl_employer ON tbl_employer.id=tbl_induction_register.empid where tbl_induction_register.id='".$row['induction_no']."'");

	  $result_company=mysql_fetch_assoc($get_company);


	  $resul_project=mysql_fetch_row($get_project_name);

	  $result_msg  = mysql_query($get_message);
	  $result_email_log  = mysql_query($get_login_email);

	  $result_msg2 = mysql_fetch_row($result_msg);
	  $result_email_log2  = mysql_fetch_row($result_email_log);
	  
	
	  $Sub = $resul_project[0]."-".$new_date."-Visitor On Site-".$visitor_name[0];

	  	$to="shashank.r@aviktechnosoft.com".",".$result_email_log2[0].",".$result_msg2[1];

	  	$new_form= $newID;

	  	// echo $result_email_log2['email_add'];
	  
        }



        else
	  {
	  	$mail_visit_out=true;
	  $date= date('y/m/d');
      $new_date= str_replace('/','',$date);

      $visitor_name = explode(',',$row['visitor_name']);
	  $get_message=  "SELECT * from tbl_setting where project_id='".$row['project_id']."'";
	  $get_login_email= "SELECT email_add,CONCAT_WS(' ',given_name,surname) as name from tbl_employee where id='".$row['induction_no']."'";
	  $get_project_name=mysql_query("Select project_name from tbl_project where id='".$row['project_id']."'");

	  $get_company=mysql_query("select tbl_employer.company_name,tbl_induction_register.empid,tbl_induction_register.id from tbl_induction_register inner join tbl_employer ON tbl_employer.id=tbl_induction_register.empid where tbl_induction_register.id='".$row['induction_no']."'");

	  $result_company=mysql_fetch_assoc($get_company);


	  $resul_project=mysql_fetch_row($get_project_name);

	  $result_msg  = mysql_query($get_message);
	  $result_email_log  = mysql_query($get_login_email);

	  $result_msg2 = mysql_fetch_row($result_msg);
	  $result_email_log2  = mysql_fetch_row($result_email_log);
	  
	
	  $Sub2 = $resul_project[0]."-".$new_date."-Visitor Has Signed-Out-".$visitor_name[0];

	  	$to2="shashank.r@aviktechnosoft.com".",".$result_email_log2[0].",".$result_msg2[1];

	  	$new_form= $newID;

	  	// echo $result_email_log2['email_add'];
	  
        }
       

}



//Transaction End 

if( $flag)
{
	if($result_site_attendace || $result_visit_induction ) // success 
	{
		mysql_query("COMMIT");
		createJson($ids);

		echo "{\"response\":\"200\",\"data_attendance\": [".createJson($ids)."],\"data_visit\":[".createJson($ids_vist)."]}";

		if($mail_visit)
		{
			
        $msg = "<html> 
        <body>
        Hello HSR / SM, <br/><br/>

        You Have a Visitor Onsite and his name is ".$visitor_name[0]." and he works for  ".$result_company['company_name'].".The inducted person showing the visitor around is ".$result_email_log2[1]." <br/>

        ".$result_msg2[4]." <br/><br/>

     


       
       <a href ='https://cipropertyapp.com/visitor_induction_form_sign_out.php?visitor_form=".$new_form."'><input type=\"button\" value=\"Review\"> </a><br/><br/>




      Thanks <br/>
      Team CIP <br/>
      Send from Mobile app <br/>   </body> 
      </html>";
        $subject= $Sub;
        $url = 'http://192.169.226.71/volts_dev/send_mail.php';
        $data = array('to' => $to, 'msg' => $msg, 'subject' => $subject, 'cc' => '');
        $options = array('http' => array(
          'method'  => 'POST',
          'content' => http_build_query($data)
              ));

              $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            // print_r($to);
		}



		if($mail_visit_out)
		{
			
        $msg2 = "<html> 
        <body>
        Hello HSR / SM, <br/><br/>

         A Visitor Has Signed-Out and his name is ".$visitor_name[0]." and he works for ".$result_company['company_name']." <br/>

        ".$result_msg2[4]." <br/><br/>

     


       
       <a href ='https://cipropertyapp.com/visitor_induction_form.php?visitor_form=".$new_form."'><input type=\"button\" value=\"Review\"> </a><br/><br/>




      Thanks <br/>
      Team CIP <br/>
      Send from Mobile app <br/>   </body> 
      </html>";
        $subject2= $Sub2;
        $url = 'http://192.169.226.71/volts_dev/send_mail.php';
        $data = array('to' => $to2, 'msg' => $msg2, 'subject' => $subject2, 'cc' => '');
        $options = array('http' => array(
          'method'  => 'POST',
          'content' => http_build_query($data)
              ));

              $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            // print_r($to);
		}


		
	}




	else
	{
		 mysql_query("ROLLBACK");
		 echo "{\"response\":\"201\",\"data\":\"".$result3 .",".$query1.",".$result4 .",".$result5 .",".$result2."\"}";
		
	}
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
	 return $message;
	 //echo "{\"response\":\"200\",\"data\": [".$message ."]}";
 }

 ?>