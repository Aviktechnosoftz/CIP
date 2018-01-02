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
   <div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">QUALITY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">PHOTO WORKS&nbsp;<?// echo $project_name->project_name ?> </span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>


<div class="Main_Form_list">
     <div class="well form-horizontal well_class" >
      <div class="form-group">
           <div class="col-md-12" style="padding-left: 0px;padding-bottom: 5px;">
                <label class="col-md-12 control-label" style=""><span class="project_title" style="">PROJECT :&nbsp;<? echo $_SESSION['project_name'] ?> </span></label>
            </div>
        </div>

  
    <!-- <input type="button" class="btn btn-success" value="Back"  onclick="back()" style="float: left;background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;margin-top: 3vh"> </input>

    <script>
      function back()
      {
          window.location.href="header.php";
      }
    </script> -->


<!-- <div class="col-md-12"> 
<span style="font-weight: 100">Please Select the View Type</span> &nbsp
<select id="view" onchange="select_view()"> <option value="daily" selected="selected">Daily</option>
        <option value="weekly">Weekly</option>
        <option value="monthly">Monthly</option>

</select> -->


<div class="form-group">
 <label class="col-md-12 control-label label-position">Please Select the View Type</label> 
  <div class="col-md-12" style="">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <select  class="form-control selectpicker"   id="view" onchange="select_view()">
    <option value="daily" selected="selected">Daily</option>
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
         $('.gallery').empty();
        var a = $( "#view option:selected" ).text();
       
        if(a == 'Weekly'){
        $(".week-pick").show();
         $(".month-pick").hide();
          $(".date-picker").css("display", "none");
          
      }
      if(a == 'Monthly'){
        $(".month-pick").show();
         $(".week-pick").hide();
           $(".date-picker").css("display", "none");
      }

       if(a == 'Daily'){
        $(".month-pick").hide();
         $(".week-pick").hide();
           $(".date-picker").show();
      }
     
      
     }

    </script>
  
  <form class="form-horizontal" method="post"  id="contact_form" action="test_image_gallery.php"> 


<div class="form-group">
 <label class="col-md-12 control-label label-position">Employer/Business Name</label> 
  <div class="col-md-12" style="">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <select  class="form-control selectpicker"  id="subcontractor_name" required>
    <option value=""> Please Select Employer</option>
  <? $employer= $conn->query("select * from tbl_employer where project_id='".$_SESSION['admin']."' AND is_deleted='0'");
      while($row= $employer->fetch_object())
      {
   ?>
    <option value=<?= $row->id ?>> <? echo $row->company_name ?> </option>
    <? }?>
    </select>
    </div>
  </div>
</div>
<div class="col-sm-12">
<div class="col-sm-6">
<div class="date-picker"></div>
<div class="week-pick"></div>
<div class="month-pick"> </div>
</div>

<div class="col-sm-6" >
  <label id="" style="text-align: center;">Selected Date: </label> <label id="date">N/A</label>&nbsp--To--&nbsp</label><label id="date2" style="padding-left: 0">N/A</label>
</div>

<div class="col-sm-2 col-sm-offset-1">
  <input type="button" class="btn btn-danger form_submit_button" value="View Images"   style="" onclick="show()"> </input> 
</div>
<div class="col-sm-6">
 <label id="description"></label>
</div>
<div class="gallery col-sm-6" style="outline: none">
    
    
    </div> 
</div>


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
        },
       
        onChangeMonthYear: function(year, month, inst) {
            selectCurrentWeek();
        }
     });
    });
    
 
</script>

       
       


      
        <div class="col-sm-12 form-group" >
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

</div>
  

        <div class="col-sm-12 form-group" >
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

 
</script>
 
<input type="hidden" id="startDate3" name="">
<input type="hidden" id="endDate3" name="">


   
           
       
  
                 
</form>




     


    </div>
    </div>
    </div>
    </div>
<script type="text/javascript">
var $= jQuery.noConflict();
    $("[data-fancybox]").fancybox({ });


    
</script>

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


</style>
<footer>
  <? include("footer.php"); ?>
<footer>
<script>
 function show()
      {


        $('.gallery').empty();
        $('#description').empty();
         var emp= $('#subcontractor_name').val();
         var date= $('#startDate3').val();
          var date2= $('#endDate3').val();
         if(emp=="")
         {
         alert("Please Select the Employer");
         return false;
       }
        if(date=="")
         {
         alert("Please Select a Date");
         return false;
       }
      
       $.ajax({
        url: 'ajax_photo_employer.php',
        type: 'POST',
        data: {emp: emp, date: date,date2: date2},
       dataType: 'json',
        success: function (data) {
         // alert(data);
            if(data=="")
            {
              
              $("#description").html("<p> Sorry! No Data Available </p>");
            }
            
             $.each(data, function(index, element) {
              var array = element.split(",");
              $(".gallery").append('<a style="outline:none;text-decoration:none" id="gallery" class="kyc-image" href=API/Uploads/'+array[0]+' data-fancybox="group" data-caption="'+array[1]+'" ><img id="img" src=API/Uploads/'+array[0]+' alt=""  style="margin:1vh 2vw 2vh 1vw;"/>'+array[1]+'</a>')



             
   
                  
                

    });
              
        },
       
    

          

            });
   } 
</script>

