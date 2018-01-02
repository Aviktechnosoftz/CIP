<?php
error_reporting(0);
session_start();
include_once('connect.php');

if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}
$project_name_query=$conn->query("select tbl_project.id as project_id,project_name as name,number from tbl_project_register left join tbl_project on tbl_project_register.project_id = tbl_project.id where tbl_project.id='".$_SESSION['admin']."'  group by project_id")->fetch_object();

?>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script> 
<script src="js/sidebar/js/sidebar.js"></script>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
 <!--    <script type="text/javascript" src="js/upload.js" ></script> -->


<div id="sidebar" data-position="left">
 
  
  <div class="contents">
      <div class="container-3">
   
      <input type="text" id="search" placeholder="Search topic" />
      <div  id= "safari" style="        /* border: 1px solid white; */
    height: 3vw;
    width: 2vw;
    /* margin-left: 1.5vw; */
    position: relative;
    left: 2vw;
    top: 1vw;">
      <span class=""><i class="fa fa-search" style="color: #4f5b66;
    "></i></span>
    </div>
      </div>

    <div class="content show" id="contents_show" data-content="content1">
      
      <p style="text-align: center;font-size: 2vh"> HOME PAGE </p>
      <h3 style="text-align: center; margin-top: -1vh;font-size: 3vh;"> <? echo $project_name_query->name ?> </h3>
    </div>
    
  </div>
</div>

<style type="text/css">
 #sidebar {
 position: initial;

 width: 24vw;

   
  background-color: #303030;
}


#sidebar[data-position="right"] { right: -350px; }

#sidebar[data-position="right"].open {
  -webkit-transform: translate3d(-350px, 0, 0);
  transform: translate3d(-350px, 0, 0);
}

#sidebar[data-position="right"] .icons { float: left; }

#sidebar .icons {
  width: 12%;
  float: left;
}

#sidebar .icons .icon {
  background-color: #ECF0F1;
  margin-bottom: 5px;
}

#sidebar .icons .icon:hover { background-color: #61B2A0; }

#sidebar .icons .icon:last-child { margin-bottom: 0px; }

#sidebar .icons .icon.active { background-color: #61B2A0; }

#sidebar .icons .icon span {
  margin: 0.34em;
  color: white;
  font-size: 1.5em;
}

#sidebar .icons .icon img {
  width: 40px;
  margin: 5px;
}

#sidebar .contents {
        width: 46vh;
     height: 82vh;
  float: left;
  background-color: #303030;
  overflow-y: auto;
  overflow-x: hidden;
}

#sidebar .contents .content {
  /*padding: 5px 25px 25px 25px;*/
  color: #8F9294;
}

#sidebar .contents .content.hide { display: none; }

#sidebar .contents .content.show { display: block; }

#sidebar .contents .content h3 { color: #8F9294; }

#sidebar .contents .content ul {
  list-style-type: none;
  padding: 0;
  margin-top: 10px;
}

#sidebar .contents .content ul li { margin-bottom: 15px; }

#sidebar .contents .content ul li:last-child { margin-bottom: 0px; }

#sidebar .contents .content img { max-width: 100%; }

#contents_show
{
  margin: 75% 0% 0% 0%;
}
.container-3{
 /* width: 300px;
  vertical-align: middle;
  white-space: nowrap;
  position: relative;*/
}
 
.container-3 input#search{
            height: 3vw;
    width: 24vw;
    /* padding-top: 2vh; */
    position: absolute;
    background: #404041;
    border: none;
    font-size: 2vh;
    float: left;
    color: #262626;
    padding-left: 7vh;
    /* -webkit-border-radius: 5px; */
    -moz-border-radius: 5px;
    /* border-radius: 5px; */
    color: #fff;
    outline: none;
      
}

.container-3 input#search::-webkit-input-placeholder {
   color: #646464;
   font-size: 2vh;
}
 
.container-3 input#search:-moz-placeholder { /* Firefox 18- */
   color: #646464;  
   font-size: 2vh;
}
 
.container-3 input#search::-moz-placeholder {  /* Firefox 19+ */
   color: #646464; 
   font-size: 2vh; 
}
 
.container-3 input#search:-ms-input-placeholder {  
   color: #646464;  
   font-size: 2vh;
}
.container-3 .icon{
         position: absolute;
    /* top: 50%; */
       margin-left: 4vh;
    margin-top: 1vw;
    z-index: 1;
    color: #4f5b66;
    /*-webkit-transition: all .55s ease;
    -moz-transition: all .55s ease;
    -ms-transition: all .55s ease;
    -o-transition: all .55s ease;
    transition: all .55s ease;*/
}
}
.container-3 input#search:focus, .container-3 input#search:active{
    outline:none; 
}
 
.container-3:hover .icon{
  /*margin-top: 16px;
  color: #93a2ad;*/
 
  /*-webkit-transform:scale(1.5); 
  -moz-transform:scale(1.5); 
  -ms-transform:scale(1.5); 
  -o-transform:scale(1.5); 
   transform:scale(1.5);*/
  }

p {
    margin: 0 0 2vh;
}


.fa {    display: inline-block;position: absolute;    font: normal normal normal 2vh/1 FontAwesome;        font-size: 2vh;    text-rendering: auto;    -webkit-font-smoothing: antialiased;    -moz-osx-font-smoothing: grayscale;}






</style>
