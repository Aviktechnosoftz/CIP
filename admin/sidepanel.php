<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>CIP-Admin Panel</title>
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script> 
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
            <a href="dashboard.php" class="simple-text" style="margin-top: 0px;">ADMINISTRATOR</a>
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
                    <a href="" data-toggle="modal" data-target="#safetyPolicyModal" style="outline: none;">
                        <i><img src="images/icon_7.png" style="    height: 3vh;"></i>
                        <p>Safety</p>
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
                        <p>Archived</p>
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
     <!-- Modal -->
        <div id="safetyPolicyModal" class="modal fade" role="dialog">
          <div class="modal-dialog" style="width:30%;margin-top: 188px;">
          <!-- Modal content-->
            <div class="modal-content" style="background-color: #404040;">
              <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal" style="color: #fff;font-size: 40px;outline: none;">&times;</button>
              </div>
              <div class="modal-body" style="height: 30vh;">
                <div>
                  <div style="background-image: url('policies.png');cursor: pointer;width: 40%; float: left; text-align: center;background-repeat: no-repeat; background-size: 100%;height: 225px;margin-left: 19px;margin-top: 23px;" onclick="window.location ='upload_policy.php'"></div>
                  <div style="background-image: url('images/Future_heading.png');cursor: pointer;width: 40%; float: left; text-align: center;background-repeat: no-repeat; background-size: 100%;height: 225px;margin-top: 17px;    margin-left: 35px;"></div>
                </div>
              </div>
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
              <li>
                <a href=""><i class="fa fa-search"></i>
                  <p class="hidden-lg hidden-md">Search</p>
                </a>
                <!-- <input type="text" name=""> -->
              </li>
            </ul>
            <ul class="nav navbar-nav navbar middle col-xs-9">
              <input type="text" name="" class="form-control" data-role="tagsinput" value="In progress,Tags,technopark,Phase3" style="background: #F0F0F0;">
            </ul>
            <ul class="nav navbar-nav navbar-right col-xs-2">
              <li class="separator hidden-lg hidden-md"></li>
            </ul>
          </div>
        </div>
      </nav>
  



    <style>
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
    </style>