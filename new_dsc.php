<? 
    
        // include_once('connect.php');
      
        // session_start();
       
        // $_SESSION['dsr'] ="YES";
        // if($_SESSION['dsr'] == "NO" || (!isset($_SESSION['samlNameId']))){

        //   header("location:webdsc.php");
        // }
        // $ntid = "X2LDICKS";
        // $ntid_res = $conn->query("select DeviceName from devicedetails where driver_ntid='".$ntid."'")->fetch_object();

        $JsonData = file_get_contents('http://192.169.226.71/xirgo/api_dsc.php');
        $json = json_decode($JsonData, true);    
        $device_get = "134200";
        
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
        font-weight:bold;background-color:#f8f8f8;border-color:#C29193  ;letter-spacing:1pt;word-spacing:-3pt;font-size:17px;text-align:center;font-family:arial, helvetica, sans-serif;line-height:1;margin: 0 0 0 0; border: 2px solid;  border-radius: 5px;width:99.6vw;

    }
    .table td {
    text-align: center;   
    vertical-align: middle !important;
    }
    .table th {
       text-align: center;   
    }

    a{

      outline: none !important;
    }

    #example_wrapper{

      width:50vw;
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
    var score_total = <?=$curr_week_total?>;

    function details(week_count){
      
      $("#modal-1").modal("show");
      $.each(tempArray, function( index, value ) { 

        if(value['week_count'] == week_count){
          /*$("#speed_point").html(value['speed_points']);
          $("#speed_count").html(value['speed']);
          $("#accel_point").html(value['aceel_points']);
          $("#accel_count").html(value['accel']);*/
          $("#decel_point").html(value['decel_point']);
          $("#decel_count").html(value['decel']);
          /*$("#rpm_point").html(value['rpm_points']);
          $("#rpm_count").html(value['rpm']);
          $("#idle_point").html(value['idle_points']);
          $("#idle_count").html(value['idle']);*/
          var total = get_length(week_count);
          $("#overall").html(get_index(value['score'],get_array(week_count,'score'))+" of "+ total);
          //$("#Speed").html(get_index(value['speed_points'],get_array(week_count,'speed_points'))+" of "+ total);
          //$("#Accel").html(get_index(value['aceel_points'],get_array(week_count,'aceel_points'))+" of "+ total);
          $("#Decel").html(get_index(value['decel_point'],get_array(week_count,'decel_point'))+" of "+ total);
          //$("#RPM").html(get_index(value['rpm_points'],get_array(week_count,'rpm_points'))+" of "+ total);
          //$("#Idle").html(get_index(value['idle_points'],get_array(week_count,'idle_points'))+" of "+ total);
        }
      });
      
    }

    function get_rank(week_count){

      $.each(tempArray, function( index, value ) { 
          if(value['week_count'] == week_count){
            var total = get_length(week_count);
            //alert(list_week[list_week.length -1]);
            if(week_count == curr_week){

              $("#overall_det").html(get_index(value['score'],get_array(week_count,'score'))+" of "+ total);
              ///$("#Speed_det").html(get_index(value['speed_points'],get_array(week_count,'speed_points'))+" of "+ total);
              ///$("#Accel_det").html(get_index(value['aceel_points'],get_array(week_count,'aceel_points'))+" of "+ total);
              $("#Decel_det").html(get_index(value['decel_point'],get_array(week_count,'decel_point'))+" of "+ total);
              ///$("#RPM_det").html(get_index(value['rpm_points'],get_array(week_count,'rpm_points'))+" of "+ total);
              ///$("#Idle_det").html(get_index(value['idle_points'],get_array(week_count,'idle_points'))+" of "+ total);
            //  $("#curr_rank").html(get_index(value['score'],get_array(week_count,'score'))+" of "+ total);

              var score_percent = 100 - ( (Math.round(value['score'])) * 100 / score_total);
              $("#curr_rank").html(score_percent+" %");
            }

            $("#"+week_count+"_over_rank").html(get_index(value['score'],get_array(week_count,'score'))+" of "+ total);
          }

      });
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
      return ret.sort();
    }

</script>
</head>
<body>

<div class="page-header"  id="title" style="min-height: 96.5vh;">
    <img id="logo" src="image/new_logo.png" width="200" height="100" style="float:left;margin-left:1vw;">
  <div>
  <input type="button" id="logout" style="outline: none;float: right;border:none;background: url('image/logout.png');background-size: 100%;background-position: top center;background-repeat:no-repeat; height:6vh; width:8vw;" onclick="window.location.replace('logout.php');">
  <h1 style="width: 61vw;margin-left: 20vw;">DRIVER SCORE CARD</h1>
</div>
    <div id ="main" style="margin-top: 8vh;">
      <center>
      <table cellspacing="10">
        <tr>
          <td style="padding: 1vh;">Equipment # : </td>
          <td style="padding: 1vh;"><?=$device_get ?></td>
        </tr>
        <tr>
          <td style="padding: 1vh;">Overall Ranking : </td>
          <td id="curr_rank" style="padding: 1vh;"></td>
        </tr>
       <!-- <tr>
          <td style="padding: 1vh;">Overall Score (%): </td>
          <td id="over_score_percent" style="padding: 1vh;"></td>
        </tr>-->
        <tr>
          <td style="padding-top: 3vh;"><input style="margin-left:2vw;" type="button" onclick="$('#main').hide();$('#history').show();" value="History" ></td>

          <td style="padding-top: 3vh;"><input style="margin-left: -2vw;" type="button" onclick="$('#main').hide();$('#details').show();" value="Details" ></td>

        </tr>
      </table>
    </center>
        <!-- <p>Equip #: <? //echo $device_get ?></p>
        <p id="curr_rank"></p> -->
        
     </div> 

<div class="container-fluid" id="details" style="display: none;font-weight:normal;font-size:small;margin-top: 10vh;    ">

  <input type="button" onclick="$('#main').show();$('#details').hide();" style="outline: none;float: left;border:none;background: url('image/back.png');background-size: 100%;background-position: top center;background-repeat:no-repeat; height:5vh; width:5vw;" onclick="window.location.replace('logout.php');">
  <center>
<table id="details_table" class="table table-striped table-bordered" cellspacing="0" style="width: 25vw;
    height: 20vh;margin-top: 5vh;">
        
        <tbody>
            <tr><td>Overall</td>
                <td id="overall_det"></td>
               
              </tr>
              <!-- <tr><td>Speed</td>
                <td id="Speed_det"></td>
                
              </tr>
              <tr><td>Accel</td>
               <td id="Accel_det"></td>
               
              </tr> -->
              <tr><td>Decel</td>
               <td id="Decel_det"></td>
                
              </tr>
               <!-- <tr><td>RPM</td>
                <td id="RPM_det"></td>
              </tr>
               <tr><td>Idle</td>
               <td id="Idle_det"></td>
              </tr> -->

            </tbody>
    </table>
  </center>
</div>

<div class="container-fluid" id="history" style="display: none;font-weight:normal;font-size:small;margin-top: 15vh;">

  <input type="button" onclick="$('#main').show();$('#history').hide();" style="outline: none;float: left;border:none;background: url('image/back.png');background-size: 100%;background-position: top center;background-repeat:no-repeat; height:5vh; width:5vw;margin-top: -3vh;">
  <center>
<table id="example" class="table table-striped table-bordered" style="width: 50vw;margin-top: 5vh;">
        <thead>
            <tr>
                <th>W/S</th>
                <th>Points</th>
                <th>Drive Time</th>
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
                <td><? echo $data['points'] ?></td>
                <td><? echo substr($data['drive_time'], 0, -3); ?></td>
            
                <!--<td><? //echo (round($data['score'],1)) ?></td>-->
                <td id="<?=$data['week_count']?>_over_rank"></td>
                <script>
                  get_rank(<?=$data['week_count']?>);
                </script>
            </tr>
<?}?>  
        </tbody>
    </table>
  </center>
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
                <th>Events</th>
                <th>Points</th>
                <th>Count</th>
                <!-- <th class="text-right">Mean</th> -->
              </tr>
            </thead>
            <tbody>
      
              <!-- <tr><td>Speed</td>
                <td id="speed_point"></td>
                <td id="speed_count"></td>
              </tr>
              <tr><td>Accel</td>
                <td id="accel_point"></td>
                <td id="accel_count"></td>
              </tr> -->
              <tr><td>Decel</td>
                <td id="decel_point"></td>
                <td id="decel_count"></td>
              </tr>
               <!-- <tr><td>RPM</td>
                <td id="rpm_point"></td>
                <td id="rpm_count"></td>
              </tr>
               <tr><td>Idle</td>
                <td id="idle_point"></td>
                <td id="idle_count"></td>
              </tr> -->
      
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
               
              </tr>
              <!-- <tr><td>Speed</td>
                <td id="Speed"></td>
                
              </tr>
              <tr><td>Accel</td>
               <td id="Accel"></td>
               
              </tr> -->
              <tr><td>Decel</td>
               <td id="Decel"></td>
                
              </tr>
               <!-- <tr><td>RPM</td>
                <td id="RPM"></td>
              </tr>
               <tr><td>Idle</td>
               <td id="Idle"></td>
              </tr> -->
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
</div>
  <?include_once('fotter.php');?>

<!-- </body>
</html> -->
