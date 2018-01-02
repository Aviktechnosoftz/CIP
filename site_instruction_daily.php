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
        <legend class="main_title">CONTRACTS ADMINISTRATION MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">SITE ATTENDANCE REGISTER DAILY REPORT&nbsp;<?// echo $project_name->project_name ?> </span></label>
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
          <div class="col-sm-12" style="padding-left: 0">The Requested Site Instruction Report for the Date: &nbsp <span style="color: red;font-weight: bold"> <?=$week_start?> </span></div>
          <thead>
             <tr style="background-color: #696969; color: white">
              <th rowspan="2">Employer/Business Name</th>
              <th rowspan="2">Trade</th>

              <th  style="text-align: center;">Number Of Instruction  Submitted</th>  
              	
              </tr>
              

          </thead>
          <tbody>
              <? $get_id=$conn->query("select id from tbl_employer where project_id='".$_SESSION['admin']."'");
              while($row_query= $get_id->fetch_object())
              {
            $query_emp1=$conn->query("select count(*) as count,date(tbl_instruction.created_date)as date,DAYNAME(tbl_instruction.created_date) as day,company_name,Tread FROM tbl_instruction INNER JOIN tbl_employer ON tbl_instruction.emp_id=tbl_employer.id
              where date(tbl_instruction.created_date) between '".$week_start."' AND '".$week_end."' AND emp_id=".$row_query->id." AND tbl_instruction.project_id='".$_SESSION['admin']."' group by date");
      


                  if($query_emp1->num_rows>0)
                  {
                    create_row($query_emp1,$week_start,$week_end);
                   
                  }

              }


           ?>

          
           <!-- function Starts here -->
            <? function create_row($query_emp,$week_start,$week_end) 

			{
			       
          	$arr= array();
          	$arr2=array();
         
          		while($row1=mysqli_fetch_assoc($query_emp)){

          			$day_emp1= $row1['day'];
          			$no_emp1= $row1['count'];
                $t=$row1['Tread'];
                $d=$row1['date'];
          			explode(" ",$day_emp1);
          			explode(" ",$no_emp1);
          			array_push($arr, $day_emp1);
          			array_push($arr2, $no_emp1);
					$emp1= $row1['company_name'];
					$arr3 = array_combine($arr, $arr2);
          	}	
     
               

          	?>

            <tr>
            
              <td><? echo $emp1 ?></td>
              <td><? echo $t ?></td>
              <td> <a href="<?="site_instruction_approved.php?redirect=true&&d=".$week_start."&"."e=".$emp1?>"><? echo $no_emp1; ?></a></td>

           

           
        
              

            
           
           
          

  
            </tr>
            <?  } ?>
           

			
 <!-- function Ends here -->
          </tbody>
          
        </table>
        
        <input type='hidden' name='date_start'  value='<? echo $week_start ?>'/>
        <input type='hidden' name='date_end'  value='<? echo $week_end ?>'/>
      </div><!--end of .table-responsive-->
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
    font-size: 2.4vh;
    font-weight: 900;
}
</style>

  <footer>
  <? include("footer.php"); ?>
<footer>