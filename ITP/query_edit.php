<?
 error_reporting(0);
 include 'connect.php';

$do_edit= $_POST['docs'];
$edit=$_POST['ref_docs'];
print_r($_POST['other']);






    $res="update  tbl_from_data_row set activity='".$_POST['activity']."',ref_doc_input=' ".$_POST['ref_docs_input']."',acc_criteria='".$_POST['accept_criteria']."',`key`='".$_POST['key']."',person='".$_POST['person']."',comments='".$_POST['remarks_rec']."',is_doc_needed='".$_POST['is_doc_needed']."',updated=now() where id='".$_POST['id']."'";
    
    if (mysqli_query($conn, $res)) {
    foreach ($do_edit as $key=> $value) 
    {
      foreach ($edit as  $key2=>  $value1) 
      {
        if ($value === $value1) {
          unset($edit[$key2]);
          unset($do_edit[$key]);
      }
     }
      
    }

    $delete_old= $conn->query("update tbl_ref_doc set is_deleted='1',updated=NOW() where row_id='".$_POST['id']."'");
    if($res){
     echo "Data updated  Successfully."; 
     //Insert this
   
    if($edit != "")
    {
      foreach ($edit as  $key2=>  $value1) {
      $insert_new=  $conn->query("insert into tbl_ref_doc set row_id='".$_POST['id']."',ref_doc='$value1',created=now(),updated=now()");
      }
    }
    
    }


   }

   if($_POST['other'] !="")
{
$insert_other_data= $conn->query("insert into tbl_ref_docs set ref_docs_select='".$_POST['other']."',created=now(),updated=now()");
$insert_other_data2= $conn->query("insert into tbl_ref_doc set row_id='".$_POST['id']."',ref_doc='".$_POST['other']."',created=now(),updated=now()");

}
  ?>