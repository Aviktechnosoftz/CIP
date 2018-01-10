<?include('sidepanel.php') ?>
<?//include('sidepanel.php') ?>



        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12" style="padding: 0">
                        <div class="card">
                            <div class="header">
                            <div class="col-md-4">
                                <h4 class="title" style="color:#5B6672;">Home Page</h4>
                                <!-- <p class="category">24 Hours performance</p> -->
                            </div>
                             <div class="col-md-4">
                                <h4 class="title">Safety Management Report</h4>
                                <!-- <p class="category">24 Hours performance</p> -->
                            </div>
                             <div class="col-md-4">
                                 <div class="progress-wrap">
                                <progress max="100" value="0" id="progress"></progress>
                                    <div class="progress-message" id="progress-message" style="font-size: 2vh"><!-- 20% complete --></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <!-- <h4 class="title" style="color:#E6523A">SITE SAFETY MANAGEMENT PLAN</h4> -->
                                <!-- <p class="category">24 Hours performance</p> -->
                            <!-- </div> -->
                            </div>
                            </div>
                            <div class="content" style="">
                            <form class="pro_input" method="POST">
                            <div class="col-sm-6">
                            <div class="form-group">
                                    
                                    <label>Project Name</label>
                                    <input class="form-control imp" type=""  id="project_name_1" name="project_name_1">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label >Construction Manager</label>
                                    <input class="form-control other" type=""  id="construction_manager_1" name="construction_manager_1">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label >Project Manager</label>
                                    <input class="form-control other" type=""  id="project_manager_1" name="project_manager_1">
                                    
                            </div>
                           
                            <div class="form-group ">
                                    <div class="form-group col-sm-6" style="padding-left: 0px;">
                                    <label>Project Engineer</label>
                                    <input class="form-control other" type="" name="" id="project_engineer_1" name="project_engineer_1">
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <label>Site Manager</label>
                                    <input class="form-control other" type="" name="" id="site_manager_1" name="site_manager_1">
                                    </div>
                            </div>
                            <div class="form-group">
                                    
                                    <label>Foreman</label>
                                    <input class="form-control other" type="" name="" id="foreman" name="foreman">
                                    
                            </div>
                             <div class="form-group">
                                    
                                    <label>Health and Safety Manager</label>
                                    <input class="form-control other" type="" name="Safety_manager" id="Safety_manager">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Site Engineer</label>
                                    <input class="form-control other" type="" name="site_engineer_1" id="site_engineer_1">
                                    
                            </div>
                             <div class="form-group">
                                    
                                    <label>Project Personnel Emergency Numbers</label>
                                    <input class="form-control other" type="" name="project_personal_number" id="project_personal_number">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>External Emergency Contact Numbers</label>
                                    <input class="form-control other" type="" name="external_contact_number" id="external_contact_number">
                                    
                            </div>
                             <div class="form-group">
                                    
                                    <label>Emergency Evacuation</label>
                                    <input class="form-control other" type="" name="emergency_evacuation" id="emergency_evacuation">
                                    
                            </div>
                            
                            <div class="form-group">
                                    
                                    <label>Emergency Response Procedure</label>
                                    <input class="form-control other" type="" name="response_procedure" id="response_procedure">
                                    
                            </div>
                             <div class="form-group">
                                    
                                    <label>Project Emergency Hazards</label>
                                    <input class="form-control other" type="" name="emergency_hazard" id="emergency_hazard">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Emergency Response Team</label>
                                    <input class="form-control other" type="" name="response_team" id="response_team">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Duties of Emergency Response Team</label>
                                    <input class="form-control other" type="" name="duties_response_team" id="duties_response_team">
                                    
                            </div>

                            <div class="form-group">
                                    
                                    <label>Emergency Co-ordination Procedure</label>
                                    <input class="form-control other" type="" name="coordination_procedure" id="coordination_procedure">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Emergency Evacuation Diagrams and Signs</label>
                                    <input class="form-control other" type="" name="diagrams_sign" id="diagrams_sign">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Emergency Response Equipment</label>
                                    <input class="form-control other" type="" name="response_equipment" id="response_equipment">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Emergency and Evacuation Practice Drills</label>
                                    <input class="form-control other" type="" name="evacuation_drill" id="evacuation_drill">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Emergency Response Processes</label>
                                    <input class="form-control other" type="" name="response_process" id="response_process">
                                    
                            </div>

                            <div class="form-group">
                                    
                                    <label>Post Emergency Management</label>
                                    <input class="form-control other" type="" name="emergency_management" id="emergency_management">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Emergency Response</label>
                                    <input class="form-control other" type="" name="emergency_response" id="emergency_response">
                                    
                            </div>

                            

                             
                            
                            </div>
                            <div class="col-sm-5">
                                <!-- <div class="form-group">
                            
                                    <div class="col-sm-12">
                                    <button type="submit" class="btn btn-danger btn-fill pull-right" style="background-color: #E75139;border:none;border-radius: 0px">Create <i class="fa fa-plus"></i></button>
                                    </div>
                                </div> -->
                               
                            <div class="form-group">
                                    
                                    <label>Project Number</label>
                                    <input class="form-control imp" type="" name="project_number" id="project_number">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Principal Contractor</label>
                                    <input class="form-control other" type="principal_contractor" name="principal_contractor">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Client</label>
                                    <input class="form-control other" type="" name="client" id="client">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Project Address</label>
                                    <input class="form-control imp" type="" name="project_address" id="project_address">
                                    
                            </div>
                            
                            
                            <div class="form-group">
                                    
                                    <label>Commencement Address</label>
                                    <input class="form-control other" type="" name="commencement_address" id="commencement_address">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Name</label>
                                    <input class="form-control other" type="" name="name" id="name">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Issue Date</label>
                                    <input class="form-control other" type="" name="issue_date" id="issue_date"> 
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Construction Manager</label>
                                    <input class="form-control other" type="" name="construction_manager_2" id="construction_manager_2">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Project Manager</label>
                                    <input class="form-control other" type="" name="project_manager_2" id="project_manager_2">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Project Engineer</label>
                                    <input class="form-control other" type="" name="project_engineer_2" id="project_engineer_2">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Site Manager</label>
                                    <input class="form-control other" type="" name="site_manager_2" id="site_manager_2">
                                    
                            </div>
                           
                            <div class="form-group">
                                    
                                    <label>Site Engineer</label>
                                    <input class="form-control other" type="site_engineer_2" name="" id="site_engineer_2">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Health and Safety Representative</label>
                                    <input class="form-control other" type="" name="safety_represenative" id="safety_represenative">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Project Scope</label>
                                    <input class="form-control other" type="" name="project_scope" id="project_scope"> 
                                    
                            </div>
                             <div class="form-group" style="position: relative;margin-bottom: 0px">
                                    
                                    <label>Add Search #Tags</label>
                                     <span class="fa fa-search icon_pos"></span>
                                    <input class="form-control other" type="text" name="" style="padding-left: 30px;padding-top: 8px;" id="category">
                                   
                            </div>
                            <div class="form-group" style="background-color: #f5f5f5">
                                    
                                    <input  type="text" id="category2" data-role="tagsinput" value="Phase4,Location,Pieter" /> 
                                    
                            </div>
                            <div class="form-group">
                                    <div class="form-group col-sm-3" style="padding-left: 0px;">
                                    <img id="upload_1"  width="70" height="70"  onclick="get_image(1)" />
                                    <input type="file"  id="file_1" 
                                    onchange="document.getElementById('upload_1').src = window.URL.createObjectURL(this.files[0])">
                                    </div>

                                    <div class="form-group col-sm-3" style="padding-left: 0px;">
                                    <img id="upload_2"  width="70" height="70" onclick="get_image(2)" />
                                    <input type="file" id="file_2"
                                    onchange="document.getElementById('upload_2').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                     <div class="form-group col-sm-3" style="padding-left: 0px;">
                                    <img id="upload_3"  width="70" height="70" onclick="get_image(3)" />
                                    <input type="file" id="file_3"
                                    onchange="document.getElementById('upload_3').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    <div class="form-group col-sm-3" style="padding-left: 0px;">
                                    <img id="upload_4"  width="70" height="70"  onclick="get_image(4)"/>
                                    <input type="file" id="file_4"
                                    onchange="document.getElementById('upload_4').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    
                                    
                                                                        
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

</style>
                            
                            </div>
                            <div class="form-group">
                            
                                    <div class="col-sm-12">
                                    
                                    <!-- <input type="button" value="Cover" id="cover"  class="btn btn-danger btn-fill pull-right " style="background-color: #E75139;border:none;border-radius: 0px;"onclick="next_form_2()">
                                    <i class="fa fa-plus" style="-webkit-text-stroke: 1px #E75139;"></i> -->

                                    <span class="btn btn-danger btn-fill pull-right" style="background-color: #E75139;border:none;border-radius: 0px;"onclick="next_form_2()">
                                    <input type="button" value="Cover"/>
                                     <i class="fa fa-plus" style="-webkit-text-stroke: 1px #E75139;"></i>
                                    </span> 
                                    
                                    <button type="reset" class="btn btn-danger btn-fill pull-right" style="background-color: #E75139;border:none;border-radius: 0px;margin-right: 2vh">Cancel </button>
                                  
                                    </div>
                                    
                                </div>
                              
                            </div>
                            <form>
                                    

                                    

                                    

                                    

                                    

                                    
                                    <div class="clearfix"></div>
                                </form>

                                </form>


                            <div class="content_3">
                            <form method="POST" class="summary">
                                 <div class="col-md-12">
                                 <h4 class="title" style="color:#E6523A">SITE SAFETY MANAGEMENT PLAN</h4> 
                                <!-- <p class="category">24 Hours performance</p> -->
                            </div> 
                           
                          
                            <div class="col-sm-3" style="height: 100%;">
                                <div class="bs-example">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                    </ol>   
                                    <!-- Wrapper for carousel items -->
                                    <div class="carousel-inner" onclick="window.location.href='site_management_plan.php'" style="cursor: pointer;">
                                        <div class="item active">
                                            <img src="images/project_slide.png" alt="First Slide" >

                                        </div>
                                        <div class="item">
                                            <img src="images/project_slide.png" alt="Second Slide">
                                        </div>
                                        <div class="item">
                                            <img src="images/project_slide.png" alt="Third Slide">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-12 heading">
                                    <span style="    font-size: 3vh;
                                    margin: 0px;
                                    font-family:'Helvetica_nue_thin';">Project Name</span>      
                                </div>
                                  <div class="col-sm-12 details">
                                    <span>Principal Contractor:</span>&nbsp<span>[PRINCIPAL CONTRACTOR]</span>      
                                </div>
                                <div class="col-sm-12 details">
                                    <span>Client Name:</span>&nbsp<span>[CLIENT]</span>      
                                </div>
                                <div class="col-sm-12 details">
                                    <span>Project Location:</span>&nbsp<span>[PROJECT ADDRESS]</span>      
                                </div>
                                 <div class="col-sm-12 details">
                                    <span>Project Commencement Date:</span>&nbsp<span>[COMMENCEMENT ADDRESS]</span>      
                                </div>
                                <div class="col-sm-12 details">
                                    <span>Site Safety Management Plan Prepared by:</span>&nbsp<span>[COMMENCEMENT ADDRESS]</span>      
                                </div>
                                <div class="col-sm-12 details">
                                    <span>Site Safety Management Plan Issued by:</span>&nbsp<span>Robert McGregor</span>      
                                </div>
                                <div class="col-sm-12 details">
                                    <span>Date of Issue:</span>&nbsp<span>[ISSUE DATE]</span>      
                                </div>
                            </div>
                            <div class="col-sm-3" style="">
                               <div class="col-sm-4 label label-default tag_project" style="margin-right: 1.5vh;margin-bottom: 2vh">#In progress</div>
                               <div class="col-sm-4 label label-default tag_project" style="margin-right: 1.5vh;margin-bottom: 2vh">#Tags</div>
                               <div class="col-sm-4 label label-default tag_project" style="margin-right: 1.5vh;margin-bottom: 2vh">#Technopark</div>
                                <div class="col-sm-4 label label-default tag_project" style="margin-right: 1.5vh;margin-bottom: 2vh">#Phase3</div>
                            </div>

                            <div class="col-sm-12" style="margin-top: 5vh;background: #F0F0F0;color: #646464;    margin-top: 5vh;font-size: 3vh
    background: #F0F0F0;
    color: #646464;
    padding-top: 2vh;
    padding-bottom: 2vh;">
                                SITE SAFETY MANAGEMENT PLAN — ISSUE 12.0 <br>
                                 <span style="font-size: 2vh">The personnel below confirm they have read the contents of the Site Safety Management Plan and appendices and understand their roles/responsibilities.</span>
                            </div>
                            <div class="col-sm-12 Response" style="padding: 0;margin-top: 1vh">
                                <table class="table table-striped">
  <thead style="background: #DFDFDF;text-transform: none;">
    <tr>
      <th>Name</th>
      <th>Position</th>
      <th>Signature</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">[INSERT NAME]</th>
      <td>Construction Manager</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">[INSERT NAME]</th>
      <td>National Safety Manager</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">[INSERT NAME]</th>
      <td>Project Manager</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">[INSERT NAME]</th>
      <td>Project Engineer</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">[INSERT NAME]</th>
      <td>Site Manager</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">[INSERT NAME]</th>
      <td>Foreman</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">[INSERT NAME]</th>
      <td>Site Engineer</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">[INSERT NAME]</th>
      <td>Health and Safety Representative</td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>
                            </div>
                            
                           
                            <div class="form-group">
                            
                                    <div class="col-sm-12">
                                    
                                <!--     <button class="btn btn-danger btn-fill pull-right" style="background-color: #57ACA2;border:none;border-radius: 0px;">Create<i class="fa fa-plus" style="-webkit-text-stroke: 1px #57ACA2;"></i></button> -->
                                    
                                     <span class="btn btn-danger btn-fill pull-right" style="background-color: #57ACA2;border:none;border-radius: 0px;">
                                    <input type="button" value="Create"/>
                                     <i class="fa fa-plus" style="-webkit-text-stroke: 1px #57ACA2;"></i>
                                    </span> 
                                    
                                    <!-- <button  class="btn btn-danger btn-fill pull-right" style="background-color: #E75139;border:none;border-radius: 0px;margin-right: 2vh" onclick="back_form_2()">Back </button> -->

                                    <span class="btn btn-danger btn-fill pull-right" style="background-color: #E75139;border:none;border-radius: 0px;margin-right: 2vh" onclick="back_form_2()">
                                    <input type="button" value="Back"/>
                                     
                                    </span> 
                                    
                                  
                                    </div>
                                    
                                </div>
                                <form>
                                    

                                    

                                    

                                    

                                    

                                    
                                    <div class="clearfix"></div>
                                </form>
                            </div> <!-- content_3 closed -->
                            </form>











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
</style>

<script>
$(document).ready(function()

{
 $("div.bootstrap-tagsinput:eq(1)").css('background-color','#f5f5f5');
 $('.content_2').hide();
  $('.content_3').hide();
 progress.attr("value", "0");
    progressMessage.text("0% complete");

});
</script>