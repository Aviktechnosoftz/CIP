<?php
session_start();
include_once('connect.php');
// print_r($_POST);
error_reporting(0);
if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}



?>
<header>
 <? include('header.php'); ?>
 <? include('test_side_new.php');?>
 <!-- fancybox CSS library -->
<link rel="stylesheet" type="text/css" href="js/jquery.fancybox.css">
<!-- JS library -->

<!-- fancybox JS library -->







    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.js"></script>
    <!-- <script src="js/bootstrap.min.3.3.6.js"></script> -->
     
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css">

<script src="js/jquery.fancybox.js"></script>

   </header>
   


<div class="Main_Form"  style="border: 1px solid grey;
    float: left;
    position: absolute;
    /* margin: -220px 0 0 -200px; */
    margin-top: -25vh;
    top: 38.5vh;
    left: 27.5vw;
    width: 72.5vw;
    background-color: #f5f5f5;
    border-radius: 4px;
    
    max-height: 82vh;">
    
 <center>

<div class="col-lg-12" style="min-height: 70vh">

  <label class="col-md-12 control-label" ></label>
  
    <input type="button" class="btn btn-success" value="Back"  onclick="back()" style="float: left;background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none; margin-top: 2vh;"> </input>

    <script>
      function back()
      {
          window.location.href="header.php";
      }
    </script>


<div>
<span style="font-size:3vh;text-align:left;line-height:2;color: #DF5430;font-family: Helvetica_Nue;font-weight: 200">Safety Statistics</span></div>
<span style="font-weight: 100">Please Select the View Type</span> &nbsp
<select id="view" onchange="select_view()">  <option value="weekly">Weekly</option>
       
        <option value="monthly">Monthly</option>
        </select>
            <script type="text/javascript">
    $(document).ready(function() {
         $("#weekly").hide();
          $("#monthly").hide();
          $('#submit_date').attr('disabled',true);
            $("#submit_date").attr('value', 'Select Date');
            select_view();
    });
      function select_view()
      {
         $('.gallery').empty();
        var a = $( "#view option:selected" ).text();
       
        if(a == 'Weekly'){
        $(".week-pick").show();
         $(".month-pick").hide();
          $(".date-picker").css("display", "none");
          $('#contact_form').attr('action', "statistics_week_form.php");
          
      }
      if(a == 'Monthly'){
        $(".month-pick").show();
         $(".week-pick").hide();
           $(".date-picker").css("display", "none");
           $('#contact_form').attr('action', "statistics_month_form.php");
      }

       if(a == 'Daily'){
        $(".month-pick").hide();
         $(".week-pick").hide();
           $(".date-picker").show();
      }
     
      
     }

    </script>
  


<form class="well form-horizontal" method="post"  id="contact_form"> 


<div class="form-group">
  <label class="col-md-4 control-label" >Employer/Business Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group" style="    z-index: 0;">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <select  class="form-control selectpicker"   name="employer" id="employer" onchange="employer_id()" required>
    <option value=""> Please Select Employer</option>
  <? $employer= $conn->query("select * from tbl_employer where project_id='".$_SESSION['admin']."' AND is_deleted=0");
      while($row= $employer->fetch_object())
      {
   ?>
    <option value=<?= $row->id ?>> <? echo $row->company_name ?> </option>
    <? }?>
    </select>
    </div>
  </div>
</div>
<div class="date-picker"></div>
   

<script>
$(function() {
    var startDate;
    var endDate;
    
    var  selectCurrentWeek = function() {
       
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
            $('#date').html($.datepicker.formatDate( dateFormat, startDate, inst.settings ));
            $('#date2').html($.datepicker.formatDate( dateFormat, startDate, inst.settings ));
              
            selectCurrentWeek();
            view_report_enable();
        },
       
        onChangeMonthYear: function(year, month, inst) {
            selectCurrentWeek();
        }
     });
    });
    
 
</script>


       <div class="week-pick"></div>


      
        <div class="col-sm-12 form-group" style="" >
                <?
                $ddate = date("Y-m-d");
                $date = new DateTime($ddate);
                $week = $date->format("W");
                
                ?>
                
              
                
               
<script>
$(function() {
    var startDate;
    var endDate;
    
    var selectCurrentWeek = function() {
       

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
             $('#startDate3').val($.datepicker.formatDate( dateFormat, startDate, inst.settings ));
            $('#endDate3').val($.datepicker.formatDate( dateFormat, endDate, inst.settings ));

            $('#date').html($.datepicker.formatDate( dateFormat, startDate, inst.settings ));
            $('#date2').html($.datepicker.formatDate( dateFormat, endDate, inst.settings ));
            view_report_enable();
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
</div>
<div class="month-pick"> </div>
</div>
  

        <div class="col-sm-12 form-group" style="" >
                <?
                $ddate = date("Y-m-d");
                $date = new DateTime($ddate);
                $week = $date->format("W");
                
                ?>
               
              
    <script>
$(function() {
    var startDate;
    var endDate;
    
    var  selectCurrentWeek = function() {
        
        window.setTimeout(function () {
            $('.month-pick').find('.ui-datepicker-current-day a').addClass('ui-state-active')
        }, 1);
    }
    
    $('.month-pick').datepicker( {
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
             $('#startDate3').val($.datepicker.formatDate( dateFormat, startDate, inst.settings ));
            $('#endDate3').val($.datepicker.formatDate( dateFormat, endDate, inst.settings ));

            $('#date').html($.datepicker.formatDate( dateFormat, startDate, inst.settings ));
            $('#date2').html($.datepicker.formatDate( dateFormat, endDate, inst.settings ));
            view_report_enable();
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
    
    $('.month-pick .ui-datepicker-calendar tr').live('mousemove', function() { $(this).find('td a').addClass('ui-state-hover'); });
    $('.month-pick .ui-datepicker-calendar tr').live('mouseleave', function() { $(this).find('td a').removeClass('ui-state-hover'); });
});

 function view_report_enable()
 {
  $('#submit_date').attr('disabled',false);
            $("#submit_date").attr('value', 'View Report');
 }

 function employer_id()
 {
    var contents = $('#employer :selected').val();
    // alert(contents);
     $( "#employer_selected" ).val(contents);
  }
</script>
 
<input type="hidden" id="startDate3" name="start_date">
<input type="hidden" id="endDate3" name="end_date">
<input type="hidden" id="employer_selected" name="employer">
<label id="" style="text-align: center;">Selected Date: </label> <label id="date">N/A</label> --To-- </label> <label id="date2">N/A</label><br><br>
 <label id="description"></label>
   
           
       <label class="col-md-12 control-label" ></label>
  
    <input type="submit" class="btn btn-danger" value="View Images" id="submit_date"   style=" width:125px;
    margin-left:auto;
    margin-right:auto;" > </input>              
</form>

     
    </div>
</div>
</center>
</div>

<style type="text/css">
.gallery img {
    width: 20%;
    height: auto;
    border-radius: 5px;
    cursor: pointer;
    transition: .3s;
   /* margin-left: 2vw;*/
}
 
#text_title
{
    text-shadow:1px 1px 1px rgba(51,255,105,1);font-weight:normal;color:#0C4FEB;letter-spacing:1pt;word-spacing:-1pt;font-size:13px;text-align:left;font-family:arial, helvetica, sans-serif;line-height;
}
#description
{
  color: red;
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

.well {
    
    padding: 38px;
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

.input-group-addon:first-child {
    /* border-right: 0; */
       border-bottom-left-radius: 10vh;
    border-top-left-radius: 10vh;
    border: none;
}
#submit_date
{
  background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;
}
</style>
<footer>
  <? include("footer.php"); ?>
<footer>

