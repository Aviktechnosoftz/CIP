<?include('sidepanel.php');
include_once('connect.php');
$get_states=$conn->query("Select * from tbl_state");

?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12" style="padding: 0">
				<div class="card">
				  <div class="header">
				  	<div class="col-sm-12" style="padding-left: 0;padding-right: 10px;">
					    <div class="col-md-3">
					        <h4 class="title" style="color:#5B6672;">Management Plans Cover Page</h4>
					    </div>
					    <div class="col-md-4">
					        <input class="form-control other" id="" name="" data-val="1">
					    </div>
					     <div class="col-md-5">
					        <div class="progress-wrap">
					        	<progress max="100" value="0" id="progress"></progress>
					            <div class="progress-message" id="progress-message" style="font-size: 2vh"><!-- 20% complete -->
					            </div>
					        </div>
					    </div>
				   </div> 
				  </div>

  <div class="content">
    <form class="pro_input" method="POST" enctype="multipart/form-data">
	   <div class="form-group">
	    	<div class="col-sm-6">                                    
	            <label>Project Name</label> <span id="status"></span>
	            <input class="form-control imp" data-val='4' type=""  id="project_name_1" name="project_name_1">
	    	</div>
	    	<div class="col-sm-6">
	    		<label>Project Number</label>
	            <input class="form-control other" type="" data-val='4' name="project_number" id="project_number">
	    	</div>
	    </div>

	    <div class="form-group">
	        <div class="col-sm-6">    
	            <label>Principal Contractor</label>
	            <input class="form-control other" data-val='3' id="principal_contractor" name="principal_contractor">
	         </div>
	         <div class="col-sm-6">
	         	<label>Client Name</label>
	            <input class="form-control other" data-val='3' type="" name="client" id="client">
	         </div>   
	    </div>

	   <div class="form-group">
	        <div class="col-sm-6">    
	            <label>Project Address</label>
	            <input class="form-control other" data-val='4' type="" name="project_address" id="project_address">
	        </div>
	        <div class="col-sm-6">
	        	<label>Tenant Name</label>
	            <input class="form-control other" data-val='1' type="" name="tenant" id="tenant">
	        </div>    
	    </div> 

	    <div class="form-group">
	        <div class="col-sm-6">    
	            <label>Project State</label>
	            <input type="text" name="state_name_hidden" id="state_name_hidden" hidden>
		          <select class="form-control" style="" id="select" class="imp" onchange ="select2(this)" name="select_employer" data-val='4'>

		              <option value="" >Please Select State</option>
                         <? while($row_state=  $get_states->fetch_object()) {?>
                                      <option value="<? echo $row_state->id ?>"><? echo $row_state->state_name ?> </option>
                                      <? } ?>
		              
		            <script>
		            function select2(obj) {
		                  progress_settings(obj);
		                   $("#select option:eq(0)").attr("disabled", "disabled");
		                 var e = document.getElementById("select");
		                 var strUser = e.options[e.selectedIndex].value;
		                  // alert(strUser);
		                  $('#state_name_hidden').val(strUser);
		                
		                }
		               </script> 
	                            
	              	</select>
	          </div>
	          <div class="col-sm-6">
	          	<label>DA Working Hours</label>
	            <input class="form-control other" data-val='1' type="" name="da_working" id="da_working">
	          </div>  
	    </div>

	    <div class="form-group">
	    	<div class="col-sm-3"><label style="letter-spacing:-0.07vh;">PROJECT DIRECTOR / CONSTRUCTION MANAGER</label><input class="form-control imp" data-val='1' type="" id="construction_manager_1" name="construction_manager_1"></div>
    		<div class="col-sm-3"><label >Phone No.</label><input class="form-control imp" data-val='4' type="number" id="construction_manager_ph" name="construction_manager_ph"></div>
	        <div class="col-sm-6">
	        	<label>Superintendent Name</label>
	            <input class="form-control other" data-val='1' type="" name="sp_name" id="sp_name">
	        </div>    
	    </div>

	    <div class="form-group">
	        <div class="col-sm-3">    
	            <label>Project Manager</label>
	            <input class="form-control imp" data-val='1' type=""  id="project_manager_1" name="project_manager_1">
	        </div>
	        <div class="col-sm-3"><label >Phone No.</label><input class="form-control imp" data-val='1' type="number" id="project_manager_ph" name="project_manager_ph"></div>
	        

	        <div class="col-sm-6">
	        	<div class="col-sm-4" style="padding-left: 0;padding-top: 0;">
	        		<label style="">Project Start Date</label>
	             <input class="form-control other datepick" data-val='1' type="" name="commencement_date" id="commencement_date" onchange="progress_settings(this);">
	        	</div>
	        	<div class="col-sm-4" style="padding-top: 0;">
	        		<label>Project Completion Date</label>
	             	<input class="form-control other datepick" data-val='1' type="" name="completion_date" id="completion_date" onchange="progress_settings(this);">
	        	</div>
	        	<div class="col-sm-4" style="padding-right: 0;padding-top: 0;">
	        		<label>Total Months</label>
	            	<input class="form-control other" data-val='1' type="" name="total_months" id="total_months">
	        	</div>
	        </div>    
	    </div>
   
	    <div class="form-group ">
	        <div class="col-sm-6">
	        <div class="row">
	        <div class="col-sm-6">    
	            <label>Project Engineer</label>
	            <input class="form-control imp" data-val='1' type="" id="project_engineer_1" name="project_engineer_1">
	        </div>
	         <div class="col-sm-6"><label >Phone No.</label><input class="form-control imp" data-val='1' type="number" id="project_engineer_ph" name="project_engineer_ph"></div>
			</div>
			<div class="row">
	        <div class="col-sm-6"> 
	            <label>Site Manager</label><i class="fa fa-plus-square add_site_manager" aria-hidden="true"></i>
	            <input class="form-control imp" data-val='1' type=""  id="site_manager_1" name="site_manager_1">
	            
	            </div>
	         <div class="col-sm-6"><label >Phone No.</label><input class="form-control imp" data-val='1' type="number" id="site_manager_ph" name="site_manager_ph"></div>
			</div>
	            <div id="new_site_manager"></div>

	            
	            <div class="row">
	        <div class="col-sm-6"> 
	            <label>Foreman</label>
	            <input class="form-control other" data-val='1' type="text"  id="foreman" name="foreman">
	            </div>
	            <div class="col-sm-6">
	            	<label >Phone No.</label><input class="form-control imp" data-val='1' type="number" id="foreman_ph" name="foreman_ph">

	            </div>
	            </div>
	            <div class="row">
	        <div class="col-sm-6"> 
	            <label>Site Engineer</label>
	            <input class="form-control other" data-val='1' type="" name="site_engineer_1" id="site_engineer_1">
	            </div>
	            <div class="col-sm-6"> 
	            	<label >Phone No.</label><input class="form-control imp" data-val='1' type="number" id="site_engineer_ph" name="site_engineer_ph">
	            </div>
	            </div>
	            <div class="row">
	        <div class="col-sm-6"> 
	            <label>National Safety Manager</label>
	            <input class="form-control other" data-val='1' type="" name="Safety_manager" id="Safety_manager">
	             </div>
	            <div class="col-sm-6">
<label >Phone No.</label><input class="form-control imp" data-val='1' type="number" id="Safety_manager_ph" name="Safety_manager_ph">
	            </div>
	            </div>
	            <div class="row">
	        <div class="col-sm-6"> 
	            <label>Health and Safety Representative</label>
	            <input class="form-control other" data-val='1' type="" name="safety_represenative" id="safety_represenative">
	             </div>
	            <div class="col-sm-6">
<label >Phone No.</label><input class="form-control imp" data-val='1' type="number" id="safety_represenative_ph" name="safety_represenative_ph">
	            </div>
	            </div>
	             <div class="row">
	        <div class="col-sm-6"> 
	            <label>Contracts Administrator</label>
	            <input class="form-control other" data-val='1' type="" name="contract_admin" id="contract_admin">
	            </div>
	            <div class="col-sm-6">
<label >Phone No.</label><input class="form-control imp" data-val='1' type="number" id="contract_admin_ph" name="contract_admin_ph">
	            </div>
	            </div>
	            <label>Brief Scope</label>
	            <input class="form-control other" data-val='4' type="" name="brief_scope" id="brief_scope">
	        </div>
	        <div class="col-sm-6">
	        <div class="col-sm-4" style="padding-left: 0">
	        	<label>Site Number</label>
	            <input class="form-control other" data-val='4' type="" name="site_number" id="site_number">

	        </div>
	        <div class="col-sm-4" style="padding-left: 0">
	        	<label>Total Site Area</label>
	            <input class="form-control other" data-val='1' type="" name="total_site_area" id="total_site_area">

	        </div>
	        <div class="col-sm-4" style="padding-left: 0">
	        	<label>Total Building Area</label>
	            <input class="form-control other" data-val='1' type="" name="total_building_area" id="total_building_area">

	        </div>
	        <div class="col-sm-12">
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
				      <td class="thpadding"><input class="form-control other" data-val='1' type="number" name="local_hospital" id="local_hospital"></td>
				      
				    </tr>
				    <tr>
				     <th class="thpadding"><label>Water Supply</label></th>
				      <td class="thpadding"><input class="form-control other" data-val='1' type="number" name="water_supply" id="water_supply"></td>
				      
				    </tr>
				    <tr>
				      <th class="thpadding"><label>Gas Supply</label></th>
				      <td class="thpadding"><input class="form-control other" data-val='1' type="number" name="gas_supply" id="gas_supply"></td>
				    </tr>
				    <tr>
				      <th class="thpadding"><label>Electricity Supply</label></th>
				      <td class="thpadding"><input class="form-control other" data-val='1' type="number" name="electricity_supply" id="electricity_supply"></td>
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
				      <td class="thpadding"><input class="form-control other" data-val='1' type="number" name="local_council" id="local_council"></td>
				    </tr>
				    <tr>
				      <th class="thpadding"><label>WHS Regulator</label></th>
				      <td class="thpadding"><input class="form-control other" data-val='1' type="number" name="whs_regulator" id="whs_regulator"></td>
				    </tr>
				    <tr>
				      <th class="thpadding"><label>Local EPA</label></div></th>
				      <td class="thpadding"><input class="form-control other" data-val='1' type="number" name="local_epa" id="local_epa"></td>
				    </tr>
				  </tbody>				 
				</table>
				</div>
	        </div>    
	    </div>
	    <div class="row">
	    	<div class="col-sm-12"></div>
	    </div>
    <div class="form-group">
        <div class="col-sm-6">    
            <label>Project Scope</label>
            <!-- <input class="form-control  " data-val='2' type="" name="project_scope" id="project_scope">  -->

            <textarea  data-val='4' class="form-control instruction_area other" rows="20" id="project_scope" name="project_scope" style="-webkit-border-radius: 15px !important;-moz-border-radius: 15px !important;border-radius: 15px !important;font-size: 12px " ></textarea>
        </div>
        <div class="col-sm-6">
        	<label>CIP Director</label>
            <input class="form-control other" data-val='1' type="" name="cip_director1" id="cip_director1">

            <label>CIP Director</label>
            <input class="form-control other" data-val='1' type="" name="cip_director2" id="cip_director2">

            <label>CIP Director</label>
            <input class="form-control other" data-val='1' type="" name="cip_director3" id="cip_director3">

            <label>CIP Director</label>
            <input class="form-control other" data-val='1' type="" name="cip_director4" id="cip_director4">

            <label>Management Plan Prepared by</label>
            <input class="form-control other" data-val='1' type="" name="prepared_by" id="prepared_by">

           <!--  <label>Management Plan Prepared by</label>
            <input class="form-control other" data-val='2' type="" name="prepared_by" id="prepared_by"> -->

            <label>Management Plan Issue Date</label>
            <input class="form-control other datepick" data-val='1' type="" name="issue_date" id="issue_date" onchange="progress_settings(this);"> 
            <script>
                 $( function() {
                        $( ".datepick" ).datepicker();

                    });
         	</script>

         	<label>Add Search #Tags</label>
             <span class="fa fa-search icon_pos"></span>
            <input class="form-control other" type="text" name="search" data-val='4' style="padding-left: 30px;padding-top: 8px;" id="category">
        </div>    
    </div>

    <div class="form-group">
     <div class="col-sm-6 col-md-offset-6" style="padding-left: 0px;">
     	<div style="background-color: #f5f5f5">
     		<input  type="text" id="category2" data-role="tagsinput" name= "search_tag" value="Phase4,Location,Pieter" />
     	</div>

     	<form class="image_upload" method="POST" enctype="multipart/form-data">
    		<div class="form-group">
            <div class="col-sm-3" style="padding-left: 0px;">
              <div id="uploader"  onclick="$('#file_1').click()" >
            	<img id="upload_1"  width="70" height="70"  /></div>
            		<input type="file"  id="file_1" 
            onchange="document.getElementById('upload_1').src = window.URL.createObjectURL(this.files[0]);progress_settings(this)" data-val='5'>
            </div>

            <div class="col-sm-3" style="padding-left: 0px;">
            <div id="uploader2"  onclick="$('#file_2').click()" >
            <img id="upload_2"  width="70" height="70" /></div>
            <input type="file" id="file_2"
            onchange="document.getElementById('upload_2').src = window.URL.createObjectURL(this.files[0]);progress_settings(this)" data-val='5'>
            </div>

             <div class="col-sm-3" style="padding-left: 0px;">
              <div id="uploader3"  onclick="$('#file_3').click()" >
            <img id="upload_3"  width="70" height="70" /></div>
            <input type="file" id="file_3"
            onchange="document.getElementById('upload_3').src = window.URL.createObjectURL(this.files[0]);progress_settings(this)" data-val='5'>
            </div>

            <div class="col-sm-3" style="padding-left: 0px;">
                 <div id="uploader4"  onclick="$('#file_4').click()" >
            <img id="upload_4"  width="70" height="70" /></div>
            <input type="file" id="file_4"
            onchange="document.getElementById('upload_4').src = window.URL.createObjectURL(this.files[0]);progress_settings(this)" data-val='5'>
            </div>                                                
    		</div>
   		</form>
    	</div>  
    </div>
    
    <div class="form-group">                            
        <div class="col-sm-12">
            <span class="btn btn-danger btn-fill pull-right" style="background-color: #E75139;border:none;border-radius: 0px;"onclick="next_form_2()">
            <input type="button" value="Cover"/>
             <i class="fa fa-plus" style="-webkit-text-stroke: 1px #E75139;"></i>

            </span> 
                
            <button type="reset" class="btn btn-danger btn-fill pull-right" style="background-color: #E75139;border:none;border-radius: 0px;margin-right: 2vh">Cancel </button>
         </div>
    </div>
</form>
</div>
<div class="content_3">
    <div class="col-md-12">
       <h4 class="title" style="color:#E6523A">SITE SAFETY MANAGEMENT PLAN</h4> 
    </div> 
                          
   <div id="set_slider"></div>
   <div id="set_cover"></div>
   <div class="form-group">
        <div class="col-sm-12">                                  
			<span class="btn btn-danger btn-fill pull-right" style="background-color: #57ACA2;border:none;border-radius: 0px;" onclick="submit_home()">
			<input type="button" value="Create"/>
			<i class="fa fa-plus" style="-webkit-text-stroke: 1px #57ACA2;"></i>
			</span>                                     
			<button type="submit" class="btn btn-danger btn-fill pull-right" style="background-color: #E75139;border:none;border-radius: 0px;margin-right: 2vh" onclick="back_form_2()">Back </button>  
        </div>        
    </div>
</div> <!-- content_3 closed -->

                        </div>
                    </div>
                   

                </div>
            </div>
        </div>


  

    </div>
</div>


</body>



</html>
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
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {    padding: 3px 8px 3px 8px !important;    vertical-align: middle;}
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

var progress = $("#progress"),
    progressMessage = $("#progress-message");

$(document).ready(function()

{
 $("div.bootstrap-tagsinput:eq(1)").css('background-color','#f5f5f5');
 $('.content_2').hide();
  //$('.content_3').hide();
 progress.attr("value", "0");
    progressMessage.text("0% complete");

});


/*  var all=0;
var n = 0;*/

//// progress bar code by Randhir

var status = false;
var imp_obj = new Object;

$(".imp,.other").on('input',function() {

    progress_settings(this);

});

function progress_settings(obj){

    if(!($(obj).attr('id') in imp_obj)){

        var k = $(obj).attr('id');
        imp_obj[k] = $(obj).data('val');
        set_progressbar();
    }else if($(obj).val() == ''){ 

        delete imp_obj[$(obj).attr('id')];
        set_progressbar();
    }
}

function set_progressbar(){

    var total = 0;
    $.each(imp_obj,function(key,value){

        total += value;
    });

    var progress = $("#progress"),
    progressMessage = $("#progress-message");
    progress.attr("value", total);
    progressMessage.text(total+"% complete");
    // console.log(imp_obj);
}
// var files;

// // Add events
// $('input[type=file]').on('change', prepareUpload);

// // Grab the files and set them to our variable
// function prepareUpload(event)
// {
//   files = event.target.files;
// }
var images_temp;

function next_form_2()
{       

var form_data = $(".pro_input").serialize();
    console.log(form_data);

    if(images_temp == "" || project_name_1.value=="" || project_number.value=="" || state_name_hidden.value=="" )
    {   
        alert("Please Enter Project Details (Name, Number,State) with atleast one Image");
        return false;
          
    }
    else if(toggle == 0)
    {
        alert("Project Name already exists..!!");
        return false;
    }
             // $('#loader').show();
           


  


    
    else
    {

         var formData = new FormData($(".pro_input")[0]);


                $.each($('input[type=file]'), function(i, file) {
                    //alert(i);
                formData.append(i, $('input[type=file]')[i].files[0]);     
                // console.log(formData);
                     }); 
                       
                var slide ='<div class="col-sm-3" style="height: 100%;"> <div class="bs-example"> <div id="myCarousel" class="carousel slide" data-ride="carousel"> <ol class="carousel-indicators"> </ol> <div class="carousel-inner"  style="cursor: pointer;"> </div> </div> </div> </div>';
$("#set_slider").html(slide);
            $.ajax({
                url: 'uploaded_image.php',
                type: 'POST',
                data: formData,
                async: false,
                success: function (data) {





                var array = data.split("$");
                    // var html = [];
                    // var html2=[];
                        images_temp=data;
                     $.each(array, function(i, l ){
                     
                        

                        
                         
                      if(i !=0)
                        {
                            $('.carousel-inner').append('<div class="item"> <img src="temp_uploads/'+array[i]+'" alt="First Slide" > </div>');
                            $('.carousel-indicators').append('<li data-target="#myCarousel" data-slide-to="'+i+'" ></li>');
                        
                    }
                    else
                    {
                    
                     $('.carousel-inner').append('<div class="item active"> <img src="temp_uploads/'+array[i]+'" alt="First Slide" > </div>');
                     $('.carousel-indicators').append('<li data-target="#myCarousel" data-slide-to="'+i+'" class="active"></li>');
                        
                     }

                    });
                    // $('.carousel-indicators').html('<li data-target="#myCarousel" data-slide-to="0" ></li><li data-target="#myCarousel" data-slide-to="1" ></li>');
                    // $('.carousel-inner').html('<div class="item active"> <img src="images/thumb_4.png" alt="First Slide" > </div><div class="item"> <img src="images/thumb_5.png" alt="First Slide" > </div>');
                },
                cache: false,
                contentType: false,
                processData: false
            });



    var cover = '<div class="col-sm-6"><div class="col-sm-12 heading"><span style="font-size: 3vh;margin: 0px; font-family:"Helvetica_nue_thin";">'+project_name_1.value+'</span> </div> <div class="col-sm-12 details"> <span>Principal Contractor:</span>&nbsp<span>'+principal_contractor.value+'</span> </div> <div class="col-sm-12 details"> <span>Client Name:</span>&nbsp<span>'+client.value+'</span> </div> <div class="col-sm-12 details"> <span>Project Location:</span>&nbsp<span>'+project_address.value+'</span> </div> <div class="col-sm-12 details"> <span>Project Commencement Date:</span>&nbsp<span>'+commencement_date.value+'</span> </div> <div class="col-sm-12 details"> <span>Site Safety Management Plan Prepared by:</span>&nbsp<span>'+prepared_by.value+'</span> </div> <div class="col-sm-12 details"> <span>Site Safety Management Plan Issued by:</span>&nbsp<span>Robert McGregor</span> </div> <div class="col-sm-12 details"> <span>Date of Issue:</span>&nbsp<span>'+issue_date.value+'</span> </div> </div> <div class="col-sm-3" style=""> <div class="col-sm-4 label label-default tag_project" style="margin-right: 1.5vh;margin-bottom: 2vh"> #'+$("#category2").val()+' </div> </div><div class="col-sm-12" style="margin-top: 5vh;background: #F0F0F0;color: #646464; margin-top: 5vh;font-size: 3vh background: #F0F0F0; color: #646464; padding-top: 2vh; padding-bottom: 2vh;"> SITE SAFETY MANAGEMENT PLAN — ISSUE 12.0 <br> <span style="font-size: 2vh">The personnel below confirm they have read the contents of the Site Safety Management Plan and appendices and understand their roles/responsibilities.</span> </div> <div class="col-sm-12 Response" style="padding: 0;margin-top: 1vh"> <table class="table table-striped"> <thead style="background: #DFDFDF;text-transform: none;"> <tr> <th>Name</th> <th>Position</th> <th>Signature</th> <th>Date</th> </tr> </thead> <tbody> <tr> <th scope="row">'+construction_manager_1.value+'</th> <td>Construction Manager</td> <td></td> <td></td> </tr> <tr> <th scope="row">'+ Safety_manager.value+'</th> <td>National Safety Manager</td> <td></td> <td></td> </tr> <tr> <th scope="row">'+project_manager_1.value+'</th> <td>Project Manager</td> <td></td> <td></td> </tr> <tr> <th scope="row">'+project_engineer_1.value+'</th> <td>Project Engineer</td> <td></td> <td></td> </tr> <tr> <th scope="row">'+site_manager_1.value+'</th> <td>Site Manager</td> <td></td> <td></td> </tr> <tr> <th scope="row">'+foreman.value+'</th> <td>Foreman</td> <td></td> <td></td> </tr> <tr> <th scope="row">'+site_engineer_1.value+'</th> <td>Site Engineer</td> <td></td> <td></td> </tr> <tr> <th scope="row">'+safety_represenative.value+'</th> <td>Health and Safety Representative</td> <td></td> <td></td> </tr> </tbody> </table> </div>';
    $("#set_cover").html(cover);

    
     // $('#loader').hide();
   $('.content:eq(1)').hide();
    $('.content_3').show();
   
}
}
function back_form_2()
{
    $('.content:eq(1)').show();
    $('.content_3').hide();
     progress.attr("value", "20");
    progressMessage.text("20% complete");
}
var toggle=0;
 $(document).on('change','#project_name_1',function(){
    var str=$("#project_name_1").val(); 
    if(str.length <3)
    {
        $("#status").html('Please Enter Minimum 3 Characters...'); 
        toggle =0 ;
    }
    else{
        var url = "ajax_check_project.php";
        $("#status").html('<img src="images/loader.gif" align="absmiddle">&nbsp;Checking availability...'); 

            $.ajax({
              type: "POST",
              url : url,
              data: $("#project_name_1").serialize(),
              success: function(msg)
               {

                    console.log(msg);
                 if(msg == 'done')
                    {               
                        // $("#username").removeClass("red");
                        // $("#username").addClass("green");
                        // $("#suggestname").hide();
                        $("#status").html('Project Name Is Available');
                        toggle=1;
                    }  
                     if(msg == 'another')
                    {  
                         // $("#username").removeClass("green");
                         // $("#username").addClass("red");
                         $("#status").html('Project Name already Exists... Try another?');
                         toggle=0;
                         // $("#suggestname").html('Availble : <a href="">'+msg+'</a>');
                        
                    }   
               }
           });
           }          
        return false;
    });

$(document).ready(function()

{
 $("div.bootstrap-tagsinput:eq(1)").css('background-color','#f5f5f5');
 $('.content_2').hide();
  $('.content_3').hide();
 progress.attr("value", "0");
    progressMessage.text("0% complete");

});


function submit_home()
{
    
    var form_data = $(".pro_input").serialize();
    console.log(form_data);
    
     $.ajax({
                url: 'ajax_create_home.php',
                type: 'POST',
                data: form_data+"&image="+images_temp,
                async: false,
                success: function (data) {
                    alert("Homepage Created Successfully..!!");
                    window.location.href="dashboard.php";
                    // console.log(data);
                }
            });














}
</script>

 <script>
// uploader1
var imageLoader = document.getElementById('file_1');
    imageLoader.addEventListener('change', handleImage, false);

function handleImage(e) {
    
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader img').attr('src',event.target.result);
        $('#upload_1').css('background-image','none');
    }
    reader.readAsDataURL(e.target.files[0]);

    
}

var dropbox;
dropbox = document.getElementById("uploader");
dropbox.addEventListener("dragenter", dragenter, false);
dropbox.addEventListener("dragover", dragover, false);
dropbox.addEventListener("drop", drop, false);

function dragenter(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop(e) {
  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader.files = files;
  $('#upload_1').css('background-image','none');
  $('#desc1').show();
      $('#desc1').attr('required', true);
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
  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader2.files = files;
   $('#desc2').show();
      $('#desc2').attr('required', true);
       $('#upload_2').css('background-image','none');
}
</script>
<script>
// uploader3

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
  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader3.files = files;
   $('#desc3').show();
      $('#desc3').attr('required', true);
       $('#upload_3').css('background-image','none');
}
</script>
<script>
// uploader4

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

var dropbo4;
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
  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader4.files = files;
   $('#desc4').show();
      $('#desc4').attr('required', true);
       $('#upload_4').css('background-image','none');
}

var counter=1;

$('.add_site_manager').click(function () {
   
  //alert("ok");
        $("#new_site_manager").append('<div class="row" id="'+counter+'"><div class="col-sm-6"> <label>Site Manager'+counter+'</label><i class="fa fa-times del_site_manager2" aria-hidden="true" onclick="delete_tags('+counter+')"></i><input class="form-control imp site_manager_extra"  type="text"   input_id="'+counter+'" name="site_manager_extra[]" onchange="array_name('+counter+')"></div><div class="col-sm-6"><label >Phone No.</label><input class="form-control imp site_manager_extra_ph"  type="number" input_id="'+counter+'"   name="site_manager_extra_ph[]" onchange="array_no('+counter+')"></div></div>');

        
  counter++;
});

var idsArray = [], newValues= [];
var idsArray2 = [], newValues2= [];






function delete_tags(id){


	 idsArray = []; newValues= [];
	 idsArray2 = []; newValues2= [];
	$('.site_manager_extra').each(function(){

		if($(this).attr('input_id') == id){

			$(this).val("");
		}
		if($(this).val().trim()!="")
		{
		    idsArray.push($(this).attr('input_id'));
		    newValues.push($(this).val());
		    
		}
	});
	$('#site_manager_extra').val(newValues.join());
	$('.site_manager_extra_ph').each(function(){

		if($(this).attr('input_id') == id){

			$(this).val("");
		}
		if($(this).val().trim()!="")
		{
		    idsArray2.push($(this).attr('input_id'));
		    newValues2.push($(this).val());
		    
		}
	});

$('#site_manager_extra_ph').val(newValues2.join());
	$("#"+id).html("");
	
}
// $('.del_site_manager2').click(function () {
   
//   alert("ok");
//         // $("#new_site_manager").last().remove();

        
  
// });


</script>

<style>
    .form-group
    {
        margin-bottom: 0;
    }
</style>