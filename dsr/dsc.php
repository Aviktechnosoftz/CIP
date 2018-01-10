<? 
	  	$device_get = @$_GET['eqpname'];
        session_start();
		$_SESSION['samlNameId'] = 'X2LDICKS';
		$_SESSION['dsr'] = '';
        
        if($_SESSION['dsr'] == "NO" || (!isset($_SESSION['samlNameId']))){
        ///  header("location:webdsc.php");
        }
        $ntid = $_SESSION['samlNameId'];
      
        $JsonData = file_get_contents('http://192.169.226.71/xirgo/api_dsc.php');
        $json = json_decode($JsonData, true);  
		if($device_get == '' )
		{

			  include_once('connect.php');
			   $ntid_res = $conn->query("select DeviceName from devicedetails where driver_ntid='".$ntid."'")->fetch_object();
			  $device_get = $ntid_res->DeviceName;
		}
        
        $results = array_filter($json['driver'], function($people) use ($device_get) {
                      return $people['device_name'] == $device_get;

                    });
        $list_week = $json['week'];
        $curr_week = $list_week[count($list_week)-1]['week_count'];
        $curr_week_total = $list_week[count($list_week)-1]['total'];
        $year = date("Y");
        $date = new DateTime();
?>
<!DOCTYPE html>
<html>

<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Driver Score Card</title>
    <link rel="image icon" type="image/png" sizes="160x160" href="image/icon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <script src="js/jquery.dataTables.min.js"></script>

    

    <style type="text/css">
    #title
    {
        font-weight:bold;background-color:#f8f8f8;border-color:#C29193  ;letter-spacing:1pt;word-spacing:-3pt;font-size:17px;text-align:center;font-family:arial, helvetica, sans-serif;line-height:1;margin: 0 0 2vh 0; border: 2px solid;  border-radius: 5px;
        

    }
    .table td {
    text-align: center;   
    }
    .table th {
       text-align: center;   
    }

.table {
    width: 100%;
    max-width: 100%;
}
.hheading {
  width: 61vw;margin-left: 20vw;color:#337ab7;
}
@media (max-width:768px){ 
  .hheading {margin-left: 10vw;}
}

@media (max-width:480px){ 
  .hheading {margin-left: 20vw;}
}


 @media (max-width:360px)  { 
  .hheading {margin-left: 9vw;font-size: 26px;}
  
        }
    </style>

<script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable( {
        "order": [[ 0, "desc" ]],
        bFilter: false, 
        bInfo: false,
        bLengthChange: false
        } );
    } );

    var alldataArray = <?php echo json_encode($json['driver']); ?>;
    var tempArray = <?php echo json_encode($results); ?>;
    var curr_week = <?=$curr_week?>;
    var score_tatal = <?=$curr_week_total?>;
    

    function details(week_count){
      
      $("#modal-1").modal("show");
      $.each(tempArray, function( index, value ) { 

	
      if(value['week_count'] == week_count){

		   var light_count = 50;
		   if(value['light'] < 50 )
		   {
			   light_count  = value['light'];
		   }
		  var score = value['scorecount'];
          $("#speed_point").html(value['speed_points']);
          $("#speed_count").html(value['speed']);
          $("#accel_point").html(value['aceel_points']);
          $("#accel_count").html(value['accel']);
          $("#decel_point").html(score);
          $("#decel_count").html(value['decel']);
          $("#decel_Hard").html(value['hard']);
          $("#decel_Medium").html(value['medium']);
          $("#decel_Light").html(value['light']);
          $("#decel_max").html("<a href='https://www.google.co.in/maps/place/"+value['maplink']+"'>"+value['max_dec']+"</a>");
          $("#rpm_point").html(value['rpm_points']);
          $("#rpm_count").html(value['rpm']);
          $("#idle_point").html(value['idle_points']);
          $("#idle_count").html(value['idle']);
          var total = get_length(week_count);
          $("#overall").html(get_index(value['score'],get_array(week_count,'score'))+" of "+ total);
          $("#Speed").html(get_index(value['speed_points'],get_array(week_count,'speed_points'))+" of "+ total);
          $("#Accel").html(get_index(value['aceel_points'],get_array(week_count,'aceel_points'))+" of "+ total);
          $("#Decel").html(get_index(value['decel_point'],get_array(week_count,'decel_point'))+" of "+ total);
          $("#RPM").html(get_index(value['rpm_points'],get_array(week_count,'rpm_points'))+" of "+ total);
          $("#Idle").html(get_index(value['idle_points'],get_array(week_count,'idle_points'))+" of "+ total);
		  
        }
      });
      
    }

    function get_rank(week_count){

      $.each(tempArray, function( index, value ) { 
          if(value['week_count'] == week_count){
            var total = get_length(week_count);
            //alert(list_week[list_week.length -1]);
            if(week_count == curr_week){

			 var light_count = 50;
			 if(value['light'] < 50 )
			 {
			   light_count  = value['light'];
		     }
		     var score = value['scorecount'];

              $("#overall_det").html(get_index(value['score'],get_array(week_count,'score'))+" of "+ total);
              $("#Speed_det").html(get_index(value['speed_points'],get_array(week_count,'speed_points'))+" of "+ total);
              $("#Accel_det").html(get_index(value['aceel_points'],get_array(week_count,'aceel_points'))+" of "+ total);
              $("#Decel_det").html(get_index(value['decel_point'],get_array(week_count,'decel_point'))+" of "+ total);
              $("#RPM_det").html(get_index(value['rpm_points'],get_array(week_count,'rpm_points'))+" of "+ total);
              $("#Idle_det").html(get_index(value['idle_points'],get_array(week_count,'idle_points'))+" of "+ total);
              $("#Decel_h").html(value['hard']);
              $("#Decel_l").html(value['light']);
              $("#Decel_m").html(value['medium']);
              $("#Decel_max").html("<a href='https://www.google.co.in/maps/place/"+value['maplink']+"'>"+value['max_dec']+"</a>");
              $("#Decel_p").html(score);
              $("#Decel_c").html(value['points']);
		          $("#details_head").html(firstDayOfWeek('2017',week_count));
			  
            //  $("#curr_rank").html(get_index(value['score'],get_array(week_count,'score'))+" of "+ total);

              var score_percent = 100 - ( (Math.round(value['score'])) * 100 / score_tatal);
              $("#curr_rank").html(Math.round(value['score'])+" %");

              var hard_percent = (value['hard'] * 100)/ value['points'];
              $("#harpercent").html(hard_percent.toFixed(2)+" %");

              var medium_percent = (value['medium'] * 100)/ value['points'];
              $("#mediumpercent").html(medium_percent.toFixed(2)+" %");

              var light_percent = (value['light'] * 100)/ value['points'];
              $("#lightpercent").html(light_percent.toFixed(2)+" %");
            }

            $("#"+week_count+"_over_rank").html(get_index(value['score'],get_array(week_count,'score'))+" of "+ total);
          }

      });
    }

	function firstDayOfWeek (year, week) {

			// Jan 1 of 'year'
			var d = new Date(year, 0, 1),
				offset = d.getTimezoneOffset();

			// ISO: week 1 is the one with the year's first Thursday 
			// so nearest Thursday: current date + 4 - current day number
			// Sunday is converted from 0 to 7
			d.setDate(d.getDate() + 4 - (d.getDay() || 7));

			// 7 days * (week - overlapping first week)
			d.setTime(d.getTime() + 7 * 24 * 60 * 60 * 1000 
				* (week + (year == d.getFullYear() ? -1 : 0 )));

			// daylight savings fix
			d.setTime(d.getTime() 
				+ (d.getTimezoneOffset() - offset) * 60 * 1000);

			// back to Monday (from Thursday)
			d.setDate(d.getDate() - 3);
      d= "W/S : "+((d.getMonth() + 1) + '/' + d.getDate() + '/' +  d.getFullYear());

			return d;
}



    function get_index(x,y){
          var ret = 0;
          $.each(y, function(n, v) {
            if(v == x){ 
              ret = n;
              return false;
            }    
          });
          return ret+1;
    }

    function get_length(x){
      var ret = 0;
      $.each(alldataArray, function(n, v) {
        if(v['week_count'] == x){ 
          ret++;
        }   
         
      });
      return ret;
    }

    function get_array(x,y){ 
      var ret = new Array();
      $.each(alldataArray, function(n, v) {
        if(v['week_count'] == x){ 
          ret.push(v[y]);
        }    
      });
      return (ret.sort()).reverse();
    }

</script>
</head>
<body>
<div class="page-header"  id="title" style="min-height: 95vh;">
  <h1 class="hheading">DRIVER SCORE CARD</h1>

    <div id ="main" style="margin-top: 10vh;">
      <center>
      <table cellspacing="10">
        <tr>
          <td style="padding: 1vh;">Equipment # : </td>
          <td style="padding: 1vh;"><?=$device_get ?></td>
        </tr>
        <tr>
          <td style="padding: 1vh;">This week's score : </td>
          <td id="curr_rank" style="padding: 1vh;"></td>
        </tr>
       <!-- <tr>
          <td style="padding: 1vh;">Overall Score (%): </td>
          <td id="over_score_percent" style="padding: 1vh;"></td>
        </tr>-->
        <tr>
          <td style="padding: 1vh;"><input  type="button" onclick="$('#main').hide();$('#history').show();" value=""  style="float: right;margin-top: 6vh; outline: none;
  border:none;
  background: url('image/History_Unpressed.png');
  background-size: 100%;
  margin-left: 72px;
  background-position: top center;
  background-repeat:no-repeat; 
  height:60px; 
  width:176px;">

  </td>
  <tr>
  </tr>

   <td style="padding: 1vh;"><input  type="button" onclick="$('#main').hide();$('#history_graph').show();" value=""  style="float: right;margin-top: 1vh; outline: none;
  border:none;
  background: url('image/History_Unpressed.png');
  background-size: 100%;
  margin-left: 72px;
  background-position: top center;
  background-repeat:no-repeat; 
  height:60px; 
  width:176px;">

  </td>
  <tr>
  </tr>

<td style="padding: 1vh;"><input type="button" onclick="$('#main').hide();$('#details').show();" value=""  style="float: right;margin-top: 1vh; outline: none;
  border:none;
  background: url('image/Details_Unpressed.png');
  background-size: 100%;
  background-position: top center;
  background-repeat:no-repeat; 
  height:60px; 
  width:176px;"></td>
          

        </tr>
		<tr> 
		<td style="padding: 1vh;"> <input type="button" id="logout" value="" onclick="window.location.replace('webdsc.php');" style="float: right;margin-top: 1vh; outline: none;
  border:none;
  background: url('image/Logout_Unpressed.png');
  background-size: 100%;
  background-position: top center;
  background-repeat:no-repeat; 
  height:60px; 
  width:176px;"></td>
		</tr>
      </table>
    </center>
        <!-- <p>Equip #: <? //echo $device_get ?></p>
        <p id="curr_rank"></p> -->
        
     </div> 

<div class="container-fluid" id="details" style="display: none;font-weight:normal;font-size:small;">

<table>
  <tr><td>
  <input type="button" onclick="$('#main').show();$('#details').hide();" style="float: LEFT;margin-bottom: 2vh;outline: none;
  border:none;background: url('image/back.png');background-size: 100%;background-position: top center;background-repeat:no-repeat; height:40px; 
  width:77px;" value=""></td></tr></table>
  <center>
        <div id="details_head"></div>
        <div style="padding:5px 0;font-weight: bold;">Equip #<?echo $device_get; ?></div>
  </center>
<table id="details_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        
        <tbody>
            <tr>
              <td>Rank</td><td id="overall_det"></td>
            <tr>
              <td>Score</td><td id="Decel_p"></td>
            <tr>
              <td>Total # Of Braking Events</td><td id="Decel_c"></td>
            <tr>
              <td></td><td><div style="width: 50%;float:left;border-right: 0.5px solid #ddd;">#</div><div style="width: 50%;float:right;border-left: 0.5px solid #ddd;">%</div></td>    
           <!--  <tr>
              <td>Counts</td><td><div style="width: 50%;float:left;border-right: 0.5px solid #ddd;" id="Decel_c"></div><div style="width: 50%;float:right;border-left: 0.5px solid #ddd;">%</div></td>
            </tr>  --> 
            <tr>
              <td>Hard   (>7 MPH/Sec)</td><td><div style="width: 50%;float:left;border-right: 0.5px solid #ddd;" id="Decel_h"></div><div style="width: 50%;float:right;border-left: 0.5px solid #ddd;" id="harpercent"></div></td>
            <tr>
              <td>Medium   (5-7 MPH/Sec)</td><td><div style="width: 50%;float:left;border-right: 0.5px solid #ddd;" id="Decel_m"></div><div style="width: 50%;float:right;border-left: 0.5px solid #ddd;" id="mediumpercent"></div></td>
            <tr>
              <td>Light (2-5 MPH/Sec)</td><td><div style="width: 50%;float:left;border-right: 0.5px solid #ddd;" id="Decel_l"></div><div style="width: 50%;float:right;border-left: 0.5px solid #ddd;" id="lightpercent"></div></td>
            <tr>
              <td>Max (MPH/Sec)</td> <td id="Decel_max"></td>
        
        </tbody>
    </table>
</div>

<div class="container-fluid" id="history" style="display: none;font-weight:normal;font-size:small;">

  <input type="button" onclick="$('#main').show();$('#history').hide();" style="float: LEFT;margin-bottom: 2vh;outline: none;
  border:none;
  background: url('image/back.png');
  background-size: 100%;
  background-position: top center;
  background-repeat:no-repeat; 
  height:40px; 
  width:77px;" value="">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>W/S</th>
                <th>Score</th>
                <th>Total#</th>
                <th>Rank</th>
              
            </tr>
        </thead>

        <tbody>
<? foreach ($results as $data) { 
  ?>
            <tr onclick="details(<?=$data['week_count']?>)">
                <td><? 
          
          $date->setISODate($year,$data['week_count']);
          $date_data=$date->format('m-d-y'); 
          echo $date_data;?>
        </td>
                <td><? 
				
			$light_count = 50;
			if($data['light'] < 50 )
			{
			   $light_count  = $data['light'];
			}
			$score = 50  + $light_count - ($data['hard'] *3  ) + ($data['medium']/2) ;
			echo $data['scorecount'] ?></td>
            
                <td><? echo $data['points'] ?></td>
		        <td id="<?=$data['week_count']?>_over_rank"></td>
                <script>
                  get_rank(<?=$data['week_count']?>);
                </script>
            </tr>
<?}?>  
        </tbody>
    </table>
 <!--    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-1">
  Launch Modal 1
</button> -->  
  
<!-- Modal -->
<div class="modal fade" id="modal-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">What Would You Like To See?</h4>
      </div>
      <div class="modal-body">
         <a href="#modal-2" data-toggle="modal" data-dismiss="modal"> <p style="text-align: center; font-weight: bold;color: #227E79    ">Details</p></a>
         <a href="#modal-3" data-toggle="modal" data-dismiss="modal"> <p style="text-align: center; font-weight: bold;color: #227E79    ">Rankings</p></a>
<!--   <a href="#modal-2" data-toggle="modal" data-dismiss="modal">Next ></a> -->

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  
  

  
  <!-- #modal 2 -->
<div class="modal fade" id="modal-2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Details</h4>
      </div>
      <div class="modal-body">
      <!--   <p>Details</p> -->
        <table class="table table-striped" id="tblGrid">
            <thead id="tblHead">
              <tr>
                <th>Score</th>
                <th>Total</th>
                <th>Hard</th>
                <th>Medium</th>
                <th>Light</th>
                <th>Max</th>
                <!-- <th class="text-right">Mean</th> -->
              </tr>
            </thead>
            <tbody>
      
                <td id="decel_point"></td>
                <td id="decel_count"></td>
               <td id="decel_Hard"></td>
               <td id="decel_Medium"></td>
               <td id="decel_Light"></td>
                <td id="decel_max"></td>
              </tr>
              
      
            </tbody>
          </table>
        
  <a href="#modal-1" data-toggle="modal" data-dismiss="modal">< Previous</a>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 

 <!-- #modal 3 -->
<div class="modal fade" id="modal-3">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Rankings</h4>
      </div>
      <div class="modal-body">
      <!--   <p>Details</p> -->
        <table class="table table-striped" id="tblGrid">
            <!-- <thead id="tblHead">
              <tr>
                <th>Events</th>
                <th>Points</th>
                <th>Counts</th>
               
              </tr>
            </thead> -->
            <tbody>
            <tr><td>Overall</td>
                <td id="overall"></td>
                <tr><td>Braking</td>
                <td id="Decel"></td>
                
             
              </tr>
            </tbody>
          </table>
        
  <a href="#modal-1" data-toggle="modal" data-dismiss="modal">< Previous</a>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 
</div>


<div class="container-fluid" id="details" style="display: none;font-weight:normal;font-size:small;">

<table>
  <tr><td>
  <input type="button" onclick="$('#main').show();$('#details').hide();" style="float: LEFT;margin-bottom: 2vh;outline: none;
  border:none;background: url('image/back.png');background-size: 100%;background-position: top center;background-repeat:no-repeat; height:40px; 
  width:77px;" value=""></td></tr></table>
  <center>
        <div id="details_head"></div>
        <div style="padding:5px 0;font-weight: bold;">Equip #<?echo $device_get; ?></div>
  </center>
<table id="details_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        
        <tbody>
            <tr>
              <td>Rank</td><td id="overall_det"></td>
            <tr>
              <td>Score</td><td id="Decel_p"></td>
            <tr>
              <td>Total # Of Braking Events</td><td id="Decel_c"></td>
            <tr>
              <td></td><td><div style="width: 50%;float:left;border-right: 0.5px solid #ddd;">#</div><div style="width: 50%;float:right;border-left: 0.5px solid #ddd;">%</div></td>    
           <!--  <tr>
              <td>Counts</td><td><div style="width: 50%;float:left;border-right: 0.5px solid #ddd;" id="Decel_c"></div><div style="width: 50%;float:right;border-left: 0.5px solid #ddd;">%</div></td>
            </tr>  --> 
            <tr>
              <td>Hard   (>7 MPH/Sec)</td><td><div style="width: 50%;float:left;border-right: 0.5px solid #ddd;" id="Decel_h"></div><div style="width: 50%;float:right;border-left: 0.5px solid #ddd;" id="harpercent"></div></td>
            <tr>
              <td>Medium   (5-7 MPH/Sec)</td><td><div style="width: 50%;float:left;border-right: 0.5px solid #ddd;" id="Decel_m"></div><div style="width: 50%;float:right;border-left: 0.5px solid #ddd;" id="mediumpercent"></div></td>
            <tr>
              <td>Light (2-5 MPH/Sec)</td><td><div style="width: 50%;float:left;border-right: 0.5px solid #ddd;" id="Decel_l"></div><div style="width: 50%;float:right;border-left: 0.5px solid #ddd;" id="lightpercent"></div></td>
            <tr>
              <td>Max (MPH/Sec)</td> <td id="Decel_max"></td>
        
        </tbody>
    </table>
</div>

<div class="container-fluid" id="history_graph" style="display: none;font-weight:normal;font-size:small;">

  <input type="button" onclick="$('#main').show();$('#history_graph').hide();" style="float: LEFT;margin-bottom: 2vh;outline: none;
  border:none;
  background: url('image/back.png');
  background-size: 100%;
  background-position: top center;
  background-repeat:no-repeat; 
  height:40px; 
  width:77px;" value="">


<div class="container vertical rounded">

  <div class="col-sm-12">
  <div class="col-sm-12" >
  <div class="col-sm-12"  align="center">

<table>
 <tr>

    <? 




 // $array_date= array("2017-10-13"=>"34","2017-12-20"=>"60","2017-01-14"=>"100","2017-09-17"=>"89");

 foreach ($results as $data) {

 $date->setISODate($year,$data['week_count']);
          $date_data=$date->format('m-d-y');



          $light_count = 50;
      if($data['light'] < 50 )
      {
         $light_count  = $data['light'];
      }
      $score = 50  + $light_count - ($data['hard'] *3  ) + ($data['medium']/2) ;
      
echo '
 <td > 
 <div class="container vertical flat" style="width:60px">
  <div class="progress-bar" style="">
        <div class="progress-track">
          <div class="progress-fill" style="background: #B8A7A9;">
          <span class="pert_span">'.$data['scorecount'].'%</span>
          </div>
        </div>
        </div>
        
        </div></td>
       
  
    
  ';
 


}
?>
</tr>

<tr>
   <? foreach ($results as $data) { 

    $date->setISODate($year,$data['week_count']);
          $date_data=$date->format('m-d-y'); 


 echo '<td style="text-align:center"><span class="td_span_data" style="text-align:center">'.
          $date_data.'</span></td>'; ?>
<? } ?>




</tr>



</table>
</div>
  </div>

  
</div>
  


</div>


  
<style>
.pert_span {}
.td_span_data { }
  table, th, td {
    border: 1px solid white;
} 
td { width:50px;}


/* Vertical */

.vertical .progress-bar {
  float: left;
  height: 300px;
  width: 40px;
}

.vertical .progress-track {
  position: relative;
  width: 40px;
  height: 100%;
  background: white;
}

.vertical .progress-fill {
  position: relative;
  height: 50%;
  width: 40px;
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
</script>



</div>
</body>
</html>

<style type="text/css">
    @font-face {
  font-family: 'Helvetica_Nue';
   src: url('assets/fonts/helvetica-neue-5923ee0f5f95b.ttf');
}
@font-face {
  font-family: 'Helvetica_Nue_thin';
   src: url('assets/fonts/HelveticaNeue-Thin.otf');
}

  
    html *
{
  
   font-family: Helvetica_Nue;
   

}
.middle {
display: block;
    
    -webkit-margin-before: .5em;
    -webkit-margin-after: 1em;
    -webkit-margin-start: 0px;
    -webkit-margin-end: 0px;
    -webkit-padding-start: 40px;
    padding-left: 0;
    padding-right: 0;
}
.bootstrap-tagsinput {
    background-color:#F0F0F0; 
     border: none;
     outline: none; 
    box-shadow: none; 
   display: inline-block; 
    padding: 4px 6px;
 color: #555; 

     border-radius: 4px;
    max-width: 100%; 
    line-height: 5vh; 
     cursor: text; 
    }
  </style>


