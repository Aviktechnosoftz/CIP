<?php

require_once('inc/config.php');

$timestamp = $_REQUEST["timpstamp"];
date_default_timezone_set("UTC"); 


if ($db_found) 
{
					if(isset($timestamp))
					{
						$condition = "";
						$condition2 = "";
						$condition3 = "";
						if($timestamp != '')
						{
							$condition =" where modified_date >= '".$timestamp."'";
							$condition2 =" where updated >= '".$timestamp."'";
							$condition3 =" and tbl_induction_register.modified_date >= '".$timestamp."'";
						}
						

						 //Data for employee table 
						 $data =  mysql_query("select tbl_employee.* from tbl_employee left join tbl_induction_register on tbl_employee.id = tbl_induction_register.id where inducted_by != '' and inducted_by is not null and isapproved = 0  ".$condition3) or die(mysql_error()); 
						 $rows_employee = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rows_employee[] = $r;
						 }

						


						 //Data for employer table 
						 $data =  mysql_query("select * from tbl_employer ".$condition) or die(mysql_error()); 
						 $rows_employer = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rows_employer[] = $r;
						 }
						 //Data for induction register table 
						 $data =  mysql_query("select * from tbl_induction_register where inducted_by != '' and inducted_by is not null and isapproved = 0 ".$condition3) or die(mysql_error()); 
						 $rows_induction_register = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rows_induction_register[] = $r;
						 }
						 //Data for project table 
						 $data =  mysql_query("select * from tbl_project ".$condition) or die(mysql_error()); 
						 $rows_project = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rows_project[] = $r;
						 }

						 //Data for project_register table 
						 $data =  mysql_query("select * from tbl_project_register ".$condition) or die(mysql_error()); 
						 $rows_project_register = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rows_project_register[] = $r;
						 }

						  //Data for project_register table 
						 $data =  mysql_query("select * from tbl_filled_sm_weekly ".$condition2) or die(mysql_error()); 
						 $tbl_filled_sm_weekly = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$tbl_filled_sm_weekly[] = $r;
						 }

						  //Data for project_register table 
						 $data =  mysql_query("select * from tbl_sm_weekly_action ".$condition2) or die(mysql_error()); 
						 $tbl_sm_weekly_action = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$tbl_sm_weekly_action[] = $r;
						 }

						  //Data for project_register table 
						 $data =  mysql_query("select * from tbl_sm_weekly_main ".$condition2) or die(mysql_error()); 
						 $tbl_sm_weekly_main = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$tbl_sm_weekly_main[] = $r;
						 }

                       
					
						 
						 echo "{\"response\": \"200\",\"timestemp\": \"".gmdate("Y:m:d  H:i:s")."\",
						 \"dataaccess\":".json_encode($rowsaccess).",
						 \"dataemployee\":".json_encode($rows_employee).",
						 \"dataemployer\":".json_encode($rows_employer).",
 						 \"datainduction_register\":".json_encode( $rows_induction_register).",
						 \"dataproject\":".json_encode($rows_project).",
						 \"datafilledsmweekly\":".json_encode($tbl_filled_sm_weekly).",
						 \"datasm_weeklyaction\":".json_encode($tbl_sm_weekly_action).",
						 \"datasmweeklymain\":".json_encode($tbl_sm_weekly_main).",
						 \"dataproject_register\":".json_encode($rows_project_register)."}";
					}
}
else
{
	echo "{\"responce\": \"201\",\"message\": \"some Error 8978987996\"}";
}



?>