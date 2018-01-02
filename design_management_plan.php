<? 

session_start();
error_reporting(1);
include_once('connect.php');

$get_data= $conn->query("Select * from tbl_project_detail where project_id='".$_SESSION['admin']."'")->fetch_object();

require_once 'PHPWord.php';

// Create a new PHPWord Object
$PHPWord = new PHPWord();
$document = $PHPWord->loadTemplate('Design_Management_Plan1.docx');

$document->setValue('project_name', $get_data->project_name);

$document->setValue('cip_director1', $get_data->cip_director1);
$document->setValue('cip_director2', $get_data->cip_director2);
$document->setValue('cip_director3', $get_data->cip_director3);
$document->setValue('cip_director4', $get_data->cip_director4);
$document->setValue('construction_manager', $get_data->construction_manager);
$document->setValue('project_manager', $get_data->project_manager);
$document->setValue('contract_admin', $get_data->contract_admin);
$document->setValue('site_manager', $get_data->site_manager);
$document->setValue('site_engineer', $get_data->site_engineer);







$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$document->save('Design_Management_Plan2.docx'); 

// print_r($document);

// $temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');
// $document->save($temp_file);

// Your browser will name the file "myFile.docx"
// regardless of what it's named on the server 
// header("Content-Disposition: attachment; filename='Environmental Management Plan.docx'");
// readfile($temp_file); // or echo file_get_contents($temp_file);
// unlink($temp_file);  // remove temp file
?>