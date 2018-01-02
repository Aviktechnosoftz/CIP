<?php 
include_once('connect.php');
// print_r($_POST);
$arr= array();
$arr = explode(",",$_POST['allVals']);
// print_r($arr);
$select=$conn->query("select image_1,image_2,image_3,image_4,image_5,image_6 from tbl_site_attendace where id=".$_POST['id']."")->fetch_object();

$i=0;
foreach ($select as $key => $value) {

     if($value=="")
     {    
               
              $update=$conn->query("update `tbl_site_attendace` SET ".$key."= '".$arr[$i]."'  where id=".$_POST['id']."");
               $i++;
               
          }


     }

     



?>