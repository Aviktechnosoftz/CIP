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


$unapproved_date = array(15,19,20);
$approved_date = array(11,26,28);
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
    background-color: #181717;
    border-radius: 4px;
    
    height: 82vh;">



<div class="content" style="background: #181717;">
                            <div class="col-sm-7" style="padding-right: 0px;">
                               <!--  <div class="col-sm-3">
                                <button class="form-control" value="Current Date"></button>
                                </div> -->
                                <div id="datepicker"></div> 
                                  <div class="col-sm-12" style="background: #181717;    padding-top: 15px;">
                                <div class="row" style="">
                                    
                                    <div class="col-sm-4" >
                                     <i class="fa fa-circle fa-2x" aria-hidden="true" style="color: #00B48C;-webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #00B48C;"></i>
                                       <span style="top: -3px;position: absolute;left: 45px;font-size: 2vh;color: #A0A0A0" onclick="approved()" id="approved_btn">Approved</span>         
                                    </div>
                                
                                    <div class="col-sm-5" >
                                        <i class="fa fa-circle fa-2x" aria-hidden="true" style="color: #FF001B;-webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #FF001B;"></i>
                                       <span style="top: -3px;position: absolute;left: 45px;font-size: 2vh;color: #A0A0A0" onclick='attention()' id="attention_btn">Need Attention</span>            
                                    </div>
                                   
                                    <div class="col-sm-3" >
                                     <i class="fa fa-circle fa-2x" aria-hidden="true" style="color: #181717;-webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #E7E6E7;"></i>
                                       <span style="top: -3px;position: absolute;left: 45px;font-size: 2vh;color: #A0A0A0;cursor: pointer;" id="today_btn" onclick="today()">Today</span>         
                                    </div>

                                </div>
                                </div>
                            

                             
                            
                            </div>
                            <div class="col-sm-5" style="padding-left: 0px">
                                <div class="col-sm-12" style="     min-height: 20vh;    background: #181717;">
                                <div class="row" style="padding-top: 15vh;">
                                    
                                    <div class="col-sm-12" >
                                     
                                       <span style="top: -3px;position: absolute;left: 45px;font-size: 4vh;color: #696668;font-family: 'Helvetica_nue_thin'"><?=date("jS F Y ") ." ".date("l");?></span>         
                                    </div>


                                </div>
                                </div>
                                    <div class="col-sm-12 comments_month" style=" background: #232223;max-height: 50vh;overflow-y: auto;">


                                   <!--  <div class="row" style=" min-height: 15vh;   padding-top: 3vh;" id="effects">
                                    <div class="col-sm-12">
                                    <i class="fa fa-circle" aria-hidden="true" style="color: #FF001B;-webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #FF001B;"></i>
                                    <span style="color:#F10019;    padding-left: 20px;">6 July 2017</span>
                                    </div>
                                    <div class="col-sm-12" style="padding-left: 50px;color: #F10019;">
                                        <span style="font-size: 13px;">General Comments<br>SITE MANAGER- SIGN-OFF/ APPROVAL</span>
                                    </div>
                                        
                                        

                                    </div> -->
                                    <!-- <div class="row" style="min-height: 15vh;   padding-top: 3vh;" id="effects">
                                    <div class="col-sm-12">
                                    <i class="fa fa-circle" aria-hidden="true" style="color: #00B48C;-webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #00B48C;"></i>
                                    <span style="color:#00B48C;    padding-left: 20px;">6 July 2017</span>
                                    </div>
                                    <div class="col-sm-12" style="padding-left: 50px;color: #00B48C;">
                                        <span style="font-size: 13px;">SITE MANAGER- SIGN-OFF/ APPROVAL<br>Monday 3 July 2017</span>
                                    </div>
                                        
                                        

                                    </div>
                                    <div class="row" style="min-height: 15vh;   padding-top: 3vh;" id="effects">
                                    <div class="col-sm-12">
                                    <i class="fa fa-circle" aria-hidden="true" style="color: #00B48C;-webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #00B48C;"></i>
                                    <span style="color:#00B48C;    padding-left: 20px;">6 July 2017</span>
                                    </div>
                                    <div class="col-sm-12" style="padding-left: 50px;color: #00B48C;">
                                        <span style="font-size: 13px;">Photo Works Uploaded<br>Monday 3 July 2017</span>
                                    </div>
                                    <div class="col-sm-4"><img src="admin/images/attendance_1.png" class="img-responsive img-center"></div>
                                     <div class="col-sm-4"><img src="admin/images/attendance_2.png" class="img-responsive img-center"></div>
                                      <div class="col-sm-4"><img src="admin/images/feed.png" class="img-responsive img-center"></div>
                                      <div class="col-sm-4" style="padding-top: 20px"><img src="admin/images/feed.png" class="img-responsive img-center"></div>
                                       <div class="col-sm-4" style="padding-top: 20px"><img src="admin/images/attendance_1.png" class="img-responsive img-center"></div>
                                   
                                              
                                        

                                    </div>
                                    <div class="row" style="min-height: 15vh;   padding-top: 3vh;" id="effects">
                                    <div class="col-sm-12">
                                    <i class="fa fa-circle" aria-hidden="true" style="color: #00B48C;-webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #00B48C;"></i>
                                    <span style="color:#00B48C;    padding-left: 20px;">6 July 2017</span>
                                    </div>
                                    <div class="col-sm-12" style="padding-left: 50px;color: #00B48C;">
                                        <span style="font-size: 13px;">Visitors Log<br>Monday 3 July 2017</span>
                                    </div>
                                        
                                        

                                    </div> -->

                                    

                                    
                                </div>
                                <!-- <div class="col-sm-12" style=" background: #232223; min-height: 15vh;border-top:0.5px solid black">
                                <div class="row">
                                    <div class="col-sm-12" style="text-align: center;padding-top: 10vh;">
                                    <input type="button" name="" value="Search" id="search_btn">
                                    </div>
                                   
                                        
                                        

                                    </div>
                                
                                </div> -->

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
 <form id="date_redirect" action="site_diary_new_home.php" method="POST">
   <input type="text" id="date_selected" name="date_selected" hidden>
 </form>

<form name="attention_form" id="attention_form" action="site_diary_attention.php" method="POST">
    
    <input type="text" name="attention_date" id="attention_date">
</form>

<form name="approved_form" id="approved_form" action="site_diary_approved.php" method="POST">
    
    <input type="text" name="approved_date" id="approved_date">
</form>

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

    .ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current {
    float: left;
    margin-left: 35%;
}
::-webkit-scrollbar {
    width: 7px;
        background: #232223;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
    border-top-left-radius: 0;
     border-bottom-left-radius: 0;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    border-radius: 10px;
    border-top-left-radius: 0;
     border-bottom-left-radius: 0;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    background: #F6F6F6;
}

#attention_btn:hover, #approved_btn:hover, #today_btn:hover

{
  /*background: #212121;*/
  cursor: pointer;
}

#effects:hover
{
  background: #181717;
  cursor: pointer;
}
</style>

<footer>
  <? include("footer.php"); ?>
<footer>

<script type="text/javascript">
        $(function(){
            $('#datepicker').datepicker({
                inline: true,
                // showButtonPanel: true,
                //nextText: '&rarr;',
                //prevText: '&larr;',
                showOtherMonths: true,
                //dateFormat: 'dd MM yy',
                dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                //showOn: "button",
                //buttonImage: "img/calendar-blue.png",
                //buttonImageOnly: true,
                 onSelect: function(selected){

       
           var date = $("#datepicker").datepicker({ dateFormat: 'dd,MM,yyyy' }).val();
  
            redirect_new_form(date);
        },
         onChangeMonthYear: function(year, month, inst){
         // set date to 1st on year or month change
          
         // this seems  bit janky, but works

         var monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];


// document.write("The current month is " + monthNames[month]);
        month_new= monthNames[month-1]; 

       attention_change(year,month_new);
       approved_change(year,month_new);
        month_new2 =  ("0" + (month)).slice(-2);   
       sidebar_approved(month_new2,year);
       // $('.comments_month').html('');
       sidebar_attention(month_new2,year);
          
         // Can't I use the instatnce to set the date?
          
         // $(inst).datepicker( "setDate", month + '/1/' + year ); // fails
         // inst.datepicker( "setDate", month + '/1/' + year ); // fails
         // inst.selectedDay = 1; // fails
         // inst.currentDay = 1; // fails 
      }

            });
        });





 function redirect_new_form(date)
 {
     var dat = date;
var yourdate = dat.split("/").reverse();
var tmp = yourdate[2];
yourdate[2] = yourdate[1];
yourdate[1] = tmp;
yourdate = yourdate.join("-");


     $.ajax(
     {
        url:"ajax_site_diary_check.php",
        type:"POST",
        data:"check_date="+yourdate,
        success: 
        function(resp)
        {
            // alert(resp);
            if(resp == "unapproved")
            {
                $('#attention_date').val(yourdate);
                $("#attention_form").submit();
            }
            else if(resp == "approved")
            {
                $('#approved_date').val(yourdate);
                $("#approved_form").submit();

            }
            else
            {
                 $('#date_selected').val(yourdate);
                $('#date_redirect').submit();
            }
        }


     });

//     var clicked_date= date;
// var today = new Date();
// var dd = today.getDate();
// var mm = today.getMonth()+1; //January is 0!
// var yyyy = today.getFullYear();

// if(dd<10) {
//     dd = '0'+dd
// } 

// if(mm<10) {
//     mm = '0'+mm
// } 

// today = mm + '/' + dd + '/' + yyyy;

// var encoded_date=btoa(date);
//       $('#date_selected').val(encoded_date);
//       $('#date_redirect').submit();
// // alert(today);
// if(clicked_date == today)
// {
//      var encoded_date=btoa(date);
//       $('#date_selected').val(encoded_date);
//       $('#date_redirect').submit();
//     // alert(encoded_date  );
// }
// if(clicked_date != today)
// {
//  alert("Sorry...! You Cannot Create a New Site Diary"); 
// }




 }
  

 
var flag=true;
//var tempArray=[];
function attention()
{
  
    $.ajax
    ({
        url: "ajax_site_diary.php",
        type: "POST",
        data: "current_date="+$('.ui-datepicker-year').html()+"-"+$('.ui-datepicker-month').html(),
        success: 
        function(response)
        {
           
            var tempArray = JSON.parse(response);
            console.log(tempArray);




            if (flag) {
                // var tempArray = JSON.parse(response);

                $.each(tempArray, function(k, v) {
                    console.log(v);
                    $(".ui-datepicker-calendar > tbody >tr > td > a:contains('" + v + "')").first().css("background-color", "#EA0001");
                });
                $('#attention_btn').css("background-color", "#212022");
            } else {


                $.each(tempArray, function(k, v) {
                    console.log(v);

                    $(".ui-datepicker-calendar > tbody >tr > td > a:contains('" + v + "')").first().css("background-color", "#212121");
                });
                $('#attention_btn').css("background-color", "#181717");
            }
            flag = !flag;
        }
    });

}
var flag2=true;
function approved()
{

      $.ajax({
              url: "ajax_site_diary_approved.php",
              type: "POST",
              data: "current_date=" + $('.ui-datepicker-year').html() + "-" + $('.ui-datepicker-month').html(),
              success: function(response) {
                  var tempArray2 = JSON.parse(response);
                  console.log(tempArray2);

                  if (flag2) {

                      $.each(tempArray2, function(index, value) {
                          $(".ui-datepicker-calendar > tbody >tr > td > a:contains('" + value + "')").first().css("background-color", "#0FC98C");
                      });

                      $('#approved_btn').css("background-color", "#212022");
                  } else {


                      $.each(tempArray2, function(index, value) {
                          $(".ui-datepicker-calendar > tbody >tr > td > a:contains('" + value + "')").first().css("background-color", "#212121");
                      });
                      $('#approved_btn').css("background-color", "#181717");
                  }
                  flag2 = !flag2;
              }

              });

}
 
 function today()
 {
    // alert("ok");
    $("#datepicker").datepicker().datepicker("setDate", new Date());
    $('#approved_btn').css("background-color", "#181717" );
    $('#attention_btn').css("background-color", "#181717" );
    flag= true;
    flag2=true;
 } 

$(document).ready(function()
{
attention();
approved();
var date = $('#datepicker').datepicker('getDate'),
            // day  = date.getDate(),  
            month =  ("0" + (date.getMonth() + 1)).slice(-2);            
            year =  date.getFullYear();
        // alert(month + '-' + year);
sidebar_attention(month,year);
sidebar_approved(month,year);
});

function sidebar_attention(month,year)
{
    $('.comments_month').html('');
    $.ajax({

        url:"ajax_sidebar_attention.php",
        type:"POST",
        data:"current_date="+year+"-"+month,
        success: function(data)
        {
            var comments_array = JSON.parse(data);
            console.log(comments_array);
             $.each(comments_array, function(k, v) {

                    // console.log(v);
                    $('.comments_month').append('<div class="row" style=" min-height: 15vh; padding-top: 3vh;" id="effects"> <div class="col-sm-12"> <i class="fa fa-circle" aria-hidden="true" style="color: #FF001B;-webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #FF001B;"></i> <span style="color:#F10019; padding-left: 20px;">'+k+'</span> </div> <div class="col-sm-12" style="padding-left: 50px;color: #F10019;"> <span style="font-size: 13px;">General Comments<br>'+v+'</span> </div> </div>')
                });
        }


    });
}

function sidebar_approved(month,year)
{
    // alert(month+"-"+year);
    $('.comments_month').html('');
    $.ajax({

        url:"ajax_sidebar_approved.php",
        type:"POST",
        data:"current_date="+year+"-"+month,
        success: function(data)
        {
            var comments_array2 = JSON.parse(data);
            // console.log(comments_array2);
             $.each(comments_array2, function(k, v) {

                    // console.log(v);
                    $('.comments_month').append('<div class="row" style="min-height: 15vh; padding-top: 3vh;" id="effects"> <div class="col-sm-12"> <i class="fa fa-circle" aria-hidden="true" style="color: #00B48C;-webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #00B48C;"></i> <span style="color:#00B48C; padding-left: 20px;">'+k+'</span> </div> <div class="col-sm-12" style="padding-left: 50px;color: #00B48C;"> <span style="font-size: 13px;">'+v+'<br></span> </div>')
                });
        }


    });
}


function attention_change(year,month)
{
flag=true;
    $.ajax
    ({
        url: "ajax_site_diary.php",
        type: "POST",
        data: "current_date="+year+"-"+month,
        success: 
        function(response)
        {
          
            var tempArray = JSON.parse(response);
            console.log(tempArray);




            if (flag) {
                // var tempArray = JSON.parse(response);
                // alert(flag);
                $.each(tempArray, function(k, v) {

                    console.log(v);
                    $(".ui-datepicker-calendar > tbody >tr > td > a:contains('" + v + "')").first().css("background-color", "#EA0001");
                });
                $('#attention_btn').css("background-color", "#212022");
            } else {


                $.each(tempArray, function(k, v) {
                    console.log(v);

                    $(".ui-datepicker-calendar > tbody >tr > td > a:contains('" + v + "')").first().css("background-color", "#212121");
                });
                $('#attention_btn').css("background-color", "#181717");
            }
            flag = !flag;
        }
    });


}

function approved_change(year,month)
{
flag2=true;
      $.ajax({
              url: "ajax_site_diary_approved.php",
              type: "POST",
              data: "current_date=" + year + "-" +month,
              success: function(response) {
                  var tempArray2 = JSON.parse(response);
                  console.log(tempArray2);

                  if (flag2) {

                      $.each(tempArray2, function(index, value) {
                          $(".ui-datepicker-calendar > tbody >tr > td > a:contains('" + value + "')").first().css("background-color", "#0FC98C");
                      });

                      $('#approved_btn').css("background-color", "#212022");
                  } else {


                      $.each(tempArray2, function(index, value) {
                          $(".ui-datepicker-calendar > tbody >tr > td > a:contains('" + value + "')").first().css("background-color", "#212121");
                      });
                      $('#approved_btn').css("background-color", "#181717");
                  }
                  flag2 = !flag2;
              }

              });

}

   </script>}
