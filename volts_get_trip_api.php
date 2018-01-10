 <?
$conn = new mysqli('166.62.103.48', 'gpc', 'Gpc@30297!!!', "xirgo_fast");
ini_set('max_execution_time', 300);
$start_index= @$_REQUEST['start_index'];
$count_val = @$_REQUEST['count'];
if($start_index == "0" || $start_index  == "") 
$start_index=0;

if($count_val == "0" || $count_val == "") 
$count_val=50;

if($count_val > 100)
$count_val=100;

$count_total_trip=$conn->query("Select count(*) as count from trip_sheet")->fetch_object();

$limit_end=20;
$count=0;
$trip_sheet_ar=array();
 $get_trip_sheet=$conn->query("Select 	id as 'id',
		time_sheet as 'Trip_Sheet_Number',
		req_date as 'Date_Requested',
		del_date as 'Date_Delivered' ,
		contact_person as 'Contact_Person',
		contact_no as 'Contact_Number',
		req_by as 'Requested_By',
		req_email as 'Requester_Email',
		req_no as 'Requester_Number',
		item_name as 'Item_Name',
		notes as 'Notes',
		contract_driver as 'Contract_Driver',
		veh_no as 'Vehicle',
		equip_no1 as 'Equipment_Number1' ,
		equip_no2 as 'Equipment_Number2',
		equip_no3 as 'Equipment_Number3',
		equip_no4 as 'Equipment_Number4' ,
		equip_no5 as 'Equipment_Number5' ,
		equip_no6 as 'Equipment_Number6' ,
		bobtail_miles as 'Bobtail_Miles' ,
		trail_miles as 'Trail_Miles' ,
		disp_miles as 'Dispatcher_Miles' ,
		arrival_time as 'Arrival_Time' ,
		depart_time as 'Departure_Time' ,
		print_rep as 'Print_GCP_Rep' ,
		sign_rep as 'Sign_GCP_Rep' ,
		approved as 'Approved' ,
		driver_sign as 'Driver_Sign' ,
		total_cost as 'Total_Cost' ,
		complete_date as 'Complete_Date' ,
		created_on as 'Created' ,
		arrival_poi as 'Arrival_POI' ,
		depart_poi as 'Departure_POI',
		status as 'Trip_Sheet_Status' ,
		arrival_add as 'Arrival_Address' ,
		depart_add as 'Departure_Address' ,
		reason_cancel as 'Reason_Cancel' ,
		alati as 'Arrivel_Latitude',
		alongi as 'Arrivel_Longitude ',
		dlati as 'Departure_Latitude',
		dlongi as 'Departure_Longitude',
		updated_on as 'Updated_On',
		dispatcher_id as 'Dispatcher_Id',
		arrival_time2 as 'Arrival_Time2' ,
		auto_complete as 'Auto_Completed' ,
		access_number as 'Access_Number'  from trip_sheet  order by id  asc limit ".$start_index.",".$count_val."");

		

$main_array_3=array();
$trip_sheet_ar=array();

$arrayMain =array();
$counter=1;
 while ($row_get_trip_sheet = $get_trip_sheet->fetch_array(MYSQLI_ASSOC)) 
{
	
 	$get_trip_cost=$conn->query("select id as 'ID',TRIP_ID,PRCN,CT,ACTV,EWO,LOC,FERC,RRCN,AL,TOTAL from trip_cost where trip_id='".$row_get_trip_sheet['id']."' limit 1");
 	$get_trip_poi=$conn->query("select id as 'ID',tsn as 'Trip_Sheet_Number',`add` as 'Address',poi as 'POI_Name',lati_o as 'Longitude ',longi_o as 'Longitude ',is_count as 'OTHER_POI_NUMBER' from tripsheet_other_poi where tsn='".$row_get_trip_sheet['Trip_Sheet_Number']."'");


     $main_array_poi=array();
	 while ($row_get_trip_toi =$get_trip_poi->fetch_array(MYSQLI_ASSOC)) 
	 {
		array_push($main_array_poi, $row_get_trip_toi);
	 }

	 $main_array_billing=array();
	 while ($get_trip_cost_billing =$get_trip_cost->fetch_array(MYSQLI_ASSOC)) 
	 {
		array_push($main_array_billing, $get_trip_cost_billing);
	 }

 	
$main_array_1=array();
$row_get_trip_sheet['POI'] = $main_array_poi;
$row_get_trip_sheet['Billing'] = $main_array_billing;
$row_get_trip_sheet['total']= $count_total_trip->count;
$row_get_trip_sheet['total2']= $count_total_trip->count-($start_index+$count_val);
$row_get_trip_sheet['status']= '200';
array_push($main_array_1, $row_get_trip_sheet);

array_push($arrayMain, $main_array_1);

 	

 }

 //print_r(array_merge($main_array_1,$main_array_2,$main_array_3));
echo  json_encode($arrayMain);
 ?>