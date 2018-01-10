<?PHP
require_once('inc/config.php');
$StartTime = $_POST["StartTime"];
$EndTime = $_POST["EndTime"];
$Device = $_POST["Device"];
$Username = $_POST["username"];

if ($db_found) 
	{
		 if ($Device != "All")
		 {
				$data = mysql_query("select exceptiontable.*,table_fullname.Meaning  as Exceptiontype from exceptiontable,table_fullname where exceptiontable.Type = table_fullname.AbbName  and exceptiontable.Datetime >= '".$StartTime."' and exceptiontable.Datetime <= '".$EndTime."' and exceptiontable.DeviceId = '".$Device."' order by exceptiontable.Datetime desc" )
				or die(mysql_error()); 
		 }
		 else
		 {
				 $data = mysql_query("select exceptiontable.*,table_fullname.Meaning as Exceptiontype from exceptiontable,table_fullname where exceptiontable.Type = table_fullname.AbbName  and exceptiontable.Datetime >= '".$StartTime."' and exceptiontable.Datetime <= '".$EndTime."' and exceptiontable.DeviceId  in (Select DeviceIMEI from devicedetails where UserName = '".$Username."' group by DeviceIMEI) order by exceptiontable.Datetime desc")
				 or die(mysql_error()); 
		 }

		  $rows = array();
		  while($r = mysql_fetch_assoc($data))
		  {
				$rows[] = $r;
		  }
		  echo json_encode($rows);
	}
?>

