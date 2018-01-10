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
                            <div class="col-md-8">
                                <h4 class="title" style="color:#5B6672;">Management Plans Cover Page</h4>
                                <!-- <p class="category">24 Hours performance</p> -->
                            </div>
                             <!-- <div class="col-md-4">
                                <h4 class="title">Safety Management Report</h4>
                               
                            </div> -->
                             <div class="col-md-4">
                                 <div class="progress-wrap">
                                <progress max="100" value="0" id="progress"></progress>
                                    <div class="progress-message" id="progress-message" style="font-size: 2vh"><!-- 20% complete --></div>
                                </div>
                            </div>
                             <!-- <div class="col-md-4">
                                   <h4 class="main_title">Management Plans Cover Page</h4>
                            </div> -->
                            <div class="col-md-12">
                                <!-- <h4 class="title" style="color:#E6523A">SITE SAFETY MANAGEMENT PLAN</h4> -->
                                <!-- <p class="category">24 Hours performance</p> -->
                            <!-- </div> -->
                            </div>
                            </div>

                            <div class="content" style="">
                            <form class="pro_input" method="POST" enctype="multipart/form-data">
                            <div class="col-sm-6">
                            <div class="form-group">
                                    
                                    <label>Project Name</label>
                                    <input class="form-control imp" data-val='4' type=""  id="project_name_1" name="project_name_1">
                                    
                            </div>

                            <div class="form-group">
                                    
                                    <label>Principal Contractor</label>
                                    <input class="form-control other" data-val='2' id="principal_contractor" name="principal_contractor">
                                    
                            </div>

                            <div class="form-group">
                                    
                                    <label>Project Address</label>
                                    <input class="form-control other" data-val='2' type="" name="project_address" id="project_address">
                                    
                            </div>

                              <div class="form-group">
                                    
                                    <label>Project State</label>
                                    <input type="text" name="state_name_hidden" id="state_name_hidden" hidden>
                                   <select style="height: 34px;display: block;width: 100%;padding-left:20px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: ##E3E3E2;outline:none;background-image: none;border: 1px solid #eee;border-radius: 20vh;" id="select" class="imp" onchange ="select2(this)" name="select_employer" data-val='4'>
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

                            <div class="form-group">
                                    
                                    <label >Project Director / Construction Manager</label>
                                    <input class="form-control imp" data-val='4' type="" id="construction_manager_1" name="construction_manager_1">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label >Project Manager</label>
                                    <input class="form-control imp" data-val='4' type=""  id="project_manager_1" name="project_manager_1">
                                    
                            </div>
                           
                            <div class="form-group ">
                                    
                                    <label>Project Engineer</label>
                                    <input class="form-control imp" data-val='4' type="" id="project_engineer_1" name="project_engineer_1">
                                    </div>

                                    <div class="form-group ">
                                    <label>Site Manager</label>
                                    <input class="form-control imp" data-val='4' type=""  id="site_manager_1" name="site_manager_1">
                                    </div>
                           
                            <div class="form-group">
                                    
                                    <label>Foreman</label>
                                    <input class="form-control other" data-val='2' type="text"  id="foreman" name="foreman">
                                    
                            </div>

                            <div class="form-group">
                                    
                                    <label>Site Engineer</label>
                                    <input class="form-control other" data-val='4' type="" name="site_engineer_1" id="site_engineer_1">
                                    
                            </div>

                             <div class="form-group">
                                    
                                    <label>National Safety Manager</label>
                                    <input class="form-control other" data-val='1' type="" name="Safety_manager" id="Safety_manager">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Health and Safety Representative</label>
                                    <input class="form-control other" data-val='2' type="" name="safety_represenative" id="safety_represenative">
                                    
                            </div>

                            <div class="form-group" style="position: relative;margin-bottom: 0px">
                                    
                                   <label>Contracts Administrator</label>
                                    <input class="form-control other" data-val='1' type="" name="contract_admin" id="contract_admin"> 
                                   
                            </div>

                             <div class="form-group" style="position: relative;margin-bottom: 0px">
                                    
                                   <label>Brief Scope</label>
                                    <input class="form-control other" data-val='1' type="" name="brief_scope" id="brief_scope"> 
                                   
                            </div>

                            <div class="form-group">
                                    
                                    <label>Project Scope</label>
                                    <!-- <input class="form-control  " data-val='2' type="" name="project_scope" id="project_scope">  -->

                                    <textarea  data-val='2' class="form-control instruction_area other" rows="20" id="project_scope" name="project_scope" style="-webkit-border-radius: 15px !important;-moz-border-radius: 15px !important;border-radius: 15px !important;font-size: 12px " ></textarea>
                                    
                            </div>

                            

                            

                             
                            

                          

                          

                            


                             

                           
                            
                             
                            
                            <!-- <div class="form-group">
                                    
                                    <label>Emergency Response Procedure</label>
                                    <input class="form-control other" data-val='2' type="" name="response_procedure" id="response_procedure">
                                    
                            </div>
                             <div class="form-group">
                                    
                                    <label>Project Emergency Hazards</label>
                                    <input class="form-control other" data-val='2' type="" name="emergency_hazard" id="emergency_hazard">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Emergency Response Team</label>
                                    <input class="form-control other" data-val='2' type="" name="response_team" id="response_team">
                                    
                            </div>
                            

                            <div class="form-group">
                                    
                                    <label>Emergency Co-ordination Procedure</label>
                                    <input class="form-control other" data-val='2' type="" name="coordination_procedure" id="coordination_procedure">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Emergency Evacuation Diagrams and Signs</label>
                                    <input class="form-control other" data-val='2' type="" name="diagrams_sign" id="diagrams_sign">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Emergency Response Equipment</label>
                                    <input class="form-control other" data-val='2' type="" name="response_equipment" id="response_equipment">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Emergency and Evacuation Practice Drills</label>
                                    <input class="form-control other" data-val='2' type="" name="evacuation_drill" id="evacuation_drill">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Emergency Response Processes</label>
                                    <input class="form-control other" data-val='2' type="" name="response_process" id="response_process">
                                    
                            </div>

                            <div class="form-group">
                                    
                                    <label>Post Emergency Management</label>
                                    <input class="form-control other" data-val='2' type="" name="emergency_management" id="emergency_management">
                                    
                            </div>
                           -->

                            

                             
                            
                            </div>

                            <div class="col-sm-5">

                                <!-- <div class="form-group">
                            
                                    <div class="col-sm-12">
                                    <button type="submit" class="btn btn-danger btn-fill pull-right" style="background-color: #E75139;border:none;border-radius: 0px">Create <i class="fa fa-plus"></i></button>
                                    </div>
                                </div> -->
                               
                            <div class="form-group">
                                    
                                    <label>Project Number</label>
                                    <input class="form-control other" type="" data-val='2' name="project_number" id="project_number">
                                    
                            </div>

                            <div class="form-group">
                                    
                                    <label>Client Name</label>
                                    <input class="form-control other" data-val='2' type="" name="client" id="client">
                                    
                            </div>

                             <div class="form-group">
                                    
                                    <label>Tenant Name</label>
                                    <input class="form-control other" data-val='2' type="" name="tenant" id="tenant">
                                    
                            </div>
                            
                           <div class="form-group">
                                    
                                    <label>DA Working Hours</label>
                                    <input class="form-control other" data-val='2' type="" name="da_working" id="da_working">
                                    
                            </div>

                             <div class="form-group">
                                    <div class="col-sm-6" style="padding-left: 0">
                                    <label>Project Commencement Date</label>
                                   
                                    <input class="form-control other datepick" data-val='2' type="" name="commencement_date" id="commencement_date" onchange="progress_settings(this);"> 


                                    <script>
                                         $( function() {
                                                $( ".datepick" ).datepicker();
     
                                            });
                                 </script>
                                    </div>
                            <!-- </div>

                            <div class="form-group"> -->
                                     <div class="col-sm-6" style="padding-right: 0">
                                    <label>Project Completion Date</label>
                                   
                                    <input class="form-control other datepick" data-val='2' type="" name="completion_date" id="completion_date" onchange="progress_settings(this);"> 


                                    <script>
                                         $( function() {
                                                $( ".datepick" ).datepicker();
     
                                            });
                                 </script>
                                   </div> 
                            </div>

                            <div class="form-group">
                                    
                                    <label>Total Months</label>
                                    <input class="form-control other" data-val='1' type="" name="total_months" id="total_months">
                                    
                            </div>
                            
                            <div class="form-group">
                                    
                                    <label>External Emergency Contact Numbers</label>
                                    <!-- <input class="form-control other" data-val='2' type="" name="external_contact_number" id="external_contact_number"> -->


                                    <table class="table table table-bordered scroll table-curved" id="visitor_table">
  <thead style="background-color: #E3E3E2">
    <tr>
      <th><div style="">Emergency Contact Name</div></th>
      <th><div style="">Contact Number</div></th>
    </tr>
  </thead>
  
  <tbody style="background-color: #E3E3E2">
    <tr>
      <th><div style=""><label>Police/ Ambulance/ Fire Brigade</label></div></th>
      <td ><div style=""><label>000</label></div></td>
     
    </tr>
    <tr>
      <th><div style=""><label>Local Hospital</label></div></th>
      <td><div style=""><input class="form-control other" data-val='2' type="number" name="local_hospital" id="local_hospital"></div></td>
      
    </tr>
    <tr>
     <th><div style=""><label>Water Supply</label></div></th>
      <td><div style=""><input class="form-control other" data-val='2' type="number" name="water_supply" id="water_supply"></div></td>
      
    </tr>
    <tr>
      <th><div style=""><label>Gas Supply</label></div></th>
      <td><div style=""><input class="form-control other" data-val='2' type="number" name="gas_supply" id="gas_supply"></div></td>
    </tr>
    <tr>
      <th><div style=""><label>Electricity Supply</label></div></th>
      <td><div style=""><input class="form-control other" data-val='2' type="number" name="electricity_supply" id="electricity_supply"></div></td>
    </tr>
    <tr>
      <th><div style=""><label>Poisons Information</label></div></th>
      <td><div style=""><label>131 126</label></div></td>
    </tr>
       <tr>
      <th><div style=""><label>State Emergency Services</label></div></th>
      <td><div style=""><label>131 126</label></div></td>
    </tr>
    <tr>
      <th><div style=""><label>Local Council</label></div></th>
      <td><div style=""><input class="form-control other" data-val='2' type="number" name="local_council" id="local_council"></div></td>
    </tr>
    <tr>
      <th><div style=""><label>WHS Regulator</label></div></th>
      <td><div style=""><input class="form-control other" data-val='2' type="number" name="whs_regulator" id="whs_regulator"></div></td>
    </tr>
    <tr>
      <th><div style=""><label>Local EPA</label></div></th>
      <td><div style=""><input class="form-control other" data-val='2' type="number" name="local_epa" id="local_epa"></div></td>
    </tr>
  </tbody>
 
</table>
                                    
                            </div>










                            
                            
                            <div class="form-group">
                                    
                                    <label>CIP Director</label>
                                    <input class="form-control other" data-val='2' type="" name="cip_director1" id="cip_director1">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>CIP Director</label>
                                    <input class="form-control other" data-val='2' type="" name="cip_director2" id="cip_director2">
                                    
                            </div>
                            
                            
                            <div class="form-group">
                                    
                                    <label>CIP Director</label>
                                    <input class="form-control other" data-val='2' type="" name="cip_director3" id="cip_director3">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>CIP Director</label>
                                    <input class="form-control other" data-val='2' type="" name="cip_director4" id="cip_director4">
                                    
                            </div>
                              <div class="form-group">
                                    
                                    <label>Management Plan Prepared by</label>
                                    <input class="form-control other" data-val='2' type="" name="prepared_by" id="prepared_by">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Management Plan Issue Date</label>
                                    <input class="form-control other datepick" data-val='2' type="" name="issue_date" id="issue_date" onchange="progress_settings(this);"> 


                                    <script>
                                         $( function() {
                                                $( ".datepick" ).datepicker();
     
                                            });
                                 </script>
                                    
                            </div>
                           
                           
                            
                            
                           <div class="form-group" style="position: relative;margin-bottom: 0px">
                                    
                                    <label>Add Search #Tags</label>
                                     <span class="fa fa-search icon_pos"></span>
                                    <input class="form-control other" type="text" name="" data-val='2' style="padding-left: 30px;padding-top: 8px;" id="category">
                                   
                            </div>
                            <div class="form-group" style="background-color: #f5f5f5">
                                    
                                    <input  type="text" id="category2" data-role="tagsinput" name= "search_tag"value="Phase4,Location,Pieter" /> 
                                    
                            </div>

                            
                            
                            <form class="image_upload" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                    <div class="form-group col-sm-3" style="padding-left: 0px;">
                                      <div id="uploader"  onclick="$('#file_1').click()" >
                                    <img id="upload_1"  width="70" height="70"  /></div>
                                    <input type="file"  id="file_1" 
                                    onchange="document.getElementById('upload_1').src = window.URL.createObjectURL(this.files[0]);progress_settings(this)" data-val='5'>
                                    </div>

                                    <div class="form-group col-sm-3" style="padding-left: 0px;">
                                    <div id="uploader2"  onclick="$('#file_2').click()" >
                                    <img id="upload_2"  width="70" height="70" /></div>
                                    <input type="file" id="file_2"
                                    onchange="document.getElementById('upload_2').src = window.URL.createObjectURL(this.files[0]);progress_settings(this)" data-val='5'>
                                    </div>
                                     <div class="form-group col-sm-3" style="padding-left: 0px;">
                                      <div id="uploader3"  onclick="$('#file_3').click()" >
                                    <img id="upload_3"  width="70" height="70" /></div>
                                    <input type="file" id="file_3"
                                    onchange="document.getElementById('upload_3').src = window.URL.createObjectURL(this.files[0]);progress_settings(this)" data-val='5'>
                                    </div>
                                    <div class="form-group col-sm-3" style="padding-left: 0px;">
                                         <div id="uploader4"  onclick="$('#file_4').click()" >
                                    <img id="upload_4"  width="70" height="70" /></div>
                                    <input type="file" id="file_4"
                                    onchange="document.getElementById('upload_4').src = window.URL.createObjectURL(this.files[0]);progress_settings(this)" data-val='5'>
                                    </div>
                                    
                                    
                                                                        
                            </div>
                           </form>
                          
                            </div>
                            <div class="form-group">
                            
                                    <div class="col-sm-12">
                                    
                                    <!-- <input type="button" value="Cover" id="cover"  class="btn btn-danger btn-fill pull-right " style="background-color: #E75139;border:none;border-radius: 0px;"onclick="next_form_2()">
                                    <i class="fa fa-plus" style="-webkit-text-stroke: 1px #E75139;"></i> -->
                                    <!-- <span id="loader" style="display: none"><img src="images/loader3.gif" style="float: right;
    height: 20px;
    margin: 10px;
"></span> -->
                                    <span class="btn btn-danger btn-fill pull-right" style="background-color: #E75139;border:none;border-radius: 0px;"onclick="next_form_2()">
                                    <input type="button" value="Cover"/>
                                     <i class="fa fa-plus" style="-webkit-text-stroke: 1px #E75139;"></i>

                                    </span> 
                                        
                                    <button type="reset" class="btn btn-danger btn-fill pull-right" style="background-color: #E75139;border:none;border-radius: 0px;margin-right: 2vh">Cancel </button>
                                  
                                    </div>
                                    
                                </div>
                              
                          
                                </form>
                                <form class="">
                                    

                                    

                                    

                                    

                                    

                                    
                                    <div class="clearfix"></div>
                                </form>
                            </div>

                                


                      


                            <div class="content_3">
                                 <div class="col-md-12">
                                 <h4 class="title" style="color:#E6523A">SITE SAFETY MANAGEMENT PLAN</h4> 
                                <!-- <p class="category">24 Hours performance</p> -->
                            </div> 
                           
                          
                           <div id="set_slider"></div>
                            <div id="set_cover"></div>
                           
                            <div class="form-group">
                            
                                    <div class="col-sm-12">
                                    
                                    <!-- <button type="submit" class="btn btn-danger btn-fill pull-right" style="background-color: #57ACA2;border:none;border-radius: 0px;">Create<i class="fa fa-plus" style="-webkit-text-stroke: 1px #57ACA2;"></i></button> -->
                                    
                                     <span class="btn btn-danger btn-fill pull-right" style="background-color: #57ACA2;border:none;border-radius: 0px;" onclick="submit_home()">
                                    <input type="button" value="Create"/>
                                     <i class="fa fa-plus" style="-webkit-text-stroke: 1px #57ACA2;"></i>
                                    </span> 


                                    
                                    <button type="submit" class="btn btn-danger btn-fill pull-right" style="background-color: #E75139;border:none;border-radius: 0px;margin-right: 2vh" onclick="back_form_2()">Back </button>
                                  
                                    </div>
                                    
                                </div>
                                <form>
                                    

                                    

                                    

                                    

                                    

                                    
                                    <div class="clearfix"></div>
                                </form>
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
}
.form-control:focus {
    background-color: #E3E3E2;
    border: none;
    outline: none;
     -webkit-box-shadow: none;
    box-shadow: none;
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
        top: 59%;
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


</style>

                            </div>
<style>


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
    text-align: center;
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

             // $('#loader').show();
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


  


    var form_data = $(".pro_input").serializeArray();
    // console.log(form_data);

    if(images_temp == "" || form_data[0].value=="" || form_data[16].value=="" || form_data[3].value=="" )
    {   
        alert("Please Enter Project Details (Name, Number,State) with atleast one Image");
        return false;
          
    }
    else
    {

        
    var cover = '<div class="col-sm-6"><div class="col-sm-12 heading"><span style="font-size: 3vh;margin: 0px; font-family:"Helvetica_nue_thin";">'+form_data[0].value+'</span> </div> <div class="col-sm-12 details"> <span>Principal Contractor:</span>&nbsp<span>'+form_data[1].value+'</span> </div> <div class="col-sm-12 details"> <span>Client Name:</span>&nbsp<span>'+form_data[17].value+'</span> </div> <div class="col-sm-12 details"> <span>Project Location:</span>&nbsp<span>'+form_data[2].value+'</span> </div> <div class="col-sm-12 details"> <span>Project Commencement Date:</span>&nbsp<span>'+form_data[20].value+'</span> </div> <div class="col-sm-12 details"> <span>Site Safety Management Plan Prepared by:</span>&nbsp<span>'+form_data[34].value+'</span> </div> <div class="col-sm-12 details"> <span>Site Safety Management Plan Issued by:</span>&nbsp<span>Robert McGregor</span> </div> <div class="col-sm-12 details"> <span>Date of Issue:</span>&nbsp<span>'+form_data[35].value+'</span> </div> </div> <div class="col-sm-3" style=""> <div class="col-sm-4 label label-default tag_project" style="margin-right: 1.5vh;margin-bottom: 2vh"> #'+form_data[36].value+' </div> </div><div class="col-sm-12" style="margin-top: 5vh;background: #F0F0F0;color: #646464; margin-top: 5vh;font-size: 3vh background: #F0F0F0; color: #646464; padding-top: 2vh; padding-bottom: 2vh;"> SITE SAFETY MANAGEMENT PLAN — ISSUE 12.0 <br> <span style="font-size: 2vh">The personnel below confirm they have read the contents of the Site Safety Management Plan and appendices and understand their roles/responsibilities.</span> </div> <div class="col-sm-12 Response" style="padding: 0;margin-top: 1vh"> <table class="table table-striped"> <thead style="background: #DFDFDF;text-transform: none;"> <tr> <th>Name</th> <th>Position</th> <th>Signature</th> <th>Date</th> </tr> </thead> <tbody> <tr> <th scope="row">'+form_data[5].value+'</th> <td>Construction Manager</td> <td></td> <td></td> </tr> <tr> <th scope="row">'+form_data[11].value+'</th> <td>National Safety Manager</td> <td></td> <td></td> </tr> <tr> <th scope="row">'+form_data[6].value+'</th> <td>Project Manager</td> <td></td> <td></td> </tr> <tr> <th scope="row">'+form_data[7].value+'</th> <td>Project Engineer</td> <td></td> <td></td> </tr> <tr> <th scope="row">'+form_data[8].value+'</th> <td>Site Manager</td> <td></td> <td></td> </tr> <tr> <th scope="row">'+form_data[9].value+'</th> <td>Foreman</td> <td></td> <td></td> </tr> <tr> <th scope="row">'+form_data[10].value+'</th> <td>Site Engineer</td> <td></td> <td></td> </tr> <tr> <th scope="row">'+form_data[12].value+'</th> <td>Health and Safety Representative</td> <td></td> <td></td> </tr> </tbody> </table> </div>';
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

// $('#project_name_1').on('input', function() 
// {     
// $( "#project_name_2" ).val(this.value);
// });
// $('#project_name_2').on('input', function() 
// {     
// $( "#project_name_1" ).val(this.value);
// });

// $('#construction_manager_1').on('input', function() 
// {     
// $( "#construction_manager_2" ).val(this.value);
// });
// $('#construction_manager_2').on('input', function() 
// {     
// $( "#construction_manager_1" ).val(this.value);
// });

// $('#site_engineer_1').on('input', function() 
// {     
// $( "#site_engineer_2" ).val(this.value);
// });
// $('#site_engineer_2').on('input', function() 
// {     
// $( "#site_engineer_1" ).val(this.value);
// });


// $('#site_manager_1').on('input', function() 
// {     
// $( "#site_manager_2" ).val(this.value);
// });
// $('#site_manager_2').on('input', function() 
// {     
// $( "#site_manager_1" ).val(this.value);
// });


// $('#project_engineer_1').on('input', function() 
// {     
// $( "#project_engineer_2" ).val(this.value);
// });
// $('#project_engineer_2').on('input', function() 
// {     
// $( "#project_engineer_1" ).val(this.value);
// });

// $('#project_manager_1').on('input', function() 
// {     
// $( "#project_manager_2" ).val(this.value);
// });
// $('#project_manager_2').on('input', function() 
// {     
// $( "#project_manager_1" ).val(this.value);
// });
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
    
    var form_data = $(".pro_input").serializeArray();
    // console.log(form_data);
    
     $.ajax({
                url: 'ajax_create_home.php',
                type: 'POST',
                data: {form: form_data, image: images_temp},
                async: false,
                success: function (data) {
                    alert("Homepage Created Successfully");
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
}
</script>
