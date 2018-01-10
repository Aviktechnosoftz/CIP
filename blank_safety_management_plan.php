<? 

session_start();
error_reporting(1);
include_once('connect.php');

$get_data= $conn->query("Select * from tbl_project_detail where project_id='".$_SESSION['admin']."'")->fetch_object();
$get_state= $conn->query("Select * from tbl_state where id='".$get_data->state_id."'");



require_once 'PHPWord.php';

// Create a new PHPWord Object
$PHPWord = new PHPWord();
$document = $PHPWord->loadTemplate('environment_plan.docx');

$document->setValue('project_name', $get_data->project_name);
$document->setValue('project_scope', $get_data->project_scope);
$document->setValue('total_months', $get_data->total_months);
$document->setValue('da_working', $get_data->da_working);
$document->setValue('principal_contractor', $get_data->principal_contractor);
$document->setValue('project_manager', $get_data->project_manager);

$document->setValue('site_manager', $get_data->site_manager);
$document->setValue('site_engineer', $get_data->site_engineer);

$document->setValue('health_representative', $get_data->safety_representative);
$document->setValue('management_issue_date', $get_data->mgmt_plan_issue_date);
$document->setValue('client_name', $get_data->client);
$document->setValue('state_name', $get_state->state_name);




$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$document->save('Environmnet_plan_view.docx'); 



// $temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');
// $document->save($temp_file);

// Your browser will name the file "myFile.docx"
// regardless of what it's named on the server 
// header("Content-Disposition: attachment; filename='Environmental Management Plan.docx'");
// readfile($temp_file); // or echo file_get_contents($temp_file);
// unlink($temp_file);  // remove temp file
include('siderbar_home.php');
?>

<div class="col-xs-8 col-md-8 col-lg-9 col-sm-7" style="background-color: #F2F2F6">
  

<iframe src="https://docs.google.com/gview?url=http://localhost/site_admin/Environmnet_plan_view.docx&amp;embedded=true" style="    height: 81vh;
    width: 75%;" frameborder="0"></iframe>

</div>