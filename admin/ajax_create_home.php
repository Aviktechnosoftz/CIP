<? 
include_once('connect.php');

//print_r($_POST);


//$array_images=array();
//$array_images= explode('$',$_POST['image']);
// print_r($array_images);

// print_r($_POST['form'][0]['value']); 
$p_name=$_POST['project_name_1'];
$array_images=array();
$array_images=explode('$',$_POST['image']);
foreach ($array_images as $key => $val) {
   $temp=explode('.', $val);
   $temp2=explode('_',$temp[0]);
   if($temp2[1]=='Safety-Policy')
   {
       $safety=$p_name.'_Safety-Policy.'.$temp[1];
   }
   else if($temp2[1]=='Quality-Policy')
   {
       $quality=$p_name.'_Quality-Policy.'.$temp[1];
   }
   else if($temp2[1]=='Environmental-Policy')
   {
       $environmental=$p_name.'_Environmental-Policy.'.$temp[1];
   }
   else if($key==0 && $temp2[1]!='Safety-Policy' && $temp2[1]!='Quality-Policy' && $temp2[1]!='Environmental-Policy')
   {
       $doc1=$val;
   }
    else if($key==1 && $temp2[1]!='Safety-Policy' && $temp2[1]!='Quality-Policy' && $temp2[1]!='Environmental-Policy')
   {
      $doc2=$val;
   }
    else if($key==2 && $temp2[1]!='Safety-Policy' && $temp2[1]!='Quality-Policy' && $temp2[1]!='Environmental-Policy')
   {
      $doc3=$val;
   }
   else
       $doc4=$val;
}

$auploads_name = "";
	if( $_POST['site_manager_extra']!= "")  {
		
		foreach ($_POST['site_manager_extra'] as $key => $value) {
			if($value!="") {
				$auploads_name .=$value.','; }
			elseif($value == ""){
				$space = 99.99;
				$auploads_name .=$space.','; }
		}
	}
	$auploads_ph = "";
	if($_POST['site_manager_extra_ph'] != "") {
		foreach ($_POST['site_manager_extra_ph'] as $key2 => $value2) {
			if($value2!="" ) {
				$auploads_ph .=$value2.',';  }
			elseif($value2 == ""){
				$space = 99.99;
				$auploads_ph .=$space.','; }
		}
	}
	$auploads_name = rtrim($auploads_name,',');
	$auploads_ph = rtrim($auploads_ph,',');


$get_max= $conn->query("Select MAX(id)+1 as max from tbl_project")->fetch_object();
$qry_details = $conn->query("insert into tbl_project_detail set 
                     project_id = '".$get_max->max."',
                     project_name='".$_POST['project_name_1']."',

                     construction_manager='".$_POST['construction_manager_1']."',                             
                     principal_contractor='".$_POST['principal_contractor']."',  
                       
                     project_manager='".$_POST['project_manager_1']."',

                     client='".$_POST['client']."',

                     tenant='".$_POST['tenant']."',
                     brief_scope='".$_POST['brief_scope']."',

                     project_engineer='".$_POST['project_engineer_1']."',
                     site_manager='".$_POST['site_manager_1']."',
                     project_address='".$_POST['project_address']."',
                     state_id='".$_POST['state_name_hidden']."',
                     foreman='".$_POST['foreman']."',
                     commencement_address='".$_POST['project_address']."',
                     safety_manager='".$_POST['Safety_manager']."',
                     sp_name='".$_POST['sp_name']."',
                     site_engineer='".$_POST['site_engineer_1']."',
                    mgmt_plan_issue_date='".$_POST['issue_date']."',
                    
                            
                     
               
                     
                     safety_representative ='".$_POST['safety_represenative']."',
                     
                     project_scope='".$_POST['project_scope']."',
                     
                     
                     
                     search_tag='".$_POST['search_tag']."',

                     mgmt_plan_prepared='".$_POST['prepared_by']."',
                     commencement_date='".$_POST['commencement_date']."',
                     da_working='".$_POST['da_working']."',
                     completion_date='".$_POST['completion_date']."',
                     total_month='".$_POST['total_months']."',
                     local_hospital='".$_POST['local_hospital']."',
                     water_supply='".$_POST['water_supply']."',
                     gas_supply='".$_POST['gas_supply']."',
                     electricity_supply='".$_POST['electricity_supply']."',
                     local_council='".$_POST['local_council']."',
                     whs_regulator='".$_POST['whs_regulator']."',
                     local_epa='".$_POST['local_epa']."',
                     cip_director1='".$_POST['cip_director1']."',
                     cip_director2='".$_POST['cip_director2']."',
                     cip_director3='".$_POST['cip_director3']."',
                     cip_director4='".$_POST['cip_director4']."',
                     contract_admin='".$_POST['contract_admin']."',

                     construction_manager_ph      ='".$_POST['construction_manager_ph']."',
                     project_manager_ph   ='".$_POST['project_manager_ph']."',   
                     project_engineer_ph   ='".$_POST['project_engineer_ph']."',   
                     site_manager_ph     ='".$_POST['site_manager_ph']."', 
                     foreman_ph      ='".$_POST['foreman_ph']."',
                     site_engineer_ph      ='".$_POST['site_engineer_ph']."',
                     safety_manager_ph      ='".$_POST['safety_manager_ph']."',
                     safety_representative_ph     ='".$_POST['safety_representative_ph']."', 
                     contract_admin_ph='".$_POST['contract_admin_ph']."',

					 
					 
                     total_building_area='".$_POST['total_building_area']."',
                     total_site_area='".$_POST['total_site_area']."',
                     site_manager_extra='".$auploads_name."',
                     site_manager_extra_ph='".$auploads_ph."',
					 
					 site_number='".$_POST['site_number']."',

                    created_date=NOW(),
              modified_date=NOW(),
                     
                      image_3='".$doc4."',
                     image_4='".$doc3."',
                     image_2='".$doc2."',
                     image_1='".$doc1."',
                     safety_policy='".$safety."',
                     quality_policy='".$quality."',
                    environment_policy='".$environmental."'

                     

                             ");


                    

$qry_project= $conn->query("insert into tbl_project set 
                     access_id = '0',
                     project_name='".$_POST['project_name_1']."',
                     number='".$_POST['project_number']."',
                     created_date=NOW(),
                     modified_date=NOW()
");

$project_register= $conn->query("insert into tbl_project_register set 
                     project_id = '".$get_max->max."',
                     access_id = '0',
                     
                     created_date=NOW(),
                     modified_date=NOW() ");

?>