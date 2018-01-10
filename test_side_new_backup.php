<? 
session_start();
$_SESSION['menu'] = $_POST['text1'];
print_r($_SESSION['menu']);


$get_sub_menu= $conn->query("Select * from sub_menu where parent_id=(Select id from parent_menu where name='".$_SESSION['menu']."')");


?>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="js/sidebar/js/sidebar.js"></script>

<div id="sidebar" data-position="left">
 <div style="  "> 

  <div class="container-3">
   
      <input type="search" id="search" placeholder="Search topic" />
      <div style="        /* border: 1px solid white; */
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

    </div>
  <div class="icons" style="display: none">



    <div class="icon" data-content="content1"> 
      <img src="image/site2.png"> 
    </div>

    <div class="icon" data-content="content2"> 
      <img src="image/ceiling2.png"> 
    </div>
    <div class="icon" data-content="content3"> 
      <img src="image/visitor.png"> 
    </div>
  </div>

  <div class="contents">
  
  <div class="contents">
    <div class="content show" id="contents_show" data-content="content1">
      
      <!-- <p style="text-align: center;font-size: 14px;font-weight: bold;color: white"> Site Induction</p> -->
      <center>
            

      <div style="text-align: left;width: 100%;    padding-top: 3%;
    padding-bottom: 1%;" class="sub_content">

      <div class="icon" data-content="content1" style="    float: left;"> 
      <img src="image/site2.png" style=" width: 4vh;"> 
      </div>
      <h4 style="color:white;font-size: 2.5vh;    margin-top: 0vh;
    margin-bottom: 0px;  
    padding-top: 1vh;
    padding-bottom: 1vh;
        /*border-bottom: 0.2vh solid #4E4C4C;*/
    width: 50%;
    margin-left: 22%;


    " >Site Induction </h4>
        <div class="h-divider" style="margin-bottom: 0px;
    /* height: 1vh; */
    width: 75%;
    border-top: 0.2vh solid #4E4C4C;
    margin-left: 6vw;"></div>


    </div>
    </center>


      <ul class="list">
        <li><a  style="color: white;text-decoration: none;" href="site_induction_form_new.php"> New Site Induction Form</a></li>
         <li><a  style="color: white;text-decoration: none;" href="approved_forms.php"> Approved Site Induction Form</a></li>
         <li><a  style="color: white;text-decoration: none;" href="site_induction_email_request.php"> Site Induction Email Request</a></li>
          <li><a  style="color: white;text-decoration: none;" href=""> Site Induction Video</a></li>

         

      </ul>
    </div>
    <div class="content show" id="contents_show" data-content="content2">
      
      <!-- <p style="text-align: center;font-size: 14px;font-weight: bold;color: white"> Site Induction</p> -->
      


<center>
            

      <div style="text-align: left;width: 100%;    padding-top: 3%;
    padding-bottom: 1%;" class="sub_content">

      <div class="icon" data-content="content2" style="    float: left;"> 
      <img src="image/ceiling2.png" style=" width: 3vh;"> 
      </div>
      <h4 style="color:white;font-size: 2.5vh;    margin-top: 0vh;
    margin-bottom: 0px;  
    padding-top: 1vh;
    padding-bottom: 1vh;
        /*border-bottom: 0.2vh solid #4E4C4C;*/
    width: 50%;
    margin-left: 22%;


    " >Ceiling Induction</h4>
        <div class="h-divider" style="margin-bottom: 0px;
    /* height: 1vh; */
    width: 75%;
    border-top: 0.2vh solid #4E4C4C;
    margin-left: 6vw;"></div>


    </div>
    </center>

       
      <ul class="list">
        <li><a  style="color: white;text-decoration: none;" href="visitor_induction_blank_demo.php"> New Ceiling Induction Form</a></li>
         <li><a  style="color: white;text-decoration: none;" href=""> Approved Ceiling Induction Form</a></li>
          <li><a  style="color: white;text-decoration: none;" href=""> Ceiling Induction Video</a></li>

      </ul>
    </div>



    <div class="content show" id="contents_show" data-content="content3">
      
      <!-- <p style="text-align: center;font-size: 14px;font-weight: bold;color: white"> Site Induction</p> -->
         <center>
            

      <div style="text-align: left;width: 100%;    padding-top: 3%;
    padding-bottom: 1%;" class="sub_content">

      <div class="icon" data-content="content3" style="    float: left;"> 
      <img src="image/visitor.png" style=" width: 3vh;"> 
      </div>
      <h4 style="color:white;font-size: 2.5vh;    margin-top: 0vh;
    margin-bottom: 0px;  
    padding-top: 1vh;
    padding-bottom: 1vh;
        /*border-bottom: 0.2vh solid #4E4C4C;*/
    width: 50%;
    margin-left: 22%;


    " >Visitor Induction</h4>
        <div class="h-divider" style="margin-bottom: 0px;
    /* height: 1vh; */
    width: 75%;
    border-top: 0.2vh solid #4E4C4C;
    margin-left: 6vw;"></div>


    </div>
    </center>


      <ul class="list">
        <li><a  style="color: white;text-decoration: none;" href="visitor_induction_blank.php"> New Visitor Induction Form</a></li>
         <li><a  style="color: white;text-decoration: none;" href="visitor_induction.php"> Approved Visitor Induction Form</a></li>
         <li><a  style="color: white;text-decoration: none;" href="visitor_induction_out.php"> Sign Out Email Request</a></li>

      </ul>
    </div>

  </div>
 
</div>

<style type="text/css">
  #sidebar {
    position: fixed;
    top: 13.7vh;
    /* width: 27.4%; */
    width: 27vw;
   /* height: 100%;*/
    background-color: #303030;
        max-height: 80%;
        min-height: 86%;
        overflow-y: auto;
        overflow-x: hidden;
    /* min-height: 100%; */
}

#sidebar[data-position="right"] { right: -350px; }

#sidebar[data-position="right"].open {
  -webkit-transform: translate3d(-350px, 0, 0);
  transform: translate3d(-350px, 0, 0);
}

#sidebar[data-position="right"] .icons { float: left; }

#sidebar .icons {
 width: 17%;
  float: left;
}

#sidebar .icons .icon {
  background-color: #303030;
  margin-bottom: 3vh;
  padding-top: 3vh;

}

#sidebar .icons .icon:hover { 
    /*border-left: medium solid #DF5430;*/
    /*background: #363636;*/


  }
 

#sidebar .icons .icon:last-child { margin-bottom: 0px; }

#sidebar .icons .icon.active { 
    border-left: medium solid #DF5430;}

#sidebar .icons .icon span {
  margin: 0.34em;
  color: white;
  font-size: 1.5em;
}


#sidebar .icons .icon img {
        width: 3.5vh;
    height: 3.5vh;
    margin: 2vh;
}

#sidebar .contents {
     width: 100%;
     height: 100%;
  float: left;
  background-color: #303030;
  overflow-y: hidden;
  overflow-x: hidden;
}

#sidebar .contents .content {
      padding: 1vh 0 1vw 0;
  color: #8F9294;
  /*width: 27vw;*/
}

#sidebar .contents .content.hide { display: none; height: 100%;}

#sidebar .contents .content.show { display: block; font-size: 2vh}

#sidebar .contents .content h3 { color: #8F9294; }

#sidebar .contents .content ul {
  list-style-type: none;
  padding: 0;
  margin-top: 0px;

    font-size: 2.2vh;
}

#sidebar .contents .content ul li { margin-bottom: 1vh;     padding-bottom: 3vh;
    /*border-bottom: 0.2vh solid #4E4C4C;*/
    padding-top: 3vh;

    padding-left: 15%;
}

/*#sidebar .contents .content ul li:last-child { margin-bottom: 1vh;     padding-bottom: 2vh;

    padding-top: 3vh;
    border:none;
}*/

#sidebar .contents .content ul li:last-child { margin-bottom: 0px; }

#sidebar .contents .content img { max-width: 100%; }

/*#contents_show
{
  margin: 40vh 6vw 10vh;
}*/

.list {
    list-style:none;
    margin-left: 15%;
    text-decoration: none;
    color: white;
    /*width: 13vw;*/
}​
.container-3{
 /* width: 300px;
  vertical-align: middle;
  white-space: nowrap;
  position: relative;*/
}
 
.container-3 input#search{
            height: 3vw;
    width: 27vw;
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
        border-radius: 0px;
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
.icon
{
  margin-left: 2vh;
}


.fa {    display: inline-block;position: absolute;    font: normal normal normal 2vh/1 FontAwesome;        font-size: 2vh;    text-rendering: auto;    -webkit-font-smoothing: antialiased;    -moz-osx-font-smoothing: grayscale;}

#contents_show > center
{
cursor: pointer;
}
</style>

<script>
  $( document ).ready(function() {
    console.log( "ready!" );
});


//   $(function() {
//   $('#sidebar > .contents > .contents > #contents_show').on('click',function() {
//     // $('#sidebar > .contents').css('background-color', '#363636');
//           $(this).find('center').css('background-color', '#303030');
//        $(this).find('center').css('background-color', '#363636');
//         // $('#sidebar >.icons > .icon').css('background-color', '#303030');
//         // $(this).css('background-color', '#363636');
//   // }, function() {
//   //   // on mouseout, reset the background colour
//   //   $('#sidebar > .contents').css('background-color', '#303030');
//   //   $('#sidebar > .contents > .contents').css('background-color', '#303030');
//   // });
// });
//   });


  $('#sidebar > .contents > .contents > #contents_show').on('click', function(event) {
        //if ($sidebar.visible) {
            $('.content').find('center').css('background-color', '#303030');
            $('.content').find('.list').css('background-color', '#303030');
            $('.content').find('center > .sub_content').css('border-left', 'none');
            
            $(this).find('center').css('background-color', '#363636');
            $(this).find('.list').css('background-color', '#363636');
            $(this).find('center > .sub_content').css('border-left', 'medium solid #DF5430');
            // border-left: medium solid #DF5430;
            // $('#sidebar > .contents > .contents > .content show active').find('center').css('background-color', 'none');
        
        //}
        //if (event.type === 'touchstart') {
           // $sidebar.mouseenter(event);
       // }
    });
</script>

