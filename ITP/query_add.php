
<?
 error_reporting(0);
 include 'connect.php';
 
// print_r($_POST);

         $sql=$conn->query("SELECT * FROM `tbl_from_data_row` where data_heading_id = '".$_POST['id']."' order by id desc");
       
         if ($sql->num_rows==0) {

          $xyz=0;
          
         }
         else{

           $res=$sql->fetch_object();
           
          $xyz=array_reverse(explode(".",$res->item_no))[0];
         }
         
         $index =trim($_POST['index']," ").".".++$xyz;

         
            // mysqli_real_escape_string($con,$_POST['activity']);

    //echo "insert into tbl_from_data_row set main_id='".$_POST['main']."',data_heading_id='".$_POST['id']."',item_no='".$index."',activity='".$_POST['activity']."',ref_doc=' ".$_POST['ref_docs_input']."',acc_criteria='".$_POST['accept_criteria']."',`key`='".$_POST['key']."',person='".$_POST['person']."',comments='".$_POST['remarks_rec']."',is_doc_needed='".$_POST['is_doc_needed']."',created=now(),updated=now()";
    $result = "insert into tbl_from_data_row set main_id='".$_POST['main']."',data_heading_id='".$_POST['id']."',item_no='".$index."',activity='".mysqli_real_escape_string($conn,$_POST['activity'])."',ref_doc_input=' ". mysqli_real_escape_string($conn,$_POST['ref_docs_input'])."',acc_criteria='". mysqli_real_escape_string($conn,$_POST['accept_criteria'])."',`key`='".$_POST['key']."',person='". mysqli_real_escape_string($conn,$_POST['person'])."',comments='".mysqli_real_escape_string($conn,$_POST['remarks_rec'])."',is_doc_needed='".$_POST['is_doc_needed']."',created=now(),updated=now()";

    

    if (mysqli_query($conn, $result)) {
         $id= mysqli_insert_id($conn);
         //echo $id;
         if(!empty($id)){

           foreach($_POST['ref_docs'] as $datavalue){
            //echo "insert into tbl_ref_doc set row_id='$id',ref_doc='$datavalue',created=now(),updated=now()";
             $res_que=$conn->query("insert into tbl_ref_doc set row_id='$id',ref_doc='$datavalue',created=now(),updated=now()");
            }

          //echo "insert into tbl_ref_doc set row_id='$id',ref_doc='$docs',created=now(),updated=now()";
      //$res_que=$conn->query("insert into tbl_ref_doc set row_id='$id',ref_doc='$result[]',created=now(),updated=now()");
      if ($res_que) {
        
        echo "Data Added Successfully.";
      }
       
      
         }
     }



     
    ?>
 