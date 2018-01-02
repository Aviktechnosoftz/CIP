<?include('sidepanel.php') ?>
    
<!-- <link href="assets/css/normalize.css" rel="stylesheet" type="text/css"/> -->
    <link href="assets/css/datepicker.css" rel="stylesheet" type="text/css"/>  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui-1.8.18.custom.min.js"></script>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12" style="padding: 0">
                        <div class="card" style="background: #181717;">
                            <div class="header">
                            <div class="col-md-2">
                                <h4 class="title" style="color:#C1C1C1;cursor: pointer;"onclick="window.location.href='dashboard.php'">Home Page</h4>
                                <!-- <p class="category">24 Hours performance</p> -->
                            </div>
                            <div class="col-md-2">
                                <h4 class="title" style="color:#5B6672;cursor: pointer;"onclick="window.location.href='site_diary.php'">Site Diary</h4>
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
                            <div class="content" style="background: #181717;">
                            <div class="col-sm-7" style="padding-right: 0px;">
                        <div id="datepicker"></div> 

                            

                             
                            
                            </div>
                            <div class="col-sm-5" style="padding-left: 0px">
                                <div class="col-sm-12" style=" min-height: 24vh;    background: #181717;">
                                <div class="row" style="padding-top: 19vh;">
                                    
                                    <div class="col-sm-4" >
                                     <i class="fa fa-circle fa-2x" aria-hidden="true" style="color: #00B48C;-webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #00B48C;"></i>
                                       <span style="top: 5px;position: absolute;left: 45px;font-size: 2vh;color: #A0A0A0">Approved</span>         
                                    </div>
                                
                                    <div class="col-sm-5" >
                                        <i class="fa fa-circle fa-2x" aria-hidden="true" style="color: #FF001B;-webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #FF001B;"></i>
                                       <span style="top: 5px;position: absolute;left: 45px;font-size: 2vh;color: #A0A0A0">Need Attention</span>            
                                    </div>
                                   
                                    <div class="col-sm-3" >
                                     <i class="fa fa-circle fa-2x" aria-hidden="true" style="color: #181717;-webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #E7E6E7;"></i>
                                       <span style="top: 5px;position: absolute;left: 45px;font-size: 2vh;color: #A0A0A0">Today</span>         
                                    </div>

                                </div>
                                </div>
                                    <div class="col-sm-12" style=" background: #232223;        min-height: 28.5vh;
">
                                    <div class="row" style="    padding-top: 3vh;background: #090909">
                                    <div class="col-sm-12">
                                    <i class="fa fa-circle" aria-hidden="true" style="color: #FF001B;-webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #FF001B;"></i>
                                    <span style="color:#F10019">6 July 2017</span>
                                    </div>
                                    <div class="col-sm-12" style="padding-left: 50px;color: #F10019;">
                                        <span style="font-size: 13px;">General Comments<br>SITE MANAGER- SIGN-OFF/ APPROVAL</span>
                                    </div>
                                        
                                        

                                    </div>
                                    <div class="row" style="padding-top: 3vh;">
                                    <div class="col-sm-12">
                                    <i class="fa fa-circle" aria-hidden="true" style="color: #00B48C;-webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #00B48C;"></i>
                                    <span style="color:#00B48C">6 July 2017</span>
                                    </div>
                                    <div class="col-sm-12" style="padding-left: 50px;color: #00B48C;">
                                        <span style="font-size: 13px;">SITE MANAGER- SIGN-OFF/ APPROVAL<br>Monday 3 July 2017</span>
                                    </div>
                                        
                                        

                                    </div>

                                    

                                    
                                </div>
                                <div class="col-sm-12" style=" background: #232223;       min-height: 17.5vh;border-top:0.5px solid black">
                                <div class="row">
                                    <div class="col-sm-12" style="text-align: center;padding-top: 10vh;">
                                    <input type="button" name="" value="Search" id="search_btn">
                                    </div>
                                   
                                        
                                        

                                    </div>
                                
                                </div>

                            </div>

                            
                            </div>
                            <div class="form-group">
                            
                                    <!-- <div class="col-sm-12">
                                    
                                    <button type="submit" class="btn btn-danger btn-fill pull-right" style="background-color: #E75139;border:none;border-radius: 0px;"onclick="next_form_2()">Cover<i class="fa fa-plus" style="-webkit-text-stroke: 1px #E75139;"></i></button>
                                    
                                    
                                    <button type="submit" class="btn btn-danger btn-fill pull-right" style="background-color: #E75139;border:none;border-radius: 0px;margin-right: 2vh">Cancel </button>
                                  
                                    </div> -->
                                    
                                </div>
                                <form>
                                    

                                    

                                    

                                    

                                    

                                    
                                    <div class="clearfix"></div>
                                </form>
                            </div>




                       <!--  <div class="content_2">
                            <div class="col-sm-6">
                            <div class="form-group">
                                    
                                    <label>Project</label>
                                    <input class="form-control" type="" name="">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label >Construction Manager</label>
                                    <input class="form-control" type="" name="">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label >Project Manager</label>
                                    <input class="form-control" type="" name="">
                                    
                            </div>
                           
                            <div class="form-group ">
                                   
                                    <label>Site Manager</label>
                                    <input class="form-control" type="" name="">
                                   
                                    
                            </div>
                             <div class="form-group">
                                    
                                    <label>Foreman</label>
                                    <input class="form-control" type="" name="">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>National Safety Manager</label>
                                    <input class="form-control" type="" name="">
                                    
                            </div>
                             <div class="form-group">
                                    
                                    <label>Health and Safety Representative</label>
                                    <input class="form-control" type="" name="">
                                    
                            </div>
                            
                           
                            </div>
                            
                            <div class="col-sm-5">
                               
                                <div class="form-group">
                                    
                                    <label>Site Engineer</label>
                                    <input class="form-control" type="" name="">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Construction Manager</label>
                                    <input class="form-control" type="" name="">
                                    
                            </div>
                            <div class="form-group">
                                    
                                    <label>Emergency Response Team</label>
                                    <input class="form-control" type="" name="">
                                    
                            </div>
                            <div class="form-group" style="margin-top: 20vh;position: relative;margin-bottom: 0px">
                                    
                                    <label>Add Search #Tags</label>
                                     <span class="fa fa-search icon_pos"></span>
                                    <input class="form-control" type="text" name="" style="padding-left: 30px;padding-top: 8px;" id="category">
                                   
                            </div>
                            <div class="form-group" style="background-color: #f5f5f5">
                                    
                                    <input  type="text" id="category2" data-role="tagsinput" value="Phase4,Location,Pieter" /> 
                                    
                            </div>
                            
                           

                            
                            
                            </div>
                            <div class="form-group">
                            
                                    <div class="col-sm-12">
                                    
                                    <button type="submit" class="btn btn-danger btn-fill pull-right" style="background-color: #E75139;border:none;border-radius: 0px;"onclick="next_form_2()">Cover<i class="fa fa-plus" style="-webkit-text-stroke: 1px #E75139;"></i></button>
                                    
                                    
                                    <button type="submit" class="btn btn-danger btn-fill pull-right" style="background-color: #E75139;border:none;border-radius: 0px;margin-right: 2vh" onclick="back_form()">Back </button>
                                  
                                    </div>
                                    
                                </div>
                                <form>
                                    

                                    

                                    

                                    

                                    

                                    
                                    <div class="clearfix"></div>
                                </form>
                            </div>  --><!-- content_2 closed -->


                       












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

.ui-datepicker {
    width: 100%;
    margin-top: 0px;

 
    margin: none;
    
   -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    }

    .ui-datepicker-header {

        min-height: 20vh;
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
<script type="text/javascript">
        $(function(){
            $('#datepicker').datepicker({
                inline: true,
                //nextText: '&rarr;',
                //prevText: '&larr;',
                showOtherMonths: true,
                //dateFormat: 'dd MM yy',
                dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                //showOn: "button",
                //buttonImage: "img/calendar-blue.png",
                //buttonImageOnly: true,
            });
        });

        $('#datepicker').datepicker({
    
onSelect: function(selected){
       
           var date = $("#datepicker").datepicker({ dateFormat: 'dd,MM,yyyy' }).val();
        

            
            // alert(date);
            redirect_new_form(date);
        }
        
        
    }); 

 function redirect_new_form(date)
 {
    var clicked_date= date;
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd = '0'+dd
} 

if(mm<10) {
    mm = '0'+mm
} 

today = mm + '/' + dd + '/' + yyyy;
// alert(today);
if(clicked_date == today)
{
    window.location.href = "site_diary_new.php"+"?"+"date="+date;
    // alert("ok");
}
if(clicked_date != today)
{
 alert("Sorry...! You Cannot Create a New Site Diary"); 
}
 }

    </script>


