<?php
//error_reporting(1);
// include('site_safety.php');
//error_reporting(0);
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
// print_r($_SESSION);
$project_name_query=$conn->query("select tbl_project.id as project_id,project_name as name,number from tbl_project_register left join tbl_project on tbl_project_register.project_id = tbl_project.id where tbl_project.id='".$_SESSION['admin']."'  group by project_id")->fetch_object();

$get_project_details=$conn->query("select * from tbl_project_detail where project_id='".$_SESSION['admin']."'")->fetch_object();
$get_policy=$conn->query("select * from tbl_policy where id='1'")->fetch_object();
// print_r($_SESSION);
// $home=true;

$Map_ID=$conn->query("select MAX(ID)+1 as map_id from tbl_intenal_traffic_map where project_id='".$_SESSION['admin']."'")->fetch_object(); 

$map=$Map_ID->map_id;

if($map === NULL) {$map='1'	;}

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.7.22/fabric.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script type="text/javascript" src="https://fastcdn.org/FileSaver.js/1.1.20151003/FileSaver.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/javascript-canvas-to-blob/3.14.0/js/canvas-to-blob.min.js"></script>
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

<? include('header.php'); ?>
</div>
 <div class="" style="padding-left: 0 !important;">
   
  </div>
 <div class="" style="height: 100%;
    margin-left: 28.5%;
    width: 71.5%;
    position: absolute;
    top: 16vh;
    background-color: #F2F2F6;"> 
<div class=" col-md-12 col-sm-12 canvasbackground" style="padding-right: 0px; padding-left: 0px">
<div class="container-fluid" id="canvas-container" style="padding-left: 0 !important;background-color: #F2F2F6;padding: 0px;">
<!-- <div class="col-md-12 col-sm-12 col-xs-12" > -->  
  <div class="col-xs-9 col-md-9 col-lg-9 col-sm-9" style="background-color: #F2F2F6; height: 100%;padding: 0px;">
<!-- <iframe id="iframe_a" src="https://docs.google.com/gview?url=http://cipropertyapp.com/API/Uploads/Internal_plan.pdf&embedded=true" style="height: 81vh;
    width: 75%;" frameborder="0"></iframe> -->

   <!--  <iframe src=""></iframe>     -->
  <canvas id="canvas" >
      
    </canvas>  
   </div>
   <div class="col-xs-3 col-md-3 col-lg-3 col-sm-3" style="background-color: #F2F2F6;padding:0px;">
    <ul class="list-unstyled" style="margin-top:10px;padding:0px;">
      <div class="col-md-12 col-sm-12" style="padding: 0px;">
      <div class="col-md-6 col-sm-6" style="">
          <button id="drawing-mode" class="btn btn-info drawing_btn ">Free Draw</button>&nbsp;
      </div>
      <div class="col-md-6 col-sm-6" style="padding: 0px;">
           <button id="other_btn" class="btn btn-info" >Lines Draw</button>
      </div>
    </div>
    <div class="col-md-12 col-sm-12" style="top: 35vh;box-shadow: 0 0 5px 1px black; border: 2px solid transparent;width: 70%;margin-left: 35px;">
      <div class=" col-md-12" style="font-size: 25px;text-align-last: center; ">
         <a href="javascript:undo();" style="margin-right: 15px;" title="Undo"><i class="fa fa-undo" aria-hidden="true"></i></a>
         <a href="javascript:redo();" title="Redo"><i class="fa fa-repeat" aria-hidden="true"></i></a>
    </div>
    </div>
          <div class="col-md-12" style="display: none;float: left; width: 100%;padding-top: 20px;" id="drawing-mode-options">
            <label for="drawing-mode-selector" style="padding: 0px;">Mode:</label>
            <select id="drawing-mode-selector" style="color: rgb(0, 0, 0);background-color: rgb(228, 228, 228);margin-left: 10px;width: 70%;border-radius: 2vh;outline: none; text-align-last: center;">
              <option>Pencil</option>
              <option>Circle</option>
              <option>Spray</option>
              <option>Pattern</option>

              <option>hline</option>
              <option>vline</option>
              <option>square</option>
              <option>diamond</option>
              <option>texture</option>
            </select><br>
            <label for="drawing-line-width" style="padding: 0px;">Line width:</label>
            <input type="range" value="30" min="0" max="150" id="drawing-line-width"><br>
            <label for="drawing-color" style="padding: 0px;">Line color:</label>
            <input type="color" value="#005E7A" id="drawing-color"><br>
            <label for="drawing-shadow-width" style="padding: 0px;">Line shadow width:</label>
            <input type="range" value="0" min="0" max="50" id="drawing-shadow-width"><br>
            

 
          </div>

         <!--  <div class=" col-md-12" style="margin-top:5px;font-size: 25px;">
<a href="javascript:undo();" style="margin-right: 15px;" title="Undo"><i class="fa fa-undo" aria-hidden="true"></i></a>
  <a href="javascript:redo();" title="Redo"><i class="fa fa-repeat" aria-hidden="true"></i></a>
    </div>  -->
          <div id="other" style="display: none;">
           <div class="col-md-12 col-sm-12" style=" margin-top:5%;padding: 0px;">  
            <!-- <h3>Select from dropdown</h3> -->
  <div class="col-md-12 col-sm-12" style="padding-bottom: 10px"> 
  <label for="" style="padding: 0px;">Line Type:</label>         
  <select name="" id="linetype" style="color: rgb(0, 0, 0); background-color: rgb(228, 228, 228); width: 100%; border-radius: 2vh; outline: none;
    text-align-last: center;">
  <option value="dashed">Dashed</option>
  <option value="straight">Straight</option>
</select></div>

<div class="col-md-12 col-sm-12" style="">
  <label for="" style="padding: 0px;">Line Color:</label>
<select name="" id="linecolor" style="color: rgb(0, 0, 0); background-color: rgb(228, 228, 228); width: 100%; border-radius: 2vh; outline: none;
    text-align-last: center;">
  <option value="red" style="color: red">Red</option>
  <option value="blue" style="color: blue">Blue</option>
   <option value="black" style="color: black">Black</option>
  <option value="yellow" style="color: #DFDF36;">Yellow</option>
  <option value="green" style="color: green">Green</option>
</select></div>
<!-- <div class=" col-md-12" style="margin-top:15px;font-size: 25px;    margin-left: 15px;">
<a href="javascript:undo();" style="margin-right: 15px;" title="Undo"><i class="fa fa-undo" aria-hidden="true"></i></a>
  <a href="javascript:redo();" title="Redo"><i class="fa fa-repeat" aria-hidden="true"></i></a>
    </div> -->      </div>
        </ul>
   </div>
 <!--  </div> -->
  </div>

  
  <div class="col-sm-12 col-md-12" id="images" style="height: 10%; margin-top: 8px;margin-bottom: 8px;box-shadow: 0 0 5px 1px black;
    border: 5px solid transparent;background-color: #F2F2F6;">
    <div class="col-sm-1 col-md-1" style="margin-right: 5px; "><img style="height: 8vh;" draggable="true" src="map_images/1.png"   crossOrigin="Anonymous"></img></div>
    <div class="col-sm-1 col-md-1" style="margin-right: 5px; "><img style="height: 8vh;" draggable="true" src="map_images/2.png"   crossOrigin="Anonymous"></img></div>
    <div class="col-sm-1 col-md-1" style="margin-right: 5px;"><img style="height: 8vh;" draggable="true" src="map_images/3.png"   crossOrigin="Anonymous"></img></div>
    <div class="col-sm-1 col-md-1" style="margin-right: 5px; "><img style="height: 8vh;" draggable="true" src="map_images/4.png"   crossOrigin="Anonymous"></img></div>
    <div class="col-sm-1 col-md-1" style="margin-right: 5px; "><img style="height: 8vh;" draggable="true" src="map_images/5.png"   crossOrigin="Anonymous"></img></div>
    <div class="col-sm-1 col-md-1" style="margin-right: 5px; "><img style="height: 8vh;" draggable="true" src="map_images/6.png"   crossOrigin="Anonymous"></img></div>
    <div class="col-sm-2 col-md-2" style="float: right;padding: 10px;"><button class=" btn btn-info" id="b" type="button" style="background-color:#5bc0de !important;outline: none;border: none;">Save as Image</button></div>

</div>
 <div class="col-sm-12 col-md-12" id="margin_set" style="margin-bottom: 5px;padding-left: 0px; padding-right: 0px; width: 104%;margin-left: -15px;"> 
 <? include("Checklist_visit_footer/footer_new.php"); ?></div></div></div>
</body>

<!-- <script type="text/javascript"> 
    $('#margin_set').css($(window).height());
  </script> -->

<!-- test canvas 3 script and css -->
<script type="text/javascript">
  /* Drag and Drop code adapted from http://www.html5rocks.com/en/tutorials/dnd/basics/ */

var canvas = new fabric.Canvas('canvas');
canvas.setHeight(360);
canvas.setWidth(700);

canvas.setBackgroundImage('map_images/rsz_new.png', canvas.renderAll.bind(canvas), {
    backgroundImageOpacity: 0.5,
   backgroundImageStretch: false
});
/* 
NOTE: the start and end handlers are events for the <img> elements; the rest are bound to 
the canvas container.
*/
canvas.on('object:modified',function(){
  if(!isRedoing){
    h = [];
  }
  isRedoing = false;
});

var isRedoing = false;
var h = [];
function undo(){
  if(canvas._objects.length>0){
   h.push(canvas._objects.pop());
   canvas.renderAll();
  }
}
function redo(){
  
  if(h.length>0){
    isRedoing = true;
   canvas.add(h.pop());
  }
}
function handleDragStart(e) {
    [].forEach.call(images, function (img) {
        img.classList.remove('img_dragging');
    });
    this.classList.add('img_dragging');
}

function handleDragOver(e) {
  if(even == true)
 $('#other_btn').click();
   // even=true;
    if (e.preventDefault) {
        e.preventDefault(); // Necessary. Allows us to drop.
    }

    e.dataTransfer.dropEffect = 'copy'; // See the section on the DataTransfer object.
    // NOTE: comment above refers to the article (see top) -natchiketa

    // return false;
}

function handleDragEnter(e) {
    // this / e.target is the current hover target.
    this.classList.add('over');
    canvas.__eventListeners["mouse:down"] = [];
}

function handleDragLeave(e) {
    this.classList.remove('over'); // this / e.target is previous target element.
}

function handleDrop(e) {
    // this / e.target is current target element.

    if (e.stopPropagation) {
        e.stopPropagation(); // stops the browser from redirecting.
    }

    var img = document.querySelector('#images img.img_dragging');

    console.log('event: ', e);

    var newImage = new fabric.Image(img, {
        width: img.width,
        height: img.height,
        // Set the center of the new object based on the event coordinates relative
        // to the canvas container.
        left: e.layerX,
        top: e.layerY
    });
    canvas.add(newImage);

    return false;
}

function handleDragEnd(e) {
    // this/e.target is the source node.
    [].forEach.call(images, function (img) {
        img.classList.remove('img_dragging');
    });
}

if (Modernizr.draganddrop) {
    // Browser supports HTML5 DnD.

    // Bind the event listeners for the image elements
    var images = document.querySelectorAll('#images img');
    [].forEach.call(images, function (img) {
        img.addEventListener('dragstart', handleDragStart, false);
        img.addEventListener('dragend', handleDragEnd, false);
    });
    // Bind the event listeners for the canvas
    var canvasContainer = document.getElementById('canvas-container');
    canvasContainer.addEventListener('dragenter', handleDragEnter, false);
    canvasContainer.addEventListener('dragover', handleDragOver, false);
    canvasContainer.addEventListener('dragleave', handleDragLeave, false);
    canvasContainer.addEventListener('drop', handleDrop, false);
} else {
    // Replace with a fallback to a library solution.
    alert("This browser doesn't support the HTML5 Drag and Drop API.");
}


var drawingModeEl = document.getElementById('drawing-mode'),
      drawingOptionsEl = document.getElementById('drawing-mode-options'),
      drawingColorEl = document.getElementById('drawing-color'),
      drawingLineWidthEl = document.getElementById('drawing-line-width'),
      drawingShadowWidth = document.getElementById('drawing-shadow-width');

  drawingModeEl.onclick = function() {
    canvas.isDrawingMode = !canvas.isDrawingMode;
    if (canvas.isDrawingMode) {
      $('#other_btn').attr('disabled',true);
      drawingModeEl.innerHTML = 'Cancel';
      drawingOptionsEl.style.display = '';
    }
    else {
      $('#other_btn').attr('disabled',false);
      drawingModeEl.innerHTML = 'Free Draw';
      drawingOptionsEl.style.display = 'none';
    }
  };

  // canvas.on('path:created', function() {
  //   updateComplexity();
  // });

  if (fabric.PatternBrush) {
    var vLinePatternBrush = new fabric.PatternBrush(canvas);
    vLinePatternBrush.getPatternSrc = function() {

      var patternCanvas = fabric.document.createElement('canvas');
      patternCanvas.width = patternCanvas.height = 10;
      var ctx = patternCanvas.getContext('2d');

      ctx.strokeStyle = this.color;
      ctx.lineWidth = 5;
      ctx.beginPath();
      ctx.moveTo(0, 5);
      ctx.lineTo(10, 5);
      ctx.closePath();
      ctx.stroke();

      return patternCanvas;
    };

    var hLinePatternBrush = new fabric.PatternBrush(canvas);
    hLinePatternBrush.getPatternSrc = function() {

      var patternCanvas = fabric.document.createElement('canvas');
      patternCanvas.width = patternCanvas.height = 10;
      var ctx = patternCanvas.getContext('2d');

      ctx.strokeStyle = this.color;
      ctx.lineWidth = 5;
      ctx.beginPath();
      ctx.moveTo(5, 0);
      ctx.lineTo(5, 10);
      ctx.closePath();
      ctx.stroke();

      return patternCanvas;
    };

    var squarePatternBrush = new fabric.PatternBrush(canvas);
    squarePatternBrush.getPatternSrc = function() {

      var squareWidth = 10, squareDistance = 2;

      var patternCanvas = fabric.document.createElement('canvas');
      patternCanvas.width = patternCanvas.height = squareWidth + squareDistance;
      var ctx = patternCanvas.getContext('2d');

      ctx.fillStyle = this.color;
      ctx.fillRect(0, 0, squareWidth, squareWidth);

      return patternCanvas;
    };

    var diamondPatternBrush = new fabric.PatternBrush(canvas);
    diamondPatternBrush.getPatternSrc = function() {

      var squareWidth = 10, squareDistance = 5;
      var patternCanvas = fabric.document.createElement('canvas');
      var rect = new fabric.Rect({
        width: squareWidth,
        height: squareWidth,
        angle: 45,
        fill: this.color
      });

      var canvasWidth = rect.getBoundingRectWidth();

      patternCanvas.width = patternCanvas.height = canvasWidth + squareDistance;
      rect.set({ left: canvasWidth / 2, top: canvasWidth / 2 });

      var ctx = patternCanvas.getContext('2d');
      rect.render(ctx);

      return patternCanvas;
    };

    var img = new Image();
    img.src = '../assets/honey_im_subtle.png';

    var texturePatternBrush = new fabric.PatternBrush(canvas);
    texturePatternBrush.source = img;
  }

  document.getElementById('drawing-mode-selector').addEventListener('change', function() {

    if (this.value === 'hline') {
      canvas.freeDrawingBrush = vLinePatternBrush;
    }
    else if (this.value === 'vline') {
      canvas.freeDrawingBrush = hLinePatternBrush;
    }
    else if (this.value === 'square') {
      canvas.freeDrawingBrush = squarePatternBrush;
    }
    else if (this.value === 'diamond') {
      canvas.freeDrawingBrush = diamondPatternBrush;
    }
    else if (this.value === 'texture') {
      canvas.freeDrawingBrush = texturePatternBrush;
    }
    else {
      canvas.freeDrawingBrush = new fabric[this.value + 'Brush'](canvas);
    }

    if (canvas.freeDrawingBrush) {
      canvas.freeDrawingBrush.color = drawingColorEl.value;
      canvas.freeDrawingBrush.width = parseInt(drawingLineWidthEl.value, 10) || 1;
      canvas.freeDrawingBrush.shadowBlur = parseInt(drawingShadowWidth.value, 10) || 0;
    }
  });

  drawingColorEl.onchange = function() {
    canvas.freeDrawingBrush.color = drawingColorEl.value;
  };
  drawingLineWidthEl.onchange = function() {
    canvas.freeDrawingBrush.width = parseInt(drawingLineWidthEl.value, 10) || 1;
  };
  drawingShadowWidth.onchange = function() {
    canvas.freeDrawingBrush.shadowBlur = parseInt(drawingShadowWidth.value, 10) || 0;
  };

  if (canvas.freeDrawingBrush) {
    canvas.freeDrawingBrush.color = drawingColorEl.value;
    canvas.freeDrawingBrush.width = parseInt(drawingLineWidthEl.value, 10) || 1;
    canvas.freeDrawingBrush.shadowBlur = 0;
  }



  


var even = false;

$('#other_btn').click(function() {
  // alert(even);
    if(even) {

        doEven();
    } else {
        doOdd();
    }

    even = !even;
});



$("#b").click(function(){
  $("#canvas").get(0).toBlob(function(blob){
    saveAs(blob, "image/myIMG.png");
	savetoserver();
	canvas.clear();
    canvas.setBackgroundImage('map_images/rsz_new.png', canvas.renderAll.bind(canvas), {
    backgroundImageOpacity: 0.5,
    backgroundImageStretch: false
});
    console.log(blob);
  });
});

function savetoserver() {

var dataURL=canvas.toDataURL();

var project_id= <?php echo $_SESSION['admin'] ?>;

var lastid= <?php echo $map ; ?>;


var currentTime = new Date();

var month = currentTime.getMonth()+1; 
var day = currentTime.getDate()
var year = currentTime.getFullYear()
var currentdate =month + "/" + day + "/" + year;


var imagename='img_'+project_id+'_'+lastid+'_'+currentdate;

$.ajax({
  type: "POST",
  url: "upload.php",
  data: { image: dataURL,imagename: imagename,project_id: project_id}
					
}).done(function( respond ) {
 alert("Saved filename: "+respond);
});


}


function doOdd() {
    // first click, third click, fifth click, etc
$('#other_btn').text("Cancel");
    $(".drawing_btn").attr("disabled", true);
        $('#other').show();
        var line, isDown;

        canvas.on('mouse:down', function(o){
          isDown = true;
          var pointer = canvas.getPointer(o.e);
          var points = [ pointer.x, pointer.y, pointer.x, pointer.y ];
          var color=$('#linecolor').val();
          if(document.getElementById('linetype').value == "dashed") {
            
             line = new fabric.Line(points, {
              strokeWidth: 5,
              strokeDashArray: [15, 5],
              fill: color,
              stroke: color,
              originX: 'center',
              originY: 'center'
            });
          }
          else {

            line = new fabric.Line(points, {

              strokeWidth: 5,
              fill: color,
              stroke: color,
              originX: 'center',
              originY: 'center'
            });
          }
          
          canvas.add(line);
        });

        canvas.on('mouse:move', function(o){
          if (!isDown) return;
          var pointer = canvas.getPointer(o.e);
          line.set({ x2: pointer.x, y2: pointer.y });
          canvas.renderAll();
        });

        canvas.on('mouse:up', function(o){
          isDown = false;
        });
}

function doEven() {
    // second click, fourth click, sixth click, etc
  $(".drawing_btn").attr("disabled", false);

canvas.__eventListeners["mouse:down"] = [];
    $('#other').hide();
    $('#other_btn').text("Lines Draw");

  
}




</script>

<style type="text/css">
.canvasbackground {
  top: 6vh;
  height: 100%;
    margin-left: 1.5%;
    width: 97%;
    position: absolute;
  background-color: #F2F2F6;
}
  #canvas-container {
    position: relative;
    width:100%;
    height:55vh;
    box-shadow: 0 0 5px 1px black;
    border: 5px solid transparent;
}
.canvas-container{
   width:100% !important;
    height: 100% !important;
}
.lower-canvas{
  width:100% !important;
  height: 100% !important;
  image-rendering: pixelated;
}
.upper-canvas{
  width:100% !important;
  height: 100% !important;\
  image-rendering: pixelated;
}
#canvas-container.over {
    border: none;
}
#images img.img_dragging {
    opacity: 0.4;
}
/* 
Styles below based on  http://www.html5rocks.com/en/tutorials/dnd/basics/ 
*/

/* Prevent the text contents of draggable elements from being selectable. */
[draggable] {
    -moz-user-select: none;
    -khtml-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    /* Required to make elements draggable in old WebKit */
    -khtml-user-drag: element;
    -webkit-user-drag: element;
    cursor: move;
}
</style>

<!-- end -->
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

  /*li:hover {
    background: #3C3C3C;
  

  }*/
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
  width: 100%;
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



/*  // whenever we hover over a menu item that has a submenu
  $('#test').hover(function() { 
     $('#test2').show();
     //alert("test");
  });

  $( "#test2").mouseleave(function() {

  $('#test2').hide();
  //alert("test2");
});

  $("#test").parent().mouseleave(function() {

  $('#test2').hide();
  //alert("out");
});*/



</script>


