
<?php
include_once('connect.php');
 session_start();
$text1 = $_POST['text1'];



$unused_id= $conn->query("select id from tbl_access where id NOT IN (select access_id from tbl_project)");
  @$arr=array();
  while($unused_id_row= $unused_id->fetch_object())
  {
    array_push($arr, $unused_id_row->id);
  }


if(in_array($text1, $arr))
{
	$delete= $conn->query("delete from tbl_access where id= '".$text1."'");
	echo "Access Authority successfully deleted";
}

else
{
	echo "Sorry Access Authority is already assigned to someone..";

}




?>