<?php
include ('connect.php');

$status1=$conn->query("truncate table tbl_etr_filled");
$status2=$conn->query("truncate table tbl_etr_task_obs");
$status3=$conn->query("truncate table tbl_ncic_filled");
$status4=$conn->query("truncate table tbl_ncic_task_obs");
$status5=$conn->query("truncate table tbl_acc_filled");
$status6=$conn->query("truncate table tbl_acc_task_obs");
if($status1 && $status2 && $status3 && $status4 && $status5 && $status6)
	echo "All Data is Cleared";
else
	echo "Failled";
	
?>