<? 
session_start();
error_reporting(0);
include_once('connect.php');
// print_r($_POST);
$get_query=$conn->query("select email_add,phone_no from tbl_employer where id='".$_POST['emp']."' AND project_id='".$_SESSION['admin']."'");
$arr=array();
$arr2=array();

 while($row= $get_query->fetch_object())
 {
 		?>
 			<script>
 				$('#phone').val('<? echo $row->phone_no ?>');
    			$('#email').val('<? echo $row->email_add ?>');

    </script>
 		<?
 }

// echo json_encode($arr);

$get_employee= $conn->query("select tbl_employee.id,tbl_employee.email_add,given_name,surname from tbl_employee INNER JOIN tbl_induction_register ON tbl_employee.id=tbl_induction_register.id where (tbl_induction_register.inducted_by IS NOT NULL AND tbl_induction_register.inducted_by != '') AND tbl_employee.employer_id='".$_POST['emp']."'AND tbl_employee.id!=".$_SESSION['induction']." AND tbl_induction_register.project_id=".$_SESSION['admin']." ");

	 while($row2= $get_employee->fetch_object())
 {?>
<script>

        
       



$('#limitedNumbSelect2').append('<option value="<? echo $row2->id ?>"><? echo $row2->given_name." ".$row2->surname." (".$row2->email_add.")" ?></option>');

       
	
         
  
      
      
	
</script> 

<? }


  
?>
