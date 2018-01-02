
<?
 error_reporting(0);
 include 'connect.php';
 

print_r($_POST);

$get_details_sub= $conn->query("select * from tbl_checklist_data_row where id='".$_POST['id']."'")->fetch_array();

echo implode("$$",$get_details_sub);






     
    ?>
 