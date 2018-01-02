 <?
         $conn = new mysqli("127.0.0.1","checklist_form","checklist_form","checklist_form");
		 $JsonData = $_REQUEST['jsondata'];
          // $JsonData= "{\"created\":\"2017-11-25 00:00:00\",\"project_id\":\"3\",\"induction_no\":\"23\"}";
$exjson = json_decode($JsonData);

 $cur_date= strtotime(date('Y-m-d'));
  $cur_time= strtotime(date('H:i:s'));
  $sum= $cur_date+$cur_time;
  $udid=md5($sum);

    // echo $exjson->project_id;

	// echo $row['project_id'];

	$check_exist= $conn->query("Select * from tbl_sm_report_filled where created= DATE('".$exjson->created."') AND project_id='".$exjson->project_id."'")->num_rows;
	 if($check_exist > 0)
	 {
		
	 		echo "{\"response\":\"201\",\"data\":\"Checklist Already Exist \"}";

	 }

	 else 

	 {

	 	
	 	    	
	 	  $insert_data_filled= $conn->query("insert into tbl_sm_report_filled set 
                    induction_no = '".$exjson->induction_no."',
                    checklist_udid='".$udid."',
                    project_id='".$exjson->project_id."',
                    created= '".$exjson->created."',
                    updated=NOW()");


	 	  $get_inserted =  $conn->query("select * from tbl_sm_report_filled where checklist_udid='".$udid."' ");
						 $rows_tbl_filled_sm = array();
						 while($r = $get_inserted->fetch_object())
						 {
								$rows_tbl_filled_sm[] = $r;

								// $rows_tbl_filled_sm = (object) $rows_tbl_filled_sm;

		
						 }

						 	$result = count($rows_tbl_filled_sm);
						 	if($result > 0)
						 	{
	 	 				 	echo "{\"response\":\"200\",\"datasmreportfilled\":".json_encode($rows_tbl_filled_sm[0])."}";
	 	  					}
	 	  					else
	 	  					{
	 	  						echo "{\"response\":\"201\",\"data\":\"Technical Error \"}";
	 	  					}

	 }	    
	//  $ids = array_merge($ids, array($maxid=> $row['id'].",".$maxid));
