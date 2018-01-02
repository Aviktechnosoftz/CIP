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
						 $data =  mysql_query("select * from tbl_etr_filled ".$condition2) or die(mysql_error()); 
						 $tbl_etr_filled = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$tbl_etr_filled[] = $r;
						 }

						  //Data for project_register table 
						 $data =  mysql_query("select * from tbl_etr_task_obs ".$condition2) or die(mysql_error()); 
						 $tbl_etr_task_obs = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$tbl_etr_task_obs[] = $r;
						 }


						  //Data for project_register table 
						 $data =  mysql_query("select * from tbl_ncic_filled ".$condition2) or die(mysql_error()); 
						 $tbl_ncic_filled = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$tbl_ncic_filled[] = $r;
						 }

						  //Data for project_register table 
						 $data =  mysql_query("select * from tbl_ncic_task_obs ".$condition2) or die(mysql_error()); 
						 $tbl_ncic_task_obs = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$tbl_ncic_task_obs[] = $r;
						 }



						  //Data for project_register table 
						 $data =  mysql_query("select * from tbl_acc_filled ".$condition2) or die(mysql_error()); 
						 $tbl_acc_filled = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$tbl_acc_filled[] = $r;
						 }

						  //Data for project_register table 
						 $data =  mysql_query("select * from tbl_acc_task_obs ".$condition2) or die(mysql_error()); 
						 $tbl_acc_task_obs = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$tbl_acc_task_obs[] = $r;
						 }


						 //Data for project_register table 
						 $data =  mysql_query("select * from tbl_fpr_filled ".$condition2) or die(mysql_error()); 
						 $tbl_fpr_filled = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$tbl_fpr_filled[] = $r;
						 }

						  //Data for project_register table 
						 $data =  mysql_query("select * from tbl_fpr_task_obs ".$condition2) or die(mysql_error()); 
						 $tbl_fpr_task_obs = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$tbl_fpr_task_obs[] = $r;
						 }


						  $data =  mysql_query("select * from tbl_ssi_filled ".$condition2) or die(mysql_error()); 
						 $tbl_ssi_filled = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$tbl_ssi_filled[] = $r;
						 }


						 $data =  mysql_query("select * from tbl_ssi_task_obs ".$condition2) or die(mysql_error()); 
						 $tbl_ssi_task_obs = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$tbl_ssi_task_obs[] = $r;
						 }


						 $data =  mysql_query("select * from tbl_gps_filled ".$condition2) or die(mysql_error()); 
						 $tbl_gps_filled = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$tbl_gps_filled[] = $r;
						 }


						 $data =  mysql_query("select * from tbl_gps_task_obs ".$condition2) or die(mysql_error()); 
						 $tbl_gps_task_obs = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$tbl_gps_task_obs[] = $r;
						 }

						  $data =  mysql_query("select * from tbl_fpr_image  ".$condition2) or die(mysql_error()); 
						 $fpr_image = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$fpr_image[] = $r;
						 }



                       
					
						 
						 echo "{\"response\": \"200\",\"timestemp\": \"".gmdate("Y:m:d  H:i:s")."\",
						 \"dataaccess\":".json_encode($rowsaccess).",
						 \"dataemployee\":".json_encode($rows_employee).",
						 \"dataemployer\":".json_encode($rows_employer).",
 						 \"datainduction_register\":".json_encode( $rows_induction_register).",
						 \"dataproject\":".json_encode($rows_project).",
						 \"datafilledetr\":".json_encode($tbl_etr_filled).",
						 \"datatasketr\":".json_encode($tbl_etr_task_obs).",
						 \"datafilledncic\":".json_encode($tbl_ncic_filled).",
						\"datataskncic\":".json_encode($tbl_ncic_task_obs).",
						 \"datafilledacc\":".json_encode($tbl_acc_filled).",
						 \"datataskacc\":".json_encode($tbl_acc_task_obs).",
						 \"datataskfpr\":".json_encode($tbl_fpr_task_obs).",
						  \"datataskfilledobs\":".json_encode($tbl_fpr_filled).",
						  \"datataskfilledssi\":".json_encode($tbl_ssi_filled).",
						  \"datataskssi\":".json_encode($tbl_ssi_task_obs).",
 							\"datafprimage\":".json_encode($fpr_image).",
 							\"datataskfilledgps\":".json_encode($tbl_gps_filled).",
 							\"datataskgps\":".json_encode($tbl_gps_task_obs).",
						 \"dataproject_register\":".json_encode($rows_project_register)."}";
					}
}
else
{
	echo "{\"responce\": \"201\",\"message\": \"some Error 8978987996\"}";
}



?>