<?php

require_once('inc/config.php');

$timestamp = $_REQUEST["timpstamp"];
date_default_timezone_set("UTC"); 



if ($db_found) 
{
					if(isset($timestamp))
					{
			
						$condition = "";
						if($timestamp != '')
						{
							$condition =" where updated >= '".$timestamp."'";
						}
							
						 //Data for Access table 
						 $data =  mysql_query("select * from tbl_checklist_image ".$condition) or die(mysql_error()); 
						 $checklistimage = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$checklistimage[] = $r;
						 }

						  $data =  mysql_query("select * from tbl_checklist_heading ".$condition) or die(mysql_error()); 
						 $checklistheading = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$checklistheading[] = $r;
						 }

						  $data =  mysql_query("select * from tbl_checklist_data_row ".$condition) or die(mysql_error()); 
						 $checklistdatarow = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$checklistdatarow[] = $r;
						 }

						  $data =  mysql_query("select * from tbl_checklist_data_filled ".$condition) or die(mysql_error()); 
						 $checklistdatafilled = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$checklistdatafilled[] = $r;
						 }

						  $data =  mysql_query("select * from tbl_assign_checklist ".$condition) or die(mysql_error()); 
						 $assignchecklist = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$assignchecklist[] = $r;
						 }

						 ////////////////////////////////////

						  $data =  mysql_query("select * from tbl_form_data_filled ".$condition) or die(mysql_error()); 
						 $formdatafilled = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$formdatafilled[] = $r;
						 }

						 //Data for employee table 
						 $data =  mysql_query("select * from tbl_form_image ".$condition) or die(mysql_error()); 
						 $formimage = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$formimage[] = $r;
						 }

						 //Data for consultant table 
						 $data =  mysql_query("select * from tbl_from_data_heading ".$condition) or die(mysql_error()); 
						 $fromdataheading = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$fromdataheading[] = $r;
						 }

						 //Data for employer table 
						 $data =  mysql_query("select * from tbl_itp_form_heading_header ".$condition) or die(mysql_error()); 
						 $itpformheadingheader = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$itpformheadingheader[] = $r;
						 }


						 $data =  mysql_query("select * from tbl_itp_main ".$condition) or die(mysql_error()); 
						 $itpmain = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$itpmain[] = $r;
						 }
						 //Data for project_register table 
						 $data =  mysql_query("select * from tbl_ref_doc ".$condition) or die(mysql_error()); 
						 $refdoc = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$refdoc[] = $r;
						 }

						 $data =  mysql_query("select * from tbl_ref_docs ".$condition) or die(mysql_error()); 
						 $refdocs = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$refdocs[] = $r;
						 } 
						 
						 $data =  mysql_query("select * from tbl_from_data_row ".$condition) or die(mysql_error()); 
						 $fromdatarow = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$fromdatarow[] = $r;
						 }

						  $data =  mysql_query("select * from itp_assign ".$condition) or die(mysql_error()); 
						 $itp_assign = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$itp_assign[] = $r;
						 }


						$condition = "";
						if($timestamp != '')
						{
							$condition =" where modified_date >= '".$timestamp."'";
						}
						
						 //Data for Access table 
						 $data =  mysql_query("select * from tbl_access ".$condition) or die(mysql_error()); 
						 $rowsaccess = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rowsaccess[] = $r;
						 }

						 //Data for employee table 
						 $data =  mysql_query("select * from tbl_employee where modified_date >='".$timestamp."'") or die(mysql_error()); 
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
						 $data =  mysql_query("select id,project_id,induction_date,COALESCE(inducted_by,'') as inducted_by,empid,induction_card_no,pincode,created_date,modified_date,is_deleted,is_activated,signature,comments,isapproved from tbl_induction_register ".$condition) or die(mysql_error()); 
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
						  //Data for site_induction_topics table 
						 $data =  mysql_query("select tbl_site_induction_declaration.* from tbl_site_induction_declaration left join tbl_induction_register on tbl_site_induction_declaration.id = tbl_induction_register.id ".$condition) or die(mysql_error()); 
						 $rows_site_declaration = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rows_site_declaration[] = $r;
						 }

						  $data =  mysql_query("select tbl_site_induction_topics.* from tbl_site_induction_topics left join tbl_induction_register on tbl_site_induction_topics.id = tbl_induction_register.id ".$condition) or die(mysql_error()); 
						 $rows_site_induction_topic = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rows_site_induction_topic[] = $r;
						 }

						 //Data for site_attachment table 
						 $data =  mysql_query("select tbl_site_upload_attachment.* from tbl_site_upload_attachment left join tbl_induction_register on tbl_site_upload_attachment.induction_id = tbl_induction_register.id".$condition) or die(mysql_error()); 
						 $rows_site_attachment = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$rows_site_attachment[] = $r;
						 }

						  $data =  mysql_query("select * from tbl_filled_final_signoff where updated >='".$timestamp."'") or die(mysql_error()); 
						 $row_signoff = array();
						 while($r = mysql_fetch_assoc($data))
						 {
								$row_signoff[] = $r;
						 }

					/*

						
						*/
					 
						 echo "{\"response\": \"200\",\"timestemp\": \"".gmdate("Y:m:d  H:i:s")."\",			 \"formdatafilled\":".json_encode($formdatafilled).",
						 \"formimage\":".json_encode($formimage).",
						 \"assignchecklist\":".json_encode($assignchecklist).", 
						 \"checklistdatafilled\":".json_encode($checklistdatafilled).",
						 \"checklistdatarow\":".json_encode($checklistdatarow).",
						 \"checklistheading\":".json_encode($checklistheading).",
						 \"checklistimage\":".json_encode($checklistimage).", 
						 \"fromdataheading\":".json_encode($fromdataheading).",
						 \"fromdatarow\":".json_encode($fromdatarow).",
						 \"itpformheadingheader\":".json_encode( $itpformheadingheader).",
						 \"itpmain\":".json_encode( $itpmain).",
						 \"refdoc\":".json_encode( $refdoc).",
						 \"refdocs\":".json_encode( $refdocs).",
						 \"dataemployee\":".json_encode($rows_employee).",
						 \"dataemployer\":".json_encode($rows_employer).",
						 \"datainduction_register\":".json_encode( $rows_induction_register).",
						 \"dataproject\":".json_encode($rows_project).",
						 \"itp_assign\":".json_encode($itp_assign).",
						 \"itp_signoff\":".json_encode($row_signoff).",
						 \"dataproject_register\":".json_encode( $rows_project_register)."}";
					}
}
else
{
	echo "{\"responce\": \"201\",\"message\": \"some Error 8978987996\"}";
}



?>