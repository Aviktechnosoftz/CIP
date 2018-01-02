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








<header>
 <? include('header.php'); ?>
    <? include('test_side_new.php');?>

       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css">
 
<link rel="stylesheet" href="css/sidebar.css">

</header>

<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">SITE ATTENDANCE REGISTER&nbsp;<?// echo $project_name->project_name ?> </span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>

<body >
  <!-- <script> body.onload = function() {select_week()};</script> -->
	
		
<div class="Main_Form_list">

      <div class="well form-horizontal well_class" >

      <div class="form-group">
           <div class="col-md-12" style="padding-left: 0px;padding-bottom: 5px;">
                <label class="col-md-12 control-label" style=""><span class="project_title" style="">PROJECT :&nbsp;<? echo $_SESSION['project_name'] ?> </span></label>
            </div>
        </div>

    		
        <div class="form-group">
         <label class="col-md-12 control-label label-position">Please Select the View Type</label> 
          <div class="col-md-12" style="">
            <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <select id="view" onchange="select_view()" style="borrder-radius:10vh" class="form-control selectpicker" > <option value="daily" selected="selected">Daily</option>
                <option value="weekly">Weekly</option>
                <option value="monthly">Monthly</option>

                </select>
        </div>
        </div>
        </div>


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
  			
        <div id="weekly" >
  			<form  method="POST" action="site_attendance_comments.php">
        <input type="hidden"  name="start_date_week" id="form_start_date" value="" />
        <input type="hidden"  name="end_date_week" id="form_end_date" value="" />
  			<div class="row">
    		<div class="col-sm-6">
                <?
                $ddate = date("Y-m-d");
                $date = new DateTime($ddate);
                $week = $date->format("W");
                
                ?>
								<label class="form-group control-label label-position">Please Select The Week</label>
						  
								
               
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
    
    $('.week-pick .ui-datepicker-calendar tr').on('mousemove', function() { $(this).find('td a').addClass('ui-state-hover'); });
    $('.week-pick .ui-datepicker-calendar tr').on('mouseleave', function() { $(this).find('td a').removeClass('ui-state-hover'); });
  });

</script>
 <div class="week-pick"></div>
   
            </div>
            <div class="col-sm-6">
								<div class="col-sm-12 form-group" style="padding: 0" >
                  <label>Week Start Date:</label>
                  <input type="text" id="startDate" placeholder="Week Start Date" name="start_date_week" class="form-control form-control-left-radius" value="" readonly>

							</div>
                <div class="col-sm-12 form-group" style="padding: 0" >
                  <label>Week End Date:</label>
                  <input type="text" id="endDate" placeholder="Week End Date"  name="end_date_week" class="form-control form-control-left-radius" value="" readonly>

              </div>
              </div>
               
                  <div class="col-sm-6 form-group"><input type="submit" name="selected_week_btn" value="View Report" class="btn btn-danger form_submit_button" id="submit" style=""></div>
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
        <div class="col-sm-6">
                <?
                $ddate = date("Y-m-d");
                $date = new DateTime($ddate);
                $week = $date->format("W");
                
                ?>
               <label class="form-group control-label label-position">Please Select The Month</label>
              
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
    
    $('.week-picker .ui-datepicker-calendar tr').on('mousemove', function() { $(this).find('td a').addClass('ui-state-hover'); });
    $('.week-picker .ui-datepicker-calendar tr').on('mouseleave', function() { $(this).find('td a').removeClass('ui-state-hover'); });
});

 
</script>
 <div class="week-picker"></div>

   
           </div>
                 <div class="col-sm-6">
                <div class="col-sm-12 form-group" style="padding: 0" >
                  <label>Month Start Date:</label>
                  <input type="text" id="startDate2" placeholder="Month Start Date" name="start_date_week" class="form-control form-control-left-radius" value="" readonly>

              </div>
                 <div class="col-sm-12 form-group" style="padding: 0" >
                  <label>Month End Date:</label>
                  <input type="text" id="endDate2" placeholder="Month End Date"  name="end_date_week" class="form-control form-control-left-radius" value="" readonly>

              </div>
              </div>
                    <div class="col-sm-6 form-group">
                  <input type="submit" name="selected_week_btn" id="submit2" value="View Report" class="btn btn-danger form_submit_button" style="">
                  </div>
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
        <div class="col-sm-6">
                <?
                $ddate = date("Y-m-d");
                $date = new DateTime($ddate);
                $week = $date->format("W");
                
                ?>
                
              
   <label class="form-group control-label label-position">Please Select The Date</label>
              
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
    
    // $('.date-picker .ui-datepicker-calendar tr'). on('mousemove', function() { $(this).find('td a').addClass('ui-state-hover'); });
    // $('.date-picker .ui-datepicker-calendar tr'). on('mouseleave', function() { $(this).find('td a').removeClass('ui-state-hover'); });
});
</script>
 <div class="date-picker"></div>

   
           </div>
            <div class="col-sm-6">
                <div class="col-sm-12 form-group" style="padding: 0" >
                  <label>Date Selected:</label>
                  <input type="text" id="startDate3" placeholder="Date" name="start_date_week" class="form-control form-control-left-radius" value="" readonly>

              </div>
              </div>
                <div class="col-sm-6 form-group">
                <input type="hidden" id="endDate3" placeholder="Week End Date"  name="end_date_week" class="form-control" value="" readonly>
                 <input type="submit" id="submit3" name="selected_week_btn" value="View Report" class="btn btn-danger form_submit_button" style="">
                 </div>
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
        </div>   


      
   


</div> 




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
   padding:0;
    margin: 0;
    border-radius: 10vh;
    padding-left: 1vw;

   
    background: #f8f8f8;
    color:#888;
    border:none;
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
   font-size: 2.1vh;
}

.row {
    margin-right: 0px;
    
}
label {
    
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

#submit,#submit2,#submit3
{

  background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;
  border:none;
  outline: none;
}
 </style>   
  <footer>
  <? include("footer.php"); ?>
<footer>