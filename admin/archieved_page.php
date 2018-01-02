<?
include_once('connect.php');
include('session_login.php');
error_reporting(0);
$get_project_details=$conn->query("select * from tbl_project_detail where is_archieved=1");
$get_project_details2=$conn->query("select * from tbl_project_detail where is_archieved=1");
$get_min=$conn->query("select MIN(id) as min from tbl_project_detail")->fetch_object();

$get_archieved=$conn->query("select count(*) as count from tbl_project_detail where is_archieved=1")->fetch_object();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Light Bootstrap Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?include 'header_dash.php'; ?>
</head>
<body>
<div class="container-fluid" style="padding-top: 10px;padding-bottom: 10px;background-color:  #E4DFD0">
<div class="wrapper">
    <div class="sidebar"  style="" >

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="dashboard.php" class="simple-text" style="    margin-top: 0px;">
                    ADMINISTRATOR
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="dashboard.php" style="margin-top: 0px">
                        <i><img src="images/icon_1.png" style="    height: 3vh;"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="under_construction.php">
                        <i> <img src="images/icon_2.png" style="    height: 3vh;"></i>
                        <p>NCRs</p>
                    </a>
                </li>
                <li>
                    <a href="under_construction.php">
                        <i> <img src="images/icon_3.png" style="    height: 3vh;"></i>
                        <p>Complaints</p>
                    </a>
                </li>
                <li>
                    <a href="under_construction.php">
                        <i ><img src="images/icon_4.png" style="    height: 3vh;"></i>
                        <p>SINs</p>
                    </a>
                </li>
                <li>
                    <a href="under_construction.php">
                        <i ><img src="images/icon_5.png" style="    height: 3vh;"></i>
                        <p>Incidents</p>
                    </a>
                </li>
                <li>
                    <a href="under_construction.php">
                         <i><img src="images/icon_6.png" style="    height: 3vh;"></i>
                        <p>Feedback </p>
                    </a>
                </li>
                <li>
                    <a href="under_construction.php">
                        <i><img src="images/icon_7.png" style="    height: 3vh;"></i>
                        <p>Observations</p>
                    </a>
                </li>
                <li>
                    <a href="under_construction.php">
                       <i><img src="images/icon_8.png" style="    height: 3vh;"></i>
                        <p>Admin-Use</p>
                    </a>
                </li>
                 <li>
                    <a href="under_construction.php">
                        <i><img src="images/icon_9.png" style="    height: 3vh;"></i>
                        <p>Custom Report</p>
                    </a>
                </li>
                   <li>
                <div class="logo2">
                <a  class="simple-text">
                    MY ACCOUNT
                </a>
            </div>
            </li>
             <li>
                    <a href="archieved_page.php">
                        <i ><img src="images/icon_10.png" style="    height: 3vh;"></i>
                        <p id="cart-item" style="">Archived <span id="getarchived">

                                <span class="badge" style="position: absolute;top: 1px;margin-left: 6px;background-color: #DF5430"><?if($get_archieved->count>0){echo $get_archieved->count; }?></span></p></span>

                        
                    </a>
                </li>
                <li>
                    <a href="under_construction.php">
                        <i><img src="images/icon_11.png" style="    height: 3vh;"></i>
                        <p>Dock Activity</p>
                    </a>
                </li>
                 <div style="">
                    <a href="logout.php">
                        
                        <p style="background: #3D3D3D;
    color: #FFFFFF;
    width: 5vw;
    padding: 5px;
    border-radius: 6vh;
    font-family: 'Helvetica_nue';
    /* padding-bottom: 3px; */
    margin-left: 19px;
    margin-top: 15px;
    opacity: 0.8;
    margin-bottom: 5px;
    padding-left: 10px;
    padding-right: 10px;">Logout</p>
                    </a>
                </div>
             
                    
               
            
            </ul>
            <div style="background-color: #3A3A3A;
           
                /* border: 1px solid red; */
                height: 10vh;
                /* width: 8vw; */
                background-image: url(images/logo_admin2.jpg);
                background-size: 50% 100%;
                  image-rendering: pixelated;
                background-repeat: no-repeat;
                background-position: ce;
                background-position: 50% 50%;
            ">
               
            </div>
        </div>

    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar" style="background: #F0F0F0;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand" href="#">Dashboard</a> -->
                </div>
                <div class=" navbar-collapse">
                    <ul class="nav navbar-nav navbar-left col-xs-1">
                        <!-- <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
                                    <p class="hidden-lg hidden-md">
                                        5 Notifications
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li> -->
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                                <p class="hidden-lg hidden-md">Search</p>

                            </a>
                            <!-- <input type="text" name=""> -->
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar middle col-xs-9">
                        <input type="text" name="" class="form-control" data-role="tagsinput" value="In progress,Tags,technopark,Phase3" style="background: #F0F0F0;">
                    </ul>
                    <ul class="nav navbar-nav navbar-right col-xs-2">
                       <!--  <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        Dropdown
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li> -->
                        <!-- <li>
                            <a href="login.php">
                                <p>Log out</p>
                            </a>
                        </li> -->
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid" style="padding: 0">
                <div class="row nomargin">
                  

                    <div class="col-md-12" style="padding:0px">
                        <div class="card" style=" ">

                            <div class="header">
                            <div class="col-md-2">
                                <h4 class="title" style="color:#5B6672;cursor: pointer;" onclick="window.location.href='dashboard.php'">Home Page</h4>
                            </div>
                            <div class="col-md-2">
                                <!-- <h4 class="title" style="cursor: pointer;" onclick="window.location.href='site_diary.php'">Site Diary</h4> -->
                                <!-- <p class="category">24 Hours performance</p> -->
                            </div>
                             <div class="col-md-4">
                                <h4 class="title" style="cursor: pointer;" onclick="window.location.href='safety_report_chart.php'">Safety Management Report</h4>
                            </div>
                            
                              <!-- <div class="col-md-4">
                                  <div class="col-md-1 pull-right" id="list_view" style="width:0px;opacity: 0.2" onclick="show_list()"><img src="images/thumbnail_dark2.png" height="16px" width="16px"></div>
                                   <div class="col-md-1 pull-right" id="thumb_view" style="width: 0px;opacity: 1" onclick="show_thumbnail()"><img src="images/thumbnail_dark.png" height="16px" width="16px"></div>
                              </div> -->
                              <div class="col-md-12">
                                <!-- <h4 class="title" style="color:#E6523A">SITE SAFETY MANAGEMENT PLAN</h4> -->
                                <!-- <p class="category">24 Hours performance</p> -->
                            <!-- </div> -->
                            </div>
                            </div> 


                            <div class="content">
                            <div class="row nomargin" id="content_1">
                               <!-- <div class="col-sm-3">
                                   <div class="col-sm-12" style="border:1px solid #CDCDCD;height: 25vh;margin-top: 5vh;margin-right:3vh;border-radius: 2vh;height: 170px;/*width: 160px">
                                  <div><button type="button" rel="tooltip" title="Create" class="btn btn-simple btn-xs" style="top: 43%;left: 43%;position: absolute;" onclick="window.location.href='create_home.php'">
                                                        <i class="fa fa-plus fa-1x" style="    -webkit-text-stroke: 3px #f5f5f5;
                                                                font-size: 20px;color:#C8C8C8"></i>
                                                    </button>
                                            <p style="    top: 60%;
                                            text-align: left;
                                            position: absolute;
                                            font-size: 21px;font-family: 'helvetica_nue_thin';
                                            color: #C8C8C8;">Create New Homepage</p>
                                                    </div>  
                                </div>
                                <div class="col-sm-12"></div> 
                                </div> -->

                                <? while($row_project_details= $get_project_details->fetch_object()){ ?>

                                    <!-- Projects Details -->
                                 <div class="col-sm-3">
                                    <div class="col-sm-12" style="border:0px solid #CDCDCD;height: 25vh;margin-top: 5vh;border-radius: 3vh;padding: 0px;margin-right:3vh;height: inherit;/*width: 157px">
                                 <div style="width: 5vh;background:grey;">
                                    <i class="fa fa-undo " aria-hidden="true" style="background-color: #424242;
    color: #ffffff;
    border-radius: 6vh;
    font-size: 19px;
    font-weight: 100;
    position: absolute;
    z-index: 100;
    /*top: 15px;*/
    padding-top: 3px;
    width: 25px;
    /*left: -10px;*/
    -webkit-text-stroke: 2px #424242;
    height: 25px;" onclick="undo_archieve(<?=$row_project_details->project_id ?>)"></i> 

                                 </div>
                               <div class="bs-example">
                                <div id="myCarousel<?=$row_project_details->id ?>" class="carousel fade" data-ride="carousel">
                                    <!-- Carousel indicators -->
                                    <ol class="carousel-indicators">

                                    <? for($i=0;$i<=3;$i++){ 
                                        $j=$i+1;
                                        $image_col="image_".$j;
                                        if($row_project_details->$image_col !="")
                                        {

                                        ?>
                                        <li data-target="#myCarousel<?= "$row_project_details->id"?>" data-slide-to="<?=$i?>" <?if($i==0) echo"class='active'";?>></li>
                                        <? } ?>
                                        <!-- <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>  -->

                                    <? } ?>    
                                    </ol>   
                                    <!-- Wrapper for carousel items -->
                                    <div class="carousel-inner" onclick="window.location.href='site_management_plan.php'" style="cursor: pointer;">
                                    <? for($i=0;$i<=3;$i++){ 
                                        $j=$i+1;
                                        $image_col="image_".$j;
                                        if($row_project_details->$image_col !="")
                                        {

                                        ?>
                                        <div class="item <?if(!$i) echo "active" ?>" style="">
                                        <?if($row_project_details->is_archieved==1) echo "<div class='overlay'>
                                        </div>"; ?>
                                            <img src="temp_uploads/<?=$row_project_details->$image_col?>" alt="First Slide" id="<?=$row_project_details->project_id ?>" class="img-rounded draggable">

                                        </div>

                                         <? } ?>
                                        <!-- <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>  -->

                                    <? } ?> 
                                      <!--   <div class="item">
                                            <img src="images/project_slide.png" alt="Second Slide">
                                        </div>
                                        <div class="item">
                                            <img src="images/project_slide.png" alt="Third Slide">
                                        </div> -->
                                    </div>
                                    
                                </div>
                            </div>
                             
                            
                        </div>
                         <div class="col-sm-12" style="padding: 20px 0px 10px 0; ">
                                   <p align="left" style="font-size: 3vh;color: #4E4E4E;"><?=$row_project_details->project_name ?></p>
                                   <p align="justify" style="font-size: 1.5vh;color: #767676"><?=$row_project_details->project_scope
                                    ?></p>
                        </div>
                    
                     </div>
                    <!-- Projects Details End -->
                        <? } ?>

                       

                          </div>   


                             <div class="row nomargin" id="content_3">
                                 <? while($row_project_details2= $get_project_details2->fetch_object()){ ?>
                                    <div class="col-sm-6" >
                                        <div class="thumb" >
                                           <div class="col-sm-4"><img src="<?if($row_project_details2->image_1!="") echo "temp_uploads/".$row_project_details2->image_1;

                                                else if($row_project_details2->image_2!="") echo "temp_uploads/".$row_project_details2->image_2;

                                                else if($row_project_details2->image_3!="") echo "temp_uploads/".$row_project_details2->image_3;

                                                 else if($row_project_details2->image_4!="") echo "temp_uploads/".$row_project_details2->image_4;
                                                 else echo "No Image";

                                            ?>" height="48px" width="48px" style="border-radius: 6vh"></div>
                                            <div class="col-sm-8" style="line-height: 50px;"><?=$row_project_details2->project_name ?></div>
                                            <span class="notification hidden-sm hidden-sm">5</span>
                                        </div>
                                    </div>    
                                    <? } ?>
                                    <!-- <div class="col-sm-6" >
                                   <div class="thumb">
                                            <div class="col-sm-4"><img src="images/thumb_4.png" height="48px" width="48px" style="border-radius: 6vh"></div>
                                            <div class="col-sm-8" style="line-height: 50px;">Day light donuts</div>
                                    </div>
                                    </div>
                                    <div class="col-sm-6" >
                                   <div class="thumb">
                                            <div class="col-sm-4"><img src="images/thumb_3.png" height="48px" width="48px" style="border-radius: 6vh"></div>
                                            <div class="col-sm-8" style="line-height: 50px;">Kinfra</div>
                                    </div>
                                    </div>
                                    <div class="col-sm-6" >
                                   <div class="thumb">
                                            <div class="col-sm-4"><img src="images/thumb_9.png" height="48px" width="48px" style="border-radius: 6vh"></div>
                                            <div class="col-sm-8" style="line-height: 50px;">Space X</div>
                                            <span class="notification hidden-sm hidden-sm">2</span>
                                    </div>
                                    </div>
                                    <div class="col-sm-6" >
                                   <div class="thumb">
                                            <div class="col-sm-4"><img src="images/thumb_10.png" height="48px" width="48px" style="border-radius: 6vh"></div>
                                            <div class="col-sm-8" style="line-height: 50px;">NH 47</div>
                                    </div>
                                    </div>
                                    <div class="col-sm-6" >
                                   <div class="thumb">
                                            <div class="col-sm-4"><img src="images/thumb_5.png" height="48px" width="48px" style="border-radius: 6vh"></div>
                                            <div class="col-sm-8" style="line-height: 50px;">Green Stadium</div>
                                    </div>
                                    </div>
                                    <div class="col-sm-6" >
                                        <div class="thumb" >
                                           <div class="col-sm-4"><img src="images/thumb_6.png" height="48px" width="48px" style="border-radius: 6vh"></div>
                                            <div class="col-sm-8" style="line-height: 50px;">Skyline</div>
                                            <span class="notification hidden-sm hidden-sm">12</span>
                                        </div>
                                    </div>    
                              
                                    <div class="col-sm-6" >
                                   <div class="thumb">
                                            <div class="col-sm-4"><img src="images/thumb_8.png" height="48px" width="48px" style="border-radius: 6vh"></div>
                                            <div class="col-sm-8" style="line-height: 50px;">Tata Construction</div>
                                    </div>
                                    </div>
                                    <div class="col-sm-6" >
                                   <div class="thumb">
                                            <div class="col-sm-4"><img src="images/thumb_7.png" height="48px" width="48px" style="border-radius: 6vh"></div>
                                            <div class="col-sm-8" style="line-height: 50px;">Heera</div>
                                            <span class="notification hidden-sm hidden-sm">22</span>
                                    </div>
                                    </div>
                                    <div class="col-sm-6" >
                                   <div class="thumb">
                                            <div class="col-sm-4"><img src="images/thumb_2.png" height="48px" width="48px" style="border-radius: 6vh"></div>
                                            <div class="col-sm-8" style="line-height: 50px;">Infopark</div>
                                            <span class="notification hidden-sm hidden-sm">22</span>
                                    </div>
                                    </div>
                                    <div class="col-sm-6" >
                                   <div class="thumb">
                                            <div class="col-sm-4"><img src="images/thumb_11.png" height="48px" width="48px" style="border-radius: 6vh"></div>
                                            <div class="col-sm-8" style="line-height: 50px;">Costco</div>
                                    </div>
                                    </div> -->
                                    <div class="col-sm-6" >
                                   <div class="thumb" style="background: #F5F5F5">
                                            <div class="col-sm-4">

                                            <button type="button" rel="tooltip" title="Create" class="btn btn-simple btn-xs" style="    top: 4px;
    height: 40px;
    border: 1px solid #CDCDCD;
    position: absolute;
    width: 40px;
    padding: 0px;
    border-radius: 6vh;" onclick="window.location.href='create_home.php'">
                                                        <i class="fa fa-plus fa-1x" style="    color: #CDCDCD;
    -webkit-text-stroke: 1px #f5f5f5;"></i>
                                                    </button>

                                            </div>
                                            <div class="col-sm-8" style="line-height: 50px;color: #A7A7A7;font-family: 'Helvetica_nue';">Create New Homepage</div>
                                    </div>
                                    </div>

                                
                            </div>
                                <!-- <div id="chartHours" class="ct-chart"></div> -->

                                <div class="footer">
                                    <div class="legend">
                                        <!-- <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Click
                                        <i class="fa fa-circle text-warning"></i> Click Second Time -->
                                    </div>
                                    <!-- <hr> -->
                                   <!--  <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div> -->
                                </div>
                            </div>
                        </div>





                    </div>
                </div>



               <!--  <div class="row"> -->
                    <!-- <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">2014 Sales</h4>
                                <p class="category">All products including Taxes</p>
                            </div>
                            <div class="content">
                                <div id="chartActivity" class="ct-chart"></div>

                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Tesla Model S
                                        <i class="fa fa-circle text-danger"></i> BMW 5 Series
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> Data information certified
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                   <!--  <div class="col-md-6">
                        <div class="card "> -->
                            <!-- <div class="header">
                                <h4 class="title">Tasks</h4>
                                <p class="category">Backend development</p>
                            </div> -->
                            <!-- <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox">
                                                    </label>
                                                </td>
                                                <td>Sign contract for "What are conference organizers afraid of?"</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox" checked="">
                                                    </label>
                                                </td>
                                                <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox" checked="">
                                                    </label>
                                                </td>
                                                <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox">
                                                    </label>
                                                </td>
                                                <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox">
                                                    </label>
                                                </td>
                                                <td>Read "Following makes Medium better"</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox">
                                                    </label>
                                                </td>
                                                <td>Unfollow 5 enemies from twitter</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
 -->
                                <!-- <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div> -->
                           <!--  </div>
                        </div>
                    </div> -->
                <!-- </div> -->
            <!-- </div>
        </div> -->


        <!-- <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer> -->

    </div>
</div>

</div>
</body>

   

</html>


<style>
/* .slider {
  width: 1200px;
  margin: 0 auto;
  position: relative
}

.slider:hover .slider-btn {
  color: #fff;
  text-shadow: 0 0 5px #666
}

.slider .slider-img {
  width: 12000px;
  position: relative
}

.slider .slider-img .slider-img-ul {
  position: absolute;
  left: 0;
  top: 0;
  overflow: hidden
}

.slider .slider-img .slider-img-ul li { float: left }

.slider .slider-img .slider-img-ul li img {
  width: 1200px;
  height: 460px
}

.slider .slider-dot ul {
  position: absolute;
  right: 50px;
  bottom: 30px
}

.slider .slider-dot ul li {
  cursor: pointer;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: #ccc;
  border: 2px solid #fff;
  float: left;
  margin-left: 10px
}

.slider .slider-dot ul li.active, .slider .slider-dot ul li:hover { background: #fff }

.slider .slider-btn {
  position: absolute;
  width: 50px;
  height: 100px;
  top: 50%;
  line-height: 100px;
  text-align: center;
  color: #fff;
  font-size: 28px;
  text-decoration: none;
  color: rgba(255,255,255,0)
}

.slider .slider-btn:hover { background: rgba(125,125,125,.3) }

.slider .slider-btn.slider-btn-left {
  left: 0;
  margin-top: -50px
}

.slider .slider-btn.slider-btn-right {
  right: 0;
  margin-top: -50px
}
*/
.carousel{
   
    margin-top: 0px;
}
.carousel .item{
    height: 174px; /* Prevent carousel from being distorted if for some reason image doesn't load */
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
    bottom: -24px;
}
.carousel-indicators li {
background-color: #D8D8D8;
    }

    .carousel-indicators .active {
   
    background-color: #888888;
}
.carousel-inner>.item>img{
height: 100%;
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
 /*   .bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: #C9C9C9;
}*/
.nomargin
{
    margin: 0px;
}
@media (min-width: 768px)
{
.col-sm-offset-2 {
    margin-left: 19.666667%;
}
}
.thumb
{
    height:50px;width: 70%;
   margin-top: 20px;
    background: #FFFFFF;
    border:1px solid #E9E9E9;
}
#content_3
{
    /*background: rgba(203, 203, 210, 0.15);*/
}
.thumb .notification
{
    position: absolute;
    background-color: #424242;
    text-align: center;
    border-radius: 10px;
    min-width: 36px;
    padding: 0 5px;
    height: 18px;
    font-size: 12px;
    color: #FFFFFF;
    font-weight: bold;
    line-height: 18px;
        top: 10px;
    /* left: 7px; */
    margin-left: -18px;
}
.img-rounded {
    border-radius: 15px;
    margin-left: 5vw;
}
::-webkit-scrollbar {
    width: 7px;
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

    left: 50%;
    }

    .carousel.fade {
     opacity: 1;
}
.carousel.fade .item {
    transition: opacity ease-out .7s;
    left: 0;
    opacity: 0; /* hide all slides */
    top: 0;
    position: absolute;
    width: 100%;
    display: block;
}
.carousel.fade .item:first-child {
    top: auto;
    opacity: 1; /* show first slide */
    position: relative;
}
.carousel.fade .item.active {
    opacity: 1;
}

.overlay{
  position: absolute;
  top: 0px;
      border-radius: 2vh;
  left: 0px;
  height: 100%;
  width: 100%;
 
  opacity: 0.5;


background: -moz-linear-gradient(90deg, rgba(255,5,34,1) 0%, rgba(255,42,18,1) 32%, rgba(252,41,17,1) 33%, rgba(149,38,12,0) 79%, rgba(102,38,11,0) 100%); /* ff3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(102,38,11,0)), color-stop(21%, rgba(149,38,12,0)), color-stop(67%, rgba(252,41,17,1)), color-stop(68%, rgba(255,42,18,1)), color-stop(100%, rgba(255,5,34,1))); /* safari4+,chrome */
background: -webkit-linear-gradient(90deg, rgba(255,5,34,1) 0%, rgba(255,42,18,1) 32%, rgba(252,41,17,1) 33%, rgba(149,38,12,0) 79%, rgba(102,38,11,0) 100%); /* safari5.1+,chrome10+ */
background: -o-linear-gradient(90deg, rgba(255,5,34,1) 0%, rgba(255,42,18,1) 32%, rgba(252,41,17,1) 33%, rgba(149,38,12,0) 79%, rgba(102,38,11,0) 100%); /* opera 11.10+ */
background: -ms-linear-gradient(90deg, rgba(255,5,34,1) 0%, rgba(255,42,18,1) 32%, rgba(252,41,17,1) 33%, rgba(149,38,12,0) 79%, rgba(102,38,11,0) 100%); /* ie10+ */
background: linear-gradient(0deg, rgba(255,5,34,1) 0%, rgba(255,42,18,1) 32%, rgba(252,41,17,1) 33%, rgba(149,38,12,0) 79%, rgba(102,38,11,0) 100%); /* w3c */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#66260B', endColorstr='#FF0522',GradientType=0 ); /* ie6-9 */
}
.item{
  position: relative;
}


/*.item:nth-child(1) {    background-color: red;}.item:nth-child(2) {    background: rgba(23, 23, 23, 0.7);}.item:nth-child(3) {    background: rgba(23, 23, 23, 0.7);}.item:nth-child(4) {    background: rgba(23, 23, 23, 0.7);}*/
</style>
<script>
$('.carousel').carousel({
  interval: 10000000
});

 function show_thumbnail()
 {
    $("#content_1").show();
    $("#content_2").show();
    $("#content_3").hide();
    $('#thumb_view').css("opacity", "1");
    $('#list_view').css("opacity", "0.2");
}
function show_list()
{
    $("#content_1").hide();
    $("#content_2").hide();
    $("#content_3").show();
    $('#list_view').css("opacity", "1");
    $('#thumb_view').css("opacity", "0.2");


}

$(document).ready(function(){
    $("#content_1").show();
    $("#content_2").show();
    $("#content_3").hide();


    });
</script>




<!-- <script>
$(document).ready(function() {
    $('.draggable').on('dragstart', function(e){
       source_id = $(this).attr('id');
       // isarchieved = $(this).attr('alt');
        // var isarchievedvar =  document.getElementById("isarchieved").value;

        // document.getElementByID(getarchived).innerhtml = source_id;

       e.originalEvent.dataTransfer.setData("source_id", source_id); 
    });
    
    $("#cart-item").on('dragenter', function (e){
        e.preventDefault();
        $(this).css('background', '#DF5430');
    });

    $("#cart-item").on('dragover', function (e){
        e.preventDefault();
        // document.getElementById("getarchived").style.backgroundColor="red";
                // $(this).css('background', '');

    });

    $("#cart-item").on('drop', function (e){
               // var source_id = $(this).attr('id');

      
                //  alert(source_id);
                // document.getElementById("getarchived").innerHTML = source_id;
                e.preventDefault();
                $(this).css('background', '#404040');
                // $(this).css('color', '#FAFAFA');
                // $(".alarchived").css('color', '#FAFAFA');
                // $( "#" + source_id ).addClass( "selectDisable" );
             
                $.ajax({

                                    url: 'archived.php',
                                        // dataType: "text",
                                    type: "POST",
                                    // data: data,
                                    data: {source_id:source_id},    
                                    success: function (data) {
                                        
                                        alert(data);
                                        location.reload();
                                        // window.location.href = '';
                                        },
                                    error: function (jqXHR, responseText, textStatus) {
                                        
                                        alert("not done");
                                        alert(jqXHR.responseText);
                                        
                                        // window.location.href = '';
                                    }
                                    });

                           
    });
});
</script>
 -->
<script>
    
    function undo_archieve(id)
    {
         $.ajax({

                                    url: 'ajax_archive_undo.php',
                                        // dataType: "text",
                                    type: "POST",
                                    // data: data,
                                    data: {source_id:id},    
                                    success: function (data) {
                                        
                                        alert(data);
                                        location.reload();
                                        // window.location.href = '';
                                        },
                                    error: function (jqXHR, responseText, textStatus) {
                                        
                                        alert("not done");
                                        alert(jqXHR.responseText);
                                        
                                        // window.location.href = '';
                                    }
                                    });
    }
</script>