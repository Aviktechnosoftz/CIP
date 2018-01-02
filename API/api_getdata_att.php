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
							$condition4="and tbl_employee.modified_date >= '".$timestamp."'";
						}
						

						 //Data for employee table 
						 $data =  mysql_query("select tbl_employee.* from tbl_employee left join tbl_induction_register on tbl_employee.id = tbl_induction_register.id where inducted_by != '' and inducted_by is not null and isapproved = 0  ".$condition4) or die(mysql_error()); 
						 $rows_employee = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rows_employee[] = $r;
						 }

						//Data for consultant table 
						 $data =  mysql_query("select * from tbl_consultant ".$condition) or die(mysql_error()); 
						 $rows_consultant = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rows_consultant[] = $r;
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

						 $data =  mysql_query("select * from tbl_site_attendace ".$condition2) or die(mysql_error()); 
						 $tbl_site_attendace = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$tbl_site_attendace[] = $r;
						 }

						 $data =  mysql_query("select *  from tbl_visitor_induction ".$condition2) or die(mysql_error()); 
						 $tbl_visitor_induction = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$tbl_visitor_induction[] = $r;
						 }

                                                 $data =  mysql_query("SELECT max(id) as max_id_instruction FROM `tbl_instruction` WHERE 1") or die(mysql_error()); 
						 $rows_site_instruction = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rows_site_instruction[] = $r;
						 }
					
						 
						 echo "{\"response\": \"200\",\"timestemp\": \"".gmdate("Y:m:d  H:i:s")."\",			 \"dataaccess\":".json_encode($rowsaccess).",
						 \"dataemployee\":".json_encode($rows_employee).",
						 \"dataemployer\":".json_encode($rows_employer).",
 						 \"dataconsultant\":".json_encode($rows_consultant).",
						 \"datainduction_register\":".json_encode( $rows_induction_register).",
						 \"dataproject\":".json_encode($rows_project).",
						 \"siteattendace\":".json_encode($tbl_site_attendace).",
						 \"visitorinduction\":".json_encode($tbl_visitor_induction).",
	                                         \"datasite_instruction\":".json_encode($rows_site_instruction).",
					
						 \"dataproject_register\":".json_encode($rows_project_register)."}";
					}
}
else
{
	echo "{\"responce\": \"201\",\"message\": \"some Error 8978987996\"}";
}



?>