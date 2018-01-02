
<?
 error_reporting(0);
 include 'connect.php';
 

print_r($_POST);

$update_sub_heading= $conn->query("update tbl_checklist_data_row SET acceptance_criteria='".$_POST['accept_criteria3']."',acceptance_criteria_input='".$_POST['accept_criteria2']."',`key`='".$_POST['key']."',updated=NOW() where id='".$_POST['hidden_row_id']."'");

if($update_sub_heading)
{
	echo "Record Updated";
}






     
    ?>
 