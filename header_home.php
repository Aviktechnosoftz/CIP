<?php
error_reporting(0);
session_start();
// print_r($_SESSION);
include_once('connect.php');

if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}
// print_r($_SESSION);
$project_name_query=$conn->query("select tbl_project.id as project_id,project_name as name,number from tbl_project_register left join tbl_project on tbl_project_register.project_id = tbl_project.id where tbl_project.id='".$_SESSION['admin']."'  group by project_id")->fetch_object();

$get_project_details=$conn->query("select * from tbl_project_detail where project_id='".$_SESSION['admin']."'")->fetch_object();

// print_r($_SESSION);
$home=true;

$get_employer= $conn->query("select * from tbl_employer where project_id='".$_SESSION['admin']."' AND is_deleted=0 order by company_name asc ");


$jsonurl = "http://api.openweathermap.org/data/2.5/weather?q=Brisbane%20,%20Australia&appid=11ba8d385fb1ddb8d674e46946911606&units=metric";
$jsonurl2 = "http://api.openweathermap.org/data/2.5/weather?q=Brisbane%20,%20Australia&appid=11ba8d385fb1ddb8d674e46946911606&units=imperial";


$json = file_get_contents($jsonurl);

$json2 = file_get_contents($jsonurl2);
$weather = json_decode($json);
$weather2 = json_decode($json2);


$temp= $weather->main->temp;
$temp2= $weather2->main->temp;
$humidity=$weather->main->humidity;
$wind=$weather->wind->speed;
$temp_precipitation= $weather->weather[0]->main;




?>

<!DOCTYPE html>
<html>
<header>
  <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico"/>


  <link rel="stylesheet" href="css/bootstrap.min.css">
     <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 <!--    <script type="text/javascript" src="js/upload.js" ></script> -->
  <link rel="stylesheet" href="css/sidebar.css">
  <link rel="stylesheet" href="index_files/mbcsmbmcp.css" type="text/css" />
 <link rel="stylesheet" href="css/font-awesome.min.css">
<!--  <link rel="stylesheet" href="js/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="js/jquery.mobile-1.4.5.min.js"></script> -->

 <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0" />
</header>


<body>
    



<div class="logo" onclick="redirect()"></div>
<script>
  function redirect()
  {
    window.location.href="header_home.php";
  }
</script>
  

<div class="nav_wrap" style=" background-color:#DF5430;">
<? include('navigation.php'); ?>
</div>
 <div class="" style="padding-left: 0 !important;">
    <? if($home){include('siderbar_home.php');} ?>
  </div>

<div class="container-fluid" style="padding-left: 0 !important;background-color: #F2F2F6;">
 <CENTER>
  <div class="col-xs-8 col-md-8 col-lg-9 col-sm-7" style="background-color: #F2F2F6">
   <div class="main_content">
      <div id="content">
        <div style="height: 20vh;">
        
            <div class="bs-example">
              <div id="myCarousel2" class="carousel slide" data-ride="carousel">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                       <? for($i=0;$i<=3;$i++){ 
                                        $j=$i+1;
                                        $image_col="image_".$j;
                                        if($get_project_details->$image_col !="")
                                        {

                                        ?>
                                        <li data-target="#myCarousel2" data-slide-to="<?=$i?>" <?if($i==0) echo"class='active'";?>></li>
                                        <? } ?>
                                        <!-- <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>  -->

                                    <? } ?> 
                      </ol>   
                                <div class="carousel-inner">
                                <? for($i=0;$i<=3;$i++){ 
                                                $j=$i+1;
                                                $image_col="image_".$j;
                                                if($get_project_details->$image_col !="")
                                                {

                                                ?>
                                                <div class="item <?if(!$i) echo "active" ?>">
                                                    <img src="admin/temp_uploads/<?=$get_project_details->$image_col?>" alt="First Slide" >

                                        </div>

                                         <? } ?>
                                        <!-- <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>  -->

                                    <? } ?> 
                    </div>
                    
              </div>
            </div>
        </div>


        <div id="side_3" style="text-align: left;padding: 5px;margin-top: 0;">
        <div class="forecast_title"> <h4 style="text-align: left;padding-left: 0.5vw;color: #E7513A;font-weight: 100;font-size: 2vh;">General Site Information</h4>
            
            </div>
            <div class="h-divider" style="margin-top:5px;margin-bottom:5px;height:1px;width:90%;border-top:1px solid gray;
            border-color:#EFE6E6"></div>
            <div style="padding: 1vh;">
            <!-- <div class="row">
              <div class="col-sm-4">Location:</div><div class="col-sm-8"><??></div>
            </div> -->

            
        <p style="font-size: 2vh;"><b>Project Name:</b> <?=$get_project_details->project_name?><br>
    
        <b> Address:</b><?=$get_project_details->project_address ?><br> 
      
        <b> Total Site Area:</b> <?=$get_project_details->total_site_area      ?> <br>
        <b>Total Building Area:</b><?=$get_project_details->total_building_area   ?> <br>
        <b>Developer-Builder:</b> <?=$get_project_details->construction_manager ?><br>
        <b> Client:</b> <?=$get_project_details->client ?><br>
        <b> Tenant:</b><?=$get_project_details->tenant ?><br>
        <b> Tenant's Project Manager :</b> <?=$get_project_details->project_manager    ?> <br>
        <b>Construction Manager:</b> <?=$get_project_details->construction_manager  ?> <br>
        <b>Project Engineer:</b><?=$get_project_details->project_engineer     ?><br>
        <b> Project Manager:</b> <?=$get_project_details->project_manager  ?> <br>
        <b>Site Manager:</b> <?=$get_project_details->site_manager     ?> <br>
        <b>Foreman:</b><?=$get_project_details->foreman        ?><br> 
        <b>HSR:</b><?=$get_project_details->safety_representative ?> <br>
        <b> Site Engineer:</b><?=$get_project_details->site_engineer ?>
        </p>

     
        </div>
        </div>
    
      </div>

      <div id="content2">

    


        

        <div id="side_2">
               <div class="forecast_title"> <h4 style="text-align: left;padding-left: 2vw;color: #E7513A;font-weight: 100;font-size: 2vh;">Weather Forecast</h4>
                  <div class="forecast_submenu" id="winput">  </div>
               </div>

                <div class="h-divider" style="margin-top:5px;height:1px;width:90%;border-top:1px solid gray;
           border-color:#EFE6E6"></div>

                <div class="hidden" id="loading"><img src="image/loading_forecast.gif" width="75vw" height="75vh"></div>

                <div id="error_div" style="color:red;font-size:2vh;display: none"> Location Not Found </div>
                <div id="tempdiv">
                  <div class="temp">
                   <span  style="font-size: 5vh;"><span class="temp_value"><? echo $temp?></span><sup class="celcius"   style="cursor: pointer;color: red"><span style="font-size: 0.4em;margin-left: 5%;">o</span><sub style="font-size: 0.4em;">C</sub></sup>
                   <sup> <span><img src="image/divider.png"  style="    height: 13px;
         width: 1px;
         margin-top: 13px;"></span></sup>
                   <sup class="farn" style="cursor: pointer;"><span style="font-size: 0.4em;">o</span><sub style=" font-size: 0.4em;">F</sub></sup></span>
                   </div>
                   <div class="country">  
                    <h4 style="font-size: 3vh;margin-top: 1vh;margin-bottom: 1vh"><span id="city">Brisbane</span>, <span id="country">AU</span></h4>

                    </div>

                    <div class="other_units">  
                        <h6  style="font-size: 2vh;margin-top: 1vh;margin-bottom: 1vh">Precipitation: NA</h6>
                        <h6  style="font-size: 2vh;margin-top: 1vh;margin-bottom: 1vh">Humidity:<span  id="humid"> <?=$humidity."%" ?></span></h6>
                         <h6 style="font-size: 2vh;margin-top: 1vh;margin-bottom: 1vh">Wind:<span  id="wind"> <?= $wind." km/h" ?>
                   </span></h6>
                        <h6 style="font-size: 2vh;margin-top: 1vh;margin-bottom: 1vh">Temperature Precipitation:<span id="temp_prec"> <? echo $temp_precipitation ?></span></h6>
                    </div>
                  </div>
                    <input type="hidden" name="celcius_value" class="api_value" value="<?= $temp?>">
                    <input type="hidden" name="farn_value" class="farn_val" value="<?=$temp2 ?>">
        

              </div>

              <div id="side_1">
        <div class="forecast_title"> <h4 style="text-align: left;padding-left: 2vw;color: #E7513A;font-weight: 100;margin-top: 0;padding-top: 1vw;font-size: 2vh;">Site Notification</h4>
          </div>           <div class="h-divider" style="margin-top:5px;height:1px;width:90%;border-top:1px solid gray;
           border-color:#EFE6E6"></div> 
         
       </div>
      </div>
  


  </div>
  </div>
  </CENTER>
  </div>


  <? //if($home){include('siderbar_home.php');} ?>
</div>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
            <span class="close" onclick="$('#myModal').hide();">&times;</span>
            <h5 class="modal-title" style="font-style: italic;">Weather Forecast-Location Zip Code</h5>
    </div>
        <div class="modal-body">
                <form method="" id="zipform" autocomplete="off">
                  <div class="form-group">
                  <input class="form-control" type="text" name="zip_cde" id="zip_cde" placeholder="Enter Zip" style="border-radius:10vh;outline: none;border:none;box-shadow: none;">
                  <div id="errormsg" style="font-weight: 100;font-size: 1.7vh"></div>
                  <span></span>
                  </div>
                  <div class="form-group text-center">

                <input class="btn btn-info btn-sm" type="button" name="zipsubmit" id="zipsubmit" value="Get Details" onclick="" style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none">
                  </div>  
                  </form>
        </div>
  </div>

</div>

  

</body>

<style>
/*@font-face {
  font-family: 'Helvetica_Nue';
   src: url('fonts/helvetica-neue-5923ee0f5f95b.ttf');
}
@font-face {
  font-family: 'Helvetica_Nue_light';
   src: url('fonts/helvetica-neue-light-5925314ecbd06.ttf');
}*/
@font-face {
  font-family: 'Avenirnext';
   src: url('fonts/AvenirNextLTPro-Regular.otf');
}
@font-face {
  font-family: 'Avenirnextbold';
   src: url('fonts/AvenirNextLTPro-Bold.otf');
}
@font-face {
  font-family: 'Avenirnextitalic';
   src: url('fonts/AvenirNextLTPro-It.otf');
}
@font-face {
  font-family: 'Avenirnextmedium';
   src: url('fonts/avenir-next-lt-pro-medium-596dfa60711d1.otf');
}
@media (min-width: 992px)
bootstrap.css:1937
.col-md-10 {
    width: 75%;
}
  
  body {
    background-color: white;
    height: 0vh;
    margin: 0px;
    overflow-x: hidden;
  overflow:hidden;

}


html *
{
  
   font-family: Avenirnext;
}



.nav_container
{
     
   /* margin-top: 1vh;*/
    margin-left: 12.5vw;
    float: left;
    margin-bottom: 1vh;
    font-size: 1.4vw;
   }

.nav_wrap
{
  
  
  
  float: left;
  width: 100%;
  height: 13.7vh;
  background-color: #DF5430;
  /*margin-top: -2px;*/


}

.button_1
{
  height: 13.4vh;

}

.logout a
{
    


    display: block;
    text-decoration: none;
    font-size: 2vh;
    /* line-height: 30px; */
    padding: 2vh;
    color: white;
    text-shadow: 1px 1px 1px rgba(128,125,122,1);
    font-weight: bold;
    color: white;
    /* letter-spacing: 1pt; */
    /* word-spacing: -10pt; */
    /* text-align: left; */
    font-family: Arial;
    float: right;
    /* height: 20vh; */
    margin-top: 4vh;
    background-size: 1vw;
  
}

.logout a:hover
{
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1);
transition: 0.1s ease;

}

.effect_item:hover
{
box-shadow: 0 0 0 2px white;
transition: 0.4s ease;
}



.welcome
{   
  text-shadow:1px 1px 1px rgba(222,222,222,1);font-weight:normal;color:#255915;background-color:#EBFCA4;letter-spacing:2pt;word-spacing:6pt;font-size:15px;text-align:center;font-family:impact, sans-serif;line-height:1;
}

.logo
{

/*border: 1px solid; */*/
    float: left;
    height: 11.6vh;
    margin-left: 2vw;
    margin-top: 1vh;
    width: 11.6vh;
    position: absolute;
    background-image: url(image/logo.png);
    background-repeat: no-repeat;
    background-size: 100% 100%;
    image-rendering:optimizeSpeed;              /* Legal fallback                 */
image-rendering:-moz-crisp-edges;           /* Firefox                        */
image-rendering:-o-crisp-edges;             /* Opera                          */
image-rendering:-webkit-optimize-contrast;  /* Chrome (and eventually Safari) */
image-rendering:crisp-edges;                /* CSS3 Proposed                  */
-ms-interpolation-mode:bicubic;    
cursor: pointer;




}

.sub-sub_menu
{
  background-color: white;
}

.Name
{
 padding-top: 1vw;
padding-left: 3.5vw;


  
  text-shadow:1px 1px 1px rgba(0,0,0,1);font-weight:normal;color:#F5F5F5;letter-spacing:1pt;word-spacing:2pt;font-size:27px;text-align:left;font-family:arial, helvetica, sans-serif;line-height:1;
}

#search_site
{
/*  left: 3%;*/
  margin-top: 28px;
  float: right;
}
#submit_search_site
{
    margin-left: 0.5px;
    height: 34px;
    float: right;
  }
  #mbmcpebul_wrapper {
    background-image: -webkit-linear-gradient(top, #DF5430 0%, #DF5430 100%);
  }

  li:hover {
    background: #3C3C3C;
  

  }
  li a img
  {
    margin-top: 2vh;
  }

 

   
#mbmcpebul_table ul.gradient_menu {

   z-index: 999;
     background-color: #505153;
    /* IE9, iOS 3.2+ */
    background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZpZXdCb3g9IjAgMCAxIDEiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxsaW5lYXJHcmFkaWVudCBpZD0idnNnZyIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIHgxPSIwJSIgeTE9IjAlIiB4Mj0iMTAwJSIgeTI9IjAlIj48c3RvcCBzdG9wLWNvbG9yPSIjMDAwMDAwIiBzdG9wLW9wYWNpdHk9IjEiIG9mZnNldD0iMC4zMjc5OTk5OTk5OTk5OTk5NiIvPjxzdG9wIHN0b3AtY29sb3I9IiNlZWYxZjUiIHN0b3Atb3BhY2l0eT0iMSIgb2Zmc2V0PSIwLjk5NiIvPjxzdG9wIHN0b3AtY29sb3I9IiNlZWYxZjUiIHN0b3Atb3BhY2l0eT0iMSIgb2Zmc2V0PSIxIi8+PHN0b3Agc3RvcC1jb2xvcj0iI2VlZjFmNSIgc3RvcC1vcGFjaXR5PSIxIiBvZmZzZXQ9IjEiLz48L2xpbmVhckdyYWRpZW50PjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InVybCgjdnNnZykiIC8+PC9zdmc+);
    background-image: -webkit-gradient(linear, 0% 0%, 100% 0%,color-stop(0.328, rgb(0, 0, 0)),color-stop(0.996, rgb(238, 241, 245)),color-stop(1, rgb(238, 241, 245)),color-stop(1, rgb(238, 241, 245)));
    /* Android 2.3 */
    background-image: -webkit-linear-gradient(left,rgb(0, 0, 0) 70.8%,rgb(238, 241, 245) 130.6%,rgb(238, 241, 245) 100%,rgb(238, 241, 245) 100%);
    /* IE10+ */
    background-image: linear-gradient(to right,rgb(2, 0, 0) 70.8%,rgb(238, 241, 245) 130.6%,rgb(238, 241, 245) 100%,rgb(238, 241, 245) 100%);
    background-image: -ms-linear-gradient(left,rgb(0, 0, 0) 70.8%,rgb(238, 241, 245) 130.6%,rgb(238, 241, 245) 100%,rgb(238, 241, 245) 100%);
}
 
/* IE8- CSS hack */
@media \0screen\,screen\9 {
    .gradient {
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff000000",endColorstr="#ffeef1f5",GradientType=1);
    }





  }

  #mbmcpebul_table ul li:hover, #mbmcpebul_table ul li.subexpanded, #mbmcpebul_table ul li.subitemhot {
    border-color: transparent;
    background-color: black;
    box-shadow: none;
}

#mbmcpebul_table.css_menu ul li:hover > ul {

   background-color: #505153;
    /* IE9, iOS 3.2+ */
    background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZpZXdCb3g9IjAgMCAxIDEiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxsaW5lYXJHcmFkaWVudCBpZD0idnNnZyIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIHgxPSIwJSIgeTE9IjAlIiB4Mj0iMTAwJSIgeTI9IjAlIj48c3RvcCBzdG9wLWNvbG9yPSIjMDAwMDAwIiBzdG9wLW9wYWNpdHk9IjEiIG9mZnNldD0iMC4zMjc5OTk5OTk5OTk5OTk5NiIvPjxzdG9wIHN0b3AtY29sb3I9IiNlZWYxZjUiIHN0b3Atb3BhY2l0eT0iMSIgb2Zmc2V0PSIwLjk5NiIvPjxzdG9wIHN0b3AtY29sb3I9IiNlZWYxZjUiIHN0b3Atb3BhY2l0eT0iMSIgb2Zmc2V0PSIxIi8+PHN0b3Agc3RvcC1jb2xvcj0iI2VlZjFmNSIgc3RvcC1vcGFjaXR5PSIxIiBvZmZzZXQ9IjEiLz48L2xpbmVhckdyYWRpZW50PjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InVybCgjdnNnZykiIC8+PC9zdmc+);
    background-image: -webkit-gradient(linear, 0% 0%, 100% 0%,color-stop(0.328, rgb(0, 0, 0)),color-stop(0.996, rgb(238, 241, 245)),color-stop(1, rgb(238, 241, 245)),color-stop(1, rgb(238, 241, 245)));
    /* Android 2.3 */
    background-image: -webkit-linear-gradient(left,rgb(0, 0, 0) 32.8%,rgb(238, 241, 245) 99.6%,rgb(238, 241, 245) 100%,rgb(238, 241, 245) 100%);
    /* IE10+ */
    background-image: linear-gradient(to right,rgb(0, 0, 0) 32.8%,rgb(238, 241, 245) 99.6%,rgb(238, 241, 245) 100%,rgb(238, 241, 245) 100%);
    background-image: -ms-linear-gradient(left,rgb(0, 0, 0) 32.8%,rgb(238, 241, 245) 99.6%,rgb(238, 241, 245) 100%,rgb(238, 241, 245) 100%);
}
 
/* IE8- CSS hack */
@media \0screen\,screen\9 {
    .gradient {
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff000000",endColorstr="#ffeef1f5",GradientType=1);
    }

  }
.main_content
{
     /*border: 1px solid grey;*/
    /*float: left;*/
   
    /* margin: -220px 0 0 -200px; */
  
   
    /*margin-left: 3vw;*/
    /*background-color: #f5f5f5;*/
 
    
    
    height: 82vh;
}

#content {
                 width: 30vw;
    height: 78vh;
    margin-top: 3vh;
    /*border: 1px solid;*/
    display: inline-block;
    float: left;
      /*background-image: url('image/notification_1.png');*/
      background-position: center;
    background-size: 30vw 79vh;
    background-repeat: no-repeat
    
}
#content2 {
       width: 38vw;
    height: 78vh;
    margin-left: 2vw;
    margin-top: 3vh;
    /*border: 1px solid;*/*/
    display: inline-block;
    float: left;
    /*margin-left: 2vw;*/
    
}

#side_1{  height: 50%;        /*border: 1px solid;*/    /*background-image: url('image/notification_2.png');*/   

margin-top: 3vh;
 background: #fff;   background-position: center;    background-size:  38vw 26vh;    background-repeat: no-repeat;}

#side_2
{

  
    
    padding-top: 1%;
    height: 45%;

    background-color: white;
/*  border: 1px solid;*/
    /*background-image: url('image/notification_3.png');*/
    background-position: center;
    background-size: 38vw 47vh;
    background-repeat: no-repeat;
 
}




@media (min-width: 768px) and (max-width: 1200px)
{
#content  {
    width: 40%;
        background-size: 257px 565px;
  
}

#content2  {
       width: 56%;
    margin-left: 2vw;
}
#side_2  {
       background-size: 365px 335px;
}
#side_1  {
     background-size: 365px 187px;
    
}


}

.forecast_submenu
{
  
    height: 5vh;
    width: 5vh;
    float: right;
    margin-right: 2vh;
    background-position: center;
    background-repeat: no-repeat;
    background-image: url(image/menu_icon.png);
    position: static;
    /* background-color: #00bbee; */
    /* margin-left: 20%; */
    /* margin-right: 20%; */
    margin-top: -5vh;
    /* margin-bottom: 15%; */
    /* border: 2px solid red; */
}
.temp
{
/*  border:1px solid;*/
      margin-top: 3vh;
      text-align: left;
      padding-left:  2vw;
}
.country
{
  /*border:1px solid;*/
    
      text-align: left;
      padding-left:  2vw;
}
.other_units
{
   /*border:1px solid;*/
    
      text-align: left;
      padding-left:  2vw;
}

sub, sup {
    position: relative;
    /* font-size: 75%; */
    line-height: 0;
    /* vertical-align: baseline; */
    margin-bottom: 0px;

    }
    sub
    {
             top: 0.5em;
    }
    .line-separator{

height:1px;

background:#717171;

border-bottom:1px solid #313030;

}

.text1
{
  font-size: 1.7vh;
}

#side_3
{

  
    margin-top: 3vh;
    padding-top: 1%;
    height: 57vh;
    background-color: white;
    background-position: center;
    background-size: 38vw 47vh;
    background-repeat: no-repeat;
 
}
.imgclass {
width: 100%;
height: 26vh;
}

.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
        background-color: #fefefe;
    margin: auto;
    padding: 5px 10px;
    border: 1px solid #888;
    width: 22vw;
    top: 3vh;
    left: 39vh;
}
.modal-header {
  padding: 5px;
}
.modal-body {
padding: 5px;
}
/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
.close {
  font-size: 20px;
  /*color: green;*/
  outline: none;
  opacity: 0.9;
}
.close:hover,
.close:focus {
    color: #aaaaaa;
    text-decoration: none;
    cursor: pointer;
    opacity: 0.9;
}
.form-group {
  margin-bottom: 5px;
}

::-webkit-scrollbar {
    width: 7px;
        background: #fff;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
    border-top-left-radius: 0;
     border-bottom-left-radius: 0;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    border-radius: 10px;
    border-top-left-radius: 0;
     border-bottom-left-radius: 0;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    background: #E3E1E3;
}

@media screen and (min-width: 768px)
{
.carousel-indicators {
    bottom: 0px;
}
}

.carousel-inner>.item>img
{
  /*width: 100%;*/
  height: 20vh;
  /*width: auto;
  height: 26vh;
  max-height: 26vh;*/
}
</style>

</html>


<script>
  function home()
  {
    window.location.href='header_home.php';
  }

  $(document).ready (function(){
    var con= true;
    $('#test2').hide();
    
  });

$('#mbmcpebul_table li a').hover(
 function() {

// $(this).css('font-weight','bolder');
$('#mbmcpebul_table li .button_1').closest(this).css('color','#DF5430');
}, function(){

$(this).css('font-weight','100');
$(this).css('color','white');
// $('#mbmcpebul_table li .button_1').css('color','white');


});


$( ".farn" ).click(function() {
    var val= $('.api_value').val();
    var calc= val*9/5+32;
    var final= Number(calc).toFixed(2);
    // alert(final);
    $('.temp_value').html(final);
    $(".farn").css('color', 'red');
    $('.farn_val').val(final);
    $(".celcius").css('color', 'black');
  
});
$( ".celcius" ).click(function() {
    var val= $('.farn_val').val();
    var calc= (5/9) * (val-32);
    var final= Number(calc).toFixed(2);
    // alert(final);
    $('.temp_value').html(final);
    $(".celcius").css('color', 'red');
    $(".farn").css('color', 'black');

  
});

$("#winput").click(function(){

    $("#zip_cde").val("");
  $("#errormsg").html("");
  $("#loading").hide();
});

$("#zipsubmit").click(function(){


  var zipcode = $.trim($("#zip_cde").val());



  if (zipcode == '')
  {
    $("#errormsg").html("Enter Zip Code").show();
  }
  else if( isNaN(zipcode))

    {
      $("#errormsg").html("Enter Only Numbers").show();

    }
 /* elseif (zipcode.match(/^\d+$/))
    {
      $("#errormsg").html("Enter Only Number").show();

    }*/
  else if (zipcode.length !=4)
  {
   $("#errormsg").html("Enter Valid Zip Code").show();
  }
  
  else {
    $("#errormsg").html("Correct").show();
       $("#myModal").hide();
       $("#tempdiv").hide();
       $("#error_div").hide();
       $('#loading').removeClass('hidden');
       $("#loading").show();
    

    
        $.ajax ({
          type:"POST",
          url:"get_weather.php",
      
          data: $("#zipform").serialize(),
          success: function(result) {
            // alert(result);
            if( result.indexOf('Warning') >= 0){
               // alert("ok");
                $("#error_div").show();
                $("#tempdiv").hide();
                $("#loading").hide();
              }

              else{
              var res = result.split(",");
              
            $('.temp_value').html(res[0]);
             $(".celcius").css('color', 'red');
             $(".farn").css('color', 'black');
             $('.api_value').val(res[0]);
             $('.farn_val').val(res[6]);
             $('#humid').html("&nbsp"+res[1]+"%");
              $('#wind').html("&nbsp"+res[2]+"km/h");
                $('#temp_prec').html("&nbsp"+res[3]);
                $('#country').html("&nbsp"+res[4]);
                $('#city').html("&nbsp"+res[5]);
                $("#tempdiv").show();
                $("#error_div").hide();
                $("#loading").hide();
          }
        }

        });
          
           
  }
 });

</script>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("winput");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "block";
    }
}












</script>


