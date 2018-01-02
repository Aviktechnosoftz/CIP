<? 

session_start();
error_reporting(1);
include_once('connect.php');

$get_data= $conn->query("Select * from tbl_project_detail where project_id='".$_SESSION['admin']."'")->fetch_object();
$get_state= $conn->query("Select * from tbl_state where id='".$get_data->state_id."'")->fetch_object();



require_once 'PHPWord.php';

// Create a new PHPWord Object
$PHPWord = new PHPWord();
$document = $PHPWord->loadTemplate('new_temp.docx');

$document->setValue('project_name', $get_data->project_name);
$document->setValue('project_scope', $get_data->project_scope);
$document->setValue('brief_scope', $get_data->brief_scope);
$document->setValue('total_months', $get_data->total_months);
$document->setValue('da_working', $get_data->da_working);
$document->setValue('principal_contractor', $get_data->principal_contractor);
$document->setValue('project_manager', $get_data->project_manager);
$document->setValue('project_manager_ph', $get_data->project_manager_ph);

$document->setValue('site_manager', $get_data->site_manager);
$document->setValue('site_manager_ph', $get_data->site_manager_ph);

$document->setValue('site_engineer', $get_data->site_engineer);

$document->setValue('safety_representative', $get_data->safety_representative);
$document->setValue('safety_representative_ph', $get_data->safety_representative_ph);
	
$document->setValue('management_issue_date', $get_data->mgmt_plan_issue_date);
$document->setValue('client', $get_data->client);
$document->setValue('state_name', $get_state->state_name);

$document->setValue('construction_manager', $get_data->construction_manager);
$document->setValue('construction_manager_ph', $get_data->construction_manager_ph);

$document->setValue('project_engineer', $get_data->project_engineer);
$document->setValue('foreman', $get_data->foreman);
$document->setValue('project_address', $get_data->project_address);
$document->setValue('commencement_date', $get_data->commencement_date);
$document->setValue('commencement_address', $get_data->commencement_address);
$document->setValue('mgmt_plan_prepared', $get_data->mgmt_plan_prepared);
$document->setValue('safety_manager', $get_data->safety_manager);
$document->setValue('safety_manager_ph', $get_data->safety_manager_ph);
$document->setValue('local_hospital', $get_data->local_hospital);
$document->setValue('water_supply', $get_data->water_supply);
$document->setValue('gas_supply', $get_data->gas_supply);
$document->setValue('electricity_supply', $get_data->electricity_supply);
$document->setValue('local_council', $get_data->local_council);
$document->setValue('whs_regulator', $get_data->whs_regulator);





$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$document->save('Site_Safety_Management_Plan1.docx'); 



// $temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');
// $document->save($temp_file);

// Your browser will name the file "myFile.docx"
// regardless of what it's named on the server 
// header("Content-Disposition: attachment; filename='Environmental Management Plan.docx'");
// readfile($temp_file); // or echo file_get_contents($temp_file);
// unlink($temp_file);  // remove temp file
?>