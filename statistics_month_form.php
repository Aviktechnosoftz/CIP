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
$week_start= $_POST['start_date'];
$week_end= $_POST['end_date'];
// print_r($_POST);
$month_end=substr($week_end, -2,2);
$month_number= $month_end;


$get_empid= $conn->query("select company_name from tbl_employer where id='".$_POST['employer']."'")->fetch_object();

$get_project_name= $conn->query("select * from tbl_project where id='".$_SESSION['admin']."'")->fetch_object();	

$get_visitor= $conn->query("select count(*) as all_s,today_date,DAYNAME(today_date),tbl_induction_register.empid from tbl_visitor_induction inner join tbl_induction_register on tbl_induction_register.id=tbl_visitor_induction.induction_no  where  tbl_visitor_induction.today_date between '".$week_start."' AND '".$week_end."'  and tbl_induction_register.empid='".$_POST['employer']."' AND tbl_induction_register.project_id='".$_SESSION['admin']."'
");

$get_attendance= $conn->query("Select *,today_date,sum(no_of_worker) AS sum,DAYNAME(today_date)as dayname from tbl_site_attendace LEFT JOIN tbl_induction_register ON tbl_site_attendace.induction_no = tbl_induction_register.id   LEFT JOIN tbl_employer ON tbl_induction_register.empid  = tbl_employer.id   where (today_date between '".$week_start."' AND '".$week_end."'  AND tbl_induction_register.empid='".$_POST['employer']."') AND tbl_site_attendace.project_id='".$_SESSION['admin']."'");


$start_date = date('Y-m-d', strtotime($week_start));
$end_date = date('Y-m-d', strtotime($week_end));
$end_date1 = date('Y-m-d', strtotime($week_end));

$total_employee=0; // getting Sum For Average Figrues 
$total_hours=0;// getting Total Hours Employee Worked For Average Figrues
$total_visitors=0;
$total_first_aid=0;
$total_incidents=0;
$total_environment=0;
$total_sin=0;
$total_safety=0;
$total_injury=0;

function getWeekDates($date, $start_date, $end_date,$sum,$visitor)
{
    $week =  date('W', strtotime($date));
    $year =  date('Y', strtotime($date));
    
    $from = date("Y-m-d", strtotime("{$year}-W{$week}+1")); //Returns the date of monday in week
    if($from < $start_date) $from = $start_date;
    $to = date("Y-m-d", strtotime("{$year}-W{$week}-7"));   //Returns the date of sunday in week
    if($to > $end_date) $to = $end_date;
    // echo "Start Date-->".$from."End Date -->".$to;//Output : Start Date-->2012-09-03 End Date-->2012-09-09

     echo '<tr><td>'.$from."-To-".$to.'</td>'; 
     echo '<td>'.$sum.'</td>';
      $integer =(int)$sum*8;
     echo '<td>'.$integer.'</td>'; 
       echo '<td>'."0".'</td>'; 
        echo '<td>'."0".'</td>'; 
         echo '<td>'.$visitor.'</td>';
         echo '<td>'."0".'</td>'; 
        echo '<td>'."0".'</td>'; 
        echo '<td>'."0".'</td>'; 
        echo '<td>'."0".'</td>';  
        
}
 
?>
<header>
 <? include('header.php'); ?>
 <? include('test_side_new.php');?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">
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

    <form id="contact" method="post" class="form" role="form" action="pdf_php/site_attendance_register_pdf.php">
  <div class="">
  		<h4> <u>Project: <? echo $get_project_name->project_name ?></u></h4>
    <div class="col-xs-12">
      <div class="table-responsive">
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
          <caption class="text-center">The Requested Safte Statistics Report for the Month: &nbsp <span style="color: red;font-weight: bold"><?=$week_start." --TO-- ".$week_end?></span></caption>
          <h5><strong> Employer:</strong> <? echo $get_empid->company_name ?></h5> 
          <thead>
           
              <th style="width:10vw">Date (Weekly Figures)</th>
            

              <th  style="text-align: center;">Number Of Workers on site</th>  
              	<!-- <th rowspan="2">Comments</th> -->
              
              	<th>Hours Worked(All Emp.)</th>
        				<th>No. of First Aid Treatment Report</th>
        				<th>No. of Major Incidents & Investigation Form</th>
        				<th>No. of Visitors</th>
        				<th>No. of Environmental Incident</th>
        				<th>No. of Sins</th>
                <th>No. of Safety</th>
                <th>No. Of Lost Time Injuries</th>
                         
        	
           
  			</tr>

          </thead>
          <tbody>
          <? 
            for($date = $start_date; $date <= $end_date1; $date = date('Y-m-d', strtotime($date. ' + 7 days')))
{
            // echo getWeekDates($date, $start_date, $end_date);
                $week =  date('W', strtotime($date));
                $year =  date('Y', strtotime($date));
                $from = date("Y-m-d", strtotime("{$year}-W{$week}+1")); //Returns the date of monday in week
                if($from < $start_date) $from = $start_date;
                $to = date("Y-m-d", strtotime("{$year}-W{$week}-7"));   //Returns the date of sunday in week
                if($to > $end_date) $to = $end_date;


                $get_attendance= $conn->query("Select *,today_date,sum(no_of_worker) AS sum,DAYNAME(today_date)as dayname from tbl_site_attendace LEFT JOIN tbl_induction_register ON tbl_site_attendace.induction_no = tbl_induction_register.id   LEFT JOIN tbl_employer ON tbl_induction_register.empid  = tbl_employer.id   where (today_date between '".$from."' AND '".$to."'  AND tbl_induction_register.empid='".$_POST['employer']."') AND tbl_site_attendace.project_id='".$_SESSION['admin']."'")->fetch_object();

                $get_visitor= $conn->query("select count(*) as all_s,today_date,DAYNAME(today_date),tbl_induction_register.empid from tbl_visitor_induction inner join tbl_induction_register on tbl_induction_register.id=tbl_visitor_induction.induction_no  where  tbl_visitor_induction.today_date between '".$from."' AND '".$to."'  and tbl_induction_register.empid='".$_POST['employer']."' AND tbl_induction_register.project_id='".$_SESSION['admin']."'")->fetch_object();

                if($get_attendance->sum == 0)
                {
                  $get_attendance->sum=0;
                }
                    if($get_visitor->all_s == 0)
                {
                  $get_visitor->all_s == 0;
                }

                $total_employee= $total_employee+$get_attendance->sum;
                  $integer =(int)$get_attendance->sum*8;
                $total_hours=$total_hours+$integer;
                $total_visitors= $total_visitors+$get_visitor->all_s;
               
                getWeekDates($date, $start_date, $end_date,$get_attendance->sum,$get_visitor->all_s);

      
} 


          ?>
      </tbody>
          
        </table>

         <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
         
          
          <thead>
           
                <th >Monthly Figures: </th>
                <th>Avg No. of Emp. (Per Day)</th>
                <th>Grand Total Hours Worked</th>
                <th>Grand Total First Aid Treatments/ Reports</th>
                <th>Grand Total of Major Incidents & Investigation Form</th>
                <th>Total No. of Visitors</th>
                <th>Grand Total of Environmental Incident </th>
                <th>Grand Total of SIN's</th>
                <th>Grand Total of Safety Incidents</th>
                <th>Grand Total No. Of Lost Time Injuries</th>
        </tr>

          </thead>
          <tbody>
            <? echo '<tr><td width="30%">'.$week_start.'--To--'.$week_end.' </td>'; 
              echo '<td width="30%">'.round($total_employee/$month_number). '</td>';
              echo '<td width="30%">'.($total_hours). '</td>';
               echo '<td width="30%">'.$total_first_aid. '</td>';
                echo '<td width="30%">'.$total_incidents .'</td>';
                echo '<td width="30%">'.$total_visitors .'</td>';
                echo '<td width="30%">'.$total_environment .'</td>';
                echo '<td width="30%">'.$total_sin .'</td>';
                echo '<td width="30%">'.$total_safety .'</td>';
                echo '<td width="30%">'.$total_injury .'</td>';

            ?>

          </tbody>
         </tbody>
          
        </table>
        
        <input type='hidden' name='date_start'  value='<? echo $week_start ?>'/>
        <input type='hidden' name='date_end'  value='<? echo $week_end ?>'/>
      </div><!--end of .table-responsive-->
    </div>
  </div>
  
  


<div class="col-xs-12 col-md-12 form-group">
<!-- <button class="btn btn-primary pull-right" name="generate" type="submit">Generate PDF</button> -->

</div>
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

.Container
{
    height:90vh;
    width:100vw;
    /*overflow-x:scroll;*/
    overflow-y:scroll;
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
</style>

<footer>
  <? include("footer.php"); ?>
<footer>