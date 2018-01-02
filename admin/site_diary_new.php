<?include('sidepanel.php') ?>

<? $url = $_GET['date'];?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12" style="padding: 0">
                        <div class="card">
                             <div class="header">
                            <div class="col-md-2">
                                <h4 class="title" style="color:#C1C1C1;cursor: pointer" onclick="window.location.href='dashboard.php'">Home Page</h4>
                                <!-- <p class="category">24 Hours performance</p> -->
                            </div>
                            <div class="col-md-2">
                                <h4 class="title" style="color:#5B6672;cursor: pointer" onclick="window.location.href='site_diary.php'">Site Diary</h4>
                                <!-- <p class="category">24 Hours performance</p> -->
                            </div>
                             <div class="col-md-4">
                                <h4 class="title" style="color: #C1C1C1">Safety Management Report</h4>
                                <!-- <p class="category">24 Hours performance</p> -->
                            </div>
                             
                            <div class="col-md-12">
                                <!-- <h4 class="title" style="color:#E6523A">SITE SAFETY MANAGEMENT PLAN</h4> -->
                                <!-- <p class="category">24 Hours performance</p> -->
                            <!-- </div> -->
                            </div>
                            </div>
                            <div class="content" style="">
                          <div class="col-md-12">
                                 <h4 class="title" style="color:#E6523A">SITE SAFETY MANAGEMENT PLAN</h4> 
                                <!-- <p class="category">24 Hours performance</p> -->
                            </div> 
                            <div class="col-sm-6">
                            <div class="form-group">
                                    
                                    <label>Date</label>
                                    <input class="form-control" type="" name="" id="" style="width: 50%" value="<?=$url ?>">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label class="col-md-12" id="text_area_label">CIP STAFF</label>
                                    <textarea class="" rows="5" id="comment" name="instruction" required></textarea>
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label class="col-md-12" id="text_area_label">LOST TIME</label>
                                    <textarea class="" rows="5" id="comment" name="instruction" required></textarea>
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label class="col-md-12" id="text_area_label" style="border-radius:0px;">DAILY SITE LABOUR POWER (TICK IF APPLICABLE)</label>
                                    <label class="col-md-12" id="text_area_label" style="border-radius:0px;background: #EFEEF0; color: #2C2B2C;   margin-bottom: 5px;">ITEMS</label>

                            </div>
                            <div class="row">
                            <div class="form-group">
                            <label class="col-sm-4" id="check_label">Principle</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Earthworks</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          </div>
                            </div>
                             <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Piling</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Rotating Wall</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>
                            </div>










                            <div class="row">

                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Surveyor</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Geotechnical Engineer</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>

                            </div>









                        <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Piling</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Detailed Excavation</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>

                        </div>




                            

                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Structural Steel Erection</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Concrete Panel</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>
                            </div>









                            <div class="row">
                             <div class="form-group">
                               <label class="col-sm-4" id="check_label">Stormwater/Sewer </label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Concrete Placement</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>


</div>





                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Steel Fixer</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Formwork</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>


</div>




                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Roof and Wall sheeting</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Lift Services</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>



</div>


                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Metal Works</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Plant Hire Operators</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Joint Sealing</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Painting </label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>



</div>

                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Comm's Contractor</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Toilet Cubicles</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>


</div>

                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Floor and wall tiling</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Vinyl installer</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>

</div>

                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Plasterboard</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Alucabond</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>

</div>
                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Glazing</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Gantry Crane</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Mobile Crane Hire</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Electrical Services</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Hydraulic and Drainage</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Fire Protection Services</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Mechanical</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Block laying and Bricklaying</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>
                            </div>
                             <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Roof Safety</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Scaffolding</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Epoxy Applicator</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Security</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Bird Netting</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Mechanical</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Labour Hire</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Balustrades</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Joinery</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Fencing</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Cleaner</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">Landscaping</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Client Fit-Out Contractors</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                          <label class="col-sm-4" id="check_label">External Services Contractors</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                            </div>
                            </div>
                             <div class="row">
                            <div class="form-group">
                               <label class="col-sm-4" id="check_label">Traffic Control</label><div class="col-sm-2"><input type="checkbox" class="faChkSqr"></div>
                         
                            </div>
                            </div>
                            
                            </div>
                            <div class="col-sm-6">
                                 <div class="form-group">
                                    
                                    <label>Project</label>
                                    <input class="form-control" type="" name="" id="" style="width: 50%">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label class="col-md-12" id="text_area_label">WEATHER CONDITION</label>
                                    <textarea class="" rows="5" id="comment" name="instruction" required></textarea>
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label class="col-md-12" id="text_area_label">OH&S ISSUES (E.G INCIDENTS, FIRST AID ETC.)</label>
                                    <textarea class="" rows="5" id="comment" name="instruction" required></textarea>
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label class="col-md-12" id="text_area_label">CONSULTANT INSPECTION UNDERTAKEN</label>
                                    <textarea class="" rows="5" id="comment" name="instruction" required></textarea>
                                    
                            </div>
                             <div class="form-group">
                                    
                                    <label class="col-md-12" id="text_area_label">PLANT HIRE</label>
                                    <table class="table table-bordered">
  <thead>
    <tr>
      <th>PLANT TYPE</th>
      <th>HOURS WORKED</th>
      <th>HIRE COMPANY</th>
      <th>DOCKET NO.</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><input type="text"  name="" class="table_field"></th>
      <td><input type="text"  name="" class="table_field"></td>
      <td><input type="text"  name="" class="table_field"></td>
      <td><input type="text"  name="" class="table_field"></td>
    </tr>
    <tr>
      <th scope="row"><input type="text"  name="" class="table_field"></th>
      <td><input type="text"  name="" class="table_field"></td>
      <td><input type="text"  name="" class="table_field"></td>
      <td><input type="text"  name="" class="table_field"></td>
    </tr>
    <tr>
      <th scope="row"><input type="text"  name="" class="table_field"></th>
      <td><input type="text"  name="" class="table_field"></td>
      <td><input type="text"  name="" class="table_field"></td>
      <td><input type="text"  name="" class="table_field"></td>
    </tr>
    <tr>
      <th scope="row"><input type="text"  name="" class="table_field"></th>
      <td><input type="text"  name="" class="table_field"></td>
      <td><input type="text"  name="" class="table_field"></td>
      <td><input type="text"  name="" class="table_field"></td>
    </tr>
  </tbody>
</table>
                                    
                            </div>

                                    <div class="form-group">
                                    
                                    <label class="col-md-12" id="text_area_label">SITE INSTRUCTION ISSUED</label>
                                    <table class="table table-bordered">
  <thead>
    <tr>
      <th>INITIATING PERSON/COMPANY</th>
      <th>INSTRUCTION DETAILS</th>
      <th>RECIPEINT PERSON/COMPANY</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><input type="text"  name="" class="table_field"></th>
      <td><input type="text"  name="" class="table_field"></td>
      <td><input type="text"  name="" class="table_field"></td>

    </tr>
    <tr>
      <th scope="row"><input type="text"  name="" class="table_field"></th>
      <td><input type="text"  name="" class="table_field"></td>
      <td><input type="text"  name="" class="table_field"></td>
    
    </tr>
    <tr>
      <th scope="row"><input type="text"  name="" class="table_field"></th>
      <td><input type="text"  name="" class="table_field"></td>
      <td><input type="text"  name="" class="table_field"></td>
      
    </tr>
    <tr>
      <th scope="row"><input type="text"  name="" class="table_field"></th>
      <td><input type="text"  name="" class="table_field"></td>
      <td><input type="text"  name="" class="table_field"></td>

    </tr>
  </tbody>
</table>
                                    
                            </div>

                            <div class="form-group">
                                    
                                    <label class="col-md-12" id="text_area_label">GENERAL COMMENTS</label>
                                    <textarea class="" rows="5" id="comment" name="instruction" required></textarea>
                                    
                            </div>
                                <div class="form-group">
                                    
                                    <label class="col-md-12" id="text_area_label">GENERAL COMMENTS</label>
                                    
                                <label class="col-md-12" id="text_area_label" style="border-radius:0px;background: #EFEEF0; color: #2C2B2C;   margin-bottom: 5px;">SITE MANAGER</label>
                                    
                            </div>
                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-6" id="check_label">Sinature</label>
                               <div class="col-sm-6"><input type="text" class="table_field2"></div>
                               </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-6" id="check_label">Name</label>
                               <div class="col-sm-6"><input type="text" class="table_field2"></div>
                               </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-6" id="check_label">Date</label>
                               <div class="col-sm-6"><input type="text" class="table_field2"></div>
                               </div>
                            </div>
                            <label class="col-md-12" id="text_area_label" style="border-radius:0px;background: #EFEEF0; color: #2C2B2C;   margin-bottom: 5px;">SITE MANAGER</label>

                               <div class="row">
                            <div class="form-group">
                               <label class="col-sm-6" id="check_label">Sinature</label>
                               <div class="col-sm-6"><input type="text" class="table_field2"></div>
                               </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-6" id="check_label">Name</label>
                               <div class="col-sm-6"><input type="text" class="table_field2"></div>
                               </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                               <label class="col-sm-6" id="check_label">Date</label>
                               <div class="col-sm-6"><input type="text" class="table_field2"></div>
                               </div>
                            </div>


              


                               
                            

                            
                            </div>
                            <div class="form-group">
                            
                                    <div class="col-sm-12">
                                    
                                    <button type="submit" class="btn btn-danger btn-fill pull-right" style="background-color: #E66F26;border:none;border-radius: 50px;width: 20%;">Submit</button>
                                    
                                    
                                   
                                  
                                    </div>
                                    
                                </div>
                                <form>
                                   

                                    
                                    <div class="clearfix"></div>
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
    background: #fff;
}
.table>thead
{
    background: #EFEEF0; color: #2C2B2C; 
}

.card .table tbody td:first-child, .card .table thead th
{
font-size: 1.6vh;
text-shadow: none;
font-weight: 600;
}
#comment {
font-family: 'Helvetica_Nue';
font-weight: 100;
 width: 100%;
 padding: 5px 0px;
/*margin-bottom: 20px;*/
resize: none;
font-size: 11px;
line-height: 24px;

-webkit-appearance: none;
border: none;
    outline: none;
  
    color: #565656;

    -webkit-box-shadow: none;
    box-shadow: none;
/*border-top-right-radius: 5vh;
border-bottom-right-radius: 5vh;*/
background: url(assets/img/notebook.png);

}

#text_area_label
{
    background: #E3E1E3;
    height: 30px;
    line-height: 30px;
    color: #E6523A;
    border-top-right-radius: 3vh;
    border-top-left-radius: 3vh;
    font-size: 1.6vh;
    margin-bottom: 0px;
    font-weight: 600;
    font-style: normal;
}

input.faChkRnd, input.faChkSqr {
  visibility: hidden;
}

input.faChkRnd:checked:after, input.faChkRnd:after,
input.faChkSqr:checked:after, input.faChkSqr:after {
  visibility: visible;
  font-family: FontAwesome;
  /*font-size:2vh;height: 2.2vh; width: 2.5vh;*/
 
 
  display: inline-block;
}

input.faChkRnd:checked:after {
  content: '\f058';
}

input.faChkRnd:after {
  content: '\f10c';
}

input.faChkSqr:checked:after {
  content: '\f00c';
   color: black;
   background-color: #FFFEFF;

   width: 25px;
    border: 1px solid #DFDEDF;
    height: 25px;
    text-align: center;
    font-size: 20px;
        line-height: 25px;
        -webkit-text-stroke: 3px #fff;  
}

input.faChkSqr:after {
  content: '\f096';
  color: #FFFEFF;
  background-color: #FFFEFF;
 width: 25px;
    border: 1px solid #DFDEDF;
    border-radius: 5px;
    height: 25px;
    text-align: center;
    font-size: 19px;

}

#check_label
{
    line-height: 30px;
    color: #616062;
    font-size: 2vh;
    text-transform: none;
    font-style: normal;
}
.table_field
{
    border: none;
    color:#616062;
    width: 100%;
}
.table_field2
{
   /* border: none;*/
 
    color:#616062;
    width: 100%;
   /* text-align: center;*/
  
     background-color: #E3E3E2;
    border: none;
    outline: none;
    border-radius: 6vh;
    color: #565656;
    padding: 8px 12px;
    height: 4vh;
    -webkit-box-shadow: none;
    box-shadow: none;
}
.row {
    margin-right: 0px; 
    margin-left: 0px; 
    background: #fff;
}
</style>

