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

?>
<header>
  <? include('header.php'); ?>
  <? //include('test_side_new.php');?>
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!--     <script src="js/jquery.min.js"></script> -->
  <script src="js/bootstrap.min.js"></script>
</header>

<div class="main_form_header_site_visit">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
      <legend class="main_title_blue">OCCUPATIONAL HEALTH AND SAFETY MANAGEMENT SYSTEM</legend>
      <label class="control-label rightpadding"><span class="form-name_blue">SENIOR MANAGEMENT SITE VISIT REPORT&nbsp;</span></label>
      <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>
<div class="Main_Form_list_site_visit">
  <div class="well form-horizontal well_class_site_visit">
    <div class="form-group">
      <div class="col-md-12" style="padding-left: 0px;padding-bottom: 5px;"> <label class="col-md-12 control-label" style=""><span class="project_title_blue" style="">PROJECT :&nbsp;<? echo $_SESSION['project_name'] ?> </span></label>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6">
        <label class="label_blue">Senior Managers Name</label>
        <input type="text" placeholder="Contact Person.." id="emp_contact" class="form-control form-control-left-radius inBack"  value="<?php echo $get_main_detail->name ?>" readonly >
      </div>
      <div class="col-sm-6">
        <label class="label_blue">Project Name</label>
        <input type="text" placeholder="Contact Person.." id="emp_contact" class="form-control form-control-left-radius inBack"  value="<? echo $_SESSION['project_name'] ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6">
        <label class="label_blue">Email</label>
        <input type="text" placeholder="Contact Person.." id="emp_contact" class="form-control form-control-left-radius inBack"  value="<?php echo $get_main_detail->email_add ?>" readonly>
      </div>        
      <div class="col-sm-6">
        <label class="label_blue">Mobile No.</label>
        <input type="text" placeholder="Contact Person.." id="emp_contact" class="form-control form-control-left-radius inBack"  value="<?php echo $get_main_detail->contact_phone ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6">
        <label class="label_blue">Last Inspection Date</label>
        <input type="text" placeholder="Contact Person.." id="emp_contact" class="form-control form-control-left-radius inBack"  value="<?php echo date('Y-m-d') ?>" readonly>
      </div>      
      <div class="col-sm-6">
        <label class="label_blue">This Inspection Date</label>
        <div class="input-group datepicer-icon">
          <input type="text" class="idate datepicker_bg" id="date_status" placeholder="Date"  style="border-radius: 20vh 0vh 0vh 20vh !important;" />
          <span class="input-group-btn">
            <button class="btn btn-default inBackButton" type="button" style="height: 34px;border-radius: 0vh 20vh 20vh 0vh;outline: none;">
              <span class="glyphicon glyphicon-calendar" ></span>
            </button>
          </span>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6">
        <input type="button"  class="btn btn-primary form_submit_button_blue" id= "submit" value="CIP Site Team"  name="set"  data-complete-text="Loading Completed" autocomplete="off" onclick="" />
      </div>      
      <div class="col-sm-6">
        <input type="button" class="btn btn-primary form_submit_button_blue"  value="Review Calendar" data-toggle="modal" data-target="#myModal_date" />
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6">
        <input type="button"  class="btn btn-primary form_submit_button_blue"  value="Start Audit"  onclick=" create_checklist()"/>
      </div>
      <div class="col-sm-6">
        <input type="button"  class="btn btn-primary form_submit_button_blue" id= "submit" value="My Action Item ()"  name="set"  data-complete-text="Loading Completed" autocomplete="off" onclick=" " />
      </div>
    </div>     
  </div>
</div>
<!-- <div class="modal fade" id="myModal_date" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <center> <button type="button" class="btn btn-default" data-dismiss="modal">&times;</button></center>
      </div>
      <div class="modal-body">               
        <iframe src="mdate.php" style="height: 80%" width="99.6%"  frameborder="0"></iframe>
      </div>
    </div>  
  </div>
</div> -->

<footer>
  <? include("footer.php"); ?>
<footer>

<script type="text/javascript">
  function create_checklist()
  {
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
                              alert(data);
                            }
                          
                             
                        }
                    });
  }
</script>




<style>
  /* css for site visit new*/
  /* css for header*/
  .main_form_header_site_visit
  {
    float: left;
    position: absolute;
    top: 16vh;
    left: 27.5%;
    width: 72.5%;
    background-color: #f5f5f5;
    height: 21.5%;
    padding-top: 30px;
    padding-bottom: 0px;
    padding-left: 15px;
    padding-right: 20px;
    background: #201B1F;
  }
  /* css for body*/
  .Main_Form_list_site_visit
  {
    float: left;
    position: absolute;
    top: 37.5vh;
    left: 27.5%;
    width: 72.5%;
    background-color: #f5f5f5;
    overflow-y: scroll;
    max-height: 56%;
    min-height: 56%;
    background: #201B1F; 
  }
  .well_class_site_visit
  {
    border: none !important;
    padding: 0px 30px !important;
    margin-bottom: 80px !important;
    box-shadow: none !important;
    background: #201B1F !important;
  }
  /* css for input field*/
  .inBack
  {
    background-color:#424043 !important;
    color: #fff !important; 
  }
  .inBackButton
  {
    background-color:#424043 !important;
    border-color:  #424043 !important;
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

  ::-webkit-scrollbar 
  {
    width: 7px;
    background: #393848;
  }
 
  ::-webkit-scrollbar-track 
  {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }
 
  ::-webkit-scrollbar-thumb 
  {
    border-radius: 10px;
    border-radius: 10px;
    border-top-left-radius: 0;
     border-bottom-left-radius: 0;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    background: #F6F6F6;
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

function myActionRequired()
  {
    window.location='site_manager_action_required.php'; 
  }
</script>
