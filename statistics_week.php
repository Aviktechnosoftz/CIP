<?php

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
$get_email= $conn->query("Select * from tbl_setting")->fetch_object();

// if(isset($_POST['selected_week_btn']) == true)
// {
//   $start_date= $_POST['start_date'];
//   $end_date=$_POST['end_date'];
// }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>







<head>
<header>
 <? include('header.php'); ?>
 <? include('test_side3.php');?>
   
 <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
<!--     <script src="js/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script>
    <!-- <script src="js/bootstrap.min.3.3.6.js"></script> -->
     <script type="text/javascript" src=js/validation_site_induction.js></script>
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css">
 
<link rel="stylesheet" href="css/sidebar.css">

</header>
</head>

<body >
  <!-- <script> body.onload = function() {select_week()};</script> -->
	<div class="container">
			<div class="wrapper" style="border: 1px solid grey;
    float: left;
    position: absolute;
    /*margin: -220px 0 0 -200px;*/
    margin-top: -25vh;
    top: 52vh;
    left:30vw;
    width: 60%;background-color: #AEB6BF   ;border-radius: 4px">

    		<div class="row">
    
    		<h1 class="text-center"> <span class="label label-default">Safety Statis Register <select id="view" onchange="select_view()"> <option value="daily" selected="selected">Daily</option>
        <option value="weekly">Weekly</option>
        <option value="monthly">Monthly</option>

        </select></span></h1>
    <script type="text/javascript">
    $(document).ready(function() {
         $("#weekly").hide();
          $("#monthly").hide();
          select_view();
    });
      function select_view()
      {
        var a = $( "#view option:selected" ).text();
       
        if(a == 'Weekly'){
        $("#weekly").show();
         $("#monthly").hide();
          $("#daily").hide();
          
      }
      if(a == 'Monthly'){
        $("#monthly").show();
         $("#weekly").hide();
           $("#daily").hide();
      }

       if(a == 'Daily'){
        $("#monthly").hide();
         $("#weekly").hide();
           $("#daily").show();
      }
     
      
     }

    </script>
  			</div>
        <div id="weekly" >
  			<form  method="POST" action="statistics_week_form.php">
        <input type="hidden"  name="start_date_week" id="form_start_date" value="" />
        <input type="hidden"  name="end_date_week" id="form_end_date" value="" />
  			<div class="row">
    		<div class="col-sm-4 form-group" style="margin:10px" >
                <?
                $ddate = date("Y-m-d");
                $date = new DateTime($ddate);
                $week = $date->format("W");
                
                ?>
								<h4><span class="label label-info">Please Select The Week</span></h4>
						  
								
               
<script>
$(function() {
    var startDate;
    var endDate;
    
    var selectCurrentWeek = function() {
        $('#submit').attr('disabled',false);
         $("#submit").attr('value', 'View Report');

        window.setTimeout(function () {
            $('.week-pick').find('.ui-datepicker-current-day a').addClass('ui-state-active')
        }, 1);
    }
    
    $('.week-pick').datepicker( {
        showOtherMonths: true,
        firstDay: 1,
        selectOtherMonths: true,
    changeMonth: true,
    changeYear: true,
    showWeek: true,
     dateFormat: 'yy-mm-dd',
     maxDate: new Date(),

  

        onSelect: function(dateText, inst) { 
  
            var date = $(this).datepicker('getDate');
            
            startDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay()+1);
            endDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 7);

            var dateFormat = inst.settings.dateFormat || $.datepicker._defaults.dateFormat;

            $('#startDate').val($.datepicker.formatDate( dateFormat, startDate, inst.settings ));
            $('#endDate').val($.datepicker.formatDate( dateFormat, endDate, inst.settings ));
           
            selectCurrentWeek();
        },
        beforeShowDay: function(date) {
            var cssClass = '';
            if(date >= startDate && date <= endDate)
                cssClass = 'ui-datepicker-current-day';
            // return [true, cssClass];
           return [(date.getDay() == 1 || date.getDay() == 1), ""]; 
        },
        onChangeMonthYear: function(year, month, inst) {
            selectCurrentWeek();
        }
    });
    
    $('.week-pick .ui-datepicker-calendar tr').live('mousemove', function() { $(this).find('td a').addClass('ui-state-hover'); });
    $('.week-pick .ui-datepicker-calendar tr').live('mouseleave', function() { $(this).find('td a').removeClass('ui-state-hover'); });
  });

</script>
 <div class="week-pick"></div>
   
            </div>
								<div class="col-sm-3 form-group" style="margin:10px" >
                  <h4><span class="label label-info">Week Start Date:</span></h4>
                  <input type="text" id="startDate" placeholder="Week Start Date" name="start_date_week" class="form-control" value="" readonly>

							</div>
                <div class="col-sm-3 form-group" style="margin:10px" >
                  <h4><span class="label label-info">Week End Date:</span></h4>
                  <input type="text" id="endDate" placeholder="Week End Date"  name="end_date_week" class="form-control" value="" readonly>

              </div>
              
               
                  <h5 class="text-center"><input type="submit" name="selected_week_btn" value="View Report" class="btn btn-primary btn-danger" id="submit" style="border-radius: 10px"></h5>
          </div>
        </form >
        </div>   
        <script>
       
          var st= $("#startDate").val();
          var ed= $("#endDate").val();
          if(st=="" || ed=="")
          {
            $('#submit').attr('disabled',true);
            $("#submit").attr('value', 'Please Select Week');

          }
          
        
        </script>


        <!-- Weekly Div    -->

<!-- Monthly Div -->
         <div id="monthly" >
        <form  method="POST" action="site_attendance_monthly.php">
        <input type="hidden"  name="start_date_week" id="form_start_date" value="" />
        <input type="hidden"  name="end_date_week" id="form_end_date" value="" />
        <div class="row">
        <div class="col-sm-4 form-group" style="margin:10px" >
                <?
                $ddate = date("Y-m-d");
                $date = new DateTime($ddate);
                $week = $date->format("W");
                
                ?>
                <h4><span class="label label-info">Please Select The Month</span></h4>
              
    <script>
$(function() {
    var startDate;
    var endDate;
    
    var  selectCurrentWeek = function() {
        $('#submit2').attr('disabled',false);
         $("#submit2").attr('value', 'View Report');
        window.setTimeout(function () {
            $('.week-picker').find('.ui-datepicker-current-day a').addClass('ui-state-active')
        }, 1);
    }
    
    $('.week-picker').datepicker( {
        showOtherMonths: true,
        firstDay: 1,
        selectOtherMonths: true,
    changeMonth: true,
    changeYear: true,
    showWeek: true,
     dateFormat: 'yy-mm-dd',
     maxDate: new Date(),

  

        onSelect: function(dateText, inst) { 

            var date = $(this).datepicker('getDate');
            
            startDate = new Date(date.getFullYear(), date.getMonth(), 1);
            endDate = new Date(date.getFullYear(), date.getMonth() + 1, 0);

            var dateFormat = inst.settings.dateFormat || $.datepicker._defaults.dateFormat;

            $('#startDate2').val($.datepicker.formatDate( dateFormat, startDate, inst.settings ));
            $('#endDate2').val($.datepicker.formatDate( dateFormat, endDate, inst.settings ));
           
           selectCurrentWeek();
        },
        beforeShowDay: function(date) {
               var cssClass = '';
            if(date >= startDate && date <= endDate)
                cssClass = 'ui-datepicker-current-day';
            // return [true, cssClass];
           return [(date.getDate() == 1 || date.getDate() == 1), ""]; 
        },
        onChangeMonthYear: function(year, month, inst) {
            selectCurrentWeek();
        }
    });
    
    $('.week-picker .ui-datepicker-calendar tr').live('mousemove', function() { $(this).find('td a').addClass('ui-state-hover'); });
    $('.week-picker .ui-datepicker-calendar tr').live('mouseleave', function() { $(this).find('td a').removeClass('ui-state-hover'); });
});

 
</script>
 <div class="week-picker"></div>

   
           </div>
                <div class="col-sm-3 form-group" style="margin:10px" >
                  <h4><span class="label label-info">Month Start Date:</span></h4>
                  <input type="text" id="startDate2" placeholder="Month Start Date" name="start_date_week" class="form-control" value="" readonly>

              </div>
                <div class="col-sm-3 form-group" style="margin:10px" >
                  <h4><span class="label label-info">Month End Date:</span></h4>
                  <input type="text" id="endDate2" placeholder="Month End Date"  name="end_date_week" class="form-control" value="" readonly>

              </div>
              
               
                  <h5 class="text-center"><input type="submit" name="selected_week_btn" id="submit2" value="View Report" class="btn btn-primary btn-danger" style="border-radius: 10px"></h5>
          </div>
        </form >
        <script>
          var st= $("#startDate2").val();
          var ed= $("#endDate2").val();
          if(st=="" || ed=="")
          {
            $('#submit2').attr('disabled',true);
            $("#submit2").attr('value', 'Please Select Month');

          }
        </script>
        </div>   <!-- Monthly Div   --->



<!-- Daily Div -->
         <div id="daily" >
        <form  method="POST" action="site_attendance_daily.php">
        <input type="hidden"  name="start_date_week" id="form_start_date" value="" />
        <input type="hidden"  name="end_date_week" id="form_end_date" value="" />
        <div class="row">
        <div class="col-sm-4 form-group" style="margin:10px" >
                <?
                $ddate = date("Y-m-d");
                $date = new DateTime($ddate);
                $week = $date->format("W");
                
                ?>
                
              
   <h4><span class="label label-info">Please Select The Date</span></h4>
              
    <script>
$(function() {
    var startDate;
    var endDate;
    
    var  selectCurrentWeek = function() {
       $('#submit3').attr('disabled',false);
         $("#submit3").attr('value', 'View Report');
        window.setTimeout(function () {
            $('.date-picker').find('.ui-datepicker-current-day a').addClass('ui-state-active')
        }, 1);
    }
    
    $('.date-picker').datepicker( {
        showOtherMonths: true,
        firstDay: 1,
        selectOtherMonths: true,
    changeMonth: true,
    changeYear: true,
    showWeek: true,
     dateFormat: 'yy-mm-dd',
     maxDate: new Date(),

  

        onSelect: function(dateText, inst) { 

            var date = $(this).datepicker('getDate');
            
            startDate = new Date(date.getFullYear(), date.getMonth(), date.getDate());
            endDate = new Date(date.getFullYear(), date.getMonth(), date.getDate());

            var dateFormat = inst.settings.dateFormat || $.datepicker._defaults.dateFormat;

            $('#startDate3').val($.datepicker.formatDate( dateFormat, startDate, inst.settings ));
            $('#endDate3').val($.datepicker.formatDate( dateFormat, endDate, inst.settings ));
           
            selectCurrentWeek();
        },
       
        onChangeMonthYear: function(year, month, inst) {
            selectCurrentWeek();
        }
    });
    
    // $('.date-picker .ui-datepicker-calendar tr').live('mousemove', function() { $(this).find('td a').addClass('ui-state-hover'); });
    // $('.date-picker .ui-datepicker-calendar tr').live('mouseleave', function() { $(this).find('td a').removeClass('ui-state-hover'); });
});
</script>
 <div class="date-picker"></div>

   
           </div>
                <div class="col-sm-3 form-group" style="margin:10px" >
                  <h4><span class="label label-info">Date Selected:</span></h4>
                  <input type="text" id="startDate3" placeholder="Date" name="start_date_week" class="form-control" value="" readonly>

              </div>
<!--                 <div class="col-sm-3 form-group" style="margin:10px" >
                  <h4><span class="label label-info">Date End Date:</span></h4>
                  <input type="hidden" id="endDate3" placeholder="Week End Date"  name="end_date_week" class="form-control" value="" readonly>

              </div> -->
              
                <input type="hidden" id="endDate3" placeholder="Week End Date"  name="end_date_week" class="form-control" value="" readonly>
                  <h5 class="text-center"><input type="submit" id="submit3" name="selected_week_btn" value="View Report" class="btn btn-primary btn-danger" style="border-radius: 15px;float: left;margin-top: 4vh;"></h5>
          </div>
        </form >
        <script>
          var st= $("#startDate3").val();
          
          if(st=="")
          {

            $('#submit3').attr('disabled',true);
            $("#submit3").attr('value', 'Please Select Date');

          }
        </script>
        </div>   <!-- Daily Div   --->


      
   


</div> <!-- Wrapper Close
</div>  <!-- Conatiner Close -->



</body>


 
 <style>
   
   @import url("http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.min.css");

   .h-divider{
 margin-top:5px;
 margin-bottom:5px;
 height:1px;
 width:100%;
 border-top:1px solid gray;
}
input::-webkit-outer-spin-button, /* Removes arrows */
input::-webkit-inner-spin-button, /* Removes arrows */
input::-webkit-clear-button { /* Removes blue cross */
  -webkit-appearance: none;
  margin: 0;
}
#view
{
   padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#888;
    border:none;
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
   font-size: 18px;
}
 </style>   
  