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

$get_project_name= $conn->query("select * from tbl_project where id='".$_SESSION['admin']."'")->fetch_object();	
$get_report= $conn->query("Select *,today_date,sum(no_of_worker) AS sum,DAYNAME(today_date) from tbl_site_attendace LEFT JOIN tbl_induction_register ON tbl_site_attendace.induction_no = tbl_induction_register.id   LEFT JOIN tbl_employer ON tbl_induction_register.empid  = tbl_employer.id where today_date between '".$week_start."' and '".$week_end."'  group by today_date");

// echo "select * from tbl_employer where id='".$get_report->empid."'";
// echo "Select *,today_date,sum(no_of_worker) AS sum,DAYNAME(today_date) from tbl_site_attendace LEFT JOIN tbl_induction_register ON tbl_site_attendace.induction_no = tbl_induction_register.id  where today_date between '2017-02-27' and '2017-03-05' group by today_date";



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>



<head>
<header>
 <? include('header.php'); ?>
 <? include('test_side_new.php') ?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <script src="js/jquery.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
 

</header>
<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">SITE ATTENDANCE REGISTER WEEKLY REPORT&nbsp;<?// echo $project_name->project_name ?> </span></label>
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
         <table  class="table table-hover" style= "border: 1px solid rgba(128, 128, 128, 0.57);"">
          <div class="col-sm-12" style="padding-left: 0px">The Requested Site Attendance Report for the Week: &nbsp <span style="color: red;font-weight: bold"><?=$week_start." --TO-- ".$week_end?></span></div>
          <thead>
            <tr style="background-color: #696969; color: white">
            
              <th rowspan="2">Employer/Business Name</th>
                <th rowspan="2">Trade</th>
              <th colspan="7" style="text-align: center;">Number Of Workers on site</th>  
              	<!-- <th rowspan="2">Comments</th> -->
              </tr>
              	     <tr style="background-color: #696969; color: white">
              			<th>Mon</th>
        				<th>Tue</th>
        				<th>Wed</th>
        				<th>Thu</th>
        				<th>Fri</th>
        				<th>Sat</th>
                 		<th>Sun</th>
                         
        	
           
  			</tr>

          </thead>
          <tbody>
          <? 
               $all_employer=$conn->query("select id from tbl_employer where project_id='".$_SESSION['admin']."' AND is_deleted=0");

               while ($row_employer= $all_employer->fetch_object()) {

                $query_emp1=$conn->query("Select *,today_date,sum(no_of_worker) AS sum,DAYNAME(today_date)as dayname from tbl_site_attendace LEFT JOIN tbl_induction_register ON tbl_site_attendace.induction_no = tbl_induction_register.id   LEFT JOIN tbl_employer ON tbl_induction_register.empid  = tbl_employer.id   where (today_date between '".$week_start."' and '".$week_end."' AND tbl_induction_register.empid='".$row_employer->id."') AND tbl_site_attendace.project_id='".$_SESSION['admin']."' group by today_date,empid order by empid,today_date");

                if($query_emp1->num_rows>0)
                {
                create_row($query_emp1,$week_start,$week_end); 
                }

               }


         //  $query_emp1=$conn->query("Select *,today_date,sum(no_of_worker) AS sum,DAYNAME(today_date)as dayname from tbl_site_attendace LEFT JOIN tbl_induction_register ON tbl_site_attendace.induction_no = tbl_induction_register.id   LEFT JOIN tbl_employer ON tbl_induction_register.empid  = tbl_employer.id   where (today_date between '".$week_start."' and '".$week_end."' AND tbl_induction_register.empid='1') AND tbl_site_attendace.project_id='".$_SESSION['admin']."' group by today_date,empid order by empid,today_date");
         // $query_emp2=$conn->query("Select *,today_date,sum(no_of_worker) AS sum,DAYNAME(today_date)as dayname from tbl_site_attendace LEFT JOIN tbl_induction_register ON tbl_site_attendace.induction_no = tbl_induction_register.id   LEFT JOIN tbl_employer ON tbl_induction_register.empid  = tbl_employer.id   where (today_date between '".$week_start."' and '".$week_end."' AND tbl_induction_register.empid='2') AND tbl_site_attendace.project_id='".$_SESSION['admin']."' group by today_date,empid order by empid,today_date");
         //  $query_emp3=$conn->query("Select *,today_date,sum(no_of_worker) AS sum,DAYNAME(today_date)as dayname from tbl_site_attendace LEFT JOIN tbl_induction_register ON tbl_site_attendace.induction_no = tbl_induction_register.id   LEFT JOIN tbl_employer ON tbl_induction_register.empid  = tbl_employer.id   where (today_date between '".$week_start."' and '".$week_end."' AND tbl_induction_register.empid='3') AND tbl_site_attendace.project_id='".$_SESSION['admin']."' group by today_date,empid order by empid,today_date");

         //  		if($query_emp1->num_rows>0)
         //  		{
         //  			create_row($query_emp1,$week_start,$week_end); 
         //  		}
         //  		if($query_emp2->num_rows>0)
         //  		{
         //  			create_row($query_emp2,$week_start,$week_end); 
         //  		}
         //  		if($query_emp3->num_rows>0)
         //  		{
         //  			create_row($query_emp3,$week_start,$week_end); 
         //  		}


           ?>
          
           <!-- function Starts here -->
            <? function create_row($query_emp,$week_start,$week_end) 

			{
			       
          	$arr= array();
          	$arr2=array();
         
          		while($row1=mysqli_fetch_assoc($query_emp)){

          			$day_emp1= $row1['dayname'];
          			$no_emp1= $row1['sum'];
                $t=$row1['Tread'];
                $d=$row1['today_date'];
          			explode(" ",$day_emp1);
          			explode(" ",$no_emp1);
          			array_push($arr, $day_emp1);
          			array_push($arr2, $no_emp1);
					$emp1= $row1['company_name'];
					$arr3 = array_combine($arr, $arr2);
          	}	
          	// print_r($arr);
          	// print_r($arr2);
          	// print_r($arr3);
          	$days = array("Monday"=>"0", "Tuesday"=>"0","Wednesday"=>"0", "Thursday"=>"0","Friday"=>"0","Saturday"=>"0","Sunday"=>"0");
          	// print_r($days);
          	 foreach($arr3 as $key => $value) {
		            $days[$key] = $value;
      			   }
			   
			    // print_r($arr3);
            // print_r(array_keys($days));
               

          	?>

            <tr>
            
              <td><? echo $emp1 ?></td>
              <td><? echo $t ?></td>

           
              <?
              $from_date = new DateTime($week_start); 

              foreach($days as $number=>$num) {?>

              <td><a href="<?="site_attendance_approved.php?redirect=true&&d=".$from_date->format('Y-m-d')."&"."e=".$emp1?>"><? echo $num; ?></a></td>
              
             <? 
                $from_date->modify('+1 day');
             } 

             ?>
           <!-- <td><?  echo "<input type='text' name='comments[]' value=''/>";
			     
            ?></td>

            <td style="display: none"><?  echo "<input type='hidden' name='employer[]' value='".$emp1."'/>";
           
            ?></td> -->
           
          

  
            </tr>
            <?  } ?>
             <? 
//             createDateRangeArray($week_start,$week_end);

//              function createDateRangeArray($strDateFrom,$strDateTo)
// {
    

//     $aryRange=array();

//     $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
//     $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

//     if ($iDateTo>=$iDateFrom)
//     {
//         array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
//         while ($iDateFrom<$iDateTo)
//         {
//             $iDateFrom+=86400; // add 24 hours
//             array_push($aryRange,date('Y-m-d',$iDateFrom));
//         }
//     }
//     return $aryRange;
// }
             ?>
			
 <!-- function Ends here -->
          </tbody>
          
        </table>
        
        <input type='hidden' name='date_start'  value='<? echo $week_start ?>'/>
        <input type='hidden' name='date_end'  value='<? echo $week_end ?>'/>
      
    </div>
  </div>
  
  
<div class="row">

<div class="col-xs-12 col-md-12 form-group">
<!-- <button class="btn btn-primary pull-right" name="generate" type="submit">Generate PDF</button> -->
<script> function filter(number){ alert (number);} 



</script>
</div>
</form>
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
    font-size: 2vh;
    font-weight: 900;
}
</style>
 <footer>
  <? include("footer.php"); ?>
<footer>