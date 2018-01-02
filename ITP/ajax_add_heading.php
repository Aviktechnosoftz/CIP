
<?
 error_reporting(0);
 include 'connect.php';
 

// print_r($_POST);


$insert_data= $conn->query("insert into tbl_checklist_data_row set itp_main_id= '".$_POST['itp_id']."',
                          checklist_heading_id='".$_POST['heading_id']."',
                          acceptance_criteria='".mysqli_real_escape_string($conn,$_POST['criteria'])."',
                          acceptance_criteria_input='".mysqli_real_escape_string($conn,$_POST['criteria_input'])."',
                          `key`='".$_POST['key']."',
                          created=now(),
                          updated=now()");


if(insert_data)
{
  echo "Record Added";
}



     
    ?>
 