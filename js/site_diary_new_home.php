<?
session_start();
error_reporting(0);
include_once('connect.php');
if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}
$week_start= $_POST['start_date_week'];
$week_end= $_POST['end_date_week'];
// print($week_end);
$get_project_name= $conn->query("select * from tbl_project where id='".$_SESSION['admin']."'")->fetch_object();	
$get_report= $conn->query("Select *,today_date,sum(no_of_worker) AS sum,DAYNAME(today_date) from tbl_site_attendace LEFT JOIN tbl_induction_register ON tbl_site_attendace.induction_no = tbl_induction_register.id   LEFT JOIN tbl_employer ON tbl_induction_register.empid  = tbl_employer.id where today_date between '".$week_start."' and '".$week_end."'  group by today_date");

// echo "select * from tbl_employer where id='".$get_report->empid."'";
// echo "Select *,today_date,sum(no_of_worker) AS sum,DAYNAME(today_date) from tbl_site_attendace LEFT JOIN tbl_induction_register ON tbl_site_attendace.induction_no = tbl_induction_register.id  where today_date between '2017-02-27' and '2017-03-05' group by today_date";



?>
<header>
 <? include('header.php'); ?>
 <? include('test_side_new.php');?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
<!--     <script src="js/jquery.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
   <link href="admin/assets/css/datepicker.css" rel="stylesheet" type="text/css"/>  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="admin/assets/js/jquery-ui-1.8.18.custom.min.js"></script>

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">
</header>
<div class="container">
<div class="wrapper"   style="border: 1px solid grey;
    float: left;
    position: absolute;
    /* margin: -220px 0 0 -200px; */
    margin-top: -25vh;
    top: 38.5vh;
    left: 27.5vw;
    width: 72.5vw;
    background-color: #f5f5f5;
    border-radius: 4px;
    
    height: 82vh;">

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


<style>
	
	h4 {
  text-align: left;
  margin:2vh;
  font-weight: bold;
}

table caption {
	padding: .5em 0;
}

@media screen and (max-width: 767px) {
  table caption {
    border-bottom: 1px solid #ddd;
  }
}

.p {
  text-align: center;
  padding-top: 140px;
  font-size: 14px;
}
  th {
    
    font-weight: 100;
    font-style: italic;
}

.form-control {
border-radius: 20vh;
border:none;
    box-shadow: none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   -moz-transition: none;
   -webkit-transition: none;
/*outline: none;
    border: none;
    box-shadow: none;
    -webkit-box-shadow: none;*/
}
.form-control:focus
{
  border:none;
    box-shadow: none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   -moz-transition: none;
   -webkit-transition: none;
}
input.form-control,input.form-control:focus {
    border:none;
    box-shadow: none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   -moz-transition: none;
   -webkit-transition: none;
}

select:focus
{
  border:none;
    box-shadow: none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   -moz-transition: none;
   -webkit-transition: none;
   outline: none;
} 

input[type="date"]:focus
{
  outline: none;
}
input[type="date"]
{
  border:none;
  box-shadow: none;
  text-align: center;
}
.btn-primary
{
  width: 8vw;
  background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;
  border:none;
  outline: none;
}
h4
{
color: #95989a;
    font-size: 2.4vh;
    font-weight: 900;
}
.ui-datepicker {
    width: 100%;
    margin-top: 0px;

 
    margin: none;
    
   -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    }

    .ui-datepicker-header {

          min-height: 25vh;
    background: #181717;
    border: none;
        -webkit-box-shadow:none;
    -moz-box-shadow: none;
    box-shadow: none;
    text-shadow: none;
    filter: none;
}

.ui-datepicker table {
    width: 100%;
        min-height: 50vh;
}

.ui-datepicker-month
{
        font-size: 55px;
    font-weight: 100;
    font-family: 'Helvetica_nue_thin';
    margin-right: 1vw;
    color: #939799;
}
.ui-datepicker-year
{
    font-size: 25px;
    font-family: 'Helvetica_nue_thin';
        font-weight: 100;
        color: #D14A36;
}

.ui-datepicker-next {
    margin-top: 8vh;
    }

    .ui-datepicker-prev {
        margin-top: 8vh;
    }

    .ui-datepicker th {
   text-transform: none; 
    /*font-size: 6pt;*/
    padding: 5px 0;
         font-weight: 100;
    font-family: 'Helvetica_nue_thin';
    text-align: center;
    color: #535455;
    text-shadow: none;
    filter: none;
    background: #181717;
  
    font-size: 14px;
}
.ui-datepicker tbody td {
    text-align: center;
}

.ui-datepicker-calendar .ui-state-active {

border-radius: 6vh;
 font-weight: 100;
    font-family: 'Helvetica_nue_thin';
    background: #201E1F;
    webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
        border: 1px solid #DDDDDD;
    }

    .ui-datepicker-calendar .ui-state-default {
border-radius: 6vh;
 font-weight: 100;
    font-family: 'Helvetica_nue_thin';
    color: #F6F6F6;
    background: #201E1F;
    webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    }

    .ui-datepicker-calendar > tbody
    {
        background: #201E1F;
    }

    .ui-datepicker tbody td {
    padding: 0;
     border-right: none; 
         font-size: 3vh;
         font-weight: 100;
    font-family: 'Helvetica_nue_thin';

}

.ui-datepicker tbody tr {
    border-bottom: none;
}



.ui-datepicker thead { 
    border-bottom: none;
}
.ui-datepicker thead tr { 
     height: 5vh;
}
   
.ui-datepicker td span, .ui-datepicker td a {
    width: 35px;
    height: 35px;
    line-height: 35px;
    text-shadow: none;
    filter: none;

    }
.ui-datepicker-unselectable .ui-state-default {
  
    color: #3E3E40;
}
.ui-datepicker-title {
    text-align: center;
    padding-top: 7vh;
}
#search_btn
{
    -webkit-border-radius: 60;
  -moz-border-radius: 60;
  border-radius: 60px;
  font-family: Arial;
  color: white;
  font-size: 12px;
    width: 12vw;
    height: 4vh;

/*  margin-left: 1vw;*/
  background: transparent;
  /*padding: 10px 20px 10px 20px;*/
  border: solid #686868 1px;
  text-decoration: none;
  outline: none;
  font-family: 'Helvetica_Nue_thin';
}

.ui-datepicker-calendar td:first-child .ui-state-active {
    width: 35px;
    margin-left: 0;
}

.ui-datepicker-calendar td:last-child .ui-state-active {
     width: 35px;
    margin-left: 0;
}
.ui-datepicker-calendar tr:last-child .ui-state-active {
height: 35px;
    }
</style>

<footer>
  <? include("footer.php"); ?>
<footer>

