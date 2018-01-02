<?php
include_once('connect.php');
// $main_query= $conn->query("select * 
// FROM tbl_induction_register where
// project_id= '2'");

// while ($row= $main_query->fetch_object()) {
// 	echo $row->id."<br>";
// }

$main_query= $conn->query("alter TABLE tbl_form_data_filled
ADD COLUMN is_notification INT(100) NOT NULL DEFAULT 0");

$main_query2=$conn->query("alter TABLE tbl_form_data_filled
ADD COLUMN comment_keycontrol varchar(500)");





if($main_query AND $main_query2)
{
	echo "ok";
}

/*[12:47:32 PM][  93 ms]*/ 



// insert into `test`.`sub_sub_menu` ( `id`, `parent_id`, `name`, `href`, `main_parent` ) values (  '',  '11',  '',  'visitor_induction_form_sign_out.php',  '3' )
?>

