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

$get_main_detail=$conn->query("select tbl_employee.id as induction_id, CONCAT_WS(' ',tbl_employee.given_name,tbl_employee.surname) as name,tbl_employee.pin,tbl_employee.email_add,tbl_employee.contact_phone,tbl_employee.job_title  ,tbl_employer.company_name,tbl_employer.Tread ,tbl_induction_register.empid  as employer_id ,tbl_project.id as project_id,project_name FROM tbl_employee JOIN tbl_induction_register ON tbl_employee.id = tbl_induction_register.id JOIN tbl_employer ON tbl_employer.id = tbl_induction_register.empid INNER JOIN tbl_project ON  tbl_induction_register.project_id=tbl_project.id WHERE tbl_employee.id ='".$_SESSION["induction"]."' AND tbl_employee.pin ='".$_SESSION["pin"]."'")->fetch_object();

$status=$conn->query("select max(date(created)) as date, IF(DAYOFWEEK(max(date(created)))='7', max(date(created))  + INTERVAL 2 day   ,  max(date(created)) + INTERVAL 1 day )
  as Max
FROM tbl_sm_report_filled
")->fetch_object();


 $count_action = $conn->query("select count(*) as count FROM tbl_sm_report_action left join tbl_sm_report_main on (tbl_sm_report_main.id = tbl_sm_report_action.row_id) left join tbl_sm_report_task_obs on (tbl_sm_report_action.row_id=tbl_sm_report_task_obs.id)  WHERE  ((tbl_sm_report_action.action = '2' or ( (tbl_sm_report_action.actual_date  = '' AND tbl_sm_report_action.actual_date IS NULL))) AND (tbl_sm_report_action.checklist_udid = '".$_SESSION['udid_report']."') )")->fetch_object();
$act_count= $count_action->count;
 
?>
<header>
  <? include('header.php'); ?>
  <? //include('test_side_new.php');?>
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!--     <script src="js/jquery.min.js"></script> -->
  <script src="js/bootstrap.min.js"></script>
</header>
<div class="bluebackground mobilebackground col-md-12 col-sm-12" style="padding-right: 0px; padding-left: 0px">
<div class="main_form_header_site_visit tab_site_visit ">
  <div class="col-md-12" style="padding-top: 5vh">
    <div class="col-md-6 col-xs-6 main_title_container">
      <legend class="main_title_blue">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
      <label class="control-label rightpadding"><span class="form-name_blue" style="color: rgb(191, 184, 184) !important;">SENIOR MANAGEMENT SITE VISIT REPORT&nbsp;</span></label>
      <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container ">
      <img class="logowidth" src="image/logo.png" width="17%" style="image-rendering: pixelated;width :14vh;">
    </div>
  </div> 
</div>
<div class="Main_Form_list_site_visit tab_site_visit_new " style="min-height: 64%;">
  <div class="form-horizontal well_class_site_visit">
    <div class="form-group">
      <div class="col-md-12" style="padding-left: 0px;padding-bottom: 5px;"> <label class="col-md-12 control-label" style=""><span class="project_title_blue" style="">PROJECT :&nbsp;<? echo $_SESSION['project_name'] ?> </span></label>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6">
        <label class="label_blue" style="color: rgb(191, 184, 184) !important;">Senior Managers Name</label>
        <input type="text" placeholder="Contact Person.." id="emp_contact" class="form-control form-control-left-radius inBacknew"  value="<?php echo $get_main_detail->name ?>" readonly >
      </div>
      <div class="col-sm-6">
        <label class="label_blue" style="color: rgb(191, 184, 184) !important;">Project Name</label>
        <input type="text" placeholder="Contact Person.." id="emp_contact" class="form-control form-control-left-radius inBacknew"  value="<? echo $_SESSION['project_name'] ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6">
        <label class="label_blue" style="color: rgb(191, 184, 184) !important;">Email</label>
        <input type="text" placeholder="Contact Person.." id="emp_contact" class="form-control form-control-left-radius inBacknew"  value="<?php echo $get_main_detail->email_add ?>" readonly>
      </div>        
      <div class="col-sm-6">
        <label class="label_blue" style="color: rgb(191, 184, 184) !important;">Mobile No.</label>
        <input type="text" placeholder="Contact Person.." id="emp_contact" class="form-control form-control-left-radius inBacknew"  value="<?php echo $get_main_detail->contact_phone ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6">
        <label class="label_blue" style="color: rgb(191, 184, 184) !important;">Last Inspection Date</label>
         <div class="input-group datepicer-icon">
        <input type="text" style="border-radius: 20vh 0vh 0vh 20vh !important;background-color: #fff" placeholder="Contact Person.." id="emp_contact" class="idate datepickernew_bg picker"  value="<?php echo date('Y-m-d') ?>" readonly>
         <span class="input-group-btn">
            <button class="btn btn-default inBackButton" type="button" style="height: 34px;border-radius: 0vh 20vh 20vh 0vh;outline: none;" readonly>
              <span class="glyphicon glyphicon-calendar" ></span>
            </button>
          </span>
        </div>
      </div>      
      <div class="col-sm-6">
        <label class="label_blue" style="color: rgb(191, 184, 184) !important;">This Inspection Date</label>
        <div class="input-group datepicer-icon">
          <input type="text" class="idate datepickernew_bg picker" id="date_status" placeholder="Date"  style="border-radius: 20vh 0vh 0vh 20vh !important;" />
          <span class="input-group-btn">
            <button class="btn btn-default inBackButton" type="button" style="height: 34px;border-radius: 0vh 20vh 20vh 0vh;outline: none;">
              <span class="glyphicon glyphicon-calendar" ></span>
            </button>
          </span>
        </div>
      </div>
    </div>
    <div class="form-group" style="text-align: center;margin-top: 80px;">
      <div class="col-sm-3" style="padding: 0px"  >
        <div class="col-sm-12" style="border-right: 1px solid #ddd">
          <input type="button"  class="bg1" id= "submit_1" value=""  name="set" data-toggle="modal" data-target="#myModal_date_2"  autocomplete="off"  onclick="image_1()"/>
        </div>
        <div class="col-sm-12">
        <label class="label_blue" id="site_team" style="margin-top: 10px;padding-left: 0px;">CIP Site Team</label>
      </div>
      </div>      
      <div class="col-sm-3" style="padding: 0px" >
        <div class="col-sm-12" style="border-right: 1px solid #ddd">
        <input type="button" class="bg2" id="submit_2"  value="" data-toggle="modal" data-target="#myModal_date" onclick="image_2()"  /></div>
        <div class="col-sm-12">
        <label class="label_blue" id="review_calendar" style="margin-top: 10px;padding-left: 0px;">Review Calendar</label>
      </div>
    </div>
    <!-- </div>
    <div class="form-group"> -->
      <div class="col-sm-3" style="padding: 0px" >
        <div class="col-sm-12" style="border-right: 1px solid #ddd">
        <input type="button"  class="bg3" id="submit_3" value=""  onclick=" create_checklist()"  /></div>
        <div class="col-sm-12">
        <label class="label_blue" id="start_audit" style="margin-top: 10px;padding-left: 0px;">Start Audit</label>
      </div>

    </div>
      <div class="col-sm-3" style="padding: 0px">
        <div class="col-sm-12">
          <button type="button"  class="bg4 " id= "submit_4" value=""  name="set"  data-complete-text="Loading Completed" autocomplete="off" onclick="myActionRequired( '<? echo $act_count;?>' )" >
            <span class="badge" id="actionZ">
              <? echo $act_count;?>
            </span>
          </button>
        </div>
        <div class="col-sm-12">
        <label class="label_blue" id="my_action_item" style="margin-top: 10px;padding-left: 0px;">My Action Item</label>
      </div>
    </div>     
  </div>
</div>

   <? include("Checklist_visit_footer/footer_new.php"); ?>

</div>
</div>
<div class="modal fade modal-open_1 modal_1" id="myModal_date" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <center> <button type="button" class="btn btn-default" data-dismiss="modal">X</button></center>
      </div>
      <div class="modal-body cus-body_1">               
        <iframe src="mdate_visit.php" style="height: 95% !important; width:99.6%"  frameborder="0"></iframe>
      </div>
    </div>  
  </div>
</div>


<div class="modal fade" id="myModal_date_2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content"> 
      
      <div class="modal-body cus-body_2" style="background:#F5F5F5;padding: 0 !important; ">  
      <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:50%;float: right;margin-top: -20px;margin-right: 6px;outline: none;border: none;width: 40px;height: 40px;">&#x2715;</button>             
        <iframe id="dataview_data" src="API/dataview_api.php?project=<?=$_SESSION['admin']?>" style="height: 80%" width="99.6%"  frameborder="0"></iframe>
      </div>
    </div>  
  </div>
</div>
<script type="text/javascript">
  $("#myModal_date_2").on("hidden.bs.modal", function () {
     $('#dataview_data').attr("src", $('#dataview_data').attr("src"));
});
</script>


<script type="text/javascript">
  function create_checklist()
  {
    $('#submit_3').removeClass('bg3');
    $('#submit_3').addClass('bg_3');
    $('#submit_1').addClass('bg1');
    $('#submit_2').addClass('bg2');
    $('#submit_4').addClass('bg4');
    $('#submit_1').removeClass('bg_1');
    $('#submit_2').removeClass('bg_2');
    $('#submit_4').removeClass('bg_4');

    // $('#site_team').css('color','#C9D5D8','important');
    // $('#review_calendar').css('color','#C9D5D8','important');
    //  $('#start_audit').css('color','#33bbb6','important');
    //   $('#my_action_item').css('color','#C9D5D8','important');

      if($('#date_status').val() == "")
      {
        alert("Please Select Inspection Date");
        return false;
      }

      var ins_date= $('#date_status').val();

      var d = new Date();
      var time= d.toLocaleTimeString();
      var formated_date= ins_date+" "+time;

      $.ajax({
                        type: "POST",
                        url: "ajax_insert_visit_report_filled.php",
                        data: {inspection_date: formated_date},
                        success: function(data) {
                       console.log(data);
                            if(data=='1')
                            {
                              window.location.href="site_visit_checklist.php";
                            }
                            else
                            {
                              alert('Technical Error !! Try Again Later');
                            }
                          
                             
                        }
                    });
  }



  function image_1()
  {
    $('#submit_1').removeClass('bg1');
    $('#submit_1').addClass('bg_1');
    $('#submit_2').addClass('bg2');
    $('#submit_3').addClass('bg3');
    $('#submit_4').addClass('bg4');
    $('#submit_1').removeClass('bg1');
    $('#submit_2').removeClass('bg_2');
    $('#submit_3').removeClass('bg_3');
    $('#submit_4').removeClass('bg_4');

    /*$('#site_team').css('color','#33bbb6','!important');*/
    // $('#site_team').attr('style', 'color: #33bbb6 !important');
    // $('#review_calendar').css('color','#C9D5D8','important');
    //  $('#start_audit').css('color','#C9D5D8','important');
    //   $('#my_action_item').css('color','#C9D5D8','important');

  }
  function image_2()
  {
    $('#submit_2').removeClass('bg2');
    $('#submit_2').addClass('bg_2');
    $('#submit_1').addClass('bg1');
    $('#submit_3').addClass('bg3');
    $('#submit_4').addClass('bg4');
    $('#submit_1').removeClass('bg_1');
    $('#submit_3').removeClass('bg_3');
    $('#submit_4').removeClass('bg_4');


    // $('#site_team').css('color','#C9D5D8','important');
    // $('#review_calendar').css('color','#33bbb6','important');
    // $('#start_audit').css('color','#C9D5D8','important');
    // $('#my_action_item').css('color','#C9D5D8','important');
  }


</script>




<style>
  /* css for site visit new*/
  /* css for header*/
  #actionZ
  {
    background: red;
    padding: 4px 7px;
    font-size: 14px;
    margin-left: 20px;
    position: absolute;
    margin-top: -30px;
    color: #fff;
  }

  .main_form_header_site_visit
  {
    float: left;
    position: absolute;
    top: -3vh;
        width: 100%;
   /* top: 16vh;*/
   /* left: 27.5%;
    width: 72.5%;*/
    /*background-color: #f5f5f5;*/
    height: 21.5%;
    padding-top: 30px;
    padding-bottom: 0px;
    padding-left: 15px;
    padding-right: 20px;
   /* background: #201B1F;*/
  }
  /* css for body*/
  .Main_Form_list_site_visit
  {
    float: left;
    position: absolute;
    top: 21vh;
    /*left: 27.5%;
    width: 72.5%;*/
    /*background-color: #f5f5f5;*/
    overflow-y: scroll;
    max-height: 56%;
    min-height: 56%;
    margin-bottom: 0px;
    /*background: #201B1F; */
  }
  .well_class_site_visit
  {
    border: none !important;
    padding: 0px 30px !important;
    margin-bottom: 75px !important;
    box-shadow: none !important;
    /*background: #201B1F !important;*/
  }
  /* css for input field*/
  .inBack
  {
    background-color:#424043 !important;
    color: #fff !important; 
  }
  .inBacknew
  {
    background-color:#fff !important;
  }
  .inBackButton
  {
    background-color:#fff !important;
    /*border-color:  #424043 !important;*/
  }


  .form-control 
  {
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
  input.form-control,input.form-control:focus 
  {
    border:none;
    box-shadow: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    -moz-transition: none;
    -webkit-transition: none;
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

 
  .datepicker_bg{
    background: #424043 !important;
    padding-left:25px !important;
    position: relative;
    z-index: 2;
    float: left;
    color: #fff;
    outline: none;
    width: 100%;
    margin-bottom: 0;
    -webkit-transition: none;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    border:none;
    border-radius: 20vh 0vh 0vh 20vh !important;
  }
  .datepickernew_bg{
    padding-left:25px !important;
    position: relative;
    z-index: 2;
    float: left;
    outline: none;
    width: 100%;
    margin-bottom: 0;
    -webkit-transition: none;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    border:none;
    border-radius: 20vh 0vh 0vh 20vh !important;
  }
  .changebackground {
  background-color: #fff !important;
}

.bluebackground {
  /*background-image: url(./image/bg@2x.png);
   background-repeat: no-repeat;*/
   background: -webkit-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);
background: -o-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);
background: -ms-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);
background: -moz-linear-gradient(left, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);
background: linear-gradient(to right, rgb(30, 45, 68) 0%, rgb(62, 80, 104) 100%);

  height: 100%;
  margin-left: 27.5%;
  width: 72.5%;
  position: absolute;
    top: 16vh;
    /*background-size: 100%;
    background-position:center;
*/
}
.footer_date {
    padding-left: 17.5vw !important;
}
@media (max-width: 1024px){
   
      .logowidth{
      width: 14vh !important;
    }
      .footer_date {
    padding-left: 11.5vw !important;
    }
     #actionZ
  {
    background: red;
    padding: 4px 7px;
    font-size: 11px;
    margin-left: 12px;
    position: absolute;
    margin-top: -24px;
    color: #fff;
  }
}
@media (max-width: 768px){
   #actionZ
  {
    background: red;
    padding: 4px 7px;
    font-size: 7px;
    margin-left: 6px;
    position: absolute;
    margin-top: -20px;
    color: #fff;
  }
    .bluebackground {
       height: 93% !important;
      top: 89px !important;
        background-size: 125% !important;
    }
   .footer_date {
    padding-left: 6.5vw !important;
}
    .tab_site_visit_new {
      top: 22.5vh !important;
      min-height: 68% !important;
    }
    .logowidth{
      width: 15vh !important;
    }
    .tablogo {
       width: 20vw !important;
    }

}
</style>
<input id="current" type="text" value="<?php echo date('Y-m-d');?>"/ hidden><br/>
 <input id="dbdate" type="text" value="<?php echo "$status->Max";?>" hidden><br/>
<script type="text/javascript">
  $(function () {
  Date.prototype.getWeek = function() {
    var onejan = new Date(this.getFullYear(),0,1);
    var today = new Date(this.getFullYear(),this.getMonth(),this.getDate());
    var dayOfYear = ((today - onejan +1)/86400000);
    return Math.ceil(dayOfYear/7)
};

Date.prototype.toDateString = function() { 
    return [[['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'][this.getMonth()], this.getDate()].join('. '), this.getFullYear()].join(', '); 
  } 
  
var ddate=$("#dbdate").val();
  var cdate=$("#current").val();
  var pass;
  if(ddate>=cdate)
    pass=ddate;
  else 
    pass=cdate;
  //alert(pass);
  
 
    var today = new Date(pass);
    var weekno = today.getWeek();
    var today1 = new Date();
    var weekno1 = today1.getWeek();
    //alert(weekno);
var year = new Date(pass).getFullYear();
  var weekNum =  year+""+weekno;
  //alert(weekNum);
  var yr = weekNum.substr(0,4); 
  var wk = weekNum.substr(4,6); 

  var tm = 1000*60*60*24; 
  var d=0; 
  do { 
    var start = new Date(yr,0,1+d); 
    d++ 
  } while(start.getDay() != 1) 

  var sta_dt = new Date(start.getTime()+tm*(wk-1)*7); 
  var end_dt = new Date(sta_dt.getTime()+tm*6); 

  //alert(sta_dt.toDateString()); 
  function convert(end_dt) {
    var date = new Date(end_dt),
        mnth = ("0" + (date.getMonth()+1)).slice(-2),
        day  = ("0" + date.getDate()).slice(-2);
    return [ date.getFullYear(), mnth, day ].join("-");
}

  var abcd=convert(end_dt);
  var date1 = new Date(abcd);
  var date2 = new Date(pass);
if(weekno==weekno1)
  {

  var timeDiff = Math.abs(date2.getTime() - date1.getTime());
  var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 

}
 $("#date_status").datepicker({
        firstDay: 0,
        duration: "fast",
             showAnim: "slide", 
             showOptions: {direction: "down"}, 
        beforeShowDay: function (date) {
            //var sunday = new Date("June 2, 2013 00:00:00");
      
            var sunday = new Date(pass);
            sunday.setHours(0,0,0,0);
            //alert(sunday.getDay() + ' : ' + sunday.getDate() + ' : ' + (sunday.getDay() || 0) + ' : ' + sunday.getTime());
            //sunday.setDate(sunday.getDate() - (sunday.getDay() || 0));    
            var saturday = new Date(sunday.getTime(pass));
            saturday.setDate(sunday.getDate()  + diffDays-1);
            return [(date >= sunday && date <= saturday), ''];
      
        }
    });
    $("#date_status").datepicker("option", "dateFormat", "yy-mm-dd");
});

$('.datepicer-icon').on('click', '.btn', function(e) {
  $(e.delegateTarget).find('#date_status').focus();
});

function myActionRequired(action)
  {
    $('#submit_4').removeClass('bg4');
    $('#submit_4').addClass('bg_4');
    $('#submit_1').addClass('bg1');
    $('#submit_3').addClass('bg3');
    $('#submit_2').addClass('bg2');
    $('#submit_1').removeClass('bg_1');
    $('#submit_3').removeClass('bg_3');
    $('#submit_2').removeClass('bg_2');

    // $('#site_team').css('color','#C9D5D8','important');
    // $('#review_calendar').css('color','#C9D5D8','important');
    //  $('#start_audit').css('color','#C9D5D8','important');
    //   $('#my_action_item').css('color','#33bbb6','important');

    if(action>0)
    {
      window.location='site_visit_action_required.php'; 
    }
    else
    {
       $('#submit_4').notify("No Action Item", { position:"top-right" });
    }
  }
</script>



<script type="text/javascript">
  $(".picker").addClass("changebackground");
/*$('.input-group .form-control').css('background-color','#424043');
$('.form-control-left-radius').css('background-color','#424043','!important');*/
//$('.idate form-control form-control-left-radius hasDatepicker').css('color','red !important');
</script>


<style type="text/css">
  .modal-open .modal_1
  {
    overflow-x: hidden;
    overflow-y: hidden;
    height: 95% !important;
  }
  .cus-body_1
  {
    overflow-x: none!important;
    overflow-y: none!important;
  }

.ui-widget-header .ui-icon
{
  /*background-image: url(image/arrows_right.png);*/
}

.bg_1 
{
  background: url(./image/cipteam_green@2x.png);
  background-repeat: no-repeat;background-size:100%;
  height: 8vh;
  image-rendering:-webkit-optimize-contrast; 
  background-position: center;
  width: 8vw;
  color: white;border:none;border-radius:10vh;
 border:none;
  outline: none;
}

.bg1 
{
  background: url(./image/cipteam1_gray.png);
  background-repeat: no-repeat;background-size:100%;
  height: 8vh;
  image-rendering:-webkit-optimize-contrast; 
  background-position: center;
  width: 8vw;
  color: white;border:none;border-radius:10vh;
  border:none;
  outline: none;
}
.bg2
{
  background: url(./image/review_gray.png);background-repeat: no-repeat;background-size:100%; outline: 0 !important;height:8vh;image-rendering:-webkit-optimize-contrast; background-position: center;
  width: 8vw;
  color: white;border:none;border-radius:10vh;
 border:none;
  outline: none;
}
.bg_2
{
  background: url(./image/review_green@2x.png);background-repeat: no-repeat;background-size:100%; outline: 0 !important;height:8vh;image-rendering:-webkit-optimize-contrast; background-position: center;
  width: 8vw;
  color: white;border:none;border-radius:10vh;
 border:none;
  outline: none;
}
.bg3{
  background: url(./image/start_audit_gray.png);background-repeat: no-repeat;background-size:100%; outline: 0 !important;height:8vh;image-rendering:-webkit-optimize-contrast; background-position: center;
   width: 8vw;
  color: white;border:none;border-radius:10vh;
 border:none;
  outline: none;
}
.bg_3{
  background: url(./image/start_audit_green@2x.png);background-repeat: no-repeat;background-size:100%; outline: 0 !important;height:8vh;image-rendering:-webkit-optimize-contrast; background-position: center;
   width: 8vw;
  color: white;border:none;border-radius:10vh;
 border:none;
  outline: none;
}

.bg4{
background: url(./image/my_action_gray1.png);background-repeat: no-repeat;background-size:100%; outline: 0 !important;height:8vh;image-rendering:-webkit-optimize-contrast; background-position: center;
width: 8vw;
  color: white;border:none;border-radius:10vh;
 border:none;
  outline: none;
}
.bg_4{
background: url(./image/my_action_green@2x.png);background-repeat: no-repeat;background-size:100%; outline: 0 !important;height:8vh;image-rendering:-webkit-optimize-contrast; background-position: center;
width: 8vw;
  color: white;border:none;border-radius:10vh;
 border:none;
  outline: none;
}
</style>