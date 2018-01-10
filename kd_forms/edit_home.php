<?include('sidepanel.php');                                                          
include_once('connect.php');                                                         
$get_states=$conn->query("Select * from tbl_state");                                 
 $project_ID = @$_POST['hid'];                                                       
 // echo $project_ID;                                                                   
                                                                                     
// php For sending data To server                                                    
                                                                                     
  if(isset($_REQUEST['save']))                                                       
{                                                                                    
// echo "<script>alert('first in sa');</script>";                                     
                                                                                     
$qry_details = $conn->query("UPDATE tbl_project_detail SET                           
                     project_name='".$_POST['project_name_1']."',                    
                     construction_manager='".$_POST['construction_manager_1']."',    
                     principal_contractor='".$_POST['principal_contractor']."',      
                     project_manager='".$_POST['project_manager_1']."',              
                     client='".$_POST['client']."',                                  
                     project_engineer='".$_POST['project_engineer_1']."',            
                     site_manager='".$_POST['site_manager_1']."',                    
                     project_address='".$_POST['project_address']."',                
					 state_id='".$_POST['select_employer']."',                       
					 foreman='".$_POST['foreman']."',                                
                     safety_manager='".$_POST['Safety_manager']."',                  
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
                     sp_name='".$_POST['sp_name']."',
                     tenant='".$_POST['tenant']."',                     
                     contract_admin='".$_POST['contract_admin']."',                  
                     brief_scope='".$_POST['brief_scope']."',
                     modified_date=NOW()                    

					 Where project_id = '".$_POST['hid2']."'");                      
                                                                                     
                                                                                     
				foreach ($_FILES['photo']['name'] as $key => $value) {
	// echo "ok";
	if($value!="")
	{
	
 $image_path= '../API/Uploads/';  
  $building_images_0  = $value;
   $target0 = $image_path . $building_images_0;

   move_uploaded_file($_FILES['photo']['tmp_name'][$key], $target0);

	
		// $query="UPDATE tbl_project_detail SET image_".++$key."='".$value."'  Where project_id = '$project_ID'");

$image_details = $conn->query("UPDATE tbl_project_detail SET image_".++$key." = '".$value."'  Where project_id = '".$_POST['hid2']."'");
   // $update_query= $conn->query($query);

  

}


	
	
}
 if($qry_details)
        {
          ?>
          <script>
            alert("Successfully Edited the Homepage Details");
            window.location.href='dashboard.php';
          </script>
          <?
        }





					}





$sql="SELECT * FROM tbl_project_detail  WHERE project_id = '$project_ID'";
// echo "SELECT * FROM tbl_project_detail  WHERE project_id = '$project_ID'";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($result);
$get_project_number=$conn->query("select number from tbl_project where id='".$row['project_id']."'")->fetch_object();
if ($row)
  {
  
		
$project_name_p = $row['project_name']; 
$construction_manager_p = $row['construction_manager']; 
$principal_contractor_p = $row['principal_contractor']; 
$project_manager_p = $row['project_manager']; 
$client_p = $row['client']; 
$project_engineer_p = $row['project_engineer'];
$site_manager_p = $row['site_manager']; 
$project_address_p = $row['project_address']; 
$foreman_p = $row['foreman']; 
$commencement_date_p = $row['commencement_date']; //commencement_date
$commencement_address_p = $row['commencement_address']; 
$safety_manager_p = $row['safety_manager'];
// $name_p = $row['name'];
$sp_name= $row['sp_name'];
$site_engineer_p = $row['site_engineer'];
$completion_date_p = $row['completion_date'];
$mgnt_plan_issue_date_p = $row['mgmt_plan_issue_date'];

$da_working_p = $row['da_working'];
$safety_representative_p = $row['safety_representative'];

$mgmt_plan_prepared_p = $row['mgmt_plan_prepared'];
$total_month_p = $row['total_month'];
$local_hospital_p = $row['local_hospital'];
$water_supply_p = $row['water_supply'];
$gas_supply_p = $row['gas_supply'];
$electricity_supply_p = $row['electricity_supply'];
$local_council_p = $row['local_council'];
$whs_regulator_p = $row['whs_regulator'];
$cip_director2_p = $row['cip_director2'];
$cip_director3_p = $row['cip_director3'];
$cip_director4_p = $row['cip_director4'];
$cip_director1_p = $row['cip_director1'];
$local_epa_p = $row['local_epa'];
$project_comp_date_p = $row['project_comp_date'];
// echo $project_comp_date_p;
// $issue_date_p = $row['issue_date'];
// $project_personal_number_p = $row['project_personal_number'];
// $external_number_p = $row['external_number'];
// $emergency_evacuation_p = $row['emergency_evacuation'];
// $emergency_response_p = $row['emergency_response'];
// $project_hazard_p = $row['project_hazard'];
// $emergency_response_team_p = $row['emergency_response_team'];
// $duties_response_team_p = $row['duties_response_team'];
// $diagrams_sign_p = $row['diagrams_sign'];
$safety_representative_p = $row['safety_representative'];
$project_scope_p = $row['project_scope'];
// $coordination_procedure_p = $row['coordination_procedure'];
// $response_equipment_p = $row['response_equipment'];
// $response_process_p = $row['response_process'];
// $emergency_management_p = $row['emergency_management'];
$search_tag_p = $row['search_tag'];
$image_3_p = $row['image_3'];
$image_4_p = $row['image_4'];
$image_2_p = $row['image_2'];
$image_1_p = $row['image_1'];
// $evacuation_drill_p = $row['evacuation_drill'];
$state_id_p = $row['state_id'];

$tenant_p = $row['tenant'];
$contract_admin_p = $row['contract_admin'];
$brief_scope_p = $row['brief_scope'];                             
	
  
  mysqli_free_result($result);
  

  
  
  }
// 
// echo $project_name_p; 
$sql_p_state=$conn->query("select tbl_state.state_name,tbl_state.id,tbl_project_detail.project_id from tbl_project_detail INNER JOIN tbl_state where tbl_project_detail.state_id=tbl_state.id AND tbl_project_detail.project_id='$project_ID'")->fetch_object();




?>



      




   
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12" style="padding: 0">
				<div class="card">
				  <div class="header">
				  	<div class="col-sm-12" style="padding-left: 0;padding-right: 10px;padding-bottom: 5px;">
					    <div class="col-md-3">
					        <h4 class="title" style="color:#5B6672;">Management Plans Cover Page</h4>
					   
						</div>
					    <div class="col-md-4">
					        <input class="form-control other" id="" name="" data-val="1">
					    </div>
					     <div class="col-md-5">
					        
					    </div>
				   </div> 
				  </div>

  <div class="content">
   <form class="" action="" method="post" onsubmit="return validate()"  id="contact_form"  enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $project_ID; ?>" name="hid2">
	   <div class="form-group">
	    	<div class="col-sm-6">                                    
	            <label>Project Name</label> <span id="status"></span>
	            <input class="form-control imp" data-val='4' type="" value="<?php echo $project_name_p; ?>" id="project_name_1" name="project_name_1">
	    	</div>
	    	<div class="col-sm-6">
	    		<label>Project Number</label>
	            <input class="form-control other" type="" data-val='2' value="<?=$get_project_number->number ?>" name="project_number" id="project_number" readonly>
	    	</div>
	    </div>

	    <div class="form-group">
	        <div class="col-sm-6">    
	            <label>Principal Contractor</label>
	            <input class="form-control other" data-val='2' value="<? echo $principal_contractor_p;  ?>" id="principal_contractor" name="principal_contractor">
	         </div>
	         <div class="col-sm-6">
	         	<label>Client Name</label>
	            <input class="form-control other" data-val='2' value="<?php echo $client_p; ?>" type="" name="client" id="client">
	         </div>   
	    </div>

	   <div class="form-group">
	        <div class="col-sm-6">    
	            <label>Project Address</label>
	            <input class="form-control other" data-val='2' type="" value="<?php echo $project_address_p; ?>" name="project_address" id="project_address">
	        </div>
	        <div class="col-sm-6">
	        	<label>Tenant Name</label>
	            <input class="form-control other" data-val='2' value="<?php echo $tenant_p; ?>" type="" name="tenant" id="tenant">
	        </div>    
	    </div> 

	    <div class="form-group">
	        <div class="col-sm-6">    
	            <label>Project State</label>
	            <input type="text" name="state_name_hidden" id="state_name_hidden" value="<?= $sql_p_state->id; ?>" hidden>
		          <select style="" class="form-control" id="select" class="imp" onchange ="select2(this.value)" name="select_employer" data-val='4'>

		              <option value="" >Please Select State</option>
                         <? while($row_state=  $get_states->fetch_object()) {?>
                                     

                                       <option value="<? echo $row_state->id ?>" <?=$row_state->id == $sql_p_state->id ? ' selected="selected"' : '';?>><? echo $row_state->state_name ?> </option>
                                      <? } ?>
		              
		            <script>
		            function select2(obj) {
		            // alert(obj);
		                 //   $("#select option:eq(0)").attr("disabled", "disabled");
		                 // var e = document.getElementById("select");
		                 // var strUser = e.options[e.selectedIndex].value;
		                 //  // alert(strUser);
		                  $('#state_name_hidden').val(obj);
		                
		                }
		               </script> 
	                            
	              	</select>
	          </div>
	          <div class="col-sm-6">
	          	<label>DA Working Hours</label>
	            <input class="form-control other" data-val='1' type="" value="<?php echo $da_working_p; ?>" name="da_working" id="da_working">
	          </div>  
	    </div>

	    <div class="form-group">
	        <div class="col-sm-6">    
	            <label >Project Director / Construction Manager</label>
	  <input class="form-control imp"  type="text" value="<?php echo $construction_manager_p; ?>" id="construction_manager_1" name="construction_manager_1">
	        </div>
	        <div class="col-sm-6">
	        	<label>Superintendent Name</label>
	            <input class="form-control other" data-val='1' type="text" name="sp_name" id="sp_name" value="<?php echo $sp_name; ?>">
	        </div>    
	    </div>

	    <div class="form-group">
	        <div class="col-sm-6">    
	            <label>Project Manager</label>
	            <input class="form-control imp" data-val='3' type="" value="<?php echo $project_manager_p; ?>" id="project_manager_1" name="project_manager_1">
	        </div>

	        <div class="col-sm-6">
	        	<div class="col-sm-4" style="padding-left: 0;padding-top: 0;">
	        		<label style="letter-spacing:-0.07vh;">Project Commencement Date</label>
	             <input class="form-control other datepick" data-val='2' type=""  value="<?php echo $commencement_date_p; ?> "name="commencement_date" id="commencement_date" onchange="progress_settings(this);">
	        	</div>
	        	<div class="col-sm-4" style="padding-top: 0;">
	        		<label>Project Completion Date</label>
	             	<input class="form-control other datepick" data-val='2' value="<?php echo $completion_date_p; ?>" type="" name="completion_date" id="completion_date" onchange="progress_settings(this);">
	        	</div>
	        	<div class="col-sm-4" style="padding-right: 0;padding-top: 0;">
	        		<label>Total Months</label>
	            	<input class="form-control other" data-val='1' type="" value="<?php echo $total_month_p;?>" name="total_months" id="total_months">
	        	</div>
	        </div>    
	    </div>
   
	    <div class="form-group ">
	        <div class="col-sm-6">    
	            <label>Project Engineer</label>
	            <input class="form-control imp" data-val='4' type="" value="<?php echo $project_engineer_p; ?>" id="project_engineer_1" name="project_engineer_1">

	            <label>Site Manager</label>
	            <input class="form-control imp" data-val='4' type="" value="<?php echo $site_manager_p; ?>" id="site_manager_1" name="site_manager_1">

	            <label>Foreman</label>
	            <input class="form-control other" data-val='2' type="text" value="<?php echo $foreman_p; ?>" id="foreman" name="foreman">

	            <label>Site Engineer</label>
	            <input class="form-control other" data-val='4' type="" value="<?php echo $site_engineer_p; ?>" name="site_engineer_1" id="site_engineer_1">

	            <label>National Safety Manager</label>
	            <input class="form-control other" data-val='1' type=""  value="<?php echo $safety_manager_p; ?>" name="Safety_manager" id="Safety_manager">

	            <label>Health and Safety Representative</label>
	            <input class="form-control other" data-val='2' type="" value="<?php echo $safety_representative_p; ?>" name="safety_represenative" id="safety_represenative">

	            <label>Contracts Administrator</label>
	            <input class="form-control other" data-val='1' type="" value="<?php echo $contract_admin_p; ?>" name="contract_admin" id="contract_admin">

	            <label>Brief Scope</label>
	            <input class="form-control other" data-val='1' type="" value="<?php echo $brief_scope_p; ?>" name="brief_scope" id="brief_scope">
	        </div>
	        <div class="col-sm-6">
	        	<label>External Emergency Contact Numbers</label>
	            <table class="table table table-bordered scroll table-curved" id="visitor_table">
				  <thead style="background-color: #E3E3E2">
				    <tr>
				      <th class="thpadding">Emergency Contact Name</th>
				      <th class="thpadding">Contact Number</th>
				    </tr>
				  </thead>
				  
				  <tbody style="background-color: #E3E3E2">
				    <tr>
				      <th class="thpadding"><label>Police/ Ambulance/ Fire Brigade</label></th>
				        <td class="thpadding"><input class="form-control " type="number" value="000" readonly></td>
				     
				    </tr>
				    <tr>
				      <th class="thpadding"><label>Local Hospital</label></th>
				      <td class="thpadding"><input class="form-control other" data-val='2' type="number" value="<?php echo $local_hospital_p; ?>" name="local_hospital" id="local_hospital"></td>
				      
				    </tr>
				    <tr>
				     <th class="thpadding"><label>Water Supply</label></th>
				      <td class="thpadding"><input class="form-control other" data-val='2' type="number" value="<?php echo $water_supply_p; ?>" name="water_supply" id="water_supply"></td>
				      
				    </tr>
				    <tr>
				      <th class="thpadding"><label>Gas Supply</label></th>
				      <td class="thpadding"><input class="form-control other" data-val='2' type="number" value="<?php echo $gas_supply_p; ?>" name="gas_supply" id="gas_supply"></td>
				    </tr>
				    <tr>
				      <th class="thpadding"><label>Electricity Supply</label></th>
				      <td class="thpadding"><input class="form-control other" data-val='2' type="number" value="<?php echo $electricity_supply_p; ?>" name="electricity_supply" id="electricity_supply"></td>
				    </tr>
				    <tr>
				      <th class="thpadding"><label>Poisons Information</label></th>
				      <!-- <td class="thpadding"><label>131 126</label></td> -->
                      <td class="thpadding"><input class="form-control " type="number" value="131126" readonly></td>
				    </tr>
				       <tr>
				      <th class="thpadding"><label>State Emergency Services</label></th>
				     <td class="thpadding"><input class="form-control " type="number" value="131126" readonly></td>
				    </tr>
				    <tr>
				      <th class="thpadding"><label>Local Council</label></th>
				      <td class="thpadding"><input class="form-control other" data-val='2' type="number" value="<?php echo $local_council_p; ?>" name="local_council" id="local_council"></td>
				    </tr>
				    <tr>
				      <th class="thpadding"><label>WHS Regulator</label></th>
				      <td class="thpadding"><input class="form-control other" data-val='2' type="number" value="<?php echo $whs_regulator_p; ?>" name="whs_regulator" id="whs_regulator"></td>
				    </tr>
				    <tr>
				      <th class="thpadding"><label>Local EPA</label></div></th>
				      <td class="thpadding"><input class="form-control other" data-val='2' type="number" value="<?php echo $local_epa_p; ?>" name="local_epa" id="local_epa"></td>
				    </tr>
				  </tbody>				 
				</table>
	        </div>    
	    </div>

    <div class="form-group">
        <div class="col-sm-6">    
            <label>Project Scope</label>
            <!-- <input class="form-control  " data-val='2' type="" name="project_scope" id="project_scope">  -->

            <textarea  data-val='2' class="form-control instruction_area other" rows="20" id="project_scope" name="project_scope" style="-webkit-border-radius: 15px !important;-moz-border-radius: 15px !important;border-radius: 15px !important;font-size: 12px " ><?php echo$project_scope_p; ?></textarea>
        </div>
        <div class="col-sm-6">
        	<label>CIP Director</label>
            <input class="form-control other" data-val='2' type="" value="<?php echo $cip_director1_p?>" name="cip_director1" id="cip_director1">

            <label>CIP Director</label>
            <input class="form-control other" data-val='2' type="" value="<?php echo $cip_director2_p?>" name="cip_director2" id="cip_director2">

            <label>CIP Director</label>
            <input class="form-control other" data-val='2' type="" value="<?php echo $cip_director3_p?>" name="cip_director3" id="cip_director3">

            <label>CIP Director</label>
            <input class="form-control other" data-val='2' type="" value="<?php echo $cip_director4_p?>" name="cip_director4" id="cip_director4">

            <label>Management Plan Prepared by</label>
            <input class="form-control other" data-val='2' type="" value="<?php echo $mgmt_plan_prepared_p; ?>" name="prepared_by" id="prepared_by">

           <!--  <label>Management Plan Prepared by</label>
            <input class="form-control other" data-val='2' type="" name="prepared_by" id="prepared_by"> -->

            <label>Management Plan Issue Date</label>
            <input class="form-control other datepick" data-val='2' type=""  value="<?php echo $mgnt_plan_issue_date_p; ?>" name="issue_date" id="issue_date" onchange="progress_settings(this);"> 
            <script>
                 $( function() {
                        $( ".datepick" ).datepicker();

                    });
         	</script>

         	<label>Add Search #Tags</label>
             <span class="fa fa-search icon_pos"></span>
            <input class="form-control other" type="text" name="" value="<?php echo $search_tag_p; ?>" data-val='2' style="padding-left: 30px;padding-top: 8px;" id="category">
        </div>    
    </div>

    <div class="form-group">
     <div class="col-sm-6 col-md-offset-6" style="padding-left: 0px;">
     	<div style="background-color: #f5f5f5">
     		<input  type="text" id="category2" data-role="tagsinput" name= "search_tag"value="Phase4,Location,Pieter" />
     	</div>

    		<div class="form-group">
            <div class="col-sm-3" style="padding-left: 0px;">
          <span class="fa fa-eye" id="viewer1"  style="<?php if($image_1_p == "") { echo "visibility: hidden";}?>"></span>


              <div id="uploader1"  onclick="$('#file_1').click()" >
									
									<img src="<?php if($image_1_p != ""){ echo "../API/Uploads/".$image_1_p;  } else { echo "images/upload_image.png"; } ?>" id="upload_1"  width="70" height="70"  onerror="javascript:this.src='Document.png'"/>
									
            		</div>
					<input type="file"  id="file_1" name="photo[]"
            onchange="document.getElementById('upload_1').src = window.URL.createObjectURL(this.files[0]); $('#viewer1').css('visibility','visible');
 " data-val='5'>
            </div>

            <div class="col-sm-3" style="padding-left: 0px;">
          <span class="fa fa-eye" id="viewer2"  style="<?php if($image_2_p == "") { echo "visibility: hidden";}?>"></span>

            <div id="uploader2"  onclick="$('#file_2').click()" >
									
									<img  src="<?php if($image_2_p != ""){ echo "../API/Uploads/".$image_2_p;} else { echo "images/upload_image.png"; } ?>" id="upload_2"  width="70" height="70" onerror="javascript:this.src='Document.png'"/>
												
			
			
			</div>
			
			
            
			<input type="file" id="file_2" name="photo[]"
            onchange="document.getElementById('upload_2').src = window.URL.createObjectURL(this.files[0]);$('#viewer2').css('visibility','visible');" >
            </div>

             <div class="col-sm-3" style="padding-left: 0px;">
          <span class="fa fa-eye" id="viewer3"  style="<?php if($image_3_p == "") { echo "visibility: hidden";}?>"></span>

			 <div id="uploader3"  onclick="$('#file_3').click()" >
									
									<img src="<?php if($image_3_p != ""){ echo "../API/Uploads/".$image_3_p;} else { echo "images/upload_image.png"; } ?>" id="upload_3"  width="70" height="70" onerror="javascript:this.src='Document.png'"/>
											

			</div>
            <input type="file" id="file_3" name="photo[]"
            onchange="document.getElementById('upload_3').src = window.URL.createObjectURL(this.files[0]);$('#viewer3').css('visibility','visible');" data-val='5'>
            </div>

            <div class="col-sm-3" style="padding-left: 0px;">
          <span class="fa fa-eye" id="viewer4"  style="<?php if($image_4_p == "") { echo "visibility: hidden";}?>"></span>

			<div id="uploader4"  onclick="$('#file_4').click()" >
									
									<img src="<?php if($image_4_p != ""){ echo "../API/Uploads/".$image_4_p;  } else { echo "images/upload_image.png";  } ?>"  id="upload_4"  width="70" height="70" onerror="javascript:this.src='Document.png'"/>
									
			
			</div>
            <input type="file" id="file_4" name="photo[]"
            onchange="document.getElementById('upload_4').src = window.URL.createObjectURL(this.files[0]);$('#viewer4').css('visibility','visible');" data-val='5'>
            </div>                                                
    		</div>
   		
    	</div>  
		<script>
		 $(document).ready(function(){
			 var x = $("img[src='images/upload_image.png']");
					
				
}); 
		</script>
    </div>
    
    <div class="form-group">                            
        <div class="col-sm-12">
    <input type="submit"  class="btn btn-danger btn-fill pull-right form_submit_button" name="save" id="save" style="background-color: #E75139;border:none;border-radius: 0px;"  value="Save" />

           
					
            <button type="reset" class="btn btn-danger btn-fill pull-right" style="background-color: #E75139;border:none;border-radius: 0px;margin-right: 2vh">Cancel </button>
         </div>
    </div>



            </form>
            </div>

   </div>   
   </div>   
   </div>   
   </div> 
   </div>
   </div>
   </div>
  

 


						
</body>



</html>

<script>

  
    

    
 function validate()
  {
 if($('#project_name_1').val().trim()=='')
    {
      alert("Please Enter PROJECT NAME");
	  $('#project_name_1').focus();
      return false;
    }
    

    else
    {
		// alert("thank you");
      $('#contact_form').submit();
	}
  }
</script>

<style>
    input[type='file'] {
        color: transparent; 
        display: none;  
}
#upload_1,#upload_2,#upload_3,#upload_4,#upload_5,#upload_6
{
    background-image: url('images/upload_image.png');
    background-size: 70px 70px;
    border-radius: 7vh;
    border:solid 1px grey;

}

.form-control {
    background-color: #E3E3E2;
    border: none;
    outline: none;
    border-radius: 6vh;
    color: #565656;
    padding: 8px 12px;
    height: 5vh;
    -webkit-box-shadow: none;
    box-shadow: none;
    font-size: none !important;
}
.form-control:focus {
    background-color: #E3E3E2;
    border: none;
    outline: none;
     -webkit-box-shadow: none;
    box-shadow: none;
}
.form-control[readonly]
{
    background-color: #E3E3E2;
}
.progress-wrap {
  /*text-align: center;*/
  /*font-size: 10px;*/
  color: #8C8C8C;
  /*margin: 0 0 20px 0;*/}
  
  #progress {
  width: 100%;
    /*margin: 0 0 5px 0;*/
  }
progress[value] {
  /* Reset the default appearance */
  -webkit-appearance: none;
   appearance: none;

 
}
progress[value]::-webkit-progress-value {

    background-color: #57ACA2;
    border-radius: 6vh; 
   
}
progress[value]::-webkit-progress-bar {
  background-color: #2B303C;
  border-radius: 6vh;
  
}
.icon_pos
{
        position: absolute;
        top: 94%;
    left: 2%;
        -webkit-text-stroke: 0.5px #E3E3E2;
}
 .carousel-indicators .active {

    display: inline-block;
    width: 10px;
    height: 10px;
    margin: 1px;
    text-indent: -999px;
    cursor: pointer;
    /*background-color: #000\9;*/
    background-color: #888888;
    border: 1px solid #fff;
    border-radius: 10px;
}
.carousel-indicators {

    left: 20%;
    }
    .carousel{
   
    margin-top: 0px;
}
.carousel .item{
    height: auto; /* Prevent carousel from being distorted if for some reason image doesn't load */
}
.carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
}
.bs-example{
    margin: 0px;
}
.carousel-control.left, .carousel-control.right {
    background-image: none
}



.carousel-indicators {
    bottom: -30px;
}
.carousel-indicators li {
background-color: #D8D8D8;
    }

    .carousel-indicators .active {
   
    background-color: #888888;
} 

.details
{
    color: #5E5E5E;
    font-size: 2vh;
}
.tag_project
{

    background-color: #E4E4E4;
    border-radius: 6vh;
    color: #A9A9A9;

}
.table > thead > tr > th {
    text-transform: none;
    color:#5A5A5A;
    font-family: 'Helvetica_nue';
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 6px 8px;
    vertical-align: middle;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    
     border-top: none; 
}

.table>tbody>tr>th,.table>tbody>tr>td
{
font-weight: normal;
    font-size: 13px;
    color: #9B9EA0;}
   

    .table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #F0F0F0;
}

.table>tbody
{
    background: #F5F5F5;
}

span > i {
    color: white;
}
span > input {
    background: none;
    color: white;
    border: 0;
    padding: 0;
}




/*For input type reset only*/
span > i {
    color: white;
}
span > input {
    background: none;
    color: white;
    border: 0;
    padding: 0;
}

  


.table-curved {
    /*border: solid #ccc 1px;*/
    border-radius: 15px;
    border-left:0px;
    border-collapse: separate;
}

.table-curved th,td
{
    text-align: left;
}
.table-curved td, .table-curved th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
}
.table-curved th {
    border-top: none;
}
/*.table-curved th:first-child {
    border-radius: 0 0 0 56px;
}*/
.table-curved th:last-child {
    border-radius: 0 15px 0 0;
}
.table-curved thead th:first-child {
    border-top-left-radius: 15px;
}
/*.table-curved th:only-child{
    border-radius: 56px 6px 0 0;
}*/
/*.table-curved tr:last-child td:first-child {
    border-radius: 0 0 0 56px;
}*/
.table-curved tr:last-child td:last-child {
    border-radius: 0 0 15px 0;
    /*background-color: red;*/
}

.table-curved tbody tr:last-child th:first-child   {
   border-bottom-left-radius: 15px;
    
}


.instruction_area
{
  padding-left: 15px !important;
  background-color: #E3E3E2 !important;
  resize: none;
}
#status
{
font-size:11px;
/*margin-left:10px;*/
}
.thpadding {
		padding-top: 5px !important;
		padding-bottom: 4px !important;
	}

</style>

<script>
function get_image(id)
{
    
    $('#file_'+id).click();


}




$('#category').on('input', function() 
{       //alert(this.value);
//$('#category2').closest('div').children('input').val(this.value);

$( "div.bootstrap-tagsinput:eq(1) > input" ).val(this.value);


      //alert($('#category2').closest('div').children('input').val()); 
});

$("#category").on('focusout',function () {
   $("div.bootstrap-tagsinput:eq(1) > input").focusout();
   $('#category').val('');
});

$('#category').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {
      $("div.bootstrap-tagsinput:eq(1) > input").focusout();
      $('#category').val('');
    return false;  
  }
});

</script>



<style>
    .form-group
    {
        margin-bottom: 0;
    }
</style>
<!-- The Modal -->
<div id="myModal" class="modal">
                        <div class="modeliconbackgroundcolor"></div>
                        <span class="close" onclick="$('#myModal').hide();">&times;</span>
                        <img class="modal-content modal-content-image north" id="img01"  ></div>
                      
					<script>

  // model script for first image
  
var modal = document.getElementById('myModal');
var modalImg = document.getElementById("img01");
// alert(fileVal.value);

// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg = document.getElementById('viewer1');
var img = document.getElementById('upload_1');

	
viewerimg.onclick = function(){
	// alert(img.src);
          // var imgsrc = img.src.split("/").reverse()[0];
		      // var path="../API/Uploads/"+imgsrc;
		      // var path= "Document.png";
	modalImg.src = img.src;
		// $('#img01').attr('src', "site_admin/API/Uploads/"+imgsrc);	  

		// $('#img01').attr('src', 'Document.png');	  
		$('#myModal').show();


}
// Get the <span> element that closes the modal

// $(document).ready(function(){
// $(".close").click (function() {
     // $("#myModal").hide();
	// $('#img01').attr('src', '');	  
// });
// });   
</script>
<script>
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg2 = document.getElementById('viewer2');
var img2 = document.getElementById('upload_2');

viewerimg2.onclick = function(){
	// alert("not2");
          // var imgsrc = img2.src.split("/").reverse()[0];
		      // var path="../API/Uploads/"+imgsrc;
	modalImg.src = img2.src;
			$('#myModal').show();

}
</script>
<script>
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg3 = document.getElementById('viewer3');
var img3 = document.getElementById('upload_3');

viewerimg3.onclick = function(){
	// alert("not3");
          // var imgsrc = img3.src.split("/").reverse()[0];
		      // var path="../API/Uploads/"+imgsrc;
	modalImg.src = img3.src;
		$('#myModal').show();

	}
</script>
<script>
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg4 = document.getElementById('viewer4');
var img4 = document.getElementById('upload_4');

viewerimg4.onclick = function(){
	// alert("not4");
          // var imgsrc = img4.src.split("/").reverse()[0];
		      // var path="../API/Uploads/"+imgsrc;
	modalImg.src = img4.src;
		$('#myModal').show();

	}
</script>
<script>
// uploader2

var imageLoader1 = document.getElementById('file_1');
    imageLoader1.addEventListener('change', handleImage1, false);

function handleImage1(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader1 img').attr('src',event.target.result);
        $('#upload_1').css('background-image','none');
    }
	reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox1;
dropbox1 = document.getElementById("uploader1");
dropbox1.addEventListener("dragenter", dragenter1, false);
dropbox1.addEventListener("dragover", dragover1, false);
dropbox1.addEventListener("drop", drop1, false);

function dragenter1(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover1(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop1(e) {
        $("#viewer1").css('visibility','visible');

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  $('#upload_1').css('background-image','none');
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader1.files = files;
   
}
</script>
<script>
// uploader2

var imageLoader2 = document.getElementById('file_2');
    imageLoader2.addEventListener('change', handleImage2, false);

function handleImage2(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader2 img').attr('src',event.target.result);
        $('#upload_2').css('background-image','none');
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox2;
dropbox2 = document.getElementById("uploader2");
dropbox2.addEventListener("dragenter", dragenter2, false);
dropbox2.addEventListener("dragover", dragover2, false);
dropbox2.addEventListener("drop", drop2, false);

function dragenter2(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover2(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop2(e) {
        $("#viewer2").css('visibility','visible');

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  $('#upload_2').css('background-image','none');
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader2.files = files;
   
}
</script>
<script>
// uploader2

var imageLoader3 = document.getElementById('file_3');
    imageLoader3.addEventListener('change', handleImage3, false);

function handleImage3(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader3 img').attr('src',event.target.result);
        $('#upload_3').css('background-image','none');
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox3;
dropbox3 = document.getElementById("uploader3");
dropbox3.addEventListener("dragenter", dragenter3, false);
dropbox3.addEventListener("dragover", dragover3, false);
dropbox3.addEventListener("drop", drop3, false);

function dragenter3(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover3(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop3(e) {
        $("#viewer3").css('visibility','visible');

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  $('#upload_3').css('background-image','none');
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader3.files = files;
   
}
</script>
<script>
// uploader2

var imageLoader4 = document.getElementById('file_4');
    imageLoader4.addEventListener('change', handleImage4, false);

function handleImage4(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader4 img').attr('src',event.target.result);
        $('#upload_4').css('background-image','none');
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox4;
dropbox4 = document.getElementById("uploader4");
dropbox4.addEventListener("dragenter", dragenter4, false);
dropbox4.addEventListener("dragover", dragover4, false);
dropbox4.addEventListener("drop", drop4, false);

function dragenter4(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover4(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop4(e) {
        $("#viewer4").css('visibility','visible');

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  $('#upload_4').css('background-image','none');
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader4.files = files;
   
}
</script>
<style>
.main-panel .navbar {
    margin-bottom: 0;
    z-index: 0 !important;
}
<!-- Get the modal css -->
#upload_0,#upload_1 , #upload_2,#upload_3,#upload_4 {
    cursor: pointer;
    transition: 0.3s;
}



/* The Modal (background) */
#myModal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 999; /* Sit on top */
    padding-top: 50px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.7); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content-image {
    margin: auto;
    display: block;
    width: 50%;
    max-width: 500px;
    max-height: 500px;
  
}

/* Caption of Modal Image */
 #myModal #caption {
    margin: auto;
    display: block;
    width: 550px;
    height: 100px;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
}

/* Add Animation */
.modal-content-image, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale()}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale()}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: white !important;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
  opacity: 5.2 !important;
}
.downloadupaddinvoice0,.downloadupaddinvoice1,.downloadupaddinvoice2,.downloadupaddinvoice3,.downloadupaddinvoice4 {
    position: absolute;
    top: 30px;
    right: 65px;
  
    color: white !important;
    font-size: 20px;
    transition: 0.3s;
  opacity: 5.2 !important;
  
}

.close:hover,
.close:focus {
    color: white !important;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>	
