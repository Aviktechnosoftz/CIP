<?
include_once('connect.php');
include('session_login.php');

// $query= "select MONTH(month) as Month ,AVG(avg_day) as avg_day,AVG(notice_issued)as notice_issued from tbl_graph  GROUP BY MONTH(month)";
				// $result=mysqli_query($conn,$query);
				// $numOfRows=mysqli_num_rows($result);
				// $notice = array();
				// $avg= array();
				// $months= array();
				// $notice = 0;
				// $avg = 0;
				// $months = 0;
				// $zero_val = 0;
				// $f_array=array(0,1,2,3,5,6,7,8,9,10,11,12);
				// $n_array=array();
				// $a_array=array();
				// $not_array=array();
				// $t_array=array();
				// $t2_array=array();
				// $t3_array=array();
				
							// $c_conter = 1;
				     // while ($row=mysqli_fetch_array($result))
						// { 
							// array_push($n_array,$row['Month']);	
							// array_push($a_array,$row['avg_day']);	
							// array_push($not_array,$row['notice_issued']);	
						// }
						
						// print_r($n_array);
						// echo "<br>";
						// print_r($f_array);
						// foreach ($f_array as $key=>$value)
						// {
						// $pos = array_search($value, $n_array);
						// if ($pos !== FALSE)
						// {
						   // array_push($t_array,$value);
						// }
						// else
						// {
							// array_push($t_array,"0");
						// }
						// }
						
						// foreach ($f_array as $key2=>$value2)
						// {
						// $pos2 = array_search($value2, $a_array);
						// if ($pos2 !== FALSE)
						// {
						   // array_push($t2_array,"0");
						// }
						// else
						// {
							// array_push($t2_array,$a_array[$value2]);
						// }
						// }
						
						// foreach ($f_array as $key=>$value)
						// {
						// $pos3= array_search($value, $not_array);
						// if ($pos3 !== FALSE)
						// {
						   // array_push($t3_array,$value);
						// }
						// else
						// {
							// array_push($t3_array,"0");
						// }
						// }
						// print_r($t_array);
						// echo"<hr />";
						// print_r($t2_array);
						// echo"<hr />";
						// print_r($t3_array);
						// die();
				// $months = rtrim($months,',');
				// $avg = rtrim($avg,',');
				// $notice = rtrim($notice,',');
				// echo $months;
				// die();
				// echo $avg;
				// echo $notice;
				

				

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" rel="stylesheet" />

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="assets/js/d3.v3.min.js"></script>

<link href="safety_report_chart.css" rel="stylesheet" />

        <div class="content">
        	<?include('sidepanel.php');  ?>
            <div class="container-fluid ">
                <div class="row" >	
                    <div class="col-md-12" style="">
                        <div class="card">
                            <div class="header">
							<div>
                            <div class="col-md-4">
                                <h4 class="title" style="margin-left:40px;cursor: pointer;" onclick="window.location.href='dashboard.php'">Home Page</h4>
                                <!-- <p class="category">24 Hours performance</p> -->
                            </div>
                             <div class="col-md-4">
                                <h4 class="title" style="color:#5B6672;margin-left:40px;cursor: pointer;"  onclick="window.location.href='safety_report_chart.php'">Safety Management Report</h4>
                                <!-- <p class="category">24 Hours performance</p> -->
                            </div>
                             <div class="col-md-4">
							</div>
							</div>
                            <div>
                            <div class="col-md-8" style="margin-top: 2vh">
                                <span class="title" style="color:#E6523A;margin-left:35px;font-weight: bold;" id="month_heading">October-December 2017 Quarter</span>
                                <!-- <p class="category">24 Hours performance</p> -->
                            </div>
                            <div class="col-md-4" style="margin-top: 2vh">
                                <h4 class="title" style="float:right;margin-right:50px"><i  style="color:#404040"class="fa fa-calendar from2" aria-hidden="true"></i></h4>

	
<!-- <div class="form-group">
<label>First check out:</label>
<input type="text" class="form-control form-control-2 input-sm to" placeholder="CheckOut">
</div> -->
    
 
                            </div>
                            </div>
                            </div>
							<style>
							.datepicker.dropdown-menu { background-color:#404040;
							border:none !important;
							color: #F0F0F0 !important;

							
							}
							
								.datepicker-dropdown:before { z-index: 999 !important;}

.datepicker table tr td span:hover {
    background: #F5F5F5 !important;
	color: black !important;
}
.datepicker thead tr:first-child th:hover, .datepicker tfoot tr th:hover {
    background: #eee !important;
    color: black !important;
} 
							</style>
                <!-- graph content  -->
<div id="main_graph_div">
	<div class="col-md-12"  ><span id="overview_heading">Overview</span><span id="overview_heading_sup">present</span>
	</div>

	<div style="margin-left:5px">
		<div class="col-md-4" class="col_4_main_div" style="padding:0px">			
			<div class="col-md-10" class="col_10_data_div" style="background-color:white;height:80px;">
				<p style="font-size:1.1vw">Safety Improvement Notices</p>
				<div class="col-md-3" ><span class="div_side_text">28%</span></div>
				<div class="col-md-9" style="padding: 0px;margin: 0px;">
				
				<!-- small 12 graph start-->
	
<!-- Vertical, rounded -->


<div class="container vertical2 rounded2" style="width:135px;position:relative">
  <div class="progress-bar2" style="">
    <div class="progress-track2">
      <div class="progress-fill2">
        <span class="pert_span">100%</span>
      </div>
    </div>
  </div>

  <div class="progress-bar2">
    <div class="progress-track2">
      <div class="progress-fill2">
        <span class="pert_span">75%</span>
      </div>
    </div>
  </div>

  <div class="progress-bar2">
    <div class="progress-track2">
      <div class="progress-fill2">
        <span class="pert_span">60%</span>
      </div>
    </div>
  </div>

  <div class="progress-bar2">
    <div class="progress-track2">
      <div class="progress-fill2">
        <span class="pert_span">20%</span>
      </div>
    </div>
  </div>

  <div class="progress-bar2">
    <div class="progress-track2">
      <div class="progress-fill2">
        <span class="pert_span">34%</span>
      </div>
    </div>
  </div>

  <div class="progress-bar2">
    <div class="progress-track2">
      <div class="progress-fill2">
        <span class="pert_span">82%</span>
      </div>
    </div>
  </div>
  <div class="progress-bar2">
    <div class="progress-track2">
      <div class="progress-fill2">
        <span class="pert_span">100%</span>
      </div>
    </div>
  </div>

  <div class="progress-bar2">
    <div class="progress-track2">
      <div class="progress-fill2">
        <span class="pert_span">75%</span>
      </div>
    </div>
  </div>

  <div class="progress-bar2">
    <div class="progress-track2">
      <div class="progress-fill2">
        <span class="pert_span">60%</span>
      </div>
    </div>
  </div>

  <div class="progress-bar2">
    <div class="progress-track2">
      <div class="progress-fill2">
        <span class="pert_span">20%</span>
      </div>
    </div>
  </div>

  <div class="progress-bar2">
    <div class="progress-track2">
      <div class="progress-fill2">
        <span class="pert_span">34%</span>
      </div>
    </div>
  </div>

  <div class="progress-bar2">
    <div class="progress-track2">
      <div class="progress-fill2">
        <span class="pert_span">82%</span>
      </div>
    </div>
  </div>
</div>


<!-- Vertical, flat -->
<style>

/* Vertical */

.vertical2 .progress-bar2 {
  float: left;
  height: 42px;
  width: .2vw;
  margin-right: 5px;
}

.vertical2 .progress-track2 {
  position: relative;
  width: .2vw;
  height: 100%;
  background: white;
}

.vertical2 .progress-fill2 {
  position: relative;
  background: #D54633;
  height: 50%;
  width: .4vw;
  color: #fff;
  text-align: center;
  font-family: "Lato","Verdana",sans-serif;
  font-size: 12px;
  line-height: 20px;
}

.rounded2 .progress-track2,
.rounded2 .progress-fill2 {
}
</style>
<script>

$('.vertical2 .progress-fill2 span').each(function(){
  var percent = $(this).html();
  var pTop = 100 - ( percent.slice(0, percent.length - 1) ) + "%";
  $(this).parent().css({
    'height' : percent,
    'top' : pTop
  });
});
</script>
				<!-- small 12 graph end-->
				
				
				</div>
			</div>
			<div class="col-md-1" style="background-color:#B8A7A7;height:80px;margin-left:5px">
			<span class="arrow_sign_frwd" >></span>
			</div>
			
		</div>
		<div class="col-md-4" class="col_4_main_div" style="padding:0px">			
			<div class="col-md-10" class="col_10_data_div" style="background-color:white;height:80px;">
				<p>Lost Time Injuries</p>
			<div class="col-md-3" style="padding:0px"><span class="div_side_text" style="padding:0px">NIL/PM</span></div>
			<div class="col-md-9" id="container" style="position: absolute;top: -8px;left: 36px;">

			
			</div>
			</div>
			<div class="col-md-1" style="background-color:white;height:80px;margin-left:5px">
			<div style=""><span class="arrow_sign_frwd">></span></div>

			</div>
			
		</div>
		<style>
#container {
  background: transparent;
  width: 200px;
  height: 120px;
}


path {
  fill: none;
  stroke: #B8A7A9;
  stroke-width: 2px;
}

line {
  fill: black;
}

text {
  font-family: arial;
  font-size: 0px;
}

.axis path,
.axis line {
stroke: grey;
stroke-width: 1;
}


</style>
<script>

var svg_width = 200,
    svg_height = 120,
    data = [2, 10, 1, 9, 2, 8, 1, 12, 5, 8, 3,12],
    margin = {top:30, right: 20, bottom:30, left: 50},
    chart_width = svg_width - margin.left - margin.right,
    chart_height = svg_height - margin.top - margin.bottom

var transfer_x = d3.scale.linear().domain([0, data.length]).range([0, chart_width]),
    transfer_y = d3.scale.linear().domain([0, d3.max(data)]).range([chart_height, 0])

var vis = d3.select("#container")
.append("svg:svg")
.attr("width", svg_width)
.attr("height", svg_height)

var draw_line = d3.svg.line()
.x(function(d,i) { return transfer_x(i); })
.y(function(d) { return transfer_y(d); })
.interpolate("cardinal")

var g = vis.append("svg:g")
.attr("transform", "translate(" + margin.left + "," + margin.top + ")")

g.append("svg:path")
.attr("class", "area")
.attr("d", draw_line(data));

// var x_axis = d3.svg.axis().scale(transfer_x).orient("bottom").ticks(5)
// var y_axis = d3.svg.axis().scale(transfer_y).orient("left").ticks(5)

// g.append("svg:g")
// .call(x_axis)
// .attr("class", "x axis")
// .attr("transform", "translate(0," + chart_height + ")");

// g.append("svg:g")
// .attr("class", "y axis")
// .call(y_axis)
// .append("text")
// .attr("y", 15)
// .style("text-anchor", "end")
// .attr("transform", "rotate(-90)")
// .text("Price ($)");


</script>
		<div class="col-md-4"  class="col_4_main_div" style="padding:0px">			
			<div class="col-md-10" class="col_10_data_div" style="background-color:white;height:80px;">
				<p>First Aid Treatment</p>
			<div class="col-md-3" ><span class="div_side_text">2/pm</span></div>
			<div class="col-md-9"  id = "container2" style="    top: -30px;left: 15px;">
			

			</div>
			</div>
			<div class="col-md-1" style="background-color:white;height:80px;margin-left:5px">
			<div style=""><span class="arrow_sign_frwd">></span></div>

			</div>
			
		</div>
		
		
	</div>
	<style>
#container2 {
  background: transparent;
  width: 200px;
  height: 70px;
}


path {
  fill: none;
  stroke: #B8A7A9;
  stroke-width: 2px;
}

line {
  fill: black;
}

text {
  font-family: arial;
  font-size: 0px;
}

.axis path,
.axis line {
stroke: grey;
stroke-width: 1;
}


</style>
<script>

var svg_width2 = 200,
    svg_height2 = 70,
    data2 = [3, 4, 6, 3, 7, 8, 9, 7, 5, 3, 8,12,4, 01],
    margin2 = {top:30, right: 20, bottom:30, left: 50},
    chart_width2 = svg_width2 - margin2.left - margin2.right,
    chart_height2 = svg_height2 - margin2.top - margin2.bottom

var transfer_x = d3.scale.linear().domain([0, data2.length]).range([0, chart_width2]),
    transfer_y = d3.scale.linear().domain([0, d3.max(data2)]).range([chart_height2, 0])

var vis2 = d3.select("#container2")
.append("svg:svg")
.attr("width", svg_width2)
.attr("height", svg_height2)

var draw_line2 = d3.svg.line()
.x(function(d,i) { return transfer_x(i); })
.y(function(d) { return transfer_y(d); })
.interpolate("cardinal")

var g2 = vis2.append("svg:g")
.attr("transform", "translate(" + margin2.left + "," + margin2.top + ")")

g2.append("svg:path")
.attr("class", "area")
.attr("d", draw_line2(data2));

// var x_axis = d3.svg.axis().scale(transfer_x).orient("bottom").ticks(5)
// var y_axis = d3.svg.axis().scale(transfer_y).orient("left").ticks(5)

// g.append("svg:g")
// .call(x_axis)
// .attr("class", "x axis")
// .attr("transform", "translate(0," + chart_height + ")");

// g.append("svg:g")
// .attr("class", "y axis")
// .call(y_axis)
// .append("text")
// .attr("y", 15)
// .style("text-anchor", "end")
// .attr("transform", "rotate(-90)")
// .text("Price ($)");


</script>	
	<div class="col-md-12" style="margin-top:30px;margin-bottom:10px"><h6>Safety Improvement Notices</h6></div>
	<div class="col-md-12"  style="margin-right:50px">
	<div class="col-md-11" style="background-color:white;height:270px;margin-left:-5px">
		<div class="col-md-12">
				<span id="ajax_load" style="position: absolute;left: 13%;top: 131%;z-index: 1;;display: none;"><img src="images/loading.gif" style="width:100px;height:100px"></span>

		<div style="float:right;">
			<p>Target 2 days to close</p>

		<div><canvas id="myCanvas" width="10" height="10" style="background-color:#B8A7A7;margin-right:5px"></canvas>Notices Issued</div>
		<div><canvas id="myCanvas" width="10" height="10" style="background-color:#D44635;margin-right:5px"></canvas>Average Days taken to Close-out</div>

		</div>
		</div>
		<?php
		// date(n)

		?>
		<script>

$(document).ready(function()

{

var startDate = new Date();
var date = new Date();
    // alert(startDate);


       
            // var date = new Date(selected.date.valueOf());
            startDate = new Date(date.getFullYear(), date.getMonth());
            // alert(startDate);
            endDate = new Date(date.getFullYear(), date.getMonth() + 2);
            midDate = new Date(date.getFullYear(), date.getMonth() + 1);

			 var year_change ="";
			var temp_year_heading =startDate.getFullYear()+1;
			if(startDate.getFullYear() == endDate.getFullYear()){year_change =startDate.getFullYear(); } 
			else{ year_change =startDate.getFullYear()+"-"+temp_year_heading;}
			// dateAjax(s_data,e_data,m_data);
			var s_data = startDate.getMonth()+1+","+startDate.getFullYear();
			 var e_data = endDate.getMonth()+1+","+endDate.getFullYear();
			 var m_data = midDate.getMonth()+1+","+midDate.getFullYear();
			 
		   var ss_data = startDate.getMonth()+1;
			 var ee_data = endDate.getMonth()+1;
			 var mm_data = midDate.getMonth()+1;
			 
			dateAjax(s_data,e_data,m_data,year_change,ss_data,ee_data,mm_data);

			 // ;
			 // alert(data	);
});
</script>
		<span id="span_hide_data" style="display:none;text-align: center;font-size: 5em;color: #D54633;">No Data !</span>
		<div class="col-md-12" style="width:100%;height:180px;background-color:white" id="table_main_div">
		<table style="margin-top:10px;margin-left:10px;text-align:center;" id="table_id">
  <tr id="trr">
   <td><span class="td_span_data">10</span></td>
    <td rowspan="6" > 
	<div class="container vertical  flat" style="width:60px">
	<div class="progress-bar" style="">
				<div class="progress-track">
				  <div class="progress-fill" style="background: #B8A7A9;">
					<span class="pert_span" id="ajax_get_data_1">0%</span>
				  </div>
				</div>
				</div>
			  <div class="progress-bar">
				<div class="progress-track">
				  <div class="progress-fill" style="background: #D54633;">
					<span class="pert_span" id="ajax_get_data_1_1">0%</span>
				  </div>
				</div>
			  </div>
</div>
			  </td>
    <td rowspan="6">
	<div class="container vertical flat" style="width:60px">
	<div class="progress-bar">
				<div class="progress-track">
				  <div class="progress-fill" style="background: #B8A7A9;">
					<span class="pert_span" id="ajax_get_data_2">0%</span>
				  </div>
				</div>
				
				</div>
			  <div class="progress-bar">
				<div class="progress-track">
				  <div class="progress-fill" style="background: #D54633;">
					<span class="pert_span" id="ajax_get_data_2_1">0%</span>
				  </div>
				</div>
			  </div>
			  </div>
	</td>
    <td rowspan="6">
	<div class="container vertical flat" style="width:60px">
	<div class="progress-bar">
				<div class="progress-track">
				  <div class="progress-fill" style="background: #B8A7A9;">
					<span class="pert_span" id="ajax_get_data_3">0%</span>
				  </div>
				</div>
				</div>
			  <div class="progress-bar">
				<div class="progress-track">
				  <div class="progress-fill" style="background: #D54633;">
					<span class="pert_span" id="ajax_get_data_3_1">0%</span>
				  </div>
				</div>
			  </div>
			  </div>
	</td>
  </tr>
  <tr>
   <td><span class="td_span_data">8</span></td>
    
  </tr>
   <tr>
   <td><span class="td_span_data">6</span></td>
    
  </tr>
   <tr>
   <td><span class="td_span_data">4</span></td>
    
  </tr>
   <tr>
   <td><span class="td_span_data">2</span></td>
    
  </tr>
   <tr>
   <td><span class="td_span_data">0</span></td>
    
  </tr>
  <tr>
    <td></td>
    <td id="g_month_1">m1</td>
    <td id="g_month_2">m2</td>
    <td id="g_month_3">m3</td>
  </tr>
</table>
		</div>
	</div>
	
	
<style>
.pert_span {font-size: 0px;font-size: 0px;}
.td_span_data {position: relative;top: 6px; }
	table, th, td {
    border: none;
}	
td { width:50px;}


/* Vertical */

.vertical .progress-bar {
  float: left;
  height: 150px;
  width: 15px;
}

.vertical .progress-track {
  position: relative;
  width: 15px;
  height: 100%;
  background: white;
}

.vertical .progress-fill {
  position: relative;
  height: 50%;
  width: 15px;
  color: #fff;
  text-align: center;
  font-family: "Lato","Verdana",sans-serif;
  font-size: 12px;
  line-height: 20px;
}

.rounded .progress-track,
.rounded .progress-fill {
  box-shadow: inset 0 0 5px rgba(0,0,0,.2);
  border-radius: 3px;
}

.dropdown-menu {
	top: 0;
   	left:-156px;
	min-width: 157px !important;
    font-size: 10px !important;
	background-color: #2D2D30;
	border-radius: 5px !important;
}
.panel-default>.panel-heading {
    color: white;
    background-color: #2D2D43;
    border-color: #2D2D43;
    padding: 5px;
}
.list-group-item {
    position: relative;
    display: block;
    padding: 10px 15px;
    margin-bottom: -1px;
    background-color: #2D2D30;
    border: 1px solid #2D2D30;
		color: white !important;

}
.list-group-item a {
		color: white !important;
		font-size:1.2em !important;

}
panel-title a:hover, a:focus { color:#D54633 !important;}
panel-title a { font-size:0.9em !important;}
.panel-title>.small, .panel-title>.small>a, .panel-title>a, .panel-title>small, .panel-title>small>a { font-size:0.9em ! important;}
.panel-default {border:none; }
	</style>
<script>

$('.vertical .progress-fill span').each(function(){
	
  var percent = $(this).html();
  var pTop = 100 - ( percent.slice(0, percent.length - 1) ) + "%";
  $(this).parent().css({
    'height' : percent,
    'top' : pTop
  });
});
/*
$("#ajax_get_data").on('change',function(){
     //Do calculation and change value of other span2,span3 here
	 alert("chnaged");
     // $("#span2").text('calculated value');
}); */
</script>

	<div class="col-md-1"style="background-color:white;height:270px;"><div style="float:right">
			<!-- Brand and toggle get grouped for better mobile display -->
			
					<!-- Dropdown Link for Dropdown Accordion -->
					
						
						<!-- Open Wrapper for Dropdown Accordion -->
						<div class="dropdown dropdown-accordion" data-accordion="#accordion">
							
							<!-- Main Link For Opening Dropdown -->
							<a class="btn dropdown-toggle" href="#" data-toggle="dropdown" style="border-color:white !important" >
								<span class=""><i class="fa fa-ellipsis-h" aria-hidden="true"></i></span>
							</a>
							<!-- //Close Main Link For Opening Dropdown -->

							<!-- Open Dropdown Menu Wrapper -->
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" >
								
								<!-- Child li element was needed on testing as a wrapper for alignment and functionality -->
								<li style="color:white !important;text-align:center;font-size:1.5em">Options</li>
								<li>

									<!-- Open Panel Group for Accordion Content and Headings -->
									<div class="panel-group" id="accordion">
										
										
										<!-- Open Panel One -->
										<div class="panel panel-default">

											<!-- Panel Heading Wrapper -->
											<div class="panel-heading">

												<!-- Panel Heading / Accordion Content Toggle -->
												<h4 class="panel-title">
													<i class="fa fa-envelope" aria-hidden="true"></i><a href="#collapseOne" data-toggle="collapse" data-parent="#accordion">&nbsp&nbsp&nbspSend Email <span ></span></a>
												</h4>
												<!-- //Close Panel Heading -->

											</div>
											<!-- //Close Panel Heading Wrapper -->
											
											<!-- Open Panel Collapse Items Wrapper -->
											<div class="panel-collapse collapse" id="collapseOne">

												<!-- Open List Group for Internal Page Links -->
												<ul class="list-group">
													<li class="list-group-item"><a href="#sectionOne">From Beginning</a></li>
													<li class="list-group-item"><a href="#sectionOneSubThree">Item Three</a></li>
												</ul>
												<!-- //Close List Group for Internal Page Links -->

											</div>
											<!-- //Close Panel Collapse Items Wrapper -->

										</div>
										<!-- //Close Panel One -->

										
										<!-- Open Panel Two -->
										<div class="panel panel-default">
											
											<!-- Panel Heading Wrapper -->
											<div class="panel-heading">
												
												<!-- Panel Heading / Accordion Content Toggle -->
												<h4 class="panel-title">
													<i class="fa fa-print" aria-hidden="true"></i><a href="#collapseTwo" data-toggle="collapse" data-parent="#accordion">&nbsp&nbsp&nbspPrint <span class=""></span></a>
												</h4>
												<!-- //Close Panel Heading -->
												
											</div>
											<!-- //Close Panel Heading Wrapper -->
											
											<!-- Open Panel Collapse Items Wrapper -->
											<div class="panel-collapse collapse" id="collapseTwo">
												
												<!-- Open List Group for Internal Page Links -->
												<ul class="list-group">
													<li class="list-group-item"><a href="#sectionTwo">From Beginning</a></li>
													<li class="list-group-item"><a href="#sectionTwoSubThree">Item Three</a></li>
												</ul>
												<!-- //Close List Group for Internal Page Links -->
												
											</div>
											<!-- //Close Panel Collapse Items Wrapper -->
											
										</div>
										<!-- //Close Panel Two -->
											<!-- Open Panel Two -->
										<div class="panel panel-default">
											
											<!-- Panel Heading Wrapper -->
											<div class="panel-heading">
												
												<!-- Panel Heading / Accordion Content Toggle -->
												<h4 class="panel-title">
													<i class="fa fa-flag" aria-hidden="true"></i><a href="#collapseTwo1" data-toggle="collapse" data-parent="#accordion">&nbsp&nbsp&nbspFlag <span class=""></span></a>
												</h4>
												<!-- //Close Panel Heading -->
												
											</div>
											<!-- //Close Panel Heading Wrapper -->
											
											<!-- Open Panel Collapse Items Wrapper -->
											<div class="panel-collapse collapse" id="collapseTwo1">
												
												<!-- Open List Group for Internal Page Links -->
												<ul class="list-group">
													<li class="list-group-item"><a href="#sectionTwo">From Beginning</a></li>
													<li class="list-group-item"><a href="#sectionTwoSubThree">Item Three</a></li>
												</ul>
												<!-- //Close List Group for Internal Page Links -->
												
											</div>
											<!-- //Close Panel Collapse Items Wrapper -->
											
										</div>
										<!-- //Close Panel Two -->
										
									</div>
									<!-- //Close Panel Group for Accordion Content and Headings -->
									
								</li>
								<!-- //Close Dropdown Child li -->
								
							</ul>
							<!-- //Close Dropdown Menu Wrapper -->
							
						</div>
						<!-- //Close Wrapper for Dropdown Accordion -->
						
					
					<!-- //Close Dropdown Link for Dropdown Accordion -->
					
				
				<!-- //Close Main UL for Nav Links -->
				
			</div>
			<!-- //Close Navbar Collapse for Content for Toggling -->



	</div></div>
	</div>
	
	
	
	
					
					
</div>
				
                <!-- graph content end here -->            


                        </div>
                    </div>
                   

                </div>
            </div>
        </div>


  

    </div>
</div>

<script>
// Collapse accordion every time dropdown is shown
$('.dropdown-accordion').on('show.bs.dropdown', function (event) {
  var accordion = $(this).find($(this).data('accordion'));
  accordion.find('.panel-collapse.in').collapse('hide');
});

// Prevent dropdown to be closed when we click on an accordion link
$('.dropdown-accordion').on('click', 'a[data-toggle="collapse"]', function (event) {
  event.preventDefault();
  event.stopPropagation();
  $($(this).data('parent')).find('.panel-collapse.in').collapse('hide');
  $($(this).attr('href')).collapse('show');
});


//Navbar Box Shadow on Scroll 
$(function(){
    var navbar = $('.navbar');
    $(window).scroll(function(){
        if($(window).scrollTop() <= 40){
       		navbar.css('box-shadow', 'none');
        } else {
          navbar.css('box-shadow', '0px 10px 20px rgba(0, 0, 0, 0.4)'); 
        }
    });  
})

//Offset scrollspy height to highlight li elements at good window height
$('body').scrollspy({
	offset: 80
});

// Close Nav When Link Is Selected
$('.panel-body a[href^="#section"], a[href^="#section"]').on('click', function(){
    $('.navbar-collapse').collapse('hide');
	$('.dropdown-toggle').click();
});


//Smooth Scrolling For Internal Page Links
$(function() {
  $('.list-group a[href*=#]:not([href=#]), a[href="#toTop"]').click(function() {
	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	  var target = $(this.hash);
	  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	  if (target.length) {
		$('html,body').animate({
		  scrollTop: target.offset().top
		}, 1000);
		return false;
	  }
	}
  });
});



</script>
</body>



</html>
<style>
    input[type='file'] {
        color: transparent; 
        display: none;  
}
#upload_1,#upload_2,#upload_3,#upload_4,#upload_5,#upload_6
{
    background-image: url('images/upload_image.png');
    background-size: 70px 70px;
    border-radius: 7vh;
    border:solid 1px grey;

}

.dropdown-menu{
    opacity: 1;
        visibility:inherit ; 
}

.form-control {
    background-color: #E3E3E2;
    border: none;
    outline: none;
    border-radius: 6vh;
    color: #565656;
    padding: 8px 12px;
    height: 5vh;
    -webkit-box-shadow: none;
    box-shadow: none;
}
.form-control:focus {
    background-color: #E3E3E2;
    border: none;
    outline: none;
     -webkit-box-shadow: none;
    box-shadow: none;
}
.progress-wrap {
  /*text-align: center;*/
  /*font-size: 10px;*/
  color: #8C8C8C;
  /*margin: 0 0 20px 0;*/}
  
  #progress {
  width: 100%;
    /*margin: 0 0 5px 0;*/
  }
progress[value] {
  /* Reset the default appearance */
  -webkit-appearance: none;
   appearance: none;

 
}
progress[value]::-webkit-progress-value {

    background-color: #57ACA2;
    border-radius: 6vh; 
   
}
progress[value]::-webkit-progress-bar {
  background-color: #2B303C;
  border-radius: 6vh;
  
}
.icon_pos
{
        position: absolute;
        top: 59%;
    left: 2%;
        -webkit-text-stroke: 0.5px #E3E3E2;
}
 .carousel-indicators .active {

    display: inline-block;
    width: 10px;
    height: 10px;
    margin: 1px;
    text-indent: -999px;
    cursor: pointer;
    /*background-color: #000\9;*/
    background-color: #888888;
    border: 1px solid #fff;
    border-radius: 10px;
}
.carousel-indicators {

    left: 20%;
    }
    .carousel{
   
    margin-top: 0px;
}
.carousel .item{
    height: auto; /* Prevent carousel from being distorted if for some reason image doesn't load */
}
.carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
}
.bs-example{
    margin: 0px;
}
.carousel-control.left, .carousel-control.right {
    background-image: none
}



.carousel-indicators {
    bottom: -30px;
}
.carousel-indicators li {
background-color: #D8D8D8;
    }

    .carousel-indicators .active {
   
    background-color: #888888;
} 

.details
{
    color: #5E5E5E;
    font-size: 2vh;
}
.tag_project
{

    background-color: #E4E4E4;
    border-radius: 6vh;
    color: #A9A9A9;

}

</style>

<script>
$(document).ready(function()

{

 $('#span_hide_data').hide();
 

});
function get_image(id)
{
    
    $('#file_'+id).click();


}




$('#category').on('input', function() 
{       //alert(this.value);
//$('#category2').closest('div').children('input').val(this.value);

$( "div.bootstrap-tagsinput:eq(1) > input" ).val(this.value);


      //alert($('#category2').closest('div').children('input').val()); 
});

$("#category").on('focusout',function () {
   $("div.bootstrap-tagsinput:eq(1) > input").focusout();
   $('#category').val('');
});

$('#categorycategory').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {
      $("div.bootstrap-tagsinput:eq(1) > input").focusout();
      $('#category').val('');
    return false;  
  }
});

var progress = $("#progress"),
    progressMessage = $("#progress-message");

$(document).ready(function()

{

 $("div.bootstrap-tagsinput:eq(1)").css('background-color','#f5f5f5');
 $('.content_2').hide();
  $('.content_3').hide();
 progress.attr("value", "20");
    progressMessage.text("20% complete");

});

function next_form()
{
    $('.content:eq(1)').hide();
    $('.content_2').show(600);
    progress.attr("value", "67");
    progressMessage.text("67% complete");
}
function back_form()
{
    $('.content:eq(1)').show(600);
    $('.content_2').hide();
     progress.attr("value", "20");
    progressMessage.text("20% complete");
}
function next_form_2()
{
    $('.content_2').hide();
    $('.content_3').show(600);
    progress.attr("value", "90");
    progressMessage.text("90% complete");
}
function back_form_2()
{
    $('.content_2').show(600);
    $('.content_3').hide();
     progress.attr("value", "67");
    progressMessage.text("67% complete");
}

var startDate = new Date();
var fechaFin = new Date();
var FromEndDate = new Date();
var ToEndDate = new Date();
var flag='';
$('.from2').datepicker({
    autoclose: true,
    minViewMode: 1,
    format: 'yyyy/mm//dd'
}).on('changeDate', function(selected){
       
            var date = new Date(selected.date.valueOf());
            startDate = new Date(date.getFullYear(), date.getMonth());
            endDate = new Date(date.getFullYear(), date.getMonth() + 2);
            midDate = new Date(date.getFullYear(), date.getMonth() + 1);
			var year_change ="";
			var temp_year_heading =startDate.getFullYear()+1;
			if(startDate.getFullYear() == endDate.getFullYear()){year_change =startDate.getFullYear(); } 
			else{ year_change =startDate.getFullYear()+"-"+temp_year_heading;}
			
            // alert(year_change);
			 var s_data = startDate.getMonth()+1+","+startDate.getFullYear();
			 var e_data = endDate.getMonth()+1+","+endDate.getFullYear();
			 var m_data = midDate.getMonth()+1+","+midDate.getFullYear();
			 
		   var ss_data = startDate.getMonth()+1;
			 var ee_data = endDate.getMonth()+1;
			 var mm_data = midDate.getMonth()+1;
			 
			dateAjax(s_data,e_data,m_data,year_change,ss_data,ee_data,mm_data);
            // alert(s_data);
            // alert(endDate.getFullYear());
            // alert(midDate.getFullYear( ));
			 // ;
			 // alert(data	);
		
			
			
        
        
    }); 

</script>
<script>
function dateAjax(s_data,e_data,m_data,year_change,ss_data,ee_data,mm_data) {
	$('#ajax_load').show();
	$('#table_id').hide();
	$('#span_hide_data').hide();
	$.ajax({
				url: 'get_data.php',
					// dataType: "text",
				type: "POST",
				data: { s_data: s_data,m_data: m_data, e_data: e_data  },
				success: function (data) {
					if(data == ""){
					// alert("No Data Has Been Found !");
					                    document.getElementById("ajax_get_data_1").innerHTML = 0+"%";
										document.getElementById("ajax_get_data_1_1").innerHTML = 0+"%";
										
										document.getElementById("ajax_get_data_2").innerHTML = 0+"%";
										document.getElementById("ajax_get_data_2_1").innerHTML = 0+"%";
										
										document.getElementById("ajax_get_data_3").innerHTML = 0+"%";
										document.getElementById("ajax_get_data_3_1").innerHTML = 0+"%";
										// document.getElementById("table_id").innerHTML = "No Data !";
										$("#table_main_div").hide();
										$("#span_hide_data").show();
					
					}
					else {
										var data_update = data.split("+");
										// document.getElementById("table_id").innerHTML = "";
					
										$("#table_main_div").show();
										$("#span_hide_data").hide();
										document.getElementById("ajax_get_data_1").innerHTML = data_update[0]+"%";
										document.getElementById("ajax_get_data_1_1").innerHTML = data_update[1]+"%";
										
										document.getElementById("ajax_get_data_2").innerHTML = data_update[2]+"%";
										document.getElementById("ajax_get_data_2_1").innerHTML = data_update[3]+"%";
										
										document.getElementById("ajax_get_data_3").innerHTML = data_update[4]+"%";
										document.getElementById("ajax_get_data_3_1").innerHTML = data_update[5]+"%";
										
										
										
										function dateFunction(mon) {
												var month = new Array();
												month[0] = "Jan";
												month[1] = "Feb";
												month[2] = "Mar";
												month[3] = "Apr";
												month[4] = "May";
												month[5] = "June";
												month[6] = "July";
												month[7] = "Aug";
												month[8] = "Sep";
												month[9] = "Oct";
												month[10] = "Nov";
												month[11] = "Dec";
												return month[mon];

   
														}
										
										document.getElementById("g_month_1").innerHTML = dateFunction(ss_data-1);
										document.getElementById("g_month_2").innerHTML = dateFunction(mm_data-1);
										document.getElementById("g_month_3").innerHTML = dateFunction(ee_data-1);
										
										

					
						}			$('.vertical .progress-fill span').each(function(){
	
								    var percent = $(this).html();
								    var pTop = 100 - ( percent.slice(0, percent.length - 1) ) + "%";
								    $(this).parent().css({
									'height' : percent,
									'top' : pTop
								  });
				                  });
								  function hdateFunction(mont) {
												var month = new Array();
												month[0] = "January";
												month[1] = "February";
												month[2] = "March";
												month[3] = "April";
												month[4] = "May";
												month[5] = "June";
												month[6] = "July";
												month[7] = "August";
												month[8] = "September";
												month[9] = "October";
												month[10] = "November";
												month[11] = "December";
												return month[mont];

   
														}
														var heading_date_1 = hdateFunction(ss_data-1);
														var heading_date_2 = hdateFunction(ee_data-1);
														var heading_date_3 = heading_date_1+"-"+heading_date_2+" "+year_change+" Quarter";
														document.getElementById("month_heading").innerHTML = heading_date_3;
								  
								  
					},
					complete: function(){
							$('#ajax_load').hide();
							$('#table_id').show();
							// $('#span_hide_data').show();
							

							}
				
				});
	
}
</script>
