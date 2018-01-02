<?
 error_reporting(0);
//print_r($_POST);
include 'connect.php';
  //echo "SELECT * FROM tbl_ref_doc where row_id='".$_POST['id']."'";
 //echo "SELECT  a.id,a.item_no,a.activity,a.ref_doc_input,a.acc_criteria,a.key,a.person,a.comments,a.is_doc_needed,b.ref_doc FROM tbl_from_data_row as a INNER JOIN tbl_ref_doc as b ON a.id = b.row_id where a.id='".$_POST['id']."'";
      $qry_1 = $conn->query("SELECT * FROM `tbl_from_data_row` where id='".$_POST['id']."'");
           
              $row = $qry_1->fetch_array(MYSQLI_NUM);  
             //print_r($row);die();
   
                        ?>
                          <? 
                            
                          $temp=array();
                   //echo "SELECT * FROM tbl_ref_doc where row_id='".$_POST['id']."'";
                   $result_2 = mysqli_query($conn,"SELECT * FROM tbl_ref_doc where row_id='".$_POST['id']."' and is_deleted='0' ");

                               while ($row_3 = mysqli_fetch_array($result_2)) {
                                 $arr=$row_3['ref_doc'];
                                 //print_r($arr);
                                 //$docs=explode(" ", $arr);
                               
                                 array_push( $temp, $arr);
                              
                               //print_r( $temp);
                            }

                            echo trim(implode("$$$",array_merge($row,$temp)));die();
                              ?>


                     
